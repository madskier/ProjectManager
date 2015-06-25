<?php

/**
 * Description of dashboard
 *
 * @author nmarrs
 */
class Dashboard extends Controller
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
        
        $this->view->js = array('dashboard/js/default.js');
    }
    
    function index()
    {        
        $this->view->render('dashboard/index', true);        
    }
    
    function logout()
    {
        Session::endSession();
        header('location: ../index');
        exit;
    }
}

