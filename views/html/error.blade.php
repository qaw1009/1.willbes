<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
}

#container {
	margin: 100px;
	/*border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;*/
	text-align:center
	
}
#container div {font-size:14px; margin-top:20px; color:#000; line-height:1.5}
#container div strong {font-size:20px; font-weight:bold; color:#1087ef; font-family: Consolas, Monaco, Courier New, Courier, monospace}
#container div span { font-weight:bold}
#container div p {margin-top:20px}
#container div a {
	display:inline-block;
	height:30px; line-height:30px;
	border:1px solid #363636;
	color:#363636;
	padding:0 10px;
	font-size:12px;
	text-decoration:none;
	}
#container div a:hover {
	background:#363636;
	color:#fff;
	}
</style>
</head>
<body>
	<div id="container">
        <?php #요기에 작업하면 됩니다. ?>
        <img src="../../public/img/error_404.png" alt="404 error">   
        <div>
        고객센터 <strong>1544-5006</strong><Br>
        <span>평일 09:00 ~ 18:00 / 토요일 09:00 ~ 13:00</span>
        <p>
        	<a href="#none">메인으로 &gt;</a>
            <a href="#none">이전으로 &gt;</a>
        </p>
        </div>     
	</div>
</body>
</html>