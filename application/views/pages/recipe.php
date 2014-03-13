<div class="container single-recipe">
    <div class="row">
        <div class="recipe col-sx-12 col-sm-12 col-md-7 col-lg-7">
            <h1 tabindex="7"><?php echo $title?></h1>
            <img alt="Image of <?php echo $title?>" class="recipe-img" src="//:0" style="background-image: url(<?php echo $image?>);">
            <div class="holder">
	        	<div><span class="glyphicon glyphicon-time"></span> <span tabindex="7"><?php echo $preptime;?> minutes</span></div>
                <div><span class="glyphicon glyphicon-tasks"></span> <span tabindex="7"><?php echo $calories;?> calories</span></div>
                <div><span class="glyphicon glyphicon-user"></span> <span tabindex="7"><?php echo $serves;?> servings</span></div>
			    <?php if(!empty($diettype)) { ?>
			    	<div><span class="glyphicon glyphicon-leaf"></span> <span tabindex="7"><?php echo !empty($diettype) ? $diettype : ''; ?></span></div>
				<?php } ?>
            </div>
        </div>
        <div class="col-sx-12 col-sm-12 col-md-offset-1 col-md-4 col-lg-offset-1 col-lg-4 ingredients">
            <h2 tabindex="8">Ingredients:</h2>
            <ul id="ingredients-narrative" class="<?php echo $defaultStyle == 'narrative' ? 'active' : '' ?>">
                <?php foreach ($narrative->ingredients as $ingredient):?>
                <li tabindex="8">
                    <span class="amount"><?php echo $ingredient->quantity.$ingredient->units?></span>
                    <span class="ingredient-name"><?php echo $ingredient->name?></span>
                </li>
                <?php endforeach?>
            </ul>
            <ul id="ingredients-segmented" class="<?php echo $defaultStyle == 'segmented' ? 'active' : '' ?>">
                <?php foreach ($segmented->ingredients as $ingredient):?>
                <li tabindex="8">
                    <span class="amount"><?php echo $ingredient->quantity.$ingredient->units?></span>
                    <span class="ingredient-name"><?php echo $ingredient->name?></span>
                </li>
                <?php endforeach?>
            </ul>
            <ul id="ingredients-step" class="<?php echo $defaultStyle == 'step' ? 'active' : '' ?>">
                <?php foreach ($steps->ingredients as $ingredient):?>
                <li tabindex="8">
                    <span class="amount"><?php echo $ingredient->quantity.$ingredient->units?></span>
                    <span class="ingredient-name"><?php echo $ingredient->name?></span>
                </li>
                <?php endforeach?>
            </ul>
        </div>
        <div class="recipe col-sx-12 col-sm-12 col-md-7 col-lg-7">
            <ul class="nav nav-tabs nav-justified">
                <li class="<?php echo $defaultStyle == 'narrative' ? 'active' : '' ?>">
					<a tabindex="9" class="recipe-style" href="#narrative" data-style="narrative"
                       data-toggle="tab" data-target="#narrative">narrative</a>
                </li>
                <li class="<?php echo $defaultStyle == 'segmented' ? 'active' : '' ?>">
					<a tabindex="9" class="recipe-style" href="#segmented" data-style="segmented"
                       data-toggle="tab" data-target="#segmented">segmented</a>
                </li>
                <li class="<?php echo $defaultStyle == 'step' ? 'active' : '' ?>">
					<a tabindex="9" class="recipe-style" href="#step-by-step" data-style="step"
                       data-toggle="tab" data-target="#step-by-step">step-by-step</a>
                </li>
            </ul>
            <div class="tab-content">
                <section class="tab-pane fade <?php
                    echo $defaultStyle == 'narrative' ? 'in active' : '' ?>" id="narrative">
                    <h2 tabindex="10">Instructions:</h2>
                    <section tabindex="11">
                        <?php echo $narrative->instructions;?>
                    </section>
                </section>
                <section class="tab-pane fade <?php
                    echo $defaultStyle == 'step' ? 'in active' : '' ?>" id="step-by-step">
                    <h2 tabindex="10">Instructions:</h2>
                    <ol>
                        <?php foreach ($steps->instructions as $step):?>
                        <li tabindex="11"><?php echo $step->instruction?></li>
                        <?php endforeach?>
                    </ol>
                </section>
                <section class="tab-pane fade <?php
                    echo $defaultStyle == 'segmented' ? 'in active' : '' ?>" id="segmented">
                    <h2 tabindex="10">Instructions:</h2>

                    <ul id='timeline'>
                        <?php foreach ($segmented->instructions as $step):?>
                        <li tabindex="11">
                            <input class="radio" id="work<?php echo $step->stepid?>" name="works" type="radio"
                                <?php echo $step->stepid == 1 ? ' checked' : ''?>>
                            <div class="relative">
                                <label tabindex="11" for='work<?php echo $step->stepid?>'>
                                <?php echo $step->instruction?>
                                </label>
                                <span class='step'><?php echo $step->stepid?></span>
                                <span class='circle'></span>
                            </div>
                            <div class='sub'>
                            	<span class="glyphicon glyphicon-arrow-up"></span>
                            	<span class="glyphicon glyphicon-arrow-down"></span>
                            </div>

                        </li>
                        <?php endforeach?>
                    </ul>
                </section>


            </div>
        </div>
    </div>
</div>
