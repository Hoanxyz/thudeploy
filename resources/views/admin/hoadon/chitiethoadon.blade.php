@extends('admin.layout.index')      
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi tiết hóa đơn
                            <!-- <small>Add</small> -->
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:80px">
                            @foreach($customer as $c)
                            @if($bill->id_customer == $c->id)
                            <div class="form-group">
                                <label>Tên khách hàng đặt hàng</label>
                                <input class="form-control" name="txtCateName" value="{{$c->name}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <input class="form-control" name="txtOrder" value="{{$c->gender}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="txtOrder" value="{{$c->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtOrder" value="{{$c->address}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="txtOrder" value="{{$c->phone_number}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input class="form-control" name="txtOrder" value="{{$c->note}}" readonly="" />
                            </div>
                            @endif
                            @endforeach


                    </div>
                    <div>
                        <h3 class="col-lg-12"><b>Các sản phẩm đã mua đã mua</b></h3>
                    <table class="table table-striped table-bordered table-hover" style="margin-bottom:120px">
                                <thead>
                                    <tr align="center">
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá của 1 sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($billdetail as $bd)
                                    <tr class="even gradeC" align="center">
                                            @if($bd->id_bill == $bill->id)
                                                
                                                <td>
                                                    @foreach($sanpham as $sp)
                                                    @if($bd->id_product == $sp->id)
                                                    {{$sp->name}}
                                                    @endif
                                                    @endforeach 
                                                </td>
                                                
                                                <td>{{$bd->quantity}}</td>
                                                <td>{{$bd->unit_price}} vnđ</td>                                                
                                            @endif
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
