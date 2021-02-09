<?php
function switchData($data){
	switch ($data) {
		case 'mail':
			$icon = 'contact';
			break;
		case 'url':
			$icon = 'url';
			break;
		case 'file':
			$icon = 'download';
			break;
		default:
			$icon = 'eye';
			break;
	}
	return $icon;
}