<?php
/**
 * Description of error
 *
 * @author nmarrs
 */
class Error extends Controller
{
    
    function __construct()
    {
        parent::__construct();       
    }
    
    function index($replaceMsg)
    {
        $this->view->genError = 'There is an Error! </br></br>';
        
        if ($replaceMsg)
        {
            $this->view->msg = $replaceMsg;
        }
        else
        {
           $this->view->msg = 'This page doesn\'t exist';  
        }        
        $this->view->render('error/index', true);
    }
}
