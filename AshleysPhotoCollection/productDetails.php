<? session_save_path('/tmp'); session_start();
date_default_timezone_set("America/Chicago");
$tempDate=date("Ymd");
$tempTime=date("His");
if(!isset($_SESSION['cartID']))
	{
	$_SESSION['cartID']=$tempDate.$tempTime;
	}
$cartID=$_SESSION['cartID'];
include('../../scripts/dbConfig.php');
$getCartCount=mysql_query("SELECT COUNT(*) FROM apcCart WHERE cartID='$cartID'");
while($countResult=mysql_fetch_assoc($getCartCount))
	{
	$cartCount=$countResult['COUNT(*)'];
	}
?>

<!--
===============================================================================================================================
TO DO LIST FOR ASHLEY'S PHOTO COLLECTION
1. Create shopping-cart.php.  This file should query the apcCart table and return the result set where cartID = sent in data from load function, 
   then echo the data into the required html format
2. Fix and Implement code for viewCart Click function...
		$('#viewCart').click(function(){
		var cartID=$('#cartID').attr('value');
		$('#productDetails').load('shopping-cart.php?cartID='+cartID);
===============================================================================================================================
-->

<script>
$(document).ready(function(){
	var origPrice=parseFloat($('#origPrice').attr('value'));
	$("select").change(function() {
		var size=parseFloat($('#size').val());
		var newPrice=parseFloat(size+origPrice).toFixed(2);
		$('#priceTag').text(newPrice);
	});
	$('#cartForm').submit(function(event){
		event.preventDefault();
		var cartID=$('#cartID').val();
		var imageID=$('#imageID').val();
		var imageTitle=$('.responseImage').attr('alt');
		var imageURL=$('#imageURL').val();
		var size=$('#size').val();
		var subTotal=parseFloat($('#priceTag').text()).toFixed(2);
		$.post('addCartItem.php', {
			cartID:cartID,
			imageID:imageID,
			imageTitle:imageTitle,
			imageURL:imageURL,
			size:size,
			subTotal:subTotal},
			function(data){
				$('#cartCount').html(data);
				$('#cartResult').html('<em>Item Added Successfully!</em>');
			});
	});
});
</script>
<div id="viewCart">View My Cart(<span id="cartCount"><? echo($cartCount); ?></span>) | Checkout</div><div id="closeDetails" onclick="$('#productDetails').fadeOut('fast');">Close [X]&nbsp;</div>
<?
$imageID=$_GET['imageID'];
$getResponse=mysql_query("SELECT * FROM apcGallery WHERE imageID='$imageID' LIMIT 1");
while($response=mysql_fetch_assoc($getResponse))
	{
	$responseImageURL=$response['imageURL'];
	$responseTitle=$response['title'];
	echo('<img class="responseImage" src="images/products/'.$responseImageURL.'" alt="'.$responseTitle.'"/><br/>');
	echo('<h1 class="responseTitle"><em>'.$responseTitle.'</em></h1><em>(Canvas Print)</em>');
	echo('<form id="cartForm" name="addToCart" method="post" action="">');
	echo('<select id="size" name="size"><option value="0">10in x 8in</option><option value="4.99">15in x 12in (add $4.99)</option><option value="9.99">20in x 16in (add $9.99)</option></select><br/>');
	echo('Price: $<span id="priceTag">49.99</span><br/>');
	echo('<input id="imageID" type="hidden" value="'.$imageID.'"/><input id="imageURL" type="hidden" value="'.$responseImageURL.'"/><input id="cartID" type="hidden" value="'.$cartID.'"/><input id="origPrice" name="origPrice" type="hidden" value="49.99"/><input id="submitButton" name="add" type="submit" value="Add to Cart"/><br/><span id="cartResult"></span>');
	echo('</form>');
	}
?>