<?php
	/**
	 * vCode(m,n,x,y) number:m  size:n width=x height=y
	 
	 */
	session_start();
	vCode(5, 20); //number:5 size=20
	 
	function vCode($num = 5, $size = 40, $width = 100, $height = 30) {
	    !$width && $width = $num * $size * 4 / 5 + 5;
	    !$height && $height = $size + 10;
	    // remove the number 01 etc.
	    $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
	    $code = '';
	    for ($i = 0; $i < $num; $i++) {
	        $code .= $str[mt_rand(0, strlen($str)-1)];
	    }
	    // draw pictures
	    $im = imagecreatetruecolor($width, $height);
	    // define colors
	    $back_color = imagecolorallocate($im, 235, 236, 237);
	    $boer_color = imagecolorallocate($im, 118, 151, 199);
	    $text_color = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
        // the background
	    imagefilledrectangle($im, 0, 0, $width, $height, $back_color);
	    // the frame
	    imagerectangle($im, 0, 0, $width-1, $height-1, $boer_color);
	    // create the interfering line
	    for($i = 0;$i < 5;$i++) {
	        $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
	        imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color);
	    }
	    // create the interfering points
	    for($i = 0;$i < 50;$i++) {
	        $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
	        imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height),$font_color);
	    }
	    // the captchas
	    @imagefttext($im, $size , 0, 5, $size + 3, $text_color,"./font.ttf", $code);
	    $_SESSION["VerifyCode"]=$code;
	    header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
	    header("Content-type: image/png;charset=gb2312");
	    imagepng($im);
	    imagedestroy($im);
	}
	 
	?>

