<?php
class Blog_Model extends CI_Model 
{
	function saverecords($n,$b,$c,$t,$a)
	{
		$data['blog_title'] = $_POST['blog'];
		$data['blog_description'] = $_POST['dblog'];
		$data['cid'] = $_POST['cat'];
		$data['tag_id'] = $_POST['tag'];
		$data['author_id'] = $_POST['author'];
		$this->db->insert('myblog', $data);
	}
	function displayrecords()
	{
	$query=$this->db->query("select * from myblog");
	return $query->result();
	}
	function updaterecords($blog_title,$blog_description,$c,$t,$a,$id)
	{

	$query=$this->db->query("update myblog SET blog_title='$blog_title',blog_description='$blog_description',cid='$c',tag_id='$t',
	author_id='$a' where sr_no='".$id."'");
	 }	
	function displayrecordsById($id)
	{
		$query = $this->db->get_where('myblog', array('sr_no' => $id));
		return $query->result();
	}	
	function getAllcategory()
    {
        $query = $this->db->query('SELECT * FROM category');
        return $query->result_array();
    }

	  function getAlltag()
    {
     	$query = $this->db->query('SELECT * FROM tag');
        return $query->result_array();   
    }
    function getAllauthor()
    {	
    	$query = $this->db->query('SELECT * FROM author');
        return $query->result_array();
    }
	function user_records($id,$status)
	{

		$data = array(
			'status' => $status
		);
		$this->db->where('sr_no',$id);
		$this->db->update('myblog',$data);
	}

	// public function get_category() { 
	//   $result = $this->db->select('cid, cat_name')->get('category')->result_array(); 
 // 	 $category = array(); 
 //        foreach($result as $r) { 
 //            $category[$r['cid']] = $r['cat_name']; 
 //        } 
 //        $category[''] = 'Select'; 
 //        return $category; 
 //    } 
}
?>