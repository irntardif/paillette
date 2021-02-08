<div class="media margin_t-m">
    <?php foreach($data->images()->toFiles() as $img): ?>
      <figure class="<?php echo $img->extension() == 'jpg' || $img->extension() == 'jpeg' ? 'blue-filter regular margin_b-m' : 'margin_b-m regular' ?>">
       <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
      </figure>
    <?php endforeach;?>
</div>