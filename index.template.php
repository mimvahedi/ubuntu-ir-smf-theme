<?php

/**
 * Ubuntu Portal theme for Simple Machines Forum (SMF)
 *
 * @author   Vadim Nevorotin <malamut@ubuntu.ru>
 * @author   Sasan Namiranian <sasy360@gmail.com>
 * @author   Moein Alinaghian <nixoeen at nixoeen.com>
 * @author   Mohammad Mahdi Vahedi <mimvhd at pm.me>
 * @license  GPL 3 (http://www.gnu.org/licenses/gpl.html)
 *
 * @version  2.0
 */

/*	This template is, perhaps, the most important template in the theme. It
	contains the main template layer that displays the header and footer of
	the forum, namely with main_above and main_below. It also contains the
	menu sub template, which appropriately displays the menu; the init sub
	template, which is there to set the theme up; (init can be missing.) and
	the linktree sub template, which sorts out the link tree.

	The init sub template should load any data and set any hardcoded options.

	The main_above sub template is what is shown above the main content, and
	should contain anything that should be shown up there.

	The main_below sub template, conversely, is shown after the main content.
	It should probably contain the copyright statement and some other things.

	The linktree sub template should display the link tree, using the data
	in the $context['linktree'] variable.

	The menu sub template should display all the relevant buttons the user
	wants and or needs.

	For more information on the templating system, please see the site at:
	http://www.simplemachines.org/
*/

// Initialize the template... mainly little settings.
function template_init()
{
	global $context, $settings, $options, $txt;
	
	# Common files for all portal resources
	if (!defined('PORTAL_DIR')) {
		define('PORTAL_DIR', $settings['theme_dir'] . '/portal/');
	}
	
	# Load file with common settings and create control object
	require_once(PORTAL_DIR.'ubuntu-portal.php');
	$context['ubuntu-portal'] = new ubuntu_portal( $settings['theme_url'].'/portal/' );

	/* Use images from default theme when using templates from the default theme?
		if this is 'always', images from the default theme will be used.
		if this is 'defaults', images from the default theme will only be used with default templates.
		if this is 'never' or isn't set at all, images from the default theme will not be used. */
	$settings['use_default_images'] = 'never';

	/* What document type definition is being used? (for font size and other issues.)
		'xhtml' for an XHTML 1.0 document type definition.
		'html' for an HTML 4.01 document type definition. */
	$settings['doctype'] = 'html';

	/* The version this template/theme is for.
		This should probably be the version of SMF it was created for. */
	$settings['theme_version'] = '2.0';

	/* Set a setting that tells the theme that it can render the tabs. */
	$settings['use_tabs'] = true;

	/* Use plain buttons - as opposed to text buttons? */
	$settings['use_buttons'] = true;

	/* Show sticky and lock status separate from topic icons? */
	$settings['separate_sticky_lock'] = true;

	/* Does this theme use the strict doctype? */
	$settings['strict_doctype'] = false;

	/* Does this theme use post previews on the message index? */
	$settings['message_index_preview'] = false;

	/* Set the following variable to true if this theme requires the optional theme strings file to be loaded. */
	$settings['require_theme_strings'] = false;
}

// The main sub template above the content.
function template_html_above()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	// Show right to left and the character set for ease of translating.
	echo '<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml"', $context['right_to_left'] ? ' dir="rtl"' : '', '>
<head>';

	# Init portal metaheaders
	$context['ubuntu-portal']->getFirstMetaheaders();	
	echo '
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/portal/', 'ubuntu-portal.css" />';

	// The ?fin part of this link is just here to make sure browsers don't cache it wrongly.
	# We should rename our main CSS to be sure that mods willn't change it
	echo '
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/main', $context['theme_variant'], '.css?fin203" />';
	# Ok, but we also need a default index.css file for modifications CSS
	echo '
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/index', $context['theme_variant'], '.css" />';

	// Some browsers need an extra stylesheet due to bugs/compatibility issues.
	foreach (array('ie7', 'ie6', 'webkit') as $cssfix)
		if ($context['browser']['is_' . $cssfix])
			echo '
	<link rel="stylesheet" type="text/css" href="', $settings['default_theme_url'], '/css/', $cssfix, '.css" />';

	// RTL languages require an additional stylesheet.
	if ($context['right_to_left'])
		echo '
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/rtl.css" />';

	// Here comes the JavaScript bits!
	echo '
	<script type="text/javascript" src="', $settings['default_theme_url'], '/scripts/script.js?fin20"></script>
	<script type="text/javascript" src="', $settings['theme_url'], '/scripts/theme.js?fin20"></script>
	<script type="text/javascript"><!-- // --><![CDATA[
		var smf_theme_url = "', $settings['theme_url'], '";
		var smf_default_theme_url = "', $settings['default_theme_url'], '";
		var smf_images_url = "', $settings['images_url'], '";
		var smf_scripturl = "', $scripturl, '";
		var smf_iso_case_folding = ', $context['server']['iso_case_folding'] ? 'true' : 'false', ';
		var smf_charset = "', $context['character_set'], '";', $context['show_pm_popup'] ? '
		var fPmPopup = function ()
		{
			if (confirm("' . $txt['show_personal_messages'] . '"))
				window.open(smf_prepareScriptUrl(smf_scripturl) + "action=pm");
		}
		addLoadEvent(fPmPopup);' : '', '
		var ajax_notification_text = "', $txt['ajax_in_progress'], '";
		var ajax_notification_cancel_text = "', $txt['modify_cancel'], '";
	// ]]></script>';

	echo '
	<meta http-equiv="Content-Type" content="text/html; charset=', $context['character_set'], '" />
	<meta name="description" content="', $context['page_title_html_safe'], '" />', !empty($context['meta_keywords']) ? '
	<meta name="keywords" content="' . $context['meta_keywords'] . '" />' : '', '
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>', $context['page_title_html_safe'], '</title>';

	// Please don't index these Mr Robot.
	if (!empty($context['robot_no_index']))
		echo '
	<meta name="robots" content="noindex" />';

	// Present a canonical url for search engines to prevent duplicate content in their indices.
	if (!empty($context['canonical_url']))
		echo '
	<link rel="canonical" href="', $context['canonical_url'], '" />';

	// Show all the relative links, such as help, search, contents, and the like.
	echo '
	<link rel="help" href="', $scripturl, '?action=help" />
	<link rel="search" href="', $scripturl, '?action=search" />
	<link rel="contents" href="', $scripturl, '" />';

	// If RSS feeds are enabled, advertise the presence of one.
	if (!empty($modSettings['xmlnews_enable']) && (!empty($modSettings['allow_guestAccess']) || $context['user']['is_logged']))
		echo '
	<link rel="alternate" type="application/rss+xml" title="', $context['forum_name_html_safe'], ' - ', $txt['rss'], '" href="', $scripturl, '?type=rss;action=.xml" />';

	// If we're viewing a topic, these should be the previous and next topics, respectively.
	if (!empty($context['current_topic']))
		echo '
	<link rel="prev" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=prev" />
	<link rel="next" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=next" />';

	// If we're in a board, or a topic for that matter, the index will be the board's index.
	if (!empty($context['current_board']))
		echo '
	<link rel="index" href="', $scripturl, '?board=', $context['current_board'], '.0" />';

	// Output any remaining HTML headers. (from mods, maybe?)
	echo $context['html_headers'];

	# Final portal metaheaders
	$context['ubuntu-portal']->getLastMetaheaders();	

	echo '
</head>
<body>'; ?>
<div id="__container">
<!-- Document -->
<div> <?php
}

/**
 * Top part of page, before main content
*/
function template_body_above()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings; ?>
	
	<!-- Page -->
	<div id="__page">
		<div id="__wrapper"><div>
			<!-- Header -->
			<?php include(PORTAL_DIR.'header.php') ?>
			<!-- /Header -->
			<!-- Main -->
			<div id="__main">
				<div id="__main-title">
					<h1><?php echo $context['forum_name']?></h1>
					<img id="upshrink" src="<?php echo $settings['images_url']?>/upshrink.png" alt="*"
						title="<?php echo $txt['upshrink_description']?>" style="display: none;" />
				</div>

<!-- SMF -->
<div class="smf">	
	<!-- Upper section -->			
	<div id="upper_section" class="middletext"<?php if (!empty($options['collapse_header'])) echo ' style="display: none;"'?>><div><div>
		<div class="user">
		<?php // If the user is logged in, display stuff like their name, new messages, etc.
		if ($context['user']['is_logged']):
			if (!empty($context['user']['avatar'])): ?>
				<?php echo $context['user']['avatar']['image']?>
			<?php endif ?>
			<ul class="reset">
				<li class="normaltext"><?php echo $txt['hello_member_ndt']?> <span><?php echo $context['user']['name']?></span></li>
				<li><a href="<?php echo $scripturl?>?action=unread"><?php echo $txt['unread_since_visit']?></a></li>
				<li><a href="<?php echo $scripturl?>?action=unreadreplies"><?php echo $txt['show_unread_replies']?></a></li>

				<?php // Is the forum in maintenance mode?
				if ($context['in_maintenance'] && $context['user']['is_admin']): ?>
					<li class="notice"><?php echo $txt['maintain_mode_on']?></li>
				<?php endif ?>

				<?php // Are there any members waiting for approval?
				if (!empty($context['unapproved_members'])): ?>
					<li><?php echo $context['unapproved_members'] == 1 ? $txt['approve_thereis'] : $txt['approve_thereare']?> 
						<a href="<?php echo $scripturl?>?action=admin;area=viewmembers;sa=browse;type=approve">
							<?php echo ($context['unapproved_members'] == 1 ? $txt['approve_member'] : $context['unapproved_members']) .
								' ' . $txt['approve_members']?>
						</a> 
						<?php echo $txt['approve_members_waiting']?>
					</li>
				<?php endif ?>

				<?php if (!empty($context['open_mod_reports']) && $context['show_open_reports']): ?>
					<li><a href="<?php echo $scripturl?>?action=moderate;area=reports">
						<?php echo sprintf($txt['mod_reports_waiting'], $context['open_mod_reports'])?></a>
					</li>
				<?php endif ?>
				
				<li class="last"><?php echo $context['current_time']?></li>
			</ul>
		<?php // Otherwise they're a guest - this time ask them to either register or login - lazy bums...
		elseif (!empty($context['show_login_bar'])): ?>
			<script type="text/javascript" src="<?php echo $settings['default_theme_url']?>/scripts/sha1.js"></script>
			<form id="guest_form" action="<?php echo $scripturl?>?action=login2" method="post" accept-charset="<?php echo $context['character_set']?>"
			<?php if (empty($context['disable_login_hashing'])) echo ' onsubmit="hashLoginPassword(this, \'' . $context['session_id'] . '\');"'?>>
				<div class="info"><?php echo $txt['login_or_register']?></div>
				<input type="text" name="user" size="10" class="input_text" />
				<input type="password" name="passwrd" size="10" class="input_password" />
				<select name="cookielength">
					<option value="60"><?php echo $txt['one_hour']?></option>
					<option value="1440"><?php echo $txt['one_day']?></option>
					<option value="10080"><?php echo $txt['one_week']?></option>
					<option value="43200"><?php echo $txt['one_month']?></option>
					<option value="-1" selected="selected"><?php echo $txt['forever']?></option>
				</select>
				<input type="submit" value="<?php echo $txt['login']?>" class="button_submit" /><br />
				<div class="info"><?php echo $txt['quick_login_dec']?></div>
			<?php if (!empty($modSettings['enableOpenID'])): ?>
				<br /><input type="text" name="openid_identifier" id="openid_url" size="25" class="input_text openid_login" />
			<?php endif ?>
				<input type="hidden" name="hash_passwrd" value="" />
				<input type="hidden" name="<?=$context['session_var']?>" value="<?=$context['session_id']?>" />
			</form>
		<?php endif ?>
		</div>
		<div class="news normaltext">
		<?php // Show a random news item? (or you could pick one from news_lines...)
		if (!empty($settings['enable_news'])): ?>
			<p><?php echo $context['random_news_line']?></p>
		<?php endif ?>
		</div>
	</div></div></div>
	<?php // Define the upper_section toggle in JavaScript. ?>
	<script type="text/javascript"><!-- // --><![CDATA[
		var oMainHeaderToggle = new smc_Toggle({
			bToggleEnabled: true,
			bCurrentlyCollapsed: <?php echo empty($options['collapse_header']) ? 'false' : 'true'?>,
			aSwappableContainers: [
				'upper_section'
			],
			aSwapImages: [
				{
					sId: 'upshrink',
					srcExpanded: smf_images_url + '/upshrink.png',
					altExpanded: <?php echo JavaScriptEscape($txt['upshrink_description'])?>,
					srcCollapsed: smf_images_url + '/upshrink2.png',
					altCollapsed: <?php echo JavaScriptEscape($txt['upshrink_description'])?>
				}
			],
			oThemeOptions: {
				bUseThemeSettings: <?php echo $context['user']['is_guest'] ? 'false' : 'true'?>,
				sOptionName: 'collapse_header',
				sSessionVar: <?php echo JavaScriptEscape($context['session_var'])?>,
				sSessionId: <?php echo JavaScriptEscape($context['session_id'])?>
			},
			oCookieOptions: {
				bUseCookie: <?php echo $context['user']['is_guest'] ? 'true' : 'false'?>,
				sCookieName: 'upshrink'
			}
		});
	// ]]></script>
	<!-- /Upper section -->
	
	<?php // The main content should go here. ?>
	<!-- Content -->
	<div id="main_content_section">
	<?php
	// Custom banners and shoutboxes should be placed here, before the linktree.

	// Show the navigation tree.
	theme_linktree();
}

/**
 * Bottom part of page, after main content
*/
function template_body_below()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings; ?>	
	</div>
	<!-- /Content -->
	<!-- Bottom info -->
	<div id="bottom_info" class="smalltext">
		<div id="techlinks">
			<a id="button_xhtml" href="http://validator.w3.org/check/referer" target="_blank" class="new_win"
				title="<?php echo $txt['valid_xhtml']?>"><?php echo $txt['xhtml']?></a>
			<?php if(!empty($modSettings['xmlnews_enable']) && (!empty($modSettings['allow_guestAccess']) || $context['user']['is_logged'])): ?>
				<a id="button_rss" href="<?php echo $scripturl?>?action=.xml;type=rss" class="new_win"><?php echo $txt['rss']?></a>
			<?php endif ?>
			<a id="button_wap2" href="<?php echo $scripturl?>?wap2" class="new_win"><?php echo $txt['wap2']?></a>
		</div>
		<div id="smf_copyright">
			<?php theme_copyright() ?>
		</div>
		<?php if ($context['show_load_time']): ?>
			<p><?php echo $txt['page_created'], $context['load_time'], $txt['seconds_with'], $context['load_queries'], $txt['queries']?></p>
		<?php endif ?>	
	</div>
	<!-- /Bottom info -->
</div>
<!-- /SMF -->	

			</div>
			<!-- /Main -->
			</div></div>
		<!-- Footer -->
		<?php include(PORTAL_DIR.'footer.php') ?>
		<!-- /Footer -->
	</div>
	<div class="no"></div>
	<!-- /Page --> <?php
}

/**
 * Close HTML
*/
function template_html_below()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;
	?>
</div>
<!-- /Document -->
</div>
</body>
</html>	<?php
}

// Show a linktree. This is that thing that shows "My Community | General Category | General Discussion"..
function theme_linktree($force_show = false)
{
	global $context, $settings, $options, $shown_linktree;

	// If linktree is empty, just return - also allow an override.
	if (empty($context['linktree']) || (!empty($context['dont_default_linktree']) && !$force_show))
		return;

	echo '
	<div class="navigate_section">
		<ul>';

	// Each tree item has a URL and name. Some may have extra_before and extra_after.
	foreach ($context['linktree'] as $link_num => $tree)
	{
		echo '
			<li', ($link_num == count($context['linktree']) - 1) ? ' class="last"' : '', '>';

		// Show something before the link?
		if (isset($tree['extra_before']))
			echo $tree['extra_before'];

		// Show the link, including a URL if it should have one.
		echo $settings['linktree_link'] && isset($tree['url']) ? '
				<a href="' . $tree['url'] . '"><span>' . $tree['name'] . '</span></a>' : '<span>' . $tree['name'] . '</span>';

		// Show something after the link...?
		if (isset($tree['extra_after']))
			echo $tree['extra_after'];

		// Don't show a separator for the last one.
		if ($link_num != count($context['linktree']) - 1)
			echo '&nbsp;&#187;';

		echo '
			</li>';
	}
	echo '
		</ul>
	</div>';

	$shown_linktree = true;
}

/**
 * Main forum menu
*/
function template_menu()
{
	global $context, $settings, $options, $scripturl, $txt;
	
	# We don't need Home button, because in fact we has it in portal menu...
	if (isset($context['menu_buttons']['home']))
		unset($context['menu_buttons']['home']); ?>

	<ul id="menu_nav">
	<?php foreach ($context['menu_buttons'] as $act => $button): ?>
		<li id="button_<?php echo $act?>">
			<a class="firstlevel<?php if ($button['active_button'])
							echo ' active';
						  if (isset($button['is_last']))
						  	echo ' last'; ?>" href="<?php echo $button['href']?>"
				<?php if (isset($button['target'])) echo 'target="'.$button['target'].'"'?>>
				<?php echo $button['title']?>
			</a>
		<?php if (!empty($button['sub_buttons'])): ?>
			<div><ul>
			<?php foreach ($button['sub_buttons'] as $childbutton): ?>
				<li>
					<a href="<?php echo $childbutton['href']?>"
						<?php if (isset($childbutton['is_last'])) echo 'class="last"'?>
						<?php if (isset($childbutton['target'])) echo 'target="'.$childbutton['target'].'"'?>>
						<?php echo $childbutton['title'], !empty($childbutton['sub_buttons']) ? '...' : ''?>
					</a>
				<?php // 3rd level menus :)
				if (!empty($childbutton['sub_buttons'])): ?>
					<ul>
					<?php foreach ($childbutton['sub_buttons'] as $grandchildbutton): ?>
						<li>
							<a href="<?php echo $grandchildbutton['href']?>"
								<?php if (isset($grandchildbutton['is_last'])) echo 'class="last"'?>
								<?php if (isset($grandchildbutton['target'])) echo 'target="'.$grandchildbutton['target'].'"'?>>
								<?php echo $grandchildbutton['title']?>
							</a>
						</li>
					<?php endforeach ?>
					</ul>
				<?php endif ?>
				</li>
			<?php endforeach ?>
			</ul></div>
		<?php endif ?>
		</li>
	<?php endforeach ?>
	</ul> <?php
}

// Generate a strip of buttons.
function template_button_strip($button_strip, $direction = 'top', $strip_options = array())
{
	global $settings, $context, $txt, $scripturl;

	if (!is_array($strip_options))
		$strip_options = array();

	// Create the buttons...
	$buttons = array();
	foreach ($button_strip as $key => $value)
	{
		if (!isset($value['test']) || !empty($context[$value['test']]))
			$buttons[] = '<a ' . (isset($value['active']) ? 'class="active" ' : '') . 'href="' . $value['url'] . '" ' . (isset($value['custom']) ? $value['custom'] : '') . '><span>' . $txt[$value['text']] . '</span></a>';
	}

	// No buttons? No button strip either.
	if (empty($buttons))
		return;

	// Make the last one, as easy as possible.
	$buttons[count($buttons) - 1] = str_replace('<span>', '<span class="last">', $buttons[count($buttons) - 1]);

	echo '
		<div class="buttonlist', !empty($direction) ? ' align_' . $direction : '', '"', (empty($buttons) ? ' style="display: none;"' : ''), (!empty($strip_options['id']) ? ' id="' . $strip_options['id'] . '"': ''), '>
			<ul>
				<li>', implode('</li><li>', $buttons), '</li>
			</ul>
		</div>';
}

?>
