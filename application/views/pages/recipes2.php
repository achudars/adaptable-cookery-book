<div class="container">
    <h1><?php echo $title ?></h1>
</div>

<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="list-recipes col-xs-12">
          <a href="recipe">
            <div class="recipe-title">
                <p> <?php echo $recipe[0];?> </p>
            </div>
            <div class="content">
              <div class="preview-img pull-left" style="background-image: url(<?php echo $recipe[3];?>);"></div>
              <div class="recipe-text">

              </div>
              <div class="pull-left split">
                  <div><span class="glyphicon glyphicon-time"></span> <?php echo $recipe[1];?> min</div>
                  <div><span class="glyphicon glyphicon-dashboard"></span> <?php echo $recipe[2];?> cal</div>
              </div>
            </div>
          </a>
      </div>
    <?php endforeach;?>
</div>