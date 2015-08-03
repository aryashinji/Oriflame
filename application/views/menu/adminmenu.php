<body>

    <div  style="background: #222;">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#">
                    <i class="fa fa-play-circle"></i>  <span class="light">Ira</span> Oriflame
                </a>
                <a class="navbar-brand">
                    <?php
                        $file = 'assets/visitor/counter.txt'; 
                        $file_open = fopen($file, "r"); 
                        $cek = trim(fgets($file_open, 255)); 
                        fclose($file_open); 
                        echo 'Jumlah pengunjung : '.$cek; 
                    ?>
                </a>
            </div>
			<ul class="nav navbar-right top-nav">
				<li>
                    <a href="<?php echo site_url('backend'); ?>"><i class="fa fa-fw fa-dashboard"></i> Editor</a>
                </li>
				<li>
					<a href="<?php echo site_url('backend/materi'); ?>"><i class="fa fa-fw fa-table"></i> Materi</a>
				</li>
				<li>
					<a href="<?php echo site_url('backend/non'); ?>"><i class="fa fa-fw fa-edit"></i> List Pendaftar</a>
				</li>
				<li>
					<a href="<?php echo site_url('backend/member'); ?>"><i class="fa fa-fw fa-edit"></i> List Member</a>
				</li>
				<li> <a href="<?php echo site_url('backend/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
			</ul>
        </nav>
