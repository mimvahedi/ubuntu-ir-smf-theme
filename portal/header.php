<?php
/**
 * Header for ubuntu-portal
 *
 * @author     Vadim Nevorotin <malamut@ubuntu.ru>
 * @license    GPL 3 (http://www.gnu.org/licenses/gpl.html)
 */

# We need basic portal settings...
if (!defined('PORTAL_DIR')) die();
if (!isset($portal)) {
	require_once(PORTAL_DIR.'ubuntu-portal.php');
	$portal = new ubuntu_portal($settings['theme_url'].'/portal/');
}
?>
<div style="z-index: 100; position: fixed; color: #fff; background: #000; box-shadow: 0 0 0 999px #000; clip-path: inset(0 -100%); inset: 0 auto auto 0; transform-origin: 100% 0; transform: translate(-29.3%) rotate(-45deg); font-size: 16px; line-height: normal;"><a href="https://fa.wikipedia.org/wiki/%D9%85%D9%87%D8%B3%D8%A7_%D8%A7%D9%85%DB%8C%D9%86%DB%8C" style="color: #fff; text-decoration: none;" target="_blank">مهسا امینی</a></div>
<div id="__header">
	<div id="__header-menu">
		<ul>
			<li>
				<?php echo $portal->getLink('site') ?>
			</li>
			<li>
				<?php if ($portal->isActiveRes('forum')):
					echo $portal->getLink('forum', '', 'active', false); ?>
					<div class="header-submenu">
						<div>
							<?php
							// Main SMF menu
							template_menu() ?>
							<div class="clearer"></div>
						</div>
					</div>
				<?php else:
					echo $portal->getLink('forum', '', '', false);
				endif ?>
			</li>
			<?php /*
			<li>
				<?php if ($portal->isActiveRes('support')):
					echo $portal->getLink('support', '', 'active', false); ?>
					<div class="header-submenu">
						<div>
							<ul>
								<li><?php echo $portal->getLink('support', 'wiki') ?></li>
								<li><?php echo $portal->getLink('support', 'manual') ?></li>
								<li><?php echo $portal->getLink('support', 'wiki:Ñ€ÑƒÐºÐ¾Ð²Ð¾Ð´ÑÑ‚Ð²Ð°') ?></li>
								<li><?php echo $portal->getLink('support', 'fullcircle') ?></li>
								<li><?php echo $portal->getLink('support', 'ÑÐ¾Ð²Ð¼ÐµÑÑ‚Ð¸Ð¼Ð¾ÑÑ‚ÑŒ') ?></li>
								<li><?php echo $portal->getLink('support', 'terms') ?></li>
								<li><?php tpl_actionlink('login') ?></li>
							</ul>
							<div class="clearer"></div>
						</div>
					</div>
				<?php else:
					echo $portal->getLink('support', '', '', false);
				endif ?>
			</li>
			*/ ?>
			<li>
				<a href="https://wiki.ubuntu.ir/">ویکی فارسی</a>
			</li>
			<li>
				<a href="https://videos.ubuntu.ir/">ویدیوها</a>
			</li>
			<li>
				<a href="https://events.ubuntu.ir/">همایش‌ها</a>
			</li>
			<li>
				<a href="https://ubuntu.ir/irc">کانال IRC</a>
			</li>
			<li>
				<a href="https://paste.ubuntu.ir/">سرویس Pastebin</a>
			</li>
		</ul>
		<div id="__header-logo">
			<a href="https://ubuntu.ir" title="Ù„ÙˆÚ¯Ùˆ Ø§ÙˆØ¨ÙˆÙ†ØªÙˆ ÙØ§Ø±Ø³ÛŒ" style="padding-left: 35px">
				<img src="<?php echo $settings['images_url']?>/logo_ir.png" alt=""/>
			</a>
		</div>
	</div>
	<div id="__search-box">
			<form method="get" action="https://forum.ubuntu.ir/search.php" target="_blank">
			<div class="search__wrapper">
				<input type="text" name="q" id="search__input" placeholder="جستجو ..." size="20" maxlength="200" onfocus="insch(this)" onblur="outsch(this)" />
				<input type="submit" name="sitesearch" id="search__submit" />
			</div>
			</form>
		<?php
		// DokuWiki searh form
		//if (defined('DOKU_URL')):
		//	tpl_searchform();
		// Google search form
		//else: 
		/*
			<form method="get" action="http://www.google.com/search" target="_blank"><div>
				<input type="text" name="q" id="search__input" value="جستجو ..." size="20" maxlength="200" onfocus="insch(this)" onblur="outsch(this)" title="Ú©Ù„Ù…Ù‡ Ù…ÙˆØ±Ø¯ Ù†Ø¸Ø± Ø±Ùˆ ÙˆØ§Ø±Ø¯ Ùˆ Ø§ÛŒÙ†ØªØ± Ø¨Ø²Ù†ÛŒØ¯"/>
				<input type="submit" name="sitesearch" id="search__submit" value="forum.ubuntu.ir"/>
				<input type="hidden" name="hl" value="fa"/>
			</div></form>

			<form method="get" action="https://forum.ubuntu.ir/search.php" target="_blank"><div>
				<input type="text" name="q" id="search__input" placeholder="جستجو ..." size="20" maxlength="200" onfocus="insch(this)" onblur="outsch(this)"�/>
				<input type="submit" id="search__submit" />
			</div></form>
		*/
		?>
	</div>
</div>
