(this.webpackJSONPwpmdb=this.webpackJSONPwpmdb||[]).push([[5],{589:function(e,t,n){"use strict";n.r(t);var c=n(12),a=n(0),r=n.n(a),i=n(120),s=n(9),u=n(1),o=n(34),b=n(39),l=n(3),f=n.n(l),p=n(8),_=n(5),d=(n(71),n(2),n(25),"SET_API_DATA"),O="UPDATE_LICENSE_ERRORS",j="SET_LICENSE_STATUS",m="SET_LICENSE_SAVED",v="SET_LICENCE_UI_STATUS",k="SET_API_TIME",E="SET_DBI_DOWN_STATUS",h=(window.wpmdb_data.licence_status,window.wpmdb_data.api_data,n(142)),w=n(6),x=n(53),S=n(101),g=n(4),T=function(e){return e.dbi_api_data};function y(e){return function(){var t=Object(p.a)(f.a.mark(function t(n){return f.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,n(Object(w.c)({preRequest:Object(s.b)(function(){n(Object(x.c)("licence_action",!0)),n(Object(x.a)("licence"))}),asyncFn:e,requestFailed:function(e){var t,c;n((t=e,c="licence_action",function(e){return e(Object(x.d)("licence",Object(u.a)("API error: ")+Object(S.a)(t))),e(Object(x.c)(c,!1)),!1}))},requestSuccess:function(e){n(Object(x.c)("licence_action",!1))}}));case 2:return t.abrupt("return",t.sent);case 3:case"end":return t.stop()}},t)}));return function(e){return t.apply(this,arguments)}}()}function N(e,t){return function(n){var a=e.data,r=a.errors;if(r){if(n(Object(x.c)(t,!1)),Object.keys(r).length>0){var i=Object.keys(r),s=Object(c.a)(i,1)[0];a.hasOwnProperty("licence_status")&&(s=a.licence_status),n(I(s))}n(Object(_.a)(O,r))}else n(I("active_licence"))}}function A(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:y,t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];return function(){var n=Object(p.a)(f.a.mark(function n(c,a){var r,i,u,o,l;return f.a.wrap(function(n){for(;;)switch(n.prev=n.next){case 0:if(r=Object(b.a)("licence",a()),f="api_time",p=a(),i=Object(g.c)(T,"settings",f,p),u=Date.now()-i,36e5,t||!(u<36e5)){n.next=6;break}return n.abrupt("return");case 6:return n.next=8,c(e(Object(w.b)("/check-license",{licence:r,context:"all",message_context:"settings"},!1,c)));case 8:if(o=n.sent){n.next=11;break}return n.abrupt("return",null);case 11:return l=o.data,c(N(o,"check_licence")),Object(s.b)(function(){c(Object(_.a)(d,o.data)),c(Object(_.a)(k,Date.now())),t&&c(Object(h.b)())}),n.abrupt("return",l);case 15:case"end":return n.stop()}var f,p},n)}));return function(e,t){return n.apply(this,arguments)}}()}function I(e){return function(){var t=Object(p.a)(f.a.mark(function t(n){return f.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.abrupt("return",n(Object(_.a)(j,e)));case 1:case"end":return t.stop()}},t)}));return function(e){return t.apply(this,arguments)}}()}var C=Object(s.c)(function(e){return{settingsStatus:Object(b.a)("status",e)}},{checkLicenceAgain:function(e,t){return function(){var n=Object(p.a)(f.a.mark(function n(c,a){var r,i;return f.a.wrap(function(n){for(;;)switch(n.prev=n.next){case 0:return c(Object(x.c)("check_again",!0)),r=y,e&&!t&&(r=function(){return t=e,function(){var e=Object(p.a)(f.a.mark(function e(n){var c,a,r,i;return f.a.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,n(y(Object(w.b)("/activate-license",{licence_key:t,context:"all",message_context:"settings"},!1,n)));case 2:if(c=e.sent){e.next=5;break}return e.abrupt("return",null);case 5:if(a=c.data,r=a.errors,i=a.error_type,n(N(c,"licence_action")),"undefined"!==typeof c.data.dbrains_api_down?(n(Object(_.a)(E,!0)),n(Object(h.b)()),n(A())):n(Object(_.a)(E,!1)),!r){e.next=11;break}if(Object.keys(r).includes("subscription_expired")){e.next=11;break}return e.abrupt("return",!1);case 11:return 1===Number(c.data.is_first_activation)&&"subscription_expired"!==i&&n(Object(_.a)(v,"first_activation")),"subscription_expired"!==i&&n(Object(_.a)(m,!0)),c.success&&c.data&&Object(s.b)(Object(p.a)(f.a.mark(function e(){return f.a.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:"subscription_expired"!==i&&n(I("active_licence")),n(Object(h.b)()),n(Object(x.f)("masked_licence",c.data.masked_licence)),n(Object(_.a)(d,c.data)),"subscription_expired"!==i&&n(Object(_.a)(O,[])),n(A());case 6:case"end":return e.stop()}},e)}))),setTimeout(function(){n(Object(_.a)(m,!1))},2500),e.abrupt("return",c);case 16:case"end":return e.stop()}},e)}));return function(t){return e.apply(this,arguments)}}();var t}),n.next=5,c(A(r,!0));case 5:return i=n.sent,c(Object(x.c)("check_again","success")),n.abrupt("return",i);case 8:case"end":return n.stop()}},n)}));return function(e,t){return n.apply(this,arguments)}}()}})(function(e){var t,n,c=!1,a=e.settingsStatus,i=e.settings;return i&&(t=i.licence,n=i.masked_licence),a.check_again&&(c=!0===a.check_again),r.a.createElement(r.a.Fragment,null,r.a.createElement("div",{className:"flex-container licence-action"},r.a.createElement("a",{onClick:function(){e.checkLicenceAgain(t,n)}},Object(u.a)("Check my license again","wp-migrate-db")),r.a.createElement("div",{className:"relative"},c&&r.a.createElement(o.d,{className:"license-notification-spinner"}))))}),L=n(70),D=function(e){var t=e.settings,n=t.status,c=t.errors,a=n.disable_ssl;return r.a.createElement(r.a.Fragment,null,r.a.createElement("div",{className:"flex-container licence-action"},r.a.createElement("button",{className:"btn-tooltip-stroke",onClick:function(){return e.disableSSL()}},Object(u.b)(Object(u.a)("Temporarily disable SSL for connections to %s","wp-migrate-db"),"api.deliciousbrains.com")),r.a.createElement(L.b,{position:!1,condition:a,errorMsg:c.disable_ssl,spinnerCond:a&&!0===a})))};t.default=function(e){var t=Object(s.e)(function(e){return e.dbi_api_data.licence}),n=t.license_ui_status,u=t.licence_status,o=Object(a.useState)(null),b=Object(c.a)(o,2),l=b[0],f=b[1],p=["subscription_expired","licence_not_found","no_activations_left"];return Object(a.useEffect)(function(){Object(i.includes)(p,u)&&f(r.a.createElement(C,e))},[]),l||(""===n?null:"check_again"===n?r.a.createElement(C,e):"connection_failed"===n?r.a.createElement(D,e):null)}}}]);