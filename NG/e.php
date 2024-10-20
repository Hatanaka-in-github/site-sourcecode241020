<?php


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
$writer->openToFile('NGdata.xlsx');

           $cells1 = [
           WriterEntityFactory::createCell('ID'),
           WriterEntityFactory::createCell('管理番号'),
           WriterEntityFactory::createCell('品名'),
           WriterEntityFactory::createCell('品番'),
           WriterEntityFactory::createCell('シリアル'),
           WriterEntityFactory::createCell('規格1'),
           WriterEntityFactory::createCell('規格2'),
           WriterEntityFactory::createCell('NG理由'),
           WriterEntityFactory::createCell('工程'),
           WriterEntityFactory::createCell('受取人'),
           WriterEntityFactory::createCell('備考1'),
           WriterEntityFactory::createCell('備考2'),
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
           $sql2 =  'SELECT * FROM NGtable' ;
           echo $sql2;
            
           
           
           $stmt=$dbh->prepare($sql2);
           $stmt->execute();
           while(1){
               $rec = $stmt->fetch(PDO::FETCH_ASSOC);
               if($rec==false) break;
           $i = 2;
           $cells =  'cell'.$i;

           $a = $rec['AUTO_ID'];
           $b1 = $rec['管理番号'];
           $b = $rec['品名'];
           $b2 = $rec['型番'];
           $c = $rec['シリアル'];
           $d = $rec['規格1'];
           $e = $rec['規格2'];
           $f = $rec['NG理由'];
           $g = trim($rec['工程'],"/") ;
           $h = $rec['入力者'];
           $i = $rec['備考欄1'];
           $j = $rec['備考欄2'];
           $k = $rec['exe_flg'];

           $cells = [
           WriterEntityFactory::createCell($a),
           WriterEntityFactory::createCell($b1),
           WriterEntityFactory::createCell($b),
           WriterEntityFactory::createCell($b2),
           WriterEntityFactory::createCell($c),
           WriterEntityFactory::createCell($d),
           WriterEntityFactory::createCell($e),
           WriterEntityFactory::createCell($f),
           WriterEntityFactory::createCell($g),
           WriterEntityFactory::createCell($h),
           WriterEntityFactory::createCell($i),
           WriterEntityFactory::createCell($j),
           WriterEntityFactory::createCell($k)
           ];

           $rows = WriterEntityFactory::createRow($cells);
           $writer->addRow($rows);
           $i++;

            };

$writer->close();

$file2 = "NGdata.xlsx";
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
 	die("Aダウンロード対象ファイルが見つかりません");
 }

}
?>










