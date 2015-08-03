        <div id="page-wrapper">
            <div class="container-fluid" >
				<!-- Page Heading -->
                <div class="row" style="margin-left: 16.65%;">
                    <div class="col-lg-9" >
                        <h1 class="page-header">
                            Daftar Down Line
                        </h1>
                    </div>
                </div>
                    <!-- /.col-sm-4 -->
				<div class="row" style="margin-left: 16.65%;">
					<div class="col-sm-9">
						<div class="list-group">
							<?php for($i=0 ; $i<$numrows ; $i++){?>
		                    <a class="list-group-item" data-toggle="collapse" data-target="#<?php echo $member[$i]['idmember'];?>"><?php echo $member[$i]['namanon'];?></a>
		                        <div id="<?php echo $member[$i]['idmember'];?>" class="collapse">
						        	<div>
						        		<table>
							        		<tr>
									        	<td style="padding:5px;">
								        			<table>
								        			<tr>
								        				<h3>Nama</h3>
										        		<p><?php echo $member[$i]['namanon'];?></p>
											        	<h3>Email</h3>
											        	<p><?php echo $member[$i]['emailnon'];?></p>
											        	<h3>Nomor Telepon</h3>
											        	<p><?php echo $member[$i]['tlpnon'];?></p>
											        	<h3>Nomor KTP</h3>
											        	<p><?php echo $member[$i]['noktpnon'];?></p>
											        </tr>
											        <tr>
											        	<a href="<?php echo site_url('backend/delmem'); ?>?id=<?php echo $member[$i]['idmember'];?>"><button type="button" class="btn btn-lg btn-danger">Hapus</button></a>
								        			</tr>
								        			</table>
									        	</td>
								        	</tr>
							        	</table>
						        	</div>
		                        </div>
		                    </a>
		                    <?php } ?>
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