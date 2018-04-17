<?php /* Smarty version 2.6.26, created on 2013-02-21 22:11:19
         compiled from no_photo_yet.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'no_photo_yet.tpl', 6, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="themes/default/theme.css">
<title>Piwigo, <?php echo Template::mod_translate('Welcome'); ?>
</title>
<?php echo '
<style type="text/css">
body {
margin: 0;
padding: 0;
background-color:#f9f9f9;
}

P {text-align:center;}
TD {color:#888; letter-spacing:1px;}

#global {
position:absolute;
left: 50%;
top: 50%;
width: 700px;
height: 400px;
margin-top: -200px; /* height half */
margin-left: -350px; /* width half */

background-color: #f1f1f1;
border:2px solid #dddddd;
}

#noPhotoWelcome {font-size:25px; color:#555;text-align:center; letter-spacing:1px; margin-top:30px;}
.bigButton {}

.bigButton {text-align:center; margin-top:120px;}

.bigButton a {
    background-color:#666;
    padding:10px;
    text-decoration:none;
    margin:0px 5px 0px 5px;
    -moz-border-radius:6px;
    -webkit-border-radius:6px;
    color:#fff;
    font-size:25px;
    letter-spacing:2px;
    padding:20px;
}

.bigButton a:hover {
    background-color:#ff7700;
    outline:none;
    color:#fff;
    border:none;
}

#deactivate {
    position:absolute;
    bottom:10px;
    text-align:center;
    width:100%;

    font-style:normal;
    font-size:1.0em;
}

.submit {font-size:1.0em; letter-spacing:2px; font-weight:normal;}

#deactivate A {
    text-decoration:none;
    border:none;
    color:#f70;
}

#deactivate A:hover {
  border-bottom:1px dotted #f70;
}

#quickconnect {
    margin:0 auto;
    margin-top:60px;
    width:300px;
    color:#555;
    font-size:14px;
    letter-spacing:1px;
}

#quickconnect input[type="text"], #quickconnect input[type="password"] {
  width:300px;
  color:#555;
  font-size:20px;
  margin-top:3px;
  background-color:#ddd;
  border:2px solid #ccc;
  -moz-border-radius:5px;
  padding:2px;

}

#quickconnect input[type="text"]:focus, #quickconnect input[type="password"]:focus {
  background-color:#fff;
  border:2px solid #ff7700;
}

#quickconnect input[type="submit"] {
  font-size:14px;
  font-weight:bold;
  letter-spacing:2px;
  border:none;
  background-color:#666666;
  color:#fff;
  padding:5px;
  -moz-border-radius:5px;
}

#quickconnect input[type="submit"]:hover {
  background-color:#ff7700;
  color:white;
}
</style>
'; ?>


</head>

<body>
<div id="global">

<?php if ($this->_tpl_vars['step'] == 1): ?>
<p id="noPhotoWelcome"><?php echo Template::mod_translate('Welcome to your Piwigo photo gallery!'); ?>
</p>

<form method="post" action="<?php echo $this->_tpl_vars['U_LOGIN']; ?>
" id="quickconnect">
<?php echo Template::mod_translate('Username'); ?>

<br><input type="text" name="username">
<br>
<br><?php echo Template::mod_translate('Password'); ?>

<br><input type="password" name="password">

<p><input class="submit" type="submit" name="login" value="<?php echo Template::mod_translate('Login'); ?>
"></p>

</form>
<div id="deactivate"><a href="<?php echo $this->_tpl_vars['deactivate_url']; ?>
"><?php echo Template::mod_translate('... or browse your empty gallery'); ?>
</a></div>


<?php else: ?>
<p id="noPhotoWelcome"><?php echo $this->_tpl_vars['intro']; ?>
</p>
<div class="bigButton"><a href="<?php echo $this->_tpl_vars['next_step_url']; ?>
"><?php echo Template::mod_translate('I want to add photos'); ?>
</a></div>
<div id="deactivate"><a href="<?php echo $this->_tpl_vars['deactivate_url']; ?>
"><?php echo Template::mod_translate('... or please deactivate this message, I will find my way by myself'); ?>
</a></div>
<?php endif; ?>


</div>
</body>

</html>
