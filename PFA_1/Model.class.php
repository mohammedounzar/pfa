<?php
class Model
{
    private $db;
    public function __construct(){
        $user = 'root';
        $pass = '';
        $this -> db = new PDO('mysql:host=localhost;dbname=pfa BD',$user,$pass);
    }
    public function verif($login, $password){
        session_start();
        $query1 = $this->db->prepare('SELECT * FROM collaborateur WHERE login_col = ? AND Mot_de_passe_col = ?');
        $query2 = $this->db->prepare('SELECT * FROM chef_de_projet WHERE login_cf = ? AND Mot_de_passe_cf = ?');
        $query1->execute([$login, $password]);
        $query2->execute([$login, $password]);
        $col = $query1->fetch();
        $cf = $query2->fetch();
        if ($col) {
            $_SESSION['loggedin'] = true;
            $login_cl = $login;
            header("Location: Ctrl.class.php?login_cl=".$login."&action=allProjects");
        }
        else {
            if($cf){
                $_SESSION['loggedin'] = true;
                $login_cf = $login;
                header("Location: Ctrl.class.php?login_cf=".$login."&action=allProjectsCF");
            }
            else header("Location: indexAuth.php?auth=false");
        }
    }
    public function allProjects($login){
        $query = $this -> db -> prepare('SELECT DISTINCT p.Id_projet, p.Titre_projet, p.Id_projet, cf.Login_cf
        FROM projet AS p, tache AS t, collaborateur AS col, chef_de_projet AS cf
        WHERE p.Id_projet=t.Id_projet AND p.Login_cf=cf.Login_cf AND t.login_col="' . $login . '"');
        $query -> execute();
        return $query -> fetchAll();
    }
    public function allProjectsCF()
    {
        $login_cf = $_GET['login_cf'];
        $query = $this -> db -> prepare('SELECT DISTINCT Id_projet, Titre_projet, Id_projet
        FROM projet 
        WHERE Login_cf="'.$login_cf.'"');
        $query -> execute();
        return $query -> fetchAll();
    }
    public function allTasks($login_col,$id_projet)
    {
        $query = $this -> db -> prepare('SELECT DISTINCT Id_tache, Titre_tache, Description_tache, Deadline_tache, is_done
        FROM tache
        WHERE Id_projet="'.$id_projet.'" AND login_col="' . $login_col . '"');
        $query -> execute();
        return $query -> fetchAll();
    }
    public function allTasksCF($id_projet)
    {
        $query = $this -> db -> prepare('SELECT DISTINCT Id_tache, Titre_tache, Description_tache, Deadline_tache, is_done, Login_col
        FROM tache
        WHERE Id_projet="' . $id_projet . '"');
        $query -> execute();
        return $query -> fetchAll();
    }
    public function ajouterMessage($mess,$t)
    {
        date_default_timezone_set('Africa/Casablanca');
        $currentTimestamp = date("Y-m-d H:i:s");
        $query = $this->db->prepare('INSERT INTO message (Message,Date_d_envoi,Id_projet,Login_cf,Login_col,Login_env) VALUES(?,?,?,?,?,?)');
        $query->execute(array(
            $mess['Message'],
            $currentTimestamp,
            $mess['Id_projet'],
            $mess['Login_cf'],
            $mess['Login_col'],
            $mess['Login_env'],
        )); 
        header("location: Ctrl.class.php?action=afficherMessage&login_cl=" . $mess['Login_col'] . "&login_cf=".$mess['Login_cf']."&id_projet=".$mess['Id_projet']."&t=".$t."");
    }
    public function afficherMessage($login_col,$login_cf,$id_projet)
    {
        $query = $this -> db -> prepare('SELECT DISTINCT Message, Login_env, Date_d_envoi
        FROM message 
        WHERE Id_projet="'.$id_projet.'" AND Login_cf="'.$login_cf.'" AND login_col="' . $login_col . '"');
        $query -> execute();
        return $query -> fetchAll();
    }

    public function getInfo($login_col){
        $query = $this->db->prepare('SELECT * FROM collaborateur
        WHERE Login_col="'.$login_col.'"');
        $query -> execute();
        return $query -> fetchAll();
    }
    public function updateCollab($col){
        $query = $this->db->prepare('UPDATE collaborateur SET Nom_col = ? ,Prenom_col = ? ,Email_col = ?,Mot_de_passe_col = ? WHERE Login_col = ?');
        $query->execute(array(
        $col['Nom_col'],
        $col['Prenom_col'],
        $col['Email_col'],
        $col['Mot_de_passe_col'],
        $col['Login_col']
        ));   
        header("Location: Ctrl.class.php?login_cl=".$col['Login_col']."&action=allProjects");
    }
    public function updateIsdone($t)
    {
        $query = $this->db->prepare('UPDATE tache SET is_done = 1 WHERE Id_tache = ?');
        $query->execute(array($t['id_tache']));
        header("Location: Ctrl.class.php?action=allTasks&login_cl=".$t['login_cl']."&id_projet=".$t['id_projet']."&login_cf=".$t['login_cf']."");
    }
    public function logout(){
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: indexAuth.php");
        exit;
    }
    public function ajouterProjet($p)
    {
        $query = $this->db->prepare('INSERT INTO projet (Titre_projet,Description_projet,Login_cf) VALUES (?,?,?)');
        $query->execute(array(
            $p['tprojet'],
            $p['descpro'],
            $p['login_cf']
        ));
        header("Location: Ctrl.class.php?action=allProjectsCF&login_cf=".$p['login_cf']."");
    }
    public function ajouterTache($t,$login_cf)
    {
        $query = $this->db->prepare('INSERT INTO tache (Titre_tache,Description_tache,Deadline_tache,Login_col,Id_projet) VALUES (?,?,?,?,?)');
        $query->execute(array(
            $t['ttache'],
            $t['desct'],
            $t['dl'],
            $t['col'],
            $t['id_projet']
        ));
        header("Location: Ctrl.class.php?action=allTasksCF&id_projet=".$t['id_projet']."&login_cf=".$login_cf."");
    }
    public function allCollab($login_cf)
    {
        $query = $this -> db -> prepare('SELECT DISTINCT c.Login_col, c.Nom_col, c.Prenom_col, c.Email_col
        FROM projet AS p, tache AS t, collaborateur AS c
        WHERE p.Id_projet=t.Id_projet AND t.Login_col=c.Login_col AND p.login_cf="' . $login_cf . '"');
        $query -> execute();
        return $query -> fetchAll();       
    }
    public function deleteTask($id_tache,$id_projet,$login_cf)
    {
        $query = $this->db->prepare('DELETE FROM tache WHERE Id_tache= ?');
        $query->execute([$id_tache]);
        header('Location: Ctrl.class.php?action=allTasksCF&id_projet='.$id_projet.'&login_cf='.$login_cf.'');
    }
    public function updateTask($tache,$id_projet,$login_cf)
    {
        $query = $this->db->prepare('UPDATE tache SET Titre_tache=?, Description_tache=?, Deadline_tache=?, Login_col=?
        WHERE Id_tache=?');
        $query->execute(array(
            $tache['ttache'],
            $tache['desct'],
            $tache['dl'],
            $tache['col'],
            $tache['id_tache']
        ));
        header('Location: Ctrl.class.php?action=allTasksCF&id_projet='.$id_projet.'&login_cf='.$login_cf.'');
    }
    public function addUser($user)
    {
        $query1 = $this->db->prepare('INSERT INTO chef_de_projet (Login_cf,Nom_cf,Prenom_cf,Email_cf,Mot_de_passe_cf)
        VALUES (?,?,?,?,?)');
        $query2 = $this->db->prepare('INSERT INTO collaborateur (Login_col,Nom_col,Prenom_col,Email_col,Mot_de_passe_col)
        VALUES (?,?,?,?,?)');
        if ($user['type_user'] === "cf"){
            $query1->execute(array(
                $user['login'],
                $user['nom'],
                $user['prenom'],
                $user['email'],
                $user['mdp']
            ));
            header('Location: Ctrl.class.php?action=allProjectsCF&login_cf='.$user['login'].'');
        }
        else {if($user['type_user'] === "col")
            $query2->execute(array(
                $user['login'],
                $user['nom'],
                $user['prenom'],
                $user['email'],
                $user['mdp']
            ));
            header('Location: Ctrl.class.php?action=allProjects&login_cl='.$user['login'].'');
        }
    }
    public function nbTache($login_col,$id_projet)
    {
        $query = $this->db->prepare('SELECT COUNT(*)
        FROM tache
        WHERE Id_projet="'.$id_projet.'" AND login_col="' . $login_col . '"');
        $query->execute();
        return $query->fetchColumn(); 
    }
    public function nbTacheTermine($login_col,$id_projet)
    {
        $query = $this->db->prepare('SELECT COUNT(*)
        FROM tache
        WHERE Id_projet="'.$id_projet.'" AND login_col="' . $login_col . '" AND is_done = 1');
        $query->execute();
        return $query->fetchColumn(); 
    }
    public function tacheEnRetard($login_col,$id_projet)
    {
        $query = $this->db->prepare('SELECT Titre_tache 
        FROM tache
        WHERE is_done=0 AND Deadline_tache < NOW() AND Id_projet="'.$id_projet.'" AND login_col="' . $login_col . '"');
        $query->execute();
        return $query->fetchAll();
    }
    public function nbTacheCF($id_projet)
    {
        $query = $this->db->prepare('SELECT COUNT(*)
        FROM tache
        WHERE Id_projet="'.$id_projet.'"');
        $query->execute();
        return $query->fetchColumn(); 
    }
    public function nbTacheTermineCF($id_projet)
    {
        $query = $this->db->prepare('SELECT COUNT(*)
        FROM tache
        WHERE Id_projet="'.$id_projet.'" AND is_done = 1');
        $query->execute();
        return $query->fetchColumn(); 
    }
    public function tacheEnRetardCF($id_projet)
    {
        $query = $this->db->prepare('SELECT Titre_tache 
        FROM tache
        WHERE Deadline_tache < NOW() AND Id_projet="'.$id_projet.'" AND is_done=0');
        $query->execute();
        return $query->fetchAll();
    }
}
?>