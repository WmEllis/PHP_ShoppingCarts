<? session_save_path('/tmp'); session_start();
include('../../scripts/dbConfig.php'); 
?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Ashley&prime;s Photo Collection (Demo Only)</title>
<link rel="stylesheet" href="default.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="siteFunctions.js"></script>
</head>

<body>
<img class="header" alt="Ashley's Photo Collection" src="images/apcHeader.png">
<?
//Query the database to get image details
$getImages=mysql_query("SELECT * FROM apcGallery ORDER BY RAND() LIMIT 36");
while($images=mysql_fetch_assoc($getImages))
	{
	$imageID=$images['imageID'];
	$imageURL=$images['imageURL'];
	$category=$images['category'];
	$title=$images['title'];
	$display='<div id="'.$imageID.'" class="productDisplay"><img class="productThumb" alt="" src="images/products/'.$imageURL.'"/><div class="productInfo"><em class="productTitle">'.$title.'</em><br/><span class="smallText">Click for Options &amp; Pricing Info</span></div></div>';
	echo($display);
	}
?>
<div id="productDetails"></div>
</body>

</html>
