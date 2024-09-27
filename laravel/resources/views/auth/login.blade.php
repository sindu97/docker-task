<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="{{ asset('/images/logo.svg') }}" />
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                  @csrf
                <div class="form-group">
                  <x-input-label for="email" :value="__('Email')" />
                  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
                <div class="form-group">
                  <x-input-label for="password" :value="__('Password')" />
                  <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />
                                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mt-3 d-grid gap-2">
                  <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" >SIGN IN</button>
                  </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account?
                  <a href="{{ route('register') }}" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</x-guest-layout>
