<?php
$q = isset($_POST['q'])? $_POST['q'] : '';
if(is_array($q)) {
    $sites = array(
            'RUNOOB' => '菜鸟教程: http://www.runoob.com',
            'GOOGLE' => 'Google 搜索: http://www.google.com',
            'TAOBAO' => '淘宝: http://www.taobao.com',
    );
	
    foreach($q as $val) {
        // PHP_EOL 为常量，用于换行
        echo $sites[$val] . PHP_EOL;
    }
      
} else {
?>
<form action="" method="post"> 
<!--    <select multiple="multiple" name="q[]">
//    <option value="">选择一个站点:</option>
//    <option value="RUNOOB">Runoob</option>
 //   <option value="GOOGLE">Google</option>
 //   <option value="TAOBAO">Taobao</option>
 //   </select> -->
	
	<input type="checkbox" value="RUNOOB" name="q[]"> 123
	<input type="checkbox" value="GOOGLE" name="q[]"> 122
	<input type="checkbox" value="TAOBAO" name="q[]"> 124
	
	
	
    <input type="submit" value="提交">
    </form>
<?php
}
?>
