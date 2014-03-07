<div class="container">
    <?php foreach ($courses as $course):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="holder">
            <img alt="" src="" class="preview-img" style="background-image: url(<?php echo $course['imageUrl'];?>);">
            <div class="course-title">
                <p><a href="<?php echo base_url() . 'course/' . strtolower($course['courseName']) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $course['courseName'];?></a></p>
            </div>
            <div>
                <span class="glyphicon glyphicon-list"></span> <?php echo $course['recipeCount'];?> recipes
            </div>
          </div>
      </div>
    <?php endforeach;?>
</div>
