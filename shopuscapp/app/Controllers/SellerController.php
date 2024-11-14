<?php

namespace App\Controllers;
use App\Models\SellerModel;
use App\Models\BusinessModel;
use App\Models\BuyerModel;
use App\Models\TransactionModel;



class SellerController extends BaseController
{
    public function index()
    {
        //instance of seller model
        //will be used to get their first name for display purposes based on session
        $sellerModel = new SellerModel();
        $sellerID = session()->get('user_id');
        $seller = $sellerModel->find($sellerID);
        $firstName = $seller['FirstName'];
        $businessName = $seller['BusinessName'];
        $businessType = $seller['BusinessType'];
        $businessCategory = $seller['BusinessCategory'];
        $businessDescription = $seller['BusinessDescription'];
        

         //get ad for seller based on seller id
        $businessModel = new BusinessModel();
        $ad = $businessModel->getAdBySeller($sellerID);

        //check if ad exists and pass seller and ad details
        if ($ad) {
            $data = [
                'firstName' => $firstName,
                'businessName' => $businessName,
                'businessType' => $businessType,
                'businessCategory' => $businessCategory,
                'businessDescription' => $businessDescription,
                'ad' => $ad, // passing ad details
            ];
        } else {
        //if seller doesn't have an ad then pass null along with a message
        $data = [
            'firstName' => $firstName,
            'businessName' => $businessName,
            'businessType' => $businessType,
            'businessCategory' => $businessCategory,
            'businessDescription' => $businessDescription,
            'ad' => null,
            'message' => 'No ad to display',
        ];
    }
        return view('seller_dashboard', $data);
    }

    //function to take form data from seller dash to save ad
    public function postAd()
    {
        $this->businessModel = new BusinessModel();

        //groups all form items with post method
        if ($this->request->getMethod() === 'post'){

            //gets uploaded cover photo, checks validity and saves a copy to uploads folder with rand name
            $coverPhoto = $this->request->getFile('cover-photo');
            if($coverPhoto->isValid() && !$coverPhoto->hasMoved()){
                $coverName = $coverPhoto->getRandomName();
                $coverPhoto->move(WRITEPATH . '../public/assets/uploads', $coverName);
            }
    
            //gets product details and costs and combines into assoc array
            $productDetails = $this->request->getPost('product-details');
            $productCosts = $this->request->getPost('product-cost');
            $combinedDetails = [];
            //loop to combine for each row of form data
            foreach ($productDetails as $index => $detail) {
                $combinedDetails[] = [
                    'detail' => $detail,
                    'cost' => $productCosts[$index] ?? 0,
                ];
            }
    
            //sets ad data for specific seller
            $data = [
                'SellerID' => session()->get('user_id'),
                'CoverPhoto' => 'assets/uploads/' . $coverName,
                'ProductDetails' => json_encode($combinedDetails),
                'Availability' => nl2br($this->request->getPost('availability')),
            ];

            //inserts ad into businessad db and redirects seller to dash to see ad details
            $this->businessModel->saveAd($data);
            return redirect()->to('seller_dashboard');
        }
    }

    //function for seller to view transactions
    public function sellerTransactions()
    {
        $sellerID = session()->get('user_id');

        //using transaction and seller models
        $transactionModel = new TransactionModel();
        $buyerModel = new BuyerModel();

        //get upcoming transction data
        $upcomingSellerTransactions = $transactionModel->getUpcomingSellerTransactions($sellerID);
        //hold data in arr
        $upcomingSellerTransactionsArr =[];

        //retrieve and save transactions data
        foreach($upcomingSellerTransactions as $sellerTransaction){
            $buyer = $buyerModel->find($sellerTransaction['BuyerID']);
            $upcomingSellerTransactionsArr[] = [
                'transaction' => $sellerTransaction['Transaction'],
                'buyerFirstName' => $sellerTransaction['FirstName'],
                'buyerLastName' => $sellerTransaction['LastName'],
                'chosenDate' => $sellerTransaction['ChosenDate'],
                'chosenTime' => $sellerTransaction['ChosenTime'],
                'contact' => $buyer['TelNumber'],
            ];
        }

        //get past transaction data
        $pastSellerTransactions = $transactionModel->getPastSellerTransactions($sellerID);
        //Hold past transactions data in arr
        $pastSellerTransactionsArr = [];

        //retrieve and save transactions data
        foreach ($pastSellerTransactions as $sellerTransaction) {
            $buyer = $buyerModel->find($sellerTransaction['BuyerID']);
            $pastSellerTransactionsArr[] = [
                'transaction' => $sellerTransaction['Transaction'],
                'buyerFirstName' => $sellerTransaction['FirstName'],
                'buyerLastName' => $sellerTransaction['LastName'],
                'chosenDate' => $sellerTransaction['ChosenDate'],
                'chosenTime' => $sellerTransaction['ChosenTime'],
                'contact' => $buyer['TelNumber'],
            ];
        }

        //pass upcoming and past transaction data to view
        return view('seller_transactions', ['upcomingSellerTransactions' => $upcomingSellerTransactionsArr,
        'pastSellerTransactions' => $pastSellerTransactionsArr,
        ]);

    }
    
}