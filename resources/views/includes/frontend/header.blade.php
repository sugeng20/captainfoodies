<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class="fa fa-envelope"></i> gina.noviani@gmail.com
                </div>
                <div class="phone-service">
                    <i class="fa fa-phone"></i> +62 898-6197-726
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('/') }}/img/logo-cf.png" width="100" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7"></div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="cart-icon">
                            Keranjang Belanja &nbsp;
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span id="cartQuantity">0</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody id="cartElement">


                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5 id="totalCart">Rp. 0</h5>
                                </div>
                                <div class="select-button">
                                    <a href="{{ url('cart') }}" class="primary-btn checkout-btn">VIEW CARD</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->