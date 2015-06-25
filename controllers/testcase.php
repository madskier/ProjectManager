<?php

/**
 * Description of Test Case
 *
 * @author nmarrs
 */
class Testcase extends Controller
{    
    function __construct()
    {
        parent::__construct();
        $loggedIn = Session::get('loggedIn');
        
        if ($loggedIn == false)
        {
            $this->logout();
        }
        
        $this->view->js = array('testcase/js/default.js');
    }
    
    function index()
    {        
        $this->listTC();        
    }
    
    function create()
    {
        $this->view->render('testcase/create', true);
    }
    
    function edit()
    {
        $this->view->render('testcase/edit', true);
    }
    
    function listTC()
    {
        $this->view->render('testcase/list', true);
    }
    
    function logout()
    {
        Session::endSession();
        header('location: ../index');
        exit;
    }
}



