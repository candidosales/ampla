/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'mini50\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-newspaper' : '&#xe000;',
			'icon-facebook' : '&#xe001;',
			'icon-twitter' : '&#xe002;',
			'icon-bubbles' : '&#xe003;',
			'icon-clock' : '&#xe004;',
			'icon-phone' : '&#xe006;',
			'icon-location' : '&#xe005;',
			'icon-search' : '&#xe007;',
			'icon-noun_project_1050' : '&#xe008;',
			'icon-noun_project_1022' : '&#xe00b;',
			'icon-noun_project_6704' : '&#xe00d;',
			'icon-noun_project_7230' : '&#xe009;',
			'icon-noun_project_6007' : '&#xe00a;',
			'icon-noun_project_4679' : '&#xe00c;',
			'icon-noun_project_7403' : '&#xe00e;',
			'icon-noun_project_1322' : '&#xe00f;',
			'icon-calendar' : '&#xe010;',
			'icon-user' : '&#xe011;',
			'icon-reply' : '&#xe013;',
			'icon-grid' : '&#xe012;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};