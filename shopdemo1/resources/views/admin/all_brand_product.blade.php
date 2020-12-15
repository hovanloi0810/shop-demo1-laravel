{{-- Trang liet ke brand product --}}

@extends('admin_layout') {{-- phan mo rong trong admin_layout.blade.php --}}
@section('admin_content') {{-- section dung de @yield --}}
<script src="https://kit.fontawesome.com/25e8aeaf8c.js" crossorigin="anonymous"></script>
<div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">

        <table class="table table-striped table-advance table-hover">

            <h4>
                <i class="fa fa-angle-right"></i>
                <a href="{{URL::to ('/add-brand-product') }}">add Brand Product</a>
                <i class="fa fa-angle-right"></i>
                List brand Product
            </h4>

          {{-- thông báo thêm thành công --}}
          @php
          $message = session()->get('message');   //lấy biến $request->session()->put('message', 'add brand success');
          if ($message) {

              echo '<span class="text-alert" style="color:green; margin-left: 34%; font-size:18px;">'.$message.'</span>';  //in ra message
              session()->put('message', null); // khong cho message hiển thị nữa (nếu không có nó sẻ tự động echo $message)
                                              //session()->put == Session::put
          }
          @endphp
      {{-- /thông báo thêm thành công --}}

          <hr>
          <thead>
            <tr>
              <th><i class="fa fa-bullhorn"></i> Name Brand</th>
              {{-- <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th> --}}
              <th><i class="fa fa-bookmark"></i> Show</th>
            </tr>
          </thead>
          <tbody>

            {{-- lấy data --}}
                {{-- dùng để duyệt lấy data  --}}
              @foreach ($all_brand_product as $key => $brand_pro) {{-- $all_brand_product : lấy từ (-> with('all_brand_product',$all_brand_product);) trong cotronller brand--}}

              <tr>
                <td >
                    <span class="label label-default" style="font-size: 13px">
                        {{ ($brand_pro -> brand_name) }}  {{-- duyệt lấy category_name --}}
                    </span>
                </td>

                <td>

                    {{-- Hidden and Show --}}
                    <?php
                        if ($brand_pro -> brand_status == 0) { //nếu $brand_pro trỏ tới mà category_status == 0
                    ?>
                        {{-- {{URL::to ('/unactive-brand-product'.$brand_pro->category_id) }} :
                            {{-- trỏ tới '/unactive-brand-product' --}}
                            {{-- và nối chuổi với $brand_pro->category_id
                                => $brand_pro->category_id : biến $brand_pro lấy id của category_id
                                => id của brand sẻ hiện qua URL là /unactive-brand-product/category_id--}}
                        <a href="{{URL::to ('/unactive-brand-product/'.$brand_pro->brand_id) }}">
                            <span>
                                <i class="fas fa-eye-slash" style="font-size: 18px"></i>
                            </span>
                        </a>

                    <?php

                    } else { //nếu $brand_pro trỏ tới mà category_status != 0

                    ?>
                        {{-- {{URL::to ('/active-brand-product/'.$brand_pro->category_id) }}
                        => routes '/active-brand-product'
                        => $brand_pro->category_id : biến $brand_pro lấy id của category_id
                        => id của brand sẻ hiện qua URL là /unactive-brand-product/category_id
                        --}}
                        <a href="{{URL::to ('/active-brand-product/'.$brand_pro->brand_id) }}">
                            <span>
                                <i class="fas fa-eye" style="font-size: 18px"></i>
                            </span>
                        </a>
                    <?php
                        }
                    ?>
                    {{-- /Hidden and Show --}}

                </td>
                <td></td>
                <td>

                  <a class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>

                    {{-- sửa brand-prodcut --}}
                        {{-- Edit cái category_product thì phải dựa theo category_id nên phải .$brand_pro->category_id --}}
                        <a href="{{URL::to ('/edit-brand-product/'.$brand_pro->brand_id) }}" class="btn btn-primary btn-xs"> {{-- URL::to ('/edit-brand-product/' chuyền đến routes '/edit-brand-product/' --}}
                            <i class="fa fa-pencil"></i>
                        </a>
                    {{-- /sửa brand-prodcut --}}

                    {{-- Xoá brand-prodcut --}}
                        {{-- Xoá cái category_product thì phải dựa theo category_id nên phải .$brand_pro->category_id --}}
                        {{-- onclick="return confirm('Do you really want to delete this?');" : xác thực bạn có muốn xoá không ? --}}
                        <a onclick="return confirm('Do you really want to delete this?');" href="{{URL::to ('/delete-brand-product/'.$brand_pro->brand_id) }}" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash-o "></i>
                        </a>
                    {{-- /Xoá brand-prodcut --}}

                </td>
              </tr>
              @endforeach

            {{-- /lấy data --}}

          </tbody>
        </table>
      </div>
      {{-- <ul class="pagination pagination-sm m-t-none m-b-none">
        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        <li><a href="">4</a></li>
        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
      </ul> --}}
      <!-- /content-panel -->
    </div>
    <div class="col-sm-7 text-right text-center-xs">
        <ul class="pagination pagination-sm m-t-none m-b-none">
          <li><a href=""><i class="fa fa-chevron-left"> </i> Preveous </a></li>
          <li><a href="">1</a></li>
          <li><a href="">2</a></li>
          <li><a href="">3</a></li>
          <li><a href="">4</a></li>
          <li><a href=""> Next <i class="fa fa-chevron-right"></i></a></li>
        </ul>
      </div>
</div>

@endsection
