<?php

    class Login extends Controller {

        function __construct(){
            parent::__construct();

            $this -> existSESSION();

            $this -> view -> render('login/index');
        }

        function authenticate(){
            if ($this -> existPOST(['worker_number', 'password'])) {
                
                if ($this -> validateData(['worker_number', 'password'])) {
                    $this->redirect('', ['error' => Errors::ERROR_DATA_EMPTY]);
                    return;
                }
                
                $worker_number = $this -> getPost('worker_number');
                $password = $this -> getPost('password');

                $user = $this->model->login($worker_number, $password);

                if ($user === NULL) {
                    $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE]);
                    return;
                } 
                
                $session = new SessionController();
                $session -> setCurrentUser($user -> getId(), $user -> getRoleName());

                switch ($user -> getRoleName()) {
                    case 'Laboratorista':
                        $this -> redirect('laboratorista');
                        break;
                    case 'director':
                        $this -> redirect('director');
                        break;
                    case 'practicante':
                        $this -> redirect('practicante');
                        break;
                    default:
                        break;
                }

            } else {
                $this->redirect('', ['error' => Errors::ERROR_LOGIN]);
            }
        }

        function logout(){
            $session = new SessionController();
            $session -> closeSession();
        }
    }

?>
