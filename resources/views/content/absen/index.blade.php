@extends('layouts.main')

@section('navAbsen','active')
@section('content')



            <!-- Absen List Table -->
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
                        @can('isAdmin')
                        <button class="dt-button buttons-collection dropdown-toggle btn btn-label-secondary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                          <span><i class="bx bx-export me-2"></i>Export</span>
                          <span class="dt-down-arrow">▼</span></button> 
                          {{-- <button class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                            <span><i class="bx bx-plus me-0 me-sm-2"></i>
                            <span class="d-none d-sm-inline-block">Add New Absensi</span>
                            </span>
                          </button> --}}
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
                        No
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 285px;" aria-sort="descending" aria-label="User: activate to sort column ascending">
                        Nama Pegawai
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300px;" aria-label="Email: activate to sort column ascending">
                        Tanggal
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139px;" aria-label="Verified: activate to sort column ascending">
                        Jam Datang
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139px;" aria-label="Verified: activate to sort column ascending">
                        Jam Pulang
                      </th>
                      <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139px;" aria-label="Verified: activate to sort column ascending">
                        Keterangan
                      </th>
                      @can('isAdmin')
                      <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 177px;" aria-label="Actions">
                        Actions
                      </th>
                      @endcan
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($absens as $item)
                    <tr class="odd">
                      <td class="  control" tabindex="0" style="display: none;"></td>
                      <td><span>{{$loop->iteration}}</span></td>
                      <td class="sorting_1">
                        <div class="d-flex justify-content-start align-items-center user-name">
                          <div class="d-flex flex-column">
                              <span class="fw-medium">{{$item->pegawai->nama_lengkap}}</span>
                            </a>
                          </div>
                        </div>
                      </td>
                      <td>
                        {{$item->tanggal}}
                      </td>
                      <td>
                          {{$item->jam_datang}}
                      </td>
                      <td>
                          {{$item->jam_pulang}}
                      </td>
                      <td>
                        <span class="<?php echo getLabelClass4($item->keterangan); ?> me-1">
                          {{$item->keterangan}}
                        </span>
                      </td>
                      @can('isAdmin')
                      <td>
                        <div class="d-inline-block text-nowrap">
                          {{-- <button class="btn btn-sm btn-icon edit-record" data-id="540" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser">
                            <i class="bx bx-edit"></i>
                          </button> --}}
                          <form action="absen-backend/{{$item->absen_id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-icon delete-record" data-id="{{$item->absen_id}}" onclick="return confirm('Yakin akan menghapus data ?')">
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
                <div class="row mx-2">
                  {{-- <div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                      <ul class="pagination">
                        {{$absens->links()}}
                      </ul>
                    </div>
                  </div> --}}
                </div>
              </div>
              </div>
              <!-- Offcanvas to add new user -->
              {{-- @include('content.absen.create') --}}
            </div>        
@endsection