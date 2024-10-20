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
<h2 class="bg-info">入力検索</h2>
  <h4 class="bg-primary">全項目検索<h4>
   <form class="container" action="index4.php" method="post">
     <div class="form-group">
      <label for="SUURYOU">検索ワード </label><br>
      <input  type="text" name="SearchWord" value = "<?php if(!empty($_POST['SearchWord'])){ echo ($_POST['SearchWord']);} ?>" class="form-control"  />
     </div>
     <div class="form-group">
      <label for="HINMEI"> </label><br>
      <input type="hidden" name="hidden-parameter3" value=3 class="form-control"  />
      </div>
      <button class="regist" type="submit"> 検索</button>
   </form>

<h4 class="bg-primary">絞り込み検索<h4>
   <form class="container" action="index4.php" method="post">
   <div class="form-group">
      <label for="SUURYOU">入出庫日 </label><br>
      <input  type="text" name="SDate" value = "<?php if(!empty($_POST['SDate'])){ echo ($_POST['SDate']);} ?>" class="form-control" placeholder="yyyy-mm-dd" />
     </div>
     <div class="form-group">
      <label for="SUURYOU">管理番号 </label><br>
      <input  type="text" name="AdNum" value = "<?php if(!empty($_POST['AdNum'])){ echo ($_POST['AdNum']);} ?>" class="form-control"  />
     </div>
     <div class="form-group">
      <label for="HINMEI">品名 </label><br>
      <input  type="text" name="SPName" value = "<?php if(!empty($_POST['SPName'])){ echo ($_POST['SPName']);} ?>"   class="form-control" />
     </div>
     <div class="form-group">
      <label for="HINBAN">品番 </label><br>
      <input  type="text" name="SPNum" value = "<?php if(!empty($_POST['SPNum'])){ echo ($_POST['SPNum']);} ?>"  class="form-control" />
     </div>
     <div class="form-group">
      <label for="SUURYOU">シリアル </label><br>
      <input  type="text" name="SrSerial" value = "<?php if(!empty($_POST['SrSerial'])){ echo ($_POST['SrSerial']);} ?>" class="form-control"  />
     </div>
     <div class="form-group">
      <label for="SUURYOU">工程 </label><br>
      <input id="PAmount208032" type="text" name="STProc" value = "<?php if(!empty($_POST['STProc'])){ echo ($_POST['STProc']);} ?>"   class="form-control"  />
     </div>
     <div class="form-group">
      <label for="SUURYOU">規格1 </label><br>
      <input  type="text" name="TYPE1" value = "<?php if(!empty($_POST['TYPE1'])){ echo ($_POST['TYPE1']);} ?>"   class="form-control"  />
     </div>
     <div class="form-group">
      <label for="SUURYOU">規格2 </label><br>
      <input id="PAmount208032" type="text" name="TYPE2" value = "<?php if(!empty($_POST['TYPE2'])){ echo ($_POST['TYPE2']);} ?>"   class="form-control"  />
     </div>
     <div class="form-group">
      <label for="SUURYOU">入力者 </label><br>
      <input  type="text" name="SMember" value = "<?php if(!empty($_POST['SMember'])){ echo ($_POST['SMember']);} ?>"   class="form-control"  />
     </div>
      <div class="form-group">
      <label for="HINMEI">備考 </label><br>
      <input type="text" name="SNotice" value="<?php if(!empty($_POST['SNotice'])){ echo ($_POST['SNotice']);} ?>" class="form-control"  />
      </div>
      <button class="regist" type="submit"> 検索</button>
   </form>
   </div>
<form class="container" action="index4.php" method="post" autocomplete="off" >
  <div class="form-group">
   <button class="btn btn-secondary" type="submit" >フォームに戻る</button>
  </div>
</form>
<div class="table-responsive">
<table class="table bg-success text-nowrap">
      <thead>
      <tr>
      <th scope="col">入出庫日</th>
      <th scope="col">レコードID</th>
      <th scope="col">管理番号</th>
      <th scope="col">品名</th>
      <th scope="col">型番</th>
      <th scope="col">シリアル</th>
      <th scope="col">発工程</th>
      <th scope="col">受工程</th>
      <th scope="col">数量</th>
      <th scope="col">損品数</th>
      <th scope="col">保留数</th>
      <th scope="col">規格1</th>
      <th scope="col">規格2</th>
      <th scope="col">備考</th>
      <th scope="col">入力者</th>
      </tr>
      </thead>
      <tbody>
    　<tr>
<?php
/* https://note.com/rik114/n/n6437200d7a89 */

/* https://sukimanosukima.com/2021/07/23/php-17/ */
require_once 'getParameters.php';


$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if(empty($_POST['SearchWord'])){$SearchWord = "" ;
 if(empty($_POST['SDate'])){$DaPhrase = "" ;}else{$SDate = '%'.($_POST['SDate']).'%'; $DaPhrase ="and 入出庫日 LIKE '$SDate' "; };
 if(empty($_POST['SPName'])){$NaPhrase = "" ;}else{$SPName = '%'.($_POST['SPName']).'%'; $NaPhrase ="and 品名 LIKE '$SPName' "; };
 if(empty($_POST['SPNum'])){$NuPhrase = "" ;}else{$SPNum = '%'.($_POST['SPNum']).'%'; $NuPhrase ="and 品番 LIKE '$SPNum' ";}; 
 if(empty($_POST['AdNum'])){$AdPhrase = "" ;}else{$AdNum = '%'.($_POST['AdNum']).'%'; $AdPhrase ="and 管理番号 LIKE '$AdNum' ";};
 if(empty($_POST['SrSerial'])){$SrPhrase = "" ;}else{$SrSerial = '%'.($_POST['SrSerial']).'%'; $SrPhrase ="and シリアル LIKE '$SrSerial' ";};
 if(empty($_POST['STProc'])){$ToPhrase = "" ;}else{$STProc = '%'.($_POST['STProc']).'%'; $ToPhrase ="and 工程キー LIKE '$STProc' ";};
 if(empty($_POST['SMember'])){$SMPhrase = "" ;}else{$SMember = '%'.($_POST['SMember']).'%'; $SMPhrase ="and 入力者 LIKE '$SMember' ";};
 if(empty($_POST['TYPE1'])){$Ty1Phrase = "" ;}else{$Type1 = '%'.($_POST['TYPE1']).'%'; $Ty1Phrase ="and 規格1 LIKE '$Type1' ";};
 if(empty($_POST['TYPE2'])){$Ty2Phrase = "" ;}else{$Type2 = '%'.($_POST['TYPE2']).'%'; $Ty2Phrase ="and 規格2 LIKE '$Type2' ";};
 if(empty($_POST['SNotice'])){$NotePhrase = "" ;}else{$SNotice = '%'.($_POST['SNotice']).'%'; $NotePhrase ="and 備考 LIKE '$SNotice' ";};
 $sql =  'SELECT * FROM process_progress WHERE exe_flg = 0 '.$DaPhrase.$NaPhrase.$NuPhrase.$AdPhrase.$SrPhrase.$ToPhrase.$SMPhrase.$Ty1Phrase.$Ty2Phrase.$NotePhrase.'order by AUTO_ID desc';

 try{

$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
      <tr>
      <th scope="row"><?php print $rec['入出庫日'] ?></th><td>
　　　<?php print $rec['AUTO_ID'];?></td><td>
　　　<?php print $rec['管理番号'];?></td><td>
      <?php print $rec['品名'];?></td><td>
      <?php print $rec['品番'];?></td><td>
　　　<?php print $rec['シリアル'];?></td><td>
      <?php print trim($rec['発工程'],'/');?></td><td>
      <?php print trim($rec['受工程'],'/');?></td><td>
      <?php print $rec['数量'];?></td><td>
      <?php print $rec['損品数'];?></td><td>
      <?php print $rec['保留数'];?></td><td>
      <?php print $rec['規格1'];?></td><td>
      <?php print $rec['規格2'];?></td><td>
      <?php print $rec['備考'];?></td><td>
      <?php print $rec['入力者'];?></tr>
      <?php
       };?></table></div><?php



   }catch(PDOException $e) {
  echo '<br><br>searchform.php:133〜150_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; 
                           };

                               }else{
                                    
                                    
                                    $SearchWord = '%'.($_POST['SearchWord']).'%';

try{

/*$sql2 =  'SELECT * FROM process_progress WHERE concat( 入出庫日, 管理番号, 品名, 品番, シリアル, 発工程, 受工程, 規格1, 規格2, 備考, 入力者 ) like '.$SearchWord.'and exe_flg = 0';*/
$sql = "select * from process_progress where exe_flg = 0 and 入出庫日  like '{$SearchWord}' or exe_flg = 0 and 管理番号 like '{$SearchWord}' or exe_flg = 0 and 品名 like '{$SearchWord}' or exe_flg = 0 and 品番 like '{$SearchWord}' or exe_flg = 0 and シリアル like '{$SearchWord}' or exe_flg = 0 and 発工程 like '{$SearchWord}' or exe_flg = 0 and 受工程 like '{$SearchWord}' or exe_flg = 0 and 規格1 like '{$SearchWord}' or exe_flg = 0 and 規格2 like '{$SearchWord}' or exe_flg = 0 and 備考 like '{$SearchWord}' or exe_flg = 0 and 入力者 like '{$SearchWord}' or exe_flg = 0 and 備考 like '{$SearchWord}' order by AUTO_ID desc ";



$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
      <tr>
      <th scope="row"><?php print $rec['入出庫日'] ?></th><td>
　　　<?php print $rec['AUTO_ID'];?></td><td>
　　　<?php print $rec['管理番号'];?></td><td>
      <?php print $rec['品名'];?></td><td>
      <?php print $rec['品番'];?></td><td>
　　　<?php print $rec['シリアル'];?></td><td>
      <?php print $rec['数量'];?></td><td>
      <?php print trim($rec['発工程'],'/');?></td><td>
      <?php print trim($rec['受工程'],'/');?></td><td>
      <?php print $rec['損品数'];?></td><td>
      <?php print $rec['保留数'];?></td><td>
      <?php print $rec['規格1'];?></td><td>
      <?php print $rec['規格2'];?></td><td>
      <?php print $rec['備考'];?></td><td>
      <?php print $rec['入力者'];?></tr>
      <?php
       };?></table><?php



   }catch(PDOException $e) {
  echo '<br><br>searchform.php:170〜190_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; 
                           };

                                                  };
/*echo $sql;
try{
$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
      <tr>
      <th scope="row"><?php print $rec['入出庫日'] ?></th><td>
　　　<?php print $rec['AUTO_ID'];?></td><td>
　　　<?php print $rec['管理番号'];?></td><td>
      <?php print $rec['品名'];?></td><td>
      <?php print $rec['品番'];?></td><td>
　　　<?php print $rec['シリアル'];?></td><td>
      <?php print $rec['数量'];?></td><td>
      <?php print trim($rec['発工程'],'/');?></td><td>
      <?php print trim($rec['受工程'],'/');?></td><td>
      <?php print $rec['損品数'];?></td><td>
      <?php print $rec['保留数'];?></td><td>
      <?php print $rec['規格1'];?></td><td>
      <?php print $rec['規格2'];?></td><td>
      <?php print $rec['備考'];?></td><td>
      <?php print $rec['入力者'];?></tr>
      <?php
        };?></table><?php
   }catch(PDOException $e) {echo '<br><br>該当するレコードが見つかりません。<br><br>';};
                                                      };?>*/
