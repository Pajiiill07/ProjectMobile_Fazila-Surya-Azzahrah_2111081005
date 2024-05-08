@extends('layouts.main')

@section('navCuti','active')
@section('content')

            <!-- Cuti List Table -->
            @if (session()->has('pesan'))
                <div class="alert alert-success mt-3" role="alert">
                    {{session('pesan')}}
                </div>
            @endif
            <div class="card">
              <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                  <div class="row mx-2">
                    <div class="col-md-2">
                      <div class="me-3">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                          <label>
                            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                              <option value="10">10</option><option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select></label></div></div></div><div class="col-md-10">
                              <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0">
                          </label>
                      </div>
                      <div class="dt-buttons"> 
                        @can('isManager')
                        <button class="dt-button buttons-collection dropdown-toggle btn btn-label-secondary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                          <span><i class="bx bx-export me-2"></i>Export</span>
                          <span class="dt-down-arrow">▼</span></button> 
                          {{-- <button class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                            <span><i class="bx bx-plus me-0 me-sm-2"></i>
                            <span class="d-none d-sm-inline-block">Add New Cuti</span>
                            </span>
                          </button>  --}}
                          @endcan
                        </div>
                      </div>
                    </div>
                  </div>
                  <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1168px;">
                  <thead>
                    <tr>
                      <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="">
                      </th>
                      <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 53px;" aria-label="Id">
                        Id
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 285px;" aria-sort="descending" aria-label="User: activate to sort column ascending">
                        Pegawai
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 285px;" aria-sort="descending" aria-label="User: activate to sort column ascending">
                        Jatah Cuti
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300px;" aria-label="Email: activate to sort column ascending">
                        Tanggal Mulai
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139px;" aria-label="Verified: activate to sort column ascending">
                        Tanggal Selesai
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139px;" aria-label="Verified: activate to sort column ascending">
                        Alasan
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139px;" aria-label="Verified: activate to sort column ascending">
                        Status Pengajuan
                      </th>
                      @can('isManager')
                      <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 177px;" aria-label="Actions">
                        Actions
                      </th>
                      @endcan
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cutis as $item)
                    <tr class="odd">
                      <td class="  control" tabindex="0" style="display: none;"></td>
                      <td><span>{{$item->cuti_id}}</span></td>
                      <td class="sorting_1">
                        <div class="d-flex justify-content-start align-items-center user-name">
                          <div class="d-flex flex-column">
                              <span class="fw-medium">{{$item->pegawai->nama_lengkap}}</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="user-email">{{$item->jatah_cuti}} hari</span>
                      </td>
                      <td>
                        <span class="user-email">{{$item->tanggal_mulai}}</span>
                      </td>
                      <td>
                        <span class="user-email">{{$item->tanggal_selesai}}</span>
                      </td>
                      <td>
                        <span class="user-email">{{$item->alasan}}</span>
                      </td>
                      <td class="text-center">
                        <span class="<?php echo getLabelClass3($item->status_pengajuan); ?> me-1">
                          {{$item->status_pengajuan}}
                        </span>
                      </td>
                      @can('isManager')
                      <td>
                        <div class="d-inline-block text-nowrap">
                          <form id="form-approve-{{$item->cuti_id}}" action="{{ route('approve.cuti', ['id' => $item->cuti_id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                        <button class="btn btn-sm btn-icon edit-record" data-id="{{$item->cuti_id}}" onclick="document.getElementById('form-approve-{{$item->cuti_id}}').submit()">
                            <i class="bx fs-4 bx-check-shield text-success"></i> APPROVE
                        </button>
                        <br>
                        <form id="form-reject-{{$item->cuti_id}}" action="{{ route('reject.cuti', ['id' => $item->cuti_id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                        <button class="btn btn-sm btn-icon edit-record" data-id="{{$item->cuti_id}}" onclick="document.getElementById('form-reject-{{$item->cuti_id}}').submit()">
                            <i class="bx fs-4 bx-shield-x text-danger"></i> REJECT
                        </button>
                          <form action="cuti-backend/{{$item->cuti_id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-icon delete-record" data-id="{{$item->cuti_id}}" onclick="return confirm('Yakin akan menghapus data ?')">
                                <i class="bx bx-trash"></i> DELETE
                            </button>
                          </form>
                        </div>
                      </td>
                      @endcan
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              </div>
              <!-- Offcanvas to add new user -->
              {{-- @include('content.cuti.create') --}}
              {{-- @include('content.cuti.update') --}}
            </div> 
                   
@endsection