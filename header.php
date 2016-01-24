<html lang="en">
<head>
	</head>
	<body>
<?php
//Include the class.
include "smartpatron.flipkart-api.php";
include "smartpatron.snapdeal-api.php";

//Replace <affiliate-id> and <access-token> with the correct values
$flipkart = new \smartpatron\Flipkart("jagruthna", "26bb396c35104c8d9af52eed52dff001", "json");
$snapdeal = new \smartpatron\Snapdeal("83205", "f81560e63662d37d7e460b94dd65ac", "json");

//If the control reaches here, the API directory view is shown.
//Query the API
$home = $flipkart->api_home();
//Make sure there is a response.
if($home==false){
	echo 'Error: Could not retrieve API homepage';
	exit();
}
//Convert into associative arrays.
$home = json_decode($home, TRUE);
$list = $home['apiGroups']['affiliate']['apiListings'];
//Create the tabulated view for different categories.
echo "<center><table  width='100%' style='text-align:left;'>";
$count = 0;
$a=0;
foreach ($list as $key => $data) {
	$key1=str_replace('_', ' ', $key);
	//URL is base64 encoded when sent in query string.
	$URL[$a]=base64_encode($data['availableVariants']['v0.1.0']['get']);
	$cat[$a]=$key1;
	$a++;
}
//If the control reaches here, the API directory view is shown.
//Query the API
$homes = $snapdeal->api_home();
//Make sure there is a response.
if($homes==false){
	echo 'Error: Could not retrieve API homepage';
	exit();
}
//Convert into associative arrays.
$homes = json_decode($homes, TRUE);
$lists = $homes['apiGroups']['Affiliate']['listingsAvailable'];
//Create the tabulated view for different categories.
echo "<table  width='100%' style='text-align:left;'>";
$counts = 0;
$as=0;
foreach ($lists as $keys => $datas) {
	$key1s=str_replace('_', ' ', $key);
	//URL is base64 encoded when sent in query string.
	$URLS[$as]=base64_encode($datas['listingVersions']['v1']['get']);
	$cats[$as]=$key1s;
	$as++;
}
echo '
<div style="position:fixed;top:0px;left:25%;background-color:rgba(0,153,255,1);">
<nav id="ddmenu">
    <div class="menu-icon" ></div>
    <ul>
        <li class="over" >
            <span class="top-heading">Electronics</span>
			<i class="caret"></i>           
            <div class="dropdown">
                <div class="dd-inner">
                    <div class="column" >
                        <h3>Smart devices</h3>
						<a href="catt.php?url='.$URL[33].'&urls='.$URLS[20].'&subc=Mobile Phones">mobiles</a>
                                                <a href="catt.php?url='.$URL[18].'&urls='.$URLS[20].'&subc=Tablets">tablets</a>
						<a href="catt.php?url='.$URL[39].'&urls='.$URLS[12].'&subc=Landline phones">landline phones</a>
                                                <a href="catt.php?url='.$URL[28].'&urls='.$URLS[25].'&subc=Desktops">desktops</a>
						<a href="catt.php?url='.$URL[41].'&urls='.$URLS[25].'&subc=Laptops">laptops</a>
						<a href="catt.php?url='.$URL[51].'&urls='.$URLS[33].'">e learning</a>
						<a href="catt.php?url='.$URL[24].'&urls='.$URLS[55].'&subc=Smart Watches">wearable smart devices</a>
						<a href="catt.php?url='.$URL[29].'&urls='.$URLS[40].'">gaming</a>
						<a href="catt.php?url='.$URL[37].'&urls='.$URLS[23].'&subc=Digital Cameras">cameras</a>
                    </div>
                    <div class="column">
                        <h3>E-accessories</h3>
						<a href="catt.php?url='.$URL[6].'&urls='.$URLS[20].'">mobile accessories</a>
						<a href="catt.php?url='.$URL[3].'&urls='.$URLS[23].'">camera accessories</a>
						<a href="catt.php?url='.$URL[31].'&urls='.$URLS[25].'">laptop accessories</a>
						<a href="catt.php?url='.$URL[32].'&urls='.$URLS[20].'&subc=Tablet Accessories">tablet accessories</a>
                                                <a href="catt.php?url='.$URL[14].'&urls='.$URLS[25].'&subc=External Hard Drives">computer storage</a>
                                                <a href="catt.php?url='.$URL[40].'&urls='.$URLS[20].'&subc="Routers & Modems"">network components</a>
                                                <a href="catt.php?url='.$URL[47].'&urls='.$URLS[25].'">computer peripherals</a>
                    </div>
					  <div class="column">
                        <h3>E-Home</h3>
						<a href="catt.php?url='.$URL[13].'&urls='.$URLS[12].'&subc=Televisions">televisions</a>
                                                <a href="catt.php?url='.$URL[45].'&urls='.$URLS[29].'&subc=Air Conditioners Split AC">air conditioners</a>
                                                <a href="catt.php?url='.$URL[55].'&urls='.$URLS[29].'&subc="Washing Machines & Dryers"">washing machine</a>
						<a href="catt.php?url='.$URL[43].'&urls='.$URLS[29].'&subc=Refrigerator">refrigerator</a>
						<a href="catt.php?url='.$URL[30].'&urls='.$URLS[29].'&subc="Microwave Ovens & OTGs"">microwave ovens</a>
						<a href="catt.php?url='.$URL[26].'&urls='.$URLS[29].'&subc="Fans & Air Coolers"">air coolers</a>
                    </div>
					 <div class="column">
                        <h3>Audio,Video players & accessories</h3>
						<a href="catt.php?url='.$URL[48].'&urls='.$URLS[12].'&subc=Portable Audio Players">audio players</a>
						<a href="catt.php?url='.$URL[17].'&urls='.$URLS[12].'&subc=Video Players">video players</a>
						<a href="catt.php?url='.$URL[2].'&urls='.$URLS[12].'&subc=Projectors">tv video accessories</a>
                    </div>
                </div>
            </div>
        </li>
		  <li class="over">
            <span class="top-heading">Home Needs</span>
			<i class="caret"></i>           
            <div class="dropdown right-aligned">
                <div class="dd-inner">
                    <div class="column">
                        <h3>Categories</h3>
                                                <a href="catt.php?url='.$URL[53].'&urls='.$URLS[29].'&subc=Tablets">Home appliances</a>
                                                <a href="catt.php?url='.$URL[12].'&urls='.$URLS[43].'">Home & Kitchen Needs</a>
                                                <a href="catt.php?url='.$URL[20].'&urls='.$URLS[45].'">home decor and festive Needs</a>
                                                <a href="catt.php?url='.$URL[35].'&urls='.$URLS[29].'&subc=Kitchen Appiliances">kitchen appliances</a>
						<a href="catt.php?url='.$URL[46].'&urls='.$URLS[43].'&">household supplies</a>
						<a href="catt.php?url='.$URL[44].'&urls='.$URLS[12].'">home entertainment</a>
                                                <a href="catt.php?url='.$URL[38].'&urls='.$URLS[7].'">home improvement tools</a>
                    </div>
			<div class="column">
                              <h3>Furniture Needs</h3>
                                   <div>
                                                <a href="catt.php?url='.$URL[4].'&urls='.$URLS[20].'&subc=Tablets">furniture</a>
                                                <a href="catt.php?url='.$URL[49].'&urls='.$URLS[35].'">home furnishing</a>
                           
                    
                        </div>
                    </div>
                </div>

            </div>
        </li>
        <li class="over">
            <span class="top-heading">Clothings</span>
			<i class="caret"></i>           
            <div class="dropdown offset300">
                <div class="dd-inner">
                    <div class="column">
                        <h3>Women"s</h3>
                        <div>
                                                        <a href="catt.php?url='.$URL[22].'&urls='.$URLS[57].'">womens clothing</a>
                                                        <a href="catt.php?url='.$URL[25].'&urls='.$URLS[46].'">womens footwear</a>
                                                        <a href="catt.php?url='.$URL[34].'&urls='.$URLS[20].'&subc=Tablets">grooming beauty wellness</a>
							<a href="catt.php?url='.$URL[36].'&urls='.$URLS[55].'">watches</a>
							<a href="catt.php?url='.$URL[1].'&urls='.$URLS[60].'">fragrances</a>
                                                        <a href="catt.php?url='.$URL[11].'&urls='.$URLS[3].'">jewellery</a>
                                                        <a href="catt.php?url='.$URL[21].'&urls='.$URLS[20].'&subc=Tablets">sunglasses</a>
                        </div>
                        <h3>Men"s</h3>
                        <div>
                                                         <a href="catt.php?url='.$URL[15].'&urls='.$URLS[14].'">mens clothing</a>
                                                         <a href="catt.php?url='.$URL[57].'&urls='.$URLS[28].'">mens footwear</a>
                                                         <a href="catt.php?url='.$URL[0].'&urls='.$URLS[20].'&subc=Tablets">bags wallets belts</a>
							 <a href="catt.php?url='.$URL[36].'&urls='.$URLS[55].'">watches</a>
							 <a href="catt.php?url='.$URL[21].'&urls='.$URLS[20].'&subc=Tablets">sunglasses</a>
                        </div>
                    </div>
                    <div class="column">
                        <h3>Kids</h3>
                        <div>
                            <a href="catt.php?url='.$URL[19].'&urls='.$URLS[52].'">kids footwear</a>
                            <a href="catt.php?url='.$URL[23].'&urls='.$URLS[20].'&subc=Tablets">kids clothing</a>
                            <a href="catt.php?url='.$URL[50].'&urls='.$URLS[53].'">baby care</a>
                            <a href="catt.php?url='.$URL[52].'&urls='.$URLS[20].'&subc=Tablets">toys</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>

		<li class="over">
            <span class="top-heading">Auto & sports</span>
			<i class="caret"></i>           
            <div class="dropdown right-aligned">
                <div class="dd-inner">
                    <div class="column">
                        <h3>Categories</h3>
                        <a href="catt.php?url='.$URL[5].'&urls='.$URLS[57].'">sports fitness</a>
                        <a href="catt.php?url='.$URL[8].'&urls='.$URLS[6].'">automotive</a>
                    </div>
                 </div>
             </div>
        </li>
		<li class="over">
            <span class="top-heading">Others</span>
			<i class="caret"></i>           
            <div class="dropdown right-aligned">
                <div class="dd-inner">
                    <div class="column">
                        <h3>Categories</h3>
                                                <a href="catt.php?url='.$URL[7].'&urls='.$URLS[20].'&subc=Tablets">pet supplies</a>
                                                <a href="catt.php?url='.$URL[10].'&urls='.$URLS[20].'&subc=Tablets">food nutrition</a>
						<a href="catt.php?url='.$URL[16].'&urls='.$URLS[30].'">stationery office supplies</a>
						<a href="catt.php?url='.$URL[27].'&urls='.$URLS[20].'&subc=Tablets">music movies posters</a>
						<a href="catt.php?url='.$URL[42].'&urls='.$URLS[20].'&subc=Tablets">luggage travel</a>
						<a href="catt.php?url='.$URL[54].'&urls='.$URLS[1].'">eyewear</a>
						<a href="catt.php?url='.$URL[9].'&urls='.$URLS[20].'&subc=Tablets">software</a>
                    </div>
                 </div>
             </div>
        </li>
    </ul>
</nav></div>
';
?>

</body>
</html>
