<?php

namespace App\Controllers;

use App\Libraries\Hash;

class RegisterController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'help']);
        // helper(['form', 'url', 'help']);
        // test();die;
    }
    public function index(): string
    {
        return view('authweb/index');
    }

    public function register(): string
    {
        return view('authweb/register');
    }

    public function signup()
    {
        // echo 'I am saving data page';

        // --> This is ci4 validation_errors/rules  <--
        // $validation = $this->validate([
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'email' => 'required|valid_email|is_unique[registration.email]',
        //     'country' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'zip'=> 'required|integer',
        //     'password' => 'required|min_length[6]|max_length[10]',
        //     'cpassword' => 'required|min_length[6]|max_length[10]|matches[pswd]',
        //     'phone'=>'required|integer|min_length[10]|max_length[13]'

        // ]);


        // Here are self constructed rules and validations

        $validation = $this->validate([
            'fname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your First Name is required'
                ]

            ],
            'lname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Last Name is required'
                ]

            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[registration.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Your must enter a valid email',
                    'is_unique' => 'Email already is used',
                ]

            ],
            'country' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Country Name is required'
                ]

            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Address is required'
                ]

            ],
            'city' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your City Name is required'
                ]

            ],
            'state' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your State Name is required'
                ]

            ],
            'zip' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Your Zip Code is required',
                    'integer' => 'Enter only integer value'
                ]

            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[10]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have atleast 6 characters in length',
                    'max_length' => 'Password must not have more that 10 characters in length'
                ]

            ],
            'cpassword' => [
                'rules' => 'required|min_length[6]|max_length[10]|matches[password]',
                'errors' => [
                    'required' => 'Confirm Password is required',
                    'min_length' => 'Password must have atleast 6 characters in length',
                    'max_length' => 'Password must not have more that 10 characters in length',
                    'matches' => 'Confirm Password not matches to the Password'
                ]

            ],
            'phone' => [
                'rules' => 'required|integer|min_length[10]',
                'errors' => [
                    'required' => 'Contact No. is required',
                    'integer' => 'Enter only integer value',
                    'min_length' => 'Contact No. must have atleast 10 characters in length'

                ]

            ],
        ]);

        if (!$validation) {
            return view('authweb/register', ['validation' => $this->validator]);
        } else {
            // echo "Form Submit Successfully";
            $fname = $this->request->getPost('fname');
            $lname = $this->request->getPost('lname');
            $email = $this->request->getPost('email');
            $country = $this->request->getPost('country');
            $address = $this->request->getPost('address');
            $phone = $this->request->getPost('phone');
            $city = $this->request->getPost('city');
            $state = $this->request->getPost('state');
            $zip = $this->request->getPost('zip');
            $password = $this->request->getPost('password');

            // send data to database query
            $values = [
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'country' => $country,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
                'pswd' => Hash::make($password),
                'phone' => $phone
            ];

            $registrationModel = new \App\Models\RegistrationModel();
            $query = $registrationModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('home/register')->with('success', 'Registration Succesfully!');
            }
        }
    }

    public function login()
    {
        return view('authweb/login');
    }
    public function signin()
    {
        // echo "Login page";
        // validation to form
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[registration.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Your must enter a valid email',
                    'is_not_unique' => 'This Email-id is not registered',
                ]

            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[10]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have atleast 6 characters in length',
                    'max_length' => 'Password must not have more that 10 characters in length'
                ]

            ]
        ]);

        if (!$validation) {
            return view('authweb/login', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $paswd = $this->request->getPost('password');
            $registrationModel = new \App\Models\RegistrationModel();
            $user_data = $registrationModel->where('email', $email)->first();
            $check_password = Hash::check($paswd, $user_data['pswd']);

            if (!$check_password) {
                // echo "incorect credential";
                // echo $paswd;
                session()->setFlashdata('fail', 'You Entered Incorrect Password');
                return redirect()->to('home/login')->withInput();
            }else{
                // echo "You are Logged in";
                $user_id = $user_data['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/home');
            }
        }
    }

    public function logout()
    {
     if(session()->has("loggedUser")){
        session()->remove("loggedUser");
        return redirect()->to('home/login?access=out')->with('fail', 'you are Logged Out!');
    }

     }   
}