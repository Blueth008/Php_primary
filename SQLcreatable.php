<?php

$servername = '192.168.3.147';
$username = 'root';
$password = 'abc123';
$dbname= 'test';

//创建连接
$conn = new mysqli($servername,$username,$password,$dbname);

$conn->query("set names 'utf-8'");  // 设置某一个字段中文不乱码
//连接检测
if($conn->connect_error) {
	die("连接失败".$conn->connect_error);
}else { 

//使用SQL创建数据表
/*
$sql = "create table MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firtname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP

) ";

if( $conn->query($sql) === TRUE ) {
	
	echo "table MyGuests created successfully".PHP_EOL;
}else {
	echo "数据库表错误".$conn->error;
}
*/

//插入数据
/*
$sql = "insert into MyGuests (firtname,lastname,email) values('Jhone','Dobe','johne@qq.com')";

if( $conn->query($sql) === TRUE ){
	 echo "新记录插入成功";	
}else {
	echo "ERROR".$sql.$conn->error;
}

*/


//插入多条数据 ，使用预处理语句
/*
$sql = "insert into MyGuests (firtname,lastname,email) values(?,?, ?)";

//为 mysqli_stmt_prepare() 初始化 statement 对象

  $stmt = $conn->stmt_init();

//预处理语句

if( $stmt->prepare($sql)){
	//绑定参数
	$stmt->bind_param("sss",$firstname,$lastname,$email);
	/
	//	第二个参数是 "sss" 。以下列表展示了参数的类型。 s 字符告诉 mysql 参数是字符串。

	//	可以是以下四种参数:

	//	i - 整数
	//	d - 双精度浮点数
	//	s - 字符串
	//	b - 布尔值
	//	每个参数必须指定类型，来保证数据的安全性。通过类型的判断可以减少SQL注入漏洞带来的风险。
	
	
	
	//设置参数并执行
	
	try{
	//单插模式
	$firstname = 'Jhon3';
	$lastname = 'Tom';
	$email = 'Tomhat@139.com';
	mysqli_stmt_execute($stmt);
	
	$firstname = 'Mary';
	$lastname = 'Moe';
	$email = 'mary@example.com';
	mysqli_stmt_execute($stmt);

	$firstname = 'Julie';
	$lastname = 'Dooley';
	$email = 'julie@example.com';
	mysqli_stmt_execute($stmt);

			
	//数组模式的插入	
		$arrdata= array(
			array('Jhon3','Tom','Tomhat@139.com'),
			array('Mary','Moe','Moe@139.com'),
			array('Julie','Dooley','Julie@139.com'),	
		);	
		
		foreach($arrdata as $key=>$values ){ 	
			
				$firstname = $values[0] ;
				$lastname = $values[1];
				$email = $values[2];
				//mysqli_stmt_execute($stmt);
				$stmt->execute();
			
		}
		echo '新记录插入成功2';	
		
	  }catch(Exception $e)
		{
			echo 'Message: ' .$e->getMessage();
		}	
		
   }
		


*/

//读取数据

/* $sql = "select id,firtname,lastname from MyGuests";
$result = $conn->query($sql);

if($result->num_rows > 0) {
	//输出数据
	while($row = $result->fetch_assoc() ){
		echo "id:".$row['id']."-Name:".$row['firtname'].'<br/>';
		
	}
	
} else {  echo "No Datas";}
 
//读取预处理

$stmt = $conn->stmt_init();
$stmt->prepare("select *  from MyGuests");
$stmt->bind_result($id,$firstname,$lastname,$email,$reg_time);  //参数必须齐全
$stmt->execute();

while($stmt->fetch()){
	echo 'ID: '.$id.'<br/>';
	echo 'firstname: '.$firstname.'<br/>';
	echo 'lastname: '.$lastname.'<br/>';
	echo 'email: '.$email.'<br/>';
	 echo '<p>' . '-----------------------------' .  '</p>';
}

*/


//SQL 中where语句
$sql = "select * from MyGuests where firtname='Mary'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	echo $row['firtname']." ".$row['lastname'].'<br/>';
	
}


 


}


$conn->close();


?>