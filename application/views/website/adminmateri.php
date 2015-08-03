        <div id="page-wrapper">
            <div class="container-fluid" >
				<!-- Page Heading -->
                <div class="row" style="margin-left: 16.65%;">
                    <div class="col-lg-9" >
                        <h1 class="page-header">
                            Materi
                        </h1>
                    </div>
                </div>
                    <!-- /.col-sm-4 -->
				<div class="row" style="margin-left: 16.65%;">
					<div class="col-sm-9">
						<div>
                            <table class="list-group">
							<?php for($i=0 ; $i < $numrows; $i++){?>
                            <tr >
                                <td class="list-group">
                                    <a href="<?php echo $materi[$i]['linkmateri'];?>" class="list-group-item" target="_blank">
        								<h4 class="list-group-item-heading"><?php echo $materi[$i]['judulmateri'];?></h4>
        								<p class="list-group-item-text"><?php echo $materi[$i]['penjelasan'];?></p>
        							</a>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('backend/delmateri')."?id=".$materi[$i]['idmateri'];?> "><i class="fa fa-fw fa-remove"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            </table>
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