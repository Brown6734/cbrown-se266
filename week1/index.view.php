<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Brown: Week 1 Task C</title>

        <style>

            /*below is some styling for the HTML header*/
            header{
                background: #e3e3e3;
                padding: 2em;
                text-align: center;
            }

        </style>
    </head>
    <body>
    
            <ul>

                <!--below: 
                    is a way to call the animals array from the index.php file

                -->
                <?php foreach ($animals as $animal) : ?>
                   
                   <li><?= $animal; ?></li>
                
                <?php endforeach; ?>

                


            </ul>
    
    </body>
    

</html>





