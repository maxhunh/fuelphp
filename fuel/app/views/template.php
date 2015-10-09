<!-- Menote: Template default of app  -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }
	</style>
    <?php echo Asset::js(array(
        'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
        'bootstrap.js',
    )); ?>
    <script>
        $(function(){ $('.topbar').dropdown(); });
    </script>
</head>
<body>
	<div class="container">
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <?php echo Html::anchor('root','Home',array('class'=>'navbar-brand'));?>
                <ul class="nav navbar-nav">
                    <li class="active">
                       <?php echo Html::anchor('tweet/index','Tweets');?>
                    </li>
                    <li>
                       <?php echo Html::anchor('product/index','Products');?>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                       <?php echo Html::anchor('admin/index','Admins');?>
                    </li>
                    <?php if (isset($current_user)): ?>
                        <li>
                           <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo  $current_user->username ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </nav>
    		<div class="col-md-12">
    			<h1><?php echo $title; ?></h1>
    			<hr>
                <?php if (Session::get_flash('success')): ?>
                 <div class="alert alert-success">
                    <strong>Success</strong>
                    <p>
                        <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if (Session::get_flash('error')): ?>
             <div class="alert alert-danger">
                <strong>Error</strong>
                <p>
                    <!-- Menote: Build error list with array error -->
                    <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                </p>
            </div>
            <?php endif; ?>
            </div>
            <?php echo $content; ?>
        </div>
<footer>
   <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
   <p>
    <a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
    <small>Version: <?php echo e(Fuel::VERSION); ?></small>
</p>
</footer>
</div>
</body>
</html>
