
<!Doctype HTML>
<html>
<head>
<title>Koszyk 
    <?php
        session_start();
        if(!empty($_SESSION['User_Login']))
            echo $_SESSION['User_Login'];
        else header('Location: home.php');
    ?>
    
</title>
    <style>

            body{
                width: 1024px;
                margin: 0 auto;

            }
            #header{
                text-align: center;
                border: solid 2px blue;


            }
            #left{
                float:left;
                background-color:aqua;
                width:150px;
            }
            #mid{
                float:left;
                background-color:chocolate;
                width: 724px;
                height: 875px;
                font-size: 32px;
            }
            #right{
                float:left;
                background-color:aqua;
                width:150px;
            }
            p{       
                margin: 10px;
            }

        </style>
</head>
<body>
        <div id="header">
            <h1><a href="home.php" style="text-decoration:none; color:black">Gitowo Enterprise</a></h1>
        </div>
    <div id="left">
        <center>Menu</center>
        <?php             
            if(empty($_SESSION['User_Login'])){
                echo '<a href="logowanie.php"> Logowanie</a> <br>';          
                echo '<a href="rejestracja.php"> Rejestracja</a><br>';
             }
         ?>
         <a href="https://facebook.com"> Facebook</a>
    </div>
    
    <div id="mid">
        <?php

            $ItemID=$_GET['ItemID'];
            $Quanity=$_GET['Quanity'];
            $connection=mysqli_connect('localhost','root','','przedmioty');
            $result=mysqli_query($connection,"SELECT * from `items` WHERE `ID` LIKE '%" . $ItemID . "%'");
            $row=mysqli_fetch_array($result);
            echo "Czy na pewno chcesz dodać <b>".$row['Name']."</b> do swojego koszyka?";
            echo "<input type='button' value='Tak' onClick='addItem($ItemID,$Quanity)'>";
            echo "<input type='button' value='Nie' onClick='homeButton()'>";
            mysqli_close($connection);
        ?>
    </div>
    <script>
        function homeButton(){
            window.location.href= "home.php";
        }
        function addItem(id,q){
            window.location.href= "dodaj.php?ItemID="+id+"&Quanity="+q;
        } 
        
        
    </script>
    <div id="right">
            Panel użytkownika:
            <a href="zobaczkoszyka.php">Koszyk</a>
                <?php                 
                    if(!empty($_SESSION['User_Login'])){
                        echo $_SESSION['User_Login']."<br>";
                        echo '<a href="wyloguj.php"> Wyloguj</a> <br>';
                    }
                ?>
            

        </div>
</body>
</html>
