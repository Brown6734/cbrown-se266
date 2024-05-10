<?php
// This is the base class for checking and savings accounts
// It is declared **abstract** so that it can not be instantiated
// Child classes must be derived that 
// implement the withdrawal and getAccountDetails methods

/* Note:
	You should implement all other methods in the class
*/

abstract class Account 
{
	protected $accountId;
	protected $balance;
	protected $startDate;
	
	public function __construct ($id, $bal, $startDt) 
	{
	   // write code here
	   //this first stuff here
	   $this->accountId = $id;
	   $this->balance = $bal;
	   $this->startDate = $startDt;

	} // end constructor
	
	public function deposit ($amount) 
	{
		// write code here
		//the method deposit will add the amount passed to the balance
		
		//$this->balance += $amount;
		
		echo '<br /> <br />';
		$balanceIs = $this->balance;
		echo $balanceIs . " this is balanceIs";
		echo '<br /> <br />';

		echo '<br /> <br />';
		$amountIs = $amount;
		echo $amountIs . " this is amountIs";
		echo '<br /> <br />';

		echo '<br /> <br />';
		$depositIs = $balanceIs + $amountIs;
		echo $depositIs . " this is depositIs";
		echo '<br /> <br />';

		return $this->balance += $amount;

		//$this->balance += $amount;
		// $checkBal = $this->balance;
		// echo $checkBal . " this is checkBal ";
		// echo '<br /> <br />';
		// $checkAmount = $checkBal + $amount;
		// echo $checkAmount . " this is checkAmount";
		// echo '<br /> <br />';

	} // end deposit

	// This is an abstract method. 
	// This method must be defined in all classes
	// that inherit from this class
	abstract public function withdrawal($amount);
	
	public function getStartDate() 
	{
		// write code here
		return $this->startDate;
	} // end getStartDate

	public function getBalance() 
	{
		// write code here
		//C:/xampp/htdocs/cbrown-se266/ATM Starter Code/ATM Starter Code/account.php
		return $this->balance;
	} // end getBalance

	public function getAccountId() 
	{
		// write code here
		return $this->AccountId;
	} // end getAccountId

	// Display AccountID, Balance and StartDate in a nice format
	protected function getAccountDetails()
	{
		// write code here
		$stuff = "<p>Account ID: $this->accountId</p>";
		$stuff .= "<p>Balance: $".number_format($this->balance, 2)."</p>";
		$stuff .= "<p>Account Opened: $this->startDate</p>";
		return $stuff;
	} // end getAccountDetails
	
} // end account

?>
