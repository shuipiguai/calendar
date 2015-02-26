<?php
try{
	$dbh = new PDO( 'mysql:host=localhost;dbname=calendar', 'root', '123' );
}
catch( PDOException $e ){
	echo 'Connect Failed:'.$e->getMessage();
}
	//$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	//$dbh->exec( 'set names gbk' );
	
	/*class db{
		public $conn;
		public static $sql;
		public static $instance = null;
		
		private function __construct(){
			$this->conn = mysql_connect( 'localhost', 'root', '123' ) or die ( "链接数据库失败<br />".mysql_errno().":".mysql_error() );
			if( !mysql_select_db( 'calendar', $this->conn ) ){
				echo "链接database失败";
			};
			mysql_query( 'set names gbk', $this->conn );
		}
		
		public static function getInstance(){
			if( is_null(self::$instance) ){
				self::$instance = new db;
			}
			return self::$instance;
		}
		
		public function select( $table, $condition = array(), $filed = array() ){
			$where = '';
			if( !empty( $condition) ){
				foreach( $condition as $key => $value ){
					$where .= $key."='".$value."' and ";
				}
				$where = 'where '.$where.'1=1';
			}
			
			$fieldstr = '';
			if( !empty($field) ){
				foreach( $field as $key => $value ){
					$fieldstr .= $value.',';
				}
				$fieldstr = rtrim( $fieldstr, ',' );
			}else{
				$fieldstr = '*';
			}
			
			self::$sql = "select {$fieldstr} from {$table} {$where}";
			$result = mysql_query( self::$sql, $this->conn );
			
			$resultRow = array();
			$i = 0;
			while( $row = mysql_fetch_assoc($result) ){
				foreach( $row as $key => $value ){
					$resultRow[$i][$key] = $value;
				}
				$i++;
			}
			
			return $resultRow;
		}
		
		public function insert( $table, $data = array() ){
			$keystr = '';
			$valuestr = '';
			
			if( !empty($data) ){
				foreach( $data as $key => $value ){
					$keystr .= $key.',';
					$valuestr .= "'$value'".',';
				}
				$keystr = rtrim( $keystr, ',' );
				$valuestr = rtrim( $valuestr, ',' );
				
				self::$sql = "INSERT INTO {$table} ({$keystr}) VALUES ({$valuestr})";
			
				if( mysql_query( self::$sql, $this->conn ) ){
					return mysql_insert_id();
				}else{
					return false;
				}
			}
		}
		
		public function update( $table, $data, $condition = array() ){
			$where = '';
			if( !empty($condition) ){
				foreach( $conditon as $key => $value ){
					$where .= $key."='".$value."' and ";
				}
				$where = $where.'1=1';
			}
			
			$updatestr = '';
			if( !empty($data) ){
				foreach( $data as $key => $value ){
					$updatestr .= $key."='".$value."',";
				}
				$updatestr = rtrim( $updatestr, ',' );
			}
			
			self::$sql = "UPDATE {$table} SET {$updatestr} WHERE {$where}";
			
			return mysql_query( self::$sql );
		}
		
		public function delete( $table, $condition ){
			$where = '';
			if( !empty($condition) ){
				foreach( $condition as $key => $value ){
					$where .= $key."='".$value."' and ";
				}
				$where = $where."1=1";
			}
			
			self::$sql = "DELETE FROM {$table} WHERE {$where}";
			return mysql_query( self::$sql );
		}
	}*/
	/*error_reporting(0);
	$conn = mysql_connect( 'localhost', 'root', '123') or die ( "链接数据库失败<br />".mysql_errno().":".mysql_error() );
	mysql_select_db( "calendar", $conn );
	mysql_query( "set names 'gbk' ");*/
?>
