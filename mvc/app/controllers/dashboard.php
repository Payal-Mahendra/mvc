<?php

class Dashboard extends Controller {

    /*
     * http://localhost/dashboard
     */
    function Index () {
        
        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {
            $param = array('var1'=>1,'var2'=>'22');
            
            $this->view('template/header');
            $this->view('dashboard/index',$param);
            $this->view('template/footer');
            
        }
        
    }
    
    
    function getStudentsCnt(){
        
    }

    /*
     * http://localhost/dashboard/subpage/[$parameter]
     */
    function subpage ($parameter = '') {

        $viewData = array(
            'parameter' => $parameter
        );

        $this->view('template/header');
        $this->view('dashboard/subpage', $viewData);
        $this->view('template/footer');

    }

}

?>