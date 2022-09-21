<x-app-layout>
  <x-slot:content>
    <div class="container-fluid">
      <div class="animated fadeIn">
        @if($errors->any()){{ implode('', $errors->all('<div>:message</div>')) }}@endif
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-header">
                <h4> {{ __('เพิ่มข้อมูลจัดซื้อจัดจ้าง') }} </h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("procurement.store") }}" class="row g-3">
                  @csrf
                  <div class="col-md-12">
                    <label for="vendor_id" class="form-label">{{ __('เลขนิติบุคคล') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="vendor_id" name="vendor_id" maxlength="30" required autofocus> --}}
                    <select class="form-select" id="vendor_id" name="vendor_id" required>
                    </select>
                    <div class="invalid-feedback">
                      {{__("vendor_id")}}
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="department_id" class="form-label">{{ __('หน่วยงานที่จัดซื้อ') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="department_id" name="department_id" maxlength="30" required autofocus> --}}
                    <select class="form-select select2-component" id="department_id" name="department_id" required>
                      <option value="" selected>- เลือกหน่วยงาน -</option>
                      @foreach(Helper::Department() as $key => $department)
                        <option value="{{ $key }}">{{ $department }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback">
                      {{__("department_id")}}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="fmis_ref_no" class="form-label">{{ __('รหัสใบสั่งซื้อ (FMIS Order number)') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="fmis_ref_no" name="fmis_ref_no" maxlength="30" required autofocus>
                    <div class="invalid-feedback">
                      {{__("fmis_ref_no")}}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="fiscal_year" class="form-label">{{ __('ปีงบประมาณ') }}</label>
                    <input type="text" class="form-control" id="fiscal_year" name="fiscal_year" maxlength="4" pattern="[0-9]{4}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="purchase_date" class="form-label">{{ __('วันที่จัดซื้อ') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="purchase_date" name="purchase_date" required> --}}
                    <div data-coreui-toggle="date-picker" id="purchase_date"></div>
                  </div>
                  <div class="col-md-6">
                    <label for="chart_of_account_id" class="form-label">{{ __('ผังบัญชี') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="number" class="form-control" id="chart_of_account_id" name="chart_of_account_id" required> --}}
                    <select name="chart_of_account_id" id="chart_of_account_id" class="form-select select2-component">
                      <option value="" selected>- เลือกผังบัญชี -</option>
                      @foreach(Helper::ChartOfAccounts() as $key => $chart_of_account)
                        <option value="{{ $key }}">{{ "[".$key."] ".$chart_of_account }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="amount" class="form-label">{{ __('มูลค่า') }}</label> <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="amount" name="amount" min="0" required>
                  </div>
                  <div class="col-md-12">
                    <label for="description" class="form-label">{{ __('รายละเอียดการจัดซื้อ') }}</label>
                    {{-- <input type="email" class="form-control" id="description" name="description"> --}}
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                  </div>
                  <x-button class="btn-success" type="submit">{{ __('coreuiforms.save') }}</x-button>
                  <x-button link="{{ route('procurement.index') }}" class="btn-light text-black">{{ __('coreuiforms.return') }}</x-button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot:content>
  <x-slot:css>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  </x-slot:css>
  <x-slot:javascript>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

      function formatState (state) {
        if (!state.id) {
          return state.text;
        }
        var baseUrl = "{{ url("/api/vendor/lists") }}";
        var $state = $(
          '<span>' + state.text + '</span>'
        );
        console.log($state);
        return $state;
      };
      $(function() {
        $('#vendor_id').select2({
          ajax: {
            url: '{{ url("/api/vendor/lists") }}',
            dataType: 'json'
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
          }
        });
        $('.select2-component').select2();
        
      });

      // $(function() {
      //   $("#juristic_id").on("keyup", function(){
      //     var val = $(this).val();
      //     if(val.length == 13) {
      //       $.getJSON( "{{url("api/vendor/checkexist")}}/" + val, function( data ) {
      //         console.log(data);
      //         if(data>=1) {
      //           alert('juristic dup');
      //         }
      //       });
      //     }
      //   });
      
      //   $.getJSON( "{{url("api/address/province")}}", function( data ) {
      //     var items = [];

      //     $.each( data, function( key, val ) {
      //       // console.log(key);
      //       // console.log(val.id, val.name_th);
      //       items.push( "<option value='" + val.id + "'>" + val.name_th + "</option>" );
      //     });

      //     $( "#province_id" ).append(items.join( "" ))
      //   });

      //   $("#province_id" ).change(function(){
      //     var val = $(this).val();
      //     if(val!="เลือกจังหวัด") {
      //       $( "#district_id" ).html("<option >เลือกอำเภอ/เขต</option>");
      //       $( "#sub_district_id" ).html("<option >เลือกตำบล/แขวง</option>");
      //       $.getJSON( "{{url("api/address/amphures")}}/" + val, function( data ) {
      //         var items = [];
              
      //         $.each( data, function( key, val ) {
      //           items.push( "<option value='" + val.id + "'>" + val.name_th + "</option>" );
      //         });

      //         $( "#district_id" ).append(items.join( "" ))
      //       });
      //     }
      //   });
        

      //   $("#district_id" ).change(function(){
      //     var val = $(this).val();
      //     if(val!="เลือกอำเภอ/เขต") {
      //       $( "#sub_district_id" ).html("<option >เลือกตำบล/แขวง</option>");
      //       $.getJSON( "{{url("api/address/district")}}/" + val, function( data ) {
      //         var items = [];
              
      //         $.each( data, function( key, val ) {
      //           items.push( "<option value='" + val.id + "'>" + val.name_th + "</option>" );
      //         });

      //         $( "#sub_district_id" ).append(items.join( "" ))
      //       });
      //     }
      //   });

      //   $("#sub_district_id" ).change(function(){
      //     var val = $(this).val();
      //     if(val!="เลือกอำเภอ/เขต") {
      //       $( "#postal_code" ).val(val);
      //     }
      //   });
      // });
      
    </script>
  </x-slot:javascript>
</x-app-layout>
