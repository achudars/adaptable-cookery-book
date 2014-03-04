<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/recipe">
            <div class="preview-img" style="background-image: url(<?php echo $recipe->imageurl;?>);"></div>
            <div class="recipe-title">
                <p> <?php echo $recipe->name;?> </p>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-time"></span> ??? min</span>
                <span>??? cal <span class="glyphicon glyphicon-dashboard"></span></span>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-cutlery"></span> <?php echo $recipe->course;?></span>
                <span><?php echo $recipe->serves;?> <span class="glyphicon glyphicon-user"></span></span>
            </div>
          </a>
      </div>
    <?php endforeach;?>
</div>