<?php

//Http to HTTPS
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}

//Variables Config
$config = file(getcwd().'/config.txt');

//Username et password
$userinfo = array(
		'admin'=>'PASSW0RDHERE'
		);
session_start();		

//Deconection
if(isset($_POST['logout'])) {
	$_SESSION['username'] = '';
	header('Location:  ' . $_SERVER['PHP_SELF']);
}

//Verfication et connection
if(isset($_POST['username'])) {
	if($userinfo[$_POST['username']] == $_POST['password']) {
		$_SESSION['username'] = $_POST['username'];
	}else {
		echo "<script>alert('Bad Password')</script>";
	}
}else{
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo trim(preg_replace('/\s\s+/', ' ', $config[0])); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
		
		html{box-sizing:border-box}*,*:before,*:after{box-sizing:inherit}
		
		html{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}
		
		html{
			animation:opac 0.8s
			}
		@keyframes opac{
			from{
				opacity:0
				}to{
				opacity:1
			}}

		body {
			font-family: Verdana, sans-serif;
			animation: opac 1s;
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			 -khtml-user-select: none;
			   -moz-user-select: none;
				-ms-user-select: none;
					user-select: none;
		}
		
		.TitleWeb {
		  padding: 30px 25px;
		  width: 100%;
		  background: <?php echo trim(preg_replace('/\s\s+/', ' ', $config[3])); ?>;
		  text-align: center;
		}
		
		/*Hide for ... large, medium, small*/
		@media (min-width:993px) {
			.hide-large {display: none;}
		}
		
		@media (max-width:992px) and (min-width:691px) {
			.hide-medium {display: none;}
		}
		
		@media (max-width: 690px) {
			.hide-small {display: none;}
			.ChangeFont {font-size:8px;}
		}
	
	</style>
	</head>
	<body>
		<div class="TitleWeb">
			<span style="font-size:18px;color: white !important;font-weight: bold;"><?php echo trim(preg_replace('/\s\s+/', ' ', $config[2])); ?></span>
		</div>
<?php if($_SESSION['username']): ?>
	<style>
		td{
			text-align: center;
			border: none;
		}
		
		table{
			width:100%;
			word-break: break-all;
		}
		
		th{
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: <?php echo trim(preg_replace('/\s\s+/', ' ', $config[3])); ?>;
			color: white;
			font-size:100%;
		}
		
		td, th {
			border: none;
			padding: 8px;
			text-align: center;
		}

		tr:nth-child(even){background-color: #f2f2f2;}

		tr:hover {background-color: #ddd;}

		th {
			border: none;
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			color: white;
			text-align: center;
		}
		</style>
	<center>
		<table class="ChangeFont">
			<tr>
				<th>
					Nom
				</th>
				<th>
					Prenom
				</th>
				<th>
					Email
				</th>
				<th>
					Telephone
				</th>
				<th>
					Adresse
				</th>
				<th>
					ID
				</th>
			</tr>
<?php
	$directory = 'users';
	if ($handle = opendir($directory)) {
		$i = 1;
		while (false !== ($entry = readdir($handle))) {
			if ($entry != "." && $entry != "..") {
				$fileContent = file(getcwd().'/'.$directory.'/'.$entry);
				$verif = trim(preg_replace('/\s\s+/', ' ', $fileContent[6]));
				if ( $verif == 1)
				{
					echo "<tr><td>";
					echo '<!--'.$entry.'-->';
					echo trim(preg_replace('/\s\s+/', ' ', $fileContent[1]))."\n<br>";
					echo "</td><td>";
					echo trim(preg_replace('/\s\s+/', ' ', $fileContent[2]))."\n<br>";
					echo "</td><td>";
					echo trim(preg_replace('/\s\s+/', ' ', $fileContent[3]))."\n<br>";
					echo "</td><td>";
					echo trim(preg_replace('/\s\s+/', ' ', $fileContent[5]))."\n<br>";
					echo "</td><td>";
					echo trim(preg_replace('/\s\s+/', ' ', $fileContent[4]))."\n<br>";
					echo "</td><td>";
					echo $i."\n<br>";
					echo "</td></tr>";
					$i++;
				}
			}
		}
		closedir($handle);
	}
?>
	</center>
<?php else: ?>
	<center>
	<div style="padding:1%" id="contact">
	<form method="post" action="" class="form-signin">
		<h3 class="hide-medium hide-large">Connection</h3>
		<h1 class="hide-small">Connection</h1>
		<table>
			<tr>
			<td>
				<input type="text" id="inputEmail" name="username" placeholder="Username" required autofocus>
			</td>
			</tr>
			<tr>
			<td>
				<input type="password" id="inputPassword" name="password" placeholder="Password" required>
			</td>
			</tr>
			</table>
			<button type="submit">Login</button>
	</form>
	</div>
	</center>
<?php endif; ?>
	</body>
</html>