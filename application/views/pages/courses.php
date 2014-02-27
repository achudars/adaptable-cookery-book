<div class="container">
    <?php foreach ($courses as $course):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/course">
            <div class="preview-img" style="background-image: url(<?php echo $course[5];?>);"></div>
            <div class="course-title">
                <p> <?php echo $course[0];?> </p>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-time"></span> <?php echo $course[1];?> min</span>
                <span><?php echo $course[2];?> cal <span class="glyphicon glyphicon-dashboard"></span></span>
            </div>
            <div class="split">
                <span><span class="glyphicon glyphicon-cutlery"></span> <?php echo $course[3];?></span>
                <span><?php echo $course[4];?> <span class="glyphicon glyphicon-user"></span></span>
            </div>
          </a>
      </div>
    <?php endforeach;?>
</div>
