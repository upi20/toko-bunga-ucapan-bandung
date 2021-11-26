    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Contact</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->


    <!-- Contact Us Area Start Here -->
    <div class="contact-us-area mt-no-text m-0">
        <div class="container custom-area py-5">
            <div class="row">
                <?php foreach ($contacts as $contact) : ?>
                    <div class="<?= $contact['column'] ?>">
                        <div class="contact-info-item">
                            <div class="con-info-icon">
                                <i class="<?= $contact['icon'] ?>"></i>
                            </div>
                            <div class="con-info-txt">
                                <h4><?= $contact['title'] ?></h4>
                                <p><?= $contact['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?= $maps['value1']; ?>
            </div>
        </div>
    </div>
    <!-- Contact Us Area End Here -->


    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="lnr lnr-arrow-up"></i>
    </a>
    <!-- Scroll to Top End -->

    <!-- JS
============================================ -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const review = '<?= $data->product->view_review ?>';
    </script>


    </body>


    <!-- Mirrored from template.hasthemes.com/flosun/flosun/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Nov 2021 05:28:17 GMT -->

    </html>