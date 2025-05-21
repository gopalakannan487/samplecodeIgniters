       <!--====== Footer PART START ======-->

        <footer class="footer_area bg_cover" style="background-image: url(assets/images/footer_bg.jpg);">
            <div class="footer_widget pt-80 pb-130">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer_about mt-50">
                                <a href="<?php echo base_url('welcome')?>"><img src="<?php echo base_url('')?>/assets/images/logo.png" alt="logo" /></a>

                                <p>Lorem ipsum dolor sit amet dolor, con sect etur adipiscing elitorem ipsum dolorsit amet dolor, con sectetur con sectetur adipisci adipiscing.</p>

                                <ul class="footer_social">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="footer_widget_wrapper d-flex flex-wrap">
                                <div class="footer_link mt-50">
                                    <h5 class="footer_title">Quick Links</h5>

                                    <div class="footer_link_wrapper d-flex">
                                        <ul class="link">
                                            <li><a href="<?php echo base_url('welcome')?>">Home</a></li>
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Education</a></li>
                                            <li><a href="#">Our Events</a></li>
                                            <li><a href="#">Our Packages</a></li>
                                        </ul>
                                        <ul class="link">
                                            <li><a href="#">Our Team</a></li>
                                            <li><a href="#">Latest News</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms & Condations</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="footer_contact mt-50">
                                    <h5 class="footer_title">Contact</h5>

                                    <ul class="contact">
                                        <li>Location : 27 State, New York, NY 1002, USA</li>
                                        <li>Emal : infoexample@gmail.com</li>
                                        <li>Phone : +(321)948 754</li>
                                        <li>Fax:+1-212-98765543</li>
                                        <li><a href="#">View Location on Google Map</a></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="footer_copyright">
                <div class="container">
                    <div class="footer_copyright_wrapper text-center d-md-flex justify-content-between">
                        <div class="copyright">
                            <p>Designed & Developed By Vaalu</p>
                        </div>
                        <div class="copyright">
                            <p>&copy; Copyrights 2024 Vaalu All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!--====== Footer PART ENDS ======-->

        <!--====== BACK TOP TOP PART START ======-->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!--====== BACK TOP TOP PART ENDS ======-->


        <!--====== Bootstrap js ======-->
        <script src="<?php echo base_url('')?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('')?>/assets/js/popper.min.js"></script>

        <!--====== Slick js ======-->
        <script src="<?php echo base_url('')?>/assets/js/slick.min.js"></script>

        <!--====== Magnific Popup js ======-->
        <script src="<?php echo base_url('')?>/assets/js/jquery.magnific-popup.min.js"></script>

        <!--====== Counter Up js ======-->
        <script src="<?php echo base_url('')?>/assets/js/waypoints.min.js"></script>
        <script src="<?php echo base_url('')?>/assets/js/jquery.counterup.min.js"></script>

        <!--====== Nice Select js ======-->
        <script src="<?php echo base_url('')?>/assets/js/jquery.nice-select.min.js"></script>

        <!--====== Count Down js ======-->
        <script src="<?php echo base_url('')?>/assets/js/jquery.countdown.min.js"></script>

        <!--====== Appear js ======-->
        <script src="<?php echo base_url('')?>/assets/js/jquery.appear.min.js"></script>

        <!--====== Main js ======-->
        <script src="<?php echo base_url('')?>/assets/js/main.js"></script>
 
       <!--====== Sweet alert js ======-->
        <script src="<?php echo base_url('')?>/assets/js/sweetalert.js"></script>
 <script>
$(document).ready(function() {
    $('#emailForm').on('submit', function(e) {
        e.preventDefault(); // Prevent form from submitting normally
        
        // AJAX request
        $.ajax({
            url: "<?php echo base_url('welcome/formsubmit'); ?>",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json", // Expecting JSON response
            success: function(response) {
                console.log(response);

                // Display SweetAlert with response message
                Swal.fire({
                    title: response.status === 'success' ? 'Success!' : 'Error!',
                    text: response.message,
                    icon: response.status === 'success' ? 'success' : 'error',
                    confirmButtonText: 'OK'
                });
            },
            error: function(xhr, status, error) {
                let errorMessage = 'An error occurred. Please try again.';
                
                // Check if a more specific error message is provided by the server
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                // Display SweetAlert error alert
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});


 document.addEventListener('DOMContentLoaded', function() {
            // function disableShortcuts(e) {
            //     if (
            //         e.keyCode === 123 || // F12
            //         (e.ctrlKey && e.shiftKey && (
            //             e.keyCode === 73 || // Ctrl+Shift+I
            //             e.keyCode === 74 || // Ctrl+Shift+J
            //             e.keyCode === 67    // Ctrl+Shift+C
            //         )) ||
            //         (e.ctrlKey && e.keyCode === 85) // Ctrl+U
            //     ) {
            //         e.preventDefault();
            //         e.stopPropagation();
            //     }
            // }

            // document.addEventListener('keydown', disableShortcuts);

            // document.addEventListener('contextmenu', function(e) {
            //     e.preventDefault();
            // });

            // window.addEventListener('keydown', function(e) {
            //     if (e.keyCode === 123 || 
            //         (e.ctrlKey && e.shiftKey && 
            //         (e.keyCode === 73 || e.keyCode === 74 || e.keyCode === 67)) || 
            //         (e.ctrlKey && e.keyCode === 85)) {
            //         e.preventDefault();
            //     }
            // });

            // setInterval(function() {
            //     if (window.outerWidth - window.innerWidth > 160 || window.outerHeight - window.innerHeight > 160) {
            //         alert('Developer Not Accessable...!!');
            //     }
            // }, 1000);
        });

    </script>




  
    </body>
</html>
