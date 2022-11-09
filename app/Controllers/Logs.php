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

class Logs extends BaseController
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

        if(!session()->has('logged_user')) {
            return redirect()->to("./auth/login");
        }

        $data = ['title' => 'SIEM | Register User',];
        if($type='sql') {
            echo 'sql';
        } else {
            echo 'login';

        }
        return view('logs_view', $data);
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
