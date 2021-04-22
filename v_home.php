
<?php
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    ?>
           
		   <BR>
		   
          <body 
		  { background-color: lightblue;}
</body>

		   
    <div class="row">
        <div class="col-xl-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators ">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo base_url(''); ?>style/img/TKS.jpeg" class="d-block w-100" alt="gambar" >
                        <div class="carousel-caption d-none d-md-block">
                            <h5  class="boxed-btn2"  >TK Swasta Methodist Karimun</h5>
                             <h5  class="boxed-btn2"  >Mengasihi lebih sungguh Melayani lebih sungguh</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo base_url(''); ?>style/img/SDS.jpeg" class="d-block w-100" alt="gambar" >
                        <div class="carousel-caption d-none d-md-block">
                            <h5  class="boxed-btn2" >SD Swasta Methodist Karimun</h5>
                            <h5  class="boxed-btn2" >Mengasihi lebih sungguh Melayani lebih sungguh</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo base_url(''); ?>style/img/profile.jpg" class="d-block w-100" alt="gambar" >
                        <div class="carousel-caption d-none d-md-block">
                           <h5  class="boxed-btn2" >TK - SD Swasta Methodist Karimun</h5>
                            <p  class="boxed-btn2" >Mengasihi lebih sungguh Melayani lebih sungguh</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<body>
<marquee  direction="right"><h4> Selamat Datang di website sekolah Yayasan Pendidikan Kristen Methodist Tionghoa Indonesia Karimun</h4></marquee>
<marquee  direction="left"> <h4>Pendaftaran Gelombang Kedua Telah dibuka</marquee></h4>


</body>

	 <div class="recent_event_area section__padding">
        <div class="container">
            <div class="col-xl-20 animated slideInUp">
                    <div class="course_all_btn text-center">
					<div class="single_event align-items-center">
                        <div class="date text-center">
						 <span>Penerimaan Siswa/Siswi Baru</span>
						 <H5>Segera Bergabung Menjadi Siswa-Siswi Baru!</H5>
						 
					<div class="event_info">
				<br>
                        <a href="<?php echo site_url('ppdb');?>" class="boxed-btn5">Daftar</a>
                    </div>
                </div>
                         </div>
                    </div>
					</div>
                </div>
				 </div>
				
 
      
<div class="recent_news_area section__padding">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70 animated slideInRight">
                        <h3 class="animated">Berita Sekolah</h3>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                
                
                
                <?php foreach ($berita->result() as $row) :?>
                <div class="col-md-6 animated slideInUp">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="<?php echo site_url('artikel/'.$row->tulisan_slug);?>">
                                <img src="<?php echo base_url().'assets/images/'.$row->tulisan_gambar;?>" alt="<?php echo $row->tulisan_judul;?>">
                            </a>
                            <a class="badge"><?php echo $row->tulisan_kategori_nama;?></a>
                        </div>
						<div class="program__content">
                        <div class="news_info">
                            <a href="<?php echo site_url('artikel/'.$row->tulisan_slug);?>">
                                <a class="badge"><?php echo $row->tulisan_judul;?></h4>
                            </a>
                            <p><?php echo limit_words($row->tulisan_isi,10).'...';?></p>
                            <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> <?php echo $row->tanggal;?></span> 
                            
                            <span> <i class="flaticon-comment"></i> 00 comments</span>
                            </p>
                        </div>
                    </div>
                </div>
				</div>
                <?php endforeach;?>
                
            </div>
        </div>
    </div>
    <!--/ service_area_start  -->

    <!-- popular_program_area_start  -->
    <div class="popular_program_area">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12" >
                    <div class="section_title text-center animated slideInRight">
                        <h3>Pengumuman Sekolah</h3>
                    </div>
                </div>
            </div>
            
            <div class="tab-content animated slideInUp" id="nav-tabContent" >
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" >
                    <div class="row">
                        
                        
                
                
                        <?php foreach ($pengumuman->result() as $row) :?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single__program">
                                <div class="program_thumb">
                                    <img src="img/program/1.png" alt="">
                                </div>
                                <div class="program__content">
                                    <span><?php echo $row->tanggal;?></span>
                                    <h4><a href="<?php echo site_url('pengumuman');?>"><?php echo $row->pengumuman_judul;?></a></h4>
                                    <p><?php echo limit_words($row->pengumuman_deskripsi,10).'...';?></p>
                                    <a href="<?php echo site_url('pengumuman');?>" class="boxed-btn5">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        
                        
                        
                    </div>
                </div>
                
                
                
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="course_all_btn text-center">
                        <a href="<?php echo site_url('pengumuman');?>" class="boxed-btn4">Lihat Semua Pengumuman</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_program_area_end -->

    <!-- latest_coures_area_start  -->
    
    <!--/ latest_coures_area_end -->

    <!-- recent_event_area_strat  -->
    <div class="recent_event_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70 animated slideInRight">
                        <h3 class="mb-45">Agenda Sekolah</h3>
                        
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 animated slideInUp">
                    
                    
                    <?php foreach ($agenda->result() as $row):?>
                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span><?php echo date("d", strtotime($row->agenda_tanggal));?></span>
                            <p><?php echo date("M. y", strtotime($row->agenda_tanggal));?></p>
                        </div>
                        <div class="event_info">
                            <a href="<?php echo site_url('agenda');?>">
                                <h4><?php echo $row->agenda_nama;?></h4>
                             </a>
                            <p><?php echo limit_words($row->agenda_deskripsi,10).'...';?></p>
                        </div>
                    </div>
                    <?php endforeach;?>
					
                </div>
            </div>
        </div>
    </div>
	
	   
<div class="float-button-wrapper">
<div class="float-button-page right blog-wrapper3">

<a href="https://api.whatsapp.com/send?phone=6281270603321&amp;text=hallo saya mau bertanya tentang penerimaan siswa baru.." target="_blank"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png"></a>
<div class="footer_top">
           </div>
			</div>
			  </div>
			  
<div style="background-image: url('logo.jpeg');"> </div>
