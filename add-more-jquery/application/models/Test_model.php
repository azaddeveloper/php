<?php
class Test_model extends CI_Model
{
	public function get_user(){
		$this->db->select("*")->from('user');
		$query=$this->db->get();
		return $query->result();
	}
	public function add_user($data){
		$query=$this->db->insert_batch('user',$data); // for insert array in db
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function update_user($id,$data){
         $query=$this->db->where('id',$id);
         $this->db->update('user',$data);
         $result=$this->getUSerBYID($id);
         return $result;
	}
	public function getUSerBYID($id){
		$this->db->select("*")->from('user')->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
}
?>
