<!DOCTYPE html>
<html>

<head>
    <title>错误</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="icon" href="data:image/ico;base64,aWNv">
    <meta name="description" content="">
    <link rel="stylesheet" href="//cdn.staticfile.org/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="//cdn.staticfile.org/jquery-weui/1.2.1/css/jquery-weui.min.css">

</head>
<body ontouchstart style="max-width: 600px;margin: 0 auto;">
<script src="//cdn.staticfile.org/jquery/1.11.0/jquery.min.js"></script>

<div class="weui-msg">
    <div class="weui-msg__icon-area"><i class="weui-icon-warn weui-icon_msg"></i></div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">出错了</h2>
        <p class="weui-msg__desc"><?php echo $message; ?></p>
    </div>
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
            <a href="javascript:;" class="weui-btn weui-btn_primary" onclick="location.reload()">刷新</a>
        </p>
    </div>
</div>
</body>
</html>
