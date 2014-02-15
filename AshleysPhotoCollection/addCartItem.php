<?
include('../../scripts/dbConfig.php');
$id="";
$cartID=$_POST['cartID'];
$cartImageID=$_POST['imageID'];
$cartImageTitle=$_POST['imageTitle'];
$cartImageURL=$_POST['imageURL'];
$cartImageSize=$_POST['size'];
$cartSubtotal=$_POST['subTotal'];
if(mysql_query("INSERT INTO apcCart (id, cartID, cartImageID, cartImageTitle, cartImageURL, cartImageSize, cartSubtotal) VALUES('$id', '$cartID', '$cartImageID', '$cartImageTitle', '$cartImageURL', '$cartImageSize', '$cartSubtotal')"))
	{
	$getCartCount=mysql_query("SELECT COUNT(*) FROM apcCart WHERE cartID='$cartID'");
	while($countResult=mysql_fetch_assoc($getCartCount))
		{
		$cartCount=$countResult['COUNT(*)'];
		echo($cartCount);
		}
	}
else
	{
	echo("-");
	}

?>