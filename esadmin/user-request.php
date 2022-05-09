<div class="arch-table-wrapper">
				<div class="table-responsive">
					<form method="post" action="">
						<table id="basic-datatables" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th>Name</th>
									<th>Type</th>
									<th>Total req</th>
									<th>Total Publish</th>
									<th>Total Update</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($getUser as $data){ ?>
									<tr>
										<td><?php 
										if($data->userby!='0'){
									    	 $reqBy=$obj->detailsAndupdateProfile($data->userby);
									    	 echo $reqBy->firstName;
									    }
										?></td>
										<td><?php echo $data->req_type; ?></td>
										<td><?php 
											$reqCount = $org->request_count($data->userby);
											echo $reqCount->num;
										 ?></td>
										 <td>
										 	<?php 
										 		$totalPublish = $org->total_publish($data->userby);
											echo $totalPublish->num;
										 	 ?>
										 </td>
										 <td>
										 	<?php 
										 		$totalUpdate = $org->total_update($data->userby);
										 		echo $totalUpdate->num;

										 	 ?>
										 </td>
									</tr>	
								<?php } ?>
							</tbody>
						</table>
					</form>
				</div>
			</div>