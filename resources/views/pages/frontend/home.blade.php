@extends('layouts.frontend')

@section('content')
<!--body content wrap start-->
<div class="main">

    <!--hero section start-->
    <section class="hero-section background-img ptb-100" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-7 col-lg-6">
                    <div class="position-relative mt-lg-0 mt-md-0 mt-5 text-white">
                        <h3 class="text-white">Sahabat Pintar</h3>
                        <h1 class="text-white big-text mb-0">Food Digital</h1>
                        <p class="lead">Limited time offer download and updated our app, synthesize accurate users
                            whereas communities assertively evolve technically sound whereas real-time materials.
                        </p>
                        <a href="#product" class="btn page-scroll google-play-btn">Get Started Now</a>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="offer-tag-wrap position-relative z-index">
                        <img src="{{ asset('frontend/img/hero.png') }}" alt="app" class="img-fluid" />

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->

    <!--promo section start-->
    <section class="promo-section ptb-100" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="section-heading text-center mb-5">
                        <h2>Kenapa Pilih Food Digital ?</h2>
                        <p class="lead">
                            Following reasons show advantages of adding AppCo to your lead pages, demos and
                            checkouts
                        </p>
                    </div>
                </div>
            </div>
            <div class="row equal">
                <div class="col-md-4 col-lg-4">
                    <div class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-5 h-100">
                        <div class="circle-icon mb-5">
                            <span class="ti-vector text-white"></span>
                        </div>
                        <h5>Clean Design</h5>
                        <p>Increase sales by showing true dynamics of your website.</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-5 h-100">
                        <div class="circle-icon mb-5">
                            <span class="ti-lock text-white"></span>
                        </div>
                        <h5>Secure Data</h5>
                        <p>Build your online store’s trust using Social Proof & Urgency.</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-5 h-100">
                        <div class="circle-icon mb-5">
                            <span class="ti-eye text-white"></span>
                        </div>
                        <h5>Retina Ready</h5>
                        <p>Realize importance of social proof in customer’s purchase decision.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--promo section end-->

    <!--our blog section start-->
    <section id="product" class="our-blog-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-heading mb-5">
                        <h2>Produk Kami</h2>
                        <p>
                            Enthusiastically drive revolutionary opportunities before emerging leadership.
                            Distinctively
                            transform tactical methods of empowerment via resource sucking core.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($items as $item)
                <div class="col-md-4">
                    <div class="single-blog-card card border-0 shadow-sm">
                        <span class="category position-absolute badge badge-pill badge-primary">Makanan</span>
                        <img src="{{ asset('backend/barang/' . $item->foto_barang) }}"
                            class="card-img-top position-relative" alt="blog">
                        <div class="card-body">
                            <div class="post-meta mb-2">
                                <ul class="list-inline meta-list">
                                    <li class="list-inline-item">Jan 21, 2019</li>
                                    <li class="list-inline-item"><span>45</span> Terjual</li>
                                    <li class="list-inline-item"><span>10</span> Share</li>
                                </ul>
                            </div>
                            <h3 class="h5 card-title"><a href="{{ route('detail-produk', $item->slug) }}">{{
                                    $item->nama_barang }}</a></h3>
                            <p class="card-text">{!! substr($item->deskripsi, 0, 75) !!}...</p>
                            <a href="{{ route('detail-produk', $item->slug) }}" class="detail-link">Read more <span
                                    class="ti-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--our blog section end-->

    <!--contact us section start-->
    <section id="contact" class="contact-us ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-3 message-box d-none">
                    <div class="alert alert-danger"></div>
                </div>
                <div class="col-md-5">
                    <div class="section-heading">
                        <h3>Contact with us</h3>
                        <p>It's very easy to get in touch with us. Just use the contact form or pay us a
                            visit for a coffee at the office. Dynamically innovate competitive technology after an
                            expanded array of leadership.</p>
                    </div>
                    <div class="footer-address">
                        <h6><strong>Head Office</strong></h6>
                        <p>121 King St, Melbourne VIC 3000, Australia</p>
                        <ul>
                            <li><span>Phone: +61 2 8376 6284</span></li>
                            <li><span>Email : <a href="mailto:hello@yourdomain.com">hello@yourdomain.com</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <form action="#" method="POST" id="contactForm" class="contact-us-form" novalidate="novalidate">
                        <h5>Reach us quickly</h5>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter name" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter email" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" name="phone" value="" class="form-control" id="phone"
                                        placeholder="Your Phone">
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" name="company" value="" size="40" class="form-control"
                                        id="company" placeholder="Your Company">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" rows="7" cols="25"
                                        placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <button type="submit" class="btn solid-btn" id="btnContactUs">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </section>
    <!--contact us section end-->

</div>
<!--body content wrap end-->
@endsection