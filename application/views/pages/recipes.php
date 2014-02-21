<div class="container">
    <h1><?php echo $title ?></h1>
</div>

<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="grid-recipes col-xs-6 col-sm-3">
          <a href="recipe">
            <div class="preview-img" style="background-image: url(<?php echo $recipe[5];?>);"></div>
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