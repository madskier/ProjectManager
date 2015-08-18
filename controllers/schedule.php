<?php

/**
 * Description of bug
 *
 * @author nmarrs
 */
class Schedule extends Controller
{    
    private $jsArray = array('schedule/js/default.js');
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
        $this->listAsset();        
    }
    
    function create()
    {
        array_push($this->jsArray, 'schedule/js/create.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('schedule/create', true);
    }
    
    function edit($id)
    {
        array_push($this->jsArray, 'schedule/js/edit.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('schedule/edit', true);
        
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getCycleByID('. $id . ');', '</script>';
        }
    }
    
    function view($id)
    {        
        $this->view->js = $this->jsArray;
        $this->view->render('schedule/view', true);
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getCycleByIDAndDisable('. $id . ');', '</script>';            
        }
    }
    
    function listSchedule()
    {
        array_push($this->jsArray, 'schedule/js/list.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('schedule/list', true);
    }  
    
    function ajaxGetList()
    {
        $this->model->ajaxGetList();
    }
    
    function ajaxGetCycleByID($id)
    {
        $this->model->ajaxGetCycleByID($id);
    }
    
    function ajaxGetListByID($id)
    {
        $this->model->ajaxGetListByID($id);
    }
    
    function ajaxGetCycleList()
    {
        $this->model->ajaxGetCycleList();
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
    
    function ajaxGetCycle()
    {
        $this->model->ajaxGetCycle();
    }

    function logout()
    {
        Session::endSession();
        header('location: ../index');
        exit;
    }
}