@extends('layouts.app')
@section('content')
  <div class="container">
      <order-list 
      :orders="{{json_encode($orders)}}"
      :statuses="{{json_encode($ststuses)}}"
      :user ="{{json_encode(Auth()->user())}}"

      >
      


      </order-list>
  </div>

@endsection