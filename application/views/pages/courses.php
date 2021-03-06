<div class="container">
    <?php foreach ($courses as $course):?>
    <div class="grid-recipes col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a class="holder" tabindex="7" href="<?php echo base_url() . 'course/' . rawurlencode(strtolower($course->name)) ?>">
            <img alt="Image of <?php echo $course->name;?>" src="//:0" class="preview-img" style="background-image: url(<?php echo $course->imageurl ?>);">
            <div class="course-title">
                <p>
                    <span class="glyphicon glyphicon-chevron-right"></span> <?php echo $course->name;?>
                </p>
            </div>
            <p tabindex="7"><?php echo $course->description ?></p>
        </a>
    </div>
    <?php endforeach;?>
</div>
