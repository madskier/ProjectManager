<?php

/**
 * Description of bug
 *
 * @author nmarrs
 */
class Account extends Controller
{
    private $jsArray = array('account/js/default.js');
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
        $this->timesheet();        
    }
    
    function timesheet()
    {       
        array_push($this->jsArray, 'account/js/timesheet.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('account/timesheet', true);    
    }
    
    function password()
    {
        array_push($this->jsArray, 'account/js/password.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('account/password', true);
    }
    
    function role()
    {
        array_push($this->jsArray, 'account/js/role.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('account/role', true);
    }
    
    function changePassword()
    {
        $this->model->changePassword();
    }
    
    function requestRole()
    {
        $this->model->requestRole();
    }
    
    function ajaxGetCurrentRole()
    {
        $this->model->ajaxGetCurrentRole();
    }
    
    function ajaxGetRoles()
    {
        $this->model->ajaxGetRoles();
    }
    
    function logout()
    {
        Session::endSession();
        header('location: ../index');
        exit;
    }
}