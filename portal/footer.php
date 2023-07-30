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
<footer class="u-footer">
    <p class="u-footer--go-top">
      <a class="u-footer--go-top--link" href="#">
        <svg class="u-footer--go-top--icon">
          <use xlink:href="#logo-top"></use>
        </svg>
        بازگشت به بالا</a>
    </p>
    <div class="u-footer__row">
      <nav class="u-footer--nav">
        <div class="u-footer--nav--part">
          <h2 class="u-footer--title"><a href="//ubuntu.ir">اوبونتو</a></h2>
          <ul class="u-footer-list">
            <li>
              <a href="//forum.ubuntu.ir/index.php?board=38.0">اخبار</a>
            </li>
            <li><a href="//ubuntu.com/download">دریافت</a></li>
          </ul>
        </div>
        <div class="u-footer--nav--part">
          <h2 class="u-footer--title">
            <a href="//forum.ubuntu.ir">انجمن‌های پشتیبانی</a>
          </h2>
          <ul class="u-footer-list">
            <li>
              <a href="//forum.ubuntu.ir/index.php?topic=242.0">قوانین انجمن</a>
            </li>
            <li>
              <a href="//forum.ubuntu.ir/index.php?action=register">ثبت نام</a>
            </li>
          </ul>
        </div>
        <div class="u-footer--nav--part">
          <h2 class="u-footer--title">
            <a href="//wiki.ubuntu.ir">ویکی فارسی</a>
          </h2>
          <ul class="u-footer-list">
            <li><a href="//ubuntu.ir/irc">کانال IRC</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <hr class="u-footer--divider">
    <div class="u-footer__row">
      <div class="u-footer__row--content">
        <nav>
          <ul class="u-inline-list">
            <li class="u-inline-list--item">
              <a class="u-inline-list--link" href="/">صفحه اصلی</a>
            </li>
            <li class="u-inline-list--item">
              <a class="u-inline-list--link" href="//events.ubuntu.ir/">همایش‌ها</a>
            </li>
            <li class="u-inline-list--item">
              <a class="u-inline-list--link" href="//videos.ubuntu.ir/">ویدیو‌ها</a>
            </li>
            <li class="u-inline-list--item">
              <a class="u-inline-list--link" href="//paste.ubuntu.ir/">‌سرویس Pastebin</a>
            </li>
            <li class="u-inline-list--item">
              <a class="u-inline-list--link" href="//ubuntu.ir/irc.php">کانال IRC</a>
            </li>
          </ul>
        </nav>
        <p class="u-footer--copyright-text">
          © ۲۰۲۲ شرکت کنونیکال. اوبونتو و کنونیکال نام‌های تجاری متعلق به
          Canonical Ltd هستند.
        </p>
      </div>

      <div class="u-footer__row--social">
        <ul class="social-icons">
          <li>
            <a href="https://forum.ubuntu.ir/index.php?action=.xml;type=rss" class="social-icons--link">
              <svg class="social--svg-icon">
                <use xlink:href="#logo-rss"></use>
              </svg>
            </a>
          </li>
          <li>
            <a href="https://persadon.com/UbuntuIranParty" class="social-icons--link">
              <svg class="social--svg-icon">
                <use xlink:href="#logo-mastodon"></use>
              </svg>
            </a>
          </li>
          <li>
            <a href="https://twitter.com/UbuntuIranParty" class="social-icons--link">
              <svg class="social--svg-icon">
                <use xlink:href="#logo-twitter"></use>
              </svg>
            </a>
          </li>
          <li>
            <a href="https://matrix.to/#/#ubuntu-ir:libera.chat" class="social-icons--link">
              <svg class="social--svg-icon">
                <use xlink:href="#logo-matrix"></use>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <svg width="0" height="0" display="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="logo-rss" viewBox="0 0 512 512">
        <path d="M108.56 342.78a60.34 60.34 0 1060.56 60.44 60.63 60.63 0 00-60.56-60.44z"></path>
        <path d="M48 186.67v86.55c52 0 101.94 15.39 138.67 52.11s52 86.56 52 138.67h86.66c0-151.56-125.66-277.33-277.33-277.33z">
        </path>
        <path d="M48 48v86.56c185.25 0 329.22 144.08 329.22 329.44H464C464 234.66 277.67 48 48 48z"></path>
      </symbol>
      <symbol id="logo-mastodon" viewBox="0 0 512 512">
        <title>ماستودون</title>
        <path d="M480 173.59c0-104.13-68.26-134.65-68.26-134.65C377.3 23.15 318.2 16.5 256.8 16h-1.51c-61.4.5-120.46 7.15-154.88 22.94 0 0-68.27 30.52-68.27 134.65 0 23.85-.46 52.35.29 82.59C34.91 358 51.11 458.37 145.32 483.29c43.43 11.49 80.73 13.89 110.76 12.24 54.47-3 85-19.42 85-19.42l-1.79-39.5s-38.93 12.27-82.64 10.77c-43.31-1.48-89-4.67-96-57.81a108.44 108.44 0 01-1-14.9 558.91 558.91 0 0096.39 12.85c32.95 1.51 63.84-1.93 95.22-5.67 60.18-7.18 112.58-44.24 119.16-78.09 10.42-53.34 9.58-130.17 9.58-130.17zm-80.54 134.16h-50V185.38c0-25.8-10.86-38.89-32.58-38.89-24 0-36.06 15.53-36.06 46.24v67h-49.66v-67c0-30.71-12-46.24-36.06-46.24-21.72 0-32.58 13.09-32.58 38.89v122.37h-50V181.67q0-38.65 19.75-61.39c13.6-15.15 31.4-22.92 53.51-22.92 25.58 0 44.95 9.82 57.75 29.48L256 147.69l12.45-20.85c12.81-19.66 32.17-29.48 57.75-29.48 22.11 0 39.91 7.77 53.51 22.92q19.79 22.72 19.75 61.39z">
        </path>
      </symbol>
      <symbol id="logo-twitter" viewBox="0 0 512 512">
        <title>توییتر</title>
        <path d="M496 109.5a201.8 201.8 0 01-56.55 15.3 97.51 97.51 0 0043.33-53.6 197.74 197.74 0 01-62.56 23.5A99.14 99.14 0 00348.31 64c-54.42 0-98.46 43.4-98.46 96.9a93.21 93.21 0 002.54 22.1 280.7 280.7 0 01-203-101.3A95.69 95.69 0 0036 130.4c0 33.6 17.53 63.3 44 80.7A97.5 97.5 0 0135.22 199v1.2c0 47 34 86.1 79 95a100.76 100.76 0 01-25.94 3.4 94.38 94.38 0 01-18.51-1.8c12.51 38.5 48.92 66.5 92.05 67.3A199.59 199.59 0 0139.5 405.6a203 203 0 01-23.5-1.4A278.68 278.68 0 00166.74 448c181.36 0 280.44-147.7 280.44-275.8 0-4.2-.11-8.4-.31-12.5A198.48 198.48 0 00496 109.5z">
        </path>
      </symbol>
      <symbol id="logo-ubuntuir" fill="#fff" height="32" width="126">
        <path d="M100.5 13.8a6.4 6.4 0 1 1 0-12.8 6.4 6.4 0 0 1 0 12.8zm-4-7.2a.8.8 0 1 0 0 1.5.8.8 0 0 0 0-1.5zm5.5 3.5a.8.8 0 1 0 .7 1.3.8.8 0 0 0-.7-1.3zM98 7.4c0-.8.4-1.5 1-1.9l-.6-1c-.6.5-1.1 1.2-1.3 2 .2.2.4.5.4.9 0 .3-.2.6-.4.8.2.8.7 1.5 1.3 2l.6-1c-.6-.4-1-1-1-1.8Zm2.3-2.3c1.2 0 2.1 1 2.2 2h1.1c0-.8-.4-1.6-1-2.1a1 1 0 0 1-1.4-.8 3.4 3.4 0 0 0-2.4.2l.5 1c.3-.2.7-.3 1-.3zm0 4.5c-.3 0-.7 0-1-.2l-.5 1a3.3 3.3 0 0 0 2.4.2c0-.3.2-.6.5-.8a1 1 0 0 1 1 0c.5-.6.9-1.4 1-2.2h-1.2c0 1.1-1 2-2.2 2zm1.6-5c.3.3.8.1 1-.2a.8.8 0 1 0-1 .2zM12.8 24.1a35.7 35.7 0 0 1-6.3.8c-1.2 0-2.2-.1-3-.5a5 5 0 0 1-2-1.5 6 6 0 0 1-1.2-2.3 12 12 0 0 1-.3-3V8.9h2.8V17c0 1.9.3 3.3 1 4 .6 1 1.6 1.3 3 1.3a14 14 0 0 0 3.2-.3V8.8h2.8V24Zm6.9-14.6a7.7 7.7 0 0 1 4-1.1c1.1 0 2.1.2 3 .6 1 .4 1.7 1 2.3 1.7.6.7 1 1.6 1.3 2.6a11.2 11.2 0 0 1 0 6.8 7 7 0 0 1-4.1 4.2c-1 .5-2.1.7-3.3.7a20 20 0 0 1-6-.9V1.5l2.8-.5v8.5zm1.2 12.9h2c1.5 0 2.7-.4 3.6-1.4 1-1 1.4-2.5 1.4-4.3 0-.8-.1-1.6-.3-2.3-.1-.7-.4-1.3-.8-1.8-.3-.6-.8-1-1.4-1.3a5.7 5.7 0 0 0-4.2 0 6 6 0 0 0-1.5.8v10l1.2.3zM46.6 24a35.8 35.8 0 0 1-6.2.8c-1.3 0-2.3-.1-3.1-.5a5 5 0 0 1-2-1.5 6 6 0 0 1-1.1-2.3 12 12 0 0 1-.4-3V8.9h2.9V17c0 1.9.3 3.3.9 4.1.6.8 1.6 1.2 3 1.2a14 14 0 0 0 3.2-.3V8.8h2.8v15.4zm4.1-14.9a36 36 0 0 1 6.3-.8 8 8 0 0 1 3.1.6c.9.3 1.5.8 2 1.5.5.6.9 1.4 1 2.3.3.9.4 1.8.4 3v8.8h-2.8v-8.3l-.2-2.5-.7-1.7c-.3-.4-.7-.7-1.2-.9-.5-.2-1.1-.3-1.9-.3a15.3 15.3 0 0 0-2.7.2l-.5.1v13.4h-2.8ZM70 8.8h6V11h-6v7.4l.2 2c.1.4.3.8.6 1.1.2.3.5.5.9.7l1.3.1a6 6 0 0 0 3-.7l.7 2.4-1.5.5c-.7.2-1.6.3-2.5.3-1 0-2 0-2.6-.4-.7-.2-1.3-.7-1.7-1.2a5 5 0 0 1-1-2l-.2-2.8V4.4l2.8-.5v4.9zM91.5 24a35.8 35.8 0 0 1-6.3.8c-1.2 0-2.3-.1-3-.5A5 5 0 0 1 80 23c-.5-.6-.9-1.4-1.1-2.3-.2-.9-.3-1.9-.3-3V8.9h2.8V17c0 1.9.3 3.3 1 4.1.5.8 1.5 1.2 3 1.2a14 14 0 0 0 3.1-.3V8.8h2.9v15.4z">
        </path>
        <path d="M112.6 24.9H110v-16h2.7zM111.3 6q-.8 0-1.3-.5t-.5-1.3q0-.9.5-1.4.5-.5 1.3-.5.7 0 1.2.5t.5 1.4q0 .8-.5 1.3t-1.2.5zM123 8.6h.8l1 .2.7.1.6.1-.5 2.5-1-.3-2-.1-1.5.1-1 .3v13.4h-2.7V9.6q1-.4 2.4-.7 1.4-.3 3.2-.3z">
        </path>
      </symbol>
      <symbol id="logo-top" viewBox="0 0 400 400">
        <path d="M200.002-.004C89.716-.004 0 89.716 0 199.996c0 110.282 89.72 200.008 200.002 200.008 110.275 0 199.998-89.727 199.998-200.01C400 89.717 310.277-.003 200.002-.003zm61.2 180.423h-36.206v100.358c0 13.808-11.197 24.998-24.998 24.998-13.808 0-25.002-11.19-25.002-24.998v-100.36h-36.21c-5.058 0-9.61-3.044-11.546-7.714-1.937-4.678-.868-10.06 2.716-13.628l61.18-61.186c4.885-4.88 12.8-4.88 17.68 0l60.58 60.583c2.64 2.29 4.31 5.666 4.31 9.444 0 6.903-5.6 12.502-12.504 12.502z" fill="#888"></path>
      </symbol>
      <symbol id="logo-matrix" viewBox="0 0 27.9 32">
        <title>ماتریکس</title>
        <g fill="#fff">
          <path d="M27.005 31.205V.705h-2.19v-.732h3.04v32h-3.04v-.732zM8.135 10.405v1.54h.044a4.486 4.486 0 0 1 1.49-1.37c.58-.323 1.25-.485 1.99-.485.72 0 1.38.14 1.97.42.595.279 1.05.771 1.36 1.48.338-.5.796-.941 1.38-1.32.58-.383 1.27-.574 2.06-.574.602 0 1.16.074 1.67.22.514.148.954.383 1.32.707.366.323.653.746.859 1.27.205.522.308 1.15.308 1.89v7.63h-3.13v-6.46c0-.383-.015-.743-.044-1.08a2.302 2.302 0 0 0-.242-.882 1.47 1.47 0 0 0-.584-.596c-.257-.146-.606-.22-1.05-.22-.44 0-.796.085-1.07.253-.272.17-.485.39-.639.662a2.649 2.649 0 0 0-.308.927 7.075 7.075 0 0 0-.078 1.05v6.35h-3.13v-6.4c0-.338-.007-.673-.021-1a2.826 2.826 0 0 0-.188-.916 1.408 1.408 0 0 0-.55-.673c-.258-.168-.636-.253-1.14-.253a2.334 2.334 0 0 0-.584.1 1.95 1.95 0 0 0-.705.374c-.228.184-.422.449-.584.794-.161.346-.242.798-.242 1.36v6.62h-3.13v-11.4zM.841.737v30.5h2.19v.732h-3.04v-32h3.03v.732z"></path>
        </g>
      </symbol>

    </svg>
  </footer>