   <!-- Utilize Cart Menu Start -->

    <!-- Utilize Cart Menu End -->



    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="/index"><img src="/user-asset/img/logo.jpg" alt="Logo" height="80px"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li><a href="/index">Home</a></li>
                    <li><a href="/promoterproduct">Promoter</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="#">Our Services</a>
                        <ul>
                            <li><a href="/inaguration">From Registration to Inauguration</a></li>
                            <li><a href="/support">Our Supporting Team</a></li>
                            <li><a href="/verification">Property Verification</a></li>
                            <li><a href="/commission">Service Charges</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="/promoterproduct">Promoter Properties</a></li> -->
                    <!-- <li><a href="/admin-login">AspLogin</a></li> -->

                    <li><a href="#">Login</a>
                        <ul>
                            <li><a href="/admin-login">AspLogin</a></li>
                            <li><a href="/adminuserlogin">TM Login</a></li>
                            @if(session()->get('name') == 1)
                                <li><a href="/admin-login#/mediatorregister">Mediator Register</a></li>
                            @endif
                        </ul>
                    </li>
                    <!-- <li><a href="/buyerrequest">Login</a></li> -->
                    <li><a href="/help">Help</a></li>
                    <!-- <li><a href="/userregister">For Registration</a></li> -->
                    <!-- <li><a href="/admin-login">Admin</a></li> -->

                 <!--    <li class="menu-icon"><a href="#">Buyer Re</a>
                        <ul>
                            <li><a href="/propertyproduct">For Buy</a></li>
                            <li><a href="/rentproduct">For Rent</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!-- <div class="ltn__utilize-buttons ltn__utilize-buttons-2"> -->
          <!--       <ul>
                    <li>
                        <a href="account.html" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                            My Account
                        </a>
                    </li>
                    <li>
                        <a href="wishlist.html" title="Wishlist">
                            <span class="utilize-btn-icon">
                                <i class="far fa-heart"></i>
                                <sup>3</sup>
                            </span>
                            Wishlist
                        </a> -->
                    <!-- </li> -->
              <!--       <li>
                        <a href="cart.html" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                <sup>5</sup>
                            </span>
                            Shoping Cart
                        </a>
                    </li> -->
                <!-- </ul> -->
            <!-- </div> -->
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="https://wa.me/919894009888?text=Hi%20Thalir%20Promoters,%20Please%20Share%20Details" target="blank" title="Whatsapp"><i class="fab fa-whatsapp"></i></a></li>
                    <li><a href="https://www.facebook.com/groups/866203110966016/?ref=share" target="blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://youtu.be/rg6tm7FXpZ8" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>
