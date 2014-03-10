<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="holder">
            <img alt="Image of <?php echo $recipe->name;?>" class="preview-img" style="background-image: url(<?php echo $recipe->imageurl;?>);">
            <div class="recipe-title">
                <p><a href="<?php echo base_url() ?>/recipe/<?php echo $recipe->recipeid;?>">
                        <span class="glyphicon glyphicon-chevron-right"></span> <?php echo $recipe->name;?>
                    </a></p>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-time"></span> <?php echo $recipe->preptime;?> min</span>
                <span><?php echo $recipe->calories;?> calories <span class="glyphicon glyphicon-tasks"></span></span>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-cutlery"></span> <?php echo $recipe->course;?></span>
                <span><?php echo $recipe->serves;?> servings <span class="glyphicon glyphicon-user"></span></span>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-leaf"></span> vegetarian </span>
                <span><span></span></span>
            </div>
          </div>
      </div>
    <?php endforeach;?>
</div>
