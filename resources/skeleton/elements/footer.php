        <?php $this->inc('elements/lgtcredit.php'); ?>

    </div>

    <div id="outdated">
        <h6><?php t('Your browser is out-of-date!'); ?></h6>
        <p><?php echo t('Update your browser to view this website correctly. <a id="btnUpdateBrowser" href="http://outdatedbrowser.com/">Update my browser now'); ?></a></p>
        <p class="last"><a href="#" id="btnCloseUpdateBrowser" title="Close">&times;</a></p>
    </div>


    <script async defer src="<?php echo \Core::make('autocache')->autocache($view->getThemePath(), 'dist/site.js'); ?>"></script>

    <?php Loader::element('footer_required'); ?>
</body>
</html>
