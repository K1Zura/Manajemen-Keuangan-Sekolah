<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | @yield('title')</title>
    <!-- plugins:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}" />
  </head>
  <body>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">David Greymaax</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="/logout">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">David Grey. H</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/keuangan">
                  <span class="menu-title">Keuangan</span>
                  <i class="mdi mdi-chart-areaspline menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Data Master</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-clipboard menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/siswa">Siswa</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/kelas">Kelas</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/tahun-ajaran">Tahun Ajaran</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/kategori">Kategori Pembayaran</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pembayaran">
                  <span class="menu-title">Pembayaran</span>
                  <i class="mdi mdi-calculator menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pengeluaran">
                  <span class="menu-title">Pengeluaran</span>
                  <i class="mdi mdi-arrow-up-bold-circle-outline menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/laporan">
                  <span class="menu-title">laporan</span>
                  <i class="mdi mdi-buffer menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">
                  <span class="menu-title">Contact</span>
                  <i class="mdi mdi-cellphone menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/faq">
                  <span class="menu-title">FAQ</span>
                  <i class="mdi mdi-comment-question-outline menu-icon"></i>
                </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">
                <h3 class="page-title">
                  <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="@yield('icon')"></i>
                  </span> @yield('awal')
                </h3>
                <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                      <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                  </ul>
                </nav>
              </div>
              @yield('content')
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © K1Zura</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js" type="text/javascript')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js')}}"></script>
    <script src="{{ asset('assets/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- Siswa --}}
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('siswa.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nis', name: 'nis'},
                    {data: 'nama', name: 'nama'},
                    {data: 'nama_kelas', name: 'nama_kelas'},
                    {data: 'tahun_ajaran', name: 'tahun_ajaran'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            $('#createNewSiswa').click(function () {
                $('#saveBtn').val("create-siswa");
                $('#siswa_id').val('');
                $('#siswaForm').trigger("reset");
                $('#modelHeading').html("Tambah Siswa Baru");
                $('#ajaxModel').modal('show');
                $('#siswaForm').show();
                loadClassesDropdown();
                loadTahunAjaranDropdown();
            });


            $('body').on('click', '.editSiswa', function () {
                var siswa_id = $(this).data('id');
                $.get("{{ route('siswa.index') }}" +'/' + siswa_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit Siswa");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#siswaForm').show();
                    $('#siswa_id').val(data.id);
                    $('#nis').val(data.nis);
                    $('#nama').val(data.nama);
                    loadClassesDropdown(data.kelas_id);
                    loadTahunAjaranDropdown(data.tahun_ajaran_id);
                })
            });


            $.ajax({
                data: $('#siswaForm').serialize(),
                url: "{{ route('siswa.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#siswaForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    $('#saveBtn').html(originalBtnText);
                    table.draw();
                    Swal.fire(
                        'Success!',
                        'File anda sudah disimpan.',
                        'success'
                    );
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        // Validation failed, display errors
                        var errors = xhr.responseJSON.errors;
                        $('.errMsgContainer').empty(); // Clear previous errors

                        $.each(errors, function (key, value) {
                            $('.nameError').text(value)
                            $('.errMsgContainer').append('<p class="text-danger">' + value + '</p>');
                        });

                    } else {
                        console.log('Error:', xhr);
                    }

                    $('#saveBtn').html(originalBtnText);
                }
            });
            function loadClassesDropdown(selectedKelasId) {
                $.ajax({
                url: "{{ route('get-kelas') }}",
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#kelas_id').empty();
                    $.each(data, function (key, value) {
                        var selected = (key == selectedKelasId) ? 'selected' : '';
                        $('#kelas_id').append('<option value="' + key + '" ' + selected + '>' + value + '</option>');
                    });
                },
                    error: function (data) {
                        console.log('Error fetching classes:', data);
                    }
                });
            }
            function loadTahunAjaranDropdown(selectedTahunAjaranId) {
                $.ajax({
                    url: "{{ route('get-tahun-ajaran') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#tahun_ajaran_id').empty();
                        $.each(data, function (key, value) {
                            var selected = (key == selectedTahunAjaranId) ? 'selected' : '';
                            $('#tahun_ajaran_id').append('<option value="' + key + '" ' + selected + '>' + value + '</option>');
                        });
                    },
                    error: function (data) {
                        console.log('Error Tahun Ajaran:', data);
                    }
                });
            }


            $('body').on('click', '.deleteSiswa', function () {
            var siswa_id = $(this).data("id");
            Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data ini tidak akan kembali lagi!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('siswa.store') }}"+'/'+siswa_id,
                            success: function (data) {
                                table.draw();
                                Swal.fire(
                                'Deleted!',
                                'Data Anda sudah dihapus.',
                                'success'
                                );
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            });
        });
    </script>





    {{-- Kelas --}}
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table-kelas').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kelas.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama_kelas', name: 'nama_kelas'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createNewKelas').click(function () {
                $('#saveBtnKelas').val("create-Kelas");
                $('#kelas_id').val('');
                $('#kelasForm').trigger("reset");
                $('#modelHeading').html("Tambah Kelas Baru");
                $('#ajaxModel').modal('show');
                $('#kelasForm').show();
            });

            $('body').on('click', '.editKelas', function () {
                var kelas_id = $(this).data('id');
                $.get("{{ route('kelas.index') }}" +'/' + kelas_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit Kelas");
                    $('#saveBtnKelas').val("edit-Kelas");
                    $('#ajaxModel').modal('show');
                    $('#kelasForm').show();
                    $('#kelas_id').val(data.id);
                    $('#nama_kelas').val(data.nama_kelas);
                })
            });

            $('#saveBtnKelas').click(function (e) {
                e.preventDefault();
                var originalBtnText = $(this).html();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#kelasForm').serialize(),
                    url: "{{ route('kelas.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#saveBtnKelas').html(originalBtnText);

                        $('#kelasForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        Swal.fire(
                        'Success!',
                        'File anda sudah disimpan.',
                        'success'
                        );

                    },
                    error: function (data) {
                        $('#saveBtnKelas').html(originalBtnText);
                        console.log('Error:', data);
                    }
                });
            });

            $('body').on('click', '.deleteKelas', function () {
                var kelas_id = $(this).data("id");
                Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data ini tidak akan kembali lagi!!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            type: "DELETE",
                            url: "{{ route('kelas.store') }}"+'/'+kelas_id,
                            success: function (data) {
                                table.draw();
                                    Swal.fire(
                                    'Deleted!',
                                    'Data Anda sudah dihapus.',
                                    'success'
                                    );
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            });
        });
    </script>





    {{-- Tahun Ajaran --}}
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var table = $('.data-table-tahun-ajaran').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tahun-ajaran.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'tahun_ajaran', name: 'tahun_ajaran'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createNewTahunAjaran').click(function () {
                $('#saveBtnTahunAjaran').val("create-Tahun-Ajaran");
                $('#tahunAjaran_id').val('');
                $('#tahunAjaranForm').trigger("reset");
                $('#modelHeading').html("Tambah Tahun Ajaran Baru");
                $('#ajaxModel').modal('show');
                $('#tahunAjaranForm').show();
            });

            $('body').on('click', '.editTahunAjaran', function () {
            var tahunAjaran_id = $(this).data('id');
                $.get("{{ route('tahun-ajaran.index') }}" +'/' + tahunAjaran_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit Tahun Ajaran");
                    $('#saveBtnTahunAjaran').val("edit-Tahun-Ajaran");
                    $('#ajaxModel').modal('show');
                    $('#tahunAjaranForm').show();
                    $('#tahunAjaran_id').val(data.id);
                    $('#tahun_ajaran').val(data.tahun_ajaran);
                })
            });

            $('#saveBtnTahunAjaran').click(function (e) {
                e.preventDefault();
                var originalBtnText = $(this).html();
                $(this).html('Sending..');

                    $.ajax({
                    data: $('#tahunAjaranForm').serialize(),
                    url: "{{ route('tahun-ajaran.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        $('#tahunAjaranForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtnTahunAjaran').html(originalBtnText);
                        table.draw();
                        Swal.fire(
                        'Success!',
                        'File anda sudah disimpan.',
                        'success'
                        );

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtnTahunAjaran').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deleteTahunAjaran', function () {
                var tahunAjaran_id = $(this).data("id");
                Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data ini tidak akan kembali lagi!!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            type: "DELETE",
                            url: "{{ route('tahun-ajaran.store') }}"+'/'+tahunAjaran_id,
                            success: function (data) {
                                table.draw();
                                Swal.fire(
                                    'Deleted!',
                                    'Data Anda sudah dihapus.',
                                    'success'
                                );

                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            });
        });
    </script>




    {{-- Kategori Pembayaran --}}
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table-pembayaran').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kategori.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'kategori', name: 'kategori'},
                    {data: 'tahun_ajaran', name: 'tahun_ajaran'},
                    {
                        data: 'nominal',
                        name: 'nominal',
                            render: function (data, type, full, meta) {
                                return Number(data).toLocaleString();
                            }
                        },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            $('#createNewPembayaran').click(function () {
                $('#saveBtnPembayaran').val("create-Pembayaran");
                $('#pembayaran_id').val('');
                $('#pembayaranForm').trigger("reset");
                $('#modelHeading').html("Tambah kategori pembayaran baru");
                $('#ajaxModel').modal('show');
                $('#pembayaranForm').show();
                loadTahunAjaranDropdown();
            });


            $('body').on('click', '.editKategoriPembayaran', function () {
                var pembayaran_id = $(this).data('id');
                $.get("{{ route('kategori.index') }}" +'/' + pembayaran_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit Pembayaran");
                    $('#saveBtnPembayaran').val("edit-pembayaran");
                    $('#ajaxModel').modal('show');
                    $('#pembayaranForm').show();
                    $('#pembayaran_id').val(data.id);
                    $('#kategori').val(data.kategori);
                    $('#nominal').val(data.nominal);
                    loadTahunAjaranDropdown(data.tahun_ajaran_id);
                });
            });

            $('#saveBtnPembayaran').click(function (e) {
                e.preventDefault();
                var originalBtnText = $(this).html();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#pembayaranForm').serialize(),
                    url: "{{ route('kategori.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        $('#pembayaranForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtnPembayaran').html(originalBtnText);
                        table.draw();
                        Swal.fire(
                        'Success!',
                        'File anda sudah disimpan.',
                        'success'
                        );

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtnPembayaran').html(originalBtnText);
                    }
                });
            });
            function loadTahunAjaranDropdown(selectedTahunAjaranId) {
                $.ajax({
                    url: "{{ route('get-tahun-ajaran') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#tahun_ajaran_id').empty();
                        $.each(data, function (key, value) {
                            var selected = (key == selectedTahunAjaranId) ? 'selected' : '';
                            $('#tahun_ajaran_id').append('<option value="' + key + '" ' + selected + '>' + value + '</option>');
                        });
                    },
                    error: function (data) {
                        console.log('Error Tahun Ajaran:', data);
                    }
                });
            }


            $('body').on('click', '.deleteKategoriPembayaran', function () {
                var pembayaran_id = $(this).data("id");
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data ini tidak akan kembali lagi!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('kategori.store') }}"+'/'+pembayaran_id,
                            success: function (data) {
                                table.draw();
                                Swal.fire(
                                'Deleted!',
                                'Data Anda sudah dihapus.',
                                'success'
                                );
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            });
        });
    </script>

    {{-- Pembayaran --}}
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table-bayar').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pembayaran.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'nama', name: 'nama' },
                    { data: 'nis', name: 'nis' },
                    { data: 'nama_kelas', name: 'kelas.nama_kelas' },
                    { data: 'tahun_ajaran', name: 'tahun_ajarans.tahun_ajaran' },
                    { data: 'kategori', name: 'kategori' },

                    {
                        data: 'validasi',
                        name: 'validasi',
                        render: function(data) {
                        return data == 1 ? 'Sudah divalidasi' : 'Belum divalidasi';
                        },
                    },
                    {
                        data: 'nominal',
                        name: 'nominal',
                            render: function (data, type, full, meta) {
                                return Number(data).toLocaleString();
                            }
                        },
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            $.ajax({
                url: "{{ route('pembayaran.index') }}",
                type: 'GET',
                success: function (data) {
                    table.clear().draw();
                    table.rows.add(data).draw();
                }
            });


            $('#createNewBayar').click(function () {
                $('#saveBtnBayar').val("create-Bayar");
                $('#bayar_id').val('');
                $('#bayarForm').trigger("reset");
                $('#modelHeading').html("Pembayaran");
                $('#ajaxModel').modal('show');
                $('#bayarForm').show();
                loadSiswaDropdown();
                loadKategoriDropdown();
            });


            $('body').on('click', '.editPembayaran', function () {
                var bayar_id = $(this).data('id');
                $.get("{{ route('pembayaran.index') }}" +'/' + bayar_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit Pembayaran");
                    $('#saveBtnBayar').val("edit-pembayaran");
                    $('#ajaxModel').modal('show');
                    $('#bayarForm').show();
                    $('#bayar_id').val(data.id);
                    $('#validasi').val(data.validasi);
                    $('#nominal').val(data.nominal);
                    $('#tanggal').val(data.tanggal);
                    loadKategoriDropdown(data.kategori_pembayaran_id);
                });
            });


            $('#saveBtnBayar').click(function (e) {
            e.preventDefault();
            var originalBtnText = $(this).html();
            $(this).html('Sending..');

                $.ajax({
                    data: $('#bayarForm').serialize(),
                    url: "{{ route('pembayaran.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        $('#bayarForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtnBayar').html(originalBtnText);
                        $('#kelas_id').val(data.kelas_id);
                        $('#tahun_ajaran_id').val(data.tahun_ajaran_id);
                        table.draw();
                        Swal.fire(
                        'Success!',
                        'Tunggu validasinya ya...',
                        'success'
                        );

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtnBayar').html(originalBtnText);
                    }
                });
            });
            function loadKategoriDropdown(selectedKategoriId) {
                $.ajax({
                    url: "{{ route('get-kategori') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#kategori_pembayaran_id').empty();
                        $.each(data, function (key, value) {
                            var selected = (key == selectedKategoriId) ? 'selected' : '';
                            $('#kategori_pembayaran_id').append('<option value="' + key + '" ' + selected + '>' + value + '</option>');
                        });
                    },
                        error: function (data) {
                            console.log('Error fetching classes:', data);
                        }
                });
            }
            function loadSiswaDropdown(selectedSiswaId) {
                $.ajax({
                    url: "{{ route('get-siswa') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#siswa_id').empty();
                        $.each(data, function (key, value) {
                            var selected = (key == selectedSiswaId) ? 'selected' : '';
                            $('#siswa_id').append('<option value="' + key + '" ' + selected + '>' + value + '</option>');
                        });
                    },
                    error: function (data) {
                        console.log('Error fetching classes:', data);
                    }
                });
            }




            $('body').on('click', '.validasiPembayaran', function () {
                var bayar_id = $(this).data('id');

                $.ajax({
                    url: '/validate-payment/' + bayar_id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        Swal.fire(
                        'Success!',
                        'File anda sudah divalidasi.',
                        'success'
                        );
                        $('.data-table-bayar').DataTable().ajax.reload();
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Validation failed!');
                    }
                });
            });


            $('body').on('click', '.deletePembayaran', function () {
            var bayar_id = $(this).data("id");
            Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data ini tidak akan kembali lagi!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('pembayaran.store') }}"+'/'+bayar_id,
                            success: function (data) {
                                table.draw();
                                Swal.fire(
                                'Deleted!',
                                'Data Anda sudah dihapus.',
                                'success'
                                );
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            });
        });
    </script>

    {{-- Contact --}}
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#contactForm').submit(function (e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var contactId = $(this).data('id');

                $.ajax({
                    url: "/update-contact/" + contactId,
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        $('#contactForm').trigger("load");
                        Swal.fire(
                        'Success!',
                        'File anda sudah disimpan.',
                        'success'
                        );
                    },
                    error: function (error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>

    {{-- FAQ --}}
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table-faq').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('faq.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'pertanyaan', name: 'pertanyaan'},
                    {data: 'jawaban', name: 'jawaban'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            $('#createNewFaq').click(function () {
                $('#saveBtnFaq').val("create-Faq");
                $('#faq_id').val('');
                $('#faqForm').trigger("reset");
                $('#modelHeading').html("FAQ");
                $('#ajaxModel').modal('show');
                $('#faqForm').show();
            });


            $('body').on('click', '.editFaq', function () {
                var faq_id = $(this).data('id');
                $.get("{{ route('faq.index') }}" +'/' + faq_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit FAQ");
                    $('#saveBtnFaq').val("edit-faq");
                    $('#ajaxModel').modal('show');
                    $('#faqForm').show();
                    $('#faq_id').val(data.id);
                    $('#pertanyaan').val(data.pertanyaan);
                    $('#jawaban').val(data.jawaban);
                });
            });


            $('#saveBtnFaq').click(function (e) {
            e.preventDefault();
            var originalBtnText = $(this).html();
            $(this).html('Sending..');

                $.ajax({
                    data: $('#faqForm').serialize(),
                    url: "{{ route('faq.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        $('#faqForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtnFaq').html(originalBtnText);
                        table.draw();
                        Swal.fire(
                        'Success!',
                        'Data anda sudah disimpan.',
                        'success'
                        );

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtnFaq').html(originalBtnText);
                    }
                });
            });


            $('body').on('click', '.deleteFaq', function () {
            var faq_id = $(this).data("id");
            Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data ini tidak akan kembali lagi!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('faq.store') }}"+'/'+faq_id,
                            success: function (data) {
                                table.draw();
                                Swal.fire(
                                'Deleted!',
                                'Data Anda sudah dihapus.',
                                'success'
                                );
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            $('#filterBtn').on('click', function () {
                var tanggalMulai = $('#tanggal_mulai').val();
                var tanggalSelesai = $('#tanggal_selesai').val();

                // Validasi tanggal selesai
                if (new Date(tanggalSelesai) < new Date(tanggalMulai)) {
                    Swal.fire(
                        'Perhatian!',
                        'Tanggal selesai harus setelah atau sama dengen tanggal mulai.',
                        'info'
                        );
                    return;
                }

                $.ajax({
                    type: 'GET',
                    url: '/cetak-pdf',
                    data: {
                        tanggal_mulai: tanggalMulai,
                        tanggal_selesai: tanggalSelesai
                    },
                    success: function (data) {
                        $('.data-table-laporan').html(data);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            $('#downloadPDF').on('click', function () {
                downloadReport('pdf');
            });

            $('#downloadExcel').on('click', function () {
                downloadReport('excel');
            });

            function downloadReport(format) {
                var tanggalMulai = $('#tanggal_mulai').val();
                var tanggalSelesai = $('#tanggal_selesai').val();

                if (new Date(tanggalSelesai) < new Date(tanggalMulai)) {
                    Swal.fire(
                        'Perhatian!',
                        'Tanggal selesai harus setelah atau sama dengen tanggal mulai.',
                        'info'
                        );
                    return;
                }

                window.open('/download-pdf?format=' + format + '&tanggal_mulai=' + tanggalMulai + '&tanggal_selesai=' + tanggalSelesai, '_blank');
            }
        });
    </script>



    {{-- Pengeluaran --}}
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table-pengeluaran').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pengeluaran.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'alasan', name: 'alasan'},
                    {data: 'nominal', name: 'nominal'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createNewPengeluaran').click(function () {
                $('#saveBtnPengeluaran').val("create-Pengeluaran");
                $('#pengeluaran_id').val('');
                $('#pengeluaranForm').trigger("reset");
                $('#modelHeading').html("Pengeluaran");
                $('#ajaxModel').modal('show');
                $('#pengeluaranForm').show();
            });


            $('body').on('click', '.editPengeluaran', function () {
                var pengeluaran_id = $(this).data('id');
                $.get("{{ route('pengeluaran.index') }}" +'/' + pengeluaran_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit FAQ");
                    $('#saveBtnPengeluaran').val("edit-pengeluaran");
                    $('#ajaxModel').modal('show');
                    $('#pengeluaranForm').show();
                    $('#pengeluaran_id').val(data.id);
                    $('#alasan').val(data.alasan);
                    $('#nominal').val(data.nominal);
                    $('#tanggal').val(data.tanggal);
                });
            });


            $('#saveBtnPengeluaran').click(function (e) {
            e.preventDefault();
            var originalBtnText = $(this).html();
            $(this).html('Sending..');

                $.ajax({
                    data: $('#pengeluaranForm').serialize(),
                    url: "{{ route('pengeluaran.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#pengeluaranForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtnPengeluaran').html(originalBtnText);
                        table.draw();
                        Swal.fire(
                            'Success!',
                            'Data anda sudah disimpan.',
                            'success'
                        );
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtnPengeluaran').html(originalBtnText);
                    }
                });
            });


            $('body').on('click', '.deletePengeluaran', function () {
            var pengeluaran_id = $(this).data("id");
            Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data ini tidak akan kembali lagi!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('pengeluaran.store') }}"+'/'+pengeluaran_id,
                            success: function (data) {
                                table.draw();
                                Swal.fire(
                                'Deleted!',
                                'Data Anda sudah dihapus.',
                                'success'
                                );
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            });
        });
    </script>
  </body>
</html>
