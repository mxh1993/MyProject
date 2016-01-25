<?php
	session_start();
	$image = imagecreatetruecolor(100,40);
	$bgcolor = imagecolorallocate( $image, 238, 238, 238); 
	imagefill( $image, 0, 0, $bgcolor); 
	$captch_code = '';
	for($i = 0;$i < 4;$i++)
	{
		$font = '../font/Arial.ttf';
		$fontcolor = imagecolorallocate($image, rand(0,110), rand(0,110), rand(0,110));
		$data = 'abcdefghijkmnpqrstuvwxyABCDEFGHIJKLMNPQRSTUVWXY3456789';
		$fontcontent = substr($data,rand(0,strlen($data)-1),1);
		$captch_code .= $fontcontent;
		
		$x = ($i * 100 / 4) + rand(5, 10);
		$y = rand(25, 30); 
		imagettftext($image, rand(14,18), rand(0,20), $x, $y, $fontcolor, $font, $fontcontent);
	}
	$_SESSION['authcode'] = $captch_code; 
	
	for($i = 0;$i < 200;$i ++)                          
	{
		$pointcolor = imagecolorallocate( $image, rand(50,200), rand(50,200), rand(50,200)); 
		imagesetpixel( $image, rand(3,97),rand(1,39), $pointcolor);
	}
	
	for($i = 0; $i < 3;$i ++) 
	{
		$linecolor = imagecolorallocate($image, rand(80,220), rand(80,220), rand(80,220));
		imageline($image, rand(1,99), rand(1,39), rand(1,99), rand(1,39),$linecolor);
	}
	header( 'content-type: image/png' ); 
	imagepng( $image ); 
	imagedestroy( $image ); 
?>