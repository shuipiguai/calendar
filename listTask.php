<?php
include( "conn.php");
include( "task.class.php");

$date = $_GET['date'];
echo $date;
$db = db::getInstance();
$result = $db->select( 'task', array( 'date' => $date ) );

/*$sql = "SELECT * FROM task WHERE date='".$date."'";
$result = mysql_query($sql);*/

?>
<a href="task.php?date=<?php echo $date?>">�½�����</a>
<table border=1>
<tr>
	<td>��������</td>
	<td>��ע</td>
	<td>ִ�����</td>
	<td>��������</td>
	<td>����</td>
</tr>
<?php
foreach( $result as $key => $value ){
?>

<tr>
	<td><?php echo $value['name']?></td>
	<td><?php echo $value['note']?></td>
	<?php
		$task = new task();
		$execute = $task->getExecute($value['execute']);
	?>
	<td><?php echo $execute?></td>
	<td><?php echo $value['create_time']?></td> 
	<td >
		<a href="javascript:void(0);" seed="task_execute" class="operate" taskId="<?php  echo $value['id']?>">ִ��</a>
		<a href="" class="operate">�޸�</a>
		<a href="" class="operate">ɾ��</a>
	<td>
</tr>

<?php
}

?>
</table>
<script src="jquery/jquery-1.8.1.min.js"></script>
<script>
$(".operate").live('click',function(){
	var _self = $(this),
		seed = $(".operate").attr('seed');

	switch( seed ){
		case "task_execute":
		 var id = _self.attr('taskId'),
			href = "execute.php?id="+id;
			
		//_self.css('text-decoration','underline');
		window.open( href,"_blank",'width=500,height=500,scrollable=yes,menubar=no,status=no,titlebar=no,toolbar=no,left=500,top=200');
	} 
});
</script>