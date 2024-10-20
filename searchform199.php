<head>
    <meta charset="UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  </head>
<h2 class="bg-info">オーダー検索</h2>
<form class="container" action="index.php" method="post">
     <div class="form-group">
      <label for="HINMEI">入出庫日 </label><br>
      <input  type="text" name="IOday" value = "<?php if(!empty($_POST['IOday'])){ echo ($_POST['IOday']) ; }; ?>" class="form-control" placeholder="yyyy-mm-dd" />
     </div>
     <div class="form-group">
      <label for="HINMEI">管理番号 </label><br>
      <input  type="text" name="SAdNum" value = "<?php if(!empty($_POST['SAdNum'])){ echo ($_POST['SAdNum']) ; }; ?>" class="form-control" />
     </div>
     <div class="form-group">
      <label for="HINMEI">依頼番号 </label><br>
      <input  type="text" name="SRec" value = "<?php if(!empty($_POST['SRec'])){ echo ($_POST['SRec']) ; }; ?>" class="form-control" />
     </div>
     <div class="form-group">
      <label for="HINMEI">品名 </label><br>
      <input  type="text" name="SPName2" value = "<?php if(!empty($_POST['SPName2'])){ echo ($_POST['SPName2']) ; }; ?>" class="form-control" />
     </div>
     <div class="form-group">
      <label for="SUURYOU">担当者 </label><br>
      <input  type="text" name="SAssign2" value = "<?php if(!empty($_POST['SAssign2'])){ echo ($_POST['SAssign2']) ; }; ?>" class="form-control"  />
     </div>
     <div class="form-group">
      <label for="SUURYOU">入力者 </label><br>
      <input  type="text" name="SMember2" value = "<?php if(!empty($_POST['SMember2'])){ echo ($_POST['SMember2']) ; }; ?>" class="form-control"  />
     </div>
      <div class="form-group">
      <label for="HINMEI"> </label><br>
      <input type="hidden" name="hidden-parameter9999" value=43 class="form-control"  />
      </div>

      <button class="regist" type="submit"> 検索</button>
   </form>
<?php if(!empty($_POST['hidden-parameter9999'])){
  require_once 'getParameters.php';
/*
require_once 'DBclasscollect.php';
use db\DataSource;
$db = new DataSource();
*/
?>


<div class="table-responsive">
<table class="table bg-info text-nowrap">
      <thead>
      <tr>
      <th scope="col">レコードID</th>
      <th scope="col">入出庫日</th>
      <th scope="col">入力日</th>
      <th scope="col">管理番号</th>
      <th scope="col">依頼番号</th>
      <th scope="col">品名</th>
      <th scope="col">数量</th>
      <th scope="col">担当者</th>
      <th scope="col">入力者</th>
      <th scope="col">備考</th>
      <th scope="col">ステータス更新</th>
      </tr>
      </thead>
<?php
/* https://note.com/rik114/n/n6437200d7a89 */

try{

if(empty($_POST['SPName2'])){$NaPhrase2 = "" ;}else{$SPName2 = '%'.($_POST['SPName2']).'%'; $NaPhrase2 ="and 品名 LIKE '$SPName2' "; }; 
if(empty($_POST['SRec'])){$FrPhrase2 = "" ;}else{$SRec = '%'.($_POST['SRec']).'%'; $FrPhrase2 ="and 依頼番号 LIKE '$SRec' ";};
if(empty($_POST['IOday'])){$DaPhrase2 = "" ;}else{$SDay = '%'.($_POST['IOday']).'%'; $DaPhrase2 ="and 入出庫日 LIKE '$SDay' ";};
if(empty($_POST['SAssign2'])){$SAPhrase2 = "" ;}else{$SAssign2 = '%'.($_POST['SAssign2']).'%'; $SAPhrase2 ="and 担当者 LIKE '$SAssign2' ";};
if(empty($_POST['SMember2'])){$SMPhrase2 = "" ;}else{$SMember2 = '%'.($_POST['SMember2']).'%'; $SMPhrase2 ="and 入力者 LIKE '$SMember2' ";};
if(empty($_POST['SAdNum'])){$SAdPhrase2 = "" ;}else{$SAdNum = '%'.($_POST['SAdNum']).'%'; $SAdPhrase2 ="and 管理番号 LIKE '$SAdNum' ";};
if(empty($_POST['SOrderStatus'])){$SOrPhrase2 = "" ;}else{$SOrderStatus = '%'.($_POST['SOrderStatus']).'%'; $SOrPhrase2 ="and ステータス LIKE '$SOrderStatus' ";};




/* https://sukimanosukima.com/2021/07/23/php-17/ */
$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql =  'SELECT * FROM IOSchedule WHERE exe_flg = 0 '.$NaPhrase2.$FrPhrase2.$SAPhrase2.$SMPhrase2.$SAdPhrase2.$DaPhrase2.$SOrPhrase2.'order by 入出庫日 asc';
echo $sql;



$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rec==false) break;?>
                      <tbody>
                      <input type="hidden" name="AUTO_ID3" value=<?php print $rec['AUTO_ID']; ?>  >
                      <th scope="row"><?php print $rec['AUTO_ID']; ?></th>
                         <td> <?php print $rec['入出庫日'];?></td>
                         <td> <?php print $rec['入力日'];?></td>
                         <td> <?php print $rec['管理番号'];?></td>
                         <td> <?php print $rec['依頼番号'];?></td>
                         <td> <?php print $rec['品名'];?></td>
                         <td> <?php print $rec['数量'];?></td>
                         <td> <?php print $rec['担当者'];?></td>
                         <td> <?php print $rec['入力者'];?></td>
                         <td> <?php print $rec['備考'];?></td>
                         <td> <?php print $rec['ステータス'];?></td>
                      </tbody>
  <?php ; } ?>
</table></div>

<?php



}catch(PDOException $e) {
  echo '<br><br>searchform101.php:105〜115_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
  };

};


?>









