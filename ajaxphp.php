<?php
	$host = '192.168.3.147';
	$username = 'root';
	$password ='abc123';
	$dbname = 'test';
	
	$q = isset($_GET['q'])? intval($_GET['q']):'';   //断言q存在 然后整数化
	
	if(empty($q)){
		echo "选择一个网站";
		exit;
	}
	
	$con = new mysqli($host,$username,$password,$dbname);
	
	if($con->connect_error){
		die("连接失败。数据没有找到或者不村在".$con->connect_error);		
	}
	
	$con->set_charset("utf8"); //防止中文乱码
	$sql = "select * from websites where id='".$q."'";
	$result = $con->query($sql);
	if($result->num_rows > 0) {
		echo "<table border='1'>
				<tr>
				<th>ID</th>
				<th>网站名</th>
				<th>网站 URL</th>
				<th>Alexa 排名</th>
				<th>国家</th>
				</tr>";		
		
		while($row = $result->fetch_assoc()){
			echo '<tr>';
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['url']."</td>";
			echo "<td>".$row['alexa']."</td>";
			echo "<td>".$row['country']."</td>";
			echo '</tr>';
		}
		echo "</table>";
	}
	$con->close();
?>
