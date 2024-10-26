<?php

namespace App\Models;
use App\Models\SellerModel;

use CodeIgniter\Model;

class BusinessModel extends Model
{ 
    protected $sellerModel;
    protected $table = 'businessad';
    protected $primaryKey = 'AdID';
    protected $allowedFields = ['SellerID', 'CoverPhoto', 'ProductDetails', 'Availability', 'AdditionalPhotos'];

    public function __construct()
    {
        $this->sellerModel = new SellerModel();
    }

    public function getAllBusinessData()
    {
        return $this->sellerModel->findall();
    }

    public function saveAd($data)
    {
        return $this->save($data);
    }

    public function getAdBySeller($sellerID)
{
    $ad = $this->where('SellerID', $sellerID)->get()->getRowArray();

    if ($ad) {
        return $ad;
    } else {
        return "No ads found for this seller.";
    }
}


}

    