@extends('layouts.master')
@php
    $title = 'Table Keanggotaan';
    $header = 'Table Keanggotaan';
    $active = 'ka';
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
    <div class="card-body">
        <table id="example1" class="table table-bordered  table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Anggota</th>
                    <th>Tingkat</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th>Tgl Aktif</th>
                    <th>Tgl Non Aktif</th>
                    <th>Action
                        <button type="button" class="  btn-sm bg-success" data-toggle="modal" data-target="#modal-lg-add">
                            <i class="fas fa-user-plus"></i>
                            Add 
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keanggotaan as $ka)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $ka->nama_lengkap }}</td>
                        <td>{{ $ka->kode_tingkat }}</td>
                        <td>{{ $ka->nama_area }}</td>
                        <td>{{ $ka->status }}</td>
                        <td>{{ $ka->tgl_aktif }}</td>
                        <td>{{ $ka->tgl_nonaktif }}</td>
                        <td>
                          <button type="submit" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#modal-lg-edit{{ $ka->id }}">
                            <i class="fas fa-user-times"></i>
                             Edit
                          </button>
                          <button type="submit" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-sm{{ $ka->id }}">
                            <i class="fas fa-user-times"></i>
                             Dell
                          </button>
                        </td>
                    </tr>

                  <div class="modal fade" id="modal-lg-edit{{ $ka->id }}">
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                    
                          <div class="card card-warning">
                            <div class="card-header">
                              <div class="card-title">
                                <h3>Edit Data</h3>
                              </div>
                            </div>
                            <div class="card-body">
                              <form action="{{ route('keanggotaan.update',$ka->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Nama Anggota</label>
                                          <select class="form-select" required name="anggota_id">
                                              <option selected disabled class="text-center"> ~~ Pilih Anggota ~~</option>
                                              @foreach ($anggota as $a)
                                                  <option value="{{ $a->id }}" {{ $ka->anggota_id == $a->id ? 'selected' : '' }}>{{ $a->nama_lengkap }}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <label>Tingkat Anggota</label>
                                      <select class="form-select" required name="tingkat_id">
                                          <option selected disabled class="text-center"> ~~ Pilih Tingkat ~~</option>
                                          @foreach ($tingkat as $t)
                                              <option value="{{ $t->id }}" {{ $ka->tingkat_id == $t->id ? 'selected' : '' }}>{{ $t->kode_tingkat }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Area Anggota</label>
                                        <select class="form-select" required name="area_id">
                                            <option selected disabled class="text-center"> ~~ Pilih Area ~~</option>
                                            @foreach ($area as $ar)
                                                <option value="{{ $ar->id }}" {{ $ka->area_id == $ar->id ? 'selected' : '' }}>{{ $ar->nama_area }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                  </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-select" required name="status">
                                              <option selected disabled class="text-center"> ~~ Pilih Status ~~</option>
                                              <option value="Aktif" {{ $ka->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                              <option value="Tidak Aktif" {{ $ka->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tanggal Aktif</label>
                                        <input type="date" name="tgl_aktif" value="{{ $ka->tgl_aktif }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                      <label>Tanggal Tidak Aktif</label>
                                      <input type="date" name="tgl_nonaktif" value="{{ $ka->tgl_nonaktif }}" class="form-control">
                                    </div>
                                </div>
                              
                                <div class="mt-5">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary swalDefaultSuccess">Save changes</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                  </div>
                    

                    {{-- Delete Data --}}
                    <div class="modal fade" id="modal-sm{{ $ka->id }}">
                      <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                          <div class="modal-header bg-danger">
                          <h4 class="modal-title">{{ $ka->nama_lengkap }}</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">
                          
                          <form action="{{ route('keanggotaan.destroy',$ka->id) }}" method="post">
                          @csrf
                          @method('delete')
                              <p>Yakin Hapus Data {{ $ka->nama_lengkap }} ?</p>
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
                @endforeach
            </tbody>
        </table>
    </div>
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
            <form action="{{ route('keanggotaan.store') }}" method="post">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Anggota</label>
                        <select class="form-select" required name="anggota_id">
                            <option selected disabled class="text-center"> ~~ Pilih Anggota ~~</option>
                            @foreach ($anggota as $a)
                                <option value="{{ $a->id }}">{{ $a->nama_lengkap }}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <label>Tingkat Anggota</label>
                    <select class="form-select" required name="tingkat_id">
                        <option selected disabled class="text-center"> ~~ Pilih Tingkat ~~</option>
                        @foreach ($tingkat as $t)
                            <option value="{{ $t->id }}">{{ $t->kode_tingkat }}</option>
                        @endforeach
                    </select>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Area Anggota</label>
                      <select class="form-select" required name="area_id">
                          <option selected disabled class="text-center"> ~~ Pilih Area ~~</option>
                          @foreach ($area as $ar)
                              <option value="{{ $ar->id }}">{{ $ar->nama_area }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Status</label>
                          <select class="form-select" required name="status">
                            <option selected disabled class="text-center"> ~~ Pilih Status ~~</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <label>Tanggal Aktif</label>
                      <input type="date" name="tgl_aktif" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Tanggal Tidak Aktif</label>
                    <input type="date" name="tgl_nonaktif" class="form-control">
                  </div>
              </div>
            
              <div class="mt-5">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary swalDefaultSuccess">Save changes</button>
              </div>
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