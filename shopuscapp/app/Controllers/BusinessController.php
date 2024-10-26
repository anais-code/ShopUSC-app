<?php

/*namespace App\Controllers;
use App\Models\BusinessModel;

class BusinessController extends BaseController
{
    public function createAd()
    {
        $model = new BusinessModel();

        // Check if a seller already has an ad
        $sellerID = session()->get('user_id');
        $ad = $model->getAdBySeller($sellerID);

        if ($ad) {
            return view('seller_ad_placeholder', ['ad' => $ad]);
        } else {
            return view('seller_ad_form'); // Form to create ad
        }
    }

    public function postAd()
    {
        if ($this->request->getMethod() === 'post'){
            $coverPhoto = $this->request->getFile('coverPhoto');
            $additionalPhotos = $this->request->getFiles('additionalPhotos');
            $productDetails = $this->request->getPost('productsDetails');

            if($coverPhoto->isValid() && !$coverPhoto->hasMoved()){
                $coverName = $coverPhoto->getRandomName();
                $coverPhoto->move(WRITEPATH . '../public/assets/uploads', $coverName);
            }

            $uploadedPhotos = [];
            foreach ($additionalPhotos as $photo) {
                if($photo->isValid() && !$photo->hasMoved()) {
                    $photoName = $photo->getRandomName();
                    $photo->move(WRITEPATH . '../public/assets/uploads', $photoName);
                    $uploadedPhotos[] = $photoName;
                }
            }

            $data = [
                'SellerID' =>session()->get('user_id'),
                'CoverPhoto' => 'assets/uploads/' . $coverName,
                //my idea
                'ProductDetails' => json_encode($this->request->getPost('product-details')),
                //'ProductDetails' => json_encode($productDetails),
                'Availability' => nl2br($this-request-getPost('availability')),
                'AdditionalPhotos' => json_encode($uploadedPhotos),
            ];

            //insert ad data
            $model->saveAd($data);
            return redirect()->to('seller_dashboard');
        }

        return view('post_ad');
    }

    public function showAdToBuyer($sellerId)
    {
        $model = new BusinessModel();
        $ad = $model->getAdBySeller($sellerId);

        if ($ad) {
            return view('buyer_view_ad', ['ad' => $ad]);
        } else {
            return view('no_ad_available'); // If no ad is found
        }
    }
}*/
