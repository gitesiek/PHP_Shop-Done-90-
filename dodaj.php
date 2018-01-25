<?php 
	session_start();

	$connection=mysqli_connect('localhost','root','','uzytkownicy');

	$date=date("Y.m.d");
	$userID=$_SESSION['User_ID'];

	$checkIfNew="SELECT ID, ClientID, Date FROM carts WHERE ClientID LIKE '%" . $_SESSION['User_ID'] . "%' AND Date(date) = CURDATE();";

	$insertNew="INSERT INTO carts (`ID`, `ClientID`, `Date`) VALUES (NULL,'$userID','$date');";

	$result=mysqli_query($connection, $checkIfNew); 

	while($row=mysqli_fetch_array($result)){
	    $koszyk=$row['ID'];
	}
	$ItemID=$_GET['ItemID'];
	$quanity=$_GET['Quanity'];

	$insertNewItem="INSERT INTO cartspositions (`ID`, `CartID`, `ProductID`, `Quanity`) VALUES (NULL, '$koszyk','$ItemID','$quanity');";

	$checkIfNewItem="SELECT CartID, ProductID FROM cartspositions WHERE CartID LIKE '%" . $koszyk . "%' AND ProductID LIKE '%" . $ItemID . "%';";

	if(empty($koszyk)){
	    mysqli_query($connection, $insertNew);

	    $result=mysqli_query($connection, $checkIfNew); 
	    while($row=mysqli_fetch_array($result)){
		$koszyk=$row['ID'];
	    } 
	}

	$result=mysqli_query($connection, $checkIfNewItem); 
	while($row=mysqli_fetch_array($result)){
	    $isNew=$row['ProductID'];
	} 
	if(empty($isNew)){
	    mysqli_query($connection,$insertNewItem);
	}
	else mysqli_query($connection, "UPDATE `cartspositions` SET `Quanity`= `Quanity`+ $quanity WHERE CartID LIKE '%" . $koszyk . "%' AND ProductID LIKE '%" . $ItemID . "%';");

	echo "Pomyślnie dodano przedmiot do koszyka!".$koszyk;

	header("Location: przedmioty.php");

?>
