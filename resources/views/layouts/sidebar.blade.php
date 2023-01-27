<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/table.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/datatables.min.css') }}">

</head>

<body>
    <div class="sidebar d-flex flex-column align-items-lg-stretch">
        <div class="logo d-flex flex-row">
            <img src="img/Logo_pta_padang.png" alt="" />
            <h1 class="logo-text">Pengadilan Agama Bukittinggi</h1>
        </div>
        <nav class="sidebar-list">
            <ul class="nav-sidebar">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="bx bx-book-alt"></i>
                        <p>Perencanaan</p>
                        <i class=""></i>
                    </a>
                    <ul class="treeview
                        {{ strpos(Route::currentRouteName(), 'iku') === 0 || strpos(Route::currentRouteName(), 'renstra') === 0  ? 'active' : '' }}
                    ">
                        <li class="nav-item {{ strpos(Route::currentRouteName(), 'iku') === 0 ? 'active' : '' }}">
                            <a href="{{route('iku')}}" class="item-child">
                                <p>Indikator Kinerja</p>
                            </a>
                        </li>
                        <li class="nav-item {{ strpos(Route::currentRouteName(), 'renstra') === 0 ? 'active' : '' }}">
                            <a href="{{route('renstra')}}" class="item-child">
                                <p>Rencana Strategis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="item-child">
                                <p>RKT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="item-child">
                                <p>Perjanjian Kinerja</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="bx bx-objects-vertical-bottom"></i>
                        <p>Pengukuran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bx bxs-report"></i>
                        <p>Laporan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="logout d-flex justify-content-center">
            <a onclick="myFunction();" class="d-flex" style="cursor: pointer;">
                <i class="bx bx-log-out"></i>
                <p>Logout</p>
            </a>
        </div>
    </div>

    <div class="content">
      @yield('content')
    </div>
    <script src="/js/jquery.js"></script>
    <script src="/js/datatables.min.js"></script>
    <script>
    var toggler = document.getElementsByClassName("has-treeview");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".treeview").classList.toggle("active");
            this.classList.toggle("has-treeview-down");
        });
    }

    var item = document.getElementsByClassName("active");
    const itemList = document.getElementsByClassName("nav-sidebar");

    itemList.addEventListener("click", () => {
        this.classList.add("active");
        item.removeClass("active");
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
      $('#table_id').DataTable();
    });
    </script>


<script>
    function myFunction() {
      if (confirm("Yakin mau logout?") == true) {
        window.location = '{{ url('/logout') }}';
      };
    };
    </script>
</body>

</html>
