<?php
/**
 * Footer for ubuntu-portal
 *
 * @author     Vadim Nevorotin <malamut@ubuntu.ru>
 * @license    GPL 3 (http://www.gnu.org/licenses/gpl.html)
 */

# We need basic portal settings...
if (!defined('PORTAL_DIR')) die();
if (!isset($portal)) {
	require_once(PORTAL_DIR . 'ubuntu-portal.php');
	$portal = new ubuntu_portal($settings['theme_url'].'/portal/');
}
?>
<div id="__site-footer">
	<ul>
		<li><b><a href="https://ubuntu.ir">اوبونتو</a></b></li>
		<li><a href="https://forum.ubuntu.ir/index.php?board=38.0">اخبار</a></li>
		<li><a href="https://www.ubuntu.com/download">دریافت</a></li>
	</ul>
	<ul>
		<li><b><a href="https://forum.ubuntu.ir">انجمن‌های پشتیبانی</a></b></li>
		<li><a href="https://forum.ubuntu.ir/index.php?topic=242.0.html">قوانین انجمن</a></li>
		<li><a href="https://forum.ubuntu.ir/index.php?action=register">ثبت‌نام</a></li>
	</ul>
	<ul>
		<li><b><a href="https://wiki.ubuntu.ir/">ویکی فارسی</a></b></li>
		<li><a href="https://ubuntu.ir/irc">کانال IRC</a></li>
	</ul>
	<p>
		© ۱۳۸۴ - ۱۴۰۲ جامعه فارسی‌زبان اوبونتو<br />
		© ۲۰۲۳ شرکت کنونیکال. اوبونتو و کنونیکال نام‌های تجاری متعلق به Canonical Ltd هستند
	</p>
	<a href="https://ubuntu.ir" title="Ubuntu Persian Speaking Commuity">
		<img src="<?php echo $settings['images_url']?>/footer_logo_ir.png" alt=""/>
	</a>
	<div class="clearer"></div>
</div>
