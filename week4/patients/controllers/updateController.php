<?php 

//this code runs everytime/everything page loads
require_once "./models/PatientDB.php";
require_once "./models/dbpointer.php";


//set up configuration file and create database

try{
    $patientDatabase = new PatientDB(DB_CONFIG);
}
catch(Exception $error){
    echo "<h2>" . $error->getMessage() . "</h2>";
}

//if it is a GET, we are coming from view.php
//lets figure out if we are doing update or add

if (isset($_GET['action'])){
    $action = filter_input(INPUT_GET, 'action');
    $id = filter_input(INPUT_GET, 'patientID');
    if ($action == "Update"){
        $row = $patientDatabase->getPatient($id);
        $firstName = $row['patientFirstName'];
        $lastName = $row['patientLastName'];
        $married = $row['patientMarried'];
        $birthDate = $row['patientBirthDate'];

    }
    else{
        $firstName = "";
        $lastName = "";
        $married = "";
        $birthDate = "";
    }
} //end if GET

//POST part

elseif (isset[$_POST['action']]){
    $action = filter_input(INPUT_POST, 'action');
    $id = filter_input(INPUT_POST, 'id');
    $firstName = filter_input(INPUT_POST, 'patientFirstName');
    $lastName = filter_input(INPUT_POST, 'patientLastName');
    $married = filter_input(INPUT_POST, 'patientMarried');
    $birthDate = filter_input(INPUT_POST, 'patientBirthDate');
    
    if ($action == "Add"){
        $result = $patientDatabase->addPatient($firstName, $LastName, $married, $birthDate);
    }

    //redirect to patient list on view php
    header('Location: viewPatients.php');
}//end POST

//If neither POST or GET, go to view php
//page should not be loaded
else{
    header('Location: viewPatients.php');
}



?>

