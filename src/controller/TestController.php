<?php
namespace Sayuz\SayuzFramework\controller;

use Sayuz\SayuzFramework\class\Controller;
use Sayuz\SayuzFramework\class\Model;
use Sayuz\SayuzFramework\model\User;

class TestController extends Controller{
    public function test(){
        Controller::view("index");
    }
    public function index(){
        echo "tos";
    }
}