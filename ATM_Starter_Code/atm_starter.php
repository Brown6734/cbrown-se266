
<?php 

include 'checking.php';
include 'savings.php';
include 'functions.php';
//include 'account.php';
//require __DIR__ . '/checking.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');


?>

<?php

    $checking = new CheckingAccount ('C123', $_POST['checkingBalance'], '12-20-2019');
    $savings = new SavingsAccount('S123', $_POST['savingsBalance'], '03-20-2020');
    

    if (isset ($_POST['withdrawChecking'])) 
    {
        echo "I pressed the checking withdrawal button";        
        //$checking = new CheckingAccount ('C123', 1000, '12-20-2019');
        //$checking->withdrawal('checkingWithdrawAmount');
        //$checking2 = new checkingAccount('C123', 1300, '12-20-2019');


        //$checking = new CheckingAccount ('C123', $checking->getBalance(), '12-20-2019');
        $checking->withdrawal(floatval($_POST['checkingWithdrawAmount']));

        //$checkingWithdrawAmount = $_POST['checkingWithdrawAmount'];
        //$checkWithdrawSubmit = $_POST['withdrawChecking'];

        //$happyDays = withdrawal($checkingWithdrawAmount);
       

        echo '<br /> <br />';
        //echo $checkWithdrawSubmit . " this is the submit ";
        //echo '<br /> <br />';
        
        //$checkingWithdrawAmount-> withdrawal(floatval($checkingWithdrawAmount));

        //withdrawal($checkingWithdrawAmount);

        //$withFunction = withdrawal($checkingWithdrawAmount);

        //echo '<br /> <br />';
        //echo $checkingWithdrawAmount . " this is the checkingWithdrawAmount";
       

        //$checkingWithdrawAmount-> withdrawal($checkingWithdrawAmount);

        //php error
        //uncaught error: call to a member function on string

        //$checking2 = new checkingAccount('C123', 'checkingWithdrawAmount', '12-20-2019');
        echo '<br /> <br />';
    } 
    else if (isset ($_POST['depositChecking'])) 
    {
        echo "I pressed the checking deposit button";
        echo '<br /> <br />';

        //$checking = new checkingAccount ('C123', 1300, '12-20-2019');
        //$checking = new CheckingAccount ('C123', $checking->getBalance(), '12-20-2019');
        $checking->deposit(floatval($_POST['checkingDepositAmount']));
        //I want to update checking balance in form


        // $checkingDepositAmount = $_POST['checkingDepositAmount'];

    } 
    else if (isset ($_POST['withdrawSavings'])) 
    {
        echo "I pressed the savings withdrawal button";

        $savings->withdrawal(floatval($_POST['savingsWithdrawAmount']));

        echo '<br /> <br />';
    } 
    else if (isset ($_POST['depositSavings'])) 
    {
        echo "I pressed the savings deposit button";
        $savings->deposit(floatval($_POST['savingsDepositAmount']));
        echo '<br /> <br />';
    } 
     
?>



<?php

//Week 3 Task - Simulate an ATM

//In this assignment, you will create a basic ATM. You will need to be able to deposite or withdraw from either a Checking or Savings account. Both these accounts function essentially the same, **but you cannot allow a Savings account to go into the negative.** With the Checking Account, you can go to $200 overdrawn. 

/*

In this assignment, you need to create at least four files: account.php, checking.php, savings.php, and atm.php. (atm.php ?==? atm_starter.php)

atm.php (atm_starter.php) requirements
- Implements the user interface
- Should include checking.php and savings.php
- Any POST or GET activity should be handled in a seperate function file

account.php requirements
- Complete implementations for the PHP classes Account, CheckingAccount, and SavingsAccount
- The Account class is an abstract class with **protected** properties for the **account id**, **start date**, and **balance**.
    - The **constructor** has three arguments to initialize all properties.
    - The method **deposit** will add the amount passed to the **balance**.
    - The **withdrawal** and **getAccountDetails** methods are an abstract function with one argument.
    - It should have three getter methods for returning **start date**, **balance**, and **account id**.

checking.php requirements
- CheckingAccount extends the Account class
    - Implements the **withdrawal** method
    - Override **getAccountDetails** by outputting ** "Checking Account" ** and then calling **getAccountDetails** from the **Account** class

    -an important function for this
    public function getAccountDetails(){
        $str = "<h2>Checking Account</h2>";
        $str .= parent::getAccountDetails();
        return $strt;
    }

savings.php requirements
- **SavingsAccount** implements the same methods as the checking account
- You can test your classes with following code snippet in a driver program (what is that??)

$checking = new CheckingAccount ('C123', 1000, '12-20-2019');
$checking->withdrawal(200);
$checking->deposit(500);

$savings = new SavingsAccount('S123', 5000, '03-20-2020');
echo $checking->getAccountDetails();
echo $savings->getAccountDetails();
echo $checking->getStartDate();

It should produce the following output

Checking Account

dot Account ID: C123
dot Balance: $1,300.00
dot Accout Opened: 12-20-2019

Savings Account

dot Account ID: S123
dot Balance: $5,000.00
dot Account Opened: 03-20-2020


//array 9 - 
//checkingAccountId
//checkingDate
//checkingBalance
//checkingWithdrawAmount
//withdrawChecking
//checkingDepositAmount
//savingsBalance
//savingsWithdrawAmount
//savingsDepositAmount

*/



?>

array(9){
    ["checkingAccountId"]=> string(4) "C123"
    ["checkingDate"]=> string(10) "12-20-2069"
    ["checkingBalance"]=> string(4) "1300"
    ["checkingWithdrawAmount"]=> string(0) ""
    ["withdrawChecking"]=> string(8) "Withdraw"
    ["checkingDepositAmount"]=> string(0) ""
    ["savingsBalance"]=> string(4) "5000"
    ["savingsWithdrawAmount"]=> string(0) ""
    ["savingsDepositAmount"]=> string(0) ""
}




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <style type="text/css">
        body {
            margin-left: 120px;
            margin-top: 50px;
        }
       .wrapper {
            display: grid;
            grid-template-columns: 300px 300px;
        }
        .account {
            border: 1px solid black;
            padding: 10px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 80px;}
        .error {color: red;}
        .accountInner {
            margin-left:10px;margin-top:10px;
        }
    </style>
</head>
<body>

    <form method="post">
               
    <h1>ATM</h1>
        <div class="wrapper">
            
            <div class="account">
                <h2>Checking Account</h2>
                <li>Account ID: C123</li>
                <li>Balance: <?= $checking->getBalance(); ?></li>
                <li>Account Opened: 12-20-2019</li>
                
                <input type="hidden" name="checkingDate" value="12-20-2069" />
                <input type="hidden" name="checkingBalance" value="<?= $checking->getBalance(); ?>" />
                <?php 
                //echo $checking->getAccountDetails();
                //Have to get the updated balance from the deposit function that is called above


                ?>

                    <div class="accountInner">
                        <input type="text" name="checkingWithdrawAmount" value="<?= $_POST['checkingWithdrawAmount']; ?>" />
                        <input type="submit" name="withdrawChecking" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="text" name="checkingDepositAmount" value="<?= $_POST['checkingDepositAmount']; ?>" />
                        <input type="submit" name="depositChecking" value="Deposit" /><br />
                    </div>
            
            </div>

            <div class="account">
                    <ul>
                        <h2>Savings Account</h2>
                        <li>Account ID: S123</li>
                        <li>Balance: <?php echo $savings->getBalance(); ?></li>
                        <li>Account Opened: 03-20-2020</li>
                    </ul>
                    <input type="hidden" name="savingsDate" value="03-20-2020" />
                    <input type="hidden" name="savingsBalance" value="<?= $savings->getBalance(); ?>" />
               
                    
                    <div class="accountInner">
                        <input type="text" name="savingsWithdrawAmount" value="<?= $_POST['savingsWithdrawAmount']; ?>" />
                        <input type="submit" name="withdrawSavings" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="text" name="savingsDepositAmount" value="<?= $_POST['savingsDepositAmount']; ?>" />
                        <input type="submit" name="depositSavings" value="Deposit" /><br />
                    </div>
            
            </div>
            
        </div>
    </form>
</body>
</html>
