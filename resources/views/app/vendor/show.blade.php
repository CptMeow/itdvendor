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
                      <div class="col-3 fw-bolder">{{ __('ประเภทธุรกิจ (TSIC)') }}</div>
                      <div class="col-9"></div>
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
                      <div class="col-9"></div>
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
                <div class="row mt-3">
                  <div class="col">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-coreui-toggle="tab" data-coreui-target="#home" type="button" role="tab" aria-controls="home"
                          aria-selected="true">{{ __('ข้อมูลผลประกอบการเบื้องต้น') }}</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-coreui-toggle="tab" data-coreui-target="#profile" type="button" role="tab" aria-controls="profile"
                          aria-selected="false">{{ __('สาขา') }} <span class="badge bg-info">0</span></button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="messages-tab" data-coreui-toggle="tab" data-coreui-target="#messages" type="button" role="tab" aria-controls="messages"
                          aria-selected="false">{{ __('ผลงานที่ผ่านมา') }} <span class="badge bg-info">{{ $procurement_count }}</span></button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="settings-tab" data-coreui-toggle="tab" data-coreui-target="#settings" type="button" role="tab" aria-controls="settings"
                          aria-selected="false">Settings</button>
                      </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">...</div>
                      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                      <div class="tab-pane p-3" id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">
                        <table class="table" id="datatables">
                          <thead>
                            <tr>
                              <th>{{ __('ลำดับ') }}</th>
                              <th>{{ __('Order NO.') }}</th>
                              {{-- <th width="40px">{{ __('ปีงบประมาณ') }}</th> --}}
                              {{-- <th>{{ __('ผังบัญชี') }}</th> --}}
                              <th>{{ __('รายละเอียด') }}</th>
                              <th>{{ __('มูลค่า') }}</th>
                              <th></th>

                            </tr>
                          </thead>
                        </table>
                        <div class="row">
                          <span>{{ __('คำอธิบาย') }}</span>
                          <ul class="list-unstyled">
                            <li><span class="badge bg-primary">CN</span> สัญญา</li>
                            <li><span class="badge bg-primary">PO</span> ใบสั่งซื้อ</li>
                            <li><span class="badge bg-primary">ER</span> ใบสั่งจ้าง</li>
                            <li><span class="badge bg-primary">OH</span> ทะเบียนจ้าง</li>
                            <li><span class="badge bg-primary">OR</span> ทะเบียนซื้อ</li>
                          </ul>
                        </div>
                      </div>
                      <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab" tabindex="0">...</div>
                    </div>
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
              { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '5%' },
              { data: 'fmis_ref_no', width: '5%'},
              // { data: 'fiscal_year' },
              // { data: 'account_name' },
              { data: 'description_output'},
              { data: 'amount_output' },
              { data: 'action', orderable: false, searchable: false },
          ]
        });

      });
    </script>
  </x-slot:javascript>
</x-app-layout>
