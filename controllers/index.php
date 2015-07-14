<?php

/**
 * Description of index
 *
 * @author nmarrs
 */
class Index extends Controller
{    
    function __construct()
    {
        parent::__construct();        
    }
    
    function index()
    {        
        $this->view->render('index/index', false);        
    }
        
    function signup()
    {
        $this->view->render('index/signup', false);
    }
    
    function forgotUsername()
    {
        $this->view->render('index/forgotUsername', false);
    }
    
    function forgotPassword()
    {
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
}
