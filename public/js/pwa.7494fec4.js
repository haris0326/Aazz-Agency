(window.webpackJsonp = window.webpackJsonp || []).push([
    ["js/Template/Common/PWA/pwa"], {
       aZ2y: function (n, t, e) {
          "use strict";
          e.r(t);
          e("xCat")
       },
       xCat: function (n, t) {
          var e, o = function () {
             function n() {}
             return n.prototype.tryDetectDeviceType = function () {
                if (document.hasFocus() && !window.matchMedia("(display-mode: fullscreen)").matches) {
                   var n = window.matchMedia("(display-mode: standalone)").matches || window.navigator.standalone ? "1" : "0";
                   document.cookie = "device_type_pwa=" + n + "; path=/"
                }
             }, n.prototype.init = function () {
                var n = this;
                setInterval((function () {
                   return n.tryDetectDeviceType()
                }), 500)
             }, n.isPwa = function () {
                return -1 !== document.cookie.indexOf("device_type_pwa=1")
             }, n
          }();
          (new o).init(),
             function (n) {
                var t = function () {
                   function n() {
                      this.config = null, this.LOCAL_STORAGE_KEY = "pwa_ios_was_installed"
                   }
                   return n.prototype.init = function (n) {
                      n && (this.config = n), window.addEventListener("appinstalled", this.sendAppInstalled.bind(this)), this.isIos() && this.setupInstallEventForIos()
                   }, n.prototype.sendBeforeInstallPrompt = function () {
                      this.sendGa("couldinstall")
                   }, n.prototype.sendDeferredInstallPrompt = function () {
                      this.sendGa("installed_viapopup")
                   }, n.prototype.sendAppInstalled = function (n) {
                      console.log("sendAppInstalled"), this.sendGa("installed_viamenu")
                   }, n.prototype.sendGa = function (n) {
                      var t, e;
                      (null === (t = this.config) || void 0 === t ? void 0 : t.appInstalledEvent) && this.config.appInstalledEvent(), (null === (e = this.config) || void 0 === e ? void 0 : e.userAgent) && (ʼ, gta("send", "event", "PWA", n, this.config.userAgent))
                   }, n.prototype.isIos = function () {
                      var n = window.navigator.userAgent.toLowerCase();
                      return /iphone|ipad|ipod/.test(n)
                   }, n.prototype.isInStandaloneMode = function () {
                      return "standalone" in window.navigator && window.navigator.standalone
                   }, n.prototype.setupInstallEventForIos = function () {
                      console.log("sendAppInstalled ios");
                      var n = localStorage.getItem(this.LOCAL_STORAGE_KEY);
                      !(!!n && JSON.parse(n)) && this.isInStandaloneMode() && (localStorage.setItem(this.LOCAL_STORAGE_KEY, "true"), this.config.appInstalledEvent())
                   }, n
                }();
                n.Event = t
             }(e || (e = {})), window.PWAEvent = e;
          var i = function () {
             function n() {}
             return n.prototype.init = function () {
                $(document).on("click", "a.js-pwa-link-open-one-window", this.handlerClick)
             }, n.prototype.handlerClick = function (n) {
                o.isPwa() && (n.preventDefault(), window.location = this.href)
             }, n
          }();
          document.addEventListener("DOMContentLoaded", (function () {
             (new i).init()
          }))
       }
    },
    [
       ["aZ2y", "runtime"]
    ]
 ]);
