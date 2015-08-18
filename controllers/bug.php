<?php

/**
 * Description of bug
 *
 * @author nmarrs
 */
class Bug extends Controller
{    
    private $jsArray = array('bug/js/default.js');
    function __construct()
    {
        parent::__construct();
        Session::startSession();
        $loggedIn = Session::get('loggedIn');
        
        if ($loggedIn == false)
        {
            $this->logout();
        }
    }
    
    function index()
    {        
        $this->listBug();        
    }
    
    function create()
    {
        array_push($this->jsArray, 'bug/js/create.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('bug/create', true);       
    }
    
    function edit($id)
    {
        array_push($this->jsArray, 'bug/js/edit.js'); 
        $this->view->js = $this->jsArray;          
        $this->view->render('bug/edit', true);
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getBugByID('. $id . ');', '</script>';
        }
    }
    
    function listBug()
    {
        array_push($this->jsArray, 'bug/js/list.js');
        $this->view->js = $this->jsArray;
        $this->view->render('bug/list', true);
    }
    
    function view($id)
    {
        $this->view->js = $this->jsArray;
        $this->view->render('bug/view', true);
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getBugByID('. $id . ');', '</script>';
        }
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
    
    function ajaxUpdate()
    {
        $this->model->ajaxUpdate();
    }

    function ajaxDelete($bugID)
    {
        $this->model->ajaxDelete($bugID);
    }
    
    function ajaxGetArea($projectID)
    {
        $this->model->ajaxGetArea($projectID);
    }    
    
    function ajaxGetBugsByProject($projectID)
    {
        $this->model->ajaxGetBugsByProject($projectID);
    }
    
    function ajaxGetBugByID($bugID)
    {
        $this->model->ajaxGetBugByID($bugID);
    }
    
    function ajaxGetList($projectID, $assignedTo, $status, $active, $cycle)
    {
        $this->model->ajaxGetList($projectID, $assignedTo, $status, $active, $cycle);
    }
 }

