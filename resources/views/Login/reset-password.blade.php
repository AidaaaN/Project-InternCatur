<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $request->token }}">
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ $request->email }}" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>
    <div>
        <button type="submit">Reset Password</button>
    </div>
</form>