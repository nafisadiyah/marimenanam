@extends('admin.template_view')
@section('konten')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">

            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <a type="button" href="{{ url('tambah/barang') }}" class="btn btn-sm btn-success">Tambah Baru</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Kode</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no= 1; ?>
                            @foreach($data as $d)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td> {{ $d->nama_barang }} </td>
                                <td> {{ number_format($d->harga,2) }} </td>
                                <td> {{ $d->kode }} </td>
                                <td> <?= ($d->status == '1' ) ? 'Selesai' : 'Belum Dibayar' ?> </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{ url('hapus/pemesanan/'.$d->id_pesanan) }}"> <i
                                    class="fa fa-trash"></i></a> 
                                    @if($d->status == '0')
                                    <a class="btn btn-info btn-sm" href="{{ url('konfirmasi/pemesanan/'.$d->id_pesanan) }}"> Konfirmasi</a> 
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
@section('js')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endsection
