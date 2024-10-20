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
<?php


 if(file_exists('./p/all.php' )){
     echo "DBの登録内容も変更しますか? OKならOKボタンを、NOならリセットボタン押下後OKボタンを押下してください。";
     include('./p/all.php');
?>
<br><br>
    <form class="container" action="index.php" method="post">
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程1 </label><br>
                        <input id="PName208032" type="text" name="before0" class="form-control" value="<?php if(isset($LIST[0])){echo $LIST[0];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程1</label><br>
                        <input id="Part" type="text" name="after0" class="form-control"  value="<?php if(isset($_POST['process1'])){echo $_POST['process1'];}  ?>" />
                      </div>
                  </div><br>
                   <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程2 </label><br>
                        <input id="PName208032" type="text" name="before1" class="form-control" value="<?php if(isset($LIST[1])){echo $LIST[1];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程2</label><br>
                        <input id="Part" type="text" name="after1" class="form-control"  value="<?php if(isset($_POST['process2'])){echo $_POST['process2'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程3 </label><br>
                        <input id="PName208032" type="text" name="before2" class="form-control" value="<?php if(isset($LIST[2])){echo $LIST[2];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程3</label><br>
                        <input id="Part" type="text" name="after2" class="form-control" value="<?php if(isset($_POST['process3'])){echo $_POST['process3'];}  ?>"  />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程4 </label><br>
                        <input id="PName208032" type="text" name="before3" class="form-control" value="<?php if(isset($LIST[3])){echo $LIST[3];}  ?>" />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程4</label><br>
                        <input id="Part" type="text" name="after3" class="form-control" value="<?php if(isset($_POST['process4'])){echo $_POST['process4'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程5 </label><br>
                        <input id="PName208032" type="text" name="before4" class="form-control" value="<?php if(isset($LIST[4])){echo $LIST[4];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程5</label><br>
                        <input id="Part" type="text" name="after4" class="form-control" value="<?php if(isset($_POST['process5'])){echo $_POST['process5'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程6 </label><br>
                        <input id="PName208032" type="text" name="before5" class="form-control" value="<?php if(isset($LIST[5])){echo $LIST[5];}  ?>"   />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程6</label><br>
                        <input id="Part" type="text" name="after5" class="form-control" value="<?php if(isset($_POST['process6'])){echo $_POST['process6'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程7 </label><br>
                        <input id="PName208032" type="text" name="before6" class="form-control" value="<?php if(isset($LIST[6])){echo $LIST[6];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程7</label><br>
                        <input id="Part" type="text" name="after6" class="form-control" value="<?php if(isset($_POST['process7'])){echo $_POST['process7'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程8 </label><br>
                        <input id="PName208032" type="text" name="before7" class="form-control" value="<?php if(isset($LIST[7])){echo $LIST[7];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程8</label><br>
                        <input id="Part" type="text" name="after7" class="form-control" value="<?php if(isset($_POST['process8'])){echo $_POST['process8'];}  ?>" />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程9 </label><br>
                        <input id="PName208032" type="text" name="before8" class="form-control" value="<?php if(isset($LIST[8])){echo $LIST[8];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程9</label><br>
                        <input id="Part" type="text" name="after8" class="form-control" value="<?php if(isset($_POST['process9'])){echo $_POST['process9'];}  ?>"  />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程10 </label><br>
                        <input id="PName208032" type="text" name="before9" class="form-control" value="<?php if(isset($LIST[9])){echo $LIST[9];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程10</label><br>
                        <input id="Part" type="text" name="after9" class="form-control" value="<?php if(isset($_POST['process10'])){echo $_POST['process10'];}  ?>"  />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程11 </label><br>
                        <input id="PName208032" type="text" name="before10" class="form-control" value="<?php if(isset($LIST[10])){echo $LIST[10];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程11</label><br>
                        <input id="Part" type="text" name="after10" class="form-control" value="<?php if(isset($_POST['process11'])){echo $_POST['process11'];}  ?>"  />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程12 </label><br>
                        <input id="PName208032" type="text" name="before11" class="form-control" value="<?php if(isset($LIST[11])){echo $LIST[11];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程12</label><br>
                        <input id="Part" type="text" name="after11" class="form-control" value="<?php if(isset($_POST['process12'])){echo $_POST['process12'];}  ?>"  />
                      </div>
                  </div><br>
                  <div class="row">
                      <div class="col-sm">
                        <label for="HINMEI">変更前 工程13 </label><br>
                        <input id="PName208032" type="text" name="before12" class="form-control" value="<?php if(isset($LIST[12])){echo $LIST[12];}  ?>"  />
                      </div>
                      <div class="col-sm">
                        <label for="Part">変更後 工程13</label><br>
                        <input id="Part" type="text" name="after12" class="form-control" value="<?php if(isset($_POST['process13'])){echo $_POST['process13'];}  ?>"  />
                      </div>
                  </div><br>
<div class="form-group">
 <label for="HINMEI">  </label><br>
 <input id="PName208032" type="hidden" name="process1" class="form-control" value="<?php if(isset($_POST['process1'])){echo $_POST['process1'];}  ?>" />
</div> 
<div class="form-group">
 <label for="HINMEI">  </label><br>
 <input id="PName208032" type="hidden" name="process2" class="form-control" value="<?php if(isset($_POST['process2'])){echo $_POST['process2'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process3" class="form-control" value="<?php if(isset($_POST['process3'])){echo $_POST['process3'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process4" class="form-control" value="<?php if(isset($_POST['process4'])){echo $_POST['process4'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process5" class="form-control" value="<?php if(isset($_POST['process5'])){echo $_POST['process5'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process6" class="form-control" value="<?php if(isset($_POST['process6'])){echo $_POST['process6'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process7" class="form-control" value="<?php if(isset($_POST['process7'])){echo $_POST['process7'];}  ?>" />
</div>
<div class="form-group">
 <label for="HINMEI">  </label><br>
 <input id="PName208032" type="hidden" name="process8" class="form-control" value="<?php if(isset($_POST['process8'])){echo $_POST['process8'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process9" class="form-control" value="<?php if(isset($_POST['process9'])){echo $_POST['process9'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process10" class="form-control" value="<?php if(isset($_POST['process10'])){echo $_POST['process10'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process11" class="form-control" value="<?php if(isset($_POST['process11'])){echo $_POST['process11'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process12" class="form-control" value="<?php if(isset($_POST['process12'])){echo $_POST['process12'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process13" class="form-control" value="<?php if(isset($_POST['process13'])){echo $_POST['process13'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="NoValidate1" class="form-control" value="<?php if(isset($_POST['NoValidate1'])){echo $_POST['NoValidate1'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="NoValidate2" class="form-control" value="<?php if(isset($_POST['NoValidate2'])){echo $_POST['NoValidate2'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="NoValidate3" class="form-control" value="<?php if(isset($_POST['NoValidate3'])){echo $_POST['NoValidate3'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="OrderBreak1" class="form-control" value="<?php if(isset($_POST['OrderBreak1'])){echo $_POST['OrderBreak1'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="OrderBreak2" class="form-control" value="<?php if(isset($_POST['OrderBreak2'])){echo $_POST['OrderBreak2'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="OrderBreak3" class="form-control" value="<?php if(isset($_POST['OrderBreak3'])){echo $_POST['OrderBreak3'];}  ?>" />
</div>
<div class="row">
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="TYPE1check1" class="form-control" value="<?php if(isset($_POST['TYPE1check1'])){echo $_POST['TYPE1check1'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="TYPE1check2" class="form-control" value="<?php if(isset($_POST['TYPE1check2'])){echo $_POST['TYPE1check2'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="TYPE1check3" class="form-control" value="<?php if(isset($_POST['TYPE1check3'])){echo $_POST['TYPE1check3'];}  ?>" />
  </div>
</div><br>
<div class="row">
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="SerialValidate1" class="form-control" value="<?php if(isset($_POST['SerialValidate1'])){echo $_POST['SerialValidate1'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="SerialValidate2" class="form-control" value="<?php if(isset($_POST['SerialValidate2'])){echo $_POST['SerialValidate2'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="SerialValidate3" class="form-control" value="<?php if(isset($_POST['SerialValidate3'])){echo $_POST['SerialValidate3'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="Startprocess" class="form-control" value="<?php if(isset($_POST['Startprocess'])){echo $_POST['Startprocess'];}  ?>" />
  </div>
</div><br>
                  <div class="form-group">
                    <label for="HINMEI"> </label><br>
                    <input type="hidden" name="hidden-parameter5" value=2 class="form-control"  />
                  </div>
                  <div class="form-group">
                    <button class="regist ml-4" type="submit" >OK</button>
                  </div>
               </form>

               <form class="container" action="index.php" method="post">
 <div class="form-group">
                  <div class="form-group">
                    <button class="regist ml-4" type="submit" >NO</button>
                  </div>
<div class="form-group">
 <label for="HINMEI">  </label><br>
 <input id="PName208032" type="hidden" name="process1" class="form-control" value="<?php if(isset($_POST['process1'])){echo $_POST['process1'];}  ?>" />
</div>
<div class="form-group">
 <label for="HINMEI">  </label><br>
 <input id="PName208032" type="hidden" name="process2" class="form-control" value="<?php if(isset($_POST['process2'])){echo $_POST['process2'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process3" class="form-control" value="<?php if(isset($_POST['process3'])){echo $_POST['process3'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process4" class="form-control" value="<?php if(isset($_POST['process4'])){echo $_POST['process4'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process5" class="form-control" value="<?php if(isset($_POST['process5'])){echo $_POST['process5'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process6" class="form-control" value="<?php if(isset($_POST['process6'])){echo $_POST['process6'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process7" class="form-control" value="<?php if(isset($_POST['process7'])){echo $_POST['process7'];}  ?>" />
</div>
<div class="form-group">
 <label for="HINMEI">  </label><br>
 <input id="PName208032" type="hidden" name="process8" class="form-control" value="<?php if(isset($_POST['process8'])){echo $_POST['process8'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process9" class="form-control" value="<?php if(isset($_POST['process9'])){echo $_POST['process9'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process10" class="form-control" value="<?php if(isset($_POST['process10'])){echo $_POST['process10'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process11" class="form-control" value="<?php if(isset($_POST['process11'])){echo $_POST['process11'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process12" class="form-control" value="<?php if(isset($_POST['process12'])){echo $_POST['process12'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process13" class="form-control" value="<?php if(isset($_POST['process13'])){echo $_POST['process13'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="NoValidate1" class="form-control" value="<?php if(isset($_POST['NoValidate1'])){echo $_POST['NoValidate1'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="NoValidate2" class="form-control" value="<?php if(isset($_POST['NoValidate2'])){echo $_POST['NoValidate2'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="NoValidate3" class="form-control" value="<?php if(isset($_POST['NoValidate3'])){echo $_POST['NoValidate3'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="OrderBreak1" class="form-control" value="<?php if(isset($_POST['OrderBreak1'])){echo $_POST['OrderBreak1'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="OrderBreak2" class="form-control" value="<?php if(isset($_POST['OrderBreak2'])){echo $_POST['OrderBreak2'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="OrderBreak3" class="form-control" value="<?php if(isset($_POST['OrderBreak3'])){echo $_POST['OrderBreak3'];}  ?>" />
</div>
<div class="row">
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="TYPE1check1" class="form-control" value="<?php if(isset($_POST['TYPE1check1'])){echo $_POST['TYPE1check1'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="TYPE1check2" class="form-control" value="<?php if(isset($_POST['TYPE1check2'])){echo $_POST['TYPE1check2'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="TYPE1check3" class="form-control" value="<?php if(isset($_POST['TYPE1check3'])){echo $_POST['TYPE1check3'];}  ?>" />
  </div>
</div><br>
<div class="row">
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="SerialValidate1" class="form-control" value="<?php if(isset($_POST['SerialValidate1'])){echo $_POST['SerialValidate1'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="SerialValidate2" class="form-control" value="<?php if(isset($_POST['SerialValidate2'])){echo $_POST['SerialValidate2'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="SerialValidate3" class="form-control" value="<?php if(isset($_POST['SerialValidate3'])){echo $_POST['SerialValidate3'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="Startprocess" class="form-control" value="<?php if(isset($_POST['Startprocess'])){echo $_POST['Startprocess'];}  ?>" />
  </div>
</div><br>
                  <div class="form-group">
                    <label for="HINMEI"> </label><br>
                    <input type="hidden" name="hidden-parameter" value=2 class="form-control"  />
                  </div>
               </form>

               <?php }else{?><?php echo "登録済みの品名はOKボタン押下後、URLの末尾に".'http://'.$_SERVER['HTTP_HOST'].'/p/'."で確認できます。";?>


<form class="container" action="index.php" method="post">
<div class="form-group">
 <label for="HINMEI">   </label><br>
 <input id="PName208032" type="hidden" name="process1" class="form-control" value="<?php if(isset($_POST['process1'])){echo $_POST['process1'];}  ?>" />
</div>
<div class="form-group">
 <label for="HINMEI">   </label><br>
 <input id="PName208032" type="hidden" name="process2" class="form-control" value="<?php if(isset($_POST['process2'])){echo $_POST['process2'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process3" class="form-control" value="<?php if(isset($_POST['process3'])){echo $_POST['process3'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process4" class="form-control" value="<?php if(isset($_POST['process4'])){echo $_POST['process4'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process5" class="form-control" value="<?php if(isset($_POST['process5'])){echo $_POST['process5'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process6" class="form-control" value="<?php if(isset($_POST['process6'])){echo $_POST['process6'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process7" class="form-control" value="<?php if(isset($_POST['process7'])){echo $_POST['process7'];}  ?>" />
</div>
<div class="form-group">
 <label for="HINMEI">  </label><br>
 <input id="PName208032" type="hidden" name="process8" class="form-control" value="<?php if(isset($_POST['process8'])){echo $_POST['process8'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process9" class="form-control" value="<?php if(isset($_POST['process9'])){echo $_POST['process9'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process10" class="form-control" value="<?php if(isset($_POST['process10'])){echo $_POST['process10'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process11" class="form-control" value="<?php if(isset($_POST['process11'])){echo $_POST['process11'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process12" class="form-control" value="<?php if(isset($_POST['process12'])){echo $_POST['process12'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="process13" class="form-control" value="<?php if(isset($_POST['process13'])){echo $_POST['process13'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="NoValidate1" class="form-control" value="<?php if(isset($_POST['NoValidate1'])){echo $_POST['NoValidate1'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="NoValidate2" class="form-control" value="<?php if(isset($_POST['NoValidate2'])){echo $_POST['NoValidate2'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="NoValidate3" class="form-control" value="<?php if(isset($_POST['NoValidate3'])){echo $_POST['NoValidate3'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="OrderBreak1" class="form-control" value="<?php if(isset($_POST['OrderBreak1'])){echo $_POST['OrderBreak1'];}  ?>" />
</div> 
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="OrderBreak2" class="form-control" value="<?php if(isset($_POST['OrderBreak2'])){echo $_POST['OrderBreak2'];}  ?>" />
</div>
<div class="form-group">
<label for="HINMEI">   </label><br>
<input id="PName208032" type="hidden" name="OrderBreak3" class="form-control" value="<?php if(isset($_POST['OrderBreak3'])){echo $_POST['OrderBreak3'];}  ?>" />
</div>
<div class="row">
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="TYPE1check1" class="form-control" value="<?php if(isset($_POST['TYPE1check1'])){echo $_POST['TYPE1check1'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="TYPE1check2" class="form-control" value="<?php if(isset($_POST['TYPE1check2'])){echo $_POST['TYPE1check2'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="TYPE1check3" class="form-control" value="<?php if(isset($_POST['TYPE1check3'])){echo $_POST['TYPE1check3'];}  ?>" />
  </div>
</div><br>
<div class="row">
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="SerialValidate1" class="form-control" value="<?php if(isset($_POST['SerialValidate1'])){echo $_POST['SerialValidate1'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="SerialValidate2" class="form-control" value="<?php if(isset($_POST['SerialValidate2'])){echo $_POST['SerialValidate2'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="SerialValidate3" class="form-control" value="<?php if(isset($_POST['SerialValidate3'])){echo $_POST['SerialValidate3'];}  ?>" />
  </div>
  <div class="col-sm">
    <label for="IDate"></label>
    <input type="hidden" name="Startprocess" class="form-control" value="<?php if(isset($_POST['Startprocess'])){echo $_POST['Startprocess'];}  ?>" />
  </div>
  <div class="form-group">
                    <label for="HINMEI"> </label><br>
                    <input type="hidden" name="hidden-parameter" value=2 class="form-control"  />
                  </div>
               
</div><br>
<div class="form-group">
             <button class="regist" type="submit"> OK</button>
             </div>
           </form>

   <?php ;}; ?>



</body>




