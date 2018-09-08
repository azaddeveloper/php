<?php 
class Test extends CI_Controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Test_model');
	}
	public function index(){
      $data['user']=$this->Test_model->get_user();
      $this->load->view('show_user',$data);
	}
	public function add_data(){
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$img=$_FILES['img'];
		$loop_time=count($name);
		$data=array();
		for($i=0;$i<=$loop_time-1;$i++){

			 $pic=$img['name'][$i];
			 $folder = "assets/";
			 $rand=rand(0,100);
			 $name=$rand.$pic;
			 $path = $folder.$name;
			 move_uploaded_file($img["tmp_name"][$i], $path);
			 $data[] = array("name" => $name[$i] ,  "email" =>$email[$i] ,"file" =>$name); 
		}
		$result=$this->Test_model->add_user($data);
		if($result){
			echo 1;
		}else{
			echo 0;
		}
	}
	public function update_data(){
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$file_name=$this->input->post('old_user_img');
		$is_user_update=$this->input->post('is_user_update');
		if($is_user_update > 0){
			 $img=$_FILES['userfile'];
			 $pic=$img['name'];
			 $folder = "assets/";
			 $rand=rand(0,100);
			 $file_name=$rand.$pic;
			 $path = $folder.$file_name;
			 move_uploaded_file($img["tmp_name"], $path);
		}
        $data= array("name" => $name ,  "email" =>$email,"file" =>$file_name); 
        $result=$this->Test_model->update_user($id,$data);
        print_r($result);

	}

	 
}

?>