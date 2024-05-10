<?php  

/* 
Married is tinyint, allowing for a zero or a one

ID number, First Name string, Last Name string, Birthdate date, Age number, Married tinyint

*/

include (__DIR__ . '/db.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);


function getPatients() {

    global $db;

    $results = [];

    $stmt = $db->prepare("SELECT * FROM patients ORDER BY patientFirstName");

    if ($stmt->execute() && $stmt->rowCount() > 0){
        $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
    return ($results);
}

function addPatient($patientFirstName, $patientLastName, $patientMarried, $patientBirthDate){

    global $db;

    $result = "";

    $sql = "INSERT INTO patients set patientFirstName = :FN, patientLastName = :LN, patientMarried = :M, patientBirthDate = :BD";
    $stmt = $db->prepare($sql);

    $binds = array(
        ":FN" => $patientFirstName,
        ":LN" => $patientLastName,
        ":M" => $patientMarried,
        ":BD" => $patientBirthDate
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = 'Patient Added';
    } 

    return $result;
}

?>