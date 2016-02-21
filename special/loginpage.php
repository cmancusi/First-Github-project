<?php
require_once "../quickprotect.class.php";
$quickprotect = new quickprotect('login.ini.php');

if (isset($_SESSION['goAfterLogin'])){
    $goto = $_SESSION['goAfterLogin'];
    unset($_SESSION['goAfterLogin']);
}
else $goto = $quickprotect->settings['DEFAULT_LOGIN_SUCCESS_PAGE'];

if (isset($_POST[username])) {
    if($quickprotect->login($_POST[username], $_POST[password])) header ("Location: $goto");
}

if (isset($_GET['changepassword'])){
    $quickprotect->setNewPassword($_POST[username], $_POST[oldpassword], $_POST[newpassword]);
}

if ($_GET['do']=="logout") {
    $quickprotect->logout();
}
?>
<html>
<head>
<title>ACS-extraInsights!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
p, h1 {
	font-family: Arial, Helvetica, sans-serif;
	line-height: 1.5em;
	font-weight: normal;
	
}
p {font-size: 14px;}
h1 {font-size: 18px;
font-weight:bold;}

</style>
<script type="text/javascript" src="../jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="../script.js"></script>

</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table id="Table_01" width="900" border="0" cellpadding="0" cellspacing="0">

<tr>
		<td><a href="../index.html"><img src="archiveheader.gif" alt="ACS Extra!Extra!  ACS-extra!insights INSTANT ENROLLMENT" width="900" height="242" border="0"></a></td>
	</tr>
	<tr>
		<td valign="top"><table width="890" border="0" cellspacing="0" >
		  <tr>
		    <td style="padding: 5px 20px 20px 30px;">
		       <center>
            <h1>&nbsp;</h1>
            <h1>Please Sign In</h1>
            <span class="messages"><?php echo $quickprotect->echoMsg(); ?></span>
            <div class="content">
                <form action="login.php" method="POST">
                    <p>Username: <input type="username" name="username" value="" /></p>
                    <p>Password: <input type="password" name="password" value="" /></p>
                    <p>
                      <input type="submit" value="Login" name="submit" />
                    </p>
                    <p>&nbsp;</p>
                </form>
            </div>
        </center></td>
	      </tr>
      </table></td>
	</tr>
	<tr>
		<td>
			<img src="../images/bar.jpg" width="900" height="24" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->

<map name="Map">
  <area shape="rect" coords="53,231,294,267" href="../toc.html" alt="View Table of Contents">
</map>
</body>
</html>