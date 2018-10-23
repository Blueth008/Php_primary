<?php 

try{

//解析config.ini 文件  MySQL的配置文件
 $config = parse_ini_file(realpath(dirname(__FILE__) . '/config/config.ini'));

//链接MySQL的服务器
$conn = mysqli_connect($config['host'],$config['username'],$config['password'],$config['dbname']);

if(!$conn) {
	die("连接数据库失败：".mysqli_connect_error());
}

//连接成功后的数据库操作
//echo '连接成功';

//使用MySQL 创建数据表
/*
$sql = "create table mylogins(
	id int(6) unsigned auto_increment primary key,
	name varchar(30) not null,
	password varchar(30) not null,
	email varchar(30),
	reg_date timestamp
	
)";


if(mysqli_query($conn,$sql)) {
    echo "数据表Mylogin创建成功".PHP_EOL;
} else {
	echo "创建失败".mysqli_error($conn).PHP_EOL;
}

*/


//插入数据
/*
$sql = "insert into mylogins(name,password) values('red','666666')";

if(mysqli_query($conn,$sql)){
	
	echo "插入数据成功".PHP_EOL;
} ELSE {
	echo "Error: ".mysqli_error($conn).PHP_EOL;	
}
*/

//插入多条数据 使用$sql .= "insert into ()" ;来实现少量的插入 大量的插入考虑数组和预处理
//预处理语句
 
$arrdatas = array(    
	array('Tom2','4534523'),
	array('Jhon2','asd123'),
	array('Lucy2','sd123adfs')
 );   //用户数组

//预处理和绑定

$sql = "insert into mylogins(name,password) values(?,?)";
// 创建预处理语句
$stmt=mysqli_stmt_init($conn);

if( mysqli_stmt_prepare($stmt,$sql) ){
	
	 // 绑定参数
    mysqli_stmt_bind_param($stmt,"ss",$name,$password);
	
	//执行处理
	foreach($arrdatas as $key=>$values){
		$name = $values[0];
		$password = $values[1];
		mysqli_stmt_execute($stmt);
	}
	mysqli_stmt_bind_result($stmt, $name, $code);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        printf ("%s (%s)\n", $name, $code);
    }
	
	echo "插入数组预处理成功";
	

}

// 关闭预处理语句
    mysqli_stmt_close($stmt);

 


//读取数据
/*
$sql = "select name,password from mylogins";
$result = mysqli_query($conn,$sql);

if( mysqli_num_rows($result) >0 ){
	//输出数据
	while( $row = mysqli_fetch_assoc($result)) {
		
		echo "Name: ".$row['name']."-Password: ".$row['password'].'<br/>';
	}
	
	
}else {  echo "结果为0";}


*/


mysqli_close($conn); //关闭数据库
}catch (Exception $e){        //捕获异常
    echo $e->getMessage();    //打印异常信息
}





?>