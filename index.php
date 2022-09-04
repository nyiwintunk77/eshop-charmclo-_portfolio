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
                                    <input name="search" placeholder="商品名で検索して下さい。。。。。" type="search">
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
                                    <!-- <li><span class="main-categoryName">ジャケット <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <ul class="sub-category">
                                            <li><span class="sub-categoryName">BBB</span></li>
                                        </ul>
                                    </li>
                                    <li><span class="main-categoryName">パンツ <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <ul class="sub-category">
                                            <li><span class="sub-categoryName">AAA</span></li>
                                        </ul>
                                    </li>
                                    <li><span class="main-categoryName">ホールインワソ <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <ul class="sub-category">
                                            <li><span class="sub-categoryName">AAA</span></li>
                                        </ul>
                                    </li>
                                    <li><span class="main-categoryName">スカート <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <ul class="sub-category">
                                            <li><span class="sub-categoryName">AAA</span></li>
                                        </ul>
                                    </li>
                                    <li><span class="main-categoryName">フォマルスーツ <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <ul class="sub-category">
                                            <li><span class="sub-categoryName">AAA</span></li>
                                        </ul>
                                    </li>
                                    <li><span class="main-categoryName">バッグ <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <ul class="sub-category">
                                            <li><span class="sub-categoryName">AAA</span></li>
                                        </ul>
                                    </li>
                                    <li><span class="main-categoryName">シューズ <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <ul class="sub-category">
                                            <li><span class="sub-categoryName">AAA</span></li>
                                        </ul>
                                    </li>
                                    <li><span class="main-categoryName">財布 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <ul class="sub-category">
                                            <li><span class="sub-categoryName">AAA</span></li>
                                        </ul>
                                    </li>
                                    <li><span class="main-categoryName">帽子 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <ul class="sub-category">
                                            <li><span class="sub-categoryName">AAA</span></li>
                                        </ul>
                                    </li> -->
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
                                                <li class="active"><a href="index.php">Home</a></li>
                                                <li><a href="about.php">About Us</a></li>
                                                <li><a href="cart.php">My Cart</a></li>
                                                <li><a href="#">Services<i class="ti-angle-down"></i></a>
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

    <!-- Slider Area -->
    <section class="hero-slider owl-carousel owl-theme" id="owl-demo">
        <!-- Single Slider -->
        <div class="single-slider">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-9 offset-lg-3 col-12">
                        <div class="text-inner">
                            <!-- <img src="./images/Mandalay-Banner1-1400x670.webp"> -->
                            <div class="row">
                                <div class="col-lg-7 col-12">
                                    <div class="hero-text">
                                        <!-- <h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
                                        <p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
                                        <div class="button">
                                            <a href="#" class="btn">Shop Now!</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item"><img src="./images/Ecommerce-Customer.jpg" alt=""></div>
        <div class="item"><img src="./images/deleiverysoftware.jpeg" alt=""></div>
        <div class="item"><img src="./images/The-eCommerce-Website-4-ways-to-do-it.jpg" alt=""></div>
        <!--/ End Slider Area -->
    </section>

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>冬のアイテム</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="nav-main">
                        <!-- Tab Nav -->
                        <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab">Men</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Women</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Kids</a></li>
                        </ul> -->
                        <!--/ End Tab Nav -->
                    </div>
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->
                        <?php 
                            try {
                                $hot_item_sql = "SELECT stock, item_id, item_name, size_name, b_catName, s_catName, item_img1, item_img2, price, brand_name, season_name, stock, gender, country, description, color FROM item i INNER JOIN s_category sc ON i.s_categoryID = sc.s_categoryID INNER JOIN b_category mc ON sc.b_categoryID = mc.b_categoryID INNER JOIN size s ON i.size_id = s.size_id INNER JOIN brand b ON i.brand_id = b.brand_id INNER JOIN season ss ON i.season_id = ss.season_id WHERE i.season_id = 1" ;
                                $st3 = $pdo->prepare($hot_item_sql);
                                $st3->execute();

                                foreach ($st3->fetchAll() as $row) {
                        ?>
                        <div class="single-product">
                            <div class="product-img">
                                <!-- <a href="#"> -->
                                    <img class="default-img" src="<?php echo "./images/items/" . $row['item_img1']; ?>" alt="#">
                                    <img class="hover-img" src="<?php echo "./images/items/" . $row['item_img1']; ?>" alt="#">
                                    <span class="out-of-stock">Hot</span>
                                <!-- </a> -->
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#detailModal" title="商品詳細" href="#" class="view-detail"><i class=" ti-eye"></i><span> 詳細を見る</span></a>
                                        <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
                                    </div>
                                    <div class="product-action-2">
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
                                <h3><a href="#"><?php echo $row['item_name'] . "(" . $row['color'] . ")" ?></a></h3>
                                <div class="product-price">
                                    <!-- <span class="old"></span> -->
                                    <span class="hide-price"><?php echo "￥" . number_format($row['price']) . " (税込) " ?></span>
                                </div>
                            </div>
                            <span class="hide hide-itemId"><?php echo $row['item_id'];?></span>
                            <span class="hide hide-itemName"><?php echo $row['item_name'];?></span>
                            <span class="hide hide-size"><?php echo $row['size_name'];?></span>
                            <span class="hide hide-gender"><?php echo $row['gender'];?></span>
                            <span class="hide hide-country"><?php echo $row['country'];?></span>
                            <span class="hide hide-season"><?php echo $row['season_name'];?></span>
                            <span class="hide hide-brand"><?php echo $row['brand_name'];?></span>
                            <span class="hide hide-color"><?php echo $row['color'];?></span>
                            <span class="hide hide-stock"><?php echo $row['stock'];?></span>
                            <span class="hide hide-description"><?php echo $row['description'];?></span>
                            <span class="hide hide-largeCat"><?php echo $row['b_catName'];?></span>
                            <span class="hide hide-smallCat"><?php echo $row['s_catName'];?></span>
                            <span class="hide hide-img1"><?php echo $row['item_img1'];?></span>
                            <span class="hide hide-img2"><?php echo $row['item_img2'];?></span>
                        </div>
                        <?php 
                                    } 
                                }catch (PDOException $e) {
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }
                        ?>
                        <!-- End Single Product -->
                        <!-- Start Single Product
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.php">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <span class="price-dec">30% Off</span>
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="商品詳細" href="#"><i class=" ti-eye"></i><span> 詳細を見る</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="cart.php">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.php">Women Hot Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!- End Single Product ->
                        <!- Start Single Product ->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.php">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <span class="new">New</span>
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="商品詳細" href="#"><i class=" ti-eye"></i><span> 詳細を見る</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="cart.php">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.php">Awesome Pink Show</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!- End Single Product ->
                        <!- Start Single Product ->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.php">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="商品詳細" href="#"><i class=" ti-eye"></i><span> 詳細を見る</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="cart.php">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.php">Awesome Bags Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

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
                                <h2>Detail</h2>
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

    <!-- <section class="cown-down">
        <div class="section-inner ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12 padding-right">
                        <div class="image">
                            <img src="https://via.placeholder.com/750x590" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 padding-left">
                        <div class="content">
                            <div class="heading-block">
                                <p class="small-title">Deal of day</p>
                                <h3 class="title">Beatutyful dress for women</h3>
                                <p class="text">Suspendisse massa leo, vestibulum cursus nulla sit amet, frungilla placerat lorem. Cars fermentum, sapien. </p>
                                <h1 class="price">$1200 <s>$1890</s></h1>
                                <div class="coming-time">
                                    <div class="clearfix" data-countdown="2021/02/30">
                                        <div class="cdown"><span class="days"><strong>39</strong><p>Days.</p></span></div>
                                        <div class="cdown"><span class="hour"><strong> 1</strong><p>Hours.</p></span></div>
                                        <div class="cdown"><span class="minutes"><strong>13</strong> <p>MINUTES.</p></span></div>
                                        <div class="cdown"><span class="second"><strong> 23</strong><p>SECONDS.</p></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

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
    <!-- Waypoints JS -->
    <script src="js/waypoints.min.js"></script>
    <!-- Countdown JS -->
    <script src="js/finalcountdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="js/nicesellect.js"></script>
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
    <!-- index JS -->
    <script src="js/index.js"></script>
</body>

</html>