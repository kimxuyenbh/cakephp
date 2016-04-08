<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<div style="color:#C00; font-size:24px" id="top">CakePHP</div>
	<?php
		echo "<table width='500' height='100' border='1'>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Photo</td>
				<td>Description</td>
				<td>Price</td>
				<td>Created_date</td>
				<td colspan='2'>Action</td>
			</tr>";
	//nếu k p? là truy vấn thì dùng model
		foreach($data as $item)
		{
			echo "<tr>";
			echo "<td>".$item['Product']['ID']."</td>"; //$item['ten_Model']['Ten_cot']
			echo "<td>".$item['Product']['Name']."</td>";
			echo "<td>".$item['Product']['Photo']."</td>";
			echo "<td>".$item['Product']['Description']."</td>";
			echo "<td>".$item['Product']['Price']."</td>";
			echo "<td>".$item['Product']['Created_date']."</td>";
			echo "<td>"."<a href="."'".$this->webroot."Products/edit/".$item['Product']['ID']."'".">Edit</a>"."</td>";
			echo "<td>"."<a href="."'".$this->webroot."Products/del/".$item['Product']['ID']."'".">Del</a>"."</td>";
			echo "</tr>";
		}
		echo "</table>";
		//khi sử dụng sql thì dùng tên bảng
		/*foreach($data as $item)
		{
			echo $item['Products']['ID']; //$item['ten_Model']['Ten_cot']
			echo $item['Products']['Name'];
			echo $item['Products']['Photo'];
			echo $item['Products']['Description'];
			echo $item['Products']['Price'];
			echo $item['Products']['Created_date'];
		}*/
	?>
	<a href='<?php echo $this->webroot."Products/view";?>' style="border:solid; text-decoration:none">Tìm kiếm</a>
    <a href='<?php echo $this->webroot."Products/Insert";?>' style="border:solid; text-decoration:none">Thêm Product</a>
    <a href='<?php echo $this->webroot."Products/download"?>' style="border:solid; text-decoration:none">Xuất CSV</a>
    <br />
    <?php
		echo "<br>";
		echo $this->Paginator->prev('<< Previous',null,null,array('class'=>'disable'));//nút previous
		echo "|".$this->Paginator->numbers()."|";//số trang
		echo $this->Paginator->next('>> Next',null,null,array('class'=>'disable'));//nut next		
		echo "<br>";
		echo $this->Paginator->counter();//tổng trang
		echo "<br>";
	?>
</body>
</html>