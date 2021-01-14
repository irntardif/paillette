<?php

$data = [
	'url' => $page->url(),
  	'title' => $page->title()->value(),
  	'cover' => [
  		'url' => $page->cover()->toFile()->url(),
  		'thumb' => $page->cover()->toFile()->resize(300, 200)->url(),
  	],
  	'genre'  => $page->genre()->value(),
  	'company' =>  $page->relatedCompany()->toPage() ? $page->relatedCompany()->toPage()->title()->value() : $page->companyName()->value()
];

echo json_encode($data);