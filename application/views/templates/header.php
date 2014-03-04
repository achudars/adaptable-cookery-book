<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $title ?>
    </title>
    <link rel="shortcut icon" href="../../../assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../../assets/images/favicon.ico" type="image/x-icon">
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet" type="text/css">
</head>

<body>
	<span class="hidden" id="baseUrl"><?php echo base_url() ?></span>
    <header>
        <a class="brand" href="<?php echo base_url() . 'recipes/grid-view' ?>">
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
                        <li tabindex="1"  class="<?php echo $this->uri->segment(2) == 'grid-view' ? 'active' : '' ?>"><a title="grid"href="<?php echo base_url() .  'recipes/grid-view' ?>">Grid</a></li>
                        <li tabindex="2"  class="<?php echo $this->uri->segment(2) == 'list-view' ? 'active' : '' ?>"><a title="list" href="<?php echo base_url() . 'recipes/list-view' ?>">List</a></li>
						<li tabindex="3"  class="<?php echo $this->uri->segment(1) == 'courses' ? 'active' : '' ?>"><a title="courses" href="<?php echo base_url() . 'courses/' ?>">Courses</a></li>
                    </ul>
                    <span class="btn-group pull-right">
                      <div class="btn-group">
                        <button tabindex="4" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          Change recipe version style
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" tabindex="5">
                            <li tabindex="5" class="active">
								<a class="recipe-style" href="#narrative" data-style="narrative" data-toggle="tab" data-target="#narrative">narrative</a>
							</li>
                            <li tabindex="5">
								<a class="recipe-style" href="#segmented" data-style="segmented" data-toggle="tab" data-target="#segmented">segmented</a>
							</li>
                            <li tabindex="5">
								<a class="recipe-style" href="#step-by-step" data-style="step" data-toggle="tab" data-target="#step-by-step">step-by-step</a>
							</li>
                        </ul>
                      </div>
                    </span>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
