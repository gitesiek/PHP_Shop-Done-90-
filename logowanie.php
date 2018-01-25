<!Doctype HTML>
<html>
<head>
<title>Login Page</title>
<meta charset="utf-8">
</head>
<body>
    <div id="Login">
        <form action="" method="post">
            Wprowadz login/email i hasło aby zalogować<br>
            Login:<input type="text" name="Login" style="width:10.5%"><br>
            EMail:<input type="text" name="Email" style="width:10%"><br>
            Haslo:<input type="text" name="Password" style="width:10.5%"><br>

            <input type="submit" value="Loguj" style="width:13%">

        </form>
    </div>
<?php
        session_start();
        $connection=mysqli_connect('localhost','root','','uzytkownicy');

        if($connection)
        { 
            $no=false;
            if(!empty($_POST['Login'])){
                $login=$_POST['Login'];
                $check="SELECT ID, Login, Password FROM users WHERE Login LIKE '%" . $login . "%'";    
            }
            else if(!empty($_POST['Email'])){
                $email=$_POST['Email'];
                $check="SELECT ID, Login, Password FROM users WHERE Mail LIKE '%" . $email . "%'"; 
            }
            else {
                echo "Podaj login lub email <br>";
                $no=true;
            }
            if(!empty($_POST['Password']))
                $password=$_POST['Password'];
            else {
                echo "Podaj haslo <br>";
                $no=true;
            }
            if(!$no){
                $result=mysqli_query($connection, $check);
                $hashed=mysqli_fetch_array($result);
            if(password_verify($password,$hashed['Password'])){
                $_SESSION['User_Login']=$hashed['Login'];
                $_SESSION['User_ID']=$hashed['ID'];
                header('Location: home.php');
            }
            else echo "Podaj prawidłowe hasło";
            }
                mysqli_close($connection);
        }

?>
    
    
    
    
</body>
</html>
