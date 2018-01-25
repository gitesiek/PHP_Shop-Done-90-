<!Doctype HTML>
<html>
<head>
<title>Registration Page</title>
<meta charset="utf-8">
</head>
<body>
<form action="" method="post">
    Login:<input type="text" name="Login" style="width:10.5%"> (Musi składać się conajmniej z 5 znaków)<br>
    Haslo:<input type="text" name="Password" style="width:10.5%"> (Musi zawierać: małą i dużą literę, cyfrę, znak specjalny i conajmniej 8 znaków, maksymalnie 20)<br>
    EMail:<input type="text" name="Email" style="width:10%"><br>
    <input type="submit" value="Rejestruj" style="width:13%">
    
</form>
<?php
    session_start();
    $userCorrectData=false;
    if(!empty($_POST['Login'])){
        $login=$_POST['Login'];
        if(strlen($login)>=5)
        {
            if(!empty($_POST['Password']))
            {
                $password=$_POST['Password'];
                $pwCheck="/^(?=.*\d)(?=.*[a-zA-Z]).{8,20}$/";
                if(preg_match($pwCheck,$password))
                {
                    if(!empty($_POST['Email']))
                       {
                           $email=$_POST['Email'];
                           $emCheck="/^[[:alnum:]]{1,20}[@][[:alnum:]]{1,10}[.][a-z]{2,5}$/";
                           if(preg_match($emCheck,$email)){
                              $userCorrectData=true;                               
                           }
                       }
                }
            }
        }
    }
                
                       
     
    
    if($userCorrectData){
        $connection=mysqli_connect('localhost','root','','uzytkownicy');
        if($connection)
        {       
             
            $login=$_POST['Login'];
            $password=$_POST['Password'];
            $email=$_POST['Email'];
            
            $hashed=password_hash($password, PASSWORD_BCRYPT); 
            
            $insertNew="INSERT INTO `users`(`ID`, `Login`, `Password`, `Mail`, `AccesLevel`) VALUES (NULL,'$login','$hashed','$email', 0);";

            $checkIfNew="SELECT ID, Login, Password, Mail, AccesLevel FROM users WHERE  Login LIKE '%" . $login . "%' OR Mail Like '%" . $email ."%';"; 
            
            $result=mysqli_query($connection, $checkIfNew); 
	
            while($row=mysqli_fetch_array($result)){
	          $Loginzz=$row['Login'];                  
            }
                
            if(empty($Loginzz)) {  
            if(mysqli_query($connection, $insertNew)) {
                echo "Konto zostało pomyślnie utworzone";
                } else {
                echo "Nie można się połączyć z bazą danych, przepraszamy";
            }
            }
            else{
                echo "Konto już istnieje";
            }
                mysqli_close($connection);
            }
        
        }
    
    
?>

</body>
</html>
