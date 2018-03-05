<head>
    <?php 
        if(!empty($this->title)){
            echo "<title>" . $this->title . "</title>";
        }
    ?><title></title>
    <link rel="stylesheet" href="<?php echo URL;?>public/css/default.css">
    <link rel="stylesheet" href="<?php echo URL;?>public/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo URL;?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>public/js/custom.js"></script>
    <?php
        if(isset($this->js))
        {
            echo '<script type="text/javascript" src="' . URL . 'views/' . $this->js . '"></script>' . "\n";
        }
        if(isset($this->css))
        {
            echo '<link rel="stylesheet" href="' . URL . 'views/' . $this->css . '">' . "\n";
        }
    ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
