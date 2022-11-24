<?php
class LoginUser{
   // class properties --------------------------------------
   private $employeeid;
   private $password;
   public $error;
   public $success;
   private $storage = "data.json";
   private $stored_users;
   private $firstname;
 
   // class methods -----------------------------------------
   public function __construct($employeeid, $password){
      $this->employeeid = $employeeid;
      $this->password = $password;
      $this->stored_users = json_decode(file_get_contents($this->storage), true);
      $this->login();
   } 
 
   private function login(){
      foreach ($this->stored_users as $user) {
         if($user['employeeid'] == $this->employeeid){
            if(password_verify($this->password, $user['password'])){
               // You can set a session and redirect the user to his account.
               session_start();
               $_SESSION['user'] = $this->employeeid;
               header("location: account.php"); exit();

            }
         }
      }
      return $this->error = "Wrong Employee ID or Password";
   }

   }

// 


