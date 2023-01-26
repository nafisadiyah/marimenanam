@extends('user.template_view')
@section('konten')
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{ asset('foto_barang/'.$data->foto) }}" alt="Card image cap"
                        id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{ $data->nama_barang }}</h1>
                        <p class="h3 py-2"> Rp. {{ number_format($data->harga,2) }}</p>

                        <h6>Description:</h6>
                        <p>{{ $data->deskripsi }}</p>


                        <form action="" method="GET">
                            <input type="hidden" name="product-title" value="Activewear">

                            <div class="row pb-3">
                                <div class="col d-grid">
                                    @if(isset(Auth::user()->id))
                                    <a type="button" href="{{ url('tambah/keranjang/'.$data->id) }}" class="btn btn-success btn-lg" name="submit"
                                        value="addtocard">Tambah Ke keranjang</a>
                                    @else
                                    <a type="button" href="{{ url('login') }}" class="btn btn-warning btn-lg" name="submit"
                                        value="addtocard">Login Untuk Membeli</a>

                                    @endif
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
