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
    $c_code = $_SESSION['c_code'];
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
									<option disabled selected hidden>探す</option>
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
                                </div> -->
                        </div>
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
                                                <li class="active"><a href="cart.php">My Cart</a></li>
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

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <!-- <li><a href="index1.php">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.php">Cart</a></li> -->
                            <a href="#" class="back" onclick="goBack()"><<戻る</a>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-md-5 col-121" style="float: left;">
                            <h3 class="shopping-cart-header"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ショッピングカート</h3>
                        </div>
                        <div class="col-lg-5 col-md-7 col-12 cart-info" style="float: right; text-align: right;">
                            <h3 id="shopping_item_count"></h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery" id="cart-table">
                        <thead>
                            <tr class="main-hading">
                                <th>商品</th>
                                <th>商品名</th>
                                <th class="text-center">色</th>
                                <th class="text-center">単価</th>
                                <th class="text-center">数量</th>
                                <th class="text-center">小計</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                try{
                                    $cart_sql = "SELECT item_img1, item_name, s_catName, b_catName, price, size_name, color, c.item_id, description, stock, quantity FROM item i INNER JOIN cart c ON i.item_id = c.item_id INNER JOIN s_category sc ON i.s_categoryID = sc.s_categoryID INNER JOIN b_category bc ON sc.b_categoryID = bc.b_categoryID INNER JOIN size s ON i.size_id = s.size_id WHERE c.c_code = ?";
                                    $st = $pdo->prepare($cart_sql);
                                    $st->execute(array($c_code));
                                    foreach ($st->fetchAll(PDO::FETCH_ASSOC) as $row) {
                            ?>
                                <tr>
                                    <td class="image" data-title="No"><img src="<?php echo "./images/items/" . $row['item_img1']; ?>" alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name">
                                            <?php 
                                                // echo $row['b_catName'] . "  &#8594;  " . $row['s_catName'] . " <br/> <span class='cart-item-name'>" . $row['item_name'] . "</span>"; 

                                                if ($row['size_name'] === "S")
                                                    echo "<span class='cart-item-name'>" . $row['item_name'] . "</span> <span class='small-size'>S</span> <br/>" . $row['b_catName'] . "  &#8594;  " . $row['s_catName']; 
                                                    // echo "<span class='small-size'>S</span>";
                                                elseif ($row['size_name'] === "M")
                                                    echo "<span class='cart-item-name'>" . $row['item_name'] . "</span> <span class='medium-size'>M</span> <br/>" . $row['b_catName'] . "  &#8594;  " . $row['s_catName']; 
                                                    // echo "<span class='medium-size'>M</span>";
                                                elseif ($row['size_name'] === "L")
                                                    echo "<span class='cart-item-name'>" . $row['item_name'] . "</span> <span class='large-size'>L</span> <br/>" . $row['b_catName'] . "  &#8594;  " . $row['s_catName']; 
                                                    // echo "<span class='large-size'>L</span>";
                                                elseif ($row['size_name'] === "LL")
                                                    echo "<span class='cart-item-name'>" . $row['item_name'] . "</span> <span class='xlarge-size'>LL</span> <br/>" . $row['b_catName'] . "  &#8594;  " . $row['s_catName']; 
                                                    // echo "<span class='xlarge-size'>LL</span>";
                                                elseif ($row['size_name'] === "XXL")
                                                    echo "<span class='cart-item-name'>" . $row['item_name'] . "</span> <span class='xxlarge-size'>XXL</span> <br/>" . $row['b_catName'] . "  &#8594;  " . $row['s_catName']; 
                                                    // echo "<span class='xlarge-size'>XXL</span>";
                                                else 
                                                    echo "";                                                
                                            ?>
                                            <!-- <span class='small-size'>S</span> -->
                                        </p>
                                        <!-- <p class="product-des"><?php //echo $row['stock']?></p> -->
                                    </td>
                                    <td class="color" data-title="Color"><span><?php echo $row['color']; ?></span></td>
                                    <td class="price" data-title="Price"><span>￥<?php echo number_format($row['price']); ?></span></td>
                                    <td class="qty" data-title="Qty">
                                        <!-- Input Order -->
                                        <!-- <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[<?php echo $row['item_id']; ?>]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <span class="hide stock"><?php echo $row['stock']; ?></span>
                                            <input type="text" name="quant[<?php echo $row['item_id']; ?>]" class="input-number" data-min="1" data-max="<?php echo $row['stock']; ?>" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number plus-btn" data-type="plus" data-field="quant[<?php echo $row['item_id']; ?>]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div> -->
                                        <!--/ End Input Order -->
                                        <!-- quantity text box -->
                                        <div class="input-group">
                                            <form action="" method="post">
                                                <span class="hide stock"><?php echo $row['stock']; ?></span>
                                                <input type="hidden" name="cartItemId" value="<?php echo $row['item_id']; ?>" />
                                                <input type="hidden" name="stock" class="hidden-stock" value="<?php echo $row['stock']; ?>" />
                                                <input class="item-quantity" type="number" min="1" max="<?php echo $row['stock']; ?>" name="item-quantity" value="<?php echo $row['quantity'] ?>">
                                                <button type="submit" class="btn btn-primary item-quantity-confirm" name="quantity_confirm">変更</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="total-amount calculated-amount" data-title="Total"><span>￥</span></td>
                                    <td class="action" data-title="Remove"><a href="#">
                                        <form method="post" action="">
                                            <input type="hidden" name="cartItemId" value="<?php echo $row['item_id']; ?>" />
                                            <button type="submit" name="delete" class="cart-item-delete-btn">
                                                <i class="ti-trash remove-icon"></i>
                                            </button>
                                        </form> 
                                    </a></td>
                                </tr>
                            <?php 
                                    } 
                                }catch (PDOException $e) {
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>

            <?php 
                try{
                    if(isset($_POST['delete'])){
                        $del_id = $_POST['cartItemId'];
                        // echo $del_id;
                        $del_sql = "DELETE FROM cart WHERE item_id = ?" ;
                        // $affectedrows  = $db->exec($del_sql);
                        $del_st = $pdo->prepare($del_sql);
                        
                        $del_st->execute(array($del_id));
                        echo "<meta http-equiv='refresh' content='0'>";
                    }  
                } catch (PDOException $e) {
                   echo "There is some problem in connection: " . $e->getMessage();
                }

                try{
                    if(isset($_POST['quantity_confirm'])){
                        $quantity = $_POST['item-quantity'];
                        $update_id = $_POST['cartItemId'];
                        $stock = $_POST['stock'];
                        // echo $del_id;
                        if($quantity <= $stock){
                            $update_sql = "UPDATE cart SET quantity = ?  WHERE item_id = ?" ;
                            // $affectedrows  = $db->exec($del_sql);
                            $update_st = $pdo->prepare($update_sql);
                            // $update_st->bindParam( ":update_id", $update_id, PDO::PARAM_STR);
                            // $update_st->bindParam( ":quantity", $quantity, PDO::PARAM_INT);
                            $update_st->execute(array($quantity,$update_id));
                            echo "<meta http-equiv='refresh' content='0'>";
                        }else{
                            echo "<script>$('#quantity_warning').modal('show');</script>";
                        }
                    }  
                } catch (PDOException $e) {
                   echo "There is some problem in connection: " . $e->getMessage();
                }
            ?>

            <div class="row count-area">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- <div class="right">
                                <div class="button6" id="calculate-total">
                                    <a href="#" class="btn">計算する</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-7 col-md-5 col-12">
                                <div class="left">
                                    <li class="last discount-important">
                                    <?php 
                                        $count_sql = "SELECT COUNT(order_no) as count_order FROM ordering WHERE c_code = ? ";
                                        $count_st = $pdo->prepare($count_sql);
                                        $count_st->execute(array($c_code));
                                        $count_result = $count_st->fetch( PDO::FETCH_ASSOC );
                                        $count = $count_result['count_order'];
                                        $today = date("d");                                       
                                        // echo $c_code;

                                        if($today === "05" && $count > 0){
                                            echo "※　5% 割引が適用されます。";
                                        }elseif($today === "15" && $count > 0){
                                            echo "※　5% 割引が適用されます。";
                                        }elseif($today === "25" && $count > 0){
                                            echo "※　5% 割引が適用されます。";
                                        }elseif($today === "05" && $count == 0){
                                            echo "※　10% 割引が適用されます。";
                                        }elseif($today === "15" && $count == 0){
                                            echo "※　10% 割引が適用されます。";
                                        }elseif($today === "25" && $count == 0){
                                            echo "※　10% 割引が適用されます。";
                                        }elseif($today !== "05" && $count == 0){
                                            echo "※　10% 割引が適用されます。";  
                                        }elseif($today !== "15" && $count == 0){
                                            echo "※　10% 割引が適用されます。";     
                                        }elseif($today !== "25" && $count == 0){
                                            echo "※　10% 割引が適用されます。";
                                        }else{
                                            echo "※　本日は割引は適用されません。";
                                        }
                                    ?>
                                    </li>
                                    <li class="important1">※　配送料は全国７００円です。</li>
                                    <li class="important2">※　消費税： 10％(全商品に10%対象)</li>
                                </div>
                            </div>
                           
                           
                            <div class="col-lg-5 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>合計    :<span id="subtotal-amount">
                                        <?php
                                         
                                            $mainCat_sql = "SELECT Sum(price*quantity) as result, cart.c_code, Sum(quantity) as total_qty FROM cart INNER JOIN item on cart.item_id = item.item_id WHERE c_code = ? GROUP BY c_code" ;
                                            $st1 = $pdo->prepare($mainCat_sql);
                                            $st1->execute(array($c_code));
                                            foreach ($st1->fetchAll(PDO::FETCH_ASSOC) as $row1) {
                                                echo "￥" . number_format($row1['result']);
                                                $_SESSION['subtotal'] = $row1['result'];
                                        ?>
                                        </span></li>
                                        <!-- <li class="important2">消費税   :<span class="consumption-tax" id="consumption_tax"><?php echo "10%"; $_SESSION['consumption_tax'] = "10%";?></span></li>
                                        <?php 
                                            $tax = "<script> document.write(document.getElementById('consumption_tax').innerHTML.slice(0,2)) </script>"; 
                                        ?> -->
                                        <li class="important1">配送料   :<span class="delivery-fee" id="delivery_fee"><?php echo "￥700"; $_SESSION['delivery_fee'] = "700";?></span></li>
                                        <?php 
                                            $deliveryFee = "<script> document.write(document.getElementById('delivery_fee').innerHTML.slice(1)) </script>"; 
                                        ?>
                                        <?php
                                            $formula = $row1['result'] + 700;
                                            $today = date("d");
                                            $final_amount = 0;
                                            // echo date("d/m/Y h:m:s a");
                                            if($today === "05" && $count > 0){
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . number_format((int)($formula * 0.05)) . "</span></li>";
                                                $_SESSION['discount-rate'] = number_format((int)($formula * 0.05));
                                            }elseif($today === "15" && $count > 0){
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . number_format((int)($formula * 0.05)) . "</span></li>";
                                                $_SESSION['discount-rate'] = number_format((int)($formula * 0.05));
                                            }elseif($today === "25" && $count > 0){
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . number_format((int)($formula * 0.05)) . "</span></li>";
                                                $_SESSION['discount-rate'] = number_format((int)($formula * 0.05));
                                            }elseif($today === "05" && $count == 0){
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . number_format((int)($formula * 0.1)) . "</span></li>";
                                                $_SESSION['discount-rate'] = number_format((int)($formula * 0.1));
                                            }elseif($today === "15" && $count == 0){
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . number_format((int)($formula * 0.1)) . "</span></li>";
                                                $_SESSION['discount-rate'] = number_format((int)($formula * 0.1));
                                            }elseif($today === "25" && $count == 0){
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . number_format((int)($formula * 0.1)) . "</span></li>";
                                                $_SESSION['discount-rate'] = number_format((int)($formula * 0.1));
                                            }elseif($today !== "05" && $count == 0){
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . number_format((int)($formula * 0.1)) . "</span></li>";
                                                $_SESSION['discount-rate'] = number_format((int)($formula * 0.1));   
                                            }elseif($today !== "15" && $count == 0){
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . number_format((int)($formula * 0.1)) . "</span></li>";
                                                $_SESSION['discount-rate'] = number_format((int)($formula * 0.1));     
                                            }elseif($today !== "25" && $count == 0){
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . number_format((int)($formula * 0.1)) . "</span></li>";
                                                $_SESSION['discount-rate'] = number_format((int)($formula * 0.1));   
                                            }else{
                                                echo "<li class='important'>割引額    :<span class='discount-rate'>" . "￥-" . $formula * 0 . "</span></li>";
                                                $_SESSION['discount-rate'] = $formula * 0;
                                            }
                                        ?>

                                       <li class="last">注文合計   :
                                            <span id="calculated-total-amount">
                                            <?php 
                                                $formula = $row1['result'] + 700;
                                                $today = date("d");
                                                $final_amount = 0;
                                                if($today === "05" && $count > 0){
                                                    $final_amount = ($formula - ($formula/100)*5);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']);
                                                }elseif($today === "15" && $count > 0){
                                                    $final_amount = ($formula - ($formula/100)*5);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']);
                                                }elseif($today === "25" && $count > 0){
                                                    $final_amount = ($formula - ($formula/100)*5);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']);
                                                }elseif($today === "05" && $count == 0){
                                                    $final_amount = ($formula - ($formula/100)*10);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']);
                                                }elseif($today === "15" && $count == 0){
                                                    $final_amount = ($formula - ($formula/100)*10);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']);
                                                }elseif($today === "25" && $count == 0){
                                                    $final_amount = ($formula - ($formula/100)*10);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']);
                                                }elseif($today !== "05" && $count == 0){
                                                    $final_amount = ($formula - ($formula/100)*10);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']);
                                                }elseif($today !== "15" && $count == 0){
                                                    $final_amount = ($formula - ($formula/100)*10);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']); 
                                                }elseif($today !== "25" && $count == 0){
                                                    $final_amount = ($formula - ($formula/100)*10);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']);   
                                                }else{
                                                    $final_amount = ($formula - ($formula/100)*0);
                                                    if($final_amount <= 700)
                                                        $_SESSION['final_amount'] = 0;
                                                    else
                                                        $_SESSION['final_amount'] = $final_amount;
                                                    echo "￥" . number_format($_SESSION['final_amount']) ;
                                                }
                                            ?> 
                                            </span>
                                        </li>
                                        
                                    </ul>
                                    <div class="button5">
                                        <!-- <a href="sendRegister.php" class="btn">注文に進む</a> -->
                                        <a href="sendRegister.php?c_code=<?php echo $c_code; ?>">
                                            <button class="btn" href="#" type="submit" name="add_ordering">
                                                注文に進む
                                            </button>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="images/man.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/man.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/man.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/man.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Flared Shift Dress</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (1 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                    </div>
                                </div>
                                <h3>$29.00</h3>
                                <div class="quickview-peragraph">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Color</h5>
                                            <select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
                                        </div>
                                        <input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" class="btn">Add to cart</a>
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                </div>
                                <div class="default-social">
                                    <h4 class="share-now">Share:</h4>
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- confirmation modal -->
    <!-- <div class="modal fade" id="order_confirmation" tabindex="-1" role="dialog" aria-labelledby="orderConfirmation" aria-hidden="true">
        <div class="modal-dialog customize-modal-dialog" role="document">
            <div class="modal-content customize-modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body customize-modal-body">
                    <div>
                        <h5 class="modal-title">ご希望の配送先をご確認して下さい。</h5>
                        <p>別のお届け先に送る場合は【別の住所へ送る】を選択してください！</p>
                    </div>
                    <div class="card bg-light register-form">
                        <article class="card-body checkout-register-article">
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="username" type="text" placeholder="名前" name="username" disabled="disabled">
                            </div>

                            <div class="input-container">
                                <i class="fa fa-address-book icon"></i>
                                <input class="address" type="text" placeholder="住所" name="address" disabled="disabled">
                            </div>

                            <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="phone-no" type="text" placeholder="電話番号" name="phone" disabled="disabled">
                            </div>
                            <div class="input-container">
                                <select class="delivery-time" name="delivery-times" required>
                                <option value="">指定なし</option>
                                <option value="option1">9:00 ~ 12:00</option>
                                <option value="option2">13:00 ~ 17:00</option>
                                <option value="option3">18:00 ~ 21:00</option>
                                </select>
                                <label class="important-note">※　時間帯を選んでください</label>
                            </div>
                            <div class="input-container">
                                <input class="delivery-date" type="date" data-date="" data-date-format="YYYY MM DD" value="YYYY-MM-DD">
                                <label class="important-note">※　日付を選んでください</label>
                            </div>
                            <div class="input-container">
                                <a class="link-name" target="_blank" href="./register.php"><i class="fa fa-share-square-o"></i>  別の住所へ送る</a>
                            </div>
                        </article>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
                    <a href="payment.php"><button type="button" id="order_confirm" class="btn btn-primary">確定</button></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end confirmation modal -->

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
                        <h4 style="text-align: center;">値は<span class="cart-stock-quantity"></span>個以下にする必要があります！</h4>
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
    <!-- Cart JS -->
    <script src="js/cart.js"></script>
    <!-- Index JS -->
    <script src="js/index.js"></script>
</body>

</html>