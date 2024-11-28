<?php
namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    //define table to be used
    protected $table = 'transactions';
    protected $primaryKey = 'TransactionID';
    protected $allowedFields = ['BuyerID', 'SellerID', 'Transaction', 'ChosenDate', 'ChosenTime'];

    //save form data to transactions table
    public function saveTransaction($transactionData)
    {
        return $this->insert($transactionData);
    }

    //function that gets upcoming transactions based on the buyer id
    public function getUpcomingTransactions($buyerID)
    {
        return $this->select('transactions.TransactionID, transactions.Transaction, transactions.ChosenDate, transactions.ChosenTime, transactions.SellerID, seller.BusinessName, seller.TelNumber')
        ->join('seller', 'seller.SellerID = transactions.SellerID')
        ->where('transactions.BuyerID', $buyerID)
        //checks to see if the transaction date is on or after the current date -- makes it upcoming
        ->where('transactions.ChosenDate >=', date('Y-m-d'))
        ->findAll();
    }

    //function to get past buyer transactions
    public function getPastTransactions($buyerID)
    {
        return $this->select('transactions.TransactionID, transactions.Transaction, transactions.ChosenDate, transactions.ChosenTime, transactions.SellerID, seller.BusinessName, seller.TelNumber')
                    ->join('seller', 'seller.SellerID = transactions.SellerID')
                    ->where('transactions.BuyerID', $buyerID)
                    //checks to see if the transaction date is before current date -- makes it past
                    ->where('transactions.ChosenDate <', date('Y-m-d'))
                    ->findAll();
    }


    //function to get upcoming seller transactions
    public function getUpcomingSellerTransactions($sellerID)
    {
        return $this->select('transactions.TransactionID, transactions.Transaction, transactions.ChosenDate, transactions.ChosenTime, transactions.BuyerID, buyer.FirstName, buyer.LastName, buyer.TelNumber')
                    ->join('buyer', 'buyer.BuyerID = transactions.BuyerID')
                    ->where('transactions.SellerID', $sellerID)
                    //checks to see if the transaction date is before current date -- makes it past
                    ->where('transactions.ChosenDate >=', date('Y-m-d'))
                    ->findAll();
    }

    //function to get past seller transactions
    public function getPastSellerTransactions($sellerID)
    {
        return $this->select('transactions.TransactionID, transactions.Transaction, transactions.ChosenDate, transactions.ChosenTime, transactions.BuyerID, buyer.FirstName, buyer.LastName, buyer.TelNumber')
                    ->join('buyer', 'buyer.BuyerID = transactions.BuyerID')
                    ->where('transactions.SellerID', $sellerID)
                    //checks to see if the transaction date is before current date -- makes it past
                    ->where('transactions.ChosenDate <', date('Y-m-d'))
                    ->findAll();
    }

    //counts num of upcoming transactions
    public function countSellerUpcomingTransactions($sellerID)
    {
        return $this->where('SellerID', $sellerID)
                    ->where('ChosenDate >=', date('Y-m-d'))
                    ->countAllResults();
    }
    
    //counts num of past transactions
    public function countSellerPastTransactions($sellerID)
    {
        return $this->where('SellerID', $sellerID)
                    ->where('ChosenDate <', date('Y-m-d'))
                    ->countAllResults();
    }

}

