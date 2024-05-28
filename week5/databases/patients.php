<?php

    include __DIR__ . '/model/model_patients.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $error = "";

        //lets figure out if we are diong update or add
        if (isset($_GET['action'])){
            $action = filter_input(INPUT_GET, 'action');

            $id = filter_input(INPUT_GET, 'id');

            if ($action == 'edit'){
                $patient = getPatient($id);
                $patientFirstName = $patient['patientFirstName'];
                $patientLastName = $patient['patientLastName'];
                $patientMarried = $patient['patientMarried'];
                $patientBirthDate = $patient['patientBirthDate'];
            }else{
                $patientFirstName = "";
                $patientLastName = "";
                $patientMarried = "";
                $patientBirthDate = 0000-00-00;
            }
        }

        if (isset($_POST['storePatient'])){
            $patientFirstName = filter_input(INPUT_POST, 'patientFirstName');
            $patientLastName = filter_input(INPUT_POST, 'patientLastName');
            $patientMarried = filter_input(INPUT_POST, 'patientMarried');
            $patientBirthDate = filter_input(INPUT_POST, 'patientBirthDate');

            if ($patientFirstName == "") $error .= "<li>Please put put a First Name</li>";
            if ($patientLastName == "") $error .= "<li>Please put put a Last Name</li>";
            if ($patientMarried == "") $error .= "<li>Please put put a Married Status</li>";
            if ($patientBirthDate == "") $error .= "<li>Please put put a Birth Date</li>";
        }

        if (isset($_POST['storePatient']) && $error == "" && $action == 'add'){
            addPatient ($patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
            header('Location: ../databases/patients.view.php');
            exit;
        }

        if (isset($_POST['storePatient']) && $error == "" $$ $action == 'edit'){
            updatePatient ($id, $patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
            header('Location: ../databases/patients.view.php');
            exit;
        }

        if(isset($_POST['deletePatient'])){
            deletePatient($id);
            header('Location: ../databases/patients.view.php');
            exit;
        }


    ?>

    <div class="container"> 
        <div>  
            <a href="../databases/patients.view.php">View All Patients </a>
            <!-- <h2> <//?= ucfirst($action); ?> Patients </h2> -->
            <form name="patients" method="post">

                <?php 
                    if ($error != ""):
                
                ?>
                <div class="error">
                    <p>Please fix the following and resumbit</p>
                    <ul> 
                        <?php echo $error; ?>
                    </ul>

                </div>
                <?php endif; ?>
                <div class="wrapper"> 
                    <div class="firstNameLabel"> 
                        <label>Patient First Name:</label>
                    </div>
                    <div>
                        <input type="text" name="patientFirstName" value="<?= $patientFirstName; ?>">
                    </div>
                    <div class="lastNameLabel">
                        <label>Patient Last Name:</label>
                    </div>
                    <div>
                        <input type="text" name="patientLastName" value="<?= $patientLastName; ?>">
                    </div>
                    <div class="marriedLabel">
                        <label>Patient Married Status:</label>
                    </div>
                    <div>
                        <input type="text" name="patientMarried" value="<?= $patientMarried; ?>">
                    </div>
                    <div class="birthLabel">
                        <label>Patient Birth Date:</label>
                    </div>
                    <div> 
                        <input type="date" name="patientBirthDate" value="<?= $patientBirthDate; ?>">
                    </div>
                    <div>
                        &nbsp;
                    </div>
                    <div>
                        <input class="submitButton" type="submit" name="storePatient" value="<?= ucfirst($action); ?> Patient Information" />
                    </div>
                    <div>
                        &nbsp;
                    </div>
                    <div>
                        <?php if ($action == 'edit'): ?> <input class="deleteButton" type="submit" name="deletePatient" value="Delete Patient" /> <?php endif; ?>
                    </div>



                </div>
    
            
        
            </form>


        </div>


    </div>
    
</body>
</html>