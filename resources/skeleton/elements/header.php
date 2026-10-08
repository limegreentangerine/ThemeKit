<?php defined('C5_EXECUTE') or die('Access Denied.');

$body_classes = [];

// Check to see if user is logged in and administrator / super admin
$u = new User();
$g = Group::getByName('Administrators');


if (User::isLoggedIn()) {
    $body_classes[] = 'logged-in';
}

if ($u->inGroup($g) || $u->isSuperUser()) {
    $body_classes[] = 'user-admin';
}

if ($c->isEditMode()) {
    $body_classes[] = 'page-edit-mode';
}

// add page type as a class
if (strlen($c->getPageTypeHandle()) > 0) {
    $body_classes[] = $c->getPageTypeHandle();
}

// add page template or single page handle as a class
if (strlen($c->getPageTemplateHandle()) > 0) {
    $body_classes[] = $c->getPageTemplateHandle();
} else {
    $body_classes[] = $c->getCollectionHandle();
}

// get currently selected language and add as a body class
$language = Localization::activeLanguage();
$body_classes[] = 'lang_' . $language;

// is C5 toolbar in view?
$cp = new Permissions($c);
if ($cp->canViewToolbar()) {
    $body_classes[] = 'toolbar-in-view';
}

if (\Config::get('concrete.maintenance_mode') == true && !User::isLoggedIn()) {
    $body_classes[] = 'maintenance_mode';
    $maintenance_mode = true;
} else {
    $maintenance_mode = false;
}

// is preload available?
$preload = true;
if(array_key_exists('HTTP_USER_AGENT', $_SERVER)) {
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
        $preload = false;
    } elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) {
        $preload = true;
    } elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE) {
        $preload = true;
    } elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE) {
        $preload = true;
    } elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE) {
        $preload = true;
    } else {
        $preload = false;
    }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $language; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $language; ?>"> <!--<![endif]-->
<head>
    <!--
    __  __           _        _             _     _                                          _                              _
    |  \/  | __ _  __| | ___  | |__  _   _  | |   (_)_ __ ___   ___  __ _ _ __ ___  ___ _ __ | |_ __ _ _ __   __ _  ___ _ __(_)_ __   ___
    | |\/| |/ _` |/ _` |/ _ \ | '_ \| | | | | |   | | '_ ` _ \ / _ \/ _` | '__/ _ \/ _ \ '_ \| __/ _` | '_ \ / _` |/ _ \ '__| | '_ \ / _ \
    | |  | | (_| | (_| |  __/ | |_) | |_| | | |___| | | | | | |  __/ (_| | | |  __/  __/ | | | || (_| | | | | (_| |  __/ |  | | | | |  __/
    |_|  |_|\__,_|\__,_|\___| |_.__/ \__, | |_____|_|_| |_| |_|\___|\__, |_|  \___|\___|_| |_|\__\__,_|_| |_|\__, |\___|_|  |_|_| |_|\___|
                                    |___/                          |___/                                    |___/
    -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Limegreentangerine" />

    <?php
        Loader::element('header_required', [
            'pageTitle' => isset($pageTitle) ? $pageTitle : '',
            'pageDescription' => isset($pageDescription) ? $pageDescription : '',
            'pageMetaKeywords' => isset($pageMetaKeywords) ? $pageMetaKeywords : ''
        ]);
    ?>

    <?php if ($preload) { ?>
        <style>
            body {
                opacity: 0;
                transition: opacity 200ms ease-in-out;
            }

            body.loaded {
                opacity: 1;
            }
        </style>

        <link rel="preload" href="<?php echo \Core::make('autocache')->autocache($view->getThemePath(), 'dist/site.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
        <noscript>
            <link href="<?php echo \Core::make('autocache')->autocache($view->getThemePath(), 'dist/site.css'); ?>" type="text/css" rel="stylesheet" media="screen, print, projection" />
        </noscript>
    <?php } else { ?>
        <link href="<?php echo \Core::make('autocache')->autocache($view->getThemePath(), 'dist/site.css'); ?>" type="text/css" rel="stylesheet" media="screen, print, projection" />
    <?php } ?>

    <?php
        Loader::element('social_opengraph', [
            'page'  => Page::getCurrentPage(),
            'view'  => $view,
            'ih'    => \Core::make('helper/image')
        ], 'lgt_toolkit');
    ?>
</head>

<body class="<?php echo implode(' ', $body_classes); ?>">
    <div class="<?php echo $c->getPageWrapperClass(); ?>">

        <?php $this->inc('elements/navigation-toggle.php'); ?>
        <nav>
            <?php
                $a = new GlobalArea('Navigation');
                $a->display($c);
            ?>
        </nav>
