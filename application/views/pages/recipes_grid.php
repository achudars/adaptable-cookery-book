<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <a class="holder" href="<?php echo base_url() ?>recipe/<?php echo $recipe->recipeid;?>">
            <img alt="Image of <?php echo $recipe->name;?>" src="//:0" class="preview-img" style="background-image: url(<?php echo $recipe->imageurl;?>);">
            <div class="recipe-title">
                <p>
                    <span class="glyphicon glyphicon-chevron-right"></span> <span tabindex="7"><?php echo $recipe->name;?></span>
                </p>
            </div>
            <div class="split">
                <span tabindex="7"><span class="glyphicon glyphicon-time"></span> <?php echo $recipe->preptime;?> minutes</span>
                <span tabindex="7"><?php echo $recipe->calories;?> calories <span class="glyphicon glyphicon-tasks"></span></span>
            </div>
            <div class="split">
                <span tabindex="7"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $recipe->course;?></span>
                <span tabindex="7"><?php echo $recipe->serves;?> servings <span class="glyphicon glyphicon-user"></span></span>
            </div>
			      <?php if(!empty($recipe->diettype)) { ?>
				      <div class="split">
				        <span tabindex="7"><span class="glyphicon glyphicon-leaf"></span> <?php echo !empty($recipe->diettype) ? $recipe->diettype : ''; ?> </span>
				        <span><span></span></span>
				      </div>
			      <?php } ?>
		    </a>
      </div>
    <?php endforeach;?>
</div>
