<?php
$aa = "http://www.gwangjinlib.seoul.kr/KJL/Search/SearchReport.csp?HLOC=KJL&COUNT=33pu9zeu00&Kor=1&SrchMode=&SrchTarget=B&SrchClass=All&SrchData=I09788965700036%E2%96%B2~&SrchData1=GUEST33pu9zeu00%5E0%5E0%5EALL%5EKJL&SrchData2=ALL%5EALL%5EALL%5EALL%5EALL%5EALL%5EALL&SrchData3=0000%3B9999%5E%3B%5E%5EALL%5EALL%5EALL%5EALL&SrchData4=S01%5E0%5E1000%5E10%5E1%5E0&SrchApplyFacet=&BasicList=LIST&SSORT=&SORDER=&MINI=&PAGENO=&LOC=KJL&FILENUM=180569&HIS=&SrchKey=9788965700036&SrchType01=&SrchKey01=&SrchCondi01=%E2%96%B2&CHECKEDRNO%2801%29=%5E180569%5EN&CHECKEDRNO%2802%29=%5E180609%5EN&CHECKEDRNO%2803%29=%5E180636%5EN&CHECKEDRNO%2804%29=%5E200015%5EN";
$bb = "http://www.gwangjinlib.seoul.kr/KJL/SearchNew/SearchListC.csp?HLOC=KJL&COUNT=33pu9zeu00&Kor=1&New=C0&Gate=DA&TARGET=0&SrchTarget=B&SrchType=0&SrchType01=I&SrchKey01=9788965700036&SrchCondi01=%E2%96%B2&CLOC0=ALL&x=60&y=15";

$cc = html_entity_decode($aa);
$dd = html_entity_decode($bb);

echo $cc;
echo "<br>";
echo $dd;
echo "<br>";

	$lib = array(MA,MB,MC,MD,ME,NA,NB,NC,NE,NF,NG,NH,NI,NL,NM);
	$abc = count($lib);
	echo $abc;
?>