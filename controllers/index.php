<?php

/**
 * Description of index
 *
 * @author nmarrs
 */
class Index extends Controller
{   
    private $jsArray = array('index/js/default.js');
    function __construct()
    {
        parent::__construct();
        Session::startSession();
    }
    
    function index()
    {
        array_push($this->jsArray, 'index/js/login.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('index/index', false);        
    }   
    
    function forgotUsername()
    {
        array_push($this->jsArray, 'index/js/login.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('index/forgotUsername', false);
    }
    
    function forgotPassword()
    {
        array_push($this->jsArray, 'index/js/login.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('index/forgotPassword', false);
    }
    
    function doLogin()
    {
        $this->model->doLogin();
    }
    
    function addUser()
    {
        $this->model->addUser();
    }
    
    function ajaxGetPlatform()
    {
        $this->model->ajaxGetPlatform();
    }
    
    function ajaxGetUser()
    {
        $this->model->ajaxGetUser();
    }    
        
    function ajaxGetList($activeOnly)
    {
        $this->model->ajaxGetList($activeOnly);
    }
}
