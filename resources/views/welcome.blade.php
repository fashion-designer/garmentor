@extends('layout')

@section('header')
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container">
                <h1 class="masthead-heading mb-0 app-logo">
                    <span>GARMENTOR</span>
                </h1>
                <h2 class="masthead-subheading mb-0"><span class="app-logo">MENTOR</span> for your <span class="app-logo">GARMENT</span></h2>
                <a href="#step1" class="btn btn-primary btn-xl rounded-pill mt-5">Learn More</a>
            </div>
        </div>
    </header>
@endsection

@section('body')
    <section id="step1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="font-size-2">1.Start Order</h2>
                        <p>Create a new order for your next dress/garment by clicking the Start Order button below.</p>
                        <p>Add a small description of what type of dress/garment you are looking for or upload any images that you have to use as a reference.</p>
                        <p>Our designer will reach out to you to collect the required details and give you a price range.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-5">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="font-size-2">2.Provide Measurements</h2>
                        <p>Upon the designer's request provide required measurements through this application or by visiting us.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="font-size-2">3.Receive Your Dress</h2>
                        <p>Keep track of your order progress by receiving updates from our designer.</p>
                        <p>Upon completion provide shipping details to receive your garment/dress or collect it from us personally.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <footer class="py-5 bg-black">
        <div class="container">
            <a class="text-white float-right" href="{!! route('contact-us') !!}">Contact Us</a>
        </div>
    </footer>
@endsection