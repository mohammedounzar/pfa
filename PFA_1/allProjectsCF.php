<!DOCTYPE html>
<html>
<head>
    <title>Liste de tes projets</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            position: relative; /* Added for positioning the logout link */
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Style for the account link */
        .account-link {
            position: absolute;
            top: 20px;
            right: 20px;
            text-decoration: none;
            color: #333;
        }

        .account-link:hover {
            text-decoration: underline;
        }

        /* Style for the account and logout links */
        .account-link img,
        .logout-link img {
            vertical-align: middle;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Adjusting the size of the logout icon */
        .logout-link img {
            width: 30px;
            height: 30px;
        }

        /* Style for the "Ajouter un projet" link */
        .add-project-link {
            display: block;
            text-align: center;
            margin: 20px auto;
            text-decoration: none;
            color: #333;
        }

        .add-project-link img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .add-project-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Liste de tes projets</h2>
    <table>
        <?php
        $login_cf = $login;
        foreach($projectsCF as $row) {
            $id_projet = $row['Id_projet'];
            echo "<tr>";
            echo "<td><a title='Un de tes projets' href='Ctrl.class.php?action=allTasksCF&id_projet=".$row['Id_projet']."&login_cf=".$login."'>" . $row['Titre_projet'] . "</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    $login_cf = $login;
    echo "<a class='add-project-link' href='newProjectForm.php?login_cf=".$login."' title='Ajouter un projet'>";
    ?>
        <img src="https://t4.ftcdn.net/jpg/01/26/10/59/360_F_126105961_6vHCTRX2cPOnQTBvx9OSAwRUapYTEmYA.jpg" alt="Ajouter un projet">
        Ajouter un projet
    </a>
    <a class="logout-link account-link" href="Ctrl.class.php?action=logout" title="Déconnexion">
        <img src="https://us.123rf.com/450wm/rehabicons/rehabicons1603/rehabicons160300755/53379730-ic%C3%B4ne-d%C3%A9connexion.jpg" alt="Déconnexion">
    </a>
    <?php
    $login_cf = $login;
    echo "<a title='Voir les collaborateurs' href='Ctrl.class.php?action=allCollab&login_cf=".$login."'>";
    ?>
        <img src="https://static.vecteezy.com/system/resources/previews/019/989/678/original/employee-icon-sign-symbol-graphic-illustration-vector.jpg" alt="Voir les collaborateurs" width="40" height="40">
    </a>
</body>
</html>


