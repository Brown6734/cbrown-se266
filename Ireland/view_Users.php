<?php 
    session_start();
    include __DIR__ . '/header.php';
    include __DIR__ . '/model/model_Users.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view users</title>
    <link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body>
    <div class="container">
        <div class="user1">
            <h1>users</h1>
            <?php if(isset($_SESSION['user'])): ?>
                <h4>Welcome <?= $_SESSION['user']; ?></h4>
                <b><a href="searchIrelandFacts.php">search Ireland Facts</a></b><br>
                <b><a href="logout.php">logout</a></b><br>
            <?php else: ?>
            <b><a href="login.php">login</a></b><br>
            <?php endif; ?>
            <a href="add_User.php">Add New User</a>
        
            <?php 
                if (isset($_POST['deleteUser'])){
                    $UserID = filter_input(INPUT_POST, 'UserID');
                    deleteUser($UserID);
                }

                $Users = getUsers();

            ?>

            <table class="userTable">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($Users as $u): ?>
                        <tr>
                            <td>
                            <!--form for delete stuff--->
                                <form action="view_Users.php" method="post">
                                    <input type="hidden" name="UserID" value="<?= $u['UserID']; ?>"/>
                                    <input type="submit" name="deleteUser" value="delete"/>
                                    <?= $u['UserID']; ?>
                                </form>
                            </td>
                            <td><?= $u['username']; ?></td>
                            <td><?= $u['password']; ?></td>
                            <!--link for update stuff-->
                            <td><a href="update_User.php?UserID=<?= $u['UserID']; ?>">edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br />

            <a href="add_User.php?action=Add">Add New User</a>
        </div>
    </div>

    <?php 

    include __DIR__ . '/footer.php';
    
    ?>

</body>
</html>




