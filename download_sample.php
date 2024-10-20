
<?php
 $file = "";
 // 対象ファイルの受け取り。GETまたはPOSTで渡される想定
 if (isset($_GET['file'])){
 	$file = $_GET['file'];
 }else{
 	if (isset($_POST['file'])){
 		$file = $_POST['file'];
 	}else{
 		die("ダウンロード対象ファイルが指定されていません."); 		
 	}
 }
 
 
 // ファイルの存在確認をして
 if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    while (ob_get_level()) { ob_end_clean(); }
    readfile($file);
    exit;
 }else{
 	die("ダウンロード対象ファイルが見つかりません");
 }
?>

