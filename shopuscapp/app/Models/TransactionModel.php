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
}
