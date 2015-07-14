<?php

/**
 * Description of CR
 *
 * @author nmarrs
 */
class Changerequest extends Controller
{    
    private $jsArray = array('changerequest/js/default.js');
    function __construct()
    {
        parent::__construct();
        Session::startSession();
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
        array_push($this->jsArray, 'changerequest/js/create.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('changerequest/create', true);
    }
    
    function edit($id)
    {
        array_push($this->jsArray, 'changerequest/js/edit.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('changerequest/edit', true);
        
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getCRByID('. $id . ');', '</script>';
        }
    }
    
    function listCR()
    {
        array_push($this->jsArray, 'changerequest/js/list.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('changerequest/list', true);
    }
    
    function view($id)
    {
        $this->view->js = $this->jsArray;
        $this->view->render('changerequest/view', true);
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getCRByID('. $id . ');', '</script>';
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
    
    function ajaxGetCRsByProject($projectID)
    {
        $this->model->ajaxGetCRsByProject($projectID);
    }
    
    function ajaxGetCRByID($crID)
    {
        $this->model->ajaxGetCRByID($crID);
    }
    
    function ajaxGetList($projectID, $assignedTo, $status)
    {
        $this->model->ajaxGetList($projectID, $assignedTo, $status);
    }
}


