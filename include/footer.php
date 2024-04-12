


<?php
    //echo 'this is my footer';
    //echo 'time stamp it later';
?>

<hr/>
    <?php
        $file = basename($_SERVER['PHP_SELF']);
        $mod_date = date("F d Y h:i:s A", filemtime($file));
        echo "File last updated $mod_date";
        //got this from include/footer.php (example code on git hub)
    ?>

