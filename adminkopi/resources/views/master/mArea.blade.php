@extends('layouts.master')
@php
    $title = 'Master Area';
    $header = 'Master Area';
    $active = 'marea';
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
            <th >Nama Area</th>
            <th>Kode Area</th>
            <th>Keterangan</th>
            <th>
              Action
              <button type="button" class="  btn-sm bg-success" data-toggle="modal" data-target="#modal-lg-add">
                <i class="fas fa-user-plus"></i>
                 Add 
              </button>
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($area as $t)
                <tr>
                    <td>{{ $t->nama_area }}</td>
                    <td>{{ $t->kode_area }}</td>
                    <td>{{ $t->keterangan }}</td>
                    <td>
                        <button type="submit" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#modal-lg-edit{{ $t->id }}">
                            <i class="fas fa-user-times"></i>
                             Edit
                          </button>
                        <button type="submit" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-sm{{ $t->id }}">
                            <i class="fas fa-user-times"></i>
                             Dell
                          </button>
                    </td>
                </tr>

                {{-- Edit Data --}}
  <div class="modal fade" id="modal-lg-edit{{ $t->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
  
        <div class="card card-success">
          <div class="card-header">
            <div class="card-title">
              <h3>Tambah Data</h3>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('marea.update',$t->id) }}" method="post">
              @csrf
              @method('put')
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Area</label>
                        <input type="text" class="form-control" name="nama_area" value="{{ $t->nama_area }}" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Area</label>
                        <input type="text" class="form-control" name="kode_area" value="{{ $t->kode_area }}" required>
                      </div>
                  </div>
              </div>
            
              <!-- Alamat -->
              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" required>{{ $t->keterangan }}</textarea>
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
            <div class="modal fade" id="modal-sm{{ $t->id }}">
                <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">{{ $t->nama_area }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    
                    <form action="{{ route('marea.destroy',$t->id) }}" method="post">
                    @csrf
                    @method('delete')
                        <p>Yakin Hapus Data {{ $t->kode_area }} ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form> 
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            @endforeach
          
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
            <form action="{{ route('marea.store') }}" method="post">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Area</label>
                        <input type="text" class="form-control" name="nama_area" placeholder="Enter ..." required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Area</label>
                        <input type="text" class="form-control" name="kode_area" placeholder="Enter ..." required>
                      </div>
                  </div>
              </div>
            
              <!-- Alamat -->
              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan..." required></textarea>
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