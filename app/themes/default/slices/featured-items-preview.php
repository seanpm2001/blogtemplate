<div class="slice slice-featured <?= $slice->getLabel() ?>">

<div class="list-pane">
<?php foreach($slice->getValue()->getArray() as $groupDoc) { ?>
    <?php $illustration = $groupDoc->get('illustration') ?>
    <div class="group-doc" data-illustration="<?= $illustration->getMain()->getUrl() ?>">
    <?php $readMore = $groupDoc->get('read-more'); ?>
        <?php if (!is_null($illustration) && !is_null($illustration->getView('icon'))) { ?>
            <div class='illustration' style='background-image: url("<?= $illustration->getView('icon')->getUrl() ?>")'></div>
        <?php } ?>
        <?= $groupDoc->get('title')->asHtml() ?>
        <?= $groupDoc->get('summary')->asHtml() ?>
        <?php if ($readMore) {
            $url = $linkResolver->resolve($readMore);
            $title = $readMore->get('title');
            echo '<a href="' . $url . '">' . $title . '</a>';
        } ?>
    </div>
<?php } ?>
</div>

<div class="preview-pane">
    <img src="" width="100%">
</div>

</div>