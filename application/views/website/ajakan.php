<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
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
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#join">Join</a>
                    </li>
					<li>
                        <a class="page-scroll" href="<?php echo site_url('login'); ?>">Login</a>
                    </li>
                </ul></div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Oriflame</h1>
                        <p class="intro-text">Disini berisi penjelasan singkat oriflame</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            if ($this->session->flashdata('message') == 'berhasil'){
                echo '<script type="text/javascript">
                             sendEmail();
                        </script>';
            }
            else if($this->session->flashdata('message') == 'gagal'){
                echo '<script type="text/javascript">
                             gagal();
                        </script>'; 
            }
            ?>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Ajakanmu</h2>
                <p><?php echo $halutama['isi']; ?></p>
			
			</div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="join" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Join me</h2>
                    <p>You can download Grayscale for free on the preview page at Start Bootstrap.</p>
                    <a href="<?php echo site_url('HalUtama/daftar'); ?>" class="btn btn-default btn-lg">Join my line</a>
                </div>
            </div>
        </div>
    </section>

     <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>
                <?php 
                    $file = 'assets/visitor/counter.txt'; 
                    if(file_exists($file))
                        { 
                            $file_open = fopen($file, "r"); 
                            $cek = trim(fgets($file_open, 255)); 
                            $cek++; 
                        }
                    else 
                        { 
                            $cek = 1;
                        } 
                    $file_open = fopen($file, "w"); 
                    fwrite($file_open, $cek); 
                    fclose($file_open); 
                    echo 'Anda pengunjung ke '.$cek; 
                ?> 
            </p>
        </div>
    </footer>

