<x-app-layout>
  <x-slot:content>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-6 col-md-5 col-lg-4 col-xl-12">
            <div class="card">
                <div class="card-header">
                  <h4>{{ __('เลขนิติบุคคล') }} {{ $vendor->juristic_id }}</h4>
                </div>
                <div class="card-body">
                    <h4>{{ __('ชื่อนิติบุคคล') }}: {{ $vendor->juristic_name_th }}</h4>
                    <h4>{{ __('Email') }}: {{ $vendor->juristic_email }}</h4>
                    <x-button link="{{ route('vendor.index') }}" class="btn-primary">
                      {{ __('coreuiforms.return') }}
                    </x-button>
                    {{ route('vendor.index') }}<br>
                    {{ route('vendor.index',[],false) }}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot:content>
</x-app-layout>