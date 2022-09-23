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
                      <h4>{{ __('Vendor list') }}</h4>
                    </div>
                    <div class="col-6 text-end">
                      <x-button link="{{ route('vendor.create') }}" class="btn-success">
                        {{ __('เพิ่มข้อมูลคู่ค้า') }}
                      </x-button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                    <thead>
                      <tr>
                        <th>{{ __('ประเภท') }}</th>
                        <th>{{ __('ชื่อบริษัท/นิติบุคคล') }}</th>
                        <th>{{ __('เลขนิติบุคคล') }}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($vendors as $vendor)
                        <tr>
                          <td>{{ $vendor->juristic_type }}</td>
                          <td>{{ $vendor->juristic_name_th }}</td>
                          <td>{{ $vendor->juristic_id }}</td>
                          <td>
                            <x-button link="{{ route('vendor.show', $vendor->getHashids()) }}" class="btn btn-block btn-primary">{{ __('coreuiforms.view') }}</x-button>
                          </td>
                          <td>
                            <x-button link="{{ route('vendor.edit', $vendor->getHashids()) }}" class="btn btn-block btn-primary">{{ __('coreuiforms.edit') }}</x-button>
                          </td>
                          <td>
                            <form action="{{ route('vendor.destroy', $vendor->getHashids()) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-block btn-danger text-white">{{ __('coreuiforms.delete') }}</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div>
                    {{ $vendors->links() }}
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot:content>
</x-app-layout>