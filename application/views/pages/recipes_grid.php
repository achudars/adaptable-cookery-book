<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/recipe">
            <img alt="" class="preview-img" style="background-image: url(<?php echo $recipe[5];?>);">
            <div class="recipe-title">
                <p> <?php echo $recipe[0];?> </p>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-time"></span> <?php echo $recipe[1];?> min</span>
                <span><?php echo $recipe[2];?> cal <span class="glyphicon glyphicon-dashboard"></span></span>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-cutlery"></span> <?php echo $recipe[3];?></span>
                <span><?php echo $recipe[4];?> <span class="glyphicon glyphicon-user"></span></span>
            </div>
          </a>
      </div>
    <?php endforeach;?>
</div>