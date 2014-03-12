<div class="container course">
    <div class="row">
        <div class="recipe col-sx-12 col-sm-12 col-md-12 col-lg-12">
            <h1 tabindex="7"><?php echo $title ?></h1>
            <img alt="Image of <?php echo $title ?>" class="course-img" src="" style="background-image: url(<?php echo $courseImage ?>)">
		</div>
	</div>
</div>
<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="holder">
            <img alt="" class="preview-img" src="" style="background-image: url(<?php echo $recipe->imageurl; ?>);">
            <div class="recipe-title">
                <p><a tabindex="8" href="<?php echo base_url() ?>recipe/<?php echo $recipe->recipeid ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $recipe->name;?></a></p>
            </div>
            <div class="split">
                <span tabindex="8"><span class="glyphicon glyphicon-time"></span> <?php echo $recipe->preptime;?> minutes</span>
                <span tabindex="8"><?php echo $recipe->calories;?> calories <span class="glyphicon glyphicon-tasks"></span></span>
            </div>
            <div class="split">
                <span tabindex="8"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $recipe->courseName;?></span>
                <span tabindex="8"><?php echo $recipe->serves;?> servings<span class="glyphicon glyphicon-user"></span></span>
            </div>
			<?php if(!empty($recipe->diettype)) { ?>
				<div class="split">
				    <span tabindex="8"><span class="glyphicon glyphicon-leaf"></span> <?php echo !empty($recipe->diettype) ? $recipe->diettype : ''; ?> </span>
				    <span><span></span></span>
				</div>
			<?php } ?>
          </div>
      </div>
    <?php endforeach;?>
</div>
