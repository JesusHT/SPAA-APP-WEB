<?php
class UserModel extends Model implements IModel {

    private $id_user;
    private $worker_number;
    private $password;
    private $id_role;
    private $role_name;

    function __construct(){
        parent::__construct();

        $this->id_user = 0;
        $this->worker_number = '';
        $this->password = '';
        $this->id_role = 0;
        $this->role_name = '';
    }

    public function save(){
        try {
            $query = $this->prepare('INSERT INTO users (worker_number, password, id_role) VALUES (:worker_number, :password, :id_role)');
            $query->execute([
                'worker_number' => $this->worker_number,
                'password' => $this->password,
                'id_role' => $this->id_role
            ]);

            return true;
        } catch (PDOException $e){
            echo $e;
            return false;
        }
    }

    public function get($id_user){
        try {
            $query = $this->prepare('SELECT u.*, r.role_name FROM users u JOIN roles r ON u.id_role = r.id_role WHERE u.id_user = :id_user');
            $query->execute(['id_user' => $id_user]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            return $user;

        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function delete($id_user){
        try{
            $query = $this->prepare('DELETE FROM users WHERE id_user = :id_user');
            $query->execute(['id_user' => $id_user]);

            return true;

        } catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update($id_user){
        try {
            $query = $this->prepare('UPDATE users SET worker_number = :worker_number, password = :password, id_role = :id_role WHERE id_user = :id_user');
            $query->execute([
                'worker_number' => $this->worker_number,
                'password' => $this->password,
                'id_role' => $this->id_role,
                'id_user' => $id_user
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function from($array){
        $this->id_user = $array['id_user'];
        $this->worker_number = $array['worker_number'];
        $this->password = $array['password'];
        $this->id_role = $array['id_role'];
        $this->role_name = $array['role_name'];
    }

    public function exists($worker_number){
        try{
            $query = $this->prepare('SELECT worker_number FROM users WHERE worker_number = :worker_number');
            $query->execute(['worker_number' => $worker_number]);

            if($query->rowCount() > 0){
                return true;
            }

            return false;
        } catch (PDOException $e){
            echo $e;
            return false;
        }
    }

    public function getUsers(){
        try{
            $query = $this->prepare('SELECT u.*, r.role_name FROM users u JOIN roles r ON u.id_role = r.id_role');
            $query->execute();
            
            $users = [];
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $user = new UserModel();
                $user->from($row);
                $users[] = $user;
            }

            return $users;

        } catch(PDOException $e){
            echo $e;
            return [];
        }
    }

    // Setters
    public function setId($id_user){ $this->id_user = $id_user; }
    public function setWorkerNumber($worker_number){ $this->worker_number = $worker_number; }
    public function setPassword($password){ $this->password = password_hash($password, PASSWORD_BCRYPT); }
    public function setIdRole($id_role){ $this->id_role = $id_role; }
    public function setRoleName($role_name){ $this->role_name = $role_name; }

    // Getters
    public function getId(){ return $this->id_user; }
    public function getWorkerNumber(){ return $this->worker_number; }
    public function getPassword(){ return $this->password; }
    public function getIdRole(){ return $this->id_role; }
    public function getRoleName(){ return $this->role_name; }
}
?>
