<!-- FOOTER 1 -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div>
                    <a href="index.html">
                        <img class="footer-logo" src="<?php bloginfo('template_url');?>/assets/img/logo-footer.png" alt="logo">
                    </a>
                </div>
                <div>
                    <address class="margin-bottom-30">
                        <p>Samplestreet 3<br/>
                            34117 Kassel<br/>
                            Germany</p>
                    </address>
                </div>
                <div class="margin-bottom-30">
                    <p><i class="fa fa-phone"></i> +49 561 00 00 00 00
                        <br/>
                        <i class="fa fa-fax"></i> +49 561 00 00 00 00</p>
                </div>
                <div>
                    <a href="https://lautenschlager.de">www.lautenschlager.de</a>
                    <br/>
                    <a href="mailto:info@lautenschlager.de">info@lautenschlager.de</a>
                </div>
            </div>
            <div class="col-md-3 footer-menu">
                <h4>About Us</h4>
                <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                <a href="about-us.html">
                    <button class="btn btn-primary">Read More</button>
                </a>
            </div>
            <div class="col-md-3 footer-blog">
                <h4>RECENT BLOG POSTS</h4>
                <ul>
                    <li><a href="#">Blog Entry 1<br/></a> <a href="#">February 10 / John Doe </a></li>
                    <li><a href="#">Blog Entry 2<br/></a> <a href="#">March 14 / Jane Doe </a></li>
                    <li><a href="#">Blog Entry 3<br/></a> <a href="#">April 06 / Jenny Doe </a></li>
                    <li><a href="#">Blog Entry 4<br/></a> <a href="#">June 25 / James Doe </a></li>
                </ul>
            </div>
            <div class="col-md-3  footer-menu">
                <h4>NAVIGATE</h4>
                <ul>
                    <a href="index.html">
                        <li>Home</li>
                    </a>
                    <a href="about-me.html">
                        <li>About Me</li>
                    </a>
                    <a href="about-us.html">
                        <li>About Us</li>
                    </a>
                    <a href="our-team.html">
                        <li>Our Team</li>
                    </a>
                    <a href="blog-right-sidebar.html">
                        <li>Blog</li>
                    </a>
                    <a href="contact.html">
                        <li>Contact</li>
                    </a>
                </ul>
            </div>

        </div>
    </div>
</footer>

<!-- FOOTER 2 -->
<footer class="page-section-no-padding  footer2-container">
    <div class="container">
        <div class="row">
            <!-- Copyright -->
            <div class="col-xs-6">
                <p>Follow me on <a href="https://twitter.com/lautenschlagera" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #38A1F3;"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a></p>
                <p>Template created for free commercial use by Andreas Lautenschlager.<br>More free downloads under <a href="https:/lautenschlager.de" target="_blank">lautenschlager.de</a></p>
                <a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="_blank"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" class="fixed"></a><br>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="_blank">Creative Commons Attribution 4.0 International License</a>.
            </div>

            <!-- Social Links -->
            <div class="text-right col-xs-6 footer2-social-container">
                <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#" title="Google-plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" title="Behance" target="_blank"><i class="fa fa-behance"></i></a>
                <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                <a href="#" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                <a href="#" title="Dribbble" target="_blank"><i class="fa fa-dribbble"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- Initiate Fancybox/Lightbox for Videos -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
         */
        $('.fancybox-media')
            .attr('rel', 'media-gallery')
            .fancybox({
                openEffect: 'none',
                closeEffect: 'none',
                prevEffect: 'none',
                nextEffect: 'none',
                arrows: false,
                helpers: {
                    media: {},
                    buttons: {}
                }
            });
    });
</script>

<?php wp_footer() ;?>
</body>

</html>