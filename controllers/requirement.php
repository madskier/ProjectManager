<?php

/**
 * Description of Requirement
 *
 * @author nmarrs
 */
class Requirement extends Controller
{    
    function __construct()
    {
        parent::__construct();
        Session::startSession();
        $loggedIn = Session::get('loggedIn');
        
        if ($loggedIn == false)
        {
            $this->logout();
        }
        
        $this->view->js = array('requirement/js/default.js');
    }
    
    function index()
    {        
        $this->listReq();        
    }
    
    function create()
    {
        $this->view->render('requirement/create', true);
    }
    
    function edit()
    {
        $this->view->render('requirement/edit', true);
    }
    
    function listReq()
    {
        $this->view->render('requirement/list', true);
    }
    
    function logout()
    {
        Session::endSession();
        header('location: ../index');
        exit;
    }
    
    function ajaxInsert()
    {
        $this->model->ajaxInsert();
    }
}



