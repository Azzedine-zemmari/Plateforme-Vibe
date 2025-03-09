<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .form-container {
            background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="form-container w-full max-w-4xl rounded-xl shadow-2xl overflow-hidden flex flex-col md:flex-row">

        <!-- Left side with image and welcome text -->
        <div class="w-full md:w-1/2 p-8 md:p-12 text-white flex flex-col justify-center">
            <h1 class="text-4xl font-bold mb-4">Welcome Back!</h1>
            <p class="text-lg mb-8">Enter your credentials to access your account and dive back into your experience.</p>
            <div class="hidden md:block mt-8">
                <img src="/api/placeholder/400/320" alt="Welcome illustration" class="w-full object-cover rounded-lg" />
            </div>
        </div>

        <!-- Right side with form -->
        <div class="w-full md:w-1/2 glass-effect p-8 md:p-12">
            <div id="form-wrapper">
                <!-- Login Form -->
                <form id="login-form" action="{{route('user.submit')}}" method="POST" class="space-y-6">
                    <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Sign In</h2>

                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" placeholder="Email" name="email" required
                            class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-gray-700" />
                    </div>

                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" placeholder="Password" required
                            class="w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-gray-700" />
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-400 hover:text-gray-600" id="toggle-password">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Forgot password?</a>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign In
                    </button>


                    <div class="text-center mt-6">
                        <span class="text-sm text-gray-600">Don't have an account?</span>
                        <a href="register.html" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 ml-1">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePasswordBtn = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');

            togglePasswordBtn.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    this.querySelector('i').classList.remove('fa-eye');
                    this.querySelector('i').classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    this.querySelector('i').classList.remove('fa-eye-slash');
                    this.querySelector('i').classList.add('fa-eye');
                }
            });
        });
    </script>
</body>

</html>