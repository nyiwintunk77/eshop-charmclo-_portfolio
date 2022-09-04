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
    
    try{
      

        if(isset($_POST['delete'])){
            $id = $_POST['item_id'];
            $convini = $_POST['convini'];
                echo $del_id;
            // $totalTax = (10/100*$_SESSION['final_amount']);
            // $value = $totalTax+700;
            echo $value;
            
                $sql = "SELECT (price*quantity) as amount FROM item i INNER JOIN cart c ON i.item_id = c.item_id WHERE c.item_id = ?";
                $st = $pdo->prepare($sql);
                $st->execute([$id]);
                foreach ($st->fetchAll() as $row) {
                    $tax = 10/100*($row['amount']);
                    $_SESSION['final_amount'] = $_SESSION['final_amount'] - $row['amount'] - $tax;
                    if($_SESSION['final_amount'] == 700){
                        $_SESSION['final_amount'] = 0;
                    }
                    echo $_SESSION['final_amount'];
                }
            $del_st = $pdo->prepare("DELETE FROM cart WHERE item_id = ?");
            $del_st->execute([$id]);
            echo "<meta http-equiv='refresh' content='0'>";
        } 
        header("Location: cart.php");
    } catch (PDOException $e) {
        echo "There is some problem in connection: " . $e->getMessage();
    }
?>