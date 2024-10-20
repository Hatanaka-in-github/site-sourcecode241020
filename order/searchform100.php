<head>
    <meta charset="UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
  </head>
<h2 class="bg-info">入力検索</h2>
<form class="container" action="searchform100.php" method="post">
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
      <input type="hidden" name="hidden-parameter4-3" value=43 class="form-control"  />
      </div>

      <button class="regist" type="submit"> 検索</button>
   </form>
<?php require_once '/var/www/html/getParameters.php';
require_once '/var/www/html/DBclasscollect.php';
use db\DataSource;
$db = new DataSource();

try{

if(!empty($_POST['AUTO_ID4'])){$db->QuerySql("UPDATE IOSchedule SET exe_flg = 1 where AUTO_ID = '{$_POST['AUTO_ID4']}' and exe_flg = 0    ;");};
if(!empty($_POST['入出庫日'])){ $db->QuerySql("UPDATE IOSchedule SET 入出庫日 = '{$_POST['入出庫日']}'  where AUTO_ID = '{$_POST['AUTO_ID3']}' and exe_flg = 0 ;");};
if(!empty($_POST['ステータス'])){ $db->QuerySql("UPDATE IOSchedule SET ステータス = '{$_POST['ステータス']}'  where AUTO_ID = '{$_POST['AUTO_ID3']}' and exe_flg = 0 ;");};
if(!empty($_POST['担当者'])){ $db->QuerySql("UPDATE IOSchedule SET 担当者 = '{$_POST['担当者']}'  where AUTO_ID = '{$_POST['AUTO_ID3']}' and exe_flg = 0 ;");};
if(!empty($_POST['editor'])){ $db->QuerySql("UPDATE IOSchedule SET 更新者 = '{$_POST['editor']}'  where AUTO_ID = '{$_POST['AUTO_ID3']}' and exe_flg = 0 ;");};
if(!empty($_POST['update'])){ $db->QuerySql("UPDATE IOSchedule SET 更新日 = '{$_POST['update']}'  where AUTO_ID = '{$_POST['AUTO_ID3']}' and exe_flg = 0 ;");};

}catch(PDOException $e) {
  echo '<br><br>searchform100.php:52_処理に失敗しました。<br><br>';
  echo $e->getMessage();
  };

?>
<form class="container" action="index.php" method="post" autocomplete="off" >
  <div class="form-group">
   <button class="btn btn-secondary" type="submit" >フォームに戻る</button>
  </div>
</form>

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
      <th scope="col">更新者</th>
      <th scope="col">更新日</th>
      <th scope="col">ステータス</th>
      <th scope="col">更新</th>
      <th scope="col">処理完了</th>
      </tr>
      </thead>
<?php
/* https://note.com/rik114/n/n6437200d7a89 */

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
$sql =  'SELECT * FROM IOSchedule WHERE exe_flg = 0 '.$NaPhrase2.$FrPhrase2.$SAPhrase2.$SMPhrase2.$SAdPhrase2.$DaPhrase2.$SOrPhrase2.'order by ステータス,入出庫日 asc';
echo $sql;

try{

$Time = date("Y-m-d")."T".date("H:i:s");
$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rec==false) break;?>
                      <tbody>
                      <form  action="" method="post"><?php
                      if($rec['ステータス'] == "0_予定"){?><tr class ="table-warning"><?php }
                      elseif($rec['ステータス'] == "1_調整中"){?><tr class ="table-info"><?php } ?>
                      <input type="hidden" name="AUTO_ID3" value=<?php print $rec['AUTO_ID']; ?>  >
                      <th scope="row"><?php print $rec['AUTO_ID']; ?></th>
                         <td> <textarea  cols="15" name="入出庫日" rows="1"><?php print $rec['入出庫日'];?></textarea></td>
                         <td> <?php print $rec['入力日'];?></td>
                         <td> <?php print $rec['管理番号'];?></td>
                         <td> <?php print $rec['依頼番号'];?></td>
                         <td> <?php print $rec['品名'];?></td>
                         <td> <?php print $rec['数量'];?></td>
                         <td> <textarea  cols="15" name="担当者" rows="1"><?php print $rec['担当者'];?></textarea></td>
                         <td> <?php print $rec['入力者'];?></td>
                         <td> <?php print $rec['備考'];?></td>
                         <td> <textarea id="editor" cols="10" name="editor" rows="1" required></textarea></td>
                         <td> <textarea id="update" cols="25" name="update" rows="1" ><?php print $Time;?></textarea></td>
                         <td> <select cols="15" name="ステータス" rows="1" >
                           <option value="<?php echo $rec['ステータス'];?>" selected><?php echo '○'.$rec['ステータス'];?></option>
                           <option value="1_調整中">調整中</option>
                           <option value="0_予定">予定</option>
                          </select>
                          </td>
                         <input type="hidden" name="hidden-parameter4-3" value=43 class="form-control"  />
                        <td><button type="submit" >更新</button></td>
                        </form>
                       <form  action="" method="post">
                        <input type="hidden" name="AUTO_ID4" value=<?php print $rec['AUTO_ID']; ?>  >
                        <input type="hidden" name="hidden-parameter4-3" value=43 class="form-control"  />
                       <td><button type="submit" >レコード削除</button></td></tr>
                      </form>
                      </tbody>
  <?php ; } ?>
</table></div>

<?php



}catch(PDOException $e) {
  echo '<br><br>searchform100.php_200:処理に失敗しました。<br><br>';
  echo $e->getMessage();
  };



?>









