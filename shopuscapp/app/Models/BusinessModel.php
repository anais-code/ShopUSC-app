<?php

namespace App\Models;
use App\Models\SellerModel;

use CodeIgniter\Model;

class BusinessModel extends Model
{ 
    protected $sellerModel;

    //new table in db
    protected $table = 'businessad';
    protected $primaryKey = 'AdID';
    //for now additional photos is null
    protected $allowedFields = ['SellerID', 'CoverPhoto', 'ProductDetails', 'Availability', 'AdditionalPhotos'];

    public function __construct()
    {
        //used to get seller details to populate business pages
        $this->sellerModel = new SellerModel();
    }


    //function to get business details from seller and businessad tables
    //joins them together
    public function getAllBusinessData()
    {
        return $this->sellerModel
        ->select('seller.*, businessad.AdID, businessad.CoverPhoto, businessad.ProductDetails, businessad.Availability')
        ->join('businessad', 'seller.SellerID = businessad.SellerID', 'left')
        ->findAll();
    }

    //function to sava form data from business ad in seller dashboard
    public function saveAd($data)
    {
        return $this->save($data);
    }

    //function to get ad details for specific seller
    public function getAdBySeller($sellerID)
    {
        $ad = $this->where('SellerID', $sellerID)->get()->getRowArray();

        //returns ad if there is one
        //else returns an error message
        if ($ad) {
            return $ad;
        } else {
            return "No ads found for this seller.";
        }
    }

    //function to get ad details for a specific business
    //joins seller and business ad tables together
    public function getAdByID($adID)
    {
        return $this->select('businessad.AdID, seller.SellerID, seller.BusinessName, seller.BusinessDescription, businessad.ProductDetails, businessad.Availability, businessad.CoverPhoto')
                ->join('seller', 'seller.SellerID = businessad.SellerID')
                ->where('businessad.AdID', $adID)
                ->get()
                ->getFirstRow('array');
    }

    //function to allow buyer to search for business by name or search by product/ services
    public function searchBusinessesAndProducts($searchTerm)
    {
        return $this->select('businessad.AdID, seller.SellerID, seller.BusinessName, seller.BusinessDescription, seller.BusinessCategory, seller.BusinessType, businessad.ProductDetails, businessad.Availability, businessad.CoverPhoto')
        ->join('seller', 'seller.SellerID = businessad.SellerID')
        ->groupStart()
            ->like('seller.BusinessName', $searchTerm)
            //extract assoc array JSON data stored in table
            ->orWhere("JSON_UNQUOTE(JSON_EXTRACT(businessad.ProductDetails, '$[*].detail')) LIKE '%$searchTerm%'")
        ->groupEnd()
        ->get()
        ->getResultArray();
    }

}

    