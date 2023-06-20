<?php 
session_start();
require 'config/database.php';

//get sign up form data
if(isset($_POST['submit'])){
    $firstname= filter_var($_POST['firstname'],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname= filter_var($_POST['lastname'],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username= filter_var($_POST['username'],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email= filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $createpassword= filter_var($_POST['createpassword'],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword= filter_var($_POST['confirmpassword'],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar=$_FILES['avatar'];
   
   //validation 
    if(!$firstname){
        $_SESSION['sign-up']="Please enter your First Name";
    }elseif(!$lastname){
        $_SESSION['sign-up']="Please enter your Last Name";
    }elseif(!$username){
        $_SESSION['sign-up']="Please enter your Username";
    }elseif(!$email){
        $_SESSION['sign-up']="Please enter your Email";
    }elseif(strlen($createpassword)<8 || (strlen($confirmpassword)<8)){
        $_SESSION['sign-up']="Password should should have 8+ characters";
    }elseif(!$avatar['name']){
        $_SESSION['sign-up']="Please add your Avatar ";
    }else{
        //check if passwords match
        if($createpassword !== $confirmpassword){
            $_SESSION['sign-up']="passwords don't match ! ";
        }else{
             //hash password
          $hashed_passowrd= password_hash($createpassword,PASSWORD_DEFAULT);
         // echo 'hashed' . '<br/>';
         // echo $hashed_passowrd;
        }

       
       //check if username or email laready exist in db
       $user_check_query = "SELECT * FROM users  
       WHERE username='$username' OR email ='$email'";
       $user_check_result = mysqli_query($connection, $user_check_query);
       if(mysqli_num_rows($user_check_result)>0){
          $_SESSION['sign-up']="Username or Email already exist";
       }else{
         //work on avatar
         //rename avatar using unique timestamp
         $time = time();
         $avatar_name= $time . $avatar['name'];
         $avatar_tmp_name=$avatar['tmp_name'];
         $avatar_destination_path='images/' . $avatar_name;

         //make sure file is an image
         $allowed_files=['png','jpg', 'jpeg'];
         $extention= explode('.', $avatar_name);
         $extention = end($extention);
         if(in_array($extention, $allowed_files)){
            //make sure file is not too large(1mb+)
            if($avatar['size']< 1000000){
                //upload avatar
                move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
            }else{
                $_SESSION['sign-up']= 'File size shout be less than 1mb'; 
            }
         }else{
            $_SESSION['sign-up']="File shoud be png , jpg, jpeg";
        }
       }
    }

    //redirect back to sign up  if there was any probelm
    if(isset($_SESSION['sign-up'])){
        //pass form data back to signup page
        $_SESSION['signup-data']=$_POST;
        header('location: ' . ROOT_URL . 'sign-up.php');
        die();
    }
    else{
        //add new user to user table
        $insert_user_query="INSERT INTO users SET firstname='$firstname', lastname='$username', username='$username',
        email='$email', password='$hashed_passowrd', avatar='$avatar_name',is_admin=0";
        $insert_user_result=mysqli_query($connection,$insert_user_query);

        if(!mysqli_errno($connection)){
            //redirect to login with success message
            $_SESSION['sign-up-success'] = "Registration successful";
            header('location: ' . ROOT_URL . 'sign-in.php');
            die();
        }
    }

}else{
    header('location: ' . ROOT_URL . 'sign-up.php');
    die();
}