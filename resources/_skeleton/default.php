<?php defined('C5_EXECUTE') or die('Access Denied.');
/**
 * @var Concrete\Core\Page\Page $c
 */
$this->inc('elements/header.php');

$a = new \Area('Main');
$a->display($c);

$this->inc('elements/footer.php');
