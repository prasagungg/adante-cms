<?php 


function badge(array $replace)
{
	$badge = '<span class="badge badge-color">text</span>';
	$attr = ['color', 'text'];
	
	return str_replace($attr, $replace, $badge);
}

 ?>