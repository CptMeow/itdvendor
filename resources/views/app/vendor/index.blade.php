<x-app-layout>
  <x-slot:content>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header ">
                  <div class="row">
                    <div class="col-6 text-start">
                      <h4>{{ __('ข้อมูลคู่ค้า') }}</h4>
                    </div>
                    <div class="col-6 text-end">
                      <x-button link="{{ route('vendor.create') }}" class="btn-success" icon="cil-plus">
                        {{ __('เพิ่มข้อมูลคู่ค้า') }}
                      </x-button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped" id="datatables">
                    <thead>
                      <tr>
                        <th>{{ __('ลำดับ') }}</th>
                        <th>{{ __('เลขนิติบุคคล') }}</th>
                        <th>{{ __('ชื่อบริษัท/นิติบุคคล') }}</th>
                        <th>{{ __('ประเภท') }}</th>
                        <th></th>
                      </tr>
                    </thead>
                  </table>
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
        var token = $('meta[name="csrf-token"]').attr('content');
        var modal = $('.modal')
        var form = $('.form')
        var btnAdd = $('.add'),
            btnSave = $('.btn-save'),
            btnUpdate = $('.btn-update');
        var table = $('#datatables').DataTable({
          autoWidth: false,
          processing: true,
          serverSide: true,
          responsive: true,
          ajax: "{{ route('vendor.index') }}",
          language: {
            processing:     "กำลังประมวลผล...",
            search:         "ค้นหา:",
            lengthMenu:    "แสดง _MENU_ รายการ",
            info:           "แสดงรายที่ _START_ ถึง _END_ ทั้งหมด _TOTAL_ รายการ",
            infoEmpty:      "แสดงรายที่ 0 ถึง 0 ทั้งหมด 0 รายการ",
            infoFiltered:   "(กรองจากทั้งหมด _MAX_ รายการ)",
            infoPostFix:    "",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "ไม่พบข้อมูล",
            emptyTable:     "ไม่พบข้อมูล",
            paginate: {
                first:      "หน้าแรก",
                previous:   "ย้อนกลับ",
                next:       "ถัดไป",
                last:       "หน้าสุดท้าย"
            },
            aria: {
                sortAscending:  ": เรียงจากน้อยไปหามาก",
                sortDescending: ": เรียงจากมากไปหาน้อย"
            }
          },
          columns: [
              { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
              { data: 'juristic_id'},
              { data: 'juristic_name_th' },
              { data: 'juristic_type', orderable: true, searchable: false },
              { data: 'action', orderable: false, searchable: false }
          ]
        });

        btnUpdate.click(function(){
            if(!confirm("Are you sure?")) return;
            var formData = form.serialize()+'&_method=PUT&_token='+token
            var updateId = form.find('input[name="id"]').val()
            $.ajax({
                type: "POST",
                url: "/" + updateId,
                data: formData,
                success: function (data) {
                    if (data.success) {
                        table.draw();
                        modal.modal('hide');
                    }
                }
             }); //end ajax
        })
            

        $(document).on('click','.btn-delete',function(){
            if(!confirm("Are you sure?")) return;

            var rowid = $(this).data('rowid')
            var el = $(this)
            if(!rowid) return;

            
            $.ajax({
                type: "POST",
                dataType: 'JSON',
                url: "{{ url("vendor") }}/" + rowid,
                data: {_method: 'delete',_token:token},
                success: function (data) {
                    if (data.success) {
                        table.row(el.parents('tr'))
                            .remove()
                            .draw();
                    }
                }
             }); //end ajax
        })
        
      });
    </script>
  </x-slot:javascript>
</x-app-layout>
