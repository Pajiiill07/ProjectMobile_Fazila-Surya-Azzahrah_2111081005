@extends('layouts.main')

@section('navEvaluasi', 'active')
@section('content')

    <!-- Users List Table -->
    @if (session()->has('pesan'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('pesan') }}
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
                                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="form-select">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div
                            class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search"
                                        class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0">
                                </label>
                            </div>
                            <div class="dt-buttons">
                                @can('isManager')
                                    <button class="dt-button buttons-collection dropdown-toggle btn btn-label-secondary mx-3"
                                        tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                                        aria-expanded="false">
                                        <span><i class="bx bx-export me-2"></i>Export</span>
                                        <span class="dt-down-arrow">▼</span></button>
                                    <button class="dt-button add-new btn btn-primary" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasAddUser">
                                        <span><i class="bx bx-plus me-0 me-sm-2"></i>
                                            <span class="d-none d-sm-inline-block">Add New Evaluasi</span>
                                        </span>
                                    </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0"
                    aria-describedby="DataTables_Table_0_info" style="width: 1168px;">
                    <thead>
                        <tr>
                            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                style="width: 0px; display: none;" aria-label="">
                            </th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 53px;" aria-label="Id">
                                Id
                            </th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 285px;" aria-sort="descending"
                                aria-label="User: activate to sort column ascending">
                                Pegawai
                            </th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 300px;" aria-label="Email: activate to sort column ascending">
                                Tanggal Evaluasi
                            </th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 139px;"
                                aria-label="Verified: activate to sort column ascending">
                                Penilaian Absensi
                            </th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 139px;"
                                aria-label="Verified: activate to sort column ascending">
                                Penilaian Laporan
                            </th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 139px;"
                                aria-label="Verified: activate to sort column ascending">
                                Catatan dan Komentar
                            </th>
                            @can('isManager')
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 177px;"
                                    aria-label="Actions">
                                    Actions
                                </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluasis as $item)
                            <tr class="odd">
                                <td class="  control" tabindex="0" style="display: none;"></td>
                                <td><span>{{ $item->evaluasi_id }}</span></td>
                                <td class="sorting_1">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium">{{ $item->pegawai->nama_lengkap }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>{{ $item->tanggal_evaluasi }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="<?php echo getLabelClass1($item->penilaian_absensi); ?> me-1">
                                        {{ $item->penilaian_absensi }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="<?php echo getLabelClass2($item->penilaian_pelaporan); ?> me-1">
                                        {{ $item->penilaian_pelaporan }}
                                    </span>
                                </td>
                                <td>
                                    <span>{{ $item->catatan_dan_komentar }}</span>
                                </td>
                                @can('isManager')
                                    <td>
                                        <div class="d-inline-block text-nowrap">
                                            {{-- <button class="btn btn-sm btn-icon edit-record" data-id="{{ $item->evaluasi_id }}"
                                                data-bs-toggle=" offcanvasEditEvaluasi" data-bs-target="#offcanvasEditEvaluasi">
                                                <i class="bx bx-edit"></i> EDIT
                                            </button> --}}
                                            <button class="btn btn-sm btn-icon edit-record" data-id="{{ $item->evaluasi_id }}"
                                              data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditEvaluasi">
                                              <i class="bx bx-edit"></i> EDIT
                                          </button>
                                            <form action="evaluasi-backend/{{ $item->evaluasi_id }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-icon delete-record"
                                                    data-id="{{ $item->evaluasi_id }}"
                                                    onclick="return confirm('Yakin akan menghapus data ?')">
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
                        {{$users->links()}}
                      </ul>
                    </div>
                  </div> --}}
                </div>
            </div>
        </div>
        <!-- Offcanvas to add new user -->
        @include('content.evaluasi.create')
        @include('content.evaluasi.update')
    </div>
@endsection
