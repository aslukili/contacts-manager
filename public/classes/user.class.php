<?php
declare(strict_types = 1);

class User extends Dbh
{
    private string $username;
    private string $userPassword;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->userPassword = $password;
    }

    // error handlers and user sign up
    // note: there is no error handlers yet (backend inputs validation)
    // a function to check if the user already exists
    protected function checkUser($username)
    {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ?;');
        if (!$stmt->execute(array($username))){
            $stmt = null;
            header('location: ../index.php?stmtfailed');
            exit();
        }
        if ($stmt->rowCount() > 0){
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }


    // insert the new user into database
    protected function setUser($username, $userPassword){
        $stmt = $this->connect()->prepare('INSERT INTO users (username, password, signup_date) VALUES (?, ?, NOW());');
        // we want to make sure the password is hashed before inserting it into our database
        $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($username, $hashedPwd))){
            $stmt = null;
            header('location: ../signup.php?stmtfailed');
            exit();
        }
        $stmt = null;
    }

    //get the user info from the db in order to login
    protected function getUser($username, $password){
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ?;');
        if (!$stmt->execute(array($username))){
            $stmt = null;
            header('location: ../login.php?error=stmtfailed');
            exit();
        }
        // checking if the user which we are looking for his password is existing or not
        if ($stmt->rowCount() == 0){
            $stmt = null;
            header('location: ../login.php?error=user%not%found%');
            exit();
        }
        // getting the password from database and matching it with the one which the user gave us
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_OBJ);
        $checkPwd = password_verify($password, $pwdHashed[0]->password);

        if ($checkPwd == false){
            $stmt = null;
            header('location: ../login.php?error=wrong%password');
            exit();
        } else {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? AND password = ?;');
            if ($stmt->execute(array($username, $pwdHashed[0]->password)) == false){
                $stmt = null;
                header('location: ../login.php?error=stmtfailed');
                exit();
            }

            // loging the user:

            if ($stmt->rowCount() == 0) //user not found in this case
            {
                $stmt = null;
                header('location: ../login.php?error=user%not%found');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_OBJ);
            session_start();
            $_SESSION["username"] = $user[0]->username;
            $_SESSION["signup_date"] = $user[0]->signup_date;
            $_SESSION['last_login'] = date("Y-m-d h:i:sa");
        }

        $stmt = null;
    }



    // sign up and login methods
    public function signupUser(){
        if($this->checkUser($this->username) == false){
            header('location: ../signup.php?error=user%already%exists');
            exit();
        }
        $this->setUser($this->username, $this->userPassword);
    }
    public function loginUser(){
        // arrow handlers and more validation should go here!
        $this->getUser($this->username, $this->userPassword);
    }

}