<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php
		class ProductsController extends AppController
		{
			var $name="Products";
			var $helpers = array('Form','Paginator','Html', 'Csv');//đoạn code dùng để phân trang
			var $paginate = array();
			var $components = array('Session');	//đoạn code dùng để phân trang	

			/*function index()
			{
				//cách sử dụng thông thường
				$data = $this->Product->find("all");
				$this->set("data",$data);
			}*/
			
			/*function index()
			{
				//cách lọc có dk
				$data = $this->Product->find("all", array('conditions' => array('ID'=> "2")));
				$this->set("data",$data);
			}*/
			
			/*function index()
			{ 
				//cách sử dụng truy vấn
				$data = $this->Product->query("Select * From Products");
				$this->set("data",$data);
			}*/
			function index()//dặt tên hàm sao thì tên trang.ctp giống tên hàm
			{
				//phân trang
				$this->paginate = array('limit' => 4, 'order' => array('id'=>'desc'));//limit mỗi page có 1 record
				$data=$this->paginate("Product");
				$this->set("data",$data);
				
			}
			//hàm view và tìm kiếm
			function view()
			{
				$conditions = array();
				$data = array();
				if(!empty($this->passedArgs))//kiểm tra tiêu đề có nhập hay chưa
				{
					if(isset($this->passedArgs))
					{
						$name=$this->passedArgs['Product.Name'];
						$conditions[]=array('Product.Name LIKE' => "%".$name."%");
						$data['Product']['Name']=$name;
					}
					$this->paginate=array('limit'=>4, 'order'=>array('ID'=>'asc'));
					$this->data=$data;
					$post = $this->paginate("Product",$conditions);
					$this->set("post",$post);
				}
			}
			function search()
			{
				$URL['action']='view';
				foreach($this->data as $key=>$value)
				{
					foreach($value as $key2=>$value2)
					{
						$URL[$key.'.'.$key2]=$value2;
					}
				}
				$this->redirect($URL, null, true);//chuyển hướng sang view
			}
			function Insert()
			{
				if(!empty($this->data))
				{
					//$this->Product->set($this->data);
					$this->Product->create($this->data);
					if($this->Product->validateProduct())
					{
						$this->Product->save($this->request->data);
						$this->Session->setFlash("Them thanh cong");
					}
					//debug($this->Product->validationErrors);
				}
				else $this->render();
			}
			function edit($id = null) 
			{
    			if (!$id) {
					$this->Session->setFlash("Khong hop le");
        			//throw new NotFoundException(__('Post is not valid!'));
    			}
    			$post = $this->Product->findById($id);
    			if (!$post) {
					$this->Session->setFlash("Khong hop le");
        			//throw new NotFoundException(__('Post is not valid!'));
    			}
    			if ($this->request->is('post') || $this->request->is('put')) 
				{
        			$this->Product->id = $id;
        			$post_data = $this->request->data;
					if ($this->Product->save($post_data)) 
					{
						$this->Session->setFlash("Cap nhat thanh cong");
						return $this->redirect(array('action' => 'index'));
					}
					$this->Session->setFlash("Cap nhat khong thanh cong");
    			}
				if (!$this->request->data) 
				{
					$this->request->data = $post;
				}
			}  	
			function del($id)
			{
				if(isset($id))
				{
					$data = $this->Product->read(null,$id);
					if(!empty($data))
					{
						$this->Product->delete($id);
					}	
				}
				$this->redirect('index');
			}
			function download()
			{
				$this->set('products',$this->Product->find('all'));
				$this->layout=null;
				$this->autoLayout=false;
				//Configure:write('debug','0');
			}
		} 
	?>
</body>
</html>