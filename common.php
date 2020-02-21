<?php

define('BASE_PATH', dirname(__FILE__));

function _substr($html, $start, $end)
{
    $a = strpos($html, $start);
    if ($a === false) {
        return '';
    }
    $html = substr($html, $a + strlen($start));
    $a = strpos($html, $end);
    if ($a === false) {
        return '';
    }
    return substr($html, 0, $a);
}

function success($content = [], $message = 'success')
{
    $data = [];
    $data['msg'] = $message;
    $data['data'] = $content;
    $data['code'] = 200;
    exit(json_encode($data));
}

function error($message = 'error', $content = [])
{
    $data = [];
    $data['msg'] = $message;
    $data['data'] = $content;
    $data['code'] = 400;
    exit(json_encode($data));
}