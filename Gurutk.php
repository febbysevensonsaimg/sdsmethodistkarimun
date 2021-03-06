<?php
class Gurutk extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_gurutk');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
        
		$this->data['data']=$this->m_gurutk->get_all_gurutk();
        
        $this->data['breadcrumb']  = 'Data Gurutk';
            
        $this->data['main_view']   = 'admin/v_gurutk';
            
        $this->load->view('theme/admintemplate',$this->data);
        
		
        
	}
	
	function simpan_gurutk(){
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
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$tmp_lahir=strip_tags($this->input->post('xtmp_lahir'));
							$tgl_lahir=strip_tags($this->input->post('xtgl_lahir'));
							$mapel=strip_tags($this->input->post('xmapel'));

							$this->m_gurutk->simpan_gurutk($nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/gurutk');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/gurutk');
	                }
	                 
	            }else{
	            	$nip=strip_tags($this->input->post('xnip'));
					$nama=strip_tags($this->input->post('xnama'));
					$jenkel=strip_tags($this->input->post('xjenkel'));
					$tmp_lahir=strip_tags($this->input->post('xtmp_lahir'));
					$tgl_lahir=strip_tags($this->input->post('xtgl_lahir'));
					$mapel=strip_tags($this->input->post('xmapel'));

					$this->m_guru->simpan_gurutk_tanpa_img($nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/gurutk');
				}
				
	}
	
	function update_gurutk(){
				
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
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$tmp_lahir=strip_tags($this->input->post('xtmp_lahir'));
							$tgl_lahir=strip_tags($this->input->post('xtgl_lahir'));
							$mapel=strip_tags($this->input->post('xmapel'));

							$this->m_guru->update_gurutk($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/gurutk');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/gurutk');
	                }
	                
	            }else{
							$kode=$this->input->post('kode');
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$tmp_lahir=strip_tags($this->input->post('xtmp_lahir'));
							$tgl_lahir=strip_tags($this->input->post('xtgl_lahir'));
							$mapel=strip_tags($this->input->post('xmapel'));
							$this->m_gurutk->update_gurutk_tanpa_img($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/gurutk');
	            } 

	}

	function hapus_gurutk(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_gurutk->hapus_gurutk($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/gurutk');
	}

}