<?php
/* https://getbootstrap.jp/docs/4.3/content/tables/ */
$result = glob('./p/'.'*');
foreach($result as $key => $value){ $str = basename($value); $str = str_replace(".php","",$str);$p[] = $str;}


$modeling =  array_unique($p);?>


<div class="table-responsive">
<table class="table text-nowrap">
<thead>
<tr>
<th scope="col">品名</th>
<th scope="col">昨日までの入出庫</th>
<th scope="col"><?php echo date("Y-m-d");?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+1 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+2 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+3 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+4 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+5 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+6 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+7 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+8 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+9 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+10 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+11 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+12 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+13 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+14 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+15 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+16 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+17 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+18 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+19 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+20 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+21 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+22 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+23 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+24 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+25 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+26 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+27 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+28 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+29 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+30 day"));?></th>
<th scope="col"><?php echo date("Y-m-d",strtotime("+31 day"));?></th>


</tr>
</thead>
<tbody>
<tr>
<?php foreach($modeling as $key => $value){?><th scope="row"><?php echo $value . "：投入予定数量" ; ?></th><?php 
  $Input_Amount0 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = curdate() and レコード種別 = '投入予定' ;"); ?>
  <td><?php $db->QuerySql("set @today = curdate()  ;"); $Today = $db->Select("select @today ;"); 
   $Input_Amount = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 < '{$Today}' and レコード種別 = '投入予定' ;"); ?>
   <?php if(empty($Input_Amount[0])){echo "0"; $beforetodayinput = 0; }else{foreach($Input_Amount[0] as $key => $val0){echo $val0; $beforetodayinput = $val0;};}; ?>
  </td>
  <td><?php if(empty($Input_Amount0[0])){echo "0"; $todayinput = 0; }else{foreach($Input_Amount0[0] as $key => $val){echo $val; $todayinput = $val;};}; ?></td><?php

  $db->QuerySql("set @day1 = adddate(curdate(),interval 1 day ) ;");
  $Day1 = $db->Select("select @day1 ;");
  $Input_Amount1 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day1}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount1[0])){echo "0"; $day1INvalue = 0;}else{foreach($Input_Amount1[0] as $key => $val2){echo $val2; $day1INvalue = $val2;};}; ?></td><?php

  $db->QuerySql("set @day2 = adddate(curdate(),interval 2 day );");
  $Day2 = $db->Select("select @day2 ;");
  $Input_Amount2 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day2}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount2[0])){echo "0"; $day2INvalue = 0;}else{foreach($Input_Amount2[0] as $key => $val4){echo $val4; $day2INvalue = $val4;};}; ?></td><?php

  $db->QuerySql("set @day3 = adddate(curdate(),interval 3 day );");
  $Day3 = $db->Select("select @day3 ;");
  $Input_Amount3 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day3}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount3[0])){echo "0"; $day3INvalue = 0;}else{foreach($Input_Amount3[0] as $key => $val6){echo $val6; $day3INvalue = $val6;};}; ?></td><?php

  $db->QuerySql("set @day4 = adddate(curdate(),interval 4 day );");
  $Day4 = $db->Select("select @day4 ;");
  $Input_Amount4 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day4}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount4[0])){echo "0"; $day4INvalue = 0;}else{foreach($Input_Amount4[0] as $key => $val8){echo $val8; $day4INvalue = $val8;};}; ?></td><?php

  $db->QuerySql("set @day5 = adddate(curdate(),interval 5 day );");
  $Day5 = $db->Select("select @day5 ;");
  $Input_Amount5 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day5}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount5[0])){echo "0"; $day5INvalue = 0;}else{foreach($Input_Amount5[0] as $key => $val10){echo $val10; $day5INvalue = $val10;};}; ?></td><?php

  $db->QuerySql("set @day6 = adddate(curdate(),interval 6 day );");
  $Day6 = $db->Select("select @day6 ;");
  $Input_Amount6 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day6}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount6[0])){echo "0"; $day6INvalue = 0;}else{foreach($Input_Amount6[0] as $key => $val12){echo $val12; $day6INvalue = $val12;};}; ?></td><?php

  $db->QuerySql("set @day7 = adddate(curdate(),interval 7 day );");
  $Day7 = $db->Select("select @day7 ;");
  $Input_Amount7 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day7}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount7[0])){echo "0"; $day7INvalue = 0;}else{foreach($Input_Amount7[0] as $key => $val14){echo $val14; $day7INvalue = $val14;};}; ?></td><?php

  $db->QuerySql("set @day8 = adddate(curdate(),interval 8 day );");
  $Day8 = $db->Select("select @day8 ;");
  $Input_Amount8 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day8}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount8[0])){echo "0"; $day8INvalue = 0;}else{foreach($Input_Amount8[0] as $key => $val16){echo $val16; $day8INvalue = $val16;};}; ?></td><?php

  $db->QuerySql("set @day9 = adddate(curdate(),interval 9 day );");
  $Day9 = $db->Select("select @day9 ;");
  $Input_Amount9 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day9}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount9[0])){echo "0"; $day9INvalue = 0;}else{foreach($Input_Amount9[0] as $key => $val18){echo $val18; $day9INvalue = $val18;};}; ?></td><?php

  $db->QuerySql("set @day10 = adddate(curdate(),interval 10 day );");
  $Day10 = $db->Select("select @day10 ;");
  $Input_Amount10 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day10}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount10[0])){echo "0"; $day10INvalue = 0;}else{foreach($Input_Amount10[0] as $key => $val20){echo $val20; $day10INvalue = $val20;};}; ?></td><?php

  $db->QuerySql("set @day11 = adddate(curdate(),interval 11 day );");
  $Day11 = $db->Select("select @day11 ;");
  $Input_Amount11 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day11}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount11[0])){echo "0"; $day11INvalue = 0;}else{foreach($Input_Amount11[0] as $key => $val22){echo $val22; $day11INvalue = $val22;};}; ?></td><?php

  $db->QuerySql("set @day12 = adddate(curdate(),interval 12 day );");
  $Day12 = $db->Select("select @day12 ;");
  $Input_Amount12 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day12}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount12[0])){echo "0"; $day12INvalue = 0;}else{foreach($Input_Amount12[0] as $key => $val24){echo $val24; $day12INvalue = $val24;};}; ?></td><?php

  $db->QuerySql("set @day13 = adddate(curdate(),interval 13 day );");
  $Day13 = $db->Select("select @day13 ;");
  $Input_Amount13 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day13}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount13[0])){echo "0"; $day13INvalue = 0;}else{foreach($Input_Amount13[0] as $key => $val26){echo $val26; $day13INvalue = $val26;};}; ?></td><?php

  $db->QuerySql("set @day14 = adddate(curdate(),interval 14 day );");
  $Day14 = $db->Select("select @day14 ;");
  $Input_Amount14 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day14}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount14[0])){echo "0"; $day14INvalue = 0;}else{foreach($Input_Amount14[0] as $key => $val28){echo $val28; $day14INvalue = $val28;};}; ?></td><?php

  $db->QuerySql("set @day15 = adddate(curdate(),interval 15 day );");
  $Day15 = $db->Select("select @day15 ;");
  $Input_Amount15 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day15}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount15[0])){echo "0"; $day15INvalue = 0;}else{foreach($Input_Amount15[0] as $key => $val30){echo $val30; $day15INvalue = $val30;};}; ?></td><?php

  $db->QuerySql("set @day16 = adddate(curdate(),interval 16 day );");
  $Day16 = $db->Select("select @day16 ;");
  $Input_Amount16 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day16}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount16[0])){echo "0"; $day16INvalue = 0;}else{foreach($Input_Amount16[0] as $key => $val32){echo $val32; $day16INvalue = $val32;};}; ?></td><?php

  $db->QuerySql("set @day17 = adddate(curdate(),interval 17 day );");
  $Day17 = $db->Select("select @day17 ;");
  $Input_Amount17 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day17}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount17[0])){echo "0"; $day17INvalue = 0;}else{foreach($Input_Amount17[0] as $key => $val34){echo $val34; $day17INvalue = $val34;};}; ?></td><?php

  $db->QuerySql("set @day18 = adddate(curdate(),interval 18 day );");
  $Day18 = $db->Select("select @day18 ;");
  $Input_Amount18 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day18}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount18[0])){echo "0"; $day18INvalue = 0;}else{foreach($Input_Amount18[0] as $key => $val36){echo $val36; $day18INvalue = $val36;};}; ?></td><?php

  $db->QuerySql("set @day19 = adddate(curdate(),interval 19 day );");
  $Day19 = $db->Select("select @day19 ;");
  $Input_Amount19 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day19}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount19[0])){echo "0"; $day19INvalue = 0;}else{foreach($Input_Amount19[0] as $key => $val38){echo $val38; $day19INvalue = $val38;};}; ?></td><?php

  $db->QuerySql("set @day20 = adddate(curdate(),interval 20 day );");
  $Day20 = $db->Select("select @day20 ;");
  $Input_Amount20 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day20}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount20[0])){echo "0"; $day20INvalue = 0;}else{foreach($Input_Amount20[0] as $key => $val40){echo $val40; $day20INvalue = $val40;};}; ?></td><?php


  $db->QuerySql("set @day21 = adddate(curdate(),interval 21 day );");
  $Day21 = $db->Select("select @day21 ;");
  $Input_Amount21 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day21}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount21[0])){echo "0"; $day21INvalue = 0;}else{foreach($Input_Amount21[0] as $key => $val42){echo $val42; $day21INvalue = $val42;};}; ?></td><?php

  $db->QuerySql("set @day22 = adddate(curdate(),interval 22 day );");
  $Day22 = $db->Select("select @day22 ;");
  $Input_Amount22 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day22}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount22[0])){echo "0"; $day22INvalue = 0;}else{foreach($Input_Amount22[0] as $key => $val44){echo $val44; $day22INvalue = $val44;};}; ?></td><?php

  $db->QuerySql("set @day23 = adddate(curdate(),interval 23 day );");
  $Day23 = $db->Select("select @day23 ;");
  $Input_Amount23 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day23}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount23[0])){echo "0"; $day23INvalue = 0;}else{foreach($Input_Amount23[0] as $key => $val46){echo $val46; $day23INvalue = $val46;};}; ?></td><?php

  $db->QuerySql("set @day24 = adddate(curdate(),interval 24 day );");
  $Day24 = $db->Select("select @day24 ;");
  $Input_Amount24 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day24}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount24[0])){echo "0"; $day24INvalue = 0;}else{foreach($Input_Amount24[0] as $key => $val48){echo $val48; $day24INvalue = $val48;};}; ?></td><?php

  $db->QuerySql("set @day25 = adddate(curdate(),interval 25 day );");
  $Day25 = $db->Select("select @day25 ;");
  $Input_Amount25 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day25}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount25[0])){echo "0"; $day25INvalue = 0;}else{foreach($Input_Amount25[0] as $key => $val50){echo $val50; $day25INvalue = $val50;};}; ?></td><?php

  $db->QuerySql("set @day26 = adddate(curdate(),interval 26 day );");
  $Day26 = $db->Select("select @day26 ;");
  $Input_Amount26 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day26}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount26[0])){echo "0"; $day26INvalue = 0;}else{foreach($Input_Amount26[0] as $key => $val52){echo $val52; $day26INvalue = $val52;};}; ?></td><?php


  $db->QuerySql("set @day27 = adddate(curdate(),interval 27 day );");
  $Day27 = $db->Select("select @day27 ;");
  $Input_Amount27 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day27}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount27[0])){echo "0"; $day27INvalue = 0;}else{foreach($Input_Amount27[0] as $key => $val54){echo $val54; $day27INvalue = $val54;};}; ?></td><?php

  $db->QuerySql("set @day28 = adddate(curdate(),interval 28 day );");
  $Day28 = $db->Select("select @day28 ;");
  $Input_Amount28 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day28}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount28[0])){echo "0"; $day28INvalue = 0;}else{foreach($Input_Amount28[0] as $key => $val56){echo $val56; $day28INvalue = $val56;};}; ?></td><?php

  $db->QuerySql("set @day29 = adddate(curdate(),interval 29 day );");
  $Day29 = $db->Select("select @day29 ;");
  $Input_Amount29 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day29}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount29[0])){echo "0"; $day29INvalue = 0;}else{foreach($Input_Amount29[0] as $key => $val58){echo $val58; $day29INvalue = $val58;};}; ?></td><?php

  $db->QuerySql("set @day30 = adddate(curdate(),interval 30 day );");
  $Day30 = $db->Select("select @day30 ;");
  $Input_Amount30 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day30}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount30[0])){echo "0"; $day30INvalue = 0;}else{foreach($Input_Amount30[0] as $key => $val60){echo $val60; $day30INvalue = $val60;};}; ?></td><?php

  $db->QuerySql("set @day31 = adddate(curdate(),interval 31 day );");
  $Day31 = $db->Select("select @day31 ;");
  $Input_Amount31 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day31}' and レコード種別 = '投入予定' ;");?>
  <td><?php if(empty($Input_Amount31[0])){echo "0"; $day31INvalue = 0;}else{foreach($Input_Amount31[0] as $key => $val62){echo $val62; $day31INvalue = $val62;};}; ?></td>
  </tr><tr>



  <th scope="row"><?php echo $value . "：出庫予定数量" ; ?></th> 
  <?php $Output_Amount = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 < '{$Today}' and レコード種別 = '出荷予定';"); ?>
  <td><?php if(empty($Output_Amount[0])){echo "0"; $beforetodayoutput = 0;}else{foreach($Output_Amount[0] as $key => $valx){echo $valx; $beforetodayoutput = $valx;};}; ?></td>
  <?php $Output_Amount0 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = curdate() and レコード種別 = '出荷予定';"); ?>
  <td><?php if(empty($Output_Amount0[0])){echo "0"; $todayoutput = 0;}else{foreach($Output_Amount0[0] as $key => $val000){echo $val000; $todayoutput = $val000;};}; ?></td>

  <?php $Output_Amount1 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day1}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount1[0])){echo "0"; $day1OUTvalue = 0;}else{foreach($Output_Amount1[0] as $key => $val001){echo $val001; $day1OUTvalue = $val001;};}; ?></td>

  <?php $Output_Amount2 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day2}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount2[0])){echo "0"; $day2OUTvalue = 0;}else{foreach($Output_Amount2[0] as $key => $val002){echo $val002; $day2OUTvalue = $val002;};}; ?></td>

  <?php $Output_Amount3 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day3}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount3[0])){echo "0"; $day3OUTvalue = 0;}else{foreach($Output_Amount3[0] as $key => $val003){echo $val003; $day3OUTvalue = $val003;};}; ?></td>

  <?php $Output_Amount4 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day4}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount4[0])){echo "0"; $day4OUTvalue = 0;}else{foreach($Output_Amount4[0] as $key => $val004){echo $val004; $day4OUTvalue = $val004;};}; ?></td>

  <?php $Output_Amount5 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day5}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount5[0])){echo "0"; $day5OUTvalue = 0;}else{foreach($Output_Amount5[0] as $key => $val005){echo $val005; $day5OUTvalue = $val005;};}; ?></td>

  <?php $Output_Amount6 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day6}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount6[0])){echo "0"; $day6OUTvalue = 0;}else{foreach($Output_Amount6[0] as $key => $val006){echo $val006; $day6OUTvalue = $val006;};}; ?></td>

  <?php $Output_Amount7 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day7}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount7[0])){echo "0"; $day7OUTvalue = 0;}else{foreach($Output_Amount7[0] as $key => $val007){echo $val007; $day7OUTvalue = $val007;};}; ?></td>

  <?php $Output_Amount8 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day8}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount8[0])){echo "0"; $day8OUTvalue = 0;}else{foreach($Output_Amount8[0] as $key => $val008){echo $val008; $day8OUTvalue = $val008;};}; ?></td>

  <?php $Output_Amount9 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day9}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount9[0])){echo "0"; $day9OUTvalue = 0;}else{foreach($Output_Amount9[0] as $key => $val009){echo $val009; $day9OUTvalue = $val009;};}; ?></td>

  <?php $Output_Amount10 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day10}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount10[0])){echo "0"; $day10OUTvalue = 0;}else{foreach($Output_Amount10[0] as $key => $val010){echo $val010; $day10OUTvalue = $val010;};}; ?></td>

  <?php $Output_Amount11 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day11}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount11[0])){echo "0"; $day11OUTvalue = 0;}else{foreach($Output_Amount11[0] as $key => $val011){echo $val011; $day11OUTvalue = $val011;};}; ?></td>

  <?php $Output_Amount12 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day12}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount12[0])){echo "0"; $day12OUTvalue = 0;}else{foreach($Output_Amount12[0] as $key => $val012){echo $val012; $day12OUTvalue = $val012;};}; ?></td>

  <?php $Output_Amount13 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day13}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount13[0])){echo "0"; $day13OUTvalue = 0;}else{foreach($Output_Amount13[0] as $key => $val013){echo $val013; $day13OUTvalue = $val013;};}; ?></td>

  <?php $Output_Amount14 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day14}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount14[0])){echo "0"; $day14OUTvalue = 0;}else{foreach($Output_Amount14[0] as $key => $val014){echo $val014; $day14OUTvalue = $val014;};}; ?></td>

  <?php $Output_Amount15 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day15}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount15[0])){echo "0"; $day15OUTvalue = 0;}else{foreach($Output_Amount15[0] as $key => $val015){echo $val015; $day15OUTvalue = $val015;};}; ?></td>

  <?php $Output_Amount16 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day16}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount16[0])){echo "0"; $day16OUTvalue = 0;}else{foreach($Output_Amount16[0] as $key => $val016){echo $val016; $day16OUTvalue = $val016;};}; ?></td>

  <?php $Output_Amount17 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day17}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount17[0])){echo "0"; $day17OUTvalue = 0;}else{foreach($Output_Amount17[0] as $key => $val017){echo $val017; $day17OUTvalue = $val017;};}; ?></td>

  <?php $Output_Amount18 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day18}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount18[0])){echo "0"; $day18OUTvalue = 0;}else{foreach($Output_Amount18[0] as $key => $val018){echo $val018; $day18OUTvalue = $val018;};}; ?></td>

  <?php $Output_Amount19 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day19}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount19[0])){echo "0"; $day19OUTvalue = 0;}else{foreach($Output_Amount19[0] as $key => $val019){echo $val019; $day19OUTvalue = $val019;};}; ?></td>

  <?php $Output_Amount20 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day20}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount20[0])){echo "0"; $day20OUTvalue = 0;}else{foreach($Output_Amount20[0] as $key => $val020){echo $val020; $day20OUTvalue = $val020;};}; ?></td>

  <?php $Output_Amount21 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day21}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount21[0])){echo "0"; $day21OUTvalue = 0;}else{foreach($Output_Amount21[0] as $key => $val021){echo $val021; $day21OUTvalue = $val021;};}; ?></td>

  <?php $Output_Amount22 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day22}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount22[0])){echo "0"; $day22OUTvalue = 0;}else{foreach($Output_Amount22[0] as $key => $val022){echo $val022; $day22OUTvalue = $val022;};}; ?></td>

  <?php $Output_Amount23 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day23}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount23[0])){echo "0"; $day23OUTvalue = 0;}else{foreach($Output_Amount23[0] as $key => $val023){echo $val023; $day23OUTvalue = $val023;};}; ?></td>

  <?php $Output_Amount24 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day24}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount24[0])){echo "0"; $day24OUTvalue = 0;}else{foreach($Output_Amount24[0] as $key => $val024){echo $val024; $day24OUTvalue = $val024;};}; ?></td>

  <?php $Output_Amount25 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day25}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount25[0])){echo "0"; $day25OUTvalue = 0;}else{foreach($Output_Amount25[0] as $key => $val025){echo $val025; $day25OUTvalue = $val025;};}; ?></td>

  <?php $Output_Amount26 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day26}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount26[0])){echo "0"; $day26OUTvalue = 0;}else{foreach($Output_Amount26[0] as $key => $val026){echo $val026; $day26OUTvalue = $val026;};}; ?></td>

  <?php $Output_Amount27 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day27}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount27[0])){echo "0"; $day27OUTvalue = 0;}else{foreach($Output_Amount27[0] as $key => $val027){echo $val027; $day27OUTvalue = $val027;};}; ?></td>

  <?php $Output_Amount28 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day28}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount28[0])){echo "0"; $day28OUTvalue = 0;}else{foreach($Output_Amount28[0] as $key => $val028){echo $val028; $day28OUTvalue = $val028;};}; ?></td>

  <?php $Output_Amount29 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day29}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount29[0])){echo "0"; $day29OUTvalue = 0;}else{foreach($Output_Amount29[0] as $key => $val029){echo $val029; $day29OUTvalue = $val029;};}; ?></td>

  <?php $Output_Amount30 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day30}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount30[0])){echo "0"; $day30OUTvalue = 0;}else{foreach($Output_Amount30[0] as $key => $val030){echo $val030; $day30OUTvalue = $val030;};}; ?></td>

  <?php $Output_Amount31 = $db->SelectSumAll("SELECT SUM(数量) FROM IOSchedule WHERE exe_flg = 0 and 品名 = '{$value}' and 入出庫日 = '{$Day31}' and レコード種別 = '出荷予定' ;");?>
  <td><?php if(empty($Output_Amount31[0])){echo "0"; $day31OUTvalue = 0;}else{foreach($Output_Amount31[0] as $key => $val031){echo $val031; $day31OUTvalue = $val031;};}; ?></td></tr><tr>


  <th scope="row"><?php echo $value . "：在庫予測" ?></th>
  <?php $PSumX = $db->SelectSumAll("SELECT SUM(数量) FROM process_progress WHERE exe_flg = 0 and 品名 = '{$value}' ;"); ?>
  <td><?php if(empty($PSumX[0])){echo "0";}else{foreach($PSumX[0] as $key => $val100){echo $val100 - $beforetodayoutput + $beforetodayinput ; $PsumX = ( $val100 - $beforetodayoutput + $beforetodayinput ) ;};}; ?></td>
  <td><?php if(empty($PsumX + $todayinput - $todayoutput)){echo "0"; $PsumXToday = 0;}else{echo ($PsumX + $todayinput - $todayoutput); $PsumXToday = ($PsumX + $todayinput - $todayoutput);}; ?></td>
  <td><?php if(empty($PsumXToday + $day1INvalue - $day1OUTvalue)){echo "0"; $PsumXday1 = 0;}else{echo ($PsumXToday + $day1INvalue - $day1OUTvalue); $PsumXday1 = ($PsumXToday + $day1INvalue - $day1OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday1 + $day2INvalue - $day2OUTvalue)){echo "0"; $PsumXday2 = 0;}
            else{echo ($PsumXday1 + $day2INvalue - $day2OUTvalue); 
            $PsumXday2 = ($PsumXday1 + $day2INvalue - $day2OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday2 + $day3INvalue - $day3OUTvalue)){echo "0"; $PsumXday3 = 0;}
            else{echo ($PsumXday2 + $day3INvalue - $day3OUTvalue); 
            $PsumXday3 = ($PsumXday2 + $day3INvalue - $day3OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday3 + $day4INvalue - $day4OUTvalue)){echo "0"; $PsumXday4 = 0;}
            else{echo ($PsumXday3 + $day4INvalue - $day4OUTvalue); 
            $PsumXday4 = ($PsumXday3 + $day4INvalue - $day4OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday4 + $day5INvalue - $day5OUTvalue)){echo "0"; $PsumXday5 = 0;}
            else{echo ($PsumXday4 + $day5INvalue - $day5OUTvalue); 
            $PsumXday5 = ($PsumXday4 + $day5INvalue - $day5OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday5 + $day6INvalue - $day6OUTvalue)){echo "0"; $PsumXday6 = 0;}
            else{echo ($PsumXday5 + $day6INvalue - $day6OUTvalue); 
            $PsumXday6 = ($PsumXday5 + $day6INvalue - $day6OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday6 + $day7INvalue - $day7OUTvalue)){echo "0"; $PsumXday7 = 0;}
            else{echo ($PsumXday6 + $day7INvalue - $day7OUTvalue); 
            $PsumXday7 = ($PsumXday6 + $day7INvalue - $day7OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday7 + $day8INvalue - $day8OUTvalue)){echo "0"; $PsumXday8 = 0;}
            else{echo ($PsumXday7 + $day8INvalue - $day8OUTvalue); 
            $PsumXday8 = ($PsumXday7 + $day8INvalue - $day8OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday8 + $day9INvalue - $day9OUTvalue)){echo "0"; $PsumXday9 = 0;}
            else{echo ($PsumXday8 + $day9INvalue - $day9OUTvalue); 
            $PsumXday9 = ($PsumXday8 + $day9INvalue - $day9OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday9 + $day10INvalue - $day10OUTvalue)){echo "0"; $PsumXday10 = 0;}
            else{echo ($PsumXday9 + $day10INvalue - $day10OUTvalue); 
            $PsumXday10 = ($PsumXday9 + $day10INvalue - $day10OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday10 + $day11INvalue - $day11OUTvalue)){echo "0"; $PsumXday11 = 0;}
            else{echo ($PsumXday10 + $day11INvalue - $day11OUTvalue); 
            $PsumXday11 = ($PsumXday10 + $day11INvalue - $day11OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday11 + $day12INvalue - $day12OUTvalue)){echo "0"; $PsumXday12 = 0;}
            else{echo ($PsumXday11 + $day12INvalue - $day12OUTvalue); 
            $PsumXday12 = ($PsumXday11 + $day12INvalue - $day12OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday12 + $day13INvalue - $day13OUTvalue)){echo "0"; $PsumXday13 = 0;}
            else{echo ($PsumXday12 + $day13INvalue - $day13OUTvalue); 
            $PsumXday13 = ($PsumXday12 + $day13INvalue - $day13OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday13 + $day14INvalue - $day14OUTvalue)){echo "0"; $PsumXday14 = 0;}
            else{echo ($PsumXday13 + $day14INvalue - $day14OUTvalue); 
            $PsumXday14 = ($PsumXday13 + $day14INvalue - $day14OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday14 + $day15INvalue - $day15OUTvalue)){echo "0"; $PsumXday15 = 0;}
            else{echo ($PsumXday14 + $day15INvalue - $day15OUTvalue); 
            $PsumXday15 = ($PsumXday14 + $day15INvalue - $day15OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday15 + $day16INvalue - $day16OUTvalue)){echo "0"; $PsumXday16 = 0;}
            else{echo ($PsumXday15 + $day16INvalue - $day16OUTvalue); 
            $PsumXday16 = ($PsumXday15 + $day16INvalue - $day16OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday16 + $day17INvalue - $day17OUTvalue)){echo "0"; $PsumXday17 = 0;}
            else{echo ($PsumXday16 + $day17INvalue - $day17OUTvalue); 
            $PsumXday17 = ($PsumXday16 + $day17INvalue - $day17OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday17 + $day18INvalue - $day18OUTvalue)){echo "0"; $PsumXday18 = 0;}
            else{echo ($PsumXday17 + $day18INvalue - $day18OUTvalue); 
            $PsumXday18 = ($PsumXday17 + $day18INvalue - $day18OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday18 + $day19INvalue - $day19OUTvalue)){echo "0"; $PsumXday19 = 0;}
            else{echo ($PsumXday18 + $day19INvalue - $day19OUTvalue); 
            $PsumXday19 = ($PsumXday18 + $day19INvalue - $day19OUTvalue) ;}; ?></td>                  
  <td><?php if(empty($PsumXday19 + $day20INvalue - $day20OUTvalue)){echo "0"; $PsumXday20 = 0;}
            else{echo ($PsumXday19 + $day20INvalue - $day20OUTvalue); 
            $PsumXday20 = ($PsumXday19 + $day20INvalue - $day20OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday20 + $day21INvalue - $day21OUTvalue)){echo "0"; $PsumXday21 = 0;}
            else{echo ($PsumXday20 + $day21INvalue - $day21OUTvalue); 
            $PsumXday21 = ($PsumXday20 + $day21INvalue - $day21OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday21 + $day22INvalue - $day22OUTvalue)){echo "0"; $PsumXday22 = 0;}
            else{echo ($PsumXday21 + $day22INvalue - $day22OUTvalue); 
            $PsumXday22 = ($PsumXday21 + $day22INvalue - $day22OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday22 + $day23INvalue - $day23OUTvalue)){echo "0"; $PsumXday23 = 0;}
            else{echo ($PsumXday22 + $day23INvalue - $day23OUTvalue); 
            $PsumXday23 = ($PsumXday22 + $day23INvalue - $day23OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday23 + $day24INvalue - $day24OUTvalue)){echo "0"; $PsumXday24 = 0;}
            else{echo ($PsumXday23 + $day24INvalue - $day24OUTvalue); 
            $PsumXday24 = ($PsumXday23 + $day24INvalue - $day24OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday24 + $day25INvalue - $day25OUTvalue)){echo "0"; $PsumXday25 = 0;}
            else{echo ($PsumXday24 + $day25INvalue - $day25OUTvalue); 
            $PsumXday25 = ($PsumXday24 + $day25INvalue - $day25OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday25 + $day26INvalue - $day26OUTvalue)){echo "0"; $PsumXday26 = 0;}
            else{echo ($PsumXday25 + $day26INvalue - $day26OUTvalue); 
            $PsumXday26 = ($PsumXday25 + $day26INvalue - $day26OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday26 + $day27INvalue - $day27OUTvalue)){echo "0"; $PsumXday27 = 0;}
            else{echo ($PsumXday26 + $day27INvalue - $day27OUTvalue); 
            $PsumXday27 = ($PsumXday26 + $day27INvalue - $day27OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday27 + $day28INvalue - $day28OUTvalue)){echo "0"; $PsumXday28 = 0;}
            else{echo ($PsumXday27 + $day28INvalue - $day28OUTvalue); 
            $PsumXday28 = ($PsumXday27 + $day28INvalue - $day28OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday28 + $day29INvalue - $day29OUTvalue)){echo "0"; $PsumXday29 = 0;}
            else{echo ($PsumXday28 + $day29INvalue - $day29OUTvalue); 
            $PsumXday29 = ($PsumXday28 + $day29INvalue - $day29OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday29 + $day30INvalue - $day30OUTvalue)){echo "0"; $PsumXday30 = 0;}
            else{echo ($PsumXday29 + $day30INvalue - $day30OUTvalue); 
            $PsumXday30 = ($PsumXday29 + $day30INvalue - $day30OUTvalue) ;}; ?></td>
  <td><?php if(empty($PsumXday30 + $day31INvalue - $day31OUTvalue)){echo "0"; $PsumXday31 = 0;}
            else{echo ($PsumXday30 + $day31INvalue - $day31OUTvalue); 
            $PsumXday31 = ($PsumXday30 + $day31INvalue - $day31OUTvalue) ;}; ?></td>



  </tr><br><tr><?php
};?>

</tbody>
</table>
</div>
