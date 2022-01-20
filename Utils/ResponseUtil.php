<?php

class ResponseUtil{

    public static function response($code,$message,$data):array{
        return [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
    }

    public static function responseOk($data,string $message = ''):array{
        return self::response(200,$message,$data);
    }

    public static function responseError(string $message,$data = []):array{
        return self::response(500,$message,$data);
    }
}