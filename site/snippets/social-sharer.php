<nav class="margin_b-m">
	<p>À partager</p>
    <ul class="flex social-share">
<!-- Email -->
        <li><a target="_blank" title="Envoyer par mail" href="mailto:?Subject=Regarde ça c'est cool !&amp;Body=regarde%20cet%20article%20c'est%20super !%20 <?=$page->url()?>" rel="nofollow"><img src="<?= $kirby->url('assets') ?>/icons/mail.svg" alt="email" /></a></li>
<!-- //Email -->

<!-- Facebook -->
       <li><a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?=$page->url()?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><img src="<?= $kirby->url('assets') ?>/icons/facebook.svg" alt="Facebook" /></a></li>
<!-- //Facebook -->
 
<!-- Twitter -->
        <li><a target="_blank" title="Twitter" href="https://twitter.com/share?url=https://bit.ly/2sI7H3v" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;"><img src="<?= $kirby->url('assets') ?>/icons/twitter.svg" alt="Twitter" /></a></li>
<!-- //Twitter -->
 

    </ul>
</nav>