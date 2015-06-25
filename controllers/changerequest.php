<?php

/**
 * Description of CR
 *
 * @author nmarrs
 */
class Changerequest extends Controller
{    
    function __construct()
    {
        parent::__construct();
        $loggedIn = Session::get('loggedIn');
        
        if ($loggedIn == false)
        {
            $this->logout();
        }
        
        $this->view->js = array('changerequest/js/default.js');
    }
    
    function index()
    {        
        $this->listCR();        
    }
    
    function create()
    {
        $this->view->render('changerequest/create', true);
    }
    
    function edit()
    {
        $this->view->render('changerequest/edit', true);
    }
    
    function listCR()
    {
        $this->view->render('changerequest/list', true);
    }
    
    function logout()
    {
        Session::endSession();
        header('location: ../index');
        exit;
    }
}


