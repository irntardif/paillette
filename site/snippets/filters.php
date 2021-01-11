<div class="margin_t-m">

    <?php  if(isset($showMonths)): ?>
        <select class="select filter-select" data-filter-group="month">
            <option value="">Toute la saison</option>
            <option value=".janvier">janvier</option>
            <option value=".février">février</option>
            <option value=".mars">mars</option>
            <option value=".avril">avril</option>
            <option value=".mai">mai</option>
            <option value=".juin">juin</option>
            <option value=".juillet">juillet</option>
            <option value=".août">aout</option>
            <option value=".septembre">septembre</option>
            <option value=".octobre">octobre</option>
            <option value=".novembre">novembre</option>
            <option value=".décembre">décembre</option>
        </select>
    <?php endif; ?>

    <select class="select filter-select" data-filter-group="categories">
        <?php foreach($categories as $key => $value): ?>
            <option value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach ?>
    </select>


</div>