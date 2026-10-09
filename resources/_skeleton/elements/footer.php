<?php defined('C5_EXECUTE') or die('Access Denied.');
    /**
     * @var Concrete\Core\View\View $view
     */
?>
        <?php $this->inc('elements/lgtcredit.php'); ?>
    </div>

    <script async defer type="module" src="<?php echo \Core::make('autocache')->autocache($view->getThemePath() . '/js/site.js'); ?>"></script>

    <?php $view->element('footer_required'); ?>
</body>
</html>
