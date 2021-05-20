<section class="main-content">
	<div class="fffix">
        <!-- content wrapper -->
        <div class="content-wrap">
			<div class="wrapper">
				<!-- page start-->
				<?php
					$attributes = array('class' => 'form-horizontal tasi-form', 'method' => 'post' , 'name' => 'product_post', 'enctype' => 'multipart/form-data');

					echo form_open('', $attributes);
				?>
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									<?=$title?>
								</header>
								<div class="panel-body">
									<?php
									if(isset($error_banner))
									{
									?>
										<script type="text/javascript">
	                                        $(document).ready(function(){
	                                            var notification = 'error'; // success | error
	                                            var title = 'Error notification';
	                                            var msg = "<?=$error_banner?>";
	                                            /* Toastr option param start*/
	                                            var toastr_options = [];
	                                            toastr_options['closeButton']       = false;
	                                            toastr_options['debug']             =  false;
	                                            toastr_options['positionClass']     = "toast-top-right";
	                                            toastr_options['onclick']           =  null;
	                                            toastr_options['showDuration']      =  "100";
	                                            toastr_options['hideDuration']      = "500";
	                                            toastr_options['timeOut']           = "5000";
	                                            toastr_options['extendedTimeOut']   = "1000";
	                                            toastr_options['showEasing']        = "swing";
	                                            toastr_options['hideEasing']        = "linear";
	                                            toastr_options['showMethod']        = "fadeIn";
	                                            toastr_options['hideMethod']        = "fadeOut";
	                                            /* Toastr option param End*/
	                                            demoNotifications(notification,title,msg,toastr_options);
	                                        });
	                                    </script>
									<?php
									}
									?>
									
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Total Amount (<?=g('currency')?>)</label>
										<div class="col-sm-6">
											<?php
												$totalAmount = array(
														'name' => 'total_amount',
														'id' => 'total_amount',
														'class' => 'form-control',
														'value' => (isset($_POST['total_amount']) ? $_POST['total_amount'] : $total_amount),
														'maxlength' => '100',
														'size' => '50',);

												echo form_input($totalAmount);
											?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Shipping Amount (<?=g('currency')?>)</label>
										<div class="col-sm-6">
											<?php
												$shipamount = array(
														'name' => 'ship_amount',
														'id' => 'ship_amount',
														'class' => 'form-control',
														'value' => (isset($_POST['ship_amount']) ? $_POST['ship_amount'] : number_format($invoice_data[0]['shipping_amount'] , 2)),
														'maxlength' => '100',
														'size' => '50',);

												echo form_input($shipamount);
											?>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Dicount Amount (<?=g('currency')?>)</label>
										<div class="col-sm-6">
											<?php
												$discount_amount = array(
														'name' => 'discount_amount',
														'id' => 'discount_amount',
														'class' => 'form-control',
														'value' => (isset($_POST['discount_amount']) ? $_POST['discount_amount'] : number_format($invoice_data[0]['discount_amount'] , 2)),
														'maxlength' => '100',
														'size' => '50',);

												echo form_input($discount_amount);
											?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Invoice Status</label>
										<div class="col-sm-6">
											<?php
												$options = $inv_status;
												$extra = 'class="form-control m-bot15 multi-select my_multi_select3"';
												echo form_dropdown('invoice_status', $options , 0 , $extra);

											?>
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Update Ivnoice</label>
										<div class="col-sm-10">
											<button type="submit" class="btn btn-primary start" name="upload">
												<i class="glyphicon glyphicon-upload"></i>
												<span>Save</span>
											</button>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>