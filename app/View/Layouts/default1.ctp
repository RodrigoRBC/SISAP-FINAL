<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="descripcion" content="Sistema">
  <meta name="autor" content="Miguel Chiuyari">
  <meta name="email" content="541ntmik@gmail.com">
  <title>
	<?php echo $title_for_layout;?>		
  </title>
  <link rel="icon" href="../images/favicon/favicon-32x32.png" sizes="32x32">

	<?php

		echo $this->Html->css('materialize.min.css');
		echo $this->Html->css('materializecss-icon.css');
		echo $this->Html->css('style.min.css');
		echo $this->Html->css('custom/custom.min.css');

		echo $this->Html->css('../js/plugins/perfect-scrollbar/perfect-scrollbar.css');
		echo $this->Html->css('../js/plugins/jvectormap/jquery-jvectormap.css');
		echo $this->Html->css('../js/plugins/chartist-js/chartist.min.css');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
	?>
		
	<?php //echo $scripts_for_layout; ?>	
  <style type="text/css">
  ul.side-nav.leftside-navigation li a {
    line-height: 1.5;
  }
  </style>
	
</head>
<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <!-- End Page Loading -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper light-blue darken">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><?php echo $this->Html->link($this->Html->image('logo-calidad.png',array('alt'=>'materialize logo')), '/pages/home', array('class' => 'brand-logo darken-1','escape'=>false)); ?>
            			     <span class="logo-text"></span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Sistema de Círculos de Mejora Continua (SCMC)"/>
                    </div>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">
            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                    	<?php echo $this->Html->image('user.svg',array('alt'=>'','class'=>"circle responsive-img valign profile-image")); ?>
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="#"><!--<i class="mdi-action-face-unlock"></i>--><?php echo substr($datosLogeo['0']['Secorganization']['name'], 0,10);?></a>
                            </li>
                            <li><a href="#"><!--<i class="mdi-action-settings"></i>--><?php echo substr($datosLogeo['0']['Secproject']['name'], 0,10);?></a>
                            </li>
                            <li><?php echo $this->Html->link('<i class="mdi-hardware-keyboard-tab"></i>'.__(' Salir',true),
								array('controller'=> 'Secassigns', 'action'=>'logout'), array('escape'=>false),null);?>
                            </li>
                        </ul>
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $datosLogeo['0']['Secperson']['firstname'].' '.$datosLogeo['0']['Secperson']['appaterno'];?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <p class="user-roal"><?php echo substr($datosLogeo['0']['Secrole']['name'], 0,10);?></p>
                    </div>
                </div>
                </li> 
                <?php if(!empty($menu)):?>        
                  <?php foreach($menu as $clave => $item):?>
                    <?php if(!empty($item['secprograms']['etiqueta'])): ?>
                      <?php if(empty($item['secprograms']['solicitado'])): ?>
                                  <?php echo html_entity_decode($item['secprograms']['listaDesordenada']);?> <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i><?php echo $item['secprograms']['etiqueta'];?></a>
                        
                      <?php else: ?>  
                        <?php echo html_entity_decode($item['secprograms']['listaDesordenada']);
                                            echo $this->Html->link(__($item['secprograms']['etiqueta'], true), '/'.$item['secprograms']['solicitado'] ); ?>
                      <?php endif; ?>
                    <?php else: ?>  
                          <?php echo html_entity_decode($item['secprograms']['listaDesordenada']); ?>
                    <?php endif; ?> 
                  <?php endforeach; ?>
                <?php endif; ?>

            </ul>

            </aside>

            <section id="content">
            	<div class="container">            		
					<?php echo $this->Session->flash();
							echo $this->Session->flash('auth');?>
					<?php echo $content_for_layout; ?>
            	</div>
            </section>




        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->

    <!-- START FOOTER -->
    <footer class="page-footer light-blue darken">
        <div class="container">
        </div>
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2017 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">DCA UNHEVAL</a> All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://www.facebook.com/miguel.chiu.veramendi">Miguel Chiuyari</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->    

	<?php 
		echo $this->Html->script('plugins/jquery.min.js');
    //echo $this->Html->script('plugins/jquery-migrate-3.0.0.min');
        
		echo $this->Html->script('materialize.min.js');
		echo $this->Html->script('plugins/prism/prism.js');
		echo $this->Html->script('plugins/perfect-scrollbar/perfect-scrollbar.min.js');
    
    echo $this->Html->script('plugins/jquery-validation/jquery.validate.min.js');  
    echo $this->Html->script('plugins/jquery-validation/additional-methods.min.js');   
    //echo $this->Html->script('http://demo.geekslabs.com/materialize-v1.0/js/plugins/angular.min.js');   

		//echo $this->Html->script('plugins/chartist-js/chartist.min.js');  

		echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
		echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
		echo $this->Html->script('plugins/jvectormap/vectormap-script.js');
		
		echo $this->Html->script('plugins.min.js');
		echo $this->Html->script('custom-script.js');
    echo $this->Html->script('message.js');
	?>
	<?php echo $scripts_for_layout; ?>
	<?php echo $this->Js->writeBuffer(); ?>
	
</body>
</html>