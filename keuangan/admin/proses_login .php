<?php
session_start();_
if(isset($_POST['Login'])){
if(($_POST['nama']=="") && ($_POST['pass']=="")) { echo "username dan password masih kosong";
session_destroy();

}else{
// user = “stefani” & password = “123”
if(($_POST['nama']=="stevani") and ($_POST['pass']=="123")){
$_SESSION['login']=1;
$_SESSION['username']=$_POST['nama'];

}

if ((isset($_SESSION['login'])) and ($_SESSION['login']==1)){ header("location: submit_formlogin.php");
exit();

}
}
}
?>
<html>
<head>
<title>Session</title>
</head>
<body>
<form name="session" method="POST" action=""> <p>Form Login Dengan Data Session</p>
<p>Username <input type="text" name="nama"/></p> <p>Password <input type="password" name="pass" /></p> <input type="submit" name="Login"value="Login" />
</form>
</body>
</html>