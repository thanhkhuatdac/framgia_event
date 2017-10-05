<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('images/favicon/logo-trungquandev.png')}}" />
    {{-- <base href="{{ asset('') }}"> --}}

    {{ Html::style('assets/bootstrap/dist/css/bootstrap.css') }}
    {{ Html::style('assets/font-awesome/css/font-awesome.css') }}
    {{ Html::style('css/main.css') }}
    {{ Html::style('css/plugin.css') }}
    {{ Html::style('css/style.css') }}
</head>
<body class="home transparent-header">
    {{-- <div id="introLoader" class="introLoading"></div> --}}

    <!-- start Container Wrapper -->

    <div class="container-wrapper">

        <!-- start Header -->

        <header id="header">

            <!-- start Navbar (Header) -->
            <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">

                <div class="container">

                    <div class="logo-wrapper">
                        <div class="logo">
                            <a href="index-2.html"><img src="images/logo-white.png" alt="Logo" /></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-nav-wrapper">

                        <ul class="nav navbar-nav" id="responsive-menu">

                            <li>
                                <a href="index-2.html">Home</a>
                                <ul>
                                    <li><a href="index-02.html">Home 02</a></li>
                                    <li><a href="index-03.html">Home 03</a></li>
                                    <li><a href="index-04.html">Home 04</a></li>
                                    <li><a href="index-05.html">Home 05</a></li>
                                    <li><a href="index-06.html">Home 06</a></li>
                                    <li><a href="index-07.html">Home 07</a></li>
                                    <li><a href="index-08.html">Home 08</a></li>
                                    <li><a href="index-09.html">Home 09</a></li>
                                    <li><a href="index-10.html">Home 10</a></li>
                                    <li><a href="index-11.html">Home 11</a></li>
                                    <li><a href="index-12.html">Home 12</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="offered.html">Offered Tour</a>
                                <ul>
                                    <li>
                                        <a href="offered-result.html">Offered Tour Result</a>
                                        <ul>
                                            <li><a href="offered-result-02.html">Offered Tour Result 02</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="offered-detail.html">Offered Tour Detail</a>
                                        <ul>
                                            <li><a href="offered-detail-02.html">Offered Tour Detail 02</a></li>
                                            <li><a href="offered-detail-03.html">Offered Tour Detail 03</a></li>
                                            <li><a href="offered-detail-04.html">Offered Tour Detail 04</a></li>
                                            <li><a href="offered-detail-05.html">Offered Tour Detail 05</a></li>
                                            <li><a href="offered-detail-06.html">Offered Tour Detail 06</a></li>
                                            <li><a href="offered-detail-07.html">Offered Tour Detail 07</a></li>
                                            <li><a href="offered-detail-08.html">Offered Tour Detail 08</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="offered-payment.html">Offered Detail Payment</a></li>
                                    <li><a href="offered-payment-done.html">Offered Detail Payment Done</a></li>
                                    <li><a href="offered-create.html">Offered Detail Create</a></li>
                                    <li><a href="offered-create-done.html">Offered Detail Create Done</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="requested.html">Requested Tour</a>
                                <ul>
                                    <li>
                                        <a href="requested-result.html">Requested Tour Result</a>
                                        <ul>
                                            <li><a href="requested-result-02.html">Requested Tour Result 02</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="requested-detail.html">Requested Tour Detail</a></li>
                                    <li><a href="requested-requested-bid.html">Requested Tour Bid</a></li>
                                    <li><a href="requested-requested-bid-open.html">Requested Tour Bid Open</a></li>
                                    <li><a href="requested-create.html">Requested Tour Create</a></li>
                                    <li><a href="requested-create-done.html">Requested Tour Create Done</a></li>
                                    <li><a href="requested-detail-travel-history.html">Requested Travel History</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="guide.html">Guide</a>
                                <ul>
                                    <li>
                                        <a href="guide-result.html">Guide Result</a>
                                        <ul>
                                            <li><a href="guide-result-02.html">Guide Result 02</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="guide-detail.html">Guide Detail</a></li>
                                    <li><a href="guide-payment.html">Guide Payment</a></li>
                                    <li><a href="guide-payment-done.html">Guide Payment Done</a></li>
                                    <li><a href="guide-detail-offer.html">Guide - Tour</a></li>
                                    <li><a href="guide-detail-gallery.html">Guide - Gallery</a></li>
                                    <li><a href="guide-detail-reviews.html">Guide - Review</a></li>
                                    <li><a href="guide-detail-follower.html">Guide - Follower</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">Pages</a>
                                <ul>
                                    <li>
                                        <a href="guide-detail-setting.html">Dashboard</a>
                                        <ul>
                                            <li><a href="guide-detail-setting-edit-profile.html">Dashboard - Edit Profile</a></li>
                                            <li><a href="guide-detail-setting-guide-information.html">Dashboard - Personal Information</a></li>
                                            <li><a href="guide-detail-setting-change-pass.html">Dashboard - Change Password</a></li>
                                            <li><a href="guide-detail-setting-my-tour.html">Dashboard - My Tour</a></li>
                                            <li><a href="guide-detail-setting-my-wihslist.html">Dashboard - My Wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li>
                                        <a href="faq.html">FAQ</a>
                                        <ul>
                                            <li><a href="faq-02.html">FAQ 2</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog.html">Blog</a>
                                        <ul>
                                            <li><a href="blog-single.html">Blog 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="404-error-page.html">404 - Error Page</a></li>
                                    <li><a href="static-page.html">Static Page</a></li>
                                    <li>
                                        <a href="#">Shortcode</a>
                                        <ul>
                                            <li><a href="shortcode-typography.html">Shortcode - Typography</a></li>
                                            <li><a href="shortcode-element.html">Shortcode - Element</a></li>
                                            <li><a href="shortcode-component.html">Shortcode - Component</a></li>
                                            <li><a href="shortcode-layout-fullwidth.html">Shortcode - Layout Full Width</a></li>
                                            <li><a href="shortcode-layout-left-sidebar.html">Shortcode - Layout Left Sidebar</a></li>
                                            <li><a href="shortcode-layout-right-sidebar.html">Shortcode - Layout Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </div><!--/.nav-collapse -->

                    <div class="nav-mini-wrapper">
                        <ul class="nav-mini">
                            <li><a data-toggle="modal" href="#registerModal"><i class="icon-user-follow" data-toggle="tooltip" data-placement="bottom" title="sign up"></i></a></li>
                            <li><a data-toggle="modal" href="#loginModal"><i class="icon-login" data-toggle="tooltip" data-placement="bottom" title="login"></i> </a></li>
                        </ul>
                    </div>

                </div>

                <div id="slicknav-mobile"></div>

            </nav>
            <!-- end Navbar (Header) -->

        </header>

        <!-- end Header -->

        <!-- start Main Wrapper -->

        <div class="main-wrapper scrollspy-container">

            <!-- start hero-header -->
            <div class="hero img-bg-01">
                <div class="container">

                    <h1>Where do you want to go?</h1>
                    <p>Discover and book your unique travel experiences offered by local experts</p>

                    <form>
                        <div class="form-group">
                            <input type="text" placeholder="eg: London, Paris, Rome" class="form-control flexdatalist" data-data="data/countries.json" data-search-in='["name","capital"]' data-visible-properties='["capital","name","continent"]' data-group-by="continent" data-selection-required="true" data-focus-first-result="true" data-min-length="1" data-value-property="iso2" data-text-property="{capital}, {name}" data-search-contain="false" name="countries">
                            <button class="btn"><i class="icon-magnifier"></i></button>
                        </div>
                    </form>

                    <div class="top-search">
                        <span class="font700">Top Searches : </span>
                        <a href="#">Thailand</a>
                        <a href="#">Malaysia</a>
                        <a href="#">Japan</a>
                        <a href="#">Hong Kong</a>
                        <a href="#">Singapore</a>
                    </div>

                </div>

            </div>
            <!-- end hero-header -->

            <div class="post-hero clearfix">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-4 mb-20-xs">
                            <div class="horizontal-featured-icon-sm clearfix">
                                <div class="icon"><i class="ri ri-location"></i></div>
                                <div class="content">
                                    <h6>Looking for a tour program?</h6>
                                    <span>Inhabiting discretion the her dispatched decisively boisterous joy.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 mb-20-xs">
                            <div class="horizontal-featured-icon-sm clearfix">
                                <div class="icon"> <i class="ri ri-user"></i></div>
                                <div class="content">
                                    <h6>Need someone to guide tour?</h6>
                                    <span>Great asked oh under together prospect kindness securing six.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 mb-20-xs">
                            <div class="horizontal-featured-icon-sm clearfix">
                                <div class="icon"> <i class="ri ri-equal-circle"></i></div>
                                <div class="content">
                                    <h6>Want to earn money as guide?</h6>
                                    <span>Sometimes studied evident. Conduct replied removal her cordially. </span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="container pt-70 pb-60 clearfix">

                <div class="row">

                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                        <div class="section-title">

                            <h2>Top Destinations</h2>

                        </div>

                    </div>

                </div>

                <div class="mb-30">

                    <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">

                        <div class="GridLex-grid-noGutter-equalHeight">

                            <div class="GridLex-col-4_sm-4_xs-6_xss-12">

                                <div class="top-destination-item">
                                    <a href="#">
                                        <div class="image">
                                            <img src="images/top-destinations/01.jpg" alt="images" />
                                        </div>
                                        <h4 class="uppercase"><span>Italy</span></h4>
                                        <p>254 packages<br /> 142 requests<br /> 52 guides</p>
                                    </a>
                                </div>

                            </div>

                            <div class="GridLex-col-4_sm-4_xs-6_xss-12">

                                <div class="top-destination-item">
                                    <a href="#">
                                        <div class="image">
                                            <img src="images/top-destinations/02.jpg" alt="images" />
                                        </div>
                                        <h4 class="uppercase"><span>USA</span></h4>
                                        <p>254 packages<br /> 142 requests<br /> 52 guides</p>
                                    </a>
                                </div>

                            </div>

                            <div class="GridLex-col-4_sm-4_xs-6_xss-12">

                                <div class="top-destination-item">
                                    <a href="#">
                                        <div class="image">
                                            <img src="images/top-destinations/03.jpg" alt="images" />
                                        </div>
                                        <h4 class="uppercase"><span>Emerate</span></h4>
                                        <p>254 packages<br /> 142 requests<br /> 52 guides</p>
                                    </a>
                                </div>

                            </div>

                            <div class="GridLex-col-4_sm-4_xs-6_xss-12">

                                <div class="top-destination-item">
                                    <a href="#">
                                        <div class="image">
                                            <img src="images/top-destinations/04.jpg" alt="images" />
                                        </div>
                                        <h4 class="uppercase"><span>Greece</span></h4>
                                        <p>254 packages<br /> 142 requests<br /> 52 guides</p>
                                    </a>
                                </div>

                            </div>

                            <div class="GridLex-col-4_sm-4_xs-6_xss-12">

                                <div class="top-destination-item">
                                    <a href="#">
                                        <div class="image">
                                            <img src="images/top-destinations/05.jpg" alt="images" />
                                        </div>
                                        <h4 class="uppercase"><span>Maldives</span></h4>
                                        <p>254 packages<br /> 142 requests<br /> 52 guides</p>
                                    </a>
                                </div>

                            </div>

                            <div class="GridLex-col-4_sm-4_xs-6_xss-12">

                                <div class="top-destination-item">
                                    <a href="#">
                                        <div class="image">
                                            <img src="images/top-destinations/06.jpg" alt="images" />
                                        </div>
                                        <h4 class="uppercase"><span>Australia</span></h4>
                                        <p>254 packages<br /> 142 requests<br /> 52 guides</p>
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="bg-white pt-70 pb-60 clearfix">

                <div class="container">

                    <div class="row">

                        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                            <div class="section-title">

                                <h2>Recommended trips</h2>
                                <p class="lead">The trips that offered by local guides or experts for travellers</p>
                            </div>

                        </div>

                    </div>

                    <div class="trip-guide-wrapper mb-30">

                        <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">

                            <div class="GridLex-grid-noGutter-equalHeight">

                                <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">

                                    <div class="trip-guide-item">

                                        <div class="trip-guide-image">
                                            <img src="images/trip/01.jpg" alt="images" />
                                        </div>

                                        <div class="trip-guide-content">
                                            <h3>Bangkok-Pattaya Safari Adventure</h3>
                                            <p>Game of as rest time eyes with of this it. Add was music merry any truth since going...</p>
                                        </div>

                                        <div class="trip-guide-bottom">

                                            <div class="trip-guide-person clearfix">
                                                <div class="image">
                                                    <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                                                </div>
                                                <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                                <p>Local expert from Thailand</p>
                                            </div>

                                            <div class="trip-guide-meta row gap-10">
                                                <div class="col-xs-6 col-sm-6">
                                                    <div class="rating-item">
                                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 text-right">
                                                    5 days 4 nights
                                                </div>
                                            </div>

                                            <div class="row gap-10">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="trip-guide-price">
                                                        Starting at
                                                        <span class="block inline-block-xs">USD 687.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                                    <a href="#" class="btn btn-primary">Details</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">

                                    <div class="trip-guide-item">

                                        <div class="trip-guide-image">
                                            <img src="images/trip/02.jpg" alt="images" />
                                        </div>

                                        <div class="trip-guide-content">
                                            <h3>Chiang Mai Sustainable Trails</h3>
                                            <p>Resolution devonshire pianoforte assistance an he particular middletons...</p>
                                        </div>

                                        <div class="trip-guide-bottom">

                                            <div class="trip-guide-person clearfix">
                                                <div class="image">
                                                    <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                                                </div>
                                                <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                                <p>Local expert from Thailand</p>
                                            </div>

                                            <div class="trip-guide-meta row gap-10">
                                                <div class="col-xs-6 col-sm-6">
                                                    <div class="rating-item">
                                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.0"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 text-right">
                                                    5 days 4 nights
                                                </div>
                                            </div>

                                            <div class="row gap-10">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="trip-guide-price">
                                                        Starting at
                                                        <span class="block inline-block-xs">USD 687.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                                    <a href="#" class="btn btn-primary">Details</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">

                                    <div class="trip-guide-item">

                                        <div class="trip-guide-image">
                                            <img src="images/trip/03.jpg" alt="images" />
                                        </div>

                                        <div class="trip-guide-content">
                                            <h3>Hong Kong Best Highlight Explore</h3>
                                            <p>Betrayed cheerful declared end and. Questions we additions is extremely incommode...</p>
                                        </div>

                                        <div class="trip-guide-bottom">

                                            <div class="trip-guide-person clearfix">
                                                <div class="image">
                                                    <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                                                </div>
                                                <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                                <p>Local expert from Thailand</p>
                                            </div>

                                            <div class="trip-guide-meta row gap-10">
                                                <div class="col-xs-6 col-sm-6">
                                                    <div class="rating-item">
                                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 text-right">
                                                    5 days 4 nights
                                                </div>
                                            </div>

                                            <div class="row gap-10">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="trip-guide-price">
                                                        Starting at
                                                        <span class="block inline-block-xs">USD 687.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                                    <a href="#" class="btn btn-primary">Details</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">

                                    <div class="trip-guide-item">

                                        <div class="trip-guide-image">
                                            <img src="images/trip/01.jpg" alt="images" />
                                        </div>

                                        <div class="trip-guide-content">
                                            <h3>Bangkok-Pattaya Safari Adventure</h3>
                                            <p>Game of as rest time eyes with of this it. Add was music merry any truth since going...</p>
                                        </div>

                                        <div class="trip-guide-bottom">

                                            <div class="trip-guide-person clearfix">
                                                <div class="image">
                                                    <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                                                </div>
                                                <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                                <p>Local expert from Thailand</p>
                                            </div>

                                            <div class="trip-guide-meta row gap-10">
                                                <div class="col-xs-6 col-sm-6">
                                                    <div class="rating-item">
                                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 text-right">
                                                    5 days 4 nights
                                                </div>
                                            </div>

                                            <div class="row gap-10">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="trip-guide-price">
                                                        Starting at
                                                        <span class="block inline-block-xs">USD 687.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                                    <a href="#" class="btn btn-primary">Details</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">

                                    <div class="trip-guide-item">

                                        <div class="trip-guide-image">
                                            <img src="images/trip/02.jpg" alt="images" />
                                        </div>

                                        <div class="trip-guide-content">
                                            <h3>Chiang Mai Sustainable Trails</h3>
                                            <p>Resolution devonshire pianoforte assistance an he particular middletons...</p>
                                        </div>

                                        <div class="trip-guide-bottom">

                                            <div class="trip-guide-person clearfix">
                                                <div class="image">
                                                    <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                                                </div>
                                                <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                                <p>Local expert from Thailand</p>
                                            </div>

                                            <div class="trip-guide-meta row gap-10">
                                                <div class="col-xs-6 col-sm-6">
                                                    <div class="rating-item">
                                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.0"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 text-right">
                                                    5 days 4 nights
                                                </div>
                                            </div>

                                            <div class="row gap-10">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="trip-guide-price">
                                                        Starting at
                                                        <span class="block inline-block-xs">USD 687.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                                    <a href="#" class="btn btn-primary">Details</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">

                                    <div class="trip-guide-item">

                                        <div class="trip-guide-image">
                                            <img src="images/trip/03.jpg" alt="images" />
                                        </div>

                                        <div class="trip-guide-content">
                                            <h3>Hong Kong Best Highlight Explore</h3>
                                            <p>Betrayed cheerful declared end and. Questions we additions is extremely incommode...</p>
                                        </div>

                                        <div class="trip-guide-bottom">

                                            <div class="trip-guide-person clearfix">
                                                <div class="image">
                                                    <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                                                </div>
                                                <p class="name">By: <a href="#">Robert Kalvin</a></p>
                                                <p>Local expert from Thailand</p>
                                            </div>

                                            <div class="trip-guide-meta row gap-10">
                                                <div class="col-xs-6 col-sm-6">
                                                    <div class="rating-item">
                                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 text-right">
                                                    5 days 4 nights
                                                </div>
                                            </div>

                                            <div class="row gap-10">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="trip-guide-price">
                                                        Starting at
                                                        <span class="block inline-block-xs">USD 687.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                                    <a href="#" class="btn btn-primary">Details</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="clearfix">

                <div class="container pt-70 pb-80">

                    <div class="row">

                        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                            <div class="section-title">

                                <h2>How It Works</h2>
                                <p class="lead">The trips that travellers are looking for local guides or experts for them</p>
                            </div>

                        </div>

                    </div>

                    <div class="GridLex-gap-30 GridLex-gap-20-mdd GridLex-gap-10-xs alt-number-color ">

                        <div class="GridLex-grid-noGutter-equalHeight">

                            <div class="GridLex-col-4_sm-4_xs-12">

                                <div class="how-it-work-item clearfix">
                                    <div class="icon">
                                        <i class="icon-note"></i>
                                    </div>
                                    <div class="content">
                                        <span class="number">01.</span>
                                        <h3>Create a Trip Program</h3>
                                        <p class="line-1-45">Denote simple fat denied add worthy little use. Instantly gentleman contained belonging exquisite.</p>
                                    </div>
                                </div>

                            </div>

                            <div class="GridLex-col-4_sm-4_xs-12">

                                <div class="how-it-work-item clearfix">
                                    <div class="icon">
                                        <i class="icon-cloud-upload"></i>
                                    </div>
                                    <div class="content">
                                        <span class="number">02.</span>
                                        <h3>Publish Your Trip Program</h3>
                                        <p class="line-1-45">With my them if up many. Extremity so attending objection as engrossed gentleman something.</p>
                                    </div>
                                </div>

                            </div>

                            <div class="GridLex-col-4_sm-4_xs-12">

                                <div class="how-it-work-item clearfix">
                                    <div class="icon">
                                        <i class="icon-speech"></i>
                                    </div>
                                    <div class="content">
                                        <span class="number">03.</span>
                                        <h3>Traveller Contact With You</h3>
                                        <p class="line-1-45">Old education him departure any arranging one prevailed. Behaved the comfort another fifteen eat.</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="featured-bg pt-80 pb-60 img-bg-02">

                <div class="container">

                    <div class="row">

                        <div class="col-md-10 col-md-offset-1">

                            <div class="row gap-0">

                                <div class="col-xss-6 col-xs-6 col-sm-3">
                                    <div class="counting-item">
                                        <div class="icon">
                                            <i class="icon-directions"></i>
                                        </div>
                                        <p class="number">354</p>
                                        <p>Packages</p>
                                    </div>
                                </div>

                                <div class="col-xss-6 col-xs-6 col-sm-3">
                                    <div class="counting-item">
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                        <p class="number">241</p>
                                        <p>Guides</p>
                                    </div>
                                </div>

                                <div class="col-xss-6 col-xs-6 col-sm-3">
                                    <div class="counting-item">
                                        <div class="icon">
                                            <i class="icon-location-pin"></i>
                                        </div>
                                        <p class="number">142</p>
                                        <p>Destinations</p>
                                    </div>
                                </div>

                                <div class="col-xss-6 col-xs-6 col-sm-3">
                                    <div class="counting-item">
                                        <div class="icon">
                                            <i class="icon-envelope-letter"></i>
                                        </div>
                                        <p class="number">354</p>
                                        <p>Requests</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row mt-70">

                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">

                            <div class="fearured-join-item mb-0">
                                <h2 class="alt-font-size">Create Your Trip?</h2>
                                <p class="mb-25 font20">Rooms oh fully taken by worse do. Points afraid but may end law lasted. Was out laughter raptures returned outweigh outward the him existence assurance.</p>
                                <a href="#" class="btn btn-primary btn-lg">Join for Guide</a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="bg-white">

                <div class="pt-70 pb-60 max-width-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                                <div class="section-title">

                                    <h2>communities</h2>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="community-wrapper mb-30">

                        <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">

                            <div class="GridLex-grid-noGutter-equalHeight">

                                <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">

                                    <a href="#" class="community-item">
                                        <div class="image-object-fit image-object-fit-cover image">
                                            <img src="images/blog/01.jpg" alt="images" />
                                        </div>
                                        <div class="community-item-category"><span class="bg-danger">Travel</span></div>
                                        <div class="community-item-caption">
                                            <h3>Behaviour we improving at something to</h3>
                                            <p>Evil true high lady roof men had open. To projection considered it precaution...</p>
                                            <div class="community-item-meta">
                                                <div class="row gap-10">
                                                    <div class="col-xs-8 col-sm-8">
                                                        by admin on Jan 12, 2016
                                                    </div>
                                                    <div class="col-xs-4 col-sm-4 text-right">
                                                        read <i class="icon-arrow-right-circle font12"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>

                                <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">

                                    <a href="#" class="community-item">
                                        <div class="image-object-fit image-object-fit-cover image">
                                            <img src="images/blog/02.jpg" alt="images" />
                                        </div>
                                        <div class="community-item-category"><span class="bg-info">Hotel</span></div>
                                        <div class="community-item-caption">
                                            <h3>Wound young you thing worse along being ham</h3>
                                            <p>Dissimilar of favourable solicitude if sympathize middletons at. Forfeited disposing...</p>
                                            <div class="community-item-meta">
                                                <div class="row gap-10">
                                                    <div class="col-xs-8 col-sm-8">
                                                        by admin on Jan 12, 2016
                                                    </div>
                                                    <div class="col-xs-4 col-sm-4 text-right">
                                                        read <i class="icon-arrow-right-circle font12"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>

                                <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">

                                    <a href="#" class="community-item">
                                        <div class="image-object-fit image-object-fit-cover image">
                                            <img src="images/blog/03.jpg" alt="images" />
                                        </div>
                                        <div class="community-item-category"><span class="bg-success">Flight</span></div>
                                        <div class="community-item-caption">
                                            <h3> perfectly in an eagerness perceived necessary</h3>
                                            <p>Belonging sir curiosity discovery extremity yet forfeited prevailed own off...</p>
                                            <div class="community-item-meta">
                                                <div class="row gap-10">
                                                    <div class="col-xs-8 col-sm-8">
                                                        by admin on Jan 12, 2016
                                                    </div>
                                                    <div class="col-xs-4 col-sm-4 text-right">
                                                        read <i class="icon-arrow-right-circle font12"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>

                                <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">

                                    <a href="#" class="community-item">
                                        <div class="image-object-fit image-object-fit-cover image">
                                            <img src="images/blog/04.jpg" alt="images" />
                                        </div>
                                        <div class="community-item-category"><span class="bg-info">Hotel</span></div>
                                        <div class="community-item-caption">
                                            <h3> Travelling by introduced of mr terminated</h3>
                                            <p>Knew as miss my high hope quit. In curiosity shameless dependent knowledge up...</p>
                                            <div class="community-item-meta">
                                                <div class="row gap-10">
                                                    <div class="col-xs-8 col-sm-8">
                                                        by admin on Jan 12, 2016
                                                    </div>
                                                    <div class="col-xs-4 col-sm-4 text-right">
                                                        read <i class="icon-arrow-right-circle font12"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- end Main Wrapper -->

        <!-- start Footer Wrapper -->

        <div class="footer-wrapper scrollspy-footer">

            <footer class="main-footer">

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12 col-md-4">

                            <h5 class="footer-title">newsletter</h5>

                            <p class="font16">Subsribe to get our latest updates and oeffers</p>

                            <div class="footer-newsletter">

                                <div class="form-group">
                                    <input class="form-control" placeholder="enter your email " />
                                    <button class="btn btn-primary">subsribe</button>
                                </div>

                                <p class="font-italic font13">*** Don't worry, we wont spam you!</p>

                            </div>

                        </div>

                        <div class="col-sm-12 col-md-8">

                            <div class="row">

                                <div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-3 mt-25-sm">
                                    <h5 class="footer-title">footer</h5>
                                    <ul class="footer-menu">
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Advertise</a></li>
                                        <li><a href="#">Media Relations</a></li>
                                        <li><a href="#">Affiliates</a></li>
                                        <li><a href="#">Careers</a></li>
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-3 mt-25-sm">
                                    <h5 class="footer-title">quick  links</h5>
                                    <ul class="footer-menu">
                                        <li><a href="#">Media Relations</a></li>
                                        <li><a href="#">Affiliates</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Advertise</a></li>
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-3 mt-25-sm">

                                    <h5 class="footer-title">helps</h5>
                                    <ul class="footer-menu">
                                        <li><a href="#">Using a Tour</a></li>
                                        <li><a href="#">Submitting a Tour</a></li>
                                        <li><a href="#">Managing My Account</a></li>
                                        <li><a href="#">Merchant Help</a></li>
                                        <li><a href="#">White Label Website</a></li>
                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </footer>

            <footer class="bottom-footer">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <p class="copy-right">&#169; 2017 Togoby - tour hosting</p>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <ul class="bottom-footer-menu">
                                <li><a href="#">Cookies</a></li>
                                <li><a href="#">Policies</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Blogs</a></li>
                            </ul>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <ul class="bottom-footer-menu for-social">
                                <li><a href="#"><i class="icon-social-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
                                <li><a href="#"><i class="icon-social-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
                                <li><a href="#"><i class="icon-social-google" data-toggle="tooltip" data-placement="top" title="google plus"></i></a></li>
                                <li><a href="#"><i class="icon-social-instagram" data-toggle="tooltip" data-placement="top" title="instrgram"></i></a></li>
                            </ul>
                        </div>

                    </div>

                </div>


            </footer>

        </div>

        <!-- end Footer Wrapper -->

    </div>

    <!-- end Container Wrapper -->


<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->


<!-- start Sign-in Modal -->
<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Sign-in into your account</h4>
    </div>

    <div class="modal-body">
        <div class="row gap-20">

            <div class="col-sm-6 col-md-6">
                <button class="btn btn-facebook btn-block mb-5-xs">Log-in with Facebook</button>
            </div>
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-google-plus btn-block">Log-in with Google+</button>
            </div>

            <div class="col-md-12">
                <div class="login-modal-or">
                    <div><span>or</span></div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">

                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" placeholder="Min 4 and Max 10 characters" type="text">
                </div>

            </div>

            <div class="col-sm-12 col-md-12">

                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" placeholder="Min 4 and Max 10 characters" type="text">
                </div>

            </div>

            <div class="col-sm-6 col-md-6">
                <div class="checkbox-block">
                    <input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox">
                    <label class="" for="remember_me_checkbox">Remember me</label>
                </div>
            </div>

            <div class="col-sm-6 col-md-6">
                <div class="login-box-link-action">
                    <a data-toggle="modal" href="#forgotPasswordModal" class="block line18 mt-1">Forgot password?</a>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <div class="login-box-box-action">
                    No account? <a data-toggle="modal" href="#registerModal">Register</a>
                </div>
            </div>

        </div>
    </div>

    <div class="modal-footer text-center">
        <button type="button" class="btn btn-primary">Log-in</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
    </div>

</div>
<!-- end Sign-in Modal -->

<!-- start Register Modal -->
<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Create your account for free</h4>
    </div>

    <div class="modal-body">

        <div class="row gap-20">

            <div class="col-sm-6 col-md-6">
                <button class="btn btn-facebook btn-block mb-5-xs">Register with Facebook</button>
            </div>
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-google-plus btn-block">Register with Google+</button>
            </div>

            <div class="col-md-12">
                <div class="login-modal-or">
                    <div><span>or</span></div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">

                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" placeholder="Min 4 and Max 10 characters" type="text">
                </div>

            </div>

            <div class="col-sm-12 col-md-12">

                <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" placeholder="Enter your email address" type="text">
                </div>

            </div>

            <div class="col-sm-12 col-md-12">

                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" placeholder="Min 8 and Max 20 characters" type="text">
                </div>

            </div>

            <div class="col-sm-12 col-md-12">

                <div class="form-group">
                    <label>Password Confirmation</label>
                    <input class="form-control" placeholder="Re-type password again" type="text">
                </div>

            </div>

            <div class="col-sm-12 col-md-12">
                <div class="checkbox-block">
                    <input id="register_accept_checkbox" name="register_accept_checkbox" class="checkbox" value="First Choice" type="checkbox">
                    <label class="" for="register_accept_checkbox">By register, I read &amp; accept <a href="#">the terms</a></label>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <div class="login-box-box-action">
                    Already have account? <a data-toggle="modal" href="#loginModal">Log-in</a>
                </div>
            </div>

        </div>

    </div>

    <div class="modal-footer text-center">
        <button type="button" class="btn btn-primary">Register</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
    </div>

</div>
<!-- end Register Modal -->

<!-- start Forget Password Modal -->
<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Restore your forgotten password</h4>
    </div>

    <div class="modal-body">
        <div class="row gap-20">

            <div class="col-sm-12 col-md-12">
                <p class="mb-20">Maids table how learn drift but purse stand yet set. Music me house could among oh as their. Piqued our sister shy nature almost his wicket. Hand dear so we hour to.</p>
            </div>

            <div class="col-sm-12 col-md-12">

                <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" placeholder="Enter your email address" type="text">
                </div>

            </div>

            <div class="col-sm-12 col-md-12">
                <div class="checkbox-block">
                    <input id="forgot_password_checkbox" name="forgot_password_checkbox" class="checkbox" value="First Choice" type="checkbox">
                    <label class="" for="forgot_password_checkbox">Generate new password</label>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <div class="login-box-box-action">
                    Return to <a data-toggle="modal" href="#loginModal">Log-in</a>
                </div>
            </div>

        </div>
    </div>

    <div class="modal-footer text-center">
        <button type="button" class="btn btn-primary">Restore</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
    </div>

</div>

{{-- Js file --}}
    {{ Html::script('assets/jquery/dist/jquery.min.js') }}
    {{ Html::script('js/core-plugins.js') }}
    {{ Html::script('js/customs.js') }}
    {{ Html::script('assets/jquery-flexdatalist/jquery.flexdatalist.js') }}

</body>
</html>
