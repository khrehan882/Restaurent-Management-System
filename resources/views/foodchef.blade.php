<!-- ***** Chefs Area Starts ***** -->
<section class="section" id="chefs">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h6>Our Chefs</h6>
                    <h2>We offer the best ingredients for you</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($data2 as $chef)
                <div class="col-lg-4 col-md-6">
                    <div class="chef-item mb-4">
                        <div class="thumb position-relative">
                            <div class="overlay"></div>
                            <ul class="social-icons list-unstyled m-0">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <div class="chef-img-container">
                                <img src="{{ asset('chefimage/' . $chef->image) }}" alt="Chef #1" class="image-fluid">
                            </div>
                        </div>
                        <div class="down-content text-center mt-3">
                            <h4>{{ $chef->name }}</h4>
                            <span>{{ $chef->speciality }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ***** Chefs Area Ends ***** -->

<style>
    /* Custom style to limit the size of the chef's image */
    .chef-img-container {
        max-width: 400px;
        /* Set your desired maximum width */
        margin: 0 auto;
        /* Center the image within the container */
        overflow: hidden;
        /* Hide any overflowing parts of the image */
    }

    .chef-img-container img {
        width: 200%;
        /* Make the image fill the container's width */
        height: auto;
        /* Maintain the aspect ratio */
    }
</style>
