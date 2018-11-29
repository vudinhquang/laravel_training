@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small> Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <!-- Check các lỗi nhập liệu như bao nhiêu ký tự, bắt buộc nhập (nếu có) -->
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <strong>{{$err}}</strong><br>
                        @endforeach
                    </div>
                @endif
                <!-- Thông báo công việc đã được thực hiện -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        <strong>{{session('thongbao')}}</strong>
                    </div>
                @endif
                <!-- Thông báo lỗi đuôi upload file -->
                @if(session('loi'))
                    <div class="alert alert-danger">
                        <strong>{{session('loi')}}</strong>
                    </div>
                @endif
                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <p><label>Thể Loại</label></p>
                        <select class="form-control input-width" name="TheLoai" id="TheLoai">
                            @foreach($theloai as $tl)
                                <option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <p><label>Loại tin</label></p>
                        <select class="form-control input-width" name="LoaiTin" id="LoaiTin">
                            @foreach($loaitin as $lt)
                                <option value="{{ $lt->id }}">{{ $lt->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <p><label>Tiêu đề</label></p>
                        <input class="form-control input-width" name="TieuDe" placeholder="Nhập tiêu đề.." />
                    </div>
                    <div class="form-group">
                        <p><label>Tóm Tắt</label></p>
                        <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <p><label>Nội dung</label></p>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="5">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <p><label>Hình ảnh</label></p>
                        <input type="file" name="Hinh" class="form-control">
                    </div>
                    <div class="form-group">
                        <p><label>Nổi bật?</label></p>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" checked="checked" type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" type="radio">Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default btn-mleft">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@section('script')
   <script>
       $(document).ready(function(){
            $('#TheLoai').change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                    $("#LoaiTin").html(data);
                });
            });
       })
   </script> 
@endsection