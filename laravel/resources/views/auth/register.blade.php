<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
              <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                  <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                      <div class="brand-logo">
                        <img src="{{ asset('/images/logo.svg') }}">
                      </div>
                      <h4>New here?</h4>
                      <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <div class="form-group">
                          <x-input-label for="name" :value="__('Name')" />
                          <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                          <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group">
                          <x-input-label for="email" :value="__('Email')" />
                          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                          <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                          <x-input-label for="password" :value="__('Password')" />
                          <x-text-input id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required autocomplete="new-password" />
                          <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group">
                          <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                          <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password" />

                          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="mt-3 d-grid gap-2">
                            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" >SIGN UP</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ url('login')}}" class="text-primary">Login</a>
                        </div>

                    </div>
                  </div>
                </div>
              </div>
              <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
          </div>
    </form>
  </x-guest-layout>
