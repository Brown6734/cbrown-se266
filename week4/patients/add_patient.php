<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_teams.php';
    
    $error = "";
    $patientFirstName = "";
    $patientLastName = "";
    $patientMarried = "";
    $patientBirthDate = "";
   
    if (isset($_POST['storePatient'])) {
        $patientFirstName = filter_input(INPUT_POST, 'patientFirstName');
        $patientLastName = filter_input(INPUT_POST, 'patientLastName');
        $patientMarried = filter_input(INPUT_POST, 'patientMarried', FILTER_VALIDATE_FLOAT);
        $patientBirthDate = filter_input(INPUT_POST, 'patientBirthDate');
        
        //if ($patientFirstName == "") $error .= "<li>Please provide first name</li>";
        //if ($patientLastName == "") $error .= "<li>Please provide last name</li>";
        //if ($patientMarried == "") $error .= "<li>Please provide married value</li>";
        //if ($patientBirthDate == "") $error .= "<li>Please provide birth date value</li>";
    }
    
    if(isset($_POST['storePatient']) && $error == ""){
        addPatient($patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
    }
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
//form results below
    if (isset($_POST['storePatient']) && $error == ""):
?>
    <h2>Patient was added </h2>

    <ul>
        <li> <?php echo "First Name: $patientFirstName;"?> </li>
        <li> <?php echo "Last Name: $patientLastName;"?> </li>
        <li> <?php echo "Married: $patientMarried;"?> </li>
        <li> <?php echo "Birth Date: $patientBirthDate;"?> </li>

    </ul>
    <a href="view_patients.php">view all patients</a>
    <?php endif; ?>

    <!--add patient form-->
    <h2> add new patient </h2>

    <form name="patient" method="post" action="add_patient.php"> 
        
        <?php 
        
            if ($error != ""):

        ?>

        <div class="error">

            <p>please fix errors and resubmit</p>
            <ul>
                <?php echo $error; ?>
            </ul>
        

        </div>
        <?php endif; ?>

        <!--form-->
        <div class="wrapper"> 
            <div class="firstLabel">
                <label> First Name: </label>
            </div>

            <div class="firstInput">
                <input type="text" name="first_name" value="<?= $patientFirstName; ?>"/>
            </div>

            <div class="lastLabel">
                <label> Last Name: </label>
            </div>

            <div class="lastInput">
                <input type="text" name="last_name" value="<?= $patientLastName; ?>"/>
            </div>

            <div class="marriedLabel">
                <label> Married: </label>
            </div>

            <div class="marriedInput">
                <input type="text" name="married" value="<?= $patientMarried; ?>"/>
            </div>

            <div class="birthLabel">
                <label> Birth Date: </label>
            </div>

            <div class="birthInput">
                <input type="date" name="birth_date" value="<?= $patientBirthDate; ?>"/>
            </div>

            <div> &nbsp; </div>

            <div> 
                <input type="submit" name="storePatient" value="Save New Patient info" />
            </div>

        </div>


    </form>
    
</body>
</html>