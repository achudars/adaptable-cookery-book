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
    <header>
        <div class="brand">
        </div>
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
                        <li class="active"><a href="<?php echo base_url() .  'recipes/grid-view' ?>">GRID Recipes</a></li>
                        <li><a href="<?php echo base_url() . 'recipes/' ?>">LIST Recipes</a></li>
                        <li><a href="<?php echo base_url() . 'recipe/' ?>">Recipe</a></li>
						<li><a href="<?php echo base_url() . 'courses/' ?>">Courses</a></li>
                    </ul>
                    <span class="btn-group pull-right">
                                  <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      Change recipe version style
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="active"><a href="#novice" data-toggle="tab" data-target="#novice">narrative</a></li>
                                        <li><a href="#normal" data-toggle="tab" data-target="#normal">segmented</a></li>
                                        <li><a href="#expert" data-toggle="tab" data-target="#expert">step-by-step</a></li>
                                    </ul>
                                  </div>
                                </span>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
