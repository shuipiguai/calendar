<?php
$date= $_GET['date'];
$dateArray = explode('-',$date);
?>
<script src="jquery/jquery-1.8.1.min.js"></script>
<script type="text/javascript">
function dealSubmit( form ){
	var taskName = $.trim( $('#taskName').val() );

	if( taskName.length == 0 ){
		document.getElementById('nameWrong').innerHTML = "���Ʋ���Ϊ��";
		form.name.focus();
		return(false);
	}
}
function dealCancel(){
	window.opener.location.href=window.opener.location.href;window.close()
}
</script>

<form action="addTask.php" method="post" name="task" onsubmit="return dealSubmit(task)">
<input type="hidden" name="date" value="<?php echo $date?>" />
<table border="0">
	
	<tr>
		<td>��������</td>
		<td>
			<input type="text" name="name" size="50" id="taskName" placeholder="��д��������" required />
			<span id="nameWrong"></span>
		</td>
	</tr>
	<tr>
		<td>��ע</td>
		<td>
			<textarea cols="45" rows="5" name="note"></textarea>
	<tr>
		<td> 
			<input type="submit" value="��������" />
		</td>
		<td>
			<input type="button" value="ȡ��" onclick="dealCancel()" />
		</td>
	<tr>
</table>
</form>
