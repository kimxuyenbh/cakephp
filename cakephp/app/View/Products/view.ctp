<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php echo $this->Form->create('Product',array('action'=>'search'))?>
    <?php 
		//echo $this->Form->input('ID');
		echo $this->Form->input('Name');
		//echo $this->Form->input('Photo');
		//echo $this->Form->input('Description');
		//echo $this->Form->input('Created_date');
		echo $this->Form->submit('Search');	
	?>
    <?php echo $this->Form->end()?>
    <?php echo $this->Paginator->options(array('URL'=>$this->passedArgs))?>
	<?php
		if(!empty($post))
		{
			echo "<table width='500' height='100' border='1'>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Photo</td>
					<td>Description</td>
					<td>Price</td>
					<td>Created_date</td>
				</tr>";
			foreach($post as $item)
			{
				echo "<tr>";
				echo "<td>".$item['Product']['ID']."</td>"; //$item['ten_Model']['Ten_cot']
				echo "<td>".$item['Product']['Name']."</td>";
				echo "<td>".$item['Product']['Photo']."</td>";
				echo "<td>".$item['Product']['Description']."</td>";
				echo "<td>".$item['Product']['Price']."</td>";
				echo "<td>".$item['Product']['Created_date']."</td>";
				echo "</tr>";
			}
			echo "</table>";
			echo $this->Paginator->prev('<< Previous',null,null,array('class'=>'disabled'));//nút previous
			echo "|".$this->Paginator->numbers()."|";//số trang
			echo $this->Paginator->next('>> Next',null,null,array('class'=>'disabled'));//nut next		
			echo "<br>";
			//echo $this->Paginator->counter();//tổng trang
			echo "<br>";
		}
	?>
    <a href='<?php echo $this->webroot."Products/index";?>' style="border:solid; text-decoration:none">Back</a>;
  
</body>
</html>