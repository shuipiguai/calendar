<form action="" method="post" name="execute">

<select name="execute">
	<option value="0"> </option>
	<option value="1">���</option>
	<option value="2">δ���</option>
	<option value="3">������������</option>
	<option value="4">����˾����</option>
	<option value="5">͵����</option>
</select>
<input type="submit" value="�ύ" />
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