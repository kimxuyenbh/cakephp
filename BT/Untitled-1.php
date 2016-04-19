<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php 
		$masv="";
		$tensv="";
		$ngaysinh="";
		$gioitinh="";
		$masv2="";
		$tensv2="";
		$ns2="";
		$gt2="";
		$stt="";
		$rpp=3;
		$thh="";
		$i=0;
		$cn = mysql_connect("localhost","root","");
		mysql_select_db("qlhs",$cn);
		mysql_query("SET NAME 'UTF8'");
		$laydl=mysql_query("select sv.*, TenNganh from SinhVien sv, Nganh n where sv.Nganh=n.MaNganh",$cn);
		$numrow=mysql_num_rows($laydl);
		$sotrang = $numrow/$rpp;
		$laynganh=mysql_query("select * from nganh",$cn);
		if($cn)
		{
			if(isset($_POST["Them"]))
			{
				if($_POST["MaSV"]!="" && $_POST["TenSV"]!="")
				{
					$masv=$_POST["MaSV"];
					$tensv=$_POST["TenSV"];
					$ngaysinh = $_POST["NS"];
					$gioitinh=$_POST["GT"];
					$nganhhoc=$_POST["Nganh"];
					$tenanh=$_FILES["Hinh"]["name"];
					if($_FILES["Hinh"]["error"]==0)
					{
						move_uploaded_file($_FILES["Hinh"]["tmp_name"],"./Upload/".$_FILES["Hinh"]["name"]);
						$tb = "Them thanh cong";
					}
					else $tb="K thanh cong";
					$sql = mysql_query("insert into SinhVien values('$masv','$tensv','$ngaysinh','$gioitinh','$nganhhoc','$tenanh')",$cn);
						
				}	
			}
			if(isset($_REQUEST["MaSV1"]))
			{
				$xoang=$_REQUEST["MaSV1"];
				$xoa = mysql_query("Delete from SinhVien where MaSinhVien='$xoang'",$cn);
			}
			if(ISSET($_POST["Save"]))
			{
				$_REQUEST["TenSV2"]="";
				$_REQUEST["MaSV2"]="";
				$_REQUEST["NS2"]="";
				$_REQUEST["GT2"]="";
				if(isset($_REQUEST["MaSV"]) && isset($_REQUEST["TenSV"]) && isset($_REQUEST["NS"]) && isset($_REQUEST["GT"]))
				{
					$masv2 = $_REQUEST["MaSV"];
					$tensv2 = $_REQUEST["TenSV"];
					$ns2=$_REQUEST["NS"];
					$gt2=$_REQUEST["GT"];
					$sql = mysql_query("Update SinhVien set TenSinhVien='$tensv2', NamSinh='$ns2' where MaSinhVien='$masv2'",$cn);
				}
			}
			if(isset($_REQUEST["thh"]))
			{
				$thh=$_REQUEST["thh"];
			}
			$svpt=mysql_query("select sv.*, TenNganh from SinhVien sv, Nganh n where sv.Nganh=n.MaNganh limit ".$rpp*$thh.",$rpp",$cn);
			$laydl=mysql_query("select sv.*, TenNganh from SinhVien sv, Nganh n where sv.Nganh=n.MaNganh",$cn);
			mysql_close($cn);	
		}
		
	?>
	<form method="post" action="Untitled-1.php" enctype="multipart/form-data">
    	<table width="500px" height="500px" border="1" align="center">
        	<tr>
            	<td>MaSV</td>
                <td><input name="MaSV" type="text"  value="<?php echo $_REQUEST["MaSV2"]?>"/></td>
            </tr>
            <tr>
            	<td>TenSV</td>
                <td><input name="TenSV" type="text"  value="<?php echo $_REQUEST["TenSV2"]?>"/></td>
            </tr>
            <tr>
            	<td>NgaySinh</td>
                <td><input name="NS" type="text"  value="<?php echo $_REQUEST["NS2"]?>"/></td>
            </tr>
            <tr>
            	<td>GT</td>
                <td><input name="GT" type="text"  value="<?php echo $_REQUEST["GT2"]?>"/></td>
            </tr>
            <tr>
            	<td>Nganh</td>
                <td>
                	<select name="Nganh">
                    	<?php
								if($cn)
								{
									if(mysql_num_rows($laynganh)!=0)
									{
										while($dong=mysql_fetch_row($laynganh))
										{
											$mang= $dong[0];
											$tenng=$dong[1];
											echo "<option value='$mang'>".$tenng."</option>";
										}
									}
								}
						 ?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>Hinh</td>
                <td><input name="Hinh" type="file"  /></td>
            </tr>
             <tr>
            	<td><input id="Them" name="Them" type="submit" value="Thêm"/></td>
            </tr>
            <tr>
            	<td><input id="Save" name="Save" type="submit" value="Save"/></td>
            </tr>
            <tr>
            	<?php
					if(mysql_num_rows($svpt)!=0)
					{
						echo "<table width='500px' height='300px' border='1'>
								<tr>
									<td>MaSV</td>
									<td>TenSV</td>
									<td>NgaySinh</td>
									<td>Gioitinh</td>
									<td>Nganh</td>
									<td>Hinh</td>
								</tr>";
								while($dong=mysql_fetch_row($svpt))
								{
									$ma="";
									$ten="";
									$ns="";
									$gt="";
									$ma=$dong[0];
									$ten=$dong[1];
									$ns = $dong[2];
									$gt=$dong[3];
									$nganh=$dong[4];
									$hinh=$dong[5];
									echo "<tr>
										<td>$ma</td>
										<td>$ten</td>
										<td>$ns</td>
										<td>$gt</td>
										<td>$nganh</td>
										<td><img width='50px' height='50px' src='Upload/$hinh'/></td>
										<td><a href='Untitled-1.php?MaSV1=$ma'>Xoa</a></td>
										<td><a href='Untitled-1.php?MaSV2=$ma&&TenSV2=$ten&&NS2=$ns&&GT2=$gt'>Sua</a></td>
									</tr>";
								}
							echo "</table>";		
					}
				?>
            </tr>
            <tr>
            	<td>
                	<?php
						for($i; $i<$sotrang; $i++)
						{
							$stt=$i+1;
							echo "<a href='Untitled-1.php?thh=$i'>$stt </a>";
						}
					?>
                </td>
            </tr>
        </table>
	</form>
</body>
</html>