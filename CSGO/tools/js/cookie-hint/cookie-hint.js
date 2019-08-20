(function($) {

  function init(options) {
    // This is the easiest way to have default options.
    // This is the easiest way to have default options.
    var settings = $.extend({
      // These are the defaults.
      bottom: true, // position of cookie hint
      html: "<strong>About Cookies</strong> - Diese Seite verwendet Cookies, um Ihre Online-Erfahrung zu verbessern.<br>Wenn Sie diese Website weiterhin nutzen, ohne Ihre Cookie-Einstellungen zu ändern, gehen wir davon aus, dass Sie der Verwendung von Cookies zustimmen.<br>Um weitere Informationen zu erhalten oder Ihre Cookie-Einstellungen zu ändern, besuchen Sie unsere <a href='./?cookie_statement' style='color:white;'>Cookie-Richtlinie</a>, <a href='./?privacy_policy' style='color:white;'>Datenschutz-Richtlinie</a> und <a href='./?disclaimer' style='color:white;'>Haftungsausschlüsse</a>.",
      button: true, // false
      buttonHtmlII: "<strong>CLOSE</strong>",
	  buttonHtmlI: "<strong>ACCEPT</strong>",
      backgroundColor: "#4286f4",
      color: "#ffffff",
    }, options);

    function setCookie(cookiename, cookievalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
      document.cookie = cookiename + "=" + cookievalue + "; " + expires;
    }

    function getCookie(cookiename) {
      var name = cookiename + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    if (getCookie("acceptCookies") == 1) {
      // checks for a cookie named "acceptCookies"
      // if it was previously clicked the script ends here
      return;
    }

    if (settings.bottom === true || settings.bottom === false) {
      let html = "";
      html += '<div id="cookie-hint" style="border-top-left-radius: 12px; border-top-right-radius: 12px; margin-left: 24.5%;  cursor: default; position: fixed; color: rgb(255, 140, 11); background-color: black; bottom: 0px;width: 50%;">';
      html += '<div id="cookie-hint-left" style="width: 75%;">';
      html += String(settings.html);
      html += '</div>';
      html += '<div id="cookie-hint-right-accept" style="float: right;width: 75px;text-align: center;font-size: 20px;font-style: italic;font-variant: all-small-caps;background: repeating-radial-gradient(rgba(124,252,0,0), rgba(124,252,0,1));border-top-left-radius: 12px;border-top-right-radius: 12px;border-bottom-left-radius: 12px;border-bottom-right-radius: 12px;height: 30px;border: solid black 2px;margin-right: 15px;">';
      html += settings.buttonHtmlI;
      html += '</div>';
	  html += '<div id="cookie-hint-right" style="float: right;width: 75px;text-align: center;font-size: 20px;font-style: italic;font-variant: all-small-caps;background: repeating-radial-gradient(rgba(100,149,237,0), rgb(237, 100, 100));border-top-left-radius: 12px;border-top-right-radius: 12px;border-bottom-left-radius: 12px;border-bottom-right-radius: 12px;height: 30px;border: solid black 2px;margin-right: 15px;">';
      html += settings.buttonHtmlII;
      html += '</div>';
      html += '</div>';
      $("body").prepend(html);
      $("#cookie-hint").css({
        cursor: "default",
        position: "fixed",
        color: settings.color,
        backgroundColor: settings.backgroundColor,
      });
      if (settings.bottom === true) {
        $("#cookie-hint").css({
          bottom: 0
        });
      } else {
        $("#cookie-hint").css({
          position: "relativ",
          top: 0
        });
      };
	  if (settings.bottom_accept === true) {
        $("#cookie-hint").css({
          bottom: 0
        });
      } else {
        $("#cookie-hint").css({
          position: "fixed",
          bottom: 0
        });
      };

      $("#cookie-hint-left").css({
        display: "table-cell",
      });

      $("#cookie-hint-right-accept").on('click', function() {
        $("#cookie-hint").hide();
        // set the cookie "acceptCookies" with value 1 expiring in 14 days
        setCookie("acceptCookies", 1, 1);
      })
	  $("#cookie-hint-right").on('click', function() {
        $("#cookie-hint").hide();
      })

    } else {
      console.error("set position to either \"top\" or \"bottom\"!");
      return;
    };

    return;
  };

  $.interactiveCookieHint = function(options) {
    init(options);
  }

}(jQuery));