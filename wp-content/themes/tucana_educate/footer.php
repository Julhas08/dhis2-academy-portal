
        <footer class="footer-area">
            <?php echo date("Y"); ?> @ All Rights Reserved
        </footer>
    </div>
   
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type='text/javascript' src='assets/js/scripts/shCorede8c.js'></script>
    <script type='text/javascript' src='assets/js/scripts/shBrushPhpde8c.js'></script>
    <script type='text/javascript' src='assets/js/scripts/shBrushPlainde8c.js'></script>
	<?php wp_footer(); ?>
	  <script>
      jQuery( function() {
        jQuery( "#tabs" ).tabs();
      } );
  </script>
    <script type='text/javascript'>
        (function() {
            var corecss = document.createElement('link');
            var themecss = document.createElement('link');
            var corecssurl = "http://edutech.tucanashop.com/wp-content/themes/tucana_educate/assets/css/shCorede8c.css";
            if (corecss.setAttribute) {
                corecss.setAttribute("rel", "stylesheet");
                corecss.setAttribute("type", "text/css");
                corecss.setAttribute("href", corecssurl);
            } else {
                corecss.rel = "stylesheet";
                corecss.href = corecssurl;
            }
            document.getElementsByTagName("head")[0].insertBefore(corecss, document.getElementById("syntaxhighlighteranchor"));
            var themecssurl = "http://edutech.tucanashop.com/wp-content/themes/tucana_educate/assets/css/shThemeDefaultde8c.css";
            if (themecss.setAttribute) {
                themecss.setAttribute("rel", "stylesheet");
                themecss.setAttribute("type", "text/css");
                themecss.setAttribute("href", themecssurl);
            } else {
                themecss.rel = "stylesheet";
                themecss.href = themecssurl;
            }
            document.getElementsByTagName("head")[0].insertBefore(themecss, document.getElementById("syntaxhighlighteranchor"));
        })();
        SyntaxHighlighter.config.clipboardSwf = '';
        SyntaxHighlighter.config.strings.expandSource = 'show source';
        SyntaxHighlighter.config.strings.viewSource = 'view source';
        SyntaxHighlighter.config.strings.copyToClipboard = 'copy to clipboard';
        SyntaxHighlighter.config.strings.copyToClipboardConfirmation = 'The code is in your clipboard now';
        SyntaxHighlighter.config.strings.print = 'print';
        SyntaxHighlighter.config.strings.help = '?';
        SyntaxHighlighter.config.strings.alert = 'SyntaxHighlighter\n\n';
        SyntaxHighlighter.config.strings.noBrush = 'Can\'t find brush for: ';
        SyntaxHighlighter.config.strings.brushNotHtmlScript = 'Brush wasn\'t configured for html-script option: ';
        SyntaxHighlighter.defaults['auto-links'] = false;
        SyntaxHighlighter.defaults['pad-line-numbers'] = false;
        SyntaxHighlighter.all();
    </script>
</body>
</html>