<?php
class RegisterUser{
    
    private $lastname;
    private $firstname;
    private $employeeid;
    private $encrypted_password;
    private $raw_password;
    public $error;
    public $success;
    private $storage = "data.json";
    private $stored_users;
    private $new_user; //array


    public function __construct($lastname, $firstname, $employeeid, $password){

        $this->lastname = filter_var(trim($lastname), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $this->firstname = filter_var(trim($firstname), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $this->employeeid = filter_var(trim($employeeid), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        $this->encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        $this->stored_users = json_decode(file_get_contents($this->storage),true);

        $this->new_user = [
            "lastname" => $this->lastname,
            "firstname" => $this->firstname,
            "employeeid" => $this->employeeid,
            "password" => $this->encrypted_password,
        ];

        

        if($this->checkFieldValues()){
            $this->insertUser();
        }
        
    }




    private function checkFieldValues(){
        if(empty($this->lastname) || empty($this->firstname) ||empty($this->employeeid) ||empty($this->raw_password)){
            $this->error = "All fields are required.";
            return false;
        }
        else{
            return true;
        }
        }
    


    private function employeidExists(){
        foreach($this->stored_users as $user){
            if($this->employeeid == $user['employeeid']){
                $this->error = "Employee ID already taken, please choose a different one";
                
                return true;
            }
        }
        return false;
    }


    private function insertUser(){
        if($this->employeidExists() == FALSE){
            array_push($this->stored_users, $this->new_user);
            if (file_put_contents($this->storage, json_encode($this->stored_users,JSON_PRETTY_PRINT))){
                return $this->success = "Your registration was successful, you can now login!!!";
            }else{
                return $this-> error = "Something went wrong, please try again";
            }
        }
    }
}

?>
