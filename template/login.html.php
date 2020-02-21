<!DOCTYPE html>
<html>

<head>
    <title>英语四六级准考证找回</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="icon" href="data:image/ico;base64,aWNv">
    <meta name="description" content="">
    <link rel="stylesheet" href="//cdn.staticfile.org/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="//cdn.staticfile.org/jquery-weui/1.2.1/css/jquery-weui.min.css">

    <style type="text/css">
        body,
        html {
            background-color: #efeff4;
            height: 100%;
            -webkit-tap-highlight-color: transparent;
        }

        a {
            color: #04be02;
            text-decoration: none;
        }

        .demos-title {
            text-align: center;
            font-size: 24px;
            color: #3cc51f;
            font-weight: 400;
            margin: 0 15%;
        }

        .demos-sub-title {
            text-align: center;
            color: #888;
            font-size: 14px;
        }

        .demos-header {
            padding: 25px 0;
        }

    </style>
</head>

<body ontouchstart style="max-width: 600px;margin: 0 auto;">
<header class='demos-header'>
    <h1 class="demos-title">四六级准考证找回</h1>
    <p class="demos-sub-title">仅限查询【辽宁、浙江、陕西】省份准考证</p>
</header>

<div id="form">
    <div class="weui-cells__title">请填写下方信息
    </div>

    <div class="weui-cells weui-cells_form">
        <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
            <label for="" class="weui-label">省份</label>
        </div>
        <div class="weui-cell__bd">
            <select class="weui-select" id="provinceCode">
                <option value="44">广东省</option>
                <option value="11">北京市</option>
                <option value="12">天津市</option>
                <option value="13">河北省</option>
                <option value="22">吉林省</option>
                <option value="31">上海市</option>
                <option value="34">安徽省</option>
                <option value="35">福建省</option>
                <option value="37">山东省</option>
                <option value="41">河南省</option>
                <option value="42">湖北省</option>
                <option value="45">广西壮族自治区</option>
                <option value="46">海南省</option>
                <option value="50">重庆市</option>
                <option value="51" selected="">四川省</option>
                <option value="53">云南省</option>
                <option value="62">甘肃省</option>
                <option value="63">青海省</option>
                <option value="82">澳门</option>
            </select>
        </div>
    </div>
    <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
            <label for="" class="weui-label">证件类型</label>
        </div>
        <div class="weui-cell__bd">
            <select class="weui-select" id="IDTypeCode">
                <option value="1">中华人民共和国居民身份证</option>
                <option value="2">台湾居民往来大陆通行证</option>
                <option value="3">港澳居民来往内地通行证</option>
                <option value="4">护照</option>
                <option value="5">香港身份证</option>
                <option value="6">澳门身份证</option>
            </select>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" id="realName" placeholder="请输入姓名" value=""/>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">身份证</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" id="idCard" placeholder="请输入身份证号" value=""/>
        </div>
    </div>


    <div class="weui-cell weui-cell_vcode">
        <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" id="code" placeholder="请输入验证码"/>
        </div>
        <div class="weui-cell__ft">
            <img class="weui-vcode-img" style="width: 100px;height: 40px" onclick="update_code()"
                 src="./index.php?act=code&token=<?php echo $token;?>">
        </div>
    </div>
    </div>

    <div class="weui-btn-area">
        <a class="weui-btn weui-btn_primary" href="javascript:" id="sub">找回</a>
    </div>

</div>

<div id="result" style="display: none">
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">姓名</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" id="find_username" name="" value="" placeholder="">
            </div>
        </div>

        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd">
                <label class="weui-label">准考证号</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" placeholder="验证码" type="text" id="ticket">
            </div>
            <div class="weui-cell__ft">
                <button class="weui-vcode-btn" onclick="copy()" data-clipboard-action="copy"
                        data-clipboard-target="#ticket" id="copy">复制</button>
            </div>
        </div>
    </div>
    <div class="weui-btn-area">
        <a class="weui-btn weui-btn_default" href="JavaScript:;" onclick="location.reload()" >重新查询</a>
    </div>
</div>


<div id="result" style="display: none">
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">姓名</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" id="find_username" name="" value="" placeholder="">
            </div>
        </div>

        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd">
                <label class="weui-label">准考证号</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" placeholder="验证码" type="text" id="ticket">
            </div>
            <div class="weui-cell__ft">
                <button class="weui-vcode-btn" onclick="copy()" data-clipboard-action="copy"
                        data-clipboard-target="#ticket" id="copy">复制</button>
            </div>
        </div>
    </div>
    <div class="weui-btn-area">
        <a class="weui-btn weui-btn_default" href="JavaScript:;" onclick="location.reload()" >重新查询</a>
    </div>
</div>
<div class="weui-footer" style="padding-top: 20px">
    <p class="weui-footer__text">by tegic</p>
</div>
<textarea cols="0" rows="0" id="wechatText" style="display: none"></textarea>
<script src="//cdn.staticfile.org/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.staticfile.org/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/clipboard@2.0.4/dist/clipboard.min.js"></script>
<script type="text/javascript">
    var clipboard = new ClipboardJS('#copy');
    clipboard.on('success', function(e) {
        console.log(e);
    });
    clipboard.on('error', function(e) {
        console.log(e);
    });
    var query_url = "./index.php?act=query";
    var token = "<?php echo $token;?>";
    function update_code() {
        var img_url = "./index.php?act=code&token=" + token + "&_t=" + (new Date()).getTime();
        $(".weui-vcode-img").attr("src", img_url);
    }
    $(function () {
        $('#sub').click(function () {
            var provinceCode = $('#provinceCode').val();
            var IDTypeCode = $('#IDTypeCode').val();
            var realName = $('#realName').val().replace(/\s+/g, '');
            var idCard = $('#idCard').val().replace(/\s+/g, '');
            var code = $('#code').val();
            if (!realName || !idCard || !code){
                $.toptip('信息输入完整');
                return false;
            }
            var data = {
                province_code: provinceCode,
                token: token,
                id_type_code: IDTypeCode,
                real_name: realName,
                id_card: idCard,
                code: code,
            };
            $.showLoading();
            $.ajax({
                type: 'POST',
                url: query_url,
                dataType: 'json',
                data: data,
                success: function (data) {
                    $.hideLoading();
                    if (data.code == 200){
                        $.toptip('找回成功','success')
                        $('#find_username').val($('#realName').val());
                        $('#ticket').val(data.data);
                        $('#result').show();
                        $('#form').hide();
                    }else{
                        $.alert(data.msg);
                    }
                },
                error: function () {
                    $.hideLoading();
                    $.toptip('系统错误，请重试');
                },
            });
        });
    });

    function copy() {
        var clipboard = new ClipboardJS('#copy');
        clipboard.on('success', function (e) {
            e.clearSelection(); //选中需要复制的内容
            $.toast("复制成功", 2000);
        });
        clipboard.on('error', function (e) {
            $.alert("当前浏览器不支持此功能，请手动复制。")
        });
    }
</script>
</body>

</html>
