<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="list-recipes col-xs-12">
          <a href="/recipe">
            <div class="recipe-title">
                <p> <?php echo $recipe->name;?> </p>
            </div>
            <div class="content">
              <div class="preview-img pull-left" style="background-image: url(<?php echo $recipe->imageurl;?>);"></div>
              <div class="recipe-text">

              </div>
              <div class="pull-left split">
                  <div><span class="glyphicon glyphicon-time"></span> <span class="pull-right">??? min</span></div>
                  <div><span class="glyphicon glyphicon-dashboard"></span> <span class="pull-right">??? cal</span></div>
                  <div><span class="glyphicon glyphicon-cutlery"></span> <span class="pull-right"><?php echo $recipe->course;?></span></div>
                  <div><span class="glyphicon glyphicon-user"></span> <span class="pull-right"><?php echo $recipe->serves;?></span></div>
              </div>
            </div>
          </a>
      </div>
    <?php endforeach;?>
</div>
