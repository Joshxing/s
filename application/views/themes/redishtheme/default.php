<?php $theme_view('includes/head'); ?>
<link rel="stylesheet" href="<?php $assets('css/lightbox.css'); ?>">
<?php $theme_view('includes/headEnd'); ?>
<?php $theme_view('includes/header'); ?>
	
	
	<!-- /mainSection -->

	<!-- /ourServicesSection -->
	<?php if(!empty($gcategories) && !empty($galleryImages)){ ?>
	<div class="gallerySection" id="gallery">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 text-center mx-auto text-center">
					<div class="galleryTitlesSection">
						<h2>Services Gallery</h2>
						<p>We've made a list of suggested activities based on your interests.Browse through our most popular
						Hotels!Our Featured Tours can help you find the trip that's perfect for you!.</p>
					</div><!-- /.rt-section-title-wrapper- -->
				</div><!-- /.col-lg-12 -->
			</div>

			<div class="row">
				<div class="col-12">
					<ul class="filterList">
						<li data-filter="*" class="active">All</li>
						<?php foreach ($gcategories as $gcat ){ if($gcat['count'] != 0){?>
							<li data-filter=".cg<?php echo esc($gcat['id'], true) ?>"><?php echo esc($gcat['cName'], true) ?></li>
						<?php }} ?>
					</ul>
				</div><!-- /.col-12 -->
			</div><!-- /.row -->
			<div class="row grid galleryLists">
				<?php foreach ($galleryImages as $gImage ){ ?>
				<div class="col-lg-3 col-md-6 grid-item cg<?php echo esc($gImage['catId'], true) ?>">
					<a class="d-block portfolioBox wow fade-in-bottom" href="<?php uploads('gallery/'.$gImage['imgPath']);?>" style="background-image: url(<?php uploads('gallery/'.$gImage['imgPath']);?>)">
						<div class="portfolioBoxOverlay"></div><!-- /.portfolioBoxOverlay -->
						<div class="portfolioBoxInnerContent">
							<h6><?php echo esc($gImage['imgName'], true) ?></h6>
							<p>
								<span><?php echo esc($gImage['imgDetails'], true); ?></span>
							</p>
						</div><!-- /.portfolioBoxInnerContent -->
					</a><!-- /.portfolioBox -->
				</div><!-- /.col-md-4 -->
				<?php } ?>
				
			</div><!-- /.row -->
			
		</div>
		<!-- /container -->
	</div>
	<!-- /gallerySection -->
	<?php } ?>


	<div class="mainSection" id="home">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<h1>Book now</h1>
					<?php if($added = $this->session->flashdata('added')){
						$added_class = $this->session->flashdata('added_class');
					?>
						<div class="alert <?php echo esc($added_class, true);?>"><?php echo esc($added, true);?></div>
					<?php
					}
					?>
					<div class="selectionBoxMain">
						<form id="serviceUserForm" method="post" action="<?php echo base_url('homepage/submitData');?>">
						<div class="formDataMain">
							<div class="singleInput form-group">
								<select class="custom-select selectBookNow" id="selectBookNow" name="serviceTitle" required>
									<option value="">Select Option</option>
									<?php foreach ($serviceList as $servList ){ ?>
										<option value="<?php echo esc($servList['id'], true)?>" label="<?php echo esc($servList['title'], true)?>"><?php echo esc($servList['title'], true)?></option>
									<?php }?>
								</select>
								<span class="iconbadge"><span class="icon-shop"></span></span>
								<span class="iconArrow"><span class="icon-cheveron-down"></span></span>
								</div>
							<small id="sTitleError" class="form-text text-danger d-none">Please select One Service atleast.</small>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Adults</label>
										<input id="adultsVal" disabled data-attr="" type="number" value="0" min="1" step="1" name="serviceAdult"/>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Childrens</label>
										<input id="childVal" disabled data-attr="" type="number" value="0" min="0" step="1" name="serviceChildren"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<label for="">Select Date</label>
									<div class="calendarClickMenu singleInput form-group">
										<div class="calendarInnerText"><i class="icon-calendar2"></i>
											<input type="text" placeholder="Select Date" class="form-control dateTimePickerInput" id="datepicker" disabled="disabled" name="serviceDate" required>
										</div>
									</div>
									<small id="dateError" class="form-text text-danger d-none">Please select Date.</small>
									<small id="notimeError" class="form-text text-danger d-none">No time available for today. Select Other Date.</small>
								</div>
								<div class="col-lg-6">
									<label for="">Select Time</label>
									<div class="singleInput form-group">
										<select class="custom-select" id="userSelectTiming" name="serviceTiming" disabled="disabled" required>
											<option value="0">Select Time</option>
										</select>
										<span class="iconbadge"><span class="icon-time"></span></span>
										<span class="iconArrow"><span class="icon-cheveron-down"></span></span>
									</div>
									<small id="timeError" class="form-text text-danger d-none">Please select Time.</small>
								</div>
							</div>
							<label id="selectAgentLabel" class="d-none">Select Agent</label>
							<div class="selectAgentMain"></div>
							<div class="btn btn-dark formSubmitBtn disabled" disabled="disabled" id="formContinue">Continue</div>
						</div>
						<!-- /formDataMain -->
						<div class="alert alert-info" id="alreadyBooked" style="display:none">Already booked this service on this Date/Time.</div>
						<div class="afterContinueMain d-none">
							<div class="afterContinue">
								<img class="serviceImg" src="" alt="">
								<ul class="serviceDetail">
									<li><h5><span id="serviceTitle"></span></h5></li>
									<li><span class="labels">Agent Name:</span> <span id="agentName"></span></li>
									<li><span class="labels">Date:</span> <span id="selectedDate"></span></li>
									<li><span class="labels">Time:</span> <span id="selectedTime"></span></li>
									<li><span class="labels">No of guest:</span> <span id="selectedAdults"></span> Adults - <span id="selectedChildrens"></span> Children</li>
									<li><span class="labels">Service Price:</span> AED<span id="servicePersonPrice"></span></li>
									<li><span class="labels">Total Price:</span> AED<span id="serviceTotalPrice"></span></li>
								</ul>
							</div>
							<div class="btn btn-outline-danger btn-block m-t-15 formChange">Change Options</div>
							<hr>
							<?php if(!$this->session->userdata('id')){ ?>
								<div class="form-group">
									<label for="fullName">Username</label>
									<div class="singleInput">
										<input type="text" id="input-userFullName" class="form-control selectBookNow" placeholder="Username" name="userFullName">
									</div>
									<div id="error"></div>
								</div>
								<div class="form-group">
									<label for="userEmail">Email</label>
									<div class="singleInput">
										<input type="email" id="input-userEmail" class="form-control selectBookNow" placeholder="user@email.com" name="userEmail">
									</div>
									<div id="error"></div>
								</div>
								<div class="form-group">
									<label for="userPhone">Phone Number</label>
									<div class="singleInput">
										<input type="text" id="input-userPhone" class="form-control selectBookNow" placeholder="009...." name="userPhone">
									</div>
									<div id="error"></div>
								</div>
							<?php } ?>
							<?php if($this->session->userdata('id') && !$userinfo['phone']){ ?>
								<div class="form-group">
									<label for="userPhone">Phone Number</label>
									<div class="singleInput">
										<input type="text" id="input-userPhone" class="form-control selectBookNow" placeholder="009...." name="userPhone">
									</div>
									<div id="error"></div>
								</div>
							<?php } ?>
							<!-- -->
							<label for="">Select Payment Method</label>
							<div class="singleInputform form-group">
								<select class="custom-select" name="selectPayment" id="selectMethod" required>
									<option value="0" selected>By Cash</option>
									<?php if($stripe['status'] == 1 && $stripe['stripe_publishable_key'] && $stripe['stripe_api_key']){ ?><option value="1">Credit Card</option><?php } ?>
								</select>
								<span class="iconbadge"><span class="icon-credit-card"></span></span>
								<span class="iconArrow"><span class="icon-cheveron-down"></span></span>
							</div>
							<div id="payment-card" data-val="1" class="d-none">
								<div id="card-element"><!-- A Stripe Element will be inserted here. --></div>
								<!-- Used to display form errors. -->
								<small id="card-errors" role="alert" class="form-text text-danger"></small>
							</div>
							<!-- -->
							<button class="btn btn-dark formSubmitBtn btn-block" type="submit" id="serviceSubmit" name="submit">
								<span class="loaderBeforeSubmit">Submit</span>
								<div class="stage d-none"><div class="dot-floating"></div></div>
							</button>
						</div>
						<!-- /afterContinueMain -->
						</form>
					</div>
					<!-- /selectionBoxMain -->
				</div>
			</div>
		</div>
		<div class="<?php echo_if($ads['top']['status'], 'p-t-40') ?>">
			<?php $theme_view('includes/top-ad') ?>
		</div>
	</div>




			<!-- /row -->
			
		</div>
		<!-- /container -->
	</div>
	<!-- /contactSection -->

<?php $theme_view('includes/footer'); ?>
<?php $theme_view('includes/foot'); ?>
<script src="<?php $assets("plugins/moment/moment.min.js"); ?>"></script>
<script src="<?php $assets("plugins/datepicker/bootstrap-datetimepicker.min.js"); ?>"></script>
<script src="<?php $assets("js/magnific.popup.min.js"); ?>"></script>
<?php if($stripe['status'] == 1 && $stripe['stripe_publishable_key'] && $stripe['stripe_api_key']){ ?>
<script src="https://js.stripe.com/v3/"></script>
<script>
	// Stripe Publishable Key.
	var stripe = Stripe('<?php echo $stripe['stripe_publishable_key']; ?>');
</script>
<?php } ?>
<script src="<?php $assets("js/default.js"); ?>"></script>
<?php $theme_view('includes/footEnd'); ?>