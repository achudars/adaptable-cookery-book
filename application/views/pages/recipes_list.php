<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="list-recipes col-xs-12">
          <div class="holder">
            <div class="recipe-title">
                <p><a href="/recipe"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $recipe[0];?></a></p>
            </div>
            <div class="content">
              <img alt="" class="preview-img pull-left" style="background-image: url(<?php echo $recipe[5];?>);">
              <div class="recipe-text">

              </div>
              <div class="pull-left split">
                  <div><span class="glyphicon glyphicon-time"></span> <span class="pull-right"><?php echo $recipe[1];?> min</span></div>
                  <div><span class="glyphicon glyphicon-dashboard"></span> <span class="pull-right"><?php echo $recipe[2];?> cal</span></div>
                  <div><span class="glyphicon glyphicon-cutlery"></span> <span class="pull-right"><?php echo $recipe[3];?></span></div>
                  <div><span class="glyphicon glyphicon-user"></span> <span class="pull-right"><?php echo $recipe[4];?> cal</span></div>
              </div>
            </div>
          </div>
      </div>
    <?php endforeach;?>
</div>
