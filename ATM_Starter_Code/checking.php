<?php
 
require_once "./account.php";

class CheckingAccount extends Account 
{
	const OVERDRAW_LIMIT = -200;

	public function withdrawal($amount) 
	{
		// write code here. Return true if withdrawal goes through; false otherwise
		//abstract public function withdrawal($amount);
		//check if the amount is greater than the balance

		// if ($amount > $this->balance){
		// 	echo 'happy';
		// 	echo '<br /> <br />';
		// 	echo true;
		// }

		//$_POST['checkingWithdrawAmount'];

		//$checkAmount = $_POST['checkingWithdrawAmount'];

		//echo $checkAmount . " this is checkAmount";
		echo '<br /> <br />';

		// $whatBal = $this->balance;
		// echo $whatBal . " this is whatBal";
		// echo '<br /> <br />';




		if ($this->balance > $amount){
			echo '<br /> <br />';
			echo 'words';
			$this->balance -= $amount;

			echo '<br /> <br />';
			$checkBal = $this->balance;
			echo $checkBal . " this is checkBal";

			echo '<br /> <br />';
			return true;

			//return $this->getAccountDetails();
			return $this->getBalance();

			// Uncaught Error: Call to a member function getAccountDetails() on float

			
			//this one returned true
			//checking account can go $200 overdrawn
		} elseif ($this->balance >= -200){
			echo '<br /> <br />';
			echo 'happy days';
			$this->balance -= $amount;

			echo '<br /> <br />';
			$checkBal2 = $this->balance;
			echo $checkBal2 . " this is checkBal2";

			echo '<br /> <br />';

			return true;
			//this one returned false
		} else{
			$this->balance = -200;
			return false;
		}

		// if ($this->balance < $amount){
		// 	echo 'stuff';
		// 	echo '<br /> <br />';
		// 	echo true;
		// }

		//if ($amount > 200) {
			//return false;
		//} elseif ( $amount < 200) {
			//$this->balance -= $amount;
		//	return true;
		//}
		
		//echo '<br /> <br />';
		//$checkStuff = $this->balance;
		//echo $checkStuff;
		//echo '<br />';

		//return $this->balance;
		
	} // end withdrawal

	//freebie. I am giving you this code.
	public function getAccountDetails() 
	{
		$accountDetails = "<h2>Checking Account</h2>";
		$accountDetails .= parent::getAccountDetails();
		
		return $accountDetails;
	}
}


// The code below runs everytime this class loads and 
// should be commented out after testing.

//$checking = new CheckingAccount ('C123', 1000, '12-20-2019');
//$checking->withdrawal(200);
//$checking->deposit(500);

//echo $checking->getAccountDetails();
//echo '<br /> <br />';
//echo $checking->getStartDate();
    
?>
