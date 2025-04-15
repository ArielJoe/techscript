<form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to log out?');">
    @csrf
    <button type="submit" class="logout-button">Logout</button>
</form>
