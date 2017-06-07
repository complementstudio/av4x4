<div class="wrap">
<?php
$did = isset($_GET['did']) ? $_GET['did'] : '0';

$sSql = $wpdb->prepare(
	"SELECT COUNT(*) AS `count` FROM ".WP_COOLTEXT_TABLE."
	WHERE `id_cool` = %d",
	array($did)
);
$result = '0';
$result = $wpdb->get_var($sSql);

if ($result != '1')
{
	?><div class="error fade"><p><strong><?php _e('The selected item does not exist', 'cooltext-admin'); ?></strong></p></div><?php
}
else
{
	$CoolText_errors = array();
	$CoolText_success = '';
	$CoolText_error_found = FALSE;
	
	$sSql = $wpdb->prepare("
		SELECT *
		FROM `".WP_COOLTEXT_TABLE."`
		WHERE `id_cool` = %d
		LIMIT 1
		",
		array($did)
	);
	$data = array();
	$data = $wpdb->get_row($sSql, ARRAY_A);

	$form = array(
		'CoolText_selector' => $data['selector'],
		'CoolText_replacement' => $data['replacement']
	);
}

if (isset($_POST['CoolText_form_submit']) && $_POST['CoolText_form_submit'] == 'yes')
{
	check_admin_referer('CoolText_form_edit');
	
	$form['CoolText_selector'] = isset($_POST['CoolText_selector']) ? $_POST['CoolText_selector'] : '';
	if ($form['CoolText_selector'] == '')
	{
		$CoolText_errors[] = __('Please enter a jQuery selector string.', 'cooltext-admin');
		$CoolText_error_found = TRUE;
	}

	$form['CoolText_replacement'] = isset($_POST['CoolText_replacement']) ? $_POST['CoolText_replacement'] : '';
	if ($form['CoolText_replacement'] == '')
	{
		$CoolText_errors[] = __('Please enter a CoolText string.', 'cooltext-admin');
		$CoolText_error_found = TRUE;
	}


	if ($CoolText_error_found == FALSE)
	{	
		$sSql = $wpdb->prepare(
				"UPDATE `".WP_COOLTEXT_TABLE."`
				SET `selector` = %s, `replacement` = %s 
				WHERE id_cool = %d
				LIMIT 1",
				array($form['CoolText_selector'], $form['CoolText_replacement'], $did)
			);
		$wpdb->query($sSql);
		
		$CoolText_success = 'The item was successfully updated.';
	}
}

if ($CoolText_error_found == TRUE && isset($CoolText_errors[0]) == TRUE)
{
?>
  <div class="error fade">
    <p><strong><?php echo $CoolText_errors[0]; ?></strong></p>
  </div>
  <?php
}
if (($CoolText_error_found == FALSE && strlen($CoolText_success) > 0))
{
?>
  <div class="updated fade">
    <p><strong><?php echo $CoolText_success; ?> 
	<a href="<?php echo WP_CoolText_ADMIN_URL; ?>"><?php _e('Back to the list', 'cooltext-admin'); ?></a></strong></p>
  </div>
  <?php
}
else if (isset($_REQUEST["done"]) && ($_REQUEST["done"]) && ($CoolText_error_found == FALSE))
{
?>
  <div class="updated fade">
    <p><strong><?php echo "The item was successfully saved." ?> 
	<a href="<?php echo WP_CoolText_ADMIN_URL; ?>"><?php _e('Back to the list', 'cooltext-admin'); ?></a></strong></p>
  </div>
  <?php
}

if (!isset($form['CoolText_selector']))
	$form['CoolText_selector'] = "";
if (!isset($form['CoolText_replacement']))
	$form['CoolText_replacement'] = "";

?>
<div class="form-wrap">
	<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
	<h2>
		<?php _e('CoolText', 'cooltext-admin'); ?>
		&nbsp;&nbsp;&nbsp;
		<a class="add-new-h2" href="javascript:void(0);" onclick="window.open('<?php echo WP_CoolText_PLUGIN_URL; ?>/animations.html')"><?php _e('Open Animations', 'cooltext-admin'); ?></a>
		<a class="add-new-h2" href="javascript:void(0);" onclick="window.open('<?php echo WP_CoolText_PLUGIN_URL; ?>/docs.html')"><?php _e('Open Docs', 'cooltext-admin'); ?></a>
	</h2>
	<form name="CoolText_form" method="post" action="#" onsubmit="return CoolText_submit()"  >
      <h3><?php _e('Edit Behavior', 'cooltext-admin'); ?></h3>
      
		<label for="tag-select-gallery-group"><?php _e('Selector', 'cooltext-admin'); ?></label>
		<input name="CoolText_selector" type="text" style="width:100%" id="CoolText_selector" value="<?php echo htmlentities(stripslashes($form['CoolText_selector'])); ?>" />
		<p><?php _e('Please enter a jQuery selector string', 'cooltext-admin'); ?> (Ex: ".nav-menu a")</p>

		<br>
		
		<label for="tag-select-gallery-group"><?php _e('Behavior', 'cooltext-admin'); ?></label>
		<input name="CoolText_replacement" type="text" style="width:100%" id="CoolText_replacement" value="<?php echo htmlentities(stripslashes($form['CoolText_replacement'])); ?>" />
		<p><?php _e('Please enter a CoolText string', 'cooltext-admin'); ?></p>

		<br>
		
      <input name="CoolText_id" id="CoolText_id" type="hidden" value="">
      <input type="hidden" name="CoolText_form_submit" value="yes"/>
      <p class="submit">
        <input name="publish" lang="publish" class="button add-new-h2" value="<?php _e('Update', 'cooltext-admin'); ?>" type="submit" />
        <input name="publish" lang="publish" class="button add-new-h2" onclick="CoolText_redirect()" value="<?php _e('Back', 'cooltext-admin'); ?>" type="button" />
      </p>
	  <?php wp_nonce_field('CoolText_form_edit'); ?>
    </form>
</div>
<div style="height:5px"></div>
<p class="description">
	<?php _e('Check official website for more information', 'cooltext-admin'); ?>
	<a target="_blank" href="<?php echo WP_COOLTEXT_SITE; ?>"><?php _e('click here', 'cooltext-admin'); ?></a>
</p>
</div>
<script>

function CoolText_redirect()
{
	window.location = "options-general.php?page=cooltext-admin";
}

function CoolText_help()
{
	window.open("<?php echo WP_COOLTEXT_HELP ?>");
}

</script>