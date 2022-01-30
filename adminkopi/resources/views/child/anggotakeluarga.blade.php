@extends('layouts.master')
@php
    $title = 'Table Anggota Keluarga';
    $header = 'Table Anggota Keluarga';
    $active = 'tak';
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
            <th>Keluarga</th>
            <th>Anggota Keluarga</th>
            <th>Status Keluarga</th>
            <th>Anak Ke</th>
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
            @foreach ($lak as $l)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        {{ $l->kode_keluarga }}
                    </td>
                    <td>
                        {{ $l->nama_lengkap }}
                    </td>
                    <td>{{ $l->status_keluarga }}</td>
                    <td>{{ $l->anak_ke }}</td>
                    <td>
                      <button type="submit" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#modal-lg-edit{{ $l->id }}">
                        <i class="fas fa-user-times"></i>
                         Edit
                      </button>
                      <button type="submit" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-sm{{ $l->id }}">
                        <i class="fas fa-user-times"></i>
                         Dell
                      </button>
                    </td>
                </tr>

                {{-- Edit Data --}}
                <div class="modal fade" id="modal-lg-edit{{ $l->id }}">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                
                      <div class="card card-warning">
                        <div class="card-header">
                          <div class="card-title">
                            <h3>Edit Data {{ $l->nama_lengkap }}</h3>
                          </div>
                        </div>
                        <div class="card-body">
                          <form action="{{ route('akeluarga.update',$l->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Nama Keluarga</label>
                                    <select class="form-select" required name="keluarga_id">
                                        <option disabled class="text-center"> ~~ Pilih Keluarga ~~</option>
                                        @foreach ($lkeluarga as $lk)
                                            <option {{ $l->keluarga_id == $lk->id ? 'selected' : '' }} value="{{ $lk->id }}">{{ $lk->kode_keluarga }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label>Nama Anggota</label>
                                <select class="form-select" required name="anggota_id">
                                    <option selected disabled class="text-center"> ~~ Pilih Anggota ~~</option>
                                    @foreach ($langgota as $la)
                                        <option {{ $l->anggota_id == $la->id ? 'selected' : '' }} value="{{ $la->id }}">{{ $la->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-select" required name="status_keluarga">
                                          <option disabled class="text-center"> ~~ Pilih Status ~~</option>
                                          <option {{ $l->status_keluarga == 'Kepala Keluarga' ? 'selected' : '' }} value="Kepala Keluarga">Kepala Keluarga</option>
                                          <option {{ $l->status_keluarga == 'Istri' ? 'selected' : '' }} value="Istri">Istri</option>
                                          <option {{ $l->status_keluarga == 'Anak' ? 'selected' : '' }} value="Anak">Anak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Anak Ke</label>
                                        <input type="number" name="anak_ke" class="form-control">
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
                <div class="modal fade" id="modal-sm{{ $l->id }}">
                    <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">{{ $l->kode_keluarga }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        
                        <form action="{{ route('akeluarga.destroy',$l->id) }}" method="post">
                        @csrf
                        @method('delete')
                            <p>Yakin Hapus Data {{ $l->kode_keluarga }} ?</p>
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
            <form action="{{ route('akeluarga.store') }}" method="post">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Keluarga</label>
                        <select class="form-select" required name="keluarga_id">
                            <option selected disabled class="text-center"> ~~ Pilih Keluarga ~~</option>
                            @foreach ($lkeluarga as $lk)
                                <option value="{{ $lk->id }}">{{ $lk->kode_keluarga }}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <label>Nama Anggota</label>
                    <select class="form-select" required name="anggota_id">
                        <option selected disabled class="text-center"> ~~ Pilih Anggota ~~</option>
                        @foreach ($langgota as $la)
                            <option value="{{ $la->id }}">{{ $la->nama_lengkap }}</option>
                        @endforeach
                    </select>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Status</label>
                          <select class="form-select" required name="status_keluarga">
                            <option selected disabled class="text-center"> ~~ Pilih Status ~~</option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Anak Ke</label>
                          <input type="number" name="anak_ke" class="form-control">
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