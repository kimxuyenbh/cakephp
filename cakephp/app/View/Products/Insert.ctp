<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert</title>
</head>

<body>
	<?php echo $this->Form->create('Product',array('action'=>'Insert'))?>
	<?php 
		echo $this->Form->input('ID');
		echo $this->Form->input('Name');
		echo $this->Form->input('Photo');
		echo $this->Form->input('Description');
		echo $this->Form->input('Price');
		echo $this->Form->input('Created_date');
		echo $this->Form->submit('Save');
		echo $this->Form->end();
	?>
    <a href='<?php echo $this->webroot."Products/index"?>' style="border:solid; text-decoration:none">Back</a>
</body>
</html>