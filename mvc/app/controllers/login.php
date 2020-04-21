0.<?php

class Login extends Controller {

    /*
     * http://localhost/login
     */
    function Index () {

        if (!isset($_SESSION['login'])) {

            $this->view('template/header');
            $this->view('login');
            $this->view('template/footer');
            exit();
        } else {

            header('Location: /?');

        }

    }

    /*
     * http://localhost/login/log_in
     */
    function Log_In () {

        // Loads /models/demo.php
        $this->model('Demo');

        if ($this->Demo->validateUser()) // Example->exampleMethod() from /models/demo.php
            $_SESSION['login'] = "ExampleLogin";

        header("Location: /");


    }
    function Show()
    {
        $this->model('Demo');
    }

    /*
     * http://localhost/login/logout
     */
    function Logout () {

        $_SESSION = [];
        session_unset();
        header('Location: /');

    }

}

?>