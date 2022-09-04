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
            
        if(isset($_POST["add_order"])) {
            $c_code = $_POST['c_code'];
            $c_phone = $_POST['c_phone'];
            $c_address1 = $_POST['c_address1'];
            $c_address2 = $_POST['c_address2'];
            $c_fax = $_POST['c_Fax'];
            $c_postalCode = $_POST['c_postalCode'];
            
            $c_name = $_POST['c_name'];
            $total_amount = round($_POST['total_amount'],0);
            $total_qty = $_POST['sum_qty'];
            $date = new DateTime("now", new DateTimeZone('Asia/Tokyo') );
            $order_date = $date->format('Y-m-d');
            $deliTime = $_POST['deliTime'];
            $deliDate = $_POST['deliDate'];
            $itemIDs = $_POST['itemIDs'];
           
            
            $quantities = $_POST['quantities'];
             $subtotal = number_format($_SESSION['subtotal']);
            $discount = $_SESSION['discount-rate'];

            $test="SELECT MAX(order_no) as cnt FROM ordering";
            $stmt=$pdo->prepare($test);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $order_no=$row['cnt']+1;
            
            
            $st1 = $pdo->prepare("INSERT INTO ordering (order_no, c_code, oc_phone, oc_zip, o_address1, o_address2, fax, o_custname, order_date, payment_type, status, sum_quantity,  delivery_fees, date, deli_code, total_amount) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, '銀行振り込み', '未代', ?, 700, ?, ?, ?)") ;
                // inserting a record
            $st1->execute(
                array(
                    $order_no, $c_code, $c_phone, $c_postalCode, $c_address1, $c_address2, $c_fax, $c_name, $order_date, $total_qty , $deliDate, $deliTime, $total_amount
                )
            );


            $index = 0;
            while($index < Count($itemIDs)){
                $itemId = $itemIDs[$index];
                $qty = $quantities[$index];
                $st2 = $pdo->prepare("INSERT INTO order_details (item_id, order_no, order_quantity) VALUES (?, ?, ?)");
                $st2->execute(array($itemId, $order_no, $qty));
                
                $st3 = $pdo->prepare("UPDATE item SET stock = stock-?  WHERE item_id = ?");
              
                $st3->execute(array($qty, $itemId));

                $del_sql = "DELETE FROM cart WHERE item_id = ?" ;
                $st4 = $pdo->prepare($del_sql);
                $st4->execute(array($itemId));

                $index++;
            }

          
				mb_language("Japanese"); 
				mb_internal_encoding("UTF-8"); 
				ini_set( "SMTP", "10.64.144.9" );
				
				$to = '19jy0230@jynet.jec.ac.jp'; 
				$header = "MIME-Version: 1.0\n";
				$header .= "Content-Transfer-Encoding: 7bit\n";
				$header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
				$header .= "From:19jy0100@jynet.jec.ac.jp"; 
				$subject = "【株式会社Charmclo】ご注文お礼（銀行振り込み）";
				
				$body = $c_name . "様\n"; 
				$body .= "このたびはご注文いただき誠にありがとうございます。\n";
				$body .= "数ある店舗の中から当店をお選びいただき、\n";
				$body .= "誠にありがとうございます。\n";
				$body .= "以下の内容でご注文をお受けいたしましたので \n";
				$body .= "ご確認をお願いいたします。\n";
				$body .= "＜注文情報＞\n";
				$body .= "------------------------------------------\n";
				$body .= "[注文番号]". $order_no."\n";
				$body .= "[お支払方法]  銀行振り込み \n";
				$body .= "[配送方法] 宅配便\n";
				$body .= "[お届け先] ご本人様宛 \n";
				$body .= "〒".$c_postalCode."\n";
				$body .= $c_address1.$c_address2."\n";
				$body .= "――――――――――――――――――――――\n";
					
			     		
			
		     try {
                
                    $order_item_sql = "SELECT item_name, order_quantity FROM item INNER JOIN order_details ON item.item_id = order_details.item_id INNER JOIN ordering ON ordering.order_no=order_details.order_no WHERE order_details.order_no = ? AND ordering.c_code=?";
                    $st4 = $pdo->prepare($order_item_sql);
                    
                    $st4->execute([$order_no,$c_code]);
                    foreach ($st4->fetchAll() as $row4) {
                        $body .= "購入品:{$row4['item_name']} \n";
			            $body .= "数量:{$row4['order_quantity']} \n";
			            $body .= "------------------------------------------ \n";
			            
			            
                    } 
                 
            }catch (PDOException $e) {
                  print"SQL実行エラー!:".$e->getMessage();
        			exit();
            }
			
			
       		
			$body .= "注文個数：{$total_qty}個 \n";
			$body .= "------------------------------------------ \n";
			$body .= "小計：".$subtotal."(円)\n";
            $body .= "------------------------------------------ \n";
			
			$body .= "配送料：700(円) \n";
            $body .= "------------------------------------------ \n";
            
            $body .= "割引額：-".$discount."(円)\n";
            $body .= "------------------------------------------ \n";
		
            $body .= "注文合計：".$total_amount."(円)(税込み) \n";
            $body .= "------------------------------------------ \n";
            $body .= "＜振込口座＞ \n";
            $body .= "電子銀行または日専銀行　CharmClo支店 \n";
            $body .= "普通口座　2645123 \n";
            $body .= "口座名　　チャームクロ \n";
            $body .= "-------------------------------\n";
            $body .= "別途振込み手数料は、恐れ入りますがご負担くださいませ。\n";
            $body .= "入金確認後、商品を発送いたします。\n";
            $body .= "（平日15時までのご入金確認となります）\n";
            $body .= "※ご注文を頂いてから一週間以内にお支払いください。\n";
            $body .= "お買い求めいただきました商品を無事にお届けできるよう \n";
            $body .= "細心の注意を払ってまいります。 \n";
            $body .= "商品到着まで、どうぞよろしくお願いいたします。 \n";
            $body .= "----------------------------------------------------\n";
            $body .= "Charmcloショップ \n";
            $body .= "URL：http://www.***.co.jp \n";
            $body .= "営業日：月～金08：00～23：30 \n";
            $body .= "定休日：土日祝 \n";
            $body .= "定休日にいただいたご連絡に関しましては \n";
            $body .= "翌営業日にご回答させていただきます。 \n";
            $body .= "株式会社CharmClo \n";
            $body .= "住所：〒169-0073 東京都新宿区百人町　　1-25-4 \n";
            $body .= "TEL：+070 (8001) 8011-5822　／　FAX：03-****-**** \n";
            $body .= "店舗連絡先:info@charmclo.com \n";
            $body .= "---------------------------------------------------- \n";

            
       	if(mb_send_mail($to, $subject, $body,$header)){
	    	 header("location:javascript:history.back(-1)");
	    }else{
	  		 header('location:reg_bankPayment.php');
	  	}
	  }	
    }catch (PDOException $e) {
         print"SQL実行エラー!:".$e->getMessage();
        exit();
    }
    
?>