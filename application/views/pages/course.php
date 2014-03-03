<div class="container course">
    <div class="row">
        <div class="recipe col-sx-12 col-sm-12 col-md-12 col-lg-12">
            <h1><?php echo $courseName ?></h1>
            <div class="course-img" style="background-image: url(<?php echo $courseImage ?>)"></div>
		</div>
	</div>
</div>
<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/recipe">
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
