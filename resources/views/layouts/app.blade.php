
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Dynamic Title --}}
    <title>@yield('title', 'StreetSafe — Making Pakistan Safer') | StreetSafe</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome 6.4.0 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- AOS Animation Library CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    {{-- Tailwind Config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0A0F1E',
                        accent: '#1A73E8',
                        secondary: '#00D4FF',
                        lightBg: '#F4F6FA',
                        navy: '#0A0F1E',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        'neon': '0 0 15px rgba(0, 212, 255, 0.5)',
                        'neon-blue': '0 0 15px rgba(26, 115, 232, 0.5)',
                    }
                }
            }
        }
    </script>

    {{-- Global CSS --}}
    <style>
        /* Base Styles */
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background-color: #0A0F1E;
            color: #ffffff;
        }

        /* Glassmorphism Utilities */
        .glass-nav {
            background: rgba(10, 15, 30, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Text Gradients & Effects */
        .text-gradient {
            background: linear-gradient(to right, #00D4FF, #1A73E8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .animated-gradient-bg {
            background: linear-gradient(-45deg, #0A0F1E, #1A73E8, #002f4b, #0A0F1E);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
        }

        /* Map Pattern */
        .bg-map-pattern {
            background-color: #050914;
            background-image: 
                linear-gradient(rgba(0, 212, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 212, 255, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Particle Animation */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 212, 255, 0.3);
            animation: floatUp linear infinite;
            bottom: -50px;
            pointer-events: none;
            z-index: 0;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #0A0F1E;
        }
        ::-webkit-scrollbar-thumb {
            background: #1A73E8;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #00D4FF;
        }

        /* Keyframes */
        @keyframes floatUp {
            0% { transform: translateY(0); opacity: 0; }
            20% { opacity: 0.5; }
            80% { opacity: 0.5; }
            100% { transform: translateY(-110vh); opacity: 0; }
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .shake-anim {
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased relative min-h-screen flex flex-col justify-between animated-gradient-bg">
    
    {{-- Global Background Particle Container --}}
    <div id="particles-container" class="fixed inset-0 overflow-hidden pointer-events-none z-0"></div>

    {{-- NAVBAR --}}
    <nav id="navbar" class="fixed w-full top-0 z-50 transition-all duration-300 py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex justify-between items-center relative z-10">
            
            {{-- LEFT: Logo --}}
            <a href="/" class="flex items-center gap-2 group">
                <div class="bg-accent p-2 rounded-lg group-hover:shadow-neon-blue transition-all duration-300">
                    <i class="fa-solid fa-shield-halved text-xl text-white"></i>
                </div>
                <span class="text-2xl font-bold font-heading text-white tracking-wide">StreetSafe</span>
            </a>

            {{-- CENTER: Nav Links (Desktop) --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="/" class="font-medium transition-colors @if(View::yieldContent('active_nav') == 'home') text-secondary border-b-2 border-secondary pb-1 @else text-gray-300 hover:text-secondary @endif">Home</a>
                <a href="/how-it-works" class="font-medium transition-colors @if(View::yieldContent('active_nav') == 'how-it-works') text-secondary border-b-2 border-secondary pb-1 @else text-gray-300 hover:text-secondary @endif">How It Works</a>
                <a href="/map" class="font-medium transition-colors @if(View::yieldContent('active_nav') == 'map') text-secondary border-b-2 border-secondary pb-1 @else text-gray-300 hover:text-secondary @endif">Safety Map</a>
                <a href="/about" class="font-medium transition-colors @if(View::yieldContent('active_nav') == 'about') text-secondary border-b-2 border-secondary pb-1 @else text-gray-300 hover:text-secondary @endif">About</a>
                <a href="/contact" class="font-medium transition-colors @if(View::yieldContent('active_nav') == 'contact') text-secondary border-b-2 border-secondary pb-1 @else text-gray-300 hover:text-secondary @endif">Contact</a>
            </div>

            {{-- RIGHT: Auth Buttons (Desktop) --}}
            <div class="hidden md:flex items-center gap-4">
                <a href="/login" class="px-5 py-2 rounded-full border border-accent text-accent hover:bg-accent hover:text-white transition-all font-medium">Login</a>
                <a href="/login" class="px-5 py-2 rounded-full bg-accent text-white shadow-neon-blue hover:scale-105 hover:shadow-neon transition-all font-medium">Register</a>
            </div>

            {{-- MOBILE: Hamburger Button --}}
            <button id="mobile-menu-btn" class="md:hidden text-white text-2xl focus:outline-none">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        {{-- MOBILE MENU OVERLAY --}}
        <div id="mobile-menu" class="fixed inset-0 bg-primary/95 backdrop-blur-xl z-40 transform translate-x-full transition-transform duration-300 flex flex-col items-center justify-center gap-8 md:hidden">
            {{-- Close Button --}}
            <button id="close-menu-btn" class="absolute top-6 right-6 text-white text-3xl focus:outline-none hover:text-secondary transition-colors">
                <i class="fa-solid fa-xmark"></i>
            </button>

            {{-- Mobile Links --}}
            <div class="flex flex-col items-center gap-6 text-lg font-medium">
                <a href="/" class="@if(View::yieldContent('active_nav') == 'home') text-secondary @else text-gray-300 @endif hover:text-secondary transition-colors">Home</a>
                <a href="/how-it-works" class="@if(View::yieldContent('active_nav') == 'how-it-works') text-secondary @else text-gray-300 @endif hover:text-secondary transition-colors">How It Works</a>
                <a href="/map" class="@if(View::yieldContent('active_nav') == 'map') text-secondary @else text-gray-300 @endif hover:text-secondary transition-colors">Safety Map</a>
                <a href="/about" class="@if(View::yieldContent('active_nav') == 'about') text-secondary @else text-gray-300 @endif hover:text-secondary transition-colors">About</a>
                <a href="/contact" class="@if(View::yieldContent('active_nav') == 'contact') text-secondary @else text-gray-300 @endif hover:text-secondary transition-colors">Contact</a>
            </div>

            {{-- Mobile Auth Buttons --}}
            <div class="flex flex-col w-3/4 gap-4 mt-4">
                <a href="/login" class="w-full py-3 rounded-full border border-accent text-accent hover:bg-accent hover:text-white transition-all font-medium text-center">Login</a>
                <a href="/login" class="w-full py-3 rounded-full bg-accent text-white shadow-neon-blue hover:scale-105 transition-all font-medium text-center">Register</a>
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT AREA --}}
    <main class="@yield('main_class', 'flex-grow pt-20 relative z-10')">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer id="footer" class="bg-primary border-t border-accent/30 pt-16 pb-8 text-white relative z-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                
                {{-- Column 1: Brand --}}
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="bg-accent p-1.5 rounded-lg">
                            <i class="fa-solid fa-shield-halved text-lg text-white"></i>
                        </div>
                        <span class="text-xl font-bold font-heading tracking-wide">StreetSafe</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Empowering citizens across Pakistan to build safer communities through technology.
                    </p>
                    <div class="flex gap-4 mt-2">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-accent hover:text-white transition-all duration-300">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-accent hover:text-white transition-all duration-300">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-accent hover:text-white transition-all duration-300">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-accent hover:text-white transition-all duration-300">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                {{-- Column 2: Quick Links --}}
                <div>
                    <h3 class="text-lg font-heading font-semibold mb-6 text-secondary">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-gray-400 hover:text-white hover:translate-x-1 transition-all inline-block">Home</a></li>
                        <li><a href="/about" class="text-gray-400 hover:text-white hover:translate-x-1 transition-all inline-block">About Us</a></li>
                        <li><a href="/map" class="text-gray-400 hover:text-white hover:translate-x-1 transition-all inline-block">Safety Map</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-white hover:translate-x-1 transition-all inline-block">Contact</a></li>
                    </ul>
                </div>

                {{-- Column 3: For Users --}}
                <div>
                    <h3 class="text-lg font-heading font-semibold mb-6 text-secondary">For Users</h3>
                    <ul class="space-y-3">
                        <li><a href="/reports/incident" class="text-gray-400 hover:text-white hover:translate-x-1 transition-all inline-block">Report Incident</a></li>
                        <li><a href="/my-reports" class="text-gray-400 hover:text-white hover:translate-x-1 transition-all inline-block">Track Status</a></li>
                        <li><a href="/how-it-works" class="text-gray-400 hover:text-white hover:translate-x-1 transition-all inline-block">How It Works</a></li>
                        <li><a href="/shopkeeper/portal" class="text-gray-400 hover:text-white hover:translate-x-1 transition-all inline-block">Shopkeeper Portal</a></li>
                    </ul>
                </div>

                {{-- Column 4: Connect --}}
                <div>
                    <h3 class="text-lg font-heading font-semibold mb-6 text-secondary">Connect With Us</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-gray-400">
                            <i class="fa-solid fa-envelope mt-1 text-accent"></i>
                            <span>support@streetsafe.pk</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-400">
                            <i class="fa-solid fa-phone mt-1 text-accent"></i>
                            <span>+92 21 111 222 333</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-400">
                            <i class="fa-solid fa-location-dot mt-1 text-accent"></i>
                            <span>Islamabad, Pakistan</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm text-center md:text-left">
                    © 2024 StreetSafe Pakistan. All rights reserved.
                </p>
                <div class="flex gap-6 text-sm">
                    <a href="/privacy" class="text-gray-500 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="/terms" class="text-gray-500 hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- AOS Script --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- GLOBAL JAVASCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Initialize AOS
            AOS.init({ 
                duration: 800, 
                once: true, 
                offset: 100,
                easing: 'ease-out-cubic'
            });

            // 2. Navbar Scroll Effect
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('glass-nav');
                    navbar.classList.remove('py-4');
                    navbar.classList.add('py-2');
                } else {
                    navbar.classList.remove('glass-nav', 'py-2');
                    navbar.classList.add('py-4');
                }
            });

            // 3. Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const closeMenuBtn = document.getElementById('close-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            function toggleMenu() {
                mobileMenu.classList.toggle('translate-x-full');
                // Prevent body scroll when menu is open
                if (!mobileMenu.classList.contains('translate-x-full')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            }

            if(mobileMenuBtn) mobileMenuBtn.addEventListener('click', toggleMenu);
            if(closeMenuBtn) closeMenuBtn.addEventListener('click', toggleMenu);

            // 4. Particle Generator
            function generateParticles(containerId) {
                const container = document.getElementById(containerId);
                if (!container) return;
                
                // Clear existing particles if any to avoid duplicates on re-renders
                container.innerHTML = '';

                for (let i = 0; i < 20; i++) {
                    const p = document.createElement('div');
                    p.classList.add('particle');
                    
                    // Random size between 5px and 15px
                    const size = Math.random() * 10 + 5;
                    p.style.width = size + 'px';
                    p.style.height = size + 'px';
                    
                    // Random position
                    p.style.left = Math.random() * 100 + '%';
                    
                    // Random animation duration and delay
                    const duration = Math.random() * 10 + 10; // 10s to 20s
                    const delay = Math.random() * 5;
                    
                    p.style.animationDuration = duration + 's';
                    p.style.animationDelay = delay + 's';
                    
                    container.appendChild(p);
                }
            }

            // Initialize Particles
            generateParticles('particles-container');
        });
    </script>
    
    {{-- Stack for page specific scripts --}}
    @stack('scripts')
</body>
</html>
