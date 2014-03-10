<div class="container">
    <?php foreach ($courses as $course):?>
    <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="holder">
            <img alt="Image of <?php echo $course->name;?>" src="" class="preview-img" style="background-image: url(http://placehold.it/3500x1500);">
            <div class="course-title">
                <p><a href="<?php echo base_url() . 'course/' . strtolower($course->name) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $course->name;?></a></p>
            </div>
            <span class="course-description">
                <p><?php echo $course->description ?></p>
            </span>
        </div>
    </div>
    <?php endforeach;?>
</div>
