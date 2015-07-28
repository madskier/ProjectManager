<?php

/**
 * Description of bug
 *
 * @author nmarrs
 */
class Asset extends Controller
{    
    private $jsArray = array('asset/js/default.js');
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
        array_push($this->jsArray, 'asset/js/create.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('asset/create', true);
    }
    
    function edit($id)
    {
        array_push($this->jsArray, 'asset/js/edit.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('asset/edit', true);
        
        if ($id !== 0)
        {
            echo '<script type="text/javascript">', 'getAssetByID('. $id . ');', '</script>';
        }
    }
    
    function listAsset()
    {
        array_push($this->jsArray, 'asset/js/list.js'); 
        $this->view->js = $this->jsArray;
        $this->view->render('asset/list', true);
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
}



