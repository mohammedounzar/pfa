<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: indexAuth.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations personnelles</title>
</head>
<body>
    <table border="1" align="center">
    <?php
    $login_cl = $login_col;
    echo "<form method='post' action='Ctrl.class.php?action=updateCollab&login_cl=".$login_col."'>";
        ?>
    <?php
        echo "<tr>";
            echo "<td><label for='nom'>Nom:</label></td>";
            foreach($info as $row){
            echo "<td><input type='text' id='nom' name='nom' value='".$row['Nom_col']."'></td>";
            }
            echo "</tr>";
        echo "<tr>";
        echo "<td><label for='prenom'>Prenom:</label></td>";
        foreach($info as $row){
            echo "<td><input type='text' id='prenom' name='prenom' value='".$row['Prenom_col']."'></td>";
            }
            echo "</tr>";
        echo "<tr>";
        echo "<td><label for='email'>Email:</label></td>";
        foreach($info as $row){
            echo "<td><input type='text' id='email' name='email' value='".$row['Email_col']."'></td>";
            }
            echo "</tr>";
        echo "<tr>";
        echo "<td><label for='mdp'>Mot de passe:</label></td>";
        foreach($info as $row){
            echo "<td><input type='password' id='mdp' name='mdp' value='".$row['Mot_de_passe_col']."'></td>";
            }
        echo "</tr>";
        echo "<tr>";
        echo "<td><input type='submit' value='Mettre à jour'></td>";
        echo "</tr>";
        ?>
    </form>
</table>
</body>
</html>