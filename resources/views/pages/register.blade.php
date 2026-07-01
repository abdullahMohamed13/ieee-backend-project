<x-layouts.auth title="Create Account – LuxStay">

  <div class="text-center mb-6">
    <a href="{{ url('/') }}" class="text-decoration-none">
      <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
        <img src="{{ url('logo.png') }}" alt="LuxStay" style="height: 2.5rem; width: auto;" />
        <span class="text-2xl fw-bold text-blue-900">LuxStay</span>
      </div>
    </a>
    <h2 class="fs-2 fw-bold text-gray-900 mb-2">Create Account</h2>
    <p class="text-gray-600">Sign up to start booking amazing stays</p>
  </div>

  <form action="{{ url('/register') }}" method="POST">
    @csrf

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label text-sm fw-medium text-gray-700">First Name</label>
        <div class="input-group">
          <span class="input-group-text bg-white"><x-icon name="user" class="w-5 h-5 text-gray-400" /></span>
          <input type="text" name="first_name" required placeholder="John" class="form-control" />
        </div>
      </div>
      <div class="col-md-6">
        <label class="form-label text-sm fw-medium text-gray-700">Last Name</label>
        <div class="input-group">
          <span class="input-group-text bg-white"><x-icon name="user" class="w-5 h-5 text-gray-400" /></span>
          <input type="text" name="last_name" required placeholder="Doe" class="form-control" />
        </div>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label text-sm fw-medium text-gray-700">Email Address</label>
      <div class="input-group">
        <span class="input-group-text bg-white"><x-icon name="mail" class="w-5 h-5 text-gray-400" /></span>
        <input type="email" name="email" required placeholder="you@example.com" class="form-control" />
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label text-sm fw-medium text-gray-700">Phone Number</label>
      <div class="input-group">
        <span class="input-group-text bg-white"><x-icon name="phone" class="w-5 h-5 text-gray-400" /></span>
        <input type="tel" name="phone" required placeholder="+1 (555) 123-4567" class="form-control" />
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label text-sm fw-medium text-gray-700">Password</label>
      <div class="input-group">
        <span class="input-group-text bg-white"><x-icon name="lock" class="w-5 h-5 text-gray-400" /></span>
        <input type="password" name="password" required placeholder="••••••••" class="form-control" />
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label text-sm fw-medium text-gray-700">Confirm Password</label>
      <div class="input-group">
        <span class="input-group-text bg-white"><x-icon name="lock" class="w-5 h-5 text-gray-400" /></span>
        <input type="password" name="password_confirmation" required placeholder="••••••••" class="form-control" />
      </div>
    </div>

    <div class="form-check mb-4">
      <input class="form-check-input" type="checkbox" name="terms" required id="terms" />
      <label class="form-check-label text-sm text-gray-600" for="terms">
        I agree to the
        <a href="#" class="text-blue-900 text-decoration-none">Terms of Service</a>
        and
        <a href="#" class="text-blue-900 text-decoration-none">Privacy Policy</a>
      </label>
    </div>

    <x-button type="submit" variant="primary" block>Create Account</x-button>
  </form>

  <p class="mt-4 text-center text-sm text-gray-600">
    Already have an account?
    <a href="{{ url('/login') }}" class="fw-semibold text-blue-900 text-decoration-none">Sign in</a>
  </p>

</x-layouts.auth>