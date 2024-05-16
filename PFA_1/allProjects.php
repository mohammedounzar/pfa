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
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
        }

        .container {
            display: flex;
        }

        .table-container {
            flex-grow: 1;
            margin: 20px;
            padding-left: 80px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        form {
            margin: 0;
        }

        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Style for the vertical toolbar */
        .vertical-toolbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 60px;
            background-color: #333;
            padding-top: 20px;
            text-align: center;
            color: #fff;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .vertical-toolbar a {
            margin-bottom: 20px;
        }

        .vertical-toolbar img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        /* Adjusting the position of the logout link */
        .logout-link {
            align-self: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="vertical-toolbar">
            <a class="account-link" href="Ctrl.class.php?login_cl=<?php echo $_GET['login_cl']; ?>&action=getInfo" title="Compte">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/005/545/335/small/user-sign-icon-person-symbol-human-avatar-isolated-on-white-backogrund-vector.jpg" alt="Compte">
            </a>
            <a class="logout-link" href="Ctrl.class.php?action=logout" title="Déconnexion">
                <img src="https://us.123rf.com/450wm/rehabicons/rehabicons1603/rehabicons160300755/53379730-ic%C3%B4ne-d%C3%A9connexion.jpg" alt="Déconnexion">
            </a>
        </div>
        <div class="table-container">
            <h2>Liste de tes projets</h2>
            <table border="1">
                <?php
                $login_cl = $login;
                foreach($projects as $row) {
                    $id_projet = $row['Id_projet'];
                    $login_cf = $row['Login_cf'];
                    echo "<tr>";
                    echo "<td><a title='Un de tes projets' href='Ctrl.class.php?action=allTasks&login_cl=" . $login . "&id_projet=".$row['Id_projet']."&login_cf=".$login_cf."'>" . $row['Titre_projet'] . "</a></td>";
                    echo "<td>".$row['Login_cf']."</td>";
                    echo "</tr>";
                }
                ?>
            </table><br>
        </div>
    </div>
</body>
</html>


