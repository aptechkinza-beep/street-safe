<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy — StreetSafe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0A0F1E',
                        accent: '#1A73E8',
                        secondary: '#00D4FF',
                        navy: '#0A0F1E',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #0A0F1E;
        }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        .text-gradient {
            background: linear-gradient(135deg, #1A73E8, #00D4FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-nav {
            background: rgba(10, 15, 30, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(26, 115, 232, 0.3);
            pointer-events: none;
            animation: floatUp linear infinite;
        }

        @keyframes floatUp {
            0% { transform: translateY(0) translateX(0) scale(1); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(50px) scale(0.5); opacity: 0; }
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .gradient-animate {
            background-size: 200% 200%;
            animation: gradientMove 4s ease infinite;
        }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0A0F1E; }
        ::-webkit-scrollbar-thumb { background: #1A73E8; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00D4FF; }

        .toc-link.active {
            color: #1A73E8 !important;
            font-weight: 600;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .blue-glow {
            text-shadow: 0 0 40px rgba(26, 115, 232, 0.6), 0 0 80px rgba(26, 115, 232, 0.3);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .hero-particles {
            position: absolute;
            inset: 0;
            overflow: hidden;
            z-index: 0;
        }

        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }
        .mobile-menu.open {
            max-height: 400px;
        }
    </style>
</head>
<body class="font-inter text-gray-600 antialiased">

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

    <!-- SECTION 1 — HERO -->
    <section class="relative bg-primary overflow-hidden flex items-center" style="height: 40vh; min-height: 320px;">
        <div class="hero-particles" id="heroParticles"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-primary via-primary/95 to-primary/80 z-[1]"></div>

        <div class="relative z-10 w-full max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h1 data-aos="fade-up" data-aos-duration="700" class="font-poppins font-extrabold text-4xl sm:text-5xl lg:text-[52px] text-white leading-tight mb-4">
                Your Privacy is Our Priority
            </h1>
            <p data-aos="fade-up" data-aos-duration="800" class="text-gray-400 text-sm sm:text-base mb-8">
                Last updated: January 1, 2024 &bull; Effective immediately
            </p>
            <div data-aos="fade-up" data-aos-duration="900" class="flex flex-wrap justify-center gap-3">
                <span class="glass text-white/80 text-xs font-medium px-4 py-2 rounded-full">🔐 Encrypted Data</span>
                <span class="glass text-white/80 text-xs font-medium px-4 py-2 rounded-full">🚫 Never Sold</span>
                <span class="glass text-white/80 text-xs font-medium px-4 py-2 rounded-full">✅ GDPR Compliant</span>
            </div>
        </div>
    </section>

    <!-- SECTION 2 — QUICK SUMMARY CARDS -->
    <section class="bg-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-poppins font-bold text-3xl sm:text-4xl text-navy mb-3">Privacy at a Glance</h2>
                <p class="text-gray-500 text-base">Key points before you read the full policy</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white border-l-4 border-green-500 rounded-2xl p-6 shadow-sm card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-check-circle text-green-500 text-2xl mt-0.5"></i>
                        <div>
                            <h3 class="font-poppins font-semibold text-lg text-navy mb-2">We Collect Minimal Data</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Only email and city required to register. No CNIC or phone mandatory.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-l-4 border-accent rounded-2xl p-6 shadow-sm card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-lock text-accent text-2xl mt-0.5"></i>
                        <div>
                            <h3 class="font-poppins font-semibold text-lg text-navy mb-2">Your Data is Encrypted</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">All personal information stored with AES-256 encryption. Always.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-l-4 border-red-500 rounded-2xl p-6 shadow-sm card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-ban text-red-500 text-2xl mt-0.5"></i>
                        <div>
                            <h3 class="font-poppins font-semibold text-lg text-navy mb-2">Never Sold to Third Parties</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">We never sell, rent, or trade your personal data. Ever. Period.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-l-4 border-purple-500 rounded-2xl p-6 shadow-sm card-hover" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-user-secret text-purple-500 text-2xl mt-0.5"></i>
                        <div>
                            <h3 class="font-poppins font-semibold text-lg text-navy mb-2">Anonymous Reporting</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Your identity is never revealed in public reports or to other users.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3 — MAIN POLICY CONTENT -->
    <section class="bg-gray-50 py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- LEFT — Sticky TOC -->
                <aside class="w-full lg:w-[30%] flex-shrink-0">
                    <div class="bg-white rounded-xl p-6 shadow-sm lg:sticky lg:top-24" data-aos="fade-right">
                        <h3 class="font-poppins font-bold text-navy text-lg mb-4">Contents</h3>
                        <nav class="flex flex-col gap-2.5">
                            <a href="#section-1" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">1. Information We Collect</a>
                            <a href="#section-2" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">2. How We Use Your Data</a>
                            <a href="#section-3" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">3. Data Storage & Security</a>
                            <a href="#section-4" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">4. Sharing Your Information</a>
                            <a href="#section-5" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">5. Anonymous Reporting</a>
                            <a href="#section-6" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">6. Your Rights</a>
                            <a href="#section-7" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">7. Cookies Policy</a>
                            <a href="#section-8" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">8. Children's Privacy</a>
                            <a href="#section-9" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">9. Changes to Policy</a>
                            <a href="#section-10" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200">10. Contact Us</a>
                        </nav>
                    </div>
                </aside>

                <!-- RIGHT — Policy Sections -->
                <main class="w-full lg:w-[70%]">
                    <div class="bg-white rounded-xl p-6 sm:p-8 shadow-sm">

                        <!-- Section 1 -->
                        <div id="section-1" class="policy-section scroll-mt-24 mb-8">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 1</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Information We Collect</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-3">We collect the minimum information necessary to provide our services:</p>
                            <ul class="text-gray-600 text-base leading-relaxed list-disc list-inside space-y-1.5 mb-3">
                                <li><strong class="text-gray-700">Account Information:</strong> Email address and city (required). Full name and phone (optional).</li>
                                <li><strong class="text-gray-700">Report Data:</strong> Incident type, location area, description, and photos you provide.</li>
                                <li><strong class="text-gray-700">Device Data:</strong> Browser type, IP address (anonymized), and general location.</li>
                                <li><strong class="text-gray-700">Usage Data:</strong> Pages visited and features used to improve our platform.</li>
                            </ul>
                            <p class="text-gray-600 text-base leading-relaxed">We do <strong class="text-gray-800">NOT</strong> collect: CNIC numbers (except for verified authority accounts), precise GPS location, financial information, or sensitive personal data without explicit consent.</p>
                        </div>
                        <hr class="border-gray-100 mb-8">

                        <!-- Section 2 -->
                        <div id="section-2" class="policy-section scroll-mt-24 mb-8">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 2</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">How We Use Your Data</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-3">Your data is used exclusively to:</p>
                            <ul class="text-gray-600 text-base leading-relaxed list-disc list-inside space-y-1.5 mb-3">
                                <li>Process and forward your incident reports to relevant authorities</li>
                                <li>Allow shopkeepers to search missing item databases (without your personal info)</li>
                                <li>Send you notifications about your report status</li>
                                <li>Improve platform features and user experience</li>
                                <li>Generate anonymized area safety statistics</li>
                            </ul>
                            <p class="text-gray-600 text-base leading-relaxed">We do <strong class="text-gray-800">NOT</strong> use your data for: advertising, profiling, selling to third parties, or any purpose not listed above.</p>
                        </div>
                        <hr class="border-gray-100 mb-8">

                        <!-- Section 3 -->
                        <div id="section-3" class="policy-section scroll-mt-24 mb-8">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 3</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Data Storage & Security</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-3">All data is stored on secure servers with:</p>
                            <ul class="text-gray-600 text-base leading-relaxed list-disc list-inside space-y-1.5">
                                <li>AES-256 encryption at rest</li>
                                <li>TLS 1.3 encryption in transit</li>
                                <li>Regular security audits every 6 months</li>
                                <li>Automatic data deletion after account closure (30 days)</li>
                                <li>Backup servers located in Pakistan</li>
                            </ul>
                        </div>
                        <hr class="border-gray-100 mb-8">

                        <!-- Section 4 -->
                        <div id="section-4" class="policy-section scroll-mt-24 mb-8">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 4</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Sharing Your Information</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-3">We share your information <strong class="text-gray-800">ONLY</strong> with:</p>
                            <ul class="text-gray-600 text-base leading-relaxed list-disc list-inside space-y-1.5 mb-3">
                                <li>Verified police stations and civic authorities (report details only, never personal info unless legally required)</li>
                                <li>Registered shopkeepers (item details only, never your name or contact)</li>
                                <li>Legal authorities when required by Pakistani law</li>
                            </ul>
                            <p class="text-gray-600 text-base leading-relaxed">We <strong class="text-gray-800">NEVER</strong> share with: advertisers, data brokers, social media platforms, or foreign entities.</p>
                        </div>
                        <hr class="border-gray-100 mb-8">

                        <!-- Section 5 -->
                        <div id="section-5" class="policy-section scroll-mt-24 mb-8">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 5</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Anonymous Reporting</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-3">All reports are anonymous by default:</p>
                            <ul class="text-gray-600 text-base leading-relaxed list-disc list-inside space-y-1.5">
                                <li>Your name and contact details are <strong class="text-gray-800">NEVER</strong> attached to public reports</li>
                                <li>Location is stored as area name only (not exact GPS coordinates)</li>
                                <li>Even authorities see reports without reporter identity unless you choose to reveal it</li>
                                <li>Shopkeepers only see item details, never who reported them</li>
                            </ul>
                        </div>
                        <hr class="border-gray-100 mb-8">

                        <!-- Section 6 -->
                        <div id="section-6" class="policy-section scroll-mt-24 mb-8">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 6</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Your Rights</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-3">Under Pakistani data protection principles, you have the right to:</p>
                            <ul class="text-gray-600 text-base leading-relaxed list-disc list-inside space-y-1.5 mb-3">
                                <li><strong class="text-gray-700">Access:</strong> Request a copy of all data we hold about you</li>
                                <li><strong class="text-gray-700">Correction:</strong> Update incorrect personal information</li>
                                <li><strong class="text-gray-700">Deletion:</strong> Request permanent deletion of your account and data</li>
                                <li><strong class="text-gray-700">Portability:</strong> Export your data in a readable format</li>
                                <li><strong class="text-gray-700">Objection:</strong> Opt out of non-essential data processing</li>
                            </ul>
                            <p class="text-gray-600 text-base leading-relaxed">To exercise any right, contact: <a href="mailto:privacy@streetsafe.pk" class="text-accent hover:underline">privacy@streetsafe.pk</a></p>
                        </div>
                        <hr class="border-gray-100 mb-8">

                        <!-- Section 7 -->
                        <div id="section-7" class="policy-section scroll-mt-24 mb-8">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 7</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Cookies Policy</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-3">We use minimal cookies:</p>
                            <ul class="text-gray-600 text-base leading-relaxed list-disc list-inside space-y-1.5 mb-3">
                                <li><strong class="text-gray-700">Essential Cookies:</strong> Required for login sessions (cannot be disabled)</li>
                                <li><strong class="text-gray-700">Analytics Cookies:</strong> Anonymous usage statistics (can be disabled)</li>
                                <li><strong class="text-gray-700">Preference Cookies:</strong> Save your settings like city and language</li>
                            </ul>
                            <p class="text-gray-600 text-base leading-relaxed">We do <strong class="text-gray-800">NOT</strong> use advertising or tracking cookies.</p>
                        </div>
                        <hr class="border-gray-100 mb-8">

                        <!-- Section 8 -->
                        <div id="section-8" class="policy-section scroll-mt-24 mb-8">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 8</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Children's Privacy</h2>
                            <p class="text-gray-600 text-base leading-relaxed">StreetSafe is not intended for users under 13 years of age. We do not knowingly collect data from children. If you believe a child has provided us with personal information, contact us immediately at <a href="mailto:privacy@streetsafe.pk" class="text-accent hover:underline">privacy@streetsafe.pk</a> and we will delete it within 48 hours.</p>
                        </div>
                        <hr class="border-gray-100 mb-8">

                        <!-- Section 9 -->
                        <div id="section-9" class="policy-section scroll-mt-24 mb-8">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 9</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Changes to This Policy</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-3">We may update this Privacy Policy periodically. When we do:</p>
                            <ul class="text-gray-600 text-base leading-relaxed list-disc list-inside space-y-1.5">
                                <li>We will post the updated policy on this page</li>
                                <li>We will update the "Last Updated" date at the top</li>
                                <li>For significant changes, we will email registered users</li>
                                <li>Continued use of StreetSafe after changes constitutes acceptance</li>
                            </ul>
                        </div>
                        <hr class="border-gray-100 mb-8">

                        <!-- Section 10 -->
                        <div id="section-10" class="policy-section scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 10</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Contact Us</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-4">For privacy concerns or to exercise your rights:</p>
                            <div class="space-y-2 mb-6">
                                <p class="text-gray-600 text-base"><i class="fa-solid fa-envelope text-accent mr-2 w-5 text-center"></i><a href="mailto:privacy@streetsafe.pk" class="text-accent hover:underline">privacy@streetsafe.pk</a></p>
                                <p class="text-gray-600 text-base"><i class="fa-solid fa-phone text-accent mr-2 w-5 text-center"></i>+92 21 111 222 333</p>
                                <p class="text-gray-600 text-base"><i class="fa-solid fa-location-dot text-accent mr-2 w-5 text-center"></i>F-7 Markaz, Islamabad, Pakistan</p>
                                <p class="text-gray-600 text-base"><i class="fa-solid fa-clock text-accent mr-2 w-5 text-center"></i>Response time: Within 48 hours for all privacy requests</p>
                            </div>
                            <a href="/contact" class="inline-flex items-center gap-2 bg-accent hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3 rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-accent/25">
                                <i class="fa-solid fa-envelope"></i>
                                Contact Privacy Team
                            </a>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </section>

    <!-- SECTION 4 — COMMITMENT BANNER -->
    <section class="bg-primary py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full bg-accent/20 blur-[120px]"></div>
        </div>
        <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 text-center">
            <div data-aos="fade-up">
                <i class="fa-solid fa-shield-halved text-accent text-[60px] blue-glow mb-6 block"></i>
            </div>
            <h2 data-aos="fade-up" data-aos-delay="100" class="font-poppins font-bold text-3xl sm:text-4xl text-white mb-4">Our Privacy Promise</h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-gray-400 text-base sm:text-lg leading-relaxed mb-8 max-w-2xl mx-auto">
                StreetSafe was built with privacy as a core value, not an afterthought. We will always be transparent about how your data is used and will never compromise your trust.
            </p>
            <div data-aos="fade-up" data-aos-delay="300" class="flex flex-wrap justify-center gap-4">
                <span class="glass text-white/80 text-sm font-medium px-6 py-2.5 rounded-full">No Ads Ever</span>
                <span class="glass text-white/80 text-sm font-medium px-6 py-2.5 rounded-full">No Data Selling</span>
                <span class="glass text-white/80 text-sm font-medium px-6 py-2.5 rounded-full">Full Transparency</span>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // AOS Init
        AOS.init({
            duration: 700,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 40) {
                navbar.classList.add('glass-nav');
            } else {
                navbar.classList.remove('glass-nav');
            }
        });

        // Mobile menu
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        let menuOpen = false;
        mobileMenuBtn.addEventListener('click', function() {
            menuOpen = !menuOpen;
            mobileMenu.classList.toggle('open', menuOpen);
            mobileMenuBtn.innerHTML = menuOpen
                ? '<i class="fa-solid fa-xmark"></i>'
                : '<i class="fa-solid fa-bars"></i>';
        });

        // Particles
        (function() {
            const container = document.getElementById('heroParticles');
            if (!container) return;
            for (let i = 0; i < 30; i++) {
                const p = document.createElement('div');
                p.classList.add('particle');
                const size = Math.random() * 4 + 1;
                p.style.width = size + 'px';
                p.style.height = size + 'px';
                p.style.left = Math.random() * 100 + '%';
                p.style.bottom = '-10px';
                p.style.animationDuration = (Math.random() * 8 + 6) + 's';
                p.style.animationDelay = (Math.random() * 6) + 's';
                p.style.background = Math.random() > 0.5
                    ? 'rgba(26, 115, 232, 0.4)'
                    : 'rgba(0, 212, 255, 0.3)';
                container.appendChild(p);
            }
        })();

        // Table of Contents — IntersectionObserver
        (function() {
            const sections = document.querySelectorAll('.policy-section');
            const tocLinks = document.querySelectorAll('.toc-link');

            const observerOptions = {
                root: null,
                rootMargin: '-20% 0px -60% 0px',
                threshold: 0
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');
                        tocLinks.forEach(function(link) {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === '#' + id) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            }, observerOptions);

            sections.forEach(function(section) {
                observer.observe(section);
            });
        })();
    </script>
</body>
</html>