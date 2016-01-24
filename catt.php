<html lang="en">
<head>
  <style>
  td:empty
  {
	display:block;
  }
	a{
		text-decoration:none;
		color:black;
	}
	.button {
    display: inline-block;
	background-color: #528dec;
    margin: 10px;
	font-family: 'Pacifico', Arial, sans-serif;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    -webkit-box-shadow:    0 8px 0 #376dc5, 0 15px 20px rgba(0,100,255,0.5);
    -moz-box-shadow: 0 8px 0 #376dc5, 0 15px 20px rgba(0,100,255,0.5);
    box-shadow: 0 8px 0 #376dc5, 0 15px 20px rgba(0,100,255,0.5);
    -webkit-transition: -webkit-box-shadow .1s ease-in-out;
    -moz-transition: -moz-box-shadow .1s ease-in-out;
    -o-transition: -o-box-shadow .1s ease-in-out;
    transition: box-shadow .1s ease-in-out;
    font-size: 10px;
    color: #fff;
}

.button:active, .button:focus {
    -webkit-box-shadow:    0 8px 0 #376dc5, 0 12px 10px rgba(0, 0, 0, .3);
    -moz-box-shadow: 0 8px 0 #376dc5, 0 12px 10px rgba(0, 0, 0, .3);
    box-shadow:    0 8px 0 #376dc5, 0 12px 10px rgba(0, 0, 0, .3);
}
	.button-secondary {
            color: white;
			padding:4px;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            background: rgb(66, 184, 221);
			text-decoration:none;
        }
	</style>
	 <link href="ddmenu/ddmenu.css" rel="stylesheet" type="text/css" />
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script>
   $("td").each(function() {
    if ($(this).html() == '') {
        $(this).remove();
    }
  }</script>
  <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	</head>
	<body background='bl.png'>
<?php
include "header.php";
$flipkart = new \smartpatron\Flipkart("jagruthna", "26bb396c35104c8d9af52eed52dff001", "json");
$snapdeal = new \smartpatron\Snapdeal("83205", "f81560e63662d37d7e460b94dd65ac", "json");
//To view category pages, API URL is passed as query string.
$url = isset($_GET['url'])?$_GET['url']:false;
if($url)
{
	//URL is base64 encoded to prevent errors in some server setups.
	$url = base64_decode($url);
	//This parameter lets users allow out-of-stock items to be displayed.
	$hidden = isset($_GET['hidden'])?false:true;
	//Call the API using the URL.
	$details = $flipkart->call_url($url);
	if(!$details){
		echo 'Error: Could not retrieve products list.';
		exit();
	}
	//The response is expected to be JSON. Decode it into associative arrays.
	$details = json_decode($details, TRUE);
}
echo ' 
<div class="container">
   <form action="flipkq.php" method="get">
    <div class="form-group">
	<br><br><br>
      <input  align="left" placeholder="What do you want to buy today!!!" class="form-control input-lg" name="input" type="text" required>
    </div>
  </form>
</div>';
//To view category pages, API URL is passed as query string.
$urls = isset($_GET['urls'])?$_GET['urls']:false;

if($urls)
{
	//URL is base64 encoded to prevent errors in some server setups.
	$urls = base64_decode($urls);
	//This parameter lets users allow out-of-stock items to be displayed.
	$hiddens = isset($_GET['hiddens'])?false:true;
	//Call the API using the URL.
	$detailss = $snapdeal->call_url($urls);
	if(!$detailss){
		echo 'Error: Could not retrieve products list.';
		exit();
	}
	//The response is expected to be JSON. Decode it into associative arrays.
	$detailss = json_decode($detailss, TRUE);
}
if($url&$urls)
{
	//Products table
	echo "<table border=2 cellpadding=10 cellspacing=1 style='text-align:center;empty-cells: hide;'>";
	$end = 1;
	$i=0;
	//Make sure there are products in the list.
	$products = $details['productInfoList'];
	if(count($products) > 0)
		{
			foreach ($products as $product) {
		    $inStock = $product['productBaseInfo']['productAttributes']['inStock'];
			if(!$inStock && $hidden)
				continue;
			//The API returns these values nested inside the array.
			//Only image, price, url and title are used in this demo
			$productId = $product['productBaseInfo']['productIdentifier']['productId'];
			$title = $product['productBaseInfo']['productAttributes']['title'];
			$productDescription = $product['productBaseInfo']['productAttributes']['productDescription'];
			//We take the 200x200 image, there are other sizes too.
			$productImage = array_key_exists('200x200', $product['productBaseInfo']['productAttributes']['imageUrls'])?$product['productBaseInfo']['productAttributes']['imageUrls']['200x200']:'';
			$sellingPrice = $product['productBaseInfo']['productAttributes']['sellingPrice']['amount'];
			$productUrl = $product['productBaseInfo']['productAttributes']['productUrl'];
			$productBrand = $product['productBaseInfo']['productAttributes']['productBrand'];
			$color = $product['productBaseInfo']['productAttributes']['color'];
			$productUrl = $product['productBaseInfo']['productAttributes']['productUrl'];
                        if($sellingPrice!=0)
			        echo "<td  style='background:white' width='25%'><img src='$productImage'/><br/><br/><h3>$title</h3><table width=100%><tr><td><img src='http://www.rockyparker.16mb.com/index.png' width='100'/></td><td><font size='5'>Price:$sellingPrice</font></td><td><a href='$productUrl' class='button-secondary'><span>Buy Now</span></a></td></tr></table></td>";
			$inStocks = $detailss['products'][$i]['availability'];
			//The API returns these values nested inside the array.
			//Only image, price, url and title are used in this demo
			$productIds = $detailss['products'][$i]['id'];
			$titles = $detailss['products'][$i]['title'];
			$productDescriptions = $detailss['products'][$i]['description'];
			$productImages = $detailss['products'][$i]['imageLink'];
			$sellingPrices = $detailss['products'][$i]['mrp'];
			$productUrls = $detailss['products'][$i]['link'];
			$productBrands = $detailss['products'][$i]['brand'];
			$subcategorys = $detailss['products'][$i]['subCategoryName'];
			$i=$i+1;
			//Setting up the table rows/columns for a 3x3 view.
			$end = 0;
                        if($sellingPrices!=0)
						echo "<td style='background:white' width='25%'><img src='$productImages' height='260' width='260'/><br/><br/><h3>$titles</h3><table width=100%><tr><td><img src='snap.png' width='100'/></td><td><font size='5'>Price:$sellingPrices</font></td><td><a href='$productUrls' class='button-secondary'><span>Buy Now</span></a></td></tr></table></td>";
		if(($i%2)==0)
            echo "</tr>";
		}
		echo "</table>";

	//A message if no products are printed.	
	if($i==0){
		echo '<tr><td>The retrieved products are not in stock. Try the Next button or another category.</td><tr>';
	}
	//A hack to make sure the tags are closed.	
	if($end!=1)
		echo '</td></tr>';
	echo '</table>';
		}
	//That's all we need for the category view.
	exit();
}
?>
</body>
</html>
