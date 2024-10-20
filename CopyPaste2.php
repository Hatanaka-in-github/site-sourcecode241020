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
<?php


 if(file_exists("./p/".$_GET['productname'].'.php' )){
     echo "DBの登録内容も変更しますか? OKならOKボタンを、NOならリセットボタン押下後OKボタンを押下してください。";
     include("./p/".$_GET['productname'].'.php');
?>
<br><br>
    <form class="container" action="index.php" method="get">
                   <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程1 </label><br>
                        <input id="PName208032" type="text" name="before1" class="form-control" value="<?php if(isset($LIST[1])){echo $LIST[1];}  ?>"  required/>
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程1</label><br>
                        <input id="Part" type="text" name="after1" class="form-control"  value="<?php if(isset($_GET['process2'])){echo $_GET['process2'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程2 </label><br>
                        <input id="PName208032" type="text" name="before2" class="form-control" value="<?php if(isset($LIST[2])){echo $LIST[2];}  ?>"   required/>
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程2</label><br>
                        <input id="Part" type="text" name="after2" class="form-control" value="<?php if(isset($_GET['process3'])){echo $_GET['process3'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程3 </label><br>
                        <input id="PName208032" type="text" name="before3" class="form-control" value="<?php if(isset($LIST[3])){echo $LIST[3];}  ?>" required/>
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程3</label><br>
                        <input id="Part" type="text" name="after3" class="form-control" value="<?php if(isset($_GET['process4'])){echo $_GET['process4'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程4 </label><br>
                        <input id="PName208032" type="text" name="before4" class="form-control" value="<?php if(isset($LIST[4])){echo $LIST[4];}  ?>"  required/>
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程4</label><br>
                        <input id="Part" type="text" name="after4" class="form-control" value="<?php if(isset($_GET['process5'])){echo $_GET['process5'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程5 </label><br>
                        <input id="PName208032" type="text" name="before5" class="form-control" value="<?php if(isset($LIST[5])){echo $LIST[5];}  ?>"   required/>
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程5</label><br>
                        <input id="Part" type="text" name="after5" class="form-control" value="<?php if(isset($_GET['process6'])){echo $_GET['process6'];}  ?>"  />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程6 </label><br>
                        <input id="PName208032" type="text" name="before6" class="form-control" value="<?php if(isset($LIST[6])){echo $LIST[6];}  ?>"    required/>
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程6</label><br>
                        <input id="Part" type="text" name="after6" class="form-control" value="<?php if(isset($_GET['process7'])){echo $_GET['process7'];}  ?>"  />
                      </div>
                  </div><br>
                  <div class="form-group"> 
                 <label for="product-group-process">   </label>
                 <input type="hidden" name="product-group-process" value="<?php if(!empty($_GET['product-group-process'])){echo $_GET['product-group-process'];}  ?>"  />
              </div>
              <div class="form-group"><br>
                <label for="LOTID">  </label><br>
                <input id="LOTID" type="hidden" name="productname" class="form-control" value="<?php if(isset($_GET['productname'])){echo $_GET['productname'];}  ?>" />
              </div> 
<div class="form-group">
 <label for="HINMEI">  </label><br>
 <input id="PName208032" type="hidden" name="process2" class="form-control" value="<?php if(isset($_GET['process2'])){echo $_GET['process2'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process3" class="form-control" value="<?php if(isset($_GET['process3'])){echo $_GET['process3'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process4" class="form-control" value="<?php if(isset($_GET['process4'])){echo $_GET['process4'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process5" class="form-control" value="<?php if(isset($_GET['process5'])){echo $_GET['process5'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process6" class="form-control" value="<?php if(isset($_GET['process6'])){echo $_GET['process6'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process7" class="form-control" value="<?php if(isset($_GET['process7'])){echo $_GET['process7'];}  ?>" />
</div>
                  <div class="form-group">
                    <label for="HINMEI"> </label><br>
                    <input type="hidden" name="hidden-parameter5" value=2 class="form-control"  />
                  </div>
                  <div class="form-group">
                    <button class="regist ml-4" type="submit" >OK</button>
                    <button class="reset"  type="reset" >リセット</button><br>
                  </div>
               </form>

               <?php }else{?><?php echo "登録済みの品名はOKボタン押下後、URLの末尾に".'http://'.$_SERVER['HTTP_HOST'].'/p/'."で確認できます。";?>


               <form class="container" action="index.php" method="get">
              <div class="form-group">
                 <label for="product-group-process"> </label>
                 <input type="hidden" name="product-group-process" value="<?php if(!empty($_GET['product-group-process'])){echo $_GET['product-group-process'];}  ?>" />
              </div>
              <div class="form-group">
               <label for="HINMEI">   </label><br>
               <input type="hidden" name="hidden-parameter" value=1 class="form-control"  />
              </div>
              <div class="form-group"><br>
                <label for="LOTID">   </label><br>
                <input id="LOTID" type="hidden" name="productname" class="form-control" value="<?php if(isset($_GET['productname'])){echo $_GET['productname'];}  ?>" />
              </div> 
<div class="form-group">
 <label for="HINMEI">   </label><br>
 <input id="PName208032" type="hidden" name="process2" class="form-control" value="<?php if(isset($_GET['process2'])){echo $_GET['process2'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process3" class="form-control" value="<?php if(isset($_GET['process3'])){echo $_GET['process3'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process4" class="form-control" value="<?php if(isset($_GET['process4'])){echo $_GET['process4'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process5" class="form-control" value="<?php if(isset($_GET['process5'])){echo $_GET['process5'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process6" class="form-control" value="<?php if(isset($_GET['process6'])){echo $_GET['process6'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process7" class="form-control" value="<?php if(isset($_GET['process7'])){echo $_GET['process7'];}  ?>" />
</div>
<div class="form-group">
             <button class="regist" type="submit"> OK</button>
             </div>
           </form>

   <?php ;}; ?>



</body>




