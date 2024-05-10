<?php 

//class patient part

class PatientDB{
    private $patientData;

    public function __construct($configFile){

        if ($ini = parse_ini_file($configFile)){
            $connectionString = "mysql:host=" . $ini['servername'] . ";port=" . $ini['port'] . ";dbname=" . $ini['dbname'];

            $patientPDO = new PDO ($connectionString, $ini['username'], $ini['password']);

            $patientPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $patientPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->patientData = $patientPDO;
        }
        else{
            throw new Exception("<h2>creation of db object failed! </h2>", 0, null);
        }
    } //end of config file constructor

    //getpatients part
    public function getPatients(){
        $results = [];
        $patientTable = $this->patientData;

        $stmt = $patientTable->prepare("SELECT * FROM patients ORDER BY patientFirstName");

        if ($stmt->execute() && stmt->rowCount() > 0){
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }

        return $results;
    }

    //add patient to db
    public function addPatient($patientFirstName, $patientLastName, $patientMarried, $patientBirthDate){
        $addSuccessful = false;
        $patientTable = $this->patientData;

        $stmt = $patientTable->prepare("INSERT INTO patients SET patientFirstName = :firstParam, patientLastName = :lastParam, patientMarried = :marriedParam, patientBirthDate = :birthParam");

        $boundParams = array(
            ":firstParam" => $patientFirstName,
            ":lastParam" => $patientLastName,
            ":marriedParam" => $patientMarried,
            ":birthParam" => $patientBirthDate
        );

        $addSuccessful = ($stmt->execute($boundParams) && $stmt->rowCount() > 0);

        return $addSuccessful;
    } //end of add patient part

    //get one patient and place it into array
    public functions getPatient ($id){
        $results = [];
        $patientTable = $this->patientData;

        $stmt = $patientTable->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, PatientBirthDate FROM patients WHERE id=:idParam");

        $stmt->bindValue(':idParam', $id);

        if ($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetch();
        }
        
        return $results;
    }
}

?>