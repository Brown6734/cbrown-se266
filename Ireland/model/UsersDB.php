<?php 

class UsersDB{
    private $UsersData;

    const PASSWORD_NORM = 'password';

    public function __construct($configFile){
        if ($ini = parse_ini_file($configFile)){
            $UsersPDO = new PDO("mysql:host=" . $ini['servername'] . ";port=" . $ini['port'] . ";dbname=" . $ini['database'], $ini['username'], $ini['password']);

            $UsersPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $UsersPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->UsersData = $UsersPDO;
        } 
        else{
            throw new Exception("<h2>Creation of database object failed!</h2>", 0, null);
        }


    }

    public function getAllUsers(){
        $results = [];
        $UsersTable = $this->UsersData;

        return $results;

    }

    public function addUser($username, $password){
        $addSucessful = false;
        $UsersTable = $this->UsersData;

        //$norm = random_bytes(32);

        $stmt = $UsersTable->prepare("INSERT INTO Users SET username = :username, password = sha1(:password)");

        $boundParams = array(
            ":username" => $username,
            ":password" => sha1($password)
        );

        $addSucessful = ($stmt->execute($boundParams) && $stmt->rowCount() > 0);

        return $addSucessful;

    }

    public function deleteUser ($UserID){
        $deleteSucessful = false;
        $UsersTable = $this->UsersData;

        return $deleteSucessful;
    }

    public function getUser($UserID){
        $results = [];
        $UsersTable = $this->UsersData;

        return $results;
    }

    public function getDatabaseRef(){
        return $this->UsersData;
    }

    public function validateCredentials($username, $password){
        $results = [];
        $UsersTable = $this->UsersData;

        $stmt = $UsersTable->prepare("SELECT password, username FROM Users WHERE username = :username");

        $foundUser = ($stmt->execute() && $stmt->rowCount() > 0);

        if ($foundUser){
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = sha1($results['norm'] . $password);
            $isValidUser = ($hashedPassword == $results['password']);
        }

        return $isValidUser;
    }


}


?>