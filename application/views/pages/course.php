<div class="container course">
    <div class="row">
        <div class="recipe col-sx-12 col-sm-12 col-md-12 col-lg-12">
            <h1><?php echo $courseName ?></h1>
            <img alt="" class="course-img" src="" style="background-image: url(<?php echo $courseImage ?>)">
		</div>
	</div>
</div>
<div class="container">
    <?php foreach ($recipes as $recipe):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="holder">
            <img alt="" class="preview-img" src="" style="background-image: url(<?php echo $recipe[5];?>);">
            <div class="recipe-title">
                <p><a href="/recipe"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $recipe[0];?></a></p>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-time"></span> <?php echo $recipe[1];?> min</span>
                <span><?php echo $recipe[2];?> cal <span class="glyphicon glyphicon-dashboard"></span></span>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-cutlery"></span> <?php echo $recipe[3];?></span>
                <span><?php echo $recipe[4];?> <span class="glyphicon glyphicon-user"></span></span>
            </div>
          </div>
      </div>
    <?php endforeach;?>
</div>
