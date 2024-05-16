<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour</title>
</head>
<body>
    <table border="1" align="center">
    <form method="post" action="Ctrl.class.php?action=updateTask&id_tache=<?php echo $_GET['id_tache'];?>&id_projet=<?php echo $_GET['id_projet'];?>&login_cf=<?php echo $_GET['login_cf'];?>">
        <tr>
            <td><label for="nom">Titre de la tache:</label></td>
            <td><input type="text" id="ttache" name="ttache" value="<?php echo $_GET['ttache'];?>"></td>
        </tr>
        <tr>
            <td><label for="desct">Description de la tâche:</label></td>
            <td><textarea id="desct" name="desct"><?php echo isset($_GET['desct']) ? htmlspecialchars($_GET['desct']) : ''; ?></textarea></td>
        </tr>
        <tr>
            <td><label for="dl">Date limite:</label></td>
            <td><input type="datetime-local" id="dl" name="dl" value="<?php echo $_GET['dl'];?>"></td>
        </tr>
        <tr>
            <td><label for="col">Collaborateur:</label></td>
            <td><input type="text" id="col" name="col" value="<?php echo $_GET['login_cl'];?>"></td>
        </tr>
        <tr>
        <td><input type="submit" value="Submit"></td>
        </tr>
    </form>
</table>
</body>
</html>