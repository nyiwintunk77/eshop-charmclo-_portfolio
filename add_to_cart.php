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
    
    try {
       
        if(isset($_POST["add_to_cart"])) {
            $id = $_POST['cart_itemId'];
            $c_code = $_SESSION['c_code'];
                // echo $id;
                $sql = "SELECT stock FROM item WHERE item_id = ?";
                $prepare = $pdo->prepare ( $sql );
                $prepare->execute ( array($id));
                $stock_result = $prepare->fetch ( PDO::FETCH_ASSOC );
                $stock = $stock_result['stock'];
                if($stock > 0){   
                        // echo $id;
                    $stm = $pdo->prepare("INSERT INTO cart (item_id, c_code, quantity) 
                                    VALUES ( ?, ?, 1)") ;
                        // inserting a record
                    $stm->execute(
                        array(
                            // ':cart_itemId' => $_POST['cart_itemId'], 
                            $id, $c_code
                        )
                    );
                    header('Location: cart.php');
                }else{
                    header('Location: javascript:history.back(-1)');
                }
                
            }
            // else{
            //     echo '<script>alert("その商品はカートに既に存在しております！")</script>';
            // }
        }catch (PDOException $e) {          
            $message="その商品はカートに既に存在しております！";
            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
           
        }
?>