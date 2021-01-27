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

//Variables Post
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$adresse = $_POST["adresse"];
$email = $_POST["email"];
$tel = $_POST["tel"];

//Test Referer Security
$urlRefererReqestNonParse = $_SERVER['HTTP_REFERER'];
$urlSecurity = $_SERVER['SERVER_NAME'];
$urlRefererReqest = (parse_url($urlRefererReqestNonParse)["host"]);

//$s String Aleatoire de 32 octect
for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 32; $x = rand(0,$z), $s .= $a{$x}, $i++);

// [TODO] -> A ajouter plus tard
//Code by Paulemfad
//$key = md5(microtime(TRUE) * 100000);

//IF Test Referer Security
if( ($urlSecurity == $urlRefererReqest) and !empty($_POST["nom"]) and empty($_GET["id"]) )
{
	
	//Compteur pour ID
	$compteur_f = fopen('compteur.txt', 'r+');
	$compte = fgets($compteur_f);
	$compte++;
	fseek($compteur_f, 0);
	fputs($compteur_f, $compte);
	fclose($compteur_f);
	
	//Log Admin
	$handle = fopen('users/'.$compte.'.txt', "a");
	fwrite($handle, $s."\n");
	fwrite($handle, $nom."\n");
	fwrite($handle, $prenom."\n");
	fwrite($handle, $email."\n");
	fwrite($handle, $adresse."\n");
	fwrite($handle, $tel."\n");
	fclose($handle);
	
	//Change Page
	$PostValue = 1;
	
	//Send Mail
	$to = $email ;
	$from  = "no-reply@xxx.xxx";
	ini_set("SMTP", "xxx.xxx.xxx");
	$JOUR  = date("Y-m-d");
	$HEURE = date("H:i");
	$Subject = "Validation de service";
	$mail_Data = "";
	$mail_Data .= "<html>";
	$mail_Data .= "<head>";
	$mail_Data .= "<title> $Subject </title>";
	$mail_Data .= "</head>";
	$mail_Data .= "<body>";
	$mail_Data .= "Bonjour $prenom,<br>";
	$mail_Data .= "Pour terminer la validation clique sur le lien : ";
	$mail_Data .= '<a href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?id='.$compte.'&pass='.$s.'">http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?id='.$compte.'&pass='.$s.'</a>';
	$mail_Data .= "</body>";
	$mail_Data .= "</html>";
	$headers  = "MIME-Version: 1.0 \n";
	$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
	$headers .= "From: $from  \n";
	$headers .= "Disposition-Notification-To: $from  \n";
	$headers .= "X-Priority: 1  \n";
	$headers .= "X-MSMail-Priority: High \n";
	$CR_Mail = TRUE;
	$CR_Mail = @mail ($to, $Subject, $mail_Data, $headers);
	if ($CR_Mail === FALSE)
	{
		echo " ### CR_Mail=$CR_Mail - Erreur envoi mail <br> \n";
	}
	else
	{
		//echo " *** CR_Mail=$CR_Mail - Mail envoyé<br> \n";
	}
	
} elseif ( !empty($_GET["id"]) and !empty($_GET["pass"]) ) {
	
	//Variables GET
	$pass = $_GET["pass"];
	$id = $_GET["id"];
	
	//Get Password
	$fileTarget = file(getcwd().'/users/'.$id.'.txt');
	$password = trim(preg_replace('/\s\s+/', ' ', $fileTarget[0]));
	$verifOct = trim(preg_replace('/\s\s+/', ' ', $fileTarget[6]));
	if ( $password == $pass )
	{
		if ( empty($verifOct) )
		{
			//Add 1 in last line to verifie
			$handle = fopen('users/'.$id.'.txt', "a");
			fwrite($handle, "1\n");
			fclose($handle);

			//Change Page
			$PostValue = 2;
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo trim(preg_replace('/\s\s+/', ' ', $config[0])); ?></title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
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
			font-family: "Raleway",Arial,sans-serif;
			color: #3a3a3a;
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
		  background: <?php echo trim(preg_replace('/\s\s+/', ' ', $config[1])); ?>;
		  text-align: center;
		  font-family: Verdana, sans-serif;
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
		}
		
		h3{	
			font-weight: 400;
			margin: 10px 0;
		}
		</style>
	</head>
	<body>
		<div class="TitleWeb">
			<span style="font-size:18px;color: white !important;font-weight: bold;"><?php echo trim(preg_replace('/\s\s+/', ' ', $config[0])); ?></span>
		</div>
<?php if($PostValue == 1): ?>
	<br><br><br>
	<center>
		Un Mail vous a été envoyé.
		Veuillez cliquer sur le lien pour terminer l'incription.
	</center>
<?php elseif($PostValue == 2): ?>
	<br><br><br>
	<center>
		Validation terminer
	</center>
<?php else: ?>
		<center>
		<div style="padding:1%" id="contact">
		<form method="post" action="" class="form-signin">
			<h3 class="hide-medium hide-large">Enregistrement</h3>
			<h1 class="hide-small">Enregistrement</h1>
			<table>
				<tr>
				<td>
					<input type="text" name="nom" placeholder="Nom" required autofocus>
				</td>
				</tr>
				<tr>
				<td>
					<input type="text" name="prenom" placeholder="Prenom" required>
				</td>
				</tr>
				<tr>
				<td>
					<input type="email" name="email" placeholder="Email@mail.com" required>
				</td>
				</tr>
				<tr>
				<td>
					<input type="text" name="adresse" placeholder="Adresse" required>
				</td>
				</tr>
				<tr>
				<td>
					<input type="tel" name="tel" placeholder="Telephone" required>
				</td>
				</tr>
				</table>
				<button type="submit">Envoyer</button>
		</form>
		</div>
		</center>
<?php endif; ?>
	</body>
</html>