@extends('layouts.app')
@section('content')
<h2>Transaksi Kasir</h2>
<form method="POST" action="/kasir">
    @csrf
    <div>
        <label>Pilih Menu</label>
        <select name="product_id">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Kondimen Karbo</label>
        <select name="karbo">
            <option>Rice</option>
            <option>Mashed Potato</option>
            <option>Sauted Baby Potato</option>
        </select>
    </div>
    <div>
        <label>Sauce</label>
        <select name="sauce">
            <option>BBQ</option>
            <option>Tartar</option>
            <option>Hot BBQ</option>
            <option>Hundred Sambal</option>
        </select>
    </div>
    <button type="submit">Proses Transaksi</button>
</form>
@endsection
