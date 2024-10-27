
    <meta charset="UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">

    <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link" href="/admin" >1.工程設計</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">2.在庫操作</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="true" >3.工程ごと在庫の参照</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/order" >4.受注登録</a>
          </li>
        </ul>
      </div>


      <div class="card-body">
        <h5 class="card-title">在庫を工程ごとに参照できます。</h5>
      </div>
    </div>

    <div class="tab-wrap">
    <?php require_once '/var/www/html/getParameters.php';
    require_once '/var/www/html/DBclasscollect.php';
      use db\DataSource;
      $db = new DataSource();
      include ('/var/www/html/admin/p/all.php') ;


if(!empty($LIST[0])){ ?>
    <input id="TAB-00" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-00"><?php echo $LIST[0];?></label>
    <div class="tab-content"><?php
    $searchprocess = "/".$LIST[0]."/";

    $folderpath = '/var/www/html/TYPE1/'.$LIST[0];
    $file = glob(($folderpath . "/*"));
    $countfile = 0;
    if ($file != false )
      {
    $countfile = count($file);
    }
    $result = glob('/var/www/html/TYPE1/'.$LIST[0].'/*');?>

      <table class="table">
      <thead class="thead-dark">
      <tr>
      <th scope="col">管理番号</th>
      <th scope="col">品名</th>
      <th scope="col">品番</th><?php 
       if($LIST[0] == $TYPE1check[0] || $LIST[0] == $TYPE1check[1] || $LIST[0] == $TYPE1check[2])
       {?><th scope="col">規格1</th><?php 
       }elseif($LIST[0] == $Serialcheck[0] || $LIST[0] == $Serialcheck[1] || $LIST[0] == $Serialcheck[2])
       {?><th scope="col">シリアル</th><?php } ; ?>
      <th scope="col">在庫</th>
      <th scope="col">NG数</th>
      <th scope="col">保留数</th>
      </tr>
      </thead>
      <tbody><?php

     $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
     $user = 'admin';
     $password =$pass;
     $dbh = new PDO($dsn,$user,$password);
     $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     if($LIST[0] == $TYPE1check[0] || $LIST[0] == $TYPE1check[1] || $LIST[0] == $TYPE1check[2])
     { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
    }elseif($LIST[0] == $Serialcheck[0] || $LIST[0] == $Serialcheck[1] || $LIST[0] == $Serialcheck[2])
    { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
    }else
    { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
    }

    try{

      $stmt=$dbh->prepare($sql);
      $stmt->execute();
      while(1){
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          if($rec==false) break;?>
            <tr>
            <th scope="row">
      　　　<?php print $rec['管理番号'];?></td><td>
            <?php print $rec['品名'];?></td><td>
            <?php print $rec['品番'];?></td><td><?php
            if($LIST[0] == $TYPE1check[0] || $LIST[0] == $TYPE1check[1] || $LIST[0] == $TYPE1check[2])
            {?><?php print $rec['規格1'];?></td><td><?php 
           }elseif($LIST[0] == $Serialcheck[0] || $LIST[0] == $Serialcheck[1] || $LIST[0] == $Serialcheck[2])
            {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
            <?php print $rec['SUM(数量)'];?></td><td>
            <?php print $rec['SUM(損品数)'];?></td><td>
            <?php print $rec['SUM(保留数)'];?></tr>
            <?php
             };?></table><?php
      
      
      
            }catch(PDOException $e) {
              echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
              echo $e->getMessage();
                           }; ?>

                                 </tbody></table>
                                 <form method="POST" action="d.php">
                                 <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                                 <div class="form-group">
                                 <label for="HINMEI"> </label><br>
                                 <input type="hidden" name="検索工程" value = "<?php  echo $LIST[0] ;  ?>"  class="form-control"  />
                                 </div>
                                 <input type="submit" value = "検索結果をダウンロード" />
                                 </form>
                                 </div><?php
                             }; 


if(!empty($LIST[1])){ ?>
<input id="TAB-01" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-01"><?php echo $LIST[1];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[1]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[1];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[1].'/*');?>

<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">管理番号</th>
<th scope="col">品名</th>
<th scope="col">品番</th><?php 
if($LIST[1] == $TYPE1check[0] || $LIST[1] == $TYPE1check[1] || $LIST[1] == $TYPE1check[2])
{?><th scope="col">規格1</th><?php 
}elseif($LIST[1] == $Serialcheck[0] || $LIST[1] == $Serialcheck[1] || $LIST[1] == $Serialcheck[2])
{?><th scope="col">シリアル</th><?php } ; ?>
<th scope="col">在庫</th>
<th scope="col">NG数</th>
<th scope="col">保留数</th>
</tr>
</thead>
<tbody><?php

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($LIST[1] == $TYPE1check[0] || $LIST[1] == $TYPE1check[1] || $LIST[1] == $TYPE1check[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[1] == $Serialcheck[0] || $LIST[1] == $Serialcheck[1] || $LIST[1] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
        <tr>
        <th scope="row">
　　　<?php print $rec['管理番号'];?></td><td>
        <?php print $rec['品名'];?></td><td>
        <?php print $rec['品番'];?></td><td><?php
        if($LIST[1] == $TYPE1check[0] || $LIST[1] == $TYPE1check[1] || $LIST[1] == $TYPE1check[2])
        {?><?php print $rec['規格1'];?></td><td><?php 
        }elseif($LIST[1] == $Serialcheck[0] || $LIST[1] == $Serialcheck[1] || $LIST[1] == $Serialcheck[2])
        {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
        <?php print $rec['SUM(数量)'];?></td><td>
        <?php print $rec['SUM(損品数)'];?></td><td>
        <?php print $rec['SUM(保留数)'];?></tr>
        <?php
        };?></table><?php



        }catch(PDOException $e) {
        echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
        echo $e->getMessage();
                        }; ?>

                            </tbody></table>
                            <form method="POST" action="d.php">
                            <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                            <div class="form-group">
                            <label for="HINMEI"> </label><br>
                            <input type="hidden" name="検索工程" value = "<?php  echo $LIST[1] ;  ?>"  class="form-control"  />
                            </div>
                            <input type="submit" value = "検索結果をダウンロード" />
                            </form>
                            </div><?php
                        }; 



if(!empty($LIST[2])){ ?>
    <input id="TAB-02" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-02"><?php echo $LIST[2];?></label>
    <div class="tab-content"><?php
    $searchprocess = "/".$LIST[2]."/";

    $folderpath = '/var/www/html/TYPE1/'.$LIST[2];
    $file = glob(($folderpath . "/*"));
    $countfile = 0;
    if ($file != false )
      {
    $countfile = count($file);
    }
    $result = glob('/var/www/html/TYPE1/'.$LIST[2].'/*');?>

      <table class="table">
      <thead class="thead-dark">
      <tr>
      <th scope="col">管理番号</th>
      <th scope="col">品名</th>
      <th scope="col">品番</th><?php 
       if($LIST[2] == $TYPE1check[0] || $LIST[2] == $TYPE1check[1] || $LIST[2] == $TYPE1check[2])
       {?><th scope="col">規格1</th><?php 
       }elseif($LIST[2] == $Serialcheck[0] || $LIST[2] == $Serialcheck[1] || $LIST[2] == $Serialcheck[2])
       {?><th scope="col">シリアル</th><?php } ; ?>
      <th scope="col">在庫</th>
      <th scope="col">NG数</th>
      <th scope="col">保留数</th>
      </tr>
      </thead>
      <tbody><?php

     $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
     $user = 'admin';
     $password =$pass;
     $dbh = new PDO($dsn,$user,$password);
     $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     if($LIST[2] == $TYPE1check[0] || $LIST[2] == $TYPE1check[1] || $LIST[2] == $TYPE1check[2])
     { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
    }elseif($LIST[2] == $Serialcheck[0] || $LIST[2] == $Serialcheck[1] || $LIST[2] == $Serialcheck[2])
    { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
    }else
    { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
    }

    try{

      $stmt=$dbh->prepare($sql);
      $stmt->execute();
      while(1){
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          if($rec==false) break;?>
            <tr>
            <th scope="row">
      　　　<?php print $rec['管理番号'];?></td><td>
            <?php print $rec['品名'];?></td><td>
            <?php print $rec['品番'];?></td><td><?php
            if($LIST[2] == $TYPE1check[0] || $LIST[2] == $TYPE1check[1] || $LIST[2] == $TYPE1check[2])
            {?><?php print $rec['規格1'];?></td><td><?php 
           }elseif($LIST[2] == $Serialcheck[0] || $LIST[2] == $Serialcheck[1] || $LIST[2] == $Serialcheck[2])
            {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
            <?php print $rec['SUM(数量)'];?></td><td>
            <?php print $rec['SUM(損品数)'];?></td><td>
            <?php print $rec['SUM(保留数)'];?></tr>
            <?php
             };?></table><?php
      
      
      
            }catch(PDOException $e) {
              echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
              echo $e->getMessage();
                           }; ?>

                                 </tbody></table>
                                 <form method="POST" action="d.php">
                                 <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                                 <div class="form-group">
                                 <label for="HINMEI"> </label><br>
                                 <input type="hidden" name="検索工程" value = "<?php  echo $LIST[2] ;  ?>"  class="form-control"  />
                                 </div>
                                 <input type="submit" value = "検索結果をダウンロード" />
                                 </form>
                                 </div><?php
                             }; 


if(!empty($LIST[3])){ ?>
<input id="TAB-03" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-03"><?php echo $LIST[3];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[3]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[3];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[3].'/*');?>

<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">管理番号</th>
<th scope="col">品名</th>
<th scope="col">品番</th><?php 
if($LIST[3] == $TYPE1check[0] || $LIST[3] == $TYPE1check[1] || $LIST[3] == $TYPE1check[2])
{?><th scope="col">規格1</th><?php 
}elseif($LIST[3] == $Serialcheck[0] || $LIST[3] == $Serialcheck[1] || $LIST[3] == $Serialcheck[2])
{?><th scope="col">シリアル</th><?php } ; ?>
<th scope="col">在庫</th>
<th scope="col">NG数</th>
<th scope="col">保留数</th>
</tr>
</thead>
<tbody><?php

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($LIST[3] == $TYPE1check[0] || $LIST[3] == $TYPE1check[1] || $LIST[3] == $TYPE1check[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[3] == $Serialcheck[0] || $LIST[3] == $Serialcheck[1] || $LIST[3] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
        <tr>
        <th scope="row">
　　　<?php print $rec['管理番号'];?></td><td>
        <?php print $rec['品名'];?></td><td>
        <?php print $rec['品番'];?></td><td><?php
        if($LIST[3] == $TYPE1check[0] || $LIST[3] == $TYPE1check[1] || $LIST[3] == $TYPE1check[2])
        {?><?php print $rec['規格1'];?></td><td><?php 
        }elseif($LIST[3] == $Serialcheck[0] || $LIST[3] == $Serialcheck[1] || $LIST[3] == $Serialcheck[2])
        {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
        <?php print $rec['SUM(数量)'];?></td><td>
        <?php print $rec['SUM(損品数)'];?></td><td>
        <?php print $rec['SUM(保留数)'];?></tr>
        <?php
        };?></table><?php



        }catch(PDOException $e) {
        echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
        echo $e->getMessage();
                        }; ?>

                            </tbody></table>
                            <form method="POST" action="d.php">
                            <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                            <div class="form-group">
                            <label for="HINMEI"> </label><br>
                            <input type="hidden" name="検索工程" value = "<?php  echo $LIST[3] ;  ?>"  class="form-control"  />
                            </div>
                            <input type="submit" value = "検索結果をダウンロード" />
                            </form>
                            </div><?php
                        }; 


if(!empty($LIST[4])){ ?>
<input id="TAB-04" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-04"><?php echo $LIST[4];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[4]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[4];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[4].'/*');?>

    <table class="table">
    <thead class="thead-dark">
    <tr>
    <th scope="col">管理番号</th>
    <th scope="col">品名</th>
    <th scope="col">品番</th><?php 
    if($LIST[4] == $TYPE1check[0] || $LIST[4] == $TYPE1check[1] || $LIST[4] == $TYPE1check[2])
    {?><th scope="col">規格1</th><?php 
    }elseif($LIST[4] == $Serialcheck[0] || $LIST[4] == $Serialcheck[1] || $LIST[4] == $Serialcheck[2])
    {?><th scope="col">シリアル</th><?php } ; ?>
    <th scope="col">在庫</th>
    <th scope="col">NG数</th>
    <th scope="col">保留数</th>
    </tr>
</thead>
    <tbody><?php

    $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
    $user = 'admin';
    $password =$pass;
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if($LIST[4] == $TYPE1check[0] || $LIST[4] == $TYPE1check[1] || $LIST[4] == $TYPE1check[2])
    { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[4] == $Serialcheck[0] || $LIST[4] == $Serialcheck[1] || $LIST[4] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    while(1){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false) break;?>
        <tr>
        <th scope="row">
    　　　<?php print $rec['管理番号'];?></td><td>
        <?php print $rec['品名'];?></td><td>
        <?php print $rec['品番'];?></td><td><?php
        if($LIST[4] == $TYPE1check[0] || $LIST[4] == $TYPE1check[1] || $LIST[4] == $TYPE1check[2])
        {?><?php print $rec['規格1'];?></td><td><?php 
        }elseif($LIST[4] == $Serialcheck[0] || $LIST[4] == $Serialcheck[1] || $LIST[4] == $Serialcheck[2])
        {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
        <?php print $rec['SUM(数量)'];?></td><td>
        <?php print $rec['SUM(損品数)'];?></td><td>
        <?php print $rec['SUM(保留数)'];?></tr>
        <?php
            };?></table><?php
    
    
    
        }catch(PDOException $e) {
            echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
            echo $e->getMessage();
                        }; ?>

                                </tbody></table>
                                <form method="POST" action="d.php">
                                <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                                <div class="form-group">
                                <label for="HINMEI"> </label><br>
                                <input type="hidden" name="検索工程" value = "<?php  echo $LIST[4] ;  ?>"  class="form-control"  />
                                </div>
                                <input type="submit" value = "検索結果をダウンロード" />
                                </form>
                                </div><?php
                            }; 

                                                    
if(!empty($LIST[5])){ ?>
<input id="TAB-05" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-05"><?php echo $LIST[5];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[5]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[5];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[5].'/*');?>

    <table class="table">
    <thead class="thead-dark">
    <tr>
    <th scope="col">管理番号</th>
    <th scope="col">品名</th>
    <th scope="col">品番</th><?php 
if($LIST[5] == $TYPE1check[0] || $LIST[5] == $TYPE1check[1] || $LIST[5] == $TYPE1check[2])
{?><th scope="col">規格1</th><?php 
}elseif($LIST[5] == $Serialcheck[0] || $LIST[5] == $Serialcheck[1] || $LIST[5] == $Serialcheck[2])
{?><th scope="col">シリアル</th><?php } ; ?>
    <th scope="col">在庫</th>
    <th scope="col">NG数</th>
    <th scope="col">保留数</th>
    </tr>
</thead>
    <tbody><?php

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($LIST[5] == $TYPE1check[0] || $LIST[5] == $TYPE1check[1] || $LIST[5] == $TYPE1check[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[5] == $Serialcheck[0] || $LIST[5] == $Serialcheck[1] || $LIST[5] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    while(1){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false) break;?>
        <tr>
        <th scope="row">
    　　　<?php print $rec['管理番号'];?></td><td>
        <?php print $rec['品名'];?></td><td>
        <?php print $rec['品番'];?></td><td><?php
        if($LIST[5] == $TYPE1check[0] || $LIST[5] == $TYPE1check[1] || $LIST[5] == $TYPE1check[2])
        {?><?php print $rec['規格1'];?></td><td><?php 
        }elseif($LIST[5] == $Serialcheck[0] || $LIST[5] == $Serialcheck[1] || $LIST[5] == $Serialcheck[2])
        {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
        <?php print $rec['SUM(数量)'];?></td><td>
        <?php print $rec['SUM(損品数)'];?></td><td>
        <?php print $rec['SUM(保留数)'];?></tr>
        <?php
        };?></table><?php
    
    
    
        }catch(PDOException $e) {
            echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
            echo $e->getMessage();
                        }; ?>

                            </tbody></table>
                            <form method="POST" action="d.php">
                            <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                            <div class="form-group">
                            <label for="HINMEI"> </label><br>
                            <input type="hidden" name="検索工程" value = "<?php  echo $LIST[5] ;  ?>"  class="form-control"  />
                            </div>
                            <input type="submit" value = "検索結果をダウンロード" />
                            </form>
                            </div><?php
                        }; 



if(!empty($LIST[6])){ ?>
<input id="TAB-06" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-06"><?php echo $LIST[6];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[6]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[6];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[6].'/*');?>

    <table class="table">
    <thead class="thead-dark">
    <tr>
    <th scope="col">管理番号</th>
    <th scope="col">品名</th>
    <th scope="col">品番</th><?php 
if($LIST[6] == $TYPE1check[0] || $LIST[6] == $TYPE1check[1] || $LIST[6] == $TYPE1check[2])
{?><th scope="col">規格1</th><?php 
}elseif($LIST[6] == $Serialcheck[0] || $LIST[6] == $Serialcheck[1] || $LIST[6] == $Serialcheck[2])
{?><th scope="col">シリアル</th><?php } ; ?>
    <th scope="col">在庫</th>
    <th scope="col">NG数</th>
    <th scope="col">保留数</th>
    </tr>
</thead>
    <tbody><?php

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($LIST[6] == $TYPE1check[0] || $LIST[6] == $TYPE1check[1] || $LIST[6] == $TYPE1check[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[6] == $Serialcheck[0] || $LIST[6] == $Serialcheck[1] || $LIST[6] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    while(1){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false) break;?>
        <tr>
        <th scope="row">
    　　　<?php print $rec['管理番号'];?></td><td>
        <?php print $rec['品名'];?></td><td>
        <?php print $rec['品番'];?></td><td><?php
        if($LIST[6] == $TYPE1check[0] || $LIST[6] == $TYPE1check[1] || $LIST[6] == $TYPE1check[2])
        {?><?php print $rec['規格1'];?></td><td><?php 
        }elseif($LIST[6] == $Serialcheck[0] || $LIST[6] == $Serialcheck[1] || $LIST[6] == $Serialcheck[2])
        {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
        <?php print $rec['SUM(数量)'];?></td><td>
        <?php print $rec['SUM(損品数)'];?></td><td>
        <?php print $rec['SUM(保留数)'];?></tr>
        <?php
        };?></table><?php
    
    
    
        }catch(PDOException $e) {
            echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
            echo $e->getMessage();
                        }; ?>

                            </tbody></table>
                            <form method="POST" action="d.php">
                            <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                            <div class="form-group">
                            <label for="HINMEI"> </label><br>
                            <input type="hidden" name="検索工程" value = "<?php  echo $LIST[6] ;  ?>"  class="form-control"  />
                            </div>
                            <input type="submit" value = "検索結果をダウンロード" />
                            </form>
                            </div><?php
                        }; 

                        


if(!empty($LIST[7])){ ?>
<input id="TAB-07" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-07"><?php echo $LIST[7];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[7]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[7];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[7].'/*');?>

    <table class="table">
    <thead class="thead-dark">
    <tr>
    <th scope="col">管理番号</th>
    <th scope="col">品名</th>
    <th scope="col">品番</th><?php 
if($LIST[7] == $TYPE1check[0] || $LIST[7] == $TYPE1check[1] || $LIST[7] == $TYPE1check[2])
{?><th scope="col">規格1</th><?php 
}elseif($LIST[7] == $Serialcheck[0] || $LIST[7] == $Serialcheck[1] || $LIST[7] == $Serialcheck[2])
{?><th scope="col">シリアル</th><?php } ; ?>
    <th scope="col">在庫</th>
    <th scope="col">NG数</th>
    <th scope="col">保留数</th>
    </tr>
</thead>
    <tbody><?php

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($LIST[7] == $TYPE1check[0] || $LIST[7] == $TYPE1check[1] || $LIST[7] == $TYPE1check[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[7] == $Serialcheck[0] || $LIST[7] == $Serialcheck[1] || $LIST[7] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    while(1){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false) break;?>
        <tr>
        <th scope="row">
    　　　<?php print $rec['管理番号'];?></td><td>
        <?php print $rec['品名'];?></td><td>
        <?php print $rec['品番'];?></td><td><?php
        if($LIST[7] == $TYPE1check[0] || $LIST[7] == $TYPE1check[1] || $LIST[7] == $TYPE1check[2])
        {?><?php print $rec['規格1'];?></td><td><?php 
        }elseif($LIST[7] == $Serialcheck[0] || $LIST[7] == $Serialcheck[1] || $LIST[7] == $Serialcheck[2])
        {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
        <?php print $rec['SUM(数量)'];?></td><td>
        <?php print $rec['SUM(損品数)'];?></td><td>
        <?php print $rec['SUM(保留数)'];?></tr>
        <?php
        };?></table><?php
    
    
    
        }catch(PDOException $e) {
            echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
            echo $e->getMessage();
                        }; ?>

                            </tbody></table>
                            <form method="POST" action="d.php">
                            <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                            <div class="form-group">
                            <label for="HINMEI"> </label><br>
                            <input type="hidden" name="検索工程" value = "<?php  echo $LIST[7] ;  ?>"  class="form-control"  />
                            </div>
                            <input type="submit" value = "検索結果をダウンロード" />
                            </form>
                            </div><?php
                        }; 




if(!empty($LIST[8])){ ?>
<input id="TAB-08" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-08"><?php echo $LIST[8];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[8]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[8];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[8].'/*');?>

<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">管理番号</th>
<th scope="col">品名</th>
<th scope="col">品番</th><?php 
if($LIST[8] == $TYPE1check[0] || $LIST[8] == $TYPE1check[1] || $LIST[8] == $TYPE1check[2])
{?><th scope="col">規格1</th><?php 
}elseif($LIST[8] == $Serialcheck[0] || $LIST[8] == $Serialcheck[1] || $LIST[8] == $Serialcheck[2])
{?><th scope="col">シリアル</th><?php } ; ?>
<th scope="col">在庫</th>
<th scope="col">NG数</th>
<th scope="col">保留数</th>
</tr>
</thead>
<tbody><?php

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($LIST[8] == $TYPE1check[0] || $LIST[8] == $TYPE1check[1] || $LIST[8] == $TYPE1check[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[8] == $Serialcheck[0] || $LIST[8] == $Serialcheck[1] || $LIST[8] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
    <tr>
    <th scope="row">
　　　<?php print $rec['管理番号'];?></td><td>
    <?php print $rec['品名'];?></td><td>
    <?php print $rec['品番'];?></td><td><?php
    if($LIST[8] == $TYPE1check[0] || $LIST[8] == $TYPE1check[1] || $LIST[8] == $TYPE1check[2])
    {?><?php print $rec['規格1'];?></td><td><?php 
    }elseif($LIST[8] == $Serialcheck[0] || $LIST[8] == $Serialcheck[1] || $LIST[8] == $Serialcheck[2])
    {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
    <?php print $rec['SUM(数量)'];?></td><td>
    <?php print $rec['SUM(損品数)'];?></td><td>
    <?php print $rec['SUM(保留数)'];?></tr>
    <?php
    };?></table><?php



    }catch(PDOException $e) {
        echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
        echo $e->getMessage();
                    }; ?>

                        </tbody></table>
                        <form method="POST" action="d.php">
                        <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                        <div class="form-group">
                        <label for="HINMEI"> </label><br>
                        <input type="hidden" name="検索工程" value = "<?php  echo $LIST[8] ;  ?>"  class="form-control"  />
                        </div>
                        <input type="submit" value = "検索結果をダウンロード" />
                        </form>
                        </div><?php
                    }; 







if(!empty($LIST[9])){ ?>
<input id="TAB-09" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-09"><?php echo $LIST[9];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[9]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[9];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[9].'/*');?>

<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">管理番号</th>
<th scope="col">品名</th>
<th scope="col">品番</th><?php 
if($LIST[9] == $TYPE1check[0] || $LIST[9] == $TYPE1check[1] || $LIST[9] == $TYPE1check[2])
{?><th scope="col">規格1</th><?php 
}elseif($LIST[9] == $Serialcheck[0] || $LIST[9] == $Serialcheck[1] || $LIST[9] == $Serialcheck[2])
{?><th scope="col">シリアル</th><?php } ; ?>
<th scope="col">在庫</th>
<th scope="col">NG数</th>
<th scope="col">保留数</th>
</tr>
</thead>
<tbody><?php

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($LIST[9] == $TYPE1check[0] || $LIST[9] == $TYPE1check[1] || $LIST[9] == $TYPE1check[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[9] == $Serialcheck[0] || $LIST[9] == $Serialcheck[1] || $LIST[9] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
    <tr>
    <th scope="row">
　　　<?php print $rec['管理番号'];?></td><td>
    <?php print $rec['品名'];?></td><td>
    <?php print $rec['品番'];?></td><td><?php
    if($LIST[9] == $TYPE1check[0] || $LIST[9] == $TYPE1check[1] || $LIST[9] == $TYPE1check[2])
    {?><?php print $rec['規格1'];?></td><td><?php 
    }elseif($LIST[9] == $Serialcheck[0] || $LIST[9] == $Serialcheck[1] || $LIST[9] == $Serialcheck[2])
    {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
    <?php print $rec['SUM(数量)'];?></td><td>
    <?php print $rec['SUM(損品数)'];?></td><td>
    <?php print $rec['SUM(保留数)'];?></tr>
    <?php
    };?></table><?php



    }catch(PDOException $e) {
        echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
        echo $e->getMessage();
                    }; ?>

                        </tbody></table>
                        <form method="POST" action="d.php">
                        <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                        <div class="form-group">
                        <label for="HINMEI"> </label><br>
                        <input type="hidden" name="検索工程" value = "<?php  echo $LIST[9] ;  ?>"  class="form-control"  />
                        </div>
                        <input type="submit" value = "検索結果をダウンロード" />
                        </form>
                        </div><?php
                    }; 






if(!empty($LIST[10])){ ?>
    <input id="TAB-10" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-10"><?php echo $LIST[10];?></label>
    <div class="tab-content"><?php
    $searchprocess = "/".$LIST[10]."/";
    
    $folderpath = '/var/www/html/TYPE1/'.$LIST[10];
    $file = glob(($folderpath . "/*"));
    $countfile = 0;
    if ($file != false )
    {
    $countfile = count($file);
    }
    $result = glob('/var/www/html/TYPE1/'.$LIST[10].'/*');?>
    
    <table class="table">
    <thead class="thead-dark">
    <tr>
    <th scope="col">管理番号</th>
    <th scope="col">品名</th>
    <th scope="col">品番</th><?php 
    if($LIST[10] == $TYPE1check[0] || $LIST[10] == $TYPE1check[1] || $LIST[10] == $TYPE1check[2])
    {?><th scope="col">規格1</th><?php 
    }elseif($LIST[10] == $Serialcheck[0] || $LIST[10] == $Serialcheck[1] || $LIST[10] == $Serialcheck[2])
    {?><th scope="col">シリアル</th><?php } ; ?>
    <th scope="col">在庫</th>
    <th scope="col">NG数</th>
    <th scope="col">保留数</th>
    </tr>
    </thead>
    <tbody><?php
    
    $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
    $user = 'admin';
    $password =$pass;
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if($LIST[10] == $TYPE1check[0] || $LIST[10] == $TYPE1check[1] || $LIST[10] == $TYPE1check[2])
    { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
    }elseif($LIST[10] == $Serialcheck[0] || $LIST[10] == $Serialcheck[1] || $LIST[10] == $Serialcheck[2])
    { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
    }else
    { $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
    }
    
    try{
    
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    while(1){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false) break;?>
        <tr>
        <th scope="row">
    　　　<?php print $rec['管理番号'];?></td><td>
        <?php print $rec['品名'];?></td><td>
        <?php print $rec['品番'];?></td><td><?php
        if($LIST[10] == $TYPE1check[0] || $LIST[10] == $TYPE1check[1] || $LIST[10] == $TYPE1check[2])
        {?><?php print $rec['規格1'];?></td><td><?php 
        }elseif($LIST[10] == $Serialcheck[0] || $LIST[10] == $Serialcheck[1] || $LIST[10] == $Serialcheck[2])
        {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
        <?php print $rec['SUM(数量)'];?></td><td>
        <?php print $rec['SUM(損品数)'];?></td><td>
        <?php print $rec['SUM(保留数)'];?></tr>
        <?php
        };?></table><?php
    
    
    
        }catch(PDOException $e) {
            echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
            echo $e->getMessage();
                        }; ?>
    
                            </tbody></table>
                            <form method="POST" action="d.php">
                            <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                            <div class="form-group">
                            <label for="HINMEI"> </label><br>
                            <input type="hidden" name="検索工程" value = "<?php  echo $LIST[10] ;  ?>"  class="form-control"  />
                            </div>
                            <input type="submit" value = "検索結果をダウンロード" />
                            </form>
                            </div><?php
                        }; 





if(!empty($LIST[11])){ ?>
<input id="TAB-11" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-11"><?php echo $LIST[11];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[11]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[11];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[11].'/*');?>

<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">管理番号</th>
<th scope="col">品名</th>
<th scope="col">品番</th><?php 
if($LIST[11] == $TYPE1check[0] || $LIST[11] == $TYPE1check[1] || $LIST[11] == $TYPE1check[2])
{?><th scope="col">規格1</th><?php 
}elseif($LIST[11] == $Serialcheck[0] || $LIST[11] == $Serialcheck[1] || $LIST[11] == $Serialcheck[2])
{?><th scope="col">シリアル</th><?php } ; ?>
<th scope="col">在庫</th>
<th scope="col">NG数</th>
<th scope="col">保留数</th>
</tr>
</thead>
<tbody><?php

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($LIST[11] == $TYPE1check[0] || $LIST[11] == $TYPE1check[1] || $LIST[11] == $TYPE1check[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[11] == $Serialcheck[0] || $LIST[11] == $Serialcheck[1] || $LIST[11] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false) break;?>
    <tr>
    <th scope="row">
　　　<?php print $rec['管理番号'];?></td><td>
    <?php print $rec['品名'];?></td><td>
    <?php print $rec['品番'];?></td><td><?php
    if($LIST[11] == $TYPE1check[0] || $LIST[11] == $TYPE1check[1] || $LIST[11] == $TYPE1check[2])
    {?><?php print $rec['規格1'];?></td><td><?php 
    }elseif($LIST[11] == $Serialcheck[0] || $LIST[11] == $Serialcheck[1] || $LIST[11] == $Serialcheck[2])
    {?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
    <?php print $rec['SUM(数量)'];?></td><td>
    <?php print $rec['SUM(損品数)'];?></td><td>
    <?php print $rec['SUM(保留数)'];?></tr>
    <?php
    };?></table><?php



    }catch(PDOException $e) {
        echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
        echo $e->getMessage();
                    }; ?>

                        </tbody></table>
                        <form method="POST" action="d.php">
                        <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                        <div class="form-group">
                        <label for="HINMEI"> </label><br>
                        <input type="hidden" name="検索工程" value = "<?php  echo $LIST[11] ;  ?>"  class="form-control"  />
                        </div>
                        <input type="submit" value = "検索結果をダウンロード" />
                        </form>
                        </div><?php
                    }; 






if(!empty($LIST[12])){ ?>
<input id="TAB-12" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-12"><?php echo $LIST[12];?></label>
<div class="tab-content"><?php
$searchprocess = "/".$LIST[12]."/";

$folderpath = '/var/www/html/TYPE1/'.$LIST[12];
$file = glob(($folderpath . "/*"));
$countfile = 0;
if ($file != false )
{
$countfile = count($file);
}
$result = glob('/var/www/html/TYPE1/'.$LIST[12].'/*');?>

<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">管理番号</th>
<th scope="col">品名</th>
<th scope="col">品番</th><?php 
if($LIST[12] == $TYPE1check[0] || $LIST[12] == $TYPE1check[1] || $LIST[12] == $TYPE1check[2])
{?><th scope="col">規格1</th><?php 
}elseif($LIST[12] == $Serialcheck[0] || $LIST[12] == $Serialcheck[1] || $LIST[12] == $Serialcheck[2])
{?><th scope="col">シリアル</th><?php } ; ?>
<th scope="col">在庫</th>
<th scope="col">NG数</th>
<th scope="col">保留数</th>
</tr>
</thead>
<tbody><?php

$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($LIST[12] == $TYPE1check[0] || $LIST[12] == $TYPE1check[1] || $LIST[12] == $TYPE1check[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号,規格1 asc";
}elseif($LIST[12] == $Serialcheck[0] || $LIST[12] == $Serialcheck[1] || $LIST[12] == $Serialcheck[2])
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by シリアル工程 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}else
{ $sql = "SELECT 管理番号,品名,品番,シリアル,規格1,SUM(数量),SUM(損品数),SUM(保留数) from (select 管理番号,品名,品番,シリアル工程,数量,シリアル,規格1,損品数,保留数 from process_progress where exe_flg in (0,2) and 受工程 = '{$searchprocess}') as hoge group by 管理番号 having SUM(数量) != 0 or SUM(保留数) != 0 or SUM(損品数) != 0 order by 品名,品番,管理番号 asc";
}

try{

$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
if($rec==false) break;?>
<tr>
<th scope="row">
　　　<?php print $rec['管理番号'];?></td><td>
<?php print $rec['品名'];?></td><td>
<?php print $rec['品番'];?></td><td><?php
if($LIST[12] == $TYPE1check[0] || $LIST[12] == $TYPE1check[1] || $LIST[12] == $TYPE1check[2])
{?><?php print $rec['規格1'];?></td><td><?php 
}elseif($LIST[12] == $Serialcheck[0] || $LIST[12] == $Serialcheck[1] || $LIST[12] == $Serialcheck[2])
{?><?php print $rec['シリアル'];?></td><td><?php } ; ?>
<?php print $rec['SUM(数量)'];?></td><td>
<?php print $rec['SUM(損品数)'];?></td><td>
<?php print $rec['SUM(保留数)'];?></tr>
<?php
};?></table><?php



}catch(PDOException $e) {
echo '<br><br>index.php_49:処理に失敗しました。<br><br>';
echo $e->getMessage();
            }; ?>

                </tbody></table>
                <form method="POST" action="d.php">
                <input type="hidden" name="file" value="./dbdataeachprocess.xlsx" />
                <div class="form-group">
                <label for="HINMEI"> </label><br>
                <input type="hidden" name="検索工程" value = "<?php  echo $LIST[12] ;  ?>"  class="form-control"  />
                </div>
                <input type="submit" value = "検索結果をダウンロード" />
                </form>
                </div><?php
            }; ?>


<input id="TAB-13" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-13"><?php echo '受注一覧';?></label>
<div class="tab-content">
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
      <th scope="col">ステータス</th>
      <th scope="col">更新者</th>
      <th scope="col">更新日</th>
      </tr>
      </thead>
<?php
/* https://note.com/rik114/n/n6437200d7a89 */

try{


/* https://sukimanosukima.com/2021/07/23/php-17/ */
$dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
$user = 'admin';
$password =$pass;
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql =  'SELECT * FROM IOSchedule WHERE exe_flg = 0 order by ステータス,入出庫日 asc';
echo $sql;



$stmt=$dbh->prepare($sql);
$stmt->execute();
while(1){
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rec==false) break;?>
                      <tbody><?php
                      if($rec['ステータス'] == "0_予定"){?><tr class ="table-warning"><?php }
                      elseif($rec['ステータス'] == "1_調整中"){?><tr class ="table-info"><?php } ?>
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
                         <td> <?php print $rec['更新者'];?></td>
                         <td> <?php print $rec['更新日'];?></td>
                        </tr>
                      </tbody>
  <?php ; } ?>
</table></div>

<?php



}catch(PDOException $e) {
  echo '<br><br>searchform101.php:105〜115_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
  };




?>
</div>
                        
                                                
                        
                        

















