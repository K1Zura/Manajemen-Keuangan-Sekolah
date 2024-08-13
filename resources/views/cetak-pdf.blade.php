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
<div class="card-body">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">Kelas</th>
                <th scope="col">Tahun Ajaran</th>
                <th scope="col">Kategori Pembayaran</th>
                <th scope="col">Nominal</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->nis}}</td>
                <td>{{$item->nama_kelas}}</td>
                <td>{{$item->tahun_ajaran}}</td>
                <td>{{$item->kategori}}</td>
                <td>{{$item->nominal}}</td>
                <td>{{$item->tanggal}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

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

