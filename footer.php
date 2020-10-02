<!--start footer section-->
<div id="footer">
    <div class="container">
        <div class="footer-details">
            <div class="newsletter">
                <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow"
                      onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=feed_address', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
                    <span><i class="fa fa-envelope-o"></i></span>
                    <input type="text" name="email" id="newsLetterUserEmail" placeholder="برای عضویت در خبرنامه ایمیل خود را وارد کنید">
                    <input type="submit" name="submitNewsLetter" value=" عضویت">
                    <input type="hidden" name="loc" value="fa_IR">
                    <input type="hidden" value="feed_address" name="uri">
                </form>
            </div>
            <div class="social-share-links">

                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="footer-menu">
                <?php  wp_nav_menu(array('theme_location' =>'footer-menu' ));  ?>
            </div>
            <div class="copyright">کلیه حقوق برای وب سایت سون لرن محفوظ می باشد</div>
        </div>
    </div>
</div>
<!--end footer section-->
<?php wp_footer(); ?>
<!--<script src="--><?php //echo get_template_directory_uri().'/js/vendor/jquery-1.11.3.min.js'; ?><!--"></script>-->
<script src="<?php echo get_template_directory_uri().'/js/plugins.js'; ?>"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    //    (function (b, o, i, l, e, r) {
    //        b.GoogleAnalyticsObject = l;
    //        b[l] || (b[l] =
    //                function () {
    //                    (b[l].q = b[l].q || []).push(arguments)
    //                });
    //        b[l].l = +new Date;
    //        e = o.createElement(i);
    //        r = o.getElementsByTagName(i)[0];
    //        e.src = 'https://www.google-analytics.com/analytics.js';
    //        r.parentNode.insertBefore(e, r)
    //    }(window, document, 'script', 'ga'));
    //    ga('create', 'UA-XXXXX-X', 'auto');
    //    ga('send', 'pageview');
</script>
</body>
</html>