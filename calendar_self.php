<!--数字时钟  自制简易任务系统-->
<html>
<head>
<title>自制日历</title>
<script src="jquery/jquery-1.8.1.min.js"></script>
</head>
<style type="text/css">
.center{
	text-align:center;
	vertical-align:middle;
}
a:link{
	text-decoration:none;
}
a:hover{
	color:#e58318;
}
.day_bgcolor{
	background:#F5F5F5;
}
table{
	border-collapse:collapse;
	border-color:gray;
	width:400px;
	margin:2px auto;
}
td{
	border:1px solid gray;
}
.inside_table td{
	border:0;
}
.inside_day{
	font-weight:bold;
}
.button:hover{
	color:#e58318;
	background-color: #f4f4f4;
	background-image: -moz-linear-gradient(top,#fff,#e4e4e4);
	background-image: -ms-linear-gradient(top,#fff,#e4e4e4);
	background-image: -webkit-gradient(linear,0 0,0 100%,from(#fff),to(#e4e4e4));
	background-image: -webkit-linear-gradient(top,#fff,#e4e4e4);
	background-image: -o-linear-gradient(top,#fff,#e4e4e4);
	background-image: linear-gradient(top,#fff,#e4e4e4);
	background-repeat: repeat-x;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#e4e4e4',GradientType=0);
	border-color: #e4e4e4 #e4e4e4 #bebebe;
	border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
	border: 1px solid #ccc;
	border-bottom-color: #b3b3b3;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
	-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
	box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
	cursor: pointer;	
}
.red{
	font-color:red;
}
</style>

<script type="text/javascript">
function clock(){
	currentTime = new Date();
	year = currentTime.getFullYear();
	month = currentTime.getMonth()+1;
	day = currentTime.getDate();
	hours = currentTime.getHours();
	minutes = currentTime.getMinutes();
	seconds = currentTime.getSeconds();
	
	if( eval(month) <10 ) month = "0"+ month;
	if( eval(day) <10 ) day = "0"+ day;
	if( eval(hours) <10 ) hours = "0"+ hours;
	if( eval(minutes) <10 ) minutes = "0"+ minutes;
	if( eval(seconds) <10 ) seconds = "0"+ seconds;
	
	clock1 = hours+":"+minutes+":"+seconds;
	clockId.innerHTML = "<span style='background:white'>"+clock1+"</span>";
	setTimeout( "clock()",1000 );
}
</script>
<?php
header("content-type:text/html;charset=gb2312");
 $timezone = 'Asia/Shanghai';
date_default_timezone_set( $timezone );
//throw new Exception("can");
$year = '';
$month = '';
$day = '';
$currentTime = date('Y-m-d');
$currentMonth = date('m');
$currentYear = date('Y');
$monthArray = array("1","2","3","4","5","6","7","8","9","10","11","12");
$d = isset($_GET['d'])?$_GET['d']:date('d');
$m = isset($_GET['m'])?$_GET['m']:date( 'm' );
$y = isset($_GET['y'])?$_GET['y']:date( 'Y' );
if( $y < 1970 or $y >= 2038){
	echo  "无法得出1970-2038之外的日历<br />";
	 echo "<a href='calendar_self.php?y=".$currentYear."&m=".$currentMonth."'>回到今天</a>";
	exit;
}
$firstday_week = date( 'D', mktime(0, 0, 0, $m, 1, $y ) );
$weekArray = array( 'Mon'=>1, 'Tue'=>2, 'Wed'=>3, 'Thu'=>4, 'Fri'=>5, 'Sat'=>6, 'Sun'=>7 );
$td_space_num = $weekArray[$firstday_week]-1;

$month_day_num = date( 't', mktime(0, 0, 0, $m, $d, $y ) );
$showday_num = $month_day_num+$td_space_num;
$tr_num = ceil( $showday_num/7 );



if( $m == 1 ){
	$pre_y = $y-1;
	$pre_m = 12;
}else{
	$pre_m = $m-1;
	$pre_y = $y;
}


if( $m == 12 ){
	$next_y = $y+1;
	$next_m = 1;
}else{
	$next_y = $y;
	$next_m = $m+1;
}

?>
<body onload="clock()">

<div class="center">
<table border="1">
	<tr align="center">
		<!--<td><a href="calendar_self.php?y=<?php echo $pre_y?>&m=<?php echo $m?>">上一年</a></td>-->
		<td class="button"><a href="calendar_self.php?y=<?php echo $pre_y?>&m=<?php echo $pre_m?>" title="上一月"><<</a></td>
		<td class="button"><a href="calendar_self.php?y=<?php echo $currentYear?>&m=<?php echo $currentMonth?>">回到今天</a></td>
		<td class="button"><a href="calendar_self.php?y=<?php echo $next_y?>&m=<?php echo $next_m?>" title="下一月">>></a></td>
		<!--<td><a href="calendar_self.php?y=<?php echo $next_y?>&m=<?php echo $m?>">下一年</a></td>-->
	</tr>
	
	<tr align="center">
		<td colspan="3">
			<?php
			echo "<select name='year' onchange='window.location=\"calendar_self.php?y=\"+this.value+\"&m=$m\"'>";
				
				for($i=1970;$i<2039;$i++){
					$select =  ( $i == $y ) ? "selected='selected'" : "";
					echo "<option value='".$i."' ".$select.">".$i."</option>";
				}
			echo "</select>";
			echo "<select name='month' onchange='window.location=\"calendar_self.php?m=\"+this.value+\"&y=$y\"'>"; 
				for($i=1;$i<13;$i++){
					$select =  ($i == $m)?"selected='selected'":"";
					echo "<option value='".$i."' ".$select.">".$i."</option>";
				}
			echo "</select>";
			?>
			<span id="clockId"></span>
		</td>
	</tr>
	
	<tr>
		<td colspan=5>
			<table class="inside_table">
				<tr class='center'>
					<td>一</td>
					<td>二</td>
					<td>三</td>
					<td>四</td>
					<td>五</td>
					<td>六</td>
					<td>日</td>
				</tr>
				<?php
				$class='';
				for($i=1-$td_space_num;$i<=$month_day_num;){
					echo "<tr class='center'>";
					for($j=1;$j<8;$j++){
						if($i<1 || $i>$month_day_num){
							echo "<td></td>";
						}else{
							$currentDay = $y."-".$m."-".$i;
							if( $currentDay == date('Y-m-j') ){
								$class="red";
							}
							echo "<td class='day_bgcolor inside_day button ".$class."' date='".$currentDay."'>".$i."</td>";
						}
						$i++;
					}
					echo "</tr>";
				}
				/*for($i=0;$i<$tr_num;$i++){
					echo "<tr class='center '>";
					
					$space = 0;
					$space_1 = $td_space_num;
					if( $i == 0 ){
							$space_1 = 0;
							$space = $td_space_num;
						
							for($a=0;$a<$td_space_num;$a++){
								echo "<td class='none_border'></td>";
							}
					}
					for($b=1;$b<8-$space;$b++){
						$day = $i*7+$b-$space_1;
						if( $day<=$month_day_num ){
						
							$currentDay = $y."-".$m."-".$day;
						
							if($currentDay == date('Y-m-j') ){
								$day = "<span style='color:red'>".$day."</span>";
								
							}
							echo "<td class='day_bgcolor inside_day button' date='".$currentDay."'>".$day."</td>";
						}
						
					}
					echo "</tr>";	
				}*/
				?>
				
			</table>
		</td>
	</tr>
</table>
</div>
<div class="task"></div>
<script type="text/javascript">
	availHeight = window.screen.availHeight;
	clientHeight = document.body.clientHeight;
	offsetHeight = document.body.offsetHeight; 
	screenHeight = window.screen.height;
	scrollHeight = document.body.scrollHeight;
	screenTop = window.screenTop;
	//alert( "screenHeight->"+screenHeight+"\n"+"availHeight->"+availHeight+"\n"+"clientHeight->"+clientHeight+"\n"+"offsetHeight->"+offsetHeight+"\n"+"scrollHeight->"+scrollHeight+"\n"+"screenTop->"+screenTop+"\n");
	$(".inside_day").live('click', function(){
		
		var _self = $(this),
			date = $(this).attr('date'),
			href = "listTask.php?date="+date,
			top = _self.offset().top+availHeight-clientHeight+screenTop+_self.height(),
			
			left = _self.offset().left;
			window.open(href,'_self');
		//window.open(href,'_blank','width=500,height=500,scrollable=yes,menubar=no,status=no,titlebar=no,toolbar=no,left='+left+',top='+top);
	});
	
</script>
</body>
</html>