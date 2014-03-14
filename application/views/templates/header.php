<?php
header('Content-Type:text/html; charset=utf-8');
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico" type="image/x-icon">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet" type="text/css">
</head>

<body>
	<span class="hidden" id="baseUrl"><?php echo base_url() ?></span>
    <header>
        <a tabindex="3" class="brand <?php echo $this->uri->segment(1) == '' ? 'active' : '' ?>" href="<?php echo base_url() ?>">
        Link to home
        </a>
        <nav class="navbar" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li tabindex="1"  class="<?php echo $this->uri->segment(1) == 'recipes' ? 'active' : '' ?>"><a title="grid" href="<?php echo base_url() .  'recipes/' ?>">Recipes</a></li>
						<li tabindex="2"  class="<?php echo $this->uri->segment(1) == 'courses' ? 'active' : '' ?>"><a title="courses" href="<?php echo base_url() . 'courses/' ?>">Courses</a></li>
                    </ul>
                    <div class="btn-group pull-right">
                        <button tabindex="4" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <span data-toggle="tooltip" data-placement="bottom" title="Click on this dropdown menu to select how instructions will be represented when you view recipes.">Instruction Types</span>
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" tabindex="5">
                            <li tabindex="5" class="<?php echo $defaultStyle == 'narrative' ? 'active' : '' ?>">
                                <a class="recipe-style" href="#narrative" data-style="narrative" data-toggle="tab" data-target="#narrative">narrative</a>
                            </li>
                            <li tabindex="5" class="<?php echo $defaultStyle == 'segmented' ? 'active' : '' ?>">
                                <a class="recipe-style" href="#segmented" data-style="segmented" data-toggle="tab" data-target="#segmented">segmented</a>
                            </li>
                            <li tabindex="5" class="<?php echo $defaultStyle == 'step' ? 'active' : '' ?>">
                                <a class="recipe-style" href="#step-by-step" data-style="step" data-toggle="tab" data-target="#step-by-step">step-by-step</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div id="breadcrumbs" class="container">
            <div class="container">
            <?php if(isset($breadcrumb)) { ?>
                <?php
                      foreach($breadcrumb as $name => $link)
                      {
                         echo '<a tabindex="6" href="' . rawurlencode($link) . '"> ' . $name . ' / </a>';
                      }
                ?>
            <?php } ?>
            </div>
        </div>
    </header>
	<div class="container">
		<div class="alert alert-danger style-change-error hidden">
			<p>Sorry, there was a problem changing the style of your recipes.</p>
			<p>Although the recipe has changed here, the system can't remember your change at the moment.</p>
			<p>As such, when you go and look at another recipe your style preference will revert to default, rather than the choice you've just made.</p>
		</div>
	</div>
	<div class="container">
		<div class="alert alert-success style-change-success hidden">
			<p>Great! Your presentation style was changed successfully!</p>
		</div>
	</div>
