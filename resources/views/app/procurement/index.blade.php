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
                        <th>{{ __('รายละเอียด') }}</th>
                        {{-- <th>{{ __('ปีงบประมาณ') }}</th> --}}
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
                          <td><span class="badge bg-primary">{{ $procurement->fmis_ref_no }}</span></td>
                          <td>
                            <div>{{ $procurement->description }}</div>
                            <span class="badge bg-info">{{ $procurement->fiscal_year }}</span>
                            <span class="badge bg-success">{{ Helper::Department($procurement->temp_department_id) }}</span>
                          </td>
                          {{-- <td>{{ $procurement->fiscal_year }}</td> --}}
                          <td>{{ date_format($procurement->purchase_date, "d/m/Y") }}</td>
                          <td>{{ number_format($procurement->amount, 2) }}</td>
                          <td>
                            <x-button link="{{ route('procurement.show', $procurement->getHashids()) }}" class="btn btn-block btn-primary">{{ __('coreuiforms.view') }}</x-button>
                          </td>
                          <td>
                            <x-button link="{{ route('procurement.edit', $procurement->getHashids() ) }}" class="btn btn-block btn-primary">{{ __('coreuiforms.edit') }}</x-button>
                          </td>
                          <td>
                            <form action="{{ route('procurement.destroy', $procurement->getHashids() ) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-block btn-danger">{{ __('coreuiforms.delete') }}</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div>
                    {{ $procurements->links() }}
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot:content>
</x-app-layout>