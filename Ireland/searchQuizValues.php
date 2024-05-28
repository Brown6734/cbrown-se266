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
    <title>Search Quiz Values</title>
</head>
<body>
    <div class="container">
        <div class="quiz1">
            <h1>Quiz Values</h1>

            <a href="view_QuizValues.php">view all quiz values</a>

            <a href="searchIrelandFacts.php">search Ireland facts</a>
        <?php 
                
            include __DIR__ . '/model/model_IrelandFacts.php';
            include __DIR__ . '/model/model_QuizValues.php';
    
            if(isset($_POST['search'])){
                $question = filter_input(INPUT_POST, 'question');
                $correctAnswer = filter_input(INPUT_POST, 'correctAnswer');
            }
            else{
                $question = "";
                $correctAnswer = "";
            }
    
            $QuizValues = searchQuizValues($question, $correctAnswer);
        
        ?>

        <form method="POST" name="search_QuizValues">
            <div class="wrapper">
                <div class="questionLabel">
                    <label>Question: </label>
                </div>
                <div class="questionText">
                    <input type="text" name="question" value="<?= $question; ?>"/>
                </div>
                <div class="correctLabel">
                    <label>Correct Answer: </label>
                </div>
                <div class="correctText">
                    <input type="text" name="correctAnswer" value="<?= $correctAnswer; ?>"/>
                </div>
                <div class="space3"> &nbsp; </div>
                <div class="quizButton">
                    <input type="submit" name="search" value="search"/>
                </div>

            </div>

        </form>

        <table class="quizTable">
            <thead>
                <tr>
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
                <?php foreach ($QuizValues as $q): ?>
                    <tr>
                        <td>
                            <!--form for delete stuff-->
                            <form action="view_QuizValues.php" method="post">
                                <input type="hidden" name="QuizID" value="<?= $q['QuizID'] ?>"/>
                                <input type="submit" name="delete" value="delete"/>
                                <?= $q['QuizID']; ?>
                            </form>
                        </td>
                        <td><?= $q['question']; ?></td>
                        <td><?= $q['correctAnswer']; ?></td>
                        <td><?= $q['wrongAnswer1']; ?></td>
                        <td><?= $q['wrongAnswer2']; ?></td>
                        <td><?= $q['wrongAnswer3']; ?></td>
                        <!--link for update stuff; passing in ID using php-->
                        <td><a href="edit_QuizValues.php?action=Update&QuizID=<?= $q['QuizID']; ?>">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>    

        </table>
        <br />
        
        
        </div>


    </div>
    
</body>
</html>