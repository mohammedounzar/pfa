<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'enregistrer</title>
</head>
<body>
<a href="landingpage.php" title="Acceuil" class="top-left">
        <img src="https://t4.ftcdn.net/jpg/02/28/39/39/360_F_228393904_3VrvglFHWZMwJQoK7WbQeQKjM0k6UHpN.jpg" alt="Acceuil" width="40" height="40">
    </a>
    <table border="1" align="center">
    <form method='post' action='Ctrl.class.php?action=addUser'>
        <tr>
            <td><label for="login">Login:</label></td>
            <td><input type="text" id="login" name="login"></td>
        </tr>
        <tr>
            <td><label for="nom">Nom:</label></td>
            <td><textarea id="nom" name="nom"></textarea></td>
        </tr>
        <tr>
            <td><label for="prenom">Prenom:</label></td>
            <td><textarea id="prenom" name="prenom"></textarea></td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><textarea id="email" name="email"></textarea></td>
        </tr>
        <tr>
            <td><label for="mdp">Mot de passe:</label></td>
            <td><textarea id="mdp" name="mdp"></textarea></td>
        </tr>
        <tr>
            <td><input type="radio" id="cf" name="type_user" value="cf">
            <label for="cf">Chef de projet</label><br>
            <input type="radio" id="col" name="type_user" value="col">
            <label for="col">Collaborateur</label><br><br></td>
        </tr>
        <tr>
        <td><input type="submit" value="Ajouter"></td>
        </tr>
    </form>
</table>
</body>
</html>