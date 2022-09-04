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
        if(isset($_POST["add_to_cart_detail"])) {
            $id = $_POST['cart_itemId'];
            $qty = $_POST['cart_qty'];
            $c_code = $_SESSION['c_code'];
            echo $qty;
            if($qty == 0){
                $stm = $pdo->prepare("INSERT INTO cart (item_id, c_code, quantity) 
                        VALUES ( ?, ?, 1)") ;
                // inserting a record
                $stm->execute(
                    array(
                        // ':cart_itemId' => $_POST['cart_itemId'],
                        $id, $c_code
                    )
                );
            }else{
                $stm = $pdo->prepare("INSERT INTO cart (item_id, c_code, quantity) 
                            VALUES ( ?, ?, ?)") ;
                // inserting a record
                $stm->execute(
                    array(
                        // ':cart_itemId' => $_POST['cart_itemId'], 
                        // ':qty' => $_POST['cart_qty'], 
                        $id, $c_code, $qty
                    )
                );
            }
        }
    }catch (PDOException $e) {
        echo "There is some problem in connection: " . $e->getMessage();
    }
    header('location:cart.php');
?>