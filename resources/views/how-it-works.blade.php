<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How It Works - StreetSafe</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0A0F1E',
                        accent: '#1A73E8',
                        secondary: '#00D4FF',
                        navy: '#0A0F1E',
                        lightBg: '#F4F6FA',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        'neon': '0 0 15px rgba(0, 212, 255, 0.5)',
                        'neon-blue': '0 0 15px rgba(26, 115, 232, 0.5)',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'bounce-slow': 'bounce 2s infinite',
                        'gradient-x': 'gradient-x 3s ease infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        'gradient-x': {
                            '0%, 100%': { 'background-size': '200% 200%', 'background-position': 'left center' },
                            '50%': { 'background-size': '200% 200%', 'background-position': 'right center' },
                        },
                    }
                }
            }
        }
    </script>

    <style>
        body { background-color: #F8FAFC; overflow-x: hidden; }

        /* ✅ SAME NAVBAR STYLES AS LANDING PAGE */
        .glass-nav {
            background: rgba(10, 15, 30, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-card-dark {
            background: rgba(10, 15, 30, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .map-pattern {
            background-color: #0f172a;
            background-image: linear-gradient(#1e293b 1px, transparent 1px),
            linear-gradient(90deg, #1e293b 1px, transparent 1px);
            background-size: 20px 20px;
        }

        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #0A0F1E; }
        ::-webkit-scrollbar-thumb { background: #1A73E8; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #00D4FF; }

        .step-number-outline {
            -webkit-text-stroke: 1px rgba(255,255,255,0.1);
            color: transparent;
            line-height: 1;
        }

        /* ✅ SAME AS LANDING PAGE - particle */
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
            0% { transform: translateY(0) scale(1); opacity: 0; }
            20% { opacity: 0.5; }
            80% { opacity: 0.5; }
            100% { transform: translateY(-110vh) scale(1.5); opacity: 0; }
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">

    <!-- ✅ NAVBAR — EXACT SAME AS LANDING PAGE -->
    <nav id="navbar" class="fixed w-full top-0 z-50 transition-all duration-300 py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2 group">
                <div class="bg-accent text-white p-2 rounded-lg group-hover:shadow-neon-blue transition-shadow duration-300">
                    <i class="fa-solid fa-shield-halved text-xl"></i>
                </div>
                <span class="text-2xl font-bold font-heading tracking-wide text-white">StreetSafe</span>
            </a>

            <!-- Desktop Menu — SAME LINKS AS LANDING -->
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-secondary transition-colors font-medium">Home</a>
                <a href="{{ route('how-it-works') }}" class="text-secondary font-medium border-b-2 border-secondary pb-1">How It Works</a>
                <a href="{{ route('map') }}" class="text-gray-300 hover:text-secondary transition-colors font-medium">Safety Map</a>
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-secondary transition-colors font-medium">About</a>
                <a href="{{ route('contact') }}" class="text-gray-300 hover:text-secondary transition-colors font-medium">Contact</a>
            </div>

            <!-- Auth Buttons — SAME AS LANDING -->
            <div class="hidden md:flex items-center gap-4">
                <a class="px-5 py-2 rounded-full border border-accent text-accent hover:bg-accent hover:text-white transition-all duration-300 font-medium" href="/login">Login</a>
                <a class="px-5 py-2 rounded-full bg-accent text-white shadow-neon-blue hover:scale-105 transition-all duration-300 font-medium" href="{{ route('login') }}">Register</a>
            </div>

            <!-- Mobile Hamburger -->
            <button id="mobile-menu-btn" class="md:hidden text-2xl text-white focus:outline-none">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu — SAME AS LANDING -->
        <div id="mobile-menu" class="fixed inset-0 bg-primary/95 backdrop-blur-lg z-40 transform translate-x-full transition-transform duration-300 flex flex-col items-center justify-center gap-8 md:hidden">
            <button id="close-menu-btn" class="absolute top-6 right-6 text-3xl text-white">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <a href="{{ route('home') }}" class="text-2xl font-medium text-white hover:text-secondary">Home</a>
            <a href="{{ route('how-it-works') }}" class="text-2xl font-medium text-secondary">How It Works</a>
            <a href="{{ route('map') }}" class="text-2xl font-medium text-white hover:text-secondary">Safety Map</a>
            <a href="{{ route('about') }}" class="text-2xl font-medium text-white hover:text-secondary">About</a>
            <a href="{{ route('contact') }}" class="text-2xl font-medium text-white hover:text-secondary">Contact</a>
            <div class="flex flex-col gap-4 mt-4 w-3/4">
                <a href="{{ route('login') }}" class="w-full py-3 rounded-full border border-accent text-accent font-medium text-center">Login</a>
                <a href="{{ route('login') }}" class="w-full py-3 rounded-full bg-accent text-white font-medium shadow-neon-blue text-center">Register</a>
            </div>
        </div>
    </nav>

    <!-- SECTION 1: HERO -->
    <section class="relative h-[55vh] bg-navy flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div id="particles-container" class="absolute inset-0 w-full h-full"></div>
            <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-accent/10 rounded-full blur-[100px] animate-float"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-secondary/10 rounded-full blur-[100px] animate-float" style="animation-delay: 2s;"></div>
        </div>

        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <h1 data-aos="fade-up" data-aos-delay="100" class="font-heading font-bold text-5xl md:text-6xl leading-tight text-white mb-6 mt-9">
                How StreetSafe <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-secondary">Keeps You Safe</span>
            </h1>
            <p data-aos="fade-up" data-aos-delay="200" class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mb-8">
                A step-by-step guide to reporting incidents, recovering missing items, and working with authorities to make your city safer.
            </p>
            <div data-aos="fade-up" data-aos-delay="300" class="flex flex-wrap justify-center gap-4 mb-12">
                <div class="px-4 py-2 rounded-lg glass-card-dark text-white text-sm font-medium border border-white/10">3 Simple Steps</div>
                <div class="px-4 py-2 rounded-lg glass-card-dark text-white text-sm font-medium border border-white/10">100% Anonymous</div>
                <div class="px-4 py-2 rounded-lg glass-card-dark text-white text-sm font-medium border border-white/10">24/7 Available</div>
            </div>
        </div>

        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 text-secondary animate-bounce cursor-pointer">
            <i class="fa-solid fa-chevron-down text-2xl"></i>
        </div>
    </section>

    <!-- SECTION 2: USER TYPES SELECTOR -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 data-aos="fade-up" class="font-heading font-bold text-4xl text-navy mb-4">Who Are You?</h2>
                <p data-aos="fade-up" data-aos-delay="100" class="text-gray-500 text-lg">Select your role to see how StreetSafe works for you</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div id="card-citizen" onclick="switchRole('citizen')" class="role-card cursor-pointer group p-8 rounded-2xl border-2 border-accent/20 hover:border-accent bg-accent/5 transition-all duration-300 relative overflow-hidden h-full">
                    <div class="absolute top-4 right-4 opacity-0 transition-opacity duration-300 check-icon">
                        <div class="w-6 h-6 bg-accent rounded-full flex items-center justify-center text-white text-xs"><i class="fa-solid fa-check"></i></div>
                    </div>
                    <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center text-accent text-3xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-navy mb-3">I'm a Citizen</h3>
                    <p class="text-gray-500 mb-6">Report incidents, track missing items, check area safety</p>
                    <button class="w-full py-3 bg-accent text-white rounded-xl font-semibold transition-colors shadow-lg shadow-accent/20">View My Guide</button>
                </div>

                <div id="card-shopkeeper" onclick="switchRole('shopkeeper')" class="role-card cursor-pointer group p-8 rounded-2xl border-2 border-transparent hover:border-green-500 hover:bg-green-50/50 transition-all duration-300 relative overflow-hidden h-full opacity-60 hover:opacity-100">
                    <div class="absolute top-4 right-4 opacity-0 transition-opacity duration-300 check-icon">
                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white text-xs"><i class="fa-solid fa-check"></i></div>
                    </div>
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-3xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-shop"></i>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-navy mb-3">I'm a Shopkeeper</h3>
                    <p class="text-gray-500 mb-6">Verify suspicious items, protect my business</p>
                    <button class="w-full py-3 bg-green-500 text-white rounded-xl font-semibold transition-colors shadow-lg shadow-green-500/20">View My Guide</button>
                </div>

                <div id="card-authority" onclick="switchRole('authority')" class="role-card cursor-pointer group p-8 rounded-2xl border-2 border-transparent hover:border-orange-500 hover:bg-orange-50/50 transition-all duration-300 relative overflow-hidden h-full opacity-60 hover:opacity-100">
                    <div class="absolute top-4 right-4 opacity-0 transition-opacity duration-300 check-icon">
                        <div class="w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center text-white text-xs"><i class="fa-solid fa-check"></i></div>
                    </div>
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center text-orange-500 text-3xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-building-shield"></i>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-navy mb-3">I'm an Authority</h3>
                    <p class="text-gray-500 mb-6">Receive reports, manage cases, analyze data</p>
                    <button class="w-full py-3 bg-orange-500 text-white rounded-xl font-semibold transition-colors shadow-lg shadow-orange-500/20">View My Guide</button>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: CITIZEN GUIDE -->
    <section id="guide-citizen" class="py-20 bg-navy text-white relative transition-all duration-500 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <span class="text-secondary font-bold tracking-wider uppercase text-sm">Workflow</span>
                <h2 class="font-heading font-bold text-4xl md:text-5xl mt-2">Guide for Citizens</h2>
                <div class="w-20 h-1 bg-secondary mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Step 1 -->
            <div class="grid md:grid-cols-2 gap-12 items-center mb-24">
                <div data-aos="fade-right">
                    <div class="relative">
                        <span class="absolute -top-10 -left-6 text-9xl font-heading font-bold step-number-outline opacity-30">01</span>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-accent/20 rounded-full flex items-center justify-center text-accent text-2xl mb-6 border border-accent/30">
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                            <h3 class="font-heading font-bold text-3xl mb-4">Register Anonymously</h3>
                            <p class="text-gray-400 text-lg leading-relaxed mb-6">Create your account in under 60 seconds. We only need an email and city — no CNIC, no phone verification required for basic reporting. Your identity is encrypted and never shared.</p>
                            <div class="flex flex-wrap gap-3 mb-8">
                                <span class="px-3 py-1 bg-white/5 rounded-full text-sm border border-white/10">60 Second Setup</span>
                                <span class="px-3 py-1 bg-white/5 rounded-full text-sm border border-white/10">No CNIC Required</span>
                                <span class="px-3 py-1 bg-white/5 rounded-full text-sm border border-white/10">Encrypted Data</span>
                            </div>
                            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-accent hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                                Register Now <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left">
                    <div class="glass-card-dark rounded-2xl p-8 border border-white/10 relative">
                        <div class="absolute top-0 right-0 p-4 opacity-50"><i class="fa-solid fa-circle-notch fa-spin text-accent"></i></div>
                        <h4 class="text-xl font-bold mb-6">Create Account</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-500 uppercase">Email Address</label>
                                <div class="h-10 bg-white/5 rounded border border-white/10 mt-1 flex items-center px-3 text-sm text-gray-300">user@example.com</div>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500 uppercase">City</label>
                                <div class="h-10 bg-white/5 rounded border border-white/10 mt-1 flex items-center px-3 text-sm text-secondary">Karachi</div>
                            </div>
                            <div class="h-10 bg-accent rounded-lg flex items-center justify-center font-bold text-white shadow-lg shadow-accent/20 mt-2 animate-pulse">Sign Up Securely</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="grid md:grid-cols-2 gap-12 items-center mb-24">
                <div data-aos="fade-right" class="order-2 md:order-1">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-red-500/10 border border-red-500/20 p-4 rounded-xl text-center">
                            <i class="fa-solid fa-mask text-red-500 text-2xl mb-2"></i>
                            <p class="text-sm font-medium">Snatching</p>
                        </div>
                        <div class="bg-orange-500/10 border border-orange-500/20 p-4 rounded-xl text-center">
                            <i class="fa-solid fa-road text-orange-500 text-2xl mb-2"></i>
                            <p class="text-sm font-medium">Road Damage</p>
                        </div>
                        <div class="bg-purple-500/10 border border-purple-500/20 p-4 rounded-xl text-center">
                            <i class="fa-solid fa-triangle-exclamation text-purple-500 text-2xl mb-2"></i>
                            <p class="text-sm font-medium">Harassment</p>
                        </div>
                        <div class="bg-yellow-500/10 border border-yellow-500/20 p-4 rounded-xl text-center">
                            <i class="fa-solid fa-traffic-light text-yellow-500 text-2xl mb-2"></i>
                            <p class="text-sm font-medium">Traffic Issue</p>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" class="order-1 md:order-2">
                    <div class="relative">
                        <span class="absolute -top-10 -right-6 text-9xl font-heading font-bold step-number-outline opacity-30">02</span>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-red-500/20 rounded-full flex items-center justify-center text-red-500 text-2xl mb-6 border border-red-500/30">
                                <i class="fa-solid fa-flag"></i>
                            </div>
                            <h3 class="font-heading font-bold text-3xl mb-4">Report Any Incident</h3>
                            <p class="text-gray-400 text-lg leading-relaxed mb-6">Choose from 4 incident types: Snatching/Robbery, Road Damage, Harassment Zone, or Traffic Issue. Add photos, pin the location, and submit — all in under 2 minutes.</p>
                            <div class="flex flex-wrap gap-3 mb-8">
                                <span class="px-3 py-1 bg-red-500/10 text-red-400 rounded-full text-sm border border-red-500/20">🔴 Snatching</span>
                                <span class="px-3 py-1 bg-orange-500/10 text-orange-400 rounded-full text-sm border border-orange-500/20">🟠 Road Damage</span>
                                <span class="px-3 py-1 bg-purple-500/10 text-purple-400 rounded-full text-sm border border-purple-500/20">🟣 Harassment</span>
                                <span class="px-3 py-1 bg-yellow-500/10 text-yellow-400 rounded-full text-sm border border-yellow-500/20">🟡 Traffic</span>
                            </div>
                            <a href="{{ route('incident') }}" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                                Start Reporting <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="grid md:grid-cols-2 gap-12 items-center mb-24">
                <div data-aos="fade-right">
                    <div class="relative">
                        <span class="absolute -top-10 -left-6 text-9xl font-heading font-bold step-number-outline opacity-30">03</span>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-secondary/20 rounded-full flex items-center justify-center text-secondary text-2xl mb-6 border border-secondary/30">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <h3 class="font-heading font-bold text-3xl mb-4">Track in Real-Time</h3>
                            <p class="text-gray-400 text-lg leading-relaxed mb-6">Once submitted, your report gets a unique ID. Track its progress from 'Pending' to 'Under Review' to 'Resolved'. Get notified at every step.</p>
                            <div class="flex items-center justify-between mb-8 bg-white/5 p-4 rounded-xl border border-white/10">
                                <div class="flex flex-col items-center">
                                    <div class="w-3 h-3 rounded-full bg-green-500 mb-1 shadow-[0_0_10px_#22c55e]"></div>
                                    <span class="text-[10px] uppercase text-gray-400">Submitted</span>
                                </div>
                                <div class="h-0.5 w-8 bg-gray-600"></div>
                                <div class="flex flex-col items-center">
                                    <div class="w-3 h-3 rounded-full bg-green-500 mb-1 shadow-[0_0_10px_#22c55e]"></div>
                                    <span class="text-[10px] uppercase text-gray-400">Assigned</span>
                                </div>
                                <div class="h-0.5 w-8 bg-gray-600"></div>
                                <div class="flex flex-col items-center">
                                    <div class="w-3 h-3 rounded-full bg-secondary mb-1 animate-pulse"></div>
                                    <span class="text-[10px] uppercase text-secondary">Review</span>
                                </div>
                                <div class="h-0.5 w-8 bg-gray-600"></div>
                                <div class="flex flex-col items-center">
                                    <div class="w-3 h-3 rounded-full bg-gray-600 mb-1"></div>
                                    <span class="text-[10px] uppercase text-gray-600">Resolved</span>
                                </div>
                            </div>
                            <a href="/dashboard" class="inline-flex items-center gap-2 border border-secondary text-secondary hover:bg-secondary hover:text-navy px-6 py-3 rounded-lg font-semibold transition-colors">
                                View Dashboard
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left">
                    <div class="glass-card-dark rounded-2xl p-6 border border-white/10">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-xs text-gray-500">Report ID</p>
                                <p class="font-mono text-secondary">#STR-8829</p>
                            </div>
                            <span class="px-2 py-1 bg-secondary/20 text-secondary text-xs rounded border border-secondary/30">In Progress</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex gap-3 text-sm"><i class="fa-solid fa-check-circle text-green-500 mt-1"></i><p class="text-gray-300">Report received successfully</p></div>
                            <div class="flex gap-3 text-sm"><i class="fa-solid fa-check-circle text-green-500 mt-1"></i><p class="text-gray-300">Verified by admin</p></div>
                            <div class="flex gap-3 text-sm"><div class="w-4 h-4 border-2 border-secondary border-t-transparent rounded-full animate-spin mt-0.5"></div><p class="text-white font-medium">Officer assigned</p></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="grid md:grid-cols-2 gap-12 items-center mb-24">
                <div data-aos="fade-right" class="order-2 md:order-1">
                    <div class="glass-card-dark rounded-2xl p-6 border border-white/10">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-16 h-16 bg-gray-700 rounded-lg flex items-center justify-center text-gray-400"><i class="fa-solid fa-image"></i></div>
                            <div>
                                <div class="h-4 bg-white/10 w-32 rounded mb-2"></div>
                                <div class="h-3 bg-white/10 w-20 rounded"></div>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="h-10 bg-white/5 rounded border border-purple-500/30"></div>
                            <div class="h-10 bg-white/5 rounded border border-white/10"></div>
                            <div class="flex justify-between mt-4">
                                <div class="text-xs text-purple-400 bg-purple-500/10 px-2 py-1 rounded"><i class="fa-solid fa-gift mr-1"></i> Reward: PKR 5000</div>
                                <div class="text-xs text-gray-500">IMEI: 8492...</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" class="order-1 md:order-2">
                    <div class="relative">
                        <span class="absolute -top-10 -right-6 text-9xl font-heading font-bold step-number-outline opacity-30">04</span>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-purple-500/20 rounded-full flex items-center justify-center text-purple-400 text-2xl mb-6 border border-purple-500/30">
                                <i class="fa-solid fa-mobile-screen"></i>
                            </div>
                            <h3 class="font-heading font-bold text-3xl mb-4">Report Lost or Stolen Items</h3>
                            <p class="text-gray-400 text-lg leading-relaxed mb-6">Report your lost item with photos, description, and IMEI/serial number. Shopkeepers across the city instantly have access to search our database.</p>
                            <div class="flex flex-wrap gap-3 mb-8">
                                <span class="px-3 py-1 bg-green-500/10 text-green-400 rounded-full text-sm border border-green-500/20"><i class="fa-solid fa-store mr-1"></i> Shopkeeper Network</span>
                                <span class="px-3 py-1 bg-yellow-500/10 text-yellow-400 rounded-full text-sm border border-yellow-500/20"><i class="fa-solid fa-gift mr-1"></i> Reward System</span>
                            </div>
                            <a href="{{ route('missing-item') }}" class="inline-flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                                Report Missing Item
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <div class="relative">
                        <span class="absolute -top-10 -left-6 text-9xl font-heading font-bold step-number-outline opacity-30">05</span>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-green-500/20 rounded-full flex items-center justify-center text-green-400 text-2xl mb-6 border border-green-500/30">
                                <i class="fa-solid fa-map"></i>
                            </div>
                            <h3 class="font-heading font-bold text-3xl mb-4">Use the Safety Map</h3>
                            <p class="text-gray-400 text-lg leading-relaxed mb-6">Before going anywhere, check the real-time safety map. See crime hotspots, harassment zones, and road conditions in your city.</p>
                            <a href="{{ route('map') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                                Open Safety Map
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left">
                    <div class="w-full h-64 map-pattern rounded-2xl border border-white/10 relative overflow-hidden shadow-2xl">
                        <div class="absolute top-1/3 left-1/4 text-red-500 text-2xl animate-bounce drop-shadow-[0_0_10px_rgba(239,68,68,0.5)]"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="absolute top-1/2 left-1/2 text-yellow-500 text-xl animate-bounce drop-shadow-[0_0_10px_rgba(234,179,8,0.5)]" style="animation-delay: 0.5s"><i class="fa-solid fa-triangle-exclamation"></i></div>
                        <div class="absolute bottom-1/3 right-1/4 text-secondary text-2xl animate-bounce drop-shadow-[0_0_10px_rgba(6,182,212,0.5)]" style="animation-delay: 1s"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="absolute bottom-4 left-4 right-4 bg-navy/90 backdrop-blur border border-white/10 p-3 rounded-lg flex justify-between items-center">
                            <span class="text-xs font-bold text-gray-300">LIVE UPDATES</span>
                            <span class="text-xs text-red-400 flex items-center gap-1"><span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span> 3 Incidents Nearby</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: SHOPKEEPER GUIDE -->
    <section id="guide-shopkeeper" class="py-20 bg-white hidden transition-all duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <span class="text-green-600 font-bold tracking-wider uppercase text-sm">Business Protection</span>
                <h2 class="font-heading font-bold text-4xl md:text-5xl mt-2 text-navy">Guide for Shopkeepers</h2>
                <div class="w-20 h-1 bg-green-500 mx-auto mt-4 rounded-full"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
                <div data-aos="fade-right">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-3xl mb-6"><i class="fa-solid fa-shop"></i></div>
                    <h3 class="font-heading font-bold text-3xl text-navy mb-4">Register as a Verified Shopkeeper</h3>
                    <p class="text-gray-500 text-lg leading-relaxed mb-8">Sign up with your shop name, location, and trade license. Verified shopkeepers get access to the full stolen items database.</p>
                    <a href="/shopkeeper/portal" class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-lg font-semibold transition-all shadow-lg shadow-green-500/20">Register Shop</a>
                </div>
                <div data-aos="fade-left">
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200">
                        <div class="bg-white p-4 rounded-xl shadow-md mb-4">
                            <div class="flex items-center gap-3 border border-gray-200 p-3 rounded-lg">
                                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                                <span class="text-gray-400 text-sm">Search item, model, serial...</span>
                            </div>
                        </div>
                        <p class="text-sm text-center text-gray-400">Search results appear instantly</p>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
                <div data-aos="fade-right" class="order-2 md:order-1">
                    <div class="bg-red-50 p-8 rounded-2xl border border-red-100 text-center">
                        <i class="fa-solid fa-triangle-exclamation text-4xl text-red-500 mb-4"></i>
                        <h4 class="font-bold text-xl text-red-600 mb-2">Suspicious Activity?</h4>
                        <p class="text-gray-500 mb-4">Report directly to police with one click.</p>
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm">Report Suspicion</button>
                    </div>
                </div>
                <div data-aos="fade-left" class="order-1 md:order-2">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center text-red-500 text-3xl mb-6"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <h3 class="font-heading font-bold text-3xl text-navy mb-4">Report to Authorities Instantly</h3>
                    <p class="text-gray-500 text-lg leading-relaxed">If you find a match or see suspicious activity, click 'Report Suspicion'. Your report goes directly to the nearest police station.</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center text-orange-500 text-3xl mb-6"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3 class="font-heading font-bold text-3xl text-navy mb-4">Keep Your Area Safe</h3>
                    <p class="text-gray-500 text-lg leading-relaxed">Monitor safety alerts near your shop. Get notified of snatching or crime reports in your area.</p>
                </div>
                <div data-aos="fade-left">
                    <div class="bg-orange-50 p-6 rounded-2xl border border-orange-100">
                        <div class="flex items-center gap-4 mb-4 border-b border-orange-100 pb-4">
                            <div class="w-10 h-10 bg-orange-200 rounded-full flex items-center justify-center"><i class="fa-solid fa-bell text-orange-600"></i></div>
                            <div><p class="font-bold text-navy text-sm">Snatching Alert</p><p class="text-xs text-gray-500">500m away • 10 mins ago</p></div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center"><i class="fa-solid fa-circle-info text-accent"></i></div>
                            <div><p class="font-bold text-navy text-sm">Patrol Updated</p><p class="text-xs text-gray-500">Increased security in Block A</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: AUTHORITY GUIDE -->
    <section id="guide-authority" class="py-20 bg-navy text-white hidden transition-all duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <span class="text-orange-500 font-bold tracking-wider uppercase text-sm">Admin & Control</span>
                <h2 class="font-heading font-bold text-4xl md:text-5xl mt-2">Guide for Authorities</h2>
                <div class="w-20 h-1 bg-orange-500 mx-auto mt-4 rounded-full"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div data-aos="fade-up" class="glass-card-dark p-8 rounded-2xl border border-white/5 hover:border-orange-500/50 transition-colors">
                    <div class="w-14 h-14 bg-orange-500/20 rounded-full flex items-center justify-center text-orange-500 text-2xl mb-6 border border-orange-500/30"><i class="fa-solid fa-id-badge"></i></div>
                    <h3 class="font-heading font-bold text-2xl mb-3">Get Access</h3>
                    <p class="text-gray-400 leading-relaxed">Police stations and civic departments apply for verified authority accounts. Access is granted after identity verification.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="glass-card-dark p-8 rounded-2xl border border-white/5 hover:border-orange-500/50 transition-colors">
                    <div class="w-14 h-14 bg-accent/20 rounded-full flex items-center justify-center text-accent text-2xl mb-6 border border-accent/30"><i class="fa-solid fa-satellite-dish"></i></div>
                    <h3 class="font-heading font-bold text-2xl mb-3">Live Reports</h3>
                    <p class="text-gray-400 leading-relaxed">See all incoming reports on a live dashboard. Filter by type, location, priority. New critical reports flash with alerts.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="glass-card-dark p-8 rounded-2xl border border-white/5 hover:border-orange-500/50 transition-colors">
                    <div class="w-14 h-14 bg-secondary/20 rounded-full flex items-center justify-center text-secondary text-2xl mb-6 border border-secondary/30"><i class="fa-solid fa-users-gear"></i></div>
                    <h3 class="font-heading font-bold text-2xl mb-3">Manage Cases</h3>
                    <p class="text-gray-400 leading-relaxed">Assign cases to officers, track progress, add internal notes, and update case status visible to the reporting citizen.</p>
                </div>
            </div>
            <div class="mt-20">
                <div class="glass-card-dark p-10 rounded-3xl border border-white/10 relative overflow-hidden">
                    <div class="relative z-10 grid md:grid-cols-2 gap-12 items-center">
                        <div>
                            <h3 class="font-heading font-bold text-3xl mb-4">Use Crime Analytics</h3>
                            <p class="text-gray-400 text-lg leading-relaxed mb-8">Access the full analytics dashboard with crime heatmaps, peak hours, area rankings, and monthly trend reports to deploy resources smarter.</p>
                            <a href="/authority/dashboard" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg font-semibold transition-all shadow-lg shadow-orange-500/20">Authority Panel</a>
                        </div>
                        <div class="h-64 flex items-end gap-4 px-4">
                            <div class="w-full bg-accent/30 rounded-t-lg h-[40%] relative group"><div class="absolute bottom-0 w-full bg-accent h-full rounded-t-lg transition-all duration-500 group-hover:bg-secondary"></div></div>
                            <div class="w-full bg-accent/30 rounded-t-lg h-[70%] relative group"><div class="absolute bottom-0 w-full bg-accent h-full rounded-t-lg transition-all duration-500 group-hover:bg-secondary"></div></div>
                            <div class="w-full bg-accent/30 rounded-t-lg h-[50%] relative group"><div class="absolute bottom-0 w-full bg-accent h-full rounded-t-lg transition-all duration-500 group-hover:bg-secondary"></div></div>
                            <div class="w-full bg-accent/30 rounded-t-lg h-[90%] relative group"><div class="absolute bottom-0 w-full bg-orange-500 h-full rounded-t-lg transition-all duration-500 group-hover:bg-orange-400 shadow-[0_0_20px_rgba(249,115,22,0.5)]"></div></div>
                            <div class="w-full bg-accent/30 rounded-t-lg h-[60%] relative group"><div class="absolute bottom-0 w-full bg-accent h-full rounded-t-lg transition-all duration-500 group-hover:bg-secondary"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: FEATURES -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-heading font-bold text-4xl text-navy mb-4">Key Features Explained</h2>
                <p class="text-gray-500 text-lg">Everything you need to know about StreetSafe's tools</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div data-aos="fade-up" class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-accent/10 rounded-xl flex items-center justify-center text-accent text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fa-solid fa-user-secret"></i></div>
                    <h3 class="font-heading font-bold text-xl text-navy mb-3">Anonymous Reporting</h3>
                    <p class="text-gray-500">Your name, CNIC, and contact info are never visible to other users or third parties.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center text-green-600 text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fa-solid fa-store"></i></div>
                    <h3 class="font-heading font-bold text-xl text-navy mb-3">Shopkeeper Network</h3>
                    <p class="text-gray-500">Over 2,000 registered shopkeepers across Pakistan can search the stolen items database in real-time.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-secondary/10 rounded-xl flex items-center justify-center text-secondary text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fa-solid fa-map-location-dot"></i></div>
                    <h3 class="font-heading font-bold text-xl text-navy mb-3">Real-Time Safety Map</h3>
                    <p class="text-gray-500">Interactive map showing all incident types with filters. Heatmap overlay shows crime density by area.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center text-orange-500 text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fa-solid fa-bolt"></i></div>
                    <h3 class="font-heading font-bold text-xl text-navy mb-3">Instant Authority Alerts</h3>
                    <p class="text-gray-500">Critical reports trigger immediate alerts to the nearest police station. Response time reduced by 40%.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="400" class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center text-purple-500 text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fa-solid fa-gift"></i></div>
                    <h3 class="font-heading font-bold text-xl text-navy mb-3">Reward System</h3>
                    <p class="text-gray-500">Offer a reward for your missing item. Finder and shopkeepers are notified. 100% secure reward transfer.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="500" class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-500 text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fa-solid fa-star"></i></div>
                    <h3 class="font-heading font-bold text-xl text-navy mb-3">Area Safety Score</h3>
                    <p class="text-gray-500">Each area gets a 0-100 safety score based on reports, resolutions, and time. Updated daily.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: FAQ -->
    <section class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-heading font-bold text-4xl text-navy mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-500 text-lg">Everything you need to know</p>
            </div>
            <div class="space-y-4" id="faq-container">
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button onclick="toggleAccordion(this)" class="w-full px-6 py-4 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition-colors">
                        <span class="font-semibold text-navy text-left">Is StreetSafe really anonymous?</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="px-6 py-4 bg-white text-gray-600">Yes. We use end-to-end encryption for all personal data. Your CNIC and contact details are stored encrypted and never shared with other users or third parties.</div>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button onclick="toggleAccordion(this)" class="w-full px-6 py-4 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition-colors">
                        <span class="font-semibold text-navy text-left">How quickly do authorities respond?</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="px-6 py-4 bg-white text-gray-600">Most critical reports are acknowledged within 2 hours. Resolution times vary by incident type — road damage averages 7 days, while snatching cases are investigated within 24 hours.</div>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button onclick="toggleAccordion(this)" class="w-full px-6 py-4 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition-colors">
                        <span class="font-semibold text-navy text-left">Can I report without registering?</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="px-6 py-4 bg-white text-gray-600">You can view the safety map without registering. However, submitting reports requires a free account to prevent spam and ensure report quality.</div>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button onclick="toggleAccordion(this)" class="w-full px-6 py-4 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition-colors">
                        <span class="font-semibold text-navy text-left">What happens if I report false information?</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="px-6 py-4 bg-white text-gray-600">False reporting is taken seriously. Accounts that submit verified false reports are suspended. We have a verification system to flag suspicious patterns.</div>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button onclick="toggleAccordion(this)" class="w-full px-6 py-4 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition-colors">
                        <span class="font-semibold text-navy text-left">How does the shopkeeper database work?</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="px-6 py-4 bg-white text-gray-600">When you report a missing item, its details (without your personal info) are added to a searchable database. Registered shopkeepers can search this when someone tries to sell them something suspicious.</div>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button onclick="toggleAccordion(this)" class="w-full px-6 py-4 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition-colors">
                        <span class="font-semibold text-navy text-left">Is my location data stored?</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="px-6 py-4 bg-white text-gray-600">Location data for reports is stored only as a general area (not exact GPS). We never track your movement or store device location history.</div>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button onclick="toggleAccordion(this)" class="w-full px-6 py-4 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition-colors">
                        <span class="font-semibold text-navy text-left">How do I become a verified shopkeeper?</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="px-6 py-4 bg-white text-gray-600">Register on the Shopkeeper Portal with your shop name, trade license number, and CNIC. Verification takes 24-48 hours.</div>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button onclick="toggleAccordion(this)" class="w-full px-6 py-4 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition-colors">
                        <span class="font-semibold text-navy text-left">Can I use StreetSafe outside Pakistan?</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="px-6 py-4 bg-white text-gray-600">Currently StreetSafe is available in 38 Pakistani cities. We plan to expand to AJK and GB by end of 2024.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 8: CTA -->
    <section class="py-24 relative overflow-hidden text-center">
        <div class="absolute inset-0 z-0" style="background: linear-gradient(-45deg, #0A0F1E, #1A73E8, #002f4b, #0A0F1E); background-size: 400% 400%; animation: gradientMove 15s ease infinite;"></div>
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="font-heading font-bold text-4xl md:text-5xl text-white mb-6" data-aos="zoom-in">Ready to Make Your City Safer?</h2>
            <p class="text-white/80 text-lg mb-10" data-aos="zoom-in" data-aos-delay="100">Join 50,000+ citizens already using StreetSafe</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="zoom-in" data-aos-delay="200">
                <a href="{{ route('login') }}" class="px-10 py-4 bg-white text-primary rounded-full font-bold hover:scale-105 transition-all duration-300">Get Started Free</a>
                <a href="{{ route('map') }}" class="px-10 py-4 border-2 border-white text-white rounded-full font-bold hover:bg-white/10 transition-all duration-300">View Safety Map</a>
            </div>
        </div>
    </section>

    <!-- FOOTER — SAME AS LANDING PAGE -->
    <footer id="footer" class="bg-primary border-t border-accent/30 pt-16 pb-8 text-white" style="background-color: #0A0F1E;">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fa-solid fa-shield-halved text-accent text-2xl" style="color: #1A73E8;"></i>
                        <span class="text-2xl font-bold font-heading">StreetSafe</span>
                    </div>
                    <p class="text-gray-400 mb-6">Empowering citizens across Pakistan to build safer communities through technology and collaboration.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-accent transition-colors" style="--hover-bg: #1A73E8;"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-accent transition-colors"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-accent transition-colors"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-accent transition-colors"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 font-heading">Quick Links</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-secondary transition-colors">About Us</a></li>
                        <li><a href="{{ route('map') }}" class="hover:text-secondary transition-colors">Safety Map</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-secondary transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 font-heading">For Users</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="{{ route('incident') }}" class="hover:text-secondary transition-colors">Report Incident</a></li>
                        <li><a href="/my-reports" class="hover:text-secondary transition-colors">Track Status</a></li>
                        <li><a href="{{ route('how-it-works') }}" class="hover:text-secondary transition-colors">How It Works</a></li>
                        <li><a href="/shopkeeper/portal" class="hover:text-secondary transition-colors">Shopkeeper Portal</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 font-heading">Connect With Us</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-envelope" style="color: #1A73E8;"></i> support@streetsafe.pk</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-phone" style="color: #1A73E8;"></i> +92 21 111 222 333</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-location-dot" style="color: #1A73E8;"></i> Islamabad, Pakistan</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-500">
                <p>&copy; 2024 StreetSafe Pakistan. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="/terms" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, easing: 'ease-out-cubic', once: true, offset: 50 });

        // ✅ SAME NAVBAR JS AS LANDING PAGE
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

        // ✅ SAME MOBILE MENU JS AS LANDING PAGE
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        function toggleMenu() { mobileMenu.classList.toggle('translate-x-full'); }
        mobileMenuBtn.addEventListener('click', toggleMenu);
        closeMenuBtn.addEventListener('click', toggleMenu);

        // ✅ SAME PARTICLES AS LANDING PAGE
        const particlesContainer = document.getElementById('particles-container');
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            const size = Math.random() * 10 + 5 + 'px';
            particle.style.width = size;
            particle.style.height = size;
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDuration = Math.random() * 10 + 10 + 's';
            particle.style.animationDelay = Math.random() * 5 + 's';
            particlesContainer.appendChild(particle);
        }

        // Role Switching
        function switchRole(role) {
            const cards = document.querySelectorAll('.role-card');
            cards.forEach(card => {
                card.classList.remove('opacity-100');
                card.classList.add('opacity-60');
                card.querySelector('.check-icon').classList.remove('opacity-100');
                card.querySelector('.check-icon').classList.add('opacity-0');
            });
            const selectedCard = document.getElementById(`card-${role}`);
            selectedCard.classList.remove('opacity-60');
            selectedCard.classList.add('opacity-100');
            selectedCard.querySelector('.check-icon').classList.remove('opacity-0');
            selectedCard.querySelector('.check-icon').classList.add('opacity-100');
            ['citizen', 'shopkeeper', 'authority'].forEach(sec => {
                const el = document.getElementById(`guide-${sec}`);
                if (sec === role) {
                    el.classList.remove('hidden');
                    setTimeout(() => AOS.refresh(), 100);
                } else {
                    el.classList.add('hidden');
                }
            });
        }

        // FAQ Accordion
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.fa-chevron-down');
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // CTA gradient animation
        const style = document.createElement('style');
        style.textContent = '@keyframes gradientMove { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }';
        document.head.appendChild(style);

        document.addEventListener('DOMContentLoaded', () => { switchRole('citizen'); });
    </script>
</body>
</html>