<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php
		class Product extends AppModel
		{
			var $name="Product";
			function validateProduct()
			{
				$this->validate = array("ID"=>array("rule1"=> array("rule"=>"notBlank", "message"=>"ID không được rỗng")
				, "rule2"=>array("rule"=>"checkID","message"=>"ID đã có"))
				, "Name"=>array("rule"=>"notBlank","message"=>"Tên product không được rỗng")
				, "Description"=>array("rule"=>"notBlank","message"=>"Mô tả không được rỗng"));
				if($this->validates($this->validate)) return TRUE;
				else return FALSE;
			}
			function checkID()
			{
				if(isset($this->data['Product']['ID']))
					$where = array("ID"=>$this->data['Product']['ID']);
				$this->find("first",array('conditions'=>$where));
				$count=$this->getNumRows();
				if($count!=0) return FALSE;
				else return TRUE;
			}
		} 
	?>
</body>
</html>