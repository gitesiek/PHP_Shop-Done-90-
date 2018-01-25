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
           
            <p>
              Maecenas viverra id libero imperdiet lacinia. Duis ornare pellentesque porta. Donec ac leo eget sapien tristique lacinia ac pretium augue. Donec condimentum sit amet nunc sed tempor. Integer ac odio vitae turpis fringilla luctus. Vivamus quis venenatis justo, sed egestas odio. Integer sed quam neque. Etiam iaculis tempus lacus, eu venenatis lacus scelerisque nec. Morbi id velit lorem. Maecenas sollicitudin, tortor quis imperdiet dictum, lacus est hendrerit urna, vitae finibus nulla massa ac enim. Duis at arcu turpis. Vestibulum id ante lacinia, aliquam tortor eget, consequat sapien. Donec eu lacus sapien. Nullam porttitor fringilla massa, a egestas lectus sollicitudin tincidunt.
            </p>
            <p>
              Quisque molestie, risus non mollis euismod, arcu dolor ultricies ex, sit amet eleifend dui erat eu justo. Nunc et vestibulum felis. Donec auctor lacus id facilisis convallis. Integer efficitur bibendum lacus vel accumsan. Vivamus eget malesuada nulla. Sed condimentum ex vitae nisi facilisis pharetra. Sed placerat aliquet dui, a viverra dolor efficitur in. Vivamus tincidunt massa nec urna convallis scelerisque. Donec est ipsum, lobortis nec vestibulum ut, mollis sed augue.
            </p>
            <p>
                Sed finibus sit amet velit eget pulvinar. Nulla varius nulla urna, eu gravida elit pulvinar eget. Ut dictum justo turpis, at imperdiet dolor volutpat ut. Suspendisse nunc augue, malesuada sed ante ac, lobortis tempor sapien. Nam ultrices vitae ipsum vitae sagittis. Donec tincidunt dui sit amet metus tincidunt, vel porttitor quam convallis. Mauris facilisis neque non pretium congue. Nunc tellus orci, bibendum eget varius vitae, tincidunt a est.
            </p>
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
