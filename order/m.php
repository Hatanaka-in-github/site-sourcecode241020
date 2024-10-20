<?php

require_once '/var/www/html/getParameters.php';
require '/var/www/html/vendor/autoload.php';
 
// 利用クラスエイリアス
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Style\Border;
use Box\Spout\Writer\Common\Creator\Style\BorderBuilder;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;
 
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
$writer->openToFile('OrderDelivery.xlsx');

           $cells1 = [
           WriterEntityFactory::createCell('レコードID'),
           WriterEntityFactory::createCell('入出庫日'),
           WriterEntityFactory::createCell('入力日'),
           WriterEntityFactory::createCell('管理番号'),
           WriterEntityFactory::createCell('依頼番号'),
           WriterEntityFactory::createCell('品名'),
           WriterEntityFactory::createCell('数量'),
           WriterEntityFactory::createCell('担当者'),
           WriterEntityFactory::createCell('入力者'),
           WriterEntityFactory::createCell('備考'),
           WriterEntityFactory::createCell('ステータス'),
           WriterEntityFactory::createCell('exe_flg')
           ];

           $sheet1 = $writer->getCurrentSheet();
           $rows = WriterEntityFactory::createRow($cells1);
           $writer->addRow($rows);



           /* https://note.com/rik114/n/n6437200d7a89 */
           /* https://sukimanosukima.com/2021/07/23/php-17/ */
           $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
           $user = 'admin';
           $password =$pass;
           $dbh = new PDO($dsn,$user,$password);
           $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           $sql2 =  'SELECT * FROM IOSchedule' ;
           echo $sql2;
            
           
           
           $stmt=$dbh->prepare($sql2);
           $stmt->execute();
           while(1){
               $rec = $stmt->fetch(PDO::FETCH_ASSOC);
               if($rec==false) break;
           $i = 2;
           $cells =  'cell'.$i;

           $a = $rec['AUTO_ID'];
           $b = $rec['入出庫日'];
           $c = $rec['入力日'];
           $d = $rec['管理番号'];
           $e = $rec['依頼番号'];
           $f = $rec['品名'] ;
           $g = $rec['数量'];
           $h = $rec['担当者'];
           $i = $rec['入力者'];
           $j = $rec['備考'];
           $k = $rec['ステータス'];
           $l = $rec['exe_flg'];

           $cells = [
           WriterEntityFactory::createCell($a),
           WriterEntityFactory::createCell($b),
           WriterEntityFactory::createCell($c),
           WriterEntityFactory::createCell($d),
           WriterEntityFactory::createCell($e),
           WriterEntityFactory::createCell($f),
           WriterEntityFactory::createCell($g),
           WriterEntityFactory::createCell($h),
           WriterEntityFactory::createCell($i),
           WriterEntityFactory::createCell($j),
           WriterEntityFactory::createCell($k),
           WriterEntityFactory::createCell($l)
           ];

           $rows = WriterEntityFactory::createRow($cells);
           $writer->addRow($rows);
           $i++;

            };

$writer->close();

$file = "OrderDelivery.xlsx";
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
?>
