<div class="container home-intro">
	<h1>
		Welcome to Team 14's Recipe/Cookery/Chef Application!<br />
		<small>Here you'll find a range of recipes that even the most novice people in the kitchen can cook. Main? Side? Dessert? We've got them all.</small>
	</h1>
</div>
<div class="container">
	<div class="alert alert-info">
		<strong>First Things First...</strong><br />
		Before you go ahead and start cooking, we'd like to know how good you are in the kitchen. This application is tailored to you and your preferences for recipe instructions.<br />
		Simply pick your preferred style from the options below and you'll be ready to go.
	</div>
</div>
<div class="container">
	<div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
		<div class="holder">
			<img alt="Image of Segmented Instructions" src="" class="preview-img" style="background-image: url(<?php echo base_url() . 'assets/images/narrative.png' ?>);">
			<div class="course-title">
				<p>Narrative Instructions</p>
			</div>
			<div class="style-intro">
				<span>The narrative style is for those who don't want to be bounded by culineray rules. Rough steps, rough instructions.</span>
				<br />
				<a class="btn btn-primary recipe-style" data-style="narrative">Choose Narrative Style</a>
			</div>
		</div>
	</div>
	<div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
		<div class="holder">
			<img alt="Image of Segmented Instructions" src="" class="preview-img" style="background-image: url(<?php echo base_url() . 'assets/images/segmented.png' ?>);">
			<div class="course-title">
				<p>Segmented Instructions</p>
			</div>
			<div class="style-intro">
				<span>The segmented style is well suited to those with intermediate experience in the kitchen, providing the information for the recipe in several, not too complicated steps.</span>
				<br />
				<a class="btn btn-primary recipe-style" data-style="segmented">Choose Segmented Style</a>
			</div>
		</div>
	</div>
	<div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
		<div class="holder">
			<img alt="Image of Segmented Instructions" src="" class="preview-img" style="background-image: url(<?php echo base_url() . 'assets/images/steps.png' ?>);">
			<div class="course-title">
				<p>Step-By-Step Instructions</p>
			</div>
			<div class="style-intro">
				<span>Not really one for cooking? Not really sure how to sauté a potato? Simple, easy and well defined steps - this is the choice for you.</span>
				<br />
				<a class="btn btn-primary recipe-style" data-style="step">Choose Step-By-Step Style</a>
			</div>
		</div>
	</div>
</div>
