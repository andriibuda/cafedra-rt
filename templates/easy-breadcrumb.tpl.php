<?php if ($segments_quantity > 0): ?>
    <div itemscope class="easy-breadcrumb" aria-label="breadcrumbs" itemtype="<?php print $list_type; ?>">
        <ul id="breadcrumb" class="is-clearfix">
            <?php foreach ($breadcrumb as $i => $item): ?>
                <li class="is-clearfix">
                    <?php print $item; ?>
                </li>

<!--                --><?php //if ($i < $segments_quantity - $separator_ending): ?>
<!--                    <span class="easy-breadcrumb_segment-separator">--><?php //print $separator; ?><!--</span>-->
<!--                --><?php //endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>