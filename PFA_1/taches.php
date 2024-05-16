<!DOCTYPE html>
<html>
<head>
    <title>Liste de tes tâches</title>
    <link rel="stylesheet" href="stylesheetAll.css">
</head>
<body>
    <table border=1>
        <tr>
            <th>Nombre de tâches</th>
            <th>Nombre des tâches terminées</th>
        </tr>
        <?php
        echo "<tr>";
        echo "<td>" . $nb . "</td>";
        echo "<td>" .$nbt. "</td>";
        echo "</tr>";
        ?>
    </table>
    <h2>Liste de tes tâches</h2>
    <table border="1">
        <tr>
            <th>Tâche</th>
            <th>Description</th>
            <th>Date limite</th>
            <th>Action</th>
        </tr>
        <?php
        $login_cl = $_GET['login_cl'];
        $login_cf = $_GET['login_cf'];
        $id_projet = $_GET['id_projet'];
           foreach($taches as $row) {
                echo "<tr>";
                echo "<td>" . $row['Titre_tache'] . "</td>";
                echo "<td>" . $row['Description_tache'] . "</td>";
                echo "<td>" . $row['Deadline_tache'] . "</td>";
                $id_tache = $row["Id_tache"];
                echo "<td>";
                echo "<form id='updateForm?id_tache=".$row['Id_tache']."' method='POST' action='Ctrl.class.php?action=updateIsdone&login_cl=" . $_GET['login_cl'] . "&login_cf=".$_GET['login_cf']."&id_projet=".$_GET['id_projet']."&id_tache=".$row['Id_tache']."'>";
                echo "<button><input id='submitButton' type='submit' value='Marquer comme terminé'></button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table><br>
    <div>
        <h3>Les tâches en retard:</h3>
        <?php
        foreach($ter as $row){
            echo "<h4>" .$row['Titre_tache']."</h4>";
        }
        ?>
    </div>
    <a class="logout-link" href="Ctrl.class.php?action=logout" title="Logout">
    <img src="https://us.123rf.com/450wm/rehabicons/rehabicons1603/rehabicons160300755/53379730-ic%C3%B4ne-d%C3%A9connexion.jpg" alt="Déconnexion" width="40" height="40">
</a>
<?php
$login_cl = $_GET['login_cl'];
$login_cf = $_GET['login_cf'];
$id_projet = $_GET['id_projet'];
$t = 0;
    echo "<a href='Ctrl.class.php?action=afficherMessage&login_cl=" . $_GET['login_cl'] . "&login_cf=".$_GET['login_cf']."&id_projet=".$_GET['id_projet']."&t=0' title='Messagerie'>";
       echo   "<img src='https://static.vecteezy.com/system/resources/thumbnails/006/692/724/small_2x/chatting-message-icon-template-black-color-editable-chatting-message-icon-symbol-flat-illustration-for-graphic-and-web-design-free-vector.jpg' alt='Messagerie' width='40' height='40'>";
    echo "</a>";
?>
</body>
</html>


