<?php
require_once "../quickprotect.class.php";
$quickprotect = new quickprotect('../login.ini.php');

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
    <head><title>Quick PHP Password Protection</title><link href="../style.css" rel="stylesheet" type="text/css" media="all"/></head>
    <body>
        <center>
            <h1>Quick PHP Password Protection</h1>
            <span class="messages"><?php echo $quickprotect->echoMsg(); ?></span>
            <div class="content">
                <form action="login.php" method="POST">
                    <p>Username: <input type="username" name="username" value="" /></p>
                    <p>Password: <input type="password" name="password" value="" /></p>
                    <input type="submit" value="Login" name="submit" />
                </form>
            </div>
        </center>
    </body>
</html>