@extends('layouts.master')
@php
    $title = 'Data Anggota';
    $header = 'Data Anggota';
    $active = 'anggota';
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
            <th >Nama</th>
            <th width="12%">No Hp</th>
            <th width="10%">Tgl Lahir</th>
            <th width="10%">Tingkat</th>
            <th width="10%">Status</th>
            <th width="24%">Alamat</th>
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
          @foreach ($anggota as $a)
          <tr>
              <td>{{ $a->nama }}</td>
              <td>{{ $a->no_hp }}</td>
              <td>{{ $a->tgl_lahir }}</td>
              <td>{{ $a->tingkat->nama}}</td>
              <td>{{ $a->status->nama }}</td>
              <td>{{ $a->alamat }}</td>
              <form action="{{ route('anggota.destroy',$a->id) }}" method="post">
                @csrf
                @method('delete')
                <td>
                  <div class="row">
                    <div class="col-sm-6">
                      <button type="button" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#modal-lg-edit{{ $a->id }}">
                        <i class="fas fa-user-edit"></i>
                        Edit 
                      </button>
                    </div>
                    <div class="col-sm-6 display-flex">
                      <button type="submit" class="btn btn-sm bg-danger" onclick="confirm('Yakin ingin di hapus?')">
                        <i class="fas fa-user-times"></i>
                         Dell
                      </button>
                    </div>
                  </div>
                </td>
              </form>
          </tr>

          {{-- Edit Data --}}
            <div class="modal fade"  id="modal-lg-edit{{ $a->id }}">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                  <div class="card card-warning">
                    <div class="card-header">
                      <div class="card-title">
                        <h3>Edit Data {{ $a->nama }}</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('anggota.update',$a->id) }}" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" class="form-control" name="nama" placeholder="{{ $a->nama }}">
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            {{-- Nama --}}

                            {{-- No Hp --}}
                            <div class="form-group">
                              <label>No Hp</label>
                              <input type="text" class="form-control" name="no_hp" placeholder="{{ $a->no_hp }}">
                            </div>

                            {{-- tanggal lahir --}}
                            <div class="form-group">
                              <label>Tanggal Lahir:</label>
                                <input type="date" name="tgl_lahir" class="form-control datetimepicker-input" value="{{ $a->tgl_lahir }}" data-target="#reservationdate"/>
                            </div>
                          
                          </div>
                          <div class="col-md-6">
                            {{-- Tingkat --}}
                            <div class="form-group">
                              <label>Tingkat</label>
                              <select name="tingkat" class="form-control">
                                @foreach ($tingkat as $t)
                                  <option {{ ($t->id == $a->tingkat_id) ? 'selected' : '' }} value="{{ $t->id }}">{{ $t->nama }}</option>
                                @endforeach
                              </select>
                            </div>
                            
                            {{-- Status --}}
                            <div class="form-group">
                              <label>Status</label>
                              <select name="status" class="form-control">
                                @foreach ($status as $s)
                                  <option {{ ($s->id == $a->status_id) ? 'selected' : '' }} value="{{ $s->id }}">{{ $s->nama }}</option>
                                @endforeach
                              </select>
                            </div>
                          
                          </div>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group">
                          <label>Alamat</label>
                          <textarea name="alamat" class="form-control" rows="3" placeholder="{{ $a->alamat }}"></textarea>
                        </div>
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>


          @endforeach
        </tbody>
        <tfoot>
          <tr>
              <th>Total Anggota = {{ count($anggota) }}</th>
              <th>M0 = {{ count($anggota->where('tingkat_id', '1')) }}</th>
              <th>M1 = {{ count($anggota->where('tingkat_id', '2')) }}</th>
              <th>M2 = {{ count($anggota->where('tingkat_id', '3')) }}</th>
              <th>M3 = {{ count($anggota->where('tingkat_id', '4')) }}</th>
              <th colspan="2"></th>
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
          <form action="{{ route('anggota.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" placeholder="Enter ..." required>
            </div>
            <div class="row">
              <div class="col-md-6">
                {{-- Nama --}}

                {{-- No Hp --}}
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" class="form-control" name="no_hp" placeholder="Enter ..." required>
                </div>

                {{-- tanggal lahir --}}
                <div class="form-group">
                  <label>Tanggal Lahir:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#reservationdate"/ required>
                    </div>
                </div>
              
              </div>
              <div class="col-md-6">
                {{-- Tingkat --}}
                <div class="form-group">
                  <label>Tingkat</label>
                  <select name="tingkat" class="form-control" required>
                    @foreach ($tingkat as $t)
                      <option value="{{ $t->id }}">{{ $t->nama }}</option>
                    @endforeach
                  </select>
                </div>
                
                {{-- Status --}}
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control" required>
                    @foreach ($status as $s)
                      <option value="{{ $s->id }}">{{ $s->nama }}</option>
                    @endforeach
                  </select>
                </div>
              
              </div>
            </div>
            <!-- Alamat -->
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat mu..." required></textarea>
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