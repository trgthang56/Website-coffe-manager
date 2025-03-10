@extends('admin.main')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite('resources/js/app.js')
<link rel="stylesheet" href="/template/admin//plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet"  type="text/css" href="/template/admin/order/css/sweet.css" />
@endsection

@section('content')
<audio id="myAudio">
    <source src="/template/admin/dist/mp3/clock-alarm-8761.mp3" type="audio/mpeg">
</audio>
<audio id="myAudio1">
  <source src="/template/admin/dist/mp3/trado.mp3" type="audio/mpeg">
</audio>
<div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Chi tiết đơn hàng: <strong>{{$order->id}}</strong>&nbsp; Bàn: <strong>{{$order->table->name}}</strong></h3>
    <div class="card-tools">
    
    </div>
    </div>
    </div>
   

    <div class="card-body table-responsive p-0">
 
      <table class="table table-hover text-nowrap" id="listDetail">
        <thead>
        <tr>
        <th style="text-align: center">STT</th>
        <th>Tên món</th>
        <th>Số lượng</th>
        <th >Ghi chú món</th>  
        <th>Trạng thái</th>
        <th>Thời gian gọi món</th>
        <th>Thời gian hủy món</th>
        <th>Giá tiền</th>
       
        </tr>
        </thead>
        <tbody>
            @foreach ($details as $key => $item)
        <tr >
        <td style="width: 2%;text-align: center"  class="sttDetail">{{ $key + 1 + ($details->currentPage() - 1) * $details->perPage() }}</td>
        <td style="width: 10%;">{{$item->name}}</td>
        <td style="width: 2%;text-align: center" ><input  type="number" min="1" max="99" id="qty_{{$item->id}}" style="width: 70%;" data-idDetail="{{$item->id}}" value="{{$item->qty}}" readonly> </td>
        <td style="width: 25%;" >@if(empty($item->mess))<input id="mess_{{$item->id}}" type="text" class="form-control form-control-border"  data-idDetail="{{$item->id}}" value="Không có ghi chú" readonly>  @else <input id="mess_{{$item->id}}" type="text" class="form-control form-control-border" id="mess-{{$item->id}}" data-idDetail="{{$item->id}}" value="{{$item->mess}}" readonly> @endIF</td> 
      
        <td>{{$item->status}}</td>
        <td>{{$item->created_at}}</td>
        <td>{{$item->updated_at}}</td>
        <td id="price_{{$item->id}}">  <?php   $formattedNumber1 = number_format($item->price);echo $formattedNumber1; ?> &nbsp;đ</td>
     
        </tr>
        @endforeach
    
        </tbody>
        </table>
    
       
    
 

    
  </div>
    </div>
    
   
       
    </div>
   
    

@endsection
@section('footer')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success'))
<script>toastr.success("{{Session::get('success')}}");</script>
@endif
<script type="text/javascript" src="/template/admin/order/js/sweet-alert.js"></script>
@endsection
