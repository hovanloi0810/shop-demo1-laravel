{{-- Trang liet ke category product --}}

@extends('admin_layout') {{-- phan mo rong trong admin_layout.blade.php --}}
@section('admin_content') {{-- section dung de @yield --}}
<script src="https://kit.fontawesome.com/25e8aeaf8c.js" crossorigin="anonymous"></script>
<div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">

        <table class="table table-striped table-advance table-hover">

            <h4>
                <i class="fa fa-angle-right"></i>
                <a href="{{URL::to ('/add-category-product') }}">add Category Product</a>
                <i class="fa fa-angle-right"></i>
                List Category Product
            </h4>

          {{-- thông báo thêm thành công --}}
          @php
          $message = session()->get('message');   //lấy biến $request->session()->put('message', 'add category success');
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
              <th><i class="fa fa-bullhorn"></i> Name Category</th>
              {{-- <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th> --}}
              <th><i class="fa fa-bookmark"></i> Show</th>
            </tr>
          </thead>
          <tbody>

            {{-- lấy data --}}

              @foreach ($all_category_product as $key => $cate_pro) {{-- dùng để duyệt lấy data  --}}
              <tr>
                <td >
                    <span class="font-weight-normal" style="font-size: 13px">
                        {{ ($cate_pro -> category_name) }}  {{-- duyệt lấy category_name --}}
                    </span>
                </td>

                <td>

                    {{-- Hidden and Show --}}
                    <?php
                        if ($cate_pro -> category_status == 0) { //nếu $cate_pro trỏ tới mà category_status == 0
                    ?>
                        {{-- {{URL::to ('/unactive-category-product'.$cate_pro->category_id) }} :
                            {{-- trỏ tới '/unactive-category-product' --}}
                            {{-- và nối chuổi với $cate_pro->category_id
                                => $cate_pro->category_id : biến $cate_pro lấy id của category_id
                                => id của category sẻ hiện qua URL là /unactive-category-product/category_id--}}
                        <a href="{{URL::to ('/unactive-category-product/'.$cate_pro->category_id) }}">
                            <span>
                                <i class="fas fa-eye-slash" style="font-size: 18px"></i>
                            </span>
                        </a>

                    <?php

                    } else { //nếu $cate_pro trỏ tới mà category_status != 0

                    ?>
                        {{-- {{URL::to ('/active-category-product/'.$cate_pro->category_id) }}
                        => routes '/active-category-product'
                        => $cate_pro->category_id : biến $cate_pro lấy id của category_id
                        => id của category sẻ hiện qua URL là /unactive-category-product/category_id
                        --}}
                        <a href="{{URL::to ('/active-category-product/'.$cate_pro->category_id) }}">
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

                    {{-- sửa category-prodcut --}}
                        {{-- Edit cái category_product thì phải dựa theo category_id nên phải .$cate_pro->category_id --}}
                        <a href="{{URL::to ('/edit-category-product/'.$cate_pro->category_id) }}" class="btn btn-primary btn-xs"> {{-- URL::to ('/edit-category-product/' chuyền đến routes '/edit-category-product/' --}}
                            <i class="fa fa-pencil"></i>
                        </a>
                    {{-- /sửa category-prodcut --}}

                    {{-- Xoá category-prodcut --}}
                        {{-- Xoá cái category_product thì phải dựa theo category_id nên phải .$cate_pro->category_id --}}
                        {{-- onclick="return confirm('Do you really want to delete this?');" : xác thực bạn có muốn xoá không ? --}}
                        <a onclick="return confirm('Do you really want to delete this?');" href="{{URL::to ('/delete-category-product/'.$cate_pro->category_id) }}" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash-o "></i>
                        </a>
                    {{-- /Xoá category-prodcut --}}

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
