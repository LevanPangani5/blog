<?php
session_start();
require 'config/database.php';

if(isset($_POST['submit'])){
    $username_email= filter_var($_POST['username_email'],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password= filter_var($_POST['password'],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
    if(!$username_email){
        $_SESSION['signin']="Username or Email required";
    }elseif(!$password){
        $_SESSION['signin']="Password required";
    }else{
        //fetch user from db
        $fetch_user_query="SELECT * FROM users WHERE username= '$username_email' 
        OR email='$username_email'";
         $fetch_user_result=mysqli_query($connection, $fetch_user_query);

         if(mysqli_num_rows($fetch_user_result)==1){
             //convert record to array
             $user_record =mysqli_fetch_assoc($fetch_user_result);
             //hashed password from db
             $db_password= $user_record['password'];
             //compare password from db to user input
             if(password_verify($password,$db_password)){
                //set sessionfor access control
                $_SESSION['user-id']=$user_record['id'];
                //check if is Admin or not
                //set session if user is an admin
                if($user_recor['is_admin']==1){
                    $_SESSION['user_is_admin']=true;
                }
                 //log user in
                 header('location: ' . ROOT_URL . 'admin/');
                 die();
             }
             else{
                $_SESSION['signin']="check inputs";
             }
         }else{
            $_Session['signin']="User not found";
         }
    }

}
   //if there is any problem redirect to sign in
   if(isset($_SESSION['signin'])){
      $_SESSION['signin-data']=$_POST;
      header('location: ' . ROOT_URL . 'sign-in.php');
      die();
   }

else{
    header('location: ' . ROOT_URL . 'sign-in.php');
    die();
}