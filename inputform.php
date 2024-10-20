               <h2 class="bg-primary">在庫移動/手入力</h2>
               <form class="container" action="function.php" method="post" autocomplete="off" >
                   <div class="row">
                      <div class="col-sm">
                       <label for="IDate">入出庫日</label><br>
                       <input type="date" id="IDate" name="入出庫日" class="form-control" required/>
                      </div>
                      <div class="col-sm">
                       <label for="IDate">入力日</label><br><?php $Time = date("Y-m-d")."T".date("H:i:s");?>
                       <input type="datetime-local" id="IDate" name="入力日" class="form-control" value="<?php echo $Time;?>" required/>
                      </div>
                  </div><br>
                  <div class="form-group">
                    <label for="HINMEI">品名 </label><br>
                    <input id="PName2" type="text" name="品名1" class="form-control"  />
                  </div>
                    <div class="row">
                       <div class="col-sm">
                        <label for="SUURYOU"> 管理番号 </label>
                        <input id="PAmount208032" type="text"  name="管理番号"  class="form-control"  required/>
                       </div>
                       <div class="col-sm">
                        <label for="SONPINSUU">型番 </label><br>
                        <input id="NGAmount" type="text" name="品番" class="form-control" required/>
                       </div><br>
                    </div><br>
                  <div class="form-group">
                    <label for="HINMEI">シリアル番号</label><br>
                    <input id="PName2" type="text" name="Serial" class="form-control"  required/>
                  </div>
                  <div class="row">
                      <div class="col-sm">
                      <label list="list">発工程</label>
                        <input class="form-control"  name="自工程" list="keywords" autocomplete="off" required/>
                        <datalist id="keywords">
                        <option value="<?php echo $FORMLIST[0];?>">
                        <option value="<?php echo $FORMLIST[1];?>">
                        <option value="<?php echo $FORMLIST[2]?>">
                        <option value="<?php echo $FORMLIST[3];?>">
                        <option value="<?php echo $FORMLIST[4];?>">
                        <option value="<?php echo $FORMLIST[5];?>">
                        <option value="<?php echo $FORMLIST[6];?>">
                        <option value="<?php echo $FORMLIST[7];?>">
                        <option value="<?php echo $FORMLIST[8]?>">
                        <option value="<?php echo $FORMLIST[9];?>">
                        <option value="<?php echo $FORMLIST[10];?>">
                        <option value="<?php echo $FORMLIST[11];?>">
                        <option value="<?php echo $FORMLIST[12];?>">
                        </datalist>
                      </div>
                      <div class="col-sm">
                        <label for="KOUTEI">宛先工程 </label>
                        <input class="form-control"  name="宛先工程" list="keywords" autocomplete="off" required/>
                        <datalist id="keywords">
                        <option value="<?php echo $FORMLIST[0];?>">
                        <option value="<?php echo $FORMLIST[1];?>">
                        <option value="<?php echo $FORMLIST[2]?>">
                        <option value="<?php echo $FORMLIST[3];?>">
                        <option value="<?php echo $FORMLIST[4];?>">
                        <option value="<?php echo $FORMLIST[5];?>">
                        <option value="<?php echo $FORMLIST[6];?>">
                        <option value="<?php echo $FORMLIST[7];?>">
                        <option value="<?php echo $FORMLIST[8]?>">
                        <option value="<?php echo $FORMLIST[9];?>">
                        <option value="<?php echo $FORMLIST[10];?>">
                        <option value="<?php echo $FORMLIST[11];?>">
                        <option value="<?php echo $FORMLIST[12];?>">
                        </datalist>
                      </div>
                      <div class="col-sm"><br></div><br>
                   </div><br>
                   <div class="row">
                      <div class="col-sm">
                       <label for="IDate">規格1</label>
                       <input type="text" id="IDate" name="NIN" class="form-control" />
                      </div>
                      <div class="col-sm">
                       <label for="IDate">規格2</label>
                       <input type="text" id="IDate" name="注文番号" class="form-control" />
                      </div>
                  </div><br>
                       <div class="form-group" >
                        <label for="SUURYOU"> </label><br>
                        <input id="PAmount208032" type="hidden"  name="数量" value="1" class="form-control"  />
                       </div><br>
                  <div class="form-group" >
                   <label for="BIKOU">備考 </label>
                   <textarea id="Notice" cols="40" name="備考" rows="1" class="form-control ml-2"></textarea>
                  </div>
                  <div class="form-group" >
                    <label for="NYUURYOKUSYA">入力者 </label>
                    <input id="Member" type="text" name="入力者" required class="form-control"  required/>
                  </div><br>
                  <div class="form-group">
                    <label for="HINMEI"> </label><br>
                    <input type="hidden" name="hidden-parameter2-10" value=2 class="form-control"  />
                  </div>
                  <div class="form-group">
                   <button class="regist ml-4" type="submit" >登録する</button>
                  </div>
                 </form><h2 class="bg-primary">在庫移動/Excel一括入力</h2><?php require('./i.php') ; ?>
                    <h2 class="bg-warning">NG登録/手入力</h2>
                     <form class="container" action="function.php" method="post" autocomplete="off" >
                 　　 <div class="form-group">
                        <label for="SONPINSUU"> </label>
                        <input id="NGAmount" type="hidden" name="損品数" class="form-control" value="1"  />
                       </div><br>
                     <div class="row">
                      <div class="col-sm">
                       <label for="IDate">入出庫日</label><br>
                       <input type="date" id="IDate" name="入出庫日" class="form-control" required/>
                      </div>
                      <div class="col-sm">
                       <label for="IDate">入力日</label><br><?php $Time = date("Y-m-d")."T".date("H:i:s");?>
                       <input type="datetime-local" id="IDate2" name="入力日" class="form-control" value="<?php echo $Time;?>" required/>
                      </div>
                     </div><br>
                  <div class="form-group">
                    <label for="HINMEI">品名 </label><br>
                    <input id="PName2" type="text" name="品名1" class="form-control"  />
                  </div>
                     <div class="row">
                       <div class="col-sm">
                        <label for="SUURYOU">管理番号</label>
                        <input id="PAmount208032" type="text"  name="管理番号"  class="form-control"  required/>
                       </div>
                      <div class="col-sm">
                      <label list="list">工程</label>
                        <input class="form-control"  name="自工程" list="keywords" autocomplete="off" required/>
                        <datalist id="keywords">
                        <option value="<?php echo $FORMLIST[0];?>">
                        <option value="<?php echo $FORMLIST[1];?>">
                        <option value="<?php echo $FORMLIST[2]?>">
                        <option value="<?php echo $FORMLIST[3];?>">
                        <option value="<?php echo $FORMLIST[4];?>">
                        <option value="<?php echo $FORMLIST[5];?>">
                        <option value="<?php echo $FORMLIST[6];?>">
                        <option value="<?php echo $FORMLIST[7];?>">
                        <option value="<?php echo $FORMLIST[8]?>">
                        <option value="<?php echo $FORMLIST[9];?>">
                        <option value="<?php echo $FORMLIST[10];?>">
                        <option value="<?php echo $FORMLIST[11];?>">
                        <option value="<?php echo $FORMLIST[12];?>">
                        </datalist>
                      </div>
                      <div class="col-sm">
                        <label for="SONPINSUU">型番 </label><br>
                        <input id="NGAmount" type="text" name="品番" class="form-control" required/>
                      </div><br>
                     </div><br>
                      <div class="form-group" >
                        <label for="SONPINSUU">NG品シリアル </label><br>
                        <input id="NGAmount" type="text" name="Serial" class="form-control"  required/>
                      </div><br>
                      <div class="form-group" >
                        <label for="SONPINSUU">NG理由 </label><br>
                        <textarea id="Notice" cols="40" name="備考" rows="2" class="form-control ml-2" required></textarea>
                      </div>
                      <div class="row">
                       <div class="col-sm">
                        <label for="IDate"></label>
                        <input type="hidden" id="IDate" name="NIN" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate"></label>
                        <input type="hidden" id="IDate" name="注文番号" class="form-control" />
                       </div>
                     </div><br>
                      <div class="form-group" >
                        <label for="NYUURYOKUSYA">入力者 </label>
                        <input id="Member" type="text" name="入力者"  class="form-control"  required/>
                       </div><br>
                      <div class="form-group">
                        <label for="HINMEI"> </label><br>
                        <input type="hidden" name="hidden-parameter2-20" value=2 class="form-control"  />
                      </div>
                      <div class="form-group">
                       <button class="regist ml-4" type="submit" >登録する</button>
                      </div>
                    </form><h2 class="bg-warning">NG登録/Excel一括入力</h2><?php require('./j.php') ; ?>
                    <h2 class="bg-secondary">保留登録</h2>
                     <form class="container" action="function.php" method="post" autocomplete="off" >
                 　　 <div class="form-group">
                        <label for="SONPINSUU"></label><br>
                        <input id="StopAmount" type="hidden" name="保留数" class="form-control" value="1"  />
                       </div>
　　　　　　　　　　　<div class="row">
                      <div class="col-sm">
                       <label for="IDate">入出庫日</label><br>
                       <input type="date" id="IDate" name="入出庫日" class="form-control" required/>
                      </div>
                      <div class="col-sm">
                       <label for="IDate">入力日</label><br><?php $Time = date("Y-m-d")."T".date("H:i:s");?>
                       <input type="datetime-local" id="IDate" name="入力日" class="form-control" value="<?php echo $Time;?>" required/>
                      </div>
                     </div><br>
                  <div class="form-group">
                    <label for="HINMEI">品名 </label><br>
                    <input id="PName2" type="text" name="品名1" class="form-control"  />
                  </div>
             
                     <div class="row">
                       <div class="col-sm">
                        <label for="SUURYOU">管理番号</label>
                        <input id="PAmount208032" type="text"  name="管理番号"  class="form-control"  required/>
                       </div>
                      <div class="col-sm">
                      <label list="list">工程</label>
                        <input class="form-control"  name="自工程" list="keywords" autocomplete="off" required/>
                        <datalist id="keywords">
                        <option value="<?php echo $FORMLIST[0];?>">
                        <option value="<?php echo $FORMLIST[1];?>">
                        <option value="<?php echo $FORMLIST[2]?>">
                        <option value="<?php echo $FORMLIST[3];?>">
                        <option value="<?php echo $FORMLIST[4];?>">
                        <option value="<?php echo $FORMLIST[5];?>">
                        <option value="<?php echo $FORMLIST[6];?>">
                        <option value="<?php echo $FORMLIST[7];?>">
                        <option value="<?php echo $FORMLIST[8]?>">
                        <option value="<?php echo $FORMLIST[9];?>">
                        <option value="<?php echo $FORMLIST[10];?>">
                        <option value="<?php echo $FORMLIST[11];?>">
                        <option value="<?php echo $FORMLIST[12];?>">
                        </datalist>
                      </div>
                      <div class="col-sm">
                        <label for="SONPINSUU">型番 </label><br>
                        <input id="NGAmount" type="text" name="品番" class="form-control" required/>
                      </div><br>
                     </div><br>
                      <div class="form-group" >
                        <label for="SONPINSUU">保留品シリアル </label><br>
                        <input id="NGAmount" type="text" name="Serial" class="form-control"  required/>
                      </div><br>
 　　　　　　　　　　 <div class="form-group" >
                        <label for="SONPINSUU">保留理由 </label><br>
                        <textarea id="Notice" cols="40" name="備考" rows="2" class="form-control ml-2" required></textarea>
                      </div>
                      <div class="row">
                       <div class="col-sm">
                        <label for="IDate"></label>
                        <input type="hidden" id="IDate" name="NIN" class="form-control" />
                       </div>
                       <div class="col-sm">
                        <label for="IDate"></label>
                        <input type="hidden" id="IDate" name="注文番号" class="form-control" />
                       </div>
                      </div><br>
                      <div class="form-group" >
                        <label for="NYUURYOKUSYA">入力者 </label>
                        <input id="Member" type="text" name="入力者" class="form-control"  required/>
                      </div><br>
                      <div class="form-group">
                        <label for="HINMEI"> </label><br>
                        <input type="hidden" name="hidden-parameter2-30" value=2 class="form-control"  />
                      </div>
                      <div class="form-group">
                       <button class="regist ml-4" type="submit" >登録する</button>
                      </div>
                    </form>
