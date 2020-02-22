<?php
session_start();
require_once './vendor/autoload.php';
require_once './common.php';
require_once './exception/AppError.php';
$act = isset($_GET['act']) && !empty($_GET['act']) ? $_GET['act'] : 'login';
$http = new \tegic\Http();
$token = session_id();
if ($act == 'login') {
    require_once './template/login.html.php';
} elseif ($act == 'code') {
    header("Expires: Mon, 26 Jul 2012 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pramga: no-cache");
    header('Content-Type: image/jpeg');
    if (!is_dir(BASE_PATH . '/tmp')) {
        mkdir(BASE_PATH . '/tmp', 0777, true);
    }
    $cookieFile = BASE_PATH . '/tmp/ckfind' . $token . '.cookie';
    $http->set(CURLOPT_COOKIEFILE, $cookieFile);
    $result = $http->connect("http://cet-bm.neea.edu.cn/Home/VerifyCodeImg?a=" . mt_rand(100000, 999999));
    echo $result;
} elseif ($act == 'query') {
    if (!$_POST) {
        throw new AppError('Permission denied');
    }
    $provinceCode = $_POST['province_code'];
    $id_number = $_POST['id_card'];
    $username = $_POST['real_name'];
    $code = $_POST['code'];
    $params = [
        'provinceCode' => $provinceCode,
        'IDTypeCode' => 1,
        'IDNumber' => $id_number,
        'Name' => $username,
        'verificationCode' => $code,
    ];
    $cookieFile = BASE_PATH . '/tmp/ckfind' . $token . '.cookie';
    $http->set(CURLOPT_COOKIEFILE, $cookieFile);

    $http->post($params);
    $result = $http->connect("http://cet-bm.neea.edu.cn/Home/ToQueryTestTicket");
    try {
        $content = json_decode($result, true);
    } catch (Throwable $e) {
        error('内部服务错误,请稍后再试!');
    }
    if ($content['ExceuteResultType'] != 1) {
        if ($content['ExceuteResultType'] == -1) {
            error($content['Message']);
        }
        error('未查询到数据');
    }
    $content = json_decode($content['Message'], true);
    $content = $content[0]['TestTicket'];
    success($content);
}

