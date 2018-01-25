<!Doctype HTML>
<html>
    <head>

        <title>Groove Street-Home</title>

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
                background-color:cornflowerblue;
                width: 724px;
                height: 875px;
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
                session_start();
                if(empty($_SESSION['User_Login'])){
                    echo '<a href="logowanie.php"> Logowanie</a> <br>';
                    echo '<a href="rejestracja.php"> Rejestracja</a><br>';
                }
            ?>
            
            <a href="przedmioty.php"> Sklep</a>
        </div>

        <div id="mid">
            <?php 
                $connection=mysqli_connect('localhost','root','','uzytkownicy');
                $car="SELECT ID, Date FROM `carts` WHERE ClientID LIKE '%" . $_SESSION['User_ID'] . "%';";
                $result=mysqli_query($connection,$car);
                echo "<table border=2px cellspacing=5px cellpadding=5px>";
                echo "<th>ID koszyka</th><th>Data</th>";
                while($row=mysqli_fetch_array($result)){
                    echo "<tr><td><a href=koszk.php?id=".$row['ID'].">".$row['ID']."</a></td><td>".$row['Date']."</td></tr>";
                }
                echo "</table>";
            ?>

        </div> 
            
        <div id="right">
            Panel użytkownika:
            
                <?php                 
                    if(!empty($_SESSION['User_Login'])){
                        echo $_SESSION['User_Login']."<br>";
                        echo '<a href="wyloguj.php"> Wyloguj</a> <br>';
                    }
                ?>
            

        </div>


    </body>
</html>
