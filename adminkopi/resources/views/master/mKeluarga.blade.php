@extends('layouts.master')
@php
    $title = 'Master Keluarga';
    $header = 'Master Keluarga';
    $active = 'mkeluarga';
@endphp

@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
      <div class="row dataTables_wrapper dt-bootstrap4">
          <h3 class="card-title">Data Anggota Kopi</h3>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered  table-hover">
        <thead>
          <tr>
            <th>Kode Keluarga</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Kecematan</th>
            <th>Kota</th>
            <th>Provinsi</th>
            <th class="d-flex ">
              <p>Action </p>
              <button type="button" class="ml-auto  btn-sm bg-success" data-toggle="modal" data-target="#modal-lg-add">
                <i class="fas fa-user-plus"></i>
                 Add 
              </button>
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($mkeluarga as $m)
                <tr>
                  <td>{{ $m->kode_keluarga }}</td>
                  <td>{{ $m->alamat }}</td> 
                  <td>{{ $m->kelurahan }}</td>
                  <td>{{ $m->kecamatan }}</td>
                  <td>{{ $m->kota }}</td>
                  <td>{{ $m->provinsi }}</td>
                  <td>
                    <button type="submit" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#modal-lg-edit{{ $m->id }}">
                      <i class="fas fa-user-times"></i>
                       Edit
                    </button>
                    <button type="submit" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-sm{{ $m->id }}">
                      <i class="fas fa-user-times"></i>
                       Dell
                    </button>
                  </td>
                </tr>
            @endforeach

                {{-- Edit Data --}}
                <div class="modal fade" id="modal-lg-edit{{ $m->id }}">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                
                      <div class="card card-warning">
                        <div class="card-header">
                          <div class="card-title">
                            <h3>Edit Data {{ $m->kode_keluarga }}</h3>
                          </div>
                        </div>
                        <div class="card-body">
                          <form action="{{ route('mkeluarga.update',$m->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Kode Keluarga</label>
                                      <input type="text" class="form-control" name="kode_keluarga" value="{{ $m->kode_keluarga }}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Alamat</label>
                                      <input type="text" class="form-control" name="alamat" value="{{ $m->alamat }}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Kelurahan</label>
                                      <input type="text" class="form-control" name="kelurahan" value="{{ $m->kelurahan}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Kecamatan</label>
                                      <input type="text" class="form-control" name="kecamatan" value="{{ $m->kecamatan }}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Kota</label>
                                      <input type="text" class="form-control" name="kota" value="{{ $m->kota }}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Provinsi</label>
                                      <input type="text" class="form-control" name="provinsi" value="{{ $m->provinsi }}" >
                                    </div>
                                </div>
                            </div>
                          
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary swalDefaultSuccess">Save changes</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

                {{-- Delete Data --}}
                <div class="modal fade" id="modal-sm{{ $m->id }}">
                    <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">{{ $m->kode_keluarga }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        
                        <form action="{{ route('mkeluarga.destroy',$m->id) }}" method="post">
                        @csrf
                        @method('delete')
                            <p>Yakin Hapus Data {{ $m->kode_keluarga }} ?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form> 
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            {{-- @endforeach --}}
          
        </tbody>
        <tfoot>
          <tr>
              
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
</div>

{{-- Tambah Data --}}
  <div class="modal fade" id="modal-lg-add">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
  
        <div class="card card-success">
          <div class="card-header">
            <div class="card-title">
              <h3>Tambah Data</h3>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('mkeluarga.store') }}" method="post">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Keluarga</label>
                        <input type="text" class="form-control" name="kode_keluarga" placeholder="Enter ..." required>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Enter ..." required>
                      </div>
                      <div class="form-group">
                        <label>Kelurahan</label>
                        <input type="text" class="form-control" name="kelurahan" placeholder="Enter ..." required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" placeholder="Enter ..." required>
                      </div>
                      <div class="form-group">
                        <label>Kota</label>
                        <input type="text" class="form-control" name="kota" placeholder="Enter ..." required>
                      </div>
                      <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" placeholder="Enter ..." required>
                      </div>
                  </div>
              </div>
            
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary swalDefaultSuccess">Save changes</button>
            </form>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection


@push('script')
<!-- Data table -->
<script src="{{ asset('') }}assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('') }}assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('') }}assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('') }}assets/plugins/daterangepicker/daterangepicker.js"></script>

{{-- icon --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
    $(function () {
      
      $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });

      
    });
</script>
@endpush