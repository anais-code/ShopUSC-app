<?php
namespace App\Controllers;
use App\Models\BuyerModel;
use App\Models\SellerModel;

class Authentication extends BaseController
{
    protected $buyerModel;
    protected $sellerModel;

    public function __construct()
    {
        $this->buyerModel = new BuyerModel();
        $this->sellerModel = new SellerModel();
    }

    public function buyer_signup()
    {
        // Return the buyer signup view
        return view('buyer_signup'); 
    }

    // Method to return buyer login view
    public function buyer_login()
    {
        // Return the buyer login view
        return view('buyer_login'); 
    }

    public function seller_signup()
    {
        // Return the seller sign-up view
        return view('seller_signup'); 
    }

    // Method to return seller login view
    public function seller_login()
    {
        // Return the buyer login view
        return view('seller_login'); 
    }

    //method to register buy based on form inputs
    public function registerBuyer(){
        if($this->request->getMethod() === 'post'){
            //gets data from the form
            $firstName = $this->request->getPost('first-name');
            $lastName = $this->request->getPost('last-name');
            $email = $this->request->getPost('buyer-email');
            $password = $this->request->getPost('password');
            $phoneNumber = $this->request->getPost('phone-number');

            //insert buyer sign up info to shopusc_db via the model
            //goes directly to login if sign up was successful
            $data = [
                'FirstName' => $firstName,
                'LastName' => $lastName,
                'Email' => $email,
                'Password' => $password,
                'TelNumber' => $phoneNumber,
            ];
            $this->buyerModel->register($data);
            return redirect()->to(base_url('buyer_login'));
        }
        //back to sign up if it is not a post method aka no sign up happened
        return redirect()->to(base_url('buyer_signup'));
        
    }

    //method to register a seller based on form inputs
    public function registerSeller(){
        if($this->request->getMethod() === 'post'){
            //gets data from the form
            $firstName = $this->request->getPost('first-name');
            $lastName = $this->request->getPost('last-name');
            $email = $this->request->getPost('seller-email');
            $password = $this->request->getPost('password');
            $telNumber = $this->request->getPost('tel-number');
            $businessName = $this->request->getPost('business-name');
            $businessType = $this->request->getPost('business-type');
            $businessCategory = $this->request->getPost('business-category');
            $businessDescription = $this->request->getPost('business-description');

            //insert seller sign up info to shopusc_db via the model
            //goes directly to login if sign up was successful
            $data = [
                'FirstName' => $firstName,
                'LastName' => $lastName,
                'Email' => $email,
                'Password' => $password,
                'TelNumber' => $telNumber,
                'BusinessName' => $businessName,
                'BusinessType' => $businessType,
                'BusinessCategory' => $businessCategory,
                'BusinessDescription' => $businessDescription,
            ];
            $this->sellerModel->register($data);
            return redirect()->to(base_url('seller_login'));
        }
        //back to sign up if it is not a post method aka no sign up happened
        return redirect()->to(base_url('seller_signup'));
    }

    //method to faciliate login for buyer
    public function loginBuyer(){
        //getting input from login form
        $email = $this ->request->getPost('buyer-email');
        $password = $this ->request->getPost('password');

        //validate login via a match
        $buyer = $this->buyerModel->validateLogin($email, $password);
        if ($buyer) {
            session()->set('user_id', $buyer['BuyerID']);
            return redirect()->to(base_url('business_listing'));
        } else {
            // Redirect back with an error message
            return redirect()->to(base_url('buyer_login'))->with('error', 'Invalid email or password');
        }
    }

    //method to facilitate seller login
    public function loginSeller(){
        //getting input from login form
        $email = $this ->request->getPost('seller-email');
        $password = $this ->request->getPost('password');

        //validate login via a match
        $seller = $this->sellerModel->validateLogin($email, $password);
        if ($seller) {
            session()->set('user_id', $seller['SellerID']);
            return redirect()->to(base_url('seller_dashboard'));
        } else {
            // Redirect back with an error message
            return redirect()->to(base_url('seller_login'))->with('error', 'Invalid email or password');
        }
    }

    //returns main view
    public function index()
    {
        return view('login_signup_main');
    }
}
    