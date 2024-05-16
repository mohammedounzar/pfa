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
        echo "<td>" . $nbCF . "</td>";
        echo "<td>" .$nbtCF. "</td>";
        echo "</tr>";
        ?>
    </table>
    <h2>Liste des tâches</h2>
    <table border="1">
        <tr>
            <th>Tâche</th>
            <th>Description</th>
            <th>Date limite</th>
            <th>Collaborateur</th>
            <th>État</th>
            <th>Supprimer</th>
            <th>Mettre à jour</th>
        </tr>
        <?php
        $login_cf = $_GET['login_cf'];
        $id_projet = $_GET['id_projet'];
           foreach($taches as $row) {
                echo "<tr>";
                echo "<td>" . $row['Titre_tache'] . "</td>";
                echo "<td>" . $row['Description_tache'] . "</td>";
                echo "<td>" . $row['Deadline_tache'] . "</td>";
                $login_cl = $row['Login_col'];
                $t = 1;
                echo "<td><a href='Ctrl.class.php?action=afficherMessage&login_cf=".$_GET['login_cf']."&login_cl=".$row['Login_col']."&id_projet=".$_GET['id_projet']."&t=1' title='Contacter'>" . $row['Login_col'] . "</a></td>";
                echo "<td>";
                if($row['is_done'] == 0){
                    echo "Tâche non terminée";
                }
                else echo "Tâche terminée";
                echo "</td>";
                echo "<td><a title='supprimer' href='Ctrl.class.php?action=deleteTask&id_tache=".$row['Id_tache']."&id_projet=".$_GET['id_projet']."&login_cf=".$_GET['login_cf']."'><img src='data:image/jpeg;base64,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' alt='Supprimer' width='25' height='25'></a></td>";
                echo "<td><a title='Mettre à jour' href='FormUpdateTask.php?ttache=".$row['Titre_tache']."&desct=".$row['Description_tache']."&dl=".$row['Deadline_tache']."&login_cl=".$row['Login_col']."&id_tache=".$row['Id_tache']."&id_projet=".$_GET['id_projet']."&login_cf=".$_GET['login_cf']."'><img src='https://www.svgrepo.com/show/73131/edit-button.svg' alt='edit sign' width='25' height='25'></a></td>";
                echo "</tr>";
            }
        ?>
    </table><br>
    <div>
        <h3>Les tâches en retard:</h3>
        <?php
        foreach($terCF as $row){
            echo "<h4>" .$row['Titre_tache']."</h4>";
        }
        ?>
    </div>
    <a class="logout-link" href="Ctrl.class.php?action=logout" title="Logout">
    <img src="https://us.123rf.com/450wm/rehabicons/rehabicons1603/rehabicons160300755/53379730-ic%C3%B4ne-d%C3%A9connexion.jpg" alt="Déconnexion" width="40" height="40">
    </a>
    <?php
    $id_projet = $_GET['id_projet'];
    $login_cf = $_GET['login_cf'];
    echo "<a href='newTaskForm.php?id_projet=".$_GET['id_projet']."&login_cf=".$_GET['login_cf']."' title='Ajouter un projet'>";
    ?>
        <img src="https://t4.ftcdn.net/jpg/01/26/10/59/360_F_126105961_6vHCTRX2cPOnQTBvx9OSAwRUapYTEmYA.jpg" alt="Ajouter une tâche" width="40" height="40">
    </a>
    <?php
    $login_cf = $_GET['login_cf'];
    echo "<a href='Ctrl.class.php?action=allProjectsCF&login_cf=".$_GET['login_cf']."' title='Revenir aux projets'>"; 
    ?>
    <img src="https://cdn2.iconfinder.com/data/icons/simple-circular-icons-line/84/Left_Arrow_-512.png" alt="Revenir aux projets" width="40" height="40">
        </a>
</body>
</html>