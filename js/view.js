/*
 @name			 View.js — A simple, lightweight, jQuery photo viewer for the web
 @category   Lightbox, Image Viewer
 @author     Rogie King <rogie@finegoodsmarket.com>
 @copyright  2011-2011 Rogie King
 @version		 1.01
 @license    By purchasing View.js, you agree to the following: View.js remain property of Rogie King. View.js may be used by the licensee in any personal or commercial projects. View.js may not be resold or  redistributed. For example: packaged in an application where it could be downloaded for free, such as an open-source project or other application where View.js is bundled along with other files.
*/

function View(items, opts) {
	
	var $v, $imgs, $list, $cur, 
		$ = jQuery,
		imgs = [], 
		self = this, 
		$bod = $('body');
	
	$v = $('<div class="viewer"><ul></ul><a href="#" class="close" title="Close this viewer">&times;</a></div>').hide();
	$list = $v.find('ul');
	var opts = $.extend({
		css: {
			'.viewer *, .viewer': {
				margin: 0,
				padding: 0,
				border: 0
			},
			'.viewer': {
				'background-color': '#222',
				filter: 'progid:DXImageTransform.Microsoft.gradient(startColorstr=#D8000000,endColorstr=#D8000000)',
				'background-color': 'rgba(0,0,0,0.85)',
				position: 'fixed',
				right: 0,
				top: 0,
				left: 0,
				bottom: 0,
				display: 'block',
				overflow: 'hidden',
				'z-index': Math.ceil(new Date().getTime() / 10000000),
				height: '100%',
				width: '100%'
			},
			'.viewer li.current + .loading': {
				'background-position': '0 center'
			},
			'.viewer ul': {
				display: 'block',
				height: '100%',
				width: '100%',
				'white-space': 'nowrap'
			},
			'.viewer li': {
				height: '100%',
				width: '0%',
				overflow: 'hidden',
				display: 'none',
				'float': 'left',
				'text-align': 'center',
				position: 'relative'
			},
			'.viewer li.previous, .viewer li.next': {
				cursor: 'pointer',
				display: 'block'
			},
			'.viewer li>div': {
				left: '10px',
				right: '10px',
				bottom: '10px',
				top: '10px',
				display: 'block',
				'text-align': 'center',
				position: 'absolute'
			},
			'.viewer li.has-caption>div': {
				bottom: '5em'
			},
			'.viewer li.loading>div': {
				background: 'url(data:image/gif;base64,R0lGODlhDAAMAPIGAFxcXE5OTlZWVkpKSkZGRkJCQgAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQFHgAGACwAAAAADAAMAAADLmhaIRJFSQHEGFRMQKQhlVFwngIyWqk8lqpgrYs1rvGMXXnapASmPAsm5EHdJAkAIfkEBR4AAQAsBgABAAMABQAAAgaEbwISHAUAIfkEBR4AAQAsBgADAAUAAwAAAgOEj1kAIfkEBR4AAgAsBgAGAAUAAwAAAgYMDmInegUAIfkEBR4AAQAsBgAGAAMABQAAAgOEj1kAIfkEBR4AAgAsAwAGAAMABQAAAgaUchDAzQUAIfkEBR4AAQAsAQAGAAUAAwAAAgOEj1kAIfkEBR4AAgAsAQADAAUAAwAAAgYEImKnGwUAIfkEBR4AAQAsAwABAAMABQAAAgOEj1kAOw%3D%3D) center center no-repeat'
			},
			'.viewer li.loading.next>div': {
				'background-position': '0 center'
			},
			'.viewer li.loading.previous>div': {
				'background-position': 'right center'
			},
			'.viewer .close': {
				color: '#fff',
				'text-decoration': 'none',
				'font-weight': 'bold',
				'font-size': '20px',
				position: 'absolute',
				right: '15px',
				top: '15px',
				cursor: 'pointer',
				display: 'block',
				opacity: 0.6
			},
			'.viewer .close:hover': {
				opacity: 1
			},
			'.viewer img': {
				'max-width': '100%',
				'max-height': '100%',
				cursor: 'pointer',
				position: 'relative',
				height: 'auto',
				width: 'auto',
				'vertical-align': 'middle',
				'-ms-interpolation-mode': 'bicubic'
			},
			'.viewer .caption': {
				'color': '#aaa',
				'text-shadow': '0 1px 2px rgba(0,0,0,0.8)',
				'line-height': '5em',
				'position': 'absolute',
				'bottom': '0',
				'left': '0',
				'right': '0',
				'visibility': 'hidden'
			},
			'.viewer li.current .caption': {
				'visibility': 'visible'
			},
			'.viewer li.previous': {
				width: '10%'
			},
			'.viewer li.current': {
				width: '80%',
				display: 'block'
			},
			'.viewer li.first.current': {
				'margin-left': '10%'
			},
			'.viewer li.last.current': {
				'margin-right': '10%'
			},
			'.viewer li.next': {
				width: '10%'
			},
			'.viewer li.previous>div': {
				left: '-50%',
				right: '50%'
			},
			'.viewer li.next>div': {
				right: '-50%',
				left: '50%'
			},
			'.viewer .next img, .viewer .previous img, .viewer .current img': {
				'-webkit-transform': 'translateZ(0)'
			}
		},
		keys: {
			close: [27],
			prev: [37, 188],
			next: [39, 190]
		},
		loadAhead: 2,
		validateUrls: true
	}, opts );
	
	this.next = function () {
		this.show($cur.next().find('img'));
	};
	this.prev = function () {
		this.show($cur.prev().find('img'));
	};
	this.close = function () {
		$v.hide();
		$(document).unbind('keyup.view');
		$bod.css({
			'overflow': $bod.data('viewer-overflow')
		});
	};
	this.open = function () {
		$v.show();
		$(document).bind('keyup.view', key);
		$bod.data('viewer-overflow', $bod.css('overflow')).css({
			'overflow': 'hidden'
		});
		this.sync();
	};
	this.show = function ($img) {
		if (typeof $img == 'string') {
			$img = getImgForUrl($img);
		}
		if ($img.constructor == $ && $img.length > 0) {
			$v.find('li').removeClass('current next previous').removeAttr('title');
			$cur = $parent = $img.parents('li').addClass('current');
			$cur.next().addClass('next').attr('title', 'Next');
			$cur.prev().addClass('previous').attr('title', 'Previous');
			this.sync();
			lazyLoad($cur, opts.loadAhead);
		}
	};
	this.sync = function () {
		var containerHeight = $list.find('li.current>div').height();
		var lineHeight = containerHeight + 'px';
		
		$list.find('li>div>span').each(

		function () {
			$(this).css({
				'line-height': lineHeight
			});
		});
		if (self._ie7) {
			$imgs.css({
				'max-height': lineHeight
			});
			$imgs.each(

			function () {
				var $i = $(this);
				$i.css({
					top: ((containerHeight - $i.height()) / 2 + 'px')
				});
			});
		}
	};
	this.next = function () {
		self.show($cur.next().find('img'));
	};
	this.prev = function () {
		self.show($cur.prev().find('img'));
	};

	function getImgForUrl(src) {
		var search = '[src="' + src + '"],[data-src="' + src + '"]';
		return $i = $imgs.find(search).add(
		$imgs.filter(search)).eq(0);
	};

	function key(e) {
		$.each(
		opts.keys, function (cmd, keys) {
			for (var k = 0; k < keys.length; ++k) {
				if (e.keyCode == keys[k]) {
					self[cmd]();
				}
			}
		});
	};

	function click(e) {
		e.preventDefault();
		$t = $(e.target);
		if ($t.is('img')) {
			if ($t.parents('li').is('.current')) {
				self.next();
			} else {
				self.show($t);
			}
		} else if ($t.is('li>div,li')) {
			if ($t.parents('li').is('.next') || $t.is('.next')) {
				self.next();
			} else if ($t.parents('li').is('.previous') || $t.is('.previous')) {
				self.prev();
			} else {
				self.close();
			}
		} else {
			self.close();
		}
	};

	function cssify() {
		
		var $s = $('<style />');
		$('head').prepend($s);
		var s = document.styleSheets[0];
		for (sel in opts.css) {
			var decs = '';
			for (name in opts.css[sel]) {
				decs += name + ':' + opts.css[sel][name] + ';';
			}
			var selectors = sel.split(",");
			for (var i = 0, sel; sel = selectors[i]; ++i) {
				if (s.insertRule) {
					s.insertRule((sel + '{' + decs + '}'), s.cssRules.length);
				} else {
					s.addRule(sel, decs);
				}
			}
		}
	};

	function lazyLoad($pos, loadAhead) {
		load($pos.find('img'));
		$pos.nextAll().slice(0, loadAhead).add($pos.prevAll().slice(0, loadAhead)).find('img').each(

		function (i, img) {
			load(img);
		});
	};

	function load(img) {
		if (!img.src) {
			$(img).attr('src', $(img).attr('data-src'));
		}
	};

	function build() {
		if ($.isArray(imgs)) {
			for (var i = 0, img; img = imgs[i]; ++i) {
				var s = null;
				var $li = $('<li class="loading"/>');
				if (typeof img == 'object' && img.src) {
					s = img.src;
				} else if (typeof img == 'string') {
					s = img;
				}
				var image = new Image();
				image.onload = function () {
					self.sync();
					$(this).css({
						visibility: 'visible'
					}).parents('li').removeClass('loading');
				};
				$(image).css({
					visibility: 'hidden'
				});
				$(image).attr('data-src', s);
				if (img.caption) {
					$li.addClass('has-caption').append(
					$('<span class="caption" />').text(img.caption));
				}
				if (i == 0) {
					$li.addClass('first');
				}
				if (i == (imgs.length - 1)) {
					$li.addClass('last');
				}
				$list.append(
				$li.append(
				$('<div/>').append(
				$('<span/>').append(
				image))));
			}
		}
	};

	function imageLinkClick(e) {
		e.preventDefault();
		self.show(this.href);
		self.open();
	};

	function isImageUrl(url) {
		return /\.(jpeg|jpg|gif|png)(\?|#)?(.*)?$/i.test(url);
	};

	function process() {
		
		if ( typeof items == 'object' && items.jquery ) {
			items.find('a[href]').add(items.filter('a[href]')).each(

			function () {
				if (isImageUrl(this.href) || !opts.validateUrls ) {
					imgs.push({
						src: this.href,
						caption: this.title
					});
				}
				$(this).unbind('click.view').bind('click.view', imageLinkClick);
			});
		} else if ($.isArray(items)) {
			imgs = items;
		}
	};

	function bind() {
		$v.unbind('click.view').bind('click.view', click);
	};

	function init() {
		process();
		build();
		$imgs = $v.find('img');
		$('body').append($v);
		if (!View._cssified) {
			cssify();
		}
		
		View._cssified = true;
		bind();
		self.sync();
		self.close();
		self.show($imgs.eq(0));
		self._ie7 = navigator.userAgent.indexOf('MSIE 7') > -1;
		$(window).resize(function () {
			self.sync();
		});
	};
	init();
};

View._version = '1.01';

(function () {
	
	var $ = jQuery, s = document.getElementsByTagName('script');
	if (s[s.length - 1].src.indexOf('?auto') > -1 || true) {
		$().ready(function () {
			var $a = $('a.view[href]');
			var sets = {};
			
			$a.each(function () {
				var r = this.rel;
				if( r ){
					if (!sets[r]) {
						sets[r] = [];
					}
					sets[r].push(this);
				}else{
					new View($(this));
				}
			});
			for (var i in sets) {
				new View($(sets[i]));
			}
		});
	};
})();