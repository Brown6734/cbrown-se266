<?php


    //you can have your functions on a seperate file
    //you have to rememeber to
    //require the file in your index.php file
    


    function dd($data){

        //var_dump($one, $two, $three);

        echo '<pre>';
        die(var_dump($data));    
        echo '</pre>';

    }