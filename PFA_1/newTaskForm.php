<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tâche</title>
</head>
<body>
    <table border="1" align="center">
    <?php
    $id_projet = $_GET['id_projet'];
    $login_cf = $_GET['login_cf'];
    echo "<form method='post' action='Ctrl.class.php?action=ajouterTache&id_projet=".$_GET['id_projet']."&login_cf=".$_GET['login_cf']."'>";
    ?>
        <tr>
            <td><label for="ttache">Titre de la tâche:</label></td>
            <td><input type="text" id="ttache" name="ttache"></td>
        </tr>
        <tr>
            <td><label for="desct">Description de la tâche:</label></td>
            <td><textarea id="desct" name="desct"></textarea></td>
        </tr>
        <tr>
            <td><label for="dl">Date limite:</label></td>
            <td><input type="datetime-local" id="dl" name="dl"></td>
        </tr>
        <tr>
            <td><label for="col">Collaborateur:</label></td>
            <td><input type="text" id="col" name="col"></td>
        </tr>
        <tr>
        <td><input type="submit" value="Ajouter"></td>
        </tr>
    </form>
</table>
<a class="logout-link" href="Ctrl.class.php?action=logout" title="Logout">
        <img src="https://us.123rf.com/450wm/rehabicons/rehabicons1603/rehabicons160300755/53379730-ic%C3%B4ne-d%C3%A9connexion.jpg" alt="Déconnexion" width="40" height="40">
    </a>
</body>
</html>