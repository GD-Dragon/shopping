<?php /*a:1:{s:81:"D:\PHPstudy\PHPTutorial\WWW\03kj\shopping\application\admin\view\login\login.html";i:1561622236;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link href="/static/hui/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/static/hui/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/static/hui/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/hui/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script><![endif]-->
<title>后台登录</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
	<div id="loginform" class="loginBox">
		<form class="form form-horizontal">
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
				<div class="formControls col-xs-8">
					<input id="name" name="" type="text" placeholder="账户" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
				<div class="formControls col-xs-8">
					<input id="password" name="" type="password" placeholder="密码" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<input class="input-text size-L" type="text" placeholder="验证码" id="my_captcha"  style="width:150px;" value="">
					<!-- <img src="images/VerifyCode.aspx.png"> -->
					<!-- <img src="<?php echo captcha_src(); ?>" alt="captcha"  id="captcha"  /> -->
					<img src="<?php echo captcha_src(); ?>" alt="captcha" style="width: 150px;height: 50px" id="captcha" />
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<span id="span_captcha" ></span>
					<label for="online">
						<input type="checkbox" name="online" id="online" value="">
						使我保持登录状态</label>
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<input name="" id="login" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
					<input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
				</div>
			</div>
		</form>
	</div>
</div>
<!-- <div class="footer">Copyright 你的公司名称 by H-ui.admin.page.v3.0</div> -->

<script type="text/javascript" src="/static/js/jquery.min.js"></script>
<script>
	$(document).ready(function(){
  $("#login").click(function(){
    var code=$("#my_captcha").val()
    console.log(code);
    var name=$("#name").val()
    var password=$("#password").val()
    $.ajax({
    	url:"<?php echo url('login/loginAction'); ?>",
    	data:{
    		code:code,
    		name:name,
    		password:password
    	},
    	type:'post',
    	dataType:'json',
    	success:function(res){
    		console.log(res)

    		if (res.status=='ok'){
    			 location.href="<?php echo url('index/index'); ?>"
    		}else{
    		$('#span_captcha').css("color","red")
    		$('#span_captcha').html(res.message)
    		$("#captcha").attr('src',"<?php echo captcha_src(); ?>?"+Math.random())
    		console.log(res.code)
    		}
    	}
    })
  });
  $("#captcha").click(function(){
  	$("#captcha").attr('src',"<?php echo captcha_src(); ?>?"+Math.random())
  });
});
</script>
</body>
</html>