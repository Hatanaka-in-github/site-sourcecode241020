<?php



require_once 'getParameters.php';
require './vendor/autoload.php';
 
// 利用クラスエイリアス
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Style\Border;
use Box\Spout\Writer\Common\Creator\Style\BorderBuilder;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;

try{

 
if(!empty($_POST['file'])){

// XLSX書込クラス生成
$writer = WriterEntityFactory::createXLSXWriter();
// XLSX書込クラスへのデフォルトスタイル
$defaultStyle = (new StyleBuilder())
                ->setFontName('ＭＳ ゴシック')
                ->setFontSize(14)
                ->build();
// XLSX書込クラスへのデフォルトスタイル
$writer->setDefaultRowStyle($defaultStyle);
// 書込みファイル指定
$writer->openToFile('dbdata.xlsx');

           $cells1 = [
           WriterEntityFactory::createCell('AUTO_ID'),
           WriterEntityFactory::createCell('入出庫日'),
           WriterEntityFactory::createCell('入力日'),
           WriterEntityFactory::createCell('品名'),
           WriterEntityFactory::createCell('品番'),
           WriterEntityFactory::createCell('管理番号'),
           WriterEntityFactory::createCell('シリアル'),
           WriterEntityFactory::createCell('数量'),
           WriterEntityFactory::createCell('発工程'),
           WriterEntityFactory::createCell('受工程'),
           WriterEntityFactory::createCell('損品数'),
           WriterEntityFactory::createCell('保留数'),
           WriterEntityFactory::createCell('規格1'),
           WriterEntityFactory::createCell('規格2'),
           WriterEntityFactory::createCell('備考'),
           WriterEntityFactory::createCell('入力者'),
           WriterEntityFactory::createCell('exe_flg')
           ];

           $sheet1 = $writer->getCurrentSheet();
           $rows = WriterEntityFactory::createRow($cells1);
           $writer->addRow($rows);
           

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql1 =  'SELECT * FROM process_progress';
      $i = 1;
      $stmt=$dbh->prepare($sql1);
      $stmt->execute();
      while(1){
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec==false) break;
           $cells =  'cell'.$i;

           $a = $rec['AUTO_ID'];
           $b = $rec['入出庫日'];
           $c = $rec['入力日'];
           $d = $rec['品名'];
           $e = $rec['品番'];
           $f = $rec['管理番号'];
           $g = $rec['シリアル'];
           $h = $rec['数量'];
           $j = trim($rec['発工程'],"/");
           $k = trim($rec['受工程'],"/");
           $l = $rec['損品数'];
           $m = $rec['保留数'];
           $n = $rec['規格1'];
           $o = $rec['規格2'];
           $p = $rec['備考'];
           $q = $rec['入力者'];
           $r = $rec['exe_flg'];

           $cells = [
           WriterEntityFactory::createCell($a),
           WriterEntityFactory::createCell($b),
           WriterEntityFactory::createCell($c),
           WriterEntityFactory::createCell($d),
           WriterEntityFactory::createCell($e),
           WriterEntityFactory::createCell($f),
           WriterEntityFactory::createCell($g),
           WriterEntityFactory::createCell($h),
           WriterEntityFactory::createCell($j),
           WriterEntityFactory::createCell($k),
           WriterEntityFactory::createCell($l),
           WriterEntityFactory::createCell($m),
           WriterEntityFactory::createCell($n),
           WriterEntityFactory::createCell($o),
           WriterEntityFactory::createCell($p),
           WriterEntityFactory::createCell($q),
           WriterEntityFactory::createCell($r)
           ];

           $rows = WriterEntityFactory::createRow($cells);
           $writer->addRow($rows);
           $i++;

            };

 $writer->close();

 $file = "dbdata.xlsx";
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

}

}catch(PDOException $e) {
      echo '<br><br>b.php:19〜147_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
      };


?>

<form method="POST" action="b.php">
<input type="hidden" name="file" value="./dbdata.xlsx" />
<input type="submit" value = "データベースの全データをダウンロード" />
</form>
<form method="POST" action="index2.php">
<input type="hidden" name="file" value="./dbdata.xlsx" />
<input type="submit" value = "入力・検索フォームに戻る" />
</form>






