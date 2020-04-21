<?php

/*
 * Every class deriving from Controller must implement Index() method
 * Index() method is the index page of the controller
 * Routing is based on controller class and it's methods
 * It is structured as: http(s)://address/class/method/[optional parameters divided by a '/']
 * Every page of the controller can accept optional parameters from the uri
 */
class Example extends Controller {

    /*
     * http://localhost/examplecontroller
     */
    function Index () {
        if(isset($_REQUEST['submit1']))
        {
            $this->model('demo');
            $blog = $this->demo->submitData();
            
        }
        if(isset($_REQUEST['submit2']))
        {
            $this->model('demo');
            $blog = $this->demo->showData();
            
        }
        $this->view('template/header');
        if (isset($_SESSION['login'])) {
            $this->view('example/form');
        }
        $this->view('template/footer');

    }

    /*
     * http://localhost/examplecontroller/examplesubpage/[$parameter1]/[$parameter2]
     */
    function exampleSubpage ($parameter1 = '', $parameter2 = '') {

        /*
         * Every class deriving from Controller has access to
         * All helpers in /core/helpers, autoloaded
         * model() and view() methods
         */
        ExampleHelper.method();
        $this->model('modelname');
        $this->view('viewname');

    }

}

?>