<?php

class LoginModel extends Model {

    function __construct(){
        parent::__construct();
    }

    function login($worker_number, $pass){
        $sql  = 'SELECT u.*, r.role_name FROM users u JOIN roles r ON u.id_role = r.id_role WHERE u.worker_number = :worker_number';
        $item = $this -> userExist($worker_number, $sql);

        if ($item === NULL) {
            return NULL;
        }

        $user = new UserModel();
        $user -> from($item);

        if (password_verify($pass, $user -> getPassword())){
            return $user;
        }

        return NULL;
    }

    function userExist($worker_number, $sql){
        try {
            $query = $this -> prepare($sql);
            $query -> execute(['worker_number' => $worker_number]);

            if ($query->rowCount() == 1) {
                $item = $query->fetch(PDO::FETCH_ASSOC); 
                return $item;
            }

            return NULL;

        } catch (PDOException $e) {
            return NULL;
        }
    }
}

?>
