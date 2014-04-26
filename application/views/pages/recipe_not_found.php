<div class="container not-found">
	<h1>
		Recipe Not Found<br />
		<small>The recipe you've requested (Recipe number <?php echo $recipeId ?>) doesn't exist.</small>
	</h1>

	<p>Sorry, but the recipe you're looking for doesn't exist!</p>
	<p>If you've followed a link from somewhere else on the site then we've made a mistake - sorry about that.</p>
	<p>It's possible we're having some issues with the application, why not try again in a few minutes?</p>

	<a class="btn btn-primary not-found-home" href="<?php echo base_url() . 'recipes/' ?>">Click here to go back to the recipe list</a>
</div>
