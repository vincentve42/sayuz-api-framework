<?php
namespace Sayuz\SayuzFramework\controller;

use Sayuz\SayuzFramework\class\Controller;
use Sayuz\SayuzFramework\class\Model;
use Sayuz\SayuzFramework\model\User;

class TestController extends Controller{
    public function test(){
        echo "halo";
        $newModel = new User($this->database);
        $newModel->username = "sayuz";
        $newModel->setPassword("tesrt");
        $newModel->save();
    }
    public function index(){
        echo "tos";
    }
}