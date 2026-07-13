<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us — StreetSafe Pakistan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0A0F1E',
                        accent: '#1A73E8',
                        secondary: '#00D4FF',
                        lightBg: '#F4F6FA',
                        navy: '#0A0F1E'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif']
                    },
                    boxShadow: {
                        neon: '0 0 20px rgba(0, 212, 255, 0.3)',
                        'neon-blue': '0 0 20px rgba(26, 115, 232, 0.3)'
                    }
                }
            }
        }
    </script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0A0F1E; }
        ::-webkit-scrollbar-thumb { background: #1A73E8; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00D4FF; }

        .glass-nav {
            background: rgba(10, 15, 30, 0.85) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .text-gradient {
            background: linear-gradient(135deg, #00D4FF, #1A73E8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

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

        @keyframes floatUp {
            0% { transform: translateY(100vh) scale(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-10vh) scale(1); opacity: 0; }
        }

        .particle {
            position: absolute;
            bottom: -10px;
            background: radial-gradient(circle, rgba(0, 212, 255, 0.6), transparent);
            border-radius: 50%;
            animation: floatUp linear infinite;
            pointer-events: none;
        }

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        .shimmer-badge {
            background: linear-gradient(90deg, rgba(26, 115, 232, 0.2) 0%, rgba(0, 212, 255, 0.4) 50%, rgba(26, 115, 232, 0.2) 100%);
            background-size: 200% auto;
            animation: shimmer 3s linear infinite;
        }

        @keyframes bounce-chevron {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(10px); }
        }

        .bounce-chevron {
            animation: bounce-chevron 2s ease-in-out infinite;
        }

        .input-wrapper { position: relative; }
        .floating-label {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.2s ease;
            color: #9CA3AF;
            pointer-events: none;
            background: white;
            padding: 0 4px;
            font-size: 14px;
        }
        textarea ~ .floating-label {
            top: 20px;
            transform: none;
        }
        input:focus + .floating-label,
        input:not(:placeholder-shown) + .floating-label,
        textarea:focus + .floating-label,
        textarea:not(:placeholder-shown) + .floating-label {
            top: 0;
            font-size: 12px;
            color: #1A73E8;
            transform: none;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-8px); }
            40% { transform: translateX(8px); }
            60% { transform: translateX(-5px); }
            80% { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.5s ease;
        }

        .input-error {
            border-color: #EF4444 !important;
            ring-color: rgba(239, 68, 68, 0.3) !important;
        }

        @keyframes spinner {
            to { transform: rotate(360deg); }
        }

        .spinner {
            width: 24px;
            height: 24px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spinner 0.7s linear infinite;
        }

        @keyframes drawCircle {
            to { stroke-dashoffset: 0; }
        }

        @keyframes drawCheck {
            to { stroke-dashoffset: 0; }
        }

        .success-circle {
            stroke-dasharray: 240;
            stroke-dashoffset: 240;
            animation: drawCircle 0.6s ease forwards;
        }

        .success-check {
            stroke-dasharray: 50;
            stroke-dashoffset: 50;
            animation: drawCheck 0.4s ease forwards 0.5s;
        }

        .bg-map-pattern {
            background-color: #0d1325;
            background-image:
                linear-gradient(rgba(26, 115, 232, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(26, 115, 232, 0.08) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .custom-checkbox {
            appearance: none;
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #D1D5DB;
            border-radius: 4px;
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
            flex-shrink: 0;
        }

        .custom-checkbox:checked {
            background: #1A73E8;
            border-color: #1A73E8;
        }

        .custom-checkbox:checked::after {
            content: '';
            position: absolute;
            left: 5px;
            top: 1px;
            width: 6px;
            height: 11px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .custom-checkbox:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.3);
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(0, 212, 255, 0.3); }
            50% { box-shadow: 0 0 40px rgba(0, 212, 255, 0.6); }
        }
    </style>
</head>
<body class="font-sans text-gray-700 bg-white overflow-x-hidden">

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

    <!-- MOBILE MENU -->
    <div id="mobile-menu" class="fixed inset-0 z-[60] bg-primary/98 backdrop-blur-xl flex flex-col items-center justify-center gap-8 translate-x-full transition-transform duration-500">
        <button id="close-menu-btn" class="absolute top-6 right-6 text-white text-3xl">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <a href="{{ route('home') }}" class="text-2xl text-gray-300 hover:text-secondary transition-colors font-heading font-semibold">Home</a>
        <a href="{{ route('how-it-works') }}" class="text-2xl text-gray-300 hover:text-secondary transition-colors font-heading font-semibold">How It Works</a>
        <a href="{{ route('map') }}" class="text-2xl text-gray-300 hover:text-secondary transition-colors font-heading font-semibold">Safety Map</a>
        <a href="{{ route('about') }}" class="text-2xl text-gray-300 hover:text-secondary transition-colors font-heading font-semibold">About</a>
        <a href="{{ route('contact') }}" class="text-2xl text-secondary font-heading font-semibold">Contact</a>
        <div class="flex flex-col gap-4 mt-4">
            <a href="{{ route('login') }}" class="px-8 py-3 border border-white/20 text-white rounded-xl text-center font-medium">Login</a>
            <a href="{{ route('login') }}" class="px-8 py-3 bg-accent text-white rounded-xl text-center font-medium">Register</a>
        </div>
    </div>

    <!-- SECTION 1 — HERO -->
    <section class="relative bg-primary h-[55vh] min-h-[400px] flex items-center justify-center overflow-hidden">
        <div id="particles-container" class="absolute inset-0 overflow-hidden pointer-events-none"></div>
        <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-accent/20 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-secondary/15 rounded-full blur-[150px] pointer-events-none"></div>
        <div class="relative z-10 text-center max-w-3xl mx-auto px-6">
            <h1 data-aos="fade-up" data-aos-delay="100" class="font-heading font-extrabold text-white leading-tight">
                <span class="block text-[36px] md:text-[64px]">We'd Love to</span>
                <span class="block text-[36px] md:text-[64px] bg-gradient-to-r from-secondary to-accent bg-clip-text text-transparent">Hear From You</span>
            </h1>
            <p data-aos="fade-up" data-aos-delay="200" class="text-gray-400 text-lg mt-4 max-w-xl mx-auto">Have a question, suggestion, or want to partner with us? Our team responds within 24 hours.</p>
            <div data-aos="fade-up" data-aos-delay="300" class="flex flex-wrap justify-center gap-3 mt-8">
                <span class="glass px-4 py-2 rounded-full text-sm text-white"><span class="mr-1">⚡</span> 24hr Response</span>
                <span class="glass px-4 py-2 rounded-full text-sm text-white"><span class="mr-1">🌐</span> 38 Cities</span>
                <span class="glass px-4 py-2 rounded-full text-sm text-white"><span class="mr-1">🔒</span> Private &amp; Secure</span>
            </div>
        </div>
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 bounce-chevron">
            <i class="fa-solid fa-chevron-down text-secondary text-2xl"></i>
        </div>
    </section>

    <!-- SECTION 2 — CONTACT CARDS -->
    <section class="bg-white py-20">
        <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div data-aos="fade-up" class="bg-white rounded-2xl p-8 text-center shadow-md border border-gray-100 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 cursor-pointer">
                <div class="w-[60px] h-[60px] bg-gradient-to-br from-accent to-blue-700 rounded-full flex items-center justify-center mx-auto" style="box-shadow: 0 8px 20px rgba(26,115,232,0.3);">
                    <i class="fa-solid fa-envelope text-white text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-navy text-xl mt-4">Email Support</h3>
                <a href="mailto:support@streetsafe.pk" class="text-accent font-medium mt-2 block">support@streetsafe.pk</a>
                <p class="text-gray-500 text-sm mt-1">Response within 24 hours</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white rounded-2xl p-8 text-center shadow-md border border-gray-100 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 cursor-pointer md:-mt-4">
                <div class="w-[60px] h-[60px] bg-gradient-to-br from-secondary to-cyan-600 rounded-full flex items-center justify-center mx-auto" style="box-shadow: 0 8px 20px rgba(0,212,255,0.3);">
                    <i class="fa-solid fa-phone text-white text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-navy text-xl mt-4">Call Center</h3>
                <a href="tel:+9221111222333" class="text-accent font-medium mt-2 block">+92 21 111 222 333</a>
                <p class="text-gray-500 text-sm mt-1">Mon–Fri, 9AM–6PM PKT</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" class="bg-white rounded-2xl p-8 text-center shadow-md border border-gray-100 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 cursor-pointer">
                <div class="w-[60px] h-[60px] bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center mx-auto" style="box-shadow: 0 8px 20px rgba(168,85,247,0.3);">
                    <i class="fa-solid fa-location-dot text-white text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-navy text-xl mt-4">Head Office</h3>
                <p class="text-accent font-medium mt-2">Islamabad, Pakistan</p>
                <p class="text-gray-500 text-sm mt-1">F-7 Markaz, Near Blue Area</p>
            </div>
        </div>
    </section>

    <!-- SECTION 3 — MAIN CONTACT SECTION -->
    <section class="bg-lightBg py-24">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-5 gap-8">
            <!-- LEFT — CONTACT FORM -->
            <div class="lg:col-span-3">
                <div id="form-card" class="bg-white rounded-2xl shadow-lg p-10">
                    <div id="form-content">
                        <h2 class="font-heading font-bold text-navy text-[28px]">Send Us a Message</h2>
                        <p class="text-gray-500 mt-2 mb-8">We'll get back to you within 24 hours</p>
                        <form id="contact-form" novalidate>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="input-wrapper">
                                    <input type="text" id="fullname" name="fullname" placeholder=" " required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-700 placeholder-gray-400 focus:outline-none ring-2 ring-accent/30 border-accent transition-all">
                                    <label class="floating-label" for="fullname">Full Name *</label>
                                    <p class="error-msg text-red-500 text-xs mt-1 hidden"></p>
                                </div>
                                <div class="input-wrapper">
                                    <input type="email" id="email" name="email" placeholder=" " required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-700 placeholder-gray-400 focus:outline-none ring-2 ring-accent/30 border-accent transition-all">
                                    <label class="floating-label" for="email">Email Address *</label>
                                    <p class="error-msg text-red-500 text-xs mt-1 hidden"></p>
                                </div>
                            </div>
                            <div class="mb-4 relative">
                                <select id="subject" name="subject" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-700 focus:outline-none ring-2 ring-accent/30 border-accent transition-all appearance-none bg-white cursor-pointer">
                                    <option value="" disabled selected>Select a Subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="technical">Technical Support</option>
                                    <option value="bug">Report a Bug</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="authority">Authority Access</option>
                                    <option value="media">Media/Press</option>
                                    <option value="other">Other</option>
                                </select>
                                <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-sm"></i>
                                <p id="subject-error" class="error-msg text-red-500 text-xs mt-1 hidden"></p>
                            </div>
                            <div class="input-wrapper mb-4">
                                <input type="tel" id="phone" name="phone" placeholder=" " class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-700 placeholder-gray-400 focus:outline-none ring-2 ring-accent/30 border-accent transition-all">
                                <label class="floating-label" for="phone">Phone Number</label>
                            </div>
                            <div class="input-wrapper mb-4">
                                <textarea id="message" name="message" rows="6" placeholder=" " required maxlength="500" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-700 placeholder-gray-400 focus:outline-none ring-2 ring-accent/30 border-accent transition-all resize-none"></textarea>
                                <label class="floating-label" for="message">Your Message...</label>
                                <div class="flex justify-end mt-1">
                                    <span id="char-count" class="text-gray-400 text-xs">0 / 500</span>
                                </div>
                                <p class="error-msg text-red-500 text-xs mt-1 hidden"></p>
                            </div>
                            <div class="mb-6">
                                <div id="file-zone" class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-accent hover:bg-accent/5 transition-all cursor-pointer">
                                    <input type="file" id="file-input" class="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
                                    <i class="fa-solid fa-paperclip text-gray-400 text-lg"></i>
                                    <p id="file-label" class="text-sm text-gray-500 mt-1">Attach a file (optional) — Max 5MB</p>
                                </div>
                            </div>
                            <div class="mb-8">
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" id="privacy" class="custom-checkbox mt-0.5">
                                    <span class="text-gray-600 text-sm leading-relaxed">I agree StreetSafe may contact me. I've read the <a href="/privacy" class="text-accent hover:underline">Privacy Policy</a>.</span>
                                </label>
                                <p id="privacy-error" class="error-msg text-red-500 text-xs mt-1 hidden"></p>
                            </div>
                            <button type="submit" id="submit-btn" class="w-full py-4 rounded-xl bg-gradient-to-r from-accent to-blue-700 text-white font-heading font-bold text-lg shadow-lg shadow-accent/30 hover:scale-[1.02] hover:shadow-xl hover:shadow-accent/40 transition-all duration-300 flex items-center justify-center gap-3">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>Send Message</span>
                            </button>
                        </form>
                    </div>
                    <div id="success-content" class="hidden text-center py-8">
                        <svg class="mx-auto" width="80" height="80" viewBox="0 0 80 80">
                            <circle class="success-circle" cx="40" cy="40" r="36" fill="none" stroke="#22C55E" stroke-width="4" stroke-linecap="round"/>
                            <path class="success-check" d="M24 42 L34 52 L56 30" fill="none" stroke="#22C55E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="font-heading font-bold text-green-600 text-[28px] mt-4">Message Sent!</h3>
                        <p class="text-gray-500 mt-2">Thank you! We'll respond within 24 hours.</p>
                        <p id="ref-number" class="text-accent font-mono mt-2"></p>
                        <button id="send-another-btn" class="mt-6 px-8 py-3 border-2 border-accent text-accent rounded-xl font-medium hover:bg-accent hover:text-white transition-all">Send Another Message</button>
                    </div>
                </div>
            </div>

            <!-- RIGHT — INFO PANEL -->
            <div data-aos="fade-left" class="lg:col-span-2">
                <div class="bg-primary rounded-2xl p-8 text-white h-full flex flex-col">
                    <h3 class="font-heading font-bold text-[22px] mb-6">Why Contact Us?</h3>
                    <div class="space-y-6 flex-1">
                        <div class="flex gap-4">
                            <div class="w-11 h-11 bg-accent/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-shield-halved text-accent text-lg"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-white text-base">Report Platform Issues</p>
                                <p class="text-gray-400 text-sm mt-1 leading-relaxed">Found a bug or technical problem? Our team fixes critical issues within 48 hours.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-11 h-11 bg-green-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-handshake text-green-400 text-lg"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-white text-base">Partnership Opportunities</p>
                                <p class="text-gray-400 text-sm mt-1 leading-relaxed">We work with NGOs, government bodies, and tech companies for maximum impact.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-11 h-11 bg-orange-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-building-shield text-orange-400 text-lg"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-white text-base">Authority Access</p>
                                <p class="text-gray-400 text-sm mt-1 leading-relaxed">Police stations and civic departments can request verified authority accounts.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-11 h-11 bg-purple-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-newspaper text-purple-400 text-lg"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-white text-base">Media &amp; Press</p>
                                <p class="text-gray-400 text-sm mt-1 leading-relaxed">Journalists can request interviews, data reports, or official press kits.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-white/10 my-6"></div>
                    <div class="bg-white/5 rounded-xl p-4 border border-white/10 mb-6">
                        <p class="text-sm font-bold text-white mb-3">⚡ Response Times</p>
                        <div class="flex justify-between items-center py-2 border-b border-white/5">
                            <span class="text-gray-300 text-sm">General Email</span>
                            <span class="flex items-center gap-2 text-green-400 text-sm"><span class="w-2 h-2 bg-green-400 rounded-full inline-block"></span>Within 24hrs</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-white/5">
                            <span class="text-gray-300 text-sm">Phone Support</span>
                            <span class="flex items-center gap-2 text-green-400 text-sm"><span class="w-2 h-2 bg-green-400 rounded-full inline-block"></span>Immediate</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-300 text-sm">Authority Requests</span>
                            <span class="flex items-center gap-2 text-yellow-400 text-sm"><span class="w-2 h-2 bg-yellow-400 rounded-full inline-block"></span>2-3 Days</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-3">Follow Us</p>
                        <div class="flex gap-3">
                            <a href="#" class="w-12 h-12 bg-blue-600 hover:bg-blue-500 rounded-full flex items-center justify-center text-white text-lg hover:scale-110 transition-transform">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-sky-500 hover:bg-sky-400 rounded-full flex items-center justify-center text-white text-lg hover:scale-110 transition-transform">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-500 rounded-full flex items-center justify-center text-white text-lg hover:scale-110 transition-transform">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-blue-700 hover:bg-blue-600 rounded-full flex items-center justify-center text-white text-lg hover:scale-110 transition-transform">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4 — FAQ QUICK CARDS -->
    <section class="bg-white py-20">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-center font-heading font-bold text-navy text-[38px]">Quick Answers</h2>
            <p class="text-center text-gray-500 mt-3 mb-12">Common questions about getting in touch</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div data-aos="fade-up" class="bg-white rounded-2xl p-6 shadow-sm border-l-4 border-l-accent hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                    <div class="w-fit mb-4">
                        <div class="bg-accent/10 rounded-xl p-3">
                            <i class="fa-solid fa-clock text-accent text-lg"></i>
                        </div>
                    </div>
                    <h4 class="font-heading font-semibold text-navy text-base mb-2">How quickly will you respond?</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Email replies within 24 hours. For urgent safety matters, call our hotline directly.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white rounded-2xl p-6 shadow-sm border-l-4 border-l-orange-500 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                    <div class="w-fit mb-4">
                        <div class="bg-orange-500/10 rounded-xl p-3">
                            <i class="fa-solid fa-building-shield text-orange-500 text-lg"></i>
                        </div>
                    </div>
                    <h4 class="font-heading font-semibold text-navy text-base mb-2">Can authorities request special access?</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Yes. Police stations and government bodies can request verified accounts via email.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white rounded-2xl p-6 shadow-sm border-l-4 border-l-purple-500 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                    <div class="w-fit mb-4">
                        <div class="bg-purple-500/10 rounded-xl p-3">
                            <i class="fa-solid fa-user-secret text-purple-500 text-lg"></i>
                        </div>
                    </div>
                    <h4 class="font-heading font-semibold text-navy text-base mb-2">Is this contact form anonymous?</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Your info is only used to respond to your query. We never share it with anyone.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="bg-white rounded-2xl p-6 shadow-sm border-l-4 border-l-red-500 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                    <div class="w-fit mb-4">
                        <div class="bg-red-500/10 rounded-xl p-3">
                            <i class="fa-solid fa-bug text-red-500 text-lg"></i>
                        </div>
                    </div>
                    <h4 class="font-heading font-semibold text-navy text-base mb-2">How do I report a bug?</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Select 'Report a Bug' in the subject. Include screenshots for faster resolution.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5 — MAP SECTION -->
    <section class="bg-primary py-20">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-center font-heading font-bold text-white text-[38px]">Find Us</h2>
            <p class="text-center text-gray-400 mt-3 mb-10">Our headquarters in Islamabad, Pakistan</p>
            <div class="dark rounded-2xl overflow-hidden h-[300px] relative bg-map-pattern">
                <div class="absolute inset-0 flex items-center justify-center">
                    <i class="fa-solid fa-location-dot text-accent text-5xl animate-bounce" style="filter: drop-shadow(0 0 20px rgba(0, 212, 255, 0.6));"></i>
                </div>
                <div class="absolute bottom-4 left-4 glass rounded-xl px-4 py-3">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-shield-halved text-accent text-lg"></i>
                        <div>
                            <p class="font-heading font-bold text-white text-sm">StreetSafe HQ</p>
                            <p class="text-gray-400 text-xs">F-7 Markaz, Islamabad</p>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-4 right-4">
                    <a href="https://maps.google.com" target="_blank" class="px-4 py-2 border border-white/20 text-white rounded-lg text-sm hover:border-secondary hover:text-secondary transition-all">Get Directions →</a>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-4 mt-6">
                <span class="glass text-white text-sm px-5 py-2 rounded-full">🕐 Mon–Fri 9AM–6PM</span>
                <span class="glass text-white text-sm px-5 py-2 rounded-full">🚶 Walk-ins Welcome</span>
                <span class="glass text-white text-sm px-5 py-2 rounded-full">🚇 Near Metro</span>
            </div>
        </div>
    </section>

    <!-- SECTION 6 — CTA -->
    <section class="py-24 relative overflow-hidden text-center">
        <div class="absolute inset-0 animated-gradient-bg z-0"></div>
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 font-heading" data-aos="zoom-in">Still Have Questions?</h2>
            <p class="text-white/80 text-lg mb-10 max-w-2xl mx-auto" data-aos="zoom-in" data-aos-delay="100">Browse our guide or join 50,000+ citizens already using StreetSafe</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('how-it-works') }}" class="px-10 py-4 bg-white text-primary rounded-full font-bold font-heading hover:scale-105 transition-transform">How It Works</a>
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
                        <li><a href="{{ route('about') }}" class="hover:text-secondary transition-colors">About Us</a></li>
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

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        // AOS Init
        AOS.init({ duration: 800, once: true, offset: 100 });

        // Navbar scroll
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

        // Mobile menu toggle
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeMenuBtn = document.getElementById('close-menu-btn');

        function toggleMenu() {
            mobileMenu.classList.toggle('translate-x-full');
        }

        mobileMenuBtn.addEventListener('click', toggleMenu);
        closeMenuBtn.addEventListener('click', toggleMenu);

        // Particle generator
        const particleContainer = document.getElementById('particles-container');
        for (let i = 0; i < 20; i++) {
            const p = document.createElement('div');
            p.classList.add('particle');
            p.style.width = p.style.height = (Math.random() * 10 + 5) + 'px';
            p.style.left = Math.random() * 100 + '%';
            p.style.animationDuration = (Math.random() * 10 + 10) + 's';
            p.style.animationDelay = Math.random() * 5 + 's';
            particleContainer.appendChild(p);
        }

        // Phone format
        document.getElementById('phone').addEventListener('input', function (e) {
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,7})/);
            e.target.value = !x[2] ? x[1] : x[1] + '-' + x[2];
        });

        // Character counter
        document.getElementById('message').addEventListener('input', function () {
            const len = this.value.length;
            const counter = document.getElementById('char-count');
            counter.textContent = len + ' / 500';
            counter.className = len > 480 ? 'text-red-500 text-xs' : len > 400 ? 'text-orange-500 text-xs' : 'text-gray-400 text-xs';
        });

        // File attachment
        const fileZone = document.getElementById('file-zone');
        const fileInput = document.getElementById('file-input');
        const fileLabel = document.getElementById('file-label');

        fileZone.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function () {
            const name = this.files[0]?.name;
            if (name) {
                fileLabel.textContent = '📎 ' + name;
                fileZone.classList.add('border-accent', 'bg-accent/5');
            } else {
                fileLabel.textContent = 'Attach a file (optional) — Max 5MB';
                fileZone.classList.remove('border-accent', 'bg-accent/5');
            }
        });

        // Form validation & submit
        const contactForm = document.getElementById('contact-form');
        const submitBtn = document.getElementById('submit-btn');
        const formContent = document.getElementById('form-content');
        const successContent = document.getElementById('success-content');

        function showError(input, message) {
            input.classList.add('input-error', 'shake');
            const errorEl = input.closest('.input-wrapper')?.querySelector('.error-msg') || input.parentElement.querySelector('.error-msg');
            if (errorEl) {
                errorEl.textContent = message;
                errorEl.classList.remove('hidden');
            }
            setTimeout(() => input.classList.remove('shake'), 500);
        }

        function clearErrors() {
            document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));
            document.querySelectorAll('.error-msg').forEach(el => {
                el.textContent = '';
                el.classList.add('hidden');
            });
        }

        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            clearErrors();

            let valid = true;
            const fullname = document.getElementById('fullname');
            const email = document.getElementById('email');
            const subject = document.getElementById('subject');
            const message = document.getElementById('message');
            const privacy = document.getElementById('privacy');

            if (!fullname.value.trim()) {
                showError(fullname, 'Full name is required');
                valid = false;
            }

            if (!email.value.trim()) {
                showError(email, 'Email address is required');
                valid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
                showError(email, 'Please enter a valid email address');
                valid = false;
            }

            if (!subject.value) {
                const subjectError = document.getElementById('subject-error');
                subjectError.textContent = 'Please select a subject';
                subjectError.classList.remove('hidden');
                subject.classList.add('input-error');
                valid = false;
            }

            if (!message.value.trim()) {
                showError(message, 'Message is required');
                valid = false;
            }

            if (!privacy.checked) {
                const privacyError = document.getElementById('privacy-error');
                privacyError.textContent = 'You must agree to the privacy policy';
                privacyError.classList.remove('hidden');
                valid = false;
            }

            if (!valid) return;

            // Show spinner
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<div class="spinner"></div><span>Sending...</span>';

            // Simulate send
            setTimeout(() => {
                formContent.classList.add('hidden');
                successContent.classList.remove('hidden');
                const refNum = '#MSG-' + String(Math.floor(1000 + Math.random() * 9000));
                document.getElementById('ref-number').textContent = 'Reference: ' + refNum;
            }, 1500);
        });

        // Send another message
        document.getElementById('send-another-btn').addEventListener('click', function () {
            successContent.classList.add('hidden');
            formContent.classList.remove('hidden');
            contactForm.reset();
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i><span>Send Message</span>';
            document.getElementById('char-count').textContent = '0 / 500';
            document.getElementById('char-count').className = 'text-gray-400 text-xs';
            fileLabel.textContent = 'Attach a file (optional) — Max 5MB';
            fileZone.classList.remove('border-accent', 'bg-accent/5');
            clearErrors();
        });
    </script>
</body>
</html>