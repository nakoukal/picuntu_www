<?php
include_once('globals.php');
include_once('class/class.HTTPAnswer.php');
include_once('class/class.MySQL.php');
$HTTPAnswer = new HTTPAnswer();
$oMySQL = new MySQL('temperature', $dblogin, $dbpwd, $dbhost, 3306);

$Sql = "SELECT Temp,TimeFrom,TimeTo FROM time_temp WHERE Day IN (1,2,3,4,5) GROUP BY TEMP,TimeFrom,TimeTo ORDER BY TimeFrom;";
$Res = $oMySQL->ExecuteSQL($Sql);
echo "<pre>";
$retval['term'] = $Res;
$HTTPAnswer->HTTPAnswer(HTTP_ANSWER_STATUS_200,json_encode($retval),true);
