<div id="footer" class="footer">
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-3-desktop is-6-tablet is-12-mobile">
                <?php print render($page['footer_firstcolumn']); ?>
            </div>
            <div class="column is-3-desktop is-6-tablet is-12-mobile">
                <?php print render($page['footer_secondcolumn']); ?>
            </div>
            <div class="column is-3-desktop is-6-tablet is-12-mobile">
                <?php print render($page['footer_thirdcolumn']); ?>
            </div>
            <div class="column is-3-desktop is-6-tablet is-12-mobile">
                <?php print render($page['footer_fourthcolumn']); ?>
            </div>

        </div>
        <?php print render($page['footer']); ?>

    </div>

</div>
<div class="section background-copyright has-text-centered">
    <?php print render($page['footer_copyright']); ?>
</div>