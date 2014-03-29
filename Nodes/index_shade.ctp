<?php

function show_colors( $nodes = array(), $term = '') {
	$return = '';
	$i = 0;
	foreach ($nodes as $node) {
		// images
		$shade = (isset($node['Nodeattachment'][0]['path'])) ? $node['Nodeattachment'][0]['path'] : 'http://placehold.it/80x80';
		// terms
		$terms = json_decode($node['Node']['terms'], true);
		if (!is_array($terms)) $terms = array();
		// check term
		if (in_array($term, $terms)) {
			$style="";
			if ($i == 0) { $style="left"; $i = 1; }

			$return .= '<li><a class="shades '.$style.'" href="#">';
			$return .= '<img class="'.$node['Node']['slug'].'" src="'.$shade.'" alt="'.$node['Node']['excerpt'] . ' - ' . $node['Node']['title'].'">';
			$return .= '<span><strong>'.$node['Node']['excerpt'].'</strong> '.$node['Node']['title'].'</span>';
			$return .= '</a>';
			$return .= '<div class="mask" style="display: none;"></div>';
			$return .= '</li>';
		}
	}

	return $return;
}
?>

<div class="row info">
	<div class="span9 offset3"><h1 class="purple">Найди свой оттенок</h1></div>
</div>
<div class="row info">

	<div id="packshot" class="span3">
		<img src="/theme/Olia/img/blank.gif" style="display: block;">
		<?php
			foreach ($nodes as $node):
				$packshot = (isset($node['Nodeattachment'][1]['path'])) ? $node['Nodeattachment'][1]['path'] : 'http://placehold.it/260x450';
		?>
				<img src="<?php print $packshot ?>" class="<?php print $node['Node']['slug'] ?>" alt="<?php print $node['Node']['excerpt'] . ' - ' . $node['Node']['title']; ?>" title="<?php print $node['Node']['excerpt'] . ' - ' . $node['Node']['title']; ?>" style="display: none;">
		<?php endforeach; ?>
	</div>

	<div id="shade-wrapper" class="span9">
		<ul>
		<?php
			$term = 'black';
			// array('c10','c20','c30','c316');
			print show_colors($nodes, $term);
		?>
		</ul>

		<ul>
		<?php
			$term = 'red';
			// $codes = array('c46','c660');
			print show_colors($nodes, $term);
		?>
		</ul>

		<ul>
		<?php
			$term = 'brown';
			// $codes = array('c40','c50','c415','c525','c55','c60','c643','c63');
			print show_colors($nodes, $term);
		?>
		</ul>

		<ul>
		<?php
			$term = 'blonde';
			// $codes = array('c713','c70','c80','c90','c100');
			print show_colors($nodes, $term);
		?>
		</ul>
	</div>
</div>
