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
    
    function doLogin()
    {
        $this->model->doLogin();
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
