<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\Users;
use App\Models\Login;
use ReflectionMethod;
use CodeIgniter\I18n\Time;
use DateTime;

/**
 * @property IncomingRequest $request 
 */

class Mail extends BaseController
{
    public $userModel;
    public $loginModel;
    public $session;
    public function __construct()
    {
        $this->userModel = model(Users::class);
        $this->loginModel = model(Login::class);
        $this->session = \Config\Services::session();
        helper('date');
    }

    public function index()
    {
        $to = 'receiving_email';
        $subject = 'Account Activation';
        // $message = '<img src="https://drive.google.com/file/d/12dIA_NESxEDrokoe7z9O0j-E_XLyuNAY/view?usp=sharing">Hi Man,<br>This is the activation link for your account valid for 15 minutes.<br><a href="'.base_url().'" target="_blank">Activate Now</a><br><br>Thanks';
        $message = 'Hello,<br>This is the activation link for your account valid for 15 minutes.<br><a href="'.base_url().'" target="_blank">Activate Now</a><br><br>Thanks';
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('sending_email','SIEM Team 3');
        $email->setSubject($subject);
        $email->setMessage($message);
        // $email->attach('');

        if($email->send()) {
            echo "Account Created, please activate";
        } else {
            print_r($email->printDebugger(['headers']));
        }

        // $users = $this->userModel->getUsers();
        // $myTime = Time::now(app_timezone(), 'en_US');

        // echo "<pre>";
        // echo $myTime . '<br><br>';
        // print_r($users);
    }
    
    // remap function for checking if method exists with accepted parameter
    public function _remap($method, $param0 = null, $param1 = null, $param2 = null)
    {
        if (method_exists($this, $method))
        {
            if(isset($param2))
                $temp = $param0.','.$param1.','.$param2;
            else if(isset($param1))
                $temp = $param0.','.$param1;
            else if(isset($param0))
                $temp = $param0;
            else
                $temp = '';

            $params = [];
            if($temp !== '')
                $params = explode(',',$temp);
            // echo '<pre>';print_r($method);echo '<br>';print_r($params);exit;

            $existing = new ReflectionMethod($this,$method);
            $existing_params = $existing->getParameters();

            if(count($existing_params) == count($params))
                return call_user_func_array(array($this, $method), $params);
            else
                throw PageNotFoundException::forPageNotFound();
        }
        else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
}
