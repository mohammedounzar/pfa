<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .chat-box {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        max-width: 90%;
        overflow: hidden;
    }

    .messages {
        padding: 20px;
        overflow-y: auto;
        max-height: 300px;
    }

    .message {
        margin-bottom: 10px;
        padding: 8px 12px;
        border-radius: 6px;
        background-color: #f0f0f0;
    }

    .message.me {
        background-color: #dcf8c6;
        align-self: flex-end;
    }

    .message-text {
        word-wrap: break-word;
    }

    .message-time {
        font-size: 12px;
        color: #888;
        margin-top: 5px;
    }

    .input-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        background-color: #f9f9f9;
        border-top: 1px solid #ccc;
    }

    .input-box textarea {
        flex: 1;
        resize: none;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 10px;
    }

    .input-box button {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        background-color: #4caf50;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .input-box button:hover {
        background-color: #45a049;
    }

    .logout-link {
        position: fixed;
        top: 20px;
        right: 20px;
    }

    .logout-link img {
        width: 40px;
        height: 40px;
    }

    </style>
</head>
<body>
    <div class="container">
        <div class="chat-box">
            <div class="messages">
                <?php
                foreach($message as $row) {
                    echo "<div class='message'>";
                    echo "<strong>" . $row['Login_env'] . ":</strong> " . $row['Message'];
                    echo "<div class='message-time'>" . $row['Date_d_envoi'] . "</div>"; 
                    echo "</div>";
                }
                ?>
            </div>
            <div class="input-box">
                <?php
                $login_cl = $_GET['login_cl'];
                $login_cf = $_GET['login_cf'];
                $id_projet = $_GET['id_projet'];
                if ($t == 0){
                echo "<form method='POST' action='Ctrl.class.php?action=ajouterMessage&login_cl=".$_GET['login_cl']."&login_cf=".$_GET['login_cf']."&id_projet=".$_GET['id_projet']."&t=0'>";
                }
                else echo "<form method='POST' action='Ctrl.class.php?action=ajouterMessage&login_cl=".$_GET['login_cl']."&login_cf=".$_GET['login_cf']."&id_projet=".$_GET['id_projet']."&t=1'>";
                ?>
                    <textarea name='message' id='message' rows='2' placeholder="Taper un message"></textarea>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
    <a href="Ctrl.class.php?action=logout" title="Logout" class="logout-link">
        <img src="https://us.123rf.com/450wm/rehabicons/rehabicons1603/rehabicons160300755/53379730-ic%C3%B4ne-d%C3%A9connexion.jpg" alt="Déconnexion" width="40" height="40">
    </a>
</body>
</html>
