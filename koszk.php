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
                background-color:crimson;
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
                $CartID=$_GET['id'];
                $connection=mysqli_connect('localhost','root','','uzytkownicy');
                $connection2=mysqli_connect('localhost','root','','przedmioty');
                $cartItems="SELECT ProductID,Quanity FROM `cartspositions` WHERE CartID LIKE '%" . $CartID . "%';";

                //$itemInfo="SELECT Name, Price FROM items WHERE ID LIKE '%" . $row['ProductID'] . "%';";

                $sum=0;

                $cartAcces="SELECT ClientID FROM carts WHERE ID LIKE '%" . $CartID . "%';";

                $result=mysqli_query($connection,$cartItems);
                echo"<table border=2px>";
                echo"<th>Nazwa</th><th>Ilość</th><th>Cena</th>";
                while($row=mysqli_fetch_array($result)){
                    $results2=mysqli_query($connection2,"SELECT Name, Price FROM items WHERE ID LIKE '%" . $row['ProductID'] . "%';");
                    $row2=mysqli_fetch_array($results2);
                    echo "<tr><td>".$row2['Name']."</td><td>".$row['Quanity']."</td><td>".$row2['Price']*$row['Quanity']."</td></tr>";
                    $sum+=$row2['Price']*$row['Quanity'];
                }
                echo "<tr> <td>Suma: </td><td colspan='2'> $sum </td></tr>";
                echo"</table>";
            ?>
            
            
        </div>    

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
