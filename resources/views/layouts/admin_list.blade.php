<ul class="list-group list-group-flush  shadow-sm mt-4">
    <li class="list-group-item text-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill mt-3" viewBox="0 0 16 16">
<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
<a href="{{route('admin.home')}}" class="nav-link">
    <p class="fw-bold">ADMIN</p>
</a>
</li>
<li class="mt-1 p-2 bg-white text-center rounded-2">
    <a href="{{route('admin.view.user.in-site')}}" class="nav-link">สมาชิกในระบบ</a>
</li>
<li class="mt-1 p-2 bg-white text-center rounded-2">
    <a href="{{route('admin.view.market.list')}}" class="nav-link">ร้านค้าในระบบ</a>
</li>
    <li class="mt-1 p-2 bg-white text-center rounded-2">
        <a href="{{route('admin.approve.maket')}}" class="nav-link">ร้านค้ารออนุมัติ</a>
    </li>
    <li class="mt-1 p-2 bg-white text-center rounded-2">
      <a href="{{route('admin.approve.products')}}" class="nav-link">สินค้ารออนุมัติ</a>
  </li>
  <li class="mt-1 p-2 bg-white text-center rounded-2">
      <a href="{{route('admin.wearhouse.view')}}" class="nav-link">คลังสินค้า</a>
  </li>
  <li class="mt-1 p-2 bg-white text-center rounded-2">
      <a href="{{route('admin.warehouse.product.sell.list')}}" class="nav-link">ขายสินค้า</a>
  </li>
  <li class="mt-1 p-2 bg-white text-center rounded-2">
      <a href="{{route('show.preorder.page')}}" class="nav-link">เพิ่มสินค้าพรีออเดอร์</a>
  </li>
  <li class="mt-1 p-2 bg-white text-center rounded-2">
    <a href="{{route('Show.preorder.manage')}}" class="nav-link">จัดการสินค้าพรีออเดอร์</a>
</li>
<li class="mt-1 p-2 bg-white text-center rounded-2">
    <a href="{{route('Preorder.list.view')}}" class="nav-link">รายการจองสินค้าพรีออเดอร์</a>
</li>
<li class="mt-1 p-2 bg-white text-center rounded-2">
    <a href="{{route('Show.Order.List')}}" class="nav-link">ค้นรายการสั่งซื้อ</a>
</li>
<li class="mt-1 p-2 bg-white text-center rounded-2">
    <a href="{{route('Admin.view.googleMap')}}" class="nav-link">ดูแผนที่ร้านค้า</a>
</li>
<li class="mt-1 p-2 bg-white text-center rounded-2">
    <a href="{{route('admin.sale.history')}}" class="nav-link">ประวัติการขายสินค้า</a>
</li>

</ul>
