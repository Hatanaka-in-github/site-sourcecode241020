<?php require_once '/var/www/html/getParameters.php';
require_once '/var/www/html/DBclasscollect.php';
use db\DataSource;
$db = new DataSource();?>
<?php if(isset($_POST['hidden-parameter'])){include('CopyPaste.php'); unset($_POST['hidden-parameter']);}  ?>
<?php if(isset($_POST['hidden-parameter5'])){include('CopyPaste.php');

if(!empty($_POST['before0']) && !empty($_POST['after0'])){
    $BEFORE0 = "/".$_POST['before0']."/" ; $AFTER0 = "/".$_POST['after0']."/" ;
    try{
    $db->QuerySql("set @before0='{$BEFORE0}' ;"); $db->QuerySql("set @after0='{$AFTER0}' ;");
    $db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before0,@after0 );');
    $db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before0,@after0 );');
    }catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:10_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
    }elseif(empty($_POST['before0']) && empty($_POST['after0'])){
    }else{ echo "工程1について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before1']) && !empty($_POST['after1'])){
$BEFORE1 = "/".$_POST['before1']."/" ; $AFTER1 = "/".$_POST['after1']."/" ;
try{
$db->QuerySql("set @before1='{$BEFORE1}' ;"); $db->QuerySql("set @after1='{$AFTER1}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before1,@after1 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before1,@after1 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:21_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before1']) && empty($_POST['after1'])){
}else{ echo "工程2について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before2']) && !empty($_POST['after2'])){
$BEFORE2 = "/".$_POST['before2']."/" ; $AFTER2 = "/".$_POST['after2']."/" ;
try{
$db->QuerySql("set @before2='{$BEFORE2}' ;"); $db->QuerySql("set @after2='{$AFTER2}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before2,@after2 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before2,@after2 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:32_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before2']) && empty($_POST['after2'])){
}else{ echo "工程3について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before3']) && !empty($_POST['after3'])){
$BEFORE3 = "/".$_POST['before3']."/" ; $AFTER3 = "/".$_POST['after3']."/" ;
try{
$db->QuerySql("set @before3='{$BEFORE3}' ;"); $db->QuerySql("set @after3='{$AFTER3}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before3,@after3 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before3,@after3 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:43_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before3']) && empty($_POST['after3'])){
}else{ echo "工程4について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before4']) && !empty($_POST['after4'])){
$BEFORE4 = "/".$_POST['before4']."/" ; $AFTER4 = "/".$_POST['after4']."/" ;
try{
$db->QuerySql("set @before4='{$BEFORE4}' ;"); $db->QuerySql("set @after4='{$AFTER4}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before4,@after4 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before4,@after4 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:54_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before4']) && empty($_POST['after4'])){
}else{ echo "工程5について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before5']) && !empty($_POST['after5'])){
$BEFORE5 = "/".$_POST['before5']."/" ; $AFTER5 = "/".$_POST['after5']."/" ;
try{
$db->QuerySql("set @before5='{$BEFORE5}' ;"); $db->QuerySql("set @after5='{$AFTER5}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before5,@after5 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before5,@after5 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:65_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before5']) && empty($_POST['after5'])){
}else{ echo "工程6について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before6']) && !empty($_POST['after6'])){
$BEFORE6 = "/".$_POST['before6']."/" ; $AFTER6 = "/".$_POST['after6']."/" ;
try{
$db->QuerySql("set @before6='{$BEFORE6}' ;"); $db->QuerySql("set @after6='{$AFTER6}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before6,@after6 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before6,@after6 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:76_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before6']) && empty($_POST['after6'])){
}else{ echo "工程7について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before7']) && !empty($_POST['after7'])){
$BEFORE7 = "/".$_POST['before7']."/" ; $AFTER7 = "/".$_POST['after7']."/" ;
try{
$db->QuerySql("set @before7='{$BEFORE7}' ;"); $db->QuerySql("set @after7='{$AFTER7}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before7,@after7 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before7,@after7 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:87_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before7']) && empty($_POST['after7'])){
}else{ echo "工程8について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ;  ?><br><?php } ;

if(!empty($_POST['before8']) && !empty($_POST['after8'])){
$BEFORE8 = "/".$_POST['before8']."/" ; $AFTER8 = "/".$_POST['after8']."/" ;
try{
$db->QuerySql("set @before8='{$BEFORE8}' ;"); $db->QuerySql("set @after8='{$AFTER8}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before8,@after8 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before8,@after8 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:98_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before8']) && empty($_POST['after8'])){
}else{ echo "工程9について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before9']) && !empty($_POST['after9'])){
$BEFORE9 = "/".$_POST['before9']."/" ; $AFTER9 = "/".$_POST['after9']."/" ;
try{
$db->QuerySql("set @before9='{$BEFORE9}' ;"); $db->QuerySql("set @after9='{$AFTER9}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before9,@after9 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before9,@after9 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:109_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before9']) && empty($_POST['after9'])){
}else{ echo "工程10について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ;  ?><br><?php } ;

if(!empty($_POST['before10']) && !empty($_POST['after10'])){
$BEFORE10 = "/".$_POST['before10']."/" ; $AFTER10 = "/".$_POST['after10']."/" ;
try{
$db->QuerySql("set @before10='{$BEFORE10}' ;"); $db->QuerySql("set @after10='{$AFTER10}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before10,@after10 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before10,@after10 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:119_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before10']) && empty($_POST['after10'])){
}else{ echo "工程11について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before11']) && !empty($_POST['after11'])){
$BEFORE11 = "/".$_POST['before11']."/" ; $AFTER11 = "/".$_POST['after11']."/" ;
try{
$db->QuerySql("set @before11='{$BEFORE11}' ;"); $db->QuerySql("set @after11='{$AFTER11}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before11,@after11 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before11,@after11 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:131_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before11']) && empty($_POST['after11'])){
}else{ echo "工程12について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

if(!empty($_POST['before12']) && !empty($_POST['after12'])){
$BEFORE12 = "/".$_POST['before12']."/" ; $AFTER12 = "/".$_POST['after12']."/" ;
try{
$db->QuerySql("set @before12='{$BEFORE12}' ;"); $db->QuerySql("set @after12='{$AFTER12}' ;");
$db->QuerySql('UPDATE process_progress SET 発工程 = REPLACE(発工程,@before12,@after12 );');
$db->QuerySql('UPDATE process_progress SET 受工程 = REPLACE(受工程,@before12,@after12 );');
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:142_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;
}elseif(empty($_POST['before12']) && empty($_POST['after12'])){
}else{ echo "工程13について、変更前工程、変更後工程のいずれかが空文字の場合、DB内の差し替え処理を中断します" ; ?><br><?php } ;

try{
$db->QuerySql('UPDATE process_progress SET シリアル工程 = concat(品名,シリアル,受工程);' );
$db->QuerySql('UPDATE process_progress SET シリアル工程 = concat(品名,"NG",シリアル,受工程) WHERE 損品数 > 0 ;' );
$db->QuerySql('UPDATE process_progress SET シリアル工程 = concat(品名,"ST",シリアル,受工程) WHERE 保留数 > 0 ;' );
$db->QuerySql('UPDATE process_progress SET 工程キー = concat(発工程,受工程) ;' );
}catch(PDOException $e) {
    echo '<br><br>replaceprocess.php:151_処理に失敗しました。管理者にお問合せ下さい。<br><br>'; } ;



unset($_POST['hidden-parameter']);

}  ?>
