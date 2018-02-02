<div id="header" class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="clearfix container">

        <div class="navbar-brand">
            <?php if ($logo): ?>
                <a class="navbar-item" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                </a>
            <?php endif; ?>

            <?php if ($site_name || $site_slogan): ?>
                <div id="name-and-slogan">
                    <?php if ($site_name): ?>
                        <?php if ($title): ?>
                            <div id="site-name"><strong>
                                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"
                                       rel="home"><span><?php print $site_name; ?></span></a>
                                </strong></div>
                        <?php else: /* Use h1 when the content title is empty */ ?>
                            <h1 id="site-name">
                                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"
                                   rel="home"><span><?php print $site_name; ?></span></a>
                            </h1>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($site_slogan): ?>
                        <div id="site-slogan"><?php print $site_slogan; ?></div>
                    <?php endif; ?>
                </div>
                <!-- /#name-and-slogan -->
            <?php endif; ?>
            <button class="button navbar-burger is-dark" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="navbar-menu" id="navMenu">
            <div class="navbar-end">
                <?php print render($page['header']); ?>
            </div>
        </div>

    </div>
</div>