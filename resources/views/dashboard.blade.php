@extends('layouts.main')

@section('navDashboard', 'active')
@section('content')
    <div class="card-body row p-0 pb-3">
        <div class="col-12 col-md-8 card-separator">
            <h3>Welcome back, Felecia 👋🏻 </h3>
            <div class="col-12 col-lg-7">
                <p>Your progress this week is Awesome. let's keep it up and get a lot of points reward !</p>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>User</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">5</h3>
                                <small class="text-success">(100%)</small>
                            </div>
                            <small>Total User</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="bx bx-user bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Department</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">0</h3>
                                <small class="text-success">(100%)</small>
                            </div>
                            <small>Total Department</small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="bx bx-user-check bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Posisi</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">0</h3>
                                <small class="text-success">(100%)</small>
                            </div>
                            <small>Total Posisi</small>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="bx bx-group bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Pegawai</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">5</h3>
                                <small class="text-success">(100%)</small>
                            </div>
                            <small>Total Pegawai</small>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="bx bx-user-voice bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">Search Filter</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 user_role"><select id="UserRole" class="form-select text-capitalize">
                        <option value=""> Select Role </option>
                        <option value="Admin">Admin</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Maintainer">Maintainer</option>
                        <option value="Subscriber">Subscriber</option>
                    </select></div>
                <div class="col-md-4 user_plan"><select id="UserPlan" class="form-select text-capitalize">
                        <option value=""> Select Plan </option>
                        <option value="Basic">Basic</option>
                        <option value="Company">Company</option>
                        <option value="Enterprise">Enterprise</option>
                        <option value="Team">Team</option>
                    </select></div>
                <div class="col-md-4 user_status"><select id="FilterTransaction" class="form-select text-capitalize">
                        <option value=""> Select Status </option>
                        <option value="Pending" class="text-capitalize">Pending</option>
                        <option value="Active" class="text-capitalize">Active</option>
                        <option value="Inactive" class="text-capitalize">Inactive</option>
                    </select></div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row mx-2">
                    <div class="col-md-2">
                        <div class="me-3">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label><select
                                        name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="form-select">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select></label></div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div
                            class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search"
                                        class="form-control" placeholder="Search.."
                                        aria-controls="DataTables_Table_0"></label></div>
                            <div class="dt-buttons"> <button
                                    class="dt-button buttons-collection dropdown-toggle btn btn-label-secondary mx-3"
                                    tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                    aria-haspopup="dialog" aria-expanded="false"><span><i
                                            class="bx bx-export me-2"></i>Export</span><span
                                        class="dt-down-arrow">▼</span></button> <button
                                    class="dt-button add-new btn btn-primary" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasAddUser"><span><i class="bx bx-plus me-0 me-sm-2"></i><span
                                            class="d-none d-sm-inline-block">Add New User</span></span></button> </div>
                        </div>
                    </div>
                </div>
                <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0"
                    aria-describedby="DataTables_Table_0_info" style="width: 1168px;">
                    <thead>
                        <tr>
                            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                style="width: 0px; display: none;" aria-label=""></th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 53px;"
                                aria-label="Id">Id</th>
                            <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" style="width: 285px;" aria-sort="descending"
                                aria-label="User: activate to sort column ascending">User</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 300px;"
                                aria-label="Email: activate to sort column ascending">Email</th>
                            <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" style="width: 139px;"
                                aria-label="Verified: activate to sort column ascending">Verified</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 177px;"
                                aria-label="Actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd">
                            <td class="  control" tabindex="0" style="display: none;"></td>
                            <td><span>1</span></td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3">
                                            <span class="avatar-initial rounded-circle bg-label-info">P</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="text-body text-truncate">
                                            <span class="fw-medium">PVL</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="user-email">admin@gmail.com</span>
                            </td>
                            <td class="  text-center">
                                <i class="bx fs-4 bx-shield-x text-danger"></i>
                            </td>
                            <td>
                                <div class="d-inline-block text-nowrap">
                                    <button class="btn btn-sm btn-icon edit-record" data-id="540"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                                        <i class="bx bx-edit"></i>
                                    </button><button class="btn btn-sm btn-icon delete-record" data-id="540">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="dropdown-item">View</a>
                                        <a href="javascript:;" class="dropdown-item">Suspend</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="even">
                            <td class="  control" tabindex="0" style="display: none;">
                            </td>
                            <td>
                                <span>2</span>
                            </td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3"><span
                                                class="avatar-initial rounded-circle bg-label-dark">JD</span></div>
                                    </div>
                                    <div class="d-flex flex-column"><a
                                            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="text-body text-truncate"><span class="fw-medium">John Doe</span></a>
                                    </div>
                                </div>
                            </td>
                            <td><span class="user-email">johndoe@user.com</span></td>
                            <td class="  text-center"><i class="bx fs-4 bx-shield-x text-danger"></i></td>
                            <td>
                                <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon edit-record"
                                        data-id="539" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><i
                                            class="bx bx-edit"></i></button><button
                                        class="btn btn-sm btn-icon delete-record" data-id="539"><i
                                            class="bx bx-trash"></i></button><button
                                        class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end m-0"><a
                                            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="dropdown-item">View</a><a href="javascript:;"
                                            class="dropdown-item">Suspend</a></div>
                                </div>
                            </td>
                        </tr>
                        <tr class="odd">
                            <td class="  control" tabindex="0" style="display: none;"></td>
                            <td><span>3</span></td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3"><span
                                                class="avatar-initial rounded-circle bg-label-success">G</span></div>
                                    </div>
                                    <div class="d-flex flex-column"><a
                                            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="text-body text-truncate"><span class="fw-medium">Guest</span></a></div>
                                </div>
                            </td>
                            <td><span class="user-email">guest@guest.com</span></td>
                            <td class="  text-center"><i class="bx fs-4 bx-shield-x text-danger"></i></td>
                            <td>
                                <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon edit-record"
                                        data-id="538" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><i
                                            class="bx bx-edit"></i></button><button
                                        class="btn btn-sm btn-icon delete-record" data-id="538"><i
                                            class="bx bx-trash"></i></button><button
                                        class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end m-0"><a
                                            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="dropdown-item">View</a><a href="javascript:;"
                                            class="dropdown-item">Suspend</a></div>
                                </div>
                            </td>
                        </tr>
                        <tr class="even">
                            <td class="  control" tabindex="0" style="display: none;"></td>
                            <td><span>4</span></td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3"><span
                                                class="avatar-initial rounded-circle bg-label-info">FR</span></div>
                                    </div>
                                    <div class="d-flex flex-column"><a
                                            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="text-body text-truncate"><span class="fw-medium">Fitzgerald
                                                Rice</span></a></div>
                                </div>
                            </td>
                            <td><span class="user-email">majufy@mailinator.com</span></td>
                            <td class="  text-center"><i class="bx fs-4 bx-shield-x text-danger"></i></td>
                            <td>
                                <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon edit-record"
                                        data-id="531" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><i
                                            class="bx bx-edit"></i></button><button
                                        class="btn btn-sm btn-icon delete-record" data-id="531"><i
                                            class="bx bx-trash"></i></button><button
                                        class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end m-0"><a
                                            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="dropdown-item">View</a><a href="javascript:;"
                                            class="dropdown-item">Suspend</a></div>
                                </div>
                            </td>
                        </tr>
                        <tr class="odd">
                            <td class="  control" tabindex="0" style="display: none;"></td>
                            <td><span>5</span></td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3"><span
                                                class="avatar-initial rounded-circle bg-label-danger">A</span></div>
                                    </div>
                                    <div class="d-flex flex-column"><a
                                            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="text-body text-truncate"><span class="fw-medium">Admin</span></a></div>
                                </div>
                            </td>
                            <td><span class="user-email">admin@admin.com</span></td>
                            <td class="  text-center"><i class="bx fs-4 bx-shield-x text-danger"></i></td>
                            <td>
                                <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon edit-record"
                                        data-id="524" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><i
                                            class="bx bx-edit"></i></button><button
                                        class="btn btn-sm btn-icon delete-record" data-id="524"><i
                                            class="bx bx-trash"></i></button><button
                                        class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end m-0"><a
                                            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account"
                                            class="dropdown-item">View</a><a href="javascript:;"
                                            class="dropdown-item">Suspend</a></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row mx-2">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                            Showing 1 to 5 of 5 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                    <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link"
                                        data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#"
                                        aria-controls="DataTables_Table_0" role="link" aria-current="page"
                                        data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a
                                        aria-controls="DataTables_Table_0" aria-disabled="true" role="link"
                                        data-dt-idx="next" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- / Content -->

@endsection
