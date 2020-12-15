@extends('layout'){{-- dung lay thanh phan trong welcome.blade.php  --}}
@section('content'){{-- ten goi section dung de @yield --}}

    {{-- menu and porduct home1 --}}
    <div class="tabs-block">
        <div class="tabulation-menu-wrapper text-center">
            <div class="tabulation-title simple-input">all</div>
            <ul class="tabulation-toggle">
                <li><a class="tab-menu active">all</a></li>
                <li><a class="tab-menu">top 10</a></li>
                <li><a class="tab-menu">gadgets</a></li>
                <li><a class="tab-menu">laptops</a></li>
                <li><a class="tab-menu">accessories</a></li>
            </ul>
        </div>
        <div class="empty-space col-xs-b30"></div>

        {{-- product all --}}
        <div class="tab-entry visible">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-7.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ ('public/frontend/img/icon-1.png') }}" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ ('public/frontend/img/icon-3.png') }}" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- product top 10 --}}
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-7.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ ('public/frontend/img/icon-1.png') }}" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ ('public/frontend/img/icon-3.png') }}" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- product gadgets --}}
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-8.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ ('public/frontend/img/icon-1.png') }}" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ ('public/frontend/img/icon-3.png') }}" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- product laptops --}}
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-7.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- product accessories --}}
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-10.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="empty-space col-xs-b35 col-md-b70"></div>

    {{-- menu and porduct home 2 --}}
    <div class="tabs-block">
        <div class="row">
            <div class="col-lg-4 col-xs-b15 col-lg-b0">
                <div class="h4">best proposes</div>
            </div>
            <div class="col-lg-8">
                <div class="tabulation-menu-wrapper col-lg-text-right">
                    <div class="tabulation-title simple-input">all</div>
                    <ul class="tabulation-toggle">
                        <li><a class="tab-menu active">all</a></li>
                        <li><a class="tab-menu">featured</a></li>
                        <li><a class="tab-menu">on sale</a></li>
                        <li><a class="tab-menu">top rated</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b15 col-sm-b30"></div>

        {{-- product all --}}
        <div class="tab-entry visible">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-25.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="color-selection">
                                <div class="entry active" style="color: #a7f050;"></div>
                                <div class="entry" style="color: #50e3f0;"></div>
                                <div class="entry" style="color: #eee;"></div>
                            </div>
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-26.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="img/product-27.jpg" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="color-selection">
                                <div class="entry active" style="color: #d0c45c;"></div>
                                <div class="entry" style="color: #000;"></div>
                                <div class="entry" style="color: #eee;"></div>
                            </div>
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- product featured --}}
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-26.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="img/product-27.jpg" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="color-selection">
                                <div class="entry active" style="color: #d0c45c;"></div>
                                <div class="entry" style="color: #000;"></div>
                                <div class="entry" style="color: #eee;"></div>
                            </div>
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- product on sale --}}
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-25.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="color-selection">
                                <div class="entry active" style="color: #a7f050;"></div>
                                <div class="entry" style="color: #50e3f0;"></div>
                                <div class="entry" style="color: #eee;"></div>
                            </div>
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="img/product-26.jpg" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- product top rated --}}
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{ ('public/frontend/img/product-25.jpg') }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="color-selection">
                                <div class="entry active" style="color: #a7f050;"></div>
                                <div class="entry" style="color: #50e3f0;"></div>
                                <div class="entry" style="color: #eee;"></div>
                            </div>
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="img/product-27.jpg" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="color-selection">
                                <div class="entry active" style="color: #d0c45c;"></div>
                                <div class="entry" style="color: #000;"></div>
                                <div class="entry" style="color: #eee;"></div>
                            </div>
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="img/product-26.jpg" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">$630.00</div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="empty-space col-xs-b35 col-md-b70"></div>
@endsection
