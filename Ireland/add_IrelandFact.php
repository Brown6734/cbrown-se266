<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_IrelandFacts.php';
    
    $error = "";
    $factShortName = "";
    $factLong = "";

    if(isset($_POST['storeIrelandFact'])){
        $factShortName = filter_input(INPUT_POST, 'factShortName');
        $factLong = filter_input(INPUT_POST, 'factLong');

        if ($factShortName == "") $error .= "<li>Please enter a fact short name</li>";
        if ($factLong == "") $error .= "<li>Please enter a fact long</li>";
    }

    if (isset($_POST['storeIrelandFact']) && $error == ""){
        addIrelandFact($factShortName, $factLong);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ireland Fact</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>

    <!--form results-->
    <?php 
        if(isset($_POST['storeIrelandFact']) && $error == ""):
    ?>
            <h2> Fact was added </h2>

            <ul>
                <li><?php echo "Fact Short Name: $factShortName"?></li>
                <li><?php echo "Fact Long: $factLong"?></li>
            </ul>
            <a href="view_IrelandFacts.php">View all Ireland Facts</a>
    
    <?php endif ?>

    <!--add new fact form-->
    <h2>Add New Ireland Fact</h2>
    
    <form name="fact" method="post" action="add_IrelandFact.php">
        <!--if error is not empty, list errors-->
        <?php if($error != ""): ?>
            <div class="error">
                <p>Please fix the following and resubmit</p>
                <ul>
                    <?php echo $error; ?>
                </ul>    
            <div>
        <?php endif; ?>

        <!--form part below-->

        <div class="wrapper">
            <div class="shortLabel2">
                <label>Fact Short Name: </label>
            </div>
            <div class="shortText2">
                <input type="text" name="factShortName" value="<?= $factShortName; ?>"/>
            </div>
            <div class="longLabel2">
                <label>Fact Long: </label>
            </div>
            <div class="longText2">
                <input type="text" name="factLong" value="<?= $factLong; ?>"/>
            </div>
            <div class="space4"> &nbsp; </div>
            <div class="storeFact">
                <input type="submit" name="storeIrelandFact" value="save new fact info"/>
            </div>    
        
        <div>
    </form>

    <br />
    
</body>
</html>