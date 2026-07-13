<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service — StreetSafe</title>
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

        .blue-glow {
            text-shadow: 0 0 40px rgba(26, 115, 232, 0.6), 0 0 80px rgba(26, 115, 232, 0.3);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.1);
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

        .bullet-blue {
            position: relative;
            padding-left: 1.25rem;
        }
        .bullet-blue::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.55rem;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #1A73E8;
            flex-shrink: 0;
        }
    </style>
</head>
<body class="font-inter text-gray-600 antialiased">

    <!-- NAVBAR -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <a href="/" class="flex items-center gap-2 group">
                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-accent to-secondary flex items-center justify-center gradient-animate">
                        <i class="fa-solid fa-shield-halved text-white text-sm"></i>
                    </div>
                    <span class="font-poppins font-extrabold text-xl text-white tracking-tight">Street<span class="text-gradient">Safe</span></span>
                </a>
                <div class="hidden lg:flex items-center gap-8">
                    <a href="/" class="text-gray-300 hover:text-white text-sm font-medium transition-colors duration-200">Home</a>
                    <a href="/features" class="text-gray-300 hover:text-white text-sm font-medium transition-colors duration-200">Features</a>
                    <a href="/safety-tips" class="text-gray-300 hover:text-white text-sm font-medium transition-colors duration-200">Safety Tips</a>
                    <a href="/contact" class="text-gray-300 hover:text-white text-sm font-medium transition-colors duration-200">Contact</a>
                    <a href="/report" class="bg-gradient-to-r from-accent to-secondary text-white px-5 py-2.5 rounded-full text-sm font-semibold hover:shadow-lg hover:shadow-accent/25 transition-all duration-300 gradient-animate">Report Incident</a>
                </div>
                <button id="mobileMenuBtn" class="lg:hidden text-white text-xl p-2">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div id="mobileMenu" class="mobile-menu lg:hidden">
                <div class="pb-4 pt-2 flex flex-col gap-3 border-t border-white/10">
                    <a href="/" class="text-gray-300 hover:text-white text-sm font-medium py-2 transition-colors">Home</a>
                    <a href="/features" class="text-gray-300 hover:text-white text-sm font-medium py-2 transition-colors">Features</a>
                    <a href="/safety-tips" class="text-gray-300 hover:text-white text-sm font-medium py-2 transition-colors">Safety Tips</a>
                    <a href="/contact" class="text-gray-300 hover:text-white text-sm font-medium py-2 transition-colors">Contact</a>
                    <a href="/report" class="bg-gradient-to-r from-accent to-secondary text-white px-5 py-2.5 rounded-full text-sm font-semibold text-center gradient-animate mt-1">Report Incident</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- SECTION 1 — HERO -->
    <section class="relative bg-primary overflow-hidden flex items-center" style="height: 40vh; min-height: 320px;">
        <div class="hero-particles" id="particles-container"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-primary via-primary/95 to-primary/80 z-[1]"></div>
        <div class="relative z-10 w-full max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <div data-aos="fade-down" data-aos-duration="600">
                <span class="inline-flex items-center gap-2 glass text-white/80 text-xs font-medium px-4 py-2 rounded-full mb-6">
                    📋 Terms of Service
                </span>
            </div>
            <h1 data-aos="fade-up" data-aos-duration="700" class="font-poppins font-extrabold text-4xl sm:text-5xl lg:text-[52px] text-white leading-tight mb-4">
                Terms of Using StreetSafe
            </h1>
            <p data-aos="fade-up" data-aos-duration="800" class="text-gray-400 text-sm sm:text-base mb-8">
                Last updated: January 1, 2024 &bull; Please read carefully
            </p>
            <div data-aos="fade-up" data-aos-duration="900" class="flex flex-wrap justify-center gap-3">
                <span class="glass text-white/80 text-xs font-medium px-4 py-2 rounded-full">✅ Fair Usage</span>
                <span class="glass text-white/80 text-xs font-medium px-4 py-2 rounded-full">🔒 Your Rights Protected</span>
                <span class="glass text-white/80 text-xs font-medium px-4 py-2 rounded-full">🇵🇰 Pakistan Law</span>
            </div>
        </div>
    </section>

    <!-- SECTION 2 — QUICK SUMMARY CARDS -->
    <section class="bg-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-poppins font-bold text-3xl sm:text-4xl text-navy mb-3">Terms at a Glance</h2>
                <p class="text-gray-500 text-base">Key points before you read the full terms</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white border-l-4 border-green-500 rounded-2xl p-6 shadow-sm card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-user-check text-green-500 text-2xl mt-0.5"></i>
                        <div>
                            <h3 class="font-poppins font-semibold text-lg text-navy mb-2">Who Can Use StreetSafe</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Anyone 13+ in Pakistan can register. Authorities and shopkeepers need verification.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border-l-4 border-accent rounded-2xl p-6 shadow-sm card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-flag text-accent text-2xl mt-0.5"></i>
                        <div>
                            <h3 class="font-poppins font-semibold text-lg text-navy mb-2">Responsible Reporting</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Reports must be truthful. False reporting results in immediate account suspension.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border-l-4 border-orange-500 rounded-2xl p-6 shadow-sm card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-shield-halved text-orange-500 text-2xl mt-0.5"></i>
                        <div>
                            <h3 class="font-poppins font-semibold text-lg text-navy mb-2">Our Responsibilities</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">We forward reports to authorities but cannot guarantee police response or resolution.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border-l-4 border-red-500 rounded-2xl p-6 shadow-sm card-hover" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-ban text-red-500 text-2xl mt-0.5"></i>
                        <div>
                            <h3 class="font-poppins font-semibold text-lg text-navy mb-2">Prohibited Activities</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">No false reports, no harassment, no spam, no unauthorized data collection.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3 — MAIN TERMS CONTENT -->
    <section class="bg-gray-50 py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- LEFT — Sticky TOC -->
                <aside class="w-full lg:w-[30%] flex-shrink-0">
                    <div class="bg-white rounded-xl p-6 shadow-sm lg:sticky lg:top-24" data-aos="fade-right">
                        <h3 class="font-poppins font-bold text-navy text-lg mb-4">Contents</h3>
                        <nav class="flex flex-col gap-1">
                            <a href="#section-1" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">1. Acceptance of Terms</a>
                            <a href="#section-2" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">2. Eligibility</a>
                            <a href="#section-3" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">3. User Accounts</a>
                            <a href="#section-4" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">4. Acceptable Use</a>
                            <a href="#section-5" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">5. Prohibited Activities</a>
                            <a href="#section-6" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">6. Reports & Content</a>
                            <a href="#section-7" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">7. Shopkeeper Terms</a>
                            <a href="#section-8" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">8. Authority Terms</a>
                            <a href="#section-9" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">9. Intellectual Property</a>
                            <a href="#section-10" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">10. Disclaimers</a>
                            <a href="#section-11" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">11. Limitation of Liability</a>
                            <a href="#section-12" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">12. Termination</a>
                            <a href="#section-13" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">13. Governing Law</a>
                            <a href="#section-14" class="toc-link text-sm text-gray-500 hover:text-accent hover:underline transition-colors duration-200 py-1">14. Contact</a>
                        </nav>
                    </div>
                </aside>

                <!-- RIGHT — Terms Sections -->
                <main class="w-full lg:w-[70%]">
                    <div class="bg-white rounded-xl p-6 sm:p-8 shadow-sm">

                        <!-- Section 1 -->
                        <div id="section-1" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 1</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Acceptance of Terms</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-3">By accessing or using StreetSafe ('the Platform'), you agree to be bound by these Terms of Service. If you do not agree to these terms, please do not use our platform.</p>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">These terms apply to:</p>
                            <div class="space-y-2 mb-2">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">All visitors and registered users of StreetSafe</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Shopkeepers registered on the Shopkeeper Portal</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Authority users with verified access</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Any person submitting reports, viewing maps, or using any platform feature</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 2 -->
                        <div id="section-2" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 2</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Eligibility</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">To use StreetSafe, you must:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Be at least 13 years of age</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Be located in or have a legitimate interest in Pakistan's safety</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Provide accurate information during registration</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Not have been previously banned from StreetSafe</p>
                            </div>
                            <p class="text-gray-700 text-base font-medium mb-2">For Shopkeeper Accounts:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Must be a registered business owner or employee in Pakistan</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Must provide valid trade license or business registration number</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Must be 18 years or older</p>
                            </div>
                            <p class="text-gray-700 text-base font-medium mb-2">For Authority Accounts:</p>
                            <div class="space-y-2">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Must be an active member of a recognized law enforcement or civic body</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Must provide official department credentials</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Account access is subject to institutional approval</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 3 -->
                        <div id="section-3" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 3</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">User Accounts</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">When you create an account:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">You are responsible for maintaining the confidentiality of your login credentials</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">You must notify us immediately of any unauthorized account access at <a href="mailto:security@streetsafe.pk" class="text-accent hover:underline">security@streetsafe.pk</a></p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">You may not share your account with others or create multiple accounts</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">You are responsible for all activities conducted under your account</p>
                            </div>
                            <p class="text-gray-700 text-base font-medium mb-2">Account types:</p>
                            <div class="space-y-2">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue"><strong class="text-gray-700">Citizen Account:</strong> Basic reporting and map access</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue"><strong class="text-gray-700">Shopkeeper Account:</strong> Database search and suspicious activity reporting</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue"><strong class="text-gray-700">Authority Account:</strong> Full dashboard access and case management</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 4 -->
                        <div id="section-4" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 4</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Acceptable Use</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">You agree to use StreetSafe only for:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Reporting genuine safety incidents in your area</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Searching the missing items database as a registered shopkeeper</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Managing safety cases as a verified authority</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Viewing safety information and maps</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Communicating with the StreetSafe team</p>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">All reports and content must be:</p>
                            <div class="space-y-2">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Truthful and based on genuine observation</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Related to public safety in Pakistan</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Free from personal bias or targeted harassment</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Submitted in good faith</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 5 -->
                        <div id="section-5" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 5</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Prohibited Activities</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">The following are strictly prohibited:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Submitting false, fabricated, or misleading reports</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Targeting individuals with false reports (this is a criminal offense under Pakistani law)</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Using the platform to harass, threaten, or defame others</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Attempting to access other users' private data</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Reverse engineering or scraping our platform</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Creating automated bots to submit reports</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Using the platform for commercial advertising</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Sharing login credentials with unauthorized persons</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Submitting reports for personal vendettas or business competition</p>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed">Violations may result in immediate account termination and legal action under Pakistan's Prevention of Electronic Crimes Act (PECA) 2016.</p>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 6 -->
                        <div id="section-6" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 6</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Reports & Content</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">By submitting a report, you confirm that:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">The information is true and accurate to the best of your knowledge</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">You grant StreetSafe a license to share this report with relevant authorities</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">You understand the report may be visible on public safety maps (without your identity)</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Photos uploaded must not violate others' privacy or dignity</p>
                            </div>
                            <p class="text-gray-700 text-base font-medium mb-2">Report removal:</p>
                            <div class="space-y-2">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Authorities can mark reports as resolved or invalid</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">You can request deletion of your own reports within 7 days</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">StreetSafe reserves the right to remove reports that violate these terms</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 7 -->
                        <div id="section-7" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 7</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Shopkeeper Terms</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">Registered shopkeepers agree to:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Only search the database when genuinely suspecting a stolen item</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Report suspicious sellers truthfully and accurately</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Not share database access with unregistered parties</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Maintain confidentiality of search results</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Contact authorities directly in emergency situations</p>
                            </div>
                            <p class="text-gray-700 text-base font-medium mb-2">Shopkeeper accounts may be suspended for:</p>
                            <div class="space-y-2">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Misuse of the stolen items database</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Submitting false suspicion reports</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Sharing account credentials</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 8 -->
                        <div id="section-8" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 8</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Authority Terms</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">Verified authority users agree to:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Use platform data only for legitimate law enforcement purposes</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Maintain strict confidentiality of reporter identities</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Update case statuses within 72 hours of resolution</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Not share citizen data outside official channels</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Comply with all applicable Pakistani laws regarding data privacy</p>
                            </div>
                            <p class="text-gray-700 text-base font-medium mb-2">Authority access may be revoked for:</p>
                            <div class="space-y-2">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Unauthorized sharing of citizen data</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Failure to comply with case management protocols</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Misuse of platform for non-law-enforcement purposes</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 9 -->
                        <div id="section-9" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 9</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Intellectual Property</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">All content on StreetSafe including:</p>
                            <div class="space-y-2 mb-3">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Platform design, code, and architecture</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">StreetSafe logo, name, and branding</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Safety data compilations and analytics</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">User interface designs</p>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed mb-4">...are the intellectual property of StreetSafe Pakistan. You may not copy, reproduce, or distribute any platform content without written permission.</p>
                            <p class="text-gray-600 text-base leading-relaxed">User-submitted content (reports, photos) remains your property. You grant us a non-exclusive license to use this content for safety purposes.</p>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 10 -->
                        <div id="section-10" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 10</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Disclaimers</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">StreetSafe provides a reporting platform only. We:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Do NOT guarantee police or authority response to any report</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Do NOT guarantee recovery of missing or stolen items</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Do NOT guarantee accuracy of community-submitted safety ratings</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Are NOT responsible for incidents that occur despite platform warnings</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Do NOT provide legal advice or law enforcement services</p>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed">Safety information on StreetSafe is community-generated and should be used as a supplementary resource, not a sole safety guide.</p>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 11 -->
                        <div id="section-11" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 11</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Limitation of Liability</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">To the maximum extent permitted by Pakistani law, StreetSafe shall not be liable for:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Any indirect, incidental, or consequential damages</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Loss of property despite platform warnings</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Actions or inactions of authorities in response to reports</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Accuracy of community-submitted safety data</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Service interruptions or technical failures</p>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed">Our maximum liability to any user shall not exceed PKR 10,000 or the amount paid by the user in the preceding 12 months, whichever is lower.</p>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 12 -->
                        <div id="section-12" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 12</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Termination</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">We may suspend or terminate your account if you:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Violate these Terms of Service</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Submit false or malicious reports</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Attempt to harm the platform or other users</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Fail to comply with authority account requirements</p>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">You may terminate your account at any time through Settings. Upon termination:</p>
                            <div class="space-y-2">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Your personal data will be deleted within 30 days</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Anonymous report data may be retained for safety statistics</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">You will lose access to all platform features immediately</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 13 -->
                        <div id="section-13" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 13</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Governing Law</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">These Terms of Service are governed by the laws of Pakistan, including:</p>
                            <div class="space-y-2 mb-4">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">The Pakistan Electronic Crimes Act (PECA) 2016</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">The Personal Data Protection Bill</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">The Pakistan Penal Code (where applicable)</p>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed mb-2">Any disputes shall be resolved through:</p>
                            <div class="space-y-2">
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Internal StreetSafe dispute resolution (first step)</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Mediation in Islamabad, Pakistan</p>
                                <p class="text-gray-600 text-base leading-relaxed bullet-blue">Courts of competent jurisdiction in Islamabad</p>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed mt-3">By using StreetSafe, you consent to the exclusive jurisdiction of Pakistani courts.</p>
                        </div>
                        <div class="border-t border-gray-100 my-8"></div>

                        <!-- Section 14 -->
                        <div id="section-14" class="scroll-mt-24">
                            <span class="inline-block bg-accent/10 text-accent text-xs font-semibold px-3 py-1 rounded-full mb-3">Section 14</span>
                            <h2 class="font-poppins font-bold text-[22px] text-navy mb-4">Contact</h2>
                            <p class="text-gray-600 text-base leading-relaxed mb-4">For questions about these Terms:</p>
                            <div class="space-y-2.5 mb-6">
                                <p class="text-gray-600 text-base flex items-start gap-2"><i class="fa-solid fa-envelope text-accent mt-0.5 w-5 text-center text-sm"></i><a href="mailto:legal@streetsafe.pk" class="text-accent hover:underline">legal@streetsafe.pk</a></p>
                                <p class="text-gray-600 text-base flex items-start gap-2"><i class="fa-solid fa-phone text-accent mt-0.5 w-5 text-center text-sm"></i>+92 21 111 222 333</p>
                                <p class="text-gray-600 text-base flex items-start gap-2"><i class="fa-solid fa-location-dot text-accent mt-0.5 w-5 text-center text-sm"></i>F-7 Markaz, Islamabad, Pakistan</p>
                                <p class="text-gray-600 text-base flex items-start gap-2"><i class="fa-solid fa-clock text-accent mt-0.5 w-5 text-center text-sm"></i>Response time: Within 5 business days</p>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed mb-6">For urgent legal matters, mark your email subject as <strong class="text-gray-800">'URGENT LEGAL'</strong> for priority handling.</p>
                            <a href="/contact" class="inline-flex items-center gap-2 bg-accent hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3 rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-accent/25">
                                <i class="fa-solid fa-envelope"></i>
                                Contact Legal Team
                            </a>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </section>

    <!-- SECTION 4 — AGREEMENT BANNER -->
    <section class="bg-primary py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full bg-accent/20 blur-[120px]"></div>
        </div>
        <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 text-center">
            <div data-aos="fade-up">
                <i class="fa-solid fa-file-contract text-accent text-[60px] blue-glow mb-6 block"></i>
            </div>
            <h2 data-aos="fade-up" data-aos-delay="100" class="font-poppins font-bold text-3xl sm:text-[32px] text-white mb-4">By Using StreetSafe, You Agree</h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-gray-400 text-base sm:text-lg leading-relaxed mb-8 max-w-2xl mx-auto">
                These terms exist to protect you, other users, and the integrity of Pakistan's safety data. We believe in fair, transparent terms that respect your rights.
            </p>
            <div data-aos="fade-up" data-aos-delay="300" class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/login" class="bg-accent hover:bg-blue-700 text-white font-bold text-sm px-10 py-4 rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-accent/25">
                    I Accept — Get Started
                </a>
                <a href="/privacy" class="border border-white/30 hover:border-white/60 text-white font-medium text-sm px-10 py-4 rounded-full transition-all duration-300 hover:bg-white/5">
                    Read Privacy Policy
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-[#060B18] pt-16 pb-8 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                <div>
                    <a href="/" class="flex items-center gap-2 mb-4">
                        <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-accent to-secondary flex items-center justify-center gradient-animate">
                            <i class="fa-solid fa-shield-halved text-white text-sm"></i>
                        </div>
                        <span class="font-poppins font-extrabold text-xl text-white tracking-tight">Street<span class="text-gradient">Safe</span></span>
                    </a>
                    <p class="text-gray-500 text-sm leading-relaxed mb-5">Making Pakistan's streets safer through community-driven incident reporting and real-time alerts.</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-accent/20 flex items-center justify-center text-gray-400 hover:text-accent transition-all duration-200"><i class="fa-brands fa-facebook-f text-sm"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-accent/20 flex items-center justify-center text-gray-400 hover:text-accent transition-all duration-200"><i class="fa-brands fa-twitter text-sm"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-accent/20 flex items-center justify-center text-gray-400 hover:text-accent transition-all duration-200"><i class="fa-brands fa-instagram text-sm"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-accent/20 flex items-center justify-center text-gray-400 hover:text-accent transition-all duration-200"><i class="fa-brands fa-youtube text-sm"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="font-poppins font-semibold text-white text-sm mb-4">Quick Links</h4>
                    <ul class="space-y-2.5">
                        <li><a href="/" class="text-gray-500 hover:text-secondary text-sm transition-colors duration-200">Home</a></li>
                        <li><a href="/features" class="text-gray-500 hover:text-secondary text-sm transition-colors duration-200">Features</a></li>
                        <li><a href="/safety-tips" class="text-gray-500 hover:text-secondary text-sm transition-colors duration-200">Safety Tips</a></li>
                        <li><a href="/report" class="text-gray-500 hover:text-secondary text-sm transition-colors duration-200">Report Incident</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-poppins font-semibold text-white text-sm mb-4">Legal</h4>
                    <ul class="space-y-2.5">
                        <li><a href="/privacy" class="text-gray-500 hover:text-secondary text-sm transition-colors duration-200">Privacy Policy</a></li>
                        <li><a href="/terms" class="text-secondary text-sm font-medium">Terms of Service</a></li>
                        <li><a href="/disclaimer" class="text-gray-500 hover:text-secondary text-sm transition-colors duration-200">Disclaimer</a></li>
                        <li><a href="/accessibility" class="text-gray-500 hover:text-secondary text-sm transition-colors duration-200">Accessibility</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-poppins font-semibold text-white text-sm mb-4">Contact</h4>
                    <ul class="space-y-2.5">
                        <li class="flex items-start gap-2 text-gray-500 text-sm"><i class="fa-solid fa-envelope mt-0.5 text-accent/60 text-xs"></i><a href="mailto:info@streetsafe.pk" class="hover:text-secondary transition-colors">info@streetsafe.pk</a></li>
                        <li class="flex items-start gap-2 text-gray-500 text-sm"><i class="fa-solid fa-phone mt-0.5 text-accent/60 text-xs"></i>+92 21 111 222 333</li>
                        <li class="flex items-start gap-2 text-gray-500 text-sm"><i class="fa-solid fa-location-dot mt-0.5 text-accent/60 text-xs"></i>F-7 Markaz, Islamabad</li>
                    </ul>
                    <a href="/contact" class="inline-flex items-center gap-2 mt-4 text-accent hover:text-secondary text-sm font-medium transition-colors duration-200">
                        Get in Touch <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
            <div class="border-t border-white/5 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-gray-600 text-xs">&copy; 2024 StreetSafe Pakistan. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="/privacy" class="text-gray-600 hover:text-gray-400 text-xs transition-colors">Privacy</a>
                    <a href="/terms" class="text-gray-600 hover:text-gray-400 text-xs transition-colors">Terms</a>
                    <a href="/sitemap" class="text-gray-600 hover:text-gray-400 text-xs transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
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
            const container = document.getElementById('particles-container');
            if (!container) return;
            for (let i = 0; i < 20; i++) {
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

        // TOC active section
        const sections = document.querySelectorAll('[id^="section-"]');
        const tocLinks = document.querySelectorAll('.toc-link');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    tocLinks.forEach(l => l.classList.remove('text-accent', 'font-bold'));
                    const active = document.querySelector(`.toc-link[href="#${entry.target.id}"]`);
                    if (active) active.classList.add('text-accent', 'font-bold');
                }
            });
        }, { threshold: 0.3 });
        sections.forEach(s => observer.observe(s));
    </script>
</body>
</html>