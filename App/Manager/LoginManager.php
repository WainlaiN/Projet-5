<?php


namespace App\Manager;


use App\Core\Database;
use App\Model\User;

class LoginManager extends Database

{

    protected $model = User::class;
    protected $table_name = 'users';

    /** return information about user */
    public function getLogin($username)
    {
        $req = 'SELECT * FROM ' . $this->table_name . ' WHERE username= :username ';
        $parameters = [':username' => $username];
        $result = $this->sql($req, $parameters);
        return $result->fetchObject($this->model);

    }

    /** return user status */
    public function getStatus($username)
    {
        $req = 'SELECT user_status FROM ' . $this->table_name . ' WHERE username= :username ';
        $parameters = [':username' => $username];
        $result = $this->sql($req, $parameters);
        return $result->fetchObject($this->model);
    }

    /** check if user is already in database */
    public function checkUsername()
    {
        if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
            $_SESSION['flash']['danger'] = 'Votre pseudo n\'est pas valide (alphanumérique)';

            return false;
        } else {
            $username = htmlspecialchars($_POST['username']);

            $sql = 'SELECT id FROM users WHERE username = :username';
            $parameters = ['username' => $username];
            $req = $this->sql($sql, $parameters);
            $user = $req->fetchObject();
            if ($user) {
                $_SESSION['flash']['danger'] = 'Ce pseudo est dejà utilisé';
                return false;
            } else {
                return true;
            }
        }
    }

    /** check email */
    public function checkEmail()
    {
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['flash']['danger'] = 'Email invalide';

            return false;
        } else {
            $email = $_POST['email'];
            $sql = 'SELECT id from ' . $this->table_name . ' WHERE email = ?';
            $parameters = [$email];
            $result = $this->sql($sql, $parameters);
            $user = $result->fetchObject($this->model);

            if ($user) {
                $_SESSION['flash']['danger'] = 'Cet email est déjà utilisé.';
                return false;
            } else {
                return true;
            }
        }
    }

    /** check password */
    public function checkPassword()
    {
        if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
            $_SESSION['flash']['danger'] = 'Mot de passe différent';

            return false;
        } elseif (empty($_POST['password']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password'])) {
            $_SESSION['flash']['danger'] = 'Votre mot de passe n\'est pas valide';

            return false;
        } else {

            return true;
        }
    }
    /** register user */
    public function registerUser()
    {
        $status = 2;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = 'INSERT INTO ' . $this->table_name . ' SET username = ?, password = ?, email = ?, user_status = ?';
        $parameters = [$_POST['username'], $password, $_POST['email'], $status];
        $this->sql($sql, $parameters);

        $entetemail = "From: Blog Nico  <nicodupriez@hotmail.com>\r\n";
        $entetemail .= "Reply-To: nicodupriez@hotmail.comm \n";
        $entetemail .= 'X-Mailer: PHP/'.phpversion()."\n";
        $entetemail .= "Content-Type: text/plain; charset=utf8\r\n";
        $objet = 'Comfirmation de la création de votre compte sur le blog de juju';
        $message_email = 'Votre compte a bien été créé '.$_POST['username'].', vous pouvez maintenant vous connecter. Rendez-vous sur http://xxxxxx.fr/login';

        mail($_POST['email'], $objet, $message_email, $entetemail);
        $_SESSION['flash']['success'] = 'Votre compte à bien été créé.';
    }



}