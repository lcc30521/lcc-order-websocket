@extends('layouts.app')
@section('content')
<div class="container">
     @if(count($orders))
        <table class="table">
            
            <thead>
                <tr>

                    <td>订单号</td>
                    <td>订单用户</td>
                    <td>订单总额</td>
                    <td>下单时间</td>
                    <td>当前状态</td>
                    <td>操作</td>
                 </tr>  

            </thead>
            <tbody>
                @foreach($orders as $order)
                 <tr>
                    <td>{{$order->orderNo}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->create_at}}</td>
                    <td>{{$order->namestatus}}</td>
                    <!-- <td>@include('orders._status')</td> -->
                    <td><admin-status 
                    	:order={{json_encode((int) $order->id)}}
                    	:statuses={{json_encode($ststuses)}}
                    	:status={{json_encode((int) $order->status)}}
                    	></admin-status></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{$orders->links()}}
     @endif


</div>
@endsection