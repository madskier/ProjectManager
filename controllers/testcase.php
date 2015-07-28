<?php

/**
 * Description of Test Case
 *
 * @author nmarrs
 */
class Testcase extends Controller
{   
    private $jsArray = array('testcase/js/default.js');
    function __construct()
    {
        parent::__construct();
        Session::startSession();
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
        array_push($this->jsArray, 'testcase/js/create.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('testcase/create', true);
    }
    
    function edit($id)
    {
        array_push($this->jsArray, 'testcase/js/edit.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('testcase/edit', true);
        
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getTCByID('. $id . ');', '</script>';
        }
    }
    
    function listTC()
    {
        array_push($this->jsArray, 'testcase/js/list.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('testcase/list', true);
    }
    
    function view($id)
    {
        $this->view->js = $this->jsArray;
        $this->view->render('testcase/view', true);
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getTCByID('. $id . ');', '</script>';
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
    
    function ajaxDelete($id)
    {
        $this->model->ajaxDelete($id);
    }
    
    function ajaxGetTCsByProject($projectID)
    {
        $this->model->ajaxGetTCsByProject($projectID);
    }
    
    function ajaxGetTCByID($tcID)
    {
        $this->model->ajaxGetTCByID($tcID);
    }
    
    function ajaxGetList($projectID, $assignedTo, $status)
    {
        $this->model->ajaxGetList($projectID, $assignedTo, $status);
    }
}



