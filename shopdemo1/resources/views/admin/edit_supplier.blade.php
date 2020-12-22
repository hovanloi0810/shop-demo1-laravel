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
      <h4 class="title"><i class="fa fa-angle-right"></i>Update Supplier</h4>


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

      {{-- action="{{URL::to ('/save-category-product')}} => chuyển về routes '/save-brand-product'--}}
      @foreach ($edit_supplier as $item => $supplier)

      <form class="contact-form php-mail-form" role="form" action="{{URL::to ('/update-supplier/'.$supplier -> supplier_id) }}" method="POST">

        {{ csrf_field() }}  {{-- tạo token cho trang website => bao mat hon >< mysql injection --}}


        <div class="form-group">
            <input type="text" name="supplier_name" value="{{ $supplier -> supplier_name }}" class="form-control" id="contact-name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
            <div class="validate"></div>
        </div>


        <div class="form-group">
            <input type="text" name="supplier_amuont" value="{{ $supplier -> supplier_amuont }}" class="form-control" id="contact-name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
            <div class="validate"></div>
        </div>


        <div class="form-group">
            <input type="text" name="supplier_price" value="{{ $supplier -> supplier_price }}" class="form-control" id="contact-name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
            <div class="validate"></div>
        </div>

        <div>

            <label for="">Category</label>
            <select class="form-control" name="supplier_cate">

                {{--  --}}
                @foreach ($cate_supplier as $item => $cate)                         {{-- Duyệt vòng lặp lấy data từ table với biến $cate_product --}}
                    @if ($cate -> category_id == $supplier -> category_id)

                        <option selected value="{{ $cate -> category_id }}">                     {{-- value="{{ $cate -> category_id }} => lấy id trong  tbl_category_product  --}}
                            {{ $cate -> category_name }}                                {{-- Biến $cate dùng để trỏ tới category_name trong table tbl_category_product --}}
                        </option>

                    @else
                    <option value="{{ $cate -> category_id }}">                     {{-- value="{{ $cate -> category_id }} => lấy id trong  tbl_category_product  --}}
                        {{ $cate -> category_name }}                                {{-- Biến $cate dùng để trỏ tới category_name trong table tbl_category_product --}}
                    </option>
                    @endif

                @endforeach
                {{--  --}}

            </select>

        </div>

    </br>

        <div class="form-group">
            <input type="text" name="supplier_product" value="{{ $supplier -> supplier_product }}" class="form-control" id="contact-name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
            <div class="validate"></div>
        </div>


        </br>

        <select class="form-control" name="supplier_status">
            <option value="0">Hidden</option>
            <option value="1">Show</option>
        </select>

        </br>

          <div class="form-send">
            <button type="submit" name="add_supplier" class="btn btn-large btn-primary">Update Supplier</button>
          </div>

      </form>
      @endforeach
    </div>


@endsection
