<?php 
    include __DIR__ . '/model/model_patients.php;';
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
            <h1>Patients</h1>
            <a href="patients.php?action=add">Add New Patient</a>

            <?php 
                $patients = getPatients();
            ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient First Name</th>
                        <th>Patient Last Name</th>
                        <th>Patient Married</th>
                        <th>Patient Birth Date</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $p): ?>
                        <tr>
                            <td><?= $p['id']; ?></td>
                            <td><?= $p['patientFirstName']; ?></td>
                            <td><?= $p['patientLastName']; ?></td>
                            <td><?= $p['patientMarried']; ?></td>
                            <td><?= $p['patientBirthDate']; ?></td>
                            <td>
                                <a href="patients.php?action=edit&id=<?= $p['id']; ?>">Edit </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <br />
            <a href="patients.php?action=add">Add New Patients</a>

        </div>
    </div>
    
</body>
</html>