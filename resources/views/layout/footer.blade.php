<!--=================================
Footer-->
<footer class="footer mt-0">
    <div class="container pb-4 pb-lg-5">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="footer-link">
            <h5 class="text-dark mb-4">Page Link</h5>
            <ul class="list-unstyled">
                <li><a href="{{ url('/')}}">Home</a></li>
                <li><a href="{{ url('about')}}">About Us</a></li>
              <li><a href="{{ url('joblist')}}">Job List</a></li>
              <li><a href="{{ url('contacts')}}">Contact Us</a></li>

            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
          <div class="footer-link">
            <h5 class="text-dark mb-4">For Employers</h5>
            <ul class="list-unstyled">
              <li><a href="{{url('employer')}}">Dashboard</a></li>
              <li><a href="{{url('employer/Profile/View')}}">Profile</a></li>
              <li><a href="{{url('employer/Job/Create')}}">Add Job</a></li>
              <li><a href="{{url('employer/Order/Forms')}}">Job Packages</a></li>
            </ul>
          </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
          <div class="footer-link">
            <h5 class="text-dark mb-4">Partner Sites</h5>
            <ul class="list-unstyled">
              <li><a href="#">Shortcodes</a></li>
              <li><a href="#">Job Page</a></li>
              <li><a href="#">Job Page Alternative </a></li>
              <li><a href="#">Resume Page</a></li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="contact-us.html">Contact</a></li>
            </ul>
          </div>
        </div> --}}
        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" style="margin-left:auto">
          <div class="footer-contact-info bg-holder" style="background-image: url(images/google-map.png);">
            <h5 class="text-dark mb-4">Contact Us</h5>
            <ul class="list-unstyled mb-0">
              <li> <i class="fas fa-map-marker-alt text-primary"></i><span>Karen Nairobi Kenya</span> </li>
              <li> <i class="fas fa-mobile-alt text-primary"></i><span>+254 0123 456 789</span> </li>
              <li> <i class="far fa-envelope text-primary"></i><span>hello@pupool.ke</span> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="border-bottom"></div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-9 text-center text-md-start">
            <p class="mb-0"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#">pupool </a> All Rights Reserved </p>
          </div>
              <div class="col-md-3 mt-4 mt-md-0">
                <div class="social d-flex justify-content-lg-end justify-content-center">
                  <ul class="list-unstyled">
                    <li class="facebook"><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>

          </div>
		  <div class="row">
		      <div class="col-md-8"></div>
		        <div class="col-md-4">
    			<div class="built-by d-flex justify-content-end">
    		    <span> Design & Built By <a href="https://arkitech.co.ke" style="color:unset;">ARKITECH</a> </span>
    			</div>
    			</div>


		  </div>
        </div>
      </div>
    </div>
  </footer>
  <!--=================================
  Footer-->
