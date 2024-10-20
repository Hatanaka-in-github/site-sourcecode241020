 
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
  <body>


  <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active" aria-current="true" >1.工程設計</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">2.在庫操作</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/process">3.工程ごと在庫の参照</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/order" >4.受注登録</a>
          </li>
        </ul>
      </div>


      <div class="card-body">
        <h5 class="card-title">在庫操作の前に、製造過程を工程として分類し、登録します。</h5>
        <p class="card-text text-danger">以下「詳細」ボタンをクリックし、リンク先の資料を参照して登録をお願いします。</p>
        <a href="/index999.html" target="_blank" rel="noopener noreferrer" class="btn btn-primary">詳細</a>
      </div>
    </div>

  <?php if(isset($_POST['CANCEL'])){unset($_POST['CANCEL']);};?>
   <div class="tab-wrap">
   <input id="TAB-01" type="radio" name="TAB" class="tab-switch" checked/><label class="tab-label" for="TAB-01">工程登録</label>
     <div class="tab-content" ><?php include('replaceprocess.php') ; ?>
            <form class="container" action="CopyPaste2.php" method="post">
              <div class="form-group">
               <label for="HINMEI"> </label><br>
               <input type="hidden" name="hidden-parameter" value=1 class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程1 </label><br>
                <input id="PName208032" type="text" name="process1" class="form-control"  />
              </div> 
              <div class="form-group">
                <label for="HINMEI">工程2 </label><br>
                <input id="PName208032" type="text" name="process2" class="form-control"  />
              </div> 
              <div class="form-group">
                <label for="HINMEI">工程3 </label><br>
                <input id="PName208032" type="text" name="process3" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程4 </label><br>
                <input id="PName208032" type="text" name="process4" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程5 </label><br>
                <input id="PName208032" type="text" name="process5" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程6 </label><br>
                <input id="PName208032" type="text" name="process6" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程7 </label><br>
                <input id="PName208032" type="text" name="process7" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程8 </label><br>
                <input id="PName208032" type="text" name="process8" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程9 </label><br>
                <input id="PName208032" type="text" name="process9" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程10 </label><br>
                <input id="PName208032" type="text" name="process10" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程11 </label><br>
                <input id="PName208032" type="text" name="process11" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程12 </label><br>
                <input id="PName208032" type="text" name="process12" class="form-control"  />
              </div>
              <div class="form-group">
                <label for="HINMEI">工程13 </label><br>
                <input id="PName208032" type="text" name="process13" class="form-control"  />
              </div>
              <div class="row">
                       <div class="col-sm">
                        <label for="IDate">スタート工程</label>
                        <input type="text" id="IDate" name="Startprocess" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate"></label>
                        <input type="hidden" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate"></label>
                        <input type="hidden" class="form-control" />
                       </div>
              </div><br>

              <div class="row">
                       <div class="col-sm">
                        <label for="IDate">シリアルチェック無し工程</label>
                        <input type="text" id="IDate" name="NoValidate1" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate">シリアルチェック無し工程</label>
                        <input type="text" id="IDate" name="NoValidate2" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate">シリアルチェック無し工程</label>
                        <input type="text" id="IDate" name="NoValidate3" class="form-control" />
                       </div>
              </div><br>

              <div class="row">
                       <div class="col-sm">
                        <label for="IDate">オーダー解除工程1</label>
                        <input type="text" id="IDate" name="OrderBreak1" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate">オーダー解除工程2</label>
                        <input type="text" id="IDate" name="OrderBreak2" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate">オーダー解除工程3</label>
                        <input type="text" id="IDate" name="OrderBreak3" class="form-control" />
                       </div>
              </div><br>

              <div class="row">
                       <div class="col-sm">
                        <label for="IDate">シリアル有効化工程1</label>
                        <input type="text" id="IDate" name="SerialValidate1" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate">シリアル有効化工程2</label>
                        <input type="text" id="IDate" name="SerialValidate2" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate">シリアル有効化工程3</label>
                        <input type="text" id="IDate" name="SerialValidate3" class="form-control" />
                       </div>
              </div><br>


              <div class="row">
                       <div class="col-sm">
                        <label for="IDate">規格1有効工程1</label>
                        <input type="text" id="IDate" name="TYPE1check1" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate">規格1有効工程2</label>
                        <input type="text" id="IDate" name="TYPE1check2" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate">規格1有効工程3</label>
                        <input type="text" id="IDate" name="TYPE1check3" class="form-control" />
                       </div>
              </div><br>

              <div class="form-group">
                 <label for="HINMEI"> </label><br>
                 <input type="hidden" name="hidden-parameter" value=1 class="form-control"  />
              </div>

             <div class="form-group">
             <button class="regist" type="submit"> 登録する</button>
             </div>
           </form>
     </div>
  </body>
</html>
