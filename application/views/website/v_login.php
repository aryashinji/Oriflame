<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
					<i class="fa fa-bars"></i>
				</button>
				<a href="<?php echo base_url ('HalUtama'); ?>" class="btn btn-circle" style="font-size: 24px; border:0px;">
					<i class="fa fa-angle-double-left animated"></i> <span style="margin-left:em;"class="light">Home</span>
				</a>
			</div>
			
	<!--login section-->
	<section id="login">
		<div align="center" class="container">
		<?php echo validation_errors('<div class="alert">', '</div>'); ?>
		  <form action="<?php echo site_url('verifylogin');?>" class="form-signin" method="POST">
			<h2 class="form-signin-heading">Please sign in</h2>
			<label for="inputEmail" class="sr-only">Username</label>
			<input type="email" id="username" name="username" class="form-control" placeholder="Email address" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		  </form>

    </div> <!-- /container -->
	</section>

</body>

</html>
