<div class="d-flex align-items-center justify-content-center "style="height: 70px;width:auto;background-color: #0A1702 " >
    <ul class="nav">
        <li class="nav-item">
          <a style="font-size:16px;" class="nav-link text-light" aria-current="page" href="{{url('/')}}">หน้าแรก</a>
        </li>

        <li class="nav-item">
            <a style="font-size:16px;" class="nav-link text-light" aria-current="page" href="{{url('/preorder/view')}}">พรีออเดอร์</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ประเภทสินค้า
            </a>
            <ul class="dropdown-menu rounded-1 shadow-sm" aria-labelledby="navbarDropdown">

                <li>

                    <a class="dropdown-item" href="{{url('/product/type-rice')}}">
                    ข้าว
                    </a>

                </li>

              <li><a class="dropdown-item" href="{{url('/product/processed-products')}}">ผลิตภัณฑ์แปรรูป</a></li>

              <li><a class="dropdown-item" href="{{url('/product/souvenir')}}">ของฝาก/ของที่ระลึก</a></li>
              <li><a class="dropdown-item" href="{{url('/product/agricultural_products')}}">ผลิตภัณฑ์การเกษตร</a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a style="font-size:16px;" class="nav-link text-light" aria-current="page" href="#">ติดต่อเรา</a>
        </li>



      </ul>
</div>

