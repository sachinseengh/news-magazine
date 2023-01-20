<?php

class User{
    public  $id,$name,$username,$email,$password,$status,$role,$last_login;

    public function login ( ){
          $conn=mysqli_connect('localhost','root',' ','news-magazine');
        
          $encryptedPassword=md5($this->password);
          $sql="SELECT * FROM `users` WHERE email='$this->email' and password='$encryptedPassword'";
          

          $var=$conn->query($sql);
          

          if($var->num_rows>0){
            $data=$var->fetch_object();
            // print_r($data);
            session_start( );
            $_SESSION['id']=$data->id;
            $_SESSION['name']=$data->name;
            $_SESSION['username']=$data->username;
            $_SESSION['role']=$data->role;
            setcookie('username',$data->username,time( ) +60*60);
            header('location: newsmagazine/dashboard.php');
        }else{
            $error="invalid Credential !";
            return $error;
        }
          
        
    }


}

?>