<?php
foreach ($nodes as $i => $node) {
	$num = substr($node['Node']['slug'], -1).'.jpg';
	$image = 'url(/theme/Olia/img/'.$num.') no-repeat left bottom';
	// $image = (isset($node['Nodeattachment'][1]['path'])) ? 'url('.$node['Nodeattachment'][1]['path'].') no-repeat 30px bottom' : '';
	$arrow_top = '';
	if ($i != 0) {
		$top = 104*$i+30;
		$arrow_top = 'top: '.$top.'px;';
	}
	//
 	print '<div class="reviewer '.$node['Node']['slug'].'" style="background: #000000 '.$image.'; display: none;">';
	print '<a class="close_reviewer" href="#"><img src="/theme/Olia/img/close_review_pink.png"></a>';
	print '<div class="arrow" style="'.$arrow_top.'"><img src="/theme/Olia/img/arrow_pink.png" alt=""></div>';
	print '<h3>'.$node['Node']['title'].'</h3>';
	print $node['Node']['body'];
	print '</div>';
 } ?>


<div class="row info">
	<div class="span6 offset3">
		<h1 class="purple">Что говорят<br> женщины</h1>
		<iframe class="ytvideo" width="430" height="323" src="//www.youtube.com/embed/om1gnY4bVrQ?autoplay=1" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="span3 names">
<?php
foreach ($nodes as $i => $node) {
	$num = substr($node['Node']['slug'], -1).'m.jpg';
	$image = '/theme/Olia/img/'.$num;
	// $image = (isset($node['Nodeattachment'][0]['path'])) ? $node['Nodeattachment'][0]['path'] : 'http://placehold.it/80x80';
	print '<a class="initial" data-rel=".'.$node['Node']['slug'].'" href="#"><img align="left" src="'.$image.'" alt="">'.nl2br($node['Node']['excerpt']).'</a>';
}
?>
	</div>
</div>
