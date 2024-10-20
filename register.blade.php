<form action="{{ route('users.store') }}" method="POST">
    @csrf <!-- Laravel CSRF protection -->
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" name="password_confirmation" required>
    
    <button type="submit">Register</button>
</form>
