<?php 

    include (__DIR__ . '/IrelandFactsDB.php');

    function getIrelandFacts(){
        global $db;
        $results = [];

        $stmt = $db->prepare("SELECT FactsID, UserID, factShortName, factLong FROM IrelandFacts");

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($results);

    }

    function addIrelandFact($factShortName, $factLong){
        global $db;
        $result = "";

        var_dump($db);
        $sql = "INSERT INTO IrelandFacts set factShortName = :factShortName, factLong = :factLong";
        $stmt = $db->prepare($sql);

        $binds = array(
            ":factShortName" => $factShortName,
            ":factLong" => $factLong
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = "Fact Added";
        } 
        return ($result);

    }

    function updateIrelandFact($FactsID, $UserID, $factShortName, $factLong){
        global $db;
        $results = "";
        $sql = "UPDATE IrelandFacts set factShortName = :factShortName, factLong = :factLong WHERE FactsID = :FactsID AND UserID = :UserID";

        $stmt->bindValue(":FactsID", $FactsID);
        $stmt->bindValue(":UserID", $UserID);
        $stmt->bindValue(":factShortName", $factShortName);
        $stmt->bindValue(":factLong", $factLong);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = "Fact Updated";
        }

        return ($results);
        

    }
    
    function deleteIrelandFact($FactsID){
        global $db;
        $results = "Fact was not deleted";
        $stmt = $db->prepare("DELETE FROM IrelandFacts WHERE FactsID = :FactsID");
        
        $stmt->bindValue(":FactsID", $FactsID);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = "Fact Deleted";
        }

        return ($results);
    }

    function getIrelandFact($FactsID){
        global $db;

        $result = [];
        $stmt = $db->prepare("SELECT * FROM IrelandFacts WHERE FactsID = :FactsID");
        $stmt->bindValue(":FactsID", $FactsID);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return ($result);
    }

    function searchIrelandFacts($factShortName, $factLong){
        global $db;
        $binds = array();

        $sql = "SELECT * FROM IrelandFacts WHERE 0=0";

        if ($factShortName != "") {
            $sql .= " AND factShortName LIKE :factShortName";
            $binds[":factShortName"] = "%$factShortName%";
        }

        if ($factLong != "") {
            $sql .= " AND factLong LIKE :factLong";
            $binds[":factLong"] = "%$factLong%";
        }

        $sql .= " ORDER BY factShortName";

        $results = array();

        $stmt = $db->prepare($sql);

        if ($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

    function login($user, $pass){
        global $db;

        $result = [];

        echo '<br/>';
        var_dump($db);
        echo '&nbsp; &nbsp; <br/>';
        var_dump($result);

        $stmt = $db->prepare("SELECT * FROM users WHERE username=:user AND password=sha1(:pass)");

        $stmt->bindValue(":user", $user);
        $stmt->bindValue(":pass", $pass);

        if ($stmt->execute() && $stmt->rowCount() > 0){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return ($result);
    }

?>