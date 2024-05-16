<?php
require_once 'Model.class.php';
Class Ctrl
{
    private $m;
    public function __construct()
    {$this -> m = new Model();}
    public function allProjectsAction()
    {
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header("location: indexAuth.php");
            exit;
        }
        $login = $_GET['login_cl'];
        $projects = $this->m->allProjects($login);
        require 'allProjects.php';
    }
    public function allProjectsCFAction()
    {
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header("location: indexAuth.php");
            exit;
        }
        $projectsCF = $this->m->allProjectsCF();
        $login = $_GET['login_cf'];
        require 'allProjectsCF.php';
    }
    public function allTasksAction()
    {
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header("location: indexAuth.php");
            exit;
        }
        $login_col = $_GET['login_cl'];
        $id_projet = $_GET['id_projet'];
        $taches = $this->m->allTasks($login_col,$id_projet);
        $nb = $this->m->nbTache($login_col,$id_projet);
        $nbt = $this->m->nbTacheTermine($login_col,$id_projet);
        $ter = $this->m->tacheEnRetard($login_col,$id_projet);
        require 'taches.php';
    }
    public function allTasksCFAction()
    {
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header("location: indexAuth.php");
            exit;
        }
        $login_cf = $_GET['login_cf'];
        $id_projet = $_GET['id_projet'];
        $taches = $this->m->allTasksCF($id_projet);
        $nbCF = $this->m->nbTacheCF($id_projet);
        $nbtCF = $this->m->nbTacheTermineCF($id_projet);
        $terCF = $this->m->tacheEnRetardCF($id_projet);
        require 'tachesCF.php';
    }
    public function verifAction(){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $this->m->verif($login, $password);
    }
    public function ajouterMessageAction()
    {
        $mess['Login_col'] = $_GET['login_cl'];
        $mess['Login_cf'] = $_GET['login_cf'];
        $mess['Id_projet'] = $_GET['id_projet'];
        $mess['Message'] = $_POST['message'];
        $t = $_GET['t'];
        if($t == 0) $mess['Login_env'] = $_GET['login_cl'];
        else $mess['Login_env'] = $_GET['login_cf'];
        $this->m->ajouterMessage($mess,$t);
    }
    public function afficherMessageAction()
    {
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header("location: indexAuth.php");
            exit;
        }
        $login_col = $_GET['login_cl'];
        $login_cf = $_GET['login_cf'];
        $id_projet = $_GET['id_projet'];
        $t = $_GET['t'];
        $message = $this->m->afficherMessage($login_col,$login_cf,$id_projet);
        require 'messagerie.php';
    }
    public function getInfoAction()
    {
        $login_col = $_GET['login_cl'];
        $info = $this->m->getInfo($login_col);
        require 'infoCompte.php';
    }
    
    public function updateCollabAction(){
        $col['Login_col'] = $_GET['login_cl'];
        $col['Nom_col'] = $_POST['nom'];
        $col['Prenom_col']= $_POST['prenom'];
        $col['Email_col'] = $_POST['email'];
        $col['Mot_de_passe_col'] = $_POST['mdp'];
        $this -> m -> updateCollab($col);
        //require 'allEmployes.php';
    }
    public function updateIsdoneAction()
    {
        $t['id_tache'] = $_GET['id_tache'];
        $t['login_cl'] = $_GET['login_cl'];
        $t['login_cf'] = $_GET['login_cf'];
        $t['id_projet'] = $_GET['id_projet'];
        $this->m->updateIsdone($t);
    }
    public function ajouterProjetAction()
    {
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header("location: indexAuth.php");
            exit;
        }
        $p['login_cf'] = $_GET['login_cf'];
        $p['tprojet'] = $_POST['tprojet'];
        $p['descpro'] = $_POST['descpro'];
        $this->m->ajouterProjet($p);
    }
    public function ajouterTacheAction()
    {
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header("location: indexAuth.php");
            exit;
        }
        $t['ttache'] = $_POST['ttache'];
        $t['desct'] = $_POST['desct'];
        $t['dl'] = $_POST['dl'];
        $t['col'] = $_POST['col'];
        $t['id_projet'] = $_GET['id_projet'];
        $login_cf = $_GET['login_cf'];
        $this->m->ajouterTache($t, $login_cf);
    }
    public function logoutAction(){
        $this->m->logout();
    }
    public function allCollabAction()
    {
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header("location: indexAuth.php");
            exit;
        }
        $login_cf = $_GET['login_cf'];
        $collab = $this->m->allCollab($login_cf);
        require 'collaborateurs.php';
    }
    public function deleteTaskAction()
    {
        $id_tache = $_GET['id_tache'];
        $id_projet = $_GET['id_projet'];
        $login_cf = $_GET['login_cf'];
        $this->m->deleteTask($id_tache,$id_projet,$login_cf);
    }
    public function updateTaskAction()
    {
        $login_cf = $_GET['login_cf'];
        $id_projet = $_GET['id_projet'];
        $tache['id_tache'] = $_GET['id_tache'];
        $tache['ttache'] = $_POST['ttache'];
        $tache['desct'] = $_POST['desct'];
        $tache['dl'] = $_POST['dl'];
        $tache['col'] = $_POST['col'];
        $this->m->updateTask($tache,$id_projet,$login_cf);
    }
    public function addUserAction()
    {
        $user['login'] = $_POST['login'];
        $user['nom'] = $_POST['nom'];
        $user['prenom'] = $_POST['prenom'];
        $user['email'] = $_POST['email'];
        $user['mdp'] = $_POST['mdp'];
        $user['type_user'] = $_POST['type_user'];
        $this->m->addUser($user);
    }

    //action
    public function action()
    {
        $action = "allProjects";
        if(isset($_GET['action'])) {
            $action=$_GET['action'];
        }
        switch($action){
            case 'allProjects': $this->allProjectsAction();break;
            case 'verif': $this->verifAction();break;
            case 'ajouterMessage': $this->ajouterMessageAction();break;
            case 'allTasks': $this->allTasksAction();break;
            case 'logout': $this->logoutAction();break;
            case 'afficherMessage': $this->afficherMessageAction();break;
            case 'getInfo': $this->getInfoAction();break;
            case 'updateCollab': $this->updateCollabAction();break;
            case 'updateIsdone':$this->updateIsdoneAction();break;
            case 'allProjectsCF':$this->allProjectsCFAction();break;
            case 'allTasksCF':$this->allTasksCFAction();break;
            case 'ajouterProjet':$this->ajouterProjetAction();break;
            case 'ajouterTache':$this->ajouterTacheAction();break;
            case 'allCollab':$this->allCollabAction();break;
            case 'deleteTask':$this->deleteTaskAction();break;
            case 'updateTask':$this->updateTaskAction();break;
            case 'addUser':$this->addUserAction();break;
        }
    }
}
$ctrl = new Ctrl();
$ctrl -> action();
?>