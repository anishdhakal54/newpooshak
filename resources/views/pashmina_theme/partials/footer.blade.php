<!-- Footer Area start -->
<footer class="footer-area">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <!-- footer single wedget -->
        <div class="col-md-6 col-lg-4">
          <!-- footer logo -->
          <div class="footer-logo">
            <a href="index.html"><img src="assets/images/footer-logo.png" alt=""/></a>
          </div>
          <!-- footer logo -->
          <div class="about-footer">
            <p class="text-info">Buy online genuine shawls sweaters, mufflers, blankets etc made of pure Pashmina in
              Nepal.</p>
            <div class="need-help">
              <p class="phone-info">
                NEED HELP?
                <span>
                                                (+800) 345 678 <br/>
                                                (+800) 123 456
                                            </span>
              </p>
            </div>
            <div class="social-info">
              <ul>
                <li>
                  <a href="#"><i class="ion-social-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="ion-social-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="ion-social-youtube"></i></a>
                </li>
                <li>
                  <a href="#"><i class="ion-social-google"></i></a>
                </li>
                <li>
                  <a href="#"><i class="ion-social-instagram"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- footer single wedget -->
        <div class="col-md-6 col-lg-2 mt-res-sx-30px mt-res-md-30px">
          <div class="single-wedge">
            <h4 class="footer-herading">Information</h4>
            <div class="footer-links">
              <ul>
                <li><a href="#">Delivery</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="#">Secure Payment</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="#">Sitemap</a></li>
                <li><a href="#">Stores</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- footer single wedget -->
        <div class="col-md-6 col-lg-2 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
          <div class="single-wedge">
            <h4 class="footer-herading">Custom Links</h4>
            <div class="footer-links">
              <ul>
                <li><a href="#">Legal Notice</a></li>
                <li><a href="#">Prices Drop</a></li>
                <li><a href="#">New Products</a></li>
                <li><a href="#">Best Sales</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="my-account.html">My Account</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- footer single wedget -->
        <div class="col-md-6 col-lg-4 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
          <div class="single-wedge">
            <h4 class="footer-herading">Newsletter</h4>
            <div class="subscrib-text">
              <p>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal
                notice.</p>
            </div>

            @livewire('newsletter')

          </div>
        </div>
        <!-- footer single wedget -->
      </div>
    </div>
  </div>
  <!--  Footer Bottom Area start -->
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <p class="copy-text">
            @if(getConfiguration('copyright'))
              {{ getConfiguration('copyright') }}
            @else
              ? Copyright {{ date('Y') }}. All Rights Reserved.
            @endif
          </p>
        </div>
        <div class="col-md-6 col-lg-8">

        </div>
      </div>
    </div>
  </div>
  <!--  Footer Bottom Area End-->
</footer>
<!--  Footer Area End -->


