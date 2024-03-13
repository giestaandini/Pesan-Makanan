<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Resto</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
   
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/admin/admin">Administrator</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="/logout">
        Logout <span data-feather="log-out"></span></a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark  sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/admin') ? 'active' : ''}}" aria-current="page" href="/admin/admin">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/kategori') ? 'active' : ''}}" href="/admin/kategori">
              <span data-feather="book-open"></span>
              Kategori
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/menu') ? 'active' : ''}}" href="/admin/menu">
            <span data-feather="shopping-cart"></span>
            Makanan & Minuman
          </a>
        </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/promo') ? 'active' : ''}}" href="/admin/promo">
                  <span data-feather="gift"></span>
                  Banner Promo
                </a>
          </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/orderan') ? 'active' : ''}}" href="/admin/orderan">
                    <span data-feather="phone"></span>
                    Orderan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pengguna') ? 'active' : ''}}" href="/admin/pengguna">
                    <span data-feather="user"></span>
                    Pengguna
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          </li>
        </ul>
      </div>
    </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- awal card form -->
    <div class="card mt-3">
        <div class="card-header bg-secondary text-white">
            Tambah New User
        </div>

        @if ($errors->any())
            <div class="pt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{ url('admin/pengguna') }}">
                @csrf
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text"class="form-control" name="name" value="{{ Session::get('name') }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text"class="form-control" name="email" value="{{ Session::get('email') }}" required>
                </div>
                <div class="mb-3">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" name="password" value="{{ Session::get('password') }}" required">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="role">
                      <option value="{{ Session::get('role') }}">Pilih</option>
                      <option>user</option>
                      <option>admin</option>
                  </select>
                </div>
                <br>

                <button type="submit" class="btn btn-success"><span data-feather="edit"></span> Simpan</button>
                <button type="reset" class="btn btn-danger"><span data-feather="delete"></span> Kosongkan</button>
                <a class="btn btn-primary" href="/admin/pengguna" role="button"><span data-feather="log-out"></span> Keluar</a>
            </form>
        </div>
    </div>
    <!-- akhir card form -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
  </body>
</html>
