@if(Request::segment(1) != 'Profile' && Request::segment(1) != 'MyQRcode' && Request::segment(1) != 'MyAffiliate' && Request::segment(1) != 'MyWallet' && Request::segment(1) != 'MyVoucher' && 
    Request::segment(1) != 'MyWishList' && Request::segment(1) != 'AddressBook' && Request::segment(1) != 'MySetting' && Request::segment(1) != 'PendingOrder' && Request::segment(1) != 'PendingShipping' &&
    Request::segment(1) != 'PendingReceive' && Request::segment(1) != 'OrderDetails' && Request::segment(1) != 'CompletedOrder' && Request::segment(1) != 'CancelledOrder')
<!-- Top Search Form Area -->
    <div class="top-search-area">
        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Close -->
                        <button type="button" class="btn close-btn" data-dismiss="modal"><i class="ti-close"></i></button>
                        <!-- Form -->
                        <form action="index.html" method="post">
                            <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Header Area Start -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="alimeNav">

                        <!-- Logo -->
                                  <a class="ps-logo" href="{{ route('home') }}">
            <img src="{{ url($data['website_logo']) }}" alt="" width="300" height="250">
          </a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="{{ route('home') }}" class="{{ (Request::segment(1) == '') ? 'active' : '' }}">Home</a>
                                    <li ><a href="{{ route('listing') }}" class="{{ (Request::segment(1) == 'Listing' || Request::segment(1) == 'PointListing' || Request::segment(1) == 'Details') ? 'active' : '' }}">Gallery</a></li>
                                    <li><a href="{{ route('about') }}" class="{{ (Request::segment(1) == 'About') ? 'active' : '' }}">About</a></li>
                                    <li><a href="{{ route('Contact') }}" class="{{ (Request::segment(1) == 'Contact') ? 'active' : '' }}">Contact</a></li>
                                    <li><a href="{{ route('faqs') }}" class="{{ (Request::segment(1) == 'faqs') ? 'active' : '' }}">Photo Editor</a></li>
                                    <li>@if(Auth::guard($data['userGuardRole'])->check())
                  <a href="{{ route('profile') }}">
                    <i class="fa fa-user"></i> 
                    &nbsp;&nbsp;
                    {{ Auth::guard($data['userGuardRole'])->user()->f_name }} {{ Auth::guard($data['userGuardRole'])->user()->l_name }}
                  </a>
              
                      <ul class="dropdown">
                        <li class="menu-item"><a href="{{ route('AddressBook.AddressBook.index') }}">My Address Book</a></li>
                    
                        <li class="menu-item"><a href="{{ route('my_setting') }}">Account Setting</a></li>

                       <li class="menu-item"><a href="{{ route('wish_list') }}">My Wish List</a></li>
                                            
                       </ul>
                     @else
                         <a href="{{ route('login') }}">
                          Login & Regiser
                          </a>
                     @endif
                    </li>

               


                                </ul>

                                <!-- Search Icon -->
                                <div class="navigation__column right">
        <div class="ps-cart">
            <a class="ps-cart__toggle" href="#">
              <span><i>{{ (!empty($data['totalCart'])) ? $data['totalCart'] : '0'  }}</i></span>
              <i class="ps-icon-shopping-cart"></i></a>
              <div class="ps-cart__listing">
               
                  
                  
                
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="ps-cart__content">    
                      @php
                        $headerTotalCart = 0;
                        $headerTotalQty = 0;
                      @endphp
                      @foreach($data['top_carts'] as $top_cart)
                      @php
                      if($top_cart->variation_enable == '1'){
                          if(Auth::guard('merchant')->check() || Auth::guard('admin')->check()){
                            $price = !empty($top_cart->variation_agent_special_price) ? $top_cart->variation_agent_special_price : $top_cart->variation_agent_price;
                          }else{
                            $price = !empty($top_cart->variation_special_price) ? $top_cart->variation_special_price : $top_cart->variation_agent_price;
                          }
                      }else{
                          if(Auth::guard('merchant')->check() || Auth::guard('admin')->check()){
                            $price = !empty($top_cart->agent_special_price) ? $top_cart->agent_special_price : $top_cart->agent_price;
                          }else{
                            $price = !empty($top_cart->special_price) ? $top_cart->special_price : $top_cart->price;
                          }
                      }

                      @endphp
                      <div class="ps-cart-item"><a class="ps-cart-item__close delete-cart" data-id="{{ md5($top_cart->cid) }}" href="#"></a>
                        <div class="ps-cart-item__thumbnail">
                          <a href="{{ route('details', [str_replace('/', '-', $top_cart->product_name), md5($top_cart->pid)]) }}"></a>
                            <img src="{{ url(!empty($top_cart->image) ? $top_cart->image : 'images/no-image-available-icon-61.jpg') }}" alt="">
                        </div>
                        <div class="ps-cart-item__content">
                          <a class="ps-cart-item__title" href="{{ route('details', [str_replace('/', '-', $top_cart->product_name), md5($top_cart->pid)]) }}">
                              {{ $top_cart->product_name }}
                              @if($top_cart->variation_enable == '1')
                                <br>
                                Variation: {{ $top_cart->variation_name }}
                              @endif  
                          </a>
                          <p>
                            <span style="margin-right: 0;">Quantity:<i>{{ $top_cart->qty }}</i></span>
                            <br>
                            @if($top_cart->variation_enable == '1')
                              @if(Auth::guard('merchant')->check() || Auth::guard('admin')->check())
                                <span style="margin-right: 0;">Total:<i>RM {{ $price }}</i></span></p>
                              @else
                                <span style="margin-right: 0;">Total:<i>RM {{ $price }}</i></span></p>
                              @endif
                            @else
                              @if(Auth::guard('merchant')->check() || Auth::guard('admin')->check())
                                <span style="margin-right: 0;">Total:<i>RM {{ $price }}</i></span></p>
                              @else
                                <span style="margin-right: 0;">Total:<i>RM {{ $price }}</i></span></p>
                              @endif
                            @endif
                        </div>
                      </div>
                      @php
                        $headerTotalCart += $price * $top_cart->qty;
                        $headerTotalQty += $top_cart->qty;
                      @endphp
                      @endforeach
                    </div>
                    <div class="ps-cart__total">
                      <p>Number of items:<span>{{ $headerTotalQty  }}</span></p>
                      <p>Item Total:<span>RM {{ number_format($headerTotalCart, 2) }}</span></p>
                    </div>
                    <div class="ps-cart__footer"><a class="ps-btn" href="{{ route('checkout') }}"> Checkout<i class="ps-icon-arrow-left"></i></a></div>
                  </div>
                  
        </div>
                                

                            </div>

                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
@endif