{{-- <x-layout title="Register">
    <h2>Register</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" id="id" value="{{ old('id') }}" required maxlength="10">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required maxlength="100">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" value="{{ old('role') }}" required maxlength="20">
        </div>

        <button type="submit">Register</button>

        <p class="form-group">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </p>
    </form>
</x-layout> --}}
