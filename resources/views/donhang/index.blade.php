@extends('layouts.admin');
@section('content')
<div class="col-md-12 col-sm-6  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Bordered table <small>Danh Sách Hàng Hóa</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Hình thức thanh toán</th>
                        <th>Ghi chú</th>
                        <th>Thao Tac</th>
                    </tr>
                </thead>
                <tbody>
                {{ $count = 1 ;}}
                    @foreach($orders as $order)
                    <tr>
                       
                        <td>{{ $count++ }}</td>

                        <td>{{$order->date_order}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->payment}}</td>
                        <td>{{$order->note}}</td>
                       
                        <td>
                            <a href="{{route('order.edit',['order'=>$order->id_customer])}}"><button>Chi tiết</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="clearfix"></div>

@endsection