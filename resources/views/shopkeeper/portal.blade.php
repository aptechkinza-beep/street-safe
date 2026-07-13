<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopkeeper Portal | StreetSafe Pakistan</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#0A0F1E',
                        blue: '#1A73E8',
                        cyan: '#00D4FF',
                        grayBg: '#F4F6FA',
                        danger: '#EF4444',
                        warning: '#F59E0B',
                        success: '#10B981'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.15)',
                        'glow': '0 0 15px rgba(0, 212, 255, 0.5)',
                        'glow-red': '0 0 15px rgba(239, 68, 68, 0.6)',
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Custom Styles & Animations */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F4F6FA;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }

        /* Particle Animation */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 212, 255, 0.1);
            animation: float 20s infinite linear;
            z-index: 0;
            pointer-events: none;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            50% { opacity: 0.5; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }

        /* Glassmorphism */
        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .glass-nav {
            background: rgba(10, 15, 30, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Shimmer Effect for Skeleton */
        .shimmer {
            position: relative;
            overflow: hidden;
        }
        .shimmer::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, transparent 0%, rgba(255,255,255,0.4) 50%, transparent 100%);
            transform: skewX(-20deg) translateX(-150%);
            animation: shimmer-move 1.5s infinite;
        }
        @keyframes shimmer-move {
            100% { transform: skewX(-20deg) translateX(150%); }
        }

        /* Scrollbar Hide for Horizontal Scroll */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Success Checkmark Animation */
        .checkmark__circle { stroke-dasharray: 166; stroke-dashoffset: 166; stroke-width: 2; stroke-miterlimit: 10; stroke: #10B981; fill: none; animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards; }
        .checkmark { width: 56px; height: 56px; border-radius: 50%; display: block; stroke-width: 2; stroke: #fff; stroke-miterlimit: 10; margin: 10% auto; box-shadow: inset 0px 0px 0px #10B981; animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both; }
        .checkmark__check { transform-origin: 50% 50%; stroke-dasharray: 48; stroke-dashoffset: 48; animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards; }
        @keyframes stroke { 100% { stroke-dashoffset: 0; } }
        @keyframes scale { 0%, 100% { transform: none; } 50% { transform: scale3d(1.1, 1.1, 1); } }
        @keyframes fill { 100% { box-shadow: inset 0px 0px 0px 30px #10B981; } }

        /* Utility for placeholder fade */
        .fade-text {
            transition: opacity 0.3s ease;
            opacity: 1;
        }
        .fade-text.out {
            opacity: 0;
        }
    </style>
</head>
<body class="antialiased text-gray-800">

    <!-- TOP NAVBAR -->
    <nav class="fixed top-0 w-full z-50 glass-nav transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Left: Logo -->
                <div class="flex items-center gap-3">
                    <div class="bg-blue/10 p-2 rounded-lg">
                        <i class="fa-solid fa-shield-halved text-2xl text-cyan"></i>
                    </div>
                    <span class="font-heading font-bold text-2xl text-white tracking-wide">StreetSafe</span>
                </div>

                <!-- Center: Label -->
                <div class="hidden md:flex items-center">
                    <span class="bg-cyan/20 text-cyan border border-cyan/40 px-4 py-1 rounded-full text-sm font-semibold uppercase tracking-wider shadow-glow">
                        Shopkeeper Portal
                    </span>
                </div>

                <!-- Right: User Info -->
                <div class="flex items-center gap-4 md:gap-6">
                    <div class="hidden md:flex flex-col items-end">
                        <span class="text-white font-medium text-sm">Al-Kareem Electronics</span>
                        <div class="flex items-center text-gray-400 text-xs gap-1">
                            <i class="fa-solid fa-location-dot text-cyan"></i>
                            <span>Karachi</span>
                        </div>
                    </div>
                    
                    <div class="h-10 w-10 rounded-full bg-blue text-white flex items-center justify-center font-bold text-lg border-2 border-cyan shadow-glow cursor-pointer hover:scale-105 transition-transform">
                        AK
                    </div>
                    
                    <button class="text-gray-400 hover:text-white transition-colors">
                        <i class="fa-solid fa-right-from-bracket text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SEARCH SECTION -->
    <header class="relative bg-navy pt-32 pb-20 overflow-hidden">
        <!-- Particles -->
        <div id="particles-container" class="absolute inset-0 w-full h-full">
            <!-- Particles injected via JS -->
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-heading font-bold text-white mb-4 animate__animated animate__fadeInDown">
                Search Stolen & Missing Items Database
            </h1>
            <p class="text-gray-400 text-lg md:text-xl mb-10 max-w-2xl mx-auto animate__animated animate__fadeIn animate__delay-1s">
                If someone is trying to sell you something suspicious, search our database instantly.
            </p>

            <!-- Search Bar -->
            <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-2 md:p-4 max-w-4xl mx-auto shadow-2xl animate__animated animate__fadeInUp animate__delay-1s">
                <div class="flex flex-col md:flex-row gap-2">
                    <!-- Input -->
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-gray-400 text-lg"></i>
                        </div>
                        <input type="text" id="searchInput" 
                            class="block w-full pl-12 pr-4 py-4 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan focus:border-transparent transition-all shadow-sm" 
                            placeholder="Search by item name...">
                    </div>
                    <!-- Button -->
                    <button onclick="performSearch()" id="searchBtn" 
                        class="bg-blue hover:bg-blue/90 text-white font-bold py-4 px-8 rounded-xl transition-all shadow-lg hover:shadow-glow flex items-center justify-center gap-2">
                        <span>Search Database</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

                <!-- Filters Row -->
                <div class="mt-4 flex flex-wrap items-center gap-3 justify-center md:justify-start">
                    <select class="bg-navy/50 text-white text-sm border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan cursor-pointer hover:bg-navy/70">
                        <option>All Types</option>
                        <option>Mobile Phone</option>
                        <option>Laptop</option>
                        <option>Wallet</option>
                        <option>Jewelry</option>
                        <option>Watch</option>
                        <option>Vehicle</option>
                    </select>

                    <select class="bg-navy/50 text-white text-sm border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan cursor-pointer hover:bg-navy/70">
                        <option>All Cities</option>
                        <option>Karachi</option>
                        <option>Lahore</option>
                        <option>Islamabad</option>
                        <option>Rawalpindi</option>
                        <option>Peshawar</option>
                        <option>Quetta</option>
                    </select>

                    <select class="bg-navy/50 text-white text-sm border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan cursor-pointer hover:bg-navy/70">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 3 months</option>
                        <option>All Time</option>
                    </select>

                    <button onclick="resetSearch()" class="ml-auto text-gray-400 hover:text-white text-sm font-medium underline underline-offset-4 decoration-gray-600 hover:decoration-cyan transition-all">
                        Clear Filters
                    </button>
                </div>
            </div>
            
            <!-- Validation Tooltip -->
            <div id="validationMsg" class="hidden mt-2 text-red-400 text-sm font-medium animate__animated animate__headShake">
                <i class="fa-solid fa-circle-exclamation mr-1"></i> Please enter a search term
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT AREA -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 min-h-[500px]">

        <!-- STATE 1: DEFAULT (Empty State) -->
        <div id="state-default" class="flex flex-col items-center justify-center py-10">
            <div class="bg-navy/5 w-24 h-24 rounded-full flex items-center justify-center mb-6 shadow-inner animate-pulse">
                <i class="fa-solid fa-magnifying-glass text-4xl text-cyan opacity-50"></i>
            </div>
            <h3 class="text-2xl font-bold text-navy mb-2">Enter item details above to search</h3>
            <p class="text-gray-500 mb-10 text-center max-w-md">Search by name, brand, model, color, or serial number to protect your business from buying stolen goods.</p>

            <!-- Tip Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <!-- Tip 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-12 h-12 bg-blue/10 rounded-lg flex items-center justify-center mb-4 text-blue">
                        <i class="fa-solid fa-barcode text-xl"></i>
                    </div>
                    <h4 class="font-bold text-navy mb-2">Check Serial Number</h4>
                    <p class="text-sm text-gray-500">Always ask the seller for the IMEI or serial number to verify against our database.</p>
                </div>
                <!-- Tip 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 bg-cyan/10 rounded-lg flex items-center justify-center mb-4 text-cyan">
                        <i class="fa-solid fa-clipboard-list text-xl"></i>
                    </div>
                    <h4 class="font-bold text-navy mb-2">Note Description</h4>
                    <p class="text-sm text-gray-500">Pay attention to the color, condition, and specific accessories included.</p>
                </div>
                <!-- Tip 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 bg-warning/10 rounded-lg flex items-center justify-center mb-4 text-warning">
                        <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                    </div>
                    <h4 class="font-bold text-navy mb-2">Stay Alert</h4>
                    <p class="text-sm text-gray-500">If the price is too good to be true or the seller seems anxious, trust your instincts.</p>
                </div>
            </div>
        </div>

        <!-- STATE 2: LOADING (Skeleton) -->
        <div id="state-loading" class="hidden py-6">
            <div class="text-center mb-8">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-blue mb-2"></div>
                <p class="text-gray-500 font-medium animate-pulse">Searching database...</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Skeleton Card 1 -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100 h-[420px]">
                    <div class="h-48 bg-gray-200 shimmer"></div>
                    <div class="p-5 space-y-4">
                        <div class="h-6 bg-gray-200 rounded w-3/4 shimmer"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/2 shimmer"></div>
                        <div class="h-4 bg-gray-200 rounded w-full shimmer"></div>
                        <div class="h-4 bg-gray-200 rounded w-full shimmer"></div>
                        <div class="h-10 bg-gray-200 rounded w-full mt-6 shimmer"></div>
                    </div>
                </div>
                <!-- Skeleton Card 2 -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100 h-[420px]">
                    <div class="h-48 bg-gray-200 shimmer"></div>
                    <div class="p-5 space-y-4">
                        <div class="h-6 bg-gray-200 rounded w-3/4 shimmer"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/2 shimmer"></div>
                        <div class="h-4 bg-gray-200 rounded w-full shimmer"></div>
                        <div class="h-4 bg-gray-200 rounded w-full shimmer"></div>
                        <div class="h-10 bg-gray-200 rounded w-full mt-6 shimmer"></div>
                    </div>
                </div>
                <!-- Skeleton Card 3 -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100 h-[420px]">
                    <div class="h-48 bg-gray-200 shimmer"></div>
                    <div class="p-5 space-y-4">
                        <div class="h-6 bg-gray-200 rounded w-3/4 shimmer"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/2 shimmer"></div>
                        <div class="h-4 bg-gray-200 rounded w-full shimmer"></div>
                        <div class="h-4 bg-gray-200 rounded w-full shimmer"></div>
                        <div class="h-10 bg-gray-200 rounded w-full mt-6 shimmer"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STATE 3: RESULTS -->
        <div id="state-results" class="hidden">
            <!-- Results Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <div>
                    <h2 class="text-xl font-bold text-navy">Search Results</h2>
                    <p class="text-sm text-gray-500" id="result-count-text">Showing 3 results for 'iPhone'</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-500">Sort by:</span>
                    <select class="bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue focus:border-blue block p-2">
                        <option>Relevance</option>
                        <option>Date Reported (Newest)</option>
                        <option>Reward Amount</option>
                    </select>
                </div>
            </div>

            <!-- Results Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Card 1 -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col" data-aos="fade-up" data-aos-delay="0">
                    <div class="relative h-48 bg-navy flex items-center justify-center overflow-hidden">
                        <i class="fa-solid fa-mobile-screen-button text-6xl text-blue/80 group-hover:scale-110 transition-transform duration-500"></i>
                        <div class="absolute top-4 left-[-10px]">
                            <span class="bg-danger text-white text-xs font-bold px-4 py-1 rounded shadow-md rotate-[-5deg]">STOLEN</span>
                        </div>
                    </div>
                    <div class="p-5 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-bold text-lg text-navy leading-tight">iPhone 14 Pro Max</h3>
                                <span class="inline-block bg-blue/10 text-blue text-xs font-semibold px-2 py-0.5 rounded mt-1">Apple</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-gray-900"></span> Black
                            </div>
                            <span class="bg-gray-100 px-2 py-0.5 rounded text-xs">Good</span>
                        </div>

                        <div class="space-y-2 text-sm text-gray-600 mb-4 flex-grow">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-gray-400 w-4"></i> Lost: 12 Jan 2024
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-gray-400 w-4"></i> Gulshan, Karachi
                            </div>
                        </div>

                        <div class="bg-success/10 border border-success/20 rounded-lg px-3 py-2 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-hand-holding-dollar text-success"></i>
                            <span class="text-success font-bold text-sm">Reward: PKR 10,000</span>
                        </div>

                        <div class="grid grid-cols-2 gap-3 mt-auto pt-4 border-t border-gray-100">
                            <button class="border border-blue text-blue font-medium py-2 rounded-lg text-sm hover:bg-blue hover:text-white transition-colors">
                                View Details
                            </button>
                            <button onclick="openModal('iPhone 14 Pro Max', '#SS-2024-00234')" class="bg-danger text-white font-medium py-2 rounded-lg text-sm hover:bg-danger/90 hover:shadow-glow-red transition-all flex items-center justify-center gap-1">
                                <i class="fa-solid fa-triangle-exclamation text-xs"></i> Report
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative h-48 bg-navy flex items-center justify-center overflow-hidden">
                        <i class="fa-solid fa-mobile-screen-button text-6xl text-blue/80 group-hover:scale-110 transition-transform duration-500"></i>
                        <div class="absolute top-4 left-[-10px]">
                            <span class="bg-warning text-white text-xs font-bold px-4 py-1 rounded shadow-md rotate-[-5deg]">MISSING</span>
                        </div>
                    </div>
                    <div class="p-5 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-bold text-lg text-navy leading-tight">Samsung Galaxy S23</h3>
                                <span class="inline-block bg-blue/10 text-blue text-xs font-semibold px-2 py-0.5 rounded mt-1">Samsung</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-white border border-gray-300"></span> White
                            </div>
                            <span class="bg-gray-100 px-2 py-0.5 rounded text-xs">New</span>
                        </div>

                        <div class="space-y-2 text-sm text-gray-600 mb-4 flex-grow">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-gray-400 w-4"></i> Lost: 8 Jan 2024
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-gray-400 w-4"></i> DHA, Karachi
                            </div>
                        </div>

                        <div class="flex-grow mb-4"></div> <!-- Spacer for no reward -->

                        <div class="grid grid-cols-2 gap-3 mt-auto pt-4 border-t border-gray-100">
                            <button class="border border-blue text-blue font-medium py-2 rounded-lg text-sm hover:bg-blue hover:text-white transition-colors">
                                View Details
                            </button>
                            <button onclick="openModal('Samsung Galaxy S23', '#SS-2024-00912')" class="bg-danger text-white font-medium py-2 rounded-lg text-sm hover:bg-danger/90 hover:shadow-glow-red transition-all flex items-center justify-center gap-1">
                                <i class="fa-solid fa-triangle-exclamation text-xs"></i> Report
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative h-48 bg-navy flex items-center justify-center overflow-hidden">
                        <i class="fa-solid fa-laptop text-6xl text-blue/80 group-hover:scale-110 transition-transform duration-500"></i>
                        <div class="absolute top-4 left-[-10px]">
                            <span class="bg-danger text-white text-xs font-bold px-4 py-1 rounded shadow-md rotate-[-5deg]">STOLEN</span>
                        </div>
                    </div>
                    <div class="p-5 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-bold text-lg text-navy leading-tight">MacBook Pro 14"</h3>
                                <span class="inline-block bg-blue/10 text-blue text-xs font-semibold px-2 py-0.5 rounded mt-1">Apple</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-gray-600"></span> Space Gray
                            </div>
                            <span class="bg-gray-100 px-2 py-0.5 rounded text-xs">Good</span>
                        </div>

                        <div class="space-y-2 text-sm text-gray-600 mb-4 flex-grow">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-gray-400 w-4"></i> Lost: 3 Jan 2024
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-gray-400 w-4"></i> Clifton, Karachi
                            </div>
                        </div>

                        <div class="bg-success/10 border border-success/20 rounded-lg px-3 py-2 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-hand-holding-dollar text-success"></i>
                            <span class="text-success font-bold text-sm">Reward: PKR 25,000</span>
                        </div>

                        <div class="grid grid-cols-2 gap-3 mt-auto pt-4 border-t border-gray-100">
                            <button class="border border-blue text-blue font-medium py-2 rounded-lg text-sm hover:bg-blue hover:text-white transition-colors">
                                View Details
                            </button>
                            <button onclick="openModal('MacBook Pro 14\"', '#SS-2024-01055')" class="bg-danger text-white font-medium py-2 rounded-lg text-sm hover:bg-danger/90 hover:shadow-glow-red transition-all flex items-center justify-center gap-1">
                                <i class="fa-solid fa-triangle-exclamation text-xs"></i> Report
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <!-- BOTTOM SECTION: RECENT ALERTS -->
    <section class="bg-white py-12 border-t border-gray-200 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-6">
                <div>
                    <h2 class="text-2xl font-heading font-bold text-navy">Recent Missing Items in Karachi</h2>
                    <span class="bg-cyan/20 text-cyan text-xs font-bold px-2 py-1 rounded uppercase mt-1 inline-block">Your City</span>
                </div>
            </div>

            <!-- Horizontal Scroll -->
            <div class="flex overflow-x-auto gap-4 pb-4 hide-scrollbar snap-x">
                <!-- Alert 1 -->
                <div class="min-w-[280px] bg-grayBg border-l-4 border-danger rounded-r-xl p-4 shadow-sm snap-center hover:bg-white transition-colors cursor-pointer">
                    <div class="flex gap-4">
                        <div class="bg-white w-12 h-12 rounded-lg flex items-center justify-center text-navy shadow-sm">
                            <i class="fa-solid fa-mobile-screen"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-navy text-sm">iPhone 13</h4>
                            <p class="text-xs text-gray-500">Reported: 2 hours ago</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="bg-danger text-white text-[10px] font-bold px-2 py-0.5 rounded-full">STOLEN</span>
                    </div>
                </div>
                <!-- Alert 2 -->
                <div class="min-w-[280px] bg-grayBg border-l-4 border-warning rounded-r-xl p-4 shadow-sm snap-center hover:bg-white transition-colors cursor-pointer">
                    <div class="flex gap-4">
                        <div class="bg-white w-12 h-12 rounded-lg flex items-center justify-center text-navy shadow-sm">
                            <i class="fa-solid fa-motorcycle"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-navy text-sm">Honda CD 70</h4>
                            <p class="text-xs text-gray-500">Reported: 5 hours ago</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="bg-warning text-white text-[10px] font-bold px-2 py-0.5 rounded-full">MISSING</span>
                    </div>
                </div>
                <!-- Alert 3 -->
                <div class="min-w-[280px] bg-grayBg border-l-4 border-danger rounded-r-xl p-4 shadow-sm snap-center hover:bg-white transition-colors cursor-pointer">
                    <div class="flex gap-4">
                        <div class="bg-white w-12 h-12 rounded-lg flex items-center justify-center text-navy shadow-sm">
                            <i class="fa-solid fa-watch"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-navy text-sm">Apple Watch S8</h4>
                            <p class="text-xs text-gray-500">Reported: 1 day ago</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="bg-danger text-white text-[10px] font-bold px-2 py-0.5 rounded-full">STOLEN</span>
                    </div>
                </div>
                <!-- Alert 4 -->
                <div class="min-w-[280px] bg-grayBg border-l-4 border-warning rounded-r-xl p-4 shadow-sm snap-center hover:bg-white transition-colors cursor-pointer">
                    <div class="flex gap-4">
                        <div class="bg-white w-12 h-12 rounded-lg flex items-center justify-center text-navy shadow-sm">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-navy text-sm">Brown Leather Wallet</h4>
                            <p class="text-xs text-gray-500">Reported: 2 days ago</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="bg-warning text-white text-[10px] font-bold px-2 py-0.5 rounded-full">MISSING</span>
                    </div>
                </div>
                 <!-- Alert 5 -->
                 <div class="min-w-[280px] bg-grayBg border-l-4 border-danger rounded-r-xl p-4 shadow-sm snap-center hover:bg-white transition-colors cursor-pointer">
                    <div class="flex gap-4">
                        <div class="bg-white w-12 h-12 rounded-lg flex items-center justify-center text-navy shadow-sm">
                            <i class="fa-solid fa-laptop"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-navy text-sm">Dell XPS 15</h4>
                            <p class="text-xs text-gray-500">Reported: 3 days ago</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="bg-danger text-white text-[10px] font-bold px-2 py-0.5 rounded-full">STOLEN</span>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <button class="border border-blue text-blue font-semibold py-2 px-8 rounded-lg hover:bg-blue hover:text-white transition-colors">
                    View All Reports
                </button>
            </div>
        </div>
    </section>

    <!-- REPORT SUSPICION MODAL -->
    <div id="reportModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-navy/80 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!-- Modal Panel -->
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg opacity-0 scale-95" id="modalPanel">
                    
                    <!-- Header -->
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 border-b border-gray-100">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <i class="fa-solid fa-triangle-exclamation text-danger"></i>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg font-bold leading-6 text-navy" id="modal-title">Report Suspicious Activity</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Help us recover stolen property. Your identity will remain confidential.</p>
                                </div>
                                <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                                    <i class="fa-solid fa-xmark text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="px-4 py-5 sm:p-6 space-y-4" id="modalForm">
                        <!-- Alert Box -->
                        <div class="bg-red-50 border border-red-100 rounded-lg p-3 flex gap-3 items-start">
                            <i class="fa-solid fa-circle-info text-danger mt-0.5"></i>
                            <p class="text-xs text-red-700">This report will be immediately forwarded to relevant law enforcement authorities.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Item Reference</label>
                            <input type="text" id="modalItemRef" readonly class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 text-gray-500 text-sm cursor-not-allowed">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Seller Description <span class="text-red-500">*</span></label>
                            <textarea rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-danger focus:border-danger outline-none" placeholder="Describe the seller's appearance, clothing, age, behavior..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Seller Photo (Optional)</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:bg-gray-50 transition-colors cursor-pointer">
                                <i class="fa-solid fa-camera text-gray-400 mb-2"></i>
                                <p class="text-xs text-gray-500">Click to upload or drag photo here</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Your Shop</label>
                                <input type="text" value="Al-Kareem Electronics" readonly class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-600">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                                <input type="text" value="Karachi" readonly class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-600">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Additional Notes</label>
                            <textarea rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-danger focus:border-danger outline-none" placeholder="Any other details..."></textarea>
                        </div>
                    </div>

                    <!-- Success Content (Hidden by default) -->
                    <div class="hidden px-4 py-10 sm:p-10 text-center" id="modalSuccess">
                        <div class="checkmark-wrapper">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-navy mt-4 mb-2">Report Submitted!</h3>
                        <p class="text-gray-500 text-sm mb-4">Case ID: <span id="caseId" class="font-mono font-bold text-gray-700">#AUTH-2024-8821</span></p>
                        <p class="text-gray-400 text-xs">Authorities have been notified and will contact you shortly if needed.</p>
                        <button onclick="closeModal()" class="mt-6 bg-navy text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-navy/90 transition-colors">
                            Close
                        </button>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-100" id="modalFooter">
                        <button type="button" onclick="submitReport()" class="inline-flex w-full justify-center rounded-lg bg-danger px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-danger/90 sm:ml-3 sm:w-auto transition-all items-center gap-2">
                            <span id="submitBtnText">Submit to Authorities</span>
                            <div id="submitSpinner" class="hidden">
                                <i class="fa-solid fa-circle-notch fa-spin"></i>
                            </div>
                        </button>
                        <button type="button" onclick="closeModal()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Scripts -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        /* --- PARTICLE GENERATOR --- */
        function createParticles() {
            const container = document.getElementById('particles-container');
            const particleCount = 15;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size
                const size = Math.random() * 10 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Random delay and duration
                const duration = Math.random() * 10 + 15; // 15-25s
                const delay = Math.random() * 5;
                particle.style.animationDuration = `${duration}s`;
                particle.style.animationDelay = `${delay}s`;
                
                container.appendChild(particle);
            }
        }
        createParticles();

        /* --- SEARCH PLACEHOLDER CYCLER --- */
        const placeholders = [
            "Search by item name...",
            "Search by model number...",
            "Search by brand...",
            "Search by serial/IMEI...",
            "Search by color..."
        ];
        let placeholderIndex = 0;
        const searchInput = document.getElementById('searchInput');

        setInterval(() => {
            searchInput.classList.add('out');
            setTimeout(() => {
                placeholderIndex = (placeholderIndex + 1) % placeholders.length;
                searchInput.placeholder = placeholders[placeholderIndex];
                searchInput.classList.remove('out');
            }, 300);
        }, 3000);

        /* --- SEARCH LOGIC --- */
        const stateDefault = document.getElementById('state-default');
        const stateLoading = document.getElementById('state-loading');
        const stateResults = document.getElementById('state-results');
        const validationMsg = document.getElementById('validationMsg');

        function performSearch() {
            const query = searchInput.value.trim();

            // Validation
            if (!query) {
                validationMsg.classList.remove('hidden');
                searchInput.classList.add('border-danger', 'animate__animated', 'animate__headShake');
                setTimeout(() => {
                    searchInput.classList.remove('animate__animated', 'animate__headShake');
                }, 500);
                return;
            }

            // Reset Validation UI
            validationMsg.classList.add('hidden');
            searchInput.classList.remove('border-danger');

            // Transition to Loading
            stateDefault.classList.add('hidden');
            stateResults.classList.add('hidden');
            stateLoading.classList.remove('hidden');

            // Simulate Network Request
            setTimeout(() => {
                stateLoading.classList.add('hidden');
                stateResults.classList.remove('hidden');
                
                // Update Result Text
                document.getElementById('result-count-text').textContent = `Showing 3 results for '${query}'`;
                
                // Refresh AOS
                setTimeout(() => AOS.refresh(), 100);
            }, 1500);
        }

        function resetSearch() {
            searchInput.value = '';
            stateLoading.classList.add('hidden');
            stateResults.classList.add('hidden');
            stateDefault.classList.remove('hidden');
            validationMsg.classList.add('hidden');
            searchInput.classList.remove('border-danger');
        }

        // Trigger search on Enter
        searchInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });

        /* --- MODAL LOGIC --- */
        const modal = document.getElementById('reportModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modalPanel = document.getElementById('modalPanel');
        const modalForm = document.getElementById('modalForm');
        const modalFooter = document.getElementById('modalFooter');
        const modalSuccess = document.getElementById('modalSuccess');

        function openModal(itemName, itemRef) {
            modal.classList.remove('hidden');
            document.getElementById('modalItemRef').value = `${itemName} — ${itemRef}`;
            
            // Animation In
            setTimeout(() => {
                modalBackdrop.classList.remove('opacity-0');
                modalPanel.classList.remove('opacity-0', 'scale-95');
                modalPanel.classList.add('opacity-100', 'scale-100');
            }, 10);
        }

        function closeModal() {
            // Animation Out
            modalBackdrop.classList.add('opacity-0');
            modalPanel.classList.remove('opacity-100', 'scale-100');
            modalPanel.classList.add('opacity-0', 'scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
                resetModalState();
            }, 300);
        }

        function resetModalState() {
            modalForm.classList.remove('hidden');
            modalFooter.classList.remove('hidden');
            modalSuccess.classList.add('hidden');
            // Generate new random Case ID
            const randomId = Math.floor(1000 + Math.random() * 9000);
            document.getElementById('caseId').textContent = `#AUTH-2024-${randomId}`;
            document.getElementById('submitBtnText').textContent = "Submit to Authorities";
            document.getElementById('submitSpinner').classList.add('hidden');
        }

        function submitReport() {
            // Simulate Submission
            const btnText = document.getElementById('submitBtnText');
            const spinner = document.getElementById('submitSpinner');
            
            btnText.textContent = "Submitting...";
            spinner.classList.remove('hidden');

            setTimeout(() => {
                modalForm.classList.add('hidden');
                modalFooter.classList.add('hidden');
                modalSuccess.classList.remove('hidden');
            }, 1500);
        }

        // Close modal on click outside
        modalBackdrop.addEventListener('click', closeModal);
    </script>
</body>
</html>