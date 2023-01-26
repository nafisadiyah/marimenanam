@extends('user.template_view')
@section('konten')

<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="row text-center py-3">
                    <div class="col-lg-6 m-auto">
                        <h1 class="h1">Daftar Pesanan Saya</h1>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach($data as $t)
                <div class="col-md-3">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="{{ asset('foto_barang/'.$t->foto) }}">

                        </div>
                        <div class="card-body text-center">
                            <a href="{{ url('detail/produk/'.$t->id) }}"
                                class="h3 text-decoration-none text-center"><b>{{ $t->nama_barang }}</b></a><br><span class="badge badge-secondary">{{ $t->kode }}</span>
                            <hr>
                            <p class="text-center mb-0">Rp {{ number_format($t->harga,2) }}</p>
                            <hr>
                            @if($t->status == null)
                            <a href="https://wa.me/6282142461818?text=Konfirmasi%20pembelian%20barang%20{{ $t->nama_barang }}" class="btn btn-sm btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i> Bayar Sekarang</a>
                            @else
                            <button disabled class="btn btn-sm btn-info">Pembelian Berhasil</button>
                            @endif
                        
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item disabled">
                    {{$data->links("pagination::bootstrap-4")}}
                    </li>

                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
