<?php 
    session_start();

    include __DIR__ . '/model/model_QuizValues.php';
    include __DIR__ . '/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Values</title>
    <link rel="stylesheet" type="text/css" href="style4.css">
</head>
<body>
    <div class="container">
        <div class="quiz1">
            <h1>Quiz Values</h1>
            <?php if(isset($_SESSION['user'];)): ?>
                <h4>Welcome <?= $_SESSION['user']; ?></h4>
                <b><a href="searchQuizValues.php">search quiz values</a></b><br>
                <b><a href="logout.php">logout</a></b><br>
            <?php else: ?>
            <b><a href="login.php">login</a></b><br>
            <?php endif; ?>
            <a href="add_QuizValues.php">Add New Quiz Value</a>
        
        <?php 
            if(isset($_POST['deleteQuizValue'])){
                $QuizID = filter_input(INPUT_POST, 'QuizID');
                deleteQuizValue($QuizID);
            }

            $QuizValues = getQuizValues();

        ?>

        <table class="quizTable">
            <thead>
                <tr>
                    <!--change this part to the quiz part-->
                    <th>Quiz ID</th>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Wrong Answer 1</th>
                    <th>Wrong Answer 2</th>
                    <th>Wrong Answer 3</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($QuizValues as $q): ?>
                    <tr>
                        <td>
                            <!--form for delete stuff--->
                            <form action="view_QuizValues.php" method="post">
                                <input type="hidden" name="QuizID" value="<?= $q['QuizID']; ?>"/>
                                <input type="submit" name="deleteQuizValue" value="delete"/>
                                <?= $q['QuizID']; ?>
                            </form>
                        </td>
                        <td><?= $q['question']; ?></td>
                        <td><?= $q['correctAnswer']; ?></td>
                        <!--link for update stuff; pass ID using PHP-->
                        <td><a href="edit_QuizValues.php?action=Update&QuizID=<?= $q['QuizID']; ?>">edit</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!--form here for quiz-->
        <form name="quizPart" method="post" action="view_QuizValues.php">
            <div class="quizWrapper">
                <div class="question">
                    <!--get a random question and its answers from database-->
                    <!--<label>Question: <//?php $_POST[random_int(getQuizValue)];?> </label>-->
                </div>
                

            </div>
        </form>

        <br />

        <a href="edit_QuizValues.php?action=Add">Add new quiz value </a>

        </div>
    </div>
    
</body>
</html>