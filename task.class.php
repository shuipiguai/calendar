<?php
class Task{
	public $execute = array( 0=>'δ��ʼ', 1=>'���', 2=>'δ���',3=>'������������', 4=>'����˾����', 5=>'͵����');

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