<?php defined('C5_EXECUTE') or die("Access Denied.");
    /**
     * @var Concrete\Core\Page\Page $c
     * @var Concrete\Core\View\View $view
     */

    $u = new \User();
    $mm = \Config::get('concrete.maintenance_mode');
?>

<!DOCTYPE html>
<html lang="<?php echo Localization::activeLanguage() ?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Limegreentangerine" />
    <?php
        $view->element('header_required', [
            'pageTitle' => isset($pageTitle) ? $pageTitle : '',
            'pageDescription' => isset($pageDescription) ? $pageDescription : '',
            'pageMetaKeywords' => isset($pageMetaKeywords) ? $pageMetaKeywords : ''
        ]);
    ?>

    <link href="<?php echo \Core::make('autocache')->autocache($view->getThemePath() . '/css/site.css'); ?>" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="<?php echo $c->getPageWrapperClass(); ?><?php echo ($c->isEditMode()) ? ' ccm-page-edit-mode' : ''; ?><?php echo ($c->getCollectionHandle() === 'page_not_found' || $c->getCollectionHandle() === 'page_forbidden') ? ' ccm-' . str_replace('_', '-', $c->getCollectionHandle()) : ''; ?><?php echo ($mm) ? ' ccm-maintenance-mode' : ''; ?>">
        <nav>
            <?php
                $a = new \GlobalArea('Navigation');
                $a->display($c);
            ?>
        </nav>

        <?php $this->inc('elements/navigation-toggle.php'); ?>
