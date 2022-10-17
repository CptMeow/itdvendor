<x-app-layout>
  <x-slot:content>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-header">
                <h4> แก้ไขข้อมูลคู่ค้า </h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("vendor.store") }}" class="row g-3">
                  @csrf
                  <div class="col-md-6">
                    <label for="juristic_id" class="form-label">{{ __('เลขทะเบียนนิติบุคคล') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="juristic_id" value="{{ $vendor->juristic_id}}" name="juristic_id" maxlength="13"required autofocus>
                  </div>
                  {{-- <div class="col-md-6">
                    <label for="juristic_type" class="form-label">{{ __('รหัสประเภทสมาชิกนิติบุคคล') }}</label>
                    <input type="text" class="form-control" id="juristic_type"  value="{{ $vendor->juristic_type}}" name="juristic_type">
                  </div> --}}
                  <div class="col-md-6">
                    <label for="juristic_name_th" class="form-label">{{ __('ชื่อนิติบุคคล') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="juristic_name_th"  value="{{ $vendor->juristic_name_th}}" name="juristic_name_th" required>
                  </div>
                  {{-- <div class="col-md-6">
                    <label for="juristic_status" class="form-label">{{ __('สถานะนิติบุคคล') }}</label>
                    <input type="text" class="form-control" id="juristic_status"  value="{{ $vendor->juristic_status}}" name="juristic_status">
                  </div>
                  <div class="col-md-6">
                    <label for="standard_id" class="form-label">{{ __('รหัสหมวดหมู่ tsic') }}</label>
                    <input type="text" class="form-control" id="standard_id"  value="{{ $vendor->standard_id}}" name="standard_id" required>
                  </div> --}}
                  <div class="col-md-6">
                    <label for="register_date" class="form-label">{{ __('วันที่จดทะเบียน') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="register_date"  value="{{ $vendor->register_date}}" name="register_date" required>
                  </div>
                  <div class="col-md-6">
                    <label for="register_capital" class="form-label">{{ __('ทุนจดทะเบียน') }}</label> <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="register_capital"  value="{{ $vendor->register_capital}}" name="register_capital" min="0" required>
                  </div>
                  <div class="col-md-6">
                    <label for="address" class="form-label">{{ __('ที่ตั้งนิติบุคคล') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="address"  value="{{ $vendor->address}}" name="address" required>
                  </div>
                  <div class="col-md-6">
                    <label for="province_id" class="form-label">{{ __('จังหวัด') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="province_id"  value="{{ $vendor->juristic_id}}" name="province_id" required> --}}
                    <select name="province_id" id="province_id" class="form-select">
                      <option selected>เลือกจังหวัด</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="district_id" class="form-label">{{ __('อำเภอ/เขต') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="district_id"  value="{{ $vendor->juristic_id}}" name="district_id" required> --}}
                    <select name="district_id" id="district_id" class="form-select">
                      <option selected>เลือกอำเภอ/เขต</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="sub_district_id" class="form-label">{{ __('ตำบล/แขวง') }}</label> <span class="text-danger">*</span>
                    {{-- <input type="text" class="form-control" id="sub_district_id"  value="{{ $vendor->juristic_id}}" name="sub_district_id" required> --}}
                    <select name="sub_district_id" id="sub_district_id" class="form-select">
                      <option selected>เลือกตำบล/แขวง</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="postal_code" class="form-label">{{ __('รหัสไปรษณีย์') }}</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="postal_code"  value="{{ $vendor->postal_code}}" name="postal_code" readonly>
                  </div>
                  <div class="col-md-6">
                    <label for="juristic_phone" class="form-label">{{ __('หมายเลขโทรศัพท์') }}</label>
                    <input type="text" class="form-control" id="juristic_phone"  value="{{ $vendor->juristic_phone}}" name="juristic_phone" required>
                  </div>
                  <div class="col-md-6">
                    <label for="mobile_number" class="form-label">{{ __('หมายเลขโทรศัพท์มือถือ') }}</label>
                    <input type="text" class="form-control" id="mobile_number"  value="{{ $vendor->mobile_number}}" name="mobile_number">
                  </div>
                  <div class="col-md-6">
                    <label for="fex_number" class="form-label">{{ __('หมายเลขโทรสาร') }}</label>
                    <input type="text" class="form-control" id="fex_number"  value="{{ $vendor->fex_number}}" name="fex_number">
                  </div>
                  <div class="col-md-6">
                    <label for="juristic_website" class="form-label">{{ __('ที่อยู่เว็บไซต์') }}</label>
                    <input type="text" class="form-control" id="juristic_website"  value="{{ $vendor->juristic_website}}" name="juristic_website">
                  </div>
                  <div class="col-md-6">
                    <label for="facebook_url" class="form-label">{{ __('Facebook') }}</label>
                    <input type="text" class="form-control" id="facebook_url"  value="{{ $vendor->facebook_url}}" name="facebook_url">
                  </div>
                  <div class="col-md-6">
                    <label for="line_id" class="form-label">{{ __('Line ID') }}</label>
                    <input type="text" class="form-control" id="line_id"  value="{{ $vendor->line_id}}" name="line_id">
                  </div>
                  <div class="col-md-6">
                    <label for="juristic_email" class="form-label">{{ __('E-mail') }}</label>
                    <input type="email" class="form-control" id="juristic_email"  value="{{ $vendor->juristic_email}}" name="juristic_email">
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
  <x-slot:javascript>
    <script>
      $(function() {

        $("#juristic_id").on("keyup", function(){
          var val = $(this).val();
          if(val.length == 13) {
            $.getJSON( "{{url("api/vendor/checkexist")}}/" + val, function( data ) {
              var items = [];

              console.log(data);

              // $.each( data, function( key, val ) {
              //   console.log(key);
              //   console.log(val);
              // });

            });
          console.log(val.length )
          }
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
