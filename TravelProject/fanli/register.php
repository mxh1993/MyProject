<?php
	header("Content-type:text/html; charset=utf-8");
	if(isset($_REQUEST['authcode']))
	{
		session_start();
		if(strtolower($_REQUEST['authcode']) != strtolower($_SESSION['authcode']))
		{
			echo "<script>
			alert('验证码输入错误');
			location.href='register.php';</script>";
		}else
		{
			echo "<script>
			alert('注册成功!');
			location.href='login.html';</script>";
		}
		exit();
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta name="applicable-device" content="mobile" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>海游旅游网-注册</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.8.3.min.js"></script>
<script src="layer/layer.js"></script>
<script>
$(window).load(function() {
	$("#status").fadeOut();
	$("#preloader").delay(350).fadeOut("slow");
})
</script>
</head>
<script type="text/javascript">
$(document).ready(function(){
	$("form").submit(function(e){
	  	var username = $.trim($("#username").val());
		var password = $.trim($("#password").val());
		var password_PwdTwo = $.trim($("#password_PwdTwo").val());
		var email = $.trim($("#email").val());
		var yzm = $.trim($("#yzm").val());
		if(username == ''){
			layer.tips('请输入用户名/邮箱/手机号码','#username', {tips: 1});
			$('#username').focus();
			return false;
		}else if(password == ''){
			layer.tips('请输入登录密码','#password', {tips: 1});
			$('#password').focus();
			return false;
		}else if(password.length < 6){
			layer.tips('登陆密码必须大于6位数长度','#password', {tips: 1});
			$('#password').focus();
			return false;
		}else if(password_PwdTwo == ''){
			layer.tips('请输入确认密码','#password_PwdTwo', {tips: 1});
			$('#password_PwdTwo').focus();
			return false;
		}else if(password_PwdTwo != password){
			layer.tips('您两次输入的密码不一致!','#password_PwdTwo', {tips: 1});
			$('#password_PwdTwo').focus();
			return false;
		}else if(email == ''){
			layer.tips('请输入邮箱','#email', {tips: 1});
			$('#email').focus();
			return false;
		}else if(!/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/.test(email)){
			layer.tips('您输入的邮箱格式不正确!','#email', {tips: 1});
			$('#email').focus();
			return false;
		}else if(yzm == ''){
			layer.tips('请输入验证码','#yzm', {tips: 1});
			$('#yzm').focus();
			return false;
		}else{
			return true;
		}
	});
});
</script>

<body>
<div class="mobile">
		<!--页面加载 开始-->
		<div id="preloader">
				<div id="status">
						<p class="center-text"><span>拼命加载中···</span></p>
				</div>
		</div>
		<!--页面加载 结束-->
		<!--header 开始-->
		<header>
				<div class="header">
						<a class="new-a-back" href="javascript:history.back();">
						<span><img src="images/iconfont-fanhui.png"></span>
						</a>
						<h2>海游旅游网-注册</h2>
				</div>
		</header>
		<!--header 结束-->
		
		<div class="w main">
				<form id="frm_login" method="post" action="">
						<div class="item item-username">
								<input id="username" class="txt-input txt-username" type="text" placeholder="请输入用户名" value="" name="username">
								<b class="input-close" style="display: none;"></b>
						</div>
						<div class="item item-password">
								<input id="password" class="txt-input txt-password ciphertext" type="password" placeholder="请输入密码" name="password" style="display: inline;">
								<input id="ptext" class="txt-input txt-password plaintext" type="text" placeholder="请输入密码" style="display: none;" name="ptext">
								<b class="tp-btn btn-off"></b>
						</div>
						<div class="item item-password">
								<input id="password_PwdTwo" class="txt-input txt-password_PwdTwo ciphertext_PwdTwo" type="password" placeholder="确认密码" name="password_PwdTwo" style="display: inline;">
								<input id="ptext_PwdTwo" class="txt-input txt-password_PwdTwo plaintext_PwdTwo" type="text" placeholder="确认密码" style="display: none;" name="ptext_PwdTwo">
								<b class="tp-btn_PwdTwo btn-off_PwdTwo"></b>
						</div>
						<div class="item item-username">
								<input id="email" class="txt-input txt-email" type="text" placeholder="请输入邮箱" value="" name="email">
								<b class="input-close" style="display:none;"></b>
						</div>
						<div class="item item-captcha">
								<div class="input-info">
										<input id="yzm" class="txt-input-captcha txt-captcha" type="text" placeholder="验证码" autocomplete="off" maxlength="6" size="11" name="authcode">
										<b id="validateCodeclose" class="input-close" onClick="validateCodeclose();" style="display: block; margin-right:15px;"></b>
										<span id="captcha-img">
										<img id="code" src="PHP/captcha.php?r=<?php echo rand();?>" style="width:80px;height:40px;" onClick="closeAndFlush();">
										</span>
										<span class = "unclear">
										<a href="javascript:void(0)" onclick = "document.getElementById('code').src='PHP/captcha.php?r='+Math.random()">看不清？</a>
										</span>
								</div>
								<div class="err-tips"> 注册即视为同意
										<a target="_blank" href="#">用户服务协议</a>
								</div>
						</div>
						<div class="ui-btn-wrap">
								<input name="" type="submit" value="用户注册"  class="ui-btn-lg ui-btn-primary" />
						</div>
						<div>
						<input name="123" type="submit" value="用户注册" />
						</div>
						<div class="ui-btn-wrap">
								<a class="ui-btn-lg ui-btn-danger" href="login.php">已有账号？立即登录</a>
						</div>
				</form>
		</div>
		<div class="m_user w">
				<a href="login.php">登录</a>
				<a href="register.php">注册</a>
				<a href="#">返回顶部</a>
		</div>
		<div class="copyright">Copyright © 2012-2015 海游旅游网 版权所有</div>
</div>
</body>
</html>
<script type="text/javascript" >
    $(function() {
		$(".input-close").hide();
		displayPwd();
		displayPwd_PwdTwo();
		displayClearBtn();
		setTimeout(displayClearBtn, 200 ); //延迟显示,应对浏览器记住密码
	});	

	//是否显示清除按钮
	function displayClearBtn(){
		if(document.getElementById("username").value != ''){
			$("#username").siblings(".input-close").show();
		}
		if(document.getElementById("password").value != ''){
			$(".ciphertext").siblings(".input-close").show();
		}
		if(document.getElementById("password_PwdTwo").value != ''){
			$(".ciphertext_PwdTwo").siblings(".input-close").show();
		}
	}

	//清除input内容
    $('.input-close').click(function(e){  
		$(e.target).parent().find(":input").val("");
		$(e.target).hide();
		$($(e.target).parent().find(":input")).each(function(i){
			if(this.id=="ptext" || this.id=="password"){
				$("#password").val('');
				$("#ptext").val('');
			}
			if(this.id=="ptext_PwdTwo" || this.id=="password_PwdTwo"){
				$("#password_PwdTwo").val('');
				$("#ptext_PwdTwo").val('');
			}
         });
    });  
	
	//设置password字段的值	
	$('.txt-password').bind('input',function(){
		$('#password').val($(this).val());
	});
	$('.txt-password_PwdTwo').bind('input',function(){
		$('#password_PwdTwo').val($(this).val());
	});
	
	//显隐密码切换
	function displayPwd(){
    	$(".tp-btn").toggle(
          function(){
            $(this).addClass("btn-on");
			var textInput = $(this).siblings(".plaintext");
    		var pwdInput = $(this).siblings(".ciphertext");
			pwdInput.hide();
			textInput.val(pwdInput.val()).show().focusEnd();
          },
          function(){
		  	$(this).removeClass("btn-on");
		  	var textInput = $(this).siblings(".plaintext");
    		var pwdInput = $(this).siblings(".ciphertext");
            textInput.hide();
			pwdInput.val(textInput.val()).show().focusEnd();
          }
    	);
	}
	//显隐密码切换
	function displayPwd_PwdTwo(){
    	$(".tp-btn_PwdTwo").toggle(
          function(){
            $(this).addClass("btn-on_PwdTwo");
			var textInput = $(this).siblings(".plaintext_PwdTwo");
    		var pwdInput = $(this).siblings(".ciphertext_PwdTwo");
			pwdInput.hide();
			textInput.val(pwdInput.val()).show().focusEnd();
          },
          function(){
		  	$(this).removeClass("btn-on_PwdTwo");
		  	var textInput = $(this).siblings(".plaintext_PwdTwo");
    		var pwdInput = $(this).siblings(".ciphertext_PwdTwo");
            textInput.hide();
			pwdInput.val(textInput.val()).show().focusEnd();
          }
    	);
	}
	
	//监控用户输入
	$(":input").bind('input propertychange', function() {
		if($(this).val()!=""){
			$(this).siblings(".input-close").show();
		}else{
			$(this).siblings(".input-close").hide();
		}
    });
</script>