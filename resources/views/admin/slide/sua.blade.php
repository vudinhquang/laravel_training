@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại







                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">





                    {{ csrf_field() }}







                    <div class="form-group">
                        <p>
                            <label>Tên hiện tại của Thể Loại</label>
                    



                        </p>

                        <p>
                            <label>Thay đổi tên Thể Loại</label>
                            <input class="form-control input-width" name="cate_changed" placeholder="Nhập tên mới cho Thể Loại" />
                        </p>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Thực hiện</button>

                    <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection