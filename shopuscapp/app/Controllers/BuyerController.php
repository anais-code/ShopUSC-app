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
        
        //gets search term from business_listing search bar
        $searchTerm = $this->request->getGet('search');
        $businessModel = new BusinessModel();
        
        //if there is a search term, use function to determine if it is a business or product search
        //get matching db data from model
        if($searchTerm){
            $businesses = $businessModel->searchBusinessesAndProducts($searchTerm);
        //else return list of all businesses (default)
        } else {
            $businesses = $businessModel->getAllBusinessData();
        }
        //save data retrieved
        $data = [
            'firstName' => $firstName,
            'businesses' => $businesses,
        ];
        
        //pass data to view
        return view('business_listing', $data);
    }

    //logout function
    public function logout()
    {
        session()->destroy();
        return redirect()->to('homepage');
    }


    //function to let buyer view details of a specific business
    public function viewBusinessDetails($adID)
    {
        //show ad data for business
        $businessModel = new BusinessModel();
        $businessDetails = $businessModel->getAdByID($adID);

        //throws an error message if business details not founds
        if (!$businessDetails) {
            return redirect()->to('business_listing')->with('error', 'Business not found');
        }

        //passes ad data to be displayed on business details page for a business
        return view('business_details', ['businessDetails' => $businessDetails]);
    }

    //function to allow buyer to submit an order/appointment form for a specific business
    public function postTransaction($adID)
    {
        //define models
        $transactionModel = new TransactionModel();
        $businessModel = new BusinessModel();

        //retrieve seller id from ad details
        $businessDetails = $businessModel->getAdByID($adID);
        
        //get buyerID from the session
        $buyerModel = new BuyerModel();
        $buyerID = session()->get('user_id');
        $buyer = $buyerModel->find($buyerID);

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
       return redirect()->to('buyer_transactions')->with('success', 'Transaction was successful.');
    }

    //function for buyer to view their transactions
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

        //retrieve and save transactions data
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

        //get past transaction data
        $pastTransactions = $transactionModel->getPastTransactions($buyerID);
        // Hold past transactions data in arr
        $pastTransactionsArr = [];

        //retrieve and save transactions data
        foreach ($pastTransactions as $transaction) {
            $seller = $sellerModel->find($transaction['SellerID']);
            $pastTransactionsArr[] = [
                'transaction' => $transaction['Transaction'],
                'businessName' => $seller['BusinessName'],
                'chosenDate' => $transaction['ChosenDate'],
                'chosenTime' => $transaction['ChosenTime'],
                'contact' => $seller['TelNumber'],
            ];
        }

        //pass upcoming and past transaction data to view
        return view('buyer_transactions', ['upcomingTransactions' => $upcomingTransactionsArr,
        'pastTransactions' => $pastTransactionsArr,
        ]);
    }

}