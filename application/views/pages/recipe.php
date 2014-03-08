<div class="container single-recipe">
    <div class="row">
        <div class="recipe col-sx-12 col-sm-12 col-md-7 col-lg-7">
            <h1 tabindex="5"><?php echo $title?></h1>
            <img alt="Image of <?php echo $title?>" class="recipe-img" src="<?php echo $image?>">
        </div>
        <div class="col-sx-12 col-sm-12 col-md-offset-1 col-md-4 col-lg-offset-1 col-lg-4 ingredients">
            <h2 tabindex="8">Ingredients:</h2>
            <ul>
                <?php foreach ($narrative->ingredients as $ingredient):?>
                <li>
                    <span class="amount"><?php echo $ingredient->quantity.$ingredient->units?></span>
                    <span class="ingredient-name"><?php echo $ingredient->name?></span>
                </li>
                <?php endforeach?>
            </ul>
        </div>
        <div class="recipe col-sx-12 col-sm-12 col-md-7 col-lg-7">
            <ul class="nav nav-tabs nav-justified">
                <li class="<?php echo $defaultStyle == 'narrative' ? 'active' : '' ?>">
					<a class="recipe-style" href="#narrative" data-style="narrative"
                       data-toggle="tab" data-target="#narrative">narrative</a>
                </li>
                <li class="<?php echo $defaultStyle == 'segmented' ? 'active' : '' ?>">
					<a class="recipe-style" href="#segmented" data-style="segmented"
                       data-toggle="tab" data-target="#segmented">segmented</a>
                </li>
                <li class="<?php echo $defaultStyle == 'step' ? 'active' : '' ?>">
					<a class="recipe-style" href="#step-by-step" data-style="step"
                       data-toggle="tab" data-target="#step-by-step">step-by-step</a>
                </li>
            </ul>
            <div class="tab-content">
                <div tabindex="7" class="tab-pane fade <?php
                    echo $defaultStyle == 'narrative' ? 'in active' : '' ?>" id="narrative">
                    <h2 tabindex="8">Instructions:</h2>
                    <section tabindex="9">
                        <?php echo $narrative->instructions;?>
                    </section>
                </div>
                <div tabindex="7" class="tab-pane fade <?php
                    echo $defaultStyle == 'step' ? 'in active' : '' ?>" id="step-by-step">
                    <h2 tabindex="8">Instructions:</h2>
                    <ol tabindex="9">
                        <?php foreach ($steps->instructions as $step):?>
                        <li><?php echo $step->instruction?></li>
                        <?php endforeach?>
                    </ol>
                </div>
                <div tabindex="7" class="tab-pane fade <?php
                    echo $defaultStyle == 'segmented' ? 'in active' : '' ?>" id="segmented">
                    <h2 tabindex="8">Instructions:</h2>

                    <ul tabindex="9" id='timeline'>
                        <?php foreach ($segmented->instructions as $step):?>
                        <li tabindex="10">
                            <input class="radio" id="work<?php echo $step->stepid?>" name="works" type="radio"
                                <?php echo $step->stepid == 1 ? ' checked' : ''?>>
                            <div class="relative">
                                <label for='work<?php echo $step->stepid?>'><?php echo $step->instruction?></label>
                                <span class='step'><?php echo $step->stepid?></span>
                                <span class='circle'></span>
                            </div>
                            <div class='sub'></div>
                        </li>
                        <?php endforeach?>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>
