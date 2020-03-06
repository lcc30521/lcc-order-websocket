{!! Form::open(['route'=>['orders.update',$order->id],'method'=>'POST']) !!}
     <div class="form-row align-items-center">
           <div class="col-auto">
                {!! Form::select('status',$ststuses,$order->status,['class'=>'form-control form-control-sm','placeholder'=>'请选择订单状态']) !!}
           </div>

           <div class="col-auto">
               {!!Form::submit('提交',['class'=>'btn btn-sm btn-success'])!!}
           </div>

     </div>
     

{!! Form::close() !!}