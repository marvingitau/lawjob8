@extends('layout.public')
@section('title','Contacts')
@section('content')


<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="text-primary">Contact Us</h2>
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('/')}}"> Home </a></li>
            <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Contact us </span></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--=================================
  inner banner -->

  <!--=================================
  feature-info -->
  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="feature-info feature-info-border p-4 text-center">
            <div class="feature-info-icon mb-3">
              <i class="fas fa-location-arrow"></i>
            </div>
            <div class="feature-info-content">
              <h5 class="text-black">Address</h5>
              <span class="d-block">214 West Arnold St. </span>
              <span>New York, NY 10002</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="feature-info feature-info-border p-4 text-center">
            <div class="feature-info-icon mb-3">
              <i class="fas fa-phone fa-flip-horizontal"></i>
            </div>
            <div class="feature-info-content">
              <h5 class="text-black">Phone Number</h5>
              <span class="d-block">(123) 345-6789</span>
              <span>(456) 478-2589</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <div class="feature-info feature-info-border p-4 text-center">
            <div class="feature-info-icon mb-3">
              <i class="fas fa-envelope-open-text"></i>
            </div>
            <div class="feature-info-content">
              <h5 class="text-black">Email</h5>
              <span class="d-block">support@jobber.demo</span>
              <span>gethelp@jobber.demo</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--=================================
  feature-info -->

  <section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8161326017776!2d36.817015214754065!3d-1.2842355990633185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d14ee06821%3A0x660d7985cd69c1d1!2sNational%20House%2C%2008%20Market%20St%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1636948780268!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </section>


@endsection
