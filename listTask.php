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
<a href="task.php?date=<?php echo $date?>">新建任务</a>
<table border=1>
<tr>
	<td>任务名称</td>
	<td>备注</td>
	<td>执行情况</td>
	<td>创建日期</td>
	<td>操作</td>
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
		<a href="javascript:void(0);" seed="task_execute" class="operate" taskId="<?php  echo $value['id']?>">执行</a>
		<a href="" class="operate">修改</a>
		<a href="" class="operate">删除</a>
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