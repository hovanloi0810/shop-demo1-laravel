{{-- Trang add category product --}}

@extends('admin_layout') {{-- phan mo rong  --}}
@section('admin_content') {{-- section dung de @yield --}}
<!-- Favicons -->
<link href="img/favicon.png" rel="icon">
<link href="img/apple-touch-icon.png" rel="apple-touch-icon">
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/25e8aeaf8c.js" crossorigin="anonymous"></script>
<!-- Bootstrap core CSS -->
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--external css-->
<link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-datepicker/css/datepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-daterangepicker/daterangepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-timepicker/compiled/timepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{asset ('public/backend/lib/bootstrap-datetimepicker/datertimepicker.css') }}" />
<!-- Custom styles for this template -->
<link href="{{asset ('public/backend/css/style.css') }}" rel="stylesheet">
<link href="{{asset ('public/backend/css/style-responsive.css') }}" rel="stylesheet">

<div class="row mt">
    <div class="col-lg-12">
      <h4 class="title"><i class="fa fa-angle-right"></i>update Product</h4>


        {{-- thông báo thêm thành công --}}
        <div id="message" class="text-center">
            @php
            $message = session()->get('message');   //lấy biến $request->session()->put('message', 'add category success');
            if ($message) {

                echo '<span class="text-alert" style="color:green; font-size:18px;">'.$message.'</span>';  //in ra message
                session()->put('message', null); // khong cho message hiển thị nữa (nếu không có nó sẻ tự động echo $message)
                                                //session()->put == Session::put
            }
            @endphp
        </div>
        {{-- /thông báo thêm thành công --}}

      {{-- action="{{URL::to ('/save-product')}} => chuyển về routes '/save-product'--}}

      @foreach ($edit_product as $item => $pro) {{-- $edit_product lay tu controller --}}

        <form class="contact-form php-mail-form" role="form" action="{{URL::to ('/update-product/'.$pro -> product_id) }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}  {{-- tạo token cho trang website => bao mat hon >< mysql injection --}}


            <div class="form-group">
                <input type="text" name="product_name" value="{{ $pro -> product_name }}" class="form-control" id="contact-name"  data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>

            <div class="form-group">
                <input type="text" name="product_price" value="{{ $pro -> product_price }}" class="form-control" id="contact-name"  data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
            </div>

            <div class="form-group">
                <input type="file" name="product_image" class="form-control" id="contact-name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
                <img src="{{URL::to('public/uploads/product/'.$pro -> product_image)}}" alt="" height="100" width="100">
            </div>


            <div class="form-group">
                <textarea class="form-control" name="product_desc" id="contact-message" rows="5" data-rule="required" data-msg="Please write something for us">
                    {{ $pro -> product_desc }}
                </textarea>
                <div class="validate"></div>
            </div>

            <div class="form-group">
                <textarea class="form-control" name="product_content" id="contact-message" placeholder="Content product" rows="5" data-rule="required" data-msg="Please write something for us">
                    {{ $pro -> product_content }}
                </textarea>
                <div class="validate"></div>
            </div>

            <div>
                <label for="">Supplier</label>
                <select class="form-control" name="product_supplier">
                    {{-- duyet du lieu trong table_supplier --}}
                    @foreach ($supplier_pro as $item => $suppl) {{-- $supplier_pro bien trong controller --}}
                        @if ($suppl -> supplier_id == $pro -> supplier_id)

                        <option selected value="{{ $suppl -> supplier_id }}"> {{-- lay ra supplier_id trong table_supplier --}}
                            {{ $suppl -> supplier_name }}               {{-- lay ra supplier_name trong table_supplier --}}
                        </option>
                        @else
                        <option value="{{ $suppl -> supplier_id }}"> {{-- lay ra supplier_id trong table_supplier --}}
                            {{ $suppl -> supplier_name }}               {{-- lay ra supplier_name trong table_supplier --}}
                        </option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div>
                <label for="">Category product</label>
                <select class="form-control" name="product_cate">

                    @foreach ($cate_pro as $item => $cate)
                        @if ($cate -> category_id == $pro -> category_id)

                        <option selected value="{{ $cate -> category_id }}">
                            {{ $cate -> category_name }}
                        </option>
                        @else
                        <option value="{{ $cate -> category_id }}">
                            {{ $cate -> category_name }}
                        </option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div>
                <label for="">Brand product</label>
                <select class="form-control" name="product_brand">

                    @foreach ($brand_pro as $item => $brand)
                        @if ($brand -> brand_id == $pro -> brand_id)

                        <option selected value="{{ $brand -> brand_id }}">
                            {{ $brand -> brand_name }}
                        </option>
                        @else
                        <option value="{{ $brand -> brand_id }}">
                            {{ $brand -> brand_name }}
                        </option>
                        @endif
                    @endforeach

                </select>
            </div>

            </br>

            <select class="form-control" name="product_status">
                <option value="0">Hidden</option>
                <option value="1">Show</option>
            </select>

            </br>

            <div class="form-send">
                <button type="submit" name="add_product" class="btn btn-large btn-primary">Update Product</button>
            </div>

        </form>
      @endforeach
    </div>


@endsection
