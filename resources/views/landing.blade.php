<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetSafe - Making Pakistan's Streets Safer</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animation Library (CSS) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0A0F1E',
                        accent: '#1A73E8',
                        secondary: '#00D4FF',
                        lightBg: '#F4F6FA',
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

    <style>
        /* Custom Styles & Animation Utilities */
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }

        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-nav {
            background: rgba(10, 15, 30, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Particle Animation */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 212, 255, 0.3);
            box-shadow: 0 0 10px rgba(0, 212, 255, 0.2);
            animation: floatUp linear infinite;
            bottom: -50px;
            pointer-events: none;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0;
            }
            20% {
                opacity: 0.5;
            }
            80% {
                opacity: 0.5;
            }
            100% {
                transform: translateY(-110vh) scale(1.5);
                opacity: 0;
            }
        }

        /* Map Background Pattern */
        .bg-map-pattern {
            background-color: #0A0F1E;
            background-image: 
                linear-gradient(rgba(26, 115, 232, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(26, 115, 232, 0.1) 1px, transparent 1px),
                radial-gradient(circle at center, rgba(26, 115, 232, 0.15) 0%, transparent 60%);
            background-size: 40px 40px, 40px 40px, 100% 100%;
        }

        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(to right, #00D4FF, #1A73E8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Animated Background for CTA */
        .animated-gradient-bg {
            background: linear-gradient(-45deg, #0A0F1E, #1A73E8, #002f4b, #0A0F1E);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Connecting Line Animation */
        .step-line {
            position: absolute;
            top: 40px;
            left: 0;
            width: 100%;
            height: 2px;
            background: repeating-linear-gradient(90deg, #1A73E8, #1A73E8 10px, transparent 10px, transparent 20px);
            z-index: 0;
            opacity: 0.3;
        }
        
        .step-line-active {
            animation: drawLine 1.5s ease-out forwards;
        }

        @keyframes drawLine {
            from { width: 0; }
            to { width: 100%; }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0A0F1E;
        }
        ::-webkit-scrollbar-thumb {
            background: #1A73E8;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-primary text-white antialiased">

    <!-- 1. NAVBAR -->
    <nav id="navbar" class="fixed w-full top-0 z-50 transition-all duration-300 py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2 group">
                <div class="bg-accent text-white p-2 rounded-lg group-hover:shadow-neon-blue transition-shadow duration-300">
                    <i class="fa-solid fa-shield-halved text-xl"></i>
                </div>
                <span class="text-2xl font-bold font-heading tracking-wide text-white">StreetSafe</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-secondary transition-colors font-medium">Home</a>
                <a href="{{ route('how-it-works') }}" class="text-gray-300 hover:text-secondary transition-colors font-medium">How It Works</a>
                <a href="{{ route('map') }}" class="text-gray-300 hover:text-secondary transition-colors font-medium">Safety Map</a>
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-secondary transition-colors font-medium">About</a>
                <a href="{{ route('contact') }}" class="text-gray-300 hover:text-secondary transition-colors font-medium">Contact</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center gap-4">
                <a class="px-5 py-2 rounded-full border border-accent text-accent hover:bg-accent hover:text-white transition-all duration-300 font-medium" href="{{ url('/login') }}">Login</a>
                <button class="px-5 py-2 rounded-full bg-accent text-white shadow-neon-blue hover:shadow-neon-blue hover:scale-105 transition-all duration-300 font-medium">Register</button>
            </div>

            <!-- Mobile Hamburger -->
            <button id="mobile-menu-btn" class="md:hidden text-2xl text-white focus:outline-none">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="fixed inset-0 bg-primary/95 backdrop-blur-lg z-40 transform translate-x-full transition-transform duration-300 flex flex-col items-center justify-center gap-8 md:hidden">
            <button id="close-menu-btn" class="absolute top-6 right-6 text-3xl text-white">
                <i class="fa-solid fa-xmark"></i>
            </button>   
            <a href="{{ route('home') }}" class="text-2xl font-medium text-white hover:text-secondary">Home</a>
            <a href="{{ route('how-it-works') }}" class="text-2xl font-medium text-white hover:text-secondary">How It Works</a>
            <a href="{{ route('map') }}" class="text-2xl font-medium text-white hover:text-secondary">Safety Map</a>
            <a href="{{ route('about') }}" class="text-2xl font-medium text-white hover:text-secondary">About</a>
            <div class="flex flex-col gap-4 mt-4 w-3/4">
                <button href="{{ route('login') }}" class="w-full py-3 rounded-full border border-accent text-accent font-medium">Login</button>
                <button class="w-full py-3 rounded-full bg-accent text-white font-medium shadow-neon-blue">Register</button>
            </div>
        </div>
    </nav>

    <!-- 2. HERO SECTION -->
    <header class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <!-- Background Elements -->
        <div class="absolute inset-0 z-0 bg-primary">
            <div id="particles-container" class="absolute inset-0 w-full h-full">
                <!-- Particles injected via JS -->
            </div>
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-accent/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-secondary/10 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6 z-10 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div class="text-center lg:text-left" data-aos="fade-right" data-aos-duration="1000">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    Making Pakistan's Streets <br>
                    <span class="text-gradient">Safer — Together</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-400 mb-8 max-w-2xl mx-auto lg:mx-0">
                    Report incidents, track missing items, and help authorities keep your city safe. Join the community-driven safety network.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="/reports/incident" class="px-8 py-4 bg-accent text-white rounded-full font-semibold shadow-neon-blue hover:scale-105 hover:shadow-neon transition-all duration-300 text-center">
                        Report an Incident
                    </a>
                    <a href="/map/index" class="px-8 py-4 border border-white/30 text-white rounded-full font-semibold hover:bg-white hover:text-primary transition-all duration-300 text-center backdrop-blur-sm">
                        View Safety Map
                    </a>
                </div>
            </div>

            <!-- Hero Image/Mockup -->
            <div class="relative flex justify-center" data-aos="fade-left" data-aos-duration="1000">
                <!-- Abstract Phone Mockup -->
                <div class="relative w-64 h-[500px] md:w-72 md:h-[550px] bg-gray-900 rounded-[3rem] border-4 border-gray-700 shadow-2xl overflow-hidden glass animate__animated animate__float">
                    <!-- Screen Top Notch -->
                    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-32 h-6 bg-black rounded-b-xl z-20"></div>
                    
                    <!-- Screen Content Mockup -->
                    <div class="w-full h-full bg-gray-800 p-4 pt-10 flex flex-col gap-4">
                        <!-- Map Card -->
                        <div class="w-full h-48 bg-gray-700 rounded-xl overflow-hidden relative">
                            <div class="absolute inset-0 bg-map-pattern opacity-50"></div>
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-accent text-3xl animate-pulse">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full animate-ping"></div>
                        </div>
                        <!-- Alert Card -->
                        <div class="w-full bg-gray-700/50 p-3 rounded-xl border-l-4 border-yellow-500">
                            <div class="text-xs text-yellow-500 font-bold uppercase mb-1">Snatching Alert</div>
                            <div class="text-sm text-white">Gulshan-e-Iqbal, Block 13</div>
                            <div class="text-xs text-gray-400 mt-1">10 mins ago</div>
                        </div>
                        <!-- Stat Card -->
                        <div class="w-full bg-gray-700/50 p-3 rounded-xl border-l-4 border-green-500">
                            <div class="text-xs text-green-500 font-bold uppercase mb-1">Area Safe</div>
                            <div class="text-sm text-white">DHA Phase 5</div>
                            <div class="text-xs text-gray-400 mt-1">Rating: 4.8/5</div>
                        </div>
                        <!-- Button Mockup -->
                        <div class="mt-auto w-full py-3 bg-accent rounded-lg text-center text-white font-bold shadow-neon-blue">
                            + New Report
                        </div>
                    </div>
                </div>
                
                <!-- Floating elements around phone -->
                <div class="absolute top-20 -right-4 md:right-12 bg-white text-primary px-4 py-2 rounded-lg shadow-lg animate-bounce" style="animation-duration: 3s;">
                    <span class="font-bold text-green-500"><i class="fa-solid fa-check-circle"></i> Resolved</span>
                </div>
                <div class="absolute bottom-32 -left-4 md:left-0 glass p-3 rounded-xl flex items-center gap-3 animate-bounce" style="animation-duration: 4s;">
                    <div class="w-8 h-8 rounded-full bg-accent flex items-center justify-center text-white"><i class="fa-solid fa-user"></i></div>
                    <div class="text-xs">
                        <div class="font-bold">New User</div>
                        <div class="text-gray-400">Karachi</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce cursor-pointer" onclick="document.getElementById('stats').scrollIntoView({behavior: 'smooth'})">
            <span class="text-xs text-gray-400 uppercase tracking-widest">Scroll Down</span>
            <i class="fa-solid fa-chevron-down text-secondary"></i>
        </div>
    </header>

    <!-- 3. ANIMATED STATS SECTION -->
    <section id="stats" class="py-20 bg-primary relative border-t border-gray-800">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="glass p-6 rounded-2xl text-center hover:bg-white/10 transition-colors duration-300" data-aos="fade-up" data-aos-delay="0">
                    <div class="text-secondary text-3xl mb-3"><i class="fa-solid fa-file-contract"></i></div>
                    <h3 class="text-3xl md:text-4xl font-bold mb-2 text-white counter" data-target="12400">0</h3>
                    <p class="text-gray-400 text-sm uppercase tracking-wider">Reports Filed</p>
                </div>
                <!-- Card 2 -->
                <div class="glass p-6 rounded-2xl text-center hover:bg-white/10 transition-colors duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-accent text-3xl mb-3"><i class="fa-solid fa-city"></i></div>
                    <h3 class="text-3xl md:text-4xl font-bold mb-2 text-white counter" data-target="38">0</h3>
                    <p class="text-gray-400 text-sm uppercase tracking-wider">Cities Covered</p>
                </div>
                <!-- Card 3 -->
                <div class="glass p-6 rounded-2xl text-center hover:bg-white/10 transition-colors duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-green-500 text-3xl mb-3"><i class="fa-solid fa-check-double"></i></div>
                    <h3 class="text-3xl md:text-4xl font-bold mb-2 text-white counter" data-target="94">0</h3>
                    <p class="text-gray-400 text-sm uppercase tracking-wider">Cases Resolved (%)</p>
                </div>
                <!-- Card 4 -->
                <div class="glass p-6 rounded-2xl text-center hover:bg-white/10 transition-colors duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-yellow-500 text-3xl mb-3"><i class="fa-solid fa-users"></i></div>
                    <h3 class="text-3xl md:text-4xl font-bold mb-2 text-white counter" data-target="50000">0</h3>
                    <p class="text-gray-400 text-sm uppercase tracking-wider">Active Users</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. FEATURES SECTION -->
    <section id="features" class="py-24 bg-lightBg text-primary">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Everything You Need to <span class="text-accent">Stay Safe</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Comprehensive tools designed for the unique challenges of urban navigation in Pakistan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-transparent hover:border-accent group" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-14 h-14 bg-blue-50 text-accent rounded-full flex items-center justify-center text-2xl mb-6 group-hover:bg-accent group-hover:text-white transition-colors">
                        <i class="fa-solid fa-mobile-screen"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-heading">Report Missing Items</h3>
                    <p class="text-gray-600 leading-relaxed">Lost your phone or wallet? Report it instantly to the community grid and get notified if found.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-transparent hover:border-red-500 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 bg-red-50 text-red-500 rounded-full flex items-center justify-center text-2xl mb-6 group-hover:bg-red-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-person-running"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-heading">Snatching Alerts</h3>
                    <p class="text-gray-600 leading-relaxed">Real-time notifications for snatching hotspots. Avoid dangerous routes before you reach them.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-transparent hover:border-orange-500 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 bg-orange-50 text-orange-500 rounded-full flex items-center justify-center text-2xl mb-6 group-hover:bg-orange-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-road"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-heading">Road Damage Reports</h3>
                    <p class="text-gray-600 leading-relaxed">Report potholes and broken infrastructure. Help the government fix the streets we drive on.</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-transparent hover:border-purple-500 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-14 h-14 bg-purple-50 text-purple-500 rounded-full flex items-center justify-center text-2xl mb-6 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-shield-cat"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-heading">Harassment Zones</h3>
                    <p class="text-gray-600 leading-relaxed">Identify and report areas with high harassment incidents to keep women and vulnerable groups safe.</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-transparent hover:border-green-500 group" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-14 h-14 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-2xl mb-6 group-hover:bg-green-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-traffic-light"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-heading">Traffic Reports</h3>
                    <p class="text-gray-600 leading-relaxed">Live updates on traffic jams, accidents, and road closures to save your daily commute time.</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-transparent hover:border-yellow-500 group" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-14 h-14 bg-yellow-50 text-yellow-500 rounded-full flex items-center justify-center text-2xl mb-6 group-hover:bg-yellow-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-heading">Area Safety Ratings</h3>
                    <p class="text-gray-600 leading-relaxed">Community-generated safety scores for neighborhoods. Know where it's safe to walk at night.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. HOW IT WORKS SECTION -->
    <section id="how-it-works" class="py-24 bg-primary overflow-hidden relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20" data-aos="fade-down">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">How StreetSafe <span class="text-secondary">Works</span></h2>
                <p class="text-gray-400">Three simple steps to a safer community.</p>
            </div>

            <div class="relative hidden md:block">
                <!-- Animated Connecting Line -->
                <div id="connecting-line" class="step-line opacity-0"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative z-20">
                <!-- Step 1 -->
                <div class="text-center group" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-20 h-20 mx-auto bg-gray-800 border-2 border-accent rounded-full flex items-center justify-center text-3xl text-accent mb-6 shadow-neon-blue group-hover:scale-110 transition-transform duration-300 relative">
                        <i class="fa-solid fa-user-plus"></i>
                        <span class="absolute -top-2 -right-2 w-8 h-8 bg-accent text-white rounded-full flex items-center justify-center text-sm font-bold border-2 border-primary">1</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 font-heading">Register Anonymously</h3>
                    <p class="text-gray-400">Sign up without revealing your identity. Your privacy is our priority while keeping you connected.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 mx-auto bg-gray-800 border-2 border-secondary rounded-full flex items-center justify-center text-3xl text-secondary mb-6 shadow-neon group-hover:scale-110 transition-transform duration-300 relative">
                        <i class="fa-solid fa-flag"></i>
                        <span class="absolute -top-2 -right-2 w-8 h-8 bg-secondary text-primary rounded-full flex items-center justify-center text-sm font-bold border-2 border-primary">2</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 font-heading">Report an Incident</h3>
                    <p class="text-gray-400">Use the app to report crimes, damage, or missing items with a few taps. Upload photos for proof.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center group" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-20 h-20 mx-auto bg-gray-800 border-2 border-green-500 rounded-full flex items-center justify-center text-3xl text-green-500 mb-6 shadow-[0_0_15px_rgba(34,197,94,0.5)] group-hover:scale-110 transition-transform duration-300 relative">
                        <i class="fa-solid fa-shield-check"></i>
                        <span class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center text-sm font-bold border-2 border-primary">3</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 font-heading">Authorities Take Action</h3>
                    <p class="text-gray-400">Verified reports are forwarded to local police and civic bodies for immediate resolution.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. SAFETY MAP TEASER SECTION -->
    <section id="map-section" class="relative py-32 bg-map-pattern flex items-center justify-center text-center overflow-hidden">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-primary/80 z-0"></div>
        
        <!-- Pulsing Circle Animation behind button -->
        <div class="absolute w-64 h-64 bg-accent/20 rounded-full blur-3xl animate-pulse z-0"></div>

        <div class="relative z-10 max-w-4xl px-6">
            <div class="inline-block px-4 py-1 rounded-full bg-accent/20 border border-accent text-accent text-sm font-bold mb-6" data-aos="zoom-in">LIVE TRACKING</div>
            <h2 class="text-4xl md:text-6xl font-bold mb-6 font-heading" data-aos="fade-up">Real-Time Safety Map</h2>
            <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                See crime hotspots, harassment zones, and road damage across your city. Navigate smarter and safer.
            </p>
            <a href="/map/index" class="relative inline-flex items-center justify-center px-8 py-4 overflow-hidden font-bold text-white transition-all duration-300 bg-transparent border-2 border-white rounded-full group hover:bg-white hover:text-primary" data-aos="fade-up" data-aos-delay="200">
                <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
                <span class="relative flex items-center gap-2">
                    Explore the Map <i class="fa-solid fa-map-location-dot"></i>
                </span>
            </a>
        </div>
    </section>

    <!-- 7. WHO CAN USE THIS SECTION -->
    <section class="py-24 bg-white text-primary">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Citizens -->
                <div class="bg-gray-50 rounded-2xl p-8 border-t-4 border-accent shadow-lg" data-aos="fade-right">
                    <div class="w-16 h-16 bg-blue-100 text-accent rounded-full flex items-center justify-center text-2xl mb-6">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 font-heading">Citizens</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-accent mt-1"></i>
                            <span>Report incidents anonymously</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-accent mt-1"></i>
                            <span>Check area safety before travel</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-accent mt-1"></i>
                            <span>Track lost items</span>
                        </li>
                    </ul>
                </div>

             <!-- Shopkeepers -->
<div class="bg-gray-50 rounded-2xl p-8 border-t-4 border-green-500 shadow-lg transform md:-translate-y-4" data-aos="fade-up">
    <div class="w-16 h-16 bg-green-100 text-green-500 rounded-full flex items-center justify-center text-2xl mb-6">
        <i class="fa-solid fa-shop"></i>
    </div>
    <h3 class="text-2xl font-bold mb-4 font-heading">Shopkeepers</h3>
    <ul class="space-y-3 text-gray-600">
        <li class="flex items-start gap-3">
            <i class="fa-solid fa-check text-green-500 mt-1"></i>
            <span>Verify suspicious goods</span>
        </li>
        <li class="flex items-start gap-3">
            <i class="fa-solid fa-check text-green-500 mt-1"></i>
            <span>Report street crimes nearby</span>
        </li>
        <li class="flex items-start gap-3">
            <i class="fa-solid fa-check text-green-500 mt-1"></i>
            <span>Secure business environment</span>
        </li>
    </ul>
    <a href="/shopkeeper/portal" class="mt-6 inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-semibold px-5 py-2.5 rounded-xl transition-all duration-300 hover:scale-105 shadow-md shadow-green-500/30">
        <i class="fa-solid fa-shop"></i>
        Shopkeeper Portal
    </a>
</div>

                <!-- Authorities -->
                <div class="bg-gray-50 rounded-2xl p-8 border-t-4 border-orange-500 shadow-lg" data-aos="fade-left">
                    <div class="w-16 h-16 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center text-2xl mb-6">
                        <i class="fa-solid fa-building-shield"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 font-heading">Authorities</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-orange-500 mt-1"></i>
                            <span>Receive real-time alerts</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-orange-500 mt-1"></i>
                            <span>Analyze crime data patterns</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-orange-500 mt-1"></i>
                            <span>Improve response times</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. TESTIMONIALS SECTION -->
    <section class="py-24 bg-lightBg overflow-hidden">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 font-heading text-primary">What People Are <span class="text-accent">Saying</span></h2>

            <div class="relative max-w-4xl mx-auto">
                <!-- Carousel Container -->
                <div id="testimonial-container" class="relative min-h-[300px]">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-slide absolute inset-0 transition-all duration-500 opacity-100 transform scale-100" data-index="0">
                        <div class="bg-white p-10 rounded-2xl shadow-xl text-center">
                            <div class="w-20 h-20 bg-accent text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">SA</div>
                            <div class="text-yellow-400 mb-4">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <p class="text-gray-600 text-lg italic mb-6">"StreetSafe helped me recover my lost wallet within 2 hours. The community response in Lahore was incredible!"</p>
                            <h4 class="font-bold text-primary text-lg">Sarah Ahmed</h4>
                            <span class="text-sm text-gray-400">Lahore</span>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="testimonial-slide absolute inset-0 transition-all duration-500 opacity-0 transform translate-x-20 pointer-events-none" data-index="1">
                        <div class="bg-white p-10 rounded-2xl shadow-xl text-center">
                            <div class="w-20 h-20 bg-green-500 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">BK</div>
                            <div class="text-yellow-400 mb-4">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <p class="text-gray-600 text-lg italic mb-6">"As a shop owner, I feel safer knowing I can check the safety status of my area before opening early in the morning."</p>
                            <h4 class="font-bold text-primary text-lg">Bilal Khan</h4>
                            <span class="text-sm text-gray-400">Karachi</span>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="testimonial-slide absolute inset-0 transition-all duration-500 opacity-0 transform translate-x-20 pointer-events-none" data-index="2">
                        <div class="bg-white p-10 rounded-2xl shadow-xl text-center">
                            <div class="w-20 h-20 bg-purple-500 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">AM</div>
                            <div class="text-yellow-400 mb-4">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <p class="text-gray-600 text-lg italic mb-6">"The road damage reporting feature actually works! The municipal council fixed the pothole outside my house last week."</p>
                            <h4 class="font-bold text-primary text-lg">Ayesha Malik</h4>
                            <span class="text-sm text-gray-400">Islamabad</span>
                        </div>
                    </div>
                </div>

                <!-- Dots Indicator -->
                <div class="flex justify-center gap-3 mt-8">
                    <button class="dot w-3 h-3 rounded-full bg-accent transition-all duration-300" onclick="goToSlide(0)"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300 hover:bg-accent transition-all duration-300" onclick="goToSlide(1)"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300 hover:bg-accent transition-all duration-300" onclick="goToSlide(2)"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. CALL TO ACTION SECTION -->
    <section class="py-24 relative overflow-hidden text-center">
        <div class="absolute inset-0 animated-gradient-bg z-0"></div>
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 font-heading" data-aos="zoom-in">Join Thousands Making Their City Safer</h2>
            <p class="text-white/80 text-lg mb-10 max-w-2xl mx-auto" data-aos="zoom-in" data-aos-delay="100">Be part of the solution. One report at a time, we can transform Pakistan.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('how-it-works') }}" class="px-10 py-4 bg-white text-primary rounded-full font-bold font-heading hover:scale-105 transition-transform">Get Started free</a>
                <a href="{{ route('login') }}" class="px-10 py-4 border-2 border-white text-white rounded-full font-bold font-heading hover:bg-white/10 transition-all">Join StreetSafe</a>
            </div>
        </div>
    </section>

    <!-- 10. FOOTER -->
    <footer id="footer" class="bg-primary border-t border-accent/30 pt-16 pb-8 text-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div>
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fa-solid fa-shield-halved text-accent text-2xl"></i>
                        <span class="text-2xl font-bold font-heading">StreetSafe</span>
                    </div>
                    <p class="text-gray-400 mb-6">Empowering citizens across Pakistan to build safer communities through technology and collaboration.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-accent transition-colors"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-accent transition-colors"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-accent transition-colors"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-accent transition-colors"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-6 font-heading">Quick Links</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Home</a></li>
                        <li><a href="{{ route('how-it-works') }}" class="hover:text-secondary transition-colors">About Us</a></li>
                        <li><a href="{{ route('map') }}" class="hover:text-secondary transition-colors">Safety Map</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-secondary transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- For Users -->
                <div>
                    <h4 class="text-lg font-bold mb-6 font-heading">For Users</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="{{ route('incident') }}" class="hover:text-secondary transition-colors">Report Incident</a></li>
                        <li><a href="#" class="hover:text-secondary transition-colors">Track Status</a></li>
                        <li><a href="#" class="hover:text-secondary transition-colors">Safety Tips</a></li>
                        <li><a href="#" class="hover:text-secondary transition-colors">Community Guidelines</a></li>
                    </ul>
                </div>

                <!-- Connect With Us -->
                <div>
                    <h4 class="text-lg font-bold mb-6 font-heading">Connect With Us</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-envelope text-accent"></i> support@streetsafe.pk</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-phone text-accent"></i> +92 21 111 222 333</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-accent"></i> Islamabad, Pakistan</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-500">
                <p>&copy; 2023 StreetSafe Pakistan. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    
    <!-- AOS Animation Library (JS) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // --- 1. Navbar Scroll Effect ---
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('glass-nav');
            } else {
                navbar.classList.remove('glass-nav');
            }
        });

        // --- 2. Mobile Menu Toggle ---
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        function toggleMenu() {
            const isClosed = mobileMenu.classList.contains('translate-x-full');
            if (isClosed) {
                mobileMenu.classList.remove('translate-x-full');
            } else {
                mobileMenu.classList.add('translate-x-full');
            }
        }

        mobileMenuBtn.addEventListener('click', toggleMenu);
        closeMenuBtn.addEventListener('click', toggleMenu);

        // --- 3. Hero Particles (Pure JS Generation) ---
        const particlesContainer = document.getElementById('particles-container');
        const particleCount = 20;

        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            
            // Random properties
            const size = Math.random() * 10 + 5 + 'px'; // 5px to 15px
            const left = Math.random() * 100 + '%';
            const duration = Math.random() * 10 + 10 + 's'; // 10s to 20s
            const delay = Math.random() * 5 + 's';

            particle.style.width = size;
            particle.style.height = size;
            particle.style.left = left;
            particle.style.animationDuration = duration;
            particle.style.animationDelay = delay;

            particlesContainer.appendChild(particle);
        }

        // --- 4. Stats Counter Animation ---
        const statsSection = document.querySelector('#stats');
        const counters = document.querySelectorAll('.counter');
        let started = false; // Flag to ensure animation runs once

        const startCounters = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const increment = target / 100; // Speed
                
                const updateCounter = () => {
                    const c = +counter.innerText;
                    if (c < target) {
                        counter.innerText = Math.ceil(c + increment);
                        setTimeout(updateCounter, 20);
                    } else {
                        // Format numbers with commas
                        counter.innerText = target.toLocaleString();
                        // Add percentage sign if needed based on logic (hardcoded for 94%)
                        if (target === 94) counter.innerText += '%';
                        else if (target >= 1000) counter.innerText += '+';
                    }
                };
                updateCounter();
            });
        };

        const statsObserver = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting && !started) {
                startCounters();
                started = true;
            }
        });

        statsObserver.observe(statsSection);

        // --- 5. How It Works Line Animation ---
        const howItWorksSection = document.getElementById('how-it-works');
        const line = document.getElementById('connecting-line');

        const lineObserver = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                line.classList.add('step-line-active');
                line.classList.remove('opacity-0');
            }
        });

        lineObserver.observe(howItWorksSection);

        // --- 6. Testimonials Carousel ---
        let currentSlide = 0;
        const slides = document.querySelectorAll('.testimonial-slide');
        const dots = document.querySelectorAll('.dot');
        const totalSlides = slides.length;

        function updateSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.remove('opacity-0', 'translate-x-20', '-translate-x-20', 'pointer-events-none');
                    slide.classList.add('opacity-100', 'translate-x-0', 'scale-100');
                    slide.classList.remove('scale-95'); // Reset scale
                } else {
                    slide.classList.add('opacity-0', 'pointer-events-none');
                    slide.classList.remove('opacity-100', 'translate-x-0', 'scale-100');
                    
                    // Direction logic for visual flair
                    if (i < index) {
                        slide.classList.add('-translate-x-20');
                        slide.classList.remove('translate-x-20');
                    } else {
                        slide.classList.add('translate-x-20');
                        slide.classList.remove('-translate-x-20');
                    }
                }
            });

            // Update dots
            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.remove('bg-gray-300');
                    dot.classList.add('bg-accent');
                } else {
                    dot.classList.add('bg-gray-300');
                    dot.classList.remove('bg-accent');
                }
            });
            currentSlide = index;
        }

        function nextSlide() {
            let next = (currentSlide + 1) % totalSlides;
            updateSlide(next);
        }

        function goToSlide(index) {
            updateSlide(index);
        }

        // Auto scroll every 5 seconds
        setInterval(nextSlide, 5000);

    </script>
</body>
</html>