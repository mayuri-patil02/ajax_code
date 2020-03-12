<?php
class Blog_controller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url','form');
		$this->load->model('Blog_Model');

	}
	public function savedata()
	{
		 $data['categories']=$this->Blog_Model->getAllcategory();
         $data['tags']          = $this->Blog_Model->getAlltag();
	     $data['authors']       = $this->Blog_Model->getAllauthor();
		$this->load->view('add',$data);
		if($this->input->post('save'))
		{
			$n=$this->input->post('blog');
			$b=$this->input->post('dblog');
			$c=$this->input->post('cat');
			$t=$this->input->post('tag');
			$a=$this->input->post('author');
			$this->Blog_Model->saverecords($n,$b,$c,$t,$a);		
			redirect("Blog_controller/dispdata");  
		}
	}
	public function dispdata()
	{
		$result['data']=$this->Blog_Model->displayrecords();
		$this->load->view('view_page',$result);
	}
	public function updatedata($id)
	{
		//echo $id;
		 $data['categories']=$this->Blog_Model->getAllcategory();
         $data['tags']          = $this->Blog_Model->getAlltag();
	     $data['authors']       = $this->Blog_Model->getAllauthor();
		 $data['data']=$this->Blog_Model->displayrecordsById($id);
		$this->load->view('update_view',$data);
		 if($this->input->post('update'))
		 {
		 	$blog_title=$this->input->post('blog');
			$blog_description=$this->input->post('dblog');
			$c=$this->input->post('cat');
			$t=$this->input->post('tag');
			$a=$this->input->post('author');
			$this->Blog_Model->updaterecords($blog_title,$blog_description,$c,$t,
				$a,$id);
			redirect("Blog_controller/dispdata");
		 }
	}
	 public function  category()
	 {
	 // 	echo "<pre>";
		// print_r($_POST);die();
    
		$data['category'] = $this->Blog_Model->get_category();
		$this->load->view('add', $data); 
	}
	public function  tag()
	{
		$data['tag'] = $this->Blog_Model->get_tag();
		$this->load->view('add', $data); 
	}
	public function  author()
	{
		$data['author'] = $this->Blog_Model->get_author();
		$this->load->view('add', $data); 
	}
	public function update_status()
	{
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->Blog_Model->user_records($id,$status);
	}
}
?>