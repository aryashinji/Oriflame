<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="margin-top: 0px;">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">Ira</span> Oriflame
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo site_url('HalUtama'); ?>/#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo site_url('HalUtama'); ?>/#join">Join</a>
                    </li>
					<li>
                        <a class="page-scroll" href="<?php echo site_url('login'); ?>">Login</a>
                    </li>
                </ul>
			</div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Contact Section -->
    <section id="contact" style="padding-top: 7%; padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="height: 7em;">
                    <h2 class="section-heading">Join Me</h2>
                    <h3 class="section-subheading text-muted">Masukkan data yang diperlukan untuk masuk</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 text-center" style="margin-left: 25%;">
                    <form name="sentMessage" enctype="multipart/form-data" id="contactForm" action="<?php echo site_url('HalUtama/daftarmasuk'); ?>" method="POST" novalidate>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama *" name="name" id="name" required data-validation-required-message="Tolong masukkan nama anda.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email *" name="email" id="email" required data-validation-required-message="Tolong masukkan alamat email anda.">
                            <p class="help-block text-danger"></p>
                        </div>
						<div class="form-group">
                            <input type="number" class="form-control" placeholder="Nomor KTP *" name="ktp" id="ktp" required data-validation-required-message="Tolong masukkan nomor KTP anda.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Nomor Telepon *" name="phone" id="phone" required data-validation-required-message="Tolong masukkan nomor telepon anda.">
                            <p class="help-block text-danger"></p>
                        </div>
						<div class="form-group">
                            <label style="text-align: left;">Foto Scan KTP</label>
                            <input type="file" name="ktpnon" id="foto" required data-validation-required-message="Tolong sertakan juga gambar KTP anda.">
						</div>
                        
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">Join In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
