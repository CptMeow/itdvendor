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
                      <h4>{{ __('Procurement list') }}</h4>
                    </div>
                    <div class="col-6 text-end">
                      <x-button link="{{ route('procurement.create') }}" class="btn-success">
                        {{ __('เพิ่มข้อมูลจัดซื้อจัดจ้าง') }}
                      </x-button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                    <thead>
                      <tr>
                        <th>{{ __('FMIS REF') }}</th>
                        <th>{{ __('ปีงบประมาณ') }}</th>
                        <th>{{ __('วันที่จัดซื้อ') }}</th>
                        <th>{{ __('มูลค่า') }}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($procurements as $procurement)
                        <tr>
                          <td>{{ $procurement->fmis_ref_no }}</td>
                          <td>{{ $procurement->fiscal_year }}</td>
                          <td>{{ $procurement->purchase_date }}</td>
                          <td>{{ $procurement->amont }}</td>
                          <td>
                            <x-button link="{{ route('procurement.show', $procurement->procurement_id) }}" class="btn btn-block btn-primary">{{ __('coreuiforms.view') }}</x-button>
                          </td>
                          <td>
                            <x-button link="{{ route('procurement.edit', $procurement->procurement_id ) }}" class="btn btn-block btn-primary">{{ __('coreuiforms.edit') }}</x-button>
                          </td>
                          <td>
                            <form action="{{ route('procurement.destroy', $procurement->procurement_id ) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-block btn-danger">{{ __('coreuiforms.delete') }}</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot:content>
</x-app-layout>