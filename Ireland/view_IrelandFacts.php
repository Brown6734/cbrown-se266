<?php 
    session_start();

    include __DIR__ . '/model/model_IrelandFacts.php';
    include __DIR__ . '/model/model_QuizValues.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ireland Facts</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

    <div class="container">

        <div class="viewFacts1">
            <h1>Ireland Facts</h1>
            <?php if(isset($_SESSION['user'])): ?>
                <h4>Welcome <?= $_SESSION['user']; ?></h4>
                <b><a href="searchIrelandFacts.php">search Ireland Facts</a></b><br>
                <b><a href="searchQuizValues.php">search Quiz Values</a></b><br>
                <b><a href="logout.php">logout</a></b><br>
            <?php else: ?>
            <b><a href="login.php">login</a></b><br>
            <?php endif; ?>
            <a href="add_IrelandFact.php">Add New Ireland Fact</a>

        <?php 
            if(isset($_POST['deleteIrelandFact'])){
                $factID = filter_input(INPUT_POST, 'factID');
                deleteIrelandFact($factID);
            }

            $IrelandFacts = getIrelandFacts();

        ?>

        <table class="viewFactsTable">
            <thead>
                <tr>
                    <th>Fact ID</th>
                    <th>Fact Short Name</th>
                    <th>Fact Long</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($IrelandFacts as $f): ?>
                    <tr>
                        <td><?= $f['factID']; ?></td>
                        <td><?= $f['factShortName']; ?></td>
                        <td><?= $f['factLong']; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="factID" value="<?= $f['factID']; ?>"/>
                                <input type="submit" name="deleteIrelandFact" value="delete"/>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br />
        <a href="edit_IrelandFact.php?action=Add">Add New Ireland Fact</a>

        </div>


    </div>
    
</body>
</html>