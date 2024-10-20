      <?php

if(!empty($_POST['EPName']) && !empty($_POST['EPNum'])) { 
    $PNum = $_POST['EPNum'];
    $PName = $_POST['EPName'];
    ?>


    <div class="table-responsive">
<table class="table bg-info text-nowrap">
      <thead>
      <tr>
      <th scope="col">レコードID</th>
      <th scope="col">管理番号</th>
      <th scope="col">入出庫日</th>
      <th scope="col">入力日</th>
      <th scope="col">品名</th>
      <th scope="col">数量</th>
      <th scope="col">入力者</th>
      <th scope="col">備考</th>
      <th scope="col">ステータス</th>
      <th scope="col">更新者</th>
      <th scope="col">更新日</th>
      </tr>
      </thead>
<?php
/* https://note.com/rik114/n/n6437200d7a89 */


/* https://sukimanosukima.com/2021/07/23/php-17/ */

require_once 'getParameters.php';

try{


$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql =  "SELECT * FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$PName}' order by ステータス,入出庫日 asc";




echo "$PName"."の受注は以下の通りです。";
$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rec==false) break;?>
                      <tbody><?php
                      if($rec['ステータス'] == "0_予定"){?><tr class ="table-warning"><?php }
                      elseif($rec['ステータス'] == "1_調整中"){?><tr class ="table-info"><?php } ?>
                      <th scope="row"><?php print $rec['AUTO_ID']; ?></th>
                         <td> <?php print $rec['管理番号'];?></td>
                         <td> <?php print $rec['入出庫日'];?></td>
                         <td> <?php print $rec['入力日'];?></td>
                         <td> <?php print $rec['品名'];?></td>
                         <td> <?php print $rec['数量'];?></td>
                         <td> <?php print $rec['入力者'];?></td>
                         <td> <?php print $rec['備考'];?></td>
                         <td> <?php print $rec['ステータス'];?></td>
                         <td> <?php print $rec['更新者'];?></td>
                         <td> <?php print $rec['更新日'];?></td>
                        </tr>
                      </tbody>
  <?php ; } ?>
</table></div><?php

}catch(PDOException $e) {
    echo '<br><br>処理に失敗しました。管理者にお問合せ下さい。<br><br>';
    };

    $PNum = $_POST['EPNum'];
    $PName = $_POST['EPName'];
    if(file_exists("./admin/p/all.php")){include("./admin/p/all.php");

        $LIST0 = "/".$LIST[0]."/" ;
        $LIST1 = "/".$LIST[1]."/" ;
        $LIST2 = "/".$LIST[2]."/" ;
        $LIST3 = "/".$LIST[3]."/" ;
        $LIST4 = "/".$LIST[4]."/" ;
        $LIST5 = "/".$LIST[5]."/" ;
        $LIST6 = "/".$LIST[6]."/" ;
        $LIST7 = "/".$LIST[7]."/" ;
        $LIST8 = "/".$LIST[8]."/" ;
        $LIST9 = "/".$LIST[9]."/" ;
        $LIST10 = "/".$LIST[10]."/" ;
        $LIST11 = "/".$LIST[11]."/" ;
        $LIST12 = "/".$LIST[12]."/" ;

try{
    
    $TPSumlist0 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST0}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist1 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST1}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist2 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST2}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist3 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST3}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist4 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST4}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist5 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST5}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist6 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST6}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist7 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST7}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist8 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST8}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist9 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST9}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist10 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST10}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist11 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST11}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TPSumlist12 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST12}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist0 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST0}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist1 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST1}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist2 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST2}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist3 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST3}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist4 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST4}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist5 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST5}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist6 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST6}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist7 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST7}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist8 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST8}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist9 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST9}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist10 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST10}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist11 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST11}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $TNGSumlist12 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST12}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist0 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST0}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist1 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST1}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist2 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST2}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist3 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST3}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist4 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST4}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist5 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST5}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist6 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST6}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist7 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST7}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist8 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST8}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist9 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST9}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist10 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST10}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist11 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST11}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");
    $STSumlist12 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST12}' and 品名 = '{$PName}' and 品番 = '{$PNum}' ;");

}catch(PDOException $e) {
    echo '<br><br>stocktableelement:86〜124_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
    };


    echo "$PName"."の全在庫は以下の通りです。";
    include('allstocktable.php');}
    else{ echo "工程登録がされていません。";}

}elseif(!empty($_POST['EPName'])) {

    $PName = $_POST['EPName'];
    ?>


    <div class="table-responsive">
<table class="table bg-info text-nowrap">
      <thead>
      <tr>
      <th scope="col">レコードID</th>
      <th scope="col">管理番号</th>
      <th scope="col">入出庫日</th>
      <th scope="col">入力日</th>
      <th scope="col">品名</th>
      <th scope="col">数量</th>
      <th scope="col">入力者</th>
      <th scope="col">備考</th>
      <th scope="col">ステータス</th>
      <th scope="col">更新者</th>
      <th scope="col">更新日</th>
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
$sql =  "SELECT * FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$PName}' ";




echo "$PName"."の受注は以下の通りです。";
$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rec==false) break;?>
                      <tbody><?php
                      if($rec['ステータス'] == "0_予定"){?><tr class ="table-warning"><?php }
                      elseif($rec['ステータス'] == "1_調整中"){?><tr class ="table-info"><?php } ?>
                      <th scope="row"><?php print $rec['AUTO_ID']; ?></th>
                         <td> <?php print $rec['管理番号'];?></td>
                         <td> <?php print $rec['入出庫日'];?></td>
                         <td> <?php print $rec['入力日'];?></td>
                         <td> <?php print $rec['品名'];?></td>
                         <td> <?php print $rec['数量'];?></td>
                         <td> <?php print $rec['入力者'];?></td>
                         <td> <?php print $rec['備考'];?></td>
                         <td> <?php print $rec['ステータス'];?></td>
                         <td> <?php print $rec['更新者'];?></td>
                         <td> <?php print $rec['更新日'];?></td>
                        </tr>
                      </tbody>
  <?php ; } ?>
</table></div><?php

}catch(PDOException $e) {
    echo '<br><br>stocktableelement:178〜186_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
    };

    if(file_exists("./admin/p/all.php")){include("./admin/p/all.php");

        $LIST0 = "/".$LIST[0]."/";
        $LIST1 = "/".$LIST[1]."/" ;
        $LIST2 = "/".$LIST[2]."/" ;
        $LIST3 = "/".$LIST[3]."/" ;
        $LIST4 = "/".$LIST[4]."/" ;
        $LIST5 = "/".$LIST[5]."/" ;
        $LIST6 = "/".$LIST[6]."/" ;
        $LIST7 = "/".$LIST[7]."/";
        $LIST8 = "/".$LIST[8]."/" ;
        $LIST9 = "/".$LIST[9]."/" ;
        $LIST10 = "/".$LIST[10]."/" ;
        $LIST11 = "/".$LIST[11]."/" ;
        $LIST12 = "/".$LIST[12]."/" ;


try{

    $TPSumlist0 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST0}' and 品名 = '{$PName}' ;");
    $TPSumlist1 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST1}' and 品名 = '{$PName}' ;");
    $TPSumlist2 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST2}' and 品名 = '{$PName}' ;");
    $TPSumlist3 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST3}' and 品名 = '{$PName}' ;");
    $TPSumlist4 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST4}' and 品名 = '{$PName}' ;");
    $TPSumlist5 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST5}' and 品名 = '{$PName}' ;");
    $TPSumlist6 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST6}' and 品名 = '{$PName}' ;");
    $TPSumlist7 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST7}' and 品名 = '{$PName}' ;");
    $TPSumlist8 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST8}' and 品名 = '{$PName}' ;");
    $TPSumlist9 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST9}' and 品名 = '{$PName}' ;");
    $TPSumlist10 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST10}' and 品名 = '{$PName}' ;");
    $TPSumlist11 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST11}' and 品名 = '{$PName}' ;");
    $TPSumlist12 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST12}' and 品名 = '{$PName}' ;");
    $TNGSumlist0 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST0}' and 品名 = '{$PName}' ;");
    $TNGSumlist1 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST1}' and 品名 = '{$PName}' ;");
    $TNGSumlist2 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST2}' and 品名 = '{$PName}' ;");
    $TNGSumlist3 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST3}' and 品名 = '{$PName}' ;");
    $TNGSumlist4 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST4}' and 品名 = '{$PName}' ;");
    $TNGSumlist5 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST5}' and 品名 = '{$PName}' ;");
    $TNGSumlist6 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST6}' and 品名 = '{$PName}' ;");
    $TNGSumlist7 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST7}' and 品名 = '{$PName}' ;");
    $TNGSumlist8 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST8}' and 品名 = '{$PName}' ;");
    $TNGSumlist9 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST9}' and 品名 = '{$PName}' ;");
    $TNGSumlist10 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST10}' and 品名 = '{$PName}' ;");
    $TNGSumlist11 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST11}' and 品名 = '{$PName}' ;");
    $TNGSumlist12 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST12}' and 品名 = '{$PName}' ;"); 
    $STSumlist0 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST0}' and 品名 = '{$PName}' ;");
    $STSumlist1 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST1}' and 品名 = '{$PName}' ;");
    $STSumlist2 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST2}' and 品名 = '{$PName}' ;");
    $STSumlist3 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST3}' and 品名 = '{$PName}' ;");
    $STSumlist4 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST4}' and 品名 = '{$PName}' ;");
    $STSumlist5 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST5}' and 品名 = '{$PName}' ;");
    $STSumlist6 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST6}' and 品名 = '{$PName}' ;");
    $STSumlist7 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST7}' and 品名 = '{$PName}' ;");
    $STSumlist8 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST8}' and 品名 = '{$PName}' ;");
    $STSumlist9 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST9}' and 品名 = '{$PName}' ;");
    $STSumlist10 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST10}' and 品名 = '{$PName}' ;");
    $STSumlist11 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST11}' and 品名 = '{$PName}' ;");
    $STSumlist12 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST12}' and 品名 = '{$PName}' ;");

}catch(PDOException $e) {
    echo '<br><br>stocktableelement:214〜252_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
    };

    echo "$PName"."の全在庫は以下の通りです。";
    include('allstocktable.php');}
    else{ echo "工程登録がされていません。";}

};?>
