<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">
    <script src="<?php echo URL; ?>public/js/jquery.js"></script>
    <title>header</title>
    <?php
    
    if (isset($this->js))
        {
            foreach($this->js as $js)
                {
                    echo '<script src="'.URL.'views/'.$js.'"></script>';
                }
        }

    ?>
</head>
<?php Session::init(); ?>
<body>
    
    <div id='header'>
        <br>
        <?php if(Session::get('loggedIn')!=true) {?>
        <a href="<?php echo URL; ?>index">Index</a>
        <a href="<?php echo URL; ?>help">Help</a>
        <?php } ?>
        <?php if(Session::get('loggedIn')!=true) {?>
            <a href="<?php echo URL; ?>login">Login</a>
        <?php } else {?>
            <a href="<?php echo URL; ?>dashboard">Dashboard</a>
                <?php if(Session::get('role')=='owner') {?>
                    <a href="<?php echo URL; ?>user">Users</a>
                <?php } ?>
            <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
            <?php }?>
    </div>

<div id="content">