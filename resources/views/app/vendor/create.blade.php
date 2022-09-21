<x-app-layout>
  <x-slot:content>
    <div class="container-fluid">
      <div class="animated fadeIn">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

                @foreach($errors->all() as $error)
                    {{ $error }}<br/>
                @endforeach
            </div>
        @endif

        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-header">
                <h4> {{__('เพิ่มข้อมูลผู้ค้า')}} </h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("vendor.store") }}" class="row g-3">
                  @csrf
                  <div class="col-md-6">
                    <label for="juristic_id" class="form-label">{{ __('เลขทะเบียนนิติบุคคล') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="juristic_id" name="juristic_id" maxlength="13" pattern="[0-9]{13}" required autofocus>
                    <div class="invalid-feedback">
                      {{__("เลขทะเบียนนิติบุคคลซ้ำ")}}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="juristic_type" class="form-label">{{ __('ประเภทจดทะเบียน') }}</label> <span class="text-danger">*</span>
                    <div class="pt-2">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input juristic-type" type="radio" id="juristic_type_1" value="1" name="juristic_type" required>
                        <label class="form-check-label" for="juristic_type_1">บุคคลธรรมดา</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input juristic-type" type="radio" id="juristic_type_2" value="2" name="juristic_type" required>
                        <label class="form-check-label" for="juristic_type_2">นิติบุคคล</label>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="col-md-6">
                    <label for="juristic_type" class="form-label">{{ __('รหัสประเภทสมาชิกนิติบุคคล') }}</label>
                    <input type="text" class="form-control" id="juristic_type" name="juristic_type">
                  </div> --}}
                  <div class="col-md-6">
                    <label for="juristic_name_th" class="form-label">{{ __('ชื่อนิติบุคคล') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="juristic_name_th" name="juristic_name_th" required>
                  </div>
                  {{-- <div class="col-md-6">
                    <label for="juristic_status" class="form-label">{{ __('สถานะนิติบุคคล') }}</label>
                    <input type="text" class="form-control" id="juristic_status" name="juristic_status">
                  </div> --}}
                  {{-- <div class="col-md-6">
                    <label for="standard_id" class="form-label">{{ __('รหัสหมวดหมู่ tsic') }}</label>
                    <input type="text" class="form-control" id="standard_id" name="standard_id" required>
                  </div> --}}
                  <div class="col-md-6">
                    <label for="register_date" class="form-label">{{ __('วันที่จดทะเบียน') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="register_date" name="register_date" required> --}}
                    <div data-coreui-toggle="date-picker" id="register_date"></div>
                  </div>
                  <div class="col-md-6">
                    <label for="register_capital" class="form-label">{{ __('ทุนจดทะเบียน') }}</label> <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="register_capital" name="register_capital" min="0" required>
                  </div>
                  <div class="col-md-12">
                    <label for="address" class="form-label">{{ __('ที่ตั้งนิติบุคคล') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="address" name="address" required>
                  </div>
                  <div class="col-md-6">
                    <label for="province_id" class="form-label">{{ __('จังหวัด') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="province_id" name="province_id" required> --}}
                    <select name="province_id" id="province_id" class="form-select select2-component">
                      <option selected>เลือกจังหวัด</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="district_id" class="form-label">{{ __('อำเภอ/เขต') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="district_id" name="district_id" required> --}}
                    <select name="district_id" id="district_id" class="form-select select2-component">
                      <option selected>เลือกอำเภอ/เขต</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="sub_district_id" class="form-label">{{ __('ตำบล/แขวง') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="sub_district_id" name="sub_district_id" required> --}}
                    <select name="sub_district_id" id="sub_district_id" class="form-select select2-component">
                      <option selected>เลือกตำบล/แขวง</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="postal_code" class="form-label">{{ __('รหัสไปรษณีย์') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" readonly>
                  </div>
                  <div class="col-md-6">
                    <label for="juristic_phone" class="form-label">{{ __('หมายเลขโทรศัพท์') }}</label>
                    <input type="text" class="form-control" id="juristic_phone" name="juristic_phone" required>
                  </div>
                  <div class="col-md-6">
                    <label for="mobile_number" class="form-label">{{ __('หมายเลขโทรศัพท์มือถือ') }}</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number">
                  </div>
                  <div class="col-md-6">
                    <label for="fex_number" class="form-label">{{ __('หมายเลขโทรสาร') }}</label>
                    <input type="text" class="form-control" id="fex_number" name="fex_number">
                  </div>
                  <div class="col-md-6">
                    <label for="juristic_website" class="form-label">{{ __('ที่อยู่เว็บไซต์') }}</label>
                    <input type="text" class="form-control" id="juristic_website" name="juristic_website">
                  </div>
                  <div class="col-md-6">
                    <label for="facebook_url" class="form-label">{{ __('Facebook') }}</label>
                    <input type="text" class="form-control" id="facebook_url" name="facebook_url">
                  </div>
                  <div class="col-md-6">
                    <label for="line_id" class="form-label">{{ __('Line ID') }}</label>
                    <input type="text" class="form-control" id="line_id" name="line_id">
                  </div>
                  <div class="col-md-6">
                    <label for="juristic_email" class="form-label">{{ __('E-mail') }}</label>
                    <input type="email" class="form-control" id="juristic_email" name="juristic_email">
                  </div>

                  <x-button class="btn-success" type="submit">{{ __('coreuiforms.save') }}</x-button>
                  <x-button link="{{ route('vendor.index') }}" class="btn-light text-black">{{ __('coreuiforms.return') }}</x-button>
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
      function CheckJuristicType(type) {
        if(type == 1) {
            $("input[name='date-picker-register_date']").prop('disabled',true);
            $("#register_capital").prop('disabled',true);
          }
          else {
            $("input[name='date-picker-register_date']").prop('disabled',false);
            $("#register_capital").prop('disabled',false);
          }
      }

      $(function() {
        CheckJuristicType($(".juristic-type:checked").val());

        $("#juristic_id").on("keyup", function(){
          var val = $(this).val();
          if(val.length == 13) {
            $.getJSON( "{{url("api/vendor/checkexist")}}/" + val, function( data ) {
              console.log(data);
              if(data>=1) {
                alert('juristic dup');
              }
            });
          }
        });

        $('.select2-component').select2();
        
        $(".juristic-type").on("change", function(){
          var val = $(this).val();
          CheckJuristicType(val);
        });
      
        $.getJSON( "{{url("api/address/province")}}", function( data ) {
          var items = [];

          $.each( data, function( key, val ) {
            // console.log(key);
            // console.log(val.id, val.name_th);
            items.push( "<option value='" + val.id + "'>" + val.name_th + "</option>" );
          });

          $( "#province_id" ).append(items.join( "" ))
        });

        $("#province_id" ).change(function(){
          var val = $(this).val();
          if(val!="เลือกจังหวัด") {
            $( "#district_id" ).html("<option >เลือกอำเภอ/เขต</option>");
            $( "#sub_district_id" ).html("<option >เลือกตำบล/แขวง</option>");
            $.getJSON( "{{url("api/address/amphures")}}/" + val, function( data ) {
              var items = [];
              
              $.each( data, function( key, val ) {
                items.push( "<option value='" + val.id + "'>" + val.name_th + "</option>" );
              });

              $( "#district_id" ).append(items.join( "" ))
            });
          }
        });
        

        $("#district_id" ).change(function(){
          var val = $(this).val();
          if(val!="เลือกอำเภอ/เขต") {
            $( "#sub_district_id" ).html("<option >เลือกตำบล/แขวง</option>");
            $.getJSON( "{{url("api/address/district")}}/" + val, function( data ) {
              var items = [];
              
              $.each( data, function( key, val ) {
                items.push( "<option value='" + val.id + "'>" + val.name_th + "</option>" );
              });

              $( "#sub_district_id" ).append(items.join( "" ))
            });
          }
        });

        $("#sub_district_id" ).change(function(){
          var val = $(this).val();
          if(val!="เลือกอำเภอ/เขต") {
            $( "#postal_code" ).val(val);
          }
        });
      });
      
    </script>
  </x-slot:javascript>
</x-app-layout>
