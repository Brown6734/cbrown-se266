<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brown Week 1 Task E</title>
</head>
<body>

    <!--This is the heading for the page-->
    <h1>Task For The Day</h1>

        <ul>

            <!--the three list items below show things on the page (Title, Due, Assigned To)-->
            <li>
                <strong>Name: </strong> <?= $task['title']; ?>
            </li>

            <li>
                <strong>Due Date: </strong> <?= $task['due']; ?>
            </li>

            <li>
        
                <strong>Person Responsible: </strong> <?= $task['assigned to']; ?>
            </li>

            <li>

            
                

                <!-- The tunerary operator is shown below-->

                <!--<strong>Status: </strong> <//?//= $task['completed'] ? 'Complete' : 'Incomplete'; ?>-->

                <strong>Status: </strong>

                <?php

                    // ! true/false = opposite/not
                    if (! true){
                        echo 'Incomplete';
                    }
                    


                ?>

                <!--If the 'completed' is true - show a check mark; else, say its Incomplete-->
                <?php if($task['completed']) : ?>

                    <span class="icon">&#9989;</span>


                <?php else : ?>

                <!--if completed is false, show the word Incomplete on the screen-->
                    <span class="icon">Incomplete</span>
                
                <?php endif; ?>

                <!--<//?php

                    if ($task['completed']) {
                        //echo 'Finished';

                        echo '&#9989;';

                    } else {
                        echo 'Incomplete';
                    }
                
                ?>-->
            </li>

            <!--'urgent' => true-->

            <li>

                <!--displays the word Urgent on the screen/page-->
                <strong>Urgent: </strong>

                <?php if ($task['urgent']) : ?>

                <!--if 'urgent' is true, show a triangle with an exclamation mark inside it (a hazard icon)-->
                    <span class="icon">&#9888;</span>
                <?php else : ?>

                <!--if 'urgent' is false, display the text Not Urgent on the screen/page-->
                    <span class="icon">Not Urgent</span>
                <?php endif; ?>

            </li>
        </ul>
</body>
</html>