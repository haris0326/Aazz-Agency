(window.webpackJsonp = window.webpackJsonp || []).push([
	["js/Template/webpack_common_top_scripts"], {
		"1vW9": function(e, t) {
			var n, i, r, o, s, a, u = (n = function(e) {
					e = e[2] ? [e[1], e[2]] : [navigator.appName, navigator.appVersion, "-?"];
					var t = navigator.userAgent.match(/version\/([\d|\.]*)/i);
					return null !== t && e.splice(1, 1, t[1]), e.join(" ")
				}, {
					detectBrowser: function() {
						return (t = navigator.userAgent.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*([\d|\.]*)/i) || [], /trident/i.test(t[1]) ? "IE " + ((e = /\brv[ :]+(\d+)/g.exec(navigator.userAgent) || [])[1] || "") : "Chrome" === t[1] && null !== (e = navigator.userAgent.match(/\b(OPR|Edge)\/(\d+)/)) ? e.slice(1).join(" ").replace("OPR", "Opera") : n(t)).split(" ");
						var e, t
					},
					compareBrowserVersion: function(e, t) {
						for (var n = e.split("."), i = t.split("."), r = 0, o = n.length; r < o && void 0 !== i[r]; r++) {
							var s = parseInt(n[r]),
								a = parseInt(i[r]);
							if (s > a) return 1;
							if (s < a) return -1
						}
						return 0
					}
				}),
				c = (i = window.performance && 2 === window.performance.navigation.type, r = u.detectBrowser(), o = "Safari" === r[0] && -1 === u.compareBrowserVersion(r[1], "9.1.3"), s = "function" == typeof history.pushState && !o, a = function(e) {
					if ("function" != typeof e) throw new Error("Callback have to be function");
					return !0
				}, {
					initBeforeChange: function(e) {
						a(e) && s && function(e) {
							history.pushState("state", null, null), window.onpopstate = function() {
								sessionStorage.getItem("IOS_FIX_SESSION_STORAGE_ITEM_KEY") || (history.pushState("new_state", null, null), e()), sessionStorage.getItem("IOS_FIX_SESSION_STORAGE_ITEM_KEY") && sessionStorage.removeItem("IOS_FIX_SESSION_STORAGE_ITEM_KEY")
							}
						}(e)
					},
					initAfterChange: function(e) {
						a(e) && i && e()
					}
				});
			window.BrowserNavigationButtonHandler = c, window.getLocation = function(e) {
				var t = document.createElement("a");
				return t.href = e, t
			}, window.filterPriceFormat = function(e, t, n) {
				var i = t + (e = parseFloat(e).toFixed(2));
				return n ? i + " " + n : i
			}, window.one_time_location = function(e) {
				void 0 === $(this).attr("data-click") && (window.location = e), $(this).attr("data-click", 1)
			}, window.onpageshow = function(e) {
				e.persisted && window.location.reload()
			}
		},
		"6aMb": function(e, t) {
			window.OneSignalRun = function(e) {
				var t = {
					WAIT_TIMEOUT: 2e3,
					config: null,
					oneSignal: null,
					show_subscription_request_once: "show_subscription_request_once",
					init: function() {
						t.config = e, window.OneSignal && t.initOneSignal()
					},
					initOneSignal: function() {
						OneSignal.push(["init", {
							appId: t.config.app_id,
							safari_web_id: t.config.safari_web_id,
							autoRegister: !1,
							promptOptions: {
								actionMessage: t.config.prompt_action_message,
								acceptButtonText: t.config.accept_button_text,
								cancelButtonText: t.config.cancel_button_text,
								slidedown: {
									autoPrompt: !1
								},
								autoPrompt: !1,
								native: {
									enabled: !0,
									autoPrompt: !1
								}
							}
						}]), OneSignal.push((function() {
							OneSignal.on("subscriptionChange", (function(e) {
								e ? t.subscribeUser() : t.unsubscribeUser()
							}))
						})), t.config.show_subscription_request && OneSignal.push(["getNotificationPermission", function(e) {
							"granted" === e ? t.subscribeUser() : t.showSubscribePrompt()
						}])
					},
					subscribeUser: function() {
						window.OneSignal.getUserId((function(e) {
							e && $.get(t.config.url_subscribe, {
								user_web_push_id: e
							})
						}))
					},
					unsubscribeUser: function() {
						window.OneSignal.getUserId((function(e) {
							e && $.get(t.config.url_unsubscribe, {
								user_web_push_id: e
							})
						}))
					},
					showSubscribePrompt: function() {
						void 0 !== CookieEditor.get(t.show_subscription_request_once) || ($((function() {
							setTimeout((function() {
								t.config.showNativePrompt ? OneSignal.showNativePrompt() : OneSignal.showHttpPrompt()
							}), t.WAIT_TIMEOUT)
						})), CookieEditor.set(t.show_subscription_request_once, 1, 1))
					}
				};
				t.init()
			}
		},
		HctS: function(e, t) {
			var n;
			! function(e) {
				! function(e) {
					var t = function() {
						function e(t) {
							this.zopimOptions = {
								getZopimUrl: null,
								initiatorPagePath: null,
								initiatorPageRoute: null,
								initiatorPageQueryString: null,
								isInstantLoad: !1,
								orderId: null
							}, this.isInitStart = !1, this.isInitEnd = !1, this.callbacksQueue = [], this.offsetLoadTime = 3e3, this.zopimOptions.getZopimUrl = t.getZopimUrl, this.zopimOptions.initiatorPagePath = t.initiatorPagePath, this.zopimOptions.initiatorPageRoute = t.initiatorPageRoute, this.zopimOptions.initiatorPageQueryString = t.initiatorPageQueryString, this.zopimOptions.isInstantLoad = t.isInstantLoad, this.zopimOptions.orderId = t.orderId, $(document).on(e.EVENT_ZOPIM_INIT, this.onZopimInit.bind(this)), window.addEventListener("load", this.init.bind(this))
						}
						return e.prototype.init = function() {
							this.zopimOptions.isInstantLoad ? this.tryZopimInit() : setTimeout(this.tryZopimInit.bind(this), this.offsetLoadTime)
						}, e.prototype.executeCallbackOnZopimInit = function(e) {
							this.isInitEnd ? e() : this.callbacksQueue.push(e)
						}, e.prototype.triggerInitEvent = function() {
							$(document).trigger(e.EVENT_ZOPIM_INIT)
						}, e.prototype.forceInit = function() {
							this.tryZopimInit(!0)
						}, e.prototype.tryZopimInit = function(e) {
							void 0 === e && (e = !1), this.isInitStart && !e || (this.isInitStart = !0, $.ajax({
								url: this.zopimOptions.getZopimUrl,
								data: {
									initiator_page_path: this.zopimOptions.initiatorPagePath,
									initiator_page_route: this.zopimOptions.initiatorPageRoute,
									initiator_page_query_string: this.zopimOptions.initiatorPageQueryString,
									order_id: this.zopimOptions.orderId
								},
								method: "POST",
								dataType: "script"
							}))
						}, e.prototype.onZopimInit = function() {
							this.isInitEnd = !0, window.isIntercomNow ? "function" == typeof Intercom && this.runCallbacksFromQueue() : "function" == typeof zE && zE("webWidget:on", "chat:connected", this.runCallbacksFromQueue.bind(this))
						}, e.prototype.runCallbacksFromQueue = function() {
							for (var e = 0; e < this.callbacksQueue.length; e++) this.callbacksQueue[e]();
							this.callbacksQueue = []
						}, e.EVENT_ZOPIM_INIT = "event_zopim_init", e
					}();
					e.Core = t
				}(e.Loader || (e.Loader = {}))
			}(n || (n = {})), void 0 === window.Zopim && (window.Zopim = n), window.Zopim.Loader = n.Loader
		},
		YuTi: function(e, t) {
			e.exports = function(e) {
				return e.webpackPolyfill || (e.deprecate = function() {}, e.paths = [], e.children || (e.children = []), Object.defineProperty(e, "loaded", {
					enumerable: !0,
					get: function() {
						return e.l
					}
				}), Object.defineProperty(e, "id", {
					enumerable: !0,
					get: function() {
						return e.i
					}
				}), e.webpackPolyfill = 1), e
			}
		},
		eLCU: function(e, t) {
			function n(e) {
				return (n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
					return typeof e
				} : function(e) {
					return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
				})(e)
			}
			var i;
			! function(e) {
				var t = function() {
					function e(e) {
						this.measurementId = e, this.SET = "set", this.SEND = "send", this.EVENT = "event", window.gta = this.trackGtag.bind(this), window.gtag = this.gtagDecorator.bind(this)
					}
					return e.prototype.trackGtag = function(e, t, n, i, r, o) {
						switch (e) {
							case this.SET:
								this.handleSetCommand(t, n);
								break;
							case this.SEND:
								this.EVENT === t && this.handleEvent(n, i, r, o);
								break;
							case this.EVENT:
								this.handleGtagEvent(t, n)
						}
					}, e.prototype.gtagDecorator = function() {
						"event" === arguments[0] && (void 0 === arguments[2] && (arguments[2] = {}), arguments[2].send_to = this.measurementId), window.dataLayer.push(arguments)
					}, e.prototype.handleGtagEvent = function(e, t) {
						gtag(this.SET, e, t)
					}, e.prototype.handleSetCommand = function(e, t) {
						var i = {};
						"object" === n(e) ? i = e : i[e] = t, gtag(this.SET, i)
					}, e.prototype.handleEvent = function(e, t, n, i) {
						var r = {};
						i && (i.nonInteraction && (r.non_interaction = i.nonInteraction, delete i.nonInteraction), r.value = i), e && (r.event_category = e), n && (r.event_label = n), gtag(this.EVENT, t, r)
					}, e
				}();
				e.Core = t
			}(i || (i = {})), window.GoogleTrackingAdapter = i
		},
		g12X: function(e, t, n) {
			"use strict";
			n.r(t);
			var i = n("tDnx"),
				r = n.n(i);
			n("1vW9"), n("nNVC"), n("syHS"), n("6aMb"), n("eLCU"), n("HctS");
			window.$ = window.jQuery = window.jquery = r.a
		},
		nNVC: function(e, t) {
			var n = {
				get: function(e) {
					var t, n = document.cookie.split("; ");
					for (i in n)
						if (one_cookie = n[i].split("="), one_cookie[0] == e) {
							t = one_cookie[1];
							break
						} return t
				},
				set: function(e, t, n, i) {
					var r = "";
					if (n || i) {
						var o = new Date;
						null != i ? o.setTime(o.getTime() + 60 * i * 1e3) : o.setTime(o.getTime() + 24 * n * 60 * 60 * 1e3), r = "; expires=" + o.toGMTString()
					}
					document.cookie = e.toString() + "=" + t.toString() + r + "; path=/; samesite=lax"
				},
				del: function(e) {
					document.cookie = e.toString() + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/"
				}
			};
			window.CookieEditor = n
		},
		syHS: function(e, t) {
			var n;
			! function(e) {
				! function(e) {
					var t = function() {
						function e() {
							this.button = null, this.preloader = null, this.attached = !1, this.hideClasses = ["d-none-desktop-tablet", "d-none-mobile"], document.addEventListener("DOMContentLoaded", this.attachButtonClickEvent.bind(this))
						}
						return e.prototype.attachAndShow = function() {
							this.attachButtons() && (this.button.forEach(this.addClass.bind(this)), this.preloader.forEach(this.removeClass.bind(this)))
						}, e.prototype.attachAndHide = function() {
							this.attachButtons() && (this.preloader.forEach(this.addClass.bind(this)), this.button.forEach(this.removeClass.bind(this)))
						}, e.prototype.removeClass = function(e) {
							for (var t in this.hideClasses) e.classList.contains(this.hideClasses[t]) && e.classList.remove(this.hideClasses[t])
						}, e.prototype.attachButtons = function() {
							if (this.attached) return !0;
							var t = document.querySelectorAll(e.BUTTON_SELECTOR),
								n = document.querySelectorAll(e.PRELOADER_SELECTOR);
							return this.button = void 0 !== t ? t : null, this.preloader = void 0 !== n ? n : null, this.attached = !!(this.button && this.preloader && this.button.length && this.preloader.length), this.attached && this.button.length !== this.preloader.length && this.addPreloader(), this.attached
						}, e.prototype.addPreloader = function() {
							var t = this;
							this.button.forEach((function(e) {
								if (!t.isButtonHasPreloader(e)) {
									var n = t.createPreloaderElement();
									e.parentElement.append(n)
								}
							})), this.preloader = document.querySelectorAll(e.PRELOADER_SELECTOR)
						}, e.prototype.isButtonHasPreloader = function(t) {
							return null !== t.parentElement.querySelector(e.PRELOADER_SELECTOR)
						}, e.prototype.createPreloaderElement = function() {
							var e = document.createElement("div");
							return e.classList.add("site_loading", "js-pre-order-login-form-loader", "js_order_loading_img", "d-none-desktop-tablet", "d-none-mobile"), e
						}, e.prototype.addClass = function(e) {
							for (var t in this.hideClasses) e.classList.contains(this.hideClasses[t]) || e.classList.add(this.hideClasses[t])
						}, e.prototype.attachButtonClickEvent = function() {
							var t = this;
							document.querySelectorAll(e.BUTTON_SELECTOR).forEach((function(e) {
								e.addEventListener("click", (function(n) {
									n.preventDefault(), t.attachAndShow(), $(e).hasClass("js_pre_order_not_submit") || setTimeout((function() {
										e.closest("form").submit()
									}), 0)
								}))
							}))
						}, e.BUTTON_SELECTOR = "button.js_button_order.js_pre_order_login_form_button", e.PRELOADER_SELECTOR = "div.js-pre-order-login-form-loader", e
					}();
					e.Preloader = t
				}(e.RefreshCSRF || (e.RefreshCSRF = {}))
			}(n || (n = {})),
			function(e) {
				! function(e) {
					var t = function() {
						function t() {
							this.containerSelector = "input[data-js-token-id]", this.tokenFields = {}, this.callback = [], this.preloader = new e.Preloader, document.addEventListener("DOMContentLoaded", this.processLoad.bind(this))
						}
						return t.prototype.run = function() {
							this.preloader.attachAndShow();
							try {
								this.refresh()
							} catch (e) {
								this.preloader.attachAndHide()
							}
						}, t.prototype.addCallback = function(e) {
							return this.callback.push(e), this
						}, t.prototype.refresh = function() {
							var e = this.collectTokens();
							e.length && $.post("/refresh-csrf-token", {
								token_ids: e
							}, this.processResponse.bind(this))
						}, t.prototype.processLoad = function() {
							var e = this;
							BrowserNavigationButtonHandler.initAfterChange((function() {
								e.run()
							})), $(".star-rate-cool").length && this.run()
						}, t.prototype.collectTokens = function() {
							var e, t, n = this,
								i = [];
							return $(this.containerSelector).each((function(r, o) {
								e = $(o), t = e.attr("data-js-token-id"), void 0 === n.tokenFields[t] && (n.tokenFields[t] = []), i.push(t), n.tokenFields[t].push(e)
							})), i
						}, t.prototype.processResponse = function(e) {
							if (e) {
								var t = void 0;
								for (var n in e) void 0 !== (t = e[n]) && void 0 !== this.tokenFields[t.token_id] && this.tokenFields[t.token_id].shift().val(t.token_value)
							}
							this.processCallback(), this.wipeTokenFieldsList(), this.preloader.attachAndHide()
						}, t.prototype.processCallback = function() {
							for (var e in this.callback) this.callback[e]();
							this.wipeCallbackList()
						}, t.prototype.wipeTokenFieldsList = function() {
							this.tokenFields = {}
						}, t.prototype.wipeCallbackList = function() {
							this.callback = []
						}, t.BEFORE_REFRESH_EVENT = "before_refresh_token", t.EVENT_PROCESSOR_KEY = "processor", t
					}();
					e.RefreshToken = t
				}(e.RefreshCSRF || (e.RefreshCSRF = {}))
			}(n || (n = {})), window.RefreshToken = new n.RefreshCSRF.RefreshToken
		},
		tDnx: function(e, t, n) {
			(function(e) {
				var n;

				function i(e) {
					return (i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
						return typeof e
					} : function(e) {
						return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
					})(e)
				}
				/*! jQuery v2.1.1 | (c) 2005, 2014 jQuery Foundation, Inc. | jquery.org/license */
				! function(t, n) {
					"object" == i(e) && "object" == i(e.exports) ? e.exports = t.document ? n(t, !0) : function(e) {
						if (!e.document) throw new Error("jQuery requires a window with a document");
						return n(e)
					} : n(t)
				}("undefined" != typeof window ? window : this, (function(r, o) {
					var s = [],
						a = s.slice,
						u = s.concat,
						c = s.push,
						l = s.indexOf,
						f = {},
						p = f.toString,
						d = f.hasOwnProperty,
						h = {},
						g = r.document,
						m = "2.1.1",
						v = function e(t, n) {
							return new e.fn.init(t, n)
						},
						y = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
						b = /^-ms-/,
						x = /-([\da-z])/gi,
						w = function(e, t) {
							return t.toUpperCase()
						};

					function T(e) {
						var t = e.length,
							n = v.type(e);
						return "function" !== n && !v.isWindow(e) && (!(1 !== e.nodeType || !t) || ("array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e))
					}
					v.fn = v.prototype = {
						jquery: m,
						constructor: v,
						selector: "",
						length: 0,
						toArray: function() {
							return a.call(this)
						},
						get: function(e) {
							return null != e ? 0 > e ? this[e + this.length] : this[e] : a.call(this)
						},
						pushStack: function(e) {
							var t = v.merge(this.constructor(), e);
							return t.prevObject = this, t.context = this.context, t
						},
						each: function(e, t) {
							return v.each(this, e, t)
						},
						map: function(e) {
							return this.pushStack(v.map(this, (function(t, n) {
								return e.call(t, n, t)
							})))
						},
						slice: function() {
							return this.pushStack(a.apply(this, arguments))
						},
						first: function() {
							return this.eq(0)
						},
						last: function() {
							return this.eq(-1)
						},
						eq: function(e) {
							var t = this.length,
								n = +e + (0 > e ? t : 0);
							return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
						},
						end: function() {
							return this.prevObject || this.constructor(null)
						},
						push: c,
						sort: s.sort,
						splice: s.splice
					}, v.extend = v.fn.extend = function() {
						var e, t, n, r, o, s, a = arguments[0] || {},
							u = 1,
							c = arguments.length,
							l = !1;
						for ("boolean" == typeof a && (l = a, a = arguments[u] || {}, u++), "object" == i(a) || v.isFunction(a) || (a = {}), u === c && (a = this, u--); c > u; u++)
							if (null != (e = arguments[u]))
								for (t in e) n = a[t], a !== (r = e[t]) && (l && r && (v.isPlainObject(r) || (o = v.isArray(r))) ? (o ? (o = !1, s = n && v.isArray(n) ? n : []) : s = n && v.isPlainObject(n) ? n : {}, a[t] = v.extend(l, s, r)) : void 0 !== r && (a[t] = r));
						return a
					}, v.extend({
						expando: "jQuery" + (m + Math.random()).replace(/\D/g, ""),
						isReady: !0,
						error: function(e) {
							throw new Error(e)
						},
						noop: function() {},
						isFunction: function(e) {
							return "function" === v.type(e)
						},
						isArray: Array.isArray,
						isWindow: function(e) {
							return null != e && e === e.window
						},
						isNumeric: function(e) {
							return !v.isArray(e) && e - parseFloat(e) >= 0
						},
						isPlainObject: function(e) {
							return "object" === v.type(e) && !e.nodeType && !v.isWindow(e) && !(e.constructor && !d.call(e.constructor.prototype, "isPrototypeOf"))
						},
						isEmptyObject: function(e) {
							var t;
							for (t in e) return !1;
							return !0
						},
						type: function(e) {
							return null == e ? e + "" : "object" == i(e) || "function" == typeof e ? f[p.call(e)] || "object" : i(e)
						},
						globalEval: function(e) {
							var t, n = eval;
							(e = v.trim(e)) && (1 === e.indexOf("use strict") ? ((t = g.createElement("script")).text = e, g.head.appendChild(t).parentNode.removeChild(t)) : n(e))
						},
						camelCase: function(e) {
							return e.replace(b, "ms-").replace(x, w)
						},
						nodeName: function(e, t) {
							return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
						},
						each: function(e, t, n) {
							var i = 0,
								r = e.length,
								o = T(e);
							if (n) {
								if (o)
									for (; r > i && !1 !== t.apply(e[i], n); i++);
								else
									for (i in e)
										if (!1 === t.apply(e[i], n)) break
							} else if (o)
								for (; r > i && !1 !== t.call(e[i], i, e[i]); i++);
							else
								for (i in e)
									if (!1 === t.call(e[i], i, e[i])) break;
							return e
						},
						trim: function(e) {
							return null == e ? "" : (e + "").replace(y, "")
						},
						makeArray: function(e, t) {
							var n = t || [];
							return null != e && (T(Object(e)) ? v.merge(n, "string" == typeof e ? [e] : e) : c.call(n, e)), n
						},
						inArray: function(e, t, n) {
							return null == t ? -1 : l.call(t, e, n)
						},
						merge: function(e, t) {
							for (var n = +t.length, i = 0, r = e.length; n > i; i++) e[r++] = t[i];
							return e.length = r, e
						},
						grep: function(e, t, n) {
							for (var i = [], r = 0, o = e.length, s = !n; o > r; r++) !t(e[r], r) !== s && i.push(e[r]);
							return i
						},
						map: function(e, t, n) {
							var i, r = 0,
								o = e.length,
								s = [];
							if (T(e))
								for (; o > r; r++) null != (i = t(e[r], r, n)) && s.push(i);
							else
								for (r in e) null != (i = t(e[r], r, n)) && s.push(i);
							return u.apply([], s)
						},
						guid: 1,
						proxy: function(e, t) {
							var n, i, r;
							return "string" == typeof t && (n = e[t], t = e, e = n), v.isFunction(e) ? (i = a.call(arguments, 2), (r = function() {
								return e.apply(t || this, i.concat(a.call(arguments)))
							}).guid = e.guid = e.guid || v.guid++, r) : void 0
						},
						now: Date.now,
						support: h
					}), v.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), (function(e, t) {
						f["[object " + t + "]"] = t.toLowerCase()
					}));
					var C = function(e) {
						var t, n, r, o, s, a, u, c, l, f, p, d, h, g, m, v, y, b, x, w = "sizzle" + -new Date,
							T = e.document,
							C = 0,
							E = 0,
							k = oe(),
							S = oe(),
							N = oe(),
							j = function(e, t) {
								return e === t && (p = !0), 0
							},
							D = "undefined",
							O = {}.hasOwnProperty,
							A = [],
							L = A.pop,
							_ = A.push,
							P = A.push,
							I = A.slice,
							R = A.indexOf || function(e) {
								for (var t = 0, n = this.length; n > t; t++)
									if (this[t] === e) return t;
								return -1
							},
							q = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
							H = "[\\x20\\t\\r\\n\\f]",
							F = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
							M = F.replace("w", "w#"),
							B = "\\[" + H + "*(" + F + ")(?:" + H + "*([*^$|!~]?=)" + H + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + M + "))|)" + H + "*\\]",
							$ = ":(" + F + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + B + ")*)|.*)\\)|)",
							W = new RegExp("^" + H + "+|((?:^|[^\\\\])(?:\\\\.)*)" + H + "+$", "g"),
							z = new RegExp("^" + H + "*," + H + "*"),
							U = new RegExp("^" + H + "*([>+~]|" + H + ")" + H + "*"),
							X = new RegExp("=" + H + "*([^\\]'\"]*?)" + H + "*\\]", "g"),
							V = new RegExp($),
							Q = new RegExp("^" + M + "$"),
							G = {
								ID: new RegExp("^#(" + F + ")"),
								CLASS: new RegExp("^\\.(" + F + ")"),
								TAG: new RegExp("^(" + F.replace("w", "w*") + ")"),
								ATTR: new RegExp("^" + B),
								PSEUDO: new RegExp("^" + $),
								CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + H + "*(even|odd|(([+-]|)(\\d*)n|)" + H + "*(?:([+-]|)" + H + "*(\\d+)|))" + H + "*\\)|)", "i"),
								bool: new RegExp("^(?:" + q + ")$", "i"),
								needsContext: new RegExp("^" + H + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + H + "*((?:-\\d)?\\d*)" + H + "*\\)|)(?=[^-]|$)", "i")
							},
							Y = /^(?:input|select|textarea|button)$/i,
							Z = /^h\d$/i,
							J = /^[^{]+\{\s*\[native \w/,
							K = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
							ee = /[+~]/,
							te = /'|\\/g,
							ne = new RegExp("\\\\([\\da-f]{1,6}" + H + "?|(" + H + ")|.)", "ig"),
							ie = function(e, t, n) {
								var i = "0x" + t - 65536;
								return i != i || n ? t : 0 > i ? String.fromCharCode(i + 65536) : String.fromCharCode(i >> 10 | 55296, 1023 & i | 56320)
							};
						try {
							P.apply(A = I.call(T.childNodes), T.childNodes), A[T.childNodes.length].nodeType
						} catch (e) {
							P = {
								apply: A.length ? function(e, t) {
									_.apply(e, I.call(t))
								} : function(e, t) {
									for (var n = e.length, i = 0; e[n++] = t[i++];);
									e.length = n - 1
								}
							}
						}

						function re(e, t, i, r) {
							var o, s, u, l, f, p, g, y, b, C;
							if ((t ? t.ownerDocument || t : T) !== h && d(t), i = i || [], !e || "string" != typeof e) return i;
							if (1 !== (l = (t = t || h).nodeType) && 9 !== l) return [];
							if (m && !r) {
								if (o = K.exec(e))
									if (u = o[1]) {
										if (9 === l) {
											if (!(s = t.getElementById(u)) || !s.parentNode) return i;
											if (s.id === u) return i.push(s), i
										} else if (t.ownerDocument && (s = t.ownerDocument.getElementById(u)) && x(t, s) && s.id === u) return i.push(s), i
									} else {
										if (o[2]) return P.apply(i, t.getElementsByTagName(e)), i;
										if ((u = o[3]) && n.getElementsByClassName && t.getElementsByClassName) return P.apply(i, t.getElementsByClassName(u)), i
									} if (n.qsa && (!v || !v.test(e))) {
									if (y = g = w, b = t, C = 9 === l && e, 1 === l && "object" !== t.nodeName.toLowerCase()) {
										for (p = a(e), (g = t.getAttribute("id")) ? y = g.replace(te, "\\$&") : t.setAttribute("id", y), y = "[id='" + y + "'] ", f = p.length; f--;) p[f] = y + ge(p[f]);
										b = ee.test(e) && de(t.parentNode) || t, C = p.join(",")
									}
									if (C) try {
										return P.apply(i, b.querySelectorAll(C)), i
									} catch (e) {} finally {
										g || t.removeAttribute("id")
									}
								}
							}
							return c(e.replace(W, "$1"), t, i, r)
						}

						function oe() {
							var e = [];
							return function t(n, i) {
								return e.push(n + " ") > r.cacheLength && delete t[e.shift()], t[n + " "] = i
							}
						}

						function se(e) {
							return e[w] = !0, e
						}

						function ae(e) {
							var t = h.createElement("div");
							try {
								return !!e(t)
							} catch (e) {
								return !1
							} finally {
								t.parentNode && t.parentNode.removeChild(t), t = null
							}
						}

						function ue(e, t) {
							for (var n = e.split("|"), i = e.length; i--;) r.attrHandle[n[i]] = t
						}

						function ce(e, t) {
							var n = t && e,
								i = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || 1 << 31) - (~e.sourceIndex || 1 << 31);
							if (i) return i;
							if (n)
								for (; n = n.nextSibling;)
									if (n === t) return -1;
							return e ? 1 : -1
						}

						function le(e) {
							return function(t) {
								return "input" === t.nodeName.toLowerCase() && t.type === e
							}
						}

						function fe(e) {
							return function(t) {
								var n = t.nodeName.toLowerCase();
								return ("input" === n || "button" === n) && t.type === e
							}
						}

						function pe(e) {
							return se((function(t) {
								return t = +t, se((function(n, i) {
									for (var r, o = e([], n.length, t), s = o.length; s--;) n[r = o[s]] && (n[r] = !(i[r] = n[r]))
								}))
							}))
						}

						function de(e) {
							return e && i(e.getElementsByTagName) !== D && e
						}
						for (t in n = re.support = {}, s = re.isXML = function(e) {
								var t = e && (e.ownerDocument || e).documentElement;
								return !!t && "HTML" !== t.nodeName
							}, d = re.setDocument = function(e) {
								var t, o = e ? e.ownerDocument || e : T,
									a = o.defaultView;
								return o !== h && 9 === o.nodeType && o.documentElement ? (h = o, g = o.documentElement, m = !s(o), a && a !== a.top && (a.addEventListener ? a.addEventListener("unload", (function() {
									d()
								}), !1) : a.attachEvent && a.attachEvent("onunload", (function() {
									d()
								}))), n.attributes = ae((function(e) {
									return e.className = "i", !e.getAttribute("className")
								})), n.getElementsByTagName = ae((function(e) {
									return e.appendChild(o.createComment("")), !e.getElementsByTagName("*").length
								})), n.getElementsByClassName = J.test(o.getElementsByClassName) && ae((function(e) {
									return e.innerHTML = "<div class='a'></div><div class='a i'></div>", e.firstChild.className = "i", 2 === e.getElementsByClassName("i").length
								})), n.getById = ae((function(e) {
									return g.appendChild(e).id = w, !o.getElementsByName || !o.getElementsByName(w).length
								})), n.getById ? (r.find.ID = function(e, t) {
									if (i(t.getElementById) !== D && m) {
										var n = t.getElementById(e);
										return n && n.parentNode ? [n] : []
									}
								}, r.filter.ID = function(e) {
									var t = e.replace(ne, ie);
									return function(e) {
										return e.getAttribute("id") === t
									}
								}) : (delete r.find.ID, r.filter.ID = function(e) {
									var t = e.replace(ne, ie);
									return function(e) {
										var n = i(e.getAttributeNode) !== D && e.getAttributeNode("id");
										return n && n.value === t
									}
								}), r.find.TAG = n.getElementsByTagName ? function(e, t) {
									return i(t.getElementsByTagName) !== D ? t.getElementsByTagName(e) : void 0
								} : function(e, t) {
									var n, i = [],
										r = 0,
										o = t.getElementsByTagName(e);
									if ("*" === e) {
										for (; n = o[r++];) 1 === n.nodeType && i.push(n);
										return i
									}
									return o
								}, r.find.CLASS = n.getElementsByClassName && function(e, t) {
									return i(t.getElementsByClassName) !== D && m ? t.getElementsByClassName(e) : void 0
								}, y = [], v = [], (n.qsa = J.test(o.querySelectorAll)) && (ae((function(e) {
									e.innerHTML = "<select msallowclip=''><option selected=''></option></select>", e.querySelectorAll("[msallowclip^='']").length && v.push("[*^$]=" + H + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || v.push("\\[" + H + "*(?:value|" + q + ")"), e.querySelectorAll(":checked").length || v.push(":checked")
								})), ae((function(e) {
									var t = o.createElement("input");
									t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && v.push("name" + H + "*[*^$|!~]?="), e.querySelectorAll(":enabled").length || v.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), v.push(",.*:")
								}))), (n.matchesSelector = J.test(b = g.matches || g.webkitMatchesSelector || g.mozMatchesSelector || g.oMatchesSelector || g.msMatchesSelector)) && ae((function(e) {
									n.disconnectedMatch = b.call(e, "div"), b.call(e, "[s!='']:x"), y.push("!=", $)
								})), v = v.length && new RegExp(v.join("|")), y = y.length && new RegExp(y.join("|")), t = J.test(g.compareDocumentPosition), x = t || J.test(g.contains) ? function(e, t) {
									var n = 9 === e.nodeType ? e.documentElement : e,
										i = t && t.parentNode;
									return e === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(i)))
								} : function(e, t) {
									if (t)
										for (; t = t.parentNode;)
											if (t === e) return !0;
									return !1
								}, j = t ? function(e, t) {
									if (e === t) return p = !0, 0;
									var i = !e.compareDocumentPosition - !t.compareDocumentPosition;
									return i || (1 & (i = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !n.sortDetached && t.compareDocumentPosition(e) === i ? e === o || e.ownerDocument === T && x(T, e) ? -1 : t === o || t.ownerDocument === T && x(T, t) ? 1 : f ? R.call(f, e) - R.call(f, t) : 0 : 4 & i ? -1 : 1)
								} : function(e, t) {
									if (e === t) return p = !0, 0;
									var n, i = 0,
										r = e.parentNode,
										s = t.parentNode,
										a = [e],
										u = [t];
									if (!r || !s) return e === o ? -1 : t === o ? 1 : r ? -1 : s ? 1 : f ? R.call(f, e) - R.call(f, t) : 0;
									if (r === s) return ce(e, t);
									for (n = e; n = n.parentNode;) a.unshift(n);
									for (n = t; n = n.parentNode;) u.unshift(n);
									for (; a[i] === u[i];) i++;
									return i ? ce(a[i], u[i]) : a[i] === T ? -1 : u[i] === T ? 1 : 0
								}, o) : h
							}, re.matches = function(e, t) {
								return re(e, null, null, t)
							}, re.matchesSelector = function(e, t) {
								if ((e.ownerDocument || e) !== h && d(e), t = t.replace(X, "='$1']"), !(!n.matchesSelector || !m || y && y.test(t) || v && v.test(t))) try {
									var i = b.call(e, t);
									if (i || n.disconnectedMatch || e.document && 11 !== e.document.nodeType) return i
								} catch (e) {}
								return re(t, h, null, [e]).length > 0
							}, re.contains = function(e, t) {
								return (e.ownerDocument || e) !== h && d(e), x(e, t)
							}, re.attr = function(e, t) {
								(e.ownerDocument || e) !== h && d(e);
								var i = r.attrHandle[t.toLowerCase()],
									o = i && O.call(r.attrHandle, t.toLowerCase()) ? i(e, t, !m) : void 0;
								return void 0 !== o ? o : n.attributes || !m ? e.getAttribute(t) : (o = e.getAttributeNode(t)) && o.specified ? o.value : null
							}, re.error = function(e) {
								throw new Error("Syntax error, unrecognized expression: " + e)
							}, re.uniqueSort = function(e) {
								var t, i = [],
									r = 0,
									o = 0;
								if (p = !n.detectDuplicates, f = !n.sortStable && e.slice(0), e.sort(j), p) {
									for (; t = e[o++];) t === e[o] && (r = i.push(o));
									for (; r--;) e.splice(i[r], 1)
								}
								return f = null, e
							}, o = re.getText = function(e) {
								var t, n = "",
									i = 0,
									r = e.nodeType;
								if (r) {
									if (1 === r || 9 === r || 11 === r) {
										if ("string" == typeof e.textContent) return e.textContent;
										for (e = e.firstChild; e; e = e.nextSibling) n += o(e)
									} else if (3 === r || 4 === r) return e.nodeValue
								} else
									for (; t = e[i++];) n += o(t);
								return n
							}, (r = re.selectors = {
								cacheLength: 50,
								createPseudo: se,
								match: G,
								attrHandle: {},
								find: {},
								relative: {
									">": {
										dir: "parentNode",
										first: !0
									},
									" ": {
										dir: "parentNode"
									},
									"+": {
										dir: "previousSibling",
										first: !0
									},
									"~": {
										dir: "previousSibling"
									}
								},
								preFilter: {
									ATTR: function(e) {
										return e[1] = e[1].replace(ne, ie), e[3] = (e[3] || e[4] || e[5] || "").replace(ne, ie), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
									},
									CHILD: function(e) {
										return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || re.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && re.error(e[0]), e
									},
									PSEUDO: function(e) {
										var t, n = !e[6] && e[2];
										return G.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && V.test(n) && (t = a(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
									}
								},
								filter: {
									TAG: function(e) {
										var t = e.replace(ne, ie).toLowerCase();
										return "*" === e ? function() {
											return !0
										} : function(e) {
											return e.nodeName && e.nodeName.toLowerCase() === t
										}
									},
									CLASS: function(e) {
										var t = k[e + " "];
										return t || (t = new RegExp("(^|" + H + ")" + e + "(" + H + "|$)")) && k(e, (function(e) {
											return t.test("string" == typeof e.className && e.className || i(e.getAttribute) !== D && e.getAttribute("class") || "")
										}))
									},
									ATTR: function(e, t, n) {
										return function(i) {
											var r = re.attr(i, e);
											return null == r ? "!=" === t : !t || (r += "", "=" === t ? r === n : "!=" === t ? r !== n : "^=" === t ? n && 0 === r.indexOf(n) : "*=" === t ? n && r.indexOf(n) > -1 : "$=" === t ? n && r.slice(-n.length) === n : "~=" === t ? (" " + r + " ").indexOf(n) > -1 : "|=" === t && (r === n || r.slice(0, n.length + 1) === n + "-"))
										}
									},
									CHILD: function(e, t, n, i, r) {
										var o = "nth" !== e.slice(0, 3),
											s = "last" !== e.slice(-4),
											a = "of-type" === t;
										return 1 === i && 0 === r ? function(e) {
											return !!e.parentNode
										} : function(t, n, u) {
											var c, l, f, p, d, h, g = o !== s ? "nextSibling" : "previousSibling",
												m = t.parentNode,
												v = a && t.nodeName.toLowerCase(),
												y = !u && !a;
											if (m) {
												if (o) {
													for (; g;) {
														for (f = t; f = f[g];)
															if (a ? f.nodeName.toLowerCase() === v : 1 === f.nodeType) return !1;
														h = g = "only" === e && !h && "nextSibling"
													}
													return !0
												}
												if (h = [s ? m.firstChild : m.lastChild], s && y) {
													for (d = (c = (l = m[w] || (m[w] = {}))[e] || [])[0] === C && c[1], p = c[0] === C && c[2], f = d && m.childNodes[d]; f = ++d && f && f[g] || (p = d = 0) || h.pop();)
														if (1 === f.nodeType && ++p && f === t) {
															l[e] = [C, d, p];
															break
														}
												} else if (y && (c = (t[w] || (t[w] = {}))[e]) && c[0] === C) p = c[1];
												else
													for (;
														(f = ++d && f && f[g] || (p = d = 0) || h.pop()) && ((a ? f.nodeName.toLowerCase() !== v : 1 !== f.nodeType) || !++p || (y && ((f[w] || (f[w] = {}))[e] = [C, p]), f !== t)););
												return (p -= r) === i || p % i == 0 && p / i >= 0
											}
										}
									},
									PSEUDO: function(e, t) {
										var n, i = r.pseudos[e] || r.setFilters[e.toLowerCase()] || re.error("unsupported pseudo: " + e);
										return i[w] ? i(t) : i.length > 1 ? (n = [e, e, "", t], r.setFilters.hasOwnProperty(e.toLowerCase()) ? se((function(e, n) {
											for (var r, o = i(e, t), s = o.length; s--;) e[r = R.call(e, o[s])] = !(n[r] = o[s])
										})) : function(e) {
											return i(e, 0, n)
										}) : i
									}
								},
								pseudos: {
									not: se((function(e) {
										var t = [],
											n = [],
											i = u(e.replace(W, "$1"));
										return i[w] ? se((function(e, t, n, r) {
											for (var o, s = i(e, null, r, []), a = e.length; a--;)(o = s[a]) && (e[a] = !(t[a] = o))
										})) : function(e, r, o) {
											return t[0] = e, i(t, null, o, n), !n.pop()
										}
									})),
									has: se((function(e) {
										return function(t) {
											return re(e, t).length > 0
										}
									})),
									contains: se((function(e) {
										return function(t) {
											return (t.textContent || t.innerText || o(t)).indexOf(e) > -1
										}
									})),
									lang: se((function(e) {
										return Q.test(e || "") || re.error("unsupported lang: " + e), e = e.replace(ne, ie).toLowerCase(),
											function(t) {
												var n;
												do {
													if (n = m ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-")
												} while ((t = t.parentNode) && 1 === t.nodeType);
												return !1
											}
									})),
									target: function(t) {
										var n = e.location && e.location.hash;
										return n && n.slice(1) === t.id
									},
									root: function(e) {
										return e === g
									},
									focus: function(e) {
										return e === h.activeElement && (!h.hasFocus || h.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
									},
									enabled: function(e) {
										return !1 === e.disabled
									},
									disabled: function(e) {
										return !0 === e.disabled
									},
									checked: function(e) {
										var t = e.nodeName.toLowerCase();
										return "input" === t && !!e.checked || "option" === t && !!e.selected
									},
									selected: function(e) {
										return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
									},
									empty: function(e) {
										for (e = e.firstChild; e; e = e.nextSibling)
											if (e.nodeType < 6) return !1;
										return !0
									},
									parent: function(e) {
										return !r.pseudos.empty(e)
									},
									header: function(e) {
										return Z.test(e.nodeName)
									},
									input: function(e) {
										return Y.test(e.nodeName)
									},
									button: function(e) {
										var t = e.nodeName.toLowerCase();
										return "input" === t && "button" === e.type || "button" === t
									},
									text: function(e) {
										var t;
										return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
									},
									first: pe((function() {
										return [0]
									})),
									last: pe((function(e, t) {
										return [t - 1]
									})),
									eq: pe((function(e, t, n) {
										return [0 > n ? n + t : n]
									})),
									even: pe((function(e, t) {
										for (var n = 0; t > n; n += 2) e.push(n);
										return e
									})),
									odd: pe((function(e, t) {
										for (var n = 1; t > n; n += 2) e.push(n);
										return e
									})),
									lt: pe((function(e, t, n) {
										for (var i = 0 > n ? n + t : n; --i >= 0;) e.push(i);
										return e
									})),
									gt: pe((function(e, t, n) {
										for (var i = 0 > n ? n + t : n; ++i < t;) e.push(i);
										return e
									}))
								}
							}).pseudos.nth = r.pseudos.eq, {
								radio: !0,
								checkbox: !0,
								file: !0,
								password: !0,
								image: !0
							}) r.pseudos[t] = le(t);
						for (t in {
								submit: !0,
								reset: !0
							}) r.pseudos[t] = fe(t);

						function he() {}

						function ge(e) {
							for (var t = 0, n = e.length, i = ""; n > t; t++) i += e[t].value;
							return i
						}

						function me(e, t, n) {
							var i = t.dir,
								r = n && "parentNode" === i,
								o = E++;
							return t.first ? function(t, n, o) {
								for (; t = t[i];)
									if (1 === t.nodeType || r) return e(t, n, o)
							} : function(t, n, s) {
								var a, u, c = [C, o];
								if (s) {
									for (; t = t[i];)
										if ((1 === t.nodeType || r) && e(t, n, s)) return !0
								} else
									for (; t = t[i];)
										if (1 === t.nodeType || r) {
											if ((a = (u = t[w] || (t[w] = {}))[i]) && a[0] === C && a[1] === o) return c[2] = a[2];
											if (u[i] = c, c[2] = e(t, n, s)) return !0
										}
							}
						}

						function ve(e) {
							return e.length > 1 ? function(t, n, i) {
								for (var r = e.length; r--;)
									if (!e[r](t, n, i)) return !1;
								return !0
							} : e[0]
						}

						function ye(e, t, n, i, r) {
							for (var o, s = [], a = 0, u = e.length, c = null != t; u > a; a++)(o = e[a]) && (!n || n(o, i, r)) && (s.push(o), c && t.push(a));
							return s
						}

						function be(e, t, n, i, r, o) {
							return i && !i[w] && (i = be(i)), r && !r[w] && (r = be(r, o)), se((function(o, s, a, u) {
								var c, l, f, p = [],
									d = [],
									h = s.length,
									g = o || function(e, t, n) {
										for (var i = 0, r = t.length; r > i; i++) re(e, t[i], n);
										return n
									}(t || "*", a.nodeType ? [a] : a, []),
									m = !e || !o && t ? g : ye(g, p, e, a, u),
									v = n ? r || (o ? e : h || i) ? [] : s : m;
								if (n && n(m, v, a, u), i)
									for (c = ye(v, d), i(c, [], a, u), l = c.length; l--;)(f = c[l]) && (v[d[l]] = !(m[d[l]] = f));
								if (o) {
									if (r || e) {
										if (r) {
											for (c = [], l = v.length; l--;)(f = v[l]) && c.push(m[l] = f);
											r(null, v = [], c, u)
										}
										for (l = v.length; l--;)(f = v[l]) && (c = r ? R.call(o, f) : p[l]) > -1 && (o[c] = !(s[c] = f))
									}
								} else v = ye(v === s ? v.splice(h, v.length) : v), r ? r(null, s, v, u) : P.apply(s, v)
							}))
						}

						function xe(e) {
							for (var t, n, i, o = e.length, s = r.relative[e[0].type], a = s || r.relative[" "], u = s ? 1 : 0, c = me((function(e) {
									return e === t
								}), a, !0), f = me((function(e) {
									return R.call(t, e) > -1
								}), a, !0), p = [function(e, n, i) {
									return !s && (i || n !== l) || ((t = n).nodeType ? c(e, n, i) : f(e, n, i))
								}]; o > u; u++)
								if (n = r.relative[e[u].type]) p = [me(ve(p), n)];
								else {
									if ((n = r.filter[e[u].type].apply(null, e[u].matches))[w]) {
										for (i = ++u; o > i && !r.relative[e[i].type]; i++);
										return be(u > 1 && ve(p), u > 1 && ge(e.slice(0, u - 1).concat({
											value: " " === e[u - 2].type ? "*" : ""
										})).replace(W, "$1"), n, i > u && xe(e.slice(u, i)), o > i && xe(e = e.slice(i)), o > i && ge(e))
									}
									p.push(n)
								} return ve(p)
						}

						function we(e, t) {
							var n = t.length > 0,
								i = e.length > 0,
								o = function(o, s, a, u, c) {
									var f, p, d, g = 0,
										m = "0",
										v = o && [],
										y = [],
										b = l,
										x = o || i && r.find.TAG("*", c),
										w = C += null == b ? 1 : Math.random() || .1,
										T = x.length;
									for (c && (l = s !== h && s); m !== T && null != (f = x[m]); m++) {
										if (i && f) {
											for (p = 0; d = e[p++];)
												if (d(f, s, a)) {
													u.push(f);
													break
												} c && (C = w)
										}
										n && ((f = !d && f) && g--, o && v.push(f))
									}
									if (g += m, n && m !== g) {
										for (p = 0; d = t[p++];) d(v, y, s, a);
										if (o) {
											if (g > 0)
												for (; m--;) v[m] || y[m] || (y[m] = L.call(u));
											y = ye(y)
										}
										P.apply(u, y), c && !o && y.length > 0 && g + t.length > 1 && re.uniqueSort(u)
									}
									return c && (C = w, l = b), v
								};
							return n ? se(o) : o
						}
						return he.prototype = r.filters = r.pseudos, r.setFilters = new he, a = re.tokenize = function(e, t) {
							var n, i, o, s, a, u, c, l = S[e + " "];
							if (l) return t ? 0 : l.slice(0);
							for (a = e, u = [], c = r.preFilter; a;) {
								for (s in (!n || (i = z.exec(a))) && (i && (a = a.slice(i[0].length) || a), u.push(o = [])), n = !1, (i = U.exec(a)) && (n = i.shift(), o.push({
										value: n,
										type: i[0].replace(W, " ")
									}), a = a.slice(n.length)), r.filter) !(i = G[s].exec(a)) || c[s] && !(i = c[s](i)) || (n = i.shift(), o.push({
									value: n,
									type: s,
									matches: i
								}), a = a.slice(n.length));
								if (!n) break
							}
							return t ? a.length : a ? re.error(e) : S(e, u).slice(0)
						}, u = re.compile = function(e, t) {
							var n, i = [],
								r = [],
								o = N[e + " "];
							if (!o) {
								for (t || (t = a(e)), n = t.length; n--;)(o = xe(t[n]))[w] ? i.push(o) : r.push(o);
								(o = N(e, we(r, i))).selector = e
							}
							return o
						}, c = re.select = function(e, t, i, o) {
							var s, c, l, f, p, d = "function" == typeof e && e,
								h = !o && a(e = d.selector || e);
							if (i = i || [], 1 === h.length) {
								if ((c = h[0] = h[0].slice(0)).length > 2 && "ID" === (l = c[0]).type && n.getById && 9 === t.nodeType && m && r.relative[c[1].type]) {
									if (!(t = (r.find.ID(l.matches[0].replace(ne, ie), t) || [])[0])) return i;
									d && (t = t.parentNode), e = e.slice(c.shift().value.length)
								}
								for (s = G.needsContext.test(e) ? 0 : c.length; s-- && (l = c[s], !r.relative[f = l.type]);)
									if ((p = r.find[f]) && (o = p(l.matches[0].replace(ne, ie), ee.test(c[0].type) && de(t.parentNode) || t))) {
										if (c.splice(s, 1), !(e = o.length && ge(c))) return P.apply(i, o), i;
										break
									}
							}
							return (d || u(e, h))(o, t, !m, i, ee.test(e) && de(t.parentNode) || t), i
						}, n.sortStable = w.split("").sort(j).join("") === w, n.detectDuplicates = !!p, d(), n.sortDetached = ae((function(e) {
							return 1 & e.compareDocumentPosition(h.createElement("div"))
						})), ae((function(e) {
							return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
						})) || ue("type|href|height|width", (function(e, t, n) {
							return n ? void 0 : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
						})), n.attributes && ae((function(e) {
							return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
						})) || ue("value", (function(e, t, n) {
							return n || "input" !== e.nodeName.toLowerCase() ? void 0 : e.defaultValue
						})), ae((function(e) {
							return null == e.getAttribute("disabled")
						})) || ue(q, (function(e, t, n) {
							var i;
							return n ? void 0 : !0 === e[t] ? t.toLowerCase() : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
						})), re
					}(r);
					v.find = C, (v.expr = C.selectors)[":"] = v.expr.pseudos, v.unique = C.uniqueSort, v.text = C.getText, v.isXMLDoc = C.isXML, v.contains = C.contains;
					var E = v.expr.match.needsContext,
						k = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
						S = /^.[^:#\[\.,]*$/;

					function N(e, t, n) {
						if (v.isFunction(t)) return v.grep(e, (function(e, i) {
							return !!t.call(e, i, e) !== n
						}));
						if (t.nodeType) return v.grep(e, (function(e) {
							return e === t !== n
						}));
						if ("string" == typeof t) {
							if (S.test(t)) return v.filter(t, e, n);
							t = v.filter(t, e)
						}
						return v.grep(e, (function(e) {
							return l.call(t, e) >= 0 !== n
						}))
					}
					v.filter = function(e, t, n) {
						var i = t[0];
						return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === i.nodeType ? v.find.matchesSelector(i, e) ? [i] : [] : v.find.matches(e, v.grep(t, (function(e) {
							return 1 === e.nodeType
						})))
					}, v.fn.extend({
						find: function(e) {
							var t, n = this.length,
								i = [],
								r = this;
							if ("string" != typeof e) return this.pushStack(v(e).filter((function() {
								for (t = 0; n > t; t++)
									if (v.contains(r[t], this)) return !0
							})));
							for (t = 0; n > t; t++) v.find(e, r[t], i);
							return (i = this.pushStack(n > 1 ? v.unique(i) : i)).selector = this.selector ? this.selector + " " + e : e, i
						},
						filter: function(e) {
							return this.pushStack(N(this, e || [], !1))
						},
						not: function(e) {
							return this.pushStack(N(this, e || [], !0))
						},
						is: function(e) {
							return !!N(this, "string" == typeof e && E.test(e) ? v(e) : e || [], !1).length
						}
					});
					var j, D = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/;
					(v.fn.init = function(e, t) {
						var n, i;
						if (!e) return this;
						if ("string" == typeof e) {
							if (!(n = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : D.exec(e)) || !n[1] && t) return !t || t.jquery ? (t || j).find(e) : this.constructor(t).find(e);
							if (n[1]) {
								if (t = t instanceof v ? t[0] : t, v.merge(this, v.parseHTML(n[1], t && t.nodeType ? t.ownerDocument || t : g, !0)), k.test(n[1]) && v.isPlainObject(t))
									for (n in t) v.isFunction(this[n]) ? this[n](t[n]) : this.attr(n, t[n]);
								return this
							}
							return (i = g.getElementById(n[2])) && i.parentNode && (this.length = 1, this[0] = i), this.context = g, this.selector = e, this
						}
						return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : v.isFunction(e) ? void 0 !== j.ready ? j.ready(e) : e(v) : (void 0 !== e.selector && (this.selector = e.selector, this.context = e.context), v.makeArray(e, this))
					}).prototype = v.fn, j = v(g);
					var O = /^(?:parents|prev(?:Until|All))/,
						A = {
							children: !0,
							contents: !0,
							next: !0,
							prev: !0
						};

					function L(e, t) {
						for (;
							(e = e[t]) && 1 !== e.nodeType;);
						return e
					}
					v.extend({
						dir: function(e, t, n) {
							for (var i = [], r = void 0 !== n;
								(e = e[t]) && 9 !== e.nodeType;)
								if (1 === e.nodeType) {
									if (r && v(e).is(n)) break;
									i.push(e)
								} return i
						},
						sibling: function(e, t) {
							for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
							return n
						}
					}), v.fn.extend({
						has: function(e) {
							var t = v(e, this),
								n = t.length;
							return this.filter((function() {
								for (var e = 0; n > e; e++)
									if (v.contains(this, t[e])) return !0
							}))
						},
						closest: function(e, t) {
							for (var n, i = 0, r = this.length, o = [], s = E.test(e) || "string" != typeof e ? v(e, t || this.context) : 0; r > i; i++)
								for (n = this[i]; n && n !== t; n = n.parentNode)
									if (n.nodeType < 11 && (s ? s.index(n) > -1 : 1 === n.nodeType && v.find.matchesSelector(n, e))) {
										o.push(n);
										break
									} return this.pushStack(o.length > 1 ? v.unique(o) : o)
						},
						index: function(e) {
							return e ? "string" == typeof e ? l.call(v(e), this[0]) : l.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
						},
						add: function(e, t) {
							return this.pushStack(v.unique(v.merge(this.get(), v(e, t))))
						},
						addBack: function(e) {
							return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
						}
					}), v.each({
						parent: function(e) {
							var t = e.parentNode;
							return t && 11 !== t.nodeType ? t : null
						},
						parents: function(e) {
							return v.dir(e, "parentNode")
						},
						parentsUntil: function(e, t, n) {
							return v.dir(e, "parentNode", n)
						},
						next: function(e) {
							return L(e, "nextSibling")
						},
						prev: function(e) {
							return L(e, "previousSibling")
						},
						nextAll: function(e) {
							return v.dir(e, "nextSibling")
						},
						prevAll: function(e) {
							return v.dir(e, "previousSibling")
						},
						nextUntil: function(e, t, n) {
							return v.dir(e, "nextSibling", n)
						},
						prevUntil: function(e, t, n) {
							return v.dir(e, "previousSibling", n)
						},
						siblings: function(e) {
							return v.sibling((e.parentNode || {}).firstChild, e)
						},
						children: function(e) {
							return v.sibling(e.firstChild)
						},
						contents: function(e) {
							return e.contentDocument || v.merge([], e.childNodes)
						}
					}, (function(e, t) {
						v.fn[e] = function(n, i) {
							var r = v.map(this, t, n);
							return "Until" !== e.slice(-5) && (i = n), i && "string" == typeof i && (r = v.filter(i, r)), this.length > 1 && (A[e] || v.unique(r), O.test(e) && r.reverse()), this.pushStack(r)
						}
					}));
					var _, P = /\S+/g,
						I = {};

					function R() {
						g.removeEventListener("DOMContentLoaded", R, !1), r.removeEventListener("load", R, !1), v.ready()
					}
					v.Callbacks = function(e) {
						e = "string" == typeof e ? I[e] || function(e) {
							var t = I[e] = {};
							return v.each(e.match(P) || [], (function(e, n) {
								t[n] = !0
							})), t
						}(e) : v.extend({}, e);
						var t, n, i, r, o, s, a = [],
							u = !e.once && [],
							c = function c(f) {
								for (t = e.memory && f, n = !0, s = r || 0, r = 0, o = a.length, i = !0; a && o > s; s++)
									if (!1 === a[s].apply(f[0], f[1]) && e.stopOnFalse) {
										t = !1;
										break
									} i = !1, a && (u ? u.length && c(u.shift()) : t ? a = [] : l.disable())
							},
							l = {
								add: function() {
									if (a) {
										var n = a.length;
										! function t(n) {
											v.each(n, (function(n, i) {
												var r = v.type(i);
												"function" === r ? e.unique && l.has(i) || a.push(i) : i && i.length && "string" !== r && t(i)
											}))
										}(arguments), i ? o = a.length : t && (r = n, c(t))
									}
									return this
								},
								remove: function() {
									return a && v.each(arguments, (function(e, t) {
										for (var n;
											(n = v.inArray(t, a, n)) > -1;) a.splice(n, 1), i && (o >= n && o--, s >= n && s--)
									})), this
								},
								has: function(e) {
									return e ? v.inArray(e, a) > -1 : !(!a || !a.length)
								},
								empty: function() {
									return a = [], o = 0, this
								},
								disable: function() {
									return a = u = t = void 0, this
								},
								disabled: function() {
									return !a
								},
								lock: function() {
									return u = void 0, t || l.disable(), this
								},
								locked: function() {
									return !u
								},
								fireWith: function(e, t) {
									return !a || n && !u || (t = [e, (t = t || []).slice ? t.slice() : t], i ? u.push(t) : c(t)), this
								},
								fire: function() {
									return l.fireWith(this, arguments), this
								},
								fired: function() {
									return !!n
								}
							};
						return l
					}, v.extend({
						Deferred: function(e) {
							var t = [
									["resolve", "done", v.Callbacks("once memory"), "resolved"],
									["reject", "fail", v.Callbacks("once memory"), "rejected"],
									["notify", "progress", v.Callbacks("memory")]
								],
								n = "pending",
								i = {
									state: function() {
										return n
									},
									always: function() {
										return r.done(arguments).fail(arguments), this
									},
									then: function() {
										var e = arguments;
										return v.Deferred((function(n) {
											v.each(t, (function(t, o) {
												var s = v.isFunction(e[t]) && e[t];
												r[o[1]]((function() {
													var e = s && s.apply(this, arguments);
													e && v.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[o[0] + "With"](this === i ? n.promise() : this, s ? [e] : arguments)
												}))
											})), e = null
										})).promise()
									},
									promise: function(e) {
										return null != e ? v.extend(e, i) : i
									}
								},
								r = {};
							return i.pipe = i.then, v.each(t, (function(e, o) {
								var s = o[2],
									a = o[3];
								i[o[1]] = s.add, a && s.add((function() {
									n = a
								}), t[1 ^ e][2].disable, t[2][2].lock), r[o[0]] = function() {
									return r[o[0] + "With"](this === r ? i : this, arguments), this
								}, r[o[0] + "With"] = s.fireWith
							})), i.promise(r), e && e.call(r, r), r
						},
						when: function(e) {
							var t, n, i, r = 0,
								o = a.call(arguments),
								s = o.length,
								u = 1 !== s || e && v.isFunction(e.promise) ? s : 0,
								c = 1 === u ? e : v.Deferred(),
								l = function(e, n, i) {
									return function(r) {
										n[e] = this, i[e] = arguments.length > 1 ? a.call(arguments) : r, i === t ? c.notifyWith(n, i) : --u || c.resolveWith(n, i)
									}
								};
							if (s > 1)
								for (t = new Array(s), n = new Array(s), i = new Array(s); s > r; r++) o[r] && v.isFunction(o[r].promise) ? o[r].promise().done(l(r, i, o)).fail(c.reject).progress(l(r, n, t)) : --u;
							return u || c.resolveWith(i, o), c.promise()
						}
					}), v.fn.ready = function(e) {
						return v.ready.promise().done(e), this
					}, v.extend({
						isReady: !1,
						readyWait: 1,
						holdReady: function(e) {
							e ? v.readyWait++ : v.ready(!0)
						},
						ready: function(e) {
							(!0 === e ? --v.readyWait : v.isReady) || (v.isReady = !0, !0 !== e && --v.readyWait > 0 || (_.resolveWith(g, [v]), v.fn.triggerHandler && (v(g).triggerHandler("ready"), v(g).off("ready"))))
						}
					}), v.ready.promise = function(e) {
						return _ || (_ = v.Deferred(), "complete" === g.readyState ? setTimeout(v.ready) : (g.addEventListener("DOMContentLoaded", R, !1), r.addEventListener("load", R, !1))), _.promise(e)
					}, v.ready.promise();
					var q = v.access = function(e, t, n, i, r, o, s) {
						var a = 0,
							u = e.length,
							c = null == n;
						if ("object" === v.type(n))
							for (a in r = !0, n) v.access(e, t, a, n[a], !0, o, s);
						else if (void 0 !== i && (r = !0, v.isFunction(i) || (s = !0), c && (s ? (t.call(e, i), t = null) : (c = t, t = function(e, t, n) {
								return c.call(v(e), n)
							})), t))
							for (; u > a; a++) t(e[a], n, s ? i : i.call(e[a], a, t(e[a], n)));
						return r ? e : c ? t.call(e) : u ? t(e[0], n) : o
					};

					function H() {
						Object.defineProperty(this.cache = {}, 0, {
							get: function() {
								return {}
							}
						}), this.expando = v.expando + Math.random()
					}
					v.acceptData = function(e) {
						return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
					}, H.uid = 1, H.accepts = v.acceptData, H.prototype = {
						key: function(e) {
							if (!H.accepts(e)) return 0;
							var t = {},
								n = e[this.expando];
							if (!n) {
								n = H.uid++;
								try {
									t[this.expando] = {
										value: n
									}, Object.defineProperties(e, t)
								} catch (i) {
									t[this.expando] = n, v.extend(e, t)
								}
							}
							return this.cache[n] || (this.cache[n] = {}), n
						},
						set: function(e, t, n) {
							var i, r = this.key(e),
								o = this.cache[r];
							if ("string" == typeof t) o[t] = n;
							else if (v.isEmptyObject(o)) v.extend(this.cache[r], t);
							else
								for (i in t) o[i] = t[i];
							return o
						},
						get: function(e, t) {
							var n = this.cache[this.key(e)];
							return void 0 === t ? n : n[t]
						},
						access: function(e, t, n) {
							var i;
							return void 0 === t || t && "string" == typeof t && void 0 === n ? void 0 !== (i = this.get(e, t)) ? i : this.get(e, v.camelCase(t)) : (this.set(e, t, n), void 0 !== n ? n : t)
						},
						remove: function(e, t) {
							var n, i, r, o = this.key(e),
								s = this.cache[o];
							if (void 0 === t) this.cache[o] = {};
							else {
								v.isArray(t) ? i = t.concat(t.map(v.camelCase)) : (r = v.camelCase(t), t in s ? i = [t, r] : i = (i = r) in s ? [i] : i.match(P) || []), n = i.length;
								for (; n--;) delete s[i[n]]
							}
						},
						hasData: function(e) {
							return !v.isEmptyObject(this.cache[e[this.expando]] || {})
						},
						discard: function(e) {
							e[this.expando] && delete this.cache[e[this.expando]]
						}
					};
					var F = new H,
						M = new H,
						B = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
						$ = /([A-Z])/g;

					function W(e, t, n) {
						var i;
						if (void 0 === n && 1 === e.nodeType)
							if (i = "data-" + t.replace($, "-$1").toLowerCase(), "string" == typeof(n = e.getAttribute(i))) {
								try {
									n = "true" === n || "false" !== n && ("null" === n ? null : +n + "" === n ? +n : B.test(n) ? v.parseJSON(n) : n)
								} catch (e) {}
								M.set(e, t, n)
							} else n = void 0;
						return n
					}
					v.extend({
						hasData: function(e) {
							return M.hasData(e) || F.hasData(e)
						},
						data: function(e, t, n) {
							return M.access(e, t, n)
						},
						removeData: function(e, t) {
							M.remove(e, t)
						},
						_data: function(e, t, n) {
							return F.access(e, t, n)
						},
						_removeData: function(e, t) {
							F.remove(e, t)
						}
					}), v.fn.extend({
						data: function(e, t) {
							var n, r, o, s = this[0],
								a = s && s.attributes;
							if (void 0 === e) {
								if (this.length && (o = M.get(s), 1 === s.nodeType && !F.get(s, "hasDataAttrs"))) {
									for (n = a.length; n--;) a[n] && (0 === (r = a[n].name).indexOf("data-") && (r = v.camelCase(r.slice(5)), W(s, r, o[r])));
									F.set(s, "hasDataAttrs", !0)
								}
								return o
							}
							return "object" == i(e) ? this.each((function() {
								M.set(this, e)
							})) : q(this, (function(t) {
								var n, i = v.camelCase(e);
								if (s && void 0 === t) {
									if (void 0 !== (n = M.get(s, e))) return n;
									if (void 0 !== (n = M.get(s, i))) return n;
									if (void 0 !== (n = W(s, i, void 0))) return n
								} else this.each((function() {
									var n = M.get(this, i);
									M.set(this, i, t), -1 !== e.indexOf("-") && void 0 !== n && M.set(this, e, t)
								}))
							}), null, t, arguments.length > 1, null, !0)
						},
						removeData: function(e) {
							return this.each((function() {
								M.remove(this, e)
							}))
						}
					}), v.extend({
						queue: function(e, t, n) {
							var i;
							return e ? (t = (t || "fx") + "queue", i = F.get(e, t), n && (!i || v.isArray(n) ? i = F.access(e, t, v.makeArray(n)) : i.push(n)), i || []) : void 0
						},
						dequeue: function(e, t) {
							var n = v.queue(e, t = t || "fx"),
								i = n.length,
								r = n.shift(),
								o = v._queueHooks(e, t);
							"inprogress" === r && (r = n.shift(), i--), r && ("fx" === t && n.unshift("inprogress"), delete o.stop, r.call(e, (function() {
								v.dequeue(e, t)
							}), o)), !i && o && o.empty.fire()
						},
						_queueHooks: function(e, t) {
							var n = t + "queueHooks";
							return F.get(e, n) || F.access(e, n, {
								empty: v.Callbacks("once memory").add((function() {
									F.remove(e, [t + "queue", n])
								}))
							})
						}
					}), v.fn.extend({
						queue: function(e, t) {
							var n = 2;
							return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? v.queue(this[0], e) : void 0 === t ? this : this.each((function() {
								var n = v.queue(this, e, t);
								v._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && v.dequeue(this, e)
							}))
						},
						dequeue: function(e) {
							return this.each((function() {
								v.dequeue(this, e)
							}))
						},
						clearQueue: function(e) {
							return this.queue(e || "fx", [])
						},
						promise: function(e, t) {
							var n, i = 1,
								r = v.Deferred(),
								o = this,
								s = this.length,
								a = function() {
									--i || r.resolveWith(o, [o])
								};
							for ("string" != typeof e && (t = e, e = void 0), e = e || "fx"; s--;)(n = F.get(o[s], e + "queueHooks")) && n.empty && (i++, n.empty.add(a));
							return a(), r.promise(t)
						}
					});
					var z = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
						U = ["Top", "Right", "Bottom", "Left"],
						X = function(e, t) {
							return "none" === v.css(e = t || e, "display") || !v.contains(e.ownerDocument, e)
						},
						V = /^(?:checkbox|radio)$/i;
					! function() {
						var e = g.createDocumentFragment().appendChild(g.createElement("div")),
							t = g.createElement("input");
						t.setAttribute("type", "radio"), t.setAttribute("checked", "checked"), t.setAttribute("name", "t"), e.appendChild(t), h.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked, e.innerHTML = "<textarea>x</textarea>", h.noCloneChecked = !!e.cloneNode(!0).lastChild.defaultValue
					}();
					var Q = "undefined";
					h.focusinBubbles = "onfocusin" in r;
					var G = /^key/,
						Y = /^(?:mouse|pointer|contextmenu)|click/,
						Z = /^(?:focusinfocus|focusoutblur)$/,
						J = /^([^.]*)(?:\.(.+)|)$/;

					function K() {
						return !0
					}

					function ee() {
						return !1
					}

					function te() {
						try {
							return g.activeElement
						} catch (e) {}
					}
					v.event = {
						global: {},
						add: function(e, t, n, r, o) {
							var s, a, u, c, l, f, p, d, h, g, m, y = F.get(e);
							if (y)
								for (n.handler && (n = (s = n).handler, o = s.selector), n.guid || (n.guid = v.guid++), (c = y.events) || (c = y.events = {}), (a = y.handle) || (a = y.handle = function(t) {
										return i(v) !== Q && v.event.triggered !== t.type ? v.event.dispatch.apply(e, arguments) : void 0
									}), l = (t = (t || "").match(P) || [""]).length; l--;) h = m = (u = J.exec(t[l]) || [])[1], g = (u[2] || "").split(".").sort(), h && (p = v.event.special[h] || {}, h = (o ? p.delegateType : p.bindType) || h, p = v.event.special[h] || {}, f = v.extend({
									type: h,
									origType: m,
									data: r,
									handler: n,
									guid: n.guid,
									selector: o,
									needsContext: o && v.expr.match.needsContext.test(o),
									namespace: g.join(".")
								}, s), (d = c[h]) || ((d = c[h] = []).delegateCount = 0, p.setup && !1 !== p.setup.call(e, r, g, a) || e.addEventListener && e.addEventListener(h, a, !1)), p.add && (p.add.call(e, f), f.handler.guid || (f.handler.guid = n.guid)), o ? d.splice(d.delegateCount++, 0, f) : d.push(f), v.event.global[h] = !0)
						},
						remove: function(e, t, n, i, r) {
							var o, s, a, u, c, l, f, p, d, h, g, m = F.hasData(e) && F.get(e);
							if (m && (u = m.events)) {
								for (c = (t = (t || "").match(P) || [""]).length; c--;)
									if (d = g = (a = J.exec(t[c]) || [])[1], h = (a[2] || "").split(".").sort(), d) {
										for (f = v.event.special[d] || {}, p = u[d = (i ? f.delegateType : f.bindType) || d] || [], a = a[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), s = o = p.length; o--;) l = p[o], !r && g !== l.origType || n && n.guid !== l.guid || a && !a.test(l.namespace) || i && i !== l.selector && ("**" !== i || !l.selector) || (p.splice(o, 1), l.selector && p.delegateCount--, f.remove && f.remove.call(e, l));
										s && !p.length && (f.teardown && !1 !== f.teardown.call(e, h, m.handle) || v.removeEvent(e, d, m.handle), delete u[d])
									} else
										for (d in u) v.event.remove(e, d + t[c], n, i, !0);
								v.isEmptyObject(u) && (delete m.handle, F.remove(e, "events"))
							}
						},
						trigger: function(e, t, n, o) {
							var s, a, u, c, l, f, p, h = [n || g],
								m = d.call(e, "type") ? e.type : e,
								y = d.call(e, "namespace") ? e.namespace.split(".") : [];
							if (a = u = n = n || g, 3 !== n.nodeType && 8 !== n.nodeType && !Z.test(m + v.event.triggered) && (m.indexOf(".") >= 0 && (y = m.split("."), m = y.shift(), y.sort()), l = m.indexOf(":") < 0 && "on" + m, (e = e[v.expando] ? e : new v.Event(m, "object" == i(e) && e)).isTrigger = o ? 2 : 3, e.namespace = y.join("."), e.namespace_re = e.namespace ? new RegExp("(^|\\.)" + y.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, e.result = void 0, e.target || (e.target = n), t = null == t ? [e] : v.makeArray(t, [e]), p = v.event.special[m] || {}, o || !p.trigger || !1 !== p.trigger.apply(n, t))) {
								if (!o && !p.noBubble && !v.isWindow(n)) {
									for (c = p.delegateType || m, Z.test(c + m) || (a = a.parentNode); a; a = a.parentNode) h.push(a), u = a;
									u === (n.ownerDocument || g) && h.push(u.defaultView || u.parentWindow || r)
								}
								for (s = 0;
									(a = h[s++]) && !e.isPropagationStopped();) e.type = s > 1 ? c : p.bindType || m, (f = (F.get(a, "events") || {})[e.type] && F.get(a, "handle")) && f.apply(a, t), (f = l && a[l]) && f.apply && v.acceptData(a) && (e.result = f.apply(a, t), !1 === e.result && e.preventDefault());
								return e.type = m, o || e.isDefaultPrevented() || p._default && !1 !== p._default.apply(h.pop(), t) || !v.acceptData(n) || l && v.isFunction(n[m]) && !v.isWindow(n) && ((u = n[l]) && (n[l] = null), v.event.triggered = m, n[m](), v.event.triggered = void 0, u && (n[l] = u)), e.result
							}
						},
						dispatch: function(e) {
							e = v.event.fix(e);
							var t, n, i, r, o, s = [],
								u = a.call(arguments),
								c = (F.get(this, "events") || {})[e.type] || [],
								l = v.event.special[e.type] || {};
							if (u[0] = e, e.delegateTarget = this, !l.preDispatch || !1 !== l.preDispatch.call(this, e)) {
								for (s = v.event.handlers.call(this, e, c), t = 0;
									(r = s[t++]) && !e.isPropagationStopped();)
									for (e.currentTarget = r.elem, n = 0;
										(o = r.handlers[n++]) && !e.isImmediatePropagationStopped();)(!e.namespace_re || e.namespace_re.test(o.namespace)) && (e.handleObj = o, e.data = o.data, void 0 !== (i = ((v.event.special[o.origType] || {}).handle || o.handler).apply(r.elem, u)) && !1 === (e.result = i) && (e.preventDefault(), e.stopPropagation()));
								return l.postDispatch && l.postDispatch.call(this, e), e.result
							}
						},
						handlers: function(e, t) {
							var n, i, r, o, s = [],
								a = t.delegateCount,
								u = e.target;
							if (a && u.nodeType && (!e.button || "click" !== e.type))
								for (; u !== this; u = u.parentNode || this)
									if (!0 !== u.disabled || "click" !== e.type) {
										for (i = [], n = 0; a > n; n++) void 0 === i[r = (o = t[n]).selector + " "] && (i[r] = o.needsContext ? v(r, this).index(u) >= 0 : v.find(r, this, null, [u]).length), i[r] && i.push(o);
										i.length && s.push({
											elem: u,
											handlers: i
										})
									} return a < t.length && s.push({
								elem: this,
								handlers: t.slice(a)
							}), s
						},
						props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
						fixHooks: {},
						keyHooks: {
							props: "char charCode key keyCode".split(" "),
							filter: function(e, t) {
								return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
							}
						},
						mouseHooks: {
							props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
							filter: function(e, t) {
								var n, i, r, o = t.button;
								return null == e.pageX && null != t.clientX && (i = (n = e.target.ownerDocument || g).documentElement, r = n.body, e.pageX = t.clientX + (i && i.scrollLeft || r && r.scrollLeft || 0) - (i && i.clientLeft || r && r.clientLeft || 0), e.pageY = t.clientY + (i && i.scrollTop || r && r.scrollTop || 0) - (i && i.clientTop || r && r.clientTop || 0)), e.which || void 0 === o || (e.which = 1 & o ? 1 : 2 & o ? 3 : 4 & o ? 2 : 0), e
							}
						},
						fix: function(e) {
							if (e[v.expando]) return e;
							var t, n, i, r = e.type,
								o = e,
								s = this.fixHooks[r];
							for (s || (this.fixHooks[r] = s = Y.test(r) ? this.mouseHooks : G.test(r) ? this.keyHooks : {}), i = s.props ? this.props.concat(s.props) : this.props, e = new v.Event(o), t = i.length; t--;) e[n = i[t]] = o[n];
							return e.target || (e.target = g), 3 === e.target.nodeType && (e.target = e.target.parentNode), s.filter ? s.filter(e, o) : e
						},
						special: {
							load: {
								noBubble: !0
							},
							focus: {
								trigger: function() {
									return this !== te() && this.focus ? (this.focus(), !1) : void 0
								},
								delegateType: "focusin"
							},
							blur: {
								trigger: function() {
									return this === te() && this.blur ? (this.blur(), !1) : void 0
								},
								delegateType: "focusout"
							},
							click: {
								trigger: function() {
									return "checkbox" === this.type && this.click && v.nodeName(this, "input") ? (this.click(), !1) : void 0
								},
								_default: function(e) {
									return v.nodeName(e.target, "a")
								}
							},
							beforeunload: {
								postDispatch: function(e) {
									void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
								}
							}
						},
						simulate: function(e, t, n, i) {
							var r = v.extend(new v.Event, n, {
								type: e,
								isSimulated: !0,
								originalEvent: {}
							});
							i ? v.event.trigger(r, null, t) : v.event.dispatch.call(t, r), r.isDefaultPrevented() && n.preventDefault()
						}
					}, v.removeEvent = function(e, t, n) {
						e.removeEventListener && e.removeEventListener(t, n, !1)
					}, (v.Event = function(e, t) {
						return this instanceof v.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? K : ee) : this.type = e, t && v.extend(this, t), this.timeStamp = e && e.timeStamp || v.now(), void(this[v.expando] = !0)) : new v.Event(e, t)
					}).prototype = {
						isDefaultPrevented: ee,
						isPropagationStopped: ee,
						isImmediatePropagationStopped: ee,
						preventDefault: function() {
							var e = this.originalEvent;
							this.isDefaultPrevented = K, e && e.preventDefault && e.preventDefault()
						},
						stopPropagation: function() {
							var e = this.originalEvent;
							this.isPropagationStopped = K, e && e.stopPropagation && e.stopPropagation()
						},
						stopImmediatePropagation: function() {
							var e = this.originalEvent;
							this.isImmediatePropagationStopped = K, e && e.stopImmediatePropagation && e.stopImmediatePropagation(), this.stopPropagation()
						}
					}, v.each({
						mouseenter: "mouseover",
						mouseleave: "mouseout",
						pointerenter: "pointerover",
						pointerleave: "pointerout"
					}, (function(e, t) {
						v.event.special[e] = {
							delegateType: t,
							bindType: t,
							handle: function(e) {
								var n, i = this,
									r = e.relatedTarget,
									o = e.handleObj;
								return (!r || r !== i && !v.contains(i, r)) && (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
							}
						}
					})), h.focusinBubbles || v.each({
						focus: "focusin",
						blur: "focusout"
					}, (function(e, t) {
						var n = function(e) {
							v.event.simulate(t, e.target, v.event.fix(e), !0)
						};
						v.event.special[t] = {
							setup: function() {
								var i = this.ownerDocument || this,
									r = F.access(i, t);
								r || i.addEventListener(e, n, !0), F.access(i, t, (r || 0) + 1)
							},
							teardown: function() {
								var i = this.ownerDocument || this,
									r = F.access(i, t) - 1;
								r ? F.access(i, t, r) : (i.removeEventListener(e, n, !0), F.remove(i, t))
							}
						}
					})), v.fn.extend({
						on: function(e, t, n, r, o) {
							var s, a;
							if ("object" == i(e)) {
								for (a in "string" != typeof t && (n = n || t, t = void 0), e) this.on(a, t, n, e[a], o);
								return this
							}
							if (null == n && null == r ? (r = t, n = t = void 0) : null == r && ("string" == typeof t ? (r = n, n = void 0) : (r = n, n = t, t = void 0)), !1 === r) r = ee;
							else if (!r) return this;
							return 1 === o && (s = r, (r = function(e) {
								return v().off(e), s.apply(this, arguments)
							}).guid = s.guid || (s.guid = v.guid++)), this.each((function() {
								v.event.add(this, e, r, n, t)
							}))
						},
						one: function(e, t, n, i) {
							return this.on(e, t, n, i, 1)
						},
						off: function(e, t, n) {
							var r, o;
							if (e && e.preventDefault && e.handleObj) return r = e.handleObj, v(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;
							if ("object" == i(e)) {
								for (o in e) this.off(o, t, e[o]);
								return this
							}
							return (!1 === t || "function" == typeof t) && (n = t, t = void 0), !1 === n && (n = ee), this.each((function() {
								v.event.remove(this, e, n, t)
							}))
						},
						trigger: function(e, t) {
							return this.each((function() {
								v.event.trigger(e, t, this)
							}))
						},
						triggerHandler: function(e, t) {
							var n = this[0];
							return n ? v.event.trigger(e, t, n, !0) : void 0
						}
					});
					var ne = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
						ie = /<([\w:]+)/,
						re = /<|&#?\w+;/,
						oe = /<(?:script|style|link)/i,
						se = /checked\s*(?:[^=]|=\s*.checked.)/i,
						ae = /^$|\/(?:java|ecma)script/i,
						ue = /^true\/(.*)/,
						ce = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
						le = {
							option: [1, "<select multiple='multiple'>", "</select>"],
							thead: [1, "<table>", "</table>"],
							col: [2, "<table><colgroup>", "</colgroup></table>"],
							tr: [2, "<table><tbody>", "</tbody></table>"],
							td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
							_default: [0, "", ""]
						};

					function fe(e, t) {
						return v.nodeName(e, "table") && v.nodeName(11 !== t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
					}

					function pe(e) {
						return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
					}

					function de(e) {
						var t = ue.exec(e.type);
						return t ? e.type = t[1] : e.removeAttribute("type"), e
					}

					function he(e, t) {
						for (var n = 0, i = e.length; i > n; n++) F.set(e[n], "globalEval", !t || F.get(t[n], "globalEval"))
					}

					function ge(e, t) {
						var n, i, r, o, s, a, u, c;
						if (1 === t.nodeType) {
							if (F.hasData(e) && (o = F.access(e), s = F.set(t, o), c = o.events))
								for (r in delete s.handle, s.events = {}, c)
									for (n = 0, i = c[r].length; i > n; n++) v.event.add(t, r, c[r][n]);
							M.hasData(e) && (a = M.access(e), u = v.extend({}, a), M.set(t, u))
						}
					}

					function me(e, t) {
						var n = e.getElementsByTagName ? e.getElementsByTagName(t || "*") : e.querySelectorAll ? e.querySelectorAll(t || "*") : [];
						return void 0 === t || t && v.nodeName(e, t) ? v.merge([e], n) : n
					}

					function ve(e, t) {
						var n = t.nodeName.toLowerCase();
						"input" === n && V.test(e.type) ? t.checked = e.checked : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue)
					}
					le.optgroup = le.option, le.tbody = le.tfoot = le.colgroup = le.caption = le.thead, le.th = le.td, v.extend({
						clone: function(e, t, n) {
							var i, r, o, s, a = e.cloneNode(!0),
								u = v.contains(e.ownerDocument, e);
							if (!(h.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || v.isXMLDoc(e)))
								for (s = me(a), i = 0, r = (o = me(e)).length; r > i; i++) ve(o[i], s[i]);
							if (t)
								if (n)
									for (o = o || me(e), s = s || me(a), i = 0, r = o.length; r > i; i++) ge(o[i], s[i]);
								else ge(e, a);
							return (s = me(a, "script")).length > 0 && he(s, !u && me(e, "script")), a
						},
						buildFragment: function(e, t, n, i) {
							for (var r, o, s, a, u, c, l = t.createDocumentFragment(), f = [], p = 0, d = e.length; d > p; p++)
								if ((r = e[p]) || 0 === r)
									if ("object" === v.type(r)) v.merge(f, r.nodeType ? [r] : r);
									else if (re.test(r)) {
								for (o = o || l.appendChild(t.createElement("div")), s = (ie.exec(r) || ["", ""])[1].toLowerCase(), a = le[s] || le._default, o.innerHTML = a[1] + r.replace(ne, "<$1></$2>") + a[2], c = a[0]; c--;) o = o.lastChild;
								v.merge(f, o.childNodes), (o = l.firstChild).textContent = ""
							} else f.push(t.createTextNode(r));
							for (l.textContent = "", p = 0; r = f[p++];)
								if ((!i || -1 === v.inArray(r, i)) && (u = v.contains(r.ownerDocument, r), o = me(l.appendChild(r), "script"), u && he(o), n))
									for (c = 0; r = o[c++];) ae.test(r.type || "") && n.push(r);
							return l
						},
						cleanData: function(e) {
							for (var t, n, i, r, o = v.event.special, s = 0; void 0 !== (n = e[s]); s++) {
								if (v.acceptData(n) && ((r = n[F.expando]) && (t = F.cache[r]))) {
									if (t.events)
										for (i in t.events) o[i] ? v.event.remove(n, i) : v.removeEvent(n, i, t.handle);
									F.cache[r] && delete F.cache[r]
								}
								delete M.cache[n[M.expando]]
							}
						}
					}), v.fn.extend({
						text: function(e) {
							return q(this, (function(e) {
								return void 0 === e ? v.text(this) : this.empty().each((function() {
									(1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) && (this.textContent = e)
								}))
							}), null, e, arguments.length)
						},
						append: function() {
							return this.domManip(arguments, (function(e) {
								1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || fe(this, e).appendChild(e)
							}))
						},
						prepend: function() {
							return this.domManip(arguments, (function(e) {
								if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
									var t = fe(this, e);
									t.insertBefore(e, t.firstChild)
								}
							}))
						},
						before: function() {
							return this.domManip(arguments, (function(e) {
								this.parentNode && this.parentNode.insertBefore(e, this)
							}))
						},
						after: function() {
							return this.domManip(arguments, (function(e) {
								this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
							}))
						},
						remove: function(e, t) {
							for (var n, i = e ? v.filter(e, this) : this, r = 0; null != (n = i[r]); r++) t || 1 !== n.nodeType || v.cleanData(me(n)), n.parentNode && (t && v.contains(n.ownerDocument, n) && he(me(n, "script")), n.parentNode.removeChild(n));
							return this
						},
						empty: function() {
							for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (v.cleanData(me(e, !1)), e.textContent = "");
							return this
						},
						clone: function(e, t) {
							return e = null != e && e, t = null == t ? e : t, this.map((function() {
								return v.clone(this, e, t)
							}))
						},
						html: function(e) {
							return q(this, (function(e) {
								var t = this[0] || {},
									n = 0,
									i = this.length;
								if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
								if ("string" == typeof e && !oe.test(e) && !le[(ie.exec(e) || ["", ""])[1].toLowerCase()]) {
									e = e.replace(ne, "<$1></$2>");
									try {
										for (; i > n; n++) 1 === (t = this[n] || {}).nodeType && (v.cleanData(me(t, !1)), t.innerHTML = e);
										t = 0
									} catch (e) {}
								}
								t && this.empty().append(e)
							}), null, e, arguments.length)
						},
						replaceWith: function() {
							var e = arguments[0];
							return this.domManip(arguments, (function(t) {
								e = this.parentNode, v.cleanData(me(this)), e && e.replaceChild(t, this)
							})), e && (e.length || e.nodeType) ? this : this.remove()
						},
						detach: function(e) {
							return this.remove(e, !0)
						},
						domManip: function(e, t) {
							e = u.apply([], e);
							var n, i, r, o, s, a, c = 0,
								l = this.length,
								f = this,
								p = l - 1,
								d = e[0],
								g = v.isFunction(d);
							if (g || l > 1 && "string" == typeof d && !h.checkClone && se.test(d)) return this.each((function(n) {
								var i = f.eq(n);
								g && (e[0] = d.call(this, n, i.html())), i.domManip(e, t)
							}));
							if (l && (i = (n = v.buildFragment(e, this[0].ownerDocument, !1, this)).firstChild, 1 === n.childNodes.length && (n = i), i)) {
								for (o = (r = v.map(me(n, "script"), pe)).length; l > c; c++) s = n, c !== p && (s = v.clone(s, !0, !0), o && v.merge(r, me(s, "script"))), t.call(this[c], s, c);
								if (o)
									for (a = r[r.length - 1].ownerDocument, v.map(r, de), c = 0; o > c; c++) s = r[c], ae.test(s.type || "") && !F.access(s, "globalEval") && v.contains(a, s) && (s.src ? v._evalUrl && v._evalUrl(s.src) : v.globalEval(s.textContent.replace(ce, "")))
							}
							return this
						}
					}), v.each({
						appendTo: "append",
						prependTo: "prepend",
						insertBefore: "before",
						insertAfter: "after",
						replaceAll: "replaceWith"
					}, (function(e, t) {
						v.fn[e] = function(e) {
							for (var n, i = [], r = v(e), o = r.length - 1, s = 0; o >= s; s++) n = s === o ? this : this.clone(!0), v(r[s])[t](n), c.apply(i, n.get());
							return this.pushStack(i)
						}
					}));
					var ye, be = {};

					function xe(e, t) {
						var n, i = v(t.createElement(e)).appendTo(t.body),
							o = r.getDefaultComputedStyle && (n = r.getDefaultComputedStyle(i[0])) ? n.display : v.css(i[0], "display");
						return i.detach(), o
					}

					function we(e) {
						var t = g,
							n = be[e];
						return n || ("none" !== (n = xe(e, t)) && n || ((t = (ye = (ye || v("<iframe frameborder='0' width='0' height='0'/>")).appendTo(t.documentElement))[0].contentDocument).write(), t.close(), n = xe(e, t), ye.detach()), be[e] = n), n
					}
					var Te = /^margin/,
						Ce = new RegExp("^(" + z + ")(?!px)[a-z%]+$", "i"),
						Ee = function(e) {
							return e.ownerDocument.defaultView.getComputedStyle(e, null)
						};

					function ke(e, t, n) {
						var i, r, o, s, a = e.style;
						return (n = n || Ee(e)) && (s = n.getPropertyValue(t) || n[t]), n && ("" !== s || v.contains(e.ownerDocument, e) || (s = v.style(e, t)), Ce.test(s) && Te.test(t) && (i = a.width, r = a.minWidth, o = a.maxWidth, a.minWidth = a.maxWidth = a.width = s, s = n.width, a.width = i, a.minWidth = r, a.maxWidth = o)), void 0 !== s ? s + "" : s
					}

					function Se(e, t) {
						return {
							get: function() {
								return e() ? void delete this.get : (this.get = t).apply(this, arguments)
							}
						}
					}! function() {
						var e, t, n = g.documentElement,
							i = g.createElement("div"),
							o = g.createElement("div");
						if (o.style) {
							function s() {
								o.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute", o.innerHTML = "", n.appendChild(i);
								var s = r.getComputedStyle(o, null);
								e = "1%" !== s.top, t = "4px" === s.width, n.removeChild(i)
							}
							o.style.backgroundClip = "content-box", o.cloneNode(!0).style.backgroundClip = "", h.clearCloneStyle = "content-box" === o.style.backgroundClip, i.style.cssText = "border:0;width:0;height:0;top:0;left:-9999px;margin-top:1px;position:absolute", i.appendChild(o), r.getComputedStyle && v.extend(h, {
								pixelPosition: function() {
									return s(), e
								},
								boxSizingReliable: function() {
									return null == t && s(), t
								},
								reliableMarginRight: function() {
									var e, t = o.appendChild(g.createElement("div"));
									return t.style.cssText = o.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", t.style.marginRight = t.style.width = "0", o.style.width = "1px", n.appendChild(i), e = !parseFloat(r.getComputedStyle(t, null).marginRight), n.removeChild(i), e
								}
							})
						}
					}(), v.swap = function(e, t, n, i) {
						var r, o, s = {};
						for (o in t) s[o] = e.style[o], e.style[o] = t[o];
						for (o in r = n.apply(e, i || []), t) e.style[o] = s[o];
						return r
					};
					var Ne = /^(none|table(?!-c[ea]).+)/,
						je = new RegExp("^(" + z + ")(.*)$", "i"),
						De = new RegExp("^([+-])=(" + z + ")", "i"),
						Oe = {
							position: "absolute",
							visibility: "hidden",
							display: "block"
						},
						Ae = {
							letterSpacing: "0",
							fontWeight: "400"
						},
						Le = ["Webkit", "O", "Moz", "ms"];

					function _e(e, t) {
						if (t in e) return t;
						for (var n = t[0].toUpperCase() + t.slice(1), i = t, r = Le.length; r--;)
							if ((t = Le[r] + n) in e) return t;
						return i
					}

					function Pe(e, t, n) {
						var i = je.exec(t);
						return i ? Math.max(0, i[1] - (n || 0)) + (i[2] || "px") : t
					}

					function Ie(e, t, n, i, r) {
						for (var o = n === (i ? "border" : "content") ? 4 : "width" === t ? 1 : 0, s = 0; 4 > o; o += 2) "margin" === n && (s += v.css(e, n + U[o], !0, r)), i ? ("content" === n && (s -= v.css(e, "padding" + U[o], !0, r)), "margin" !== n && (s -= v.css(e, "border" + U[o] + "Width", !0, r))) : (s += v.css(e, "padding" + U[o], !0, r), "padding" !== n && (s += v.css(e, "border" + U[o] + "Width", !0, r)));
						return s
					}

					function Re(e, t, n) {
						var i = !0,
							r = "width" === t ? e.offsetWidth : e.offsetHeight,
							o = Ee(e),
							s = "border-box" === v.css(e, "boxSizing", !1, o);
						if (0 >= r || null == r) {
							if ((0 > (r = ke(e, t, o)) || null == r) && (r = e.style[t]), Ce.test(r)) return r;
							i = s && (h.boxSizingReliable() || r === e.style[t]), r = parseFloat(r) || 0
						}
						return r + Ie(e, t, n || (s ? "border" : "content"), i, o) + "px"
					}

					function qe(e, t) {
						for (var n, i, r, o = [], s = 0, a = e.length; a > s; s++)(i = e[s]).style && (o[s] = F.get(i, "olddisplay"), n = i.style.display, t ? (o[s] || "none" !== n || (i.style.display = ""), "" === i.style.display && X(i) && (o[s] = F.access(i, "olddisplay", we(i.nodeName)))) : (r = X(i), "none" === n && r || F.set(i, "olddisplay", r ? n : v.css(i, "display"))));
						for (s = 0; a > s; s++)(i = e[s]).style && (t && "none" !== i.style.display && "" !== i.style.display || (i.style.display = t ? o[s] || "" : "none"));
						return e
					}

					function He(e, t, n, i, r) {
						return new He.prototype.init(e, t, n, i, r)
					}
					v.extend({
						cssHooks: {
							opacity: {
								get: function(e, t) {
									if (t) {
										var n = ke(e, "opacity");
										return "" === n ? "1" : n
									}
								}
							}
						},
						cssNumber: {
							columnCount: !0,
							fillOpacity: !0,
							flexGrow: !0,
							flexShrink: !0,
							fontWeight: !0,
							lineHeight: !0,
							opacity: !0,
							order: !0,
							orphans: !0,
							widows: !0,
							zIndex: !0,
							zoom: !0
						},
						cssProps: {
							float: "cssFloat"
						},
						style: function(e, t, n, r) {
							if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
								var o, s, a, u = v.camelCase(t),
									c = e.style;
								return t = v.cssProps[u] || (v.cssProps[u] = _e(c, u)), a = v.cssHooks[t] || v.cssHooks[u], void 0 === n ? a && "get" in a && void 0 !== (o = a.get(e, !1, r)) ? o : c[t] : ("string" === (s = i(n)) && (o = De.exec(n)) && (n = (o[1] + 1) * o[2] + parseFloat(v.css(e, t)), s = "number"), void(null != n && n == n && ("number" !== s || v.cssNumber[u] || (n += "px"), h.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (c[t] = "inherit"), a && "set" in a && void 0 === (n = a.set(e, n, r)) || (c[t] = n))))
							}
						},
						css: function(e, t, n, i) {
							var r, o, s, a = v.camelCase(t);
							return t = v.cssProps[a] || (v.cssProps[a] = _e(e.style, a)), (s = v.cssHooks[t] || v.cssHooks[a]) && "get" in s && (r = s.get(e, !0, n)), void 0 === r && (r = ke(e, t, i)), "normal" === r && t in Ae && (r = Ae[t]), "" === n || n ? (o = parseFloat(r), !0 === n || v.isNumeric(o) ? o || 0 : r) : r
						}
					}), v.each(["height", "width"], (function(e, t) {
						v.cssHooks[t] = {
							get: function(e, n, i) {
								return n ? Ne.test(v.css(e, "display")) && 0 === e.offsetWidth ? v.swap(e, Oe, (function() {
									return Re(e, t, i)
								})) : Re(e, t, i) : void 0
							},
							set: function(e, n, i) {
								var r = i && Ee(e);
								return Pe(0, n, i ? Ie(e, t, i, "border-box" === v.css(e, "boxSizing", !1, r), r) : 0)
							}
						}
					})), v.cssHooks.marginRight = Se(h.reliableMarginRight, (function(e, t) {
						return t ? v.swap(e, {
							display: "inline-block"
						}, ke, [e, "marginRight"]) : void 0
					})), v.each({
						margin: "",
						padding: "",
						border: "Width"
					}, (function(e, t) {
						v.cssHooks[e + t] = {
							expand: function(n) {
								for (var i = 0, r = {}, o = "string" == typeof n ? n.split(" ") : [n]; 4 > i; i++) r[e + U[i] + t] = o[i] || o[i - 2] || o[0];
								return r
							}
						}, Te.test(e) || (v.cssHooks[e + t].set = Pe)
					})), v.fn.extend({
						css: function(e, t) {
							return q(this, (function(e, t, n) {
								var i, r, o = {},
									s = 0;
								if (v.isArray(t)) {
									for (i = Ee(e), r = t.length; r > s; s++) o[t[s]] = v.css(e, t[s], !1, i);
									return o
								}
								return void 0 !== n ? v.style(e, t, n) : v.css(e, t)
							}), e, t, arguments.length > 1)
						},
						show: function() {
							return qe(this, !0)
						},
						hide: function() {
							return qe(this)
						},
						toggle: function(e) {
							return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each((function() {
								X(this) ? v(this).show() : v(this).hide()
							}))
						}
					}), v.Tween = He, He.prototype = {
						constructor: He,
						init: function(e, t, n, i, r, o) {
							this.elem = e, this.prop = n, this.easing = r || "swing", this.options = t, this.start = this.now = this.cur(), this.end = i, this.unit = o || (v.cssNumber[n] ? "" : "px")
						},
						cur: function() {
							var e = He.propHooks[this.prop];
							return e && e.get ? e.get(this) : He.propHooks._default.get(this)
						},
						run: function(e) {
							var t, n = He.propHooks[this.prop];
							return this.pos = t = this.options.duration ? v.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : He.propHooks._default.set(this), this
						}
					}, He.prototype.init.prototype = He.prototype, He.propHooks = {
						_default: {
							get: function(e) {
								var t;
								return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = v.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0 : e.elem[e.prop]
							},
							set: function(e) {
								v.fx.step[e.prop] ? v.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[v.cssProps[e.prop]] || v.cssHooks[e.prop]) ? v.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
							}
						}
					}, He.propHooks.scrollTop = He.propHooks.scrollLeft = {
						set: function(e) {
							e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
						}
					}, v.easing = {
						linear: function(e) {
							return e
						},
						swing: function(e) {
							return .5 - Math.cos(e * Math.PI) / 2
						}
					}, (v.fx = He.prototype.init).step = {};
					var Fe, Me, Be = /^(?:toggle|show|hide)$/,
						$e = new RegExp("^(?:([+-])=|)(" + z + ")([a-z%]*)$", "i"),
						We = /queueHooks$/,
						ze = [function(e, t, n) {
							var i, r, o, s, a, u, c, l = this,
								f = {},
								p = e.style,
								d = e.nodeType && X(e),
								h = F.get(e, "fxshow");
							for (i in n.queue || (null == (a = v._queueHooks(e, "fx")).unqueued && (a.unqueued = 0, u = a.empty.fire, a.empty.fire = function() {
									a.unqueued || u()
								}), a.unqueued++, l.always((function() {
									l.always((function() {
										a.unqueued--, v.queue(e, "fx").length || a.empty.fire()
									}))
								}))), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [p.overflow, p.overflowX, p.overflowY], c = v.css(e, "display"), "inline" === ("none" === c ? F.get(e, "olddisplay") || we(e.nodeName) : c) && "none" === v.css(e, "float") && (p.display = "inline-block")), n.overflow && (p.overflow = "hidden", l.always((function() {
									p.overflow = n.overflow[0], p.overflowX = n.overflow[1], p.overflowY = n.overflow[2]
								}))), t)
								if (r = t[i], Be.exec(r)) {
									if (delete t[i], o = o || "toggle" === r, r === (d ? "hide" : "show")) {
										if ("show" !== r || !h || void 0 === h[i]) continue;
										d = !0
									}
									f[i] = h && h[i] || v.style(e, i)
								} else c = void 0;
							if (v.isEmptyObject(f)) "inline" === ("none" === c ? we(e.nodeName) : c) && (p.display = c);
							else
								for (i in h ? "hidden" in h && (d = h.hidden) : h = F.access(e, "fxshow", {}), o && (h.hidden = !d), d ? v(e).show() : l.done((function() {
										v(e).hide()
									})), l.done((function() {
										var t;
										for (t in F.remove(e, "fxshow"), f) v.style(e, t, f[t])
									})), f) s = Qe(d ? h[i] : 0, i, l), i in h || (h[i] = s.start, d && (s.end = s.start, s.start = "width" === i || "height" === i ? 1 : 0))
						}],
						Ue = {
							"*": [function(e, t) {
								var n = this.createTween(e, t),
									i = n.cur(),
									r = $e.exec(t),
									o = r && r[3] || (v.cssNumber[e] ? "" : "px"),
									s = (v.cssNumber[e] || "px" !== o && +i) && $e.exec(v.css(n.elem, e)),
									a = 1,
									u = 20;
								if (s && s[3] !== o) {
									o = o || s[3], r = r || [], s = +i || 1;
									do {
										s /= a = a || ".5", v.style(n.elem, e, s + o)
									} while (a !== (a = n.cur() / i) && 1 !== a && --u)
								}
								return r && (s = n.start = +s || +i || 0, n.unit = o, n.end = r[1] ? s + (r[1] + 1) * r[2] : +r[2]), n
							}]
						};

					function Xe() {
						return setTimeout((function() {
							Fe = void 0
						})), Fe = v.now()
					}

					function Ve(e, t) {
						var n, i = 0,
							r = {
								height: e
							};
						for (t = t ? 1 : 0; 4 > i; i += 2 - t) r["margin" + (n = U[i])] = r["padding" + n] = e;
						return t && (r.opacity = r.width = e), r
					}

					function Qe(e, t, n) {
						for (var i, r = (Ue[t] || []).concat(Ue["*"]), o = 0, s = r.length; s > o; o++)
							if (i = r[o].call(n, t, e)) return i
					}

					function Ge(e, t, n) {
						var i, r, o = 0,
							s = ze.length,
							a = v.Deferred().always((function() {
								delete u.elem
							})),
							u = function() {
								if (r) return !1;
								for (var t = Fe || Xe(), n = Math.max(0, c.startTime + c.duration - t), i = 1 - (n / c.duration || 0), o = 0, s = c.tweens.length; s > o; o++) c.tweens[o].run(i);
								return a.notifyWith(e, [c, i, n]), 1 > i && s ? n : (a.resolveWith(e, [c]), !1)
							},
							c = a.promise({
								elem: e,
								props: v.extend({}, t),
								opts: v.extend(!0, {
									specialEasing: {}
								}, n),
								originalProperties: t,
								originalOptions: n,
								startTime: Fe || Xe(),
								duration: n.duration,
								tweens: [],
								createTween: function(t, n) {
									var i = v.Tween(e, c.opts, t, n, c.opts.specialEasing[t] || c.opts.easing);
									return c.tweens.push(i), i
								},
								stop: function(t) {
									var n = 0,
										i = t ? c.tweens.length : 0;
									if (r) return this;
									for (r = !0; i > n; n++) c.tweens[n].run(1);
									return t ? a.resolveWith(e, [c, t]) : a.rejectWith(e, [c, t]), this
								}
							}),
							l = c.props;
						for (function(e, t) {
								var n, i, r, o, s;
								for (n in e)
									if (r = t[i = v.camelCase(n)], o = e[n], v.isArray(o) && (r = o[1], o = e[n] = o[0]), n !== i && (e[i] = o, delete e[n]), (s = v.cssHooks[i]) && "expand" in s)
										for (n in o = s.expand(o), delete e[i], o) n in e || (e[n] = o[n], t[n] = r);
									else t[i] = r
							}(l, c.opts.specialEasing); s > o; o++)
							if (i = ze[o].call(c, e, l, c.opts)) return i;
						return v.map(l, Qe, c), v.isFunction(c.opts.start) && c.opts.start.call(e, c), v.fx.timer(v.extend(u, {
							elem: e,
							anim: c,
							queue: c.opts.queue
						})), c.progress(c.opts.progress).done(c.opts.done, c.opts.complete).fail(c.opts.fail).always(c.opts.always)
					}
					v.Animation = v.extend(Ge, {
							tweener: function(e, t) {
								v.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
								for (var n, i = 0, r = e.length; r > i; i++) n = e[i], Ue[n] = Ue[n] || [], Ue[n].unshift(t)
							},
							prefilter: function(e, t) {
								t ? ze.unshift(e) : ze.push(e)
							}
						}), v.speed = function(e, t, n) {
							var r = e && "object" == i(e) ? v.extend({}, e) : {
								complete: n || !n && t || v.isFunction(e) && e,
								duration: e,
								easing: n && t || t && !v.isFunction(t) && t
							};
							return r.duration = v.fx.off ? 0 : "number" == typeof r.duration ? r.duration : r.duration in v.fx.speeds ? v.fx.speeds[r.duration] : v.fx.speeds._default, (null == r.queue || !0 === r.queue) && (r.queue = "fx"), r.old = r.complete, r.complete = function() {
								v.isFunction(r.old) && r.old.call(this), r.queue && v.dequeue(this, r.queue)
							}, r
						}, v.fn.extend({
							fadeTo: function(e, t, n, i) {
								return this.filter(X).css("opacity", 0).show().end().animate({
									opacity: t
								}, e, n, i)
							},
							animate: function(e, t, n, i) {
								var r = v.isEmptyObject(e),
									o = v.speed(t, n, i),
									s = function() {
										var t = Ge(this, v.extend({}, e), o);
										(r || F.get(this, "finish")) && t.stop(!0)
									};
								return s.finish = s, r || !1 === o.queue ? this.each(s) : this.queue(o.queue, s)
							},
							stop: function(e, t, n) {
								var i = function(e) {
									var t = e.stop;
									delete e.stop, t(n)
								};
								return "string" != typeof e && (n = t, t = e, e = void 0), t && !1 !== e && this.queue(e || "fx", []), this.each((function() {
									var t = !0,
										r = null != e && e + "queueHooks",
										o = v.timers,
										s = F.get(this);
									if (r) s[r] && s[r].stop && i(s[r]);
									else
										for (r in s) s[r] && s[r].stop && We.test(r) && i(s[r]);
									for (r = o.length; r--;) o[r].elem !== this || null != e && o[r].queue !== e || (o[r].anim.stop(n), t = !1, o.splice(r, 1));
									(t || !n) && v.dequeue(this, e)
								}))
							},
							finish: function(e) {
								return !1 !== e && (e = e || "fx"), this.each((function() {
									var t, n = F.get(this),
										i = n[e + "queue"],
										r = n[e + "queueHooks"],
										o = v.timers,
										s = i ? i.length : 0;
									for (n.finish = !0, v.queue(this, e, []), r && r.stop && r.stop.call(this, !0), t = o.length; t--;) o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1));
									for (t = 0; s > t; t++) i[t] && i[t].finish && i[t].finish.call(this);
									delete n.finish
								}))
							}
						}), v.each(["toggle", "show", "hide"], (function(e, t) {
							var n = v.fn[t];
							v.fn[t] = function(e, i, r) {
								return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(Ve(t, !0), e, i, r)
							}
						})), v.each({
							slideDown: Ve("show"),
							slideUp: Ve("hide"),
							slideToggle: Ve("toggle"),
							fadeIn: {
								opacity: "show"
							},
							fadeOut: {
								opacity: "hide"
							},
							fadeToggle: {
								opacity: "toggle"
							}
						}, (function(e, t) {
							v.fn[e] = function(e, n, i) {
								return this.animate(t, e, n, i)
							}
						})), v.timers = [], v.fx.tick = function() {
							var e, t = 0,
								n = v.timers;
							for (Fe = v.now(); t < n.length; t++)(e = n[t])() || n[t] !== e || n.splice(t--, 1);
							n.length || v.fx.stop(), Fe = void 0
						}, v.fx.timer = function(e) {
							v.timers.push(e), e() ? v.fx.start() : v.timers.pop()
						}, v.fx.interval = 13, v.fx.start = function() {
							Me || (Me = setInterval(v.fx.tick, v.fx.interval))
						}, v.fx.stop = function() {
							clearInterval(Me), Me = null
						}, v.fx.speeds = {
							slow: 600,
							fast: 200,
							_default: 400
						}, v.fn.delay = function(e, t) {
							return e = v.fx && v.fx.speeds[e] || e, t = t || "fx", this.queue(t, (function(t, n) {
								var i = setTimeout(t, e);
								n.stop = function() {
									clearTimeout(i)
								}
							}))
						},
						function() {
							var e = g.createElement("input"),
								t = g.createElement("select"),
								n = t.appendChild(g.createElement("option"));
							e.type = "checkbox", h.checkOn = "" !== e.value, h.optSelected = n.selected, t.disabled = !0, h.optDisabled = !n.disabled, (e = g.createElement("input")).value = "t", e.type = "radio", h.radioValue = "t" === e.value
						}();
					var Ye, Ze = v.expr.attrHandle;
					v.fn.extend({
						attr: function(e, t) {
							return q(this, v.attr, e, t, arguments.length > 1)
						},
						removeAttr: function(e) {
							return this.each((function() {
								v.removeAttr(this, e)
							}))
						}
					}), v.extend({
						attr: function(e, t, n) {
							var r, o, s = e.nodeType;
							if (e && 3 !== s && 8 !== s && 2 !== s) return i(e.getAttribute) === Q ? v.prop(e, t, n) : (1 === s && v.isXMLDoc(e) || (t = t.toLowerCase(), r = v.attrHooks[t] || (v.expr.match.bool.test(t) ? Ye : void 0)), void 0 === n ? r && "get" in r && null !== (o = r.get(e, t)) ? o : null == (o = v.find.attr(e, t)) ? void 0 : o : null !== n ? r && "set" in r && void 0 !== (o = r.set(e, n, t)) ? o : (e.setAttribute(t, n + ""), n) : void v.removeAttr(e, t))
						},
						removeAttr: function(e, t) {
							var n, i, r = 0,
								o = t && t.match(P);
							if (o && 1 === e.nodeType)
								for (; n = o[r++];) i = v.propFix[n] || n, v.expr.match.bool.test(n) && (e[i] = !1), e.removeAttribute(n)
						},
						attrHooks: {
							type: {
								set: function(e, t) {
									if (!h.radioValue && "radio" === t && v.nodeName(e, "input")) {
										var n = e.value;
										return e.setAttribute("type", t), n && (e.value = n), t
									}
								}
							}
						}
					}), Ye = {
						set: function(e, t, n) {
							return !1 === t ? v.removeAttr(e, n) : e.setAttribute(n, n), n
						}
					}, v.each(v.expr.match.bool.source.match(/\w+/g), (function(e, t) {
						var n = Ze[t] || v.find.attr;
						Ze[t] = function(e, t, i) {
							var r, o;
							return i || (o = Ze[t], Ze[t] = r, r = null != n(e, t, i) ? t.toLowerCase() : null, Ze[t] = o), r
						}
					}));
					var Je = /^(?:input|select|textarea|button)$/i;
					v.fn.extend({
						prop: function(e, t) {
							return q(this, v.prop, e, t, arguments.length > 1)
						},
						removeProp: function(e) {
							return this.each((function() {
								delete this[v.propFix[e] || e]
							}))
						}
					}), v.extend({
						propFix: {
							for: "htmlFor",
							class: "className"
						},
						prop: function(e, t, n) {
							var i, r, o = e.nodeType;
							if (e && 3 !== o && 8 !== o && 2 !== o) return (1 !== o || !v.isXMLDoc(e)) && (t = v.propFix[t] || t, r = v.propHooks[t]), void 0 !== n ? r && "set" in r && void 0 !== (i = r.set(e, n, t)) ? i : e[t] = n : r && "get" in r && null !== (i = r.get(e, t)) ? i : e[t]
						},
						propHooks: {
							tabIndex: {
								get: function(e) {
									return e.hasAttribute("tabindex") || Je.test(e.nodeName) || e.href ? e.tabIndex : -1
								}
							}
						}
					}), h.optSelected || (v.propHooks.selected = {
						get: function(e) {
							var t = e.parentNode;
							return t && t.parentNode && t.parentNode.selectedIndex, null
						}
					}), v.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], (function() {
						v.propFix[this.toLowerCase()] = this
					}));
					var Ke = /[\t\r\n\f]/g;
					v.fn.extend({
						addClass: function(e) {
							var t, n, i, r, o, s, a = "string" == typeof e && e,
								u = 0,
								c = this.length;
							if (v.isFunction(e)) return this.each((function(t) {
								v(this).addClass(e.call(this, t, this.className))
							}));
							if (a)
								for (t = (e || "").match(P) || []; c > u; u++)
									if (i = 1 === (n = this[u]).nodeType && (n.className ? (" " + n.className + " ").replace(Ke, " ") : " ")) {
										for (o = 0; r = t[o++];) i.indexOf(" " + r + " ") < 0 && (i += r + " ");
										s = v.trim(i), n.className !== s && (n.className = s)
									} return this
						},
						removeClass: function(e) {
							var t, n, i, r, o, s, a = 0 === arguments.length || "string" == typeof e && e,
								u = 0,
								c = this.length;
							if (v.isFunction(e)) return this.each((function(t) {
								v(this).removeClass(e.call(this, t, this.className))
							}));
							if (a)
								for (t = (e || "").match(P) || []; c > u; u++)
									if (i = 1 === (n = this[u]).nodeType && (n.className ? (" " + n.className + " ").replace(Ke, " ") : "")) {
										for (o = 0; r = t[o++];)
											for (; i.indexOf(" " + r + " ") >= 0;) i = i.replace(" " + r + " ", " ");
										s = e ? v.trim(i) : "", n.className !== s && (n.className = s)
									} return this
						},
						toggleClass: function(e, t) {
							var n = i(e);
							return "boolean" == typeof t && "string" === n ? t ? this.addClass(e) : this.removeClass(e) : this.each(v.isFunction(e) ? function(n) {
								v(this).toggleClass(e.call(this, n, this.className, t), t)
							} : function() {
								if ("string" === n)
									for (var t, i = 0, r = v(this), o = e.match(P) || []; t = o[i++];) r.hasClass(t) ? r.removeClass(t) : r.addClass(t);
								else(n === Q || "boolean" === n) && (this.className && F.set(this, "__className__", this.className), this.className = this.className || !1 === e ? "" : F.get(this, "__className__") || "")
							})
						},
						hasClass: function(e) {
							for (var t = " " + e + " ", n = 0, i = this.length; i > n; n++)
								if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(Ke, " ").indexOf(t) >= 0) return !0;
							return !1
						}
					});
					var et = /\r/g;
					v.fn.extend({
						val: function(e) {
							var t, n, i, r = this[0];
							return arguments.length ? (i = v.isFunction(e), this.each((function(n) {
								var r;
								1 === this.nodeType && (null == (r = i ? e.call(this, n, v(this).val()) : e) ? r = "" : "number" == typeof r ? r += "" : v.isArray(r) && (r = v.map(r, (function(e) {
									return null == e ? "" : e + ""
								}))), (t = v.valHooks[this.type] || v.valHooks[this.nodeName.toLowerCase()]) && "set" in t && void 0 !== t.set(this, r, "value") || (this.value = r))
							}))) : r ? (t = v.valHooks[r.type] || v.valHooks[r.nodeName.toLowerCase()]) && "get" in t && void 0 !== (n = t.get(r, "value")) ? n : "string" == typeof(n = r.value) ? n.replace(et, "") : null == n ? "" : n : void 0
						}
					}), v.extend({
						valHooks: {
							option: {
								get: function(e) {
									var t = v.find.attr(e, "value");
									return null != t ? t : v.trim(v.text(e))
								}
							},
							select: {
								get: function(e) {
									for (var t, n, i = e.options, r = e.selectedIndex, o = "select-one" === e.type || 0 > r, s = o ? null : [], a = o ? r + 1 : i.length, u = 0 > r ? a : o ? r : 0; a > u; u++)
										if (!(!(n = i[u]).selected && u !== r || (h.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && v.nodeName(n.parentNode, "optgroup"))) {
											if (t = v(n).val(), o) return t;
											s.push(t)
										} return s
								},
								set: function(e, t) {
									for (var n, i, r = e.options, o = v.makeArray(t), s = r.length; s--;)((i = r[s]).selected = v.inArray(i.value, o) >= 0) && (n = !0);
									return n || (e.selectedIndex = -1), o
								}
							}
						}
					}), v.each(["radio", "checkbox"], (function() {
						v.valHooks[this] = {
							set: function(e, t) {
								return v.isArray(t) ? e.checked = v.inArray(v(e).val(), t) >= 0 : void 0
							}
						}, h.checkOn || (v.valHooks[this].get = function(e) {
							return null === e.getAttribute("value") ? "on" : e.value
						})
					})), v.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), (function(e, t) {
						v.fn[t] = function(e, n) {
							return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
						}
					})), v.fn.extend({
						hover: function(e, t) {
							return this.mouseenter(e).mouseleave(t || e)
						},
						bind: function(e, t, n) {
							return this.on(e, null, t, n)
						},
						unbind: function(e, t) {
							return this.off(e, null, t)
						},
						delegate: function(e, t, n, i) {
							return this.on(t, e, n, i)
						},
						undelegate: function(e, t, n) {
							return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
						}
					});
					var tt = v.now(),
						nt = /\?/;
					v.parseJSON = function(e) {
						return JSON.parse(e + "")
					}, v.parseXML = function(e) {
						var t;
						if (!e || "string" != typeof e) return null;
						try {
							t = (new DOMParser).parseFromString(e, "text/xml")
						} catch (e) {
							t = void 0
						}
						return (!t || t.getElementsByTagName("parsererror").length) && v.error("Invalid XML: " + e), t
					};
					var it, rt, ot = /#.*$/,
						st = /([?&])_=[^&]*/,
						at = /^(.*?):[ \t]*([^\r\n]*)$/gm,
						ut = /^(?:GET|HEAD)$/,
						ct = /^\/\//,
						lt = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,
						ft = {},
						pt = {},
						dt = "*/".concat("*");
					try {
						rt = location.href
					} catch (e) {
						(rt = g.createElement("a")).href = "", rt = rt.href
					}

					function ht(e) {
						return function(t, n) {
							"string" != typeof t && (n = t, t = "*");
							var i, r = 0,
								o = t.toLowerCase().match(P) || [];
							if (v.isFunction(n))
								for (; i = o[r++];) "+" === i[0] ? (i = i.slice(1) || "*", (e[i] = e[i] || []).unshift(n)) : (e[i] = e[i] || []).push(n)
						}
					}

					function gt(e, t, n, i) {
						var r = {},
							o = e === pt;

						function s(a) {
							var u;
							return r[a] = !0, v.each(e[a] || [], (function(e, a) {
								var c = a(t, n, i);
								return "string" != typeof c || o || r[c] ? o ? !(u = c) : void 0 : (t.dataTypes.unshift(c), s(c), !1)
							})), u
						}
						return s(t.dataTypes[0]) || !r["*"] && s("*")
					}

					function mt(e, t) {
						var n, i, r = v.ajaxSettings.flatOptions || {};
						for (n in t) void 0 !== t[n] && ((r[n] ? e : i || (i = {}))[n] = t[n]);
						return i && v.extend(!0, e, i), e
					}
					it = lt.exec(rt.toLowerCase()) || [], v.extend({
						active: 0,
						lastModified: {},
						etag: {},
						ajaxSettings: {
							url: rt,
							type: "GET",
							isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(it[1]),
							global: !0,
							processData: !0,
							async: !0,
							contentType: "application/x-www-form-urlencoded; charset=UTF-8",
							accepts: {
								"*": dt,
								text: "text/plain",
								html: "text/html",
								xml: "application/xml, text/xml",
								json: "application/json, text/javascript"
							},
							contents: {
								xml: /xml/,
								html: /html/,
								json: /json/
							},
							responseFields: {
								xml: "responseXML",
								text: "responseText",
								json: "responseJSON"
							},
							converters: {
								"* text": String,
								"text html": !0,
								"text json": v.parseJSON,
								"text xml": v.parseXML
							},
							flatOptions: {
								url: !0,
								context: !0
							}
						},
						ajaxSetup: function(e, t) {
							return t ? mt(mt(e, v.ajaxSettings), t) : mt(v.ajaxSettings, e)
						},
						ajaxPrefilter: ht(ft),
						ajaxTransport: ht(pt),
						ajax: function(e, t) {
							"object" == i(e) && (t = e, e = void 0);
							var n, r, o, s, a, u, c, l, f = v.ajaxSetup({}, t = t || {}),
								p = f.context || f,
								d = f.context && (p.nodeType || p.jquery) ? v(p) : v.event,
								h = v.Deferred(),
								g = v.Callbacks("once memory"),
								m = f.statusCode || {},
								y = {},
								b = {},
								x = 0,
								w = "canceled",
								T = {
									readyState: 0,
									getResponseHeader: function(e) {
										var t;
										if (2 === x) {
											if (!s)
												for (s = {}; t = at.exec(o);) s[t[1].toLowerCase()] = t[2];
											t = s[e.toLowerCase()]
										}
										return null == t ? null : t
									},
									getAllResponseHeaders: function() {
										return 2 === x ? o : null
									},
									setRequestHeader: function(e, t) {
										var n = e.toLowerCase();
										return x || (e = b[n] = b[n] || e, y[e] = t), this
									},
									overrideMimeType: function(e) {
										return x || (f.mimeType = e), this
									},
									statusCode: function(e) {
										var t;
										if (e)
											if (2 > x)
												for (t in e) m[t] = [m[t], e[t]];
											else T.always(e[T.status]);
										return this
									},
									abort: function(e) {
										var t = e || w;
										return n && n.abort(t), C(0, t), this
									}
								};
							if (h.promise(T).complete = g.add, T.success = T.done, T.error = T.fail, f.url = ((e || f.url || rt) + "").replace(ot, "").replace(ct, it[1] + "//"), f.type = t.method || t.type || f.method || f.type, f.dataTypes = v.trim(f.dataType || "*").toLowerCase().match(P) || [""], null == f.crossDomain && (u = lt.exec(f.url.toLowerCase()), f.crossDomain = !(!u || u[1] === it[1] && u[2] === it[2] && (u[3] || ("http:" === u[1] ? "80" : "443")) === (it[3] || ("http:" === it[1] ? "80" : "443")))), f.data && f.processData && "string" != typeof f.data && (f.data = v.param(f.data, f.traditional)), gt(ft, f, t, T), 2 === x) return T;
							for (l in (c = f.global) && 0 == v.active++ && v.event.trigger("ajaxStart"), f.type = f.type.toUpperCase(), f.hasContent = !ut.test(f.type), r = f.url, f.hasContent || (f.data && (r = f.url += (nt.test(r) ? "&" : "?") + f.data, delete f.data), !1 === f.cache && (f.url = st.test(r) ? r.replace(st, "$1_=" + tt++) : r + (nt.test(r) ? "&" : "?") + "_=" + tt++)), f.ifModified && (v.lastModified[r] && T.setRequestHeader("If-Modified-Since", v.lastModified[r]), v.etag[r] && T.setRequestHeader("If-None-Match", v.etag[r])), (f.data && f.hasContent && !1 !== f.contentType || t.contentType) && T.setRequestHeader("Content-Type", f.contentType), T.setRequestHeader("Accept", f.dataTypes[0] && f.accepts[f.dataTypes[0]] ? f.accepts[f.dataTypes[0]] + ("*" !== f.dataTypes[0] ? ", " + dt + "; q=0.01" : "") : f.accepts["*"]), f.headers) T.setRequestHeader(l, f.headers[l]);
							if (f.beforeSend && (!1 === f.beforeSend.call(p, T, f) || 2 === x)) return T.abort();
							for (l in w = "abort", {
									success: 1,
									error: 1,
									complete: 1
								}) T[l](f[l]);
							if (n = gt(pt, f, t, T)) {
								T.readyState = 1, c && d.trigger("ajaxSend", [T, f]), f.async && f.timeout > 0 && (a = setTimeout((function() {
									T.abort("timeout")
								}), f.timeout));
								try {
									x = 1, n.send(y, C)
								} catch (e) {
									if (!(2 > x)) throw e;
									C(-1, e)
								}
							} else C(-1, "No Transport");

							function C(e, t, i, s) {
								var u, l, y, b, w, C = t;
								2 !== x && (x = 2, a && clearTimeout(a), n = void 0, o = s || "", T.readyState = e > 0 ? 4 : 0, u = e >= 200 && 300 > e || 304 === e, i && (b = function(e, t, n) {
									for (var i, r, o, s, a = e.contents, u = e.dataTypes;
										"*" === u[0];) u.shift(), void 0 === i && (i = e.mimeType || t.getResponseHeader("Content-Type"));
									if (i)
										for (r in a)
											if (a[r] && a[r].test(i)) {
												u.unshift(r);
												break
											} if (u[0] in n) o = u[0];
									else {
										for (r in n) {
											if (!u[0] || e.converters[r + " " + u[0]]) {
												o = r;
												break
											}
											s || (s = r)
										}
										o = o || s
									}
									return o ? (o !== u[0] && u.unshift(o), n[o]) : void 0
								}(f, T, i)), b = function(e, t, n, i) {
									var r, o, s, a, u, c = {},
										l = e.dataTypes.slice();
									if (l[1])
										for (s in e.converters) c[s.toLowerCase()] = e.converters[s];
									for (o = l.shift(); o;)
										if (e.responseFields[o] && (n[e.responseFields[o]] = t), !u && i && e.dataFilter && (t = e.dataFilter(t, e.dataType)), u = o, o = l.shift())
											if ("*" === o) o = u;
											else if ("*" !== u && u !== o) {
										if (!(s = c[u + " " + o] || c["* " + o]))
											for (r in c)
												if ((a = r.split(" "))[1] === o && (s = c[u + " " + a[0]] || c["* " + a[0]])) {
													!0 === s ? s = c[r] : !0 !== c[r] && (o = a[0], l.unshift(a[1]));
													break
												} if (!0 !== s)
											if (s && e.throws) t = s(t);
											else try {
												t = s(t)
											} catch (e) {
												return {
													state: "parsererror",
													error: s ? e : "No conversion from " + u + " to " + o
												}
											}
									}
									return {
										state: "success",
										data: t
									}
								}(f, b, T, u), u ? (f.ifModified && ((w = T.getResponseHeader("Last-Modified")) && (v.lastModified[r] = w), (w = T.getResponseHeader("etag")) && (v.etag[r] = w)), 204 === e || "HEAD" === f.type ? C = "nocontent" : 304 === e ? C = "notmodified" : (C = b.state, l = b.data, u = !(y = b.error))) : (y = C, (e || !C) && (C = "error", 0 > e && (e = 0))), T.status = e, T.statusText = (t || C) + "", u ? h.resolveWith(p, [l, C, T]) : h.rejectWith(p, [T, C, y]), T.statusCode(m), m = void 0, c && d.trigger(u ? "ajaxSuccess" : "ajaxError", [T, f, u ? l : y]), g.fireWith(p, [T, C]), c && (d.trigger("ajaxComplete", [T, f]), --v.active || v.event.trigger("ajaxStop")))
							}
							return T
						},
						getJSON: function(e, t, n) {
							return v.get(e, t, n, "json")
						},
						getScript: function(e, t) {
							return v.get(e, void 0, t, "script")
						}
					}), v.each(["get", "post"], (function(e, t) {
						v[t] = function(e, n, i, r) {
							return v.isFunction(n) && (r = r || i, i = n, n = void 0), v.ajax({
								url: e,
								type: t,
								dataType: r,
								data: n,
								success: i
							})
						}
					})), v.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], (function(e, t) {
						v.fn[t] = function(e) {
							return this.on(t, e)
						}
					})), v._evalUrl = function(e) {
						return v.ajax({
							url: e,
							type: "GET",
							dataType: "script",
							async: !1,
							global: !1,
							throws: !0
						})
					}, v.fn.extend({
						wrapAll: function(e) {
							var t;
							return v.isFunction(e) ? this.each((function(t) {
								v(this).wrapAll(e.call(this, t))
							})) : (this[0] && (t = v(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map((function() {
								for (var e = this; e.firstElementChild;) e = e.firstElementChild;
								return e
							})).append(this)), this)
						},
						wrapInner: function(e) {
							return this.each(v.isFunction(e) ? function(t) {
								v(this).wrapInner(e.call(this, t))
							} : function() {
								var t = v(this),
									n = t.contents();
								n.length ? n.wrapAll(e) : t.append(e)
							})
						},
						wrap: function(e) {
							var t = v.isFunction(e);
							return this.each((function(n) {
								v(this).wrapAll(t ? e.call(this, n) : e)
							}))
						},
						unwrap: function() {
							return this.parent().each((function() {
								v.nodeName(this, "body") || v(this).replaceWith(this.childNodes)
							})).end()
						}
					}), v.expr.filters.hidden = function(e) {
						return e.offsetWidth <= 0 && e.offsetHeight <= 0
					}, v.expr.filters.visible = function(e) {
						return !v.expr.filters.hidden(e)
					};
					var vt = /%20/g,
						yt = /\[\]$/,
						bt = /\r?\n/g,
						xt = /^(?:submit|button|image|reset|file)$/i,
						wt = /^(?:input|select|textarea|keygen)/i;

					function Tt(e, t, n, r) {
						var o;
						if (v.isArray(t)) v.each(t, (function(t, o) {
							n || yt.test(e) ? r(e, o) : Tt(e + "[" + ("object" == i(o) ? t : "") + "]", o, n, r)
						}));
						else if (n || "object" !== v.type(t)) r(e, t);
						else
							for (o in t) Tt(e + "[" + o + "]", t[o], n, r)
					}
					v.param = function(e, t) {
						var n, i = [],
							r = function(e, t) {
								t = v.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
							};
						if (void 0 === t && (t = v.ajaxSettings && v.ajaxSettings.traditional), v.isArray(e) || e.jquery && !v.isPlainObject(e)) v.each(e, (function() {
							r(this.name, this.value)
						}));
						else
							for (n in e) Tt(n, e[n], t, r);
						return i.join("&").replace(vt, "+")
					}, v.fn.extend({
						serialize: function() {
							return v.param(this.serializeArray())
						},
						serializeArray: function() {
							return this.map((function() {
								var e = v.prop(this, "elements");
								return e ? v.makeArray(e) : this
							})).filter((function() {
								var e = this.type;
								return this.name && !v(this).is(":disabled") && wt.test(this.nodeName) && !xt.test(e) && (this.checked || !V.test(e))
							})).map((function(e, t) {
								var n = v(this).val();
								return null == n ? null : v.isArray(n) ? v.map(n, (function(e) {
									return {
										name: t.name,
										value: e.replace(bt, "\r\n")
									}
								})) : {
									name: t.name,
									value: n.replace(bt, "\r\n")
								}
							})).get()
						}
					}), v.ajaxSettings.xhr = function() {
						try {
							return new XMLHttpRequest
						} catch (e) {}
					};
					var Ct = 0,
						Et = {},
						kt = {
							0: 200,
							1223: 204
						},
						St = v.ajaxSettings.xhr();
					r.ActiveXObject && v(r).on("unload", (function() {
						for (var e in Et) Et[e]()
					})), h.cors = !!St && "withCredentials" in St, h.ajax = St = !!St, v.ajaxTransport((function(e) {
						var t;
						return h.cors || St && !e.crossDomain ? {
							send: function(n, i) {
								var r, o = e.xhr(),
									s = ++Ct;
								if (o.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields)
									for (r in e.xhrFields) o[r] = e.xhrFields[r];
								for (r in e.mimeType && o.overrideMimeType && o.overrideMimeType(e.mimeType), e.crossDomain || n["X-Requested-With"] || (n["X-Requested-With"] = "XMLHttpRequest"), n) o.setRequestHeader(r, n[r]);
								t = function(e) {
									return function() {
										t && (delete Et[s], t = o.onload = o.onerror = null, "abort" === e ? o.abort() : "error" === e ? i(o.status, o.statusText) : i(kt[o.status] || o.status, o.statusText, "string" == typeof o.responseText ? {
											text: o.responseText
										} : void 0, o.getAllResponseHeaders()))
									}
								}, o.onload = t(), o.onerror = t("error"), t = Et[s] = t("abort");
								try {
									o.send(e.hasContent && e.data || null)
								} catch (e) {
									if (t) throw e
								}
							},
							abort: function() {
								t && t()
							}
						} : void 0
					})), v.ajaxSetup({
						accepts: {
							script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
						},
						contents: {
							script: /(?:java|ecma)script/
						},
						converters: {
							"text script": function(e) {
								return v.globalEval(e), e
							}
						}
					}), v.ajaxPrefilter("script", (function(e) {
						void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET")
					})), v.ajaxTransport("script", (function(e) {
						var t, n;
						if (e.crossDomain) return {
							send: function(i, r) {
								t = v("<script>").prop({
									async: !0,
									charset: e.scriptCharset,
									src: e.url
								}).on("load error", n = function(e) {
									t.remove(), n = null, e && r("error" === e.type ? 404 : 200, e.type)
								}), g.head.appendChild(t[0])
							},
							abort: function() {
								n && n()
							}
						}
					}));
					var Nt = [],
						jt = /(=)\?(?=&|$)|\?\?/;
					v.ajaxSetup({
						jsonp: "callback",
						jsonpCallback: function() {
							var e = Nt.pop() || v.expando + "_" + tt++;
							return this[e] = !0, e
						}
					}), v.ajaxPrefilter("json jsonp", (function(e, t, n) {
						var i, o, s, a = !1 !== e.jsonp && (jt.test(e.url) ? "url" : "string" == typeof e.data && !(e.contentType || "").indexOf("application/x-www-form-urlencoded") && jt.test(e.data) && "data");
						return a || "jsonp" === e.dataTypes[0] ? (i = e.jsonpCallback = v.isFunction(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback, a ? e[a] = e[a].replace(jt, "$1" + i) : !1 !== e.jsonp && (e.url += (nt.test(e.url) ? "&" : "?") + e.jsonp + "=" + i), e.converters["script json"] = function() {
							return s || v.error(i + " was not called"), s[0]
						}, e.dataTypes[0] = "json", o = r[i], r[i] = function() {
							s = arguments
						}, n.always((function() {
							r[i] = o, e[i] && (e.jsonpCallback = t.jsonpCallback, Nt.push(i)), s && v.isFunction(o) && o(s[0]), s = o = void 0
						})), "script") : void 0
					})), v.parseHTML = function(e, t, n) {
						if (!e || "string" != typeof e) return null;
						"boolean" == typeof t && (n = t, t = !1), t = t || g;
						var i = k.exec(e),
							r = !n && [];
						return i ? [t.createElement(i[1])] : (i = v.buildFragment([e], t, r), r && r.length && v(r).remove(), v.merge([], i.childNodes))
					};
					var Dt = v.fn.load;
					v.fn.load = function(e, t, n) {
						if ("string" != typeof e && Dt) return Dt.apply(this, arguments);
						var r, o, s, a = this,
							u = e.indexOf(" ");
						return u >= 0 && (r = v.trim(e.slice(u)), e = e.slice(0, u)), v.isFunction(t) ? (n = t, t = void 0) : t && "object" == i(t) && (o = "POST"), a.length > 0 && v.ajax({
							url: e,
							type: o,
							dataType: "html",
							data: t
						}).done((function(e) {
							s = arguments, a.html(r ? v("<div>").append(v.parseHTML(e)).find(r) : e)
						})).complete(n && function(e, t) {
							a.each(n, s || [e.responseText, t, e])
						}), this
					}, v.expr.filters.animated = function(e) {
						return v.grep(v.timers, (function(t) {
							return e === t.elem
						})).length
					};
					var Ot = r.document.documentElement;

					function At(e) {
						return v.isWindow(e) ? e : 9 === e.nodeType && e.defaultView
					}
					v.offset = {
						setOffset: function(e, t, n) {
							var i, r, o, s, a, u, c = v.css(e, "position"),
								l = v(e),
								f = {};
							"static" === c && (e.style.position = "relative"), a = l.offset(), o = v.css(e, "top"), u = v.css(e, "left"), ("absolute" === c || "fixed" === c) && (o + u).indexOf("auto") > -1 ? (s = (i = l.position()).top, r = i.left) : (s = parseFloat(o) || 0, r = parseFloat(u) || 0), v.isFunction(t) && (t = t.call(e, n, a)), null != t.top && (f.top = t.top - a.top + s), null != t.left && (f.left = t.left - a.left + r), "using" in t ? t.using.call(e, f) : l.css(f)
						}
					}, v.fn.extend({
						offset: function(e) {
							if (arguments.length) return void 0 === e ? this : this.each((function(t) {
								v.offset.setOffset(this, e, t)
							}));
							var t, n, r = this[0],
								o = {
									top: 0,
									left: 0
								},
								s = r && r.ownerDocument;
							return s ? (t = s.documentElement, v.contains(t, r) ? (i(r.getBoundingClientRect) !== Q && (o = r.getBoundingClientRect()), n = At(s), {
								top: o.top + n.pageYOffset - t.clientTop,
								left: o.left + n.pageXOffset - t.clientLeft
							}) : o) : void 0
						},
						position: function() {
							if (this[0]) {
								var e, t, n = this[0],
									i = {
										top: 0,
										left: 0
									};
								return "fixed" === v.css(n, "position") ? t = n.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), v.nodeName(e[0], "html") || (i = e.offset()), i.top += v.css(e[0], "borderTopWidth", !0), i.left += v.css(e[0], "borderLeftWidth", !0)), {
									top: t.top - i.top - v.css(n, "marginTop", !0),
									left: t.left - i.left - v.css(n, "marginLeft", !0)
								}
							}
						},
						offsetParent: function() {
							return this.map((function() {
								for (var e = this.offsetParent || Ot; e && !v.nodeName(e, "html") && "static" === v.css(e, "position");) e = e.offsetParent;
								return e || Ot
							}))
						}
					}), v.each({
						scrollLeft: "pageXOffset",
						scrollTop: "pageYOffset"
					}, (function(e, t) {
						var n = "pageYOffset" === t;
						v.fn[e] = function(i) {
							return q(this, (function(e, i, o) {
								var s = At(e);
								return void 0 === o ? s ? s[t] : e[i] : void(s ? s.scrollTo(n ? r.pageXOffset : o, n ? o : r.pageYOffset) : e[i] = o)
							}), e, i, arguments.length, null)
						}
					})), v.each(["top", "left"], (function(e, t) {
						v.cssHooks[t] = Se(h.pixelPosition, (function(e, n) {
							return n ? (n = ke(e, t), Ce.test(n) ? v(e).position()[t] + "px" : n) : void 0
						}))
					})), v.each({
						Height: "height",
						Width: "width"
					}, (function(e, t) {
						v.each({
							padding: "inner" + e,
							content: t,
							"": "outer" + e
						}, (function(n, i) {
							v.fn[i] = function(i, r) {
								var o = arguments.length && (n || "boolean" != typeof i),
									s = n || (!0 === i || !0 === r ? "margin" : "border");
								return q(this, (function(t, n, i) {
									var r;
									return v.isWindow(t) ? t.document.documentElement["client" + e] : 9 === t.nodeType ? (r = t.documentElement, Math.max(t.body["scroll" + e], r["scroll" + e], t.body["offset" + e], r["offset" + e], r["client" + e])) : void 0 === i ? v.css(t, n, s) : v.style(t, n, i, s)
								}), t, o ? i : void 0, o, null)
							}
						}))
					})), v.fn.size = function() {
						return this.length
					}, v.fn.andSelf = v.fn.addBack, void 0 === (n = function() {
						return v
					}.apply(t, [])) || (e.exports = n);
					var Lt = r.jQuery,
						_t = r.$;
					return v.noConflict = function(e) {
						return r.$ === v && (r.$ = _t), e && r.jQuery === v && (r.jQuery = Lt), v
					}, i(o) === Q && (r.jQuery = r.$ = v), v
				}))
			}).call(this, n("YuTi")(e))
		}
	},
	[
		["g12X", "runtime"]
	]
]);
