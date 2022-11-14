<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController implements ControllerInterface{
    
    //SIGN UP A NEW USER
    public function register(){

        $usermanager = new UserManager();


            $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
            $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_DEFAULT);

            //error handling for pseudo
            if ($pseudo && $email && $password && $confirmPassword) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                if (strlen($pseudo) < 3 || strlen($pseudo) > 30) {
                    echo  'Votre pseudo dois contenir 3 caractères minimum et 30 maximum !!';
                    header('Location: view/security/register.php');
                    die();

                    //error handling for email
                }elseif(empty($email)){
                    echo "Votre  email  c'est pas correct !!";
                    header('Location: view/security/register.php');
                    die();

                    //error handling for password
                }elseif (strlen($password) < 4) {
                    echo "Votre mot de pas dois contenir 3 caractères minimum et 30 maximum !!!!";
                    header('Location: view/security/register.php');
                    die();

                    //error handling for confirm password
                }elseif ($confirmPassword !== $password) {
                    echo 'Les mots de passe ne sont pas identique !!';
                    header('Location: view/security/register.php');
                    die();
                }else {
                    $usermanager->add([
                    'pseudo' => $pseudo,
                    'email' => $email,
                    'password' => $password_hash
                    ]);

                header('Location: view/security/login.php');
                }
                
            }
            
            
        
    }

    //SIGN IN AN EXISTING USER
    public function signIn(){

        $usermanager = new UserManager();
        

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

            //error handling for pseudo
            if ($email && $password) {

                //getting the user's password from the database from the query function (userPassword)
                $Userpassword = $usermanager->UserPassword($email);
                
                //getting the user's Email from the database from the query function (userEmail)
                $userEmail = $usermanager->UserEmail($email);

                //verifying if inputed password is same with existing password in the database
                if(password_verify($password, $Userpassword['password'])){

                    //if same, user session logged in should start
                    session::setUser($userEmail);
                    Session::addFlash("success", "Bienvenue ".$userEmail['pseudo']);
                    $this->redirectTo('profilepage');
                }else {
                    header('Location: view/security/login.php');
                    Session::addFlash("error", "Cet utilisateur n'existe pas !");
                }
                
                
            }
    }

    // SIGN OUT EXISTING USER
    public function logout(){
			
        Session::removeUser();
        Session::addFlash("success", "A bientôt !");
        $this->redirectTo('home');
    }
}