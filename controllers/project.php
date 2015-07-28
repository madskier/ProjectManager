<?php

/**
 * Description of project
 *
 * @author nmarrs
 */
class Project extends Controller
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
        
        $this->view->js = array('project/js/default.js');
    }
    
    function index()
    {        
        $this->create();        
    }
    
    function create()
    {
        $this->view->render('project/create', true);
    }
    
    function edit($id)
    {
        $this->view->render('project/edit', true);
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getProjectByID('. $id . ');', '</script>';
        }
    }
    
    function listProject()
    {
        $this->view->render('project/list', true);
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
    
    function ajaxGetProject()
    {
        $this->model->ajaxGetProject();
    }
}


