@extends('admin.template_view')
@section('konten')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Barang</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('tambah/barang/update') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Barang</label>
                                <input value="{{ $data->nama_barang }}" name="nama_barang" type="text" class="form-control form-control-sm"
                                    id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Harga Barang</label>
                                <input type="text" value="{{ $data->harga }}" name="harga" class="form-control form-control-sm"
                                    id="exampleInputPassword1">
                            </div>
                   
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kategori Barang</label>
                                <select name="id_kategori" class="form-control form-control-sm">
                                    <option value="{{ $data->id_kategori }}" selected>{{ $data->keterangan }}</option>
                                    <option value="1">Tumbuhan</option>
                                    <option value="2">Peralatan </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3">{{ $data->deskripsi }}</textarea>
                            </div>
                            <input hidden class="" name="id_barang" type="text" value="{{ $data->id }}" />
                            <input hidden class="img-barang" name="foto_lama" type="text" value="{{ asset('foto_barang/'.$data->foto) }}" />
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input id="input-id" name="foto_barang" type="file" class="file"
                                    data-preview-file-type="text">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a type="button" href="{{ url('barang') }}" class="btn btn-sm btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>
@endsection
@section('js')
<script>
    $("#input-id").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false,
        initialPreviewAsData: true,
        initialPreview: $('.img-barang').val()
    });

</script>
@endsection
