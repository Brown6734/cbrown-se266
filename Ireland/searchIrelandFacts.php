<?php 
    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: restricted.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link to css style page here-->
    <title>Search Ireland Facts</title>
</head>
<body>
    <div class="container">
        <div class="FactTitle1">
            <h1>Ireland Facts</h1>

            <a href="view_IrelandFacts.php">view all facts</a>

            <a href="searchQuizValues.php">search quiz values</a>

        <?php 
        
            include __DIR__ . '/model/model_IrelandFacts.php';
            include __DIR__ . '/model/model_QuizValues.php';

            if(isset($_POST['search'])){
                $factShortName = filter_input(INPUT_POST, 'factShortName');
                $factLong = filter_input(INPUT_POST, 'factLong');
            }
            else{
                $factShortName = "";
                $factLong = "";
            }

            $IrelandFacts = searchIrelandFacts($factShortName, $factLong);
        
        ?>

        <form method="POST" name="search_IrelandFacts">
            <div class="wrapper">

                <div class="shortLabel">
                    <label>Fact Short Name: </label>
                </div>

                <div class="shortText">
                    <input type="text" name="factShortName" value="<?= $factShortName; ?>"/>
                </div>

                <div class="longLabel">
                    <label>Fact Long: </label>
                </div>

                <div class="longText">
                    <input type="text" name="factLong" value="<?= $factLong; ?>"/>
                </div>

                <div class="space2"> &nbsp; </div>

                <div class="searchButton">
                <input type="submit" name="search" value="search"/>
                </div>
            </div>

        </form>

        <table class="factTable">
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
                        <td>
                            <!--form for delete functionality-->
                            <form action="view_IrelandFacts.php" method="post">
                                <input type="hidden" name="FactsID" value="<?= $f['FactsID']; ?>"/>
                                <input type="submit" name="delete" value="delete"/>
                                <?= $f['FactsID']; ?>
                            </form>
                        </td>
                        <td><?= $f['factShortName']; ?> </td>
                        <td><?= $f['factLong']; ?> </td>
                        <!--link for update functionally; passing in ID using php-->
                        <td><a href="update_IrelandFacts.php?FactsID=<?= $f['FactsID']; ?>">Edit</a></td>
                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>
        <br />
    
    </div>
    </div>
</body>
</html>