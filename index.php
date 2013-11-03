<?php
/**
 * 「素数チェッカー」
 */

	try{ 
		include_once ('./src/initialization.php');
		include_once (LIB_DIR . 'common.php');
		include_once (LIB_DIR . 'database.php');
		
		// DBクラスの生成
		$db = new Database(DB_URI, DB_NAME, DB_USER, DB_PASS);
		// MySQLへ接続する
		$db->connect();

		// トランザクション開始
		$db->begin();

		// ページ処理
		$page_path = PAGE_DIR . $sv_pg . ".php";
		$result = include_once ($page_path);

		// テンプレート表示
		$template = $sv_pg . ".tpl";
		$smarty->display( $template );

		// コミット
		$db->commit();
		
	} catch (DbException $e){
		$db->rollback();
		echo "DBエラー発生:" . $e->getMessage();
		
	} catch (Exception $e){ 
		echo "エラー発生:" . $e->getMessage();
		exit();
	}

	// MySQLへの接続を閉じる
	$db->close();

?>
