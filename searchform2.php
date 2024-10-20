<table class="table bg-success">
      <thead>
      <tr>
      <th scope="col">レコードID</th>
      <th scope="col">レコード種別</th>
      <th scope="col">入庫日</th>
      <th scope="col">出庫日</th>
      <th scope="col">入力日</th>
      <th scope="col">品名</th>
      <th scope="col">数量</th>
      <th scope="col">入力者</th>
      <th scope="col">備考</th>
      </tr>
      </thead>
      <tbody>
<?php
/* https://note.com/rik114/n/n6437200d7a89 */
require_once 'getParameters.php';

if(empty($_POST['SPName2'])){$NaPhrase2 = "" ;}else{$SPName2 = '%'.($_POST['SPName2']).'%'; $NaPhrase2 ="and 品名 LIKE '$SPName2' "; }; 
if(empty($_POST['SRec'])){$FrPhrase2 = "" ;}else{$SRec = '%'.($_POST['SRec']).'%'; $FrPhrase2 ="and レコード種別 LIKE '$SRec' ";};
if(empty($_POST['SMember2'])){$SMPhrase2 = "" ;}else{$SMember2 = '%'.($_POST['SMember2']).'%'; $SMPhrase2 ="and 入力者 LIKE '$SMember2' ";};


/* https://sukimanosukima.com/2021/07/23/php-17/ */
$dsn = $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql =  'SELECT * FROM IOSchedule WHERE exe_flg = 0 '.$NaPhrase2.$FrPhrase2.$SMPhrase2;
echo $sql;

try{

$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
      <tr>
      <th scope="row"><?php print $rec['AUTO_ID'] ?></th><td>
　　　<?php print $rec['レコード種別'];?></td><td>
      <?php print $rec['入庫日'];?></td><td>
      <?php print $rec['出庫日'];?></td><td>
      <?php print $rec['入力日'];?></td><td>
      <?php print $rec['品名'];?></td><td>
      <?php print $rec['数量'];?></td><td>
      <?php print $rec['入力者'];?></td><td>
      <?php print $rec['備考'];?></td></tr>
      <?php
};
?>
</table>

<?php



}catch(PDOException $e) {
  echo '<br><br>該当するレコードが見つかりません。<br><br>';
  };



?>

