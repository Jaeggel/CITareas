<html>
        <head>
          <title>Tareas</title>
           <meta name="viewport" content="width=device-width"/>
          <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
          <link rel="shortcut icon" href="<?php echo base_url("assets/img/logo.ico"); ?>">
          <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-latest.js"); ?>"></script>
				  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
           <script type="text/javascript" src="<?php echo base_url("assets/js/ajax.js"); ?>"></script>
           <script type="text/javascript" src="<?php echo base_url("assets/js/highcharts.js"); ?>"></script>
           <script type="text/javascript" src="<?php echo base_url("assets/js/exporting.js"); ?>"></script>
				  <link rel="stylesheet" type="text/css" href="<?php echo base_url("estilo.css"); ?>" />
  				<link rel="stylesheet" href="<?php echo base_url("assets/fonts/opensans.css"); ?>"/>
  				<link rel="stylesheet" href="<?php echo base_url("assets/fonts/Pacifico.css"); ?>"/>
        </head>
        <body>

        <div class="container">

          <a href="<?php echo site_url('/tasks') ?>"><IMG src="<?php echo base_url("assets/img/logo.png"); ?>" WIDTH=90 HEIGHT=90 BORDER=2 VSPACE=3 HSPACE=3 align=left>
          </a>
  		    <div class="page-header">
          <div>
            <h1>
            <a href="<?php echo site_url('/tasks') ?>" style="color: black">Listasks </a><small >El lugar para tus obligaciones</small>
            <button style=" font-size: 16pt; position: absolute; right: 60px; background-color: white;color: black;border: #2ABDC4;" class="btn" onclick="location.href='<?php echo site_url('tasks/about')?>'"><IMG src="<?php echo base_url("assets/img/aicon.png"); ?>" WIDTH=35 HEIGHT=35 BORDER=2 VSPACE=3 HSPACE=3>About</button>
            
            </h1>
            
          </div>
  		       

  		    </div>
	  	  </div>
     	
      	<h2 style="text-align:center;margin-top:10px;"><?php echo $title; ?></h2>
      