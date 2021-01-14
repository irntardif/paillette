<?php

$data = [
	'url' => $page->url(),
  	'title' => $page->title()->value(),
  	'cover' => [
  		'url' => $page->cover()->toFile()->url(),
  		'thumb' => $page->cover()->toFile()->resize(300, 200)->url(),
  	],
  	'genre'  => 'immersion',
  	'company' =>   $page->intervenant()->toPage() ? $page->intervenant()->toPage()->title()->value() : ''
];

echo json_encode($data);