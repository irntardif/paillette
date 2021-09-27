<?php function getLastPathSegment($url) {
    $path = parse_url($url, PHP_URL_PATH); // to get the path from a whole URL
    $pathTrimmed = trim($path, '/'); // normalise with no leading or trailing slash
    $pathTokens = explode('/', $pathTrimmed); // get segments delimited by a slash

    if (substr($path, -1) !== '/') {
        array_pop($pathTokens);
    }
    return end($pathTokens); // get the last segment
}

if($data && $data->videoId()->isNotEmpty()):

	if($data->platform() == 'youtube'):
		$url = 'https://www.youtube.com/embed/';
	else:
		$url = 'https://player.vimeo.com/video/';
	endif;

	$ref = $data->videoId()->url();
	$id = explode('/', $ref); 
	$id = end($id);
	?>

	<div class="media margin_t-m">
		<figure class='regular'>
		    <iframe src="<?= $url.$id ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</figure>
	</div>

<?php endif; ?>