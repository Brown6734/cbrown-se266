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
                
        
            </ul>

            <!--unordered list for task array-->

            <ul>

                    

                        <!--php section for task array-->
                        <!--for each $task as $question => $answer-->

                        <!--<li> <strong> <//?= question; //?//>// </strong> <//?= answer; //?//> </li>-->

                        <?php foreach ($task as $question => $answer) : ?>

                            <li> <strong> <?= $question; ?> </strong> <?= $answer; ?> </li>
                        
                        <?php endforeach; ?>


                        <!--title => 'go to the store',-->
                        <!--due => 'today',-->
                        <!--assigned_to => 'Brandon',-->
                        <!--completed => 'no'-->

                        <!--key, value-->
                        <!--key = description? not title; question? -->
                        <!--value = answer? response? reply?-->
                    
                    
                    

            </ul>
    
    </body>
    

</html>





