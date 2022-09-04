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
                                <!-- <form> -->
                                <input name="search" placeholder="商品名で検索して下さい。。。。。" type="search">
                                <button class="btnn search-btn"><i class="ti-search"></i></button>
                                <!-- </form> -->
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
                                                <li class="active"><a href="about.php">About Us</a></li>
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
                    <div class="col-lg-16 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h3>ご利用ガイド</h3>
                            </div>
                            <div class="company-break">
                                <p><i class="fa fa-plus-square fa-plus-square-company-profile" aria-hidden="true"></i>

                                    <h4>会社概要</h4>

                                </p>
                                <div id="company_profile" class="hidden">
                                    <div class="b-color1">
                                        <table border="1">
                                            <tr>
                                                <th>会社名</th>
                                                <td>株式会社Charmclo</td>
                                            </tr>
                                            <tr>
                                                <th>代表者</th>
                                                <td>代表取締役 ニーウィントゥン</td>
                                            </tr>
                                            <tr>
                                                <th>所在地</th>
                                                <td>〒169-0073</br>東京都新宿区百人町1-25-4</td>
                                            </tr>
                                            <tr>
                                                <th>資本金</th>
                                                <td>1,000万</td>
                                            </tr>
                                            <tr>
                                                <th>事業内容</th>
                                                <td>衣料品の販売</td>
                                            </tr>
                                            <tr>
                                                <th>設立</th>
                                                <td>2021年1月</td>
                                            </tr>
                                            <tr>
                                                <th>従業員数</th>
                                                <td>3名</td>
                                            </tr>
                                            <tr>
                                                <th>主要取引先</th>
                                                <td>日専株式会社、電子株式会社、株式会社SK</td>
                                            </tr>
                                            <tr>
                                                <th>主要取引銀行</th>
                                                <td>日専銀行、電子銀行</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="payment-break">
                                <p><i class="fa fa-plus-square fa-plus-square-payment-method" aria-hidden="true"></i>
                                    <h4>お支払いについて</h4>
                                </p>
                                <div id="payment_method" class="hidden">
                                    <p>
                                        お支払方法については、クレジットカード払い、</br>
                                        銀行振込、コンビニ払いよりお選びいただけます。
                                    </p><br>
                                    <h5>クレジットカード払い</h5>
                                    <p>
                                        VISA,MASTER,JCB,Diners,AMEXがご利用いただけます。
                                    </p><br>
                                    <h5>コンビニ払い</h5>
                                    <p>
                                        セブンイレブン、ローソン、ファミリーマートがご利用いただけます。
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="price-break">
                                <p><i class="fa fa-plus-square fa-plus-square-price" aria-hidden="true"></i>
                                    <h4>表示価格について</h4>
                                </p>
                                <div id="price" class="hidden">
                                    <p>
                                        ※オンラインショップに記載された価格は、消費税込みの価格です。
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="delivery-break">
                                <p><i class="fa fa-plus-square fa-plus-square-delivery-method" aria-hidden="true"></i>
                                    <h4>配送・送料について</h4>
                                </p>
                                <div id="delivery_method" class="hidden">
                                    <h5>配送について</h5>
                                    <p>
                                        「電子運送」にて、お届けします。 ご注文後、通常約7日程度でお届けします。
                                        </br>
                                        ※但し、配送上の都合で遅れる事もございますので、予めご了承下さい。</br>
                                        ※商品のお届けは、日本国内に限らせていただきます。
                                    </p><br>
                                    <h5>お届け日時のご指定について</h5>
                                    <p>
                                        お届け時間帯は、下記よりご指定いただけます。</br>
                                        ・8時～12時</br>
                                        ・13時～17時</br>
                                        ・18時～21時
                                    </p><br>
                                    <h5>送料について</h5>
                                    <p>
                                        全国一律700円となります。
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="privacy-break">
                                <p><i class="fa fa-plus-square fa-plus-square-privacy" aria-hidden="true"></i>
                                    <h4>プライバシーポリシーについて</h4>
                                </p>
                                <div id="privacy" class="hidden">
                                    <p>プライバシーポリシーについて、詳しくは<span class="privacy" data-toggle="modal" data-target="#privacy_paragraph">こちら</span>をご覧ください。</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

    <div class="modal fade" id="privacy_paragraph" tabindex="-1" role="dialog" aria-labelledby="privacy_paragraph" aria-hidden="true">
        <div class="modal-dialog privacy-modal-dialog" role="document">
            <div class="modal-content privacy-modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> </div>
                <div class="modal-body privacy-modal-body">
                    <div>
                        <h1 class="modal-title shopping-cart-header">プライバシーポリシー</h1>
                    </div>
                    <p>――――（以下、「<span>当社</span>」と言います。）は本ウェブサイトで提供するサービス（以下、「<span>本サービス</span>」と言います。）における、<br/> ユーザーの個人情報の取扱いについて、以下の通りプライバシーポリシー（以下、「
                        <span>本ポリシー</span>」と言います。）を定めます。
                    </p>
                    <h2>第一条（個人情報）</h2>
                    <p>
                        「個人情報」とは、個人情報保護法にいう「個人情報」を指すものとし、生存する個人に関する情報であって、<br/> 当該情報に含まれる氏名、生年月日、住所、電話番号、連絡先その他の記述等により特定の個人を識別できる
                        <br/> 情報及び容貌、指紋、声紋にかかるデータ、及び健康保険証の保険者番号などの当該情報単体から特定の
                        <br/> 個人を識別できる情報（個人識別情報）を指します。
                    </p>
                    <h2>第二条（個人情報の収集方法）</h2>
                    <p>
                        当社は、ユーザーが利用登録をする際に氏名、生年月日、住所、電話番号、メールアドレス、<br/> 銀行口座番号、クレジットカード番号などの個人情報をお尋ねすることがあります。
                    </p>
                    <h2>第三条（個人情報を収集・利用する目的）</h2>
                    <p>
                        当社が個人情報を収集・利用する目的は、以下の通りです。<br/> ・当社サービスの提供・運営のため
                        <br/> ・ユーザーからのお問い合わせに回答するため（本人確認を行うことを含む）
                        <br/>
                    </p>
                    <h2>第四条（お問い合わせ窓口）</h2>
                    <p>
                        本ポリシーに関するお問い合わせは、下記の窓口までお願いいたします。<br/> 住所：東京都新宿区百人町1-25-4
                        <br/> 社名：株式会社Charmclo
                        <br/> 担当：株式会社Charmclo個人情報保護管理者
                        <br/> 電話：03-3369-7761
                        <br/> Ｅメールアドレス：19jy0215@jec.ac.jp
                        <br/>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>


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
    <!-- Jquery Counterup JS -->
    <script src="js/jquery-counterup.min.js"></script>
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
    <!-- Google Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>
    <script src="js/gmap.min.js"></script>
    <script src="js/map-script.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
    <!-- about JS -->
    <script src="js/about.js"></script>
    <!-- Index JS -->
    <script src="js/index.js"></script>
</body>

</html>