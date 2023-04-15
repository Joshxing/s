<?php
$this->load->view("install/includes/head");
?>
	<div class="installer-container">
		<div class="installer-logo-area">
			<a class="logo-icon" href="<?php echo(VENDOR_URL); ?>" target="_blank">Josh</a>
		</div>
		<!-- /installer-logo-area -->
		<div class="text-center">
		<div class="welcome-logo-text">
			Perfectly You  Installer
		</div>
		<!-- /welcome-logo-text -->
		</div>
		<!-- /text-center -->
		
		<div class="thankyou-area text-center">
			<div class="thankyou-title"></div>			
			<!-- /thankyou-title -->
			<div class="thankyou-w-installation alert alert-success text-dark"> <span class="badge badge-success"></div>
		</div>
		<!-- /thankyou-area -->
		
		<div class="tabs-area">
			<?php
			$this->load->view("install/includes/tabs");
			?>
			<!-- /tabs-nav -->
			
			<div class="tabs-content">
			<div class="thankyou-w-installation">Welcome to Installation Click Next to Continue.</div>
			<!-- /thankyou-w-installation -->
			<!-- /thankyou-w-support -->
				<!-- /tab-requirements -->
				
				<div class="tab-button-area text-right"><a class="btn btn-tabs" href="<?php echo($base_url."install/".$next_page); ?>">Next</a></div>
				<!-- /tab-button-area -->
			</div>
			<!-- /tabs-content -->
		</div>
		<!-- /tabs-area -->
<?php
$this->load->view("install/includes/footer");
$this->load->view("install/includes/footer_end");
?>