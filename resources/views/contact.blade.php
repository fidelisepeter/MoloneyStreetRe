@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <!-- Contact Page Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h2 class="m-0">Contact</h2>
                <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('home.index') }}">Go Back
                    Home</a>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h6 class="font-weight-bold">Get in Touch</h6>
                        <p>We are here to assist you. Reach out to us through any of the following means, and we'll get back
                            to you promptly.</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">Our Office</h6>
                                <p class="m-0">
                                    {{ setting()->get('site_address', '1234 Demo Street, City, State, 56789') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">Email Us</h6>
                                <p class="m-0">{{ setting()->get('site_email', 'info@moloneystreet.com') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">Call Us</h6>
                                <p class="m-0">
                                    {{ site()->format_phone_number(setting()->get('site_phone', '1234567890')) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form bg-light mb-3" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="text" class="form-control p-4" id="name"
                                            placeholder="Your Name" required="required"
                                            data-validation-required-message="Please enter your name">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="email" class="form-control p-4" id="email"
                                            placeholder="Your Email" required="required"
                                            data-validation-required-message="Please enter your email">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="4" id="message" placeholder="Message" required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Page End -->
@endsection
