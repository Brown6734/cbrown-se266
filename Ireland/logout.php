<?php 

    session_start();

        include __DIR__ . '/model/model_IrelandFacts.php';
        include __DIR__ . '/model/model_QuizValues.php';
        
        //session_unset();
        session_destroy();
        header('Location: view_IrelandFacts.php');
?>