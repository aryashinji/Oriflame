        <div id="page-wrapper">
            <div class="container-fluid" >
				<!-- Page Heading -->
                <div class="row" style="margin-left: 16.65%;">
                    <div class="col-lg-9" >
                        <h1 class="page-header">
                            Daftar Pendaftar
                        </h1>
                    </div>
                </div>
                    <!-- /.col-sm-4 -->
				<div class="row" style="margin-left: 8.5%;">
					<div class="col-sm-11">
						<div class="list-group">
							<?php for($i=0 ; $i<$numrows ; $i++){?>
		                    <a class="list-group-item" data-toggle="collapse" data-target="#<?php echo $nonmember[$i]['idnon'];?>"><?php echo $nonmember[$i]['namanon'];?></a>
		                        <div id="<?php echo $nonmember[$i]['idnon'];?>" class="collapse">
						        	<div>
						        		<table>
							        		<tr>
									        	<td>
									        		<div class="img-thumbnail"><img  src="data:image/jpeg;base64,<?php echo base64_encode($nonmember[$i]['ktpnon'])?>" alt="Gambar KTP"></div>
									        	</td>
									        	<td style="padding:5px;">
								        			<table>
								        			<tr>
								        				<h3>Nama</h3>
										        		<p><?php echo $nonmember[$i]['namanon'];?></p>
											        	<h3>Email</h3>
											        	<p><?php echo $nonmember[$i]['emailnon'];?></p>
											        	<h3>Nomor Telepon</h3>
											        	<p><?php echo $nonmember[$i]['tlpnon'];?></p>
											        	<h3>Nomor KTP</h3>
											        	<p><?php echo $nonmember[$i]['noktpnon'];?></p>
											        </tr>
											        <tr>
											        	<a href="<?php echo site_url('backend/delnon'); ?>?id=<?php echo $nonmember[$i]['idnon'];?>"><button type="button" class="btn btn-lg btn-danger" name="btn" value="hapus">Hapus</button></a>
									        			<a href="<?php echo site_url('backend/jadimember'); ?>?id=<?php echo $nonmember[$i]['idnon'];?>"><button type="button" class="btn btn-lg btn-primary" name="btn" value="member">Jadikan Member</button></a>
								        			</tr>
								        			</table>
									        	</td>
								        	</tr>
							        	</table>
						        	</div>
		                        </div>
		                    </a>
		                    <?php }?>
						</div>
					</div>
				</div>
                    <!-- /.col-sm-4 -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->