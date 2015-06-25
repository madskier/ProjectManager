<?php
/**
 * Description of Bootstrap
 *
 * @author nmarrs
 */
class Bootstrap
{
    
    function __construct()
    {
        //check if the url has anything, if not set it to null
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        
        //trim off the end backslashes so the controllers don't think we need to call a method
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        //if the user hasn't typed in a url, it by default loads this page
        if (empty($url[0]))
        {       
            //default landing page
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }
        
        //load the controller for the url requested
        $file = 'controllers/' . $url[0] . '.php';
                
        //require the controller if it exists
        if (file_exists($file))
        {
            require $file;
        }
        else 
        {
            $this->error();
        }
        
        //set the controller
        $controller = new $url[0];
        $controller->loadModel($url[0]);

        //check for additional url parameters so we can run methods in the controllers
        if (isset($url[2]))
        {
            if (method_exists($controller, $url[1]))
            {
                $controller->{$url[1]}($url[2]);
            }
            else
            {
                $this->error();
            }
        }
        else if (isset($url[1]))
        {
            //if there's no 2nd parameter, just run the constructer
            if (method_exists($controller, $url[1]))
            {
                $controller->{$url[1]}();
            }
            else
            {
                $this->error();
            }            
        }
        else 
        {       
            $controller->index(); 
        }        
    }
    
    function error()
    {
         //if it can't find the file in the system, throw an error
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index(null);
        return false;
    }
}
