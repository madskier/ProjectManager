<?php

/**
 * Description of bug
 *
 * @author nmarrs
 */
class Bug extends Controller
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
        
        $this->view->js = array('bug/js/default.js');
    }
    
    function index()
    {        
        $this->listBug();        
    }
    
    function create()
    {
        $this->view->render('bug/create', true);
    }
    
    function edit()
    {
        $this->view->render('bug/edit', true);
    }
    
    function listBug()
    {
        $this->view->render('bug/list', true);
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
    
    function ajaxGetList()
    {
        $this->model->ajaxGetList();
    }
}

