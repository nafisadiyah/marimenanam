@extends('user.template_view')
@section('konten')
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{ asset('assets/blog-big3.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success">Marina Menanam</h1>
                            <h3 class="h2">Tiny and Perfect eCommerce Template</h3>
                            <p>
                                Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta
                                1).
                                This template is 100% free provided by <a rel="sponsored" class="text-success"
                                    href="https://templatemo.com" target="_blank">TemplateMo</a> website.
                                Image credits go to <a rel="sponsored" class="text-success"
                                    href="https://stories.freepik.com/" target="_blank">Freepik Stories</a>,
                                <a rel="sponsored" class="text-success" href="https://unsplash.com/"
                                    target="_blank">Unsplash</a> and
                                <a rel="sponsored" class="text-success" href="https://icons8.com/" target="_blank">Icons
                                    8</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{ asset('assets/blog-big4.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Proident occaecat</h1>
                            <h3 class="h2">Aliquip ex ea commodo consequat</h3>
                            <p>
                                You are permitted to use this Zay CSS template for your commercial websites.
                                You are <strong>not permitted</strong> to re-distribute the template ZIP file in any
                                kind of template collection websites.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{ asset('assets/blog-big5.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Repr in voluptate</h1>
                            <h3 class="h2">Ullamco laboris nisi ut </h3>
                            <p>
                                We bring you 100% free CSS templates for your websites.
                                If you wish to support TemplateMo, please make a small contribution via PayPal or
                                tell your friends about our website. Thank you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->

<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Featured Product</h1>
                <p>
                    Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident.
                </p>
            </div>
        </div>
        <div class="row">
            <?php $data = DB::table('barang')->whereNull('id_status')->limit('3')->get(); ?>
            @foreach($data as $t)
            <div class="col-12 col-md-4 mb-4">
                <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" src="{{ asset('foto_barang/'.$t->foto) }}">

                    </div>
                    <div class="card-body text-center">
                        <a href="{{ url('detail/produk/'.$t->id) }}"
                            class="h3 text-decoration-none text-center"><b>{{ $t->nama_barang }}</b></a>
                        <hr>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <textarea readonly style="border:none; width:100%; resize: none;"
                                class="text-center">{{ $t->deskripsi }}</textarea>
                        </ul>
                        <hr>
                        <p class="text-center mb-0">Rp {{ number_format($t->harga,2) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
