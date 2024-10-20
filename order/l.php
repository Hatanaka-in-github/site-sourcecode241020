<html>
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
<body>
<form class="container" action="l.php" method="post" enctype="multipart/form-data" autocomplete="off">
   <div class="form-group">
    <label for="IDate">入力日</label><br><?php $Time = date("Y-m-d")."T".date("H:i:s");?>
    <input type="datetime-local" id="IDate" name="入力日" class="form-control" value="<?php echo $Time;?>" required/>
  </div>
  <div class="form-group" >
    <label for="NYUURYOKUSYA">入力者 </label>
    <input id="Member" type="text" name="入力者"  class="form-control"  required/>
  </div><br>
  ファイル：<br />
  <input type="file" name="upfile" size="30" /><br />
  <br />
  <input type="submit" value="アップロード" />
</form>
</body>
</html>

<?php
require_once '/var/www/html/getParameters.php';
require_once '/var/www/html/DBclasscollect.php';
use db\DataSource;
require '/var/www/html/vendor/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Style\Border;
use Box\Spout\Writer\Common\Creator\Style\BorderBuilder;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;

if(!empty($_FILES["upfile"]["tmp_name"]))
{

 if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) 
 {

  //アップロードが正しく完了したかチェック
  if(move_uploaded_file($_FILES['upfile']['tmp_name'], './'.$_FILES['upfile']['name'] ))
  { $ok = 1 ;
    
    chmod( './'.$_FILES['upfile']['name'], 0644);
    echo $_FILES['upfile']['name'] . "をアップロードしました。" ?><br><?php  ;

    $reader = ReaderEntityFactory::createReaderFromFile('./'.$_FILES['upfile']['name']);

    $reader->setShouldFormatDates(true);
    $reader->open('./'.$_FILES['upfile']['name']);
 
    $i = 0;
    $r = 1;
    $db = new DataSource();

    $IDate = ($_POST["入力日"]);
    $Member = ($_POST["入力者"]) ;


            $CheckPhrase = "and 入力日 = '$IDate' and 入力者 = '$Member' order by AUTO_ID desc  limit 1";

            $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
            $user = 'admin';
            $password =$pass;
            $dbh = new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
            $sqla =  'SELECT * FROM IOSchedule WHERE exe_flg = 0 '.$CheckPhrase;
                  $stmt=$dbh->prepare($sqla);
                  $stmt->execute();
                  while(1){
                        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                        if($rec==false) break;?>
                       <?php if($rec['入力日'] == $IDate && $rec['入力者'] == $Member){

                         try{
                         $db->QuerySql("UPDATE IOSchedule SET exe_flg = 1 where exe_flg != 1 and 入力日 = '$IDate' and 入力者 = '$Member' ;"); 
                         }catch(PDOException $e) {
                          echo '<br><br>NGorSTOPexecution.php:85_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; 
                          echo $e->getMessage();
                                                   }; 
                         };
                        };


    foreach ($reader->getSheetIterator() as $sheet)
    {
     foreach ($sheet->getRowIterator() as $row)
     {
      $array = [];
      // 1行から1セル読み込み
      foreach ($row->getCells() as $cell)
      {// 配列に格納
       $array[] = $cell;
      }

      if(!empty($array[0]) && $i > 0 )
      {
                $OUTDATE = $array[0] ;
                $AdminNum = $array[1] ;
                $OrderNum = $array[2] ;
                $IDate = ($_POST["入力日"]);
                $PName = $array[3] ; 
                $Assign = $array[4] ;
                $Notice = $array[5] ;
                $Member = ($_POST["入力者"]) ;
                $OrderStatus = $array[6] ;

       if(!empty($PName) && !empty($OUTDATE) && !empty($AdminNum)){

            try{

              $db->QuerySql("insert into `IOSchedule`
              (依頼番号,管理番号,入出庫日,入力日,品名,数量,担当者,入力者,備考,ステータス,exe_flg)
              values ('{$OrderNum}','{$AdminNum}','{$OUTDATE}','{$IDate}','{$PName}',1,'{$Assign}','{$Member}','{$Notice}','{$OrderStatus}',0);");

            }catch(PDOException $e) {
              echo '<br><br>NGorSTOPexecution.php:121_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; 
              echo $e->getMessage();
                                       };

            }else{echo "必要な項目が入力されていません。" ?><br> <?php  ; } ;





      }; $i++ ; $r++ ;
     };
    } ;
    
 echo "入力内容は以下の通りです。" ; ?>

              <table class="table table-striped table-dark">
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
              <th scope="col">ステータス</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <?php

               try{


               $MemPhrase = "and 入力日 = '{$IDate}' and 入力者 = '$Member' ";

               $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
               $user = 'admin';
               $password =$pass;
               $dbh = new PDO($dsn,$user,$password);
               $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               $sql1 =  'SELECT * FROM IOSchedule WHERE exe_flg = 0 '.$MemPhrase;


                     $stmt=$dbh->prepare($sql1);
                     $stmt->execute();
                     while(1){
                           $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                           if($rec==false) break;?>
                           <tr>
                           <th scope="row"><?php print $rec['AUTO_ID'] ?></th><td>
                           <?php print $rec['入出庫日'];?></td><td>
                           <?php print $rec['入力日'] ?></td><td>
                           <?php print $rec['管理番号'];?></td><td>
                           <?php print $rec['依頼番号'];?></th><td>
                           <?php print $rec['品名'];?></td><td>
                           <?php print $rec['数量'];?></td><td>
                           <?php print $rec['担当者'];?></td><td>
                           <?php print $rec['入力者'];?></td><td>
                           <?php print $rec['備考'];?></td><td>
                           <?php print $rec['ステータス'];?></tr>
                           <?php
                           };

                }catch(PDOException $e) {
                            echo '<br><br>NGorSTOPexecution.php:181_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; 
                            echo $e->getMessage();
                                                     };



          } ; 


            $reader->close(); unlink($_FILES['upfile']['name']) ;

  } else {
    echo "ファイルをアップロードできません。";
  } ;
} else {
  echo "ファイルが選択されていません。";
} ;


if(!empty($ok)){
?>
<form class="container" action="index.php" method="post" autocomplete="off" >
  <div class="form-group">
   <button class="regist ml-4" type="submit" >確認</button>
  </div>
</form><?php
 }
?>
