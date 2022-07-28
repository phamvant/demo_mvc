<?php
require_once('controllers/BaseController.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $this->render('home');
  }

  public function login()
  {
    $this->render('login');
  }

  public function signup()
  {
    $this->render('signup');
  }

  public function error()
  {
    $this->render('error');
  }
}
