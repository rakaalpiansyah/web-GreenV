<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class=" flex items-center justify-center min-h-screen bg-cover bg-center"style="background-image: url('{{ asset('user/images/loginbg.jpeg') }}');">
       <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Welcome To My Paradise</h2>
        <form id="loginForm" action="{{ route('auth.login.proses') }}" method="POST" novalidate>
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your email" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your password" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Login</button>
        </form>
        <p class="text-center text-gray-600 mt-4">New account? <a href="{{ route('auth.register') }}" class="text-blue-500 font-semibold">Sign UP</a></p>
    </div>
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Clear previous error messages
            document.querySelectorAll('.text-red-500').forEach(function(element) {
                element.classList.add('hidden');
            });
            
            let isValid = true;

            // Validate username
            const username = document.getElementById('username').value;
            if (!username) {
                document.getElementById('usernameError').classList.remove('hidden');
                isValid = false;
            }

            // Validate email
            const email = document.getElementById('email').value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!email || !emailPattern.test(email)) {
                document.getElementById('emailError').classList.remove('hidden');
                isValid = false;
            }

            // Validate password
            const password = document.getElementById('password').value;
            if (!password) {
                document.getElementById('passwordError').classList.remove('hidden');
                isValid = false;
            }

            // Validate confirm password
            const confirmPassword = document.getElementById('confirm-password').value;
            if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').classList.remove('hidden');
                isValid = false;
            }

            if (isValid) {
                // Submit the form if all validations pass
                // You can handle the form submission here, e.g., send data to the server
                alert('Form submitted successfully!');
            }
        });
    </script>
</body>
</html>