# SMS
随着业务的发展，短信模板也是各式各样，为了减少因模板的变更需对业务代码的修改，顾对模板和传参进行自动化处理。
1、用户可以通过匹配规则自定义短信模板

# 使用
$smsInstance = new Sms();
$smsInstance->getSmsTemplate('s2018');
