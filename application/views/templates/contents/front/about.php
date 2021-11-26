<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3"><?= $about['value1'] ?></h3>
                    <ul>
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li><?= $about['value1'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- About Area Start Here -->
<div class="about-area mt-no-text">
    <div class="container custom-area">

        <div class="row align-items-center">
            <div class="col-md-6 col-custom order-2 order-md-1">
                <!--Single Banner Area Start-->
                <div class="single-banner hover-style">
                    <div class="banner-img">
                        <a href="#">
                            <img src="<?= base_url("files/logo/{$about_foto['value1']}") ?>" alt="About Image">
                            <div class="overlay-1"></div>
                        </a>
                    </div>
                </div>
                <!--Single Banner Area End-->
            </div>
            <div class="col-md-6 col-custom order-1 order-md-2">
                <div class="collection-content">
                    <div class="section-title text-left">
                        <span class="section-title-1"><?= $about['value1'] ?></span>
                    </div>
                    <div class="desc-content">
                        <?= $about['value2'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us Area End Here -->
<!-- History Area Start Here -->
<div class="our-history-area gray-bg pt-5 mt-text-3">
    <div class="our-history-area">
        <div class="container custom-area">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-0">
                        <span class="section-title-1"><?= $about_history['value1'] ?></span>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="col-lg-8 ms-auto me-auto">
                    <div class="history-area-content text-center border-0">
                        <?= $about_history['value2'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature History Area End Here -->

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