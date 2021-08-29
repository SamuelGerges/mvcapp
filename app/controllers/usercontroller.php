<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\CrudModel;


class UserController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        echo '<pre>';
        $this->_data['users'] = CrudModel::getALL();

        $this->__view();
    }

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $crud_object = new CrudModel();
            $crud_object->user_name = $this->filterString($_POST['name']);
            $crud_object->user_age = $this->filterInt(($_POST['age']));
            $crud_object->user_address = $this->filterString($_POST['address']);
            $crud_object->user_phone = $this->filterString($_POST['phone']);
            $crud_object->user_email = $this->filterString($_POST['email']);
            $crud_object->user_password = $this->filterString($_POST['password']);




            if ($crud_object->create()) {
                echo $crud_object->user_name . ' has been Saved Successfully With Id : ' . $crud_object->user_id;
//                $this->redirect('/user/');
            } else {
                echo 'The Process is not Successfully of ';
            }
        }

        $this->__view();

    }


    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $user = CrudModel::getBYPk($id);

        $this->_data['users'] = $user;
        $this->__view();


        if (isset($_POST['submit'])) {

            $user->user_name = $this->filterString($_POST['name']);
            $user->user_age = $this->filterInt(($_POST['age']));
            $user->user_address = $this->filterString($_POST['address']);
            $user->user_phone = $this->filterString($_POST['phone']);
            $user->user_email = $this->filterString($_POST['email']);
            $user->user_password = $this->filterString($_POST['password']);

            if ($user->update())
                echo $user->user_name . ' has been updated Successfully ';
                $this->redirect_3('/user');

        } else {
            echo "Not Updated";
        }
    }



    public function deleteAction ()
    {
        $id = $this->filterInt($this->_params[0]);
        $user = CrudModel::getBYPk($id);

        if($user->delete() )
        {
            echo '<p> The User is Deleted Successfully ! </p>';
           $this->redirect_3('/user');
        }




    }
}