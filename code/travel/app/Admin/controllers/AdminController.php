<?php
namespace App\Admin\Controller;

use Phalcon\Mvc\Controller;
use App\Models\Admin;
use App\Models\RefRole;

class AdminController extends Controller
{
    public function indexAction()
    {
        $title = "Admins List";
        $this->view->title = $title;
    }

    public function fetchAction() 
    {
        if ($this->request->isPost()) {

            //$admins = Admin::find();
            $admins = $this
                ->modelsManager
                ->createBuilder()
                ->columns('*')
                ->addFrom(Admin::class, 'a')
                ->join(RefRole::class, "a.role = r.ref_role_id", 'r')
                ->getQuery()
                ->execute();
            ;
            $admin_arr = $admins->serialize();
            //$related = $admins->getRelated('ref_roles');
            foreach ($admins as $admin) {
                //$related = $admin->getRelated('ref_roles');
                //$related_arr = $related->toArray();
            }
            return $this->response->setJsonContent(
                [
                    'recordsTotal' => count($admin_arr),
                    'recordsFiltered' => count($admin_arr),
                    'data' => $admin_arr
                ]
            );
        }
    }
}