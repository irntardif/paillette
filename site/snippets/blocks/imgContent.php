<div class="media margin_t-m">
    <?php foreach($data->images()->toFiles() as $img): ?>
      <figure>
       <img class="<?php echo $img->extension() == 'jpg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
      </figure>
    <?php endforeach;?>
</div>