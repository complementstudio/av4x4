<?php

if (isset($_POST['cooltext_submit']) && $_POST['cooltext_submit'] == 'yes')
{
	$did = isset($_GET['did']) ? $_GET['did'] : '0';
	
	$cooltext_success = '';
	$cooltext_success_msg = FALSE;
	
	$sSql = $wpdb->prepare(
		"SELECT COUNT(*) AS `count` FROM ".WP_COOLTEXT_TABLE."
		WHERE `id_cool` = %d",
		array($did)
	);
	$result = '0';
	$result = $wpdb->get_var($sSql);
	
	if ($result != '1')
	{
		?><div class="error fade"><p><strong><?php _e('The selected items don\'t exist', 'cooltext-admin'); ?></strong></p></div><?php
	}
	else
	{
		if (isset($_GET['ac']) && $_GET['ac'] == 'del' && isset($_GET['did']) && $_GET['did'] != '')
		{
			check_admin_referer('CoolText_form_show');
			
			$sSql = $wpdb->prepare("DELETE FROM `".WP_COOLTEXT_TABLE."`
					WHERE `id_cool` = %d
					LIMIT 1", $did);
			$wpdb->query($sSql);
			
			$cooltext_success_msg = TRUE;
			$cooltext_success = __('Item successfully deleted.', 'cooltext-admin');
		}
	}
	
	if ($cooltext_success_msg == TRUE)
	{
		?><div class="updated fade"><p><strong><?php echo $cooltext_success; ?></strong></p></div><?php
	}
}
?>
<div class="wrap">
  <div id="icon-edit" class="icon32 icon32-posts-post"></div>
    <h2>
    	<?php _e('CoolText', 'cooltext-admin'); ?>
      &nbsp;&nbsp;&nbsp;
		<a class="add-new-h2" href="javascript:void(0);" onclick="window.open('<?php echo WP_CoolText_PLUGIN_URL; ?>/animations.html')"><?php _e('Open Animations', 'cooltext-admin'); ?></a>
		<a class="add-new-h2" href="javascript:void(0);" onclick="window.open('<?php echo WP_CoolText_PLUGIN_URL; ?>/docs.html')"><?php _e('Open Docs', 'cooltext-admin'); ?></a>
		</h2>
    <div class="tool-box">
	<?php
		$sSql = "SELECT * FROM `".WP_COOLTEXT_TABLE."` order by id_cool desc";
		$myData = array();
		$myData = $wpdb->get_results($sSql, ARRAY_A);
		?>
		<form name="cooltext_form" method="post">
      <table width="100%" class="widefat" id="straymanage">
        <thead>
          <tr>
				<th scope="col"><strong><?php _e('Selector', 'cooltext-admin'); ?></strong></th>
				<th scope="col"><strong><?php _e('Behavior', 'cooltext-admin'); ?></strong></th>
          </tr>
        </thead>
		<tbody>
			<?php 
			$i = 0;
			if(count($myData) > 0 )
			{
				foreach ($myData as $data)
				{
					$data['selector'] = stripslashes($data['selector']);
					$data['replacement'] = stripslashes($data['replacement']);

					?>
					<tr class="<?php if ($i&1) { echo'alternate'; } else { echo ''; }?>">
						<td>
							<?php echo $data['selector']; ?>
							<div class="row-actions">
							<span class="edit"><a title="Edit" href="<?php echo WP_CoolText_ADMIN_URL; ?>&amp;ac=edit&amp;did=<?php echo $data['id_cool']; ?>"><?php _e('Edit', 'cooltext-admin'); ?></a> | </span>
							<span class="trash"><a onClick="javascript:CoolText_delete('<?php echo $data['id_cool']; ?>')" href="javascript:void(0);"><?php _e('Delete', 'cooltext-admin'); ?></a></span> 
							</div>
						</td>
						<td>
							<?php echo $data['replacement']; ?>
						</td>
					</tr>
					<?php 
					$i = $i+1; 
				} 	
			}
			else
			{
				?><tr><td colspan="6" align="center"><?php _e('No records available.', 'cooltext-admin'); ?></td></tr><?php 
			}
			?>
		</tbody>
        </table>
		<?php wp_nonce_field('CoolText_form_show'); ?>
		<input type="hidden" name="cooltext_submit" value="yes"/>
      </form>	
	  <div class="tablenav">
	  <h2>
	  <a class="button add-new-h2" href="<?php echo WP_CoolText_ADMIN_URL; ?>&amp;ac=add"><?php _e('Add New', 'cooltext-admin'); ?></a>
	  </h2>
	  </div>
	  <div style="height:20px"></div>
		<p class="description">
			<?php _e('Check official website for more information', 'cooltext-admin'); ?>
			<a target="_blank" href="<?php echo WP_COOLTEXT_SITE; ?>"><?php _e('click here', 'cooltext-admin'); ?></a>
		</p>
	</div>
</div>
<script>

function CoolText_delete(id)
{
	if(confirm("Do you want to proceed?"))
	{
		document.cooltext_form.action="options-general.php?page=cooltext-admin&ac=del&did="+id;
		document.cooltext_form.submit();
	}
}

</script>