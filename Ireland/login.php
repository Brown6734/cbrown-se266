<?php 
include __DIR__ . '/model/model_IrelandFacts.php';



if(isset($_POST['login'])){
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    $user = login($username, $password);
   // var_dump($user);

    if(login($username, $password)){
        echo 'HELLO';
        session_start();
        $_SESSION['user']=$username;
        header('Location: view_IrelandFacts.php');
        exit();
    }
    else{
        $username = '';
        $password = '';
        $error_message = "something bad";
    }
}else{
    $username = '';
    $password = '';
}

    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
        <body>
    


            <form name="login_form" method="post">

                <h2>Login</h2>

                <?php if(!empty($error_message)): ?>
                    <p><?= htmlspecialchars($error_message); ?> </p>
                <?php endif; ?>

                <div class="container">
                    <div class="userLabel">
                        <label>Username: </label>
                    </div>

                    <div class="userInput">
                        <input type="text" name="username" value="<?= htmlspecialchars($username); ?>"/>
                    </div>

                    <div class="passLabel">
                        <label>Password: </label>
                    </div>

                    <div class="passInput">
                        <input type="password" name="password" value="<?= htmlspecialchars($password); ?>"/>
                    </div>

                    <div class="space1"> &nbsp; </div>

                    <div class="loginButton">
                        <input type="submit" name="login" value="login"/>
                    </div>

                </div>

            </form>

        </body>
</html>