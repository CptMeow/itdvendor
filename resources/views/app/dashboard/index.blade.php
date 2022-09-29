<x-app-layout>
  <x-slot:content>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-6 col-md-2">
            <div class="card">
              <div class="card-body">
                <div class="text-medium-emphasis text-end mb-4">
                  <svg class="icon icon-xxl">
                    <use xlink:href=" {{ asset('vendors/@coreui/icons/sprites/free.svg#cil-building') }}"></use>
                  </svg>
                </div>
                <div class="fs-4 fw-semibold">{{ number_format($vendors, 0) }}</div><small class="text-medium-emphasis text-uppercase fw-semibold">ผู้ค้า</small>
                <div class="progress progress-thin mt-3 mb-0">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6 col-md-2">
            <div class="card">
              <div class="card-body">
                <div class="text-medium-emphasis text-end mb-4">
                  <svg class="icon icon-xxl">
                    <use xlink:href=" {{ asset('vendors/@coreui/icons/sprites/free.svg#cil-description') }}"></use>
                  </svg>
                </div>
                <div class="fs-4 fw-semibold">{{ number_format($procurements, 0) }}</div><small class="text-medium-emphasis text-uppercase fw-semibold">จัดซื้อจัดจ้าง</small>
                <div class="progress progress-thin mt-3 mb-0">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-2">
            <div class="card">
              <div class="card-body">
                <div class="text-medium-emphasis text-end mb-4">
                  <svg class="icon icon-xxl">
                    <use xlink:href=" {{ asset('vendors/@coreui/icons/sprites/free.svg#cil-money') }}"></use>
                  </svg>
                </div>
                <div class="fs-4 fw-semibold">{{ number_format($amount, 2) }}</div><small class="text-medium-emphasis text-uppercase fw-semibold">มูลค่าทั้งหมด</small>
                <div class="progress progress-thin mt-3 mb-0">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </x-slot:content>
</x-app-layout>
