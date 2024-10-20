
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
if(file_exists("admin/p/all.php")){include("admin/p/all.php");
    }else{echo "工程登録がされていません。"; }
require_once 'getParameters.php';
require_once 'DBclasscollect.php';
use db\DataSource;
$db = new DataSource();


if(isset($_POST['自工程']))
{
   if(isset($_POST["品名1"])){$PName = ($_POST["品名1"]);}else{$PName = NULL;};
   if(isset($_POST["宛先工程"])){$ToProcess = "/".($_POST["宛先工程"])."/";}else{$ToProcess = "/".($_POST["自工程"])."/" ;};
   if(isset($_POST["損品数"])){$NGAmount = ($_POST["損品数"]);}else{$NGAmount = 0;};
   if(isset($_POST["数量"])){$PAmount = ($_POST["数量"]);}else{$PAmount = 0;};
   if(isset($_POST["備考"])){$Notice = ($_POST["備考"]);}else{$Notice = NULL;};
   if(isset($_POST["保留数"])){$StopAmount = ($_POST["保留数"]);}else{$StopAmount = 0;};
   if(isset($_POST["管理番号"])){$AdminNum = ($_POST["管理番号"]);}else{$AdminNum = NULL;};
   if(isset($_POST["NIN"])){$ItemNum = ($_POST["NIN"]);}else{$ItemNum = NULL;};
   if(isset($_POST["注文番号"])){$OrderNum = ($_POST["注文番号"]);}else{$OrderNum = NULL;};


        $IODATE = ($_POST["入出庫日"]);
        $Serial = ($_POST["Serial"]);
	$IDate = ($_POST["入力日"]);
	$PNumber = ($_POST["品番"]);
	$FromProcess = "/".($_POST["自工程"])."/";
        $ProcessKey = $ToProcess.$FromProcess;
	$Member = ($_POST["入力者"]);
        $SerialProcess = $PName.$Serial.$FromProcess.$PNumber;
	$LIST0 = "/".$LIST[0]."/";
	$LIST1 = "/".$LIST[1]."/";
	$LIST2 = "/".$LIST[2]."/";
	$LIST3 = "/".$LIST[3]."/";
	$LIST4 = "/".$LIST[4]."/";
	$LIST5 = "/".$LIST[5]."/";
	$LIST6 = "/".$LIST[6]."/";
        $LIST7 = "/".$LIST[7]."/";
        $LIST8 = "/".$LIST[8]."/";
        $LIST9 = "/".$LIST[9]."/";
        $LIST10 = "/".$LIST[10]."/";
        $LIST11 = "/".$LIST[11]."/";
        $LIST12 = "/".$LIST[12]."/";



		/*リロードによるDB処理重複の対策のため、DB処理の前に、チェックをする。
		最新の3データと入力するデータの日付・入力者が同じであれば、重複データとみなし、exe_flgを1にして在庫の集計から弾く */



	$CheckPhrase = "and 入力日 = '$IDate' and 入力者 = '$Member' order by AUTO_ID desc ";

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

					   if($rec['入力日'] == $IDate && $rec['入力者'] == $Member){
					   $db->QuerySql("UPDATE process_progress SET exe_flg = 1 where exe_flg != 1 and 入力日 = '$IDate' and 入力者 = '$Member' ;");

                                        try{
     /**/
                                           if(!empty($_POST["損品数"]))
                                              {$db->QuerySql("UPDATE NGtable SET exe_flg = 1 where exe_flg != 1 and 入力日 = '$IDate' and 入力者 = '$Member' ;");
                                              } ;                                           if(!empty($_POST["損品数"]))
                                              {$db->QuerySql("UPDATE NGtable SET exe_flg = 1 where exe_flg != 1 and 入力日 = '$IDate' and 入力者 = '$Member' ;");
                                              }elseif(!empty($_POST["保留数"])){
                                                $db->QuerySql("UPDATE NGtable SET exe_flg = 1 where exe_flg != 1 and 入力日 = '$IDate' and 入力者 = '$Member' ;");
                                              } ;

                                        }catch(PDOException $e) {
                                                echo '<br><br>function.php:82〜88_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                                                }; 
     /**/


					                                                            } ;
				        } ;




      /*
                  $sqlx =  "SELECT * FROM process_progress where シリアル工程 = '$SerialProcess' and dplx_flg = 1 ; " ;
                                $stmt2=$dbh->prepare($sqlx);
                                $stmt2->execute();
                                while(1){
                                          $rec = $stmt2->fetch(PDO::FETCH_ASSOC);
                                          if($rec==false) break;
                                          if($rec['シリアル工程'] ==  $SerialProcess){
                                             $db->QuerySql("update process_progress set dplx_flg = 0 where シリアル工程 = '{$SerialProcess}' and dplx_flg = 1 ; ");
                                             $flglock = 1 ;  } ;
                                        } ;
     */
			  /* DB処理*/

               try{



                $SerialProcess = $PName.$Serial.$FromProcess.$PNumber ;
                $TYPE1Check = $db->SelectSumAllarray("SELECT 規格1 FROM process_progress WHERE exe_flg = 0 and シリアル工程 = '{$SerialProcess}' order by AUTO_ID desc limit 1  ;");
                $TYPE2Check = $db->SelectSumAllarray("SELECT 規格2 FROM process_progress WHERE exe_flg = 0 and シリアル工程 = '{$SerialProcess}' order by AUTO_ID desc limit 1  ;");
                if(empty($TYPE1Check[0])){$TYPE1Check[0] = NULL ;} ;
                if(empty($TYPE2Check[0])){$TYPE2Check[0] = NULL ;} ;
                $MinusAdminNum = $db->SelectSumAllarray("SELECT 管理番号 FROM process_progress WHERE exe_flg = 0 and シリアル工程 = '{$SerialProcess}' and 規格1 = '{$TYPE1Check[0]}' and 規格2 = '{$TYPE2Check[0]}' order by AUTO_ID desc limit 1  ;");
                $Sum0ornot = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and シリアル工程 = '{$SerialProcess}' and 規格1 = '{$TYPE1Check[0]}' and 規格2 = '{$TYPE2Check[0]}' order by AUTO_ID desc limit 1  ;"   );
                $MinusAdminNum_NoValid = $db->SelectSumAllarray("SELECT 管理番号 FROM process_progress WHERE exe_flg = 0 and 管理番号 = '{$AdminNum}' and 品番 = '{$PNumber}' order by AUTO_ID desc limit 1  ;");
                $Serial_NoValid = $db->SelectSumAllarray("SELECT シリアル FROM process_progress WHERE exe_flg = 0 and 管理番号 = '{$AdminNum}' and 品番 = '{$PNumber}' order by AUTO_ID desc limit 1  ;"); 
                $Sum0ornot_NoValid = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 管理番号 = '{$AdminNum}' and 品番 = '{$PNumber}'  ;");



                /*
                $SerialProcess = $PName.$Serial.$FromProcess.$PNumber ;
                $ItemNumCheck = $db->SelectSumAllarray("SELECT 規格1 FROM process_progress WHERE exe_flg = 0 and シリアル工程 = '{$SerialProcess}' order by AUTO_ID desc limit 1  ;");
                $MinusAdminNum = $db->SelectSumAllarray("SELECT 管理番号 FROM process_progress WHERE exe_flg = 0 and シリアル工程 = '{$SerialProcess}' order by AUTO_ID desc limit 1  ;");
                $MinusAdminNum_NoValid = $db->SelectSumAllarray("SELECT 管理番号 FROM process_progress WHERE exe_flg = 0 and 管理番号 = '{$AdminNum}' and 品番 = '{$PNumber}' order by AUTO_ID desc limit 1  ;");
                if(empty($ItemNumCheck[0])){$ItemNumCheck[0] = NULL ;} ;
                $MinusAdminNum_TYPE1check = $db->SelectSumAllarray("SELECT 管理番号 FROM process_progress WHERE exe_flg = 0 and シリアル工程 = '{$SerialProcess}' and 規格1 = '{$ItemNumCheck[0]}' order by AUTO_ID desc limit 1  ;");
                $Sum0ornot = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and シリアル工程 = '{$SerialProcess}'   ;");
                if(!empty($MinusAdminNum[0])){$Sum0ornot_NGorSTOP = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 管理番号 = '{$MinusAdminNum[0]}' and シリアル工程 = '{$SerialProcess}'   ;"); } ;
                $Sum0ornot_NoValid = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 管理番号 = '{$AdminNum}' and 品番 = '{$PNumber}'  ;");
                if(!empty($MinusAdminNum_NoValid[0])){$Sum0ornot_NoValid_NGorSTOP = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 管理番号 = '{$MinusAdminNum_NoValid[0]}' and 品番 = '{$PNumber}'  ;"); } ;
                if(empty($ItemNumCheck[0])){$ItemNumCheck[0] = NULL ;} ;
                $Sum0ornot_TYPE1check = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and シリアル工程 = '{$SerialProcess}' and 規格1 = '{$ItemNumCheck[0]}'  ;");
                if(!empty($MinusAdminNum_TYPE1check[0])){$Sum0ornot_TYPE1check_NGorSTOP = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 管理番号 = '{$MinusAdminNum_TYPE1check[0]}' and シリアル工程 = '{$SerialProcess}' and 規格1 = '{$ItemNumCheck[0]}'  ;"); } ;
                */

               }catch(PDOException $e) {
                echo '<br><br>function.php:118〜121_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                }; 

  if($_POST["自工程"] == $Startprocess[0]){ 

                try{

                $db->QuerySql("insert into `process_progress`
                (入力日,品名,品番,管理番号,数量,シリアル,受工程,入力者,シリアル工程,exe_flg)
                values ('{$IDate}','{$PName}','{$PNumber}','{$AdminNum}',-1*{$PAmount}-{$NGAmount}-{$StopAmount},'{$Serial}','{$FromProcess}','{$Member}','{$SerialProcess}',2);");

                $SerialProcess = $PName.$Serial.$ToProcess.$PNumber;
                $db->QuerySql("insert into `process_progress`
                (入出庫日,入力日,品名,品番,管理番号,シリアル,数量,発工程,受工程,規格1,規格2,備考,入力者,工程キー,シリアル工程,exe_flg)
                values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$AdminNum}','{$Serial}','{$PAmount}','{$FromProcess}',
                     '{$ToProcess}','{$ItemNum}','{$OrderNum}','{$Notice}','{$Member}','{$ProcessKey}','{$SerialProcess}',0 );");

                }catch(PDOException $e) {
                        echo '<br><br>function.php:139〜147_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                        };


  }elseif( $_POST["自工程"] == $NoValidate[0] ||
           $_POST["自工程"] == $NoValidate[1] ||
           $_POST["自工程"] == $NoValidate[2])
  {

                /*       try{

                        $db->QuerySql("insert into `process_progress`
                        (入力日,品名,品番,管理番号,数量,シリアル,受工程,入力者,シリアル工程,exe_flg)
                        values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum[0]}',-1*{$PAmount}-{$NGAmount}-{$StopAmount},'{$Serial}','{$FromProcess}','{$Member}','{$SerialProcess}',2);");
     
                        $SerialProcess = $PName.$Serial.$ToProcess.$PNumber;
                        $db->QuerySql("insert into `process_progress`
                        (入出庫日,入力日,品名,品番,管理番号,シリアル,数量,発工程,受工程,規格1,規格2,備考,入力者,工程キー,シリアル工程,exe_flg)
                        values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$AdminNum}','{$Serial}','{$PAmount}','{$FromProcess}',
                             '{$ToProcess}','{$ItemNum}','{$OrderNum}','{$Notice}','{$Member}','{$ProcessKey}','{$SerialProcess}',0 );");

                        }catch(PDOException $e) {
                                echo '<br><br>function.php:118〜121_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                                }; */
        if(!empty($_POST["数量"]) && !empty($MinusAdminNum_NoValid[0]))
        {
           foreach($Sum0ornot_NoValid[0] as $key => $value)
                { if($value >= 1)
                  {
                                              
                   try{


                   $db->QuerySql("insert into `process_progress`
                   (入力日,品名,品番,管理番号,数量,シリアル,受工程,入力者,シリアル工程,exe_flg)
                   values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum_NoValid[0]}',-1*{$PAmount},'{$Serial_NoValid[0]}','{$FromProcess}','{$Member}','{$SerialProcess}',2);");

                   $SerialProcess = $PName.$Serial.$ToProcess.$PNumber;
                   $db->QuerySql("insert into `process_progress`
                   (入出庫日,入力日,品名,品番,管理番号,シリアル,数量,発工程,受工程,規格1,規格2,備考,入力者,工程キー,シリアル工程,exe_flg)
                   values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$AdminNum}','{$Serial}','{$PAmount}','{$FromProcess}',
                        '{$ToProcess}','{$ItemNum}','{$OrderNum}','{$Notice}','{$Member}','{$ProcessKey}','{$SerialProcess}',0 );");
                        
                   }catch(PDOException $e) {
                    echo '<br><br>function.php:182〜190_処理に失敗しました。管理者にお問合せ下さい。<br><br>' ;
                   } ; 
                
                  }else{ echo "指定の型番、管理番号は指定の発工程にありません。<br>" ; } ;

                } ;

        }elseif(!empty($_POST["保留数"]) && !empty($MinusAdminNum_NoValid[0]))
        {
          foreach($Sum0ornot_NoValid[0] as $key => $value)
          {     if($value >= 1 )
                {
                        try{

                        $db->QuerySql("insert into `process_progress`
                        (入力日,品名,品番,管理番号,数量,シリアル,受工程,入力者,シリアル工程,exe_flg)
                        values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum_NoValid[0]}',-1*{$StopAmount},'{$Serial_NoValid[0]}','{$FromProcess}','{$Member}','{$SerialProcess}',2);");
          
                        $STSerialProcess = $PName.'ST'.$Serial.$FromProcess.$PNumber;
                        $db->QuerySql("insert into `process_progress`
                        (入出庫日,入力日,品名,品番,管理番号,シリアル,受工程,保留数,備考,入力者,シリアル工程,工程キー,exe_flg)
                        values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$AdminNum}','{$Serial}','{$FromProcess}','{$StopAmount}',
                                '{$Notice}','{$Member}','{$STSerialProcess}','{$FromProcess}',0);"); 

                  
                        }catch(PDOException $e) {
                         echo '<br><br>function.php:205〜213_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                         } ;

                }else{ echo "指定の型番、管理番号は指定の発工程にありません。<br>" ; } ;    
          };
                                                      
        }elseif(!empty($_POST["損品数"]) && !empty($MinusAdminNum_NoValid[0]))
        { 
          foreach($Sum0ornot_NoValid[0] as $key => $value)
          {     if($value >= 1)
                {
                   
                    try{

                      if(empty($TYPE1Check[0])){$TYPE1Check[0] = NULL ;} ;
                      if(empty($TYPE2Check[0])){$TYPE2Check[0] = NULL ;} ;
                        $db->QuerySql("insert into `process_progress`
                        (入力日,品名,品番,管理番号,数量,シリアル,受工程,入力者,シリアル工程,exe_flg)
                        values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum_NoValid[0]}',-1*{$NGAmount},'{$Serial_NoValid[0]}','{$FromProcess}','{$Member}','{$SerialProcess}',2);");
          
                        $NGSerialProcess = $PName.'NG'.$Serial.$FromProcess.$PNumber;
                        $db->QuerySql("insert into `process_progress`
                        (入出庫日,入力日,品名,品番,管理番号,シリアル,受工程,損品数,備考,入力者,シリアル工程,工程キー,exe_flg)
                        values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$AdminNum}','{$Serial}','{$FromProcess}','{$NGAmount}',
                                '{$Notice}','{$Member}','{$NGSerialProcess}','{$FromProcess}',0);");
          
                        $db->QuerySql("insert into `NGtable`
                        (入力日,入力者,入出庫日,品名,管理番号,型番,シリアル,工程,NG理由,exe_flg)
                        values ('{$IDate}','{$Member}','{$IODATE}','{$PName}','{$AdminNum}','{$PNumber}','{$Serial}','{$FromProcess}','{$Notice}',0);");
          
                        }catch(PDOException $e) {
                          echo '<br><br>function.php:230〜243_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                          };

                }else{ echo "指定の型番、管理番号は指定の発工程にありません。<br>" ; } ;                                       
          } ;
        }else{echo "指定の部材、管理番号は指定の発工程に在庫はありません。" ; } ; 
  /*              
  }elseif( $_POST["自工程"] == $TYPE1check[0]  ||
           $_POST["自工程"] == $TYPE1check[1]  ||
           $_POST["自工程"] == $TYPE1check[2]  )
  {

        if(!empty($_POST["数量"]) && !empty($MinusAdminNum_TYPE1check[0]))
        {
           foreach($Sum0ornot_TYPE1check[0] as $key => $value)
           {    if($value >= 1)
                {

                  try{

                      if(empty($ItemNumCheck[0])){$ItemNumCheck[0] = NULL ;} ;
                      $db->QuerySql("insert into `process_progress`
                      (入力日,品名,品番,管理番号,数量,シリアル,受工程,規格1,入力者,シリアル工程,exe_flg)
                      values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum_TYPE1check[0]}',-1*{$PAmount}-{$NGAmount}-{$StopAmount},'{$Serial}','{$FromProcess}','{$ItemNumCheck[0]}','{$Member}','{$SerialProcess}',2);");

                      $SerialProcess = $PName.$Serial.$ToProcess.$PNumber ;
                      $db->QuerySql("insert into `process_progress`
                      (入出庫日,入力日,品名,品番,管理番号,シリアル,数量,発工程,受工程,規格1,規格2,備考,入力者,工程キー,シリアル工程,exe_flg)
                      values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$AdminNum}','{$Serial}','{$PAmount}','{$FromProcess}',
                      '{$ToProcess}','{$ItemNum}','{$OrderNum}','{$Notice}','{$Member}','{$ProcessKey}','{$SerialProcess}',0 );");

                     }catch(PDOException $e) {
                      echo '<br><br>function.php:263〜272_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                     };               
                }else{ echo "指定の型番、管理番号は指定の発工程にありません。<br>" ; } ;                                       
           } ;

        }elseif(!empty($_POST["保留数"]) && !empty($MinusAdminNum_TYPE1check[0]))
        {  
                foreach($Sum0ornot_TYPE1check_NGorSTOP[0] as $key => $value)
                {    if($value >= 1)
                     {

                     try{

                        if(empty($ItemNumCheck[0])){$ItemNumCheck[0] = NULL ;} ;
                        $db->QuerySql("insert into `process_progress`
                        (入力日,品名,品番,管理番号,数量,シリアル,受工程,規格1,入力者,シリアル工程,exe_flg)
                        values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum_TYPE1check[0]}',-1*{$PAmount}-{$NGAmount}-{$StopAmount},'{$Serial}','{$FromProcess}','{$ItemNumCheck[0]}','{$Member}','{$SerialProcess}',2);");

                        $STSerialProcess = $PName.'ST'.$Serial.$FromProcess.$PNumber;
                        $db->QuerySql("insert into `process_progress`
                        (入出庫日,入力日,品名,品番,管理番号,シリアル,受工程,保留数,規格1,備考,入力者,シリアル工程,工程キー,exe_flg)
                        values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum_TYPE1check[0]}','{$Serial}','{$FromProcess}','{$StopAmount}','{$ItemNumCheck[0]}',
                        '{$Notice}','{$Member}','{$STSerialProcess}','{$FromProcess}',0);"); 
                      
                      
                      }catch(PDOException $e) {
                        echo '<br><br>function.php:287〜295_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                      };        
                    }else{ echo "指定の型番、管理番号は指定の発工程にありません。<br>" ; } ;                                       
                } ;


        }elseif(!empty($_POST["損品数"]) && !empty($MinusAdminNum_TYPE1check[0]))
        {
               foreach($Sum0ornot_TYPE1check_NGorSTOP[0] as $key => $value)
               {    if($value >= 1 )
                      {

                      try{

                          if(empty($ItemNumCheck[0])){$ItemNumCheck[0] = NULL ;} ;
                          $db->QuerySql("insert into `process_progress`
                          (入力日,品名,品番,管理番号,数量,シリアル,受工程,入力者,規格1,シリアル工程,exe_flg)
                          values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum_TYPE1check[0]}',-1*{$PAmount}-{$NGAmount}-{$StopAmount},'{$Serial}','{$FromProcess}','{$Member}','{$ItemNumCheck[0]}','{$SerialProcess}',2);");

                          $NGSerialProcess = $PName.'NG'.$Serial.$FromProcess.$PNumber ;
                          $db->QuerySql("insert into `process_progress`
                          (入出庫日,入力日,品名,品番,管理番号,シリアル,受工程,損品数,規格1,備考,入力者,シリアル工程,工程キー,exe_flg)
                          values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum_TYPE1check[0]}','{$Serial}','{$FromProcess}','{$NGAmount}',
                          '{$ItemNumCheck[0]}','{$Notice}','{$Member}','{$NGSerialProcess}','{$FromProcess}',0);");

                          $db->QuerySql("insert into `NGtable`
                          (入力日,入力者,入出庫日,品名,管理番号,型番,シリアル,工程,規格1,NG理由,exe_flg)
                          values ('{$IDate}','{$Member}','{$IODATE}','{$PName}','{$MinusAdminNum_TYPE1check[0]}','{$PNumber}','{$Serial}','{$FromProcess}','{$ItemNumCheck[0]}','{$Notice}',0);");

                      }catch(PDOException $e) {
                       echo '<br><br>function.php:313〜326_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                      };

                    }else{echo "指定の部材、シリアルは指定の発工程に在庫はありません。" ; } ; 
                } ;
        }else{echo "指定の部材、シリアルは指定の発工程に在庫はありません。" ; } ; 
*/
  }else
  {


        if(!empty($_POST["数量"]) && !empty($MinusAdminNum[0]))
        {
                 foreach($Sum0ornot[0] as $key => $value)
                        { if($value >= 1 )
                            {

                              try{

                                  $db->QuerySql("insert into `process_progress`
                                  (入力日,品名,品番,管理番号,数量,シリアル,受工程,入力者,シリアル工程,exe_flg)
                                  values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum[0]}',-1*{$PAmount}-{$NGAmount}-{$StopAmount},'{$Serial}','{$FromProcess}','{$Member}','{$SerialProcess}',2);");
  
                                  $SerialProcess = $PName.$Serial.$ToProcess.$PNumber ;
                                  $db->QuerySql("insert into `process_progress`
                                  (入出庫日,入力日,品名,品番,管理番号,シリアル,数量,発工程,受工程,規格1,規格2,備考,入力者,工程キー,シリアル工程,exe_flg)
                                  values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$AdminNum}','{$Serial}','{$PAmount}','{$FromProcess}',
                                  '{$ToProcess}','{$ItemNum}','{$OrderNum}','{$Notice}','{$Member}','{$ProcessKey}','{$SerialProcess}',0 );");

                             }catch(PDOException $e) {
                              echo '<br><br>function.php:313〜326_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                             };

                           }else{echo "指定の部材、シリアルは指定の発工程に在庫はありません。" ; } ; 
                        };
        }elseif(!empty(($_POST["保留数"])) && !empty($MinusAdminNum[0]))
        {
             foreach($Sum0ornot[0] as $key => $value)
                    { if($value >= 1)
                        {

                         try{

                             $db->QuerySql("insert into `process_progress`
                             (入力日,品名,品番,管理番号,数量,シリアル,受工程,入力者,シリアル工程,exe_flg)
                             values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum[0]}',-1*{$PAmount}-{$NGAmount}-{$StopAmount},'{$Serial}','{$FromProcess}','{$Member}','{$SerialProcess}',2);");
  
                             $STSerialProcess = $PName.'ST'.$Serial.$FromProcess.$PNumber ;
                             $db->QuerySql("insert into `process_progress`
                             (入出庫日,入力日,品名,品番,管理番号,シリアル,受工程,損品数,保留数,規格1,備考,入力者,シリアル工程,工程キー,exe_flg)
                             values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum[0]}','{$Serial}','{$FromProcess}','{$NGAmount}','{$StopAmount}','{$ItemNum}',
                             '{$Notice}','{$Member}','{$STSerialProcess}','{$FromProcess}',0);");  
  
                            }catch(PDOException $e) {
                             echo '<br><br>function.php:313〜326_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                            };
                        }else{echo "指定の部材、シリアルは指定の発工程に在庫はありません。" ; } ; 
                   };

        }elseif(!empty(($_POST["損品数"])) && !empty($MinusAdminNum[0]))
        {
             foreach($Sum0ornot[0] as $key => $value)
                    { if($value >= 1)
                        {

                         try{
  
                             $db->QuerySql("insert into `process_progress`
                             (入力日,品名,品番,管理番号,数量,シリアル,受工程,入力者,シリアル工程,exe_flg)
                             values ('{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum[0]}',-1*{$PAmount}-{$NGAmount}-{$StopAmount},'{$Serial}','{$FromProcess}','{$Member}','{$SerialProcess}',2);");
  
                             $NGSerialProcess = $PName.'NG'.$Serial.$FromProcess.$PNumber ;
                             $db->QuerySql("insert into `process_progress`
                             (入出庫日,入力日,品名,品番,管理番号,シリアル,受工程,損品数,保留数,規格1,備考,入力者,シリアル工程,工程キー,exe_flg)
                             values ('{$IODATE}','{$IDate}','{$PName}','{$PNumber}','{$MinusAdminNum[0]}','{$Serial}','{$FromProcess}','{$NGAmount}',
                             '{$StopAmount}','{$ItemNum}','{$Notice}','{$Member}','{$NGSerialProcess}','{$FromProcess}',0);");
  
                             $db->QuerySql("insert into `NGtable`
                             (入力日,入力者,入出庫日,品名,管理番号,型番,シリアル,工程,規格1,規格2,NG理由,exe_flg)
                             values ('{$IDate}','{$Member}','{$IODATE}','{$PName}','{$MinusAdminNum[0]}','{$PNumber}','{$Serial}','{$FromProcess}','{$ItemNum}','{$OrderNum}','{$Notice}',0);"); 

                            }catch(PDOException $e) {
                             echo '<br><br>function.php:313〜326_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                            };

                        }else{echo "指定の部材、シリアルは指定の発工程に在庫はありません。" ; } ; 

                   };
        }else{echo "指定の部材、シリアルは指定の発工程に在庫はありません。" ; } ; 

  } ;
  /*
              if(empty($flglock)){
              $dplSerial = $db->Select("SELECT シリアル工程 FROM process_progress where dplx_flg = 0 GROUP BY シリアル工程  HAVING COUNT(シリアル工程) > 1 ; ");
              $db->QuerySql("update process_progress set dplx_flg = 1 where シリアル工程 = '{$dplSerial}' and dplx_flg = 0 ;");
              unset($flglock);
                                 } ;
  /*
             if(!empty($AdminNum)){touch('./TYPE1/'.$AdminNum.'_'.$PName.'&'.$PNumber);};

             if(!empty($AdminNum)){touch('./TYPE1/'.$PName.'_'.$PNumber.'&'.$AdminNum);};

             !empty($AdminNum) && $ToProcess == $TYPE1check[0] || $LIST[3] == $TYPE1check[1] || $LIST[3] == $TYPE1check[2]
  */

             if(!empty($ItemNum)){$ItemNum2 = $ItemNum ; }else{$ItemNum2 = "" ;} ;
             if( $ToProcess == "/".$TYPE1check[0]."/" || $ToProcess == "/".$TYPE1check[1]."/" || $ToProcess == "/".$TYPE1check[2]."/" )
                {
                 if(!is_dir('./TYPE1/'.$ToProcess.'/')){ mkdir( './TYPE1/'.$ToProcess.'/' ); } ; 
                 if(!file_exists('./TYPE1/'.$ToProcess.'/'.$PName.'_'.$PNumber.'&'.$AdminNum.'@'.$ItemNum2.';')){ touch('./TYPE1/'.$ToProcess.'/'.$PName.'_'.$PNumber.'&'.$AdminNum.'@'.$ItemNum2.';'); } ;

                }elseif( $ToProcess == "/".$Serialcheck[0]."/" || $ToProcess == "/".$Serialcheck[1]."/" || $ToProcess == "/".$Serialcheck[2]."/" )
                {
                  if(!is_dir('./TYPE1/'.$ToProcess.'/')){ mkdir( './TYPE1/'.$ToProcess.'/' ); } ; 
                  if(!file_exists('./TYPE1/'.$ToProcess.'/'.$PName.'_'.$PNumber.'&'.$AdminNum.'@'.';'.$Serial )){ touch('./TYPE1/'.$ToProcess.'/'.$PName.'_'.$PNumber.'&'.$AdminNum.'@'.';'.$Serial); } ;
                }else{
                 if(!is_dir('./TYPE1/'.$ToProcess.'/')){ mkdir( './TYPE1/'.$ToProcess.'/' ); } ; 
                 if(!file_exists('./TYPE1/'.$ToProcess.'/'.$PName.'_'.$PNumber.'&'.$AdminNum.'@')){ touch('./TYPE1/'.$ToProcess.'/'.$PName.'_'.$PNumber.'&'.$AdminNum.'@'); } ;
                };


        if($ToProcess = "/".$OrderBreak[0]."/" || $ToProcess = "/".$OrderBreak[1]."/" || $ToProcess = "/".$OrderBreak[2]."/" )
        {

                try{

                /* $aa = $db->QuerySql("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 管理番号 = '{$AdminNum}' ;" ) ; */
                  $aa = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 管理番号 = '{$AdminNum}' and 品名 = '{$PName}' ;" );
                   if(empty($aa[0])){echo "0"; $aa = 0;}else{foreach($aa[0] as $key => $val1){ $aa = $val1 ;};};

                  $bb = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg = 0 and 管理番号 = '{$AdminNum}' and 受工程 = '{$ToProcess}' and 品名 = '{$PName}' ;" );
                   if(empty($bb[0])){echo "0"; $bb = 0;}else{foreach($bb[0] as $key => $val2){ $bb = $val2 ; };};
                 if($aa == $bb){$db->QuerySql("UPDATE IOSchedule SET exe_flg = 1 where exe_flg = 0 and 管理番号 = '{$AdminNum}' and 品名 = '{$PName}' ;");};

                }catch(PDOException $e) {
                        echo '<br><br>function.php:278〜283_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                        };

        } ;




			  /*DB処理後は、在庫数全体の正負チェックをする。チェックに必要な値をDB処理後の数値の合計から取るため、変数に格納する。*/

   /** */

                          try{
			  $TPSumlist0 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST0}' and 品名 = '{$PName}' ;");
			  $TPSumlist1 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST1}' and 品名 = '{$PName}' ;");
			  $TPSumlist2 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST2}' and 品名 = '{$PName}' ;");
			  $TPSumlist3 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST3}' and 品名 = '{$PName}' ;");
			  $TPSumlist4 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST4}' and 品名 = '{$PName}' ;");
			  $TPSumlist5 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST5}' and 品名 = '{$PName}' ;");
			  $TPSumlist6 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST6}' and 品名 = '{$PName}' ;");
                          $TPSumlist7 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST7}' and 品名 = '{$PName}' ;");
                          $TPSumlist8 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST8}' and 品名 = '{$PName}' ;");
                          $TPSumlist9 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST9}' and 品名 = '{$PName}' ;");
                          $TPSumlist10 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST10}' and 品名 = '{$PName}' ;");
                          $TPSumlist11 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST11}' and 品名 = '{$PName}' ;");
                          $TPSumlist12 = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST12}' and 品名 = '{$PName}' ;");
			  $TNGSumlist0 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST0}' and 品名 = '{$PName}' ;");
			  $TNGSumlist1 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST1}' and 品名 = '{$PName}' ;");
			  $TNGSumlist2 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST2}' and 品名 = '{$PName}' ;");
			  $TNGSumlist3 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST3}' and 品名 = '{$PName}' ;");
			  $TNGSumlist4 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST4}' and 品名 = '{$PName}' ;");
			  $TNGSumlist5 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST5}' and 品名 = '{$PName}' ;");
			  $TNGSumlist6 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST6}' and 品名 = '{$PName}' ;");
                          $TNGSumlist7 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST7}' and 品名 = '{$PName}' ;");
                          $TNGSumlist8 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST8}' and 品名 = '{$PName}' ;");
                          $TNGSumlist9 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST9}' and 品名 = '{$PName}' ;");
                          $TNGSumlist10 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST10}' and 品名 = '{$PName}' ;");
                          $TNGSumlist11 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST11}' and 品名 = '{$PName}' ;");
                          $TNGSumlist12 = $db->SelectSumAll("SELECT SUM(損品数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST12}' and 品名 = '{$PName}' ;");
			  $STSumlist0 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST0}' and 品名 = '{$PName}' ;");
			  $STSumlist1 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST1}' and 品名 = '{$PName}' ;");
			  $STSumlist2 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST2}' and 品名 = '{$PName}' ;");
			  $STSumlist3 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST3}' and 品名 = '{$PName}' ;");
			  $STSumlist4 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST4}' and 品名 = '{$PName}' ;");
			  $STSumlist5 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST5}' and 品名 = '{$PName}' ;");
			  $STSumlist6 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST6}' and 品名 = '{$PName}' ;");
                          $STSumlist7 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST7}' and 品名 = '{$PName}' ;");
                          $STSumlist8 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST8}' and 品名 = '{$PName}' ;");
                          $STSumlist9 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST9}' and 品名 = '{$PName}' ;");
                          $STSumlist10 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST10}' and 品名 = '{$PName}' ;");
                          $STSumlist11 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST11}' and 品名 = '{$PName}' ;");
                          $STSumlist12 = $db->SelectSumAll("SELECT SUM(保留数) FROM process_progress WHERE exe_flg != 1 and 受工程 = '{$LIST12}' and 品名 = '{$PName}' ;");

                        }catch(PDOException $e) {
                                echo '<br><br>function.php:299〜337_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                                };

				 foreach($TPSumlist0[0] as $key => $value){if($value < 0){$PSum0 = $value;} };
				 foreach($TPSumlist1[0] as $key => $value){if($value < 0){$PSum1 = $value;} };
				 foreach($TPSumlist2[0] as $key => $value){if($value < 0){$PSum2 = $value;} };
				 foreach($TPSumlist3[0] as $key => $value){if($value < 0){$PSum3 = $value;} };
				 foreach($TPSumlist4[0] as $key => $value){if($value < 0){$PSum4 = $value;} };
				 foreach($TPSumlist5[0] as $key => $value){if($value < 0){$PSum5 = $value;} };
				 foreach($TPSumlist6[0] as $key => $value){if($value < 0){$PSum6 = $value;} };
                                 foreach($TPSumlist7[0] as $key => $value){if($value < 0){$PSum7 = $value;} };
                                 foreach($TPSumlist8[0] as $key => $value){if($value < 0){$PSum8 = $value;} };
                                 foreach($TPSumlist9[0] as $key => $value){if($value < 0){$PSum9 = $value;} };
                                 foreach($TPSumlist10[0] as $key => $value){if($value < 0){$PSum10 = $value;} };
                                 foreach($TPSumlist11[0] as $key => $value){if($value < 0){$PSum11 = $value;} };
                                 foreach($TPSumlist12[0] as $key => $value){if($value < 0){$PSum12 = $value;} };
				 foreach($TNGSumlist0[0] as $key => $value){if($value < 0){$NGSum0 = $value;} };
				 foreach($TNGSumlist1[0] as $key => $value){if($value < 0){$NGSum1 = $value;} };
				 foreach($TNGSumlist2[0] as $key => $value){if($value < 0){$NGSum2 = $value;} };
				 foreach($TNGSumlist3[0] as $key => $value){if($value < 0){$NGSum3 = $value;} };
				 foreach($TNGSumlist4[0] as $key => $value){if($value < 0){$NGSum4 = $value;} };
				 foreach($TNGSumlist5[0] as $key => $value){if($value < 0){$NGSum5 = $value;} };
				 foreach($TNGSumlist6[0] as $key => $value){if($value < 0){$NGSum6 = $value;} };
                                 foreach($TNGSumlist7[0] as $key => $value){if($value < 0){$NGSum7 = $value;} };
                                 foreach($TNGSumlist8[0] as $key => $value){if($value < 0){$NGSum8 = $value;} };
                                 foreach($TNGSumlist9[0] as $key => $value){if($value < 0){$NGSum9 = $value;} };
                                 foreach($TNGSumlist10[0] as $key => $value){if($value < 0){$NGSum10 = $value;} };
                                 foreach($TNGSumlist11[0] as $key => $value){if($value < 0){$NGSum11 = $value;} };
                                 foreach($TNGSumlist12[0] as $key => $value){if($value < 0){$NGSum12 = $value;} };
				 foreach($STSumlist0[0] as $key => $value){if($value < 0){$STSum0 = $value;} };
				 foreach($STSumlist1[0] as $key => $value){if($value < 0){$STSum1 = $value;} };
				 foreach($STSumlist2[0] as $key => $value){if($value < 0){$STSum2 = $value;} };
				 foreach($STSumlist3[0] as $key => $value){if($value < 0){$STSum3 = $value;} };
				 foreach($STSumlist4[0] as $key => $value){if($value < 0){$STSum4 = $value;} };
				 foreach($STSumlist5[0] as $key => $value){if($value < 0){$STSum5 = $value;} };
				 foreach($STSumlist6[0] as $key => $value){if($value < 0){$STSum6 = $value;} };
                                 foreach($STSumlist7[0] as $key => $value){if($value < 0){$STSum7 = $value;} };
                                 foreach($STSumlist8[0] as $key => $value){if($value < 0){$STSum8 = $value;} };
                                 foreach($STSumlist9[0] as $key => $value){if($value < 0){$STSum9 = $value;} };
                                 foreach($STSumlist10[0] as $key => $value){if($value < 0){$STSum10 = $value;} };
                                 foreach($STSumlist11[0] as $key => $value){if($value < 0){$STSum11 = $value;} };
                                 foreach($STSumlist12[0] as $key => $value){if($value < 0){$STSum12 = $value;} };

                                 if(empty($PSum0)){$PSum0 = 0;}
				 if(empty($PSum1)){$PSum1 = 0;}
				 if(empty($PSum2)){$PSum2 = 0;}
				 if(empty($PSum3)){$PSum3 = 0;}
				 if(empty($PSum4)){$PSum4 = 0;}
				 if(empty($PSum5)){$PSum5 = 0;}
				 if(empty($PSum6)){$PSum6 = 0;}
                                 if(empty($PSum7)){$PSum7 = 0;}
                                 if(empty($PSum8)){$PSum8 = 0;}
                                 if(empty($PSum9)){$PSum9 = 0;}
                                 if(empty($PSum10)){$PSum10 = 0;}
                                 if(empty($PSum11)){$PSum11 = 0;}
                                 if(empty($PSum12)){$PSum12 = 0;}
				 if(empty($NGSum0)){$NGSum0 = 0;}
				 if(empty($NGSum1)){$NGSum1 = 0;}
				 if(empty($NGSum2)){$NGSum2 = 0;}
				 if(empty($NGSum3)){$NGSum3 = 0;}
				 if(empty($NGSum4)){$NGSum4 = 0;}
				 if(empty($NGSum5)){$NGSum5 = 0;}
				 if(empty($NGSum6)){$NGSum6 = 0;}
                                 if(empty($NGSum7)){$NGSum7 = 0;}
                                 if(empty($NGSum8)){$NGSum8 = 0;}
                                 if(empty($NGSum9)){$NGSum9 = 0;}
                                 if(empty($NGSum10)){$NGSum10 = 0;}
                                 if(empty($NGSum11)){$NGSum11 = 0;}
                                 if(empty($NGSum12)){$NGSum12 = 0;}
				 if(empty($STSum0)){$STSum0 = 0;}
				 if(empty($STSum1)){$STSum1 = 0;}
				 if(empty($STSum2)){$STSum2 = 0;}
				 if(empty($STSum3)){$STSum3 = 0;}
				 if(empty($STSum4)){$STSum4 = 0;}
				 if(empty($STSum5)){$STSum5 = 0;}
				 if(empty($STSum6)){$STSum6 = 0;}
                                 if(empty($STSum7)){$STSum7 = 0;}
                                 if(empty($STSum8)){$STSum8 = 0;}
                                 if(empty($STSum9)){$STSum9 = 0;}
                                 if(empty($STSum10)){$STSum10 = 0;}
                                 if(empty($STSum11)){$STSum11 = 0;}
                                 if(empty($STSum12)){$STSum12 = 0;}

              /*在庫なので、値は正でなくてはならない。負の数になる場合は入力内容のexe_flgを1にして集計から除外し、在庫表を示す。*/

  /** */
               if($PSum1 < 0 || $PSum2 < 0 || $PSum3 < 0 || $PSum4 < 0 || $PSum5 < 0 || $PSum6 < 0
			     || $NGSum0 < 0 || $NGSum1 < 0 || $NGSum2 < 0 || $NGSum3 < 0 || $NGSum4 < 0 || $NGSum5 < 0 || $NGSum6 < 0
			     || $STSum0 < 0 || $STSum1 < 0 || $STSum2 < 0 || $STSum3 < 0 || $STSum4 < 0 || $STSum5 < 0 || $STSum6 < 0
                             || $PSum7 < 0 || $PSum8 < 0 || $PSum9 < 0 || $PSum10 < 0 || $PSum11 < 0 || $PSum12 < 0
                             || $NGSum7 < 0 || $NGSum8 < 0 || $NGSum9 < 0 || $NGSum10 < 0 || $NGSum11 < 0 || $NGSum12 < 0
                             || $STSum7 < 0 || $STSum8 < 0 || $STSum9 < 0 || $STSum10 < 0 || $STSum11 < 0 || $STSum12 < 0
			     ){ echo "$PName"."の在庫がマイナスしています。処理を中断します。";

                                try{


                                   if(!empty($_POST["損品数"])){
		                      $db->QuerySql("UPDATE process_progress SET exe_flg = 1 where  品名 = '{$PName}' and 入力日 = '{$IDate}' and 入力者 = '{$Member}' order by AUTO_ID desc limit 2;");
                                      $db->QuerySql("UPDATE NGtable SET exe_flg = 1 where  品名 = '{$PName}' and 入力日 = '{$IDate}' and 入力者 = '{$Member}' order by AUTO_ID desc limit 1;");
                                     }elseif(!empty($_POST["損品数"])){
                                      $db->QuerySql("UPDATE process_progress SET exe_flg = 1 where  品名 = '{$PName}' and 入力日 = '{$IDate}' and 入力者 = '{$Member}' order by AUTO_ID desc limit 2;");
                                     }else{
	                              $db->QuerySql("UPDATE process_progress SET exe_flg = 1 where  品名 = '{$PName}' and 入力日 = '{$IDate}' and 入力者 = '{$Member}' order by AUTO_ID desc limit 2;");
				     }


                                }catch(PDOException $e) {
                                        echo '<br><br>function.php:438〜443_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                                        };

                   include('allstocktable.php');


				  }else{

 /**/
              /* 値が正なら、DB処理に介入せず、入力内容を示す。*/
              echo "$PName".'の入力内容は以下の通りです。<br>'; 
?>
              <table class="table table-striped table-dark">
              <thead>
              <tr>
              <th scope="col">入力日</th>
　　　　　　　<th scope="col">入出庫日</th>
　　　　　　　<th scope="col">管理番号</th>
              <th scope="col">品名</th>
              <th scope="col">型番</th>
              <th scope="col">シリアル</th>
              <th scope="col">数量</th>
              <th scope="col">発工程</th>
              <th scope="col">受工程</th>
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

               try{

               $MemPhrase = "and 入力日 = '{$IDate}' and 品名 = '$PName' and 入力者 = '$Member' order by AUTO_ID desc  limit 1";

               $dsn = "mysql:dbname=$name;host=$hostphrase;charset=utf8mb4";
               $user = 'admin';
               $password =$pass;
               $dbh = new PDO($dsn,$user,$password);
               $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               $sql1 =  'SELECT * FROM process_progress WHERE exe_flg = 0 '.$MemPhrase;


                     $stmt=$dbh->prepare($sql1);
                     $stmt->execute();
                     while(1){
                           $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                           if($rec==false) break;?>
                           <tr>
                           <th scope="row"><?php print $rec['入力日'] ?></th><td>
                           <?php print $rec['入出庫日'];?></td><td>
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
                           };

                        }catch(PDOException $e) {
                                echo '<br><br>function.php:503〜517_処理に失敗しました。管理者にお問合せ下さい。<br><br>';
                                };



						} ; 


} ;
?>






 <form class="container" action="index.php" method="get">
  <div class="form-group">
    <label for="HINMEI"></label><br>
    <input id="PName208032"  type = "hidden"  name="品名2" class="form-control" value="<?php echo $_POST['品名1'];?>"/>
  </div>                  
  <div class="fixed-bottom mx-0 bg-black bg-opacity-75 text-center text-white">
    <button class="regist ml-4" type="submit" > 確認</button>
  </div>
 </form>
