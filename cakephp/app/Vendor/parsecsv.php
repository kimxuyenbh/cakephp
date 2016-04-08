<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php
		App::import("Vendor","parsecsv");
		$csv = new parseCSV();
		$filepath = WWW_ROOT."export.csv";
		$csv->auto($filepath);
		$this->set('products',$csv->data);
		$this->layout = null;
		$this->autoLayout = false;
		Configure::write('debug', '0');
	?>
</body>
</html>