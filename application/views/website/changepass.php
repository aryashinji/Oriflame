<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
					<i class="fa fa-bars"></i>
				</button>
				<a href="<?php echo base_url ('member'); ?>" class="btn btn-circle" style="font-size: 24px; border:0px;">
					<i class="fa fa-angle-double-left animated"></i> <span style="margin-left:em;"class="light">Back</span>
				</a>
			</div>
			
	<!--login section-->
	<section id="login">
		<div align="center" class="container">
		<?php echo validation_errors('<div class="alert">', '</div>'); ?>
		  <form action="<?php echo site_url('member/gantipass');?>" class="form-signin" method="POST">
			<h2 class="form-signin-heading">Ganti password</h2>
			<h4 for="inputPassword" class="sr-only">Password Lama</h4>
			<input type="password" id="password" name="pass" class="form-control" placeholder="Password Lama" required>
			<h4 for="inputPassword" class="sr-only">Password Baru</h4>
			<input type="password" id="password" name="passconf" class="form-control" placeholder="Password Baru" required>
			<h4 for="inputPassword" class="sr-only">Konfirmasi Password</h4>
			<input type="password" id="password" name="confirmation" class="form-control" placeholder="Konfirmasi Password Baru" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		  </form>

    </div> <!-- /container -->
	</section>
	<?php 
        if ($this->session->flashdata('message') == 'berhasil'){
            echo '<script type="text/javascript">
                    pass();
                    </script>';
        } 
        else if ($this->session->flashdata('message') == 'gagal')
        {
            echo '<script type="text/javascript">
                    gagal();
                    </script>';
        }
    ?>

</body>

</html>
