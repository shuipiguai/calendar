<?php
class Task(){
	public static $execute = array( 0=>'未开始', 1=>'完成', 2=>'未完成',3=>'处理其他任务', 4=>'处理公司事务', 5=>'偷懒了');
	echo "11";
	exit;
	public function getExecute( $key=0 ){
		$execute = $this->execute;
		foreach( $execute as $a => $b ){
			if( $a == $key){
				return $b;
			}
		}
	}
}
?>