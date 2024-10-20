<?php require_once '/var/www/html/getParameters.php';
require_once '/var/www/html/DBclasscollect.php';
      use db\DataSource;
      $db = new DataSource();

if(!empty($_POST['hidden-parameter3-2'])){

 try{

 $DelDate = $db->SelectSumAllarray("SELECT 入力日 FROM process_progress WHERE exe_flg != 1 and AUTO_ID = '{$_POST['record-id']}';");
 $DelMem = $db->SelectSumAllarray("SELECT 入力者 FROM process_progress WHERE exe_flg != 1 and AUTO_ID = '{$_POST['record-id']}';");

}catch(PDOException $e) {
      echo '<br><br>NGorSTOPexecution.php_9:処理に失敗しました。<br><br>';
      echo $e->getMessage();
      };

 $twinID = (($_POST['record-id']) - 1 ) ;
 /*$db->QuerySql("UPDATE process_progress SET exe_flg = 1 where 入力日 = '{$DelDate[0]}' and 入力者 = '{$DelMem[0]}';"); */

 try{

 $db->QuerySql("UPDATE process_progress SET exe_flg = 1 where exe_flg != 1 and AUTO_ID = '{$_POST['record-id']}';"); 
 $db->QuerySql("UPDATE process_progress SET exe_flg = 1 where exe_flg != 1 and AUTO_ID = '{$twinID}';"); 

}catch(PDOException $e) {
      echo '<br><br>NGorSTOPexecution.php_22:処理に失敗しました。<br><br>';
      echo $e->getMessage();
      };

 unset($_POST['hidden-parameter3-2']);   }
elseif(!empty($_POST['hidden-parameter3-3'])){
 $GoSerial = $db->SelectSumAllarray("SELECT シリアル FROM process_progress WHERE exe_flg != 1 and AUTO_ID = '{$_POST['record-id2']}';");
 $STOP = $db->SelectSumAllarray("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and シリアル = '{$GoSerial[0]}';");
 $GoName = $db->SelectSumAllarray("SELECT 品名 FROM process_progress WHERE exe_flg != 1 and AUTO_ID = '{$_POST['record-id2']}';");
 $GoProcess = $db->SelectSumAllarray("SELECT 受工程 FROM process_progress WHERE exe_flg != 1 and AUTO_ID = '{$_POST['record-id2']}';");
 $Goadnum = $db->SelectSumAllarray("SELECT 管理番号 FROM process_progress WHERE exe_flg != 1 and AUTO_ID = '{$_POST['record-id2']}';");
 $OKReason = $_POST['OKReason'];
 $IDate = $_POST['入力日'];
 $Member = $_POST['Member'];

 if($STOP[0] > 0){

               $CheckPhrase = "and 入力日 = '$IDate' and 入力者 = '$Member' order by AUTO_ID desc  limit 1";

                  $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
                  $user = 'admin';
                  $password =$pass;
                  $dbh = new PDO($dsn,$user,$password);
                  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
                  $sqla =  'SELECT * FROM process_progress WHERE exe_flg = 0 '.$CheckPhrase;



                                $stmt=$dbh->prepare($sqla);
                                $stmt->execute();
                                while(1){
                                          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                                          if($rec==false) break;
                                          if($rec['入力日'] == $IDate && $rec['入力者'] == $Member ){

                                          try{
                                           $db->QuerySql("UPDATE process_progress SET exe_flg = 1 where exe_flg != 1 and 入力日 = '$IDate' and 入力者 = '$Member' ;");

                                          }catch(PDOException $e) {
                                                echo '<br><br>NGorSTOPexecution.php_62:処理に失敗しました。<br><br>';
                                                echo $e->getMessage();
                                                };

                                                                                                     }
                                        }


try{

 $GoSerialProcess = $GoName[0].'ST'.$GoSerial[0].$GoProcess[0] ;
 $db->QuerySql("insert into `process_progress` (入力日,品名,シリアル,管理番号,保留数,受工程,備考,シリアル工程,入力者,exe_flg) 
 values ('{$IDate}','{$GoName[0]}','{$GoSerial[0]}','{$Goadnum[0]}',-1,'{$GoProcess[0]}','{$OKReason}','{$GoSerialProcess}','{$Member}',2);");

 $GoSerialProcess = $GoName[0].$GoSerial[0].$GoProcess[0] ;
 $db->QuerySql("insert into `process_progress` (入力日,品名,数量,シリアル,管理番号,受工程,備考,シリアル工程,入力者,exe_flg) 
 values ('{$IDate}','{$GoName[0]}',1,'{$GoSerial[0]}','{$Goadnum[0]}','{$GoProcess[0]}','{$OKReason}','{$GoSerialProcess}','{$Member}',0);");

$db->QuerySql("UPDATE process_progress SET exe_flg = 1 where exe_flg != 1 and AUTO_ID = '{$_POST['record-id2']}' ; ");

}catch(PDOException $e) {
      echo '<br><br>NGorSTOPexecution.php_75:処理に失敗しました。<br><br>';
      echo $e->getMessage();
      };


                 }else{ echo "指定のレコードIDに保留数はありません。" ; } ;
}elseif(!empty($_POST['hidden-parameter4-4'])){
 /*$db->QuerySql("UPDATE process_progress SET exe_flg = 1 where 入力日 = '{$DelDate[0]}' and 入力者 = '{$DelMem[0]}';"); */

 try{

 $db->QuerySql("UPDATE IOSchedule SET exe_flg = 1 where exe_flg != 1 and AUTO_ID = '{$_POST['record-id3']}';");

}catch(PDOException $e) {
      echo '<br><br>NGorSTOPexecution.php_97:処理に失敗しました。<br><br>';
      echo $e->getMessage();
      };



 unset($_POST['hidden-parameter4-4']);  }; ?>
