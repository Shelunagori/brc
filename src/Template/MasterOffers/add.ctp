<?php $this->set("title", 'Item Category'); ?>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-6">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet green box">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-edit"></i>
					<?php if(!empty($id)){ ?>
						Edit Offer
					<?php }else{ ?>
						Add Offer
					<?php } ?>
				</div>
				<div class="tools">
					<?php if(!empty($id)){ ?>
						<?php echo $this->Html->link('<i class="fa fa-plus"></i> Add ','/MasterOffers/add/',array('escape'=>false,'style'=>'color:#fff'));?>
					<?php }?>
				</div>
			</div>
			<div class="portlet-body">
				<div class="">
					<?= $this->Form->create($masterOffer,['id'=>'CountryForm']) ?>
						<div class="form-group">
							<label class="control-label col-md-4">Offer Name <span class="required" aria-required="true">
							* </span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" <?php if(!empty($id)){ echo "value='".$masterOffer->name."'"; } ?> name="name" class="form-control" Placeholder="Enter offer Name">
									 
								</div>
							</div>
						</div>
						<span class="help-block">&nbsp;</span>
						<div class="form-group">
							<label class="control-label col-md-4">Percentage <span class="required" aria-required="true">
							* </span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" <?php if(!empty($id)){ echo "value='".$masterOffer->percentage."'"; } ?> name="percentage" class="form-control" Placeholder="Enter Offer Percentage" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >									 
								</div>
							</div>
						</div>
						<div class="col-md-12"><hr></hr></div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-6 col-md-9">
									<?php echo $this->Form->button('Submit',['class'=>'btn btn-primary']); ?> 
								</div>
							</div>
						</div>
					<?= $this->Form->end() ?>
				</div> 
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet blue box">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-book"></i>View Offer List
				</div>
				<div class="tools"> 
 				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-bordered" cellpadding="0" cellspacing="0">
					<thead>
						<tr style="background-color:#DFD9C4;">
							<th scope="col"><?= ('S.No') ?></th> 
							<th scope="col"><?= $this->Paginator->sort('name') ?></th>
							<th scope="col"><?= $this->Paginator->sort('percentage') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $x=0; foreach ($masterOfferslist as $country): ?>
						<tr>
							<td><?= ++$x; ?></td> 
							<td><?= h($country->name) ?></td>
							<td><?= h($country->percentage) ?></td>
							<td class="actions">
								<?php echo $this->Html->link('<i class="fa fa-edit"></i>','/MasterOffers/add/'.$country->id,array('escape'=>false,'class'=>'btn btn-warning btn-xs'));?>
								<a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $country->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
										<div id="deletemodal<?php echo $country->id; ?>" class="modal fade" role="dialog">
											<div class="modal-dialog modal-md" >
												<form method="post" action="<?php echo $this->Url->build(array('controller'=>'MasterOffers','action'=>'delete',$country->id)) ?>">
													<div class="modal-content">
													  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">
															Are you sure you want to remove this Offer?
															</h4>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn  btn-sm btn-info">Yes</button>
															<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Cancel</button>
														</div>
													</div>
												</form>
											</div>
										</div>
							   <?php  $this->Form->PostLink('<i class="fa fa-trash"></i>','/Countries/delete/'.$country->id,array('escape'=>false,'class'=>'btn btn-danger btn-xs','confirm' => __('Are you sure you want to delete # {0}?', $country->id)));?>
							</td>
						</tr>
						<?php endforeach; ?> 
					</tbody>
				</table>
				<div class="paginator">
					<ul class="pagination">
						<?= $this->Paginator->prev('< ' . __('previous')) ?>
						<?= $this->Paginator->numbers() ?>
						<?= $this->Paginator->next(__('next') . ' >') ?>
					</ul>
					<p><?= $this->Paginator->counter() ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- BEGIN PAGE LEVEL STYLES -->
	

<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN VALIDATEION -->
	<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END VALIDATEION --> 
<!-- END PAGE LEVEL SCRIPTS -->

<?php 
$js='
$(document).ready(function() {
	jQuery(".loadingshow").submit(function(){
		jQuery("#loader-1").show();
	});
	$.validator.addMethod("specialChars", function( value, element ) {
		var regex = new RegExp("^[a-zA-Z ]+$");
		var key = value;

		if (!regex.test(key)) {
		   return false;
		}
		return true;
	}, "please use only alphabetic characters");
	
	//-- Validation
	var form2 = $("#CountryForm");
	var error2 = $(".alert-danger", form2);
	var success2 = $(".alert-success", form2);

	form2.validate({
		errorElement: "span", //default input error message container
		errorClass: "help-block help-block-error", // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		ignore: "",  // validate all fields including form hidden input
		rules: {
			name: { 
				required: true,
				specialChars: true
			},
			percentage: { 
				required: true, 
			},
		},

		 

		errorPlacement: function (error, element) { // render error placement for each input type
			var icon = $(element).parent(".input-icon").children("i");
			icon.removeClass("fa-check").addClass("fa-warning");  
			icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
		},

		highlight: function (element) { // hightlight error inputs
			$(element)
				.closest(".form-group").removeClass("has-success").addClass("has-error"); // set error class to the control group   
		},
		success: function (label, element) {
			var icon = $(element).parent(".input-icon").children("i");
			$(element).closest(".form-group").removeClass("has-error").addClass("has-success"); // set success class to the control group
			icon.removeClass("fa-warning").addClass("fa-check");
		},

		submitHandler: function (form) {
			success2.show();
			error2.hide();
			form[0].submit(); // submit the form
		}
	}); 	
 });';
?>
<?php echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>