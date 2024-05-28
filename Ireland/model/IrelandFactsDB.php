<?php 

//include __DIR__ . '/dbconfig.ini';

class IrelandFactsDB{

    private $IrelandFactsData;



    public function __construct($configFile){

        if($ini = parse_ini_file($configFile)){
            
            $connectionString = "mysql:host=" . $ini['servername'] . ";port=" . $ini['port'] . ";dbname=" . $ini['dbname'];

            $IrelandFactsPDO = new PDO($connectionString, $ini['username'], $ini['password']);

            $IrelandFactsPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $IrelandFactsPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->IrelandFactsData = $IrelandFactsPDO;
        }
        else{
            throw new Exception("<h2>Creation of database object failed!</h2>", 0, null);
        }

    }

    public function getAllIrelandFacts(){
        $results = [];
        $IrelandFactsTable = $this->IrelandFactsData;

        $stmt = $IrelandFactsTable->prepare("SELECT * FROM IrelandFacts ORDER BY factShortName");

        if ($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

    public function addIrelandFact($factShortName, $factLong){
        $addSucessful = false;
        $IrelandFactsTable = $this->IrelandFactsData;

        $stmt = $IrelandFactsTable->prepare("INSERT INTO IrelandFacts SET factShortName = :factShortName, factLong = :factLong");

        $boundParams = array(
            ":factShortName" => $factShortName,
            ":factLong" => $factLong
        );

        $addSucessful = ($stmt->execute($boundParams) && $stmt->rowCount() > 0);

        return $addSucessful;
    }

    public function updateIrelandFact($FactsID, $factShortName, $factLong){
        $updateSucessful = false;
        $IrelandFactsTable = $this->IrelandFactsData;

        $stmt = $IrelandFactsTable->prepare("UPDATE IrelandFacts SET factShortName = :factShortName, factLong = :factLong WHERE FactsID = :FactsID");

        $stmt->bindValue(":FactsID", $FactsID);
        $stmt->bindValue(":factShortName", $factShortName);
        $stmt->bindValue(":factLong", $factLong);

        $updateSucessful = ($stmt->execute() && $stmt->rowCount() > 0);

        return $updateSucessful;
    }

    public function deleteIrelandFact($FactsID){
        $deleteSucessful = false;
        $IrelandFactsTable = $this->IrelandFactsData;

        $stmt = $IrelandFactsTable->prepare("DELETE FROM IrelandFacts WHERE FactsID = :FactsID");

        $stmt->bindValue(":FactsID", $FactsID);

        $deleteSucessful = ($stmt->execute() && $stmt->rowCount() > 0);

        return $deleteSucessful;
    }

    public function getIrelandFact($FactsID){
        $results = [];
        $IrelandFactsTable = $this->IrelandFactsData;

        $stmt = $IrelandFactsTable->prepare("SELECT * FROM IrelandFacts WHERE FactsID = :FactsID");

        $stmt->bindValue(":FactsID", $FactsID);

        if ($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $results;
    }

    protected function getDatabaseRef(){
        return $this->IrelandFactsData;
    }

    public function __destruct(){
        $this->IrelandFactsData = null;
    }
    
}

?>
