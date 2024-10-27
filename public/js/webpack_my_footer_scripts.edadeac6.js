(window.webpackJsonp = window.webpackJsonp || []).push([
	["js/Template/PapersowlCom/webpack_my_footer_scripts"], {
		"/VSb": function(t, e) {
			document.addEventListener("deferred_scripts_loaded", (function() {
				var t = document.querySelector(".js_customers-slider-v2");
				t && tns({
					container: t,
					speed: 600,
					autoplay: !1,
					autoplayTimeout: 1e4,
					nav: !0,
					mouseDrag: !0,
					autoplayButtonOutput: !1,
					gutter: 30,
					responsive: {
						768: {
							edgePadding: 60
						},
						1024: {
							edgePadding: 200
						}
					}
				});
				var e = document.querySelector(".js_slider__our_writers");
				e && tns({
					container: e,
					speed: 600,
					items: 1,
					nav: !1,
					mouseDrag: !0,
					responsive: {
						1150: {
							items: 2
						},
						1260: {
							items: 3
						}
					}
				}), (o = document.querySelector(".js-team-slider-v2")) && tns({
					container: o,
					speed: 600,
					items: 1,
					mouseDrag: !0,
					responsive: {
						768: {
							items: 2
						},
						1260: {
							items: 3
						}
					}
				});
				var n = document.querySelector(".js-team-slider-v3");
				n && tns({
					container: n,
					speed: 600,
					items: 1,
					mouseDrag: !0
				});
				var o, i = document.querySelector(".js_how-it-works"),
					r = document.querySelector(".js_how-it-works-nav");
				if (i && r) {
					var s, a, l = !1;

					function c() {
						s = tns({
							container: i,
							navPosition: "bottom",
							loop: !1,
							center: !0,
							gutter: 20,
							edgePadding: 60,
							mouseDrag: !0,
							controls: !1,
							preventScrollOnTouch: "force",
							responsive: {
								768: {
									controls: !0,
									gutter: 60,
									edgePadding: 120
								},
								1024: {
									gutter: 100,
									edgePadding: 250
								}
							}
						}), a = tns({
							container: r,
							controls: !1,
							nav: !1,
							center: !0,
							loop: !1,
							gutter: 0,
							edgePadding: 0,
							mouseDrag: !0,
							preventScrollOnTouch: "force",
							responsive: {
								768: {
									gutter: 60,
									edgePadding: 120
								},
								1024: {
									gutter: 100,
									edgePadding: 250
								}
							}
						}), l = !0
					}

					function u() {
						p(s, a), d(s, a), d(a, s)
					}

					function d(t, e) {
						t.events.on("indexChanged", (function() {
							var n = t.getInfo().index;
							n !== e.getInfo().index && e.goTo(n), p(t)
						}))
					}
					window.innerWidth <= 1024 && (c(), u()), window.addEventListener("resize", (function() {
						window.innerWidth <= 1024 ? l ? s.isOn || (s = s.rebuild(), a = a.rebuild(), u()) : (c(), u()) : l && s.isOn && (s.destroy(), a.destroy())
					}))
				}

				function p() {
					for (var t = 0; t < arguments.length; t++) {
						var e = arguments[t].getInfo(),
							n = e.index,
							o = e.indexCached;
						e.slideItems[o].classList.remove("is-active-slide"), e.slideItems[n].classList.add("is-active-slide")
					}
				}(o = document.querySelector(".js_slider__writer-sample-v2")) && tns({
					container: o,
					gutter: 30,
					edgePadding: 15,
					speed: 600,
					items: 1,
					mouseDrag: !0,
					loop: !1,
					responsive: {
						768: {
							items: 2
						},
						1260: {
							items: 3
						}
					}
				}), (o = document.querySelector(".js_slider__our_writers_mars")) && tns({
					container: o,
					gutter: 20,
					speed: 600,
					items: 1,
					mouseDrag: !0,
					loop: !1,
					navPosition: "bottom",
					controls: !1,
					responsive: {
						768: {
							items: 2,
							fixedWidth: 380,
							edgePadding: 15
						},
						1024: {
							items: 3
						},
						1280: {
							nav: !1,
							controls: !0,
							fixedWidth: !1
						}
					}
				})
			}))
		},
		"2Yr3": function(t, e) {
			function n(t) {
				return (n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
					return typeof t
				} : function(t) {
					return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
				})(t)
			}
			var o = function() {
				Object.keys || (Object.keys = function(t) {
					var e = [];
					for (var n in t) Object.prototype.hasOwnProperty.call(t, n) && e.push(n);
					return e
				}), "remove" in Element.prototype || (Element.prototype.remove = function() {
					this.parentNode && this.parentNode.removeChild(this)
				});
				var t = window,
					e = t.requestAnimationFrame || t.webkitRequestAnimationFrame || t.mozRequestAnimationFrame || t.msRequestAnimationFrame || function(t) {
						return setTimeout(t, 16)
					},
					o = window,
					i = o.cancelAnimationFrame || o.mozCancelAnimationFrame || function(t) {
						clearTimeout(t)
					};

				function r() {
					for (var t, e, n, o = arguments[0] || {}, i = 1, r = arguments.length; i < r; i++)
						if (null !== (t = arguments[i]))
							for (e in t) o !== (n = t[e]) && void 0 !== n && (o[e] = n);
					return o
				}

				function s(t) {
					return 0 <= ["true", "false"].indexOf(t) ? JSON.parse(t) : t
				}

				function a(t, e, n, o) {
					if (o) try {
						t.setItem(e, n)
					} catch (t) {}
					return n
				}

				function l() {
					var t = document,
						e = t.body;
					return e || ((e = t.createElement("body")).fake = !0), e
				}
				var c = document.documentElement;

				function u(t) {
					var e = "";
					return t.fake && (e = c.style.overflow, t.style.background = "", t.style.overflow = c.style.overflow = "hidden", c.appendChild(t)), e
				}

				function d(t, e) {
					t.fake && (t.remove(), c.style.overflow = e, c.offsetHeight)
				}

				function p(t, e, n, o) {
					"insertRule" in t ? t.insertRule(e + "{" + n + "}", o) : t.addRule(e, n, o)
				}

				function h(t) {
					return ("insertRule" in t ? t.cssRules : t.rules).length
				}

				function f(t, e, n) {
					for (var o = 0, i = t.length; o < i; o++) e.call(n, t[o], o)
				}
				var g = "classList" in document.createElement("_"),
					m = g ? function(t, e) {
						return t.classList.contains(e)
					} : function(t, e) {
						return 0 <= t.className.indexOf(e)
					},
					v = g ? function(t, e) {
						m(t, e) || t.classList.add(e)
					} : function(t, e) {
						m(t, e) || (t.className += " " + e)
					},
					y = g ? function(t, e) {
						m(t, e) && t.classList.remove(e)
					} : function(t, e) {
						m(t, e) && (t.className = t.className.replace(e, ""))
					};

				function b(t, e) {
					return t.hasAttribute(e)
				}

				function _(t, e) {
					return t.getAttribute(e)
				}

				function w(t) {
					return void 0 !== t.item
				}

				function C(t, e) {
					if (t = w(t) || t instanceof Array ? t : [t], "[object Object]" === Object.prototype.toString.call(e))
						for (var n = t.length; n--;)
							for (var o in e) t[n].setAttribute(o, e[o])
				}

				function S(t, e) {
					t = w(t) || t instanceof Array ? t : [t];
					for (var n = (e = e instanceof Array ? e : [e]).length, o = t.length; o--;)
						for (var i = n; i--;) t[o].removeAttribute(e[i])
				}

				function T(t) {
					for (var e = [], n = 0, o = t.length; n < o; n++) e.push(t[n]);
					return e
				}

				function E(t, e) {
					"none" !== t.style.display && (t.style.display = "none")
				}

				function A(t, e) {
					"none" === t.style.display && (t.style.display = "")
				}

				function x(t) {
					return "none" !== window.getComputedStyle(t).display
				}

				function L(t) {
					if ("string" == typeof t) {
						var e = [t],
							n = t.charAt(0).toUpperCase() + t.substr(1);
						["Webkit", "Moz", "ms", "O"].forEach((function(o) {
							"ms" === o && "transform" !== t || e.push(o + n)
						})), t = e
					}
					for (var o = document.createElement("fakeelement"), i = (t.length, 0); i < t.length; i++) {
						var r = t[i];
						if (void 0 !== o.style[r]) return r
					}
					return !1
				}

				function B(t, e) {
					var n = !1;
					return /^Webkit/.test(t) ? n = "webkit" + e + "End" : /^O/.test(t) ? n = "o" + e + "End" : t && (n = e.toLowerCase() + "end"), n
				}
				var O = !1;
				try {
					var M = Object.defineProperty({}, "passive", {
						get: function() {
							O = !0
						}
					});
					window.addEventListener("test", null, M)
				} catch (t) {}
				var $ = !!O && {
					passive: !0
				};

				function I(t, e, n) {
					for (var o in e) {
						var i = 0 <= ["touchstart", "touchmove"].indexOf(o) && !n && $;
						t.addEventListener(o, e[o], i)
					}
				}

				function k(t, e) {
					for (var n in e) {
						var o = 0 <= ["touchstart", "touchmove"].indexOf(n) && $;
						t.removeEventListener(n, e[n], o)
					}
				}

				function P() {
					return {
						topics: {},
						on: function(t, e) {
							this.topics[t] = this.topics[t] || [], this.topics[t].push(e)
						},
						off: function(t, e) {
							if (this.topics[t])
								for (var n = 0; n < this.topics[t].length; n++)
									if (this.topics[t][n] === e) {
										this.topics[t].splice(n, 1);
										break
									}
						},
						emit: function(t, e) {
							e.type = t, this.topics[t] && this.topics[t].forEach((function(n) {
								n(e, t)
							}))
						}
					}
				}
				return function t(o) {
					o = r({
						container: ".slider",
						mode: "carousel",
						axis: "horizontal",
						items: 1,
						gutter: 0,
						edgePadding: 0,
						fixedWidth: !1,
						autoWidth: !1,
						viewportMax: !1,
						slideBy: 1,
						center: !1,
						controls: !0,
						controlsPosition: "top",
						controlsText: ["prev", "next"],
						controlsContainer: !1,
						prevButton: !1,
						nextButton: !1,
						nav: !0,
						navPosition: "top",
						navContainer: !1,
						navAsThumbnails: !1,
						arrowKeys: !1,
						speed: 300,
						autoplay: !1,
						autoplayPosition: "top",
						autoplayTimeout: 5e3,
						autoplayDirection: "forward",
						autoplayText: ["start", "stop"],
						autoplayHoverPause: !1,
						autoplayButton: !1,
						autoplayButtonOutput: !0,
						autoplayResetOnVisibility: !0,
						animateIn: "tns-fadeIn",
						animateOut: "tns-fadeOut",
						animateNormal: "tns-normal",
						animateDelay: !1,
						loop: !0,
						rewind: !1,
						autoHeight: !1,
						responsive: !1,
						lazyload: !1,
						lazyloadSelector: ".tns-lazy-img",
						touch: !0,
						mouseDrag: !1,
						swipeAngle: 15,
						nested: !1,
						preventActionWhenRunning: !1,
						preventScrollOnTouch: !1,
						freezable: !0,
						onInit: !1,
						useLocalStorage: !0
					}, o || {});
					var c = document,
						g = window,
						w = {
							ENTER: 13,
							SPACE: 32,
							LEFT: 37,
							RIGHT: 39
						},
						O = {},
						M = o.useLocalStorage;
					if (M) {
						var $ = navigator.userAgent,
							H = new Date;
						try {
							(O = g.localStorage) ? (O.setItem(H, H), M = O.getItem(H) == H, O.removeItem(H)) : M = !1, M || (O = {})
						} catch ($) {
							M = !1
						}
						M && (O.tnsApp && O.tnsApp !== $ && ["tC", "tPL", "tMQ", "tTf", "t3D", "tTDu", "tTDe", "tADu", "tADe", "tTE", "tAE"].forEach((function(t) {
							O.removeItem(t)
						})), localStorage.tnsApp = $)
					}
					var D, N, q, z, R, j, W, U = O.tC ? s(O.tC) : a(O, "tC", function() {
							var t = document,
								e = l(),
								n = u(e),
								o = t.createElement("div"),
								i = !1;
							e.appendChild(o);
							try {
								for (var r, s = "(10px * 10)", a = ["calc" + s, "-moz-calc" + s, "-webkit-calc" + s], c = 0; c < 3; c++)
									if (r = a[c], o.style.width = r, 100 === o.offsetWidth) {
										i = r.replace(s, "");
										break
									}
							} catch (t) {}
							return e.fake ? d(e, n) : o.remove(), i
						}(), M),
						G = O.tPL ? s(O.tPL) : a(O, "tPL", function() {
							var t, e = document,
								n = l(),
								o = u(n),
								i = e.createElement("div"),
								r = e.createElement("div"),
								s = "";
							i.className = "tns-t-subp2", r.className = "tns-t-ct";
							for (var a = 0; a < 70; a++) s += "<div></div>";
							return r.innerHTML = s, i.appendChild(r), n.appendChild(i), t = Math.abs(i.getBoundingClientRect().left - r.children[67].getBoundingClientRect().left) < 2, n.fake ? d(n, o) : i.remove(), t
						}(), M),
						V = O.tMQ ? s(O.tMQ) : a(O, "tMQ", (N = document, z = u(q = l()), R = N.createElement("div"), W = "@media all and (min-width:1px){.tns-mq-test{position:absolute}}", (j = N.createElement("style")).type = "text/css", R.className = "tns-mq-test", q.appendChild(j), q.appendChild(R), j.styleSheet ? j.styleSheet.cssText = W : j.appendChild(N.createTextNode(W)), D = window.getComputedStyle ? window.getComputedStyle(R).position : R.currentStyle.position, q.fake ? d(q, z) : R.remove(), "absolute" === D), M),
						F = O.tTf ? s(O.tTf) : a(O, "tTf", L("transform"), M),
						K = O.t3D ? s(O.t3D) : a(O, "t3D", function(t) {
							if (!t) return !1;
							if (!window.getComputedStyle) return !1;
							var e, n = document,
								o = l(),
								i = u(o),
								r = n.createElement("p"),
								s = 9 < t.length ? "-" + t.slice(0, -9).toLowerCase() + "-" : "";
							return s += "transform", o.insertBefore(r, null), r.style[t] = "translate3d(1px,1px,1px)", e = window.getComputedStyle(r).getPropertyValue(s), o.fake ? d(o, i) : r.remove(), void 0 !== e && 0 < e.length && "none" !== e
						}(F), M),
						X = O.tTDu ? s(O.tTDu) : a(O, "tTDu", L("transitionDuration"), M),
						Y = O.tTDe ? s(O.tTDe) : a(O, "tTDe", L("transitionDelay"), M),
						Z = O.tADu ? s(O.tADu) : a(O, "tADu", L("animationDuration"), M),
						J = O.tADe ? s(O.tADe) : a(O, "tADe", L("animationDelay"), M),
						Q = O.tTE ? s(O.tTE) : a(O, "tTE", B(X, "Transition"), M),
						tt = O.tAE ? s(O.tAE) : a(O, "tAE", B(Z, "Animation"), M),
						et = g.console && "function" == typeof g.console.warn,
						nt = ["container", "controlsContainer", "prevButton", "nextButton", "navContainer", "autoplayButton"],
						ot = {};
					if (nt.forEach((function(t) {
							if ("string" == typeof o[t]) {
								var e = o[t],
									n = c.querySelector(e);
								if (ot[t] = e, !n || !n.nodeName) return void(et && console.warn("Can't find", o[t]));
								o[t] = n
							}
						})), !(o.container.children.length < 1)) {
						var it = o.responsive,
							rt = o.nested,
							st = "carousel" === o.mode;
						if (it) {
							0 in it && (o = r(o, it[0]), delete it[0]);
							var at = {};
							for (var lt in it) {
								var ct = it[lt];
								ct = "number" == typeof ct ? {
									items: ct
								} : ct, at[lt] = ct
							}
							it = at, at = null
						}
						if (st || function t(e) {
								for (var n in e) st || ("slideBy" === n && (e[n] = "page"), "edgePadding" === n && (e[n] = !1), "autoHeight" === n && (e[n] = !1)), "responsive" === n && t(e[n])
							}(o), !st) {
							o.axis = "horizontal", o.slideBy = "page", o.edgePadding = !1;
							var ut = o.animateIn,
								dt = o.animateOut,
								pt = o.animateDelay,
								ht = o.animateNormal
						}
						var ft, gt, mt = "horizontal" === o.axis,
							vt = c.createElement("div"),
							yt = c.createElement("div"),
							bt = o.container,
							_t = bt.parentNode,
							wt = bt.outerHTML,
							Ct = bt.children,
							St = Ct.length,
							Tt = Dn(),
							Et = !1;
						it && oo(), st && (bt.className += " tns-vpfix");
						var At, xt, Lt, Bt, Ot, Mt, $t, It = o.autoWidth,
							kt = Rn("fixedWidth"),
							Pt = Rn("edgePadding"),
							Ht = Rn("gutter"),
							Dt = qn(),
							Nt = Rn("center"),
							qt = It ? 1 : Math.floor(Rn("items")),
							zt = Rn("slideBy"),
							Rt = o.viewportMax || o.fixedWidthViewportWidth,
							jt = Rn("arrowKeys"),
							Wt = Rn("speed"),
							Ut = o.rewind,
							Gt = !Ut && o.loop,
							Vt = Rn("autoHeight"),
							Ft = Rn("controls"),
							Kt = Rn("controlsText"),
							Xt = Rn("nav"),
							Yt = Rn("touch"),
							Zt = Rn("mouseDrag"),
							Jt = Rn("autoplay"),
							Qt = Rn("autoplayTimeout"),
							te = Rn("autoplayText"),
							ee = Rn("autoplayHoverPause"),
							ne = Rn("autoplayResetOnVisibility"),
							oe = ($t = document.createElement("style"), document.querySelector("head").appendChild($t), $t.sheet ? $t.sheet : $t.styleSheet),
							ie = o.lazyload,
							re = (o.lazyloadSelector, []),
							se = Gt ? (Ot = function() {
								if (It || kt && !Rt) return St - 1;
								var t = kt ? "fixedWidth" : "items",
									e = [];
								if ((kt || o[t] < St) && e.push(o[t]), it)
									for (var n in it) {
										var i = it[n][t];
										i && (kt || i < St) && e.push(i)
									}
								return e.length || e.push(0), Math.ceil(kt ? Rt / Math.min.apply(null, e) : Math.max.apply(null, e))
							}(), Mt = st ? Math.ceil((5 * Ot - St) / 2) : 4 * Ot - St, Mt = Math.max(Ot, Mt), zn("edgePadding") ? Mt + 1 : Mt) : 0,
							ae = st ? St + 2 * se : St + se,
							le = !(!kt && !It || Gt),
							ce = kt ? Mo() : null,
							ue = !st || !Gt,
							de = mt ? "left" : "top",
							pe = "",
							he = "",
							fe = kt ? function() {
								return Nt && !Gt ? St - 1 : Math.ceil(-ce / (kt + Ht))
							} : It ? function() {
								for (var t = ae; t--;)
									if (At[t] >= -ce) return t
							} : function() {
								return Nt && st && !Gt ? St - 1 : Gt || st ? Math.max(0, ae - Math.ceil(qt)) : ae - 1
							},
							ge = kn(Rn("startIndex")),
							me = ge,
							ve = (In(), 0),
							ye = It ? null : fe(),
							be = o.preventActionWhenRunning,
							_e = o.swipeAngle,
							we = !_e || "?",
							Ce = !1,
							Se = o.onInit,
							Te = new P,
							Ee = " tns-slider tns-" + o.mode,
							Ae = bt.id || (Bt = window.tnsId, window.tnsId = Bt ? Bt + 1 : 1, "tns" + window.tnsId),
							xe = Rn("disable"),
							Le = !1,
							Be = o.freezable,
							Oe = !(!Be || It) && no(),
							Me = !1,
							$e = {
								click: zo,
								keydown: function(t) {
									t = Ko(t);
									var e = [w.LEFT, w.RIGHT].indexOf(t.keyCode);
									0 <= e && (0 === e ? Qe.disabled || zo(t, -1) : tn.disabled || zo(t, 1))
								}
							},
							Ie = {
								click: function(t) {
									if (Ce) {
										if (be) return;
										No()
									}
									for (var e = Xo(t = Ko(t)); e !== rn && !b(e, "data-nav");) e = e.parentNode;
									if (b(e, "data-nav")) {
										var n = cn = Number(_(e, "data-nav")),
											o = kt || It ? n * St / an : n * qt;
										qo(Re ? n : Math.min(Math.ceil(o), St - 1), t), un === n && (mn && Go(), cn = -1)
									}
								},
								keydown: function(t) {
									t = Ko(t);
									var e = c.activeElement;
									if (b(e, "data-nav")) {
										var n = [w.LEFT, w.RIGHT, w.ENTER, w.SPACE].indexOf(t.keyCode),
											o = Number(_(e, "data-nav"));
										0 <= n && (0 === n ? 0 < o && Fo(on[o - 1]) : 1 === n ? o < an - 1 && Fo(on[o + 1]) : qo(cn = o, t))
									}
								}
							},
							ke = {
								mouseover: function() {
									mn && (jo(), vn = !0)
								},
								mouseout: function() {
									vn && (Ro(), vn = !1)
								}
							},
							Pe = {
								visibilitychange: function() {
									c.hidden ? mn && (jo(), bn = !0) : bn && (Ro(), bn = !1)
								}
							},
							He = {
								keydown: function(t) {
									t = Ko(t);
									var e = [w.LEFT, w.RIGHT].indexOf(t.keyCode);
									0 <= e && zo(t, 0 === e ? -1 : 1)
								}
							},
							De = {
								touchstart: Qo,
								touchmove: ti,
								touchend: ei,
								touchcancel: ei
							},
							Ne = {
								mousedown: Qo,
								mousemove: ti,
								mouseup: ei,
								mouseleave: ei
							},
							qe = zn("controls"),
							ze = zn("nav"),
							Re = !!It || o.navAsThumbnails,
							je = zn("autoplay"),
							We = zn("touch"),
							Ue = zn("mouseDrag"),
							Ge = "tns-slide-active",
							Ve = "tns-complete",
							Fe = {
								load: function(t) {
									ho(Xo(t))
								},
								error: function(t) {
									var e;
									e = Xo(t), v(e, "failed"), fo(e)
								}
							},
							Ke = "force" === o.preventScrollOnTouch;
						if (qe) var Xe, Ye, Ze = o.controlsContainer,
							Je = o.controlsContainer ? o.controlsContainer.outerHTML : "",
							Qe = o.prevButton,
							tn = o.nextButton,
							en = o.prevButton ? o.prevButton.outerHTML : "",
							nn = o.nextButton ? o.nextButton.outerHTML : "";
						if (ze) var on, rn = o.navContainer,
							sn = o.navContainer ? o.navContainer.outerHTML : "",
							an = It ? St : oi(),
							ln = 0,
							cn = -1,
							un = Hn(),
							dn = un,
							pn = "tns-nav-active",
							hn = "Carousel Page ",
							fn = " (Current Slide)";
						if (je) var gn, mn, vn, yn, bn, _n = "forward" === o.autoplayDirection ? 1 : -1,
							wn = o.autoplayButton,
							Cn = o.autoplayButton ? o.autoplayButton.outerHTML : "",
							Sn = ["<span class='tns-visually-hidden'>", " animation</span>"];
						if (We || Ue) var Tn, En, An = {},
							xn = {},
							Ln = !1,
							Bn = mt ? function(t, e) {
								return t.x - e.x
							} : function(t, e) {
								return t.y - e.y
							};
						It || $n(xe || Oe), F && (de = F, pe = "translate", K ? (pe += mt ? "3d(" : "3d(0px, ", he = mt ? ", 0px, 0px)" : ", 0px)") : (pe += mt ? "X(" : "Y(", he = ")")), st && (bt.className = bt.className.replace("tns-vpfix", "")),
							function() {
								(zn("gutter"), vt.className = "tns-outer", yt.className = "tns-inner", vt.id = Ae + "-ow", yt.id = Ae + "-iw", "" === bt.id && (bt.id = Ae), Ee += G || It ? " tns-subpixel" : " tns-no-subpixel", Ee += U ? " tns-calc" : " tns-no-calc", It && (Ee += " tns-autowidth"), Ee += " tns-" + o.axis, bt.className += Ee, st ? ((ft = c.createElement("div")).id = Ae + "-mw", ft.className = "tns-ovh", vt.appendChild(ft), ft.appendChild(yt)) : vt.appendChild(yt), Vt) && ((ft || yt).className += " tns-ah");
								if (_t.insertBefore(vt, bt), yt.appendChild(bt), f(Ct, (function(t, e) {
										v(t, "tns-item"), t.id || (t.id = Ae + "-item" + e), !st && ht && v(t, ht), C(t, {
											"aria-hidden": "true",
											tabindex: "-1"
										})
									})), se) {
									for (var t = c.createDocumentFragment(), e = c.createDocumentFragment(), n = se; n--;) {
										var i = n % St,
											r = Ct[i].cloneNode(!0);
										if (S(r, "id"), e.insertBefore(r, e.firstChild), st) {
											var s = Ct[St - 1 - i].cloneNode(!0);
											S(s, "id"), t.appendChild(s)
										}
									}
									bt.insertBefore(t, bt.firstChild), bt.appendChild(e), Ct = bt.children
								}
							}(),
							function() {
								if (!st)
									for (var t = ge, e = ge + Math.min(St, qt); t < e; t++) {
										var n = Ct[t];
										n.style.left = 100 * (t - ge) / qt + "%", v(n, ut), y(n, ht)
									}
								if (mt && (G || It ? (p(oe, "#" + Ae + " > .tns-item", "font-size:" + g.getComputedStyle(Ct[0]).fontSize + ";", h(oe)), p(oe, "#" + Ae, "font-size:0;", h(oe))) : st && f(Ct, (function(t, e) {
										var n;
										t.style.marginLeft = (n = e, U ? U + "(" + 100 * n + "% / " + ae + ")" : 100 * n / ae + "%")
									}))), V) {
									if (X) {
										var i = ft && o.autoHeight ? Fn(o.speed) : "";
										p(oe, "#" + Ae + "-mw", i, h(oe))
									}
									i = jn(o.edgePadding, o.gutter, o.fixedWidth, o.speed, o.autoHeight), p(oe, "#" + Ae + "-iw", i, h(oe)), st && (i = mt && !It ? "width:" + Wn(o.fixedWidth, o.gutter, o.items) + ";" : "", X && (i += Fn(Wt)), p(oe, "#" + Ae, i, h(oe))), i = mt && !It ? Un(o.fixedWidth, o.gutter, o.items) : "", o.gutter && (i += Gn(o.gutter)), st || (X && (i += Fn(Wt)), Z && (i += Kn(Wt))), i && p(oe, "#" + Ae + " > .tns-item", i, h(oe))
								} else {
									bo(), yt.style.cssText = jn(Pt, Ht, kt, Vt), st && mt && !It && (bt.style.width = Wn(kt, Ht, qt));
									i = mt && !It ? Un(kt, Ht, qt) : "";
									Ht && (i += Gn(Ht)), i && p(oe, "#" + Ae + " > .tns-item", i, h(oe))
								}
								if (it && V)
									for (var r in it) {
										r = parseInt(r);
										var s = it[r],
											a = (i = "", ""),
											l = "",
											c = "",
											u = "",
											d = It ? null : Rn("items", r),
											m = Rn("fixedWidth", r),
											b = Rn("speed", r),
											_ = Rn("edgePadding", r),
											w = Rn("autoHeight", r),
											C = Rn("gutter", r);
										X && ft && Rn("autoHeight", r) && "speed" in s && (a = "#" + Ae + "-mw{" + Fn(b) + "}"), ("edgePadding" in s || "gutter" in s) && (l = "#" + Ae + "-iw{" + jn(_, C, m, b, w) + "}"), st && mt && !It && ("fixedWidth" in s || "items" in s || kt && "gutter" in s) && (c = "width:" + Wn(m, C, d) + ";"), X && "speed" in s && (c += Fn(b)), c && (c = "#" + Ae + "{" + c + "}"), ("fixedWidth" in s || kt && "gutter" in s || !st && "items" in s) && (u += Un(m, C, d)), "gutter" in s && (u += Gn(C)), !st && "speed" in s && (X && (u += Fn(b)), Z && (u += Kn(b))), u && (u = "#" + Ae + " > .tns-item{" + u + "}"), (i = a + l + c + u) && oe.insertRule("@media (min-width: " + r / 16 + "em) {" + i + "}", oe.cssRules.length)
									}
							}(), Xn();
						var On = Gt ? st ? function() {
								var t = ve,
									e = ye;
								t += zt, e -= zt, Pt ? (t += 1, e -= 1) : kt && (Dt + Ht) % (kt + Ht) && (e -= 1), se && (e < ge ? ge -= St : ge < t && (ge += St))
							} : function() {
								if (ye < ge)
									for (; ve + St <= ge;) ge -= St;
								else if (ge < ve)
									for (; ge <= ye - St;) ge += St
							} : function() {
								ge = Math.max(ve, Math.min(ye, ge))
							},
							Mn = st ? function() {
								var t, e, n, o, i, r, s, a, l, c, u;
								Bo(bt, ""), X || !Wt ? (ko(), Wt && x(bt) || No()) : (t = bt, e = de, n = pe, o = he, i = $o(), r = Wt, s = No, a = Math.min(r, 10), l = 0 <= i.indexOf("%") ? "%" : "px", i = i.replace(l, ""), c = Number(t.style[e].replace(n, "").replace(o, "").replace(l, "")), u = (i - c) / r * a, setTimeout((function i() {
									r -= a, c += u, t.style[e] = n + c + l + o, 0 < r ? setTimeout(i, a) : s()
								}), a)), mt || ni()
							} : function() {
								re = [];
								var t = {};
								t[Q] = t[tt] = No, k(Ct[me], t), I(Ct[ge], t), Po(me, ut, dt, !0), Po(ge, ht, ut), Q && tt && Wt && x(bt) || No()
							};
						return {
							version: "2.9.2",
							getInfo: ri,
							events: Te,
							goTo: qo,
							play: function() {
								Jt && !mn && (Uo(), yn = !1)
							},
							pause: function() {
								mn && (Go(), yn = !0)
							},
							isOn: Et,
							updateSliderHeight: wo,
							refresh: Xn,
							destroy: function() {
								if (oe.disabled = !0, oe.ownerNode && oe.ownerNode.remove(), k(g, {
										resize: to
									}), jt && k(c, He), Ze && k(Ze, $e), rn && k(rn, Ie), k(bt, ke), k(bt, Pe), wn && k(wn, {
										click: Vo
									}), Jt && clearInterval(gn), st && Q) {
									var t = {};
									t[Q] = No, k(bt, t)
								}
								Yt && k(bt, De), Zt && k(bt, Ne);
								var e = [wt, Je, en, nn, sn, Cn];
								for (var i in nt.forEach((function(t, i) {
										var r = "container" === t ? vt : o[t];
										if ("object" == n(r)) {
											var s = !!r.previousElementSibling && r.previousElementSibling,
												a = r.parentNode;
											r.outerHTML = e[i], o[t] = s ? s.nextElementSibling : a.firstElementChild
										}
									})), nt = ut = dt = pt = ht = mt = vt = yt = bt = _t = wt = Ct = St = gt = Tt = It = kt = Pt = Ht = Dt = qt = zt = Rt = jt = Wt = Ut = Gt = Vt = oe = ie = At = re = se = ae = le = ce = ue = de = pe = he = fe = ge = me = ve = ye = _e = we = Ce = Se = Te = Ee = Ae = xe = Le = Be = Oe = Me = $e = Ie = ke = Pe = He = De = Ne = qe = ze = Re = je = We = Ue = Ge = Ve = Fe = xt = Ft = Kt = Ze = Je = Qe = tn = Xe = Ye = Xt = rn = sn = on = an = ln = cn = un = dn = pn = hn = fn = Jt = Qt = _n = te = ee = wn = Cn = ne = Sn = gn = mn = vn = yn = bn = An = xn = Tn = Ln = En = Bn = Yt = Zt = null, this) "rebuild" !== i && (this[i] = null);
								Et = !1
							},
							rebuild: function() {
								return t(r(o, ot))
							}
						}
					}

					function $n(t) {
						t && (Ft = Xt = Yt = Zt = jt = Jt = ee = ne = !1)
					}

					function In() {
						for (var t = st ? ge - se : ge; t < 0;) t += St;
						return t % St + 1
					}

					function kn(t) {
						return t = t ? Math.max(0, Math.min(Gt ? St - 1 : St - qt, t)) : 0, st ? t + se : t
					}

					function Pn(t) {
						for (null == t && (t = ge), st && (t -= se); t < 0;) t += St;
						return Math.floor(t % St)
					}

					function Hn() {
						var t, e = Pn();
						return t = Re ? e : kt || It ? Math.ceil((e + 1) * an / St - 1) : Math.floor(e / qt), !Gt && st && ge === ye && (t = an - 1), t
					}

					function Dn() {
						return g.innerWidth || c.documentElement.clientWidth || c.body.clientWidth
					}

					function Nn(t) {
						return "top" === t ? "afterbegin" : "beforeend"
					}

					function qn() {
						var t = Pt ? 2 * Pt - Ht : 0;
						return function t(e) {
							var n, o, i = c.createElement("div");
							return e.appendChild(i), o = (n = i.getBoundingClientRect()).right - n.left, i.remove(), o || t(e.parentNode)
						}(_t) - t
					}

					function zn(t) {
						if (o[t]) return !0;
						if (it)
							for (var e in it)
								if (it[e][t]) return !0;
						return !1
					}

					function Rn(t, e) {
						if (null == e && (e = Tt), "items" === t && kt) return Math.floor((Dt + Ht) / (kt + Ht)) || 1;
						var n = o[t];
						if (it)
							for (var i in it) e >= parseInt(i) && t in it[i] && (n = it[i][t]);
						return "slideBy" === t && "page" === n && (n = Rn("items")), st || "slideBy" !== t && "items" !== t || (n = Math.floor(n)), n
					}

					function jn(t, e, n, o, i) {
						var r = "";
						if (void 0 !== t) {
							var s = t;
							e && (s -= e), r = mt ? "margin: 0 " + s + "px 0 " + t + "px;" : "margin: " + t + "px 0 " + s + "px 0;"
						} else if (e && !n) {
							var a = "-" + e + "px";
							r = "margin: 0 " + (mt ? a + " 0 0" : "0 " + a + " 0") + ";"
						}
						return !st && i && X && o && (r += Fn(o)), r
					}

					function Wn(t, e, n) {
						return t ? (t + e) * ae + "px" : U ? U + "(" + 100 * ae + "% / " + n + ")" : 100 * ae / n + "%"
					}

					function Un(t, e, n) {
						var o;
						if (t) o = t + e + "px";
						else {
							st || (n = Math.floor(n));
							var i = st ? ae : n;
							o = U ? U + "(100% / " + i + ")" : 100 / i + "%"
						}
						return o = "width:" + o, "inner" !== rt ? o + ";" : o + " !important;"
					}

					function Gn(t) {
						var e = "";
						return !1 !== t && (e = (mt ? "padding-" : "margin-") + (mt ? "right" : "bottom") + ": " + t + "px;"), e
					}

					function Vn(t, e) {
						var n = t.substring(0, t.length - e).toLowerCase();
						return n && (n = "-" + n + "-"), n
					}

					function Fn(t) {
						return Vn(X, 18) + "transition-duration:" + t / 1e3 + "s;"
					}

					function Kn(t) {
						return Vn(Z, 17) + "animation-duration:" + t / 1e3 + "s;"
					}

					function Xn() {
						if (zn("autoHeight") || It || !mt) {
							var t = bt.querySelectorAll("img");
							f(t, (function(t) {
								var e = t.src;
								e && e.indexOf("data:image") < 0 ? (I(t, Fe), t.src = "", t.src = e, v(t, "loading")) : ie || ho(t)
							})), e((function() {
								vo(T(t), (function() {
									xt = !0
								}))
							})), !It && mt && (t = go(ge, Math.min(ge + qt - 1, ae - 1))), ie ? Yn() : e((function() {
								vo(T(t), Yn)
							}))
						} else st && Io(), Jn(), Qn()
					}

					function Yn() {
						if (It) {
							var t = Gt ? ge : St - 1;
							! function e() {
								Ct[t - 1].getBoundingClientRect().right.toFixed(2) === Ct[t].getBoundingClientRect().left.toFixed(2) ? Zn() : setTimeout((function() {
									e()
								}), 16)
							}()
						} else Zn()
					}

					function Zn() {
						mt && !It || (Co(), It ? (ce = Mo(), Be && (Oe = no()), ye = fe(), $n(xe || Oe)) : ni()), st && Io(), Jn(), Qn()
					}

					function Jn() {
						if (So(), vt.insertAdjacentHTML("afterbegin", '<div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">' + co() + "</span>  of " + St + "</div>"), Lt = vt.querySelector(".tns-liveregion .current"), je) {
							var t = Jt ? "stop" : "start";
							wn ? C(wn, {
								"data-action": t
							}) : o.autoplayButtonOutput && (vt.insertAdjacentHTML(Nn(o.autoplayPosition), '<button data-action="' + t + '">' + Sn[0] + t + Sn[1] + te[0] + "</button>"), wn = vt.querySelector("[data-action]")), wn && I(wn, {
								click: Vo
							}), Jt && (Uo(), ee && I(bt, ke), ne && I(bt, Pe))
						}
						if (ze) {
							if (rn) C(rn, {
								"aria-label": "Carousel Pagination"
							}), f(on = rn.children, (function(t, e) {
								C(t, {
									"data-nav": e,
									tabindex: "-1",
									"aria-label": hn + (e + 1),
									"aria-controls": Ae
								})
							}));
							else {
								for (var e = "", n = Re ? "" : 'style="display:none"', i = 0; i < St; i++) e += '<button data-nav="' + i + '" tabindex="-1" aria-controls="' + Ae + '" ' + n + ' aria-label="' + hn + (i + 1) + '"></button>';
								e = '<div class="tns-nav" aria-label="Carousel Pagination">' + e + "</div>", vt.insertAdjacentHTML(Nn(o.navPosition), e), rn = vt.querySelector(".tns-nav"), on = rn.children
							}
							if (ii(), X) {
								var r = X.substring(0, X.length - 18).toLowerCase(),
									s = "transition: all " + Wt / 1e3 + "s";
								r && (s = "-" + r + "-" + s), p(oe, "[aria-controls^=" + Ae + "-item]", s, h(oe))
							}
							C(on[un], {
								"aria-label": hn + (un + 1) + fn
							}), S(on[un], "tabindex"), v(on[un], pn), I(rn, Ie)
						}
						qe && (Ze || Qe && tn || (vt.insertAdjacentHTML(Nn(o.controlsPosition), '<div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button data-controls="prev" tabindex="-1" aria-controls="' + Ae + '">' + Kt[0] + '</button><button data-controls="next" tabindex="-1" aria-controls="' + Ae + '">' + Kt[1] + "</button></div>"), Ze = vt.querySelector(".tns-controls")), Qe && tn || (Qe = Ze.children[0], tn = Ze.children[1]), o.controlsContainer && C(Ze, {
							"aria-label": "Carousel Navigation",
							tabindex: "0"
						}), (o.controlsContainer || o.prevButton && o.nextButton) && C([Qe, tn], {
							"aria-controls": Ae,
							tabindex: "-1"
						}), (o.controlsContainer || o.prevButton && o.nextButton) && (C(Qe, {
							"data-controls": "prev"
						}), C(tn, {
							"data-controls": "next"
						})), Xe = Eo(Qe), Ye = Eo(tn), Lo(), Ze ? I(Ze, $e) : (I(Qe, $e), I(tn, $e))), io()
					}

					function Qn() {
						if (st && Q) {
							var t = {};
							t[Q] = No, I(bt, t)
						}
						Yt && I(bt, De, o.preventScrollOnTouch), Zt && I(bt, Ne), jt && I(c, He), "inner" === rt ? Te.on("outerResized", (function() {
							eo(), Te.emit("innerLoaded", ri())
						})) : (it || kt || It || Vt || !mt) && I(g, {
							resize: to
						}), Vt && ("outer" === rt ? Te.on("innerLoaded", mo) : xe || mo()), po(), xe ? ao() : Oe && so(), Te.on("indexChanged", yo), "inner" === rt && Te.emit("innerLoaded", ri()), "function" == typeof Se && Se(ri()), Et = !0
					}

					function to(t) {
						e((function() {
							eo(Ko(t))
						}))
					}

					function eo(t) {
						if (Et) {
							"outer" === rt && Te.emit("outerResized", ri(t)), Tt = Dn();
							var e, n = gt,
								i = !1;
							it && (oo(), (e = n !== gt) && Te.emit("newBreakpointStart", ri(t)));
							var r, s, a, l, u = qt,
								d = xe,
								g = Oe,
								m = jt,
								b = Ft,
								_ = Xt,
								w = Yt,
								C = Zt,
								S = Jt,
								T = ee,
								x = ne,
								L = ge;
							if (e) {
								var B = kt,
									O = Vt,
									M = Kt,
									$ = Nt,
									P = te;
								if (!V) var H = Ht,
									D = Pt
							}
							if (jt = Rn("arrowKeys"), Ft = Rn("controls"), Xt = Rn("nav"), Yt = Rn("touch"), Nt = Rn("center"), Zt = Rn("mouseDrag"), Jt = Rn("autoplay"), ee = Rn("autoplayHoverPause"), ne = Rn("autoplayResetOnVisibility"), e && (xe = Rn("disable"), kt = Rn("fixedWidth"), Wt = Rn("speed"), Vt = Rn("autoHeight"), Kt = Rn("controlsText"), te = Rn("autoplayText"), Qt = Rn("autoplayTimeout"), V || (Pt = Rn("edgePadding"), Ht = Rn("gutter"))), $n(xe), Dt = qn(), mt && !It || xe || (Co(), mt || (ni(), i = !0)), (kt || It) && (ce = Mo(), ye = fe()), (e || kt) && (qt = Rn("items"), zt = Rn("slideBy"), (s = qt !== u) && (kt || It || (ye = fe()), On())), e && xe !== d && (xe ? ao() : function() {
									if (Le) {
										if (oe.disabled = !1, bt.className += Ee, Io(), Gt)
											for (var t = se; t--;) st && A(Ct[t]), A(Ct[ae - t - 1]);
										if (!st)
											for (var e = ge, n = ge + St; e < n; e++) {
												var o = Ct[e],
													i = e < ge + qt ? ut : ht;
												o.style.left = 100 * (e - ge) / qt + "%", v(o, i)
											}
										ro(), Le = !1
									}
								}()), Be && (e || kt || It) && (Oe = no()) !== g && (Oe ? (ko($o(kn(0))), so()) : (function() {
									if (Me) {
										if (Pt && V && (yt.style.margin = ""), se)
											for (var t = "tns-transparent", e = se; e--;) st && y(Ct[e], t), y(Ct[ae - e - 1], t);
										ro(), Me = !1
									}
								}(), i = !0)), $n(xe || Oe), Jt || (ee = ne = !1), jt !== m && (jt ? I(c, He) : k(c, He)), Ft !== b && (Ft ? Ze ? A(Ze) : (Qe && A(Qe), tn && A(tn)) : Ze ? E(Ze) : (Qe && E(Qe), tn && E(tn))), Xt !== _ && (Xt ? A(rn) : E(rn)), Yt !== w && (Yt ? I(bt, De, o.preventScrollOnTouch) : k(bt, De)), Zt !== C && (Zt ? I(bt, Ne) : k(bt, Ne)), Jt !== S && (Jt ? (wn && A(wn), mn || yn || Uo()) : (wn && E(wn), mn && Go())), ee !== T && (ee ? I(bt, ke) : k(bt, ke)), ne !== x && (ne ? I(c, Pe) : k(c, Pe)), e) {
								if (kt === B && Nt === $ || (i = !0), Vt !== O && (Vt || (yt.style.height = "")), Ft && Kt !== M && (Qe.innerHTML = Kt[0], tn.innerHTML = Kt[1]), wn && te !== P) {
									var N = Jt ? 1 : 0,
										q = wn.innerHTML,
										z = q.length - P[N].length;
									q.substring(z) === P[N] && (wn.innerHTML = q.substring(0, z) + te[N])
								}
							} else Nt && (kt || It) && (i = !0);
							if ((s || kt && !It) && (an = oi(), ii()), (r = ge !== L) ? (Te.emit("indexChanged", ri()), i = !0) : s ? r || yo() : (kt || It) && (po(), So(), lo()), s && !st && function() {
									for (var t = ge + Math.min(St, qt), e = ae; e--;) {
										var n = Ct[e];
										ge <= e && e < t ? (v(n, "tns-moving"), n.style.left = 100 * (e - ge) / qt + "%", v(n, ut), y(n, ht)) : n.style.left && (n.style.left = "", v(n, ht), y(n, ut)), y(n, dt)
									}
									setTimeout((function() {
										f(Ct, (function(t) {
											y(t, "tns-moving")
										}))
									}), 300)
								}(), !xe && !Oe) {
								if (e && !V && (Vt === autoheightTem && Wt === speedTem || bo(), Pt === D && Ht === H || (yt.style.cssText = jn(Pt, Ht, kt, Wt, Vt)), mt)) {
									st && (bt.style.width = Wn(kt, Ht, qt));
									var R = Un(kt, Ht, qt) + Gn(Ht);
									l = h(a = oe) - 1, "deleteRule" in a ? a.deleteRule(l) : a.removeRule(l), p(oe, "#" + Ae + " > .tns-item", R, h(oe))
								}
								Vt && mo(), i && (Io(), me = ge)
							}
							e && Te.emit("newBreakpointEnd", ri(t))
						}
					}

					function no() {
						if (!kt && !It) return St <= (Nt ? qt - (qt - 1) / 2 : qt);
						var t = kt ? (kt + Ht) * St : At[St],
							e = Pt ? Dt + 2 * Pt : Dt + Ht;
						return Nt && (e -= kt ? (Dt - kt) / 2 : (Dt - (At[ge + 1] - At[ge] - Ht)) / 2), t <= e
					}

					function oo() {
						for (var t in gt = 0, it)(t = parseInt(t)) <= Tt && (gt = t)
					}

					function io() {
						!Jt && wn && E(wn), !Xt && rn && E(rn), Ft || (Ze ? E(Ze) : (Qe && E(Qe), tn && E(tn)))
					}

					function ro() {
						Jt && wn && A(wn), Xt && rn && A(rn), Ft && (Ze ? A(Ze) : (Qe && A(Qe), tn && A(tn)))
					}

					function so() {
						if (!Me) {
							if (Pt && (yt.style.margin = "0px"), se)
								for (var t = "tns-transparent", e = se; e--;) st && v(Ct[e], t), v(Ct[ae - e - 1], t);
							io(), Me = !0
						}
					}

					function ao() {
						if (!Le) {
							if (oe.disabled = !0, bt.className = bt.className.replace(Ee.substring(1), ""), S(bt, ["style"]), Gt)
								for (var t = se; t--;) st && E(Ct[t]), E(Ct[ae - t - 1]);
							if (mt && st || S(yt, ["style"]), !st)
								for (var e = ge, n = ge + St; e < n; e++) {
									var o = Ct[e];
									S(o, ["style"]), y(o, ut), y(o, ht)
								}
							io(), Le = !0
						}
					}

					function lo() {
						var t = co();
						Lt.innerHTML !== t && (Lt.innerHTML = t)
					}

					function co() {
						var t = uo(),
							e = t[0] + 1,
							n = t[1] + 1;
						return e === n ? e + "" : e + " to " + n
					}

					function uo(t) {
						null == t && (t = $o());
						var e, n, o, i = ge;
						if (Nt || Pt ? (It || kt) && (n = -(parseFloat(t) + Pt), o = n + Dt + 2 * Pt) : It && (n = At[ge], o = n + Dt), It) At.forEach((function(t, r) {
							r < ae && ((Nt || Pt) && t <= n + .5 && (i = r), .5 <= o - t && (e = r))
						}));
						else {
							if (kt) {
								var r = kt + Ht;
								Nt || Pt ? (i = Math.floor(n / r), e = Math.ceil(o / r - 1)) : e = i + Math.ceil(Dt / r) - 1
							} else if (Nt || Pt) {
								var s = qt - 1;
								if (Nt ? (i -= s / 2, e = ge + s / 2) : e = ge + s, Pt) {
									var a = Pt * qt / Dt;
									i -= a, e += a
								}
								i = Math.floor(i), e = Math.ceil(e)
							} else e = i + qt - 1;
							i = Math.max(i, 0), e = Math.min(e, ae - 1)
						}
						return [i, e]
					}

					function po() {
						ie && !xe && go.apply(null, uo()).forEach((function(t) {
							if (!m(t, Ve)) {
								var e = {};
								e[Q] = function(t) {
									t.stopPropagation()
								}, I(t, e), I(t, Fe), t.src = _(t, "data-src");
								var n = _(t, "data-srcdata-srcset");
								n && (t.srcset = n), v(t, "loading")
							}
						}))
					}

					function ho(t) {
						v(t, "loaded"), fo(t)
					}

					function fo(t) {
						v(t, "tns-complete"), y(t, "loading"), k(t, Fe)
					}

					function go(t, e) {
						for (var n = []; t <= e;) f(Ct[t].querySelectorAll("img"), (function(t) {
							n.push(t)
						})), t++;
						return n
					}

					function mo() {
						var t = go.apply(null, uo());
						e((function() {
							vo(t, wo)
						}))
					}

					function vo(t, n) {
						return xt ? n() : (t.forEach((function(e, n) {
							m(e, Ve) && t.splice(n, 1)
						})), t.length ? void e((function() {
							vo(t, n)
						})) : n())
					}

					function yo() {
						po(), So(), lo(), Lo(),
							function() {
								if (Xt && (un = 0 <= cn ? cn : Hn(), cn = -1, un !== dn)) {
									var t = on[dn],
										e = on[un];
									C(t, {
										tabindex: "-1",
										"aria-label": hn + (dn + 1)
									}), y(t, pn), C(e, {
										"aria-label": hn + (un + 1) + fn
									}), S(e, "tabindex"), v(e, pn), dn = un
								}
							}()
					}

					function bo() {
						st && Vt && (ft.style[X] = Wt / 1e3 + "s")
					}

					function _o(t, e) {
						for (var n = [], o = t, i = Math.min(t + e, ae); o < i; o++) n.push(Ct[o].offsetHeight);
						return Math.max.apply(null, n)
					}

					function wo() {
						var t = Vt ? _o(ge, qt) : _o(se, St),
							e = ft || yt;
						e.style.height !== t && (e.style.height = t + "px")
					}

					function Co() {
						At = [0];
						var t = mt ? "left" : "top",
							e = mt ? "right" : "bottom",
							n = Ct[0].getBoundingClientRect()[t];
						f(Ct, (function(o, i) {
							i && At.push(o.getBoundingClientRect()[t] - n), i === ae - 1 && At.push(o.getBoundingClientRect()[e] - n)
						}))
					}

					function So() {
						var t = uo(),
							e = t[0],
							n = t[1];
						f(Ct, (function(t, o) {
							e <= o && o <= n ? b(t, "aria-hidden") && (S(t, ["aria-hidden", "tabindex"]), v(t, Ge)) : b(t, "aria-hidden") || (C(t, {
								"aria-hidden": "true",
								tabindex: "-1"
							}), y(t, Ge))
						}))
					}

					function To(t) {
						return t.nodeName.toLowerCase()
					}

					function Eo(t) {
						return "button" === To(t)
					}

					function Ao(t) {
						return "true" === t.getAttribute("aria-disabled")
					}

					function xo(t, e, n) {
						t ? e.disabled = n : e.setAttribute("aria-disabled", n.toString())
					}

					function Lo() {
						if (Ft && !Ut && !Gt) {
							var t = Xe ? Qe.disabled : Ao(Qe),
								e = Ye ? tn.disabled : Ao(tn),
								n = ge <= ve,
								o = !Ut && ye <= ge;
							n && !t && xo(Xe, Qe, !0), !n && t && xo(Xe, Qe, !1), o && !e && xo(Ye, tn, !0), !o && e && xo(Ye, tn, !1)
						}
					}

					function Bo(t, e) {
						X && (t.style[X] = e)
					}

					function Oo(t) {
						return null == t && (t = ge), It ? (Dt - (Pt ? Ht : 0) - (At[t + 1] - At[t] - Ht)) / 2 : kt ? (Dt - kt) / 2 : (qt - 1) / 2
					}

					function Mo() {
						var t = Dt + (Pt ? Ht : 0) - (kt ? (kt + Ht) * ae : At[ae]);
						return Nt && !Gt && (t = kt ? -(kt + Ht) * (ae - 1) - Oo() : Oo(ae - 1) - At[ae - 1]), 0 < t && (t = 0), t
					}

					function $o(t) {
						var e;
						if (null == t && (t = ge), mt && !It)
							if (kt) e = -(kt + Ht) * t, Nt && (e += Oo());
							else {
								var n = F ? ae : qt;
								Nt && (t -= Oo()), e = 100 * -t / n
							}
						else e = -At[t], Nt && It && (e += Oo());
						return le && (e = Math.max(e, ce)), e + (!mt || It || kt ? "px" : "%")
					}

					function Io(t) {
						Bo(bt, "0s"), ko(t)
					}

					function ko(t) {
						null == t && (t = $o()), bt.style[de] = pe + t + he
					}

					function Po(t, e, n, o) {
						var i = t + qt;
						Gt || (i = Math.min(i, ae));
						for (var r = t; r < i; r++) {
							var s = Ct[r];
							o || (s.style.left = 100 * (r - ge) / qt + "%"), pt && Y && (s.style[Y] = s.style[J] = pt * (r - t) / 1e3 + "s"), y(s, e), v(s, n), o && re.push(s)
						}
					}

					function Ho(t, e) {
						ue && On(), (ge !== me || e) && (Te.emit("indexChanged", ri()), Te.emit("transitionStart", ri()), Vt && mo(), mn && t && 0 <= ["click", "keydown"].indexOf(t.type) && Go(), Ce = !0, Mn())
					}

					function Do(t) {
						return t.toLowerCase().replace(/-/g, "")
					}

					function No(t) {
						if (st || Ce) {
							if (Te.emit("transitionEnd", ri(t)), !st && 0 < re.length)
								for (var e = 0; e < re.length; e++) {
									var n = re[e];
									n.style.left = "", J && Y && (n.style[J] = "", n.style[Y] = ""), y(n, dt), v(n, ht)
								}
							if (!t || !st && t.target.parentNode === bt || t.target === bt && Do(t.propertyName) === Do(de)) {
								if (!ue) {
									var o = ge;
									On(), ge !== o && (Te.emit("indexChanged", ri()), Io())
								}
								"inner" === rt && Te.emit("innerLoaded", ri()), Ce = !1, me = ge
							}
						}
					}

					function qo(t, e) {
						if (!Oe)
							if ("prev" === t) zo(e, -1);
							else if ("next" === t) zo(e, 1);
						else {
							if (Ce) {
								if (be) return;
								No()
							}
							var n = Pn(),
								o = 0;
							if ("first" === t ? o = -n : "last" === t ? o = st ? St - qt - n : St - 1 - n : ("number" != typeof t && (t = parseInt(t)), isNaN(t) || (e || (t = Math.max(0, Math.min(St - 1, t))), o = t - n)), !st && o && Math.abs(o) < qt) {
								var i = 0 < o ? 1 : -1;
								o += ve <= ge + o - St ? St * i : 2 * St * i * -1
							}
							ge += o, st && Gt && (ge < ve && (ge += St), ye < ge && (ge -= St)), Pn(ge) !== Pn(me) && Ho(e)
						}
					}

					function zo(t, e) {
						if (Ce) {
							if (be) return;
							No()
						}
						var n;
						if (!e) {
							for (var o = Xo(t = Ko(t)); o !== Ze && [Qe, tn].indexOf(o) < 0;) o = o.parentNode;
							var i = [Qe, tn].indexOf(o);
							0 <= i && (n = !0, e = 0 === i ? -1 : 1)
						}
						if (Ut) {
							if (ge === ve && -1 === e) return void qo("last", t);
							if (ge === ye && 1 === e) return void qo("first", t)
						}
						e && (ge += zt * e, It && (ge = Math.floor(ge)), Ho(n || t && "keydown" === t.type ? t : null))
					}

					function Ro() {
						gn = setInterval((function() {
							zo(null, _n)
						}), Qt), mn = !0
					}

					function jo() {
						clearInterval(gn), mn = !1
					}

					function Wo(t, e) {
						C(wn, {
							"data-action": t
						}), wn.innerHTML = Sn[0] + t + Sn[1] + e
					}

					function Uo() {
						Ro(), wn && Wo("stop", te[1])
					}

					function Go() {
						jo(), wn && Wo("start", te[0])
					}

					function Vo() {
						mn ? (Go(), yn = !0) : (Uo(), yn = !1)
					}

					function Fo(t) {
						t.focus()
					}

					function Ko(t) {
						return Yo(t = t || g.event) ? t.changedTouches[0] : t
					}

					function Xo(t) {
						return t.target || g.event.srcElement
					}

					function Yo(t) {
						return 0 <= t.type.indexOf("touch")
					}

					function Zo(t) {
						t.preventDefault ? t.preventDefault() : t.returnValue = !1
					}

					function Jo() {
						return r = xn.y - An.y, s = xn.x - An.x, t = Math.atan2(r, s) * (180 / Math.PI), n = !1, 90 - (e = _e) <= (i = Math.abs(90 - Math.abs(t))) ? n = "horizontal" : i <= e && (n = "vertical"), n === o.axis;
						var t, e, n, i, r, s
					}

					function Qo(t) {
						if (Ce) {
							if (be) return;
							No()
						}
						Jt && mn && jo(), Ln = !0, En && (i(En), En = null);
						var e = Ko(t);
						Te.emit(Yo(t) ? "touchStart" : "dragStart", ri(t)), !Yo(t) && 0 <= ["img", "a"].indexOf(To(Xo(t))) && Zo(t), xn.x = An.x = e.clientX, xn.y = An.y = e.clientY, st && (Tn = parseFloat(bt.style[de].replace(pe, "")), Bo(bt, "0s"))
					}

					function ti(t) {
						if (Ln) {
							var n = Ko(t);
							xn.x = n.clientX, xn.y = n.clientY, st ? En || (En = e((function() {
								! function t(n) {
									if (we) {
										if (i(En), Ln && (En = e((function() {
												t(n)
											}))), "?" === we && (we = Jo()), we) {
											!Ke && Yo(n) && (Ke = !0);
											try {
												n.type && Te.emit(Yo(n) ? "touchMove" : "dragMove", ri(n))
											} catch (t) {}
											var o = Tn,
												r = Bn(xn, An);
											if (!mt || kt || It) o += r, o += "px";
											else o += F ? r * qt * 100 / ((Dt + Ht) * ae) : 100 * r / (Dt + Ht), o += "%";
											bt.style[de] = pe + o + he
										}
									} else Ln = !1
								}(t)
							}))) : ("?" === we && (we = Jo()), we && (Ke = !0))
						}
					}

					function ei(t) {
						if (Ln) {
							En && (i(En), En = null), st && Bo(bt, ""), Ln = !1;
							var n = Ko(t);
							xn.x = n.clientX, xn.y = n.clientY;
							var r = Bn(xn, An);
							if (Math.abs(r)) {
								if (!Yo(t)) {
									var s = Xo(t);
									I(s, {
										click: function t(e) {
											Zo(e), k(s, {
												click: t
											})
										}
									})
								}
								st ? En = e((function() {
									if (mt && !It) {
										var e = -r * qt / (Dt + Ht);
										e = 0 < r ? Math.floor(e) : Math.ceil(e), ge += e
									} else {
										var n = -(Tn + r);
										if (n <= 0) ge = ve;
										else if (n >= At[ae - 1]) ge = ye;
										else
											for (var o = 0; o < ae && n >= At[o];) n > At[ge = o] && r < 0 && (ge += 1), o++
									}
									Ho(t, r), Te.emit(Yo(t) ? "touchEnd" : "dragEnd", ri(t))
								})) : we && zo(t, 0 < r ? -1 : 1)
							}
						}
						"auto" === o.preventScrollOnTouch && (Ke = !1), _e && (we = "?"), Jt && !mn && Ro()
					}

					function ni() {
						(ft || yt).style.height = At[ge + qt] - At[ge] + "px"
					}

					function oi() {
						var t = kt ? (kt + Ht) * St / Dt : St / qt;
						return Math.min(Math.ceil(t), St)
					}

					function ii() {
						if (Xt && !Re && an !== ln) {
							var t = ln,
								e = an,
								n = A;
							for (an < ln && (t = an, e = ln, n = E); t < e;) n(on[t]), t++;
							ln = an
						}
					}

					function ri(t) {
						return {
							container: bt,
							slideItems: Ct,
							navContainer: rn,
							navItems: on,
							controlsContainer: Ze,
							hasControls: qe,
							prevButton: Qe,
							nextButton: tn,
							items: qt,
							slideBy: zt,
							cloneCount: se,
							slideCount: St,
							slideCountNew: ae,
							index: ge,
							indexCached: me,
							displayIndex: In(),
							navCurrentIndex: un,
							navCurrentIndexCached: dn,
							pages: an,
							pagesCached: ln,
							sheet: oe,
							isOn: Et,
							event: t || {}
						}
					}
					et && console.warn("No slides found in", o.container)
				}
			}();
			window.tns = o
		},
		"4hfn": function(t, e) {
			var n;
			! function(t) {
				! function(t) {
					var e = function() {
						function t(t) {
							var e = this,
								n = t.getBoundingClientRect();
							this.body = document.body, this.docEl = document.documentElement, this.clientTop = this.docEl.clientTop || this.body.clientTop || 0, this.topCoords = n.top + this.getScrollTop() - this.clientTop, window.addEventListener("scroll", (function() {
								e.getScrollTop()
							}))
						}
						return t.prototype.getTopCoords = function() {
							return Math.round(this.topCoords)
						}, t.prototype.getScrollTop = function() {
							return window.pageYOffset || this.docEl.scrollTop || this.body.scrollTop
						}, t
					}();
					t.CoordsCalculator = e
				}(t.Slider || (t.Slider = {}))
			}(n || (n = {})),
			function(t) {
				! function(t) {
					var e = function() {
						function e(e) {
							var n = this,
								o = e.sliderClass || "js_lazy_slider",
								i = e.imageClass || "js_lazy_slider_img",
								r = document.querySelectorAll(".".concat(o, " .").concat(i));
							this.slider = document.querySelector(".".concat(o)), this.screenHeight = window.innerHeight, this.rangeIndex = e.rangeIndex || Math.round(this.screenHeight / 5), this.imageLoadedClass = e.imageLoadedClass || "is-loaded", this.imagePendingClass = e.imageLoadedClass || "load-in-progress", this.imagesArray = [].slice.call(r), this.isSlider() && (this.coordsCalculator = new t.CoordsCalculator(this.slider), this.imagesWatcher(), window.addEventListener("scroll", (function() {
								n.imagesWatcher()
							})))
						}
						return e.prototype.isSlider = function() {
							return !!this.slider
						}, e.prototype.setImgSrc = function(t) {
							t.dataset.srcset ? t.srcset = t.dataset.srcset : t.dataset.cksrc ? t.src = t.dataset.cksrc : t.dataset.src && (t.src = t.dataset.src)
						}, e.prototype.setPendingClass = function(t) {
							t.classList.add(this.imagePendingClass)
						}, e.prototype.setLoadedClass = function(t) {
							t.classList.add(this.imageLoadedClass)
						}, e.prototype.removePendingClass = function(t) {
							t.classList.remove(this.imagePendingClass)
						}, e.prototype.isNeedToLoadImages = function() {
							return this.isSliderInViewport() && !this.isImagesLoaded() && !this.isLoadInProgress()
						}, e.prototype.isSliderInViewport = function() {
							return this.coordsCalculator.getTopCoords() < this.coordsCalculator.getScrollTop() + this.screenHeight + this.rangeIndex
						}, e.prototype.isImagesLoaded = function() {
							var t = this;
							return this.imagesArray.every((function(e) {
								return e.classList.contains(t.imageLoadedClass)
							}))
						}, e.prototype.isLoadInProgress = function() {
							var t = this;
							return this.imagesArray.some((function(e) {
								return e.classList.contains(t.imagePendingClass)
							}))
						}, e.prototype.loadImages = function() {
							var t = this;
							this.imagesArray.forEach((function(e) {
								t.setImgSrc(e), t.setPendingClass(e), e.addEventListener("load", (function() {
									t.removePendingClass(e), t.setLoadedClass(e)
								}))
							}))
						}, e.prototype.imagesWatcher = function() {
							this.isNeedToLoadImages() && this.loadImages()
						}, e
					}();
					t.LazySlider = e
				}(t.Slider || (t.Slider = {}))
			}(n || (n = {})),
			function(t) {
				! function(t) {
					var e = function(e) {
						for (var n = 0; n < e.length; n++) new t.LazySlider(e[n])
					};
					t.Starter = e
				}(t.Slider || (t.Slider = {}))
			}(n || (n = {})), void 0 === window.Lazy && (window.Lazy = n), void 0 === window.Lazy.Slider && (window.Lazy.Slider = n.Slider), window.Lazy.Slider.Starter = n.Slider.Starter
		},
		"4w62": function(t, e) {
			var n;
			! function(t) {
				! function(t) {
					var e = function() {
						function t(t) {
							var e = t.element,
								n = t.onScroll;
							this.toolbarElement = e, this.onScroll = n
						}
						return t.prototype.handleWindowScroll = function() {
							var t = this;
							window.addEventListener("scroll", (function() {
								t.fromTopCoords = window.pageYOffset, t.setNavPosition(t.fromTopCoords), t.onScroll && t.onScroll(t.fromTopCoords)
							}))
						}, t.prototype.setNavPosition = function(e) {
							this.toolbarElement && (e > this.toolbarElement.offsetTop ? this.toolbarElement.classList.add(t.FIXED_CLASS) : this.toolbarElement.classList.remove(t.FIXED_CLASS))
						}, t.FIXED_CLASS = "is-fixed", t
					}();
					t.ScrollHandler = e
				}(t.ScrollableToolbar || (t.ScrollableToolbar = {}))
			}(n || (n = {})), void 0 === window.Widget && (window.Widget = n), void 0 === window.Widget.ScrollableToolbar && (window.Widget.ScrollableToolbar = n.ScrollableToolbar), window.Widget.ScrollableToolbar.ScrollHandler = n.ScrollableToolbar.ScrollHandler
		},
		"6o43": function(t, e) {
			document.addEventListener("deferred_scripts_loaded", (function() {
				var t = function(t, e) {
					t.stopPropagation(), t.preventDefault(), e.classList.toggle("is-active")
				};
				document.querySelectorAll(".js-dropdown").forEach((function(e) {
					var n = e.querySelector(".js-dropdown-trigger");
					document.addEventListener("click", (function(t) {
						return function(t, e) {
							t.stopPropagation(), e.contains(t.target).length || t.target.classList.contains(".js-dropdown-trigger") || e.classList.remove("is-active")
						}(t, e)
					})), n.addEventListener("click", (function(n) {
						return t(n, e)
					})), n.addEventListener("keydown", (function(n) {
						"Enter" !== n.key && " " !== n.key || t(n, e)
					}))
				}))
			}))
		},
		I5De: function(t, e) {
			var n = function() {
				function t() {
					this.textBlockSelector = ".read_more_text_wrapper", this.hiddenTextSelector = ".read_more_text_hidden", this.readMoreSelector = ".js_link_read_more", this.readLessSelector = ".js_link_read_close", this.ACTIVE_CLASS = "active", this.CLOSED_HEIGHT_IN_PX = 0, this.BUTTON_HEIGHT_IN_PX = 80
				}
				return t.prototype.getBlockHeight = function(t) {
					return t.offsetHeight
				}, t.prototype.toggleBlockHeight = function(t, e) {
					parseInt(getComputedStyle(t).height) === this.CLOSED_HEIGHT_IN_PX ? t.style.height = "".concat(this.getBlockHeight(e) + this.BUTTON_HEIGHT_IN_PX, "px") : t.style.height = this.CLOSED_HEIGHT_IN_PX
				}, t.prototype.toggleActiveClass = function(t) {
					t.classList.toggle(this.ACTIVE_CLASS)
				}, t.prototype.onReadMore = function(t, e) {
					this.toggleActiveClass(t), t.classList.contains(this.ACTIVE_CLASS) && this.toggleBlockHeight(e, e.firstElementChild)
				}, t.prototype.onReadLess = function(t, e) {
					this.toggleActiveClass(t), this.toggleBlockHeight(e, e.firstElementChild)
				}, t.prototype.init = function() {
					var t = this;
					Array.from(document.querySelectorAll(this.textBlockSelector)).forEach((function(e) {
						var n = e.querySelector(t.hiddenTextSelector);
						e.querySelector(t.readLessSelector) && e.querySelector(t.readLessSelector).addEventListener("click", (function() {
							t.onReadLess(e, n)
						})), e.querySelector(t.readMoreSelector) && e.querySelector(t.readMoreSelector).addEventListener("click", (function() {
							gta("send", "event", "CTA", "click", "read more"), t.onReadMore(e, n)
						}))
					}))
				}, t
			}();
			window.readMore = n
		},
		Napf: function(t, e, n) {
			"use strict";
			n.r(e);
			n("VehB"), n("4hfn"), n("x/J2"), n("2Yr3"), n("/VSb"), n("I5De"), n("gM5F"), n("r1td"), n("muJW"), n("6o43"), n("4w62"), n("Nb8u")
		},
		Nb8u: function(t, e) {
			document.querySelectorAll(".js-anchor-link").forEach((function(t) {
				t.addEventListener("click", (function(e) {
					e.preventDefault();
					var n = document.querySelector(t.getAttribute("href")).offsetTop;
					window.scrollTo({
						top: n - 110,
						left: 0,
						behavior: "smooth"
					})
				}))
			}))
		},
		VehB: function(t, e) {
			var n;
			! function(t) {
				! function(t) {
					var e = function() {
						function t() {}
						return t.prototype.getAvatarSrc = function() {
							var t = this.getIframeWindow();
							if (t) {
								var e = t.querySelector(".jzZFzv img");
								return e ? e.src : void 0
							}
						}, t.prototype.getIframeWindow = function() {
							var t = document.querySelector("#webWidget"),
								e = document.querySelector("#webWidget"),
								n = t || e;
							if (n) return n.contentDocument || n.contentWindow.document
						}, t
					}();
					t.AvatarGetter = e
				}(t.SupportChatButton || (t.SupportChatButton = {}))
			}(n || (n = {})),
			function(t) {
				! function(t) {
					var e = function() {
						function t() {
							this.CLOSE_BTN_TEXT = "Close", this.PROMPT_TEXT_V1 = "Let's Chat", this.PROMPT_TEXT_V2 = "We're online 24/7", this.PROMPT_TEXT_V3 = "Chat with support", this.SUPPORT_TEXT = "Support"
						}
						return t.prototype.createChatButton = function(t, e) {
							this.params = t, this.isMessengersAvailable = e;
							var n = document.createElement("div");
							return n.classList.add("zopim-btn"), this.params.isLogged ? n.classList.add("zopim-btn_logged") : this.params.isMobile && this.params.isWriterPublicProfile && n.classList.add("zopim-btn_writer-public-profile"), this.isMessengersAvailable && n.appendChild(this.createChatButtonMessengerWrapper(this.params)), n.appendChild(this.createChatButtonBody(this.params)), n
						}, t.prototype.createChatButtonBody = function(t) {
							var e = document.createElement("button");
							return e.setAttribute("type", "button"), e.classList.add("zopim-btn__body"), e.appendChild(this.createChatButtonAvatarWrapper()), e.appendChild(this.createChatButtonBubble(t.isLogged)), e
						}, t.prototype.createChatButtonMessengerWrapper = function(t) {
							var e = document.createElement("div");
							return e.classList.add("zopim-btn__messengers-wrap"), e.innerHTML = '\n                <div class="zopim-btn__messengers-trigger-avatar"></div>\n                <div class="zopim-btn__messengers-trigger">\n                    <p class="zopim-btn__messengers-trigger-text">Stuck with the assignment? We’ve got you covered 😉</p>\n\n                    <p class="zopim-btn__messengers-trigger-text">Tell us about what are you working on in any messenger.</p>\n                </div>\n                <div class="zopim-btn__messengers-buttons">\n                    <button type="button" onclick="MyZopim.ChatAction.showChat()" class="zopim-btn__messenger zopim-btn__messenger_zopim">Live Chat</button>\n\n                    '.concat(this.getMessengerButtons(t.messengersConfig), '\n\n                </div>\n                <button type="button" class="zopim-btn__messengers-close">Close</button>\n            '), e
						}, t.prototype.getMessengerButtons = function(t) {
							return "\n                ".concat(t.map((function(t) {
								return '<a href="'.concat(t.link, '" target="_blank" class="zopim-btn__messenger zopim-btn__messenger_').concat(t.name, '">').concat(t.name, "</a>")
							})).join(""), "\n            ")
						}, t.prototype.createChatButtonAvatarWrapper = function() {
							var t = document.createElement("span");
							return t.classList.add("zopim-btn__avatar"), t.appendChild(this.createChatButtonImgAvatar()), t
						}, t.prototype.createChatButtonImgAvatar = function() {
							var t = document.createElement("span");
							return t.classList.add("zopim-btn__avatar-img"), t
						}, t.prototype.createChatButtonBubble = function(t) {
							var e = document.createElement("span");
							return e.classList.add("zopim-btn__bubble"), e.appendChild(this.createChatButtonBubbleText(t)), e.appendChild(this.createChatButtonUnreadMsgLabel()), e
						}, t.prototype.createChatButtonBubbleText = function(t) {
							var e = this,
								n = document.createElement("span");
							return this.params.isEdubirdieVersion ? window.innerWidth < 768 ? n.textContent = this.SUPPORT_TEXT : n.textContent = this.PROMPT_TEXT_V3 : window.innerWidth < 1024 ? n.textContent = t ? this.SUPPORT_TEXT : this.PROMPT_TEXT_V1 : (n.textContent = this.PROMPT_TEXT_V2, setTimeout((function() {
								n.textContent = e.PROMPT_TEXT_V1
							}), 5500)), n
						}, t.prototype.createChatButtonUnreadMsgLabel = function() {
							var t = document.createElement("small");
							return t.classList.add("zopim-btn__unread-msg-label"), t
						}, t.prototype.createChatButtonCloseButton = function() {
							document.querySelector(".zopim-btn__body").setAttribute("onclick", "MyZopim.ChatAction.hideChat()"), document.querySelector(".zopim-btn__bubble span").textContent = this.CLOSE_BTN_TEXT
						}, t.prototype.deleteChatButtonCloseButton = function() {
							var t = "";
							t = this.params.isEdubirdieVersion ? window.innerWidth < 768 ? this.SUPPORT_TEXT : this.PROMPT_TEXT_V3 : this.PROMPT_TEXT_V1, document.querySelector(".zopim-btn__bubble span").textContent = t, document.querySelector(".zopim-btn__body").setAttribute("onclick", "MyZopim.ChatAction.showChat()")
						}, t
					}();
					t.ButtonGenerator = e
				}(t.SupportChatButton || (t.SupportChatButton = {}))
			}(n || (n = {})),
			function(t) {
				! function(t) {
					var e = function() {
						function e(e, n) {
							this.isReplyClicked = !1, this.CHAT_IFRAME_SELECTOR = "#webWidget", this.CHAT_BUTTON_STATUS_ONLINE_CLASS = "is-online", this.COOKIE_CHAT_BUTTON_INITED = "zopim_chat_button_inited", this.COOKIE_CHAT_MSG_CLOSED = "zopim_chat_msg_closed", this.COOKIE_CHAT_POPOVER_MSG_CLOSED = "zopim_chat_popover_msg_closed", this.CSS_ANIMATION_TIMEOUT = 300, this.CHAT_BUTTON_IS_OPEN_CLASS = "is-open", this.CHAT_BUTTON_IS_HIDDEN_CLASS = "is-hidden", this.CHAT_BUTTON_IS_HIDE_BUBBLE_CLASS = "hide-bubble", this.params = e, this.isMessengersAvailable = n, this.buttonGenerator = new t.ButtonGenerator, this.avatarGetter = new t.AvatarGetter, this.chatMsg = new t.MsgGenerator, this.chatButton = this.buttonGenerator.createChatButton(this.params, this.isMessengersAvailable)
						}
						return e.prototype.initPopover = function() {
							this.popoverMessageGenerator = new t.PopoverMessageGenerator({
								chatButton: this.chatButton,
								cookie_chat_popover_msg_closed: this.COOKIE_CHAT_POPOVER_MSG_CLOSED,
								isOrderBiddingPage: this.params.isOrderBiddingPage
							})
						}, e.prototype.insertButton = function() {
							var t = this;
							CookieEditor.get(this.COOKIE_CHAT_BUTTON_INITED) || this.chatButton.classList.add("is-animated"), this.params.isEdubirdieVersion && this.chatButton.classList.add(this.CHAT_BUTTON_STATUS_ONLINE_CLASS), CookieEditor.set(this.COOKIE_CHAT_BUTTON_INITED, 1), document.body.insertAdjacentElement("beforeend", this.chatButton), document.dispatchEvent(new CustomEvent("mars_zopim_button_rendered")), window.isIntercomNow || setTimeout((function() {
								t.isChatWindowOpen() && t.params.isEdubirdieVersion && t.setButtonViewIsOpen()
							}), 500)
						}, e.prototype.setMessengersBubbleListener = function() {
							var t = this;
							this.chatButton.querySelector(".zopim-btn__body").addEventListener("click", (function() {
								return t.showMessengersBubble()
							})), this.chatButton.querySelector(".zopim-btn__messengers-close").addEventListener("click", (function() {
								return t.hideMessengersBubble()
							}))
						}, e.prototype.removeMessengersBubbleListener = function() {
							var t = this;
							this.chatButton.querySelector(".zopim-btn__body").removeEventListener("click", (function() {
								return t.showMessengersBubble()
							})), this.chatButton.querySelector(".zopim-btn__messengers-close").removeEventListener("click", (function() {
								return t.hideMessengersBubble()
							}))
						}, e.prototype.setChatWindowListener = function() {
							this.chatButton.querySelector(".zopim-btn__body").setAttribute("onclick", "MyZopim.ChatAction.showChat()")
						}, e.prototype.removeChatWindowListener = function() {
							this.chatButton.querySelector(".zopim-btn__body").removeAttribute("onclick")
						}, e.prototype.setAvatarBackground = function() {
							var t = this.avatarGetter.getAvatarSrc(),
								e = this.chatButton.querySelector(".zopim-btn__avatar-img");
							t && (e.style.backgroundImage = "url(".concat(t, ")"), this.isMessengersAvailable && (this.chatButton.querySelector(".zopim-btn__messengers-trigger-avatar").style.backgroundImage = "url(".concat(t, ")")))
						}, e.prototype.setCustomAvatarBackground = function() {
							var t = this.params.customAvatars[Math.random() * this.params.customAvatars.length | 0].imgSrc;
							(this.chatButton.querySelector(".zopim-btn__avatar-img").style.backgroundImage = "url(".concat(t, ")"), this.isMessengersAvailable) && (this.chatButton.querySelector(".zopim-btn__messengers-trigger-avatar").style.backgroundImage = "url(".concat(t, ")"))
						}, e.prototype.setUnreadMsgLabel = function(t) {
							var e = this.chatButton.querySelector(".zopim-btn__unread-msg-label");
							t ? (e.style.display = "block", e.textContent = t) : e.style.display = "none"
						}, e.prototype.showButton = function() {
							this.chatButton.style.display = "block"
						}, e.prototype.hideButton = function() {
							this.chatButton.style.display = "none", this.isMessengersAvailable && this.hideMessengersBubble()
						}, e.prototype.showMsg = function() {
							var t = this;
							CookieEditor.get(this.COOKIE_CHAT_MSG_CLOSED) || (this.hideBubble(), window.setTimeout((function() {
								t.chatButton.querySelector(".zopim-btn__bubble").style.display = "none";
								var e = t.chatButton.querySelector(".zopim-btn__body"),
									n = e.insertAdjacentElement("beforeEnd", t.chatMsg.createChatButtonMsgBubble());
								e.insertAdjacentElement("afterEnd", t.chatMsg.createChatButtonMsgBubbleClose()).addEventListener("click", (function() {
									return t.closeMsgBubbleClickHandler()
								})), window.setTimeout((function() {
									n.classList.add("show"), n.addEventListener("click", (function() {
										return t.isReplyClicked = !0
									}))
								}), t.CSS_ANIMATION_TIMEOUT / 3)
							}), this.CSS_ANIMATION_TIMEOUT))
						}, e.prototype.setButtonDefaultView = function() {
							var t = this;
							CookieEditor.set(this.COOKIE_CHAT_MSG_CLOSED, 1);
							var e = this.chatButton.querySelector(".zopim-btn__msg-bubble-close"),
								n = this.chatButton.querySelector(".zopim-btn__msg-bubble");
							n && (e.style.display = "none", n.classList.remove("show"), window.setTimeout((function() {
								n.style.display = "none", t.showBubble()
							}), this.CSS_ANIMATION_TIMEOUT))
						}, e.prototype.setButtonViewIsClose = function() {
							this.chatButton.classList.remove(this.CHAT_BUTTON_IS_OPEN_CLASS), this.buttonGenerator.deleteChatButtonCloseButton()
						}, e.prototype.setButtonViewIsOpen = function() {
							this.chatButton.classList.add(this.CHAT_BUTTON_IS_OPEN_CLASS), this.buttonGenerator.createChatButtonCloseButton(), this.setUnreadMsgLabel(0)
						}, e.prototype.setChatIsOpen = function() {
							this.popoverMessageGenerator && this.popoverMessageGenerator.removePopoverMessages()
						}, e.prototype.closeMsgBubbleClickHandler = function() {
							gta("send", "event", this.params.googleAnalyticsData.close.category, this.params.googleAnalyticsData.close.action, this.params.googleAnalyticsData.close.label), this.setButtonDefaultView()
						}, e.prototype.hideBubble = function() {
							var t = this;
							document.querySelector("body").classList.add("zopim-bubble-message-show"), this.chatButton.classList.add(this.CHAT_BUTTON_IS_HIDE_BUBBLE_CLASS), window.setTimeout((function() {
								t.chatButton.querySelector(".zopim-btn__bubble").style.display = "none"
							}), this.CSS_ANIMATION_TIMEOUT)
						}, e.prototype.showBubble = function() {
							var t = this;
							document.querySelector("body").classList.remove("zopim-bubble-message-show"), this.chatButton.querySelector(".zopim-btn__bubble").style.display = "block", window.setTimeout((function() {
								t.chatButton.classList.remove(t.CHAT_BUTTON_IS_HIDE_BUBBLE_CLASS)
							}), this.CSS_ANIMATION_TIMEOUT / 3)
						}, e.prototype.hideMessengersBubble = function() {
							this.chatButton.querySelector(".zopim-btn__body").classList.remove(this.CHAT_BUTTON_IS_HIDDEN_CLASS), this.chatButton.querySelector(".zopim-btn__messengers-wrap").classList.remove(this.CHAT_BUTTON_IS_OPEN_CLASS)
						}, e.prototype.showMessengersBubble = function() {
							this.chatButton.querySelector(".zopim-btn__body").classList.add(this.CHAT_BUTTON_IS_HIDDEN_CLASS), this.chatButton.querySelector(".zopim-btn__messengers-wrap").classList.add(this.CHAT_BUTTON_IS_OPEN_CLASS)
						}, e.prototype.isChatWindowOpen = function() {
							return null !== document.querySelector(this.CHAT_IFRAME_SELECTOR)
						}, e
					}();
					t.ButtonHandler = e
				}(t.SupportChatButton || (t.SupportChatButton = {}))
			}(n || (n = {})),
			function(t) {
				! function(e) {
					var n = function() {
						function e(e) {
							this.MESSAGE_TIMOUT = 15e3, this.MESSAGE_TIMOUT_MARS = 3e4, this.params = e, this.isChatLauncherHidden = this.params.isChatLauncherHidden, this.isMessengersAvailable = this.checkIsMessengersAvailable(e.isLogged, e.messengersConfig), this.buttonHandler = new t.SupportChatButton.ButtonHandler(this.params, this.isMessengersAvailable)
						}
						return e.prototype.init = function() {
							var t = this,
								e = this.params,
								n = e.isLogged,
								o = e.isMobile,
								i = e.isMars;
							if (this.buttonHandler.insertButton(), this.params.showPopoverMesssage && this.buttonHandler.initPopover(), this.buttonHandler.setCustomAvatarBackground(), !n && o && window.setTimeout((function() {
									t.buttonHandler.showMsg()
								}), i ? this.MESSAGE_TIMOUT_MARS : this.MESSAGE_TIMOUT), this.isMessengersAvailable ? this.buttonHandler.setMessengersBubbleListener() : this.buttonHandler.setChatWindowListener(), this.isChatLauncherHidden) this.buttonHandler.hideButton();
							else {
								var r = n ? this.params.googleAnalyticsData.displayLoggedUser : this.params.googleAnalyticsData.displayNotLoggedUser;
								this.sendGTA(r.category, r.action, r.label, {
									nonInteraction: !0
								})
							}
						}, e.prototype.update = function() {
							window.isIntercomNow || this.buttonHandler.setAvatarBackground()
						}, e.prototype.updateLabel = function(t) {
							this.isMessengersAvailable && (t ? (this.buttonHandler.removeMessengersBubbleListener(), this.buttonHandler.setChatWindowListener()) : (this.buttonHandler.removeChatWindowListener(), this.buttonHandler.setMessengersBubbleListener())), this.buttonHandler.setUnreadMsgLabel(t)
						}, e.prototype.show = function() {
							this.isChatLauncherHidden || this.buttonHandler.showButton()
						}, e.prototype.sendOpenButtonClickGA = function(t) {
							if (void 0 === t && (t = !1), this.buttonHandler.isReplyClicked) {
								var e = this.params.googleAnalyticsData.reply;
								this.sendGTA(e.category, e.action, e.label)
							} else if (this.params.isMars) {
								e = this.params.googleAnalyticsData.clickMarsUser;
								var n = t ? {} : {
									nonInteraction: !0
								};
								this.sendGTA(e.category, e.action, e.label, n)
							}
						}, e.prototype.setIsCloseView = function() {
							this.buttonHandler.setButtonViewIsClose()
						}, e.prototype.setIsOpenView = function() {
							this.buttonHandler.setButtonViewIsOpen(), this.buttonHandler.setChatIsOpen(!0), this.sendOpenButtonClickGA()
						}, e.prototype.hide = function() {
							this.buttonHandler.hideButton()
						}, e.prototype.setButtonDefaultView = function() {
							this.buttonHandler.setButtonDefaultView()
						}, e.prototype.setIsChatLauncherHidden = function(t) {
							this.isChatLauncherHidden = t
						}, e.prototype.sendGTA = function(t, e, n, o) {
							void 0 === o && (o = {}), gta("send", "event", t, e, n, o)
						}, e.prototype.checkIsMessengersAvailable = function(t, e) {
							return t && e ? 1 : 0
						}, e
					}();
					e.Handler = n
				}(t.SupportChatButton || (t.SupportChatButton = {}))
			}(n || (n = {})), void 0 === window.Widget && (window.Widget = n), window.Widget.SupportChatButton = n.SupportChatButton,
				function(t) {
					! function(t) {
						var e = function() {
							function t() {}
							return t.prototype.createChatButtonMsgBubble = function() {
								var t = document.createElement("span");
								return t.classList.add("zopim-btn__msg-bubble"), t.append(this.createChatButtonMsgBubbleContent()), t.append(this.createChatButtonMsgBubbleBtn()), t
							}, t.prototype.createChatButtonMsgBubbleClose = function() {
								var t = document.createElement("button");
								return t.setAttribute("type", "button"), t.classList.add("zopim-btn__msg-bubble-close"), t.textContent = "Close", t
							}, t.prototype.createChatButtonMsgBubbleContent = function() {
								var t = document.createElement("span"),
									e = document.createElement("span"),
									n = document.createElement("span");
								return t.classList.add("zopim-btn__msg-bubble-content"), e.classList.add("zopim-btn__msg-bubble-title"), n.classList.add("zopim-btn__msg-bubble-text"), e.textContent = "Stuck with an assignment?", window.innerWidth < 375 ? n.textContent = "Let's chat for details." : n.textContent = "Let's chat to see what we can do!", t.appendChild(e), t.appendChild(n), t
							}, t.prototype.createChatButtonMsgBubbleBtn = function() {
								var t = document.createElement("span");
								return t.classList.add("zopim-btn__msg-bubble-btn"), t.textContent = "Reply", t
							}, t
						}();
						t.MsgGenerator = e
					}(t.SupportChatButton || (t.SupportChatButton = {}))
				}(n || (n = {})),
				function(t) {
					! function(t) {
						var e = function() {
							function t(t) {
								this.chatPopoverWrapClassName = "zopim-btn__popover-wrap", this.chatButton = t.chatButton, this.cookie_chat_popover_msg_closed = t.cookie_chat_popover_msg_closed, this.createPopoverWrap(), this.initListeners()
							}
							return t.prototype.createPopoverWrap = function() {
								var t = '\n                <div class="'.concat(this.chatPopoverWrapClassName, '">\n                    <button type="button" class="zopim-btn__close-popover">Close</button>\n                </div>');
								this.chatButton.insertAdjacentHTML("afterbegin", t), this.chatButton.classList.add("zopim-btn_with-popover")
							}, t.prototype.initListeners = function() {
								var t = this;
								document.querySelector(".zopim-btn__close-popover").addEventListener("click", (function() {
									t.removeMessages()
								}))
							}, t.prototype.addMessage = function(t) {
								this.getChatPopoverWrap().insertAdjacentHTML("beforeend", t)
							}, t.prototype.removeMessages = function() {
								var t = this.getChatPopoverWrap(),
									e = t.querySelectorAll(".zopim-btn__popover-msg");
								this.chatButton.classList.remove("zopim-btn_with-popover"), t.style.display = "none", CookieEditor.set(this.cookie_chat_popover_msg_closed, 1), Array.from(e).forEach((function(t) {
									t.remove()
								}))
							}, t.prototype.getChatPopoverWrap = function() {
								return document.querySelector(".".concat(this.chatPopoverWrapClassName))
							}, t
						}();
						t.PopoverHandler = e
					}(t.SupportChatButton || (t.SupportChatButton = {}))
				}(n || (n = {})),
				function(t) {
					! function(t) {
						var e = function() {
							function t(t) {
								this.text = t
							}
							return t.prototype.getMessageMarkup = function() {
								return '<p class="zopim-btn__popover-msg" onclick="MyZopim.ChatAction.showChat()">'.concat(this.text, "</p>")
							}, t
						}();
						t.PopoverMessage = e
					}(t.SupportChatButton || (t.SupportChatButton = {}))
				}(n || (n = {})),
				function(t) {
					! function(t) {
						var e = function() {
							function e(t) {
								this.INTERVAL_IN_MS = 5e3, this.isHidden = !1, this.isOrderBiddingPage = !1, this.POPOVER_MESSAGES = this.getCurrentPopoverMessages(), this.chatButton = t.chatButton, this.isOrderBiddingPage = t.isOrderBiddingPage, this.cookie_chat_popover_msg_closed = t.cookie_chat_popover_msg_closed, this.initMessages()
							}
							return e.prototype.initMessages = function() {
								var e = this;
								this.POPOVER_MESSAGES.length && this.POPOVER_MESSAGES.forEach((function(n, o) {
									setTimeout((function() {
										if (!CookieEditor.get(e.cookie_chat_popover_msg_closed))
											if (e.popover || (e.popover = new t.PopoverHandler({
													chatButton: e.chatButton,
													cookie_chat_popover_msg_closed: e.cookie_chat_popover_msg_closed
												})), e.isHidden) e.popover.removeMessages();
											else {
												var o = new t.PopoverMessage(n).getMessageMarkup();
												e.popover.addMessage(o)
											}
									}), (o + 1) * e.INTERVAL_IN_MS)
								}))
							}, e.prototype.removePopoverMessages = function() {
								this.isHidden = !0, this.popover && this.popover.removeMessages()
							}, e.prototype.getCurrentPopoverMessages = function() {
								var t = window.location.pathname,
									e = this.getPopoverMessages();
								return this.isOrderBiddingPage ? [] : e[t] || []
							}, e.prototype.getPopoverMessages = function() {
								return {
									"/": ["Writing papers feels like you’re trying to boil the ocean?", "It’s about time to ask for assistance!", "What’s your subject and due date?"],
									"/write-my-essay-for-me": ["Jotted some ideas 💡 for your essay down and got stuck?", "The time is ripe to get expert help", "Share the topic so we’ll find a perfect match for you"],
									"/order": ["Hello there! Stuck with placing the order?", "I’m here to assist you", "What topic you've got?"],
									"/dissertation-writing-services": ["Feels like writing a dissertation is not a piece of cake?", "Hire an expert against the clock to get the best outcome ⏳", "Tell us more about your dissertation subject 😇"],
									"/top-writers": ["Do you feel like writing is not your cup of tea?", "Our experts know all ins and outs of different fields 🦉", "What’s your subject?"],
									"/essay-writing-services-reviews": ["Do you feel like writing is not your cup of tea?", "Our experts know all ins and outs of different fields 🦉", "What’s your subject?"],
									"/college-papers-for-sale": ["Ran out of ideas for a good paper?", "Let us save your time ⏳", "What are the requirements? ✏️"],
									"/powerpoint-presentations-writing-service": ["Wanna pass a presentation with flying colors but got stuck?", "The time is ripe to find an appropriate expert", "Share your subject, please 👩🏽‍💻"],
									"/annotated-bibliography-writing-service": ["Ran out of ideas for a good annotated bibliography?", "Let us save your time ⏳", "How many sources are needed?‍💻"],
									"/pay-for-research-papers": ["Mixed up with research paper requirements?", "For our experts, that’s as easy as ABC", "Share your instructions, please 🤗"],
									"/essay-writers-for-hire": ["Dead-tired of multiple assignments?", "Chill out! We have proficient experts in different fields 🦉", "Share your topic and requirements to find a perfect match 🖇"],
									"/pay-for-homework": ["Fed up with tonnes of homework? 📚", "Save your time for more pleasant things", "Share your assignment with us so we’ll get you covered 🖇"],
									"/do-my-assignment": ["Don’t wrap your head around the assignment!", "Let us complete it for you 👩🏽‍💻", "What subject do you need help with?"],
									"/do-my-homework": ["Fed up with tonnes of homework? 📚", "Save your time for more pleasant things", "Share your assignment with us so we’ll get you covered 🖇"],
									"/pay-for-essays": ["Have no time 🕐  to cram for an essay?", "We’ve got you covered 🤓", "What’s your field of study?"]
								}
							}, e
						}();
						t.PopoverMessageGenerator = e
					}(t.SupportChatButton || (t.SupportChatButton = {}))
				}(n || (n = {}))
		},
		gM5F: function(t, e) {
			document.addEventListener("deferred_scripts_loaded", (function() {
				var t = document.querySelector(".js_written_text"),
					e = ["Essay", "Research Paper", "Coursework", "Dissertation", "Assignment", "All You Need!"];
				t && function n(o) {
					void 0 === e[o] ? setTimeout((function() {
						n(0)
					}), 700) : o < e[o].length && function e(n, o, i) {
						o < n.length ? (t.innerHTML = n.substring(0, o + 1) + '<span aria-hidden="true"></span>', setTimeout((function() {
							e(n, o + 1, i)
						}), 100)) : "function" == typeof i && setTimeout(i, 700)
					}(e[o], 0, (function() {
						n(o + 1)
					}))
				}(0)
			}))
		},
		muJW: function(t, e, n) {
			var o, i, r;

			function s(t) {
				return (s = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
					return typeof t
				} : function(t) {
					return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
				})(t)
			}
			/*! Select2 4.0.3 | https://github.com/select2/select2/blob/master/LICENSE.md */
			if (i = [n("xeH2")], void 0 === (r = "function" == typeof(o = function(t) {
					var e = function() {
							if (t && t.fn && t.fn.select2 && t.fn.select2.amd) var e = t.fn.select2.amd;
							return function() {
								var t, n, o;
								e && e.requirejs || (e ? n = e : e = {}, function(e) {
									function i(t, e) {
										return _.call(t, e)
									}

									function r(t, e) {
										var n, o, i, r, s, a, l, c, u, d, p, h = e && e.split("/"),
											f = y.map,
											g = f && f["*"] || {};
										if (t && "." === t.charAt(0))
											if (e) {
												for (s = (t = t.split("/")).length - 1, y.nodeIdCompat && C.test(t[s]) && (t[s] = t[s].replace(C, "")), t = h.slice(0, h.length - 1).concat(t), u = 0; u < t.length; u += 1)
													if ("." === (p = t[u])) t.splice(u, 1), u -= 1;
													else if (".." === p) {
													if (1 === u && (".." === t[2] || ".." === t[0])) break;
													u > 0 && (t.splice(u - 1, 2), u -= 2)
												}
												t = t.join("/")
											} else 0 === t.indexOf("./") && (t = t.substring(2));
										if ((h || g) && f) {
											for (u = (n = t.split("/")).length; u > 0; u -= 1) {
												if (o = n.slice(0, u).join("/"), h)
													for (d = h.length; d > 0; d -= 1)
														if ((i = f[h.slice(0, d).join("/")]) && (i = i[o])) {
															r = i, a = u;
															break
														} if (r) break;
												!l && g && g[o] && (l = g[o], c = u)
											}!r && l && (r = l, a = c), r && (n.splice(0, a, r), t = n.join("/"))
										}
										return t
									}

									function a(t, n) {
										return function() {
											var o = w.call(arguments, 0);
											return "string" != typeof o[0] && 1 === o.length && o.push(null), h.apply(e, o.concat([t, n]))
										}
									}

									function l(t) {
										return function(e) {
											m[t] = e
										}
									}

									function c(t) {
										if (i(v, t)) {
											var n = v[t];
											delete v[t], b[t] = !0, p.apply(e, n)
										}
										if (!i(m, t) && !i(b, t)) throw new Error("No " + t);
										return m[t]
									}

									function u(t) {
										var e, n = t ? t.indexOf("!") : -1;
										return n > -1 && (e = t.substring(0, n), t = t.substring(n + 1, t.length)), [e, t]
									}

									function d(t) {
										return function() {
											return y && y.config && y.config[t] || {}
										}
									}
									var p, h, f, g, m = {},
										v = {},
										y = {},
										b = {},
										_ = Object.prototype.hasOwnProperty,
										w = [].slice,
										C = /\.js$/;
									f = function(t, e) {
										var n, o = u(t),
											i = o[0];
										return t = o[1], i && (n = c(i = r(i, e))), i ? t = n && n.normalize ? n.normalize(t, function(t) {
											return function(e) {
												return r(e, t)
											}
										}(e)) : r(t, e) : (i = (o = u(t = r(t, e)))[0], t = o[1], i && (n = c(i))), {
											f: i ? i + "!" + t : t,
											n: t,
											pr: i,
											p: n
										}
									}, g = {
										require: function(t) {
											return a(t)
										},
										exports: function(t) {
											var e = m[t];
											return void 0 !== e ? e : m[t] = {}
										},
										module: function(t) {
											return {
												id: t,
												uri: "",
												exports: m[t],
												config: d(t)
											}
										}
									}, p = function(t, n, o, r) {
										var u, d, p, h, y, _, w = [],
											C = s(o);
										if (r = r || t, "undefined" === C || "function" === C) {
											for (n = !n.length && o.length ? ["require", "exports", "module"] : n, y = 0; y < n.length; y += 1)
												if (h = f(n[y], r), "require" === (d = h.f)) w[y] = g.require(t);
												else if ("exports" === d) w[y] = g.exports(t), _ = !0;
											else if ("module" === d) u = w[y] = g.module(t);
											else if (i(m, d) || i(v, d) || i(b, d)) w[y] = c(d);
											else {
												if (!h.p) throw new Error(t + " missing " + d);
												h.p.load(h.n, a(r, !0), l(d), {}), w[y] = m[d]
											}
											p = o ? o.apply(m[t], w) : void 0, t && (u && u.exports !== e && u.exports !== m[t] ? m[t] = u.exports : p === e && _ || (m[t] = p))
										} else t && (m[t] = o)
									}, t = n = h = function(t, n, o, i, r) {
										if ("string" == typeof t) return g[t] ? g[t](n) : c(f(t, n).f);
										if (!t.splice) {
											if ((y = t).deps && h(y.deps, y.callback), !n) return;
											n.splice ? (t = n, n = o, o = null) : t = e
										}
										return n = n || function() {}, "function" == typeof o && (o = i, i = r), i ? p(e, t, n, o) : setTimeout((function() {
											p(e, t, n, o)
										}), 4), h
									}, h.config = function(t) {
										return h(t)
									}, t._defined = m, (o = function(t, e, n) {
										if ("string" != typeof t) throw new Error("See almond README: incorrect module build, no module name");
										e.splice || (n = e, e = []), i(m, t) || i(v, t) || (v[t] = [t, e, n])
									}).amd = {
										jQuery: !0
									}
								}(), e.requirejs = t, e.require = n, e.define = o)
							}(), e.define("almond", (function() {})), e.define("jquery", [], (function() {
								var e = t || $;
								return null == e && console && console.error && console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."), e
							})), e.define("select2/utils", ["jquery"], (function(t) {
								function e(t) {
									var e = t.prototype,
										n = [];
									for (var o in e) "function" == typeof e[o] && "constructor" !== o && n.push(o);
									return n
								}
								var n = {
										Extend: function(t, e) {
											function n() {
												this.constructor = t
											}
											var o = {}.hasOwnProperty;
											for (var i in e) o.call(e, i) && (t[i] = e[i]);
											return n.prototype = e.prototype, t.prototype = new n, t.__super__ = e.prototype, t
										},
										Decorate: function(t, n) {
											function o() {
												var e = Array.prototype.unshift,
													o = n.prototype.constructor.length,
													i = t.prototype.constructor;
												o > 0 && (e.call(arguments, t.prototype.constructor), i = n.prototype.constructor), i.apply(this, arguments)
											}
											var i = e(n),
												r = e(t);
											n.displayName = t.displayName, o.prototype = new function() {
												this.constructor = o
											};
											for (var s = 0; s < r.length; s++) {
												var a = r[s];
												o.prototype[a] = t.prototype[a]
											}
											for (var l = function(t) {
													var e = function() {};
													t in o.prototype && (e = o.prototype[t]);
													var i = n.prototype[t];
													return function() {
														var t = Array.prototype.unshift;
														return t.call(arguments, e), i.apply(this, arguments)
													}
												}, c = 0; c < i.length; c++) {
												var u = i[c];
												o.prototype[u] = l(u)
											}
											return o
										}
									},
									o = function() {
										this.listeners = {}
									};
								return o.prototype.on = function(t, e) {
									this.listeners = this.listeners || {}, t in this.listeners ? this.listeners[t].push(e) : this.listeners[t] = [e]
								}, o.prototype.trigger = function(t) {
									var e = Array.prototype.slice,
										n = e.call(arguments, 1);
									this.listeners = this.listeners || {}, null == n && (n = []), 0 === n.length && n.push({}), n[0]._type = t, t in this.listeners && this.invoke(this.listeners[t], e.call(arguments, 1)), "*" in this.listeners && this.invoke(this.listeners["*"], arguments)
								}, o.prototype.invoke = function(t, e) {
									for (var n = 0, o = t.length; o > n; n++) t[n].apply(this, e)
								}, n.Observable = o, n.generateChars = function(t) {
									for (var e = "", n = 0; t > n; n++) e += Math.floor(36 * Math.random()).toString(36);
									return e
								}, n.bind = function(t, e) {
									return function() {
										t.apply(e, arguments)
									}
								}, n._convertData = function(t) {
									for (var e in t) {
										var n = e.split("-"),
											o = t;
										if (1 !== n.length) {
											for (var i = 0; i < n.length; i++) {
												var r = n[i];
												(r = r.substring(0, 1).toLowerCase() + r.substring(1)) in o || (o[r] = {}), i == n.length - 1 && (o[r] = t[e]), o = o[r]
											}
											delete t[e]
										}
									}
									return t
								}, n.hasScroll = function(e, n) {
									var o = t(n),
										i = n.style.overflowX,
										r = n.style.overflowY;
									return (i !== r || "hidden" !== r && "visible" !== r) && ("scroll" === i || "scroll" === r || o.innerHeight() < n.scrollHeight || o.innerWidth() < n.scrollWidth)
								}, n.escapeMarkup = function(t) {
									var e = {
										"\\": "&#92;",
										"&": "&amp;",
										"<": "&lt;",
										">": "&gt;",
										'"': "&quot;",
										"'": "&#39;",
										"/": "&#47;"
									};
									return "string" != typeof t ? t : String(t).replace(/[&<>"'\/\\]/g, (function(t) {
										return e[t]
									}))
								}, n.appendMany = function(e, n) {
									if ("1.7" === t.fn.jquery.substr(0, 3)) {
										var o = t();
										t.map(n, (function(t) {
											o = o.add(t)
										})), n = o
									}
									e.append(n)
								}, n
							})), e.define("select2/results", ["jquery", "./utils"], (function(t, e) {
								function n(t, e, o) {
									this.$element = t, this.data = o, this.options = e, n.__super__.constructor.call(this)
								}
								return e.Extend(n, e.Observable), n.prototype.render = function() {
									var e = t('<ul class="select2-results__options" role="tree"></ul>');
									return this.options.get("multiple") && e.attr("aria-multiselectable", "true"), this.$results = e, e
								}, n.prototype.clear = function() {
									this.$results.empty()
								}, n.prototype.displayMessage = function(e) {
									var n = this.options.get("escapeMarkup");
									this.clear(), this.hideLoading();
									var o = t('<li role="treeitem" aria-live="assertive" class="select2-results__option"></li>'),
										i = this.options.get("translations").get(e.message);
									o.append(n(i(e.args))), o[0].className += " select2-results__message", this.$results.append(o)
								}, n.prototype.hideMessages = function() {
									this.$results.find(".select2-results__message").remove()
								}, n.prototype.append = function(t) {
									this.hideLoading();
									var e = [];
									if (null != t.results && 0 !== t.results.length) {
										t.results = this.sort(t.results);
										for (var n = 0; n < t.results.length; n++) {
											var o = t.results[n],
												i = this.option(o);
											e.push(i)
										}
										this.$results.append(e)
									} else 0 === this.$results.children().length && this.trigger("results:message", {
										message: "noResults"
									})
								}, n.prototype.position = function(t, e) {
									e.find(".select2-results").append(t)
								}, n.prototype.sort = function(t) {
									return this.options.get("sorter")(t)
								}, n.prototype.highlightFirstItem = function() {
									var t = this.$results.find(".select2-results__option[aria-selected]"),
										e = t.filter("[aria-selected=true]");
									e.length > 0 ? e.first().trigger("mouseenter") : t.first().trigger("mouseenter"), this.ensureHighlightVisible()
								}, n.prototype.setClasses = function() {
									var e = this;
									this.data.current((function(n) {
										var o = t.map(n, (function(t) {
											return t.id.toString()
										}));
										e.$results.find(".select2-results__option[aria-selected]").each((function() {
											var e = t(this),
												n = t.data(this, "data"),
												i = "" + n.id;
											null != n.element && n.element.selected || null == n.element && t.inArray(i, o) > -1 ? e.attr("aria-selected", "true") : e.attr("aria-selected", "false")
										}))
									}))
								}, n.prototype.showLoading = function(t) {
									this.hideLoading();
									var e = {
											disabled: !0,
											loading: !0,
											text: this.options.get("translations").get("searching")(t)
										},
										n = this.option(e);
									n.className += " loading-results", this.$results.prepend(n)
								}, n.prototype.hideLoading = function() {
									this.$results.find(".loading-results").remove()
								}, n.prototype.option = function(e) {
									var n = document.createElement("li");
									n.className = "select2-results__option";
									var o = {
										role: "treeitem",
										"aria-selected": "false"
									};
									for (var i in e.disabled && (delete o["aria-selected"], o["aria-disabled"] = "true"), null == e.id && delete o["aria-selected"], null != e._resultId && (n.id = e._resultId), e.title && (n.title = e.title), e.children && (o.role = "group", o["aria-label"] = e.text, delete o["aria-selected"]), o) {
										var r = o[i];
										n.setAttribute(i, r)
									}
									if (e.children) {
										var s = t(n),
											a = document.createElement("strong");
										a.className = "select2-results__group", t(a), this.template(e, a);
										for (var l = [], c = 0; c < e.children.length; c++) {
											var u = e.children[c],
												d = this.option(u);
											l.push(d)
										}
										var p = t("<ul></ul>", {
											class: "select2-results__options select2-results__options--nested"
										});
										p.append(l), s.append(a), s.append(p)
									} else this.template(e, n);
									return t.data(n, "data", e), n
								}, n.prototype.bind = function(e, n) {
									var o = this,
										i = e.id + "-results";
									this.$results.attr("id", i), e.on("results:all", (function(t) {
										o.clear(), o.append(t.data), e.isOpen() && (o.setClasses(), o.highlightFirstItem())
									})), e.on("results:append", (function(t) {
										o.append(t.data), e.isOpen() && o.setClasses()
									})), e.on("query", (function(t) {
										o.hideMessages(), o.showLoading(t)
									})), e.on("select", (function() {
										e.isOpen() && (o.setClasses(), o.highlightFirstItem())
									})), e.on("unselect", (function() {
										e.isOpen() && (o.setClasses(), o.highlightFirstItem())
									})), e.on("open", (function() {
										o.$results.attr("aria-expanded", "true"), o.$results.attr("aria-hidden", "false"), o.setClasses(), o.ensureHighlightVisible()
									})), e.on("close", (function() {
										o.$results.attr("aria-expanded", "false"), o.$results.attr("aria-hidden", "true"), o.$results.removeAttr("aria-activedescendant")
									})), e.on("results:toggle", (function() {
										var t = o.getHighlightedResults();
										0 !== t.length && t.trigger("mouseup")
									})), e.on("results:select", (function() {
										var t = o.getHighlightedResults();
										if (0 !== t.length) {
											var e = t.data("data");
											"true" == t.attr("aria-selected") ? o.trigger("close", {}) : o.trigger("select", {
												data: e
											})
										}
									})), e.on("results:previous", (function() {
										var t = o.getHighlightedResults(),
											e = o.$results.find("[aria-selected]"),
											n = e.index(t);
										if (0 !== n) {
											var i = n - 1;
											0 === t.length && (i = 0);
											var r = e.eq(i);
											r.trigger("mouseenter");
											var s = o.$results.offset().top,
												a = r.offset().top,
												l = o.$results.scrollTop() + (a - s);
											0 === i ? o.$results.scrollTop(0) : 0 > a - s && o.$results.scrollTop(l)
										}
									})), e.on("results:next", (function() {
										var t = o.getHighlightedResults(),
											e = o.$results.find("[aria-selected]"),
											n = e.index(t) + 1;
										if (!(n >= e.length)) {
											var i = e.eq(n);
											i.trigger("mouseenter");
											var r = o.$results.offset().top + o.$results.outerHeight(!1),
												s = i.offset().top + i.outerHeight(!1),
												a = o.$results.scrollTop() + s - r;
											0 === n ? o.$results.scrollTop(0) : s > r && o.$results.scrollTop(a)
										}
									})), e.on("results:focus", (function(t) {
										t.element.addClass("select2-results__option--highlighted")
									})), e.on("results:message", (function(t) {
										o.displayMessage(t)
									})), t.fn.mousewheel && this.$results.on("mousewheel", (function(t) {
										var e = o.$results.scrollTop(),
											n = o.$results.get(0).scrollHeight - e + t.deltaY,
											i = t.deltaY > 0 && e - t.deltaY <= 0,
											r = t.deltaY < 0 && n <= o.$results.height();
										i ? (o.$results.scrollTop(0), t.preventDefault(), t.stopPropagation()) : r && (o.$results.scrollTop(o.$results.get(0).scrollHeight - o.$results.height()), t.preventDefault(), t.stopPropagation())
									})), this.$results.on("mouseup", ".select2-results__option[aria-selected]", (function(e) {
										var n = t(this),
											i = n.data("data");
										return "true" === n.attr("aria-selected") ? void(o.options.get("multiple") ? o.trigger("unselect", {
											originalEvent: e,
											data: i
										}) : o.trigger("close", {})) : void o.trigger("select", {
											originalEvent: e,
											data: i
										})
									})), this.$results.on("mouseenter", ".select2-results__option[aria-selected]", (function(e) {
										var n = t(this).data("data");
										o.getHighlightedResults().removeClass("select2-results__option--highlighted"), o.trigger("results:focus", {
											data: n,
											element: t(this)
										})
									}))
								}, n.prototype.getHighlightedResults = function() {
									return this.$results.find(".select2-results__option--highlighted")
								}, n.prototype.destroy = function() {
									this.$results.remove()
								}, n.prototype.ensureHighlightVisible = function() {
									var t = this.getHighlightedResults();
									if (0 !== t.length) {
										var e = this.$results.find("[aria-selected]").index(t),
											n = this.$results.offset().top,
											o = t.offset().top,
											i = this.$results.scrollTop() + (o - n),
											r = o - n;
										i -= 2 * t.outerHeight(!1), 2 >= e ? this.$results.scrollTop(0) : (r > this.$results.outerHeight() || 0 > r) && this.$results.scrollTop(i)
									}
								}, n.prototype.template = function(e, n) {
									var o = this.options.get("templateResult"),
										i = this.options.get("escapeMarkup"),
										r = o(e, n);
									null == r ? n.style.display = "none" : "string" == typeof r ? n.innerHTML = i(r) : t(n).append(r)
								}, n
							})), e.define("select2/keys", [], (function() {
								return {
									BACKSPACE: 8,
									TAB: 9,
									ENTER: 13,
									SHIFT: 16,
									CTRL: 17,
									ALT: 18,
									ESC: 27,
									SPACE: 32,
									PAGE_UP: 33,
									PAGE_DOWN: 34,
									END: 35,
									HOME: 36,
									LEFT: 37,
									UP: 38,
									RIGHT: 39,
									DOWN: 40,
									DELETE: 46
								}
							})), e.define("select2/selection/base", ["jquery", "../utils", "../keys"], (function(t, e, n) {
								function o(t, e) {
									this.$element = t, this.options = e, o.__super__.constructor.call(this)
								}
								return e.Extend(o, e.Observable), o.prototype.render = function() {
									var e = t('<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>');
									return this._tabindex = 0, null != this.$element.data("old-tabindex") ? this._tabindex = this.$element.data("old-tabindex") : null != this.$element.attr("tabindex") && (this._tabindex = this.$element.attr("tabindex")), e.attr("title", this.$element.attr("title")), e.attr("tabindex", this._tabindex), this.$selection = e, e
								}, o.prototype.bind = function(t, e) {
									var o = this,
										i = (t.id, t.id + "-results");
									this.container = t, this.$selection.on("focus", (function(t) {
										o.trigger("focus", t)
									})), this.$selection.on("blur", (function(t) {
										o._handleBlur(t)
									})), this.$selection.on("keydown", (function(t) {
										o.trigger("keypress", t), t.which === n.SPACE && t.preventDefault()
									})), t.on("results:focus", (function(t) {
										o.$selection.attr("aria-activedescendant", t.data._resultId)
									})), t.on("selection:update", (function(t) {
										o.update(t.data)
									})), t.on("open", (function() {
										o.$selection.attr("aria-expanded", "true"), o.$selection.attr("aria-owns", i), o._attachCloseHandler(t)
									})), t.on("close", (function() {
										o.$selection.attr("aria-expanded", "false"), o.$selection.removeAttr("aria-activedescendant"), o.$selection.removeAttr("aria-owns"), o.$selection.focus(), o._detachCloseHandler(t)
									})), t.on("enable", (function() {
										o.$selection.attr("tabindex", o._tabindex)
									})), t.on("disable", (function() {
										o.$selection.attr("tabindex", "-1")
									}))
								}, o.prototype._handleBlur = function(e) {
									var n = this;
									window.setTimeout((function() {
										document.activeElement == n.$selection[0] || t.contains(n.$selection[0], document.activeElement) || n.trigger("blur", e)
									}), 1)
								}, o.prototype._attachCloseHandler = function(e) {
									t(document.body).on("mousedown.select2." + e.id, (function(e) {
										var n = t(e.target).closest(".select2");
										t(".select2.select2-container--open").each((function() {
											var e = t(this);
											this != n[0] && e.data("element").select2("close")
										}))
									}))
								}, o.prototype._detachCloseHandler = function(e) {
									t(document.body).off("mousedown.select2." + e.id)
								}, o.prototype.position = function(t, e) {
									e.find(".selection").append(t)
								}, o.prototype.destroy = function() {
									this._detachCloseHandler(this.container)
								}, o.prototype.update = function(t) {
									throw new Error("The `update` method must be defined in child classes.")
								}, o
							})), e.define("select2/selection/single", ["jquery", "./base", "../utils", "../keys"], (function(t, e, n, o) {
								function i() {
									i.__super__.constructor.apply(this, arguments)
								}
								return n.Extend(i, e), i.prototype.render = function() {
									var t = i.__super__.render.call(this);
									return t.addClass("select2-selection--single"), t.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'), t
								}, i.prototype.bind = function(t, e) {
									var n = this;
									i.__super__.bind.apply(this, arguments);
									var o = t.id + "-container";
									this.$selection.find(".select2-selection__rendered").attr("id", o), this.$selection.attr("aria-labelledby", o), this.$selection.on("mousedown", (function(t) {
										1 === t.which && n.trigger("toggle", {
											originalEvent: t
										})
									})), this.$selection.on("focus", (function(t) {})), this.$selection.on("blur", (function(t) {})), t.on("focus", (function(e) {
										t.isOpen() || n.$selection.focus()
									})), t.on("selection:update", (function(t) {
										n.update(t.data)
									}))
								}, i.prototype.clear = function() {
									this.$selection.find(".select2-selection__rendered").empty()
								}, i.prototype.display = function(t, e) {
									var n = this.options.get("templateSelection");
									return this.options.get("escapeMarkup")(n(t, e))
								}, i.prototype.selectionContainer = function() {
									return t("<span></span>")
								}, i.prototype.update = function(t) {
									if (0 !== t.length) {
										var e = t[0],
											n = this.$selection.find(".select2-selection__rendered"),
											o = this.display(e, n);
										n.empty().append(o), n.prop("title", e.title || e.text)
									} else this.clear()
								}, i
							})), e.define("select2/selection/multiple", ["jquery", "./base", "../utils"], (function(t, e, n) {
								function o(t, e) {
									o.__super__.constructor.apply(this, arguments)
								}
								return n.Extend(o, e), o.prototype.render = function() {
									var t = o.__super__.render.call(this);
									return t.addClass("select2-selection--multiple"), t.html('<ul class="select2-selection__rendered"></ul>'), t
								}, o.prototype.bind = function(e, n) {
									var i = this;
									o.__super__.bind.apply(this, arguments), this.$selection.on("click", (function(t) {
										i.trigger("toggle", {
											originalEvent: t
										})
									})), this.$selection.on("click", ".select2-selection__choice__remove", (function(e) {
										if (!i.options.get("disabled")) {
											var n = t(this).parent().data("data");
											i.trigger("unselect", {
												originalEvent: e,
												data: n
											})
										}
									}))
								}, o.prototype.clear = function() {
									this.$selection.find(".select2-selection__rendered").empty()
								}, o.prototype.display = function(t, e) {
									var n = this.options.get("templateSelection");
									return this.options.get("escapeMarkup")(n(t, e))
								}, o.prototype.selectionContainer = function() {
									return t('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>')
								}, o.prototype.update = function(t) {
									if (this.clear(), 0 !== t.length) {
										for (var e = [], o = 0; o < t.length; o++) {
											var i = t[o],
												r = this.selectionContainer(),
												s = this.display(i, r);
											r.append(s), r.prop("title", i.title || i.text), r.data("data", i), e.push(r)
										}
										var a = this.$selection.find(".select2-selection__rendered");
										n.appendMany(a, e)
									}
								}, o
							})), e.define("select2/selection/placeholder", ["../utils"], (function(t) {
								function e(t, e, n) {
									this.placeholder = this.normalizePlaceholder(n.get("placeholder")), t.call(this, e, n)
								}
								return e.prototype.normalizePlaceholder = function(t, e) {
									return "string" == typeof e && (e = {
										id: "",
										text: e
									}), e
								}, e.prototype.createPlaceholder = function(t, e) {
									var n = this.selectionContainer();
									return n.html(this.display(e)), n.addClass("select2-selection__placeholder").removeClass("select2-selection__choice"), n
								}, e.prototype.update = function(t, e) {
									var n = 1 == e.length && e[0].id != this.placeholder.id;
									if (e.length > 1 || n) return t.call(this, e);
									this.clear();
									var o = this.createPlaceholder(this.placeholder);
									this.$selection.find(".select2-selection__rendered").append(o)
								}, e
							})), e.define("select2/selection/allowClear", ["jquery", "../keys"], (function(t, e) {
								function n() {}
								return n.prototype.bind = function(t, e, n) {
									var o = this;
									t.call(this, e, n), null == this.placeholder && this.options.get("debug") && window.console && console.error && console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."), this.$selection.on("mousedown", ".select2-selection__clear", (function(t) {
										o._handleClear(t)
									})), e.on("keypress", (function(t) {
										o._handleKeyboardClear(t, e)
									}))
								}, n.prototype._handleClear = function(t, e) {
									if (!this.options.get("disabled")) {
										var n = this.$selection.find(".select2-selection__clear");
										if (0 !== n.length) {
											e.stopPropagation();
											for (var o = n.data("data"), i = 0; i < o.length; i++) {
												var r = {
													data: o[i]
												};
												if (this.trigger("unselect", r), r.prevented) return
											}
											this.$element.val(this.placeholder.id).trigger("change"), this.trigger("toggle", {})
										}
									}
								}, n.prototype._handleKeyboardClear = function(t, n, o) {
									o.isOpen() || (n.which == e.DELETE || n.which == e.BACKSPACE) && this._handleClear(n)
								}, n.prototype.update = function(e, n) {
									if (e.call(this, n), !(this.$selection.find(".select2-selection__placeholder").length > 0 || 0 === n.length)) {
										var o = t('<span class="select2-selection__clear">&times;</span>');
										o.data("data", n), this.$selection.find(".select2-selection__rendered").prepend(o)
									}
								}, n
							})), e.define("select2/selection/search", ["jquery", "../utils", "../keys"], (function(t, e, n) {
								function o(t, e, n) {
									t.call(this, e, n)
								}
								return o.prototype.render = function(e) {
									var n = t('<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" /></li>');
									this.$searchContainer = n, this.$search = n.find("input");
									var o = e.call(this);
									return this._transferTabIndex(), o
								}, o.prototype.bind = function(t, e, o) {
									var i = this;
									t.call(this, e, o), e.on("open", (function() {
										i.$search.trigger("focus")
									})), e.on("close", (function() {
										i.$search.val(""), i.$search.removeAttr("aria-activedescendant"), i.$search.trigger("focus")
									})), e.on("enable", (function() {
										i.$search.prop("disabled", !1), i._transferTabIndex()
									})), e.on("disable", (function() {
										i.$search.prop("disabled", !0)
									})), e.on("focus", (function(t) {
										i.$search.trigger("focus")
									})), e.on("results:focus", (function(t) {
										i.$search.attr("aria-activedescendant", t.id)
									})), this.$selection.on("focusin", ".select2-search--inline", (function(t) {
										i.trigger("focus", t)
									})), this.$selection.on("focusout", ".select2-search--inline", (function(t) {
										i._handleBlur(t)
									})), this.$selection.on("keydown", ".select2-search--inline", (function(t) {
										if (t.stopPropagation(), i.trigger("keypress", t), i._keyUpPrevented = t.isDefaultPrevented(), t.which === n.BACKSPACE && "" === i.$search.val()) {
											var e = i.$searchContainer.prev(".select2-selection__choice");
											if (e.length > 0) {
												var o = e.data("data");
												i.searchRemoveChoice(o), t.preventDefault()
											}
										}
									}));
									var r = document.documentMode,
										s = r && 11 >= r;
									this.$selection.on("input.searchcheck", ".select2-search--inline", (function(t) {
										return s ? void i.$selection.off("input.search input.searchcheck") : void i.$selection.off("keyup.search")
									})), this.$selection.on("keyup.search input.search", ".select2-search--inline", (function(t) {
										if (s && "input" === t.type) i.$selection.off("input.search input.searchcheck");
										else {
											var e = t.which;
											e != n.SHIFT && e != n.CTRL && e != n.ALT && e != n.TAB && i.handleSearch(t)
										}
									}))
								}, o.prototype._transferTabIndex = function(t) {
									this.$search.attr("tabindex", this.$selection.attr("tabindex")), this.$selection.attr("tabindex", "-1")
								}, o.prototype.createPlaceholder = function(t, e) {
									this.$search.attr("placeholder", e.text)
								}, o.prototype.update = function(t, e) {
									var n = this.$search[0] == document.activeElement;
									this.$search.attr("placeholder", ""), t.call(this, e), this.$selection.find(".select2-selection__rendered").append(this.$searchContainer), this.resizeSearch(), n && this.$search.focus()
								}, o.prototype.handleSearch = function() {
									if (this.resizeSearch(), !this._keyUpPrevented) {
										var t = this.$search.val();
										this.trigger("query", {
											term: t
										})
									}
									this._keyUpPrevented = !1
								}, o.prototype.searchRemoveChoice = function(t, e) {
									this.trigger("unselect", {
										data: e
									}), this.$search.val(e.text), this.handleSearch()
								}, o.prototype.resizeSearch = function() {
									this.$search.css("width", "25px");
									var t = "";
									t = "" !== this.$search.attr("placeholder") ? this.$selection.find(".select2-selection__rendered").innerWidth() : .75 * (this.$search.val().length + 1) + "em", this.$search.css("width", t)
								}, o
							})), e.define("select2/selection/eventRelay", ["jquery"], (function(t) {
								function e() {}
								return e.prototype.bind = function(e, n, o) {
									var i = this,
										r = ["open", "opening", "close", "closing", "select", "selecting", "unselect", "unselecting"],
										s = ["opening", "closing", "selecting", "unselecting"];
									e.call(this, n, o), n.on("*", (function(e, n) {
										if (-1 !== t.inArray(e, r)) {
											n = n || {};
											var o = t.Event("select2:" + e, {
												params: n
											});
											i.$element.trigger(o), -1 !== t.inArray(e, s) && (n.prevented = o.isDefaultPrevented())
										}
									}))
								}, e
							})), e.define("select2/translation", ["jquery", "require"], (function(t, e) {
								function n(t) {
									this.dict = t || {}
								}
								return n.prototype.all = function() {
									return this.dict
								}, n.prototype.get = function(t) {
									return this.dict[t]
								}, n.prototype.extend = function(e) {
									this.dict = t.extend({}, e.all(), this.dict)
								}, n._cache = {}, n.loadPath = function(t) {
									if (!(t in n._cache)) {
										var o = e(t);
										n._cache[t] = o
									}
									return new n(n._cache[t])
								}, n
							})), e.define("select2/diacritics", [], (function() {
								return {
									"Ⓐ": "A",
									"Ａ": "A",
									"À": "A",
									"Á": "A",
									"Â": "A",
									"Ầ": "A",
									"Ấ": "A",
									"Ẫ": "A",
									"Ẩ": "A",
									"Ã": "A",
									"Ā": "A",
									"Ă": "A",
									"Ằ": "A",
									"Ắ": "A",
									"Ẵ": "A",
									"Ẳ": "A",
									"Ȧ": "A",
									"Ǡ": "A",
									"Ä": "A",
									"Ǟ": "A",
									"Ả": "A",
									"Å": "A",
									"Ǻ": "A",
									"Ǎ": "A",
									"Ȁ": "A",
									"Ȃ": "A",
									"Ạ": "A",
									"Ậ": "A",
									"Ặ": "A",
									"Ḁ": "A",
									"Ą": "A",
									"Ⱥ": "A",
									"Ɐ": "A",
									"Ꜳ": "AA",
									"Æ": "AE",
									"Ǽ": "AE",
									"Ǣ": "AE",
									"Ꜵ": "AO",
									"Ꜷ": "AU",
									"Ꜹ": "AV",
									"Ꜻ": "AV",
									"Ꜽ": "AY",
									"Ⓑ": "B",
									"Ｂ": "B",
									"Ḃ": "B",
									"Ḅ": "B",
									"Ḇ": "B",
									"Ƀ": "B",
									"Ƃ": "B",
									"Ɓ": "B",
									"Ⓒ": "C",
									"Ｃ": "C",
									"Ć": "C",
									"Ĉ": "C",
									"Ċ": "C",
									"Č": "C",
									"Ç": "C",
									"Ḉ": "C",
									"Ƈ": "C",
									"Ȼ": "C",
									"Ꜿ": "C",
									"Ⓓ": "D",
									"Ｄ": "D",
									"Ḋ": "D",
									"Ď": "D",
									"Ḍ": "D",
									"Ḑ": "D",
									"Ḓ": "D",
									"Ḏ": "D",
									"Đ": "D",
									"Ƌ": "D",
									"Ɗ": "D",
									"Ɖ": "D",
									"Ꝺ": "D",
									"Ǳ": "DZ",
									"Ǆ": "DZ",
									"ǲ": "Dz",
									"ǅ": "Dz",
									"Ⓔ": "E",
									"Ｅ": "E",
									"È": "E",
									"É": "E",
									"Ê": "E",
									"Ề": "E",
									"Ế": "E",
									"Ễ": "E",
									"Ể": "E",
									"Ẽ": "E",
									"Ē": "E",
									"Ḕ": "E",
									"Ḗ": "E",
									"Ĕ": "E",
									"Ė": "E",
									"Ë": "E",
									"Ẻ": "E",
									"Ě": "E",
									"Ȅ": "E",
									"Ȇ": "E",
									"Ẹ": "E",
									"Ệ": "E",
									"Ȩ": "E",
									"Ḝ": "E",
									"Ę": "E",
									"Ḙ": "E",
									"Ḛ": "E",
									"Ɛ": "E",
									"Ǝ": "E",
									"Ⓕ": "F",
									"Ｆ": "F",
									"Ḟ": "F",
									"Ƒ": "F",
									"Ꝼ": "F",
									"Ⓖ": "G",
									"Ｇ": "G",
									"Ǵ": "G",
									"Ĝ": "G",
									"Ḡ": "G",
									"Ğ": "G",
									"Ġ": "G",
									"Ǧ": "G",
									"Ģ": "G",
									"Ǥ": "G",
									"Ɠ": "G",
									"Ꞡ": "G",
									"Ᵹ": "G",
									"Ꝿ": "G",
									"Ⓗ": "H",
									"Ｈ": "H",
									"Ĥ": "H",
									"Ḣ": "H",
									"Ḧ": "H",
									"Ȟ": "H",
									"Ḥ": "H",
									"Ḩ": "H",
									"Ḫ": "H",
									"Ħ": "H",
									"Ⱨ": "H",
									"Ⱶ": "H",
									"Ɥ": "H",
									"Ⓘ": "I",
									"Ｉ": "I",
									"Ì": "I",
									"Í": "I",
									"Î": "I",
									"Ĩ": "I",
									"Ī": "I",
									"Ĭ": "I",
									"İ": "I",
									"Ï": "I",
									"Ḯ": "I",
									"Ỉ": "I",
									"Ǐ": "I",
									"Ȉ": "I",
									"Ȋ": "I",
									"Ị": "I",
									"Į": "I",
									"Ḭ": "I",
									"Ɨ": "I",
									"Ⓙ": "J",
									"Ｊ": "J",
									"Ĵ": "J",
									"Ɉ": "J",
									"Ⓚ": "K",
									"Ｋ": "K",
									"Ḱ": "K",
									"Ǩ": "K",
									"Ḳ": "K",
									"Ķ": "K",
									"Ḵ": "K",
									"Ƙ": "K",
									"Ⱪ": "K",
									"Ꝁ": "K",
									"Ꝃ": "K",
									"Ꝅ": "K",
									"Ꞣ": "K",
									"Ⓛ": "L",
									"Ｌ": "L",
									"Ŀ": "L",
									"Ĺ": "L",
									"Ľ": "L",
									"Ḷ": "L",
									"Ḹ": "L",
									"Ļ": "L",
									"Ḽ": "L",
									"Ḻ": "L",
									"Ł": "L",
									"Ƚ": "L",
									"Ɫ": "L",
									"Ⱡ": "L",
									"Ꝉ": "L",
									"Ꝇ": "L",
									"Ꞁ": "L",
									"Ǉ": "LJ",
									"ǈ": "Lj",
									"Ⓜ": "M",
									"Ｍ": "M",
									"Ḿ": "M",
									"Ṁ": "M",
									"Ṃ": "M",
									"Ɱ": "M",
									"Ɯ": "M",
									"Ⓝ": "N",
									"Ｎ": "N",
									"Ǹ": "N",
									"Ń": "N",
									"Ñ": "N",
									"Ṅ": "N",
									"Ň": "N",
									"Ṇ": "N",
									"Ņ": "N",
									"Ṋ": "N",
									"Ṉ": "N",
									"Ƞ": "N",
									"Ɲ": "N",
									"Ꞑ": "N",
									"Ꞥ": "N",
									"Ǌ": "NJ",
									"ǋ": "Nj",
									"Ⓞ": "O",
									"Ｏ": "O",
									"Ò": "O",
									"Ó": "O",
									"Ô": "O",
									"Ồ": "O",
									"Ố": "O",
									"Ỗ": "O",
									"Ổ": "O",
									"Õ": "O",
									"Ṍ": "O",
									"Ȭ": "O",
									"Ṏ": "O",
									"Ō": "O",
									"Ṑ": "O",
									"Ṓ": "O",
									"Ŏ": "O",
									"Ȯ": "O",
									"Ȱ": "O",
									"Ö": "O",
									"Ȫ": "O",
									"Ỏ": "O",
									"Ő": "O",
									"Ǒ": "O",
									"Ȍ": "O",
									"Ȏ": "O",
									"Ơ": "O",
									"Ờ": "O",
									"Ớ": "O",
									"Ỡ": "O",
									"Ở": "O",
									"Ợ": "O",
									"Ọ": "O",
									"Ộ": "O",
									"Ǫ": "O",
									"Ǭ": "O",
									"Ø": "O",
									"Ǿ": "O",
									"Ɔ": "O",
									"Ɵ": "O",
									"Ꝋ": "O",
									"Ꝍ": "O",
									"Ƣ": "OI",
									"Ꝏ": "OO",
									"Ȣ": "OU",
									"Ⓟ": "P",
									"Ｐ": "P",
									"Ṕ": "P",
									"Ṗ": "P",
									"Ƥ": "P",
									"Ᵽ": "P",
									"Ꝑ": "P",
									"Ꝓ": "P",
									"Ꝕ": "P",
									"Ⓠ": "Q",
									"Ｑ": "Q",
									"Ꝗ": "Q",
									"Ꝙ": "Q",
									"Ɋ": "Q",
									"Ⓡ": "R",
									"Ｒ": "R",
									"Ŕ": "R",
									"Ṙ": "R",
									"Ř": "R",
									"Ȑ": "R",
									"Ȓ": "R",
									"Ṛ": "R",
									"Ṝ": "R",
									"Ŗ": "R",
									"Ṟ": "R",
									"Ɍ": "R",
									"Ɽ": "R",
									"Ꝛ": "R",
									"Ꞧ": "R",
									"Ꞃ": "R",
									"Ⓢ": "S",
									"Ｓ": "S",
									"ẞ": "S",
									"Ś": "S",
									"Ṥ": "S",
									"Ŝ": "S",
									"Ṡ": "S",
									"Š": "S",
									"Ṧ": "S",
									"Ṣ": "S",
									"Ṩ": "S",
									"Ș": "S",
									"Ş": "S",
									"Ȿ": "S",
									"Ꞩ": "S",
									"Ꞅ": "S",
									"Ⓣ": "T",
									"Ｔ": "T",
									"Ṫ": "T",
									"Ť": "T",
									"Ṭ": "T",
									"Ț": "T",
									"Ţ": "T",
									"Ṱ": "T",
									"Ṯ": "T",
									"Ŧ": "T",
									"Ƭ": "T",
									"Ʈ": "T",
									"Ⱦ": "T",
									"Ꞇ": "T",
									"Ꜩ": "TZ",
									"Ⓤ": "U",
									"Ｕ": "U",
									"Ù": "U",
									"Ú": "U",
									"Û": "U",
									"Ũ": "U",
									"Ṹ": "U",
									"Ū": "U",
									"Ṻ": "U",
									"Ŭ": "U",
									"Ü": "U",
									"Ǜ": "U",
									"Ǘ": "U",
									"Ǖ": "U",
									"Ǚ": "U",
									"Ủ": "U",
									"Ů": "U",
									"Ű": "U",
									"Ǔ": "U",
									"Ȕ": "U",
									"Ȗ": "U",
									"Ư": "U",
									"Ừ": "U",
									"Ứ": "U",
									"Ữ": "U",
									"Ử": "U",
									"Ự": "U",
									"Ụ": "U",
									"Ṳ": "U",
									"Ų": "U",
									"Ṷ": "U",
									"Ṵ": "U",
									"Ʉ": "U",
									"Ⓥ": "V",
									"Ｖ": "V",
									"Ṽ": "V",
									"Ṿ": "V",
									"Ʋ": "V",
									"Ꝟ": "V",
									"Ʌ": "V",
									"Ꝡ": "VY",
									"Ⓦ": "W",
									"Ｗ": "W",
									"Ẁ": "W",
									"Ẃ": "W",
									"Ŵ": "W",
									"Ẇ": "W",
									"Ẅ": "W",
									"Ẉ": "W",
									"Ⱳ": "W",
									"Ⓧ": "X",
									"Ｘ": "X",
									"Ẋ": "X",
									"Ẍ": "X",
									"Ⓨ": "Y",
									"Ｙ": "Y",
									"Ỳ": "Y",
									"Ý": "Y",
									"Ŷ": "Y",
									"Ỹ": "Y",
									"Ȳ": "Y",
									"Ẏ": "Y",
									"Ÿ": "Y",
									"Ỷ": "Y",
									"Ỵ": "Y",
									"Ƴ": "Y",
									"Ɏ": "Y",
									"Ỿ": "Y",
									"Ⓩ": "Z",
									"Ｚ": "Z",
									"Ź": "Z",
									"Ẑ": "Z",
									"Ż": "Z",
									"Ž": "Z",
									"Ẓ": "Z",
									"Ẕ": "Z",
									"Ƶ": "Z",
									"Ȥ": "Z",
									"Ɀ": "Z",
									"Ⱬ": "Z",
									"Ꝣ": "Z",
									"ⓐ": "a",
									"ａ": "a",
									"ẚ": "a",
									"à": "a",
									"á": "a",
									"â": "a",
									"ầ": "a",
									"ấ": "a",
									"ẫ": "a",
									"ẩ": "a",
									"ã": "a",
									"ā": "a",
									"ă": "a",
									"ằ": "a",
									"ắ": "a",
									"ẵ": "a",
									"ẳ": "a",
									"ȧ": "a",
									"ǡ": "a",
									"ä": "a",
									"ǟ": "a",
									"ả": "a",
									"å": "a",
									"ǻ": "a",
									"ǎ": "a",
									"ȁ": "a",
									"ȃ": "a",
									"ạ": "a",
									"ậ": "a",
									"ặ": "a",
									"ḁ": "a",
									"ą": "a",
									"ⱥ": "a",
									"ɐ": "a",
									"ꜳ": "aa",
									"æ": "ae",
									"ǽ": "ae",
									"ǣ": "ae",
									"ꜵ": "ao",
									"ꜷ": "au",
									"ꜹ": "av",
									"ꜻ": "av",
									"ꜽ": "ay",
									"ⓑ": "b",
									"ｂ": "b",
									"ḃ": "b",
									"ḅ": "b",
									"ḇ": "b",
									"ƀ": "b",
									"ƃ": "b",
									"ɓ": "b",
									"ⓒ": "c",
									"ｃ": "c",
									"ć": "c",
									"ĉ": "c",
									"ċ": "c",
									"č": "c",
									"ç": "c",
									"ḉ": "c",
									"ƈ": "c",
									"ȼ": "c",
									"ꜿ": "c",
									"ↄ": "c",
									"ⓓ": "d",
									"ｄ": "d",
									"ḋ": "d",
									"ď": "d",
									"ḍ": "d",
									"ḑ": "d",
									"ḓ": "d",
									"ḏ": "d",
									"đ": "d",
									"ƌ": "d",
									"ɖ": "d",
									"ɗ": "d",
									"ꝺ": "d",
									"ǳ": "dz",
									"ǆ": "dz",
									"ⓔ": "e",
									"ｅ": "e",
									"è": "e",
									"é": "e",
									"ê": "e",
									"ề": "e",
									"ế": "e",
									"ễ": "e",
									"ể": "e",
									"ẽ": "e",
									"ē": "e",
									"ḕ": "e",
									"ḗ": "e",
									"ĕ": "e",
									"ė": "e",
									"ë": "e",
									"ẻ": "e",
									"ě": "e",
									"ȅ": "e",
									"ȇ": "e",
									"ẹ": "e",
									"ệ": "e",
									"ȩ": "e",
									"ḝ": "e",
									"ę": "e",
									"ḙ": "e",
									"ḛ": "e",
									"ɇ": "e",
									"ɛ": "e",
									"ǝ": "e",
									"ⓕ": "f",
									"ｆ": "f",
									"ḟ": "f",
									"ƒ": "f",
									"ꝼ": "f",
									"ⓖ": "g",
									"ｇ": "g",
									"ǵ": "g",
									"ĝ": "g",
									"ḡ": "g",
									"ğ": "g",
									"ġ": "g",
									"ǧ": "g",
									"ģ": "g",
									"ǥ": "g",
									"ɠ": "g",
									"ꞡ": "g",
									"ᵹ": "g",
									"ꝿ": "g",
									"ⓗ": "h",
									"ｈ": "h",
									"ĥ": "h",
									"ḣ": "h",
									"ḧ": "h",
									"ȟ": "h",
									"ḥ": "h",
									"ḩ": "h",
									"ḫ": "h",
									"ẖ": "h",
									"ħ": "h",
									"ⱨ": "h",
									"ⱶ": "h",
									"ɥ": "h",
									"ƕ": "hv",
									"ⓘ": "i",
									"ｉ": "i",
									"ì": "i",
									"í": "i",
									"î": "i",
									"ĩ": "i",
									"ī": "i",
									"ĭ": "i",
									"ï": "i",
									"ḯ": "i",
									"ỉ": "i",
									"ǐ": "i",
									"ȉ": "i",
									"ȋ": "i",
									"ị": "i",
									"į": "i",
									"ḭ": "i",
									"ɨ": "i",
									"ı": "i",
									"ⓙ": "j",
									"ｊ": "j",
									"ĵ": "j",
									"ǰ": "j",
									"ɉ": "j",
									"ⓚ": "k",
									"ｋ": "k",
									"ḱ": "k",
									"ǩ": "k",
									"ḳ": "k",
									"ķ": "k",
									"ḵ": "k",
									"ƙ": "k",
									"ⱪ": "k",
									"ꝁ": "k",
									"ꝃ": "k",
									"ꝅ": "k",
									"ꞣ": "k",
									"ⓛ": "l",
									"ｌ": "l",
									"ŀ": "l",
									"ĺ": "l",
									"ľ": "l",
									"ḷ": "l",
									"ḹ": "l",
									"ļ": "l",
									"ḽ": "l",
									"ḻ": "l",
									"ſ": "l",
									"ł": "l",
									"ƚ": "l",
									"ɫ": "l",
									"ⱡ": "l",
									"ꝉ": "l",
									"ꞁ": "l",
									"ꝇ": "l",
									"ǉ": "lj",
									"ⓜ": "m",
									"ｍ": "m",
									"ḿ": "m",
									"ṁ": "m",
									"ṃ": "m",
									"ɱ": "m",
									"ɯ": "m",
									"ⓝ": "n",
									"ｎ": "n",
									"ǹ": "n",
									"ń": "n",
									"ñ": "n",
									"ṅ": "n",
									"ň": "n",
									"ṇ": "n",
									"ņ": "n",
									"ṋ": "n",
									"ṉ": "n",
									"ƞ": "n",
									"ɲ": "n",
									"ŉ": "n",
									"ꞑ": "n",
									"ꞥ": "n",
									"ǌ": "nj",
									"ⓞ": "o",
									"ｏ": "o",
									"ò": "o",
									"ó": "o",
									"ô": "o",
									"ồ": "o",
									"ố": "o",
									"ỗ": "o",
									"ổ": "o",
									"õ": "o",
									"ṍ": "o",
									"ȭ": "o",
									"ṏ": "o",
									"ō": "o",
									"ṑ": "o",
									"ṓ": "o",
									"ŏ": "o",
									"ȯ": "o",
									"ȱ": "o",
									"ö": "o",
									"ȫ": "o",
									"ỏ": "o",
									"ő": "o",
									"ǒ": "o",
									"ȍ": "o",
									"ȏ": "o",
									"ơ": "o",
									"ờ": "o",
									"ớ": "o",
									"ỡ": "o",
									"ở": "o",
									"ợ": "o",
									"ọ": "o",
									"ộ": "o",
									"ǫ": "o",
									"ǭ": "o",
									"ø": "o",
									"ǿ": "o",
									"ɔ": "o",
									"ꝋ": "o",
									"ꝍ": "o",
									"ɵ": "o",
									"ƣ": "oi",
									"ȣ": "ou",
									"ꝏ": "oo",
									"ⓟ": "p",
									"ｐ": "p",
									"ṕ": "p",
									"ṗ": "p",
									"ƥ": "p",
									"ᵽ": "p",
									"ꝑ": "p",
									"ꝓ": "p",
									"ꝕ": "p",
									"ⓠ": "q",
									"ｑ": "q",
									"ɋ": "q",
									"ꝗ": "q",
									"ꝙ": "q",
									"ⓡ": "r",
									"ｒ": "r",
									"ŕ": "r",
									"ṙ": "r",
									"ř": "r",
									"ȑ": "r",
									"ȓ": "r",
									"ṛ": "r",
									"ṝ": "r",
									"ŗ": "r",
									"ṟ": "r",
									"ɍ": "r",
									"ɽ": "r",
									"ꝛ": "r",
									"ꞧ": "r",
									"ꞃ": "r",
									"ⓢ": "s",
									"ｓ": "s",
									"ß": "s",
									"ś": "s",
									"ṥ": "s",
									"ŝ": "s",
									"ṡ": "s",
									"š": "s",
									"ṧ": "s",
									"ṣ": "s",
									"ṩ": "s",
									"ș": "s",
									"ş": "s",
									"ȿ": "s",
									"ꞩ": "s",
									"ꞅ": "s",
									"ẛ": "s",
									"ⓣ": "t",
									"ｔ": "t",
									"ṫ": "t",
									"ẗ": "t",
									"ť": "t",
									"ṭ": "t",
									"ț": "t",
									"ţ": "t",
									"ṱ": "t",
									"ṯ": "t",
									"ŧ": "t",
									"ƭ": "t",
									"ʈ": "t",
									"ⱦ": "t",
									"ꞇ": "t",
									"ꜩ": "tz",
									"ⓤ": "u",
									"ｕ": "u",
									"ù": "u",
									"ú": "u",
									"û": "u",
									"ũ": "u",
									"ṹ": "u",
									"ū": "u",
									"ṻ": "u",
									"ŭ": "u",
									"ü": "u",
									"ǜ": "u",
									"ǘ": "u",
									"ǖ": "u",
									"ǚ": "u",
									"ủ": "u",
									"ů": "u",
									"ű": "u",
									"ǔ": "u",
									"ȕ": "u",
									"ȗ": "u",
									"ư": "u",
									"ừ": "u",
									"ứ": "u",
									"ữ": "u",
									"ử": "u",
									"ự": "u",
									"ụ": "u",
									"ṳ": "u",
									"ų": "u",
									"ṷ": "u",
									"ṵ": "u",
									"ʉ": "u",
									"ⓥ": "v",
									"ｖ": "v",
									"ṽ": "v",
									"ṿ": "v",
									"ʋ": "v",
									"ꝟ": "v",
									"ʌ": "v",
									"ꝡ": "vy",
									"ⓦ": "w",
									"ｗ": "w",
									"ẁ": "w",
									"ẃ": "w",
									"ŵ": "w",
									"ẇ": "w",
									"ẅ": "w",
									"ẘ": "w",
									"ẉ": "w",
									"ⱳ": "w",
									"ⓧ": "x",
									"ｘ": "x",
									"ẋ": "x",
									"ẍ": "x",
									"ⓨ": "y",
									"ｙ": "y",
									"ỳ": "y",
									"ý": "y",
									"ŷ": "y",
									"ỹ": "y",
									"ȳ": "y",
									"ẏ": "y",
									"ÿ": "y",
									"ỷ": "y",
									"ẙ": "y",
									"ỵ": "y",
									"ƴ": "y",
									"ɏ": "y",
									"ỿ": "y",
									"ⓩ": "z",
									"ｚ": "z",
									"ź": "z",
									"ẑ": "z",
									"ż": "z",
									"ž": "z",
									"ẓ": "z",
									"ẕ": "z",
									"ƶ": "z",
									"ȥ": "z",
									"ɀ": "z",
									"ⱬ": "z",
									"ꝣ": "z",
									"Ά": "Α",
									"Έ": "Ε",
									"Ή": "Η",
									"Ί": "Ι",
									"Ϊ": "Ι",
									"Ό": "Ο",
									"Ύ": "Υ",
									"Ϋ": "Υ",
									"Ώ": "Ω",
									"ά": "α",
									"έ": "ε",
									"ή": "η",
									"ί": "ι",
									"ϊ": "ι",
									"ΐ": "ι",
									"ό": "ο",
									"ύ": "υ",
									"ϋ": "υ",
									"ΰ": "υ",
									"ω": "ω",
									"ς": "σ"
								}
							})), e.define("select2/data/base", ["../utils"], (function(t) {
								function e(t, n) {
									e.__super__.constructor.call(this)
								}
								return t.Extend(e, t.Observable), e.prototype.current = function(t) {
									throw new Error("The `current` method must be defined in child classes.")
								}, e.prototype.query = function(t, e) {
									throw new Error("The `query` method must be defined in child classes.")
								}, e.prototype.bind = function(t, e) {}, e.prototype.destroy = function() {}, e.prototype.generateResultId = function(e, n) {
									var o = e.id + "-result-";
									return (o += t.generateChars(4)) + (null != n.id ? "-" + n.id.toString() : "-" + t.generateChars(4))
								}, e
							})), e.define("select2/data/select", ["./base", "../utils", "jquery"], (function(t, e, n) {
								function o(t, e) {
									this.$element = t, this.options = e, o.__super__.constructor.call(this)
								}
								return e.Extend(o, t), o.prototype.current = function(t) {
									var e = [],
										o = this;
									this.$element.find(":selected").each((function() {
										var t = n(this),
											i = o.item(t);
										e.push(i)
									})), t(e)
								}, o.prototype.select = function(t) {
									var e = this;
									if (t.selected = !0, n(t.element).is("option")) return t.element.selected = !0, void this.$element.trigger("change");
									if (this.$element.prop("multiple")) this.current((function(o) {
										var i = [];
										(t = [t]).push.apply(t, o);
										for (var r = 0; r < t.length; r++) {
											var s = t[r].id; - 1 === n.inArray(s, i) && i.push(s)
										}
										e.$element.val(i), e.$element.trigger("change")
									}));
									else {
										var o = t.id;
										this.$element.val(o), this.$element.trigger("change")
									}
								}, o.prototype.unselect = function(t) {
									var e = this;
									if (this.$element.prop("multiple")) return t.selected = !1, n(t.element).is("option") ? (t.element.selected = !1, void this.$element.trigger("change")) : void this.current((function(o) {
										for (var i = [], r = 0; r < o.length; r++) {
											var s = o[r].id;
											s !== t.id && -1 === n.inArray(s, i) && i.push(s)
										}
										e.$element.val(i), e.$element.trigger("change")
									}))
								}, o.prototype.bind = function(t, e) {
									var n = this;
									this.container = t, t.on("select", (function(t) {
										n.select(t.data)
									})), t.on("unselect", (function(t) {
										n.unselect(t.data)
									}))
								}, o.prototype.destroy = function() {
									this.$element.find("*").each((function() {
										n.removeData(this, "data")
									}))
								}, o.prototype.query = function(t, e) {
									var o = [],
										i = this;
									this.$element.children().each((function() {
										var e = n(this);
										if (e.is("option") || e.is("optgroup")) {
											var r = i.item(e),
												s = i.matches(t, r);
											null !== s && o.push(s)
										}
									})), e({
										results: o
									})
								}, o.prototype.addOptions = function(t) {
									e.appendMany(this.$element, t)
								}, o.prototype.option = function(t) {
									var e;
									t.children ? (e = document.createElement("optgroup")).label = t.text : void 0 !== (e = document.createElement("option")).textContent ? e.textContent = t.text : e.innerText = t.text, t.id && (e.value = t.id), t.disabled && (e.disabled = !0), t.selected && (e.selected = !0), t.title && (e.title = t.title);
									var o = n(e),
										i = this._normalizeItem(t);
									return i.element = e, n.data(e, "data", i), o
								}, o.prototype.item = function(t) {
									var e = {};
									if (null != (e = n.data(t[0], "data"))) return e;
									if (t.is("option")) e = {
										id: t.val(),
										text: t.text(),
										disabled: t.prop("disabled"),
										selected: t.prop("selected"),
										title: t.prop("title")
									};
									else if (t.is("optgroup")) {
										e = {
											text: t.prop("label"),
											children: [],
											title: t.prop("title")
										};
										for (var o = t.children("option"), i = [], r = 0; r < o.length; r++) {
											var s = n(o[r]),
												a = this.item(s);
											i.push(a)
										}
										e.children = i
									}
									return (e = this._normalizeItem(e)).element = t[0], n.data(t[0], "data", e), e
								}, o.prototype._normalizeItem = function(t) {
									return n.isPlainObject(t) || (t = {
										id: t,
										text: t
									}), null != (t = n.extend({}, {
										text: ""
									}, t)).id && (t.id = t.id.toString()), null != t.text && (t.text = t.text.toString()), null == t._resultId && t.id && null != this.container && (t._resultId = this.generateResultId(this.container, t)), n.extend({}, {
										selected: !1,
										disabled: !1
									}, t)
								}, o.prototype.matches = function(t, e) {
									return this.options.get("matcher")(t, e)
								}, o
							})), e.define("select2/data/array", ["./select", "../utils", "jquery"], (function(t, e, n) {
								function o(t, e) {
									var n = e.get("data") || [];
									o.__super__.constructor.call(this, t, e), this.addOptions(this.convertToOptions(n))
								}
								return e.Extend(o, t), o.prototype.select = function(t) {
									var e = this.$element.find("option").filter((function(e, n) {
										return n.value == t.id.toString()
									}));
									0 === e.length && (e = this.option(t), this.addOptions(e)), o.__super__.select.call(this, t)
								}, o.prototype.convertToOptions = function(t) {
									function o(t) {
										return function() {
											return n(this).val() == t.id
										}
									}
									for (var i = this, r = this.$element.find("option"), s = r.map((function() {
											return i.item(n(this)).id
										})).get(), a = [], l = 0; l < t.length; l++) {
										var c = this._normalizeItem(t[l]);
										if (n.inArray(c.id, s) >= 0) {
											var u = r.filter(o(c)),
												d = this.item(u),
												p = n.extend(!0, {}, c, d),
												h = this.option(p);
											u.replaceWith(h)
										} else {
											var f = this.option(c);
											if (c.children) {
												var g = this.convertToOptions(c.children);
												e.appendMany(f, g)
											}
											a.push(f)
										}
									}
									return a
								}, o
							})), e.define("select2/data/ajax", ["./array", "../utils", "jquery"], (function(t, e, n) {
								function o(t, e) {
									this.ajaxOptions = this._applyDefaults(e.get("ajax")), null != this.ajaxOptions.processResults && (this.processResults = this.ajaxOptions.processResults), o.__super__.constructor.call(this, t, e)
								}
								return e.Extend(o, t), o.prototype._applyDefaults = function(t) {
									var e = {
										data: function(t) {
											return n.extend({}, t, {
												q: t.term
											})
										},
										transport: function(t, e, o) {
											var i = n.ajax(t);
											return i.then(e), i.fail(o), i
										}
									};
									return n.extend({}, e, t, !0)
								}, o.prototype.processResults = function(t) {
									return t
								}, o.prototype.query = function(t, e) {
									function o() {
										var o = r.transport(r, (function(o) {
											var r = i.processResults(o, t);
											i.options.get("debug") && window.console && console.error && (r && r.results && n.isArray(r.results) || console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")), e(r)
										}), (function() {
											o.status && "0" === o.status || i.trigger("results:message", {
												message: "errorLoading"
											})
										}));
										i._request = o
									}
									var i = this;
									null != this._request && (n.isFunction(this._request.abort) && this._request.abort(), this._request = null);
									var r = n.extend({
										type: "GET"
									}, this.ajaxOptions);
									"function" == typeof r.url && (r.url = r.url.call(this.$element, t)), "function" == typeof r.data && (r.data = r.data.call(this.$element, t)), this.ajaxOptions.delay && null != t.term ? (this._queryTimeout && window.clearTimeout(this._queryTimeout), this._queryTimeout = window.setTimeout(o, this.ajaxOptions.delay)) : o()
								}, o
							})), e.define("select2/data/tags", ["jquery"], (function(t) {
								function e(e, n, o) {
									var i = o.get("tags"),
										r = o.get("createTag");
									void 0 !== r && (this.createTag = r);
									var s = o.get("insertTag");
									if (void 0 !== s && (this.insertTag = s), e.call(this, n, o), t.isArray(i))
										for (var a = 0; a < i.length; a++) {
											var l = i[a],
												c = this._normalizeItem(l),
												u = this.option(c);
											this.$element.append(u)
										}
								}
								return e.prototype.query = function(t, e, n) {
									var o = this;
									return this._removeOldTags(), null == e.term || null != e.page ? void t.call(this, e, n) : void t.call(this, e, (function t(i, r) {
										for (var s = i.results, a = 0; a < s.length; a++) {
											var l = s[a],
												c = null != l.children && !t({
													results: l.children
												}, !0);
											if (l.text === e.term || c) return !r && (i.data = s, void n(i))
										}
										if (r) return !0;
										var u = o.createTag(e);
										if (null != u) {
											var d = o.option(u);
											d.attr("data-select2-tag", !0), o.addOptions([d]), o.insertTag(s, u)
										}
										i.results = s, n(i)
									}))
								}, e.prototype.createTag = function(e, n) {
									var o = t.trim(n.term);
									return "" === o ? null : {
										id: o,
										text: o
									}
								}, e.prototype.insertTag = function(t, e, n) {
									e.unshift(n)
								}, e.prototype._removeOldTags = function(e) {
									(this._lastTag, this.$element.find("option[data-select2-tag]")).each((function() {
										this.selected || t(this).remove()
									}))
								}, e
							})), e.define("select2/data/tokenizer", ["jquery"], (function(t) {
								function e(t, e, n) {
									var o = n.get("tokenizer");
									void 0 !== o && (this.tokenizer = o), t.call(this, e, n)
								}
								return e.prototype.bind = function(t, e, n) {
									t.call(this, e, n), this.$search = e.dropdown.$search || e.selection.$search || n.find(".select2-search__field")
								}, e.prototype.query = function(e, n, o) {
									var i = this;
									n.term = n.term || "";
									var r = this.tokenizer(n, this.options, (function(e) {
										var n = i._normalizeItem(e);
										if (!i.$element.find("option").filter((function() {
												return t(this).val() === n.id
											})).length) {
											var o = i.option(n);
											o.attr("data-select2-tag", !0), i._removeOldTags(), i.addOptions([o])
										}! function(t) {
											i.trigger("select", {
												data: t
											})
										}(n)
									}));
									r.term !== n.term && (this.$search.length && (this.$search.val(r.term), this.$search.focus()), n.term = r.term), e.call(this, n, o)
								}, e.prototype.tokenizer = function(e, n, o, i) {
									for (var r = o.get("tokenSeparators") || [], s = n.term, a = 0, l = this.createTag || function(t) {
											return {
												id: t.term,
												text: t.term
											}
										}; a < s.length;) {
										var c = s[a];
										if (-1 !== t.inArray(c, r)) {
											var u = s.substr(0, a),
												d = l(t.extend({}, n, {
													term: u
												}));
											null != d ? (i(d), s = s.substr(a + 1) || "", a = 0) : a++
										} else a++
									}
									return {
										term: s
									}
								}, e
							})), e.define("select2/data/minimumInputLength", [], (function() {
								function t(t, e, n) {
									this.minimumInputLength = n.get("minimumInputLength"), t.call(this, e, n)
								}
								return t.prototype.query = function(t, e, n) {
									return e.term = e.term || "", e.term.length < this.minimumInputLength ? void this.trigger("results:message", {
										message: "inputTooShort",
										args: {
											minimum: this.minimumInputLength,
											input: e.term,
											params: e
										}
									}) : void t.call(this, e, n)
								}, t
							})), e.define("select2/data/maximumInputLength", [], (function() {
								function t(t, e, n) {
									this.maximumInputLength = n.get("maximumInputLength"), t.call(this, e, n)
								}
								return t.prototype.query = function(t, e, n) {
									return e.term = e.term || "", this.maximumInputLength > 0 && e.term.length > this.maximumInputLength ? void this.trigger("results:message", {
										message: "inputTooLong",
										args: {
											maximum: this.maximumInputLength,
											input: e.term,
											params: e
										}
									}) : void t.call(this, e, n)
								}, t
							})), e.define("select2/data/maximumSelectionLength", [], (function() {
								function t(t, e, n) {
									this.maximumSelectionLength = n.get("maximumSelectionLength"), t.call(this, e, n)
								}
								return t.prototype.query = function(t, e, n) {
									var o = this;
									this.current((function(i) {
										var r = null != i ? i.length : 0;
										return o.maximumSelectionLength > 0 && r >= o.maximumSelectionLength ? void o.trigger("results:message", {
											message: "maximumSelected",
											args: {
												maximum: o.maximumSelectionLength
											}
										}) : void t.call(o, e, n)
									}))
								}, t
							})), e.define("select2/dropdown", ["jquery", "./utils"], (function(t, e) {
								function n(t, e) {
									this.$element = t, this.options = e, n.__super__.constructor.call(this)
								}
								return e.Extend(n, e.Observable), n.prototype.render = function() {
									var e = t('<span class="select2-dropdown"><span class="select2-results"></span></span>');
									return e.attr("dir", this.options.get("dir")), this.$dropdown = e, e
								}, n.prototype.bind = function() {}, n.prototype.position = function(t, e) {}, n.prototype.destroy = function() {
									this.$dropdown.remove()
								}, n
							})), e.define("select2/dropdown/search", ["jquery", "../utils"], (function(t, e) {
								function n() {}
								return n.prototype.render = function(e) {
									var n = e.call(this),
										o = t('<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" /></span>');
									return this.$searchContainer = o, this.$search = o.find("input"), n.prepend(o), n
								}, n.prototype.bind = function(e, n, o) {
									var i = this;
									e.call(this, n, o), this.$search.on("keydown", (function(t) {
										i.trigger("keypress", t), i._keyUpPrevented = t.isDefaultPrevented()
									})), this.$search.on("input", (function(e) {
										t(this).off("keyup")
									})), this.$search.on("keyup input", (function(t) {
										i.handleSearch(t)
									})), n.on("open", (function() {
										i.$search.attr("tabindex", 0), i.$search.focus(), window.setTimeout((function() {
											i.$search.focus()
										}), 0)
									})), n.on("close", (function() {
										i.$search.attr("tabindex", -1), i.$search.val("")
									})), n.on("focus", (function() {
										n.isOpen() && i.$search.focus()
									})), n.on("results:all", (function(t) {
										null != t.query.term && "" !== t.query.term || (i.showSearch(t) ? i.$searchContainer.removeClass("select2-search--hide") : i.$searchContainer.addClass("select2-search--hide"))
									}))
								}, n.prototype.handleSearch = function(t) {
									if (!this._keyUpPrevented) {
										var e = this.$search.val();
										this.trigger("query", {
											term: e
										})
									}
									this._keyUpPrevented = !1
								}, n.prototype.showSearch = function(t, e) {
									return !0
								}, n
							})), e.define("select2/dropdown/hidePlaceholder", [], (function() {
								function t(t, e, n, o) {
									this.placeholder = this.normalizePlaceholder(n.get("placeholder")), t.call(this, e, n, o)
								}
								return t.prototype.append = function(t, e) {
									e.results = this.removePlaceholder(e.results), t.call(this, e)
								}, t.prototype.normalizePlaceholder = function(t, e) {
									return "string" == typeof e && (e = {
										id: "",
										text: e
									}), e
								}, t.prototype.removePlaceholder = function(t, e) {
									for (var n = e.slice(0), o = e.length - 1; o >= 0; o--) {
										var i = e[o];
										this.placeholder.id === i.id && n.splice(o, 1)
									}
									return n
								}, t
							})), e.define("select2/dropdown/infiniteScroll", ["jquery"], (function(t) {
								function e(t, e, n, o) {
									this.lastParams = {}, t.call(this, e, n, o), this.$loadingMore = this.createLoadingMore(), this.loading = !1
								}
								return e.prototype.append = function(t, e) {
									this.$loadingMore.remove(), this.loading = !1, t.call(this, e), this.showLoadingMore(e) && this.$results.append(this.$loadingMore)
								}, e.prototype.bind = function(e, n, o) {
									var i = this;
									e.call(this, n, o), n.on("query", (function(t) {
										i.lastParams = t, i.loading = !0
									})), n.on("query:append", (function(t) {
										i.lastParams = t, i.loading = !0
									})), this.$results.on("scroll", (function() {
										var e = t.contains(document.documentElement, i.$loadingMore[0]);
										!i.loading && e && i.$results.offset().top + i.$results.outerHeight(!1) + 50 >= i.$loadingMore.offset().top + i.$loadingMore.outerHeight(!1) && i.loadMore()
									}))
								}, e.prototype.loadMore = function() {
									this.loading = !0;
									var e = t.extend({}, {
										page: 1
									}, this.lastParams);
									e.page++, this.trigger("query:append", e)
								}, e.prototype.showLoadingMore = function(t, e) {
									return e.pagination && e.pagination.more
								}, e.prototype.createLoadingMore = function() {
									var e = t('<li class="select2-results__option select2-results__option--load-more"role="treeitem" aria-disabled="true"></li>'),
										n = this.options.get("translations").get("loadingMore");
									return e.html(n(this.lastParams)), e
								}, e
							})), e.define("select2/dropdown/attachBody", ["jquery", "../utils"], (function(t, e) {
								function n(e, n, o) {
									this.$dropdownParent = o.get("dropdownParent") || t(document.body), e.call(this, n, o)
								}
								return n.prototype.bind = function(t, e, n) {
									var o = this,
										i = !1;
									t.call(this, e, n), e.on("open", (function() {
										o._showDropdown(), o._attachPositioningHandler(e), i || (i = !0, e.on("results:all", (function() {
											o._positionDropdown(), o._resizeDropdown()
										})), e.on("results:append", (function() {
											o._positionDropdown(), o._resizeDropdown()
										})))
									})), e.on("close", (function() {
										o._hideDropdown(), o._detachPositioningHandler(e)
									})), this.$dropdownContainer.on("mousedown", (function(t) {
										t.stopPropagation()
									}))
								}, n.prototype.destroy = function(t) {
									t.call(this), this.$dropdownContainer.remove()
								}, n.prototype.position = function(t, e, n) {
									e.attr("class", n.attr("class")), e.removeClass("select2"), e.addClass("select2-container--open"), e.css({
										position: "absolute",
										top: -999999
									}), this.$container = n
								}, n.prototype.render = function(e) {
									var n = t("<span></span>"),
										o = e.call(this);
									return n.append(o), this.$dropdownContainer = n, n
								}, n.prototype._hideDropdown = function(t) {
									this.$dropdownContainer.detach()
								}, n.prototype._attachPositioningHandler = function(n, o) {
									var i = this,
										r = "scroll.select2." + o.id,
										s = "resize.select2." + o.id,
										a = "orientationchange.select2." + o.id,
										l = this.$container.parents().filter(e.hasScroll);
									l.each((function() {
										t(this).data("select2-scroll-position", {
											x: t(this).scrollLeft(),
											y: t(this).scrollTop()
										})
									})), l.on(r, (function(e) {
										var n = t(this).data("select2-scroll-position");
										t(this).scrollTop(n.y)
									})), t(window).on(r + " " + s + " " + a, (function(t) {
										i._positionDropdown(), i._resizeDropdown()
									}))
								}, n.prototype._detachPositioningHandler = function(n, o) {
									var i = "scroll.select2." + o.id,
										r = "resize.select2." + o.id,
										s = "orientationchange.select2." + o.id;
									this.$container.parents().filter(e.hasScroll).off(i), t(window).off(i + " " + r + " " + s)
								}, n.prototype._positionDropdown = function() {
									var e = t(window),
										n = this.$dropdown.hasClass("select2-dropdown--above"),
										o = this.$dropdown.hasClass("select2-dropdown--below"),
										i = null,
										r = this.$container.offset();
									r.bottom = r.top + this.$container.outerHeight(!1);
									var s = {
										height: this.$container.outerHeight(!1)
									};
									s.top = r.top, s.bottom = r.top + s.height;
									var a = this.$dropdown.outerHeight(!1),
										l = e.scrollTop(),
										c = e.scrollTop() + e.height(),
										u = l < r.top - a,
										d = c > r.bottom + a,
										p = {
											left: r.left,
											top: s.bottom
										},
										h = this.$dropdownParent;
									"static" === h.css("position") && (h = h.offsetParent());
									var f = h.offset();
									p.top -= f.top, p.left -= f.left, n || o || (i = "below"), d || !u || n ? !u && d && n && (i = "below") : i = "above", ("above" == i || n && "below" !== i) && (p.top = s.top - f.top - a), null != i && (this.$dropdown.removeClass("select2-dropdown--below select2-dropdown--above").addClass("select2-dropdown--" + i), this.$container.removeClass("select2-container--below select2-container--above").addClass("select2-container--" + i)), this.$dropdownContainer.css(p)
								}, n.prototype._resizeDropdown = function() {
									var t = {
										width: this.$container.outerWidth(!1) + "px"
									};
									this.options.get("dropdownAutoWidth") && (t.minWidth = t.width, t.position = "relative", t.width = "auto"), this.$dropdown.css(t)
								}, n.prototype._showDropdown = function(t) {
									this.$dropdownContainer.appendTo(this.$dropdownParent), this._positionDropdown(), this._resizeDropdown()
								}, n
							})), e.define("select2/dropdown/minimumResultsForSearch", [], (function() {
								function t(t, e, n, o) {
									this.minimumResultsForSearch = n.get("minimumResultsForSearch"), this.minimumResultsForSearch < 0 && (this.minimumResultsForSearch = 1 / 0), t.call(this, e, n, o)
								}
								return t.prototype.showSearch = function(t, e) {
									return !(function t(e) {
										for (var n = 0, o = 0; o < e.length; o++) {
											var i = e[o];
											i.children ? n += t(i.children) : n++
										}
										return n
									}(e.data.results) < this.minimumResultsForSearch) && t.call(this, e)
								}, t
							})), e.define("select2/dropdown/selectOnClose", [], (function() {
								function t() {}
								return t.prototype.bind = function(t, e, n) {
									var o = this;
									t.call(this, e, n), e.on("close", (function(t) {
										o._handleSelectOnClose(t)
									}))
								}, t.prototype._handleSelectOnClose = function(t, e) {
									if (e && null != e.originalSelect2Event) {
										var n = e.originalSelect2Event;
										if ("select" === n._type || "unselect" === n._type) return
									}
									var o = this.getHighlightedResults();
									if (!(o.length < 1)) {
										var i = o.data("data");
										null != i.element && i.element.selected || null == i.element && i.selected || this.trigger("select", {
											data: i
										})
									}
								}, t
							})), e.define("select2/dropdown/closeOnSelect", [], (function() {
								function t() {}
								return t.prototype.bind = function(t, e, n) {
									var o = this;
									t.call(this, e, n), e.on("select", (function(t) {
										o._selectTriggered(t)
									})), e.on("unselect", (function(t) {
										o._selectTriggered(t)
									}))
								}, t.prototype._selectTriggered = function(t, e) {
									var n = e.originalEvent;
									n && n.ctrlKey || this.trigger("close", {
										originalEvent: n,
										originalSelect2Event: e
									})
								}, t
							})), e.define("select2/i18n/en", [], (function() {
								return {
									errorLoading: function() {
										return "The results could not be loaded."
									},
									inputTooLong: function(t) {
										var e = t.input.length - t.maximum,
											n = "Please delete " + e + " character";
										return 1 != e && (n += "s"), n
									},
									inputTooShort: function(t) {
										return "Please enter " + (t.minimum - t.input.length) + " or more characters"
									},
									loadingMore: function() {
										return "Loading more results…"
									},
									maximumSelected: function(t) {
										var e = "You can only select " + t.maximum + " item";
										return 1 != t.maximum && (e += "s"), e
									},
									noResults: function() {
										return "No results found"
									},
									searching: function() {
										return "Searching…"
									}
								}
							})), e.define("select2/defaults", ["jquery", "require", "./results", "./selection/single", "./selection/multiple", "./selection/placeholder", "./selection/allowClear", "./selection/search", "./selection/eventRelay", "./utils", "./translation", "./diacritics", "./data/select", "./data/array", "./data/ajax", "./data/tags", "./data/tokenizer", "./data/minimumInputLength", "./data/maximumInputLength", "./data/maximumSelectionLength", "./dropdown", "./dropdown/search", "./dropdown/hidePlaceholder", "./dropdown/infiniteScroll", "./dropdown/attachBody", "./dropdown/minimumResultsForSearch", "./dropdown/selectOnClose", "./dropdown/closeOnSelect", "./i18n/en"], (function(t, e, n, o, i, r, s, a, l, c, u, d, p, h, f, g, m, v, y, b, _, w, C, S, T, E, A, x, L) {
								function B() {
									this.reset()
								}
								return B.prototype.apply = function(d) {
									if (null == (d = t.extend(!0, {}, this.defaults, d)).dataAdapter) {
										if (null != d.ajax ? d.dataAdapter = f : null != d.data ? d.dataAdapter = h : d.dataAdapter = p, d.minimumInputLength > 0 && (d.dataAdapter = c.Decorate(d.dataAdapter, v)), d.maximumInputLength > 0 && (d.dataAdapter = c.Decorate(d.dataAdapter, y)), d.maximumSelectionLength > 0 && (d.dataAdapter = c.Decorate(d.dataAdapter, b)), d.tags && (d.dataAdapter = c.Decorate(d.dataAdapter, g)), (null != d.tokenSeparators || null != d.tokenizer) && (d.dataAdapter = c.Decorate(d.dataAdapter, m)), null != d.query) {
											var L = e(d.amdBase + "compat/query");
											d.dataAdapter = c.Decorate(d.dataAdapter, L)
										}
										if (null != d.initSelection) {
											var B = e(d.amdBase + "compat/initSelection");
											d.dataAdapter = c.Decorate(d.dataAdapter, B)
										}
									}
									if (null == d.resultsAdapter && (d.resultsAdapter = n, null != d.ajax && (d.resultsAdapter = c.Decorate(d.resultsAdapter, S)), null != d.placeholder && (d.resultsAdapter = c.Decorate(d.resultsAdapter, C)), d.selectOnClose && (d.resultsAdapter = c.Decorate(d.resultsAdapter, A))), null == d.dropdownAdapter) {
										if (d.multiple) d.dropdownAdapter = _;
										else {
											var O = c.Decorate(_, w);
											d.dropdownAdapter = O
										}
										if (0 !== d.minimumResultsForSearch && (d.dropdownAdapter = c.Decorate(d.dropdownAdapter, E)), d.closeOnSelect && (d.dropdownAdapter = c.Decorate(d.dropdownAdapter, x)), null != d.dropdownCssClass || null != d.dropdownCss || null != d.adaptDropdownCssClass) {
											var M = e(d.amdBase + "compat/dropdownCss");
											d.dropdownAdapter = c.Decorate(d.dropdownAdapter, M)
										}
										d.dropdownAdapter = c.Decorate(d.dropdownAdapter, T)
									}
									if (null == d.selectionAdapter) {
										if (d.multiple ? d.selectionAdapter = i : d.selectionAdapter = o, null != d.placeholder && (d.selectionAdapter = c.Decorate(d.selectionAdapter, r)), d.allowClear && (d.selectionAdapter = c.Decorate(d.selectionAdapter, s)), d.multiple && (d.selectionAdapter = c.Decorate(d.selectionAdapter, a)), null != d.containerCssClass || null != d.containerCss || null != d.adaptContainerCssClass) {
											var $ = e(d.amdBase + "compat/containerCss");
											d.selectionAdapter = c.Decorate(d.selectionAdapter, $)
										}
										d.selectionAdapter = c.Decorate(d.selectionAdapter, l)
									}
									if ("string" == typeof d.language)
										if (d.language.indexOf("-") > 0) {
											var I = d.language.split("-")[0];
											d.language = [d.language, I]
										} else d.language = [d.language];
									if (t.isArray(d.language)) {
										var k = new u;
										d.language.push("en");
										for (var P = d.language, H = 0; H < P.length; H++) {
											var D = P[H],
												N = {};
											try {
												N = u.loadPath(D)
											} catch (t) {
												try {
													D = this.defaults.amdLanguageBase + D, N = u.loadPath(D)
												} catch (t) {
													d.debug && window.console && console.warn && console.warn('Select2: The language file for "' + D + '" could not be automatically loaded. A fallback will be used instead.');
													continue
												}
											}
											k.extend(N)
										}
										d.translations = k
									} else {
										var q = u.loadPath(this.defaults.amdLanguageBase + "en"),
											z = new u(d.language);
										z.extend(q), d.translations = z
									}
									return d
								}, B.prototype.reset = function() {
									function e(t) {
										return t.replace(/[^\u0000-\u007E]/g, (function(t) {
											return d[t] || t
										}))
									}
									this.defaults = {
										amdBase: "./",
										amdLanguageBase: "./i18n/",
										closeOnSelect: !0,
										debug: !1,
										dropdownAutoWidth: !1,
										escapeMarkup: c.escapeMarkup,
										language: L,
										matcher: function n(o, i) {
											if ("" === t.trim(o.term)) return i;
											if (i.children && i.children.length > 0) {
												for (var r = t.extend(!0, {}, i), s = i.children.length - 1; s >= 0; s--) null == n(o, i.children[s]) && r.children.splice(s, 1);
												return r.children.length > 0 ? r : n(o, r)
											}
											var a = e(i.text).toUpperCase(),
												l = e(o.term).toUpperCase();
											return a.indexOf(l) > -1 ? i : null
										},
										minimumInputLength: 0,
										maximumInputLength: 0,
										maximumSelectionLength: 0,
										minimumResultsForSearch: 0,
										selectOnClose: !1,
										sorter: function(t) {
											return t
										},
										templateResult: function(t) {
											return t.text
										},
										templateSelection: function(t) {
											return t.text
										},
										theme: "default",
										width: "resolve"
									}
								}, B.prototype.set = function(e, n) {
									var o = {};
									o[t.camelCase(e)] = n;
									var i = c._convertData(o);
									t.extend(this.defaults, i)
								}, new B
							})), e.define("select2/options", ["require", "jquery", "./defaults", "./utils"], (function(t, e, n, o) {
								function i(e, i) {
									if (this.options = e, null != i && this.fromElement(i), this.options = n.apply(this.options), i && i.is("input")) {
										var r = t(this.get("amdBase") + "compat/inputData");
										this.options.dataAdapter = o.Decorate(this.options.dataAdapter, r)
									}
								}
								return i.prototype.fromElement = function(t) {
									var n, i = ["select2"];
									null == this.options.multiple && (this.options.multiple = t.prop("multiple")), null == this.options.disabled && (this.options.disabled = t.prop("disabled")), null == this.options.language && (t.prop("lang") ? this.options.language = t.prop("lang").toLowerCase() : t.closest("[lang]").prop("lang") && (this.options.language = t.closest("[lang]").prop("lang"))), null == this.options.dir && (t.prop("dir") ? this.options.dir = t.prop("dir") : t.closest("[dir]").prop("dir") ? this.options.dir = t.closest("[dir]").prop("dir") : this.options.dir = "ltr"), t.prop("disabled", this.options.disabled), t.prop("multiple", this.options.multiple), t.data("select2Tags") && (this.options.debug && window.console && console.warn && console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'), t.data("data", t.data("select2Tags")), t.data("tags", !0)), t.data("ajaxUrl") && (this.options.debug && window.console && console.warn && console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."), t.attr("ajax--url", t.data("ajaxUrl")), t.data("ajax--url", t.data("ajaxUrl"))), n = e.fn.jquery && "1." == e.fn.jquery.substr(0, 2) && t[0].dataset ? e.extend(!0, {}, t[0].dataset, t.data()) : t.data();
									var r = e.extend(!0, {}, n);
									for (var s in r = o._convertData(r)) e.inArray(s, i) > -1 || (e.isPlainObject(this.options[s]) ? e.extend(this.options[s], r[s]) : this.options[s] = r[s]);
									return this
								}, i.prototype.get = function(t) {
									return this.options[t]
								}, i.prototype.set = function(t, e) {
									this.options[t] = e
								}, i
							})), e.define("select2/core", ["jquery", "./options", "./utils", "./keys"], (function(t, e, n, o) {
								var i = function t(n, o) {
									null != n.data("select2") && n.data("select2").destroy(), this.$element = n, this.id = this._generateId(n), o = o || {}, this.options = new e(o, n), t.__super__.constructor.call(this);
									var i = n.attr("tabindex") || 0;
									n.data("old-tabindex", i), n.attr("tabindex", "-1");
									var r = this.options.get("dataAdapter");
									this.dataAdapter = new r(n, this.options);
									var s = this.render();
									this._placeContainer(s);
									var a = this.options.get("selectionAdapter");
									this.selection = new a(n, this.options), this.$selection = this.selection.render(), this.selection.position(this.$selection, s);
									var l = this.options.get("dropdownAdapter");
									this.dropdown = new l(n, this.options), this.$dropdown = this.dropdown.render(), this.dropdown.position(this.$dropdown, s);
									var c = this.options.get("resultsAdapter");
									this.results = new c(n, this.options, this.dataAdapter), this.$results = this.results.render(), this.results.position(this.$results, this.$dropdown);
									var u = this;
									this._bindAdapters(), this._registerDomEvents(), this._registerDataEvents(), this._registerSelectionEvents(), this._registerDropdownEvents(), this._registerResultsEvents(), this._registerEvents(), this.dataAdapter.current((function(t) {
										u.trigger("selection:update", {
											data: t
										})
									})), n.addClass("select2-hidden-accessible"), n.attr("aria-hidden", "true"), this._syncAttributes(), n.data("select2", this)
								};
								return n.Extend(i, n.Observable), i.prototype._generateId = function(t) {
									return "select2-" + (null != t.attr("id") ? t.attr("id") : null != t.attr("name") ? t.attr("name") + "-" + n.generateChars(2) : n.generateChars(4)).replace(/(:|\.|\[|\]|,)/g, "")
								}, i.prototype._placeContainer = function(t) {
									t.insertAfter(this.$element);
									var e = this._resolveWidth(this.$element, this.options.get("width"));
									null != e && t.css("width", e)
								}, i.prototype._resolveWidth = function(t, e) {
									var n = /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;
									if ("resolve" == e) {
										var o = this._resolveWidth(t, "style");
										return null != o ? o : this._resolveWidth(t, "element")
									}
									if ("element" == e) {
										var i = t.outerWidth(!1);
										return 0 >= i ? "auto" : i + "px"
									}
									if ("style" == e) {
										var r = t.attr("style");
										if ("string" != typeof r) return null;
										for (var s = r.split(";"), a = 0, l = s.length; l > a; a += 1) {
											var c = s[a].replace(/\s/g, "").match(n);
											if (null !== c && c.length >= 1) return c[1]
										}
										return null
									}
									return e
								}, i.prototype._bindAdapters = function() {
									this.dataAdapter.bind(this, this.$container), this.selection.bind(this, this.$container), this.dropdown.bind(this, this.$container), this.results.bind(this, this.$container)
								}, i.prototype._registerDomEvents = function() {
									var e = this;
									this.$element.on("change.select2", (function() {
										e.dataAdapter.current((function(t) {
											e.trigger("selection:update", {
												data: t
											})
										}))
									})), this.$element.on("focus.select2", (function(t) {
										e.trigger("focus", t)
									})), this._syncA = n.bind(this._syncAttributes, this), this._syncS = n.bind(this._syncSubtree, this), this.$element[0].attachEvent && this.$element[0].attachEvent("onpropertychange", this._syncA);
									var o = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
									null != o ? (this._observer = new o((function(n) {
										t.each(n, e._syncA), t.each(n, e._syncS)
									})), this._observer.observe(this.$element[0], {
										attributes: !0,
										childList: !0,
										subtree: !1
									})) : this.$element[0].addEventListener && (this.$element[0].addEventListener("DOMAttrModified", e._syncA, !1), this.$element[0].addEventListener("DOMNodeInserted", e._syncS, !1), this.$element[0].addEventListener("DOMNodeRemoved", e._syncS, !1))
								}, i.prototype._registerDataEvents = function() {
									var t = this;
									this.dataAdapter.on("*", (function(e, n) {
										t.trigger(e, n)
									}))
								}, i.prototype._registerSelectionEvents = function() {
									var e = this,
										n = ["toggle", "focus"];
									this.selection.on("toggle", (function() {
										e.toggleDropdown()
									})), this.selection.on("focus", (function(t) {
										e.focus(t)
									})), this.selection.on("*", (function(o, i) {
										-1 === t.inArray(o, n) && e.trigger(o, i)
									}))
								}, i.prototype._registerDropdownEvents = function() {
									var t = this;
									this.dropdown.on("*", (function(e, n) {
										t.trigger(e, n)
									}))
								}, i.prototype._registerResultsEvents = function() {
									var t = this;
									this.results.on("*", (function(e, n) {
										t.trigger(e, n)
									}))
								}, i.prototype._registerEvents = function() {
									var t = this;
									this.on("open", (function() {
										t.$container.addClass("select2-container--open")
									})), this.on("close", (function() {
										t.$container.removeClass("select2-container--open")
									})), this.on("enable", (function() {
										t.$container.removeClass("select2-container--disabled")
									})), this.on("disable", (function() {
										t.$container.addClass("select2-container--disabled")
									})), this.on("blur", (function() {
										t.$container.removeClass("select2-container--focus")
									})), this.on("query", (function(e) {
										t.isOpen() || t.trigger("open", {}), this.dataAdapter.query(e, (function(n) {
											t.trigger("results:all", {
												data: n,
												query: e
											})
										}))
									})), this.on("query:append", (function(e) {
										this.dataAdapter.query(e, (function(n) {
											t.trigger("results:append", {
												data: n,
												query: e
											})
										}))
									})), this.on("keypress", (function(e) {
										var n = e.which;
										t.isOpen() ? n === o.ESC || n === o.TAB || n === o.UP && e.altKey ? (t.close(), e.preventDefault()) : n === o.ENTER ? (t.trigger("results:select", {}), e.preventDefault()) : n === o.SPACE && e.ctrlKey ? (t.trigger("results:toggle", {}), e.preventDefault()) : n === o.UP ? (t.trigger("results:previous", {}), e.preventDefault()) : n === o.DOWN && (t.trigger("results:next", {}), e.preventDefault()) : (n === o.ENTER || n === o.SPACE || n === o.DOWN && e.altKey) && (t.open(), e.preventDefault())
									}))
								}, i.prototype._syncAttributes = function() {
									this.options.set("disabled", this.$element.prop("disabled")), this.options.get("disabled") ? (this.isOpen() && this.close(), this.trigger("disable", {})) : this.trigger("enable", {})
								}, i.prototype._syncSubtree = function(t, e) {
									var n = !1,
										o = this;
									if (!t || !t.target || "OPTION" === t.target.nodeName || "OPTGROUP" === t.target.nodeName) {
										if (e)
											if (e.addedNodes && e.addedNodes.length > 0)
												for (var i = 0; i < e.addedNodes.length; i++) e.addedNodes[i].selected && (n = !0);
											else e.removedNodes && e.removedNodes.length > 0 && (n = !0);
										else n = !0;
										n && this.dataAdapter.current((function(t) {
											o.trigger("selection:update", {
												data: t
											})
										}))
									}
								}, i.prototype.trigger = function(t, e) {
									var n = i.__super__.trigger,
										o = {
											open: "opening",
											close: "closing",
											select: "selecting",
											unselect: "unselecting"
										};
									if (void 0 === e && (e = {}), t in o) {
										var r = o[t],
											s = {
												prevented: !1,
												name: t,
												args: e
											};
										if (n.call(this, r, s), s.prevented) return void(e.prevented = !0)
									}
									n.call(this, t, e)
								}, i.prototype.toggleDropdown = function() {
									this.options.get("disabled") || (this.isOpen() ? this.close() : this.open())
								}, i.prototype.open = function() {
									this.isOpen() || this.trigger("query", {})
								}, i.prototype.close = function() {
									this.isOpen() && this.trigger("close", {})
								}, i.prototype.isOpen = function() {
									return this.$container.hasClass("select2-container--open")
								}, i.prototype.hasFocus = function() {
									return this.$container.hasClass("select2-container--focus")
								}, i.prototype.focus = function(t) {
									this.hasFocus() || (this.$container.addClass("select2-container--focus"), this.trigger("focus", {}))
								}, i.prototype.enable = function(t) {
									this.options.get("debug") && window.console && console.warn && console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'), (null == t || 0 === t.length) && (t = [!0]);
									var e = !t[0];
									this.$element.prop("disabled", e)
								}, i.prototype.data = function() {
									this.options.get("debug") && arguments.length > 0 && window.console && console.warn && console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');
									var t = [];
									return this.dataAdapter.current((function(e) {
										t = e
									})), t
								}, i.prototype.val = function(e) {
									if (this.options.get("debug") && window.console && console.warn && console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'), null == e || 0 === e.length) return this.$element.val();
									var n = e[0];
									t.isArray(n) && (n = t.map(n, (function(t) {
										return t.toString()
									}))), this.$element.val(n).trigger("change")
								}, i.prototype.destroy = function() {
									this.$container.remove(), this.$element[0].detachEvent && this.$element[0].detachEvent("onpropertychange", this._syncA), null != this._observer ? (this._observer.disconnect(), this._observer = null) : this.$element[0].removeEventListener && (this.$element[0].removeEventListener("DOMAttrModified", this._syncA, !1), this.$element[0].removeEventListener("DOMNodeInserted", this._syncS, !1), this.$element[0].removeEventListener("DOMNodeRemoved", this._syncS, !1)), this._syncA = null, this._syncS = null, this.$element.off(".select2"), this.$element.attr("tabindex", this.$element.data("old-tabindex")), this.$element.removeClass("select2-hidden-accessible"), this.$element.attr("aria-hidden", "false"), this.$element.removeData("select2"), this.dataAdapter.destroy(), this.selection.destroy(), this.dropdown.destroy(), this.results.destroy(), this.dataAdapter = null, this.selection = null, this.dropdown = null, this.results = null
								}, i.prototype.render = function() {
									var e = t('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');
									return e.attr("dir", this.options.get("dir")), this.$container = e, this.$container.addClass("select2-container--" + this.options.get("theme")), e.data("element", this.$element), e
								}, i
							})), e.define("jquery-mousewheel", ["jquery"], (function(t) {
								return t
							})), e.define("jquery.select2", ["jquery", "jquery-mousewheel", "./select2/core", "./select2/defaults"], (function(t, e, n, o) {
								if (null == t.fn.select2) {
									var i = ["open", "close", "destroy"];
									t.fn.select2 = function(e) {
										if ("object" == s(e = e || {})) return this.each((function() {
											var o = t.extend(!0, {}, e);
											new n(t(this), o)
										})), this;
										if ("string" == typeof e) {
											var o, r = Array.prototype.slice.call(arguments, 1);
											return this.each((function() {
												var n = t(this).data("select2");
												null == n && window.console && console.error && console.error("The select2('" + e + "') method was called on an element that is not using Select2."), o = n[e].apply(n, r)
											})), t.inArray(e, i) > -1 ? this : o
										}
										throw new Error("Invalid arguments for Select2: " + e)
									}
								}
								return null == t.fn.select2.defaults && (t.fn.select2.defaults = o), n
							})), {
								define: e.define,
								require: e.require
							}
						}(),
						n = e.require("jquery.select2");
					return t.fn.select2.amd = e, n
				}) ? o.apply(e, i) : o) || (t.exports = r), $.ui && $.ui.dialog && $.ui.dialog.prototype._allowInteraction) {
				var a = $.ui.dialog.prototype._allowInteraction;
				$.ui.dialog.prototype._allowInteraction = function(t) {
					return !!$(t.target).closest(".select2-dropdown").length || a.apply(this, arguments)
				}
			}
		},
		r1td: function(t, e) {
			var n;
			! function(t) {
				! function(t) {
					var e = function() {
						function t(t, e, n) {
							this.IS_VISIBLE_CLASS = "is-visible", this.bannerSelector = t || ".js_subscribe_banner", this.bannerCloseSelector = e || ".js_subscribe_banner_close", this.bannerType = n, this.bannerElement = document.querySelector(this.bannerSelector), this.bannerElement && (this.bannerCloseElement = this.bannerElement.querySelector(this.bannerCloseSelector), this.handleScroll = this.handleScroll.bind(this), this.handleCloseBtnClick = this.handleCloseBtnClick.bind(this), this.handleSubscriptionForm = this.handleSubscriptionForm.bind(this), this.init())
						}
						return t.prototype.init = function() {
							document.addEventListener("scroll", this.handleScroll), this.bannerCloseElement.addEventListener("click", this.handleCloseBtnClick), document.addEventListener("SUBSCRIPTION_FORM_SUBMIT", this.handleSubscriptionForm)
						}, t.prototype.handleCloseBtnClick = function() {
							this.bannerElement.classList.remove(this.IS_VISIBLE_CLASS), this.bannerType && this.bannerType.length > 0 && t.triggerEvent(this.bannerType + ".Closed")
						}, t.prototype.handleScroll = function() {
							window.pageYOffset > t.getScrollHeightToShow() && (this.bannerElement.classList.add(this.IS_VISIBLE_CLASS), document.removeEventListener("scroll", this.handleScroll), this.bannerType && this.bannerType.length > 0 && t.triggerEvent(this.bannerType + ".Showed"), t.triggerEvent(t.BLOG_BANNER_SHOWED_EVENT))
						}, t.prototype.handleSubscriptionForm = function(t) {
							if (!t.detail.submitEvent.target.classList.contains("js_blog_subscription_email_form_bottom")) {
								var e = t.detail.data,
									n = document.querySelector(".js_blog_subscription_email_vertical_form_container");
								e.result ? (document.querySelector(".js_blog_subscription_email_vertical_success_block").innerHTML = e.content, n.innerHTML = "") : n.innerHTML = e.content
							}
						}, t.getScrollHeightToShow = function() {
							return .4 * Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight)
						}, t.triggerEvent = function(t) {
							document.dispatchEvent(new Event(t))
						}, t.BLOG_BANNER_SHOWED_EVENT = "BLOG_SUBSCRIPTION_BANNER_SHOWED", t
					}();
					t.Core = e
				}(t.SlideInBanner || (t.SlideInBanner = {}))
			}(n || (n = {})), void 0 === window.Widget && (window.Widget = n), window.Widget.SlideInBanner = n.SlideInBanner
		},
		"x/J2": function(t, e) {
			var n, o, i, r, s, a, l = (n = document.querySelector(".js_footer_links"), o = document.querySelector(".js_footer_links_list"), i = document.querySelector(".js_footer_links_inner"), r = document.querySelector(".js_footer_links_open_btn"), s = window.navigator.userAgent, a = function() {
				return o ? o.clientHeight : 0
			}, {
				init: function() {
					n && window.innerWidth < 768 && (setTimeout((function() {
						i.classList.add("is-closed"), r.classList.remove("is-hidden")
					}), 500), r.addEventListener("click", (function() {
						s.match(/iPhone/i) ? i.style.height = "auto" : i.style.height = a() + "px", this.classList.add("is-hidden"), i.classList.remove("is-closed")
					})))
				}
			});
			document.addEventListener("deferred_scripts_loaded", (function() {
				l.init()
			}))
		},
		xeH2: function(t, e) {
			t.exports = jquery
		}
	},
	[
		["Napf", "runtime"]
	]
]);
