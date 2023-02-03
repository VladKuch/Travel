<?php
namespace App\Admin\Controller;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use App\Admin\Models\Session;

class SearchController extends Controller {

    public function indexAction()
    {
        if ($this->request->isPost()) {
            $search_type = $this->request->getPost('search_type');
            $api_status = $this->request->getPost('api_status');
            $offset = $this->request->getPost('offset');
            $param_1 = $this->request->getPost('param_1');
            $param_2 = $this->request->getPost('param_2');
            $location = $this->request->getPost('location');
            $date_from = $this->request->getPost('date_from');
            $date_to = $this->request->getPost('date_to');

            $session_id = $this->request->getPost('session_id');

            $message = '';
            $slug = '';

            try {
                switch ($search_type) {
                    case '1':
                        $message = "Car Searched Successfully.";
                        $slug = "car_core";
                        break;
                    default:
                        $message = "Car Searched Successfully.";
                        $slug = "car_core";
                        break;
                }

                $result = [
                    'status'    => true,
                    'message'   => '',
                    'result'    =>  $admin  
                ];
            } catch (\Throwable $e) {
                $result = [
                    'status'    => false,
                    'message'   => $e->getMessage(),
                    'result'    => [] 
                ];
            }
            return $this->response
                    ->setJsonContent($result);
        }
    }

    public function registerAction()
    {
        if ($this->request->isPost()) {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email', 'email', null);
            $password = $this->request->getPost('password');
            $confirm_password = $this->request->getPost('confirm_password');
            try {

                if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
                   throw new \Exception("All fields shouldn't be empty!");
                } 

                if ($password !== $confirm_password) {
                    throw new \Exception("Password error!");
                }

                if (AuthHelper::isAdminExist($email)) {
                    throw new \Exception("Admin with email '$email' already exist!");
                }

                $admin = new Admin();

                $data_obj = [
                    'name'      => $name,
                    'email'     => $email,
                    'password'  => md5($password)
                ];

                $admin->assign($data_obj);

                $status = $admin->create();
                $this->session->set(
                    'session',
                    [
                        'admin_id'  => $admin->id,
                        'is_log_in' => true,
                        'flag_remember' => false
                    ]
                );
                $result = [
                    'status'    => $status,
                    'message'   => '',
                    'result'    =>  array_merge($data_obj, ['admin_id' => $admin->id])  
                ];
            } catch(\Exception $e) {
                $result = [
                    'status'    => false,
                    'message'   => $e->getMessage(),
                    'result'    => [] 
                ];
            }
            
            return $this->response
                    ->setJsonContent($result);
        }
        
    }
}