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

function fetchUrl($data){
	switch ($data->linkType()) {
		case 'mail':
			$href = 'mailto:'.$data->mailaddr()->value();
			break;
		case 'page':
			$href = $data->page()->toPage()->url();
			break;
		default:
			$href = $data->linkUrl();
			break;
	}
	return $href;
}