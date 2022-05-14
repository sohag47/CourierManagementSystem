@extends('index')

@section('content')
<div class="features" id="features">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Welcome To ARK Currier Service</h2>
                    <div class="section_subtitle">
                        <h4>আপনার ব্যবসার বিশ্বস্ত ও আদর্শ ডেলিভারি সিস্টেম</h4>
                        <small>বিশ্বাসযোগ্যতা আমাদের প্রথম অগ্রাধিকার</small>
                        <p> আমাদের ইনোভেটিভ লজিস্টিক ডিজাইনের মাধ্যমে আমরা কম মূল্যে সর্বোচ্চ সেবার মান নিশ্চিত
                            করে থাকি। আমরা প্রতিনিয়ত কুরিয়ারকৃত
                            প্রোডাক্ট সঠিক সময়ে সঠিক জায়গায় পোঁছে দিচ্ছি। </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row features_row">
            {{-- <h2 class="section_title">Our Branches</h2> --}}
            <!-- Features Item -->
            @foreach ($addresses as $address)
            <div class="col-lg-3 feature_col">
                <div class="feature text-center trans_400">
                    <h3 class="feature_title course_price ml-auto">{{$address->address}}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Popular Courses -->

<div class="branches" id="branches">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Our Branches</h2>
                    <div class="section_subtitle">
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu.
                            Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p>
                        --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row courses_row">

            <!-- Course -->
            @foreach ($branches as $branch)
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_body">
                        <h3 class="course_title">{{$branch->name}} Branch</h3>
                        <div class="course_teacher">{{$branch->phone}}</div>
                        <div class="course_text">
                            <span class="course_price ml-auto">Address: {{$branch->addresses->address}}</span>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- search order -->

<div class="newsletter" id="search_order">
    <div class="newsletter_background parallax-window" data-parallax="scroll"
        data-image-src="{{ asset('website/images/newsletter.jpg') }}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div
                    class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    <!-- Newsletter Content -->
                    <div class="newsletter_content text-lg-left text-center">
                        <div class="newsletter_title">Search Your Order</div>
                        {{-- <div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals
                            we
                            offer
                        </div> --}}
                    </div>

                    <!-- Newsletter Form -->
                    <div class="newsletter_form_container ml-lg-auto">
                        <form action="{{ route('search_order')}}" id="newsletter_form"
                            class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                            <input type="text" class="newsletter_input" name="order_id"
                                placeholder="Search By Order ID: ORDER-00000" required="required">
                            <button type="submit" class="newsletter_button">Search</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop