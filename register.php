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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                        <li><a href="index.php">Home</a></li>
                            <!-- <li class="active"><a href="blog-single.php">Register</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4>購入者情報を入力してください</h4>
                                <h3>Please Fill Your Information</h3>
                            </div>
                            <!-- <form class="form" method="post" action="mail/mail.php"> -->
                            <form class="form" action="reg_payment_bg.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>お名前<span class="text_required">必須</span></label>
                                            <input id="first_name" class="first-name" name="first-name" title="名前（名）を入力してください！" type="text" placeholder="例）　山田" required/>
                                            <input id="last_name" class="last-name" name="last-name" title="名前（姓）を入力してください！" 　type="text" placeholder="例）　太郎" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>お名前（カナ）<span class="text_required">必須</span></label>
                                            <input id="lang_First_Name" class="lang-first-name" name="lang-first-name" type="text" pattern="^[ァ-ンヴー]+$" title="全角（カナ）で入力してください！" placeholder="例）　ヤマダ" required/>
                                            <input id="lang_Last_Name" class="lang-last-name" name="lang-last-name" type="text" pattern="^[ァ-ンヴー]+$" title="全角（カナ）で入力してください！" placeholder="例）　タロウ" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>郵便番号<span class="text_required">必須</span></label>
                                            <input class="post" name="postal-code" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="7" placeholder="例）　0001111" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group wrapper">
                                            <label class="city-label" for="city-select">都道府県<span class="text_required">必須</span></label>
                                            <!-- <label>Choose a pet:</label> -->
                                            <select class="city" name="city" id="city">
                                                <option value="" selected="selected" disabled hidden>選んでください</option>
                                                <option value="北海道">北海道</option>
                                                <option value="青森県">青森県</option>
                                                <option value="岩手県">岩手県</option>
                                                <option value="宮城県">宮城県</option>
                                                <option value="秋田県">秋田県</option>
                                                <option value="山形県">山形県</option>
                                                <option value="福島県">福島県</option>
                                                <option value="茨城県">茨城県</option>
                                                <option value="栃木県">栃木県</option>
                                                <option value="群馬県">群馬県</option>
                                                <option value="埼玉県">埼玉県</option>
                                                <option value="千葉県">千葉県</option>
                                                <option value="東京都">東京都</option>
                                                <option value="神奈川県">神奈川県</option>
                                                <option value="新潟県">新潟県</option>
                                                <option value="富山県">富山県</option>
                                                <option value="石川県">石川県</option>
                                                <option value="福井県">福井県</option>
                                                <option value="山梨県">山梨県</option>
                                                <option value="長野県">長野県</option>
                                                <option value="岐阜県">岐阜県</option>
                                                <option value="静岡県">静岡県</option>
                                                <option value="愛知県">愛知県</option>
                                                <option value="三重県">三重県</option>
                                                <option value="滋賀県">滋賀県</option>
                                                <option value="京都府">京都府</option>
                                                <option value="大阪府">大阪府</option>
                                                <option value="兵庫県">兵庫県</option>
                                                <option value="奈良県">奈良県</option>
                                                <option value="和歌山県">和歌山県</option>
                                                <option value=">鳥取県">鳥取県</option>
                                                <option value="島根県">島根県</option>
                                                <option value="岡山県">岡山県</option>
                                                <option value="広島県">広島県</option>
                                                <option value="山口県">山口県</option>
                                                <option value="徳島県">徳島県</option>
                                                <option value="香川県">香川県</option>
                                                <option value="愛媛県">愛媛県</option>
                                                <option value="高知県">高知県</option>
                                                <option value="福岡県">福岡県</option>
                                                <option value="佐賀県">佐賀県</option>
                                                <option value="長崎県">長崎県</option>
                                                <option value="熊本県">熊本県</option>
                                                <option value="大分県">大分県</option>
                                                <option value="宮崎県">宮崎県</option>
                                                <option value="鹿児島県">鹿児島県</option>
                                                <option value="沖縄県">沖縄県</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>市区部<span class="text_required">必須</span></label>
                                            <input class="town" name="town" type="text" placeholder="例）　市区部" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>町<span class="text_required">必須</span></label>
                                            <input class="location" name="location" type="text" placeholder="例）　町" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>部屋<span class="text_required">必須</span></label>
                                            <input class="building" name="building" type="text" placeholder="例）　部屋" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>日付<span class="text_required">必須</span></label>
                                            <input id="theDate" name="deli-date" class="date" type="date" data-date="" data-date-format="YYYY MM DD" value="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="time-label" for="time-select">時間帯指定<span class="text_required">必須</span></label>
                                            <!-- <label>Choose a pet:</label> -->
                                            <select class="time" name="deli-time" id="time" required>
                                            <option value="">指定なし</option>
                                            <option value="1">9:00 ~ 12:00</option>
                                            <option value="2">13:00 ~ 17:00</option>
                                            <option value="3">18:00 ~ 21:00</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>お電話番号<span class="text_required">必須</span></label>
                                            <input class="phone" name="phone" type="phone" pattern="[0-9-]{12,13}" placeholder="例）　XXX-XXXX-XXXX" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>ファクス番号</label>
                                            <input class="fax" name="fax" type="fax" placeholder="例）　ファクス番号" />
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>メールアドレス<span class="text_required">必須</span></label>
                                            <input id="email" class="email" name="email" type="email" maxlength="254" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="例）　example@gmail.com" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>メールアドレス（確認）<span class="text_required">必須</span></label>
                                            <input id="confirm_Email" class="confirm-email" name="email1" type="email1" maxlength="254" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="例）　example@gmail.com" required/>
                                        </div>
                                    </div> -->
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" id="reset" class="btn ">戻る</button>
                                            <button type="submit" id="register" class="btn" name="register"　data-toggle="modal" data-target="#register_confirmation">配送</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

    <!-- start register confirmation modal -->
    <div class="modal fade" id="register_confirmation" tabindex="-1" role="dialog" aria-labelledby="registerConfirmation" aria-hidden="true">
        <div class="modal-dialog register-confirm-customize-modal-dialog" role="document">
            <div class="modal-content register-confirm-customize-modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body register-confirm-customize-modal-body">
                    <div>
                        <h3 class="modal-title">購入者情報の確認</h3>
                    </div>
                    <div class="card bg-light payment-form">
                        <h3 class="payment-detail">「↓」の情報をご確認ください</h3>
                        <article class="card-body payment-article">
                            <div class="grid-container">
                                <div class="grid-item">お名前</div>
                                <div class="grid-item reg-conf-name"></div>
                                <div class="grid-item">お名前（カナ）</div>
                                <div class="grid-item reg-conf-lang-name"></div>
                                <div class="grid-item">郵便番号</div>
                                <div class="grid-item reg-conf-post"></div>
                                <div class="grid-item">都道府県</div>
                                <div class="grid-item reg-conf-city"></div>
                                <div class="grid-item">市区部</div>
                                <div class="grid-item reg-conf-town"></div>
                                <div class="grid-item">町</div>
                                <div class="grid-item reg-conf-location"></div>
                                <div class="grid-item">部屋</div>
                                <div class="grid-item reg-conf-building"></div>
                                <div class="grid-item">日付</div>
                                <div class="grid-item reg-conf-date"></div>
                                <div class="grid-item">時間帯指定</div>
                                <div class="grid-item reg-conf-time"></div>
                                <div class="grid-item">お電話番号</div>
                                <div class="grid-item reg-conf-phone"></div>
                                <div class="grid-item">ファクス番号</div>
                                <div class="grid-item reg-conf-fax"></div>
                                <!-- <div class="grid-item">メールアドレス</div>
                                <div class="grid-item reg-conf-mail"></div> -->
                            </div>
                        </article>
                    </div>
                    <!-- card.// -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">キャンセル</button>
                    <a href="reg_payment.php"><button type="submit" class="btn ">OK</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end register confirmation modal -->

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
    <script src="js/jquery.min.js "></script>
    <script src="js/jquery-migrate-3.0.0.js "></script>
    <script src="js/jquery-ui.min.js "></script>
    <!-- Popper JS -->
    <script src="js/popper.min.js "></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js "></script>
    <!-- Color JS -->
    <script src="js/colors.js "></script>
    <!-- Slicknav JS -->
    <script src="js/slicknav.min.js "></script>
    <!-- Owl Carousel JS -->
    <script src="js/owl-carousel.js "></script>
    <!-- Magnific Popup JS -->
    <script src="js/magnific-popup.js "></script>
    <!-- Fancybox JS -->
    <script src="js/facnybox.min.js "></script>
    <!-- Waypoints JS -->
    <script src="js/waypoints.min.js "></script>
    <!-- Jquery Counterup JS -->
    <script src="js/jquery-counterup.min.js "></script>
    <!-- Countdown JS -->
    <script src="js/finalcountdown.min.js "></script>
    <!-- Nice Select JS -->
    <script src="js/nicesellect.js "></script>
    <!-- Ytplayer JS -->
    <script src="js/ytplayer.min.js "></script>
    <!-- Flex Slider JS -->
    <script src="js/flex-slider.js "></script>
    <!-- ScrollUp JS -->
    <script src="js/scrollup.js "></script>
    <!-- Onepage Nav JS -->
    <script src="js/onepage-nav.min.js "></script>
    <!-- Easing JS -->
    <script src="js/easing.js "></script>
    <!-- Google Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM "></script>
    <script src="js/gmap.min.js "></script>
    <script src="js/map-script.js "></script>
    <!-- Active JS -->
    <script src="js/active.js "></script>
    <!-- moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js "></script>
    <!-- customize JS -->
    <script src="js/register.js "></script>
    <!-- Index JS -->
    <script src="js/index.js"></script>
</body>

</html>