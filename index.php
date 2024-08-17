<?php
@session_start();

include('includes/config.php');
$db = new SQLite3('./api/.db.db');
$db->exec("CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY,username TEXT ,password TEXT)");

$log_check = $db->query("SELECT * FROM users WHERE id='1'");
$roe = $log_check->fetchArray();
$loggedinuser = @$roe['username'];

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	header("location:"."dns.php");
}

$rows = $db->query("SELECT COUNT(*) as count FROM users");
$row = $rows->fetchArray();
$numRows = $row['count'];
if ($numRows == 0){
	$db->exec("INSERT INTO users(id ,username, password) VALUES('1' ,'admin', 'admin')");
	$db->close();
	}

if (isset($_POST["login"])){
	if(!$db){
		echo $db->lastErrorMsg();
	} else {
	}
	$sql ='SELECT * from users where username="'.$_POST["username"].'";';
	$ret = $db->query($sql);
	while($row = $ret->fetchArray() ){
		$id=$row['id'];
		$username=$row['username'];
		$password=$row['password'];
	}
	if ($id!=""){
		if ($password==$_POST["password"]){
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			if ($_POST['username'] == 'admin'){
				header('Location: user.php');
			}else{
				header('Location: dns.php');
			}
		}else{
		header('Location: ./api/index.php');
		}
		}else{
		header('Location: ./api/index.php');
		}
	$db->close();
	}

echo "<style>\n";
echo "html,\n";
echo "body {\n";
echo "	height: 100%;\n";
echo "	background:url(./img/bg.jpg);background-repeat:no-repeat;background-attachment:fixed;background-size:cover;\n";
echo "}\n";
echo "</style>\n";
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "<head>\n";
echo "	<meta charset=\"utf-8\">\n";
echo "	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n";
echo "	<meta name=\"author\" content=\"FTG\">\n";
echo "    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\">\n";
echo "	  <title>XCIPTV Control Panel</title>\n";
echo "</head>\n";
echo "<br><br>\n";
echo "		  <div class=\"container\">\n";
echo "			  <div class=\"row\">\n";
echo "				  <div class=\"col-lg-4 mx-md-auto\">\n";
echo "					  <div class=\"text-center\">\n";
echo "						  <img class=\"w-75 p-3\" src=\"./img/logo.png\" alt=\"\">\n";
echo "					  </div>\n";
echo "					  <br>\n";
echo "					  <form method=\"post\">\n";
echo "						  <div class=\"form-group\">\n";
echo "							  <input type=\"text\" class=\"form-control form-control-lg\"\n";
echo "									 placeholder=\"Username\" name=\"username\" required autofocus>\n";
echo "						  </div>\n";
echo "						  <div class=\"form-group\">\n";
echo "							  <input type=\"text\" class=\"form-control form-control-lg\"\n";
echo "									 placeholder=\"Password\" name=\"password\" required>\n";
echo "						  </div>\n";
if(isset($captchaMessage)) {
    echo '<b>Captcha Message: </b>' . $captchaMessage;
}
echo "	<center><div class=\"captcha-holder\"></div></center><br>\n";
echo "						  <input type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" value=\"Log In\" name=\"login\">\n";
echo "					  </form>\n";
echo "				  </div>\n";
echo "			  </div>\n";
echo "		  </div>\n";
echo "<br><br>\n";
echo "\n";
echo "<script src=\"https://code.jquery.com/jquery-3.3.1.js\"></script>\n";
echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js\" integrity=\"sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49\" crossorigin=\"anonymous\"></script>\n";
echo "<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js\" integrity=\"sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy\" crossorigin=\"anonymous\"></script>\n";
echo "<script src=\"./includes/captcha/assets/js/icon-captcha.min.js\" type=\"text/javascript\"></script>\n";
echo "<script type=\"text/javascript\">\n";
echo "        $('.captcha-holder').iconCaptcha({\n";
echo "            fontFamily: '',\n";
echo "            clickDelay: 500,\n";
echo "            invalidResetDelay: 3000,\n";
echo "            requestIconsDelay: 1000,\n";
echo "            loadingAnimationDelay: 1000,\n";
echo "            hoverDetection: true,\n";
echo "            showCredits: 'show',\n";
echo "            enableLoadingAnimation: true,\n";
echo "            validationPath: \"./includes/captcha/src/captcha-request.php\",\n";
echo "            messages: {\n";
echo "                header: \"Select the image that does not belong in the row\",\n";
echo "                correct: {\n";
echo "                    top: \"Great!\",\n";
echo "                    bottom: \"You do not appear to be a robot.\"\n";
echo "                },\n";
echo "                incorrect: {\n";
echo "                    top: \"Oops!\",\n";
echo "                    bottom: \"You\'ve selected the wrong image.\"\n";
echo "                }\n";
echo "            }\n";
echo "        })\n";
echo "</script>\n";

