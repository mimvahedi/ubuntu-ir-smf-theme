<?php
/**
 * Класс, отвечающий за интеграцию всех ресурсов ubuntu.ru.
 * Содержит общие данные и необходимые методы для работы шаблонов
 * отдельных ресурсов.
 *
 * @author   Vadim Nevorotin (malamut@ubuntu.ru)
 * @license  GPL 3 (http://www.gnu.org/licenses/gpl.html)
 */


class ubuntu_portal {
	// Короткое имя текущего ресурса
	var $res;
	// Все данные обо всех ресурсах
	var $data;
	// URL директории со статическими ресурсами (CSS, JS etc)
	var $files_url;
    
	/*
	 * Конструктор. Обязательный аргумент - URL статических ресурсов
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function ubuntu_portal($files_url) {
		// Записываем URL ресурсов в объект
		$this->files_url = $files_url;
		
		/*
		 * Данные по разделам портала - короткое название, описание и ссылка.
		 * Формат - массив вида [ресурс][раздел][параметр].
		 * Возможные параметры: title, desc, url и GA (код Google Analytics). Если url не указан, то он получается путём прибавления
		 * названия раздела к URL основного ресурса, который обязательно должен быть указан для корневого раздела ''
		*/
		// Home Page Section
		$this->data['site'] = array (
			'' => array (
				'title' => 'اوبونتو',
				'desc' => 'صفحه خانه اوبونتو فارسی',
				'url' => 'https://ubuntu.ir/'
			),
			'get' => array (
				'title' => 'دریافت',
				'desc' => 'دریافت اوبونتو در قالب‌های مختلف'
			),
			'news' => array (
				'title' => 'اخبار',
				'desc' => 'جدید اخبار اوبونتو به زبان پارسی'
			),
			'features' => array (
				'title' => 'ویژگی‌ها',
				'desc' => 'لیست ویژگی‌های اوبونتو و چرا باید از این سیستم عامل استفاده کنید.'
			),
			'contact' => array (
				'title' => 'تماس با ما',
				'desc' => 'تماس با گروه راهبران جامعه پارسی زبان اوبونتو'
			)
		);
		//forum section
		$this->data['forum'] = array (
			'' => array (
				'title' => 'انجمن‌های پشتیبانی',
				'desc' => 'انجمن فارسی اوبونتو برای پرسیدن سوال‌هاتون',
				'url' => 'https://forum.ubuntu.ir/',
				'GA' => 'UA-4515300-5'
			),
			'help' => array (
				'title' => 'راهنمای انجمن',
				'desc' => 'راهنمای استفاده از انجمن فارسی اوبونتو',
				'url' => 'https://forum.ubuntu.ir/index.php?action=help'
			),
			'register' => array (
				'title' => 'ثبت نام',
				'desc' => 'ثبت نام در انجمن ابونتو',
				'url' => 'https://forum.ubuntu.ir/index.php?action=register'
			)
		);
		// Данные для ресурса документации
		$this->data['support'] = array (
			'' => array (
				'title' => 'کمک و پشتیبانی',
				'desc' => 'مستندات فارسی اوبونتو',
				'url' => 'https://ubuntu.ir/support'
			),
			'wiki' => array (
				'title' => 'ویکی فارسی',
				'desc' => 'ویکی قابل ویرایش سایت اوبونتو فارسی',
				'url' => 'https://wiki.ubuntu.ir/'
			),
			'manual' => array (
				'title' => 'راهنمای استفاده',
				'desc' => 'راهنمای استفاده از اوبونتو به زبان پارسی',
				'url' => '#'
			),
			'irc' => array (
				'title' => 'کانال IRC',
				'desc' => 'در کانال IRC با ما زنده گفت و گو کنید',
				'url' => 'https://ubuntu.ir/irc'
			)
		);
		// ubuntu ir planet
		$this->data['planet'] = array (
			'' => array (
				'title' => 'سیاره اوبونتو',
				'desc' => 'سیاره فارسی اوبونتو محلی برای جمع‌آوری مطالب مرتبط با اوبونتو',
				'url' => 'https://ubuntu.ir/planet'
			),
			'list' => array (
				'title' => 'لیست بلاگ‌ها',
				'desc' => 'لیست بلاگ‌هایی که در انجمن ثبت شده‌اند'
			),
			'submit' => array (
				'title' => 'ثبت بلاگ',
				'desc' => 'وبلاگ خود را در سیاره پارسی اوبونتو ثبت کنید'
			),
			'feed' => array (
				'title' => 'خوراک سیاره',
				'desc' => 'فید سیاره پارسی اوبونتو'
			)
		);
		
		// Определяем имя текущего ресурса
		// Если движок DokuWiki
		if (defined('DOKU_URL')) {
			if (DOKU_URL == $this->data['help']['']['url'])
				$this->res = 'help';
			if (DOKU_URL == $this->data['planet']['']['url'])
				$this->res = 'team';
			if (DOKU_URL == $this->data['site']['']['url'])
				$this->res = 'site';
		}
		// А может форум?
		if (defined('SMF')) {
			$this->res = 'forum';
		}
	}
	
	/*
	 * Функция возвращает ссылку на указанный раздел указанного ресурса
	 * Если ресурс не задан (пустая строка) - используется текущий
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function getUrl($resource = '', $path = '') {
		// Проверяем, сообщили ли нам ресурс
		if (empty($resource))
			$resource = $this->res;
		// У нас должна быть хотя бы ссылка на главную для ресурса
		if (!isset($this->data[$resource]['']['url']))
			die("OOPS! We've got a big error here!");
		// Если задан какой-нибудь раздел
		if (!empty($path)) {
			// Если у нас явно определён URL для раздела
			if (isset($this->data[$resource][$path]['url'])) {
				return $this->data[$resource][$path]['url'];
			} else {
			// Если URL явно не определён - прибавляем имя раздела к корневому URL ресурса
				return $this->data[$resource]['']['url'].$path;
			}
		} else {
		// Если раздел не задан - возвращаем ссылку на корень ресурса
			return $this->data[$resource]['']['url'];
		}
	}
	
	/*
	 * Функция возвращает подпись для указанного раздела указанного ресурса
	 * Если ресурс не задан (пустая строка) - используется текущий
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function getTitle($resource, $path) {
		// Проверяем, сообщили ли нам ресурс
		if (empty($resource))
			$resource = $this->res;
		// Проверяем, не корневое ли NS нам передали. Нужно для корретной работы с Doku
		if (empty($path))
			$path = '';
		// Ищем заголовок
		if (isset($this->data[$resource][$path]['title']))
			return $this->data[$resource][$path]['title'];
		else
			return '';
	}
	
	/*
	 * Функция возвращает указанное данное для указанного раздела указанного ресурса
	 * Если ресурс не задан (пустая строка) - используется текущий
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function getData($resource, $path, $param) {
		// Проверяем, сообщили ли нам ресурс
		if (empty($resource))
			$resource = $this->res;
		// Проверяем, не корневое ли NS нам передали. Нужно для корретной работы с Doku
		if (empty($path))
			$path = '';
		// Проверяем, есть ли у нас данные
		if (isset($this->data[$resource][$path][$param]))
			return $this->data[$resource][$path][$param];
		else
			return '';
	}
	
	/*
	 * Функция возвращает HTML ссылку на указанный раздел указанного ресурса.
	 * Если задан параметр $class, то его значение записывается в пареметр 'class' тега 'a'.
	 * Также функция пытается определить, не является ли указанный раздел текущим активным, если
	 * ей явно не запрещено это делать установкой червёртого аргумента в false. Если является - к классам
	 * автоматически добавляется класс active.
	 * Если ресурс не задан (пустая строка) - используется текущий
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function getLink($resource = '', $path = '', $class = '', $chk_active = true) {
		// Проверяем, сообщили ли нам ресурс
		if (empty($resource))
			$resource = $this->res;
		// Проверяем, не корневое ли NS нам передали. Нужно для корретной работы с Doku
		if (empty($path))
			$path = '';
		// Получаем ссылку и описание нужного ресурса
		$url = $this->getUrl($resource, $path);
		$title = $this->getTitle($resource, $path);
		$desc = $this->getData($resource, $path, 'desc');
		// Если мы сейчас в Doku и нам нужно проверить, не в текущем ли разделе ссылка
		if (defined('DOKU_URL') and $chk_active and $this->isActiveDokuNS($resource, $path)) {
			if (!empty($class)) {
				$class .= " active";
			} else {
				$class = "active";
			}
		}
		# Возвращаем готовую ссылку
		return "<a href=\"$url\"".(empty($desc) ? "" : " title=\"$desc\"").
					(empty($class) ? "" : " class=\"$class\"").">$title</a>";
	}
	
	/*
	 * Функция определяет, нужно ли показывать меню редактирования внизу страницы Doku
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function isDokuEditbar() {
		global $INFO;
		if (!$this->isActiveDokuNS('help','manual') or $INFO['writable'])
			return true;
		return false;
	}
	
	/*
	 * Вычисляет необходимые нам классы body, которые могут переопределять поведение отдельных элементов
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function getBodyClasses() {
		if (!defined('DOKU_INC')) return "";

		global $ACT;

		$classes = array();
	
		if ($ACT == 'show')
			$classes[] = "act-show";
		if ($ACT == 'search')
			$classes[] = "act-search";
		if ($this->isDokuEditbar())
			$classes[] = "with-editbar";
		if ($this->isActiveRes('team'))
			$classes[] = "dark";
		if ($this->isActiveDokuNS('help','manual') or $this->isActiveDokuNS('help','manual:next'))
			$classes[] = "manual";

		return join(' ', $classes);
	}
	
	/*
	 * Функция проверяет, является ли указанный ресурс текущим просматриваемым.
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function isActiveRes($resource) {
		if ($this->res == $resource)
			return true;
		return false;
	}
	
	/*
	 * Функция проверяет, является ли указанное пространство имён Doku текущим
	 * Если ресурс не задан (пустая строка) - используется текущий
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function isActiveDokuNS($resource, $ns) {
		global $INFO;
		if ((empty($resource) or $this->isActiveRes($resource)) and $ns == $INFO['namespace']) {
			return true;
		}
		return false;
	}
	
	/*
	 * Функция возвращает дополнительные META заголовки (скрипты, CSS etc) для
	 * вставки в начале блока <head>
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function getFirstMetaheaders() {
		// Основная таблица стилей портала ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->files_url ?>ubuntu-portal.css" />
		<?php
	}
	
	/*
	 * Функция возвращает дополнительные META заголовки (скрипты, CSS etc) для
	 * вставки перед закрывающим тегом </head>
	 *
	 * @author Vadim Nevorotin (malamut@ubuntu.ru)
	*/
	function getLastMetaheaders() {	
		# TODO: move not GA scripts to portal.js
		echo <<<HEADERS
		<script type="text/javascript">
			function insch(f) {
				if (f.value=="جست‌وجو ...") f.value="";
			}
			function outsch(f) {
				if (f.value=="") f.value="جست‌وجو ...";
			}
			function togglebar() {
				editbar = document.getElementById('__control');
				sw = document.getElementById('__control_switcher');
				text = document.getElementById('__control_text');
				if (editbar.style.position == 'fixed') {
					editbar.style.position = 'absolute';
					sw.style.bottom = '0px';
					text.innerHTML = 'Показать панель редактирования';
				} else {
					editbar.style.position = 'fixed';
					sw.style.bottom = '40px';
					text.innerHTML = 'Скрыть панель редактирования';
				}
				return false;
			}
		</script>

HEADERS;
	}
}
