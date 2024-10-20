
<?php
  copy('p/pulldownlist.php', 'p/all.php' );

  $file_name = 'p/all.php' ; /*読込ファイルの指定*/

  $ret_array = file( $file_name,FILE_IGNORE_NEW_LINES ); /*ファイルを全て配列に入れる*/

  $rdfile = 'p/all.php' ;


// https://magazine.techacademy.jp/magazine/26793
// https://qiita.com/chisatoshibuya/items/0d63bf8562cb0f05b52d
// https://hiroasake.blogspot.com/2019/01/php.html
//ファイルの内容を全て文字列に読み込む

$str = file_get_contents($rdfile);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process1'])){$str = str_replace("P1", $_POST['process1'], $str); }
else{$str = str_replace('{txt:"P1"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P1", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process2'])){$str = str_replace("P2", $_POST['process2'], $str); }
else{$str = str_replace('{txt:"P2"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P2", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process3'])){$str = str_replace("P3", $_POST['process3'], $str);}
else{$str = str_replace('{txt:"P3"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P3", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process4'])){$str = str_replace("P4", $_POST['process4'], $str);}
else{$str = str_replace('{txt:"P4"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P4", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//ファイルの内容を全て文字列に読み込む
if(!empty($_POST['process5'])){$str = str_replace("P5", $_POST['process5'], $str);}
else{$str = str_replace('{txt:"P5"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P5", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process6'])){$str = str_replace("P6", $_POST['process6'], $str);}
else{$str = str_replace('{txt:"P6"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P6", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process7'])){$str = str_replace("P7", $_POST['process7'], $str);}
else{$str = str_replace('{txt:"P7"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P7", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process8'])){$str = str_replace("P8", $_POST['process8'], $str);}
else{$str = str_replace('{txt:"P8"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P8", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process9'])){$str = str_replace("P9", $_POST['process9'], $str);}
else{$str = str_replace('{txt:"P9"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P9", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process10'])){$str = str_replace("X10", $_POST['process10'], $str);}
else{$str = str_replace('{txt:"X10"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("X10", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process11'])){$str = str_replace("X11", $_POST['process11'], $str);}
else{$str = str_replace('{txt:"X11"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("X11", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process12'])){$str = str_replace("X12", $_POST['process12'], $str);}
else{$str = str_replace('{txt:"X12"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("X12", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['process13'])){$str = str_replace("X13", $_POST['process13'], $str);}
else{$str = str_replace('{txt:"X13"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("X13", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['NoValidate1'])){$str = str_replace("V1", $_POST['NoValidate1'], $str);}
else{$str = str_replace('{txt:"V1"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("V1", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['NoValidate2'])){$str = str_replace("V2", $_POST['NoValidate2'], $str);}
else{$str = str_replace('{txt:"V2"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("V2", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['NoValidate3'])){$str = str_replace("V3", $_POST['NoValidate3'], $str);}
else{$str = str_replace('{txt:"V3"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("V3", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['OrderBreak1'])){$str = str_replace("B1", $_POST['OrderBreak1'], $str);}
else{$str = str_replace('{txt:"B1"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("B1", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['OrderBreak2'])){$str = str_replace("B2", $_POST['OrderBreak2'], $str);}
else{$str = str_replace('{txt:"B2"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("B2", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_POST['OrderBreak3'])){$str = str_replace("B3", $_POST['OrderBreak3'], $str);}
else{$str = str_replace('{txt:"B3"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("B3", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
if(!empty($_POST['TYPE1check1'])){$str = str_replace("T1", $_POST['TYPE1check1'], $str);}
else{$str = str_replace('{txt:"T1"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("T1", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
if(!empty($_POST['TYPE1check2'])){$str = str_replace("T2", $_POST['TYPE1check2'], $str);}
else{$str = str_replace('{txt:"T2"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("T2", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
if(!empty($_POST['TYPE1check3'])){$str = str_replace("T3", $_POST['TYPE1check3'], $str);}
else{$str = str_replace('{txt:"T3"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("T3", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
if(!empty($_POST['SerialValidate1'])){$str = str_replace("S1", $_POST['SerialValidate1'], $str);}
else{$str = str_replace('{txt:"S1"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("S1", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
if(!empty($_POST['SerialValidate2'])){$str = str_replace("S2", $_POST['SerialValidate2'], $str);}
else{$str = str_replace('{txt:"S2"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("S2", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
if(!empty($_POST['SerialValidate3'])){$str = str_replace("S3", $_POST['SerialValidate3'], $str);}
else{$str = str_replace('{txt:"S3"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("S3", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
if(!empty($_POST['Startprocess'])){$str = str_replace("A1", $_POST['Startprocess'], $str);}
else{$str = str_replace('{txt:"A1"}', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("A1", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);

unset($_GET['hidden-parameter']);















?>
