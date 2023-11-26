<!-- *********************** Content *********************** -->

<!-- Footer -->
<footer class="text-center text-lg-start main-footer mt-5">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="color:#fff;">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="footer-social-icons">
        <a href="https://www.facebook.com" class="me-4 text-reset">
    <i class="fab fa-facebook-f"></i>
</a>

            <!-- <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a> -->
            <a href="https://www.twitter.com" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https:github.com" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="" style="color:#fff;">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3 middle-footer">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>H.O.M.E.S.P.H.E.R.E
                    </h6>
                    <p>
                        We are here for you to explore the realestate around you. Search based on your
                        special features and get the deal done in best prices. WE ARE HERE TO GIVE YOU THE
                        BEST COMFORT.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Links
                    </h6>
                    <p>
                        <a href="<?php echo base_url('index.php/front'); ?>" class="text-reset">Home</a>
                    </p>
                    <p>
                        <a href="<?php echo base_url('index.php/front/about'); ?>" class="text-reset">About Us</a>
                    </p>
                    <p>
                        <a href="<?php echo base_url('index.php/front/contactUs'); ?>" class="text-reset">Contact Us</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                    </h6>
                    <p><i class="fas fa-home me-3"></i> <?php echo $setting->footer_text_right . ',' . ' ' . $setting->city ?></p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        <?php echo $setting->email ?>
                    </p>
                    <p><i class="fas fa-phone me-3"></i> +91 <?php echo $setting->phone ?></p>
                    <!-- <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p> -->
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); color:#fff;">
        <?php echo $setting->footer_text_left; ?>
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/"> <?php echo $setting->email ?></a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<!-- ********************* End Content ******************* -->
<!-- *********************** Footer Part ******************************* -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- Jquery -->
<script type='text/javascript' src="<?php echo base_url(); ?>front_assets/js/slick.min.js"></script> <!-- Slick JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Add Slick Slider to Card in Property Sale View -->
<script>
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
</script>
<!-- Slick End -->
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDy83xQeAhaj-ODcSAScK5V8ehKc5j3AkU&callback=initMap&v=weekly"></script>
</body> <!-- Google Maps API -->

</html>
<!-- ************************ End Footer Part ****************************** -->