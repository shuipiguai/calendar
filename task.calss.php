<?php
class Task(){
	public static $execute = array( 0=>'δ��ʼ', 1=>'���', 2=>'δ���',3=>'������������', 4=>'����˾����', 5=>'͵����');
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