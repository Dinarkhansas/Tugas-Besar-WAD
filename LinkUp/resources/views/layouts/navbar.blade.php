<!-- Nav -->
<nav class="navbar navbar-expand navbar-dark" style="background-color: #5F9CD8;">
    <div class="container py-2">
      <div class="navbar-nav justify-content-between w-100">
        <a class="nav-link active" href="/" aria-current="page">Home</a>
        <div class="dropdown">
          <button class="btn dropdown-toggle" style="background-color: #3C76B4;" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Pilih User
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
            <li><a class="nav-link" href="{{ route('pemesanans.index') }}">Daftar Pesanan</a></li>
            <li><a class="nav-link" href="{{ route('penyediaLayanan.index') }}">Penyedia Layanan</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Nav End -->