<?php
declare(strict_types = 1);

class Contact extends Dbh
{
    private string $id;
    private string $name;
    private string $phone;
    private string $email;
    private string $address;
    private string $user_fk;

//    public function __construct($name, $phone, $email, $address)
//    {
//        $this->name = $name;
//        $this->phone = $phone;
//        $this->email = $email;
//        $this->address = $address;
//    }

    public function addContact(){
        $stmt = $this->connect()->prepare('INSERT INTO contacts (name, phone, email, address, fk_user) VALUES (?, ?, ?, ?, ?);');
        if (!$stmt->execute(array($this->name, $this->phone, $this->email, $this->address, $this->user_fk))){
            $stmt = null;
            header('location: ./index.php?stmtfailed');
            exit();
        }
        $stmt = null;
    }

    public function fetchData($fk){
        $stmt = $this->connect()->prepare('SELECT * FROM contacts WHERE fk_user = ?');
        if (!$stmt->execute(array($fk))){
            $stmt = null;
            header('location: ./index.php?stmtfailed');
            exit();
        }
        return $stmt->fetchAll();
    }

    public function fetchOneContact(){
        $stmt = $this->connect()->prepare('SELECT * FROM contacts WHERE id = ?');
        if (!$stmt->execute(array($this->id))){
            $stmt = null;
            header('location: ./index.php?stmtfailed');
            exit();
        }
        return $stmt->fetchAll();
    }

    public function update(){
        $stmt = $this->connect()->prepare('UPDATE contacts SET name = ?, phone = ?, email = ?, address = ? WHERE id = ?;');
        if (!$stmt->execute(array($this->name, $this->phone, $this->email, $this->address, $this->id))){
            $stmt = null;
            header('location: ./index.php?stmtfailed');
            exit();
        }
        $stmt = null;
    }

    public function delete(){
        $stmt = $this->connect()->prepare('DELETE FROM contacts WHERE id = ?;');
        if (!$stmt->execute(array($this->id))){
            $stmt = null;
            header('location: ./index.php?stmtfailed');
            exit();
        }
        return $stmt->fetchAll();
    }



    // getters and setters
    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setAddress($address){
        $this->address = $address;
    }
    public function setUserFK($fk){
        $this->user_fk = $fk;
    }

}