<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetSafe - Login | Register</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#0A0F1E',
                        electricBlue: '#1A73E8',
                        cyanBlue: '#00D4FF',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .particles-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            background: rgba(0, 212, 255, 0.3);
            border-radius: 50%;
            animation: floatParticle linear infinite;
        }

        @keyframes floatParticle {
            0% { transform: translateY(100vh) scale(0); opacity: 0; }
            50% { opacity: 0.5; }
            100% { transform: translateY(-10vh) scale(1); opacity: 0; }
        }

        .float-anim {
            animation: float 6s ease-in-out infinite;
        }
        .float-anim-delay-1 { animation-delay: 0s; }
        .float-anim-delay-2 { animation-delay: 2s; }
        .float-anim-delay-3 { animation-delay: 4s; }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .floating-input:placeholder-shown + .floating-label {
            transform: translateY(0) scale(1);
            color: #9CA3AF;
        }
        .floating-input:focus + .floating-label,
        .floating-input:not(:placeholder-shown) + .floating-label {
            transform: translateY(-24px) scale(0.85);
            color: #1A73E8;
        }

        .custom-checkbox input:checked + div {
            background-color: #1A73E8;
            border-color: #1A73E8;
        }
        .custom-checkbox input:checked + div svg {
            display: block;
        }

        .tab-indicator {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .city-path {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: drawLine 3s ease-out forwards 0.5s;
        }

        @keyframes drawLine {
            to { stroke-dashoffset: 0; }
        }

        .form-container {
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        .form-hidden {
            display: none;
            opacity: 0;
            transform: translateX(20px);
        }
        .form-visible {
            display: block;
            opacity: 1;
            transform: translateX(0);
            animation: fadeInRight 0.4s ease-out;
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(10px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .strength-weak { background-color: #EF4444; width: 33%; }
        .strength-medium { background-color: #F59E0B; width: 66%; }
        .strength-strong { background-color: #10B981; width: 100%; }
    </style>
</head>
<body class="bg-white font-sans antialiased h-screen overflow-hidden flex">

    <!-- LEFT PANEL -->
    <div class="w-1/2 h-full bg-navy relative hidden md:flex flex-col justify-between p-12 overflow-hidden animate__animated animate__slideInLeft">
        
        <div class="particles-container" id="particles"></div>

        <div class="relative z-10 flex items-center gap-3 animate__animated animate__fadeInDown">
            <div class="w-10 h-10 bg-gradient-to-br from-electricBlue to-cyanBlue rounded-lg flex items-center justify-center shadow-lg shadow-blue-500/30">
                <i class="fa-solid fa-shield-halved text-white text-xl"></i>
            </div>
            <span class="text-white font-heading font-bold text-2xl tracking-tight">StreetSafe</span>
        </div>

        <div class="relative z-10 text-center mt-10">
            <h1 class="text-4xl md:text-5xl font-heading font-bold text-white leading-tight mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                Protecting Every Street,<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyanBlue to-electricBlue">Every Citizen</span>
            </h1>
            <p class="text-gray-400 text-lg animate__animated animate__fadeInUp animate__delay-1s">
                Join thousands of citizens making Pakistan safer
            </p>

            <div class="absolute top-0 left-10 float-anim float-anim-delay-1 text-cyanBlue/20 text-6xl">
                <i class="fa-solid fa-shield-cat"></i>
            </div>
            <div class="absolute top-20 right-10 float-anim float-anim-delay-2 text-electricBlue/20 text-5xl">
                <i class="fa-solid fa-video"></i>
            </div>
            <div class="absolute bottom-20 left-20 float-anim float-anim-delay-3 text-cyanBlue/10 text-7xl">
                <i class="fa-solid fa-user-shield"></i>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full h-48 z-0 opacity-40">
            <svg viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                <path fill="none" stroke="#00D4FF" stroke-width="2" class="city-path" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,261.3C960,256,1056,224,1152,197.3C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                <path fill="#0A1628" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,261.3C960,256,1056,224,1152,197.3C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>

        <div class="relative z-10 flex justify-center gap-6 pb-8 animate__animated animate__fadeInUp animate__delay-1s">
            <div class="glass-card px-4 py-2 rounded-lg text-center">
                <span class="block text-cyanBlue font-bold text-lg">50K+</span>
                <span class="text-gray-400 text-xs uppercase tracking-wide">Users</span>
            </div>
            <div class="glass-card px-4 py-2 rounded-lg text-center">
                <span class="block text-cyanBlue font-bold text-lg">38</span>
                <span class="text-gray-400 text-xs uppercase tracking-wide">Cities</span>
            </div>
            <div class="glass-card px-4 py-2 rounded-lg text-center">
                <span class="block text-cyanBlue font-bold text-lg">94%</span>
                <span class="text-gray-400 text-xs uppercase tracking-wide">Resolved</span>
            </div>
        </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="w-full md:w-1/2 h-full bg-white relative flex flex-col items-center justify-center p-8 animate__animated animate__slideInRight">
        
        <div class="absolute bottom-6 right-6 bg-gray-50 border border-gray-200 px-4 py-2 rounded-full flex items-center gap-2 shadow-sm animate__animated animate__pulse animate__infinite">
            <i class="fa-solid fa-lock text-green-500 text-xs"></i>
            <span class="text-xs font-medium text-gray-600">Secure & Anonymous</span>
        </div>

        <div class="w-full max-w-md mb-10">
            <div class="flex relative">
                <button onclick="switchTab('login')" id="tab-login" class="flex-1 pb-3 text-center font-heading font-semibold text-lg text-navy transition-colors">
                    Login
                </button>
                <button onclick="switchTab('register')" id="tab-register" class="flex-1 pb-3 text-center font-heading font-semibold text-lg text-gray-400 transition-colors">
                    Register
                </button>
                <div id="tab-indicator" class="tab-indicator absolute bottom-0 left-0 w-1/2 h-1 bg-electricBlue rounded-full"></div>
            </div>
        </div>

        <!-- LOGIN FORM -->
        <div id="form-login" class="form-container form-visible w-full max-w-md">
            <div class="text-center mb-8">
                <h2 class="font-heading font-bold text-3xl text-navy mb-2">Welcome Back</h2>
                <p class="text-gray-500">Sign in to your StreetSafe account</p>
            </div>

            <form onsubmit="handleLogin(event)" class="space-y-6">
                <div class="relative">
                    <input type="email" id="login-email" class="floating-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-electricBlue focus:border-transparent transition-all peer" placeholder=" " required>
                    <label for="login-email" class="floating-label absolute left-4 top-3 text-gray-500 transition-all pointer-events-none bg-white px-1">Email Address</label>
                </div>

                <div class="relative">
                    <input type="password" id="login-password" class="floating-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-electricBlue focus:border-transparent transition-all peer pr-12" placeholder=" " required>
                    <label for="login-password" class="floating-label absolute left-4 top-3 text-gray-500 transition-all pointer-events-none bg-white px-1">Password</label>
                    <button type="button" onclick="togglePassword('login-password', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-navy">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>

                <div class="flex items-center justify-between">
                    <label class="custom-checkbox flex items-center cursor-pointer select-none">
                        <input type="checkbox" class="hidden">
                        <div class="w-5 h-5 border-2 border-gray-300 rounded flex items-center justify-center transition-colors mr-2">
                            <svg class="w-3 h-3 text-white hidden pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="text-sm text-gray-600">Remember Me</span>
                    </label>
                    <a href="#" class="text-sm font-medium text-electricBlue hover:underline">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full bg-electricBlue hover:bg-blue-700 text-white font-heading font-semibold py-3 rounded-lg shadow-lg shadow-blue-500/30 transform hover:scale-[1.02] transition-all duration-200 flex justify-center items-center group">
                    <span class="btn-text">Login</span>
                    <svg class="animate-spin h-5 w-5 text-white btn-spinner hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </form>

            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">or continue with</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    <i class="fa-brands fa-google text-red-500 mr-2"></i>
                    <span class="text-sm font-medium text-gray-600">Google</span>
                </button>
                <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    <i class="fa-brands fa-facebook text-blue-600 mr-2"></i>
                    <span class="text-sm font-medium text-gray-600">Facebook</span>
                </button>
            </div>

            <p class="mt-8 text-center text-sm text-gray-600">
                Don't have an account? 
                <button onclick="switchTab('register')" class="font-medium text-electricBlue hover:underline">Register</button>
            </p>
        </div>

        <!-- REGISTER FORM -->
        <div id="form-register" class="form-container form-hidden w-full max-w-md">
            <div class="text-center mb-6">
                <h2 class="font-heading font-bold text-3xl text-navy mb-2">Create Account</h2>
                <p class="text-gray-500">Join StreetSafe and help make your city safer</p>
            </div>

            <form onsubmit="handleRegister(event)" class="space-y-4">
                <div class="relative">
                    <input type="text" id="reg-name" class="floating-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-electricBlue focus:border-transparent transition-all peer" placeholder=" " required>
                    <label for="reg-name" class="floating-label absolute left-4 top-3 text-gray-500 transition-all pointer-events-none bg-white px-1">Full Name</label>
                </div>

                <div class="relative">
                    <input type="text" id="reg-cnic" maxlength="15" class="floating-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-electricBlue focus:border-transparent transition-all peer font-mono" placeholder=" " required>
                    <label for="reg-cnic" class="floating-label absolute left-4 top-3 text-gray-500 transition-all pointer-events-none bg-white px-1">CNIC Number</label>
                </div>

                <div class="relative">
                    <input type="email" id="reg-email" class="floating-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-electricBlue focus:border-transparent transition-all peer" placeholder=" " required>
                    <label for="reg-email" class="floating-label absolute left-4 top-3 text-gray-500 transition-all pointer-events-none bg-white px-1">Email Address</label>
                </div>

                <div class="relative">
                    <input type="text" id="reg-phone" maxlength="12" class="floating-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-electricBlue focus:border-transparent transition-all peer font-mono" placeholder=" " required>
                    <label for="reg-phone" class="floating-label absolute left-4 top-3 text-gray-500 transition-all pointer-events-none bg-white px-1">Phone Number</label>
                </div>

                <div class="relative">
                    <select id="reg-city" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-electricBlue focus:border-transparent transition-all appearance-none bg-white text-gray-500" required>
                        <option value="" disabled selected>Select City</option>
                        <option value="karachi">Karachi</option>
                        <option value="lahore">Lahore</option>
                        <option value="islamabad">Islamabad</option>
                        <option value="rawalpindi">Rawalpindi</option>
                        <option value="peshawar">Peshawar</option>
                        <option value="quetta">Quetta</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <div class="relative">
                    <input type="password" id="reg-password" class="floating-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-electricBlue focus:border-transparent transition-all peer pr-10" placeholder=" " required oninput="checkStrength()">
                    <label for="reg-password" class="floating-label absolute left-4 top-3 text-gray-500 transition-all pointer-events-none bg-white px-1">Password</label>
                </div>
                <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                    <div id="strength-bar" class="h-full w-0 transition-all duration-300"></div>
                </div>
                <p id="strength-text" class="text-xs text-gray-400 h-4"></p>

                <div class="relative">
                    <input type="password" id="reg-confirm" class="floating-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-electricBlue focus:border-transparent transition-all peer pr-10" placeholder=" " required oninput="checkMatch()">
                    <label for="reg-confirm" class="floating-label absolute left-4 top-3 text-gray-500 transition-all pointer-events-none bg-white px-1">Confirm Password</label>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 hidden" id="match-icon">
                        <i class="fa-solid fa-circle-check text-green-500"></i>
                    </div>
                </div>

                <label class="custom-checkbox flex items-start cursor-pointer select-none mt-2">
                    <input type="checkbox" class="hidden mt-1" required>
                    <div class="w-5 h-5 border-2 border-gray-300 rounded flex items-center justify-center transition-colors mr-2 shrink-0">
                        <svg class="w-3 h-3 text-white hidden pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="text-sm text-gray-600 leading-tight">I agree to <a href="#" class="text-electricBlue hover:underline">Privacy Policy</a> and <a href="#" class="text-electricBlue hover:underline">Terms of Service</a></span>
                </label>

                <div class="flex items-center gap-2 bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <i class="fa-solid fa-lock text-gray-400 text-xs"></i>
                    <p class="text-xs text-gray-500">Your identity is always protected. We never share personal data.</p>
                </div>

                <button type="submit" class="w-full bg-electricBlue hover:bg-blue-700 text-white font-heading font-semibold py-3 rounded-lg shadow-lg shadow-blue-500/30 transform hover:scale-[1.02] transition-all duration-200 flex justify-center items-center group mt-4">
                    <span class="btn-text">Create Account</span>
                    <svg class="animate-spin h-5 w-5 text-white btn-spinner hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600">
                Already have an account? 
                <button onclick="switchTab('login')" class="font-medium text-electricBlue hover:underline">Login</button>
            </p>
        </div>
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({ duration: 800, once: true });

        // Generate Particles
        const particlesContainer = document.getElementById('particles');
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            const size = Math.random() * 5 + 2;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.animationDuration = `${Math.random() * 10 + 5}s`;
            particle.style.animationDelay = `${Math.random() * 5}s`;
            particlesContainer.appendChild(particle);
        }

        // Tab Switching
        function switchTab(tab) {
            const loginForm = document.getElementById('form-login');
            const registerForm = document.getElementById('form-register');
            const indicator = document.getElementById('tab-indicator');
            const loginTabBtn = document.getElementById('tab-login');
            const registerTabBtn = document.getElementById('tab-register');

            if (tab === 'login') {
                indicator.style.transform = 'translateX(0)';
                loginTabBtn.classList.replace('text-gray-400', 'text-navy');
                registerTabBtn.classList.replace('text-navy', 'text-gray-400');
                registerForm.style.opacity = '0';
                setTimeout(() => {
                    registerForm.classList.add('form-hidden');
                    registerForm.classList.remove('form-visible');
                    loginForm.classList.remove('form-hidden');
                    loginForm.classList.add('form-visible');
                    requestAnimationFrame(() => { loginForm.style.opacity = '1'; });
                }, 300);
            } else {
                indicator.style.transform = 'translateX(100%)';
                registerTabBtn.classList.replace('text-gray-400', 'text-navy');
                loginTabBtn.classList.replace('text-navy', 'text-gray-400');
                loginForm.style.opacity = '0';
                setTimeout(() => {
                    loginForm.classList.add('form-hidden');
                    loginForm.classList.remove('form-visible');
                    registerForm.classList.remove('form-hidden');
                    registerForm.classList.add('form-visible');
                    requestAnimationFrame(() => { registerForm.style.opacity = '1'; });
                }, 300);
            }
        }

        // Toggle Password
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // CNIC Auto Format
        document.getElementById('reg-cnic').addEventListener('input', function(e) {
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,5})(\d{0,7})(\d{0,1})/);
            e.target.value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
        });

        // Phone Auto Format
        document.getElementById('reg-phone').addEventListener('input', function(e) {
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,7})/);
            e.target.value = !x[2] ? x[1] : x[1] + '-' + x[2];
        });

        // Password Strength
        function checkStrength() {
            const val = document.getElementById('reg-password').value;
            const bar = document.getElementById('strength-bar');
            const text = document.getElementById('strength-text');
            bar.className = 'h-full w-0 transition-all duration-300';
            text.innerText = '';
            if (val.length > 0) {
                if (val.length < 6) {
                    bar.classList.add('strength-weak');
                    text.innerText = 'Weak'; text.style.color = '#EF4444';
                } else if (val.length < 8) {
                    bar.classList.add('strength-medium');
                    text.innerText = 'Medium'; text.style.color = '#F59E0B';
                } else {
                    const hasNum = /\d/.test(val);
                    const hasSpecial = /[!@#$%^&*]/.test(val);
                    if (hasNum && hasSpecial) {
                        bar.classList.add('strength-strong');
                        text.innerText = 'Strong'; text.style.color = '#10B981';
                    } else {
                        bar.classList.add('strength-medium');
                        text.innerText = 'Medium'; text.style.color = '#F59E0B';
                    }
                }
            }
        }

        // Confirm Password Match
        function checkMatch() {
            const pass = document.getElementById('reg-password').value;
            const confirm = document.getElementById('reg-confirm').value;
            const icon = document.getElementById('match-icon');
            if (confirm.length > 0) {
                if (pass === confirm) {
                    icon.classList.remove('hidden');
                    document.getElementById('reg-confirm').classList.add('border-green-500');
                    document.getElementById('reg-confirm').classList.remove('border-red-500');
                } else {
                    icon.classList.add('hidden');
                    document.getElementById('reg-confirm').classList.add('border-red-500');
                    document.getElementById('reg-confirm').classList.remove('border-green-500');
                }
            } else {
                icon.classList.add('hidden');
                document.getElementById('reg-confirm').classList.remove('border-green-500', 'border-red-500');
            }
        }

        // ✅ LOGIN — redirects to dashboard after animation
        function handleLogin(e) {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const spinner = btn.querySelector('.btn-spinner');
            const text = btn.querySelector('.btn-text');
            text.classList.add('hidden');
            spinner.classList.remove('hidden');
            btn.disabled = true;

            setTimeout(() => {
                window.location.href = '/dashboard';  // ← DASHBOARD REDIRECT
            }, 1500);
        }

        // ✅ REGISTER — redirects to dashboard after animation
        function handleRegister(e) {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const spinner = btn.querySelector('.btn-spinner');
            const text = btn.querySelector('.btn-text');
            text.classList.add('hidden');
            spinner.classList.remove('hidden');
            btn.disabled = true;

            setTimeout(() => {
                window.location.href = '/dashboard';  // ← DASHBOARD REDIRECT
            }, 1500);
        }
    </script>
</body>
</html>