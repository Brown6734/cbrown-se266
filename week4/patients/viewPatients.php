<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">

        <div>
            <h1>Patients</h1>
            <a href="add_patient.php">add new patient</a>
        

        <?php 
        
            include __DIR__ . '/model/model_patients.php';

            $patients = getPatients();
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
                        <td>
                            <form action="view_patients.php" method='post'>
                                <input type="hidden" name="patientId" value="<?= $p['id'];?>"/>
                                <input class="" type="submit" name="addPatient" value="Add" />
                            </form>
                        </td>
                        <td><?= $p['patientFirstName']; ?></td>
                        <td><?= $p['patientLastName']; ?></td>
                        <td><?= $p['patientMarried']; ?></td>
                        <td><?= $p['patientBirthDate']; ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>

        <br />
        <a href="add_patient.php?action=Add">Add new patient</a>

    </div>
    </div>
    
</body>
</html>