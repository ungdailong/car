<?php if(!defined('DIR_APP')) die('Your have not permission'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<?php echo BASE_NAME; ?>admincp/" />
<title>TMVCMS Admin - Login</title>
<style type="text/css">
body, form , p {margin:0; padding:0;}
body {font:10pt "Lucida Sans Unicode", "Lucida Grande", sans-serif; background:#383838; text-align:center}
div#logo p{display:none;}
div#logo {background:url(images/logo.png) no-repeat; width:256px; height:57px; margin:0 auto 55px auto;}
div#logo h1 {font-size:18pt;}
div#logo h1  a {display:block; height:57px; width:300px}
div#logo h1 span {display:none;}

h1, h2 {margin:0; padding:0;}

#container {width:980px; background:url(images/bg_login.jpg) no-repeat top center; margin:0 auto; padding-top:19px; height:355px}

label.smallInput { background:url(images/bg_s_input.gif) no-repeat; width:168px;}
label.smallInput, label.mediumInput, label.largeInput {padding:4px 6px 0px 6px; height:23px; display:block; margin:5px 0 0 0;}
label.smallInput input, label.mediumInput input, label.largeInput input {background:none; border:none;  font-size:0.9em; color:#666;}

#myform {background:url(images/bg_loginBox.jpg) no-repeat; width:421px; height:160px; margin:0 auto 0 auto; padding:10px}
#myform h2 {color:#fff; display:block; width:180px; float:left; font-size:14pt}
p#forgotPass {float:right; margin-right:15px; margin-top:3px}
p#forgotPass a {color:#100d00;}
p#forgotPass a:hover {text-decoration:none;}
div#loginContainer {clear:both; width:100%; padding-top:25px; color:#666; padding-left:7px}

p#user, p#pass, p#remember, p#submit {float:left; margin-right:30px; margin-bottom:20px;}
</style>
</head>
<body>
<div id="container">
  <div id="logo">
    <h1><a href="#"><span>TMVCMS Admin</span></a></h1>
    <p>TMVCMS CMS Admin</p>
  </div>
  
  <form method="post" id="myform" action="<?php echo $mod->url('index.php?p=user&q=login'); ?>" onSubmit="return loginSubmit();">
    <h2>Login</h2>
   
    <div id="loginContainer">
      <p id="user"> <?php echo LANG_USER_USENAME; ?>:<br />
        <label class="smallInput">
         <input type="text" name="username" id="username" value=""  size="28" />
        </label>
       
                        
      </p>
      <p id="pass"> <?php echo LANG_USER_PASSWORD; ?>:      <br />
        <label class="smallInput">          
          <input type="password" name="password" id="password" value="" size="28" />
        </label>
      </p>
     
      <p id="submit">
        <label>
         	<input type="submit" name="submited" style="visibility:hidden" />
          <a onClick="return loginSubmit();" href="javascript:;" class="button"> <input type="image" name="imageField" id="imageField" src="images/bt_submit.gif" /></a>
          
        </label>
      </p>
    </div>
  </form>
  <h2>&nbsp;</h2>
</div>
<p>&nbsp;</p>
</body>
</html>
