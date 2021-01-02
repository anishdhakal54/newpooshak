<!-- Header Start -->
<header class="main-header home-10">
  <!-- Header Top Start -->
  <div class="header-top-nav">
    <div class="container">
      <div class="row">
        <!--Left Start-->
        <div class="col-lg-6 col-md-6">
          <div class="left-text">

            <span class="social-info socialc">
                <ul>
                  <li class="headercontact">
                    <i class="ion-android-mail"></i> <a href="#">{{getConfiguration('site_primary_email')}}</a>
                  </li>
                  @if(getConfiguration('facebook_link') || getConfiguration('twitter_link') || getConfiguration('googleplus_link') || getConfiguration('instagram_link') || getConfiguration('linkedin_link'))
                    @if(getConfiguration('facebook_link'))
                      <li>
                        <a href="{{ getConfiguration('facebook_link') }}"><i class="ion-social-facebook"></i></a>
                    </li>

                    @endif
                    @if(getConfiguration('twitter_link'))
                      <li>
                        <a href="{{ getConfiguration('twitter_link') }}"><i class="ion-social-twitter"></i></a>
                    </li>

                    @endif
                    @if(getConfiguration('googleplus_link'))
                      <li>
                        <a href="{{ getConfiguration('googleplus_link') }}"><i class="ion-social-google"></i></a>
                    </li>

                    @endif
                    @if(getConfiguration('linkedin_link'))
                      <li>
                        <a href="{{ getConfiguration('linkedin_link') }}"><i class="ion-social-linkdin"></i></a>
                    </li>
                    @endif
                  @endif
                </ul>
            </span>
          </div>
        </div>
        <!--Left End-->
        <!--Right Start-->
        <div class="col-lg-6 col-md-6 text-right m0auto">
          <div class="header-right-nav">
            <div class="top-menu-area">
              <ul class="top-menu">
                @if(!Auth::check())
                  <li><a href="#" data-toggle="modal" data-target="#accountModal">Login / Register</a>
                  </li>
                @else
                  @role(['admin', 'manager','shop-manager'])
                  <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                  @endrole
                  <li><a href="{{ route('my-account') }}">My Account</a></li>
                  <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                @endif


                <li><a href="#">Dashboard</a></li>
                <li><a href="#">My Account</a></li>
                <li>
                  <a href="#"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                  <form id="logout-form" action="#" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="1emA3gQv8M70brcOuCfE5FjkrofSGsCuxMwMEeuG">
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!--Right End-->
      </div>
    </div>
  </div>
  <!-- Header Top End -->
  <!-- Header Buttom Start -->
  <div class="header-navigation d-lg-block d-none">
    <div class="container">
      <div class="row">
        <!-- Logo Start -->
        <div class="col-md-4 col-sm-2">
          <div class="logo">
            <a href="/"><img src="assets/images/logo.png" alt=""/></a>
          </div>
        </div>
        <!-- Logo End -->
        <div class="col-md-8 col-sm-10 itemcenter">
          <!--Header Bottom Account Start -->
          <div class="header_account_area home-6">
            <!--Seach Area Start -->
            <div class="header_account_list search_list">
              <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
              <div class="dropdown_search">
                <form action="#">
                  <input placeholder="Search entire store here ..." type="text"/>
                  <div class="search-category">
                    <select class="bootstrap-select" name="poscats">
                      <option value="-1">All Categories</option>
                      <option value="70">Tulshi Mala</option>
                      <option value="66">Nepali Statues</option>
                      <option value="63">Nepali Handicrafts</option>
                      <option value="62">Wooden Wall Hangings</option>
                      <option value="59">Future Product</option>
                      <option value="56">Featured Product</option>
                      <option value="50">Wooden Craft</option>
                      <option value="49">Thangka Paintings</option>
                      <option value="45">Musical Instruments</option>
                      <option value="43">Life Style</option>
                      <option value="42">Buddha Chitta Mala</option>
                      <option value="41">Pashmina</option>
                      <option value="39">Rudrakshya Mala</option>
                      <option value="38">Lokta Paper Products</option>
                      <option value="34">Oil Painting</option>
                      <option value="32">Statues</option>
                      <option value="31">Nepali Beads</option>
                      <option value="29">Handicrafts</option>
                      <option value="28">Wooden Stupa</option>
                      <option value="15">Uncategorized</option>
                    </select>
                  </div>
                  <button type="submit"><i class="ion-ios-search-strong"></i></button>
                </form>
              </div>
            </div>
            <!--Seach Area End -->
            <!--Cart info Start -->
            <div class="cart-info-wrap">
              <div class="cart-info d-flex home-9">
                <style>
                  .count-cart.heart:after {
                    content: '21';
                  }

                  .count-cart:after {
                    content: '22';
                  }
                </style>
                <a href="wishlist.html" class="count-cart heart"></a>
                <div class="mini-cart-warp">
                  <a href="#" class="count-cart"><span>$20.00</span></a>
                  <div class="mini-cart-content">
                    <ul>
                      <li class="single-shopping-cart">
                        <div class="shopping-cart-img">
                          <a href="single-product.html"><img alt=""
                                                             src="assets/images/product-image/mini-cart/1.jpg"/></a>
                          <span class="product-quantity">1x</span>
                        </div>
                        <div class="shopping-cart-title">
                          <h4><a href="single-product.html">Juicy Couture...</a></h4>
                          <span>$9.00</span>
                          <div class="shopping-cart-delete">
                            <a href="#"><i class="ion-android-cancel"></i></a>
                          </div>
                        </div>
                      </li>
                      <li class="single-shopping-cart">
                        <div class="shopping-cart-img">
                          <a href="single-product.html"><img alt=""
                                                             src="assets/images/product-image/mini-cart/2.jpg"/></a>
                          <span class="product-quantity">1x</span>
                        </div>
                        <div class="shopping-cart-title">
                          <h4><a href="single-product.html">Water and Wind...</a></h4>
                          <span>$11.00</span>
                          <div class="shopping-cart-delete">
                            <a href="#"><i class="ion-android-cancel"></i></a>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="shopping-cart-total">
                      <h4>Subtotal : <span>$20.00</span></h4>
                      <h4>Shipping : <span>$7.00</span></h4>
                      <h4>Taxes : <span>$0.00</span></h4>
                      <h4 class="shop-total">Total : <span>$27.00</span></h4>
                    </div>
                    <div class="shopping-cart-btn text-center">
                      <a class="default-btn" href="checkout.html">checkout</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Cart info End -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Header Bottom Account End -->
  <!-- Menu Content Start -->
  <div class="header-buttom-nav sticky-nav">
    <div class="container position-relative">
      <div class="row">
        <div class="col-md-12 text-left">
          <div class="d-flex align-items-start justify-content-start">
            <!--Main Navigation Start -->
            <div class="main-navigation d-none d-lg-block">
              <ul>
                <li><a href="#">Home</a></li>
                <li class="menu-dropdown">
                  <a href="#">Categories <i class="ion-ios-arrow-down"></i></a>
                  <ul class="sub-menu">
                    <li class="menu-dropdown position-static">
                      <a href="#">Statue <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index.html">Wooden Statue</a></li>
                        <li><a href="index-2.html">God Statue</a></li>
                        <li><a href="index-3.html">Nature Statue</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Handicrafts <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index-5.html">Handicrafts 1</a></li>
                        <li><a href="index-6.html">Handicrafts 2</a></li>
                        <li><a href="index-7.html">Handicrafts 3</a></li>
                        <li><a href="index-8.html">Handicrafts 4</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Pashmina <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index-9.html">Pashmina 1</a></li>
                        <li><a href="index-10.html">Pashmina 2</a></li>
                        <li><a href="index-11.html">Pashmina 3</a></li>
                        <li><a href="index-12.html">Pashmina 4</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Music Instrument <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index-13.html">Music Instrument 1</a></li>
                        <li><a href="index-14.html">Music Instrument 2</a></li>
                        <li><a href="index-15.html">Music Instrument 3</a></li>
                        <li><a href="index-16.html">Music Instrument 4</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Nepali Beads <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index-17.html">Nepali Beads 1</a></li>
                        <li><a href="index-18.html">Nepali Beads 2</a></li>
                        <li><a href="index-19.html">Nepali Beads 3</a></li>
                        <li><a href="index-20.html">Nepali Beads 4</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="/contact-us">Contact Us</a></li>
                <!--<li class="menu-dropdown">
                  <a href="#">Home <i class="ion-ios-arrow-down"></i></a>
                  <ul class="sub-menu">
                    <li class="menu-dropdown position-static">
                      <a href="#">Home Organic <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index.html">Organic 1</a></li>
                        <li><a href="index-2.html">Organic 2</a></li>
                        <li><a href="index-3.html">Organic 3</a></li>
                        <li><a href="index-4.html">Organic 4</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Home Cosmetic <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index-5.html">Cosmetic 1</a></li>
                        <li><a href="index-6.html">Cosmetic 2</a></li>
                        <li><a href="index-7.html">Cosmetic 3</a></li>
                        <li><a href="index-8.html">Cosmetic 4</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Home Digital <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index-9.html">Digital 1</a></li>
                        <li><a href="index-10.html">Digital 2</a></li>
                        <li><a href="index-11.html">Digital 3</a></li>
                        <li><a href="index-12.html">Digital 4</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Home Furniture <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index-13.html">Furniture 1</a></li>
                        <li><a href="index-14.html">Furniture 2</a></li>
                        <li><a href="index-15.html">Furniture 3</a></li>
                        <li><a href="index-16.html">Furniture 4</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Home Medical <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="index-17.html">Medical 1</a></li>
                        <li><a href="index-18.html">Medical 2</a></li>
                        <li><a href="index-19.html">Medical 3</a></li>
                        <li><a href="index-20.html">Medical 4</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="menu-dropdown">
                  <a href="#">Shop <i class="ion-ios-arrow-down"></i></a>
                  <ul class="mega-menu-wrap">
                    <li>
                      <ul>
                        <li class="mega-menu-title"><a href="#">Shop Grid</a></li>
                        <li><a href="shop-3-column.html">Shop Grid 3 Column</a></li>
                        <li><a href="shop-4-column.html">Shop Grid 4 Column</a></li>
                        <li><a href="shop-left-sidebar.html">Shop Grid Left Sidebar</a></li>
                        <li><a href="shop-right-sidebar.html">Shop Grid Right Sidebar</a></li>
                      </ul>
                    </li>
                    <li>
                      <ul>
                        <li class="mega-menu-title"><a href="#">Shop List</a></li>
                        <li><a href="shop-list.html">Shop List</a></li>
                        <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                        <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                      </ul>
                    </li>
                    <li>
                      <ul>
                        <li class="mega-menu-title"><a href="#">Shop Single</a></li>
                        <li><a href="single-product.html">Shop Single</a></li>
                        <li><a href="single-product-variable.html">Shop Variable</a></li>
                        <li><a href="single-product-affiliate.html">Shop Affiliate</a></li>
                        <li><a href="single-product-group.html">Shop Group</a></li>
                        <li><a href="single-product-tabstyle-2.html">Shop Tab 2</a></li>
                        <li><a href="single-product-tabstyle-3.html">Shop Tab 3</a></li>
                      </ul>
                    </li>
                    <li>
                      <ul>
                        <li class="mega-menu-title"><a href="#">Shop Single</a></li>
                        <li><a href="single-product-slider.html">Shop Slider</a></li>
                        <li><a href="single-product-gallery-left.html">Shop Gallery Left</a></li>
                        <li><a href="single-product-gallery-right.html">Shop Gallery Right</a></li>
                        <li><a href="single-product-sticky-left.html">Shop Sticky Left</a></li>
                        <li><a href="single-product-sticky-right.html">Shop Sticky Right</a></li>
                      </ul>
                    </li>
                    <li class="w-100">
                      <ul class="banner-megamenu-wrapper d-flex">
                        <li class="banner-wrapper mr-30px">
                          <a href="single-product.html"><img src="assets/images/banner-image/banner-menu-3.jpg"
                                                             alt=""/></a>
                        </li>
                        <li class="banner-wrapper">
                          <a href="single-product.html"><img src="assets/images/banner-image/banner-menu-4.jpg"
                                                             alt=""/></a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="menu-dropdown">
                  <a href="#">Pages <i class="ion-ios-arrow-down"></i></a>
                  <ul class="sub-menu">
                    <li><a href="about.html">About Page</a></li>
                    <li><a href="cart.html">Cart Page</a></li>
                    <li><a href="checkout.html">Checkout Page</a></li>
                    <li><a href="compare.html">Compare Page</a></li>
                    <li><a href="login.html">Login & Regiter Page</a></li>
                    <li><a href="my-account.html">Account Page</a></li>
                    <li><a href="wishlist.html">Wishlist Page</a></li>
                  </ul>
                </li>
                <li class="menu-dropdown">
                  <a href="#">Blog <i class="ion-ios-arrow-down"></i></a>
                  <ul class="sub-menu">
                    <li class="menu-dropdown position-static">
                      <a href="#">Blog Grid <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                        <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Blog List <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                        <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                      </ul>
                    </li>
                    <li class="menu-dropdown position-static">
                      <a href="#">Blog Single <i class="ion-ios-arrow-down"></i></a>
                      <ul class="sub-menu sub-menu-2">
                        <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a></li>
                        <li><a href="blog-single-right-sidebar.html">Blog Single Right Sidebar</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="contact.html">Contact Us</a></li>-->
              </ul>
            </div>
            <!--Main Navigation End -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Menu Content End -->
  <!-- Header Buttom Start -->
  <div class="header-navigation sticky-nav d-lg-none">
    <div class="container position-relative">
      <div class="row">
        <!-- Logo Start -->
        <div class="col-md-2 col-sm-2">
          <div class="logo">
            <a href="index.html"><img src="assets/images/logo/logo-electronic-2.jpg" alt=""/></a>
          </div>
        </div>
        <!-- Logo End -->
        <!-- Navigation Start -->
        <div class="col-md-10 col-sm-10">
          <!--Header Bottom Account Start -->
          <div class="header_account_area">
            <!--Seach Area Start -->
            <div class="header_account_list search_list">
              <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
              <div class="dropdown_search">
                <form action="#">
                  <input placeholder="Search entire store here ..." type="text"/>
                  <div class="search-category">
                    <select class="bootstrap-select" name="poscats">
                      <option value="-1">All Categories</option>
                      <option value="70">Tulshi Mala</option>
                      <option value="66">Nepali Statues</option>
                      <option value="63">Nepali Handicrafts</option>
                      <option value="62">Wooden Wall Hangings</option>
                      <option value="59">Future Product</option>
                      <option value="56">Featured Product</option>
                      <option value="50">Wooden Craft</option>
                      <option value="49">Thangka Paintings</option>
                      <option value="45">Musical Instruments</option>
                      <option value="43">Life Style</option>
                      <option value="42">Buddha Chitta Mala</option>
                      <option value="41">Pashmina</option>
                      <option value="39">Rudrakshya Mala</option>
                      <option value="38">Lokta Paper Products</option>
                      <option value="34">Oil Painting</option>
                      <option value="32">Statues</option>
                      <option value="31">Nepali Beads</option>
                      <option value="29">Handicrafts</option>
                      <option value="28">Wooden Stupa</option>
                      <option value="15">Uncategorized</option>
                    </select>
                  </div>
                  <button type="submit"><i class="ion-ios-search-strong"></i></button>
                </form>
              </div>
            </div>
            <!--Seach Area End -->
            <!--Cart info Start -->
            <div class="cart-info home-9 d-flex">
              <a href="compare.html" class="count-cart random d-xs-none"></a>
              <a href="wishlist.html" class="count-cart heart d-xs-none"></a>
              <div class="mini-cart-warp">
                <a href="#" class="count-cart"><span>$20.00</span></a>
                <div class="mini-cart-content">
                  <ul>
                    <li class="single-shopping-cart">
                      <div class="shopping-cart-img">
                        <a href="single-product.html"><img alt=""
                                                           src="assets/images/product-image/mini-cart/1.jpg"/></a>
                        <span class="product-quantity">1x</span>
                      </div>
                      <div class="shopping-cart-title">
                        <h4><a href="single-product.html">Juicy Couture...</a></h4>
                        <span>$9.00</span>
                        <div class="shopping-cart-delete">
                          <a href="#"><i class="ion-android-cancel"></i></a>
                        </div>
                      </div>
                    </li>
                    <li class="single-shopping-cart">
                      <div class="shopping-cart-img">
                        <a href="single-product.html"><img alt=""
                                                           src="assets/images/product-image/mini-cart/2.jpg"/></a>
                        <span class="product-quantity">1x</span>
                      </div>
                      <div class="shopping-cart-title">
                        <h4><a href="single-product.html">Water and Wind...</a></h4>
                        <span>$11.00</span>
                        <div class="shopping-cart-delete">
                          <a href="#"><i class="ion-android-cancel"></i></a>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <div class="shopping-cart-total">
                    <h4>Subtotal : <span>$20.00</span></h4>
                    <h4>Shipping : <span>$7.00</span></h4>
                    <h4>Taxes : <span>$0.00</span></h4>
                    <h4 class="shop-total">Total : <span>$27.00</span></h4>
                  </div>
                  <div class="shopping-cart-btn text-center">
                    <a class="default-btn" href="checkout.html">checkout</a>
                  </div>
                </div>
              </div>
            </div>
            <!--Cart info End -->
          </div>
        </div>
      </div>
      <!-- mobile menu -->
      <div class="mobile-menu-area">
        <div class="mobile-menu">
          <nav id="mobile-menu-active">
            <ul class="menu-overflow">
              <!--<li>
                <a href="index.html">HOME</a>
                <ul>
                  <li>
                    <a href="#">Home Organic</a>
                    <ul>
                      <li><a href="index.html">Organic 1</a></li>
                      <li><a href="index-2.html">Organic 2</a></li>
                      <li><a href="index-3.html">Organic 3</a></li>
                      <li><a href="index-4.html">Organic 4</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Home Cosmetic</a>
                    <ul>
                      <li><a href="index-5.html">Cosmetic 1</a></li>
                      <li><a href="index-6.html">Cosmetic 2</a></li>
                      <li><a href="index-7.html">Cosmetic 3</a></li>
                      <li><a href="index-8.html">Cosmetic 4</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Home Digital</a>
                    <ul>
                      <li><a href="index-9.html">Digital 1</a></li>
                      <li><a href="index-10.html">Digital 2</a></li>
                      <li><a href="index-11.html">Digital 3</a></li>
                      <li><a href="index-12.html">Digital 4</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Home Furniture</a>
                    <ul>
                      <li><a href="index-13.html">Furniture 1</a></li>
                      <li><a href="index-14.html">Furniture 2</a></li>
                      <li><a href="index-15.html">Furniture 3</a></li>
                      <li><a href="index-16.html">Furniture 4</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Home Medical</a>
                    <ul>
                      <li><a href="index-17.html">Medical 1</a></li>
                      <li><a href="index-18.html">Medical 2</a></li>
                      <li><a href="index-19.html">Medical 3</a></li>
                      <li><a href="index-20.html">Medical 4</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#">Shop</a>
                <ul>
                  <li>
                    <a href="#">Shop Grid</a>
                    <ul>
                      <li><a href="shop-3-column.html">Shop Grid 3 Column</a></li>
                      <li><a href="shop-4-column.html">Shop Grid 4 Column</a></li>
                      <li><a href="shop-left-sidebar.html">Shop Grid Left Sidebar</a></li>
                      <li><a href="shop-right-sidebar.html">Shop Grid Right Sidebar</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Shop List</a>
                    <ul>
                      <li><a href="shop-list.html">Shop List</a></li>
                      <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                      <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Single Shop</a>
                    <ul>
                      <li><a href="single-product.html">Shop Single</a></li>
                      <li><a href="single-product-variable.html">Shop Variable</a></li>
                      <li><a href="single-product-affiliate.html">Shop Affiliate</a></li>
                      <li><a href="single-product-group.html">Shop Group</a></li>
                      <li><a href="single-product-tabstyle-2.html">Shop Tab 2</a></li>
                      <li><a href="single-product-tabstyle-3.html">Shop Tab 3</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Single Shop</a>
                    <ul>
                      <li><a href="single-product-slider.html">Shop Slider</a></li>
                      <li><a href="single-product-gallery-left.html">Shop Gallery Left</a></li>
                      <li><a href="single-product-gallery-right.html">Shop Gallery Right</a></li>
                      <li><a href="single-product-sticky-left.html">Shop Sticky Left</a></li>
                      <li><a href="single-product-sticky-right.html">Shop Sticky Right</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#">Pages</a>
                <ul>
                  <li><a href="about.html">About Page</a></li>
                  <li><a href="cart.html">Cart Page</a></li>
                  <li><a href="checkout.html">Checkout Page</a></li>
                  <li><a href="compare.html">Compare Page</a></li>
                  <li><a href="login.html">Login & Regiter Page</a></li>
                  <li><a href="my-account.html">Account Page</a></li>
                  <li><a href="wishlist.html">Wishlist Page</a></li>
                </ul>
              </li>
              <li>
                <a href="#">Blog</a>
                <ul>
                  <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                  <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                  <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                  <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                  <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a></li>
                  <li><a href="blog-single-right-sidebar.html">Blog Single Right Sidebar</a></li>
                </ul>
              </li>-->
              <li><a href="#">Home</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- mobile menu end-->
    </div>
  </div>
  <!--Header Bottom Account End -->
</header>
<!-- Header End -->
