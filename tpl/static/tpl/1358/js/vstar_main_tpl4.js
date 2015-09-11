var requirejs, require, define;
(function(e) {
	function c(e, t) {
		return f.call(e, t)
	}

	function h(e, t) {
		var n, r, i, s, o, a, f, l, c, h, p = t && t.split("/"),
			d = u.map,
			v = d && d["*"] || {};
		if (e && e.charAt(0) === ".")
			if (t) {
				p = p.slice(0, p.length - 1), e = p.concat(e.split("/"));
				for (l = 0; l < e.length; l += 1) {
					h = e[l];
					if (h === ".") e.splice(l, 1), l -= 1;
					else if (h === "..") {
						if (l === 1 && (e[2] === ".." || e[0] === "..")) break;
						l > 0 && (e.splice(l - 1, 2), l -= 2)
					}
				}
				e = e.join("/")
			} else e.indexOf("./") === 0 && (e = e.substring(2));
		if ((p || v) && d) {
			n = e.split("/");
			for (l = n.length; l > 0; l -= 1) {
				r = n.slice(0, l).join("/");
				if (p)
					for (c = p.length; c > 0; c -= 1) {
						i = d[p.slice(0, c).join("/")];
						if (i) {
							i = i[r];
							if (i) {
								s = i, o = l;
								break
							}
						}
					}
				if (s) break;
				!a && v && v[r] && (a = v[r], f = l)
			}!s && a && (s = a, o = f), s && (n.splice(0, o, s), e = n.join("/"))
		}
		return e
	}

	function p(t, r) {
		return function() {
			return n.apply(e, l.call(arguments, 0).concat([t, r]))
		}
	}

	function d(e) {
		return function(t) {
			return h(t, e)
		}
	}

	function v(e) {
		return function(t) {
			s[e] = t
		}
	}

	function m(n) {
		if (c(o, n)) {
			var r = o[n];
			delete o[n], a[n] = !0, t.apply(e, r)
		}
		if (!c(s, n) && !c(a, n)) throw new Error("No " + n);
		return s[n]
	}

	function g(e) {
		var t, n = e ? e.indexOf("!") : -1;
		return n > -1 && (t = e.substring(0, n), e = e.substring(n + 1, e.length)), [t, e]
	}

	function y(e) {
		return function() {
			return u && u.config && u.config[e] || {}
		}
	}
	var t, n, r, i, s = {},
		o = {},
		u = {},
		a = {},
		f = Object.prototype.hasOwnProperty,
		l = [].slice;
	r = function(e, t) {
		var n, r = g(e),
			i = r[0];
		return e = r[1], i && (i = h(i, t), n = m(i)), i ? n && n.normalize ? e = n.normalize(e, d(t)) : e = h(e, t) : (e = h(e, t), r = g(e), i = r[0], e = r[1], i && (n = m(i))), {
			f: i ? i + "!" + e : e,
			n: e,
			pr: i,
			p: n
		}
	}, i = {
		require: function(e) {
			return p(e)
		},
		exports: function(e) {
			var t = s[e];
			return typeof t != "undefined" ? t : s[e] = {}
		},
		module: function(e) {
			return {
				id: e,
				uri: "",
				exports: s[e],
				config: y(e)
			}
		}
	}, t = function(t, n, u, f) {
		var l, h, d, g, y, b = [],
			w;
		f = f || t;
		if (typeof u == "function") {
			n = !n.length && u.length ? ["require", "exports", "module"] : n;
			for (y = 0; y < n.length; y += 1) {
				g = r(n[y], f), h = g.f;
				if (h === "require") b[y] = i.require(t);
				else if (h === "exports") b[y] = i.exports(t), w = !0;
				else if (h === "module") l = b[y] = i.module(t);
				else if (c(s, h) || c(o, h) || c(a, h)) b[y] = m(h);
				else {
					if (!g.p) throw new Error(t + " missing " + h);
					g.p.load(g.n, p(f, !0), v(h), {}), b[y] = s[h]
				}
			}
			d = u.apply(s[t], b);
			if (t)
				if (l && l.exports !== e && l.exports !== s[t]) s[t] = l.exports;
				else if (d !== e || !w) s[t] = d
		} else t && (s[t] = u)
	}, requirejs = require = n = function(s, o, a, f, l) {
		return typeof s == "string" ? i[s] ? i[s](o) : m(r(s, o).f) : (s.splice || (u = s, o.splice ? (s = o, o = a, a = null) : s = e), o = o || function() {}, typeof a == "function" && (a = f, f = l), f ? t(e, s, o, a) : setTimeout(function() {
			t(e, s, o, a)
		}, 4), n)
	}, n.config = function(e) {
		return u = e, u.deps && n(u.deps, u.callback), n
	}, requirejs._defined = s, define = function(e, t, n) {
		t.splice || (n = t, t = []), !c(s, e) && !c(o, e) && (o[e] = [e, t, n])
	}, define.amd = {
		jQuery: !0
	}
})(), define("../vendor/almond/almond", function() {});
var Zepto = function() {
	function M(e) {
		return e == null ? String(e) : x[T.call(e)] || "object"
	}

	function _(e) {
		return M(e) == "function"
	}

	function D(e) {
		return e != null && e == e.window
	}

	function P(e) {
		return e != null && e.nodeType == e.DOCUMENT_NODE
	}

	function H(e) {
		return M(e) == "object"
	}

	function B(e) {
		return H(e) && !D(e) && Object.getPrototypeOf(e) == Object.prototype
	}

	function j(e) {
		return typeof e.length == "number"
	}

	function F(e) {
		return o.call(e, function(e) {
			return e != null
		})
	}

	function I(e) {
		return e.length > 0 ? n.fn.concat.apply([], e) : e
	}

	function q(e) {
		return e.replace(/::/g, "/").replace(/([A-Z]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").replace(/_/g, "-").toLowerCase()
	}

	function R(e) {
		return e in f ? f[e] : f[e] = new RegExp("(^|\\s)" + e + "(\\s|$)")
	}

	function U(e, t) {
		return typeof t == "number" && !l[q(e)] ? t + "px" : t
	}

	function z(e) {
		var t, n;
		return a[e] || (t = u.createElement(e), u.body.appendChild(t), n = getComputedStyle(t, "").getPropertyValue("display"), t.parentNode.removeChild(t), n == "none" && (n = "block"), a[e] = n), a[e]
	}

	function W(e) {
		return "children" in e ? s.call(e.children) : n.map(e.childNodes, function(e) {
			if (e.nodeType == 1) return e
		})
	}

	function X(n, r, i) {
		for (t in r) i && (B(r[t]) || O(r[t])) ? (B(r[t]) && !B(n[t]) && (n[t] = {}), O(r[t]) && !O(n[t]) && (n[t] = []), X(n[t], r[t], i)) : r[t] !== e && (n[t] = r[t])
	}

	function V(e, t) {
		return t == null ? n(e) : n(e).filter(t)
	}

	function $(e, t, n, r) {
		return _(t) ? t.call(e, n, r) : t
	}

	function J(e, t, n) {
		n == null ? e.removeAttribute(t) : e.setAttribute(t, n)
	}

	function K(t, n) {
		var r = t.className,
			i = r && r.baseVal !== e;
		if (n === e) return i ? r.baseVal : r;
		i ? r.baseVal = n : t.className = n
	}

	function Q(e) {
		var t;
		try {
			return e ? e == "true" || (e == "false" ? !1 : e == "null" ? null : !/^0/.test(e) && !isNaN(t = Number(e)) ? t : /^[\[\{]/.test(e) ? n.parseJSON(e) : e) : e
		} catch (r) {
			return e
		}
	}

	function G(e, t) {
		t(e);
		for (var n in e.childNodes) G(e.childNodes[n], t)
	}
	var e, t, n, r, i = [],
		s = i.slice,
		o = i.filter,
		u = window.document,
		a = {},
		f = {},
		l = {
			"column-count": 1,
			columns: 1,
			"font-weight": 1,
			"line-height": 1,
			opacity: 1,
			"z-index": 1,
			zoom: 1
		},
		c = /^\s*<(\w+|!)[^>]*>/,
		h = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
		p = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,
		d = /^(?:body|html)$/i,
		v = /([A-Z])/g,
		m = ["val", "css", "html", "text", "data", "width", "height", "offset"],
		g = ["after", "prepend", "before", "append"],
		y = u.createElement("table"),
		b = u.createElement("tr"),
		w = {
			tr: u.createElement("tbody"),
			tbody: y,
			thead: y,
			tfoot: y,
			td: b,
			th: b,
			"*": u.createElement("div")
		},
		E = /complete|loaded|interactive/,
		S = /^[\w-]*$/,
		x = {},
		T = x.toString,
		N = {},
		C, k, L = u.createElement("div"),
		A = {
			tabindex: "tabIndex",
			readonly: "readOnly",
			"for": "htmlFor",
			"class": "className",
			maxlength: "maxLength",
			cellspacing: "cellSpacing",
			cellpadding: "cellPadding",
			rowspan: "rowSpan",
			colspan: "colSpan",
			usemap: "useMap",
			frameborder: "frameBorder",
			contenteditable: "contentEditable"
		},
		O = Array.isArray || function(e) {
			return e instanceof Array
		};
	return N.matches = function(e, t) {
		if (!t || !e || e.nodeType !== 1) return !1;
		var n = e.webkitMatchesSelector || e.mozMatchesSelector || e.oMatchesSelector || e.matchesSelector;
		if (n) return n.call(e, t);
		var r, i = e.parentNode,
			s = !i;
		return s && (i = L).appendChild(e), r = ~N.qsa(i, t).indexOf(e), s && L.removeChild(e), r
	}, C = function(e) {
		return e.replace(/-+(.)?/g, function(e, t) {
			return t ? t.toUpperCase() : ""
		})
	}, k = function(e) {
		return o.call(e, function(t, n) {
			return e.indexOf(t) == n
		})
	}, N.fragment = function(t, r, i) {
		var o, a, f;
		return h.test(t) && (o = n(u.createElement(RegExp.$1))), o || (t.replace && (t = t.replace(p, "<$1></$2>")), r === e && (r = c.test(t) && RegExp.$1), r in w || (r = "*"), f = w[r], f.innerHTML = "" + t, o = n.each(s.call(f.childNodes), function() {
			f.removeChild(this)
		})), B(i) && (a = n(o), n.each(i, function(e, t) {
			m.indexOf(e) > -1 ? a[e](t) : a.attr(e, t)
		})), o
	}, N.Z = function(e, t) {
		return e = e || [], e.__proto__ = n.fn, e.selector = t || "", e
	}, N.isZ = function(e) {
		return e instanceof N.Z
	}, N.init = function(t, r) {
		var i;
		if (!t) return N.Z();
		if (typeof t == "string") {
			t = t.trim();
			if (t[0] == "<" && c.test(t)) i = N.fragment(t, RegExp.$1, r), t = null;
			else {
				if (r !== e) return n(r).find(t);
				i = N.qsa(u, t)
			}
		} else {
			if (_(t)) return n(u).ready(t);
			if (N.isZ(t)) return t;
			if (O(t)) i = F(t);
			else if (H(t)) i = [t], t = null;
			else if (c.test(t)) i = N.fragment(t.trim(), RegExp.$1, r), t = null;
			else {
				if (r !== e) return n(r).find(t);
				i = N.qsa(u, t)
			}
		}
		return N.Z(i, t)
	}, n = function(e, t) {
		return N.init(e, t)
	}, n.extend = function(e) {
		var t, n = s.call(arguments, 1);
		return typeof e == "boolean" && (t = e, e = n.shift()), n.forEach(function(n) {
			X(e, n, t)
		}), e
	}, N.qsa = function(e, t) {
		var n, r = t[0] == "#",
			i = !r && t[0] == ".",
			o = r || i ? t.slice(1) : t,
			u = S.test(o);
		return P(e) && u && r ? (n = e.getElementById(o)) ? [n] : [] : e.nodeType !== 1 && e.nodeType !== 9 ? [] : s.call(u && !r ? i ? e.getElementsByClassName(o) : e.getElementsByTagName(t) : e.querySelectorAll(t))
	}, n.contains = function(e, t) {
		return e !== t && e.contains(t)
	}, n.type = M, n.isFunction = _, n.isWindow = D, n.isArray = O, n.isPlainObject = B, n.isEmptyObject = function(e) {
		var t;
		for (t in e) return !1;
		return !0
	}, n.inArray = function(e, t, n) {
		return i.indexOf.call(t, e, n)
	}, n.camelCase = C, n.trim = function(e) {
		return e == null ? "" : String.prototype.trim.call(e)
	}, n.uuid = 0, n.support = {}, n.expr = {}, n.map = function(e, t) {
		var n, r = [],
			i, s;
		if (j(e))
			for (i = 0; i < e.length; i++) n = t(e[i], i), n != null && r.push(n);
		else
			for (s in e) n = t(e[s], s), n != null && r.push(n);
		return I(r)
	}, n.each = function(e, t) {
		var n, r;
		if (j(e)) {
			for (n = 0; n < e.length; n++)
				if (t.call(e[n], n, e[n]) === !1) return e
		} else
			for (r in e)
				if (t.call(e[r], r, e[r]) === !1) return e;
		return e
	}, n.grep = function(e, t) {
		return o.call(e, t)
	}, window.JSON && (n.parseJSON = JSON.parse), n.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
		x["[object " + t + "]"] = t.toLowerCase()
	}), n.fn = {
		forEach: i.forEach,
		reduce: i.reduce,
		push: i.push,
		sort: i.sort,
		indexOf: i.indexOf,
		concat: i.concat,
		map: function(e) {
			return n(n.map(this, function(t, n) {
				return e.call(t, n, t)
			}))
		},
		slice: function() {
			return n(s.apply(this, arguments))
		},
		ready: function(e) {
			return E.test(u.readyState) && u.body ? e(n) : u.addEventListener("DOMContentLoaded", function() {
				e(n)
			}, !1), this
		},
		get: function(t) {
			return t === e ? s.call(this) : this[t >= 0 ? t : t + this.length]
		},
		toArray: function() {
			return this.get()
		},
		size: function() {
			return this.length
		},
		remove: function() {
			return this.each(function() {
				this.parentNode != null && this.parentNode.removeChild(this)
			})
		},
		each: function(e) {
			return i.every.call(this, function(t, n) {
				return e.call(t, n, t) !== !1
			}), this
		},
		filter: function(e) {
			return _(e) ? this.not(this.not(e)) : n(o.call(this, function(t) {
				return N.matches(t, e)
			}))
		},
		add: function(e, t) {
			return n(k(this.concat(n(e, t))))
		},
		is: function(e) {
			return this.length > 0 && N.matches(this[0], e)
		},
		not: function(t) {
			var r = [];
			if (_(t) && t.call !== e) this.each(function(e) {
				t.call(this, e) || r.push(this)
			});
			else {
				var i = typeof t == "string" ? this.filter(t) : j(t) && _(t.item) ? s.call(t) : n(t);
				this.forEach(function(e) {
					i.indexOf(e) < 0 && r.push(e)
				})
			}
			return n(r)
		},
		has: function(e) {
			return this.filter(function() {
				return H(e) ? n.contains(this, e) : n(this).find(e).size()
			})
		},
		eq: function(e) {
			return e === -1 ? this.slice(e) : this.slice(e, +e + 1)
		},
		first: function() {
			var e = this[0];
			return e && !H(e) ? e : n(e)
		},
		last: function() {
			var e = this[this.length - 1];
			return e && !H(e) ? e : n(e)
		},
		find: function(e) {
			var t, r = this;
			return typeof e == "object" ? t = n(e).filter(function() {
				var e = this;
				return i.some.call(r, function(t) {
					return n.contains(t, e)
				})
			}) : this.length == 1 ? t = n(N.qsa(this[0], e)) : t = this.map(function() {
				return N.qsa(this, e)
			}), t
		},
		closest: function(e, t) {
			var r = this[0],
				i = !1;
			typeof e == "object" && (i = n(e));
			while (r && !(i ? i.indexOf(r) >= 0 : N.matches(r, e))) r = r !== t && !P(r) && r.parentNode;
			return n(r)
		},
		parents: function(e) {
			var t = [],
				r = this;
			while (r.length > 0) r = n.map(r, function(e) {
				if ((e = e.parentNode) && !P(e) && t.indexOf(e) < 0) return t.push(e), e
			});
			return V(t, e)
		},
		parent: function(e) {
			return V(k(this.pluck("parentNode")), e)
		},
		children: function(e) {
			return V(this.map(function() {
				return W(this)
			}), e)
		},
		contents: function() {
			return this.map(function() {
				return s.call(this.childNodes)
			})
		},
		siblings: function(e) {
			return V(this.map(function(e, t) {
				return o.call(W(t.parentNode), function(e) {
					return e !== t
				})
			}), e)
		},
		empty: function() {
			return this.each(function() {
				this.innerHTML = ""
			})
		},
		pluck: function(e) {
			return n.map(this, function(t) {
				return t[e]
			})
		},
		show: function() {
			return this.each(function() {
				this.style.display == "none" && (this.style.display = ""), getComputedStyle(this, "").getPropertyValue("display") == "none" && (this.style.display = z(this.nodeName))
			})
		},
		replaceWith: function(e) {
			return this.before(e).remove()
		},
		wrap: function(e) {
			var t = _(e);
			if (this[0] && !t) var r = n(e).get(0),
				i = r.parentNode || this.length > 1;
			return this.each(function(s) {
				n(this).wrapAll(t ? e.call(this, s) : i ? r.cloneNode(!0) : r)
			})
		},
		wrapAll: function(e) {
			if (this[0]) {
				n(this[0]).before(e = n(e));
				var t;
				while ((t = e.children()).length) e = t.first();
				n(e).append(this)
			}
			return this
		},
		wrapInner: function(e) {
			var t = _(e);
			return this.each(function(r) {
				var i = n(this),
					s = i.contents(),
					o = t ? e.call(this, r) : e;
				s.length ? s.wrapAll(o) : i.append(o)
			})
		},
		unwrap: function() {
			return this.parent().each(function() {
				n(this).replaceWith(n(this).children())
			}), this
		},
		clone: function() {
			return this.map(function() {
				return this.cloneNode(!0)
			})
		},
		hide: function() {
			return this.css("display", "none")
		},
		toggle: function(t) {
			return this.each(function() {
				var r = n(this);
				(t === e ? r.css("display") == "none" : t) ? r.show(): r.hide()
			})
		},
		prev: function(e) {
			return n(this.pluck("previousElementSibling")).filter(e || "*")
		},
		next: function(e) {
			return n(this.pluck("nextElementSibling")).filter(e || "*")
		},
		html: function(e) {
			return arguments.length === 0 ? this.length > 0 ? this[0].innerHTML : null : this.each(function(t) {
				var r = this.innerHTML;
				n(this).empty().append($(this, e, t, r))
			})
		},
		text: function(t) {
			return arguments.length === 0 ? this.length > 0 ? this[0].textContent : null : this.each(function() {
				this.textContent = t === e ? "" : "" + t
			})
		},
		attr: function(n, r) {
			var i;
			return typeof n == "string" && r === e ? this.length == 0 || this[0].nodeType !== 1 ? e : n == "value" && this[0].nodeName == "INPUT" ? this.val() : !(i = this[0].getAttribute(n)) && n in this[0] ? this[0][n] : i : this.each(function(e) {
				if (this.nodeType !== 1) return;
				if (H(n))
					for (t in n) J(this, t, n[t]);
				else J(this, n, $(this, r, e, this.getAttribute(n)))
			})
		},
		removeAttr: function(e) {
			return this.each(function() {
				this.nodeType === 1 && J(this, e)
			})
		},
		prop: function(t, n) {
			return t = A[t] || t, n === e ? this[0] && this[0][t] : this.each(function(e) {
				this[t] = $(this, n, e, this[t])
			})
		},
		data: function(t, n) {
			var r = this.attr("data-" + t.replace(v, "-$1").toLowerCase(), n);
			return r !== null ? Q(r) : e
		},
		val: function(e) {
			return arguments.length === 0 ? this[0] && (this[0].multiple ? n(this[0]).find("option").filter(function() {
				return this.selected
			}).pluck("value") : this[0].value) : this.each(function(t) {
				this.value = $(this, e, t, this.value)
			})
		},
		offset: function(e) {
			if (e) return this.each(function(t) {
				var r = n(this),
					i = $(this, e, t, r.offset()),
					s = r.offsetParent().offset(),
					o = {
						top: i.top - s.top,
						left: i.left - s.left
					};
				r.css("position") == "static" && (o.position = "relative"), r.css(o)
			});
			if (this.length == 0) return null;
			var t = this[0].getBoundingClientRect();
			return {
				left: t.left + window.pageXOffset,
				top: t.top + window.pageYOffset,
				width: Math.round(t.width),
				height: Math.round(t.height)
			}
		},
		css: function(e, r) {
			if (arguments.length < 2) {
				var i = this[0],
					s = getComputedStyle(i, "");
				if (!i) return;
				if (typeof e == "string") return i.style[C(e)] || s.getPropertyValue(e);
				if (O(e)) {
					var o = {};
					return n.each(O(e) ? e : [e], function(e, t) {
						o[t] = i.style[C(t)] || s.getPropertyValue(t)
					}), o
				}
			}
			var u = "";
			if (M(e) == "string") !r && r !== 0 ? this.each(function() {
				this.style.removeProperty(q(e))
			}) : u = q(e) + ":" + U(e, r);
			else
				for (t in e) !e[t] && e[t] !== 0 ? this.each(function() {
					this.style.removeProperty(q(t))
				}) : u += q(t) + ":" + U(t, e[t]) + ";";
			return this.each(function() {
				this.style.cssText += ";" + u
			})
		},
		index: function(e) {
			return e ? this.indexOf(n(e)[0]) : this.parent().children().indexOf(this[0])
		},
		hasClass: function(e) {
			return e ? i.some.call(this, function(e) {
				return this.test(K(e))
			}, R(e)) : !1
		},
		addClass: function(e) {
			return e ? this.each(function(t) {
				r = [];
				var i = K(this),
					s = $(this, e, t, i);
				s.split(/\s+/g).forEach(function(e) {
					n(this).hasClass(e) || r.push(e)
				}, this), r.length && K(this, i + (i ? " " : "") + r.join(" "))
			}) : this
		},
		removeClass: function(t) {
			return this.each(function(n) {
				if (t === e) return K(this, "");
				r = K(this), $(this, t, n, r).split(/\s+/g).forEach(function(e) {
					r = r.replace(R(e), " ")
				}), K(this, r.trim())
			})
		},
		toggleClass: function(t, r) {
			return t ? this.each(function(i) {
				var s = n(this),
					o = $(this, t, i, K(this));
				o.split(/\s+/g).forEach(function(t) {
					(r === e ? !s.hasClass(t) : r) ? s.addClass(t): s.removeClass(t)
				})
			}) : this
		},
		scrollTop: function(t) {
			if (!this.length) return;
			var n = "scrollTop" in this[0];
			return t === e ? n ? this[0].scrollTop : this[0].pageYOffset : this.each(n ? function() {
				this.scrollTop = t
			} : function() {
				this.scrollTo(this.scrollX, t)
			})
		},
		scrollLeft: function(t) {
			if (!this.length) return;
			var n = "scrollLeft" in this[0];
			return t === e ? n ? this[0].scrollLeft : this[0].pageXOffset : this.each(n ? function() {
				this.scrollLeft = t
			} : function() {
				this.scrollTo(t, this.scrollY)
			})
		},
		position: function() {
			if (!this.length) return;
			var e = this[0],
				t = this.offsetParent(),
				r = this.offset(),
				i = d.test(t[0].nodeName) ? {
					top: 0,
					left: 0
				} : t.offset();
			return r.top -= parseFloat(n(e).css("margin-top")) || 0, r.left -= parseFloat(n(e).css("margin-left")) || 0, i.top += parseFloat(n(t[0]).css("border-top-width")) || 0, i.left += parseFloat(n(t[0]).css("border-left-width")) || 0, {
				top: r.top - i.top,
				left: r.left - i.left
			}
		},
		offsetParent: function() {
			return this.map(function() {
				var e = this.offsetParent || u.body;
				while (e && !d.test(e.nodeName) && n(e).css("position") == "static") e = e.offsetParent;
				return e
			})
		}
	}, n.fn.detach = n.fn.remove, ["width", "height"].forEach(function(t) {
		var r = t.replace(/./, function(e) {
			return e[0].toUpperCase()
		});
		n.fn[t] = function(i) {
			var s, o = this[0];
			return i === e ? D(o) ? o["inner" + r] : P(o) ? o.documentElement["scroll" + r] : (s = this.offset()) && s[t] : this.each(function(e) {
				o = n(this), o.css(t, $(this, i, e, o[t]()))
			})
		}
	}), g.forEach(function(e, t) {
		var r = t % 2;
		n.fn[e] = function() {
			var e, i = n.map(arguments, function(t) {
					return e = M(t), e == "object" || e == "array" || t == null ? t : N.fragment(t)
				}),
				s, o = this.length > 1;
			return i.length < 1 ? this : this.each(function(e, u) {
				s = r ? u : u.parentNode, u = t == 0 ? u.nextSibling : t == 1 ? u.firstChild : t == 2 ? u : null, i.forEach(function(e) {
					if (o) e = e.cloneNode(!0);
					else if (!s) return n(e).remove();
					G(s.insertBefore(e, u), function(e) {
						e.nodeName != null && e.nodeName.toUpperCase() === "SCRIPT" && (!e.type || e.type === "text/javascript") && !e.src && window.eval.call(window, e.innerHTML)
					})
				})
			})
		}, n.fn[r ? e + "To" : "insert" + (t ? "Before" : "After")] = function(t) {
			return n(t)[e](this), this
		}
	}), N.Z.prototype = n.fn, N.uniq = k, N.deserializeValue = Q, n.zepto = N, n
}();
window.Zepto = Zepto, window.$ === undefined && (window.$ = Zepto),
	function(e) {
		function i(t) {
			return t = e(t), (!!t.width() || !!t.height()) && t.css("display") !== "none"
		}

		function f(e, t) {
			e = e.replace(/=#\]/g, '="#"]');
			var n, r, i = o.exec(e);
			if (i && i[2] in s) {
				n = s[i[2]], r = i[3], e = i[1];
				if (r) {
					var u = Number(r);
					isNaN(u) ? r = r.replace(/^["']|["']$/g, "") : r = u
				}
			}
			return t(e, n, r)
		}
		var t = e.zepto,
			n = t.qsa,
			r = t.matches,
			s = e.expr[":"] = {
				visible: function() {
					if (i(this)) return this
				},
				hidden: function() {
					if (!i(this)) return this
				},
				selected: function() {
					if (this.selected) return this
				},
				checked: function() {
					if (this.checked) return this
				},
				parent: function() {
					return this.parentNode
				},
				first: function(e) {
					if (e === 0) return this
				},
				last: function(e, t) {
					if (e === t.length - 1) return this
				},
				eq: function(e, t, n) {
					if (e === n) return this
				},
				contains: function(t, n, r) {
					if (e(this).text().indexOf(r) > -1) return this
				},
				has: function(e, n, r) {
					if (t.qsa(this, r).length) return this
				}
			},
			o = new RegExp("(.*):(\\w+)(?:\\(([^)]+)\\))?$\\s*"),
			u = /^\s*>/,
			a = "Zepto" + +(new Date);
		t.qsa = function(r, i) {
			return f(i, function(i, s, o) {
				try {
					var f;
					!i && s ? i = "*" : u.test(i) && (f = e(r).addClass(a), i = "." + a + " " + i);
					var l = n(r, i)
				} catch (c) {
					throw 0, c
				} finally {
					f && f.removeClass(a)
				}
				return s ? t.uniq(e.map(l, function(e, t) {
					return s.call(e, t, l, o)
				})) : l
			})
		}, t.matches = function(e, t) {
			return f(t, function(t, n, i) {
				return (!t || r(e, t)) && (!n || n.call(e, null, i) === e)
			})
		}
	}(Zepto),
	function(e) {
		function c(e) {
			return e._zid || (e._zid = t++)
		}

		function h(e, t, n, r) {
			t = p(t);
			if (t.ns) var i = d(t.ns);
			return (o[c(e)] || []).filter(function(e) {
				return e && (!t.e || e.e == t.e) && (!t.ns || i.test(e.ns)) && (!n || c(e.fn) === c(n)) && (!r || e.sel == r)
			})
		}

		function p(e) {
			var t = ("" + e).split(".");
			return {
				e: t[0],
				ns: t.slice(1).sort().join(" ")
			}
		}

		function d(e) {
			return new RegExp("(?:^| )" + e.replace(" ", " .* ?") + "(?: |$)")
		}

		function v(e, t) {
			return e.del && !a && e.e in f || !!t
		}

		function m(e) {
			return l[e] || a && f[e] || e
		}

		function g(t, r, i, s, u, a, f) {
			var h = c(t),
				d = o[h] || (o[h] = []);
			r.split(/\s/).forEach(function(r) {
				if (r == "ready") return e(document).ready(i);
				var o = p(r);
				o.fn = i, o.sel = u, o.e in l && (i = function(t) {
					var n = t.relatedTarget;
					if (!n || n !== this && !e.contains(this, n)) return o.fn.apply(this, arguments)
				}), o.del = a;
				var c = a || i;
				o.proxy = function(e) {
					e = x(e);
					if (e.isImmediatePropagationStopped()) return;
					e.data = s;
					var r = c.apply(t, e._args == n ? [e] : [e].concat(e._args));
					return r === !1 && (e.preventDefault(), e.stopPropagation()), r
				}, o.i = d.length, d.push(o), "addEventListener" in t && t.addEventListener(m(o.e), o.proxy, v(o, f))
			})
		}

		function y(e, t, n, r, i) {
			var s = c(e);
			(t || "").split(/\s/).forEach(function(t) {
				h(e, t, n, r).forEach(function(t) {
					delete o[s][t.i], "removeEventListener" in e && e.removeEventListener(m(t.e), t.proxy, v(t, i))
				})
			})
		}

		function x(t, r) {
			if (r || !t.isDefaultPrevented) {
				r || (r = t), e.each(S, function(e, n) {
					var i = r[e];
					t[e] = function() {
						return this[n] = b, i && i.apply(r, arguments)
					}, t[n] = w
				});
				if (r.defaultPrevented !== n ? r.defaultPrevented : "returnValue" in r ? r.returnValue === !1 : r.getPreventDefault && r.getPreventDefault()) t.isDefaultPrevented = b
			}
			return t
		}

		function T(e) {
			var t, r = {
				originalEvent: e
			};
			for (t in e) !E.test(t) && e[t] !== n && (r[t] = e[t]);
			return x(r, e)
		}
		var t = 1,
			n, r = Array.prototype.slice,
			i = e.isFunction,
			s = function(e) {
				return typeof e == "string"
			},
			o = {},
			u = {},
			a = "onfocusin" in window,
			f = {
				focus: "focusin",
				blur: "focusout"
			},
			l = {
				mouseenter: "mouseover",
				mouseleave: "mouseout"
			};
		u.click = u.mousedown = u.mouseup = u.mousemove = "MouseEvents", e.event = {
			add: g,
			remove: y
		}, e.proxy = function(t, n) {
			if (i(t)) {
				var r = function() {
					return t.apply(n, arguments)
				};
				return r._zid = c(t), r
			}
			if (s(n)) return e.proxy(t[n], t);
			throw new TypeError("expected function")
		}, e.fn.bind = function(e, t, n) {
			return this.on(e, t, n)
		}, e.fn.unbind = function(e, t) {
			return this.off(e, t)
		}, e.fn.one = function(e, t, n, r) {
			return this.on(e, t, n, r, 1)
		};
		var b = function() {
				return !0
			},
			w = function() {
				return !1
			},
			E = /^([A-Z]|returnValue$|layer[XY]$)/,
			S = {
				preventDefault: "isDefaultPrevented",
				stopImmediatePropagation: "isImmediatePropagationStopped",
				stopPropagation: "isPropagationStopped"
			};
		e.fn.delegate = function(e, t, n) {
			return this.on(t, e, n)
		}, e.fn.undelegate = function(e, t, n) {
			return this.off(t, e, n)
		}, e.fn.live = function(t, n) {
			return e(document.body).delegate(this.selector, t, n), this
		}, e.fn.die = function(t, n) {
			return e(document.body).undelegate(this.selector, t, n), this
		}, e.fn.on = function(t, o, u, a, f) {
			var l, c, h = this;
			if (t && !s(t)) return e.each(t, function(e, t) {
				h.on(e, o, u, t, f)
			}), h;
			!s(o) && !i(a) && a !== !1 && (a = u, u = o, o = n);
			if (i(u) || u === !1) a = u, u = n;
			return a === !1 && (a = w), h.each(function(n, i) {
				f && (l = function(e) {
					return y(i, e.type, a), a.apply(this, arguments)
				}), o && (c = function(t) {
					var n, s = e(t.target).closest(o, i).get(0);
					if (s && s !== i) return n = e.extend(T(t), {
						currentTarget: s,
						liveFired: i
					}), (l || a).apply(s, [n].concat(r.call(arguments, 1)))
				}), g(i, t, a, u, o, c || l)
			})
		}, e.fn.off = function(t, r, o) {
			var u = this;
			return t && !s(t) ? (e.each(t, function(e, t) {
				u.off(e, r, t)
			}), u) : (!s(r) && !i(o) && o !== !1 && (o = r, r = n), o === !1 && (o = w), u.each(function() {
				y(this, t, o, r)
			}))
		}, e.fn.trigger = function(t, n) {
			return t = s(t) || e.isPlainObject(t) ? e.Event(t) : x(t), t._args = n, this.each(function() {
				"dispatchEvent" in this ? this.dispatchEvent(t) : e(this).triggerHandler(t, n)
			})
		}, e.fn.triggerHandler = function(t, n) {
			var r, i;
			return this.each(function(o, u) {
				r = T(s(t) ? e.Event(t) : t), r._args = n, r.target = u, e.each(h(u, t.type || t), function(e, t) {
					i = t.proxy(r);
					if (r.isImmediatePropagationStopped()) return !1
				})
			}), i
		}, "focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select keydown keypress keyup error".split(" ").forEach(function(t) {
			e.fn[t] = function(e) {
				return e ? this.bind(t, e) : this.trigger(t)
			}
		}), ["focus", "blur"].forEach(function(t) {
			e.fn[t] = function(e) {
				return e ? this.bind(t, e) : this.each(function() {
					try {
						this[t]()
					} catch (e) {}
				}), this
			}
		}), e.Event = function(e, t) {
			s(e) || (t = e, e = t.type);
			var n = document.createEvent(u[e] || "Events"),
				r = !0;
			if (t)
				for (var i in t) i == "bubbles" ? r = !!t[i] : n[i] = t[i];
			return n.initEvent(e, r, !0), x(n)
		}
	}(Zepto),
	function($) {
		function triggerAndReturn(e, t, n) {
			var r = $.Event(t);
			return $(e).trigger(r, n), !r.isDefaultPrevented()
		}

		function triggerGlobal(e, t, n, r) {
			if (e.global) return triggerAndReturn(t || document, n, r)
		}

		function ajaxStart(e) {
			e.global && $.active++ === 0 && triggerGlobal(e, null, "ajaxStart")
		}

		function ajaxStop(e) {
			e.global && !--$.active && triggerGlobal(e, null, "ajaxStop")
		}

		function ajaxBeforeSend(e, t) {
			var n = t.context;
			if (t.beforeSend.call(n, e, t) === !1 || triggerGlobal(t, n, "ajaxBeforeSend", [e, t]) === !1) return !1;
			triggerGlobal(t, n, "ajaxSend", [e, t])
		}

		function ajaxSuccess(e, t, n, r) {
			var i = n.context,
				s = "success";
			n.success.call(i, e, s, t), r && r.resolveWith(i, [e, s, t]), triggerGlobal(n, i, "ajaxSuccess", [t, n, e]), ajaxComplete(s, t, n)
		}

		function ajaxError(e, t, n, r, i) {
			var s = r.context;
			r.error.call(s, n, t, e), i && i.rejectWith(s, [n, t, e]), triggerGlobal(r, s, "ajaxError", [n, r, e || t]), ajaxComplete(t, n, r)
		}

		function ajaxComplete(e, t, n) {
			var r = n.context;
			n.complete.call(r, t, e), triggerGlobal(n, r, "ajaxComplete", [t, n]), ajaxStop(n)
		}

		function empty() {}

		function mimeToDataType(e) {
			return e && (e = e.split(";", 2)[0]), e && (e == htmlType ? "html" : e == jsonType ? "json" : scriptTypeRE.test(e) ? "script" : xmlTypeRE.test(e) && "xml") || "text"
		}

		function appendQuery(e, t) {
			return t == "" ? e : (e + "&" + t).replace(/[&?]{1,2}/, "?")
		}

		function serializeData(e) {
			e.processData && e.data && $.type(e.data) != "string" && (e.data = $.param(e.data, e.traditional)), e.data && (!e.type || e.type.toUpperCase() == "GET") && (e.url = appendQuery(e.url, e.data), e.data = undefined)
		}

		function parseArguments(e, t, n, r) {
			return $.isFunction(t) && (r = n, n = t, t = undefined), $.isFunction(n) || (r = n, n = undefined), {
				url: e,
				data: t,
				success: n,
				dataType: r
			}
		}

		function serialize(e, t, n, r) {
			var i, s = $.isArray(t),
				o = $.isPlainObject(t);
			$.each(t, function(t, u) {
				i = $.type(u), r && (t = n ? r : r + "[" + (o || i == "object" || i == "array" ? t : "") + "]"), !r && s ? e.add(u.name, u.value) : i == "array" || !n && i == "object" ? serialize(e, u, n, t) : e.add(t, u)
			})
		}
		var jsonpID = 0,
			document = window.document,
			key, name, rscript = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
			scriptTypeRE = /^(?:text|application)\/javascript/i,
			xmlTypeRE = /^(?:text|application)\/xml/i,
			jsonType = "application/json",
			htmlType = "text/html",
			blankRE = /^\s*$/;
		$.active = 0, $.ajaxJSONP = function(e, t) {
			if ("type" in e) {
				var n = e.jsonpCallback,
					r = ($.isFunction(n) ? n() : n) || "jsonp" + ++jsonpID,
					i = document.createElement("script"),
					s = window[r],
					o, u = function(e) {
						$(i).triggerHandler("error", e || "abort")
					},
					a = {
						abort: u
					},
					f;
				return t && t.promise(a), $(i).on("load error", function(n, u) {
					clearTimeout(f), $(i).off().remove(), n.type == "error" || !o ? ajaxError(null, u || "error", a, e, t) : ajaxSuccess(o[0], a, e, t), window[r] = s, o && $.isFunction(s) && s(o[0]), s = o = undefined
				}), ajaxBeforeSend(a, e) === !1 ? (u("abort"), a) : (window[r] = function() {
					o = arguments
				}, i.src = e.url.replace(/\?(.+)=\?/, "?$1=" + r), document.head.appendChild(i), e.timeout > 0 && (f = setTimeout(function() {
					u("timeout")
				}, e.timeout)), a)
			}
			return $.ajax(e)
		}, $.ajaxSettings = {
			type: "GET",
			beforeSend: empty,
			success: empty,
			error: empty,
			complete: empty,
			context: null,
			global: !0,
			xhr: function() {
				return new window.XMLHttpRequest
			},
			accepts: {
				script: "text/javascript, application/javascript, application/x-javascript",
				json: jsonType,
				xml: "application/xml, text/xml",
				html: htmlType,
				text: "text/plain"
			},
			crossDomain: !1,
			timeout: 0,
			processData: !0,
			cache: !0
		}, $.ajax = function(options) {
			var settings = $.extend({}, options || {}),
				deferred = $.Deferred && $.Deferred();
			for (key in $.ajaxSettings) settings[key] === undefined && (settings[key] = $.ajaxSettings[key]);
			ajaxStart(settings), settings.crossDomain || (settings.crossDomain = /^([\w-]+:)?\/\/([^\/]+)/.test(settings.url) && RegExp.$2 != window.location.host), settings.url || (settings.url = window.location.toString()), serializeData(settings), settings.cache === !1 && (settings.url = appendQuery(settings.url, "_=" + Date.now()));
			var dataType = settings.dataType,
				hasPlaceholder = /\?.+=\?/.test(settings.url);
			if (dataType == "jsonp" || hasPlaceholder) return hasPlaceholder || (settings.url = appendQuery(settings.url, settings.jsonp ? settings.jsonp + "=?" : settings.jsonp === !1 ? "" : "callback=?")), $.ajaxJSONP(settings, deferred);
			var mime = settings.accepts[dataType],
				headers = {},
				setHeader = function(e, t) {
					headers[e.toLowerCase()] = [e, t]
				},
				protocol = /^([\w-]+:)\/\//.test(settings.url) ? RegExp.$1 : window.location.protocol,
				xhr = settings.xhr(),
				nativeSetHeader = xhr.setRequestHeader,
				abortTimeout;
			deferred && deferred.promise(xhr), settings.crossDomain || setHeader("X-Requested-With", "XMLHttpRequest"), setHeader("Accept", mime || "*/*");
			if (mime = settings.mimeType || mime) mime.indexOf(",") > -1 && (mime = mime.split(",", 2)[0]), xhr.overrideMimeType && xhr.overrideMimeType(mime);
			(settings.contentType || settings.contentType !== !1 && settings.data && settings.type.toUpperCase() != "GET") && setHeader("Content-Type", settings.contentType || "application/x-www-form-urlencoded");
			if (settings.headers)
				for (name in settings.headers) setHeader(name, settings.headers[name]);
			xhr.setRequestHeader = setHeader, xhr.onreadystatechange = function() {
				if (xhr.readyState == 4) {
					xhr.onreadystatechange = empty, clearTimeout(abortTimeout);
					var result, error = !1;
					if (xhr.status >= 200 && xhr.status < 300 || xhr.status == 304 || xhr.status == 0 && protocol == "file:") {
						dataType = dataType || mimeToDataType(settings.mimeType || xhr.getResponseHeader("content-type")), result = xhr.responseText;
						try {
							dataType == "script" ? (1, eval)(result) : dataType == "xml" ? result = xhr.responseXML : dataType == "json" && (result = blankRE.test(result) ? null : $.parseJSON(result))
						} catch (e) {
							error = e
						}
						error ? ajaxError(error, "parsererror", xhr, settings, deferred) : ajaxSuccess(result, xhr, settings, deferred)
					} else ajaxError(xhr.statusText || null, xhr.status ? "error" : "abort", xhr, settings, deferred)
				}
			};
			if (ajaxBeforeSend(xhr, settings) === !1) return xhr.abort(), ajaxError(null, "abort", xhr, settings, deferred), xhr;
			if (settings.xhrFields)
				for (name in settings.xhrFields) xhr[name] = settings.xhrFields[name];
			var async = "async" in settings ? settings.async : !0;
			xhr.open(settings.type, settings.url, async, settings.username, settings.password);
			for (name in headers) nativeSetHeader.apply(xhr, headers[name]);
			return settings.timeout > 0 && (abortTimeout = setTimeout(function() {
				xhr.onreadystatechange = empty, xhr.abort(), ajaxError(null, "timeout", xhr, settings, deferred)
			}, settings.timeout)), xhr.send(settings.data ? settings.data : null), xhr
		}, $.get = function() {
			return $.ajax(parseArguments.apply(null, arguments))
		}, $.post = function() {
			var e = parseArguments.apply(null, arguments);
			return e.type = "POST", $.ajax(e)
		}, $.getJSON = function() {
			var e = parseArguments.apply(null, arguments);
			return e.dataType = "json", $.ajax(e)
		}, $.fn.load = function(e, t, n) {
			if (!this.length) return this;
			var r = this,
				i = e.split(/\s/),
				s, o = parseArguments(e, t, n),
				u = o.success;
			return i.length > 1 && (o.url = i[0], s = i[1]), o.success = function(e) {
				r.html(s ? $("<div>").html(e.replace(rscript, "")).find(s) : e), u && u.apply(r, arguments)
			}, $.ajax(o), this
		};
		var escape = encodeURIComponent;
		$.param = function(e, t) {
			var n = [];
			return n.add = function(e, t) {
				this.push(escape(e) + "=" + escape(t))
			}, serialize(n, e, t), n.join("&").replace(/%20/g, "+")
		}
	}(Zepto),
	function(e) {
		e.fn.serializeArray = function() {
			var t = [],
				n;
			return e([].slice.call(this.get(0).elements)).each(function() {
				n = e(this);
				var r = n.attr("type");
				this.nodeName.toLowerCase() != "fieldset" && !this.disabled && r != "submit" && r != "reset" && r != "button" && (r != "radio" && r != "checkbox" || this.checked) && t.push({
					name: n.attr("name"),
					value: n.val()
				})
			}), t
		}, e.fn.serialize = function() {
			var e = [];
			return this.serializeArray().forEach(function(t) {
				e.push(encodeURIComponent(t.name) + "=" + encodeURIComponent(t.value))
			}), e.join("&")
		}, e.fn.submit = function(t) {
			if (t) this.bind("submit", t);
			else if (this.length) {
				var n = e.Event("submit");
				this.eq(0).trigger(n), n.isDefaultPrevented() || this.get(0).submit()
			}
			return this
		}
	}(Zepto),
	function(e) {
		"__proto__" in {} || e.extend(e.zepto, {
			Z: function(t, n) {
				return t = t || [], e.extend(t, e.fn), t.selector = n || "", t.__Z = !0, t
			},
			isZ: function(t) {
				return e.type(t) === "array" && "__Z" in t
			}
		});
		try {
			getComputedStyle(undefined)
		} catch (t) {
			var n = getComputedStyle;
			window.getComputedStyle = function(e) {
				try {
					return n(e)
				} catch (t) {
					return null
				}
			}
		}
	}(Zepto),
	function(e, t) {
		function w(e) {
			return e.replace(/([a-z])([A-Z])/, "$1-$2").toLowerCase()
		}

		function E(e) {
			return r ? r + e : e.toLowerCase()
		}
		var n = "",
			r, i, s, o = {
				Webkit: "webkit",
				Moz: "",
				O: "o"
			},
			u = window.document,
			a = u.createElement("div"),
			f = /^((translate|rotate|scale)(X|Y|Z|3d)?|matrix(3d)?|perspective|skew(X|Y)?)$/i,
			l, c, h, p, d, v, m, g, y, b = {};
		e.each(o, function(e, i) {
			if (a.style[e + "TransitionProperty"] !== t) return n = "-" + e.toLowerCase() + "-", r = i, !1
		}), l = n + "transform", b[c = n + "transition-property"] = b[h = n + "transition-duration"] = b[d = n + "transition-delay"] = b[p = n + "transition-timing-function"] = b[v = n + "animation-name"] = b[m = n + "animation-duration"] = b[y = n + "animation-delay"] = b[g = n + "animation-timing-function"] = "", e.fx = {
			off: r === t && a.style.transitionProperty === t,
			speeds: {
				_default: 400,
				fast: 200,
				slow: 600
			},
			cssPrefix: n,
			transitionEnd: E("TransitionEnd"),
			animationEnd: E("AnimationEnd")
		}, e.fn.animate = function(n, r, i, s, o) {
			return e.isFunction(r) && (s = r, i = t, r = t), e.isFunction(i) && (s = i, i = t), e.isPlainObject(r) && (i = r.easing, s = r.complete, o = r.delay, r = r.duration), r && (r = (typeof r == "number" ? r : e.fx.speeds[r] || e.fx.speeds._default) / 1e3), o && (o = parseFloat(o) / 1e3), this.anim(n, r, i, s, o)
		}, e.fn.anim = function(n, r, i, s, o) {
			var u, a = {},
				E, S = "",
				x = this,
				T, N = e.fx.transitionEnd,
				C = !1;
			r === t && (r = e.fx.speeds._default / 1e3), o === t && (o = 0), e.fx.off && (r = 0);
			if (typeof n == "string") a[v] = n, a[m] = r + "s", a[y] = o + "s", a[g] = i || "linear", N = e.fx.animationEnd;
			else {
				E = [];
				for (u in n) f.test(u) ? S += u + "(" + n[u] + ") " : (a[u] = n[u], E.push(w(u)));
				S && (a[l] = S, E.push(l)), r > 0 && typeof n == "object" && (a[c] = E.join(", "), a[h] = r + "s", a[d] = o + "s", a[p] = i || "linear")
			}
			return T = function(t) {
				if (typeof t != "undefined") {
					if (t.target !== t.currentTarget) return;
					e(t.target).unbind(N, T)
				} else e(this).unbind(N, T);
				C = !0, e(this).css(b), s && s.call(this)
			}, r > 0 && (this.bind(N, T), setTimeout(function() {
				if (C) return;
				T.call(x)
			}, r * 1e3 + 25)), this.size() && this.get(0).clientLeft, this.css(a), r <= 0 && setTimeout(function() {
				x.each(function() {
					T.call(this)
				})
			}, 0), this
		}, a = null
	}(Zepto),
	function(e, t) {
		function u(n, r, i, s, o) {
			typeof r == "function" && !o && (o = r, r = t);
			var u = {
				opacity: i
			};
			return s && (u.scale = s, n.css(e.fx.cssPrefix + "transform-origin", "0 0")), n.animate(u, r, null, o)
		}

		function a(t, n, r, i) {
			return u(t, n, 0, r, function() {
				s.call(e(this)), i && i.call(this)
			})
		}
		var n = window.document,
			r = n.documentElement,
			i = e.fn.show,
			s = e.fn.hide,
			o = e.fn.toggle;
		e.fn.show = function(e, n) {
			return i.call(this), e === t ? e = 0 : this.css("opacity", 0), u(this, e, 1, "1,1", n)
		}, e.fn.hide = function(e, n) {
			return e === t ? s.call(this) : a(this, e, "0,0", n)
		}, e.fn.toggle = function(n, r) {
			return n === t || typeof n == "boolean" ? o.call(this, n) : this.each(function() {
				var t = e(this);
				t[t.css("display") == "none" ? "show" : "hide"](n, r)
			})
		}, e.fn.fadeTo = function(e, t, n) {
			return u(this, e, t, null, n)
		}, e.fn.fadeIn = function(e, t) {
			var n = this.css("opacity");
			return n > 0 ? this.css("opacity", 0) : n = 1, i.call(this).fadeTo(e, n, t)
		}, e.fn.fadeOut = function(e, t) {
			return a(this, e, null, t)
		}, e.fn.fadeToggle = function(t, n) {
			return this.each(function() {
				var r = e(this);
				r[r.css("opacity") == 0 || r.css("display") == "none" ? "fadeIn" : "fadeOut"](t, n)
			})
		}
	}(Zepto),
	function(e) {
		function o(s, o) {
			var a = s[i],
				f = a && t[a];
			if (o === undefined) return f || u(s);
			if (f) {
				if (o in f) return f[o];
				var l = r(o);
				if (l in f) return f[l]
			}
			return n.call(e(s), o)
		}

		function u(n, s, o) {
			var u = n[i] || (n[i] = ++e.uuid),
				f = t[u] || (t[u] = a(n));
			return s !== undefined && (f[r(s)] = o), f
		}

		function a(t) {
			var n = {};
			return e.each(t.attributes || s, function(t, i) {
				i.name.indexOf("data-") == 0 && (n[r(i.name.replace("data-", ""))] = e.zepto.deserializeValue(i.value))
			}), n
		}
		var t = {},
			n = e.fn.data,
			r = e.camelCase,
			i = e.expando = "Zepto" + +(new Date),
			s = [];
		e.fn.data = function(t, n) {
			return n === undefined ? e.isPlainObject(t) ? this.each(function(n, r) {
				e.each(t, function(e, t) {
					u(r, e, t)
				})
			}) : this.length == 0 ? undefined : o(this[0], t) : this.each(function() {
				u(this, t, n)
			})
		}, e.fn.removeData = function(n) {
			return typeof n == "string" && (n = n.split(/\s+/)), this.each(function() {
				var s = this[i],
					o = s && t[s];
				o && e.each(n || o, function(e) {
					delete o[n ? r(this) : e]
				})
			})
		}, ["remove", "empty"].forEach(function(t) {
			var n = e.fn[t];
			e.fn[t] = function() {
				var e = this.find("*");
				return t === "remove" && (e = e.add(this)), e.removeData(), n.call(this)
			}
		})
	}(Zepto),
	function(e) {
		function a(e, t, n, r) {
			return Math.abs(e - t) >= Math.abs(n - r) ? e - t > 0 ? "Left" : "Right" : n - r > 0 ? "Up" : "Down"
		}

		function f() {
			s = null, t.last && (t.el.trigger("longTap"), t = {})
		}

		function l() {
			s && clearTimeout(s), s = null
		}

		function c() {
			n && clearTimeout(n), r && clearTimeout(r), i && clearTimeout(i), s && clearTimeout(s), n = r = i = s = null, t = {}
		}

		function h(e) {
			return (e.pointerType == "touch" || e.pointerType == e.MSPOINTER_TYPE_TOUCH) && e.isPrimary
		}

		function p(e, t) {
			return e.type == "pointer" + t || e.type.toLowerCase() == "mspointer" + t
		}
		var t = {},
			n, r, i, s, o = 750,
			u;
		e(document).ready(function() {
			var d, v, m = 0,
				g = 0,
				y, b;
			"MSGesture" in window && (u = new MSGesture, u.target = document.body), e(document).bind("MSGestureEnd", function(e) {
				var n = e.velocityX > 1 ? "Right" : e.velocityX < -1 ? "Left" : e.velocityY > 1 ? "Down" : e.velocityY < -1 ? "Up" : null;
				n && (t.el.trigger("swipe"), t.el.trigger("swipe" + n))
			}).on("touchstart MSPointerDown pointerdown", function(r) {
				if ((b = p(r, "down")) && !h(r)) return;
				y = b ? r : r.touches[0], r.touches && r.touches.length === 1 && t.x2 && (t.x2 = undefined, t.y2 = undefined), d = Date.now(), v = d - (t.last || d), t.el = e("tagName" in y.target ? y.target : y.target.parentNode), n && clearTimeout(n), t.x1 = y.pageX, t.y1 = y.pageY, v > 0 && v <= 250 && (t.isDoubleTap = !0), t.last = d, s = setTimeout(f, o), u && b && u.addPointer(r.pointerId)
			}).on("touchmove MSPointerMove pointermove", function(e) {
				if ((b = p(e, "move")) && !h(e)) return;
				y = b ? e : e.touches[0], l(), t.x2 = y.pageX, t.y2 = y.pageY, m += Math.abs(t.x1 - t.x2), g += Math.abs(t.y1 - t.y2)
			}).on("touchend MSPointerUp pointerup", function(s) {
				if ((b = p(s, "up")) && !h(s)) return;
				l(), t.x2 && Math.abs(t.x1 - t.x2) > 30 || t.y2 && Math.abs(t.y1 - t.y2) > 30 ? i = setTimeout(function() {
					t.el.trigger("swipe"), t.el.trigger("swipe" + a(t.x1, t.x2, t.y1, t.y2)), t = {}
				}, 0) : "last" in t && (m < 30 && g < 30 ? r = setTimeout(function() {
					var r = e.Event("tap");
					r.cancelTouch = c, t.el.trigger(r), t.isDoubleTap ? (t.el && t.el.trigger("doubleTap"), t = {}) : n = setTimeout(function() {
						n = null, t.el && t.el.trigger("singleTap"), t = {}
					}, 250)
				}, 0) : t = {}), m = g = 0
			}).on("touchcancel MSPointerCancel pointercancel", c), e(window).on("scroll", c)
		}), ["swipe", "swipeLeft", "swipeRight", "swipeUp", "swipeDown", "doubleTap", "tap", "singleTap", "longTap"].forEach(function(t) {
			e.fn[t] = function(e) {
				return this.on(t, e)
			}
		})
	}(Zepto), define("zepto", function(e) {
		return function() {
			var t, n;
			return t || e.$
		}
	}(this)), define("lib/loading", ["require", "zepto"], function(e) {
		var t = e("zepto"),
			n = [
				["#ff5252", "#22ebd6"],
				["#ffd21d", "#8a6fff"],
				["#fe702b", "#296aff"]
			],
			r = function(e) {
				e < 3 ? (t(".cube1").css("backgroundColor", n[e][0]), t(".cube2").css("backgroundColor", n[e][1]), e++) : e = 0, setTimeout(function() {
					r(e)
				}, 450)
			};
		return r(0), t(".spinner").css({
			left: (t(window).width() - 32) / 2,
			top: (t(window).height() - 32) / 2
		}), {
			show: function() {
				t(".spinner").show()
			},
			hide: function() {
				t(".spinner").hide()
			}
		}
	}), define("lib/cookie", ["require", "exports", "module"], function(e, t) {
		function s(e, t) {
			var n = {};
			if (o(e) && e.length > 0) {
				var i = t ? r : f,
					s = e.split(/;\s/g),
					u, a, l;
				for (var c = 0, h = s.length; c < h; c++) {
					l = s[c].match(/([^=]+)=/i);
					if (l instanceof Array) try {
						u = r(l[1]), a = i(s[c].substring(l[1].length + 1))
					} catch (p) {} else u = r(s[c]), a = "";
					u && (n[u] = a)
				}
			}
			return n
		}

		function o(e) {
			return typeof e == "string"
		}

		function u(e) {
			return o(e) && e !== ""
		}

		function a(e) {
			if (!u(e)) throw new TypeError("Cookie name must be a non-empty string")
		}

		function f(e) {
			return e
		}
		var n = t,
			r = decodeURIComponent,
			i = encodeURIComponent;
		n.get = function(e, t) {
			a(e), typeof t == "function" ? t = {
				converter: t
			} : t = t || {};
			var n = s(document.cookie, !t.raw);
			return (t.converter || f)(n[e])
		}, n.set = function(e, t, n) {
			a(e), n = n || {};
			var r = n.expires,
				s = n.domain,
				o = n.path;
			n.raw || (t = i(String(t)));
			var f = e + "=" + t,
				l = r;
			return typeof l == "number" && (l = new Date, l.setDate(l.getDate() + r)), l instanceof Date && (f += "; expires=" + l.toUTCString()), u(s) && (f += "; domain=" + s), u(o) && (f += "; path=" + o), n.secure && (f += "; secure"), document.cookie = f, f
		}, n.remove = function(e, t) {
			return t = t || {}, t.expires = new Date(0), this.set(e, "", t)
		}
	}), define("DoreJS/Class", ["require", "exports", "module"], function(e, t, n) {
		function r(e) {
			if (!(this instanceof r) && c(e)) return s(e)
		}

		function i(e) {
			var t, n;
			for (t in e) n = e[t], r.Mutators.hasOwnProperty(t) ? r.Mutators[t].call(this, n) : this.prototype[t] = n
		}

		function s(e) {
			return e.extend = r.extend, e.implement = i, e
		}

		function o() {}

		function a(e, t, n) {
			for (var r in t)
				if (t.hasOwnProperty(r)) {
					if (n && h(n, r) === -1) continue;
					r !== "prototype" && (e[r] = t[r])
				}
		}
		n.exports = r, r.create = function(e, t) {
			function n() {
				e.apply(this, arguments), this.constructor === n && this.initialize && this.initialize.apply(this, arguments)
			}
			return c(e) || (t = e, e = null), t || (t = {}), e || (e = t.Extends || r), t.Extends = e, e !== r && a(n, e, e.StaticsWhiteList), i.call(n, t), s(n)
		}, r.extend = function(e) {
			return e || (e = {}), e.Extends = this, r.create(e)
		}, r.Mutators = {
			Extends: function(e) {
				var t = this.prototype,
					n = u(e.prototype);
				a(n, t), n.constructor = this, this.prototype = n, this.superclass = e.prototype
			},
			Implements: function(e) {
				l(e) || (e = [e]);
				var t = this.prototype,
					n;
				while (n = e.shift()) a(t, n.prototype || n)
			},
			Statics: function(e) {
				a(this, e)
			}
		};
		var u = Object.__proto__ ? function(e) {
				return {
					__proto__: e
				}
			} : function(e) {
				return o.prototype = e, new o
			},
			f = Object.prototype.toString,
			l = Array.isArray || function(e) {
				return f.call(e) === "[object Array]"
			},
			c = function(e) {
				return f.call(e) === "[object Function]"
			},
			h = Array.prototype.indexOf ? function(e, t) {
				return e.indexOf(t)
			} : function(e, t) {
				for (var n = 0, r = e.length; n < r; n++)
					if (e[n] === t) return n;
				return -1
			}
	}), define("lib/tool", ["require", "exports", "module", "zepto", "DoreJS/Class"], function(e, t, n) {
		var r = e("zepto"),
			i = e("DoreJS/Class"),
			s = i.extend({
				initialize: function() {
					var e = this.parseURL(window.location.href);
					e.host === "" || /test/i.test(e.host) ? this.apiUrl = "http://test.mobile.ent.qq.com" : this.apiUrl = "http://mobile.ent.qq.com"
				},
				parseURL: function(e) {
					var t = document.createElement("a");
					return t.href = e, {
						source: e,
						protocol: t.protocol.replace(":", ""),
						host: t.hostname,
						port: t.port,
						query: t.search,
						params: function() {
							var e = {},
								n = t.search.replace(/^\?/, "").split("&"),
								r = n.length,
								i = 0,
								s;
							for (; i < r; i++) {
								if (!n[i]) continue;
								s = n[i].split("="), e[s[0]] = s[1]
							}
							return e
						}(),
						file: (t.pathname.match(/\/([^\/?#]+)$/i) || [, ""])[1],
						hash: t.hash.replace("#", ""),
						path: t.pathname.replace(/^([^\/])/, "/$1"),
						relative: (t.href.match(/tps?:\/\/[^\/]+(.+)/) || [, ""])[1],
						segments: t.pathname.replace(/^\//, "").split("/")
					}
				},
				url: function(e) {
					if (e.substr(0, 1) === "/") {
						var t = this.apiUrl;
						return t ? t + e : e
					}
					return /http:\/\/.+/.test(e) ? e : "http://" + e
				},
				shipei: function(e, t) {
					var n = t || document.body.clientWidth,
						r = /shipei_/,
						i = r.test(e);
					if (i) {
						var s = e.split("/"),
							o = s[s.length - 1],
							u = 1;
						return n > 0 && n <= 480 ? u = 1 : n > 480 && n <= 640 ? u = 2 : n > 640 && n < 1080 ? u = 3 : n >= 1080 && (u = 4), e.replace(o, o.split(".")[0] + "_" + u + "." + o.split(".")[1])
					}
					return e
				},
				getDate: function(e) {
					var t = new Date,
						n = t.getTime() - 864e5,
						r = (new Date(n - e * 24 * 60 * 60 * 1e3)).getTime();
					return r
				},
				datetime_to_unix: function(e) {
					var t = e.replace(/:/g, "-");
					t = t.replace(/ /g, "-");
					var n = t.split("-"),
						r = new Date(Date.UTC(n[0], n[1] - 1, n[2], n[3] - 8, n[4], n[5]));
					return r.getTime()
				}
			});
		n.exports = r.extend(s, {
			single: function(e) {
				var t = this;
				return this.__singleton || (this.__singleton = new t(e)), this.__singleton
			}
		})
	});
var Swiper = function(e, t) {
	function r(e, t) {
		return document.querySelectorAll ? (t || document).querySelectorAll(e) : jQuery(e, t)
	}

	function b(e) {
		return Object.prototype.toString.apply(e) === "[object Array]" ? !0 : !1
	}

	function x() {
		var e = u - l;
		return t.freeMode && (e = u - l), t.slidesPerView > i.slides.length && !t.centeredSlides && (e = 0), e < 0 && (e = 0), e
	}

	function T() {
		function o(e) {
			var n = new Image;
			n.onload = function() {
				i && i.imagesLoaded && i.imagesLoaded++, i.imagesLoaded === i.imagesToLoad.length && (i.reInit(), t.onImagesReady && i.fireCallback(t.onImagesReady, i))
			}, n.src = e
		}
		var e = i.h.addEventListener,
			n = t.eventTarget === "wrapper" ? i.wrapper : i.container;
		!i.browser.ie10 && !i.browser.ie11 ? (i.support.touch && (e(n, "touchstart", I), e(n, "touchmove", U), e(n, "touchend", z)), t.simulateTouch && (e(n, "mousedown", I), e(document, "mousemove", U), e(document, "mouseup", z))) : (e(n, i.touchEvents.touchStart, I), e(document, i.touchEvents.touchMove, U), e(document, i.touchEvents.touchEnd, z)), t.autoResize && e(window, "resize", i.resizeFix), N(), i._wheelEvent = !1;
		if (t.mousewheelControl) {
			document.onmousewheel !== undefined && (i._wheelEvent = "mousewheel");
			try {
				new WheelEvent("wheel"), i._wheelEvent = "wheel"
			} catch (s) {}
			i._wheelEvent || (i._wheelEvent = "DOMMouseScroll"), i._wheelEvent && e(i.container, i._wheelEvent, A)
		}
		t.keyboardControl && e(document, "keydown", k);
		if (t.updateOnImagesReady) {
			i.imagesToLoad = r("img", i.container);
			for (var u = 0; u < i.imagesToLoad.length; u++) o(i.imagesToLoad[u].getAttribute("src"))
		}
	}

	function N() {
		var e = i.h.addEventListener,
			n;
		if (t.preventLinks) {
			var s = r("a", i.container);
			for (n = 0; n < s.length; n++) e(s[n], "click", P)
		}
		if (t.releaseFormElements) {
			var o = r("input, textarea, select", i.container);
			for (n = 0; n < o.length; n++) e(o[n], i.touchEvents.touchStart, H, !0)
		}
		if (t.onSlideClick)
			for (n = 0; n < i.slides.length; n++) e(i.slides[n], "click", M);
		if (t.onSlideTouch)
			for (n = 0; n < i.slides.length; n++) e(i.slides[n], i.touchEvents.touchStart, _)
	}

	function C() {
		var e = i.h.removeEventListener,
			n;
		if (t.onSlideClick)
			for (n = 0; n < i.slides.length; n++) e(i.slides[n], "click", M);
		if (t.onSlideTouch)
			for (n = 0; n < i.slides.length; n++) e(i.slides[n], i.touchEvents.touchStart, _);
		if (t.releaseFormElements) {
			var s = r("input, textarea, select", i.container);
			for (n = 0; n < s.length; n++) e(s[n], i.touchEvents.touchStart, H, !0)
		}
		if (t.preventLinks) {
			var o = r("a", i.container);
			for (n = 0; n < o.length; n++) e(o[n], "click", P)
		}
	}

	function k(e) {
		var t = e.keyCode || e.charCode;
		if (e.shiftKey || e.altKey || e.ctrlKey || e.metaKey) return;
		if (t === 37 || t === 39 || t === 38 || t === 40) {
			var n = !1,
				r = i.h.getOffset(i.container),
				s = i.h.windowScroll().left,
				o = i.h.windowScroll().top,
				u = i.h.windowWidth(),
				a = i.h.windowHeight(),
				f = [
					[r.left, r.top],
					[r.left + i.width, r.top],
					[r.left, r.top + i.height],
					[r.left + i.width, r.top + i.height]
				];
			for (var l = 0; l < f.length; l++) {
				var c = f[l];
				c[0] >= s && c[0] <= s + u && c[1] >= o && c[1] <= o + a && (n = !0)
			}
			if (!n) return
		}
		if (d) {
			if (t === 37 || t === 39) e.preventDefault ? e.preventDefault() : e.returnValue = !1;
			t === 39 && i.swipeNext(), t === 37 && i.swipePrev()
		} else {
			if (t === 38 || t === 40) e.preventDefault ? e.preventDefault() : e.returnValue = !1;
			t === 40 && i.swipeNext(), t === 38 && i.swipePrev()
		}
	}

	function A(e) {
		var n = i._wheelEvent,
			r = 0;
		if (e.detail) r = -e.detail;
		else if (n === "mousewheel")
			if (t.mousewheelControlForceToAxis)
				if (d) {
					if (!(Math.abs(e.wheelDeltaX) > Math.abs(e.wheelDeltaY))) return;
					r = e.wheelDeltaX
				} else {
					if (!(Math.abs(e.wheelDeltaY) > Math.abs(e.wheelDeltaX))) return;
					r = e.wheelDeltaY
				} else r = e.wheelDelta;
		else if (n === "DOMMouseScroll") r = -e.detail;
		else if (n === "wheel")
			if (t.mousewheelControlForceToAxis)
				if (d) {
					if (!(Math.abs(e.deltaX) > Math.abs(e.deltaY))) return;
					r = -e.deltaX
				} else {
					if (!(Math.abs(e.deltaY) > Math.abs(e.deltaX))) return;
					r = -e.deltaY
				} else r = Math.abs(e.deltaX) > Math.abs(e.deltaY) ? -e.deltaX : -e.deltaY;
		if (!t.freeMode)(new Date).getTime() - L > 60 && (r < 0 ? i.swipeNext() : i.swipePrev()), L = (new Date).getTime();
		else {
			var s = i.getWrapperTranslate() + r;
			s > 0 && (s = 0), s < -x() && (s = -x()), i.setWrapperTransition(0), i.setWrapperTranslate(s), i.updateActiveSlide(s);
			if (s === 0 || s === -x()) return
		}
		return t.autoplay && i.stopAutoplay(!0), e.preventDefault ? e.preventDefault() : e.returnValue = !1, !1
	}

	function M(e) {
		i.allowSlideClick && (D(e), i.fireCallback(t.onSlideClick, i, e))
	}

	function _(e) {
		D(e), i.fireCallback(t.onSlideTouch, i, e)
	}

	function D(e) {
		if (!e.currentTarget) {
			var n = e.srcElement;
			do {
				if (n.className.indexOf(t.slideClass) > -1) break;
				n = n.parentNode
			} while (n);
			i.clickedSlide = n
		} else i.clickedSlide = e.currentTarget;
		i.clickedSlideIndex = i.slides.indexOf(i.clickedSlide), i.clickedSlideLoopIndex = i.clickedSlideIndex - (i.loopedSlides || 0)
	}

	function P(e) {
		if (!i.allowLinks) return e.preventDefault ? e.preventDefault() : e.returnValue = !1, t.preventLinksPropagation && "stopPropagation" in e && e.stopPropagation(), !1
	}

	function H(e) {
		return e.stopPropagation ? e.stopPropagation() : e.returnValue = !1, !1
	}

	function I(e) {
		t.preventLinks && (i.allowLinks = !0);
		if (i.isTouched || t.onlyExternal) return !1;
		if (t.noSwiping && (e.target || e.srcElement) && W(e.target || e.srcElement)) return !1;
		F = !1, i.isTouched = !0, B = e.type === "touchstart";
		if (!B || e.targetTouches.length === 1) {
			i.callPlugins("onTouchStartBegin"), !B && !i.isAndroid && (e.preventDefault ? e.preventDefault() : e.returnValue = !1);
			var n = B ? e.targetTouches[0].pageX : e.pageX || e.clientX,
				r = B ? e.targetTouches[0].pageY : e.pageY || e.clientY;
			i.touches.startX = i.touches.currentX = n, i.touches.startY = i.touches.currentY = r, i.touches.start = i.touches.current = d ? n : r, i.setWrapperTransition(0), i.positions.start = i.positions.current = i.getWrapperTranslate(), i.setWrapperTranslate(i.positions.start), i.times.start = (new Date).getTime(), f = undefined, t.moveStartThreshold > 0 && (j = !1), t.onTouchStart && i.fireCallback(t.onTouchStart, i), i.callPlugins("onTouchStartEnd")
		}
	}

	function U(e) {
		if (!i.isTouched || t.onlyExternal) return;
		if (B && e.type === "mousemove") return;
		var n = B ? e.targetTouches[0].pageX : e.pageX || e.clientX,
			r = B ? e.targetTouches[0].pageY : e.pageY || e.clientY;
		typeof f == "undefined" && d && (f = !!(f || Math.abs(r - i.touches.startY) > Math.abs(n - i.touches.startX))), typeof f == "undefined" && !d && (f = !!(f || Math.abs(r - i.touches.startY) < Math.abs(n - i.touches.startX)));
		if (f) {
			i.isTouched = !1;
			return
		}
		if (e.assignedToSwiper) {
			i.isTouched = !1;
			return
		}
		e.assignedToSwiper = !0, t.preventLinks && (i.allowLinks = !1), t.onSlideClick && (i.allowSlideClick = !1), t.autoplay && i.stopAutoplay(!0);
		if (!B || e.touches.length === 1) {
			i.isMoved || (i.callPlugins("onTouchMoveStart"), t.loop && (i.fixLoop(), i.positions.start = i.getWrapperTranslate()), t.onTouchMoveStart && i.fireCallback(t.onTouchMoveStart, i)), i.isMoved = !0, e.preventDefault ? e.preventDefault() : e.returnValue = !1, i.touches.current = d ? n : r, i.positions.current = (i.touches.current - i.touches.start) * t.touchRatio + i.positions.start, i.positions.current > 0 && t.onResistanceBefore && i.fireCallback(t.onResistanceBefore, i, i.positions.current), i.positions.current < -x() && t.onResistanceAfter && i.fireCallback(t.onResistanceAfter, i, Math.abs(i.positions.current + x()));
			if (t.resistance && t.resistance !== "100%") {
				var s;
				i.positions.current > 0 && (s = 1 - i.positions.current / l / 2, s < .5 ? i.positions.current = l / 2 : i.positions.current = i.positions.current * s);
				if (i.positions.current < -x()) {
					var o = (i.touches.current - i.touches.start) * t.touchRatio + (x() + i.positions.start);
					s = (l + o) / l;
					var u = i.positions.current - o * (1 - s) / 2,
						a = -x() - l / 2;
					u < a || s <= 0 ? i.positions.current = a : i.positions.current = u
				}
			}
			t.resistance && t.resistance === "100%" && (i.positions.current > 0 && (!t.freeMode || !!t.freeModeFluid) && (i.positions.current = 0), i.positions.current < -x() && (!t.freeMode || !!t.freeModeFluid) && (i.positions.current = -x()));
			if (!t.followFinger) return;
			if (!t.moveStartThreshold) i.setWrapperTranslate(i.positions.current);
			else if (Math.abs(i.touches.current - i.touches.start) > t.moveStartThreshold || j) {
				if (!j) {
					j = !0, i.touches.start = i.touches.current;
					return
				}
				i.setWrapperTranslate(i.positions.current)
			} else i.positions.current = i.positions.start;
			return (t.freeMode || t.watchActiveIndex) && i.updateActiveSlide(i.positions.current), t.grabCursor && (i.container.style.cursor = "move", i.container.style.cursor = "grabbing", i.container.style.cursor = "-moz-grabbin", i.container.style.cursor = "-webkit-grabbing"), q || (q = i.touches.current), R || (R = (new Date).getTime()), i.velocity = (i.touches.current - q) / ((new Date).getTime() - R) / 2, Math.abs(i.touches.current - q) < 2 && (i.velocity = 0), q = i.touches.current, R = (new Date).getTime(), i.callPlugins("onTouchMoveEnd"), t.onTouchMove && i.fireCallback(t.onTouchMove, i), !1
		}
	}

	function z(e) {
		f && i.swipeReset();
		if (t.onlyExternal || !i.isTouched) return;
		i.isTouched = !1, t.grabCursor && (i.container.style.cursor = "move", i.container.style.cursor = "grab", i.container.style.cursor = "-moz-grab", i.container.style.cursor = "-webkit-grab"), !i.positions.current && i.positions.current !== 0 && (i.positions.current = i.positions.start), t.followFinger && i.setWrapperTranslate(i.positions.current), i.times.end = (new Date).getTime(), i.touches.diff = i.touches.current - i.touches.start, i.touches.abs = Math.abs(i.touches.diff), i.positions.diff = i.positions.current - i.positions.start, i.positions.abs = Math.abs(i.positions.diff);
		var n = i.positions.diff,
			r = i.positions.abs,
			s = i.times.end - i.times.start;
		r < 5 && s < 300 && i.allowLinks === !1 && (!t.freeMode && r !== 0 && i.swipeReset(), t.preventLinks && (i.allowLinks = !0), t.onSlideClick && (i.allowSlideClick = !0)), setTimeout(function() {
			t.preventLinks && (i.allowLinks = !0), t.onSlideClick && (i.allowSlideClick = !0)
		}, 100);
		var u = x();
		if (!i.isMoved && t.freeMode) {
			i.isMoved = !1, t.onTouchEnd && i.fireCallback(t.onTouchEnd, i), i.callPlugins("onTouchEnd");
			return
		}
		if (!i.isMoved || i.positions.current > 0 || i.positions.current < -u) {
			i.swipeReset(), t.onTouchEnd && i.fireCallback(t.onTouchEnd, i), i.callPlugins("onTouchEnd");
			return
		}
		i.isMoved = !1;
		if (t.freeMode) {
			if (t.freeModeFluid) {
				var c = 1e3 * t.momentumRatio,
					h = i.velocity * c,
					p = i.positions.current + h,
					v = !1,
					m, g = Math.abs(i.velocity) * 20 * t.momentumBounceRatio;
				p < -u && (t.momentumBounce && i.support.transitions ? (p + u < -g && (p = -u - g), m = -u, v = !0, F = !0) : p = -u), p > 0 && (t.momentumBounce && i.support.transitions ? (p > g && (p = g), m = 0, v = !0, F = !0) : p = 0), i.velocity !== 0 && (c = Math.abs((p - i.positions.current) / i.velocity)), i.setWrapperTranslate(p), i.setWrapperTransition(c), t.momentumBounce && v && i.wrapperTransitionEnd(function() {
					if (!F) return;
					t.onMomentumBounce && i.fireCallback(t.onMomentumBounce, i), i.callPlugins("onMomentumBounce"), i.setWrapperTranslate(m), i.setWrapperTransition(300)
				}), i.updateActiveSlide(p)
			}(!t.freeModeFluid || s >= 300) && i.updateActiveSlide(i.positions.current), t.onTouchEnd && i.fireCallback(t.onTouchEnd, i), i.callPlugins("onTouchEnd");
			return
		}
		a = n < 0 ? "toNext" : "toPrev", a === "toNext" && s <= 300 && (r < 30 || !t.shortSwipes ? i.swipeReset() : i.swipeNext(!0)), a === "toPrev" && s <= 300 && (r < 30 || !t.shortSwipes ? i.swipeReset() : i.swipePrev(!0));
		var y = 0;
		if (t.slidesPerView === "auto") {
			var b = Math.abs(i.getWrapperTranslate()),
				w = 0,
				E;
			for (var S = 0; S < i.slides.length; S++) {
				E = d ? i.slides[S].getWidth(!0) : i.slides[S].getHeight(!0), w += E;
				if (w > b) {
					y = E;
					break
				}
			}
			y > l && (y = l)
		} else y = o * t.slidesPerView;
		a === "toNext" && s > 300 && (r >= y * t.longSwipesRatio ? i.swipeNext(!0) : i.swipeReset()), a === "toPrev" && s > 300 && (r >= y * t.longSwipesRatio ? i.swipePrev(!0) : i.swipeReset()), t.onTouchEnd && i.fireCallback(t.onTouchEnd, i), i.callPlugins("onTouchEnd")
	}

	function W(e) {
		var n = !1;
		do e.className.indexOf(t.noSwipingClass) > -1 && (n = !0), e = e.parentElement; while (!n && e.parentElement && e.className.indexOf(t.wrapperClass) === -1);
		return !n && e.className.indexOf(t.wrapperClass) > -1 && e.className.indexOf(t.noSwipingClass) > -1 && (n = !0), n
	}

	function X(e, t) {
		var n = document.createElement("div"),
			r;
		return n.innerHTML = t, r = n.firstChild, r.className += " " + e, r.outerHTML
	}

	function V(e, n, r) {
		function u() {
			var n = +(new Date),
				r = n - o;
			a += f * r / (1e3 / 60), c = l === "toNext" ? a > e : a < e, c ? (i.setWrapperTranslate(Math.round(a)), i._DOMAnimating = !0, window.setTimeout(function() {
				u()
			}, 1e3 / 60)) : (t.onSlideChangeEnd && i.fireCallback(t.onSlideChangeEnd, i), i.setWrapperTranslate(e), i._DOMAnimating = !1)
		}
		var s = n === "to" && r.speed >= 0 ? r.speed : t.speed,
			o = +(new Date);
		if (i.support.transitions || !t.DOMAnimation) i.setWrapperTranslate(e), i.setWrapperTransition(s);
		else {
			var a = i.getWrapperTranslate(),
				f = Math.ceil((e - a) / s * (1e3 / 60)),
				l = a > e ? "toNext" : "toPrev",
				c = l === "toNext" ? a > e : a < e;
			if (i._DOMAnimating) return;
			u()
		}
		i.updateActiveSlide(e), t.onSlideNext && n === "next" && i.fireCallback(t.onSlideNext, i, e), t.onSlidePrev && n === "prev" && i.fireCallback(t.onSlidePrev, i, e), t.onSlideReset && n === "reset" && i.fireCallback(t.onSlideReset, i, e), (n === "next" || n === "prev" || n === "to" && r.runCallbacks === !0) && $(n)
	}

	function $(e) {
		i.callPlugins("onSlideChangeStart");
		if (t.onSlideChangeStart)
			if (t.queueStartCallbacks && i.support.transitions) {
				if (i._queueStartCallbacks) return;
				i._queueStartCallbacks = !0, i.fireCallback(t.onSlideChangeStart, i, e), i.wrapperTransitionEnd(function() {
					i._queueStartCallbacks = !1
				})
			} else i.fireCallback(t.onSlideChangeStart, i, e);
		if (t.onSlideChangeEnd)
			if (i.support.transitions)
				if (t.queueEndCallbacks) {
					if (i._queueEndCallbacks) return;
					i._queueEndCallbacks = !0, i.wrapperTransitionEnd(function(n) {
						i.fireCallback(t.onSlideChangeEnd, n, e)
					})
				} else i.wrapperTransitionEnd(function(n) {
					i.fireCallback(t.onSlideChangeEnd, n, e)
				});
		else t.DOMAnimation || setTimeout(function() {
			i.fireCallback(t.onSlideChangeEnd, i, e)
		}, 10)
	}

	function J() {
		var e = i.paginationButtons;
		if (e)
			for (var t = 0; t < e.length; t++) i.h.removeEventListener(e[t], "click", Q)
	}

	function K() {
		var e = i.paginationButtons;
		if (e)
			for (var t = 0; t < e.length; t++) i.h.addEventListener(e[t], "click", Q)
	}

	function Q(e) {
		var t, n = e.target || e.srcElement,
			r = i.paginationButtons;
		for (var s = 0; s < r.length; s++) n === r[s] && (t = s);
		i.swipeTo(t)
	}

	function Z() {
		G = setTimeout(function() {
			t.loop ? (i.fixLoop(), i.swipeNext(!0)) : i.swipeNext(!0) || (t.autoplayStopOnLast ? (clearTimeout(G), G = undefined) : i.swipeTo(0)), i.wrapperTransitionEnd(function() {
				typeof G != "undefined" && Z()
			})
		}, t.autoplay)
	}

	function et() {
		i.calcSlides(), t.loader.slides.length > 0 && i.slides.length === 0 && i.loadSlides(), t.loop && i.createLoop(), i.init(), T(), t.pagination && i.createPagination(!0), t.loop || t.initialSlide > 0 ? i.swipeTo(t.initialSlide, 0, !1) : i.updateActiveSlide(0), t.autoplay && i.startAutoplay(), i.centerIndex = i.activeIndex, t.onSwiperCreated && i.fireCallback(t.onSwiperCreated, i), i.callPlugins("onSwiperCreated")
	}
	if (document.body.__defineGetter__ && HTMLElement) {
		var n = HTMLElement.prototype;
		n.__defineGetter__ && n.__defineGetter__("outerHTML", function() {
			return (new XMLSerializer).serializeToString(this)
		})
	}
	window.getComputedStyle || (window.getComputedStyle = function(e, t) {
		return this.el = e, this.getPropertyValue = function(t) {
			var n = /(\-([a-z]){1})/g;
			return t === "float" && (t = "styleFloat"), n.test(t) && (t = t.replace(n, function() {
				return arguments[2].toUpperCase()
			})), e.currentStyle[t] ? e.currentStyle[t] : null
		}, this
	}), Array.prototype.indexOf || (Array.prototype.indexOf = function(e, t) {
		for (var n = t || 0, r = this.length; n < r; n++)
			if (this[n] === e) return n;
		return -1
	});
	if (!document.querySelectorAll && !window.jQuery) return;
	if (typeof e == "undefined") return;
	if (!e.nodeType && r(e).length === 0) return;
	var i = this;
	i.touches = {
		start: 0,
		startX: 0,
		startY: 0,
		current: 0,
		currentX: 0,
		currentY: 0,
		diff: 0,
		abs: 0
	}, i.positions = {
		start: 0,
		abs: 0,
		diff: 0,
		current: 0
	}, i.times = {
		start: 0,
		end: 0
	}, i.id = (new Date).getTime(), i.container = e.nodeType ? e : r(e)[0], i.isTouched = !1, i.isMoved = !1, i.activeIndex = 0, i.centerIndex = 0, i.activeLoaderIndex = 0, i.activeLoopIndex = 0, i.previousIndex = null, i.velocity = 0, i.snapGrid = [], i.slidesGrid = [], i.imagesToLoad = [], i.imagesLoaded = 0, i.wrapperLeft = 0, i.wrapperRight = 0, i.wrapperTop = 0, i.wrapperBottom = 0, i.isAndroid = navigator.userAgent.toLowerCase().indexOf("android") >= 0;
	var s, o, u, a, f, l, c = {
		eventTarget: "wrapper",
		mode: "horizontal",
		touchRatio: 1,
		speed: 300,
		freeMode: !1,
		freeModeFluid: !1,
		momentumRatio: 1,
		momentumBounce: !0,
		momentumBounceRatio: 1,
		slidesPerView: 1,
		slidesPerGroup: 1,
		slidesPerViewFit: !0,
		simulateTouch: !0,
		followFinger: !0,
		shortSwipes: !0,
		longSwipesRatio: .5,
		moveStartThreshold: !1,
		onlyExternal: !1,
		createPagination: !0,
		pagination: !1,
		paginationElement: "span",
		paginationClickable: !1,
		paginationAsRange: !0,
		resistance: !0,
		scrollContainer: !1,
		preventLinks: !0,
		preventLinksPropagation: !1,
		noSwiping: !1,
		noSwipingClass: "swiper-no-swiping",
		initialSlide: 0,
		keyboardControl: !1,
		mousewheelControl: !1,
		mousewheelControlForceToAxis: !1,
		useCSS3Transforms: !0,
		autoplay: !1,
		autoplayDisableOnInteraction: !0,
		autoplayStopOnLast: !1,
		loop: !1,
		loopAdditionalSlides: 0,
		calculateHeight: !1,
		cssWidthAndHeight: !1,
		updateOnImagesReady: !0,
		releaseFormElements: !0,
		watchActiveIndex: !1,
		visibilityFullFit: !1,
		offsetPxBefore: 0,
		offsetPxAfter: 0,
		offsetSlidesBefore: 0,
		offsetSlidesAfter: 0,
		centeredSlides: !1,
		queueStartCallbacks: !1,
		queueEndCallbacks: !1,
		autoResize: !0,
		resizeReInit: !1,
		DOMAnimation: !0,
		loader: {
			slides: [],
			slidesHTMLType: "inner",
			surroundGroups: 1,
			logic: "reload",
			loadAllSlides: !1
		},
		slideElement: "div",
		slideClass: "swiper-slide",
		slideActiveClass: "swiper-slide-active",
		slideVisibleClass: "swiper-slide-visible",
		slideDuplicateClass: "swiper-slide-duplicate",
		wrapperClass: "swiper-wrapper",
		paginationElementClass: "swiper-pagination-switch",
		paginationActiveClass: "swiper-active-switch",
		paginationVisibleClass: "swiper-visible-switch"
	};
	t = t || {};
	for (var h in c)
		if (h in t && typeof t[h] == "object")
			for (var p in c[h]) p in t[h] || (t[h][p] = c[h][p]);
		else h in t || (t[h] = c[h]);
	i.params = t, t.scrollContainer && (t.freeMode = !0, t.freeModeFluid = !0), t.loop && (t.resistance = "100%");
	var d = t.mode === "horizontal",
		v = ["mousedown", "mousemove", "mouseup"];
	i.browser.ie10 && (v = ["MSPointerDown", "MSPointerMove", "MSPointerUp"]), i.browser.ie11 && (v = ["pointerdown", "pointermove", "pointerup"]), i.touchEvents = {
		touchStart: i.support.touch || !t.simulateTouch ? "touchstart" : v[0],
		touchMove: i.support.touch || !t.simulateTouch ? "touchmove" : v[1],
		touchEnd: i.support.touch || !t.simulateTouch ? "touchend" : v[2]
	};
	for (var m = i.container.childNodes.length - 1; m >= 0; m--)
		if (i.container.childNodes[m].className) {
			var g = i.container.childNodes[m].className.split(/\s+/);
			for (var y = 0; y < g.length; y++) g[y] === t.wrapperClass && (s = i.container.childNodes[m])
		}
	i.wrapper = s, i._extendSwiperSlide = function(e) {
		return e.append = function() {
			return t.loop ? e.insertAfter(i.slides.length - i.loopedSlides) : (i.wrapper.appendChild(e), i.reInit()), e
		}, e.prepend = function() {
			return t.loop ? (i.wrapper.insertBefore(e, i.slides[i.loopedSlides]), i.removeLoopedSlides(), i.calcSlides(), i.createLoop()) : i.wrapper.insertBefore(e, i.wrapper.firstChild), i.reInit(), e
		}, e.insertAfter = function(n) {
			if (typeof n == "undefined") return !1;
			var r;
			return t.loop ? (r = i.slides[n + 1 + i.loopedSlides], r ? i.wrapper.insertBefore(e, r) : i.wrapper.appendChild(e), i.removeLoopedSlides(), i.calcSlides(), i.createLoop()) : (r = i.slides[n + 1], i.wrapper.insertBefore(e, r)), i.reInit(), e
		}, e.clone = function() {
			return i._extendSwiperSlide(e.cloneNode(!0))
		}, e.remove = function() {
			i.wrapper.removeChild(e), i.reInit()
		}, e.html = function(t) {
			return typeof t == "undefined" ? e.innerHTML : (e.innerHTML = t, e)
		}, e.index = function() {
			var t;
			for (var n = i.slides.length - 1; n >= 0; n--) e === i.slides[n] && (t = n);
			return t
		}, e.isActive = function() {
			return e.index() === i.activeIndex ? !0 : !1
		}, e.swiperSlideDataStorage || (e.swiperSlideDataStorage = {}), e.getData = function(t) {
			return e.swiperSlideDataStorage[t]
		}, e.setData = function(t, n) {
			return e.swiperSlideDataStorage[t] = n, e
		}, e.data = function(t, n) {
			return typeof n == "undefined" ? e.getAttribute("data-" + t) : (e.setAttribute("data-" + t, n), e)
		}, e.getWidth = function(t) {
			return i.h.getWidth(e, t)
		}, e.getHeight = function(t) {
			return i.h.getHeight(e, t)
		}, e.getOffset = function() {
			return i.h.getOffset(e)
		}, e
	}, i.calcSlides = function(e) {
		var n = i.slides ? i.slides.length : !1;
		i.slides = [], i.displaySlides = [];
		for (var r = 0; r < i.wrapper.childNodes.length; r++)
			if (i.wrapper.childNodes[r].className) {
				var s = i.wrapper.childNodes[r].className,
					o = s.split(/\s+/);
				for (var u = 0; u < o.length; u++) o[u] === t.slideClass && i.slides.push(i.wrapper.childNodes[r])
			}
		for (r = i.slides.length - 1; r >= 0; r--) i._extendSwiperSlide(i.slides[r]);
		if (n === !1) return;
		if (n !== i.slides.length || e) C(), N(), i.updateActiveSlide(), i.params.pagination && i.createPagination(), i.callPlugins("numberOfSlidesChanged")
	}, i.createSlide = function(e, n, r) {
		n = n || i.params.slideClass, r = r || t.slideElement;
		var s = document.createElement(r);
		return s.innerHTML = e || "", s.className = n, i._extendSwiperSlide(s)
	}, i.appendSlide = function(e, t, n) {
		if (!e) return;
		return e.nodeType ? i._extendSwiperSlide(e).append() : i.createSlide(e, t, n).append()
	}, i.prependSlide = function(e, t, n) {
		if (!e) return;
		return e.nodeType ? i._extendSwiperSlide(e).prepend() : i.createSlide(e, t, n).prepend()
	}, i.insertSlideAfter = function(e, t, n, r) {
		return typeof e == "undefined" ? !1 : t.nodeType ? i._extendSwiperSlide(t).insertAfter(e) : i.createSlide(t, n, r).insertAfter(e)
	}, i.removeSlide = function(e) {
		if (i.slides[e]) {
			if (t.loop) {
				if (!i.slides[e + i.loopedSlides]) return !1;
				i.slides[e + i.loopedSlides].remove(), i.removeLoopedSlides(), i.calcSlides(), i.createLoop()
			} else i.slides[e].remove();
			return !0
		}
		return !1
	}, i.removeLastSlide = function() {
		return i.slides.length > 0 ? (t.loop ? (i.slides[i.slides.length - 1 - i.loopedSlides].remove(), i.removeLoopedSlides(), i.calcSlides(), i.createLoop()) : i.slides[i.slides.length - 1].remove(), !0) : !1
	}, i.removeAllSlides = function() {
		for (var e = i.slides.length - 1; e >= 0; e--) i.slides[e].remove()
	}, i.getSlide = function(e) {
		return i.slides[e]
	}, i.getLastSlide = function() {
		return i.slides[i.slides.length - 1]
	}, i.getFirstSlide = function() {
		return i.slides[0]
	}, i.activeSlide = function() {
		return i.slides[i.activeIndex]
	}, i.fireCallback = function() {
		var e = arguments[0];
		if (Object.prototype.toString.call(e) === "[object Array]")
			for (var n = 0; n < e.length; n++) typeof e[n] == "function" && e[n](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
		else Object.prototype.toString.call(e) === "[object String]" ? t["on" + e] && i.fireCallback(t["on" + e]) : e(arguments[1], arguments[2], arguments[3], arguments[4], arguments[5])
	}, i.addCallback = function(e, t) {
		var n = this,
			r;
		if (!n.params["on" + e]) return this.params["on" + e] = [], this.params["on" + e].push(t);
		if (b(this.params["on" + e])) return this.params["on" + e].push(t);
		if (typeof this.params["on" + e] == "function") return r = this.params["on" + e], this.params["on" + e] = [], this.params["on" + e].push(r), this.params["on" + e].push(t)
	}, i.removeCallbacks = function(e) {
		i.params["on" + e] && (i.params["on" + e] = null)
	};
	var w = [];
	for (var E in i.plugins)
		if (t[E]) {
			var S = i.plugins[E](i, t[E]);
			S && w.push(S)
		}
	i.callPlugins = function(e, t) {
		t || (t = {});
		for (var n = 0; n < w.length; n++) e in w[n] && w[n][e](t)
	}, (i.browser.ie10 || i.browser.ie11) && !t.onlyExternal && i.wrapper.classList.add("swiper-wp8-" + (d ? "horizontal" : "vertical")), t.freeMode && (i.container.className += " swiper-free-mode"), i.initialized = !1, i.init = function(e, n) {
		var r = i.h.getWidth(i.container),
			s = i.h.getHeight(i.container);
		if (r === i.width && s === i.height && !e) return;
		if (r === 0 || s === 0) return;
		i.width = r, i.height = s;
		var a, f, c, h, p, v, m;
		l = d ? r : s;
		var g = i.wrapper;
		e && i.calcSlides(n);
		if (t.slidesPerView === "auto") {
			var y = 0,
				b = 0;
			t.slidesOffset > 0 && (g.style.paddingLeft = "", g.style.paddingRight = "", g.style.paddingTop = "", g.style.paddingBottom = ""), g.style.width = "", g.style.height = "", t.offsetPxBefore > 0 && (d ? i.wrapperLeft = t.offsetPxBefore : i.wrapperTop = t.offsetPxBefore), t.offsetPxAfter > 0 && (d ? i.wrapperRight = t.offsetPxAfter : i.wrapperBottom = t.offsetPxAfter), t.centeredSlides && (d ? (i.wrapperLeft = (l - this.slides[0].getWidth(!0)) / 2, i.wrapperRight = (l - i.slides[i.slides.length - 1].getWidth(!0)) / 2) : (i.wrapperTop = (l - i.slides[0].getHeight(!0)) / 2, i.wrapperBottom = (l - i.slides[i.slides.length - 1].getHeight(!0)) / 2)), d ? (i.wrapperLeft >= 0 && (g.style.paddingLeft = i.wrapperLeft + "px"), i.wrapperRight >= 0 && (g.style.paddingRight = i.wrapperRight + "px")) : (i.wrapperTop >= 0 && (g.style.paddingTop = i.wrapperTop + "px"), i.wrapperBottom >= 0 && (g.style.paddingBottom = i.wrapperBottom + "px")), v = 0;
			var w = 0;
			i.snapGrid = [], i.slidesGrid = [], c = 0;
			for (m = 0; m < i.slides.length; m++) {
				a = i.slides[m].getWidth(!0), f = i.slides[m].getHeight(!0), t.calculateHeight && (c = Math.max(c, f));
				var E = d ? a : f;
				if (t.centeredSlides) {
					var S = m === i.slides.length - 1 ? 0 : i.slides[m + 1].getWidth(!0),
						x = m === i.slides.length - 1 ? 0 : i.slides[m + 1].getHeight(!0),
						T = d ? S : x;
					if (E > l) {
						if (t.slidesPerViewFit) i.snapGrid.push(v + i.wrapperLeft), i.snapGrid.push(v + E - l + i.wrapperLeft);
						else
							for (var N = 0; N <= Math.floor(E / (l + i.wrapperLeft)); N++) N === 0 ? i.snapGrid.push(v + i.wrapperLeft) : i.snapGrid.push(v + i.wrapperLeft + l * N);
						i.slidesGrid.push(v + i.wrapperLeft)
					} else i.snapGrid.push(w), i.slidesGrid.push(w);
					w += E / 2 + T / 2
				} else {
					if (E > l)
						if (t.slidesPerViewFit) i.snapGrid.push(v), i.snapGrid.push(v + E - l);
						else
							for (var C = 0; C <= Math.floor(E / l); C++) i.snapGrid.push(v + l * C);
					else i.snapGrid.push(v);
					i.slidesGrid.push(v)
				}
				v += E, y += a, b += f
			}
			t.calculateHeight && (i.height = c), d ? (u = y + i.wrapperRight + i.wrapperLeft, g.style.width = y + "px", g.style.height = i.height + "px") : (u = b + i.wrapperTop + i.wrapperBottom, g.style.width = i.width + "px", g.style.height = b + "px")
		} else if (t.scrollContainer) g.style.width = "", g.style.height = "", h = i.slides[0].getWidth(!0), p = i.slides[0].getHeight(!0), u = d ? h : p, g.style.width = h + "px", g.style.height = p + "px", o = d ? h : p;
		else {
			if (t.calculateHeight) {
				c = 0, p = 0, d || (i.container.style.height = ""), g.style.height = "";
				for (m = 0; m < i.slides.length; m++) i.slides[m].style.height = "", c = Math.max(i.slides[m].getHeight(!0), c), d || (p += i.slides[m].getHeight(!0));
				f = c, i.height = f, d ? p = f : (l = f, i.container.style.height = l + "px")
			} else f = d ? i.height : i.height / t.slidesPerView, p = d ? i.height : i.slides.length * f;
			a = d ? i.width / t.slidesPerView : i.width, h = d ? i.slides.length * a : i.width, o = d ? a : f, t.offsetSlidesBefore > 0 && (d ? i.wrapperLeft = o * t.offsetSlidesBefore : i.wrapperTop = o * t.offsetSlidesBefore), t.offsetSlidesAfter > 0 && (d ? i.wrapperRight = o * t.offsetSlidesAfter : i.wrapperBottom = o * t.offsetSlidesAfter), t.offsetPxBefore > 0 && (d ? i.wrapperLeft = t.offsetPxBefore : i.wrapperTop = t.offsetPxBefore), t.offsetPxAfter > 0 && (d ? i.wrapperRight = t.offsetPxAfter : i.wrapperBottom = t.offsetPxAfter), t.centeredSlides && (d ? (i.wrapperLeft = (l - o) / 2, i.wrapperRight = (l - o) / 2) : (i.wrapperTop = (l - o) / 2, i.wrapperBottom = (l - o) / 2)), d ? (i.wrapperLeft > 0 && (g.style.paddingLeft = i.wrapperLeft + "px"), i.wrapperRight > 0 && (g.style.paddingRight = i.wrapperRight + "px")) : (i.wrapperTop > 0 && (g.style.paddingTop = i.wrapperTop + "px"), i.wrapperBottom > 0 && (g.style.paddingBottom = i.wrapperBottom + "px")), u = d ? h + i.wrapperRight + i.wrapperLeft : p + i.wrapperTop + i.wrapperBottom, t.cssWidthAndHeight || (parseFloat(h) > 0 && (g.style.width = h + "px"), parseFloat(p) > 0 && (g.style.height = p + "px")), v = 0, i.snapGrid = [], i.slidesGrid = [];
			for (m = 0; m < i.slides.length; m++) i.snapGrid.push(v), i.slidesGrid.push(v), v += o, t.cssWidthAndHeight || (parseFloat(a) > 0 && (i.slides[m].style.width = a + "px"), parseFloat(f) > 0 && (i.slides[m].style.height = f + "px"))
		}
		i.initialized ? (i.callPlugins("onInit"), t.onInit && i.fireCallback(t.onInit, i)) : (i.callPlugins("onFirstInit"), t.onFirstInit && i.fireCallback(t.onFirstInit, i)), i.initialized = !0
	}, i.reInit = function(e) {
		i.init(!0, e)
	}, i.resizeFix = function(e) {
		i.callPlugins("beforeResizeFix"), i.init(t.resizeReInit || e), t.freeMode ? i.getWrapperTranslate() < -x() && (i.setWrapperTransition(0), i.setWrapperTranslate(-x())) : (i.swipeTo(t.loop ? i.activeLoopIndex : i.activeIndex, 0, !1), t.autoplay && (i.support.transitions && typeof G != "undefined" ? typeof G != "undefined" && (clearTimeout(G), G = undefined, i.startAutoplay()) : typeof Y != "undefined" && (clearInterval(Y), Y = undefined, i.startAutoplay()))), i.callPlugins("afterResizeFix")
	}, i.destroy = function() {
		var e = i.h.removeEventListener,
			n = t.eventTarget === "wrapper" ? i.wrapper : i.container;
		!i.browser.ie10 && !i.browser.ie11 ? (i.support.touch && (e(n, "touchstart", I), e(n, "touchmove", U), e(n, "touchend", z)), t.simulateTouch && (e(n, "mousedown", I), e(document, "mousemove", U), e(document, "mouseup", z))) : (e(n, i.touchEvents.touchStart, I), e(document, i.touchEvents.touchMove, U), e(document, i.touchEvents.touchEnd, z)), t.autoResize && e(window, "resize", i.resizeFix), C(), t.paginationClickable && J(), t.mousewheelControl && i._wheelEvent && e(i.container, i._wheelEvent, A), t.keyboardControl && e(document, "keydown", k), t.autoplay && i.stopAutoplay(), i.callPlugins("onDestroy"), i = null
	}, i.disableKeyboardControl = function() {
		t.keyboardControl = !1, i.h.removeEventListener(document, "keydown", k)
	}, i.enableKeyboardControl = function() {
		t.keyboardControl = !0, i.h.addEventListener(document, "keydown", k)
	};
	var L = (new Date).getTime();
	if (t.grabCursor) {
		var O = i.container.style;
		O.cursor = "move", O.cursor = "grab", O.cursor = "-moz-grab", O.cursor = "-webkit-grab"
	}
	i.allowSlideClick = !0, i.allowLinks = !0;
	var B = !1,
		j, F = !0,
		q, R;
	i.swipeNext = function(e) {
		!e && t.loop && i.fixLoop(), !e && t.autoplay && i.stopAutoplay(!0), i.callPlugins("onSwipeNext");
		var n = i.getWrapperTranslate(),
			r = n;
		if (t.slidesPerView === "auto") {
			for (var s = 0; s < i.snapGrid.length; s++)
				if (-n >= i.snapGrid[s] && -n < i.snapGrid[s + 1]) {
					r = -i.snapGrid[s + 1];
					break
				}
		} else {
			var u = o * t.slidesPerGroup;
			r = -(Math.floor(Math.abs(n) / Math.floor(u)) * u + u)
		}
		return r < -x() && (r = -x()), r === n ? !1 : (V(r, "next"), !0)
	}, i.swipePrev = function(e) {
		!e && t.loop && i.fixLoop(), !e && t.autoplay && i.stopAutoplay(!0), i.callPlugins("onSwipePrev");
		var n = Math.ceil(i.getWrapperTranslate()),
			r;
		if (t.slidesPerView === "auto") {
			r = 0;
			for (var s = 1; s < i.snapGrid.length; s++) {
				if (-n === i.snapGrid[s]) {
					r = -i.snapGrid[s - 1];
					break
				}
				if (-n > i.snapGrid[s] && -n < i.snapGrid[s + 1]) {
					r = -i.snapGrid[s];
					break
				}
			}
		} else {
			var u = o * t.slidesPerGroup;
			r = -(Math.ceil(-n / u) - 1) * u
		}
		return r > 0 && (r = 0), r === n ? !1 : (V(r, "prev"), !0)
	}, i.swipeReset = function() {
		i.callPlugins("onSwipeReset");
		var e = i.getWrapperTranslate(),
			n = o * t.slidesPerGroup,
			r, s = -x();
		if (t.slidesPerView === "auto") {
			r = 0;
			for (var u = 0; u < i.snapGrid.length; u++) {
				if (-e === i.snapGrid[u]) return;
				if (-e >= i.snapGrid[u] && -e < i.snapGrid[u + 1]) {
					i.positions.diff > 0 ? r = -i.snapGrid[u + 1] : r = -i.snapGrid[u];
					break
				}
			} - e >= i.snapGrid[i.snapGrid.length - 1] && (r = -i.snapGrid[i.snapGrid.length - 1]), e <= -x() && (r = -x())
		} else r = e < 0 ? Math.round(e / n) * n : 0;
		return t.scrollContainer && (r = e < 0 ? e : 0), r < -x() && (r = -x()), t.scrollContainer && l > o && (r = 0), r === e ? !1 : (V(r, "reset"), !0)
	}, i.swipeTo = function(e, n, r) {
		e = parseInt(e, 10), i.callPlugins("onSwipeTo", {
			index: e,
			speed: n
		}), t.loop && (e += i.loopedSlides);
		var s = i.getWrapperTranslate();
		if (e > i.slides.length - 1 || e < 0) return;
		var u;
		return t.slidesPerView === "auto" ? u = -i.slidesGrid[e] : u = -e * o, u < -x() && (u = -x()), u === s ? !1 : (r = r === !1 ? !1 : !0, V(u, "to", {
			index: e,
			speed: n,
			runCallbacks: r
		}), !0)
	}, i._queueStartCallbacks = !1, i._queueEndCallbacks = !1, i.updateActiveSlide = function(e) {
		if (!i.initialized) return;
		if (i.slides.length === 0) return;
		i.previousIndex = i.activeIndex, typeof e == "undefined" && (e = i.getWrapperTranslate()), e > 0 && (e = 0);
		if (t.slidesPerView === "auto") {
			var n = 0;
			i.activeIndex = i.slidesGrid.indexOf(-e);
			if (i.activeIndex < 0) {
				for (var r = 0; r < i.slidesGrid.length - 1; r++)
					if (-e > i.slidesGrid[r] && -e < i.slidesGrid[r + 1]) break;
				var s = Math.abs(i.slidesGrid[r] + e),
					u = Math.abs(i.slidesGrid[r + 1] + e);
				s <= u ? i.activeIndex = r : i.activeIndex = r + 1
			}
		} else i.activeIndex = Math[t.visibilityFullFit ? "ceil" : "round"](-e / o);
		i.activeIndex === i.slides.length && (i.activeIndex = i.slides.length - 1), i.activeIndex < 0 && (i.activeIndex = 0);
		if (!i.slides[i.activeIndex]) return;
		i.calcVisibleSlides(e);
		var a = new RegExp("\\s*" + t.slideActiveClass),
			f = new RegExp("\\s*" + t.slideVisibleClass);
		for (var l = 0; l < i.slides.length; l++) i.slides[l].className = i.slides[l].className.replace(a, "").replace(f, "");
		if (t.loop) {
			var c = i.loopedSlides;
			i.activeLoopIndex = i.activeIndex - c, i.activeLoopIndex >= i.slides.length - c * 2 && (i.activeLoopIndex = i.slides.length - c * 2 - i.activeLoopIndex), i.activeLoopIndex < 0 && (i.activeLoopIndex = i.slides.length - c * 2 + i.activeLoopIndex), i.activeLoopIndex < 0 && (i.activeLoopIndex = 0)
		} else i.activeLoopIndex = i.activeIndex;
		t.pagination && i.updatePagination(e)
	}, i.createPagination = function(e) {
		t.paginationClickable && i.paginationButtons && J(), i.paginationContainer = t.pagination.nodeType ? t.pagination : r(t.pagination)[0];
		if (t.createPagination) {
			var n = "",
				s = i.slides.length,
				o = s;
			t.loop && (o -= i.loopedSlides * 2);
			for (var u = 0; u < o; u++) n += "<" + t.paginationElement + ' class="' + t.paginationElementClass + '"></' + t.paginationElement + ">";
			i.paginationContainer.innerHTML = n
		}
		i.paginationButtons = r("." + t.paginationElementClass, i.paginationContainer), e || i.updatePagination(), i.callPlugins("onCreatePagination"), t.paginationClickable && K()
	}, i.updatePagination = function(e) {
		if (!t.pagination) return;
		if (i.slides.length < 1) return;
		var n = r("." + t.paginationActiveClass, i.paginationContainer);
		if (!n) return;
		var s = i.paginationButtons;
		if (s.length === 0) return;
		for (var o = 0; o < s.length; o++) s[o].className = t.paginationElementClass;
		var u = t.loop ? i.loopedSlides : 0;
		if (t.paginationAsRange) {
			i.visibleSlides || i.calcVisibleSlides(e);
			var a = [],
				f;
			for (f = 0; f < i.visibleSlides.length; f++) {
				var l = i.slides.indexOf(i.visibleSlides[f]) - u;
				t.loop && l < 0 && (l = i.slides.length - i.loopedSlides * 2 + l), t.loop && l >= i.slides.length - i.loopedSlides * 2 && (l = i.slides.length - i.loopedSlides * 2 - l, l = Math.abs(l)), a.push(l)
			}
			for (f = 0; f < a.length; f++) s[a[f]] && (s[a[f]].className += " " + t.paginationVisibleClass);
			t.loop ? s[i.activeLoopIndex] !== undefined && (s[i.activeLoopIndex].className += " " + t.paginationActiveClass) : s[i.activeIndex].className += " " + t.paginationActiveClass
		} else t.loop ? s[i.activeLoopIndex] && (s[i.activeLoopIndex].className += " " + t.paginationActiveClass + " " + t.paginationVisibleClass) : s[i.activeIndex].className += " " + t.paginationActiveClass + " " + t.paginationVisibleClass
	}, i.calcVisibleSlides = function(e) {
		var n = [],
			r = 0,
			s = 0,
			u = 0;
		d && i.wrapperLeft > 0 && (e += i.wrapperLeft), !d && i.wrapperTop > 0 && (e += i.wrapperTop);
		for (var a = 0; a < i.slides.length; a++) {
			r += s, t.slidesPerView === "auto" ? s = d ? i.h.getWidth(i.slides[a], !0) : i.h.getHeight(i.slides[a], !0) : s = o, u = r + s;
			var f = !1;
			t.visibilityFullFit ? (r >= -e && u <= -e + l && (f = !0), r <= -e && u >= -e + l && (f = !0)) : (u > -e && u <= -e + l && (f = !0), r >= -e && r < -e + l && (f = !0), r < -e && u > -e + l && (f = !0)), f && n.push(i.slides[a])
		}
		n.length === 0 && (n = [i.slides[i.activeIndex]]), i.visibleSlides = n
	};
	var G, Y;
	i.startAutoplay = function() {
		if (i.support.transitions) {
			if (typeof G != "undefined") return !1;
			if (!t.autoplay) return;
			i.callPlugins("onAutoplayStart"), Z()
		} else {
			if (typeof Y != "undefined") return !1;
			if (!t.autoplay) return;
			i.callPlugins("onAutoplayStart"), Y = setInterval(function() {
				t.loop ? (i.fixLoop(), i.swipeNext(!0)) : i.swipeNext(!0) || (t.autoplayStopOnLast ? (clearInterval(Y), Y = undefined) : i.swipeTo(0))
			}, t.autoplay)
		}
	}, i.stopAutoplay = function(e) {
		if (i.support.transitions) {
			if (!G) return;
			G && clearTimeout(G), G = undefined, e && !t.autoplayDisableOnInteraction && i.wrapperTransitionEnd(function() {
				Z()
			}), i.callPlugins("onAutoplayStop")
		} else Y && clearInterval(Y), Y = undefined, i.callPlugins("onAutoplayStop")
	}, i.loopCreated = !1, i.removeLoopedSlides = function() {
		if (i.loopCreated)
			for (var e = 0; e < i.slides.length; e++) i.slides[e].getData("looped") === !0 && i.wrapper.removeChild(i.slides[e])
	}, i.createLoop = function() {
		if (i.slides.length === 0) return;
		t.slidesPerView === "auto" ? i.loopedSlides = t.loopedSlides || 1 : i.loopedSlides = t.slidesPerView + t.loopAdditionalSlides, i.loopedSlides > i.slides.length && (i.loopedSlides = i.slides.length);
		var e = "",
			n = "",
			r, o = "",
			u = i.slides.length,
			a = Math.floor(i.loopedSlides / u),
			f = i.loopedSlides % u;
		for (r = 0; r < a * u; r++) {
			var l = r;
			if (r >= u) {
				var c = Math.floor(r / u);
				l = r - u * c
			}
			o += i.slides[l].outerHTML
		}
		for (r = 0; r < f; r++) n += X(t.slideDuplicateClass, i.slides[r].outerHTML);
		for (r = u - f; r < u; r++) e += X(t.slideDuplicateClass, i.slides[r].outerHTML);
		var h = e + o + s.innerHTML + o + n;
		s.innerHTML = h, i.loopCreated = !0, i.calcSlides();
		for (r = 0; r < i.slides.length; r++)(r < i.loopedSlides || r >= i.slides.length - i.loopedSlides) && i.slides[r].setData("looped", !0);
		i.callPlugins("onCreateLoop")
	}, i.fixLoop = function() {
		var e;
		if (i.activeIndex < i.loopedSlides) e = i.slides.length - i.loopedSlides * 3 + i.activeIndex, i.swipeTo(e, 0, !1);
		else if (t.slidesPerView === "auto" && i.activeIndex >= i.loopedSlides * 2 || i.activeIndex > i.slides.length - t.slidesPerView * 2) e = -i.slides.length + i.activeIndex + i.loopedSlides, i.swipeTo(e, 0, !1)
	}, i.loadSlides = function() {
		var e = "";
		i.activeLoaderIndex = 0;
		var n = t.loader.slides,
			r = t.loader.loadAllSlides ? n.length : t.slidesPerView * (1 + t.loader.surroundGroups);
		for (var s = 0; s < r; s++) t.loader.slidesHTMLType === "outer" ? e += n[s] : e += "<" + t.slideElement + ' class="' + t.slideClass + '" data-swiperindex="' + s + '">' + n[s] + "</" + t.slideElement + ">";
		i.wrapper.innerHTML = e, i.calcSlides(!0), t.loader.loadAllSlides || i.wrapperTransitionEnd(i.reloadSlides, !0)
	}, i.reloadSlides = function() {
		var e = t.loader.slides,
			n = parseInt(i.activeSlide().data("swiperindex"), 10);
		if (n < 0 || n > e.length - 1) return;
		i.activeLoaderIndex = n;
		var r = Math.max(0, n - t.slidesPerView * t.loader.surroundGroups),
			s = Math.min(n + t.slidesPerView * (1 + t.loader.surroundGroups) - 1, e.length - 1);
		if (n > 0) {
			var u = -o * (n - r);
			i.setWrapperTranslate(u), i.setWrapperTransition(0)
		}
		var a;
		if (t.loader.logic === "reload") {
			i.wrapper.innerHTML = "";
			var f = "";
			for (a = r; a <= s; a++) f += t.loader.slidesHTMLType === "outer" ? e[a] : "<" + t.slideElement + ' class="' + t.slideClass + '" data-swiperindex="' + a + '">' + e[a] + "</" + t.slideElement + ">";
			i.wrapper.innerHTML = f
		} else {
			var l = 1e3,
				c = 0;
			for (a = 0; a < i.slides.length; a++) {
				var h = i.slides[a].data("swiperindex");
				h < r || h > s ? i.wrapper.removeChild(i.slides[a]) : (l = Math.min(h, l), c = Math.max(h, c))
			}
			for (a = r; a <= s; a++) {
				var p;
				a < l && (p = document.createElement(t.slideElement), p.className = t.slideClass, p.setAttribute("data-swiperindex", a), p.innerHTML = e[a], i.wrapper.insertBefore(p, i.wrapper.firstChild)), a > c && (p = document.createElement(t.slideElement), p.className = t.slideClass, p.setAttribute("data-swiperindex", a), p.innerHTML = e[a], i.wrapper.appendChild(p))
			}
		}
		i.reInit(!0)
	}, et()
};
Swiper.prototype = {
		plugins: {},
		wrapperTransitionEnd: function(e, t) {
			function o() {
				e(n), n.params.queueEndCallbacks && (n._queueEndCallbacks = !1);
				if (!t)
					for (s = 0; s < i.length; s++) n.h.removeEventListener(r, i[s], o)
			}
			var n = this,
				r = n.wrapper,
				i = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"],
				s;
			if (e)
				for (s = 0; s < i.length; s++) n.h.addEventListener(r, i[s], o)
		},
		getWrapperTranslate: function(e) {
			var t = this.wrapper,
				n, r, i, s;
			return typeof e == "undefined" && (e = this.params.mode === "horizontal" ? "x" : "y"), this.support.transforms && this.params.useCSS3Transforms ? (i = window.getComputedStyle(t, null), window.WebKitCSSMatrix ? s = new WebKitCSSMatrix(i.webkitTransform) : (s = i.MozTransform || i.OTransform || i.MsTransform || i.msTransform || i.transform || i.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,"), n = s.toString().split(",")), e === "x" && (window.WebKitCSSMatrix ? r = s.m41 : n.length === 16 ? r = parseFloat(n[12]) : r = parseFloat(n[4])), e === "y" && (window.WebKitCSSMatrix ? r = s.m42 : n.length === 16 ? r = parseFloat(n[13]) : r = parseFloat(n[5]))) : (e === "x" && (r = parseFloat(t.style.left, 10) || 0), e === "y" && (r = parseFloat(t.style.top, 10) || 0)), r || 0
		},
		setWrapperTranslate: function(e, t, n) {
			var r = this.wrapper.style,
				i = {
					x: 0,
					y: 0,
					z: 0
				},
				s;
			arguments.length === 3 ? (i.x = e, i.y = t, i.z = n) : (typeof t == "undefined" && (t = this.params.mode === "horizontal" ? "x" : "y"), i[t] = e), this.support.transforms && this.params.useCSS3Transforms ? (s = this.support.transforms3d ? "translate3d(" + i.x + "px, " + i.y + "px, " + i.z + "px)" : "translate(" + i.x + "px, " + i.y + "px)", r.webkitTransform = r.MsTransform = r.msTransform = r.MozTransform = r.OTransform = r.transform = s) : (r.left = i.x + "px", r.top = i.y + "px"), this.callPlugins("onSetWrapperTransform", i), this.params.onSetWrapperTransform && this.fireCallback(this.params.onSetWrapperTransform, this, i)
		},
		setWrapperTransition: function(e) {
			var t = this.wrapper.style;
			t.webkitTransitionDuration = t.MsTransitionDuration = t.msTransitionDuration = t.MozTransitionDuration = t.OTransitionDuration = t.transitionDuration = e / 1e3 + "s", this.callPlugins("onSetWrapperTransition", {
				duration: e
			}), this.params.onSetWrapperTransition && this.fireCallback(this.params.onSetWrapperTransition, this, e)
		},
		h: {
			getWidth: function(e, t) {
				var n = window.getComputedStyle(e, null).getPropertyValue("width"),
					r = parseFloat(n);
				if (isNaN(r) || n.indexOf("%") > 0) r = e.offsetWidth - parseFloat(window.getComputedStyle(e, null).getPropertyValue("padding-left")) - parseFloat(window.getComputedStyle(e, null).getPropertyValue("padding-right"));
				return t && (r += parseFloat(window.getComputedStyle(e, null).getPropertyValue("padding-left")) + parseFloat(window.getComputedStyle(e, null).getPropertyValue("padding-right"))), r
			},
			getHeight: function(e, t) {
				if (t) return e.offsetHeight;
				var n = window.getComputedStyle(e, null).getPropertyValue("height"),
					r = parseFloat(n);
				if (isNaN(r) || n.indexOf("%") > 0) r = e.offsetHeight - parseFloat(window.getComputedStyle(e, null).getPropertyValue("padding-top")) - parseFloat(window.getComputedStyle(e, null).getPropertyValue("padding-bottom"));
				return t && (r += parseFloat(window.getComputedStyle(e, null).getPropertyValue("padding-top")) + parseFloat(window.getComputedStyle(e, null).getPropertyValue("padding-bottom"))), r
			},
			getOffset: function(e) {
				var t = e.getBoundingClientRect(),
					n = document.body,
					r = e.clientTop || n.clientTop || 0,
					i = e.clientLeft || n.clientLeft || 0,
					s = window.pageYOffset || e.scrollTop,
					o = window.pageXOffset || e.scrollLeft;
				return document.documentElement && !window.pageYOffset && (s = document.documentElement.scrollTop, o = document.documentElement.scrollLeft), {
					top: t.top + s - r,
					left: t.left + o - i
				}
			},
			windowWidth: function() {
				if (window.innerWidth) return window.innerWidth;
				if (document.documentElement && document.documentElement.clientWidth) return document.documentElement.clientWidth
			},
			windowHeight: function() {
				if (window.innerHeight) return window.innerHeight;
				if (document.documentElement && document.documentElement.clientHeight) return document.documentElement.clientHeight
			},
			windowScroll: function() {
				if (typeof pageYOffset != "undefined") return {
					left: window.pageXOffset,
					top: window.pageYOffset
				};
				if (document.documentElement) return {
					left: document.documentElement.scrollLeft,
					top: document.documentElement.scrollTop
				}
			},
			addEventListener: function(e, t, n, r) {
				typeof r == "undefined" && (r = !1), e.addEventListener ? e.addEventListener(t, n, r) : e.attachEvent && e.attachEvent("on" + t, n)
			},
			removeEventListener: function(e, t, n, r) {
				typeof r == "undefined" && (r = !1), e.removeEventListener ? e.removeEventListener(t, n, r) : e.detachEvent && e.detachEvent("on" + t, n)
			}
		},
		setTransform: function(e, t) {
			var n = e.style;
			n.webkitTransform = n.MsTransform = n.msTransform = n.MozTransform = n.OTransform = n.transform = t
		},
		setTranslate: function(e, t) {
			var n = e.style,
				r = {
					x: t.x || 0,
					y: t.y || 0,
					z: t.z || 0
				},
				i = this.support.transforms3d ? "translate3d(" + r.x + "px," + r.y + "px," + r.z + "px)" : "translate(" + r.x + "px," + r.y + "px)";
			n.webkitTransform = n.MsTransform = n.msTransform = n.MozTransform = n.OTransform = n.transform = i, this.support.transforms || (n.left = r.x + "px", n.top = r.y + "px")
		},
		setTransition: function(e, t) {
			var n = e.style;
			n.webkitTransitionDuration = n.MsTransitionDuration = n.msTransitionDuration = n.MozTransitionDuration = n.OTransitionDuration = n.transitionDuration = t + "ms"
		},
		support: {
			touch: window.Modernizr && Modernizr.touch === !0 || function() {
				return !!("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch)
			}(),
			transforms3d: window.Modernizr && Modernizr.csstransforms3d === !0 || function() {
				var e = document.createElement("div").style;
				return "webkitPerspective" in e || "MozPerspective" in e || "OPerspective" in e || "MsPerspective" in e || "perspective" in e
			}(),
			transforms: window.Modernizr && Modernizr.csstransforms === !0 || function() {
				var e = document.createElement("div").style;
				return "transform" in e || "WebkitTransform" in e || "MozTransform" in e || "msTransform" in e || "MsTransform" in e || "OTransform" in e
			}(),
			transitions: window.Modernizr && Modernizr.csstransitions === !0 || function() {
				var e = document.createElement("div").style;
				return "transition" in e || "WebkitTransition" in e || "MozTransition" in e || "msTransition" in e || "MsTransition" in e || "OTransition" in e
			}()
		},
		browser: {
			ie8: function() {
				var e = -1;
				if (navigator.appName === "Microsoft Internet Explorer") {
					var t = navigator.userAgent,
						n = new RegExp(/MSIE ([0-9]{1,}[\.0-9]{0,})/);
					n.exec(t) !== null && (e = parseFloat(RegExp.$1))
				}
				return e !== -1 && e < 9
			}(),
			ie10: window.navigator.msPointerEnabled,
			ie11: window.navigator.pointerEnabled
		}
	}, (window.jQuery || window.Zepto) && function(e) {
		e.fn.swiper = function(t) {
			var n = new Swiper(e(this)[0], t);
			return e(this).data("swiper", n), n
		}
	}(window.jQuery || window.Zepto), typeof module != "undefined" && (module.exports = Swiper), typeof define == "function" && define.amd && define("swiper", [], function() {
		return Swiper
	}), define("DoreJS/events", [], function() {
		function t() {}

		function r(e, t, n) {
			var r = !0;
			if (e) {
				var i = 0,
					s = e.length,
					o = t[0],
					u = t[1],
					a = t[2];
				switch (t.length) {
					case 0:
						for (; i < s; i += 2) r = e[i].call(e[i + 1] || n) !== !1 && r;
						break;
					case 1:
						for (; i < s; i += 2) r = e[i].call(e[i + 1] || n, o) !== !1 && r;
						break;
					case 2:
						for (; i < s; i += 2) r = e[i].call(e[i + 1] || n, o, u) !== !1 && r;
						break;
					case 3:
						for (; i < s; i += 2) r = e[i].call(e[i + 1] || n, o, u, a) !== !1 && r;
						break;
					default:
						for (; i < s; i += 2) r = e[i].apply(e[i + 1] || n, t) !== !1 && r
				}
			}
			return r
		}

		function i(e) {
			return Object.prototype.toString.call(e) === "[object Function]"
		}
		var e = /\s+/;
		t.prototype.on = function(t, n, r) {
			var i, s, o;
			if (!n) return this;
			i = this.__events || (this.__events = {}), t = t.split(e);
			while (s = t.shift()) o = i[s] || (i[s] = []), o.push(n, r);
			return this
		}, t.prototype.once = function(e, t, n) {
			var r = this,
				i = function() {
					r.off(e, i), t.apply(n || r, arguments)
				};
			return this.on(e, i, n)
		}, t.prototype.off = function(t, r, i) {
			var s, o, u, a;
			if (!(s = this.__events)) return this;
			if (!(t || r || i)) return delete this.__events, this;
			t = t ? t.split(e) : n(s);
			while (o = t.shift()) {
				u = s[o];
				if (!u) continue;
				if (!r && !i) {
					delete s[o];
					continue
				}
				for (a = u.length - 2; a >= 0; a -= 2) r && u[a] !== r || i && u[a + 1] !== i || u.splice(a, 2)
			}
			return this
		}, t.prototype.trigger = function(t) {
			var n, i, s, o, u, a, f = [],
				l, c = !0;
			if (!(n = this.__events)) return this;
			t = t.split(e);
			for (u = 1, a = arguments.length; u < a; u++) f[u - 1] = arguments[u];
			while (i = t.shift()) {
				if (s = n.all) s = s.slice();
				if (o = n[i]) o = o.slice();
				i !== "all" && (c = r(o, f, this) && c), c = r(s, [i].concat(f), this) && c
			}
			return c
		}, t.prototype.emit = t.prototype.trigger;
		var n = Object.keys;
		return n || (n = function(e) {
			var t = [];
			for (var n in e) e.hasOwnProperty(n) && t.push(n);
			return t
		}), t.mixTo = function(e) {
			e = i(e) ? e.prototype : e;
			var n = t.prototype,
				r = new t;
			Object.keys(n).forEach(function(t) {
				e[t] = function() {
					return n[t].apply(r, Array.prototype.slice.call(arguments)), this
				}
			})
		}, t
	}), define("DoreJS/attribute", ["require", "exports", "module"], function(e, t) {
		function o(e) {
			return n.call(e) === "[object String]"
		}

		function u(e) {
			return n.call(e) === "[object Function]"
		}

		function a(e) {
			return e != null && e == e.window
		}

		function f(e) {
			if (!e || n.call(e) !== "[object Object]" || e.nodeType || a(e)) return !1;
			try {
				if (e.constructor && !r.call(e, "constructor") && !r.call(e.constructor.prototype, "isPrototypeOf")) return !1
			} catch (t) {
				return !1
			}
			var s;
			if (i)
				for (s in e) return r.call(e, s);
			for (s in e);
			return s === undefined || r.call(e, s)
		}

		function l(e) {
			if (!e || n.call(e) !== "[object Object]" || e.nodeType || a(e) || !e.hasOwnProperty) return !1;
			for (var t in e)
				if (e.hasOwnProperty(t)) return !1;
			return !0
		}

		function c(e, t) {
			var n, r;
			for (n in t) t.hasOwnProperty(n) && (e[n] = h(t[n], e[n]));
			return e
		}

		function h(e, t) {
			return s(e) ? e = e.slice() : f(e) && (f(t) || (t = {}), e = c(t, e)), e
		}

		function d(e, t, n) {
			var r = [],
				i = t.constructor.prototype;
			while (i) i.hasOwnProperty("attrs") || (i.attrs = {}), m(n, i.attrs, i), l(i.attrs) || r.unshift(i.attrs), i = i.constructor.superclass;
			for (var s = 0, o = r.length; s < o; s++) N(e, x(r[s]))
		}

		function v(e, t) {
			N(e, x(t, !0), !0)
		}

		function m(e, t, n, r) {
			for (var i = 0, s = e.length; i < s; i++) {
				var o = e[i];
				n.hasOwnProperty(o) && (t[o] = r ? t.get(o) : n[o])
			}
		}

		function b(e, t) {
			for (var n in t)
				if (t.hasOwnProperty(n)) {
					var r = t[n].value,
						i;
					u(r) && (i = n.match(g)) && (e[i[1]](w(i[2]), r), delete t[n])
				}
		}

		function w(e) {
			var t = e.match(y),
				n = t[1] ? "change:" : "";
			return n += t[2].toLowerCase() + t[3], n
		}

		function E(e, t, n) {
			var r = {
				silent: !0
			};
			e.__initializingAttrs = !0;
			for (var i in n) n.hasOwnProperty(i) && t[i].setter && e.set(i, n[i], r);
			delete e.__initializingAttrs
		}

		function x(e, t) {
			var n = {};
			for (var r in e) {
				var i = e[r];
				if (!t && f(i) && C(i, S)) {
					n[r] = i;
					continue
				}
				n[r] = {
					value: i
				}
			}
			return n
		}

		function N(e, t, n) {
			var r, i, s;
			for (r in t)
				if (t.hasOwnProperty(r)) {
					i = t[r], s = e[r], s || (s = e[r] = {}), i.value !== undefined && (s.value = h(i.value, s.value));
					if (n) continue;
					for (var o in T) {
						var u = T[o];
						i[u] !== undefined && (s[u] = i[u])
					}
				}
			return e
		}

		function C(e, t) {
			for (var n = 0, r = t.length; n < r; n++)
				if (e.hasOwnProperty(t[n])) return !0;
			return !1
		}

		function k(e) {
			return e == null || (o(e) || s(e)) && e.length === 0 || l(e)
		}

		function L(e, t) {
			if (e === t) return !0;
			if (k(e) && k(t)) return !0;
			var r = n.call(e);
			if (r != n.call(t)) return !1;
			switch (r) {
				case "[object String]":
					return e == String(t);
				case "[object Number]":
					return e != +e ? t != +t : e == 0 ? 1 / e == 1 / t : e == +t;
				case "[object Date]":
				case "[object Boolean]":
					return +e == +t;
				case "[object RegExp]":
					return e.source == t.source && e.global == t.global && e.multiline == t.multiline && e.ignoreCase == t.ignoreCase;
				case "[object Array]":
					var i = e.toString(),
						s = t.toString();
					return i.indexOf("[object") === -1 && s.indexOf("[object") === -1 && i === s
			}
			if (typeof e != "object" || typeof t != "object") return !1;
			if (f(e) && f(t)) {
				if (!L(p(e), p(t))) return !1;
				for (var o in e)
					if (e[o] !== t[o]) return !1;
				return !0
			}
			return !1
		}
		t.initAttrs = function(e) {
			var t = this.attrs = {},
				n = this.propsInAttrs || [];
			d(t, this, n), e && v(t, e), E(this, t, e), b(this, t), m(n, this, t, !0)
		}, t.get = function(e) {
			var t = this.attrs[e] || {},
				n = t.value;
			return t.getter ? t.getter.call(this, n, e) : n
		}, t.set = function(e, t, n) {
			var r = {};
			o(e) ? r[e] = t : (r = e, n = t), n || (n = {});
			var i = n.silent,
				s = n.override,
				u = this.attrs,
				a = this.__changedAttrs || (this.__changedAttrs = {});
			for (e in r) {
				if (!r.hasOwnProperty(e)) continue;
				var l = u[e] || (u[e] = {});
				t = r[e];
				if (l.readOnly) throw new Error("This attribute is readOnly: " + e);
				l.setter && (t = l.setter.call(this, t, e));
				var h = this.get(e);
				!s && f(h) && f(t) && (t = c(c({}, h), t)), u[e].value = t, !this.__initializingAttrs && !L(h, t) && (i ? a[e] = [t, h] : this.trigger("change:" + e, t, h, e))
			}
			return this
		}, t.change = function() {
			var e = this.__changedAttrs;
			if (e) {
				for (var t in e)
					if (e.hasOwnProperty(t)) {
						var n = e[t];
						this.trigger("change:" + t, n[0], n[1], t)
					}
				delete this.__changedAttrs
			}
			return this
		}, t._isPlainObject = f;
		var n = Object.prototype.toString,
			r = Object.prototype.hasOwnProperty,
			i;
		(function() {
			function t() {
				this.x = 1
			}
			var e = [];
			t.prototype = {
				valueOf: 1,
				y: 1
			};
			for (var n in new t) e.push(n);
			i = e[0] !== "x"
		})();
		var s = Array.isArray || function(e) {
				return n.call(e) === "[object Array]"
			},
			p = Object.keys;
		p || (p = function(e) {
			var t = [];
			for (var n in e) e.hasOwnProperty(n) && t.push(n);
			return t
		});
		var g = /^(on|before|after)([A-Z].*)$/,
			y = /^(Change)?([A-Z])(.*)/,
			S = ["value", "getter", "setter", "readOnly"],
			T = ["setter", "getter", "readOnly"]
	}), define("DoreJS/Base", ["require", "exports", "module", "DoreJS/Class", "DoreJS/events", "DoreJS/attribute"], function(e, t, n) {
		function o(e, t) {
			for (var n in t)
				if (t.hasOwnProperty(n)) {
					var r = "_onChange" + u(n);
					e[r] && e.on("change:" + n, e[r])
				}
		}

		function u(e) {
			return e.charAt(0).toUpperCase() + e.substring(1)
		}
		var r = e("DoreJS/Class"),
			i = e("DoreJS/events"),
			s = e("DoreJS/attribute");
		n.exports = r.create({
			Implements: [i, s],
			initialize: function(e) {
				this.initAttrs(e), o(this, this.attrs)
			},
			destroy: function() {
				this.off();
				for (var e in this) this.hasOwnProperty(e) && delete this[e];
				this.destroy = function() {}
			}
		})
	}),
	function(e) {
		var t = function(e, n) {
			return t[typeof n == "string" ? "compile" : "render"].apply(t, arguments)
		};
		t.version = "2.0.4", t.openTag = "<%", t.closeTag = "%>", t.isEscape = !0, t.isCompress = !1, t.parser = null, t.render = function(e, n) {
			var r = t.get(e) || i({
				id: e,
				name: "Render Error",
				message: "No Template"
			});
			return r(n)
		}, t.compile = function(e, r) {
			function c(n, s) {
				try {
					if (s)
						for (var o in s) t.helper(o, s[o]);
					return new f(n, e) + ""
				} catch (a) {
					return u ? i(a)() : t.compile(e, r, !0)(n)
				}
			}
			var o = arguments,
				u = o[2],
				a = "anonymous";
			typeof r != "string" && (u = o[1], r = o[0], e = a);
			try {
				var f = s(e, r, u)
			} catch (l) {
				return l.id = e || r, l.name = "Syntax Error", i(l)
			}
			return c.prototype = f.prototype, c.toString = function() {
				return f.toString()
			}, e !== a && (n[e] = c), c
		};
		var n = t.cache = {},
			r = t.helpers = function() {
				var e = function(t, n) {
						return typeof t != "string" && (n = typeof t, n === "number" ? t += "" : n === "function" ? t = e(t.call(t)) : t = ""), t
					},
					n = {
						"<": "&#60;",
						">": "&#62;",
						'"': "&#34;",
						"'": "&#39;",
						"&": "&#38;"
					},
					r = function(t) {
						return e(t).replace(/&(?![\w#]+;)|[<>"']/g, function(e) {
							return n[e]
						})
					},
					i = Array.isArray || function(e) {
						return {}.toString.call(e) === "[object Array]"
					},
					s = function(e, t) {
						if (i(e))
							for (var n = 0, r = e.length; n < r; n++) t.call(e, e[n], n, e);
						else
							for (n in e) t.call(e, e[n], n)
					};
				return {
					$include: t.render,
					$string: e,
					$escape: r,
					$each: s
				}
			}();
		t.helper = function(e, t) {
			r[e] = t
		}, t.onerror = function(t) {
			var n = "Template Error\n\n";
			for (var r in t) n += "<" + r + ">\n" + t[r] + "\n\n";
			e.console && 0
		}, t.get = function(r) {
			var i;
			if (n.hasOwnProperty(r)) i = n[r];
			else if ("document" in e) {
				var s = document.getElementById(r);
				if (s) {
					var o = s.value || s.innerHTML;
					i = t.compile(r, o.replace(/^\s*|\s*$/g, ""))
				}
			}
			return i
		};
		var i = function(e) {
				return t.onerror(e),
					function() {
						return "{Template Error}"
					}
			},
			s = function() {
				var e = r.$each,
					n = "break,case,catch,continue,debugger,default,delete,do,else,false,finally,for,function,if,in,instanceof,new,null,return,switch,this,throw,true,try,typeof,var,void,while,with,abstract,boolean,byte,char,class,const,double,enum,export,extends,final,float,goto,implements,import,int,interface,long,native,package,private,protected,public,short,static,super,synchronized,throws,transient,volatile,arguments,let,yield,undefined",
					i = /\/\*[\w\W]*?\*\/|\/\/[^\n]*\n|\/\/[^\n]*$|"(?:[^"\\]|\\[\w\W])*"|'(?:[^'\\]|\\[\w\W])*'|[\s\t\n]*\.[\s\t\n]*[$\w\.]+/g,
					s = /[^\w$]+/g,
					o = new RegExp(["\\b" + n.replace(/,/g, "\\b|\\b") + "\\b"].join("|"), "g"),
					u = /^\d[^,]*|,\d[^,]*/g,
					a = /^,+|,+$/g,
					f = function(e) {
						return e.replace(i, "").replace(s, ",").replace(o, "").replace(u, "").replace(a, "").split(/^$|,+/)
					};
				return function(n, i, s) {
					function x(e) {
						return h += e.split(/\n/).length - 1, t.isCompress && (e = e.replace(/[\n\r\t\s]+/g, " ").replace(/<!--.*?-->/g, "")), e && (e = g[1] + k(e) + g[2] + "\n"), e
					}

					function T(e) {
						var n = h;
						a ? e = a(e) : s && (e = e.replace(/\n/g, function() {
							return h++, "$line=" + h + ";"
						}));
						if (e.indexOf("=") === 0) {
							var i = !/^=[=#]/.test(e);
							e = e.replace(/^=[=#]?|[\s;]*$/g, "");
							if (i && t.isEscape) {
								var o = e.replace(/\s*\([^\)]+\)/, "");
								!r.hasOwnProperty(o) && !/^(include|print)$/.test(o) && (e = "$escape(" + e + ")")
							} else e = "$string(" + e + ")";
							e = g[1] + e + g[2]
						}
						return s && (e = "$line=" + n + ";" + e), N(e), e + "\n"
					}

					function N(t) {
						t = f(t), e(t, function(e) {
							e && !p.hasOwnProperty(e) && (C(e), p[e] = !0)
						})
					}

					function C(e) {
						var t;
						e === "print" ? t = b : e === "include" ? (d.$include = r.$include, t = w) : (e.indexOf("$") === 0 ? t = "$helpers." + e + "?$helpers." + e + ":$data." + e : t = "$data." + e, r.hasOwnProperty(e) && (d[e] = r[e], e.indexOf("$") === 0 ? t = "$helpers." + e : t = t + "===undefined?$helpers." + e + ":" + t)), v += e + "=" + t + ","
					}

					function k(e) {
						return "'" + e.replace(/('|\\)/g, "\\$1").replace(/\r/g, "\\r").replace(/\n/g, "\\n") + "'"
					}
					var o = t.openTag,
						u = t.closeTag,
						a = t.parser,
						l = i,
						c = "",
						h = 1,
						p = {
							$data: 1,
							$id: 1,
							$helpers: 1,
							$out: 1,
							$line: 1
						},
						d = {},
						v = "var $helpers=this," + (s ? "$line=0," : ""),
						m = "".trim,
						g = m ? ["$out='';", "$out+=", ";", "$out"] : ["$out=[];", "$out.push(", ");", "$out.join('')"],
						y = m ? "$out+=$text;return $text;" : "$out.push($text);",
						b = "function($text){" + y + "}",
						w = "function(id,data){data=data||$data;var $text=$helpers.$include(id,data,$id);" + y + "}";
					e(l.split(o), function(e) {
						e = e.split(u);
						var t = e[0],
							n = e[1];
						e.length === 1 ? c += x(t) : (c += T(t), n && (c += x(n)))
					}), l = c, s && (l = "try{" + l + "}catch(e){" + "throw {" + "id:$id," + "name:'Render Error'," + "message:e.message," + "line:$line," + "source:" + k(i) + ".split(/\\n/)[$line-1].replace(/^[\\s\\t]+/,'')" + "};" + "}"), l = v + g[0] + l + "return new String(" + g[3] + ");";
					try {
						var E = new Function("$data", "$id", l);
						return E.prototype = d, E
					} catch (S) {
						throw S.temp = "function anonymous($data,$id) {" + l + "}", S
					}
				}
			}();
		typeof define == "function" ? define("art/template", [], function() {
			return t
		}) : typeof exports != "undefined" && (module.exports = t), e.template = t
	}(this), define("art", ["require", "text"], function(e, t) {
		function r(e, t) {
			var n = t && t.art && "ext" in t.art ? t.art.ext : "tpl";
			return n && e.slice(e.length - n.length - 1) !== "." + n && (e += "." + n), e
		}
		var n = {};
		return n.pluginBuilder = "art/builder", n.load = function(n, i, s, o) {
			e(["art/template"], function(e) {
				t.get(i.toUrl(r(n, o)), function(t) {
					s(e.compile(t))
				}, s.error)
			})
		}, n
	}), define("art!pages/template.html", ["art/template"], function(e) {
		var t = function(t, n) {
			var r = this,
				i = t.push,
				s = r.$escape,
				o = t.wx_name,
				u = t.i,
				a = t.l,
				f = t.module,
				l = "";
			i ? (l += '\n<div class="topTip" data-pid="', l += s(i.id), l += '">\n  <i class="icoLb"></i>\n  <div class="inner"><a href1="', l += s(i.url), l += '"><marquee direction=left scrollamount=3 height=27>', l += s(i.content), l += '</marquee></a></p></div>\n  <i class="icoClose" id="push-banner-close"></i>\n</div>\n') : (l += '\n<div class="share">\u641c\u7d22 "', l += s(o), l += '" \u6dfb\u52a0\u5173\u6ce8</div>\n'), l += '\n<div class="bg-img"></div>  \n<div class="swiper-container">\n\n  <div class="swiper-wrapper">\n      <div class="arrows"></div>\n      ';
			for (var u = 0, a = f.length; u < a; u++) l += '\n      <div class="swiper-slide" data-item="', l += s(u), l += '" data-delay="', l += s(u * 100), l += '"  style="-webkit-transform: rotate(15deg) skew(15deg) translate3d(0, 64px, 0); -moz-transform: rotate(15deg) skew(15deg) translate3d(0, 64px, 0);">\n        ', f[u].f_model_background === "" ? (l += '\n        <div class="swiper-item">\n          <div class="swiper-item-bg"></div>\n          <div class="swiper-item-name">\n            <div class="d-left" style="height: 26px; overflow: hidden;">\n              <span class="title">', l += s(f[u].f_model_name), l += ' </span>\n              <span class="sub-title" style="overflow: hidden;">', l += s(f[u].f_model_subtitle), l += '</span>\n            </div>\n            <div class="swiper-item-white d-left" style="', f[u].onshow && (l += " display: block; "), l += '"><div class="swiper-item-red"></div></div>\n          </div>\n          <div class="swiper-item-con">', l += s(f[u].f_model_describe), l += "</div>\n        </div>\n        ") : (l += '\n        <div class="swiper-item slide-bg" style="background-image: url(\'', l += s(f[u].f_model_background), l += '\')">\n          <div class="swiper-item-bg"></div>\n          <div class="swiper-item-name" style="left:1%;">\n            <div class="d-left" style="height: 26px; overflow: hidden;">\n              <span class="title">', l += s(f[u].f_model_name), l += ' </span>\n              <span class="sub-title" style="overflow: hidden;">', l += s(f[u].f_model_subtitle), l += '</span>\n            </div>\n            <div class="swiper-item-white d-left" style="', f[u].onshow && (l += " display: block; "), l += '"><div class="swiper-item-red"></div></div>\n          </div>\n          <div class="swiper-item-con" style="left: 30px;">', l += s(f[u].f_model_describe), l += "</div>\n        </div>\n        "), l += "\n      </div>\n      ";
			return l += '\n      <div class="arrows2"></div>\n  </div>\n</div>', new String(l)
		};
		return t.prototype = e.helpers,
			function(e, n) {
				return new t(e, n) + ""
			}
	}), define("view", ["require", "exports", "module", "zepto", "DoreJS/Base", "art!./pages/template.html"], function(e, t, n) {
		function p(e) {
			return e.charAt(0).toUpperCase() + e.substring(1)
		}

		function d(e) {
			return h(document.documentElement, e)
		}

		function v() {
			return "view-" + c++
		}

		function m(e) {
			return l.call(e) === "[object String]"
		}

		function g(e) {
			return l.call(e) === "[object Function]"
		}

		function E(e) {
			return g(e.events) && (e.events = e.events()), e.events
		}

		function S(e, t) {
			var n = e.match(y),
				r = n[1] + s + t.cid,
				i = n[2] || undefined;
			return i && i.indexOf("{{") > -1 && (i = parseExpressionInEventKey(i, t)), {
				type: r,
				selector: i
			}
		}

		function x(e) {
			return e == null || e === undefined
		}

		function T(e) {
			for (var t = e.length - 1; t >= 0; t--) {
				if (e[t] !== undefined) break;
				e.pop()
			}
			return e
		}
		var r = e("zepto"),
			i = e("DoreJS/Base"),
			s = ".delegate-events-",
			o = "data-view-cid",
			u = "_onRender",
			a = {},
			f = i.extend({
				attrs: {
					id: null,
					className: null,
					style: null,
					template: "<div class='asf'></div>",
					model: null,
					tagName: "div",
					parentNode: document.body
				},
				views: null,
				element: null,
				events: null,
				initialize: function(e) {
					this.cid = v();
					var t = {};
					for (var n in this.views) {
						if (!this.views.hasOwnProperty(n)) continue;
						this.views[n].options = this.views[n].options || {}, this.views[n].options.parent = this, t[n] = new this.views[n].init(this.views[n].options)
					}
					this.views = t, f.superclass.initialize.call(this, e), this.parseElement(), this.delegateEvents(), this.setup(), this._stamp(), this._isTemplate = !e || !e.element
				},
				parseElement: function() {
					var e = this.element;
					e ? this.element = r(e) : this.get("template") && this.parseElementFromTemplate();
					if (!this.element || !this.element[0]) throw new Error("element is invalid")
				},
				parseElementFromTemplate: function() {
					var t = this.get("tplData");
					if (t) {
						var n = e("art!./pages/template.html")(t);
						this.set("template", n)
					}
					this.element = r("<" + this.get("tagName") + ">" + this.get("template") + "</" + this.get("tagName") + ">")
				},
				setup: function() {},
				render: function() {
					this.rendered || (this._renderAndBindAttrs(), this.rendered = !0);
					var e = this.get("style");
					if (e) {
						var t = Object.prototype.toString.call(e) === "[object Array]" ? e.join("\n") : e;
						r("<style></style>").append(t).appendTo(r("head"))
					}
					var n = this.get("parentNode");
					if (n && !d(this.element[0])) {
						this.element.appendTo(n);
						for (var i in this.views) {
							if (!this.views.hasOwnProperty(i)) continue;
							this.views[i].render()
						}
					}
					return this
				},
				_renderAndBindAttrs: function() {
					var e = this,
						t = e.attrs;
					for (var n in t) {
						if (!t.hasOwnProperty(n)) continue;
						var r = u + p(n);
						if (this[r]) {
							var i = this.get(n);
							x(i) || this[r](i, undefined, n),
								function(t) {
									e.on("change:" + n, function(n, r, i) {
										e[t](n, r, i)
									})
								}(r)
						}
					}
				},
				delegateEvents: function(e, t, n) {
					var i = T(Array.prototype.slice.call(arguments));
					i.length === 0 ? (t = E(this), e = this.element) : i.length === 1 ? (t = e, e = this.element) : i.length === 2 ? (n = t, t = e, e = this.element) : (e || (e = this.element), this._delegateElements || (this._delegateElements = []), this._delegateElements.push(r(e)));
					if (m(t) && g(n)) {
						var s = {};
						s[t] = n, t = s
					}
					for (var o in t) {
						if (!t.hasOwnProperty(o)) continue;
						var u = S(o, this),
							a = u.type,
							f = u.selector;
						(function(t, n) {
							var i = function(e) {
								g(t) ? t.call(n, e) : n[t](e)
							};
							f ? r(e).on(a, f, i) : r(e).on(a, i)
						})(t[o], this)
					}
					return this
				},
				undelegateEvents: function(e, t) {
					var n = T(Array.prototype.slice.call(arguments));
					t || (t = e, e = null);
					if (n.length === 0) {
						var i = s + this.cid;
						this.element && this.element.off(i);
						if (this._delegateElements)
							for (var o in this._delegateElements) {
								if (!this._delegateElements.hasOwnProperty(o)) continue;
								this._delegateElements[o].off(i)
							}
					} else {
						var u = S(t, this);
						e ? r(e).off(u.type, u.selector) : this.element && this.element.off(u.type, u.selector)
					}
					return this
				},
				_onRenderId: function(e) {
					this.element.attr("id", e)
				},
				_onRenderClassName: function(e) {
					this.element.addClass(e)
				},
				_onRenderStyle: function(e) {
					this.element.css(e)
				},
				_stamp: function() {
					var e = this.cid;
					(this.initElement || this.element).attr('class', 'aassdd');
					(this.initElement || this.element).attr(o, e), a[e] = this
				},
				$: function(e) {
					return this.element.find(e)
				},
				destroy: function() {
					this.undelegateEvents(), delete a[this.cid], this.element && this._isTemplate && (this.element.off(), this._outerBox ? this._outerBox.remove() : this.element.remove()), this.element = null, f.superclass.destroy.call(this)
				}
			});
		n.exports = f;
		var l = Object.prototype.toString,
			c = 0,
			h = r.contains || function(e, t) {
				return !!(e.compareDocumentPosition(t) & 16)
			},
			y = /^(\S+)\s*(.*)$/,
			b = /{{([^}]+)}}/g,
			w = "INVALID_SELECTOR"
	}),
	function(e, t, n) {
		function i(e) {
			return e
		}

		function s(e) {
			return decodeURIComponent(e.replace(r, " "))
		}
		var r = /\+/g;
		e.cookie = function(r, o, u) {
			if (o !== n && !/Object/.test(Object.prototype.toString.call(o))) {
				u = e.extend({}, e.cookie.defaults, u), o === null && (u.expires = -1);
				if (typeof u.expires == "number") {
					var a = u.expires,
						f = u.expires = new Date;
					f.setDate(f.getDate() + a)
				}
				return o = String(o), t.cookie = [encodeURIComponent(r), "=", u.raw ? o : encodeURIComponent(o), u.expires ? "; expires=" + u.expires.toUTCString() : "", u.path ? "; path=" + u.path : "", u.domain ? "; domain=" + u.domain : "", u.secure ? "; secure" : ""].join("")
			}
			u = o || e.cookie.defaults || {};
			var l = u.raw ? i : s,
				c = t.cookie.split("; ");
			for (var h = 0, p; p = c[h] && c[h].split("="); h++)
				if (l(p.shift()) === r) return l(p.join("="));
			return null
		}, e.cookie.defaults = {}, e.removeCookie = function(t, n) {
			return e.cookie(t, n) !== null ? (e.cookie(t, null, n), !0) : !1
		}
	}(Zepto, document), define("cookie", ["zepto"], function(e) {
		return function() {
			var t, n;
			return t || e.$.cookie
		}
	}(this)),
	function(e) {
		var t = !1,
			n;
		e.boss = function(r) {
			if (t) return;
			n = e.extend({}, e.boss.defaults, r), a({
				sOp: n.sOp || "",
				iTy: n.iTy || "",
				sBiz: n.sBiz || "",
				iQQ: n.iQQ || "",
				sDomain: n.sDomain || "",
				iFlow: n.iFlow || "",
				sUrl: encodeURIComponent(location.href),
				sRef: n.sRef || "",
				sPageId: n.sPageId || "",
				sPos: n.sPos || "",
				iObjectNum: n.iObjectNum || "",
				sObjectList: n.sObjectList || "",
				name: app.wx_id,
				title: n.title || document.title
			}), t = !0
		}, e.boss.defaults = {
			recurse: !0
		};
		var r, i = null,
			s = null,
			o = function(t) {
				var n = ["http://btrace.qq.com/collect?sIp=&iQQ="];
				if ("iQQ" in t) n.push(t.iQQ);
				else if (typeof window["trimUin"] == "function" && typeof window["pgvGetCookieByName"] == "function") n.push(window.trimUin(window.pgvGetCookieByName("o_cookie=")));
				else {
					var r = e.cookie("o_cookie") || e.cookie("uin") || e.cookie("luin");
					r && (r = r.replace(/^o0+/, ""), n.push(r))
				}
				n.push("&sBiz=", "sBiz" in t ? t.sBiz : "", "&sOp=", "sOp" in t ? t.sOp : "", "&iSta=", "iSta" in t ? t.iSta : "", "&iTy=", "iTy" in t ? t.iTy : "", "&iFlow=", "iFlow" in t ? t.iFlow : "");
				for (var i in t) "&sIp&iQQ&sBiz&sOp&iSta&iTy&iFlow".indexOf("&" + i) < 0 && n.push("&", i, "=", t[i]);
				return n.push("&", Math.random()), n.join("")
			},
			u = [],
			a = function(e) {
				e && (e.iTy = e.iTy || n.iTy, u.push(e)), i === null && (i = new Image, i.onload = i.onerror = function() {
					s !== null && (clearTimeout(s), s = null), a()
				}), u.length === 0 ? typeof a.onClear == "function" && a.onClear() : s === null && (e = u.pop(), e && (i.src = o(e), s = setTimeout(function() {
					s = null, a()
				}, 5e3)))
			},
			f = function() {
				return function(e, t) {
					window.open(e, t)
				}
			}(),
			l = {
				click: function(t) {
					if (e.browser.mozilla && t.button !== 0) return !0;
					var n = t.target || t.srcElement,
						r, i;
					while (n && n.getAttribute) {
						i = n.getAttribute("boss"), r = n.tagName.toLowerCase();
						if (e.browser.safari && !i & r == "select") {
							var s = n.getAttribute("bossmemo");
							s || (n.setAttribute("bossmemo", 1), e(n).bind("change", function() {
								var e = n;
								return function() {
									var t = e.options[e.selectedIndex].getAttribute("boss");
									t && a({
										sOp: t
									})
								}
							}()))
						}
						if (!i && e.browser.msie && r == "select") {
							var o = n.getAttribute("bossmemo"),
								u = n.selectedIndex;
							o != u && (n.setAttribute("bossmemo", u), i = n.options[u].getAttribute("boss"))
						}
						if (i) {
							a({
								iTy: e.boss.defaults.iTy,
								sOp: i
							});
							if (r == "a" && (n.target == "_self" || n.target === "")) {
								var l = n.href;
								t.preventDefault(t), a.onClear = function() {
									f(l, "_self")
								}, setTimeout(function() {
									a.onClear()
								}, 100)
							}
						}
						n = e.boss.defaults.recurse ? n.parentNode : null
					}
					return !0
				}
			},
			c = function() {
				e(document).bind("click", l.click)
			}
	}(Zepto), define("boss", ["zepto", "cookie"], function(e) {
		return function() {
			var t, n;
			return t || e.$.boss
		}
	}(this)), define("text", ["module"], function(e) {
		var t, n, r, i, s = ["Msxml2.XMLHTTP", "Microsoft.XMLHTTP", "Msxml2.XMLHTTP.4.0"],
			o = /^\s*<\?xml(\s)+version=[\'\"](\d)*.(\d)*[\'\"](\s)*\?>/im,
			u = /<body[^>]*>\s*([\s\S]+)\s*<\/body>/im,
			a = typeof location != "undefined" && location.href,
			f = a && location.protocol && location.protocol.replace(/\:/, ""),
			l = a && location.hostname,
			c = a && (location.port || undefined),
			h = [],
			p = e.config && e.config() || {};
		t = {
			version: "2.0.6",
			strip: function(e) {
				if (e) {
					e = e.replace(o, "");
					var t = e.match(u);
					t && (e = t[1])
				} else e = "";
				return e
			},
			jsEscape: function(e) {
				return e.replace(/(['\\])/g, "\\$1").replace(/[\f]/g, "\\f").replace(/[\b]/g, "\\b").replace(/[\n]/g, "\\n").replace(/[\t]/g, "\\t").replace(/[\r]/g, "\\r").replace(/[\u2028]/g, "\\u2028").replace(/[\u2029]/g, "\\u2029")
			},
			createXhr: p.createXhr || function() {
				var e, t, n;
				if (typeof XMLHttpRequest != "undefined") return new XMLHttpRequest;
				if (typeof ActiveXObject != "undefined")
					for (t = 0; t < 3; t += 1) {
						n = s[t];
						try {
							e = new ActiveXObject(n)
						} catch (r) {}
						if (e) {
							s = [n];
							break
						}
					}
				return e
			},
			parseName: function(e) {
				var t, n, r, i = !1,
					s = e.indexOf("."),
					o = e.indexOf("./") === 0 || e.indexOf("../") === 0;
				return s !== -1 && (!o || s > 1) ? (t = e.substring(0, s), n = e.substring(s + 1, e.length)) : t = e, r = n || t, s = r.indexOf("!"), s !== -1 && (i = r.substring(s + 1) === "strip", r = r.substring(0, s), n ? n = r : t = r), {
					moduleName: t,
					ext: n,
					strip: i
				}
			},
			xdRegExp: /^((\w+)\:)?\/\/([^\/\\]+)/,
			useXhr: function(e, n, r, i) {
				var s, o, u, a = t.xdRegExp.exec(e);
				return a ? (s = a[2], o = a[3], o = o.split(":"), u = o[1], o = o[0], (!s || s === n) && (!o || o.toLowerCase() === r.toLowerCase()) && (!u && !o || u === i)) : !0
			},
			finishLoad: function(e, n, r, i) {
				r = n ? t.strip(r) : r, p.isBuild && (h[e] = r), i(r)
			},
			load: function(e, n, r, i) {
				if (i.isBuild && !i.inlineText) {
					r();
					return
				}
				p.isBuild = i.isBuild;
				var s = t.parseName(e),
					o = s.moduleName + (s.ext ? "." + s.ext : ""),
					u = n.toUrl(o),
					h = p.useXhr || t.useXhr;
				!a || h(u, f, l, c) ? t.get(u, function(n) {
					t.finishLoad(e, s.strip, n, r)
				}, function(e) {
					r.error && r.error(e)
				}) : n([o], function(e) {
					t.finishLoad(s.moduleName + "." + s.ext, s.strip, e, r)
				})
			},
			write: function(e, n, r, i) {
				if (h.hasOwnProperty(n)) {
					var s = h[n];
					/^\s*define\s*\(\s*function\s*\(/.test(s) || (s = "define(function () { return '" + t.jsEscape(s) + "';});"), r.asModule(e + "!" + n, s + "\n")
				}
			},
			writeFile: function(e, n, r, i, s) {
				var o = t.parseName(n),
					u = o.ext ? "." + o.ext : "",
					a = o.moduleName + u,
					f = r.toUrl(o.moduleName + u) + ".js";
				t.load(a, r, function(n) {
					var r = function(e) {
						return i(f, e)
					};
					r.asModule = function(e, t) {
						return i.asModule(e, f, t)
					}, t.write(e, a, r, s)
				}, s)
			}
		};
		if (p.env === "node" || !p.env && typeof process != "undefined" && process.versions && !!process.versions.node) n = require.nodeRequire("fs"), t.get = function(e, t) {
			var r = n.readFileSync(e, "utf8");
			r.indexOf("\ufeff") === 0 && (r = r.substring(1)), t(r)
		};
		else if (p.env === "xhr" || !p.env && t.createXhr()) t.get = function(e, n, r, i) {
			var s = t.createXhr(),
				o;
			s.open("GET", e, !0);
			if (i)
				for (o in i) i.hasOwnProperty(o) && s.setRequestHeader(o.toLowerCase(), i[o]);
			p.onXhr && p.onXhr(s, e), s.onreadystatechange = function(t) {
				var i, o;
				s.readyState === 4 && (i = s.status, i > 399 && i < 600 ? (o = new Error(e + " HTTP status: " + i), o.xhr = s, r(o)) : n(s.responseText), p.onXhrComplete && p.onXhrComplete(s, e))
			}, s.send(null)
		};
		else if (p.env === "rhino" || !p.env && typeof Packages != "undefined" && typeof java != "undefined") t.get = function(e, t) {
			var n, r, i = "utf-8",
				s = new java.io.File(e),
				o = java.lang.System.getProperty("line.separator"),
				u = new java.io.BufferedReader(new java.io.InputStreamReader(new java.io.FileInputStream(s), i)),
				a = "";
			try {
				n = new java.lang.StringBuffer, r = u.readLine(), r && r.length() && r.charAt(0) === 65279 && (r = r.substring(1)), n.append(r);
				while ((r = u.readLine()) !== null) n.append(o), n.append(r);
				a = String(n.toString())
			} finally {
				u.close()
			}
			t(a)
		};
		else if (p.env === "xpconnect" || !p.env && typeof Components != "undefined" && Components.classes && Components.interfaces) r = Components.classes, i = Components.interfaces, Components.utils["import"]("resource://gre/modules/FileUtils.jsm"), t.get = function(e, t) {
			var n, s, o = {},
				u = new FileUtils.File(e);
			try {
				n = r["@mozilla.org/network/file-input-stream;1"].createInstance(i.nsIFileInputStream), n.init(u, 1, 0, !1), s = r["@mozilla.org/intl/converter-input-stream;1"].createInstance(i.nsIConverterInputStream), s.init(n, "utf-8", n.available(), i.nsIConverterInputStream.DEFAULT_REPLACEMENT_CHARACTER), s.readString(n.available(), o), s.close(), n.close(), t(o.value)
			} catch (a) {
				throw new Error((u && u.path || "") + ": " + a)
			}
		};
		return t
	}), define("text!pages/../../assets/css/base.css", [], function() {
		return '*{-webkit-tap-highlight-color:rgba(0,0,0,0)}html{-webkit-text-size-adjust:100%;-webkit-touch-callout:none;-webkit-user-select:none}html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;outline:0;vertical-align:baseline}audio,canvas,video{display:inline-block;*display:inline;*zoom:1}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}audio,canvas,video{display:inline-block;*display:inline;*zoom:1}body{font:16px/1.5 Helvetica,sans-serif}a:hover{text-decoration:underline}ins,a{text-decoration:none}ol,ul{list-style:none}fieldset,img{border:0}table{border-collapse:collapse;border-spacing:0}th{text-align:inherit}iframe{display:block}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:500}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}.d-clear:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0}.d-clear{zoom:1}.d-left,.d-right{display:inline}.d-left{float:left}.d-right{float:right}.d-text-overflow{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}'
	}), define("text!pages/../../assets/css/idangerous.swiper.css", [], function() {
		return ".swiper-container{margin:0 auto;position:relative;overflow:hidden;-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;-ms-backface-visibility:hidden;-o-backface-visibility:hidden;backface-visibility:hidden;z-index:1}.swiper-wrapper{position:relative;width:100%;-webkit-transition-property:-webkit-transform,left,top;-webkit-transition-duration:0s;-webkit-transform:translate3d(0px,0,0);-webkit-transition-timing-function:ease;-moz-transition-property:-moz-transform,left,top;-moz-transition-duration:0s;-moz-transform:translate3d(0px,0,0);-moz-transition-timing-function:ease;-o-transition-property:-o-transform,left,top;-o-transition-duration:0s;-o-transform:translate3d(0px,0,0);-o-transition-timing-function:ease;-o-transform:translate(0px,0);-ms-transition-property:-ms-transform,left,top;-ms-transition-duration:0s;-ms-transform:translate3d(0px,0,0);-ms-transition-timing-function:ease;transition-property:transform,left,top;transition-duration:0s;transform:translate3d(0px,0,0);transition-timing-function:ease;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box}.swiper-free-mode>.swiper-wrapper{-webkit-transition-timing-function:ease-out;-moz-transition-timing-function:ease-out;-ms-transition-timing-function:ease-out;-o-transition-timing-function:ease-out;transition-timing-function:ease-out;margin:0 auto}.swiper-wp8-horizontal{-ms-touch-action:pan-y}.swiper-wp8-vertical{-ms-touch-action:pan-x}.swiper-container{}.swiper-slide{}.swiper-slide-active{}.swiper-slide-visible{}.swiper-pagination-switch{}.swiper-active-switch{}.swiper-visible-switch{}"
	}), define("text!pages/../../assets/css/main.css", [], function() {
		return "@font-face{font-family:HELVETICANEUELTPRO;src:url(http://mat1.gtimg.com/finance/images/stock/p/vstar/HELVETICANEUELTPRO-THEX.OTF) format('truetype')}.title{height:26px;line-height:26px;display:inline-block;float:left;margin-left:15px}.sub-title{font-family:HELVETICANEUELTPRO,Helvetica,sans-serif;font-size:25px;height:28px;line-height:28px;display:inline-block;float:left;padding-top:2px;margin-left:15px}.bg-img{background:no-repeat center top;background-size:cover;width:100%;height:100%;position:absolute;top:0;left:0;z-index:-10}.share{width:100%;height:30px;line-height:30px;background-color:rgba(0,0,0,.6);position:absolute;left:0;top:0;text-align:center;color:#fff;font-size:12px;display:none;z-index:99999}.blur{-webkit-filter:blur(3px);-moz-filter:blur(3px);-ms-filter:blur(3px);filter:blur(3px)}.swiper-container{width:104%;height:100%;color:#fff;text-align:center;position:relative;left:-2%}.arrows{background:url(http://mat1.gtimg.com/finance/images/stock/p/vstar/arrows4_tp4.png) no-repeat center center;width:100%;height:30px;background-size:30px 30px;position:absolute;z-index:999;left:0;top:-60px;display:none}.arrows2{background:url(http://mat1.gtimg.com/finance/images/stock/p/vstar/arrows5_tp4.png) no-repeat center center;width:100%;height:30px;background-size:30px 30px;margin-top:40px;display:none}.swiper-container .swiper-slide{opacity:.2;margin-top:15px}.swiper-container .swiper-item{width:100%;height:110px;background-color:rgba(0,0,0,.6);position:relative}.swiper-container .swiper-item.slide-bg{background-size:cover;background-repeat:no-repeat;background-color:#000;-webkit-transform:skew(-15deg);width:108%;left:-4%}.swiper-container .swiper-item .swiper-item-bg{background-color:#000;opacity:.6;position:absolute;top:0;left:0;height:100%;width:100%}.swiper-container .swiper-item .swiper-item-name{height:26px;position:absolute;top:0;left:0;text-align:left;width:100%;font-size:23px;-webkit-transform:skew(-15deg);margin-top:5px}.swiper-container .swiper-item .swiper-item-con{position:absolute;top:42px;left:15px;text-align:left;width:90%;font-size:15px;-webkit-transform:skew(-15deg);margin-top:5px;height:45px;overflow:hidden}.swiper-container .swiper-item .swiper-item-white{width:9px;height:9px;border-radius:100%;background:#fff;position:relative;left:8px;top:8px;display:none}.swiper-container .swiper-item .swiper-item-red{width:5px;height:5px;border-radius:100%;background:#c20000;position:relative;left:2px;top:2px}.swiper-container .swiper-item .swiper-item-name.item-name{width:34px;height:17px}.swiper-container .pagination{height:30px}.topTip{position:absolute;left:0;top:0;width:100%;height:27px;background:#000;opacity:.7;-moz-opacity:.7;filter:alpha(opacity=70);z-index:999}.topTip .inner{line-height:27px;margin:0 40px}.topTip .inner p{white-space:nowrap;overflow:-webkit-marquee;-webkit-marquee-direction:left;-webkit-marquee-speed:normal;-webkit-marquee-style:scroll;-webkit-marquee-repetition:1}.topTip .inner a{color:#fff;font-size:13px;text-decoration:none}.icoLb{position:absolute;left:9px;top:8px;display:inline-block;width:15px;height:12px;background:url(http://mat1.gtimg.com/www/utopia/vstar/img/ico_laba.png) 0 0 no-repeat;-webkit-background-size:15px 12px;background-size:15px 12px;-webkit-animation:flash 2s .2s ease both infinite;-moz-animation:flash 1s .2s ease both infinite}.icoClose{position:absolute;right:0;top:7px;display:inline-block;width:24px;height:24px;background:url(http://mat1.gtimg.com/www/utopia/vstar/img/ico_closebtn.png) 0 0 no-repeat;-webkit-background-size:14px 14px;background-size:14px 14px}@-webkit-keyframes flash{0%,50%,100%{opacity:1}25%,75%{opacity:.3}}@-moz-keyframes flash{0%,50%,100%{opacity:1}25%,75%{opacity:.3}}"
	}), define("WeixinApi", ["require"], function(e) {
		var t = function() {
			function e(e, t) {
				t = t || {};
				var n = function(e) {
					WeixinJSBridge.invoke("shareTimeline", {
						appid: e.appId ? e.appId : "",
						img_url: e.imgUrl,
						link: e.link,
						desc: e.title,
						title: e.desc,
						img_width: "120",
						img_height: "120"
					}, function(e) {
						switch (e.err_msg) {
							case "share_timeline:cancel":
								t.cancel && t.cancel(e);
								break;
							case "share_timeline:fail":
								t.fail && t.fail(e);
								break;
							case "share_timeline:confirm":
							case "share_timeline:ok":
								t.confirm && t.confirm(e)
						}
						t.all && t.all(e)
					})
				};
				WeixinJSBridge.on("menu:share:timeline", function(r) {
					t.async && t.ready ? (window._wx_loadedCb_ = t.dataLoaded || new Function, window._wx_loadedCb_.toString().indexOf("_wx_loadedCb_") > 0 && (window._wx_loadedCb_ = new Function), t.dataLoaded = function(e) {
						window._wx_loadedCb_(e), n(e)
					}, t.ready && t.ready(r)) : (t.ready && t.ready(r), n(e))
				})
			}

			function t(e, t) {
				t = t || {};
				var n = function(e) {
					WeixinJSBridge.invoke("sendAppMessage", {
						appid: e.appId ? e.appId : "",
						img_url: e.imgUrl,
						link: e.link,
						desc: e.desc,
						title: e.title,
						img_width: "120",
						img_height: "120"
					}, function(e) {
						switch (e.err_msg) {
							case "send_app_msg:cancel":
								t.cancel && t.cancel(e);
								break;
							case "send_app_msg:fail":
								t.fail && t.fail(e);
								break;
							case "send_app_msg:confirm":
							case "send_app_msg:ok":
								t.confirm && t.confirm(e)
						}
						t.all && t.all(e)
					})
				};
				WeixinJSBridge.on("menu:share:appmessage", function(r) {
					t.async && t.ready ? (window._wx_loadedCb_ = t.dataLoaded || new Function, window._wx_loadedCb_.toString().indexOf("_wx_loadedCb_") > 0 && (window._wx_loadedCb_ = new Function), t.dataLoaded = function(e) {
						window._wx_loadedCb_(e), n(e)
					}, t.ready && t.ready(r)) : (t.ready && t.ready(r), n(e))
				})
			}

			function n(e, t) {
				t = t || {};
				var n = function(e) {
					WeixinJSBridge.invoke("shareWeibo", {
						content: e.desc,
						link: e.link,
						img_url: e.imgUrl,
						title: e.title,
						img_width: "120",
						img_height: "120"
					}, function(e) {
						switch (e.err_msg) {
							case "share_weibo:cancel":
								t.cancel && t.cancel(e);
								break;
							case "share_weibo:fail":
								t.fail && t.fail(e);
								break;
							case "share_weibo:confirm":
							case "share_weibo:ok":
								t.confirm && t.confirm(e)
						}
						t.all && t.all(e)
					})
				};
				WeixinJSBridge.on("menu:share:weibo", function(r) {
					t.async && t.ready ? (window._wx_loadedCb_ = t.dataLoaded || new Function, window._wx_loadedCb_.toString().indexOf("_wx_loadedCb_") > 0 && (window._wx_loadedCb_ = new Function), t.dataLoaded = function(e) {
						window._wx_loadedCb_(e), n(e)
					}, t.ready && t.ready(r)) : (t.ready && t.ready(r), n(e))
				})
			}

			function r(e, t) {
				if (!e || !t || t.length == 0) return;
				WeixinJSBridge.invoke("imagePreview", {
					current: e,
					urls: t
				})
			}

			function i() {
				WeixinJSBridge.call("showOptionMenu")
			}

			function s() {
				WeixinJSBridge.call("hideOptionMenu")
			}

			function o() {
				WeixinJSBridge.call("showToolbar")
			}

			function u() {
				WeixinJSBridge.call("hideToolbar")
			}

			function a(e) {
				e && typeof e == "function" && WeixinJSBridge.invoke("getNetworkType", {}, function(t) {
					e(t.err_msg)
				})
			}

			function f() {
				WeixinJSBridge.call("closeWindow")
			}

			function l(e) {
				if (e && typeof e == "function") {
					var t = this,
						n = function() {
							e(t)
						};
					typeof window.WeixinJSBridge == "undefined" ? document.addEventListener ? document.addEventListener("WeixinJSBridgeReady", n, !1) : document.attachEvent && (document.attachEvent("WeixinJSBridgeReady", n), document.attachEvent("onWeixinJSBridgeReady", n)) : n()
				}
			}
			return {
				version: "1.6",
				ready: l,
				shareToTimeline: e,
				shareToWeibo: n,
				shareToFriend: t,
				showOptionMenu: i,
				hideOptionMenu: s,
				showToolbar: o,
				hideToolbar: u,
				getNetworkType: a,
				imagePreview: r,
				closeWindow: f
			}
		}();
		return t
	}), define("pages/main", ["require", "exports", "module", "swiper", "DoreJS/Base", "../view", "../lib/tool", "../lib/cookie", "boss", "text!../../assets/css/base.css", "text!../../assets/css/idangerous.swiper.css", "text!../../assets/css/main.css", "WeixinApi"], function(e, t, n) {
		var r = e("swiper"),
			i = e("DoreJS/Base"),
			s = e("../view"),
			o = e("../lib/tool").single(),
			u = e("../lib/cookie"),
			a = e("boss"),
			f = s.extend({
				views: {},
				events: {
					"click .swiper-slide": function(e) {
						var t = this.get("tplData"),
							n = t.module[$(e.currentTarget).data("item")].f_model_url,
							r = $(e.currentTarget).data("item");
						if (t.module[r].onshow) {
							var i = t.module[r].f_model_type,
								s = t.module[r].f_date;
							u.set(i, o.datetime_to_unix(s))
						}
						setTimeout(function() {
							window.location.href = o.url(n)
						}, 330)
					},
					"tap .share": function(e) {
						app.wx_subscribe_url && (window.location.href = o.url(app.wx_subscribe_url))
					},
					"tap .topTip .inner": function(e) {
						return window.location.href = $($(".topTip .inner").children("a")[0]).attr("href1"), !1
					},
					"tap .topTip .icoClose": function(e) {
						var t = "close_banner_" + $(e.target).parents(".topTip").data("pid"),
							n = (new Date).toDateString();
						typeof window.localStorage != "undefined" && window.localStorage.setItem(t, n);
						var r = new Date;
						return r.setTime(r.getTime() + 864e5), $.cookie(t, n, {
							domain: "mobile.ent.qq.com",
							path: "/",
							expires: r
						}), $(e.target).parents(".topTip").hide(), !1
					}
				},
				initialize: function(t) {
					this.set("style", [e("text!../../assets/css/base.css"), e("text!../../assets/css/idangerous.swiper.css"), e("text!../../assets/css/main.css")]), f.superclass.initialize.call(this, t)
				},
				render: function(t, n) {
					var i = this.get("tplData");
					if (i.f_cover_pic_after[app.picIndex]) var s = window.screen.availWidth,
						u = window.screen.availHeight,
						a = {
							"background-image": "url(" + o.shipei(i.f_cover_pic_after[app.picIndex]) + ")"
						};
					f.superclass.render.call(this), $(".bg-img").css(a);
					var l = $(".swiper-container").find(".swiper-slide");
					l.each(function(e) {
						setTimeout(function() {
							$(l.get(e)).animate({
								opacity: 1,
								rotate: "15deg",
								skew: "15deg",
								translate3d: "0, 0, 0"
							}, 500, "ease-out"), e > 1 && $(l.get(e)).css("opacity", 0)
						}, $(l.get(e)).attr("data-delay"))
					});
					var c = 0,
						d = 0,
						v = $(window).height() / 2 - 13,
						m = 0,
						g;
					$(".swiper-wrapper").css("height", 1);
					var y = new r(".swiper-container", {
						mode: "vertical",
						calculateHeight: !1,
						slidesPerView: "auto",
						watchActiveIndex: !0,
						freeModeFluid: !0,
						onTouchStart: function() {
							c = 0
						},
						onTouchMove: function(e) {
							d || (d = 1, g = setTimeout(function() {
								$(".bg-img").addClass("blur")
							}, 400)), e.positions.current > -10 && (d = 0, clearTimeout(g), $(".bg-img").removeClass("blur"));
							if (e.activeIndex > 1 && m != e.activeIndex && $(".swiper-slide").eq(e.activeIndex).css("opacity") == 0) {
								m = e.activeIndex, $(".swiper-slide").eq(e.activeIndex).css({
									opacity: 0,
									"-webkit-transform": "rotate(15deg) skew(15deg) translate3d(0px, 0px, 0px)"
								}).animate({
									opacity: 1,
									scale: "1",
									rotate: "15deg",
									skew: "15deg",
									translate3d: "0, 0, 0"
								}, 400);
								var t = m;
								while (t--) $(".swiper-slide").eq(t).css("opacity") == 0 && $(".swiper-slide").eq(t).css({
									opacity: 0,
									"-webkit-transform": "rotate(15deg) skew(15deg) translate3d(0px, 0px, 0px)"
								}).animate({
									opacity: 1,
									scale: "1",
									rotate: "15deg",
									skew: "15deg",
									translate3d: "0, 0, 0"
								}, 400)
							}
						},
						onTouchEnd: function(e) {
							e.positions.current > -10 && (d = 0, clearTimeout(g))
						}
					});
					app.loading(!0), $(".swiper-container").css({
						height: $(window).height() / 2,
						paddingTop: $(window).height() / 2,
						overflow: "hidden"
					});
					var b = e("WeixinApi");
					app.network = "unknow", b.ready(function(e) {
						var t = {
							appId: app.appid,
							imgUrl: app.share_img_url,
							link: app.share_link,
							desc: app.share_desc,
							title: app.wx_name
						};
						e.shareToFriend(t);
						var n = {
							appId: app.appid,
							imgUrl: app.share_img_url,
							link: app.share_link,
							desc: app.wx_name + "-" + app.share_desc,
							title: app.wx_name + "-" + app.share_desc
						};
						e.shareToTimeline(n), e.shareToWeibo(t), e.getNetworkType(function(e) {
							app.network = e
						})
					});
					var w = navigator.userAgent.toLowerCase(),
						E = /android/ig.test(w) && /mqq/ig.test(w),
						S = /iphone|ipod|ipad/ig.test(w) && /mqq/ig.test(w);
					S || E ? $(".share").hide() : $(".share").show();
					var x = "close_banner_" + app.data.push.id,
						T = (new Date).toDateString();
					app.data.push && ($.cookie(x) == T ? $(".topTip").hide() : typeof window.localStorage != "undefined" && window.localStorage.getItem(x) == T ? $(".topTip").hide() : $(".topTip").show()), jsTimer.push((new Date).getTime() / 1e3), setTimeout(function() {
						$.boss({
							iTy: 2113,
							iQQ: h(),
							sRef: p(),
							sPageId: jsTimer[0],
							sPos: jsTimer[1],
							iObjectNum: jsTimer[2],
							sObjectList: jsTimer[3],
							sBiz: jsTimer[4],
							sOp: app.network,
							sDomain: navigator.userAgent.toLowerCase()
						})
					}, 1e3)
				}
			}),
			l = function() {
				var e = $.cookie("o_cookie") || $.cookie("uin") || $.cookie("luin");
				return e && (e = e.replace(/^o0+/, "")), e
			},
			c = function() {
				var e, t;
				return $.cookie("randId") ? e = $.cookie("randId") : (t = Date.parse(new Date), e = t + Math.round(Math.random()) * 1e6, $.cookie("randId", e)), e
			},
			h = function() {
				return $.cookie("m_e_openid") || l() || c()
			},
			p = function() {
				var e = navigator.userAgent.toLowerCase(),
					t = /android/ig.test(e) && /mqq/ig.test(e),
					n = /iphone|ipod|ipad/ig.test(e) && /mqq/ig.test(e),
					r = e.indexOf("micromessenger") != -1 ? !0 : !1,
					i = /iphone|ipod|ipad/ig.test(e) && /qqnews/ig.test(e),
					s = /android/ig.test(e) && /\u817e\u8baf\u65b0\u95fb/ig.test(e) || /android/ig.test(e) && /qqnews/ig.test(e);
				return r ? 1 : i || s ? 2 : n || t ? 3 : 4
			};
		n.exports = f
	}), requirejs.config({
		urlArgs: "bust=" + (new Date).getTime(),
		enforceDefine: !0,
		art: {
			ext: ""
		},
		paths: {
			zepto: "../vendor/zepto/zepto",
			boss: "../vendor/zepto/zepto.boss",
			cookie: "../vendor/zepto/zepto.cookie",
			text: "../vendor/require/text",
			art: "../vendor/require/art",
			DoreJS: "../vendor/DoreJS",
			WeixinApi: "../vendor/WeixinApi/WeixinApi",
			swiper: "./lib/idangerous.swiper"
		},
		shim: {
			zepto: {
				exports: "$"
			},
			swiper: {
				deps: ["zepto"],
				exports: "Swiper"
			},
			cookie: {
				deps: ["zepto"],
				exports: "$.cookie"
			},
			boss: {
				deps: ["zepto", "cookie"],
				exports: "$.boss"
			}
		}
	});
var app = app || {
	wx_id: 8
};
define("app", ["require", "lib/loading", "./lib/cookie", "./lib/tool", "./pages/main"], function(e) {
	var t = e("lib/loading"),
		n = e("./lib/cookie");
	app.loading = function(e) {
		e ? t.hide() : t.show()
	};
	var r = e("./lib/tool").single(),
		i = e("./pages/main"),
		s = function(e, t) {
			var n = new Image;
			n.src = e, n.complete ? t(n.width, n.height) : n.onload = function() {
				t(n.width, n.height), n.onload = null
			}
		},
		o = function(e, t) {
			return Math.floor(Math.random() * (t - e)) + e
		},
		u = $(window).width(),
		a = $(window).height();
	$(document.body).css({
		overflow: "hidden",
		width: u,
		height: a,
		"max-height": a
	}), document.addEventListener("touchmove", function(e) {
		e.preventDefault()
	}, !1), jsTimer.push((new Date).getTime() / 1e3), jsTimer.push((new Date).getTime() / 1e3);
	var f = (new Date).getTime(),
		l = r.getDate(2);
	for (var c in app.data.module) {
		app.data.module[c]["f_model_background"] != "" && (app.data.module[c].f_model_background = r.shipei(app.data.module[c].f_model_background));
		var h = app.data.module[c].f_date;
		if (h) {
			var p = n.get(app.data.module[c].f_model_type);
			h = r.datetime_to_unix(h), p != h && h < f && h > l ? app.data.module[c].onshow = !0 : app.data.module[c].onshow = !1
		} else app.data.module[c].onshow = !1
	}
	typeof app.data.f_cover_pic_after == "string" && (app.data.f_cover_pic_after = [app.data.f_cover_pic_after]);
	var d = app.data.f_cover_pic_after.length;
	app.picIndex = o(0, d), app.data.wx_name = app.wx_name;
	var v = new i({
		tplData: app.data
	});
	app.data.f_cover_pic_after[app.picIndex] ? s(r.shipei(app.data.f_cover_pic_after[app.picIndex]), function(e, t) {
		v.render(e, t)
	}) : v.render()
}), require(["app"]); /*  |xGv00|732d3ee99b65c9aa4c6d05241245bfd1 */