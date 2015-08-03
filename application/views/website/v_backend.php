        <div id="page-wrapper">
            <div class="container-fluid" >
				<!-- Page Heading -->
                <div class="row" >
                    <div class="col-lg-6" >
                        <h1 class="page-header">
                            Editor
                        </h1>
                    </div>
                </div>
                    <!-- /.col-sm-4 -->
                <div>
					<div class="col-lg-6">                    
						<a href="<?php echo site_url('backend');?><?php if($enable)echo "?edit=0"; else echo "?edit=1" ?>"><button type="button" class="btn btn-circle btn-<?php if($enable)echo "danger"; else echo "primary" ?>"><?php if($enable)echo "disable"; else echo "enable"; ?></button></a>
		                <fieldset <?php if(!$enable)echo "disabled" ?>>
			                <form role="form" action="<?php echo site_url('backend/addinfo');?>" method="POST">
			                	<h3>Data Informasi</h3>
								<div class="form-group">
				                    <label for="disabledSelect">Email</label>
				                    <input class="form-control" name="emailadmin" id="emailadmin" type="email" value="<?php echo $kontak['email']; ?>">
				                </div>
								<div class="form-group">
				                    <label for="disabledSelect">Nomor Telepon</label>
				                    <input class="form-control" name="tlpadmin" id="tlpadmin" type="text" value="<?php echo $kontak['telp']; ?>">
				                </div>
				                <div class="form-group">
				                    <label for="disabledSelect">Password Baru</label>
				                    <input class="form-control" name="pass" id="password" type="password">
				                    <label for="disabledSelect">Konfirmasi Password</label>
				                    <input class="form-control" name="passconf" id="password" type="password">
				                </div>
				                <div class="form-actions">
                                	<button type="submit" class="btn btn-default"><i class="icon-ok"></i>Simpan</button>
                            	</div>
				            </form>
			            </fieldset>
		        	</div>
		            <div class="col-lg-6" style="float:right;">
			            <form role="form" action="<?php echo site_url('backend/addmateri');?>" method="POST">
			            	<h3>Insert Materi</h3>
							<div class="form-group">
			                    <label >Judul Materi</label>
			                    <input class="form-control" name="materi" id="materi" type="text">
			                </div>
							<div class="form-group">
			                    <label >Link Materi</label>
			                    <input class="form-control" name="linkmateri" id="linkmateri" type="link">
			                </div>
							<div class="form-group">
			                    <label >Penjelasan</label>
			                    <textarea class="form-control" name="penjelasan" id="penjelasan" type="text"></textarea>
			                </div>
			                <div class="form-actions">
                                <button type="submit" class="btn btn-primary"><i class="icon-ok"></i>Tambah Materi</button>
                            </div>
			            </form>
		            </div>
		            <div class="control-group">
	                    <div class="span11">
	                         <div class="row" >
			                    <div class="col-lg-12" >
			                        <h3 class="page-header" style="text-align: center;">
			                            Ajakan
			                        </h3>
			                    </div>
			                
			                <div class="col-lg-8" style="margin-left: 17.5%;">
			                <form role="form" action="<?php echo site_url('backend/addajakan');?>" method="POST">
								<div class="controls">
	                            	<textarea class="form-control" style="height: 450px;"id="deskripsi" name="deskripsi">
	                            	<?php echo $halutama['isi'];?></textarea>
		                        </div><br>
		                        <div class="form-actions">
                               		<button type="submit" class="btn btn-primary"><i class="icon-ok"></i>Simpan</button>
                            	</div>
	                    	</form>
	                    	</div>
	                    </div>
	                </div>
	   			</div>
                    <!-- /.col-sm-4 -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php 
        if ($this->session->flashdata('message') == 'berhasil'){
            echo '<script type="text/javascript">
                    okay();
                    </script>';
        } 
        else if ($this->session->flashdata('message') == 'gagal')
        {
            echo '<script type="text/javascript">
                    no();
                    </script>';
        }
    ?>
    <!-- /#wrapper -->