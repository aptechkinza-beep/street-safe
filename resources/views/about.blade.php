<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - StreetSafe Pakistan</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#0A0F1E',
                        light: '#F8FAFF',
                        primary: '#1A73E8',
                        secondary: '#00D4FF',
                        muted: '#94A3B8',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                    },
                    backgroundImage: {
                        'gradient-main': 'linear-gradient(135deg, #1A73E8, #00D4FF)',
                        'gradient-dark': 'linear-gradient(135deg, #0A0F1E, #1a1f3a)',
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Styles & Animations */
        body {
            background-color: #0A0F1E;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* Scrollbar */
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

        /* Glassmorphism Utilities */
        .glass {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-heavy {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Shimmer Animation for Badge */
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        .shimmer-effect {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            background-size: 200% 100%;
            animation: shimmer 3s infinite linear;
        }

        /* Floating Particles */
        @keyframes floatUp {
            0% { transform: translateY(100vh) scale(0); opacity: 0; }
            20% { opacity: 0.8; }
            80% { opacity: 0.6; }
            100% { transform: translateY(-10vh) scale(1); opacity: 0; }
        }
        .particle {
            position: absolute;
            bottom: -20px;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }

        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(135deg, #00D4FF, #1A73E8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Timeline Line Animation */
        .timeline-line {
            transition: height 1.5s ease-out;
            height: 0;
        }
        .timeline-line.active {
            height: 100%;
        }

        /* Pulse Ripple */
        @keyframes ripple {
            0% { transform: scale(1); opacity: 0.8; box-shadow: 0 0 0 0 rgba(26, 115, 232, 0.7); }
            70% { transform: scale(1); opacity: 0; box-shadow: 0 0 0 15px rgba(26, 115, 232, 0); }
            100% { transform: scale(1); opacity: 0; }
        }
        .pulse-dot::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 100%; height: 100%;
            border-radius: 50%;
            z-index: -1;
            animation: ripple 2s infinite;
        }

        /* CTA Gradient Animation */
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animated-gradient-bg {
            background: linear-gradient(-45deg, #0A0F1E, #1A73E8, #002f4b, #0A0F1E);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
        }

        /* Grid Background */
        .bg-grid {
            background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }
    </style>
</head>
<body class="antialiased selection:bg-secondary selection:text-dark">

    <!-- NAVBAR -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-dark/80 backdrop-blur-md border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer" onclick="window.location.href='/'">
                    <i class="fa-solid fa-shield-halved text-3xl text-primary"></i>
                    <span class="font-heading font-bold text-2xl text-white tracking-tight">StreetSafe</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-300 hover:text-white hover:scale-105 transition px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="{{ route('how-it-works') }}" class="text-gray-300 hover:text-white hover:scale-105 transition px-3 py-2 rounded-md text-sm font-medium">How It Works</a>
                        <a href="{{ route('map') }}" class="text-gray-300 hover:text-white hover:scale-105 transition px-3 py-2 rounded-md text-sm font-medium">Safety Map</a>
                        <a href="{{ route('about') }}" class="text-secondary border-b-2 border-secondary px-3 py-2 text-sm font-bold">About</a>
                        <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white hover:scale-105 transition px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center gap-4">
                    <a class="px-5 py-2 rounded-full border border-accent text-accent hover:bg-accent hover:text-white transition-all duration-300 font-medium" href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/login') }}" class="bg-gradient-to-r from-primary to-secondary text-white font-bold px-6 py-2 rounded-full hover:shadow-[0_0_20px_rgba(26,115,232,0.4)] hover:scale-105 transition transform">Register</a>
                </div>

                <!-- Mobile menu button -->
                <div class="-mr-2 flex md:hidden">
                    <button id="mobile-menu-btn" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-white/10 focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="hidden md:hidden fixed inset-0 z-50 bg-dark/95 backdrop-blur-xl transform transition-transform duration-300 translate-x-full">
            <div class="flex flex-col h-full justify-center items-center space-y-8 text-center">
                <button id="close-menu-btn" class="absolute top-6 right-6 text-gray-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-3xl"></i>
                </button>
                <a href="{{ route('home') }}" class="text-2xl font-heading font-bold text-white hover:text-secondary">Home</a>
                <a href="{{ route('how-it-works') }}" class="text-2xl font-heading font-bold text-white hover:text-secondary">How It Works</a>
                <a href="{{ route('map') }}" class="text-2xl font-heading font-bold text-white hover:text-secondary">Safety Map</a>
                <a href="{{ route('about') }}" class="text-2xl font-heading font-bold text-secondary">About</a>
                <a href="/contact" class="text-2xl font-heading font-bold text-white hover:text-secondary">Contact</a>
                <div class="flex flex-col gap-4 mt-8 w-64">
                    <a href="{{ url('/login') }}" class="py-3 rounded-xl border border-white/20 text-center font-bold">Login</a>
                    <a href="{{ url('/login') }}" class="py-3 rounded-xl bg-gradient-to-r from-primary to-secondary text-center font-bold text-white">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- SECTION 1: CINEMATIC HERO -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Layers -->
        <div class="absolute inset-0 bg-dark z-0"></div>
        <div class="absolute top-[-100px] left-[-100px] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-[-100px] right-[-100px] w-[500px] h-[500px] bg-secondary/10 rounded-full blur-[100px]"></div>
        <div class="absolute inset-0 bg-grid z-0"></div>
        
        <!-- Particles Container -->
        <div id="particles-container" class="absolute inset-0 z-0"></div>

        <!-- Center Content -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass border border-secondary/30 mb-8 overflow-hidden relative" data-aos="fade-down" data-aos-delay="200">
                <div class="absolute inset-0 shimmer-effect"></div>
                <span class="mr-2">🛡️</span>
                <span class="text-sm font-semibold text-cyan-100">Pakistan's #1 Civic Safety Platform</span>
            </div>

            <!-- Heading -->
            <h1 class="font-heading font-extrabold text-5xl md:text-7xl lg:text-[72px] leading-tight mb-6">
                <div class="overflow-hidden"><span class="block animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">We're Building a</span></div>
                <div class="overflow-hidden"><span class="block text-gradient animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">Safer Pakistan</span></div>
                <div class="overflow-hidden"><span class="block animate__animated animate__fadeInUp" style="animation-delay: 0.5s;">— Together</span></div>
            </h1>

            <!-- Subheading -->
            <p class="text-gray-400 text-lg md:text-xl font-light max-w-2xl mx-auto mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="700">
                StreetSafe was born from a simple belief: every Pakistani citizen deserves to feel safe walking their streets. We built a platform that connects communities, empowers shopkeepers, and gives authorities the data they need to act fast.
            </p>

            <!-- Stat Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="900">
                <div class="glass px-6 py-3 rounded-full text-sm font-medium text-white border border-white/10 flex items-center gap-2">
                    <span>📅</span> Founded 2023
                </div>
                <div class="glass px-6 py-3 rounded-full text-sm font-medium text-white border border-white/10 flex items-center gap-2">
                    <span>🏆</span> Award Winning
                </div>
                <div class="glass px-6 py-3 rounded-full text-sm font-medium text-white border border-white/10 flex items-center gap-2">
                    <span>🇵🇰</span> Made in Pakistan
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce">
            <div class="h-12 w-[2px] bg-gradient-to-b from-transparent via-primary to-secondary"></div>
            <span class="text-xs uppercase tracking-widest text-gray-500">Scroll</span>
        </div>
    </section>

    <!-- SECTION 2: MISSION STATEMENT -->
    <section class="relative py-32 bg-dark overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[200px] font-heading font-bold text-white/5 pointer-events-none select-none">"</div>
        
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10" data-aos="fade-up" data-aos-duration="1000">
            <span class="text-secondary text-xs font-bold tracking-[0.3em] uppercase mb-6 block">Our Purpose</span>
            
            <h2 class="font-heading font-bold text-3xl md:text-4xl lg:text-[36px] leading-normal mb-10 text-white">
                "To empower every Pakistani citizen with the technology to report, track, and resolve safety issues — anonymously, instantly, and effectively."
            </h2>
            
            <div class="w-16 h-1 bg-gradient-to-r from-primary to-secondary mx-auto mb-10"></div>
            
            <div class="flex flex-wrap justify-center gap-6">
                <span class="px-6 py-2 rounded-full border border-primary/50 text-primary text-sm font-semibold bg-primary/10 backdrop-blur-sm">🔒 Privacy First</span>
                <span class="px-6 py-2 rounded-full border border-secondary/50 text-secondary text-sm font-semibold bg-secondary/10 backdrop-blur-sm">⚡ Real-Time</span>
                <span class="px-6 py-2 rounded-full border border-purple-500/50 text-purple-400 text-sm font-semibold bg-purple-500/10 backdrop-blur-sm">🤝 Community Driven</span>
            </div>
        </div>
    </section>

    <!-- SECTION 3: STORY SECTION -->
    <section class="py-24 bg-light text-dark overflow-hidden">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                
                <!-- Left Column: Text -->
                <div class="lg:w-3/5" data-aos="fade-right">
                    <span class="text-primary text-sm font-bold tracking-widest uppercase mb-4 block">Our Story</span>
                    <h3 class="font-heading font-bold text-3xl md:text-4xl text-dark mb-8 leading-tight">
                        From One Snatching Incident to Pakistan's Largest Safety Network
                    </h3>
                    
                    <div class="space-y-6 text-gray-600 font-light text-lg leading-relaxed">
                        <p>
                            It started on a Tuesday evening in Karachi. Our founder Ahmed Khan watched helplessly as a motorcyclist snatched a woman's phone outside a busy market. He tried to report it — but found no easy way to do so. The police station was 20 minutes away. By the time anyone arrived, the culprit was long gone.
                        </p>
                        <p>
                            That frustration became fuel. Ahmed spent the next 6 months building StreetSafe — a platform where citizens can report incidents in seconds, shopkeepers can verify suspicious items instantly, and police receive real-time data to act fast.
                        </p>
                        <p>
                            Today, StreetSafe operates in 38 cities across Pakistan, with 50,000+ active users, 12,400+ reports filed, and a 94% case resolution rate. But we're just getting started.
                        </p>
                    </div>

                    <!-- Badges -->
                    <div class="flex flex-wrap gap-4 mt-10">
                        <div class="bg-white rounded-xl px-5 py-3 shadow-sm border border-gray-100 flex items-center gap-3">
                            <i class="fa-solid fa-trophy text-primary text-xl"></i>
                            <span class="font-semibold text-gray-700">Best Civic Tech 2024</span>
                        </div>
                        <div class="bg-white rounded-xl px-5 py-3 shadow-sm border border-gray-100 flex items-center gap-3">
                            <i class="fa-solid fa-check-circle text-green-500 text-xl"></i>
                            <span class="font-semibold text-gray-700">94% Resolution Rate</span>
                        </div>
                        <div class="bg-white rounded-xl px-5 py-3 shadow-sm border border-gray-100 flex items-center gap-3">
                            <i class="fa-solid fa-users text-secondary text-xl"></i>
                            <span class="font-semibold text-gray-700">50K+ Users</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Visual Stack -->
                <div class="lg:w-2/5 relative" data-aos="fade-left">
                    <!-- Background Shadow Cards -->
                    <div class="absolute top-4 -left-4 w-full h-full bg-gray-300 rounded-3xl -z-10 opacity-60 transform rotate-[-3deg]"></div>
                    <div class="absolute top-8 -left-8 w-full h-full bg-gray-400 rounded-3xl -z-20 opacity-40 transform rotate-[-6deg]"></div>

                    <!-- Main Card -->
                    <div class="glass-heavy bg-dark text-white rounded-3xl p-8 relative shadow-2xl border border-white/20">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-shield-halved text-4xl text-primary"></i>
                                <span class="font-heading font-bold text-2xl">StreetSafe</span>
                            </div>
                            <span class="bg-green-500/20 text-green-400 text-xs font-bold px-3 py-1 rounded-full border border-green-500/30 animate-pulse">🟢 LIVE</span>
                        </div>

                        <!-- Animated Stats -->
                        <div class="space-y-6 mb-8">
                            <div class="flex justify-between items-end border-b border-white/10 pb-4">
                                <span class="text-gray-400 text-sm">Reports Today</span>
                                <span class="font-heading font-bold text-3xl text-white counter" data-target="47">0</span>
                            </div>
                            <div class="flex justify-between items-end border-b border-white/10 pb-4">
                                <span class="text-gray-400 text-sm">Cases Resolved</span>
                                <span class="font-heading font-bold text-3xl text-secondary counter" data-target="23">0</span>
                            </div>
                            <div class="flex justify-between items-end">
                                <span class="text-gray-400 text-sm">Active Users</span>
                                <span class="font-heading font-bold text-3xl text-primary counter" data-target="50234">0</span>
                            </div>
                        </div>

                        <div class="text-xs text-gray-400 text-center uppercase tracking-widest">
                            System Operational in 38 Cities
                        </div>

                        <!-- Floating Badges -->
                        <div class="absolute -top-6 -right-6 bg-white text-dark px-4 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-2 transform rotate-3">
                            <span>🏆</span> Award 2024
                        </div>
                        <div class="absolute -bottom-6 -left-6 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg font-bold text-lg">
                            94% Resolved
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 4: ANIMATED STATS -->
    <section class="py-24 bg-dark relative">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-white mb-4">Our Impact in Numbers</h2>
                <p class="text-gray-400 text-lg">Real data. Real impact. Real change.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Stat Card 1 -->
                <div class="glass rounded-2xl p-8 text-center hover:-translate-y-2 transition duration-300 border-t-4 border-t-primary hover:shadow-[0_0_30px_rgba(26,115,232,0.2)]" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-16 h-16 mx-auto bg-primary/20 rounded-full flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(26,115,232,0.4)]">
                        <i class="fa-solid fa-file-contract text-2xl text-primary"></i>
                    </div>
                    <div class="font-heading font-extrabold text-5xl text-white mb-2 counter-section" data-target="12400">0</div>
                    <div class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Reports Filed</div>
                    <div class="h-[2px] w-1/2 mx-auto bg-gradient-to-r from-primary to-transparent"></div>
                </div>

                <!-- Stat Card 2 -->
                <div class="glass rounded-2xl p-8 text-center hover:-translate-y-2 transition duration-300 border-t-4 border-t-secondary hover:shadow-[0_0_30px_rgba(0,212,255,0.2)]" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 mx-auto bg-secondary/20 rounded-full flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(0,212,255,0.4)]">
                        <i class="fa-solid fa-city text-2xl text-secondary"></i>
                    </div>
                    <div class="font-heading font-extrabold text-5xl text-white mb-2 counter-section" data-target="38">0</div>
                    <div class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Cities Covered</div>
                    <div class="h-[2px] w-1/2 mx-auto bg-gradient-to-r from-secondary to-transparent"></div>
                </div>

                <!-- Stat Card 3 -->
                <div class="glass rounded-2xl p-8 text-center hover:-translate-y-2 transition duration-300 border-t-4 border-t-green-500 hover:shadow-[0_0_30px_rgba(34,197,94,0.2)]" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 mx-auto bg-green-500/20 rounded-full flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(34,197,94,0.4)]">
                        <i class="fa-solid fa-check-double text-2xl text-green-500"></i>
                    </div>
                    <div class="font-heading font-extrabold text-5xl text-white mb-2 flex justify-center items-start">
                        <span class="counter-section" data-target="94">0</span>%
                    </div>
                    <div class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Cases Resolved</div>
                    <div class="h-[2px] w-1/2 mx-auto bg-gradient-to-r from-green-500 to-transparent"></div>
                </div>

                <!-- Stat Card 4 -->
                <div class="glass rounded-2xl p-8 text-center hover:-translate-y-2 transition duration-300 border-t-4 border-t-purple-500 hover:shadow-[0_0_30px_rgba(168,85,247,0.2)]" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 mx-auto bg-purple-500/20 rounded-full flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(168,85,247,0.4)]">
                        <i class="fa-solid fa-users text-2xl text-purple-500"></i>
                    </div>
                    <div class="font-heading font-extrabold text-5xl text-white mb-2 counter-section" data-target="50000">0</div>
                    <div class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Active Users</div>
                    <div class="h-[2px] w-1/2 mx-auto bg-gradient-to-r from-purple-500 to-transparent"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: HOW WE WORK -->
    <section class="py-28 bg-light text-dark">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="font-heading font-bold text-3xl md:text-5xl text-dark mb-4">A Complete Safety Ecosystem</h2>
                <p class="text-gray-500 text-lg">Three user types. One powerful platform.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
                
                <!-- Card 1: Citizens -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:-translate-y-4 transition duration-300 relative border-t-6 border-t-primary group" data-aos="fade-up" data-aos-delay="100">
                    <span class="absolute top-4 right-6 text-8xl font-heading font-bold text-primary/5 group-hover:text-primary/10 transition">01</span>
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300 shadow-[0_0_15px_rgba(26,115,232,0.3)]">
                        <i class="fa-solid fa-users text-2xl text-primary"></i>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-dark mb-4">Citizens Report</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">Report incidents anonymously in seconds. Upload photos, add location, and alert the community instantly.</p>
                    <ul class="space-y-3 mb-8 text-sm text-gray-600">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-primary text-xs"></i> Instant Alert Broadcast</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-primary text-xs"></i> Anonymous ID Protection</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-primary text-xs"></i> Evidence Upload</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-primary text-xs"></i> Live Status Tracking</li>
                    </ul>
                    <a href="#" class="text-primary font-bold text-sm flex items-center gap-2 hover:gap-3 transition-all">Join as Citizen <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Card 2: Shopkeepers (Lifted) -->
                <div class="bg-white rounded-2xl shadow-2xl p-8 -mt-8 hover:-translate-y-4 transition duration-300 relative border-t-6 border-t-green-500 z-10 group" data-aos="fade-up" data-aos-delay="200">
                    <span class="absolute top-4 right-6 text-8xl font-heading font-bold text-green-500/5 group-hover:text-green-500/10 transition">02</span>
                    <div class="w-16 h-16 bg-green-500/10 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300 shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                        <i class="fa-solid fa-shop text-2xl text-green-500"></i>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-dark mb-4">Shopkeepers Verify</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">Act as the eyes on the ground. Verify stolen goods database and check serial numbers before buying.</p>
                    <ul class="space-y-3 mb-8 text-sm text-gray-600">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500 text-xs"></i> Serial Number Database</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500 text-xs"></i> Stolen Goods Alerts</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500 text-xs"></i> Community Hero Points</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500 text-xs"></i> Direct Police Line</li>
                    </ul>
                    <a href="#" class="text-green-500 font-bold text-sm flex items-center gap-2 hover:gap-3 transition-all">Access Portal <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Card 3: Authorities -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:-translate-y-4 transition duration-300 relative border-t-6 border-t-orange-500 group" data-aos="fade-up" data-aos-delay="300">
                    <span class="absolute top-4 right-6 text-8xl font-heading font-bold text-orange-500/5 group-hover:text-orange-500/10 transition">03</span>
                    <div class="w-16 h-16 bg-orange-500/10 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300 shadow-[0_0_15px_rgba(249,115,22,0.3)]">
                        <i class="fa-solid fa-building-shield text-2xl text-orange-500"></i>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-dark mb-4">Authorities Act</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">Receive verified intel directly. Heatmaps show crime hotspots. Respond faster with better data.</p>
                    <ul class="space-y-3 mb-8 text-sm text-gray-600">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-orange-500 text-xs"></i> Real-time Dashboard</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-orange-500 text-xs"></i> Crime Heatmaps</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-orange-500 text-xs"></i> Digital Evidence Locker</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-orange-500 text-xs"></i> Resource Allocation</li>
                    </ul>
                    <a href="#" class="text-orange-500 font-bold text-sm flex items-center gap-2 hover:gap-3 transition-all">Authority Panel <i class="fa-solid fa-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 6: TEAM -->
    <section class="py-28 bg-dark">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-heading font-bold text-3xl md:text-5xl text-white mb-4">The People Behind StreetSafe</h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">A passionate team of technologists, former law enforcement officers, and community organizers.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Member 1 -->
                <div class="glass rounded-2xl p-6 text-center border border-white/5 hover:border-primary/50 transition duration-300 group" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-primary to-blue-700 flex items-center justify-center mb-4 group-hover:shadow-[0_0_20px_rgba(26,115,232,0.5)] transition duration-300">
                        <span class="font-heading font-bold text-3xl text-white">AK</span>
                    </div>
                    <h4 class="font-heading font-bold text-xl text-white mb-1">Ahmed Khan</h4>
                    <span class="text-primary text-xs font-bold uppercase tracking-wider mb-4 block">Founder & CEO</span>
                    <div class="h-px w-12 bg-white/10 mx-auto mb-4"></div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">Former Inspector with 10 years in Karachi Police. Turned frustration into innovation.</p>
                    <div class="flex justify-center gap-4">
                        <a href="#" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>

                <!-- Member 2 -->
                <div class="glass rounded-2xl p-6 text-center border border-white/5 hover:border-purple-500/50 transition duration-300 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-purple-500 to-purple-800 flex items-center justify-center mb-4 group-hover:shadow-[0_0_20px_rgba(168,85,247,0.5)] transition duration-300">
                        <span class="font-heading font-bold text-3xl text-white">SA</span>
                    </div>
                    <h4 class="font-heading font-bold text-xl text-white mb-1">Sara Ahmed</h4>
                    <span class="text-purple-400 text-xs font-bold uppercase tracking-wider mb-4 block">CTO</span>
                    <div class="h-px w-12 bg-white/10 mx-auto mb-4"></div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">MIT CS graduate. Expert in cybersecurity and real-time systems architecture.</p>
                    <div class="flex justify-center gap-4">
                        <a href="#" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>

                <!-- Member 3 -->
                <div class="glass rounded-2xl p-6 text-center border border-white/5 hover:border-green-500/50 transition duration-300 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-green-500 to-green-800 flex items-center justify-center mb-4 group-hover:shadow-[0_0_20px_rgba(34,197,94,0.5)] transition duration-300">
                        <span class="font-heading font-bold text-3xl text-white">MR</span>
                    </div>
                    <h4 class="font-heading font-bold text-xl text-white mb-1">Muhammad Raza</h4>
                    <span class="text-green-400 text-xs font-bold uppercase tracking-wider mb-4 block">Head of Ops</span>
                    <div class="h-px w-12 bg-white/10 mx-auto mb-4"></div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">Community organizer connecting StreetSafe to grassroots networks in 38 cities.</p>
                    <div class="flex justify-center gap-4">
                        <a href="#" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>

                <!-- Member 4 -->
                <div class="glass rounded-2xl p-6 text-center border border-white/5 hover:border-orange-500/50 transition duration-300 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-orange-500 to-orange-800 flex items-center justify-center mb-4 group-hover:shadow-[0_0_20px_rgba(249,115,22,0.5)] transition duration-300">
                        <span class="font-heading font-bold text-3xl text-white">FN</span>
                    </div>
                    <h4 class="font-heading font-bold text-xl text-white mb-1">Fatima Noor</h4>
                    <span class="text-orange-400 text-xs font-bold uppercase tracking-wider mb-4 block">Govt. Relations</span>
                    <div class="h-px w-12 bg-white/10 mx-auto mb-4"></div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">Former civil servant bridging StreetSafe with police and municipal authorities.</p>
                    <div class="flex justify-center gap-4">
                        <a href="#" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: CORE VALUES -->
    <section class="py-24 bg-light">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="font-heading font-bold text-3xl md:text-5xl text-dark mb-4">What We Stand For</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <!-- Value 1 -->
                <div class="text-center group" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-lock text-3xl text-primary"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-dark mb-3">Privacy First</h3>
                    <p class="text-gray-500 text-sm">Your identity is shielded until you choose to reveal it. We use military-grade encryption.</p>
                </div>

                <!-- Value 2 -->
                <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 mx-auto rounded-full bg-cyan-100 flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-users text-3xl text-secondary"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-dark mb-3">Community Driven</h3>
                    <p class="text-gray-500 text-sm">We are a platform built for the people, by the people. Every report strengthens the network.</p>
                </div>

                <!-- Value 3 -->
                <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 mx-auto rounded-full bg-green-100 flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-eye text-3xl text-green-600"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-dark mb-3">Radical Transparency</h3>
                    <p class="text-gray-500 text-sm">Open data dashboards show exactly how reports are handled and resolved.</p>
                </div>

                <!-- Value 4 -->
                <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 mx-auto rounded-full bg-yellow-100 flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-bolt text-3xl text-yellow-600"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-dark mb-3">Speed & Reliability</h3>
                    <p class="text-gray-500 text-sm">Incidents are broadcast in milliseconds. Downtime is not an option for safety.</p>
                </div>

                <!-- Value 5 -->
                <div class="text-center group" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-20 h-20 mx-auto rounded-full bg-rose-100 flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-heart text-3xl text-rose-500"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-dark mb-3">Inclusive Design</h3>
                    <p class="text-gray-500 text-sm">Accessible for everyone, supporting Urdu and regional languages for wider reach.</p>
                </div>

                <!-- Value 6 -->
                <div class="text-center group" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-20 h-20 mx-auto rounded-full bg-orange-100 flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-handshake text-3xl text-orange-500"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-dark mb-3">Authority Partnership</h3>
                    <p class="text-gray-500 text-sm">We work with law enforcement, not against them, to make the system work.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 8: JOURNEY TIMELINE -->
    <section class="py-28 bg-dark overflow-hidden">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-20">
                <h2 class="font-heading font-bold text-3xl md:text-5xl text-white mb-4">Our Journey</h2>
                <p class="text-gray-400">From a single idea to a national movement</p>
            </div>

            <div class="relative">
                <!-- Vertical Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 bg-gradient-to-b from-primary via-secondary to-purple-500 rounded-full opacity-20"></div>
                <div id="timeline-progress" class="absolute left-1/2 top-0 transform -translate-x-1/2 w-1 bg-gradient-to-b from-primary via-secondary to-purple-500 rounded-full timeline-line"></div>

                <!-- Timeline Items Container -->
                <div class="space-y-16">
                    
                    <!-- 2023 Q1 (Left) -->
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group" data-aos="fade-right">
                        <div class="flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-dark border-4 border-primary pulse-dot z-10">
                            <div class="w-3 h-3 bg-primary rounded-full"></div>
                        </div>
                        <div class="w-5/12 ml-auto md:ml-0 md:mr-auto pl-8 md:pl-0">
                            <div class="glass p-6 rounded-2xl border border-white/5 hover:border-primary/30 transition">
                                <span class="inline-block px-3 py-1 rounded-full bg-primary/20 text-primary text-xs font-bold mb-3">2023 Q1</span>
                                <div class="flex items-center gap-3 mb-2">
                                    <i class="fa-solid fa-lightbulb text-yellow-500"></i>
                                    <h3 class="font-heading font-bold text-xl text-white">The Spark</h3>
                                </div>
                                <p class="text-gray-400 text-sm">Ahmed Khan witnesses a snatching go unreported. Spends 3 sleepless nights planning StreetSafe.</p>
                            </div>
                        </div>
                        <div class="w-5/12"></div> <!-- Spacer for alignment -->
                    </div>

                    <!-- 2023 Q3 (Right) -->
                    <div class="relative flex items-center justify-between md:justify-normal group" data-aos="fade-left">
                        <div class="flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-dark border-4 border-secondary pulse-dot z-10">
                            <div class="w-3 h-3 bg-secondary rounded-full"></div>
                        </div>
                        <div class="w-5/12"></div> <!-- Spacer -->
                        <div class="w-5/12 ml-auto pr-8 md:pr-0">
                            <div class="glass p-6 rounded-2xl border border-white/5 hover:border-secondary/30 transition">
                                <span class="inline-block px-3 py-1 rounded-full bg-secondary/20 text-secondary text-xs font-bold mb-3">2023 Q3</span>
                                <div class="flex items-center gap-3 mb-2">
                                    <i class="fa-solid fa-rocket text-primary"></i>
                                    <h3 class="font-heading font-bold text-xl text-white">Beta Launch</h3>
                                </div>
                                <p class="text-gray-400 text-sm">500 beta users in Karachi. First stolen item recovered within 48 hours of launch.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2023 Q4 (Left) -->
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group" data-aos="fade-right">
                        <div class="flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-dark border-4 border-green-500 pulse-dot z-10">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        </div>
                        <div class="w-5/12 ml-auto md:ml-0 md:mr-auto pl-8 md:pl-0">
                            <div class="glass p-6 rounded-2xl border border-white/5 hover:border-green-500/30 transition">
                                <span class="inline-block px-3 py-1 rounded-full bg-green-500/20 text-green-400 text-xs font-bold mb-3">2023 Q4</span>
                                <div class="flex items-center gap-3 mb-2">
                                    <i class="fa-solid fa-handshake text-green-500"></i>
                                    <h3 class="font-heading font-bold text-xl text-white">Police Partnership</h3>
                                </div>
                                <p class="text-gray-400 text-sm">Signed MOU with Karachi Police. Reports now forwarded to 12 police stations automatically.</p>
                            </div>
                        </div>
                        <div class="w-5/12"></div>
                    </div>

                    <!-- 2024 Q1 (Right) -->
                    <div class="relative flex items-center justify-between md:justify-normal group" data-aos="fade-left">
                        <div class="flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-dark border-4 border-purple-500 pulse-dot z-10">
                            <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                        </div>
                        <div class="w-5/12"></div>
                        <div class="w-5/12 ml-auto pr-8 md:pr-0">
                            <div class="glass p-6 rounded-2xl border border-white/5 hover:border-purple-500/30 transition">
                                <span class="inline-block px-3 py-1 rounded-full bg-purple-500/20 text-purple-400 text-xs font-bold mb-3">2024 Q1</span>
                                <div class="flex items-center gap-3 mb-2">
                                    <i class="fa-solid fa-map text-secondary"></i>
                                    <h3 class="font-heading font-bold text-xl text-white">3 Cities</h3>
                                </div>
                                <p class="text-gray-400 text-sm">Expanded to Lahore and Islamabad. User base crosses 10,000 members.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2024 Q3 (Left) -->
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group" data-aos="fade-right">
                        <div class="flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-dark border-4 border-orange-500 pulse-dot z-10">
                            <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                        </div>
                        <div class="w-5/12 ml-auto md:ml-0 md:mr-auto pl-8 md:pl-0">
                            <div class="glass p-6 rounded-2xl border border-white/5 hover:border-orange-500/30 transition">
                                <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-xs font-bold mb-3">2024 Q3</span>
                                <div class="flex items-center gap-3 mb-2">
                                    <i class="fa-solid fa-users text-purple-400"></i>
                                    <h3 class="font-heading font-bold text-xl text-white">50,000 Users</h3>
                                </div>
                                <p class="text-gray-400 text-sm">Milestone achieved. 12,000+ reports filed. Coverage expanded to 38 cities.</p>
                            </div>
                        </div>
                        <div class="w-5/12"></div>
                    </div>

                    <!-- 2024 Q4 (Right) -->
                    <div class="relative flex items-center justify-between md:justify-normal group" data-aos="fade-left">
                        <div class="flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-dark border-4 border-yellow-500 pulse-dot z-10">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        </div>
                        <div class="w-5/12"></div>
                        <div class="w-5/12 ml-auto pr-8 md:pr-0">
                            <div class="glass p-6 rounded-2xl border border-white/5 hover:border-yellow-500/30 transition">
                                <span class="inline-block px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-400 text-xs font-bold mb-3">2024 Q4</span>
                                <div class="flex items-center gap-3 mb-2">
                                    <i class="fa-solid fa-trophy text-yellow-500"></i>
                                    <h3 class="font-heading font-bold text-xl text-white">National Recognition</h3>
                                </div>
                                <p class="text-gray-400 text-sm">Ministry of Interior recognizes StreetSafe. Won Best Civic Tech Award 2024.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 9: PARTNERS -->
    <section class="py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="font-heading font-bold text-3xl text-center text-dark mb-12">Trusted Partners & Recognition</h2>
            
            <!-- Partners Row -->
            <div class="flex flex-wrap justify-center gap-8 mb-16">
                <div class="bg-white p-6 rounded-xl w-40 h-40 flex flex-col items-center justify-center shadow-sm hover:shadow-lg hover:-translate-y-2 transition duration-300 grayscale hover:grayscale-0 cursor-pointer border border-gray-100">
                    <i class="fa-solid fa-badge-check text-4xl text-blue-600 mb-3"></i>
                    <span class="text-gray-600 font-bold text-sm">Karachi Police</span>
                </div>
                <div class="bg-white p-6 rounded-xl w-40 h-40 flex flex-col items-center justify-center shadow-sm hover:shadow-lg hover:-translate-y-2 transition duration-300 grayscale hover:grayscale-0 cursor-pointer border border-gray-100">
                    <i class="fa-solid fa-shield text-4xl text-orange-500 mb-3"></i>
                    <span class="text-gray-600 font-bold text-sm">Punjab Police</span>
                </div>
                <div class="bg-white p-6 rounded-xl w-40 h-40 flex flex-col items-center justify-center shadow-sm hover:shadow-lg hover:-translate-y-2 transition duration-300 grayscale hover:grayscale-0 cursor-pointer border border-gray-100">
                    <i class="fa-solid fa-building-columns text-4xl text-gray-600 mb-3"></i>
                    <span class="text-gray-600 font-bold text-sm">Ministry Interior</span>
                </div>
                <div class="bg-white p-6 rounded-xl w-40 h-40 flex flex-col items-center justify-center shadow-sm hover:shadow-lg hover:-translate-y-2 transition duration-300 grayscale hover:grayscale-0 cursor-pointer border border-gray-100">
                    <i class="fa-solid fa-microchip text-4xl text-green-600 mb-3"></i>
                    <span class="text-gray-600 font-bold text-sm">PITB</span>
                </div>
                <div class="bg-white p-6 rounded-xl w-40 h-40 flex flex-col items-center justify-center shadow-sm hover:shadow-lg hover:-translate-y-2 transition duration-300 grayscale hover:grayscale-0 cursor-pointer border border-gray-100">
                    <i class="fa-solid fa-wifi text-4xl text-purple-600 mb-3"></i>
                    <span class="text-gray-600 font-bold text-sm">Jazz Pakistan</span>
                </div>
                <div class="bg-white p-6 rounded-xl w-40 h-40 flex flex-col items-center justify-center shadow-sm hover:shadow-lg hover:-translate-y-2 transition duration-300 grayscale hover:grayscale-0 cursor-pointer border border-gray-100">
                    <i class="fa-solid fa-signal text-4xl text-cyan-600 mb-3"></i>
                    <span class="text-gray-600 font-bold text-sm">Telenor</span>
                </div>
            </div>

            <!-- Awards Row -->
            <div class="flex flex-wrap justify-center gap-8">
                <div class="relative group overflow-hidden rounded-xl p-1 w-64">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-yellow-600 opacity-75 group-hover:opacity-100 transition"></div>
                    <div class="bg-white h-full rounded-[10px] p-6 flex flex-col items-center justify-center text-center relative z-10">
                        <i class="fa-solid fa-trophy text-5xl text-yellow-500 mb-3 drop-shadow-sm"></i>
                        <h4 class="font-bold text-dark">Best Civic Tech 2024</h4>
                        <span class="text-xs text-gray-500 font-bold">National Awards</span>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-xl p-1 w-64">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-blue-600 opacity-75 group-hover:opacity-100 transition"></div>
                    <div class="bg-white h-full rounded-[10px] p-6 flex flex-col items-center justify-center text-center relative z-10">
                        <i class="fa-solid fa-star text-5xl text-primary mb-3 drop-shadow-sm"></i>
                        <h4 class="font-bold text-dark">Top Safety App</h4>
                        <span class="text-xs text-gray-500 font-bold">Pakistan Tech Summit</span>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-xl p-1 w-64">
                    <div class="absolute inset-0 bg-gradient-to-r from-red-500 to-pink-600 opacity-75 group-hover:opacity-100 transition"></div>
                    <div class="bg-white h-full rounded-[10px] p-6 flex flex-col items-center justify-center text-center relative z-10">
                        <i class="fa-solid fa-heart text-5xl text-red-500 mb-3 drop-shadow-sm"></i>
                        <h4 class="font-bold text-dark">Social Impact Award</h4>
                        <span class="text-xs text-gray-500 font-bold">NGO Alliance</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 10: CTA -->
    <section class="py-28 animated-gradient-bg text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-dark/30"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-4">
            <h2 class="font-heading font-extrabold text-4xl md:text-6xl text-white mb-6 leading-tight">Ready to Make Pakistan Safer?</h2>
            <p class="text-white/80 text-lg md:text-xl mb-10 font-light">Join 50,000+ citizens already making a difference. It takes 60 seconds to sign up.</p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/register" class="bg-white text-dark font-bold px-10 py-4 rounded-full hover:scale-105 transition transform shadow-[0_0_30px_rgba(255,255,255,0.3)] hover:shadow-[0_0_40px_rgba(255,255,255,0.5)]">
                    Get Started Free
                </a>
                <a href="/map" class="bg-transparent border-2 border-white text-white font-bold px-10 py-4 rounded-full hover:bg-white/10 transition">
                    View Safety Map
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark pt-20 pb-10 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fa-solid fa-shield-halved text-3xl text-primary"></i>
                        <span class="font-heading font-bold text-2xl text-white">StreetSafe</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-6">Empowering citizens with real-time safety tools. Building a safer Pakistan, together.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6">Platform</h4>
                    <ul class="space-y-3 text-gray-500 text-sm">
                        <li><a href="/" class="hover:text-secondary transition">Home</a></li>
                        <li><a href="/map" class="hover:text-secondary transition">Safety Map</a></li>
                        <li><a href="/about" class="hover:text-secondary transition">About Us</a></li>
                        <li><a href="/contact" class="hover:text-secondary transition">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6">Actions</h4>
                    <ul class="space-y-3 text-gray-500 text-sm">
                        <li><a href="{{ route('incident') }}" class="hover:text-secondary transition">Report Incident</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-secondary transition">Login</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-secondary transition">Register</a></li>
                        <li><a href="#" class="hover:text-secondary transition">Volunteer</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6">Legal</h4>
                    <ul class="space-y-3 text-gray-500 text-sm">
                        <li><a href="{{ route('privacy') }}" class="hover:text-secondary transition">Privacy Policy</a></li>
                        <li><a href="/terms" class="hover:text-secondary transition">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-secondary transition">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-600 text-sm">&copy; 2024 StreetSafe Pakistan. All rights reserved.</p>
                <div class="flex items-center gap-2 text-gray-600 text-sm">
                    <span>Made with</span>
                    <i class="fa-solid fa-heart text-red-500 animate-pulse"></i>
                    <span>in Karachi</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Main Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Initialize AOS
            AOS.init({
                duration: 900,
                once: true,
                offset: 80,
                easing: 'ease-out-cubic'
            });

            // 2. Navbar Scroll Blur Effect
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-dark/95', 'shadow-lg');
                    navbar.classList.remove('bg-dark/80');
                } else {
                    navbar.classList.remove('bg-dark/95', 'shadow-lg');
                    navbar.classList.add('bg-dark/80');
                }
            });

            // 3. Mobile Menu
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const closeBtn = document.getElementById('close-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            function toggleMenu() {
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('translate-x-full');
            }

            mobileBtn.addEventListener('click', toggleMenu);
            closeBtn.addEventListener('click', toggleMenu);

            // 4. Particle Generation
            const particlesContainer = document.getElementById('particles-container');
            const particleCount = 20;

            for (let i = 0; i < particleCount; i++) {
                const span = document.createElement('span');
                span.classList.add('particle');
                
                // Random styles
                const size = Math.random() * 6 + 2; // 3px to 8px
                const left = Math.random() * 100;
                const delay = Math.random() * 5;
                const duration = Math.random() * 10 + 10; // 10s to 20s
                
                // Color variation (blue to cyan)
                const isBlue = Math.random() > 0.5;
                const color = isBlue ? 'rgba(26,115,232,' : 'rgba(0,212,255,';
                const opacity = Math.random() * 0.5 + 0.1;

                span.style.width = `${size}px`;
                span.style.height = `${size}px`;
                span.style.left = `${left}%`;
                span.style.backgroundColor = `${color}${opacity})`;
                span.style.animation = `floatUp ${duration}s linear infinite`;
                span.style.animationDelay = `-${delay}s`;

                particlesContainer.appendChild(span);
            }

            // 5. Counter Animation (Intersection Observer)
            const counters = document.querySelectorAll('.counter-section, .counter');
            
            const observerOptions = {
                threshold: 0.5
            };

            const counterObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = +entry.target.getAttribute('data-target');
                        const duration = 2000; // 2 seconds
                        const increment = target / (duration / 16); // 60fps
                        
                        let current = 0;
                        const updateCounter = () => {
                            current += increment;
                            if (current < target) {
                                entry.target.innerText = Math.ceil(current).toLocaleString();
                                requestAnimationFrame(updateCounter);
                            } else {
                                entry.target.innerText = target.toLocaleString();
                            }
                        };
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });

            // 6. Timeline Line Animation
            const timelineSection = document.querySelector('#timeline-progress');
            if(timelineSection) {
                const lineObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if(entry.isIntersecting) {
                            entry.target.classList.add('active');
                        }
                    });
                }, { threshold: 0.1 });
                
                lineObserver.observe(timelineSection.parentElement);
            }
        });
    </script>
</body>
</html>