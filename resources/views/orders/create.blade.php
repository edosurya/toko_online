@extends('layouts.global')

@section('title') Edit order @endsection 

@section('content')

<div class="row">
  <div class="col-md-8">
    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif

    <form
      class="shadow-sm bg-white p-3"
      action="{{route('orders.store')}}"
      method="POST"
    >

    @csrf

    <label for="invoice_number">Invoice number</label><br>
    <input type="text" class="form-control" name="invoice_number" >
    <br>

    <label for="">Buyer</label><br>
    <select class="form-control" name="buyer" id="buyer">
      @foreach($customers as $c)
      <option value="{{ $c->id }}">{{ $c->name }}</option>
      @endforeach
    </select>
    <br>

    <label for="">Book Order</label><br>
    <div class="input-group mb-3">
      <select class="form-control col-md-10 col-xs-10" name="book_id_order1" id="book_id_order1">
        <option value="">Select Book</option>
        @foreach($books as $b)
        <option value="{{ $b->id }}">{{ $b->title }}</option>
        @endforeach
      </select>
      <select class="form-control col-md-2 col-xs-2" name="total_book_order1" id="total_book_order1">
        <option value="">Qty</option>
        @for($i = 1; $i < 20; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>
    <div class="input-group mb-3">
      <select class="form-control col-md-10 col-xs-10" name="book_id_order2" id="book_id_order2">
        <option value="">Select Book</option>
        @foreach($books as $b)
        <option value="{{ $b->id }}">{{ $b->title }}</option>
        @endforeach
      </select>
      <select class="form-control col-md-2 col-xs-2" name="total_book_order2" id="total_book_order2">
        <option value="">Qty</option>
        @for($i = 1; $i < 20; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>
    <br>

    <label for="status">Status</label><br>
    <select class="form-control" name="status" id="status">
      <option value="SUBMIT">SUBMIT</option>
      <option value="PROCESS">PROCESS</option>
      <option value="FINISH">FINISH</option>
      <option value="CANCEL">CANCEL</option>
    </select>
    <br>

    <input type="submit" class="btn btn-primary" value="Save">

    </form>
  </div>
</div>

@endsection 
