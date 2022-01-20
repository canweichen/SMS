<?php
require_once("./Sms.php");

$smsInstance = new Sms();
var_dump( $smsInstance->getSmsTemplate('s2018'));
var_dump( $smsInstance->getSmsTemplate('s2018','123'));
var_dump( $smsInstance->getSmsTemplate('s2019',"【香山里炭火烤肉】",108));
var_dump( $smsInstance->getSmsTemplate('s2020',15759312522,123456));
var_dump( $smsInstance->getSmsTemplate('s2021',123456));
var_dump( $smsInstance->getSmsTemplate('s2022',15759312522,123456));
var_dump( $smsInstance->getSmsTemplate('s2021',15759312522,123456));

var_dump( $smsInstance->getSmsTemplate('s2017','【厦门地铁】','【SM广场一期五楼海底捞火锅】','【年终表彰大会】','2022-01-25 18:00:00','2022-01-25 21:00:00'));
var_dump( $smsInstance->getSmsTemplate('s2017',15759312522,123456));
var_dump( $smsInstance->getSmsTemplate('s2016',15759312522,123456));
var_dump( $smsInstance->getSmsTemplate('s2016','【SM广场一期五楼海底捞火锅】','【年终表彰大会】'));