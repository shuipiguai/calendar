<form action="" method="post" name="execute">

<select name="execute">
	<option value="0"> </option>
	<option value="1">完成</option>
	<option value="2">未完成</option>
	<option value="3">处理其他任务</option>
	<option value="4">处理公司事务</option>
	<option value="5">偷懒了</option>
</select>
<input type="submit" value="提交" />
</form>
<?php
include( "conn.php" );
$taskId = $_GET['id'];
$execute = $_POST['execute'];
if(!get_magic_quotes_gpc()){
	$execute = addslashes($execute);
}

$sql = "UPDATE task SET execute = $execute WHERE id='".$taskId."'";
$result = mysql_query($sql);
if( $result ){
	?>
	<script>
	window.opener.location.href = window.opener.location.href;window.close();
	</script>
	<?php
}
?>