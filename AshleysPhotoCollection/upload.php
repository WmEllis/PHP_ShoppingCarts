<?
include("../../scripts/dbConfig.php");
$imageID="";
$imageURL="DSCN1393.jpg";
$category="Floral";
$title="Turned Out Purple";
mysql_query("INSERT INTO apcGallery (imageID, imageURL, category, title) VALUES ('$imageID', '$imageURL', '$category', '$title')");
echo("Insert Complete");
?>
