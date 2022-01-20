<?php

interface SmsInterface{
    
    public function getSmsTemplate($code,...$params):array;
    private function getSmsTemplateParams(string $content):array;
    private function bindSmsTemplate(string $content,array $templateParams,array $inputParams):string;
    
}

