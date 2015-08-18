<?php

/**
 * Description of project
 *
 * @author nmarrs
 */
class Project extends Controller
{    
    private $jsArray = array('project/js/default.js');
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
        $this->create();        
    }
    
    function create()
    {
        array_push($this->jsArray, 'project/js/create.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('project/create', true);
    }
    
    function edit($id)
    {
        array_push($this->jsArray, 'project/js/edit.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('project/edit', true);
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getProjectByID('. $id . ');', '</script>';
        }
    }
    
    function listProject()
    {
        array_push($this->jsArray, 'project/js/list.js'); 
        $this->view->js = $this->jsArray;
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
    
    function ajaxUpdate()
    {
        $this->model->ajaxUpdate();
    }
    
    function ajaxDelete($id)
    {
        $this->model->ajaxDelete($id);
    }
    
    function ajaxGetList()
    {
        $this->model->ajaxGetList();
    }
    
    function ajaxGetProject()
    {
        $this->model->ajaxGetProject();
    }
    
    function ajaxGetProjectByID($projectID)
    {
        $this->model->ajaxGetProjectByID($projectID);
    }
}


