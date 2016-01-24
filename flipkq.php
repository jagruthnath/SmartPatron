<html>
	<head>
		<script>window.location=$producturl;</script>
                <script>
				function ale()
				{
					if(!alert("Enter search query!!!")) 
						document.location = '/final.html';
				}		
			</script>
		<style>
		.button-secondary {
            color: white;
			padding:4px;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            background: rgb(66, 184, 221);
			text-decoration:none;
        }
		.myButton {
	-moz-box-shadow: 0px 10px 14px -7px #0a5e6b;
	-webkit-box-shadow: 0px 10px 14px -7px #0a5e6b;
	box-shadow: 0px 10px 14px -7px #0a5e6b;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0fbfff), color-stop(1, #0bc2de));
	background:-moz-linear-gradient(top, #0fbfff 5%, #0bc2de 100%);
	background:-webkit-linear-gradient(top, #0fbfff 5%, #0bc2de 100%);
	background:-o-linear-gradient(top, #0fbfff 5%, #0bc2de 100%);
	background:-ms-linear-gradient(top, #0fbfff 5%, #0bc2de 100%);
	background:linear-gradient(to bottom, #0fbfff 5%, #0bc2de 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0fbfff', endColorstr='#0bc2de',GradientType=0);
	background-color:#0fbfff;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:20px;
	font-weight:bold;
	padding:13px 32px;
	text-decoration:none;
	text-shadow:0px 1px 0px #1186ad;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0bc2de), color-stop(1, #0fbfff));
	background:-moz-linear-gradient(top, #0bc2de 5%, #0fbfff 100%);
	background:-webkit-linear-gradient(top, #0bc2de 5%, #0fbfff 100%);
	background:-o-linear-gradient(top, #0bc2de 5%, #0fbfff 100%);
	background:-ms-linear-gradient(top, #0bc2de 5%, #0fbfff 100%);
	background:linear-gradient(to bottom, #0bc2de 5%, #0fbfff 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0bc2de', endColorstr='#0fbfff',GradientType=0);
	background-color:#0bc2de;
}
.myButton:active {
	position:relative;
	top:1px;
}
       table, td, th {    
    text-align: center;
}
table {
    border-collapse: collapse;
}

th, td {
    padding: 15px;
}
</style>
 		<title>Smart Patron</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71844439-1', 'auto');
  ga('send', 'pageview');

</script>

 </head>
 <body>
<?php

    //Include the class.

    include "smartpatron.flipkart-api.php";

    //Replace <affiliate-id> and <access-token> with the correct values

    $flipkart = new \smartpatron\Flipkart("jagruthna", "26bb396c35104c8d9af52eed52dff001", "json");

	$fo=$_GET['input'];
        		if ($fo == null || $fo == "") 
			echo "<script> ale(); </script>"; 
	$fo = str_replace(' ', '%20', $fo);
	$count=10;
    $url= 'https://affiliate-api.flipkart.net/affiliate/search/json?query='.$fo.'&resultCount='.$count;
    //Call the API using the URL.
    $details = $flipkart->call_url($url);

    if(!$details){

        echo 'Error: Could not retrieve products list.';

        exit();
    }

    //The response is expected to be JSON. Decode it into associative arrays.
	$i=0;
	$details = json_decode($details, TRUE);
	$ctr=0;
	echo "<table width='100%' border='1px solid #ddd'><tr>";
	while($i<$count)
	{
	$proid = $details['productInfoList'][$i]['productBaseInfo']['productIdentifier']['productId'];

        $price = $details['productInfoList'][$i]['productBaseInfo']['productAttributes']['sellingPrice']['amount'];

	$imgurl=$details['productInfoList'][$i]['productBaseInfo']['productAttributes']['imageUrls']['200x200'];

	$producturl=$details['productInfoList'][$i]['productBaseInfo']['productAttributes']['productUrl'];

        $inStock = (int) $details['productInfoList'][$i]['productBaseInfo']['productAttributes']['inStock'];

        $title = $details['productInfoList'][$i]['productBaseInfo']['productAttributes']['title'];

	$probrand = $details['productInfoList'][$i]['productBaseInfo']['productAttributes']['productBrand'];

	$disprice = $details['productInfoList'][$i]['productBaseInfo']['productAttributes']['discountPercentage'];

        $description = $details['productInfoList'][$i]['productBaseInfo']['productAttributes']['productDescription'];

       	$color = $details['productInfoList'][$i]['productBaseInfo']['productAttributes']['color'];

	$colorVar = $details['productInfoList'][$i]['productBaseInfo']['productAttributes']['colorVariants'];
if($price!=0)
	echo "<td width='33%'><img src='$imgurl'/><br/><br/><h3>$title ($color)</h3><table width=100%><tr><td><img src='http://smartpatron.epizy.com/index.png' width='100'/></td><td><font size='5'>Price:$price</font></td><td><a href='".$producturl."' class='button-secondary'><span>Buy Now</span></a></td></tr></table></td>";
else
       $flag[$i]=-1;
   $ctr=$ctr+1;
	if(($ctr%3)==0)
            echo "</tr>";
	$i=$i+1;
}
$i=0;$k=0;
while($i<$count)
{

      if($flag[$i]==-1)
            $k++;
     $i++;
}
if($k==$count)
      echo "<center><h1 color=red>No matching products available.</h1></center>";
echo "</table>";
echo "<br/><center><a href='index.php'/><input type='button' value='Back' class='myButton'></center>";
?>
</body>
</html>
