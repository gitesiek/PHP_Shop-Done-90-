<!Doctype HTML>
<html>
    <?php session_start() ?>
    <head>
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
                background-color: burlywood;
                width: 724px;
                height: 875px;
            }
            #right{
                float:left;
                background-color:aqua;
                width:150px;
            }
            .button{
                
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
                $connection=mysqli_connect('localhost','root','','przedmioty');
                $result=mysqli_query($connection,'SELECT * from `items`');
                $itemCount=0;
                echo "<table border=2px cellspacing=5px cellpadding=5px>";
            
                echo "<th>Nazwa przedmiotu</th><th>Cena</th><th>Ocena</th><th>Ilość w magazynie</th><th>Ilość</th>";
                echo "<form method='POST' action=''><br>";
                while($row=mysqli_fetch_array($result)){
                    echo "<tr><td>".$row['Name']."</td>"."<td>".$row['Price']."</td>"."<td>".$row['Rating']."</td>"."<td>".$row['Store']."</td> <td><input type='text' id=".$row['ID'].">"."</td><td style='background-color:crimson;'><input type='button' value='Dodaj do koszyka' onClick='addToCart(".$row['ID'].")' style='background-color:crimson; border: none;'></td></tr>";
                    $itemCount++;
                }
                echo "</form>";
                echo "</table>";
            
                for($i=0;$i<=$itemCount;$i++)
                {
                    if(!empty($_POST[$i])) echo $i." ";
                }
            mysqli_close($connection);
            ?>
            <script>
            function addToCart(item){
                quan=document.getElementById(item).value;
                window.location.href = 'koszyk.php?ItemID='+item+'&Quanity='+quan;
            }
                
            
            
            
            </script>
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