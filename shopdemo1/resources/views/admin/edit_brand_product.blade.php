{{-- Trang update brand product --}}

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
      <h4 class="title">Update Brand Product</h4>


        {{-- thông báo thêm thành công --}}
        <div id="message" class="text-center">
            @php
            $message = session()->get('message');   //lấy biến $request->session()->put('message', 'add brand success');
            if ($message) {

                echo '<span class="text-alert" style="color:green; font-size:18px;">'.$message.'</span>';  //in ra message
                session()->put('message', null); // khong cho message hiển thị nữa (nếu không có nó sẻ tự động echo $message)
                                                //session()->put == Session::put
            }
            @endphp
        </div>
        {{-- /thông báo thêm thành công --}}


        {{-- duyệt vòng lập để lấy data --}}
        @foreach ($edit_brand_product as $item => $edit_value) {{-- $edit_brand_product lấy từ controller brand -> function edit_brand_product  --}}

            {{-- action="{{URL::to ('/update-brand-product')}} => chuyển về routes '/update-brand-product' --}}
            {{-- Vì update cần dựa vào id nên phải thêm .$edit_value -> category_id --}}
            <form class="contact-form php-mail-form" role="form" action="{{URL::to ('/update-brand-product/'.$edit_value -> brand_id) }}" method="POST">

                {{ csrf_field() }}  {{-- tạo token cho trang website => bao mat hon ><br mysql injection --}}

                {{-- lấy ra category_name --}}
                <div class="form-group">
                    <input type="text" name="brand_product_name" value="{{ $edit_value -> brand_name }}" class="form-control" id="contact-name" placeholder="brand Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                    <div class="validate"></div>                    {{-- value="{{ ($edit_value -> category_name) }}" : hiển thị ra tên brand product theo cái category_name --}}
                </div>
                {{-- /lấy ra category_name --}}



                </br>

                <div class="form-send">
                <button type="submit" name="update_brand_product" class="btn btn-large btn-primary">Update brand</button>
                </div>

            </form>
        @endforeach
        {{-- /duyệt vòng lập để lấy data --}}

    </div>


@endsection
