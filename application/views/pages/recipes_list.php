<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="list-recipes col-xs-12">
          <div class="holder">
            <div class="recipe-title">
                <p><a href="/recipe/<?php echo $recipe->recipeid;?>">
                        <span class="glyphicon glyphicon-chevron-right"></span> <?php echo $recipe->name;?>
                    </a></p>
            </div>
            <div class="content">
              <img alt="Image of <?php echo $recipe->name;?>" class="preview-img pull-left" style="background-image: url(<?php echo $recipe->imageurl;?>);">
              <div class="recipe-text">

              </div>
              <div class="pull-left split">
                  <div><span class="glyphicon glyphicon-time"></span> <span class="pull-right"><?php echo $recipe->preptime;?> min</span></div>
                  <div><span class="glyphicon glyphicon-tasks"></span> <span class="pull-right"><?php echo $recipe->calories;?> cal</span></div>
                  <div><span class="glyphicon glyphicon-cutlery"></span> <span class="pull-right"><?php echo $recipe->course;?></span></div>
                  <div><span class="glyphicon glyphicon-user"></span> <span class="pull-right"><?php echo $recipe->serves;?></span></div>
              </div>
            </div>
          </div>
      </div>
    <?php endforeach;?>
</div>
