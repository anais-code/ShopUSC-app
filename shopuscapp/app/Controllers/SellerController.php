<?php

namespace App\Controllers;
use App\Models\SellerModel;
use App\Models\BusinessModel;


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
        //pass their information to the view

         // Check if the seller has an ad
    $businessModel = new BusinessModel();
    $ad = $businessModel->getAdBySeller($sellerID);

    if ($ad) {
        // Pass the ad details if it exists
        $data = [
            'firstName' => $firstName,
            'businessName' => $businessName,
            'businessType' => $businessType,
            'businessCategory' => $businessCategory,
            'businessDescription' => $businessDescription,
            'ad' => $ad, // passing ad details
        ];
    } else {
        // If no ad, pass the form visibility flag
        $data = [
            'firstName' => $firstName,
            'businessName' => $businessName,
            'businessType' => $businessType,
            'businessCategory' => $businessCategory,
            'businessDescription' => $businessDescription,
            'ad' => null,
            'message' => 'No ad to display', // message for no ad
        ];
    }

        return view('seller_dashboard', $data);
    }

    public function postAd()
    {
        $this->businessModel = new BusinessModel();
        if ($this->request->getMethod() === 'post'){
            $coverPhoto = $this->request->getFile('cover-photo');
            
            if($coverPhoto->isValid() && !$coverPhoto->hasMoved()){
                $coverName = $coverPhoto->getRandomName();
                $coverPhoto->move(WRITEPATH . '../public/assets/uploads', $coverName);
            }
    
            // Retrieve product details and costs
            $productDetails = $this->request->getPost('product-details');
            $productCosts = $this->request->getPost('product-cost');
    
            // Combine product details and costs into an associative array
            $combinedDetails = [];
            foreach ($productDetails as $index => $detail) {
                $combinedDetails[] = [
                    'detail' => $detail,
                    'cost' => $productCosts[$index] ?? 0,
                ];
            }
    
            $data = [
                'SellerID' => session()->get('user_id'),
                'CoverPhoto' => 'assets/uploads/' . $coverName,
                'ProductDetails' => json_encode($combinedDetails),
                'Availability' => nl2br($this->request->getPost('availability')),
            ];
    
            // Insert ad data
            $this->businessModel->saveAd($data);
            return redirect()->to('seller_dashboard');
        }
    }
    
}