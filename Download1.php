<?php
class Download1 extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_files1');
		$this->load->helper('download');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
        
        $this->data['main_view']   = 'depan/v_download1';
        
		$this->data['data']=$this->m_files1->get_all_files1();
        
		$this->load->view('theme/template',$this->data);
        
	}

	function get_file1(){
		$id=$this->uri->segment(3);
		$get_db=$this->m_files1->get_file1_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$path='./assets/files/'.$file;
		$data = file_get_contents($path);
		$name = $file;
		force_download($name, $data);
	}

}
