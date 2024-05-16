<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<link rel="stylesheet" href="stylesheetINDEX.css">
<?php 
    if (isset($_GET['auth']))
        $auth = $_GET['auth']; 
    else
        $auth = "";

    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        header("Location: Ctrl.class.php");
        exit;
    }
?>
</head>
<body>
<div class="login-container">
<a href="landingpage.php" title="Acceuil" class="top-left">
        <img src="https://t4.ftcdn.net/jpg/02/28/39/39/360_F_228393904_3VrvglFHWZMwJQoK7WbQeQKjM0k6UHpN.jpg" alt="Acceuil" width="55" height="55">
    </a>
    <h2>Login</h2>
    <form action="Ctrl.class.php?action=verif" method="POST">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <p style="font-size: 12px; color: red;"><?php if ($auth == 'false') { echo "*Nom d'utilisateur ou mot de passe incorrect"; } ?></p>
        <a href="Ctrl.class.php"><button type="submit">Login</button></a>
    </form>
</div>
</body>
</html>