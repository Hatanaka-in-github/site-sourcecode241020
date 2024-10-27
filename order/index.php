 
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
  </head>
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
            <a class="nav-link" href="/process" >3.工程ごと在庫の参照</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="true" >4.受注登録</a>
          </li>
        </ul>
      </div>


      <div class="card-body">
        <h5 class="card-title">取引先からの受注を登録し、在庫の過不足を確認できるようにします。</h5>
      </div>
    </div>
  <body>
  <?php include('NGorSTOPexecution.php') ;
        require_once '/var/www/html/getParameters.php';
        require_once '/var/www/html/DBclasscollect.php';
        use db\DataSource;
        $db = new DataSource();
        if(isset($_POST['CANCEL'])){unset($_POST['CANCEL']);};?>
   <div class="tab-wrap">
    <input id="TAB-07" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-07">受注登録</label>
        <div class="tab-content">
               <h2 class="bg-primary">登録内容入力</h2>
               <form class="container" action="index.php" method="post">
               <div class="row">
                      <div class="col-sm">
                       <label for="IDate">出庫日</label><br>
                       <input type="date" id="IDate" name="入出庫日" class="form-control" required/>
                      </div>
                      <div class="col-sm">
                       <label for="IDate">入力日</label><br><?php $Time = date("Y-m-d")."T".date("H:i:s");?>
                       <input type="datetime-local" id="IDate" name="InputDate" class="form-control" value="<?php echo $Time;?>" required/>
                      </div>
                  </div><br>
               <?php /* https://www.javadrive.jp/mysql/function/index9.html */

                   if(!empty($_POST['hidden-parameter4-2'])){require_once '/var/www/html/DBclasscollect.php';
                          $db = new DataSource();
                          /* https://qiita.com/SOJO/items/bb24e7d09320ea96cfc3 */
                          $str2 = $_POST['入出庫日'];
                          $AdminNum = $_POST['管理番号'];
                          $OrderNum = $_POST['依頼番号'];
                          $InputDate = $_POST['InputDate'];
                      /*  $str2 = str_replace('-', '', $str2); */
                      /*  echo $str2; */
                          $memo2 = $_POST['備考100'];

                  $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
                  $user = 'admin';
                  $password =$pass;
                  $dbh = new PDO($dsn,$user,$password);
                  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
                  $sqla =  "SELECT * FROM IOSchedule  WHERE exe_flg = 0 and 入力日 = '{$InputDate}' and 入力者 = '{$_POST['入力者001']}';";

                                $stmt=$dbh->prepare($sqla);
                                $stmt->execute();
                                while(1){
                                          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                                          if($rec==false) break;?>
                                         <?php if($rec['入力日'] == $InputDate && $rec['入力者'] == $_POST['入力者001']){
                                          try{
                                           $db->QuerySql("UPDATE IOSchedule SET exe_flg = 1 where exe_flg != 1 and 入力日 = '{$InputDate}' and 入力者 = '{$_POST['入力者001']}' ;");
                                          }catch(PDOException $e) {
                                            echo '<br><br>index.php_60:処理に失敗しました。<br><br>';
                                            echo $e->getMessage();
                                            };
                                           
                                         }
                                          }
                  try{
                   $db->QuerySql("insert into IOSchedule
                   (依頼番号,管理番号,入出庫日,入力日,品名,数量,担当者,入力者,備考,ステータス)
                   values ('{$OrderNum}','{$AdminNum}','{$str2}','{$InputDate}','{$_POST['品名100']}','{$_POST['予定数量2']}','{$_POST['担当者001']}','{$_POST['入力者001']}','{$memo2}','{$_POST['OrderStatus']}');");
                  }catch(PDOException $e) {
                    echo '<br><br>index.php_69:処理に失敗しました。<br><br>';
                    echo $e->getMessage();
                    };

                   unset($_POST['hidden-parameter4-2']);
                   ;};?>
                  <div class="form-group">
                   <label for="SUURYOU"> 管理番号 </label>
                   <input id="PAmount208032" type="text"  name="管理番号"  class="form-control"  required/>
                  </div>
                  <div class="form-group">
                    <label for="SUURYOU">依頼番号 </label><br>
                    <input id="PAmount208032" type="text" name="依頼番号" class="form-control"  required/>
                  </div>
                  <div class="form-group">
                    <label for="HINMEI">品名 </label><br>
                    <input id="PName2" type="text" name="品名100" class="form-control"  required/>
                  </div>
                  <div class="form-group">
                    <label for="SUURYOU"></label><br>
                    <input id="PAmount208032" type="hidden" name="予定数量2" value=1 class="form-control"  />
                  </div>
                  <div class="form-group">
                    <label for="HINMEI">担当者 </label><br>
                    <input id="PName2" type="text" name="担当者001" class="form-control"  />
                  </div>
                  <div class="form-group">
                    <label for="HINMEI">入力者 </label><br>
                    <input id="PName2" type="text" name="入力者001" class="form-control" required />
                  </div>
                  <div class="form-group">
                    <label for="HINMEI">備考 </label><br>
                    <input id="PName2" type="text" name="備考100" class="form-control"  />
                  </div>
                  <div class="form-group">
                     <label list="list">ステータス</label>
                        <input class="form-control"  name="OrderStatus" list="keywords2" autocomplete="off" required/>
                        <datalist id="keywords2">
                        <option value="1_調整中">
                        <option value="0_予定">
                        </datalist>
                   </div>
                  <div class="form-group">
                   <label for="HINMEI"> </label><br>
                   <input type="hidden" name="hidden-parameter4-2" value=5 class="form-control"  />
                  </div>
                  <div class="form-group">
                   <button class="regist" type="submit"> 登録する</button>
                  </div>
               </form><?php include('l.php') ; ?>






        </div>

     <input id="TAB-02" type="radio" name="TAB" class="tab-switch"  /><label class="tab-label" for="TAB-02">受注登録検索・削除</label>
     <div class="tab-content">


     <h2 class="bg-info">入力検索</h2>
   <form class="container" action="searchform100.php" method="post">
     <div class="form-group">
      <label for="HINMEI">入出庫日 </label><br>
      <input  type="text" name="IOday" class="form-control" placeholder="yyyy-mm-dd"  />
     </div>
     <div class="form-group">
      <label for="HINMEI">管理番号 </label><br>
      <input  type="text" name="SAdNum" class="form-control" />
     </div>
     <div class="form-group">
      <label for="HINMEI">依頼番号 </label><br>
      <input  type="text" name="SRec" class="form-control" />
     </div>
     <div class="form-group">
      <label for="HINMEI">品名 </label><br>
      <input  type="text" name="SPName2" class="form-control" />
     </div>
     <div class="form-group">
      <label for="SUURYOU">担当者 </label><br>
      <input  type="text" name="SAssign2" class="form-control"  />
     </div>
     <div class="form-group">
      <label for="SUURYOU">入力者 </label><br>
      <input  type="text" name="SMember2" class="form-control"  />
     </div>
     <div class="form-group">
      <label list="list">ステータス</label>
       <input class="form-control"  name="SOrderStatus" list="keywords3" autocomplete="off" />
        <datalist id="keywords3">
         <option value="1_調整中">
         <option value="0_予定">
        </datalist>
      </div>
      <div class="form-group">
      <label for="HINMEI"> </label><br>
      <input type="hidden" name="hidden-parameter4-3" value=43 class="form-control"  />
      </div>

      <button class="regist" type="submit"> 検索</button>
   </form>
               <form class="container" method="POST" action="m.php">
               <input type="hidden" name="file" value="./OrderDelivery.xlsx" />
               <input type="submit" class="btn btn-outline-secondary" value = "データダウンロード" />
               </form>
<span class="d-block p-2 bg-dark text-white">レコード削除</span><br>
   <form class="container" action="index.php" method="post">
     <div class="form-group">
      <label for="HINMEI">レコードID </label><br>
      <input  type="text" name="record-id3" class="form-control" />
     </div>
     <div class="form-group">
      <label for="HINMEI"> </label><br>
      <input type="hidden" name="hidden-parameter4-4" value=32 class="form-control"  />
      </div>
     <button class="regist" type="submit"> 削除</button>
   </form>







     </div>








     </div>
  </body>
</html>
