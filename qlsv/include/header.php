
<nav id="header" class="navbar navbar-expand-sm bg-dark navbar-light">
  <ul class="navbar-nav">
    <a class="navbar-brand text-white" href="#">
        Xin chào, <?php echo $_SESSION['quyen']?>
    </a>
    <li class="nav-item active">
      <a class="nav-link" href="?page=dssv" >Thông tin sinh viên</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=qldiem">Điểm thi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=tkdt">Thống kê điểm</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=logout">Đăng xuất</a>
    </li>
  </ul>
</nav>
