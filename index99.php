 
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

  <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link" href="./admin">1.工程設計</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="true" >2.在庫操作</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./process">3.工程ごと在庫の参照</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./order" >4.受注登録</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">「1.工程設計」の登録内容をもとに、製品ごと登録した工程間の移動をレコードとして入力します。併せて入力済みレコードの検索、削除も可能です。</h5>
        <p class="card-text text-primary">ページ最下部の「一括入力フォーム」よりダウンロードしたExcelファイルに登録内容をまとめて記入し、アップロードすることで、一括入力が可能です。</p>
        <p class="card-text text-danger">「1.工程設計」での工程の登録が未実施でしたら、先に登録をお願いします。</p>
        <a href="#" class="btn btn-primary">1.工程設計</a>
      </div>
    </div>

  <?php require_once 'getParameters.php';
  require_once 'DBclasscollect.php';
use db\DataSource;
$db = new DataSource();?>
  <?php if(isset($_POST['CANCEL'])){unset($_POST['CANCEL']);};?>
   <div class="tab-wrap">

     <input id="TAB-02" type="radio" name="TAB" class="tab-switch"  /><label class="tab-label" for="TAB-02">社内在庫移動</label>
     <div class="tab-content">
        <?php if(file_exists('admin/p/all.php')){ include 'admin/p/all.php';
          $FORMLIST = array($LIST[0],$LIST[1],$LIST[2],$LIST[3],$LIST[4],$LIST[5],$LIST[6],$LIST[7],$LIST[8],$LIST[9],$LIST[10],$LIST[11],$LIST[12]);
          include('inputform.php');
          }else{echo "工程登録がされていません。";};
          ?>
<h2 class="bg-primary">一括入力フォーム</h2>
<form method="POST" action="download_sample.php">
<input type="hidden" name="file" value="./format/inputdata.xlsx" />
<input type="submit" value="在庫移動一括入力フォーム(inputdata.xlsx)"/>
</form>
<form method="POST" action="download_sample.php">
<input type="hidden" name="file" value="./format/inputNGdata.xlsx" />
<input type="submit" value="NG一括入力フォーム(inputNGdata.xlsx)"/>
</form>
<form method="POST" action="download_sample.php">
<input type="hidden" name="file" value="./format/Stockdata.xlsx" />
<input type="submit" value="入出庫予測一括入力フォーム(Stockdata.xlsx)"/>
</form>
     </div>



    <input id="TAB-03" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-03">在庫検索</label>
    <div class="tab-content">

      <h2 class="bg-primary">全在庫検索</h2>
      <form action="index.php" method="POST" class="form-group">
        <p>以下の入力欄に検索したい品名・品番を入力して下さい。</p>
        <div class="form-group">
          <label for="HINMEI">品名 </label><br>
          <input id="PName208032" type="text" name="EPName" value = "<?php if(!empty($_POST['EPName'])){ echo ($_POST['EPName']) ; }; ?>" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="HINMEI">品番 </label><br>
          <input id="PName208032" type="text" name="EPNum" value = "<?php if(!empty($_POST['EPNum'])){ echo ($_POST['EPNum']) ; }; ?>"   class="form-control" />
        </div>
        <div class="form-group">
          <button class="regist" type="submit" class="btn btn-primary shadow-sm"> 検索</button>
        </div>
      </form>
      <?php  include ('stocktableelement.php'); ?>

    </div>



    <input id="TAB-04" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-04">オーダー検索</label>
    <div class="tab-content">

    <?php include('searchform101.php');?>
    <?php
    if(isset($_POST['CANCEL'])){unset($_POST['CANCEL']);};
    ?>
    </div>

    <input id="TAB-05" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-05">入力検索</label>
    <div class="tab-content">

<?php /**/
 include('NGorSTOPexecution.php') ;
/**/ ?>

               <form class="container" method="POST" action="b.php">
               <input type="hidden" name="file" value="./dbdata.xlsx" />
               <input type="submit" class="btn btn-outline-secondary" value = "データベースの全データをダウンロード" />
               </form>

　<span class="d-block p-2 bg-dark text-white">レコード削除</span><br>
   <form class="container" action="index.php" method="post">
     <div class="form-group">
      <label for="HINMEI">レコードID </label><br>
      <input  type="text" name="record-id" class="form-control" />
     </div>
     <div class="form-group">
      <label for="HINMEI"> </label><br>
      <input type="hidden" name="hidden-parameter3-2" value=32 class="form-control"  />
      </div>
     <button class="regist" type="submit"> 削除</button><br><br>
   </form>
　<span class="d-block p-2 bg-dark text-white">保留品復活</span><br>
   <form class="container" action="index.php" method="post">
     <div class="form-group">
      <label for="HINMEI">保留レコードID </label><br>
      <input  type="text" name="record-id2" class="form-control" required/>
     </div>
     <div class="form-group">
      <label for="IDate">入力日</label><br><?php $Time = date("Y-m-d")."T".date("H:i:s");?>
      <input type="datetime-local" id="IDate" name="入力日" class="form-control" value="<?php echo $Time;?>" required/>
     </div>
     <div class="form-group">
      <label for="HINMEI">改善ポイント </label><br>
      <input  type="text" name="OKReason" class="form-control" required/>
     </div>
     <div class="form-group">
      <label for="SUURYOU">入力者 </label><br>
      <input  type="text" name="Member"  class="form-control"  required/>
     </div>
     <div class="form-group">
      <label for="HINMEI"> </label><br>
      <input type="hidden" name="hidden-parameter3-3" value=33 class="form-control"  />
      </div>
     <button class="regist" type="submit"> 復活</button><br><br>
   </form>
<h2 class="bg-info">入力検索</h2>
  <h4 class="bg-primary">全項目検索<h4>
   <form class="container" action="searchform.php" method="post">
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
   <form class="container" action="searchform.php" method="post">
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
      <div class="form-group">
      <label for="HINMEI"> </label><br>
      <input type="hidden" name="hidden-parameter3" value=3 class="form-control"  />
      </div>
      <button class="regist" type="submit"> 検索</button>
   </form>
     </div>
  </body>
</html>
