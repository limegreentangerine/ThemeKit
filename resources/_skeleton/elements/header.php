<?php defined('C5_EXECUTE') or die("Access Denied.");
    use Concrete\Core\User\Group\GroupRepository;

    /**
     * @var Concrete\Core\Page\Page $c
     * @var Concrete\Core\View\View $view
     */

    $u = new \User();
    $g = \Core::make(GroupRepository::class)->getGroupByName('Administrators');
    $cp = new \Permissions($c);
    $body_classes = [];

    // add user body classes
    if ($u->isRegistered()) {
        $body_classes[] = 'user__logged-in';
    }

    // if user can see toolbar, they're an admin
    if ($cp->canViewToolbar()) {
        $body_classes[] = 'user__admin';
        $body_classes[] = 'toolbar-in-view';
    }

    // add page type as a class
    if (strlen($c->getPageTypeHandle()) > 0) {
        $body_classes[] = sprintf('page-type__%s', $c->getPageTypeHandle());
    }

    // add page template or single page handle as a class
    if (strlen($c->getPageTemplateHandle()) > 0) {
        $body_classes[] = sprintf('page-template__%s', $c->getPageTemplateHandle());
    } else {
        $body_classes[] = sprintf('page-template__%s', $c->getCollectionHandle());
    }

    // is page in edit mode
    if ($c->isEditMode()) {
        $body_classes[] = 'page__edit-mode';
    }

    if (\Config::get('concrete.maintenance_mode') == true && !$u->isRegistered()) {
        $body_classes[] = 'maintenance-mode';
    }
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
<body class="<?php echo implode(' ', $body_classes); ?>">
    <div class="<?php echo $c->getPageWrapperClass()?>">
        <nav>
            <?php
                $a = new \GlobalArea('Navigation');
                $a->display($c);
            ?>
        </nav>

        <?php $this->inc('elements/navigation-toggle.php'); ?>
