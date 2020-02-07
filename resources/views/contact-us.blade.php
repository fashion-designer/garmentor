@extends('layout')

@section('header')
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container">
                <h2 class="masthead-subheading mb-0">Contact Us</h2>
                <p style="font-size: 25px">Fill the form and we will be in touch.</p>
            </div>
        </div>
    </header>
@endsection

@section('body')
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 order-lg-1">
                    <div class="p-5">
                        <form method="post" action="{{ route('contact-us') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row m-0">
                                <div class="col-lg-12 p-0">
                                    <div class="garmentor-m-t-6 garmentor-m-b-6 garmentor-m-l-6 garmentor-m-r-3 garmentor-p-6 border-radius-5 background-white">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                    <label for="first_name" class="col-md-12 control-label">First Name*</label>
                                                    <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>
                                                </div>
                                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                    <label for="last_name" class="col-md-12 control-label">Last Name*</label>
                                                    <input id="last_name" type="text" class="form-control" name="last_name" required>
                                                </div>
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-12 control-label">E-Mail Address*</label>
                                                    <input id="email" type="email" class="form-control" name="email" required>
                                                </div>
                                                @include('shared.country-codes')
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="comment" class="col-md-12 control-label">Comments*</label>
                                                    <textarea id="comment" name="comment" class="form-control" rows="5" placeholder="add you comments here.."></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Submit" class="btn btn-info float-right" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <footer class="py-5 bg-black">
        <div class="container">
        </div>
    </footer>
@endsection