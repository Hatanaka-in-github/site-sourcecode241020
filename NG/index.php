    <meta charset="UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

<?php require_once '/var/www/html/getParameters.php';
require_once '/var/www/html/DBclasscollect.php';
use db\DataSource;
$db = new DataSource();
if(!empty($_POST['AUTO_ID2'])){$db->QuerySql("UPDATE NGtable SET exe_flg = 1 where AUTO_ID = '{$_POST['AUTO_ID2']}' and exe_flg = 0    ;");};
if(!empty($_POST['備考1'])){ $db->QuerySql("UPDATE NGtable SET NG理由 = '{$_POST['備考1']}'  where AUTO_ID = '{$_POST['AUTO_ID']}' and exe_flg = 0    ;");};
if(!empty($_POST['備考2'])){ $db->QuerySql("UPDATE NGtable SET 備考欄1 = '{$_POST['備考2']}' where AUTO_ID = '{$_POST['AUTO_ID']}' and exe_flg = 0    ;");};
if(!empty($_POST['受取人'])){ $db->QuerySql("UPDATE NGtable SET 入力者 = '{$_POST['受取人']}' where AUTO_ID = '{$_POST['AUTO_ID']}' and exe_flg = 0    ;");};
if(!empty($_POST['備考3'])){ $db->QuerySql("UPDATE NGtable SET 備考欄2 = '{$_POST['備考3']}' where AUTO_ID = '{$_POST['AUTO_ID']}' and exe_flg = 0    ;");};
if(!empty($_POST['supply'])){ $db->QuerySql("UPDATE NGtable SET 管理表記入 = '{$_POST['supply']}' where AUTO_ID = '{$_POST['AUTO_ID']}' and exe_flg = 0    ;");};
if(!empty($_POST['received'])){ $db->QuerySql("UPDATE NGtable SET 受取 = '{$_POST['received']}' where AUTO_ID = '{$_POST['AUTO_ID']}' and exe_flg = 0    ;");};  ?>

               <form class="container" method="POST" action="e.php">
               <input type="hidden" name="file" value="NGdata.xlsx" />
               <input type="submit" class="btn btn-outline-secondary" value = "NGデータダウンロード" />
               </form>

<div class="p-3 mb-2 bg-warning text-dark">NG品一覧</div>
<div class="tablex wrap">
<table class="table tablex">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">管理番号</th>
      <th scope="col">品名</th>
      <th scope="col">型番</th>
      <th scope="col">シリアル</th>
      <th scope="col">規格1</th>
      <th scope="col">規格2</th>
      <th scope="col">NG理由</th>
      <th scope="col">工程</th>
　　  <th scope="col">受取人</th>
　　  <th scope="col">備考欄1</th>
　　  <th scope="col">備考欄2</th>
　　　<th scope="col">ステータス更新</th>
　　　<th scope="col">処理完了</th>
</tr>
  </thead>

<?php
/* https://note.com/rik114/n/n6437200d7a89 */
/* https://sukimanosukima.com/2021/07/23/php-17/ */

try{

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql2 =  'SELECT * FROM NGtable WHERE exe_flg = 0' ;

$stmt=$dbh->prepare($sql2);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
                    <tbody>
                    <form  action="index.php" method="post">
                    <input type="hidden" name="AUTO_ID" value=<?php print $rec['AUTO_ID']; ?>  >
                    <th scope="row"><?php print $rec['AUTO_ID']; ?></th>
                       <td> <?php print $rec['管理番号'];?></td>
                       <td> <?php print $rec['品名'];?></td>
                       <td> <?php print $rec['型番'];?></td>
                       <td> <?php print $rec['シリアル'];?></td>
                       <td> <?php print $rec['規格1'];?></td>
                       <td> <?php print $rec['規格2'];?></td>
                       <td> <textarea id="Notice" cols="40" name="備考1" rows="2"><?php print $rec['NG理由'];?></textarea></td>
                       <td> <?php print trim($rec['工程'],"/");?> </td>
                       <td>  <textarea id="Notice" cols="10" name="受取人" rows="1" ><?php print $rec['入力者'];?></textarea></td>
                      <td><textarea id="Notice" cols="40" name="備考2" rows="2"  ><?php print $rec['備考欄1'];?></textarea></td>
                      <td><textarea id="Notice" cols="40" name="備考3" rows="2"  ><?php print $rec['備考欄2'];?></textarea></td>
                      <td><button type="submit" >更新</button></td>
                      </form>
                    <form  action="index.php" method="post">
                      <input type="hidden" name="AUTO_ID2" value=<?php print $rec['AUTO_ID']; ?>  >
                      <td><button type="submit" >完了</button></td>
                    </form></tbody>
<?php ; } ;


}catch(PDOException $e) {
  echo '<br><br>replaceprocess.php:53_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
?>
</table>
</div>














