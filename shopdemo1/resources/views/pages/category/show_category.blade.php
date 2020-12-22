@extends('layout'){{-- dung lay thanh phan trong welcome.blade.php  --}}
@section('content'){{-- ten goi section dung de @yield --}}
    {{-- menu and porduct home1 --}}
    <div class="tabs-block">
        <div class="tabulation-menu-wrapper text-center">
            <div class="tabulation-title simple-input">all</div>

            @foreach ($category_name as $item => $name)

                <ul class="tabulation-toggle">
                    <li><a class="tab-menu active">{{ $name -> category_name }}</a></li>
                </ul>

            @endforeach

        </div>
        <div class="empty-space col-xs-b30"></div>
        <div class="tab-entry visible">
            <div class="row nopadding">
                @foreach ($category_by_id as $item => $product)
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5">
                                <a href="#">Còn trống chưa join tables</a>
                            </div>
                            <div class="h6 animate-to-green"><a href="#">{{ $product -> product_name }}</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{URL::to ('public/uploads/product/'.$product -> product_image) }}" alt="" />
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="{{URL::to ('/chi-tiet-san-pham/'.$product -> product_id) }}">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ ('public/frontend/img/icon-1.png') }}" alt=""></span>
                                            <span class="text">Xem thêm</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ ('public/frontend/img/icon-3.png') }}" alt=""></span>
                                            <span class="text">Thêm giỏ hàng</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4 dark">
                                {{number_format($product -> product_price).' '.'VND'}}
                            </div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2">{{ $product -> product_desc }}</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="img/product-7.jpg" alt="" />
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
                            <img src="img/product-9.jpg" alt="" />
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
                            <img src="img/product-11.jpg" alt="" />
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
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="img/product-8.jpg" alt="" />
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
                            <img src="img/product-10.jpg" alt="" />
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
                            <img src="img/product-12.jpg" alt="" />
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
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="img/product-7.jpg" alt="" />
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
                            <img src="img/product-8.jpg" alt="" />
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
                            <img src="img/product-11.jpg" alt="" />
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
                            <img src="img/product-12.jpg" alt="" />
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
        <div class="tab-entry">
            <div class="row nopadding">
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART PHONES</a></div>
                            <div class="h6 animate-to-green"><a href="#">Smartphone vibe x2</a></div>
                        </div>
                        <div class="preview">
                            <img src="img/product-10.jpg" alt="" />
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
                            <img src="img/product-12.jpg" alt="" />
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
