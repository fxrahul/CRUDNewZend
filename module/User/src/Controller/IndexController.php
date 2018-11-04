<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use RuntimeException ;

use MongoDB;
use MongoDB\Driver\Manager;

use MongoDB\Driver\Query;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    
        $collection = $this->getCollection();
        $users = $collection->find();
       
        // return new ViewModel();
        // $view =new ViewModel();
        // $view->setTemplate('post/head.phtml');
        $contentView = new ViewModel(array('users'=>$users));
        $contentView->setTemplate('user/index.phtml'); // path to phtml file under view folder
        // $bottomView = new ViewModel();
        // $bottomView->setTemplate('post/bottom.phtml');
        // $view->addChild($contentView)
        //         ->addChild($bottomView);
        return $contentView;
    }

    public function addAction()
    {
        $request = $this->getRequest();
        if($request->isPost()){
            $username = $request->getPost('email');
            $error = [];
            $name = $request->getPost('name');
            $collection = $this->getCollection();
            $existing_user =  $collection->count(array('username'=>$username));
            if($existing_user>0){
                $error["email"] = "Email already Exists!";
                $contentView = new ViewModel(["error"=>$error]);
                $contentView->setTemplate('user/create.phtml');
                return $contentView;
            }
            $password = password_hash($request->getPost('pwd'),PASSWORD_DEFAULT);
            $collection = $this->getCollection();
            $result = $collection->insertOne( [ 'name' => $name, 'username' => $username,'password'=>$password ] );
            return $this->redirect()->toRoute('user');
        }
        else{
            $contentView = new ViewModel();
            $contentView->setTemplate('user/create.phtml');
            // $id = $this->params()->fromRoute('id');
            return $contentView;
        }
        
        
    }

    public function editAction()
    {
        $id = $this->params()->fromRoute('id');
        $collection = $this->getCollection();
        $user = $collection->findOne(["_id"=> new MongoDB\BSON\ObjectId("$id")]);
        $contentView = new ViewModel(["user"=>$user]);
        $contentView->setTemplate('user/update.phtml');
            // $id = $this->params()->fromRoute('id');
        return $contentView;
    }

    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id');
        $collection = $this->getCollection();
        $collection->deleteOne(array('_id' =>  new MongoDB\BSON\ObjectId("$id")));
        return $this->redirect()->toRoute('user');
    }

    public function updateAction(){
        $id = $this->params()->fromRoute('id');
        $request = $this->getRequest();
        $collection = $this->getCollection();
        $error = [];
        $user = $collection->findOne(["_id"=> new MongoDB\BSON\ObjectId("$id")]);
        
            $username = $request->getPost('email');
            $name = $request->getPost('name');
            if($username != $user["username"]){
            $existing_user =  $collection->count(array('username'=>$username));
            if($existing_user>0){
                $error["email"] = "Email already Exists!";
            }
        }
            $newdata;
            if(!empty($request->getPost('pwd_checkbox')) && empty($error)){
                if(password_verify($request->getPost('opwd'),$user["password"])){
                    $password = password_hash($request->getPost('npwd'),PASSWORD_DEFAULT);
                    $newData = array('$set'=>array("username"=>$username,"password"=>$password,"name"=>$name));
            }
            else{
                $error["password"] = "Old Password is Wrong!";
            }
        }
        else if(empty($error)){
            $newData = array('$set'=>array("username"=>$username,"name"=>$name));
        }
        if(empty($error)){
            $collection->updateOne(["_id"=>new MongoDB\BSON\ObjectId("$id")],$newData);
            return $this->redirect()->toRoute('user');
        }
        else{
            $contentView = new ViewModel(["user"=>$user,"error"=>$error]);
            $contentView->setTemplate('user/update.phtml');
           
            return $contentView;
        }
            
            
        
        
        
    }

    public function getCollection(){
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $client->crud->users;
        return $collection;
    }
}
