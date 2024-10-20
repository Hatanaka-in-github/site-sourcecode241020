
  <?php require '/var/www/html/getParameters.php'; 
  require_once '/var/www/html/DBclasscollect.php';
use db\DataSource;
$db = new DataSource();


require '/var/www/html/vendor/autoload.php';
include ('/var/www/html/admin/p/all.php') ;

// 利用クラスエイリアス
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Style\Border;
use Box\Spout\Writer\Common\Creator\Style\BorderBuilder;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;
 


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
$writer->openToFile('dbdataeachprocess.xlsx');

           $cells0 = [
           WriterEntityFactory::createCell('対象工程'),
           WriterEntityFactory::createCell($_POST['検索工程'])
           ];

           $sheet1 = $writer->getCurrentSheet();
           $rows = WriterEntityFactory::createRow($cells0);
           $writer->addRow($rows);


           $cells1 = [
           WriterEntityFactory::createCell('品名'),
           WriterEntityFactory::createCell('品番'),
           WriterEntityFactory::createCell('管理番号'),
           WriterEntityFactory::createCell('規格1'),
           WriterEntityFactory::createCell('シリアル'),
           WriterEntityFactory::createCell('数量'),
           WriterEntityFactory::createCell('NG数'),
           WriterEntityFactory::createCell('保留数')
           ];


           $rows = WriterEntityFactory::createRow($cells1);
           $writer->addRow($rows);

/*
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

            if($rec==false) break; */

 try{


  $searchprocess = "/".$_POST['検索工程']."/";
  $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
  $user = 'admin';
  $password =$pass;
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";

  
  $stmt=$dbh->prepare($sql);
  $stmt->execute();
  while(1){
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec==false) break;
      
           $cells = [
           WriterEntityFactory::createCell($rec['品名']),
           WriterEntityFactory::createCell($rec['品番']),
           WriterEntityFactory::createCell($rec['管理番号']),
           WriterEntityFactory::createCell($rec['規格1']),
           WriterEntityFactory::createCell($rec['シリアル']),
           WriterEntityFactory::createCell($rec['SUM(数量)']),
           WriterEntityFactory::createCell($rec['SUM(損品数)']),
           WriterEntityFactory::createCell($rec['SUM(保留数)']) ];

           $rows = WriterEntityFactory::createRow($cells);
           $writer->addRow($rows);

};

       }catch(PDOException $e) {
        echo '<br><br>d.php_82:処理に失敗しました。<br><br>';
        echo $e->getMessage();
                               };

                     
$writer->close();


$file = "dbdataeachprocess.xlsx";
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
;


?>

<form method="POST" action="d.php">
<input type="hidden" name="file" value="./dbdata.xlsx" />
<input type="submit" value = "データベースの全データをダウンロード" />
</form>
<form method="POST" action="index.php">
<input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
<input type="submit" value = "入力・検索フォームに戻る" />
</form>







