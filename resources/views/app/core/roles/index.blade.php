<x-app-layout>
  <x-slot:content>
    <div class="container-fluid">
      <div class="fade-in">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>{{ __('coreuiforms.roles.menu_roles') }}</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <a class="btn btn-lg btn-primary" href="{{ route('roles.create') }}">{{ __('coreuiforms.roles.add_new_role') }}</a>
                </div>
                <br>
                <table class="table table-striped table-bordered datatable">
                  <thead>
                    <tr>
                      <th>{{ __('coreuiforms.roles.name') }}</th>
                      <th>{{ __('coreuiforms.roles.hierarchy') }}</th>
                      <th>{{ __('coreuiforms.roles.created_at') }}</th>
                      <th>{{ __('coreuiforms.roles.updated_at') }}</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $role)
                      <tr>
                        <td>
                          {{ $role->name }}
                        </td>
                        <td>
                          {{ $role->hierarchy }}
                        </td>
                        <td>
                          {{ $role->created_at }}
                        </td>
                        <td>
                          {{ $role->updated_at }}
                        </td>
                        <td>
                          <a class="btn btn-success" href="{{ route('roles.up', ['id' => $role->id]) }}">
                            <svg class="icon">
                              <use xlink:href="{{asset("vendors/@coreui/icons/sprites/free.svg#cil-arrow-thick-top")}}"></use>
                            </svg>
                          </a>
                        </td>
                        <td>
                          <a class="btn btn-success" href="{{ route('roles.down', ['id' => $role->id]) }}">
                            <svg class="icon">
                                <use xlink:href="{{asset("vendors/@coreui/icons/sprites/free.svg#cil-arrow-thick-bottom")}}"></use>
                            </svg>
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary">{{ __('coreuiforms.view') }}</a>
                        </td>
                        <td>
                          <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">{{ __('coreuiforms.edit') }}</a>
                        </td>
                        <td>
                          <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">{{ __('coreuiforms.delete') }}</button>
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
