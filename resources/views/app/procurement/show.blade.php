<x-app-layout>
  <x-slot:content>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-header">
                <div class="col-6">
                  <h4>
                    <i class="cil-description me-2"></i>{{ $procurement->fmis_ref_no }}
                  </h4>
                </div>
                <div class="col-6"></div>
              </div>
              <div class="card-body">
                <div class="row my-1">
                  <div class="col-8">
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('ผู้ค้า') }}</div>
                      <div class="col-9">
                        {{ $procurement->juristic_name_th }} 
                        <a href="{{ route('vendor.show', Hashids::encode($procurement->vendor_id)) }}" class="btn btn-sm btn-primary"><i class="cil-magnifying-glass"></i></a>
                      </div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('ผังบัญชี') }}</div>
                      <div class="col-9">{{ Helper::ChartOfAccounts($procurement->chart_of_account_id) }}</div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('รายละเอียด') }}</div>
                      <div class="col-9">{{ $procurement->description }}</div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('ปีงบประมาณ') }}</div>
                      <div class="col-9">{{ $procurement->fiscal_year }}</div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('วันที่ดำเนินการ') }}</div>
                      <div class="col-9">{{ date_format($procurement->purchase_date, 'd/m/Y') }}</div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('มูลค่า') }}</div>
                      <div class="col-9">{{ number_format($procurement->amount, 2) }}</div>
                    </div>
                  </div>
                  <div class="col-4 my-1">
                    {{-- <strong>{{ __('รายชื่อคณะกรรมการ') }}</strong> --}}
                  </div>
                </div>
                <div class="row mt-5">
                  <x-button link="{{ route('procurement.index') }}" class="btn-secondary">
                    {{ __('coreuiforms.return') }}
                  </x-button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot:content>
  <x-slot:css>
    <link href="{{ asset('procurements/DataTables/datatables.css') }}" rel="stylesheet"/>
  </x-slot:css>
  <x-slot:javascript>
    <script src="{{ asset('procurements/DataTables/datatables.min.js') }}"></script>

    </script>
  </x-slot:javascript>
</x-app-layout>
