<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php
		class CsvHelper extends AppHelper
		{
			var $delimiter =',';
			var $enclosure='"';
			var $filename='Export.csv';
			var $line =array();
			var $buffer;
			function CsvHelper()
			{
				$this->clear();
			}
			function clear()
			{
				$this->line=array();
				$this->buffer=fopen('php://temp/maxmemory:'.(5*1024*1024),'r+');
			}
			function addField($value)
			{
				$this->line[]=$value;
			}
			function endRow()
			{
				$this->addRow($this->line);
				$this->line=array();
			}
			function addRow($row)
			{
				fputcsv($this->buffer, $row, $this->delimiter, $this->enclosure);
			}
			function renderHeaders()
			{
				header("Content-type:application/vnd.ms-excel");
				header("Content-disposition:attachment;filename=".$this->filename);
			}
			function setFileName($filename)
			{
				$this->filename=$filename;
				if(strtolower(substr($this->filename,-4))!='.csv')
				{
					$this->filename.='.csv';
				}
			}
			function render($outheader =true, $to_encoding=null, $from_encoding="auto")
			{
				if($outheader)
				{
					if(is_string($outheader))
					{
						$this->setFileName($outheader);
					}
					$this->renderHeaders();
				}
				rewind($this->buffer);
				$ouput = stream_get_contents($this->buffer);
				if($to_encoding)
				{
					$ouput=mb_convert_encoding($ouput,$to_encoding,$from_encoding);
				}
				return $this->output($ouput);
			}
		}
	 ?>
</body>
</html>