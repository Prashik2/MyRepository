
	<nav class="navbar navbar-default navbar-fixed-top" style="height: 100px">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			<a class="navbar-brand" href="#headerId" style="padding: 2px 15px;
			 margin-left: -100px;"><img src="../img/RenewalHelp_Final_logo.png" height="100px" width="300px"></a>

				
			</div>
			
			 <div class="collapse navbar-collapse" id="myNavbar" style="position: fixed; margin-left: 100px;">
			
				<!--  <ul class="nav navbar-nav navbar-right">
					<li><a href="#about" title="About">ABOUT</a></li>
					<li><a href="#services" title="Services">SERVICES</a></li>
					<li><a href="#product" title="Product">PRODUCT</a></li>
					<li><a href="#pricing" title="Pricing">PRICING</a></li>
					<li><a href="#contact" title="Contact us">CONTACT</a></li>
				</ul>-->
			</div>
			<div><li>
			 <ul class="nav navbar-nav navbar-right">
			  <!--  data-amount="250000" -->
			  <li> <form action="../renser/purchaseConfirm.php" method="POST">
<!-- Note that the amount is in paise = 50 INR -->
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_dAfaTIx7C3D7JE"
    
    data-display_currency= "USD"
    
 data-display_amount= "34.23"
    data-buttontext="Upgrade"
    data-name="Renewal HELP"
    data-description="Upgrade"
    data-image="../img/RenewalHelp_Final_logo.png"
    data-prefill.name="Harshil Mathur"
    data-prefill.email="support@razorpay.com"
    data-theme.color="#F37254"
></script>
<input type="hidden" value="Hidden Element" name="hidden">
</form></li>
        <li><a href="#" ng-click="logout();"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
		</div>
	</nav>