<?php 

    //this code runs everything/time the page loads
    require_once "controllers/updateController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <p></p>
        
        <form action="updatePatient.php" method="post"> 

        <div>
            <div><h4><?= $action; ?> Patient</h4></div>

        <p></p>
            <div class="form group">
                <label for="patientFirstName">Patient First Name:</label>

                <div>
                    <input type="text" id="patientFirstName" placeholder="Enter Patient First Name" name="patientFirstName" value="<?= $patientFirstName; ?>">
                </div>
            </div>

            <div class="form group2">
                <label for="patientLastName">Patient Last Name:</label>
            
                <div>
                    <input type="text" id="patientFirstName" placeholder="Enter Patient Last Name" name="patientLastName" value="<?= $patientLastName; ?>">
                </div>
            </div>

            <div class="form group3">
                <label for="patientMarried">Patient Married:</label>
            
                <div>
                    <input type="text" id="patientMarried" placeholder="Enter Patient Married" name="patientMarried" value="<?= $patientMarried; ?>">
                </div>
            </div>

            <div class="form group4">
                <label for="patientBirthDate">Patient Birth Date:</label>
            
                <div>
                    <input type="date" id="patientBirthDate" name="patientBirthDate" value="<?= $patientBirthDate; ?>">
                </div>
            </div>

            <div class="submit form group">
                <div>
                    <button type="submit"><?php echo $action; ?> Patient</button>
                </div>
            </div>
        </div>

        <p></p>
        <div class="panel panel-warning">
            <div class="panel-heading"><strong>This is for testing and verification: </strong></div>
            Action: <input type="text" name="action" value="<?= $action; ?>">
            Patient ID: <input type="text" name="id" value="<?= $id; ?>">
        </div>

        </form>

        <div>
            <a href="./viewPatients.php">View Patients</a>
        </div>

    </div>
    
</body>
</html>