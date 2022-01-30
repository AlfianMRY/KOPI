@extends('layouts.master')
@php
    $title = 'Master Anggota';
    $header = 'Master Anggota';
    $active = 'manggota';
    $no = 1;
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
            <th>No</th>
            <th>FullName</th>
            <th>NickName</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Domisili</th>
            <th>Status</th>
            <th>Tmpt Lahir</th>
            <th>Tgl Lahir</th>
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
            @foreach ($manggota as $m)
                <tr>
                    <td>{{ $no++ }}</td>
                  <td>{{ $m->nama_lengkap }}</td>
                  <td>{{ $m->nama_panggilan }}</td> 
                  <td>{{ $m->no_hp }}</td>
                  <td>{{ $m->email }}</td>
                  <td>{{ $m->jk }}</td>
                  <td>{{ $m->domisili }}</td>
                  <td>{{ $m->status_marital }}</td>
                  <td>{{ $m->tmpt_lahir }}</td>
                  <td>{{ $m->tgl_lahir }}</td>
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
            

                {{-- Edit Data --}}
                <div class="modal fade" id="modal-lg-edit{{ $m->id }}">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                
                      <div class="card card-warning">
                        <div class="card-header">
                          <div class="card-title">
                            <h3>Edit Data {{ $m->nama_lengkap }}</h3>
                          </div>
                        </div>
                        <div class="card-body">
                          <form action="{{ route('manggota.update',$m->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Nama Lengkap</label>
                                      <input type="text" class="form-control" name="nama_lengkap" value="{{ $m->nama_lengkap }}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Nama Panggilan</label>
                                      <input type="text" class="form-control" name="nama_panggilan" value="{{ $m->nama_panggilan }}" >
                                    </div>
                                    <div class="form-group">
                                      <label>No HP</label>
                                      <input type="text" class="form-control" name="no_hp" value="{{ $m->no_hp}}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" class="form-control" name="email" value="{{ $m->email}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label>Jenis Kelamin</label><br>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input"  type="radio" name="jk" id="inlineRadio1" value="Pria" {{ $m->jk == 'Pria' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Pria</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Wanita"  {{ $m->jk == 'Wanita' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label>Status</label><br>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_marital" id="inlineRadio1" value="Menikah"  {{ $m->status_marital == 'Menikah' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Menikah</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_marital" id="inlineRadio2" value="Lajang"  {{ $m->status_marital == 'Lajang' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Lajang</label>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Tempat Lahir</label>
                                      <input type="text" class="form-control" name="tmpt_lahir" value="{{ $m->tmpt_lahir }}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Tanggal Lahir</label>
                                      <input type="text" class="form-control" name="tgl_lahir" value="{{ $m->tgl_lahir }}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Domisili</label>
                                      <input type="domisili" class="form-control" name="domisili" value="{{ $m->domisili}}" >
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
                        <h4 class="modal-title">{{ $m->nama_lengkap }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        
                        <form action="{{ route('manggota.destroy',$m->id) }}" method="post">
                        @csrf
                        @method('delete')
                            <p>Yakin Hapus Data {{ $m->nama_panggilan }} ?</p>
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
            <form action="{{ route('manggota.store') }}" method="post">
              @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_lengkap" required >
                    </div>
                    <div class="form-group">
                      <label>Nama Panggilan</label>
                      <input type="text" class="form-control" name="nama_panggilan" required >
                    </div>
                    <div class="form-group">
                      <label>No HP</label>
                      <input type="text" class="form-control" name="no_hp" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" >
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="row mb-2">
                        <div class="col-md-6">

                            <div class="form-group mb-1">
                              <label>Jenis Kelamin</label><br>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="jk" id="inlineRadio1" required value="Pria">
                                <label class="form-check-label" for="inlineRadio1">Pria</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="jk" id="inlineRadio2" required value="Wanita">
                                <label class="form-check-label" for="inlineRadio2">Wanita</label>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-1">
                              <label>Status</label><br>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="status_marital" id="inlineRadio1" required value="Menikah">
                                <label class="form-check-label" for="inlineRadio1">Menikah</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="status_marital" id="inlineRadio2" required value="Lajang">
                                <label class="form-check-label" for="inlineRadio2">Lajang</label>
                              </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" class="form-control" name="tmpt_lahir" required >
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tgl_lahir" required >
                    </div>
                    <div class="form-group">
                        <label>Domisili</label>
                        <input type="domisili" class="form-control" name="domisili" required>
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