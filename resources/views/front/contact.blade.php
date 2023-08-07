@extends('layouts.main')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>contact us</h3>
                        <p>
                            For general enquiries, advice, clarity or information about products, farms, how to collaborate with us, then don't hesitate to get in touch!
                        </p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Address : No 3 MCC Road, Ama wire, Owerri, Osun State <br>
                                <span>Farm Address: </span> Imo State University of Agriculture, Umuagwo, Imo State
                            </li>
                            <li><i class="fa fa-phone"></i> <a href="tel:(+234) 07013505130">(+234) 07013505130</a>, &nbsp;<a href="tel:(+234) 08130197019">(+234) 08130197019</a>, &nbsp;<a href="tel:(+234) 0805 6088352">(+234) 0805 6088352</a></li>
                            <li><i class="fa fa-envelope-o"></i> <a href="mailto:navigandng@gmail.com">navigandng@gmail.com</a> / <a href="mailto:info@navigand.com">info@navigand.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>You can also Write us</h3>
                        <p class="form-messege">
                            @include('inc._message')
                        </p>
                        <form id="contact-form" method="POST"  action="/contact-us">
                            @csrf
                            <p>
                                <label> Your Name (required)</label>
                                <input name="name" placeholder="Name *" type="text" required>
                            </p>
                            <p>
                                <label>  Your Phone Number (required)</label>
                                <input name="phone" placeholder="Phone Number *" type="text" required>
                            </p>
                            <p>
                                <label>  Your Email (required)</label>
                                <input name="email" placeholder="Email *" type="email" required>
                            </p>
                            <p>
                                <label>  Subject</label>
                                <input name="subject" placeholder="Subject *" type="text" required>
                            </p>
                            <div class="contact_textarea">
                                <label>  Your Message</label>
                                <textarea placeholder="Message *" name="message"  class="form-control2" required></textarea>
                            </div>
                            <input type="submit" value="Send Message" class="btn btn-success bg-success text-white">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--contact area end-->
@endsection
