<?php
//put sha1() encrypted password here - example is 'hello'
$password = 'a812ce795d364414bdede8f17e50cd33a7190f8c';

session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

if (isset($_POST['password'])) {
    if (sha1($_POST['password']) == $password) {
        $_SESSION['loggedIn'] = true;
    } else {
        die ('Incorrect password');
    }
}

if (!$_SESSION['loggedIn']): ?>

<html><head><title>Login</title>
<style>
#loginbox {
margin-left:auto;
margin-right:auto;
width: 742px;
height: 730px;
background-image: url('invitebg.png');
background-repeat: no-repeat;
}
#form1 {
margin-left:auto;
margin-right:auto;
font-size: 11px;
font-weight: bold;
float: left;
color: #c2bdb1;
font-family: verdana;
position: relative;
top: 420px;
left: 280px;
}
body {
margin: 0px;
}
</style></head>
  <body>
  <div id="loginbox">
    <form id="form1" method="post">
      <input type="password" name="password">
      <input type="submit" name="submit" value="Login">
    </form>
	</div>
  </body>
</html>

<?php
exit();
endif;
?>