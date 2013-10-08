<?php
	/*
	//안쓰는 코드 입니다.
	$search_url="http://www.gangbuklib.seoul.kr/gangbuk/01.search/list.asp?a_lib=MA&a_v=f&m=0101&a_qf=I&a_q=.$isbn.&x=33&y=5&a_bf=T&a_dr=&a_dt=&a_ft=&a_mt=&a_ut=&a_lt=&a_pyFrom=&a_pyTo=&a_sort=A&a_vp=10";
	$pattern = "/key=(.*?)\"\>/is";
	
	$key = $obj->getKey($search_url, $pattern);
	$info_url="http://www.gangbuklib.seoul.kr/gangbuk/01.search/list.asp?m=0101&a_lt=&a_v=f&a_bf=T&a_qf=I&a_mt=&a_vp=10&a_q=$isbn&a_dt=&a_pyTo=&a_sort=A&a_dr=&a_ft=&a_ut=&a_pyFrom=&a_lib=MA&a_cp=1&a_key=$key";
	
	$pattern_title = "/서지정보(.*?)서명/is";
	$pattern_reserv = "/예약가능여부:(.*?)예약허용인원/is";
	$pattern_location = "/EM[0-9]+(.*?)[가-힣]/is";
	
	$title = $obj->getBook($info_url, $pattern_title);
	$reserv = $obj->getBook($info_url, $pattern_reserv);
	$location = $obj->getBook($info_url, $pattern_location);
	//$pattern_title = "/서지정보(.*?)서명/is";
	//$pattern_title = "/class=\"Box\"\>\<h3\>(.*?)\<\/h3\>/is";
	//$pattern_reserv = "/\<dt\>예약가능여부:\<\/dt\>\<dd\>(.*?)\<\/dd\>/is";
	//$pattern_location = "/\<\/td\>\<td\>(.*?)\<\/td\>\<td\>+[0-9]/is";
	//$pattern_location = "/\<td\>(.*?)\<\/td\>\<td\>(.*?)\<\/td\>\<td class=\"center\"\>/is";
	//$pattern_reserv = "/\<td title=\"BOL.*:\"\>(.*?)\<\/td\>/is";
 	//echo "<pre>"; var_dump($reserv1); echo "</pre>";

	?>
<body>
<h3>책 대출정보</h3>
<table border="1">
	<tr>
		<td>책 제목</td>
		<td><b><?=$title?></b></td>
	</tr>
	<tr>
		<td>대출상태</td>
		<td><b><font color="red"><?=$reserv?></font></b></td>
	</tr>
	<tr>
		<td>소장위치</td>
		<td><b><?=$location?></b></td>
	</tr>
</table>
</body>
</html>
	*/
	
	/*
	//비치중일때, 소장 위치 리턴(소장 위치는 부분)
	if($reserv == "비치"){
		$pattern_location = "/GE[0-9]+(.*?)요/is";
		$location = $obj->getBook_Text($infourl, $pattern_location);
	}else{//대출중일때, 반납날짜 제거하기위해.
		$pattern_location = "/[0-9]{4}-[0-9]{2}-[0-9]{2}+(.*?)[0-9] 순위/is";
		$location = $obj->getBook_Text($infourl, $pattern_location);
	}
	//대출중일때, 반납날짜가 없을 경우.
	if(location == null){
		$pattern_location = "/GE[0-9]+(.*?)[0-9] 순위/is";
		$location = $obj->getBook_Text($infourl, $pattern_location);	
	}
	//대출중일때, 반납날짜가 없고 예약이 꽉찬경우.
	if(location == null){
		$pattern_location = "/GE[0-9]+(.*?)[가-힣]/is";
		$location = $obj->getBook_Text($infourl, $pattern_location);				
	}
	if(location == null){
		$pattern_location = "/GE[0-9](.*?)이용/is";
		$location = $obj->getBook_Text($infourl, $pattern_location);				
	}
	*/
	/*
	금천구립가산정보
	$pattern_reserv = "/예약\<\/th\>(.*?)\<\/table\>/is";	
	
	
	//대출 여부 확인 부분
	$reserv1 = $obj->getBook($infourl, $pattern_reserv);
	$pat = "/.+?(비치|대출)/is";
	if(preg_match($pat, $reserv1, $res)){
		$reserv = $res[1];
	}
	
	$pattern_location = "/\<td\>(.*?)\<\/td\>/is";
	$location = $obj->getBook_Array($infourl, $pattern_location);
	$location = $location[2]."  ".$location[3];
	*/


	/*
	강북 최종코드		
	$tmp_book_array = array();
	$bookInfo_startNum = 2; //필요한 정보는  array 2번째 index에서 부터 시작.
	$col_count = 6; //각 책당 자료갯수.
	$reserv_num = 2; //예약 정보 배열번호.
	$location_num = 5; //위치 정보 배열번호.

	//여러권의 책정보를 보여주기 위해 $lib_array에 결과 값을 넣는다.
	for($i = $bookInfo_startNum; $i < count($td_array); $i++){	
		//rawurlencode처리 및 trim처리와 값을 배열에 저장.
		if (($i%$col_count) == $reserv_num) { //예약 정보는 테이블의 2번째 칸에 존재
			$tmp_book_array["title"] = trim($title);
			//echo $td_array[$i];echo $j; echo "<br>";
			$td_array[$i] = ($td_array[$i] == "대출중" || $td_array[$i] == "대출대기중") ? "false" : "true";
			$tmp_book_array["reserve"] = trim($td_array[$i]);
		} else if (($i%$col_count) == $location_num) { //위치정보는 테이블의 5번째 배열에 있음.
			$tmp_book_array["location"] = trim($td_array[$i])."  ".trim($td_array[$i+1]); //위치정보 + 청구기호
		}
		//array push 및 초기화.
		if (!empty($tmp_book_array["reserve"]) && !empty($tmp_book_array["location"])) { //정보 값이 셋팅이 되어있을경우	
			array_push($lib_array, $tmp_book_array);
			$tmp_book_array["reserve"] = '';
			$tmp_book_array["location"] = '';
			$tmp_book_array["title"] = '';
		}
	}
	*/
	
?>