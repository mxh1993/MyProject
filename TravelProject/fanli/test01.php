<?php 
	session_start();
	$image = imagecreatetruecolor(100,40);
	$imagecolor = imagecolorallocate($image,238,238,238);
	imagefill($image,0,0,$imagecolor);
	
	$captcha = "";
	for($i = 0; $i < 4;$i++)
	{
		$fontsize = 8;
		$fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
		$data = 'abcdefghijklmnopqrstuvwxyz1234567890';
		$fontcontent = substr($data,rand(0,strlen($data)-1),1);
		$captcha.=$fontcontent;
		$x = ($i*100/4)+rand(5,10);
		$y = rand(10,15);
		imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
	}
	$_SESSION['authcode'] = $captcha;
	
	for($i = 0;$i < 200;$i++)
	{
		$pointcolor = imagecolorallocate($image,rand(110,180),rand(110,180),rand(110,180));
		imagesetpixel($image,rand(1,99),rand(1,39),$pointcolor);
	}
	
	for($i = 0;$i < 3;$i++)
	{
		$linecolor = imagecolorallocate($image,rand(100,150),rand(100,150),rand(100,150));
		imageline($image,rand(1,99),rand(1,39),rand(1,99),rand(1,39),$linecolor);
	}
	header('Content-Type:image/png');
	imagepng($image);
	imagedestroy($image);
	?>