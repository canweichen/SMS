<?php
require_once('./Utils/ResponseUtil.php');
require_once('./Utils/ErrorEmunUtil.php');

class Sms {

    /**
     * Get Sms Template
     * @param string $code
     * @param [type] ...$params
     * @return array
     */
    public function getSmsTemplate(string $code,...$params):array{
        //Get sms template under the code
        $template = self::template($code);
        if(empty($template)){
            return ResponseUtil::responseError(ErrorEmunUtil::TEMPLATE_NOT_FOUNT);
        }
        //Get need variable under the sms template
        $templateParamsArr = $this->getSmsTemplateParams($template);
        //passby match and bind params
        if($templateParamsArr['count'] == 0){
            return ResponseUtil::responseOk(addslashes($template));
        }
        //Check current input and config params num is the same
        $countInput = count($params);
        if($countInput != $templateParamsArr['count']){
            return ResponseUtil::responseError(ErrorEmunUtil::TEMPLATE_NOT_MATCH);
        }
        //Match and bind params
        $template = $this->bindSmsTemplate($template,$templateParamsArr['params'],$params);
        return ResponseUtil::responseOk(addslashes($template));
    }

    /**
     * Get Sms Template Params
     * @param string $content
     * @return array
     */
    private function getSmsTemplateParams(string $content):array{
        $defaultParams = [];
        $countNum = preg_match_all('/{[a-z A-Z _ 0-9]+}/',$content,$defaultParams);
        return ['count' => $countNum, 'params' => $defaultParams[0]];
    }

    /**
     * Bind Sms Template
     * @param string $content
     * @param array $templateParams
     * @param array $inputParams
     * @return string
     */
    private function bindSmsTemplate(string $content,array $templateParams,array $inputParams):string{
        foreach($templateParams as $key => $str){
            $content = str_replace($str,$inputParams[$key],$content);
        }
        return $content;
    }

    private static function template($code){
        $template = [
            's2021' => "你好，你的注册验证码是{code}，有效时间3分钟!",
            's2020' => "你好，你的登录账号:{account}，密码:{password},登录后请及时eryr修改密码!",
            's2019' => "你好，已成功购买{name}商品,支付金额为{money}元!",
            's2018' => "你好，快递已到菜鸟驿站，请注意查收!",
            's2017' => "尊敬的用户您好，{companyName}定于{address}开展主题为{title}的营销活动，活动时间{startTime}-{endTime}，欢迎您的光临!",
            's2016' => "尊敬的用户您好，{address}开展主题为{title}的营销活动将于明天开始，欢迎您的光临!"
        ];
        return $template[$code];
    }
}
