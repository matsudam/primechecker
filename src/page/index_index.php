<?php
	$input = $param["input"];
	$num = (int)$input;
	$err = 0;
	if($input == ""){
		$msg = "";
	}elseif(!preg_match("/^[0-9]+$/",$input) || $num==0 ){
		// 数値のみじゃなければエラー
		$msg = "『" . $input . "』は指定できません。正の整数を入力してください。";
		$err = 1;
	}elseif($num == 1){
		// 1の場合はエラー
		$msg = "『1』は素数ではありません。";
		$err = 1;
	}elseif($num >= 100000000){
		// 1億未満の数字じゃなければエラー
		$msg = "値が大きすぎます。1億未満の数値を入力してください。";
		$err = 1;
	}else{
		$sql = "select prime from prime order by prime";
		$result = $db->query($sql);

		$i=0;
		$sqrt = sqrt($num);	// 平方根
		while ($row = $db->fetch( $result )){
			if($row["prime"] > $sqrt || $num < $row["prime"]){
				if($num != 1){
					$primes[$i] = $num;
				}
				break;
			}		
			while($num%$row["prime"] == 0){
				$primes[$i] = $row["prime"];
				$num = $num/$row["prime"];
				$i++;
			}
		}
		if($i == 0){
			$msg = "『" . $input . "』は素数です。";			
			$primes[0] = 1;
			$primes[1] = $num;
		}else{
			$msg = "『" . $input . "』は素数ではありません。";			
		}
	}

	$smarty->assign('num', $input);
	$smarty->assign('msg', $msg);
	$smarty->assign('primes', $primes);
	$smarty->assign('err', $err);
?>
