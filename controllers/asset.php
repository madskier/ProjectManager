<?php

/**
 * Description of bug
 *
 * @author nmarrs
 */
class Asset extends Controller
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
        
        $this->view->js = array('asset/js/default.js');
    }
    
    function index()
    {        
        $this->listAsset();        
    }
    
    function create()
    {
        $this->view->render('asset/create', true);
    }
    
    function edit()
    {
        $this->view->render('asset/edit', true);
    }
    
    function listAsset()
    {
        $this->view->render('asset/list', true);
    }
    
    function logout()
    {
        Session::endSession();
        header('location: ../index');
        exit;
    }
}



