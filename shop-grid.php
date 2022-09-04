<?php
try{
    $server_name="10.64.144.9";
    $db_name="19jygr06";
    $user_name="19jygr06";
    $user_pass="19jygr06";
    $dsn="sqlsrv:server=$server_name;database=$db_name";
    $pdo=new PDO($dsn,$user_name,$user_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

}catch(PDOException $e){
    print "接続エラー!:".$e->getMessage();
    exit();
}
?>

<?php
    //セッションの開始
	session_start();

	// DB設定ファイル
	if(!defined("CONST_INC"))		include("./inc/db_connect.php");
	if (isset($_SESSION['c_code'])){
		$c_code = $_SESSION['c_code'];
	}else{
		header("Location: Login.php");
		exit;
	}
	$sql = "select c_name from customers where c_code = ?";
	
	$prepare = $dbh->prepare ( $sql );
	$prepare->execute ( array($c_code));
	$result = $prepare->fetch ( PDO::FETCH_ASSOC );
	
	$c_name = (isset($result["c_name"])?$result["c_name"]:"ゲスト");
	$dbh = null;
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- StyleSheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Jquery Ui -->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- customize design css -->
    <link rel="stylesheet" href="css/design.css">

</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li><i class="ti-headphone-alt"></i> <a href="tel:+070 (8001) 8011-5822">+070 (8001) 8011-5822</a></li>
                                <li><i class="ti-email"></i> <a href="mailto:support@charmclo.com" target="_blank">support@charmclo .com</a></li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">
                                <li><i class="ti-location-pin"></i> <a href="contact.php">Store location</a></li>
                            </ul>
                        </div>
                        <!-- End Top Right -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img class="main-logo" src="images/charmclo_logo2.png" alt="logo"></a>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form class="search-form">
                                    <input type="text" placeholder="Search here..." name="search">
                                    <button value="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <select>
									<option selected="selected">探す</option>
                                        <option>ブランドから探す</option>
                                        <option>春用で探す</option>
                                        <option>夏用で探す</option>
                                        <option>秋用で探す</option>
                                        <option>冬用で探す</option>
								</select>
                                <button class="btn select-search-btn">検索</button>
                                <form action="input-search-shop-grid.php" method="post">
                                    <input name="search" placeholder="Search Products Here....." type="search">
                                    <div>
                                        <button type="submit" name="search-btn" class="btnn search-btn"><i class="ti-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="right-bar">
                            <!-- Search Form -->
                            <!-- <div class="sinlge-bar">
                                <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="sinlge-bar shopping">
                                <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>2 Items</span>
                                        <a href="#">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        <li>
                                            <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                            <h4><a href="cart.php">Woman Ring</a></h4>
                                            <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                        </li>
                                        <li>
                                            <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                            <h4><a href="cart.php">Woman Necklace</a></h4>
                                            <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                        </li>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">$134.00</span>
                                        </div>
                                        <a href="checkout.php" class="btn animate">Checkout</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Inner -->
       
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-lg-3">
                            <div id="all_Category" class="all-category">
                                <h3 class="cat-heading" id="toggle"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
                                <ul id="main_Category" class="main-category" style="display: none;">
                                    <?php 
                                        try {
                                            $mainCat_sql = "SELECT b_categoryID, b_catName FROM b_category" ;
	                                        $st1 = $pdo->prepare($mainCat_sql);
	                                        $st1->execute();
	                                        $mainCat = array();
	                                        $i = 0;
	                                        foreach ($st1->fetchAll(PDO::FETCH_ASSOC) as $row1) {
                                    ?>
                                        <li><span class="main-categoryName"><?php echo $row1['b_catName']; ?><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            <?php 
                                                $mainCat = $row1['b_categoryID'];
                                            $subCat_sql = "SELECT b_categoryID, STRING_AGG(s_catName,',') AS sub FROM s_category WHERE b_categoryID = :mainCat GROUP BY b_categoryID";
                                            $st2 = $pdo->prepare($subCat_sql);
                                            $st2->bindParam( ":mainCat", $mainCat, PDO::PARAM_STR);
                                            $st2->execute();
                                            $subCatArray = array();
                                            foreach ($st2->fetchAll(PDO::FETCH_ASSOC) as $row2) {
                                                $subCatName = $row2['sub'];
                                                $subCatArray = explode(",", $subCatName);
                                                $i = 0;
                                            ?>
                                                <ul class="sub-category">
                                                    <?php while($i < Count($subCatArray)){ ?>
                                                        <a href="shop-grid.php?large_category=<?php echo $row1['b_catName']; ?>&small_category=<?php echo $subCatArray[$i]; ?>">
                                                            <li><span class="sub-categoryName"><?php echo $subCatArray[$i]; ?></span></li>
                                                        </a>
                                                    <?php $i++;  } ?>
                                                </ul>
                                            <?php 
                                                }
                                            ?>
                                        </li>
                                    <?php 
                                            } 
                                        }catch (PDOException $e) {
                                            echo "There is some problem in connection: " . $e->getMessage();
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <li><a href="index.php">Home</a></li>
                                                <li><a href="about.php">About Us</a></li>
                                                <li><a href="cart.php">My Cart</a></li>
                                                <li class="active"><a href="#">Services<i class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="cart.php">My Cart</a></li>
                                                        <li><a href="mycart.php">Order History</a></li>
                                                    </ul>
                                                </li>

                                                <li><a href="sale-shop-grid.php">Sales<span class="new">New</span></a>
                                                </li>
                                                <li><a href="contact.php">Contact Us</a></li>
                                            </ul>
                                        </div>
                                        <div class="user-info">
                                            <img src="./images/img_avatar.png" alt="Avatar" class="avatar">
                                            <span class="user-name"><?php echo $c_name; ?> 様</span>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                        <li><a href="index.php">Home</a></li>
                            <!-- <li class="active"><a href="shop-grid.php">Shop Grid</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Product Style -->
    <section class="product-area shop-sidebar shop section product-shop">
        <div class="nav-main product-shop-nav">
            <!-- Tab Nav -->
            <!-- <ul class="nav nav-tabs" id="myTab" role="tablist"> -->
            <!-- <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab">All</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#man" role="tab">Men</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Women</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Kids</a></li> -->
            <!-- </ul> -->
            <!--/ End Tab Nav -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title main-category-name"></h3>
                            <ul class="categor-list">
                                <?php 
                                    try {
                                        $mainCat = $_GET['large_category'];
                                        $sub_category_sql = "SELECT b_catName, s_catName FROM s_category sc INNER JOIN b_category mc ON sc.b_categoryID = mc.b_categoryID WHERE mc.b_catName = :mainCat" ;
                                        $st2 = $pdo->prepare($sub_category_sql);
                                        $st2->bindParam( ":mainCat", $mainCat, PDO::PARAM_STR);
                                        $st2->execute();

                                        foreach ($st2->fetchAll(PDO::FETCH_ASSOC) as $row) {
                                            $subCatStr = preg_replace('/[^\w\s]+/u','_' ,$row['s_catName']);
                                ?>
                                    <li class="selected side-sub-category" id="<?php echo $subCatStr ?>">
                                        <a href="shop-grid.php?large_category=<?php echo $row['b_catName']; ?>&small_category=<?php echo $row['s_catName'] ?>">
                                            <?php echo $row['s_catName'] ?>
                                        </a>
                                    </li>
                                <?php 
                                        } 
                                    }catch (PDOException $e) {
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }
                                ?>
                                <!-- <li class="side-sub-category" id="BBB"><a href="#">BBB</a></li>
                                <li class="side-sub-category" id="CCC"><a href="#">CCC</a></li>
                                <li class="side-sub-category" id="DDD"><a href="#">DDD</a></li>
                                <li class="side-sub-category" id="EEE"><a href="#">EEE</a></li>
                                <li class="side-sub-category" id="FFF"><a href="#">FFF</a></li>
                                <li class="side-sub-category" id="GGG"><a href="#">GGG</a></li> -->
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Shop By Price -->
                        <div class="single-widget range">
                            <h3 class="title">Show by Size</h3>
                            <!-- <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <?php $url= $_SERVER['REQUEST_URI']; ?>
                            <?php
                                try{
                                    $smallCat = $_GET['small_category'];
                                    $sub_category_sql = "SELECT COUNT(s.size_id) As count, size_name FROM item i INNER JOIN s_category sc ON i.s_categoryID = sc.s_categoryID INNER JOIN size s ON i.size_id = s.size_id WHERE s_catName = :smallCat GROUP BY size_name" ;
                                    $st5 = $pdo->prepare($sub_category_sql);
                                    $st5->bindParam( ":smallCat", $smallCat, PDO::PARAM_STR);
                                    $st5->execute();

                                    foreach ($st5->fetchAll(PDO::FETCH_ASSOC) as $row4) {
                            ?>
                            <form action="<?php echo $url; ?>" method="post">
                                <ul class="check-box-list">
                                        <li>
                                            <label class="checkbox-inline" for="1">
                                                <input name="size" id="1" class="size" type="checkbox" value=<?php echo $row4['size_name']; ?>><?php echo $row4['size_name']; ?>
                                                <span class="count"><?php echo "(" . $row4['count'] . ")"; ?></span>
                                            </label>
                                        </li>
                                    <!-- <li>
                                        <label class="checkbox-inline" for="2">
                                            <input name="size" id="2" class="size" type="checkbox" value="Medium">Medium
                                            <span class="count">(5)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline" for="3">
                                            <input name="size" id="3" class="size" type="checkbox" value="Large">Large
                                            <span class="count">(8)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline" for="3">
                                            <input name="size" id="4" class="size" type="checkbox" value="Xl">Xl
                                            <span class="count">(8)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline" for="3">
                                            <input name="size" id="5" class="size" type="checkbox" value="XXl">XXl
                                            <span class="count">(8)</span>
                                        </label>
                                    </li> -->
                                    <?php 
                                            } 
                                        }catch (PDOException $e) {
                                            echo "There is some problem in connection: " . $e->getMessage();
                                        }
                                    ?>
                                    <input type="submit" name="sizeSubmit" value="クリック" class="sizeSubmit"/>
                                </ul>
                            </form>
                        </div>
                        <!--/ End Shop By Price -->
                        <!-- Single Widget -->
                        <!-- <div class="single-widget range">
                            <h3 class="title">Seasonal Condition</h3>
                            <ul class="check-box-list">
                                <li>
                                    <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">Autumn Style</label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Summer Style</label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">Spring Style</label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">Winter Style</label>
                                </li>
                            </ul>
                        </div> -->
                        <!--/ End Single Widget -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <!-- <span class="main-category-name"></span>
                                    <i class="ti-arrow-right category-ref"></i>
                                    <span class="sub-category-name"></span> -->
                                    <span class="count-item"></span>
                                    <span class="size-info">
                                        <?php 
                                            if(isset($_POST['sizeSubmit'])){
                                                $size = $_POST['size'];
                                                if($size != null){
                                                	 echo "サイズ : " . $size;
                                                }
                                               else {
                                                echo "<meta http-equiv='refresh' content='0'>";
                                           	  }
                                            }else{
                                            	echo "";
                                            } 
                                        ?>
                                    </span>
                                </div>
                                <div id="pagination-container"></div>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row product-wrapper">
                        <?php 
                            if(isset($_POST['sizeSubmit'])){
                                $size = $_POST['size'];
                                try {
                                    $subCat = $_GET['small_category'];

                                    $filter_item_sql = "SELECT item_id, item_name, size_name, b_catName, s_catName, item_img1, item_img2, price,stock, brand_name, season_name, gender, country, description, color FROM item i INNER JOIN s_category sc ON i.s_categoryID = sc.s_categoryID INNER JOIN b_category mc ON sc.b_categoryID = mc.b_categoryID INNER JOIN size s ON i.size_id = s.size_id INNER JOIN brand b ON i.brand_id = b.brand_id INNER JOIN season ss ON i.season_id = ss.season_id WHERE sc.s_catName = :subCat AND s.size_name = :size" ;
                                    $st4 = $pdo->prepare($filter_item_sql);
                                    $st4->bindParam( ":subCat", $subCat, PDO::PARAM_STR);
                                    $st4->bindParam( ":size", $size, PDO::PARAM_STR);
                                    $st4->execute();

                                    foreach ($st4->fetchAll(PDO::FETCH_ASSOC) as $row3) {
                        ?>
                            <div class="col-lg-4 col-md-6 col-12 product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <!-- <a href="#"> -->
                                            <img class="default-img" src="<?php echo "./images/items/" . $row3['item_img1']; ?>" alt="#">
                                            <img class="hover-img" src="<?php echo "./images/items/" . $row3['item_img1']; ?>" alt="#">
                                        <!-- </a> -->
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#detailModal" title="商品詳細" href="#" class="view"><i class=" ti-eye"></i><span>詳細を見る</span></a>
                                                <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
                                            </div>
                                            <div class="product-action-2">
                                                <?php //$url= $_SERVER['REQUEST_URI']; ?>
                                                <form action="add_to_cart.php" method="post">
                                                    <input type="hidden" name="cart_itemId" value="<?php echo $row3['item_id']; ?>" />
                                                    <!-- <input type="hidden" name="cart_image" value="<?php //echo $row3['item_img1']; ?>" />
                                                    <input type="hidden" name="cart_itemMainType" value="<?php //echo $row3['b_catName']; ?>" />
                                                    <input type="hidden" name="cart_itemSubType" value="<?php //echo $row3['s_catName']; ?>" />
                                                    <input type="hidden" name="cart_iteb_catName" value="<?php //echo $row3['item_name']; ?>" />
                                                    <input type="hidden" name="cart_size_name" value="<?php //echo $row3['size_name']; ?>" />
                                                    <input type="hidden" name="cart_price" value="<?php //echo $row3['price']; ?>" /> -->
                                                    <a title="Add to cart" href="#">
                                                    <input type="submit" name="add_to_cart" value="Add to Cart" data-toggle="modal" data-target="#warningModal" />
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="#">
                                            <?php 
                                                echo $row3['item_name'] . "\t/ "; 
                                                echo $row3['size_name'] . "\t"; 
                                            ?>
                                        </a></h3>
                                        <div class="product-price">
                                            <span class="hide-price">￥<?php echo number_format($row3['price']) . "(税込)"; ?></span>
                                        </div>
                                        <span class="hide hide-itemName"><?php echo $row3['item_name'];?></span>
                                        <span class="hide hide-size"><?php echo $row3['size_name'];?></span>
                                        <span class="hide hide-gender"><?php echo $row3['gender'];?></span>
                                        <span class="hide hide-country"><?php echo $row3['country'];?></span>
                                        <span class="hide hide-season"><?php echo $row3['season_name'];?></span>
                                        <span class="hide hide-brand"><?php echo $row3['brand_name'];?></span>
                                        <span class="hide hide-color"><?php echo $row3['color'];?></span>
                                        <span class="hide hide-stock"><?php echo $row3['stock'];?></span>
                                        <span class="hide hide-description"><?php echo $row3['description'];?></span>
                                        <span class="hide hide-largeCat"><?php echo $row3['b_catName'];?></span>
                                        <span class="hide hide-smallCat"><?php echo $row3['s_catName'];?></span>
                                        <span class="hide hide-img1"><?php echo $row3['item_img1'];?></span>
                                        <span class="hide hide-img2"><?php echo $row3['item_img2'];?></span>
                                        <div class="image1">
                                            <span>
                                                <?php
                                                    echo $row3['item_img1'];
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                                    } 
                                }catch (PDOException $e) {
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }
                            }else{
                                try {
                                    $subCat = $_GET['small_category'];

                                    $item_sql = "SELECT item_id, item_name, size_name, b_catName, s_catName, item_img1, item_img2, price, stock, brand_name, season_name, gender, country, description, color FROM item i INNER JOIN s_category sc ON i.s_categoryID = sc.s_categoryID INNER JOIN b_category mc ON sc.b_categoryID = mc.b_categoryID INNER JOIN size s ON i.size_id = s.size_id INNER JOIN brand b ON i.brand_id = b.brand_id INNER JOIN season ss ON i.season_id = ss.season_id WHERE sc.s_catName = :subCat" ;
                                    $st3 = $pdo->prepare($item_sql);
                                    $st3->bindParam( ":subCat", $subCat, PDO::PARAM_STR);
                                    $st3->execute();

                                    foreach ($st3->fetchAll(PDO::FETCH_ASSOC) as $row) {
                        ?>
                            <div class="col-lg-4 col-md-6 col-12 product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <!-- <a href="#"> -->
                                            <img class="default-img" src="<?php echo "./images/items/" . $row['item_img1']; ?>" alt="#">
                                            <img class="hover-img" src="<?php echo "./images/items/" . $row['item_img1']; ?>" alt="#">
                                        <!-- </a> -->
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#detailModal" title="商品詳細" href="#" class="view"><i class=" ti-eye"></i><span>詳細を見る</span></a>
                                                <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
                                            </div>
                                            <div class="product-action-2">
                                                <?php //$url= $_SERVER['REQUEST_URI']; ?>
                                                <form action="add_to_cart.php" method="post">
                                                    <input type="hidden" name="cart_itemId" value="<?php echo $row['item_id']; ?>" />
                                                    <a title="Add to cart" href="#">
                                                        <input type="submit" name="add_to_cart" value="Add to Cart" data-toggle="modal" data-target="#warningModal" />
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="#">
                                            <?php 
                                                echo $row['item_name'] . "\t/ "; 
                                                echo $row['size_name'] . "\t"; 
                                            ?>
                                        </a></h3>
                                        <div class="product-price">
                                            <span class="hide-price">￥<?php echo number_format($row['price']) . "(税込)"; ?></span>
                                        </div>
                                        <span class="hide hide-itemId"><?php echo $row['item_id'];?></span>
                                        <span class="hide hide-itemName"><?php echo $row['item_name'];?></span>
                                        <span class="hide hide-size"><?php echo $row['size_name'];?></span>
                                        <span class="hide hide-gender"><?php echo $row['gender'];?></span>
                                        <span class="hide hide-country"><?php echo $row['country'];?></span>
                                        <span class="hide hide-season"><?php echo $row['season_name'];?></span>
                                        <span class="hide hide-brand"><?php echo $row['brand_name'];?></span>
                                        <span class="hide hide-color"><?php echo $row['color'];?></span>
                                        <!-- <span class="hide hide-quantity"><?php //echo $row['quantity'];?></span> -->
                                        <span class="hide hide-stock"><?php echo $row['stock'];?></span>
                                        <span class="hide hide-description"><?php echo $row['description'];?></span>
                                        <span class="hide hide-largeCat"><?php echo $row['b_catName'];?></span>
                                        <span class="hide hide-smallCat"><?php echo $row['s_catName'];?></span>
                                        <span class="hide hide-img1"><?php echo $row['item_img1'];?></span>
                                        <span class="hide hide-img2"><?php echo $row['item_img2'];?></span>
                                        <div class="image1">
                                            <span>
                                                <?php
                                                    echo $row['item_img1'];
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                                    } 
                                }catch (PDOException $e) {
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Product Style 1  -->

   <!-- Modal -->
   <div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog detail-modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body detail-modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 ">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider img1">
                                        <!-- <img src="https://via.placeholder.com/569x528" alt="#"> -->
                                    </div>
                                    <div class="single-slider img2">
                                        <!-- <img src="https://via.placeholder.com/569x528" alt="#"> -->
                                    </div>
                                    <!-- <div class="single-slider">
                                        <img src="https://via.placeholder.com/569x528" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="https://via.placeholder.com/569x528" alt="#">
                                    </div> -->
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="quickview-content">
                                <h2>商品詳細</h2>
                                <!-- <div class="quickview-ratting-review">
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                    </div>
                                </div> -->
                                <div>
                                    <span class="important-note">※5のつく日に５％引きと初めての購入方に10％引きが適用されます！</span> </br>
                                    <span class="important-note">※サイズ交換と返品は一切できませんのでご了承ください！</span> </br>
                                    <span class="important-note">※配送予定日の前日までに入金が確認されない場合は、キャンセル扱いとなりますのでご了承ください！</span> </br>
                                </div>
                                <!-- detail grid table -->
                                <div class="detail-grid-container">
                                    <div class="detail-items">在庫</div>
                                    <div class="detail-items">
                                        <div class="quickview-stock">
                                            <span class="detail-items-stock"></span>
                                        </div>
                                    </div>

                                    <div class="detail-items">商品名</div>
                                    <div class="detail-items detail-itemName"></div>

                                    <div class="detail-items">小カテゴリ名</div>
                                    <div class="detail-items detail-main-sub"></div>

                                    <div class="detail-items">性別</div>
                                    <div class="detail-items detail-gender"></div>

                                    <div class="detail-items">季節</div>
                                    <div class="detail-items detail-season"></div>

                                    <div class="detail-items">ブランド</div>
                                    <div class="detail-items detail-brand"></div>

                                    <div class="detail-items">サイズ</div>
                                    <div class="detail-items detail-size"></div>

                                    <div class="detail-items">色</div>
                                    <div class="detail-items detail-color"></div>

                                    <div class="detail-items">原産国</div>
                                    <div class="detail-items detail-country"></div>

                                    <div class="detail-items">詳細</div>
                                    <div class="detail-items detail-description"></div>
                                    
                                    <div class="detail-items">単価</div>
                                    <div class="detail-items detail-price"></div>
                                    
                                    <div class="detail-items">数量</div>
                                    <div class="detail-items">
                                        <input type = "number" name="numberOfItem" class="number-of-item" value="1"
                                            oninput = "input_qty()"
                                           maxlength = "2" 
                                           min = "1" 
                                        />
                                        <!-- <button type="button" class="btn btn-outline-primary btn-sm number-btn">カートに入れる</button> -->
                                    </div>
                                    <div class="detail-items hide detail-stock"></div>
                                </div>

                                <div class="add-to-cart">
                                    <!-- <a href="#" class="btn">Add to cart</a> -->
                                    <form action="detail_add_to_cart.php" method="post">
                                        <input type="hidden" name="cart_itemId" value="" id="cart_itemId" />
                                        <input type="hidden" name="cart_qty" value="" id="qty" />
                                        <button class="btn submit-add-to-cart" href="#" type="submit" name="add_to_cart_detail">
                                        カートに入れる
                                        </button>
                                    </form>
                                </div>
                                <!-- <div class="default-social">
                                    <h4 class="share-now">Share:</h4>
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Warning Modal -->
    <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="quantityWarning" aria-hidden="true">
        <div class="modal-dialog customize-warning-modal-dialog" role="document">
            <div class="modal-content customize-warning-modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body customize-warning-modal-body">
                    <div>
                        <h3 class="modal-title waring-title">警告：</h3><br>
                        <h4 style="text-align: center;">商品が在庫切れです！</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Modal -->

    <!-- Warning Modal -->
    <div class="modal fade" id="quantity_warning" tabindex="-1" role="dialog" aria-labelledby="quantityWarning" aria-hidden="true">
        <div class="modal-dialog customize-warning-modal-dialog" role="document">
            <div class="modal-content customize-warning-modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body customize-warning-modal-body">
                    <div>
                        <h3 class="modal-title waring-title">警告：</h3><br>
                        <h4 style="text-align: center;">商品が在庫切れです！</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Modal -->

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Footer Top -->
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo">
                                <a href="index.php"><img class="main-logo" src="images/charmclo_logo2.png" alt="#"></a>
                            </div>
                            <p class="text">charmcloではトップス・パンツ・ワンピースなど最新トレンドアイテムをオンラインでご購入いただけます。charmcloは多くのブランドの人気アイテムを公式に取扱うファッション通販サイトです！</p>
                            <p class="call">Got Question? Call us 24/7<span><a href="tel:800280115822">+070 (8002) 8011-5822</a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>会社情報</h4>
                            <ul>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>お客様サービス</h4>
                            <ul>
                                <li><a href="about.php">会社概要</a></li>
                                <li><a href="about.php">お支払いについて</a></li>
                                <li><a href="about.php">表示価格について</a></li>
                                <li><a href="about.php">配送・送料について</a></li>
                                <li><a href="about.php">プライバシーポリシーについて</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>お問い合わせ</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    <li>〒169-0073 東京都新宿区百人町　　1-25-4</li>
                                    <li>日本、東京</li>
                                    <li>info@charmclo.com</li>
                                    <li> +070 (8001) 8011-5822</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-flickr"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <div class="copyright">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2021 - All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="right">
                                <img src="images/payments.png" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /End Footer Area -->


    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js'></script>
    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Color JS -->
    <script src="js/colors.js"></script>
    <!-- Slicknav JS -->
    <script src="js/slicknav.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="js/owl-carousel.js"></script>
    <!-- Magnific Popup JS -->
    <script src="js/magnific-popup.js"></script>
    <!-- Fancybox JS -->
    <script src="js/facnybox.min.js"></script>
    <!-- Waypoints JS -->
    <script src="js/waypoints.min.js"></script>
    <!-- Countdown JS -->
    <script src="js/finalcountdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="js/nicesellect.js"></script>
    <!-- Ytplayer JS -->
    <script src="js/ytplayer.min.js"></script>
    <!-- Flex Slider JS -->
    <script src="js/flex-slider.js"></script>
    <!-- ScrollUp JS -->
    <script src="js/scrollup.js"></script>
    <!-- Onepage Nav JS -->
    <script src="js/onepage-nav.min.js"></script>
    <!-- Easing JS -->
    <script src="js/easing.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
    <!-- Index JS -->
    <script src="js/index.js"></script>
    <!-- shop grid JS -->
    <script src="js/shop-grid.js"></script>

    <script type="text/javascript">
        $('.size').on('change', function() {
            $('.size').not(this).prop('checked', false);  
        });
    </script>
</body>

</html>