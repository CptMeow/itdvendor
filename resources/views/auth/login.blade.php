<x-guest-layout>
  <div class="row justify-content-center">
    <div class="col-lg-4">
      <div class="card-group d-block d-md-flex row">
        <div class="card col-md-7 p-4 mb-0">
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <h1>Login</h1>
              <p class="text-medium-emphasis">Sign In to your account</p>
              <div class="input-group mb-3"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/sprites/free.svg#cil-user"></use>
                  </svg></span>
                <input class="form-control" type="text" placeholder="Username" name="email" value="{{ old('email') }}" autofocus>
              </div>
              <div class="input-group mb-4"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/sprites/free.svg#cil-lock-locked">
                    </use>
                  </svg></span>
                <input class="form-control" type="password" name="password" placeholder="Password">
              </div>
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary px-4 text-white" type="button">Login</button>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-link px-0" type="button">Forgot password?</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card col-md-5 text-white bg-primary py-5 d-none">
          <div class="card-body text-center">
            <div>
              <h2>Sign up</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <button class="btn btn-lg btn-outline-light mt-3" type="button">Register
                Now!</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
