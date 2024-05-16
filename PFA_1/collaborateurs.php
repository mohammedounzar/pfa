<!DOCTYPE html>
<html>
<head>
    <title>Liste des collaborateurs</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Style for the account link */
        .account-link {
            position: absolute;
            top: 10px;
            right: 10px;
            text-decoration: none;
            color: blue;
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
    </style>
</head>
<body>
    <h2>Liste des collaborateurs</h2>
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
        </tr>
        <?php

           foreach($collab as $row) {
                echo "<tr>";
                echo "<td>" . $row['Login_col'] . "</td>";
                echo "<td>" . $row['Nom_col'] . "</td>";
                echo "<td>" . $row['Prenom_col'] . "</td>";
                echo "<td>" . $row['Email_col'] . "</td>";
                echo "</tr>";
            }

        ?>
    </table><br>
    <a class="logout-link" href="Ctrl.class.php?action=logout" title="Logout">
        <img src="https://us.123rf.com/450wm/rehabicons/rehabicons1603/rehabicons160300755/53379730-ic%C3%B4ne-d%C3%A9connexion.jpg" alt="Déconnexion" width="40" height="40">
    </a>
    <?php
    $login_cf = $_GET['login_cf'];
    echo "<a href='Ctrl.class.php?action=allProjectsCF&login_cf=".$_GET['login_cf']."' title='Revenir aux projets'>"; 
    ?>
    <img src="https://cdn2.iconfinder.com/data/icons/simple-circular-icons-line/84/Left_Arrow_-512.png" alt="Revenir aux projets" width="40" height="40">
        </a>
</body>
</html>
