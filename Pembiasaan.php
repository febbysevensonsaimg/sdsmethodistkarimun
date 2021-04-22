<?php
class Pembiasaan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pembiasaan');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
        
		$this->data['data']=$this->m_pembiasaan->get_all_pembiasaan();
        
        $this->data['breadcrumb']  = 'Data Kegiatan Pembiasaan';
            
        $this->data['main_view']   = 'admin/v_pembiasaan';
            
        $this->load->view('theme/admintemplate',$this->data);
        
		
        
	}
	
	function simpan_pembiasaan(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $photo=$gbr['file_name'];
							$nama=strip_tags($this->input->post('xnama'));
							$deskrip=strip_tags($this->input->post('xdeskrip'));

							$this->m_pembiasaan->simpan_pembiasaan($nama,$deskrip,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/pembiasaan');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/pembiasaan');
	                }
	                 
	            }else{
					$nama=strip_tags($this->input->post('xnama'));
					$deskrip=strip_tags($this->input->post('xdeskrip'));

					$this->m_pembiasaan->simpan_pembiasaan_tanpa_img($nama,$deskrip);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/pembiasaan');
				}
				
	}
	
	function update_pembiasaan(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
	                        $gambar=$this->input->post('gambar');
							$path='./assets/images/'.$gambar;
							unlink($path);

	                        $photo=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
							$nama=strip_tags($this->input->post('xnama'));
							$deskrip=strip_tags($this->input->post('xdeskrip'));

							$this->m_pembiasaan->update_pembiasaan($kode,$nama,$deskrip,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/pembiasaan');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/pembiasaan');
	                }
	                
	            }else{
							$kode=$this->input->post('kode');
							$nama=strip_tags($this->input->post('xnama'));
							$deskrip=strip_tags($this->input->post('xdeskrip'));
							$this->m_pembiasaan->update_pembiasaan_tanpa_img($kode,$nama,$deskrip);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/pembiasaan');
	            } 

	}

	function hapus_pembiasaan(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_pembiasaan->hapus_pembiasaan($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/pembiasaan');
	}

}