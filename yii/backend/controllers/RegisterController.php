<?php
namespace backend\controllers;

use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class RegisterController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;
    
    public function actionRegister(){
      if($_GET){
        if(isset($_GET['phone'])){
          $data['phone'] = $_GET['phone'];
        }
        if(isset($_GET['password'])){
          $data['password'] = $_GET['password'];
        }
        if(isset($_GET['qrpassword'])){
          $data['qrpassword'] = $_GET['qrpassword'];
        }
        if(isset($_GET['name'])){
          $data['name'] = $_GET['name'];
        }
        if(isset($_GET['year'])){
          $data['year'] = $_GET['year'];
        }
        if(isset($_GET['address'])){
          $data['address'] = $_GET['address'];
        }
        if(isset($data)){
          return  $this->render('register',['data'=>$data]);
        }
      }

      return  $this->render('register');
    }

    public function actionRegister_2()
    {
        if ($_GET) {
            if (isset($_GET['name'])) {
                $data['name'] = $_GET['name'];
            }
            if (isset($_GET['year'])) {
                $data['year'] = $_GET['year'];
            }
            if (isset($_GET['address'])) {
                $data['address'] = $_GET['address'];
            }

            if (isset($_GET['phone'])) {
                $data['phone'] = $_GET['phone'];
            }
            if (isset($_GET['password'])) {
                $data['password'] = $_GET['password'];
            }
            if (isset($_GET['qrpassword'])) {
                $data['qrpassword'] = $_GET['qrpassword'];
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            if (!empty($_GET['moren'])) {
                $moren = $_GET['moren'];
            }
            if (isset($id)) {
                return $this->render('register_2', ['id' => $id, 'data' => $data, 'moren' => $moren]);
            }
        }

        $request = Yii::$app->request;
        $data = $request->post();
        $connection = \Yii::$app->db;
        $connection->createCommand()->insert('register', [
            'phone' => $data['phone'],
            'password' => $data['password'],
        ])->execute();
        $id = $connection->getLastInsertId();
        return $this->render('register_2', ['id' => $id, 'data' => $data]);
    }

    public function actionRegister_3(){
      $request = Yii::$app->request;
      $data=$request->post();
      $connection = \Yii::$app->db;
      $connection->createCommand()->update('register', [
          'name' => $data['name'],
          'year'  => $data['year'],
          'address'  => $data['address'],
      ],'id='.$data['id'])->execute();
      $command = $connection->createCommand('select * from able');
      $all = $command->queryAll();

      if(!empty($data['moren'])){
        $str = $data['moren'];
        $str = substr($str,0,-1);
        $moren = explode(',', $str);
        foreach($all as $key=>&$val){
          if(in_array($val['id'],$moren)){
            $val['status'] = 0;
          }
        }
      }

      return  $this->render('register_3',['id'=>$data['id'],'all'=>$all,'data'=>$data]);
    }

    public function actionAdd(){
      $request = Yii::$app->request;
      $data=$request->post("arr");
      $id = $request->post("id");
      $inst = "";
      foreach($data as $key=>$val){
        $inst.=$val.",";
      }
      $inst = substr($inst,0,-1);
      $connection = \Yii::$app->db;
      $connection->createCommand()->update('register', [
          'inst' => $inst,
      ],'id='.$id)->execute();
      return 123;
    }
}