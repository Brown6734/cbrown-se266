<?php
    include __DIR__ . '/model/model_patients.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
</head>
<body>

<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $error = "";
    $patientFirstName = "";
    $patientLastName = "";
    $patientMarried = "";
    $patientBirthDate = "";

    if (isset($_POST['storePatient'])){

        $patientFirstName = filter_input(INPUT_POST, 'patientFirstName');
        $patientLastName = filter_input(INPUT_POST, 'patientLastName');
        $patientMarried = filter_input(INPUT_POST, 'patientMarried', FILTER_VALIDATE_FLOAT);
        //filter $birthdate it is a date value
        $patientBirthDate = filter_input(INPUT_POST, 'patientBirthDate');

        if ($patientFirstName == "") $error .= "<li>Please enter a First Name</li>";
        if ($patientLastName == "") $error .= "<li>Please enter a Last Name</li>";
        if ($patientMarried == "") $error .= "<li>Please enter a Married Status</li>";
        if ($patientBirthDate == "") $error .= "<li>Please enter a Birth Date</li>";
        
    }


?>

<?php

    if (isset($_POST['storePatient']) && $error == ""):
        $result = addPatient($patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
?>

    <h2> new patient was added </h2>

    <ul>

        <li> <?php echo "First name: $patientFirstName"?>  </li>

    </ul>

    <a href="patients.view.php">View all Patients </a>

    <?php 
    
        exit;
        endif;
    
    ?>

    <h2>New Patients</h2>


    <form name="patients" method="post"> 

        <?php 
        
            if ($error != ""):

        ?>

        <div class="error">
            <p>Please fix the following and resubmit</p>
            <ul>
                <?php echo $error; ?>
            </ul>



        </div>

        <?php 
            endif; 
        ?>

        <div class="wrapper">

            <div class="label">
                <label>First Name: </label>
            </div>
            <div class="input">
                <input type="text" name="name" value="<?= $patientFirstName; ?>"/>
            </div>

            <div class="label">
                <label>Last Name: </label>
            </div>
            <div class="input">
                <input type="text" name="name" value="<?= $patientLastName; ?>"/>
            </div>

            <div class="label">
                <label>Married: </label>
            </div>
            <div class="input">
                <input type="number" name="name" value="<?= $patientMarried; ?>"/>
            </div>

            <div class="label">
                <label>Birth Date: </label>
            </div>
            <div class="input">
                <input type="date" name="name" value="<?= $patientBirthDate; ?>"/>
            </div>

            <div> &nbsp; </div>

            <div class="submit">
            
                <input type="submit" name="storePatient" value="Store Patient Information" />

            </div>




        </div>


    </form>

    <a href="patients.view.php">Back to Patients Table</a>


</body>