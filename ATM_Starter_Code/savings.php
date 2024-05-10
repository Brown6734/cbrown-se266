<?php

require_once "./account.php";
 
class SavingsAccount extends Account 
{

	public function withdrawal($amount) 
	{
		// write code here. Return true if withdrawal goes through; false otherwise
		//abstract public function withdrawal($amount);
		//check if the amount is greater than the balance

		if ($this->balance > $amount){
			echo '<br /> <br />';
			echo ' balance is greater than amount ';
			$this->balance -= $amount;

			echo '<br /> <br />';
			return true;

			return $this->getBalance();
		} else
		{
			//echo 'cannot withdraw more than balance';
			$this->balance = 0;
			return false;
			
		}
		

		//C:\xampp\htdocs\cbrown-se266\ATM_Starter_Code
		
	} //end withdrawal

	public function getAccountDetails() 
	{
	   // look at how it's defined in other class. You should be able to figure this out ...
	   $accountDetails = "<h2>Savings Account</h2>";
	   $accountDetails .= parent::getAccountDetails();

	   return $accountDetails;
	} //end getAccountDetails
	
} // end Savings

// The code below runs everytime this class loads and 
// should be commented out after testing.

    //$savings = new SavingsAccount('S123', 5000, '03-20-2020');
    
	
    //echo $savings->getAccountDetails();
	//echo '<br /> <br />';
    
?>
