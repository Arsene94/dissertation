@extends('template.app')

@section('title')
Home
@endsection

@section('content')
<!-- Start Header Section -->
<div class="banner">
    <div class="overlay">
        <div class="container">
            <div class="intro-text">
                <h1>Welcome To The <span>QAPAR</span> <br> -  <br><span>Q&A, Polls and Audience Response</span></h1>
                <p>Create an event for schools, high schools, universities, company meetings or events.<br> It's simply.</p>
                <div class="big-buttons">
                    <div class="big-buttons__join-wrap display-flex flex-dir-column align-items-center ng-scope">
                        <form id="joinFormMain" class="ng-pristine ng-valid ng-valid-maxlength">
                            <div class="join-group">
                                <div class="join-group__addon">#</div>
                                <input autocorrect="off" autocapitalize="off" name="search" id="eventValueMain" type="text" maxlength="32" class="join-group__event-code ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched" aria-label="Enter event code" placeholder="Enter event code" autocomplete="off">
                                <div class="join-group__submit">
                                    <button id="submit" value="Submit" type="submit" class="join-group__button">
                                        <span class="join-group__join-label">Join</span>
                                        <span class="spinner inverted spinner-md"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--<div class="big-buttons__or-wrap hidden-xs hidden-sm">
                        or
                    </div>
                    <div class="m-top-1 visible-sm"></div>
                    <div class="big-buttons__create-wrap hidden-xs">
                        <div class="create-group">
                            <a href="#feature" class="page-scroll btn btn-primary">Sign up</a>
                        </div>
                    </div> -->
                </div>
                <div class="join-group__label join-blur" id="acceot">By using this app I agree to the <a href="/acceptable-use" class="link--white"><u>Acceptable Use Policy</u></a></div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#acceot").hide();
    $("#eventValueMain").focus(function(){
        $("#acceot").slideDown("slow");
    });

    $("#eventValueMain").blur(function(){
        $("#acceot").slideUp('slow');
    });
</script>
<!-- End Header Section -->

<section id="about-section" class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                    <h2>About Us</h2>
                </div>						
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="about-img">
                    <img src="images/presentation2.jpg" class="img-responsive" alt="About images">
                    <div class="head-text">
                        <p>Helps develop the education, your courses you teach, or any type of event with a simple click. Make your work easier and at the same time more enjoyable with QAPAR.</p>
                        <span>CEO, Arsene Claudiu Ion</span>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about-text">
                    <p>QAPAR is a free and open source project for educational purposes by <a href="#">Arsene Claudiu Ion</a> as a dissertation project. This is an audience response platform for schools, high schools, universities, but also for company meetings, meetings or events.</p>
                </div>

                <div class="about-list">
                    <h4>Some important Feature</h4>
                    <ul>
                        <li><i class="fa fa-check-square"></i>Different types of questions (Polls, Word Cloud, Multiple Choice, Open Text, Rating, Survey etc).</li>
                        <li><i class="fa fa-check-square"></i>Replies.</li>
                        <li><i class="fa fa-check-square"></i>Words filter.</li>
                        <li><i class="fa fa-check-square"></i>Data analytics.</li>
                        <li><i class="fa fa-check-square"></i>Data export.</li>
                    </ul>
                    
                    <h4>More Feature</h4>
                    <ul>
                        <li><i class="fa fa-check-square"></i>Visualise results in graphs.</li>
                        <li><i class="fa fa-check-square"></i>Track number of connected users.</li>
                        <li><i class="fa fa-check-square"></i>User accounts and admin areas.</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Start Call to Action Section -->
<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow zoomIn" data-wow-duration="2s" data-wow-delay="300ms">
                <p></p>
            </div>
        </div>
    </div>
</section>
<!-- End Call to Action Section -->

<!-- Start Team Member Section -->
<!--<section id="team-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                    <h2>Our Team</h2>
                    <p>Meet our team</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                <div class="team-member">
                    <img src="images/team/arsene.jpg" class="img-responsive" alt="">
                    <div class="team-details">
                        <h4>Arsene Claudiu Ion</h4>
                        <p>Founder & Director</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                <div class="team-member">
                    <img src="images/team/sardar.jpg" class="img-responsive" alt="">
                    <div class="team-details">
                        <h4>Sardar Jaf</h4>
                        <p>Supervisor & Coordinator</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section> -->
<!-- End Team Member Section -->

<!-- Start Portfolio Section -->
<section id="portfolio" class="portfolio-section-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                    <h2>Our Services</h2>
                    <p>Free for all and open-source</p>
                </div>						
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="services-post">
                    <a><i class="fab fa-skyatlas"></i></a>
                    <h2>Responsive design</h2>
                    <p>Easy-to-use on all devices</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a><i class="fas fa-globe"></i></a>
                    <h2>Various functions</h2>
                    <p>A lot of feature like different type of polls</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a><i class="far fa-file-word"></i></a>
                    <h2>Words filter</h2>
                    <p>Filter against swearing</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a><i class="fas fa-star-half-alt"></i></a>
                    <h2>Answer scoring</h2>
                    <p>Easy to add points or score to correct answers</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a><i class="fas fa-chart-pie"></i></a>
                    <h2>Data analytics</h2>
                    <p>Advanced data analytics system</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a><i class="fas fa-file-export"></i></a>
                    <h2>Data export</h2>
                    <p>Export results to suitable file format</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a><i class="fas fa-users-cog"></i></a>
                    <h2>User & admin area</h2>
                    <p>User accounts and admin areas</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a><i class="fas fa-tasks"></i></a>
                    <h2>Many other</h2>
                    <p>Many other features</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Portfolio Section -->


<!-- Start Service Section -->
<!--<section id="service-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                    <h2>Our Services</h2>
                    <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                </div>						
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="services-post">
                    <a href="#"><i class="fa fa-skyatlas"></i></a>
                    <h2>RESPONSIVE DESIGN</h2>
                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a href="#"><i class="fa fa-magic"></i></a>
                    <h2>RESPONSIVE DESIGN</h2>
                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a href="#"><i class="fa fa-gift"></i></a>
                    <h2>RESPONSIVE DESIGN</h2>
                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a href="#"><i class="fa fa-diamond"></i></a>
                    <h2>RESPONSIVE DESIGN</h2>
                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a href="#"><i class="fa fa-wordpress"></i></a>
                    <h2>RESPONSIVE DESIGN</h2>
                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a href="#"><i class="fa fa-forumbee"></i></a>
                    <h2>RESPONSIVE DESIGN</h2>
                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a href="#"><i class="fa fa-bicycle"></i></a>
                    <h2>RESPONSIVE DESIGN</h2>
                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services-post">
                    <a href="#"><i class="fa fa-foursquare"></i></a>
                    <h2>RESPONSIVE DESIGN</h2>
                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Start Service Section -->



<!-- Start Testimonial Section -->
<!--<section id="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-wrapper">
                    <div class="testimonial-item">
                        <p></p>
                        <img src="images/team/arsene.jpg" alt="Director & Founder">
                        <h5>Arsene Claudiu Ion</h5>
                        <div class="desgnation">CEO, QAPAR</div>
                    </div>
                    <div class="testimonial-item">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <img src="images/team/team-2.jpg" alt="Testimonial images">
                        <h5>John Doe</h5>
                        <div class="desgnation">CEO, ThemeBean</div>
                    </div>
                    <div class="testimonial-item">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <img src="images/team/team-3.jpg" alt="Testimonial images">
                        <h5>John Doe</h5>
                        <div class="desgnation">CEO, ThemeBean</div>
                    </div>
                    <div class="testimonial-item">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <img src="images/team/team-4.jpg" alt="Testimonial images">
                        <h5>John Doe</h5>
                        <div class="desgnation">CEO, ThemeBean</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- End Testimonial Section -->
@endsection