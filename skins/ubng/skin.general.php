<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8"/>
	<title><?rcms_show_element('title')?></title>
	<?rcms_show_element('meta')?> 
	<link rel="stylesheet" href="<?=CUR_SKIN_PATH?>css/layout.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?=CUR_SKIN_PATH?>css/ubilling.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="modules/jsc/hideshow.js" type="text/javascript"></script>
        <script src="modules/jsc/jquery.cookie.js" type="text/javascript"></script>
        <script src="modules/jsc/glmenuCollapser.js" type='text/javascript'></script> 
</head>


<body>

	<header id="header">
		<hgroup>
                    <h1 class="site_title">
                    <a href="http://ubilling.net.ua">
                    <img src="<?=CUR_SKIN_PATH?>/images/logo.png" height="32" border="0">
                    </a> 
                    Ubilling
                    <sup class="ubverinfo"><?=file_get_contents('RELEASE')?></sup>
                    </h1>
                        
                    <div class="notificationArea">
                    <?php 
                    if (LOGGED_IN) {
                        $notifyArea=new DarkVoid();
                        print($notifyArea->render());
                    }
                    ?>
                    </div>
                    
                    <div class="btn_view_help"><?=web_HelpIconShow();?>  <? if (XHPROF) { print($xhprof_link); } ?> <?=zb_IdleAutologoutRun(); ?></div>
		</hgroup>
	</header> <!-- end of header bar -->
	<? if (LOGGED_IN) {  ?> 
	<section id="secondary_bar">
		<div class="user">
                    <p><?=  whoami();?></p>
                    <a class="menu_toggle" href="javascript:showhideGlobalMenu();" title="<?=__('Toggle menu');?>"><?=__('Toggle menu');?></a> 
                </div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="?module=taskbar"><?=__('Taskbar');?></a> <div class="breadcrumb_divider"></div> <a class="current">надо отслеживать</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search" method="POST" action="?module=usersearch">
                    <input type="text" name="partialaddr" value="<?=__('User search');?>" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		
                <?php
                $globalMenu=new GlobalMenu();
                print($globalMenu->render());
                ?>
	
		<h3><?=__('Administrator');?></h3>
		<ul class="toggle">
                    <li><a href="?idleTimerAutoLogout=true"><img src="skins/menuicons/icn_jump_back.png"> <?=__('Log out');?></a></li>
		
                       <li>
                            <form name="lang_select" method="post" action=""><img src="skins/menuicons/icn_settings.png"><?=user_lang_select('lang_form', $system->language, 'font-size: 90%; width: 100px;', 'onchange="document.forms[\'lang_select\'].submit()" title="' . __('Lang') . '"')?></form>
                            <form name="skin_select" method="post" action=""><img src="skins/menuicons/icn_settings.png"><?=user_skin_select(SKIN_PATH, 'user_selected_skin', $system->skin, 'font-size: 90%; width: 100px;', 'onchange="document.forms[\'skin_select\'].submit()" title="' . __('Skin') . '"')?></form>
                           
                        </li>
                    </ul>
                
		<footer>
           
                    	<hr />
			<p><strong><?rcms_show_element('copyright')?> </strong></p>
			<p>
		<?php    	
  // Page gentime end
  $mtime = explode(' ', microtime());
  $totaltime = $mtime[0] + $mtime[1] - $starttime;
  print(__('GT:').round($totaltime,2));
  print(' QC: '.$query_counter);
 ?></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
	 <article class="module width_full">
          	<?rcms_show_element('menu_point', 'up_center@window')?>
                <?rcms_show_element('main_point', $module . '@window')?>
         </article>
		<div class="spacer"></div>
	</section>
<? } else { 
                    
                    if (file_exists('DEMO_MODE')) {
			$loginform='
                <form action="" method="post">
                <input type="hidden" name="login_form" value="1">
        	&nbsp; '.__('Login').' <input name="username" type="text" value="admin" size="12">
		&nbsp; '.__('Password').' <input name="password" type="password"  value="demo" size="12">
		<input value="'.__('Log in').'" type="submit">
		</form>
		'; 
                        
                } else {
                    $loginform='
                <form action="" method="post">
                <input type="hidden" name="login_form" value="1">
        	&nbsp; '.__('Login').' <input name="username" type="text" size="12">
		&nbsp; '.__('Password').' <input name="password" type="password" size="12">
		<input value="'.__('Log in').'" type="submit">
		</form>
		'; 
                }
		print($loginform);
		  }?>	

</body>

</html>