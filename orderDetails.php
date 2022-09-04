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
        </div>
    </header>
    <!--/ End Header -->

                <div class="modal-body card-confirm-customize-modal-body">
                    <div>
                        <h3 class="modal-title">ご注文の詳細</h3>
                        <!--<p>ご注文詳細内容についてのメールをご登録していただいたメールアドレスにご送信させていただきます。</p>-->
                    </div>
                    <div class="card bg-light card-form">
                        <div class="myorder-detail-grid-container">
                            <div class="myorder-detail-grid-item"><h4>注文番号 : <h4></div>
                            <div class="myorder-detail-grid-item"><h4><?php echo $_POST['orderNo']; ?></h4></div>
                            <hr style="width: 150%; border-top: 1px dotted #F8FAFA; color: #F8FAFA"><br>
                            <?php
                                
                                try {
                                    

                                    if(isset($_POST['detail'])){
                                        $orderNo = $_POST['orderNo'];
                                        $order_detail_sql = "SELECT item_name, s_catName, order_quantity, country, price, size_name, color FROM item i INNER JOIN size s ON i.size_id = s.size_id INNER JOIN s_category sc ON i.s_categoryID = sc.s_categoryID INNER JOIN order_details od ON i.item_id = od.item_id WHERE od.order_no = ?";
                                        $st5 = $pdo->prepare($order_detail_sql);
                                        $st5->execute([$orderNo]);
                                        foreach ($st5->fetchAll() as $row5) {
                            ?>
                                <div class="myorder-detail-grid-item">商品名 : </div>
                                <div class="myorder-detail-grid-item"><?php echo $row5['item_name']; ?></div>
                                <div class="myorder-detail-grid-item">小カテゴリー名 :</div>
                                <div class="myorder-detail-grid-item"><?php echo $row5['s_catName']; ?></div>
                                <div class="myorder-detail-grid-item">数量 :</div>
                                <div class="myorder-detail-grid-item"><?php echo $row5['order_quantity']; ?></div>
                                <div class="myorder-detail-grid-item">原産国 :</div>
                                <div class="myorder-detail-grid-item"><?php echo $row5['country']; ?></div>
                                <div class="myorder-detail-grid-item">単価 :</div>
                                <div class="myorder-detail-grid-item"><?php echo "￥" . number_format($row5['price']); ?></div>
                                <!-- <div class="myorder-detail-grid-item">Sale Price : </div>
                                <div class="myorder-detail-grid-item"><?php if($row5['sale_price'] != null) echo "￥" . $row5['sale_price']; else echo "-"; ?></div> -->
                                <div class="myorder-detail-grid-item">サイズ :</div>
                                <div class="myorder-detail-grid-item"><?php echo $row5['size_name']; ?></div>
                                <div class="myorder-detail-grid-item">色 :</div>
                                <div class="myorder-detail-grid-item"><?php echo $row5['color']; ?></div>
                                <hr style="width: 1200px; border-top: 1px dotted #E0E9EB;"><br>
                            <?php
                                        }
                                    } 
                                }catch (PDOException $e) {
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }
                            ?>
                            <?php
                                try {
                                    if(isset($_POST['detail'])){
                                        $orderNo = $_POST['orderNo'];
                                        $order_info_sql = "SELECT sum_quantity, total_amount, deli_code, delivery_fees, date, order_date, payment_type, status FROM ordering WHERE order_no = ?";
                                        $st6 = $pdo->prepare($order_info_sql);
                                        $st6->execute([$orderNo]);
                                        foreach ($st6->fetchAll() as $row6) {
                            ?>
                                <div class="myorder-detail-grid-item myorder-detail-total-tilte">合計数量 :</div>
                                <div class="myorder-detail-grid-item"><?php echo $row6['sum_quantity']; ?></div>
                                
                                <div class="myorder-detail-grid-item myorder-detail-total-tilte">小計 :</div>
                                <div class="myorder-detail-grid-item"><?php echo "￥" . number_format($_SESSION['subtotal']); ?></div>
                                 
                                <div class="myorder-detail-grid-item myorder-detail-total-tilte">配送料 :</div>
                                <div class="myorder-detail-grid-item"><?php echo "￥" . number_format($row6['delivery_fees']); ?></div>
                                
                                <div class="myorder-detail-grid-item myorder-detail-total-tilte">割引額 :</div>
                                <div class="myorder-detail-grid-item"><?php echo "￥-" . $_SESSION['discount-rate']; ?></div>
                                 
                                <div class="myorder-detail-grid-item myorder-detail-total-tilte">合計金額 : </div>
                                <div class="myorder-detail-grid-item"><?php echo "￥" . number_format($row6['total_amount']); ?></div>
                                <div class="myorder-detail-grid-item myorder-detail-total-tilte">注文日 :</div>
                                <div class="myorder-detail-grid-item"><?php echo $row6['order_date']; ?></div>
                                <div class="myorder-detail-grid-item myorder-detail-total-tilte">支払いタイプ : </div>
                                <div class="myorder-detail-grid-item"><?php echo $row6['payment_type']."（払い）"; ?></div>
                                <div class="myorder-detail-grid-item myorder-detail-total-tilte">支払い状況 :</div>
                                <div class="myorder-detail-grid-item"><?php echo $row6['status']; ?></div>
                                <?php 
                                    $deliTime = $row6['deli_code'];
                                    $deli_time_query = "SELECT time FROM delivery_time WHERE deli_code = ?";
                                    $deli_st = $pdo->prepare($deli_time_query);
                                    $deli_st->execute(array($deliTime));
                                    foreach ($deli_st->fetchAll() as $row) {
                                ?>
                                    <div class="myorder-detail-grid-item myorder-detail-total-tilte">配送時間 :</div>
                                    <div class="myorder-detail-grid-item"><?php echo $row['time']; ?></div>
                                <?php } ?>
                                <div class="myorder-detail-grid-item myorder-detail-total-tilte">配送日 :</div>
                                <div class="myorder-detail-grid-item"><?php echo $row6['date']; ?></div>
                            <?php
                                        }
                                    } 
                                }catch (PDOException $e) {
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }
                            ?>
                        </div>
                    </div>
                    <!-- card.// -->

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
    <!-- Index JS -->
    <script src="js/index.js"></script>
</body>

</html>