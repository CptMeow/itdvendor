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
                    <i class="cil-building me-2"></i>{{ $vendor->juristic_name_th }}
                  </h4>
                </div>
                <div class="col-6"></div>
              </div>
              <div class="card-body">
                <div class="row my-1">
                  <div class="col-8">
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('เลขทะเบียนนิติบุคคล') }}</div>
                      <div class="col-9">{{ $vendor->juristic_id }}</div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('ประเภทนิติบุคคล') }}</div>
                      <div class="col-9">{{ $vendor->juristic_type }}</div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('สถานะนิติบุคคล') }}</div>
                      <div class="col-9"></div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('วันที่จดทะเบียนจัดตั้ง') }}</div>
                      <div class="col-9"></div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('ทุนจดทะเบียน') }}</div>
                      <div class="col-9"></div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('ที่ตั้ง') }}</div>
                      <div class="col-9">{{ $vendor->address }}</div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('โทรศัพท์') }}</div>
                      <div class="col-9">{{ $vendor->juristic_phone }} {{ $vendor->juristic_phone ? ', ' . $vendor->mobile_number : $vendor->mobile_number }}</div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('Website') }}</div>
                      <div class="col-9">{{ $vendor->juristic_id }}</div>
                    </div>
                    <div class="row py-2">
                      <div class="col-3 fw-bolder">{{ __('E-mail') }}</div>
                      <div class="col-9">{{ $vendor->juristic_email }}</div>
                    </div>
                  </div>
                  <div class="col-4 my-1">
                    <strong>{{ __('รายชื่อคณะกรรมการ') }}</strong>
                  </div>
                </div>
                <div class="row mt-5">
                  <x-button link="{{ route('vendor.index') }}" class="btn-secondary">
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
    <link href="{{ asset('vendors/DataTables/datatables.css') }}" rel="stylesheet"/>
  </x-slot:css>
  <x-slot:javascript>
    <script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
    <script>
      $(document).ready( function () {
        var table = $('#datatables').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,
          ajax: "{{ route('vendor.show',$vendor->gethashids()) }}",
          columns: [
              { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
              { data: 'fmis_ref_no'},
              { data: 'description'},
              { data: 'fiscal_year' },
              { data: 'amount' },
              { data: 'action' },
          ]
        });

      });
    </script>
  </x-slot:javascript>
</x-app-layout>
