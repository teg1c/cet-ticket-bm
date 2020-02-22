<?php
define('APP_DEBUG', true);
set_error_handler('error_handler');
set_exception_handler('exception_handler');
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

function error_handler($e)
{
    $message = APP_DEBUG ? $e->getMessage() : '系统出错了，请重试';
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
        error($message);
    } else {
        require_once BASE_PATH . '/template/error.html.php';
        die;
    }
}

function exception_handler($e)
{
    $message = APP_DEBUG ? $e->getMessage() : '系统出错了，请重试';
    if ($e instanceof AppError) {
        $message = $e->getMessage();
    }
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
        error($message);
    } else {
        require_once BASE_PATH . '/template/error.html.php';
        die;
    }
}