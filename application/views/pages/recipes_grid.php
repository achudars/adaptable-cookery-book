<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="holder">
            <img alt="" class="preview-img" style="background-image: url(<?php echo $recipe->imageurl;?>);">
            <div class="recipe-title">
                <p><a href="/recipe"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $recipe->name;?></a></p>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-time"></span> ??? min</span>
                <span>??? cal <span class="glyphicon glyphicon-dashboard"></span></span>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-cutlery"></span> <?php echo $recipe->course;?></span>
                <span><?php echo $recipe->serves;?> <span class="glyphicon glyphicon-user"></span></span>
            </div>
          </div>
      </div>
    <?php endforeach;?>
</div>
