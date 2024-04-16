<?php

/*

application requirements

    create a basic intake form with the following fields
        first name
        last name
        married yes or no
        birth date
        height
        weight
    
    when the form is submitted, you must validate for
        first name cannot be an empty string
        last name cannot be an empty string
        a selection must be made for the Married field
        Birth date must be a valid date
        height must be a valid number (no negatives or weird numbers)
        weight must be a valid number (no negatives or unrealisticlly heavy weights)
    
    values for each of the form fields must "stick" when you submit the form

    once the form is submitted without errors, dispaly a confirmation page listing all the fields above along with the following
        patient age
        patient's BMI with one decimal value
        classification of BMI




*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    /*
    
    create a basic intake form with the following fields
        first name
        last name
        married yes or no
        birth date
        height
        weight
    */

    //initalize variables
    $firstName = '';
    $lastName = '';
    $married = '';
    $birthDate = '';
    $heightft = '';
    //$height = '';
    $heightin = '';
    $weight = '';

    //assign values to variables on POST back here
    //patient intake form assignment
    if (isset($_POST['patient_submit'])){
        //firstName - string
        $firstName = filter_input(INPUT_POST,'first_name');
        //lastName - string
        $lastName = filter_input(INPUT_POST,'last_name');
        //married - yes or no; boolean
        $married = filter_input(INPUT_POST, 'married');
        //birthDate - date
        $birthDate = filter_input(INPUT_POST, 'birth_date');

        //heightft - float
        $heightft = filter_input(INPUT_POST, 'heightft', FILTER_VALIDATE_FLOAT);
        //heightin - float
        $heightin = filter_input(INPUT_POST, 'heightin', FILTER_VALIDATE_FLOAT);
     
        
        //weight - float
        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);

    }

    //when form is submitted, display confirmation page with the following
    //patient age
    //patient's BMI with one decimal value
    //classification of BMI

    
    
    ?>
    <h1>Patient Intake Form: </h1>

    

    <!--patient intake form-->

    <form name="patient_intake" method="post">

        <label for="first_name">First Name: </label><br />
        <input type="text" id="first_name" name="first_name" value="<?= $firstName; ?>">

        <br />
        <br />

        <label for="last_name">Last Name: </label><br />
        <input type="text" id="last_name" name="last_name" value="<?= $lastName; ?>" >

        <br />
        <br />

        <label for="married">Married: </label><br />
        
        <!-- <//?php if(isset($_POST['choice']) && $_POST['choice'] == 'option1') -->

        <input type="radio" id="marriedyes" name="married" value="Yes" <?php if(isset($_POST['married']) && $_POST['married'] == 'Yes') echo 'checked'; ?> >
        <label for="married">Yes</label>
        
        <input type="radio" id="marriedno" name="married" value="No" <?php if(isset($_POST['married']) && $_POST['married'] == 'No') echo 'checked'; ?> >
        <label for="married">No</label>

        <br /> <br />

        <label for="birth_date">Birth Date: </label><br />
        <input type="date" id="birth_date" name="birth_date" value="<?= $birthDate; ?>" >

        <br /> <br />

        <!--field below is for height in feet-->
        <label for="heightft">Height in feet: </label><br />
        <input type="text" id="heightft" name="heightft" value="<?= $heightft; ?>">

        <br /> <br />
        <!--field below is for height in inches-->
        <label for="heightin">Height in inches: </label><br />
        <input type="text" id="heightin" name="heightin" value="<?= $heightin; ?>" >

        <br /> <br />

        <label for="weight">Weight: </label><br />
        <input type="text" id="weight" name="weight" value="<?= $weight; ?>" >
        
        <br /> <br />

        <input type="submit" name="patient_submit" value="Submit">



    </form>

    <!-- Patient Intake results (submit = patient_submit) -->


        <!--run functions here for BMI calculation and classifications-->
   

    

    <!--Only display on POST back -->

    <?php 

    function isFutureDate($date, $format="Y-m-d"){
        $currentDate = new DateTime();
        $inputDate = DateTime::createFromFormat($format, $date);
        return $inputDate && $inputDate > $currentDate;
    }

    ?>

    <?php
    
    //I am going to make a function that validates all fields

    function validateFields($firstName, $lastName, $married, $birthDate, $heightft, $heightin, $weight){
        if ($firstName == ''){
            return false;
        }
        if ($lastName == ''){
            return false;
        }
        if ($married == null){
            return false;
        }
        if (isFutureDate($birthDate)){
            return false;
        }
        if (floatval($heightft) == 0 or floatval($heightft) > 6){
            return false;
        }
        if (floatval($heightin) == 0 or floatval($heightin) > 12){
            return false;
        }
        if (floatval($weight) == 0 or floatval($weight) >= 240){
            return false;
        }
        return true;
    }

    /*
    
    first name cannot be an empty string
        last name cannot be an empty string
        a selection must be made for the Married field
        Birth date must be a valid date
        height must be a valid number (no negatives or weird numbers)
        weight must be a valid number (no negatives or unrealisticlly heavy weights)

    */

    ?>

    <!--birthDate must be a valid date (check if date is in future from today's date)-->





    <?php 

    
    
    //once the form is submitted without errors, display a confirmation page listing all the fields above along with the following
    //patient age
    //patient's BMI with one decimal value
    //classification of BMI

    function age($birthDate){
        $date = new DateTime($birthDate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    function isDate($dt){
        $date_arr = explode('-', $dob);
        return checkdate($date_arr[1], $date_arr[2], $date_arr[0]);
    }
    
    function bmi($heightft, $heightin, $weight){
        //you will need to write/fill in
        
        //The Body Mass Index (BMI) is calculated as follows
        //Weight in kg ÷ (height in meters)^2

        //here are some important conversions
        //kg = lb ÷ 2.20462
        //1 ft = 12 inches
        //1 inch = 2.54 cm = 0.0254 m
        //1 m = 39.4 in

        //first need to convert weight value from pounds to kg
        //kgWeight = weight ÷ 2.20462

        //make new weight variable to hold value of weight in kilograms
        $kgWeight = $weight / 2.20462;

        //next need to convert height value from feet and inches to meters
        //make a new variable that is equal to the total amount of inches for height
        $newHeight = $heightft * 12 + $heightin;

        //convert inches to meters
        //1 meter = 39.4 inches

        $meterHeight = $newHeight / 39.4;

        //square meterHeight
        $squaredHeight = $meterHeight * $meterHeight;

        //BMI = kgWeight ÷ squaredHeight
        $bmi = $kgWeight / $squaredHeight;

        //take bmi and round to one decimal place
        $bmi = round($bmi, 1);

        return $bmi;


    }

    function bmiDescription($bmi){
        //you will need to write/fill in

        
        
        //if BMI is less than 18.5, the person is underweight
        //if BMI is between 18.5 and 24.9, the person is normal
        //if BMI is between 25 and 29.9, the person is overweight
        //if BMI is 30 or more, the person is obese

        if ($bmi < 18.5){
            return 'Under weight';
          
        }elseif ($bmi >= 18.5 && $bmi <= 24.9){
            return 'Normal';
            
        }elseif ($bmi >= 25 && $bmi <= 29.9){
            return 'Overweight';
            
        }
        if ($bmi >= 30){
            return 'Obese';
            
        }
    }
    

    ?>

    <?php 
    
    $bmi = bmi($heightft, $heightin, $weight);

    ?>


    <?php if (validateFields($firstName, $lastName, $married, $birthDate, $heightft, $heightin, $weight) == true): ?>
        
        
    

        <?php if(isset($_POST["patient_submit"])): ?>
            
            <hr />
            <h2> Patient Intake Form Results: </h2>
            <p> <span class="result-label">First Name: </span> <?= $firstName; ?> </p>

            <p> <span class="result-label">Last Name: </span> <?= $lastName; ?> </p>

            <p> <span class="result-label">Married: </span> <?= $married; ?> </p>

            <p> <span class="result-label">Birth Date: </span> <?= $birthDate; ?> </p>

            <p> <span class="result-label">Height in feet: </span> <?= $heightft; ?> </p>

            <p> <span class="result-label">Height in inches: </span> <?= $heightin; ?> </p>

            
            <p> <span class="result-label">Weight: </span> <?= $weight; ?> </p>

            <!--run functions here for BMI calculation and classifications-->

            <!--patients age-->
            <p> <span class="result-label">Age: </span> <?= age($birthDate); ?> </p>

            <!--patients BMI with one decimal value-->
            <p> <span class="result-label">BMI: </span> <?= bmi($heightft, $heightin, $weight); ?> </p>

            <!--classification of BMI-->
            <p> <span class="result-label">BMI Classification: </span> <?= bmiDescription($bmi); ?> </p>

    
        <?php endif; ?>

    <?php endif; ?>

 
</body>
</html>