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
    
    try {
                   
        if(isset($_POST["add_ordering"])) {
            $c_code = $_POST['c_code'];
            // $c_phone = $_POST['c_phone'];
            // $c_address1 = $_POST['c_address1'];
            // $c_address2 = $_POST['c_address2'];
            // $c_email = $_POST['c_email'];
            // $c_name = $_POST['c_name'];
            $total_amount = round($_POST['total_amount'],0);
            $total_qty = $_POST['sum_qty'];
            $date = new DateTime("now", new DateTimeZone('Asia/Tokyo') );
            $order_date = $date->format('Y-m-d');
            $deliTime = $_POST['deliTime'];
            $deliDate = $_POST['deliDate'];
            $itemIDs = $_POST['itemIDs'];
            $quantities = $_POST['quantities'];

            $test="SELECT MAX(order_no) as cnt FROM ordering";
            $stmt=$pdo->prepare($test);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $order_no=$row['cnt']+1;

            $st1 = $pdo->prepare("INSERT INTO ordering (order_no, c_code, order_date, payment_type, status, sum_quantity, total_amount, delivery_fees, deli_code, date) 
                            VALUES (?, ?, ?, 'コンビニ', '未代', ?, ?, 700, ?, ?)") ;
                // inserting a record
            $st1->execute(
                array(
                    $order_no, $c_code, $order_date, $total_qty, $total_amount, $deliTime,  $deliDate
                )
            );

            // $O_no = $pdo->lastInsertId();
            // echo $no;
            // $_SESSION['lastInsertedOrderNo'] = $O_no;

            $index = 0;
            while($index < Count($itemIDs)){
                $itemId = $itemIDs[$index];
                $qty = $quantities[$index];
                $st2 = $pdo->prepare("INSERT INTO order_details (item_id, order_no, order_quantity) VALUES (?, ?, ?)");
                $st2->execute(array($itemId, $order_no, $qty));
                
                $st3 = $pdo->prepare("UPDATE item SET stock = stock-?  WHERE item_id = ?");
                // $update_st->bindParam( ":update_id", $update_id, PDO::PARAM_STR);
                // $update_st->bindParam( ":quantity", $quantity, PDO::PARAM_INT);
                $st3->execute(array($qty, $itemId));

                $del_sql = "DELETE FROM cart WHERE item_id = ?" ;
                $st4 = $pdo->prepare($del_sql);
                $st4->execute(array($itemId));

                $index++;
            }
            
            header("Location: javascript:history.back(-1)");
        }
    }catch (PDOException $e) {
        echo "There is some problem in connection: " . $e->getMessage();
    }
?>