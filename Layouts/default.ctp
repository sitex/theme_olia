<?php
	if ( $title_for_layout == 'Главная' ) $title_for_layout = '';
	if ( $title_for_layout == 'Оттенок' ) $title_for_layout = 'Найди свой оттенок';
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
			<?php echo $title_for_layout; ?>
			<?php if ( $title_for_layout != '' ): ?> | <?php endif; ?>
			<?php echo Configure::read('Site.title'); ?>
		</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <meta property="og:image" content="http://olia.kz/theme/Olia/img/mp_olia.png"/>
        <meta property="og:url" content="http://olia.kz"/>
        <meta property="og:title" content="Olia"/>
        <meta property="og:description" content="1-я стойкая крем-краска без аммиака, активируется маслом"/>

	<?php
		echo $this->Meta->meta();
		// echo $this->Layout->feed();
		echo $this->Html->css(array(
			'/css/bootstrap',
			// '/css/bootstrap-responsive.min',
			'/css/main',
			'/css/orangebox',
		));
		echo $this->Layout->js();
		echo $this->Html->script(array(
			// Vendors
			'/js/vendor/jquery-1.10.1.min',
			'/js/vendor/bootstrap.min',
			'/js/main',
		));



		echo $this->Blocks->get('css');
		echo $this->Blocks->get('script');

		if ($this->request->params['type'] == 'page') $special = $this->request->params['slug'];
		else $special = $this->request->params['type'];

		if ($special == 'mainpage') {
			echo $this->Html->script(array(
				'/js/cycleImages',
				'/js/orangebox.min'					// lightbox
			));
		}
		if ($special == 'shade') {
			echo $this->Html->css(array('/css/shades'));
			echo $this->Html->script(array('/js/shades'));
		}
	?>


    </head>
    <body class="<?php print $special ?>">

<?php if ($special == 'mainpage'): ?>
	<div class="bgImage">
	<?php
	print $this->Html->image('bg1.jpg', array('class'=>'active'));
	print $this->Html->image('bg2.jpg');
	print $this->Html->image('bg3.jpg');
	?>
	</div>
<?php endif; ?>

<?php if ($special == 'review'): ?>
	<div id="ob_overlay" style="display: none; z-index: 100; opacity: 0.60; height: 100%; width: 100%;"></div>
<?php endif; ?>

<div class="container <?php if ($special == 'mainpage'): ?>relative<?php endif; ?>">

<div class="row header">
	<div class="span3">
	<ul class="top_menu">
<?php
	$menu1 = '';
	$menu2 = '';
	$menu3 = '';
	$menu4 = '';
	switch ($special) {
		case 'mainpage': $menu1 = ' class="active"'; break;
		case 'technology': $menu2 = ' class="active"'; break;
		case 'shade': $menu3 = ' class="active"'; break;
		case 'review': $menu4 = ' class="active"'; break;
	}
?>
	<li <?php print $menu1; ?>><a href="/">Главная</a></li>
	<li <?php print $menu2; ?>><a href="/technology">Технология будущего</a></li>
	<li <?php print $menu3; ?>><a href="/shade">Найди свой оттенок</a></li>
	<li <?php print $menu4; ?>><a href="/review">Что говорят женщины</a></li>
	</ul>
	</div>
	<div class="span3">
	<?php print $this->Html->image('mp_garnier.png', array('style'=>'margin-top: 25px')); ?>
	<?php if ($special != 'mainpage') print $this->Html->image('mp_olia.png', array('style'=>'margin-top: 50px')); ?>
	</div>
	<div class="span6" style="text-align: center; <?php if ($special == 'mainpage'): ?>height: 316px; background: url(/theme/Olia/img/mp_olia.png) no-repeat 80px bottom; <?php endif; ?>">
	<?php print $this->Html->image('sunflower.png'); ?>
	</div>
</div>

<?php
	// echo $this->Layout->sessionFlash();
	echo $content_for_layout;
	// echo $this->element('sql_dump');
?>

</div> <!-- /container -->

<div class="container footer navbar-fixed-bottom">
	<div class="row">
	<div class="span4">
	<a id="bookmarkme" class="add_fav" href="#">Добавить в избранное</a>
	</div>
	<div class="span3">
	Присоединиться &nbsp;
	<a target="_blank" href="https://www.facebook.com/GarnierKazakhstan"><?php print $this->Html->image('fb_join.png'); ?></a>
	<a target="_blank" href="http://vk.com/garnierkazakhstan"><?php print $this->Html->image('vk_join.png'); ?></a>
	</div>
	<div class="span3">
	Поделиться &nbsp;
	<a href="#" onclick="window.open( 'https://www.facebook.com/sharer/sharer.php?u=http://olia.kz&p[images][0]=http://olia.kz/theme/Olia/img/mp_olia.png', 'facebook-share-dialog', 'width=626,height=436'); return false;">
	<?php print $this->Html->image('fb_share.png'); ?>
	</a>
	<a href="#" onclick="window.open( 'https://twitter.com/share?url=http://olia.kz', 'twitter-share-dialog', 'width=626,height=436'); return false;">
	<?php print $this->Html->image('twitter_share.png'); ?>
	</a>
	<a href="#" onclick="window.open( 'http://connect.mail.ru/share?url=http://olia.kz&title=twitter-share-dialog', 'twitter-share-dialog', 'width=626,height=436'); return false;">
	<?php print $this->Html->image('mailru_share.png'); ?>
	</a>
	<a href="#" onclick="window.open( 'http://vkontakte.ru/share.php?url=http://olia.kz&image=http://olia.kz/theme/Olia/img/mp_olia.png&title=Olia', 'twitter-share-dialog', 'width=626,height=436'); return false;">
	<?php print $this->Html->image('vk_share.png'); ?>
	</a>

	</div>
	<div class="pull-left w160">
	Смотрите нас на &nbsp;
	<a target="_blank" href="http://www.youtube.com/GarnierKazakhstan"><?php print $this->Html->image('ico_youtube.png'); ?></a>
	</div>
	</div>
</div>

        <script>
            var _gaq=[['_setAccount','UA-43181665-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));

			<?php if ($special == 'mainpage'): ?>
				$( document ).ready(function() {
				oB.settings.addThis = false	// OrangeBox Settings
				});
			<?php endif; ?>
  		</script>

	<?php
		echo $this->Blocks->get('scriptBottom');
		echo $this->Js->writeBuffer();
	?>

    </body>
</html>


</body>
</html>
