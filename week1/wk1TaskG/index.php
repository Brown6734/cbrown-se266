<?php

//echo "please work";

//require 'index.view.php';


//if $math1 (and $math2) are equal to 0, echo a word on screen

//if ($math1 == 0) {
  //  echo '&nbsp; &nbsp;';
  //  echo 'number is divisible by 2';
//}

//if ($math2 == 0){
  //  echo '&nbsp; &nbsp;';
  //  echo 'number is divisible by 3';
//}
//else{
 //   echo '&nbsp; &nbsp;';
 //   echo 'number is not divisible by 2 or 3';

//}

//the two if statements above work with any number 1 - 100
//if number is only divisble by 2, only the first if statement will run
//if number is only divisble by 3, only the second if statement will run
//if number is divisble by both 2 and 3, both if statements will run
//if number is not divisble by 2 or 3, only the else statement will run

//put the if and else statements in a function called fizzBuzz

$numArray = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26','27','28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '66', '67', '68', '69', '70', '71', '72', '73', '74', '75', '76', '77', '78', '79', '80', '81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92', '93', '94', '95', '96', '97', '98', '99', '100'];



function fizzBuzz($num){

    
    //display Fizz if the number a multiple of 2
    //display Buzz if the number is a multiple of 3
    //display FizzBuzz if the number is a multiple of 2 and 3

    

    $calc1 = $num % 2;
    $calc2 = $num % 3;

    if ($calc1 == 0){
        echo '<br>';
        echo 'Fizz';
        echo "&nbsp; &nbsp; $num";
        echo '<br>';
      
    }
    if ($calc2 == 0){
        echo '<br>';
        echo 'Buzz';
        echo "&nbsp; &nbsp; $num";
        echo '<br>';
        
    }
    if ($calc1 == 0 && $calc2 == 0){
        echo '<br>';
        echo 'Fizz Buzz';
        echo "&nbsp; &nbsp; $num";
        echo '<br>';
       
    }
    //calc 1 checks if $num is divisible by 2
    //calc 2 checks if $num is divisible by 3

    //if ($calc1 != 0 && $calc2 != 0){do things here}

    if ($calc1 != 0 && $calc2 != 0){
        echo '<br>';
        echo $num;
        echo ': This number is not a multiple of 2 or 3 &nbsp;';
        //echo '&nbsp; &nbsp; not good buhuh &nbsp; &nbsp;';
        echo '<br>';
    }

   



}

//% = division with remainder math


//when it works, include a for loop HERE/BELOW
//in the for loop, call the function
//by doing something like fizzBuzz(#);
//C:\xampp\htdocs\cbrown-se266\week1\wk1TaskG\index.php



for ($i = 0; $i < count($numArray); $i++){
    echo fizzBuzz($numArray[$i]);
   // echo '<br>';
}


require 'index.view.php';