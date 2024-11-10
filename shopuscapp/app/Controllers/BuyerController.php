<?php

namespace App\Controllers;
use App\Models\BuyerModel;
use App\Models\BusinessModel;
use App\Models\TransactionModel;
use App\Models\SellerModel;


class BuyerController extends BaseController
{
    public function index()
    {
        //instance of buyer model
        //will be used to get their first name for display purposes based on session
        $buyerModel = new BuyerModel();
        $buyerID = session()->get('user_id');
        $buyer = $buyerModel->find($buyerID);
        $firstName = $buyer['FirstName'];
        //pass their information to the view
        $data =[
            'firstName' => $firstName,
        ];
        //show business data 
        $businessModel = new BusinessModel();
        $data['businesses'] = $businessModel->getAllBusinessData();
        
        return view('business_listing', $data);
    }


    public function viewBusinessDetails($adID)
    {
        //show ad data for business
        $businessModel = new BusinessModel();
        $businessDetails = $businessModel->getAdByID($adID);

        //throws an error message if 
        if (!$businessDetails) {
            return redirect()->to('business_listing')->with('error', 'Business not found');
        }

        //passes ad data to be displayed on business details page for a business
        return view('business_details', ['businessDetails' => $businessDetails]);
    }

    public function postTransaction($adID)
    {
        //define models
        $transactionModel = new TransactionModel();
        $businessModel = new BusinessModel();

        //retrieve seller id from ad details
        $businessDetails = $businessModel->getAdByID($adID);
        
        /*if (!$businessDetails) {
            return redirect()->to('business_listing')->with('error', 'Business not found');
        }*/
        
        //get buyerID from the session
        $buyerModel = new BuyerModel();
        $buyerID = session()->get('user_id');
        $buyer = $buyerModel->find($buyerID);

        /*if (!isset($businessDetails['SellerID'])) {
            return redirect()->to('business_listing')->with('error', 'Seller not found for the selected ad.');
        }*/

        //form + buyer/seller data to be inserted into transactions table
        $transactionsData = [
            'BuyerID' => $buyerID,
            'SellerID' => $businessDetails['SellerID'], 
            'Transaction' => $this->request->getPost('transaction'), 
            'ChosenDate' => $this->request->getPost('chosen-date'), 
            'ChosenTime' => $this->request->getPost('chosen-time'), 
        ];

        
        //throw error if transaction cannot be saved
        if (!$transactionModel->saveTransaction($transactionsData)) {
            return redirect()->to('buyer/viewBusinessDetails/' . $adID)->with('error', 'Transaction could not be recorded.');
        }
        
        //return to businessdetails page with success message
       // return redirect()->to('buyer/viewBusinessDetails/' . $adID)->with('success', 'Transaction was recorded.');
       return redirect()->to('buyer_transactions')->with('success', 'Transaction was successful.');
    }

    public function transactions()
    {
        $buyerID = session()->get('user_id');

        //using transaction and seller models
        $transactionModel = new TransactionModel();
        $sellerModel = new SellerModel();

        //get upcoming transction data

        $upcomingTransactions = $transactionModel->getUpcomingTransactions($buyerID);
        //hold data in arr
        $upcomingTransactionsArr =[];

        foreach($upcomingTransactions as $transaction){
            $seller = $sellerModel->find($transaction['SellerID']);
            $upcomingTransactionsArr[] = [
                'transaction' => $transaction['Transaction'],
                'businessName' => $seller['BusinessName'],
                'chosenDate' => $transaction['ChosenDate'],
                'chosenTime' => $transaction['ChosenTime'],
                'contact' => $seller['TelNumber'],
            ];
        }

        $pastTransactions = $transactionModel->getPastTransactions($buyerID);
        // Hold past transactions data in an array
        $pastTransactionsArr = [];

    foreach ($pastTransactions as $transaction) {
        $seller = $sellerModel->find($transaction['SellerID']);
        $pastTransactionsArr[] = [
            'transaction' => $transaction['Transaction'],
            'businessName' => $seller['BusinessName'], // Handle seller not found
            'chosenDate' => $transaction['ChosenDate'],
            'chosenTime' => $transaction['ChosenTime'],
            'contact' => $seller['TelNumber'], // Handle seller not found
        ];
    }

        return view('buyer_transactions', ['upcomingTransactions' => $upcomingTransactionsArr,
        'pastTransactions' => $pastTransactionsArr,
        ]);
    }

}