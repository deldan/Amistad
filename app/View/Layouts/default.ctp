<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width" />
	<title>Amistad Cristiana Madrid | Iglesia Cristiana Evangélica</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('foundation');
		echo $this->Html->css('app');
		echo $this->Html->css('ac');
		echo $this->Html->css('ie');

		echo $this->Html->script('jquery-1.5.1.min');
		echo $this->Html->script('jquery.orbit-1.2.3.min');
		echo $this->Html->script('app');
		echo $this->Html->script('foundation');
    echo $this->Html->script('swfobject');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container" class="wrapper">
		<div class="container" id="header">
	      <a href="https://www.facebook.com/amistadcristianamadrid" target="_blank"><img src="<? echo $this->Html->url('/');?>images/fb.png" alt="facebook amistad cristiana madrid"> Facebook</a> | <a href="https://twitter.com/#!/AmistadMadrid" target="_blank"><img src="<? echo $this->Html->url('/');?>images/twitter.png" alt="twitter amistad cristiana madrid"> Twitter</a> | <a href="http://www.youtube.com/user/AmistadMadrid" target="_blank"> <img src="<? echo $this->Html->url('/');?>images/youtube.gif" alt="youtube amistad cristiana madrid"> Youtube</a>
	   </div>
		<div id="content" class="container">
			<div class="row">
				<div class="four columns lateral">
					<a href="<? echo $this->Html->url('/', true);?>"><img src="<? echo $this->Html->url('/');?>images/logo.png" alt="amistad cristiana madrid" class="logo"></a>
				</div>
				<div class="eight columns">
					<div class="row">
						<div class="menu container">
							<ul>
							   <li><a href="/" <?if($pageActive=='index'){ echo'class="active"';}?> >inicio</a></li>
							   <li><a href="/conocenos" <?if($pageActive=='historia'||$pageActive=='vision'||$pageActive=='valores'||$pageActive=='legalidad'){ echo'class="active"';}?>>conócenos</a></li>
							   <li><a href="/areas" <?if($pageActive=='areas'){ echo'class="active"';}?>>áreas</a></li>
							   <li><a href="/ensenanzas" <?if($pageActive=='ensenanzas'){ echo'class="active"';}?>>enseñanzas</a></li>
							   <li><a href="/contacto" <?if($pageActive=='contacto'){ echo'class="active"';}?>>contacto</a></li>
							</ul>
						</div>
					</div>
					<div class="row"><?if($pageActive=='historia'||$pageActive=='vision'||$pageActive=='valores'||$pageActive=='legalidad'){echo $this->element('submenu');}?></div>
				</div>

			</div>


			<?php echo $this->Session->flash(); ?>


			<?php echo $this->fetch('content'); ?>
		</div>
		<div class="push"></div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<footer id="footer" class="hide-on-phones hide-on-tablets footer">
	   <div class="footertitle container">
	      <div class="row">
	         <div class="pestanya">
	         Actividades semanales
	         </div>
	      </div>
	   </div>
	   <div class="footermenu">
	   <div class="container">
	      <div class="row">
	         <div class="twelve columns centered">
	            <div class="columfooter">
	               <h4>Reunión General</h4>
	               Domingos. 11:30h
	               c/ Galileo 100<br>
	               <a href="#">ver mapa</a>
	            </div>
	            <div class="columfooter">
	               <h4>Ignition</h4>
	               Jóvenes en edad universitaria
	               Martes. 19:45h
	               <a href="http://facebook.com/IgnitionMadrid"><img src="<? echo $this->Html->url('/');?>images/fb.png" alt="facebook Ignition"> Ignition en Facebook</a>
	            </div>
	            <div class="columfooter">
	               <h4>Reunión de Oración</h4>
	               Miércoles, 14:00 y 20:00h
	            </div>
	            <div class="columfooter">
	               <h4>Redes</h4>
	               Profesionales
	               Jueves, 20:00h<br>
	               <a href="http://facebook.com/RedesAmistadCristiana"><img src="<? echo $this->Html->url('/');?>images/fb.png" alt="facebook Redes"> Redes en Facebook</a>
	            </div>
	            <div class="columfootermini">
	               <h4>Grupos en casa</h4>
	               <a href="<? echo $this->Html->url('/', true);?>grupos">ver zonas
	               y horarios</a>
	            </div>
	            </div>
	         </div>
	      </div>
	   </div>

	   <div class="minifooter ">
	     <p> © 2012 Amistad Cristiana Madrid  | c/ Vallehermoso 70, Madrid (España)  |  T. 91 448 44 11<p>
	   </div>

	</footer>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-3459245-6']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</body>
</html>
