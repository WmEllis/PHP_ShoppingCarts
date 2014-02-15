<!--  
==============================================================================================
This page is incomplete...revise query on line 17, insert subTotal, tax, shipping, and total 
on line 38, and add Checkout button, to alert that site is "Demo Only"
==============================================================================================
-->
<? session_save_path('/tmp'); session_start();
if(!isset($_SESSION['cartID']))
	{
	echo("There was an error retrieving your shopping cart.<br/><br/>Please close this window, and try again.  If the problem persists, please <a href='#'>contact us</a> for assistance.");
	}
$cartID=$_SESSION['cartID'];
include('../../scripts/dbConfig.php');
?>
<div id="closeDetails" onclick="$('#productDetails').fadeOut('fast');">Close [X]&nbsp;</div>
<h2>My Shopping Cart</h2>
<?
$cartTotal=mysql_query("SELECT SUM(cart
$getCartData=mysql_query("SELECT * FROM apcCart WHERE cartID='$cartID' ORDER BY id ASC");
if(mysql_num_rows($getCartData)==0)
	{
	echo("You haven't added any items to your shopping cart!");
	}
else
	{
	while($cartData=mysql_fetch_assoc($getCartData))
		{
		$id=$cartData['id'];
		$cartID=$cartData['cartID'];
		$cartImageID=$cartData['cartImageID'];
		$cartImageTitle=$cartData['cartImageTitle'];
		$cartImageURL=$cartData['cartImageURL'];
		$cartImageSize=$cartData['cartImageSize'];
		$cartSubtotal=$cartData['cartSubtotal'];
		echo("div class='cartRow'><div class='imgCol'><img src='images/products/".$cartImageURL."' alt='".$cartImageTitle."'/></div><div class='detailCol'><strong>".$cartImageTitle."</strong><br/><em>Size: ".$cartImageSize."</em><br/><span style='font-size:0.8em'><a id='".$cartImageID."' href='#'>Remove</a></span></div><div class='priceCol'>".$cartSubtotal."</div></div>
		}
	}
?>
<div class="priceCol"></div>
