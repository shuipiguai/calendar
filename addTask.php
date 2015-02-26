<?php
include_once( "conn.php" );
date_default_timezone_set( 'Asia/Shanghai' );
$date = $_POST['date'];
$name = $_POST['name'];
$note = $_POST['note'];

if( !get_magic_quotes_gpc() ){
	$name = addslashes( $name );
	$note = addslashes( $note );
}

$db = db::getInstance();
$result = $db->insert( 'task', array( 'id'=>'', 'name'=>$name, 'note'=>$note, 'date'=>$date, 'create_time'=>date('Y-m-d H:i:s') ) );
/*$sql = "INSERT INTO task ( id, name, note, date, create_time ) VALUES ( '', '$name', '$note', '$date', now() )";
$result = mysql_query( $sql );*/

if( $result ){
?>
<script >
location.href = "listTask.php?date=<?php echo $date?>";
</script>
<?php
}else{
echo "导入数据库失败";
}
?>