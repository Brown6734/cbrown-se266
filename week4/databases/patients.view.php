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

    <div class="container"> 

        <div>
            <h1>Patients </h1>
            <a href="patients.php">Add New Patient</a>
        </div>

        <?php 
            $patients = getPatients ();
        ?>

        <table> 

            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Married</th>
                    <th>Birth Date</th>
                </tr>
            </thead>

            <tbody> 

            <?php foreach ($patients as $p): ?>
                <tr> 
                    <td><?= $p['id'];?></td>
                    <td><?= $p['patientFirstName'];?></td>
                    <td><?= $p['patientLastName'];?></td>
                    <td><?= $p['patientMarried'];?></td>
                    <td><?= $p['patientBirthDate'];?></td>
                </tr>
            <?php endforeach; ?>

            </tbody>

        </table>

        <br />
        <a href="patients.php">Add New Patient </a>

    </div>
    
</body>
</html>