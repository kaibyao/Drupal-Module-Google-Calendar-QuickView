<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>
	
<?php //var_dump($block->module); var_dump($block->delta); ?>

<div id="gcalendar-section">

<?php if (!empty($block->subject)): ?>
  <div id="gcalendar-title"><?php print $block->subject ?></div>
<?php endif;?>

<?php print $block->content; ?>

</div><!--/#gcalendar-section-->
<div style="padding-top: 25px;">
	<a href="http://www.facebook.com/group.php?gid=72940578197" target="_blank" ><img src="/web/sites/default/files/images/find_us_on_facebook_badge.gif" alt="Find us on Facebook!" /></a>
</div>
<?php //var_dump($block->content); ?>