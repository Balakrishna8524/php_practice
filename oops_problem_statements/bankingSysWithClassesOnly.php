<?php

/*
Problem Statement:
Design a simple Online Banking System using PHP classes. The system should have the following features:

Account Class:
Each account should have an account number, account holder's name, balance, and transaction history.
Implement methods to display the account details, deposit money, and withdraw money.
Ensure that the balance cannot go below zero during a withdrawal.

Customer Class:
Each customer should have a name, unique customer ID, and a list of accounts.
Implement methods to add a new account, display all accounts, and display the total balance across all accounts.

Testing:
Create instances of customers, accounts.
Add a few customers with multiple accounts.
Perform transactions (deposits, withdrawals, transfers) and display account details and customer information.

Constraints:
Ensure proper validation for user input (e.g., not allowing a withdrawal if the balance is insufficient).
Implement error handling for cases such as trying to transfer money between non-existing accounts.

Submission:
Provide PHP class implementations for the Account, Customer.
Include a testing section demonstrating the functionality of the Online Banking System.
Feel free to enhance the problem or add more features based on the level of complexity you are seeking. Good luck!

*/

class Account {
    private $accountNumber;
    private $accountHolderName;
    private $balance;
    private $transactionHistory;

    public function __construct($accountNumber, $accountHolderName, $initialBalance = 0) {
        $this->accountNumber = $accountNumber;
        $this->accountHolderName = $accountHolderName;
        $this->balance = $initialBalance;
        $this->transactionHistory = [];
    }

    public function displayAccountDetails() {
        echo "Account Number: " . $this->accountNumber . "\n";
        echo "Account Holder: " . $this->accountHolderName . "\n";
        echo "Balance: $" . $this->balance . "\n";
        echo "Transaction History: \n";
        foreach ($this->transactionHistory as $transaction) {
            echo $transaction . "\n";
        }
    }

    public function deposit($amount) {
        $this->balance += $amount;
        $this->transactionHistory[] = "Deposit: $" . $amount;
    }

    public function withdraw($amount) {
        if ($amount > $this->balance) {
            echo "Insufficient balance\n";
        } else {
            $this->balance -= $amount;
            $this->transactionHistory[] = "Withdrawal: $" . $amount;
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

class Customer {
    private $name;
    private $customerId;
    private $accounts;

    public function __construct($name, $customerId) {
        $this->name = $name;
        $this->customerId = $customerId;
        $this->accounts = [];
    }

    public function addAccount($account) {
        $this->accounts[] = $account;
    }

    public function displayAllAccounts() {
        foreach ($this->accounts as $account) {
            $account->displayAccountDetails();
            echo "\n";
        }
    }

    public function displayTotalBalance() {
        $totalBalance = 0;
        foreach ($this->accounts as $account) {
            $totalBalance += $account->getBalance();
        }
        echo "Total Balance across all accounts: $" . $totalBalance . "\n";
    }
}

// Testing
$customer1 = new Customer("John Doe", 1);
$account1 = new Account(101, "Savings", 1000);
$account2 = new Account(102, "Checking", 500);
$customer1->addAccount($account1);
$customer1->addAccount($account2);

$customer2 = new Customer("Jane Smith", 2);
$account3 = new Account(201, "Savings", 1500);
$customer2->addAccount($account3);

$account1->deposit(500);
$account1->withdraw(200);
$account1->withdraw(2000); // This will display "Insufficient balance"

$account2->deposit(300);
$account2->withdraw(100);

$account3->deposit(1000);

$customer1->displayAllAccounts(); 
$customer1->displayTotalBalance();
$customer2->displayAllAccounts();
$customer2->displayTotalBalance();
