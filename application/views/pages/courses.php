<div class="container">
    <?php foreach ($courses as $course):?>
      <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/course/<?php echo $course['courseId'] ?>">
            <div class="preview-img" style="background-image: url(<?php echo $course['imageUrl'];?>);"></div>
            <div class="course-title">
                <p> <?php echo $course['courseName'];?> </p>
            </div>
            <div>
                <span class="glyphicon glyphicon-list"></span> <?php echo $course['recipeCount'];?> recipes
            </div>
          </a>
      </div>
    <?php endforeach;?>
</div>
