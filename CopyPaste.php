
<?PHP
 if(!empty($_GET['product-group-process'])){

  copy('pulldownlist.php',  $_GET['productname'].'-pg'.'.php' );

  $file_name = $_GET['productname'].'-pg'.'.php' ; /*読込ファイルの指定*/

  $ret_array = file( $file_name,FILE_IGNORE_NEW_LINES ); /*ファイルを全て配列に入れる*/

  $rdfile = $_GET['productname'].'-pg'.'.php' ;

 }else{

  copy('pulldownlist.php', "./p/".$_GET['productname'].'.php' );

  $file_name = "./p/".$_GET['productname'].'.php' ; /*読込ファイルの指定*/

  $ret_array = file( $file_name,FILE_IGNORE_NEW_LINES ); /*ファイルを全て配列に入れる*/

  $rdfile = "./p/".$_GET['productname'].'.php' ;

 };

// https://magazine.techacademy.jp/magazine/26793
// https://qiita.com/chisatoshibuya/items/0d63bf8562cb0f05b52d
// https://hiroasake.blogspot.com/2019/01/php.html
//ファイルの内容を全て文字列に読み込む

$str = file_get_contents($rdfile);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_GET['process2'])){$str = str_replace("P2", $_GET['process2'], $str);}
else{$str = str_replace('{txt:"P2"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P2", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_GET['process3'])){$str = str_replace("P3", $_GET['process3'], $str);}
else{$str = str_replace('{txt:"P3"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P3", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_GET['process4'])){$str = str_replace("P4", $_GET['process4'], $str);}
else{$str = str_replace('{txt:"P4"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P4", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//ファイルの内容を全て文字列に読み込む
if(!empty($_GET['process5'])){$str = str_replace("P5", $_GET['process5'], $str);}
else{$str = str_replace('{txt:"P5"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P5", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_GET['process6'])){$str = str_replace("P6", $_GET['process6'], $str);}
else{$str = str_replace('{txt:"P6"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P6", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);
//検索文字列に一致したすべての文字列を置換する
if(!empty($_GET['process7'])){$str = str_replace("P7", $_GET['process7'], $str);}
else{$str = str_replace('{txt:"P7"},', '', $str);file_put_contents($rdfile, $str);
$str = str_replace("P7", "", $str);};
//文字列をファイルに書き込む
file_put_contents($rdfile, $str);

unset($_GET['hidden-parameter']);


if(!empty($_GET['Item1'])){

    $str = file_get_contents($rdfile);
    $str = str_replace("Item1", $_GET['Item1'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("PA1", $_GET['Item1Amount'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("Item2", $_GET['Item2'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("PA2", $_GET['Item2Amount'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("Item3", $_GET['Item3'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("PA3", $_GET['Item3Amount'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("Item4", $_GET['Item4'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("PA4", $_GET['Item4Amount'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("Item5", $_GET['Item5'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("PA5", $_GET['Item5Amount'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("Item6", $_GET['Item6'], $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("PA6", $_GET['Item6Amount'], $str);
    file_put_contents($rdfile, $str);

}else{    
    $str = file_get_contents($rdfile);
    $str = str_replace("$"."SETUPLIST", "/*"."$"."SETUPLIST", $str);
    file_put_contents($rdfile, $str);

    $str = file_get_contents($rdfile);
    $str = str_replace("?>", "*/?>", $str);
    file_put_contents($rdfile, $str);



};










?>
