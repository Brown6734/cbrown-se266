<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Brown: Week 1 Tasks</title>

        
    </head>
    <body>


    <!--

    'title' => 'go to the store',
    'due' => 'today',
    'assigned to' => 'Brandon',
    'completed' => false

    -->
        <h1>Task For The Day</h1>

        <ul>

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
                <strong>Status: </strong> <?= $task['completed'] ? 'Complete' : 'Incomplete'; ?>
            </li>
        </ul>


            
    
    </body>
    

</html>





