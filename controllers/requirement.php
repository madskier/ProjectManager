<?php

/**
 * Description of Requirement
 *
 * @author nmarrs
 */
class Requirement extends Controller
{    
    private $jsArray = array('requirement/js/default.js');
     
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
        $this->listReq();        
    }
    
    function create()
    {
        array_push($this->jsArray, 'requirement/js/create.js');
        $this->view->js = $this->jsArray;
        $this->view->render('requirement/create', true);
    }
    
    function edit($id)
    {
        array_push($this->jsArray, 'requirement/js/edit.js');
        $this->view->js = $this->jsArray;        
        $this->view->render('requirement/edit', true);
        
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getReqByID(' . $id . ');' , '</script>';
        }
    }
    
    function listReq()
    {
        array_push($this->jsArray, 'requirement/js/list.js');
        $this->view->js = $this->jsArray;
        $this->view->render('requirement/list', true);
    }
    
    function view($id)
    {
        $this->view->js = $this->jsArray;
        $this->view->render('requirement/view', true);
        
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getReqByID(' . $id . ');' , '</script>';
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

    function ajaxDelete($reqID)
    {
        $this->model->ajaxDelete($reqID);
    }
    
    function ajaxGetReqsByProject($projectID)
    {
        $this->model->ajaxGetReqsByProject($projectID);
    }
    
    function ajaxGetReqByID($reqID)
    {
        $this->model->ajaxGetReqByID($reqID);
    }
    
    function ajaxGetList($projectID, $lastModifiedBy, $area)
    {
        $this->model->ajaxGetList($projectID, $lastModifiedBy, $area);
    }
}



