<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Incident - StreetSafe</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            DEFAULT: '#0A0F1E',
                            light: '#1A2238'
                        },
                        electric: {
                            DEFAULT: '#1A73E8',
                            hover: '#1557B0'
                        },
                        cyan: {
                            DEFAULT: '#00D4FF'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        'glow': '0 0 15px rgba(26, 115, 232, 0.5)',
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        /* Custom Styles & Animation Overrides */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F4F6FA;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1; 
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; 
        }

        /* Glassmorphism Utilities */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Map Pulse Animation */
        .map-pulse {
            position: relative;
        }
        .map-pulse::before {
            content: '';
            position: absolute;
            left: 50%; top: 50%;
            transform: translate(-50%, -50%);
            width: 20px; height: 20px;
            background-color: var(--pulse-color, #EF4444);
            border-radius: 50%;
            opacity: 0.7;
            animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }
        @keyframes pulse-ring {
            0% { transform: translate(-50%, -50%) scale(0.5); opacity: 1; }
            100% { transform: translate(-50%, -50%) scale(3); opacity: 0; }
        }

        /* Selection Card Transitions */
        .incident-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .incident-card.dimmed {
            opacity: 0.5;
            transform: scale(0.95);
        }
        .incident-card.active {
            transform: scale(1.03);
            border-color: var(--accent-color);
            background-color: var(--accent-bg);
            box-shadow: 0 10px 30px -10px var(--accent-color);
        }

        /* Form Slide Down */
        .form-container {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.8s ease-in-out, opacity 0.5s ease-in-out;
        }
        .form-container.open {
            max-height: 3000px; /* Arbitrary large height */
            opacity: 1;
        }

        /* Toggle Switch */
        .toggle-checkbox:checked {
            right: 0;
            border-color: #1A73E8;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #1A73E8;
        }
        
        /* Drag and Drop Zone */
        .drag-active {
            border-color: var(--accent-color) !important;
            background-color: var(--accent-bg) !important;
            transform: scale(1.02);
        }

        /* Success Checkmark Animation */
        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #10B981;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            stroke: #10B981;
            stroke-width: 3;
            fill: none;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        @keyframes stroke {
            100% { stroke-dashoffset: 0; }
        }

        /* Validation Shake */
        .shake {
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }
        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }

        /* Image Preview Animation */
        .preview-enter {
            animation: popIn 0.3s ease-out forwards;
        }
        @keyframes popIn {
            0% { transform: scale(0); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .nav-link { position: relative; transition: all 0.3s ease; }
        .nav-link::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background-color: #1A73E8; transform: scaleY(0); transition: transform 0.2s ease; border-radius: 0 4px 4px 0; }
        .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
        .nav-link:hover, .nav-link.active { background-color: rgba(26,115,232,0.1); color: #1A73E8; }
    </style>
</head>
<body class="text-slate-800">

    <div class="flex h-screen overflow-hidden">

        <!-- LEFT SIDEBAR -->
        <aside class="w-[260px] bg-navy text-white flex flex-col justify-between shadow-xl z-20 flex-shrink-0">
            <!-- Logo Area -->
            <div class="p-6 flex items-center space-x-3 border-b border-navy-light">
                <div class="w-10 h-10 bg-electric rounded-lg flex items-center justify-center shadow-glow">
                    <i class="fa-solid fa-shield-halved text-white text-xl"></i>
                </div>
                <span class="text-xl font-heading font-bold tracking-wide">StreetSafe</span>
            </div>

            <!-- User Mini Card -->
            <div class="p-6">
                <div class="bg-navy-light rounded-xl p-4 flex items-center space-x-3 border border-slate-700">
                    <div class="w-10 h-10 rounded-full bg-cyan flex items-center justify-center font-bold text-navy">
                        AK
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold">Ahmed Khan</h4>
                        <div class="flex items-center text-xs text-green-400">
                            <i class="fa-solid fa-check-circle mr-1"></i> Verified User
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-2 space-y-1 overflow-y-auto animate__animated animate__fadeInLeft" style="animation-delay:0.2s;">
                <!-- Dashboard -->
                <a href="/dashboard" class="nav-link active flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-300 hover:text-white group">
                    <i class="fa-solid fa-chart-pie w-6 text-center mr-2"></i>
                    Dashboard
                </a>
                <!-- My Reports -->
                <a href="/my-reports" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-300 hover:text-white group">
                    <i class="fa-solid fa-flag w-6 text-center mr-2"></i>
                    My Reports
                </a>
                <!-- Report Incident -->
                <a href="/reports/incident" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-300 hover:text-white group">
                    <i class="fa-solid fa-circle-plus w-6 text-center mr-2"></i>
                    Report Incident
                </a>
                <!-- Missing Items -->
                <a href="/reports/missing-item" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-300 hover:text-white group">
                    <i class="fa-solid fa-magnifying-glass w-6 text-center mr-2"></i>
                    Missing Items
                </a>
                <!-- Safety Map -->
                <a href="/map/index" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-300 hover:text-white group">
                    <i class="fa-solid fa-map-location-dot w-6 text-center mr-2"></i>
                    Safety Map
                </a>
                {{-- Analytics --}}
                <a href="/analytics/index" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-300 hover:text-white group">
                    <i class="fa-solid fa-chart-line w-5 text-blue-accent"></i>
                    <span class="font-semibold">Analytics</span>
                </a>
                <!-- Notifications -->
                <a href="/notifications" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-300 hover:text-white group">
                    <div class="relative mr-2">
                        <i class="fa-solid fa-bell w-6 text-center"></i>
                        <span class="absolute -top-1 right-0 bg-red-500 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full border border-darkNavy">3</span>
                    </div>
                    Notifications
                </a>
                <!-- Settings -->
                <a href="/profile/settings" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-300 hover:text-white group">
                    <i class="fa-solid fa-gear w-6 text-center mr-2"></i>
                    Settings
                </a>
            </nav>

            <!-- Bottom Area -->
            <div class="p-4 border-t border-navy-light">
                <!-- Safety Score -->
                <div class="bg-navy-light rounded-xl p-4 mb-4 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-400 mb-1">Safety Score</p>
                        <p class="text-xl font-bold text-cyan">87/100</p>
                    </div>
                    <div class="relative w-12 h-12 flex items-center justify-center">
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                            <path class="text-slate-700" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
                            <path class="text-cyan" stroke-dasharray="87, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
                        </svg>
                    </div>
                </div>

                <!-- Logout -->
                <a href="#" class="flex items-center space-x-3 px-4 py-2 text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-lg transition-all">
                    <i class="fa-solid fa-right-from-bracket w-5"></i>
                    <span class="font-medium">Logout</span>
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 flex flex-col h-full overflow-hidden relative">
            
            <!-- TOP HEADER -->
            <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-200 flex items-center justify-between px-8 flex-shrink-0 z-10">
                <div>
                    <h1 class="text-2xl font-bold text-navy font-heading">Report Incident</h1>
                    <div class="text-sm text-slate-500 mt-1">
                        <span class="hover:text-electric cursor-pointer">Home</span> 
                        <i class="fa-solid fa-chevron-right text-xs mx-2 text-slate-300"></i> 
                        <span class="hover:text-electric cursor-pointer">Reports</span> 
                        <i class="fa-solid fa-chevron-right text-xs mx-2 text-slate-300"></i> 
                        <span class="text-electric font-semibold">Incident</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-6">
                    <div class="relative cursor-pointer group">
                        <i class="fa-regular fa-bell text-xl text-slate-600 group-hover:text-electric transition-colors"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 w-2 h-2 rounded-full animate-pulse"></span>
                    </div>
                    <div class="flex items-center space-x-3 cursor-pointer">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-navy">Ahmed Khan</p>
                            <p class="text-xs text-slate-500">Lahore, Pakistan</p>
                        </div>
                        <img src="https://picsum.photos/seed/user1/40/40" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-white shadow-md">
                    </div>
                </div>
            </header>

            <!-- SCROLLABLE CONTENT AREA -->
            <div class="flex-1 overflow-y-auto p-8" id="main-scroll">
                
                <div class="max-w-5xl mx-auto pb-20">
                    
                    <!-- SECTION 1: INCIDENT TYPE SELECTION -->
                    <section class="mb-12" data-aos="fade-up">
                        <h2 class="text-3xl font-bold text-navy mb-2 font-heading">What would you like to report?</h2>
                        <p class="text-slate-500 mb-8 text-lg">Select the type of incident to continue</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="incident-grid">
                            
                            <!-- Card 1: Snatching / Robbery -->
                            <div class="incident-card bg-white rounded-2xl p-6 border-2 border-transparent cursor-pointer relative group hover:shadow-lg" 
                                 onclick="selectIncident('snatching')" 
                                 data-type="snatching"
                                 data-accent="#EF4444"
                                 data-accent-bg="rgba(239, 68, 68, 0.05)">
                                <div class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center check-badge transition-colors">
                                    <i class="fa-solid fa-check text-white text-xs opacity-0 transition-opacity"></i>
                                </div>
                                <div class="flex items-start space-x-5">
                                    <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center text-red-500 text-2xl group-hover:bg-red-500 group-hover:text-white transition-colors duration-300 shadow-sm">
                                        <i class="fa-solid fa-person-running"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-navy mb-1 group-hover:text-red-500 transition-colors">Snatching / Robbery</h3>
                                        <p class="text-slate-500 text-sm leading-relaxed">Report mobile snatching, bag grabbing, or armed robbery</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2: Road Damage -->
                            <div class="incident-card bg-white rounded-2xl p-6 border-2 border-transparent cursor-pointer relative group hover:shadow-lg" 
                                 onclick="selectIncident('road')" 
                                 data-type="road"
                                 data-accent="#F97316"
                                 data-accent-bg="rgba(249, 115, 22, 0.05)">
                                <div class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center check-badge transition-colors">
                                    <i class="fa-solid fa-check text-white text-xs opacity-0 transition-opacity"></i>
                                </div>
                                <div class="flex items-start space-x-5">
                                    <div class="w-16 h-16 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 text-2xl group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300 shadow-sm">
                                        <i class="fa-solid fa-road"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-navy mb-1 group-hover:text-orange-500 transition-colors">Road Damage / Pothole</h3>
                                        <p class="text-slate-500 text-sm leading-relaxed">Report broken roads, potholes, or flooded streets</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3: Harassment Zone -->
                            <div class="incident-card bg-white rounded-2xl p-6 border-2 border-transparent cursor-pointer relative group hover:shadow-lg" 
                                 onclick="selectIncident('harassment')" 
                                 data-type="harassment"
                                 data-accent="#8B5CF6"
                                 data-accent-bg="rgba(139, 92, 246, 0.05)">
                                <div class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center check-badge transition-colors">
                                    <i class="fa-solid fa-check text-white text-xs opacity-0 transition-opacity"></i>
                                </div>
                                <div class="flex items-start space-x-5">
                                    <div class="w-16 h-16 rounded-full bg-purple-100 flex items-center justify-center text-purple-500 text-2xl group-hover:bg-purple-500 group-hover:text-white transition-colors duration-300 shadow-sm">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-navy mb-1 group-hover:text-purple-500 transition-colors">Harassment Zone</h3>
                                        <p class="text-slate-500 text-sm leading-relaxed">Mark unsafe areas where harassment has occurred</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 4: Traffic Issue -->
                            <div class="incident-card bg-white rounded-2xl p-6 border-2 border-transparent cursor-pointer relative group hover:shadow-lg" 
                                 onclick="selectIncident('traffic')" 
                                 data-type="traffic"
                                 data-accent="#EAB308"
                                 data-accent-bg="rgba(234, 179, 8, 0.05)">
                                <div class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center check-badge transition-colors">
                                    <i class="fa-solid fa-check text-white text-xs opacity-0 transition-opacity"></i>
                                </div>
                                <div class="flex items-start space-x-5">
                                    <div class="w-16 h-16 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500 text-2xl group-hover:bg-yellow-500 group-hover:text-white transition-colors duration-300 shadow-sm">
                                        <i class="fa-solid fa-car-burst"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-navy mb-1 group-hover:text-yellow-500 transition-colors">Heavy Traffic / Illegal Parking</h3>
                                        <p class="text-slate-500 text-sm leading-relaxed">Report traffic jams caused by parking or blockage</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                    <!-- SECTION 2: INCIDENT FORM -->
                    <div id="form-wrapper" class="form-container">
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                            
                            <!-- Dynamic Header -->
                            <div id="form-header-bar" class="h-16 px-8 flex items-center justify-between bg-gradient-to-r from-gray-100 to-white transition-colors duration-500">
                                <div class="flex items-center space-x-3">
                                    <div id="header-icon-container" class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm">
                                        <i id="header-icon" class="fa-solid fa-circle text-electric"></i>
                                    </div>
                                    <h3 class="font-bold text-navy text-lg">Reporting: <span id="header-type-title" class="text-electric">Incident</span></h3>
                                </div>
                                <button onclick="resetSelection()" class="text-sm text-slate-500 hover:text-red-500 font-medium transition-colors flex items-center">
                                    <i class="fa-solid fa-arrow-rotate-left mr-2"></i> Change
                                </button>
                            </div>

                            <div class="p-8 md:p-10">
                                <form id="incident-form" onsubmit="event.preventDefault(); submitForm();">
                                    
                                    <!-- Field 1: Location -->
                                    <div class="mb-8 group">
                                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2 group-focus-within:text-electric transition-colors">Location</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <i class="fa-solid fa-location-dot text-slate-400"></i>
                                            </div>
                                            <input type="text" id="location-input" class="block w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-electric focus:ring-0 transition-all peer" placeholder=" " required>
                                            <span class="absolute left-12 top-3 text-slate-400 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-6 peer-focus:text-xs peer-focus:text-electric pointer-events-none origin-[0]">Where did this happen?</span>
                                            <button type="button" class="absolute right-3 top-2 bg-white border border-gray-200 px-3 py-1.5 rounded-lg text-xs font-semibold text-navy hover:bg-gray-50 shadow-sm">
                                                <i class="fa-solid fa-crosshairs mr-1 text-electric"></i> GPS
                                            </button>
                                        </div>
                                        <!-- Dummy Map -->
                                        <div class="mt-4 rounded-xl h-48 bg-navy relative overflow-hidden group cursor-pointer border border-gray-200">
                                            <!-- Grid Pattern -->
                                            <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(#00D4FF 1px, transparent 1px), linear-gradient(90deg, #00D4FF 1px, transparent 1px); background-size: 40px 40px;"></div>
                                            
                                            <!-- Pulse Pin -->
                                            <div class="absolute inset-0 flex flex-col items-center justify-center text-white z-10">
                                                <div class="map-pulse mb-2" style="--pulse-color: var(--current-accent, #EF4444)">
                                                    <i class="fa-solid fa-location-dot text-3xl relative z-10 drop-shadow-lg" style="color: var(--current-accent, #EF4444)"></i>
                                                </div>
                                                <span class="text-sm font-medium bg-navy/80 px-3 py-1 rounded-full backdrop-blur-sm border border-white/10">Click to mark location on map</span>
                                            </div>
                                        </div>
                                        <p class="text-red-500 text-xs mt-1 hidden error-msg">Location is required.</p>
                                    </div>

                                    <!-- Field 2: Date & Time -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Date</label>
                                            <input type="date" id="date-input" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-electric focus:ring-2 focus:ring-electric/20 outline-none transition-all" required>
                                            <p class="text-red-500 text-xs mt-1 hidden error-msg">Date is required.</p>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Time</label>
                                            <input type="time" id="time-input" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-electric focus:ring-2 focus:ring-electric/20 outline-none transition-all" required>
                                            <p class="text-red-500 text-xs mt-1 hidden error-msg">Time is required.</p>
                                        </div>
                                    </div>

                                    <!-- Field 3: Description -->
                                    <div class="mb-8">
                                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Description</label>
                                        <div class="relative">
                                            <textarea id="description-input" rows="4" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-electric focus:ring-2 focus:ring-electric/20 outline-none transition-all resize-none" placeholder="Describe what happened..." maxlength="500" oninput="updateCharCount(this)"></textarea>
                                            <div class="absolute bottom-3 right-3 text-xs text-slate-400 font-mono">
                                                <span id="char-count">0</span>/500
                                            </div>
                                        </div>
                                        <p class="text-red-500 text-xs mt-1 hidden error-msg">Description must be at least 20 characters.</p>
                                    </div>

                                    <!-- Field 4: Upload Evidence -->
                                    <div class="mb-8">
                                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Evidence (Photos/Videos)</label>
                                        <div id="drop-zone" class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 transition-all duration-300 hover:bg-gray-100 cursor-pointer relative">
                                            <input type="file" id="file-input" multiple accept="image/*,video/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleFiles(this.files)">
                                            <div class="pointer-events-none">
                                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                                                    <i class="fa-solid fa-cloud-arrow-up text-2xl text-slate-400"></i>
                                                </div>
                                                <p class="text-slate-600 font-medium">Drag photos/videos here or click to browse</p>
                                                <p class="text-slate-400 text-xs mt-1">Max 5 files (JPG, PNG, MP4)</p>
                                            </div>
                                        </div>
                                        <!-- Preview Area -->
                                        <div id="preview-area" class="flex flex-wrap gap-4 mt-4"></div>
                                    </div>

                                    <!-- Field 5: Anonymous Toggle -->
                                    <div class="mb-8 bg-blue-50/50 border border-blue-100 rounded-xl p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between">
                                        <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                                            <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                                <input type="checkbox" name="toggle" id="anonymous-toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 transition-all duration-300" checked/>
                                                <label for="anonymous-toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                            </div>
                                            <div>
                                                <span class="block text-sm font-bold text-navy">Report Anonymously</span>
                                                <span class="text-xs text-slate-500">Hide identity from public view</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center text-xs text-slate-500 bg-white px-3 py-1.5 rounded-lg border border-gray-200 shadow-sm">
                                            <i class="fa-solid fa-lock text-electric mr-2"></i> We never reveal personal data.
                                        </div>
                                    </div>

                                    <!-- DIVIDER -->
                                    <div class="h-px bg-gray-100 my-8"></div>

                                    <!-- DYNAMIC EXTRA FIELDS -->
                                    <div id="dynamic-fields-container" class="space-y-6">
                                        
                                        <!-- SNATCHING FIELDS -->
                                        <div id="fields-snatching" class="hidden animate__animated animate__fadeIn">
                                            <div class="mb-6">
                                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Suspect Description (Optional)</label>
                                                <textarea rows="3" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-electric focus:ring-2 focus:ring-electric/20 outline-none transition-all resize-none" placeholder="Clothing, height, distinct features..."></textarea>
                                            </div>
                                            <div class="mb-6">
                                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-3">Vehicle Involved?</label>
                                                <div class="flex space-x-4">
                                                    <button type="button" onclick="toggleVehicle(true)" class="vehicle-btn px-4 py-2 rounded-lg border border-gray-200 text-slate-600 hover:bg-gray-50 transition-colors focus:ring-2 ring-red-500 ring-offset-1" id="btn-veh-yes">Yes</button>
                                                    <button type="button" onclick="toggleVehicle(false)" class="vehicle-btn px-4 py-2 rounded-lg border border-red-500 bg-red-50 text-red-500 font-medium transition-colors shadow-sm ring-2 ring-red-500 ring-offset-1" id="btn-veh-no">No</button>
                                                </div>
                                                
                                                <!-- Vehicle Sub-fields (Slide Down) -->
                                                <div id="vehicle-subfields" class="hidden mt-4 pl-4 border-l-2 border-red-100 transition-all duration-300">
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                        <select class="block w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:border-red-500 outline-none">
                                                            <option>Vehicle Type</option>
                                                            <option>Motorcycle (Bike)</option>
                                                            <option>Car</option>
                                                            <option>Rickshaw</option>
                                                            <option>Other</option>
                                                        </select>
                                                        <input type="text" placeholder="Vehicle Color" class="block w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:border-red-500 outline-none">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-3">Time of Day</label>
                                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                                    <label class="cursor-pointer">
                                                        <input type="radio" name="snatch_time" class="peer hidden" checked>
                                                        <div class="text-center py-2 px-1 rounded-lg border border-gray-200 text-slate-600 peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500 transition-all hover:bg-gray-50">
                                                            Morning
                                                        </div>
                                                    </label>
                                                    <label class="cursor-pointer">
                                                        <input type="radio" name="snatch_time" class="peer hidden">
                                                        <div class="text-center py-2 px-1 rounded-lg border border-gray-200 text-slate-600 peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500 transition-all hover:bg-gray-50">
                                                            Afternoon
                                                        </div>
                                                    </label>
                                                    <label class="cursor-pointer">
                                                        <input type="radio" name="snatch_time" class="peer hidden">
                                                        <div class="text-center py-2 px-1 rounded-lg border border-gray-200 text-slate-600 peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500 transition-all hover:bg-gray-50">
                                                            Evening
                                                        </div>
                                                    </label>
                                                    <label class="cursor-pointer">
                                                        <input type="radio" name="snatch_time" class="peer hidden">
                                                        <div class="text-center py-2 px-1 rounded-lg border border-gray-200 text-slate-600 peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500 transition-all hover:bg-gray-50">
                                                            Night
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ROAD DAMAGE FIELDS -->
                                        <div id="fields-road" class="hidden animate__animated animate__fadeIn">
                                            <div class="mb-6">
                                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-3">Severity Level</label>
                                                <div class="grid grid-cols-3 gap-4">
                                                    <label class="cursor-pointer">
                                                        <input type="radio" name="severity" class="peer hidden" value="minor">
                                                        <div class="flex flex-col items-center justify-center p-3 rounded-xl border border-gray-200 bg-white peer-checked:border-green-500 peer-checked:bg-green-50 transition-all hover:shadow-md">
                                                            <i class="fa-solid fa-face-smile text-2xl text-green-500 mb-2"></i>
                                                            <span class="text-sm font-medium text-slate-700">Minor</span>
                                                        </div>
                                                    </label>
                                                    <label class="cursor-pointer">
                                                        <input type="radio" name="severity" class="peer hidden" value="moderate" checked>
                                                        <div class="flex flex-col items-center justify-center p-3 rounded-xl border border-gray-200 bg-white peer-checked:border-orange-500 peer-checked:bg-orange-50 transition-all hover:shadow-md">
                                                            <i class="fa-solid fa-face-meh text-2xl text-orange-500 mb-2"></i>
                                                            <span class="text-sm font-medium text-slate-700">Moderate</span>
                                                        </div>
                                                    </label>
                                                    <label class="cursor-pointer">
                                                        <input type="radio" name="severity" class="peer hidden" value="severe">
                                                        <div class="flex flex-col items-center justify-center p-3 rounded-xl border border-gray-200 bg-white peer-checked:border-red-500 peer-checked:bg-red-50 transition-all hover:shadow-md">
                                                            <i class="fa-solid fa-face-frown text-2xl text-red-500 mb-2"></i>
                                                            <span class="text-sm font-medium text-slate-700">Severe</span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-6">
                                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-3">Damage Type</label>
                                                <div class="flex flex-wrap gap-3">
                                                    <label class="inline-flex items-center px-3 py-2 rounded-lg border border-gray-200 cursor-pointer hover:bg-gray-50 peer-checked:bg-orange-50 peer-checked:border-orange-500 has-[:checked]:bg-orange-50 has-[:checked]:text-orange-700 has-[:checked]:border-orange-500 transition-all">
                                                        <input type="checkbox" class="hidden peer">
                                                        <span class="text-sm">Pothole</span>
                                                    </label>
                                                    <label class="inline-flex items-center px-3 py-2 rounded-lg border border-gray-200 cursor-pointer hover:bg-gray-50 has-[:checked]:bg-orange-50 has-[:checked]:text-orange-700 has-[:checked]:border-orange-500 transition-all">
                                                        <input type="checkbox" class="hidden peer">
                                                        <span class="text-sm">Broken Road</span>
                                                    </label>
                                                    <label class="inline-flex items-center px-3 py-2 rounded-lg border border-gray-200 cursor-pointer hover:bg-gray-50 has-[:checked]:bg-orange-50 has-[:checked]:text-orange-700 has-[:checked]:border-orange-500 transition-all">
                                                        <input type="checkbox" class="hidden peer">
                                                        <span class="text-sm">Flooded</span>
                                                    </label>
                                                    <label class="inline-flex items-center px-3 py-2 rounded-lg border border-gray-200 cursor-pointer hover:bg-gray-50 has-[:checked]:bg-orange-50 has-[:checked]:text-orange-700 has-[:checked]:border-orange-500 transition-all">
                                                        <input type="checkbox" class="hidden peer">
                                                        <span class="text-sm">Missing Manhole</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Road Name / Landmark</label>
                                                <input type="text" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-orange-500 outline-none transition-all" placeholder="e.g. Main Boulevard, near Faisal Market">
                                            </div>
                                        </div>

                                        <!-- HARASSMENT FIELDS -->
                                        <div id="fields-harassment" class="hidden animate__animated animate__fadeIn">
                                            <div class="mb-6">
                                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-3">Type of Harassment</label>
                                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                                    <label class="cursor-pointer">
                                                        <input type="checkbox" class="peer hidden">
                                                        <div class="text-center py-2 rounded-lg border border-gray-200 text-slate-600 peer-checked:bg-purple-500 peer-checked:text-white transition-all hover:bg-gray-50 text-sm">Verbal</div>
                                                    </label>
                                                    <label class="cursor-pointer">
                                                        <input type="checkbox" class="peer hidden">
                                                        <div class="text-center py-2 rounded-lg border border-gray-200 text-slate-600 peer-checked:bg-purple-500 peer-checked:text-white transition-all hover:bg-gray-50 text-sm">Physical</div>
                                                    </label>
                                                    <label class="cursor-pointer">
                                                        <input type="checkbox" class="peer hidden">
                                                        <div class="text-center py-2 rounded-lg border border-gray-200 text-slate-600 peer-checked:bg-purple-500 peer-checked:text-white transition-all hover:bg-gray-50 text-sm">Following</div>
                                                    </label>
                                                    <label class="cursor-pointer">
                                                        <input type="checkbox" class="peer hidden">
                                                        <div class="text-center py-2 rounded-lg border border-gray-200 text-slate-600 peer-checked:bg-purple-500 peer-checked:text-white transition-all hover:bg-gray-50 text-sm">Other</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-6 flex items-center space-x-3">
                                                <input type="checkbox" id="repeat-incident" class="w-5 h-5 text-purple-500 rounded border-gray-300 focus:ring-purple-500">
                                                <label for="repeat-incident" class="text-sm text-slate-700">Has this happened before in this area?</label>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-3">Gender (Optional)</label>
                                                <div class="flex space-x-4">
                                                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                                                        <input type="radio" name="gender" class="text-purple-500 focus:ring-purple-500">
                                                        <span class="text-sm">Male</span>
                                                    </label>
                                                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                                                        <input type="radio" name="gender" class="text-purple-500 focus:ring-purple-500">
                                                        <span class="text-sm">Female</span>
                                                    </label>
                                                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                                                        <input type="radio" name="gender" class="text-purple-500 focus:ring-purple-500" checked>
                                                        <span class="text-sm">Prefer not to say</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- TRAFFIC ISSUE FIELDS -->
                                        <div id="fields-traffic" class="hidden animate__animated animate__fadeIn">
                                            <div class="mb-6">
                                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-3">Reason for Blockage</label>
                                                <select class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-yellow-500 outline-none transition-all">
                                                    <option>Illegal Parking</option>
                                                    <option>Road Construction</option>
                                                    <option>Accident</option>
                                                    <option>Procession / Rally</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <div>
                                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Estimated Duration</label>
                                                    <select class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-yellow-500 outline-none transition-all">
                                                        <option>Less than 1 hr</option>
                                                        <option>1 - 3 hrs</option>
                                                        <option>3 - 6 hrs</option>
                                                        <option>More than 6 hrs</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Affected Road Name</label>
                                                    <input type="text" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-yellow-500 outline-none transition-all" placeholder="e.g. Mall Road">
                                                </div>
                                            </div>
                                        </div>

                                    </div> <!-- End Dynamic Fields -->

                                    <!-- SUBMIT BUTTON -->
                                    <div class="mt-10 pt-6 border-t border-gray-100">
                                        <button type="submit" id="submit-btn" class="w-full py-4 rounded-xl text-white font-bold text-lg shadow-lg transform transition-all hover:-translate-y-1 hover:shadow-2xl active:scale-95 flex items-center justify-center space-x-2" style="background-color: var(--current-accent, #1A73E8);">
                                            <i class="fa-solid fa-shield-halved"></i>
                                            <span>Submit <span id="submit-type-text">Incident</span> Report</span>
                                        </button>
                                    </div>

                                </form>

                                <!-- SUCCESS STATE (Hidden by default) -->
                                <div id="success-state" class="hidden text-center py-12 animate__animated animate__fadeIn">
                                    <div class="w-24 h-24 mx-auto mb-6 relative">
                                        <svg class="w-full h-full" viewBox="0 0 52 52">
                                            <circle cx="26" cy="26" r="25" fill="none" class="checkmark__circle" />
                                            <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" class="checkmark__check" />
                                        </svg>
                                    </div>
                                    <h2 class="text-3xl font-bold text-navy mb-2 font-heading">Incident Reported Successfully!</h2>
                                    <p class="text-slate-500 mb-6">Report ID: <span id="success-id" class="font-mono font-bold text-slate-700">#SS-2024-84921</span></p>
                                    <p class="text-sm text-green-600 bg-green-50 py-2 px-4 rounded-lg inline-block mb-8">
                                        <i class="fa-solid fa-circle-info mr-1"></i> Nearby authorities and community members have been alerted.
                                    </p>
                                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                                        <a href="#" class="px-6 py-3 bg-electric text-white rounded-xl font-semibold shadow-lg shadow-blue-500/30 hover:bg-blue-700 transition-colors">
                                            View My Reports
                                        </a>
                                        <button onclick="resetSelection()" class="px-6 py-3 bg-white border border-gray-200 text-navy rounded-xl font-semibold hover:bg-gray-50 transition-colors">
                                            Report Another Incident
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        // State
        let selectedType = null;
        let accentColor = '#1A73E8';
        let currentAccentBg = 'rgba(26, 115, 232, 0.05)';
        
        // Elements
        const cards = document.querySelectorAll('.incident-card');
        const formWrapper = document.getElementById('form-wrapper');
        const formHeaderBar = document.getElementById('form-header-bar');
        const headerTypeTitle = document.getElementById('header-type-title');
        const submitBtn = document.getElementById('submit-btn');
        const submitTypeText = document.getElementById('submit-type-text');
        const dynamicFieldsContainer = document.getElementById('dynamic-fields-container');
        const root = document.documentElement;

        // Card Selection Logic
        function selectIncident(type) {
            selectedType = type;
            
            // Find active card data
            const activeCard = document.querySelector(`[data-type="${type}"]`);
            accentColor = activeCard.getAttribute('data-accent');
            currentAccentBg = activeCard.getAttribute('data-accent-bg');

            // Update UI for Cards
            cards.forEach(card => {
                if(card === activeCard) {
                    card.classList.add('active');
                    card.classList.remove('dimmed');
                    // Show checkmark
                    const badge = card.querySelector('.check-badge');
                    badge.style.backgroundColor = accentColor;
                    badge.style.borderColor = accentColor;
                    badge.querySelector('i').style.opacity = '1';
                } else {
                    card.classList.remove('active');
                    card.classList.add('dimmed');
                    // Reset checkmark
                    const badge = card.querySelector('.check-badge');
                    badge.style.backgroundColor = 'transparent';
                    badge.style.borderColor = '#d1d5db'; // gray-300
                    badge.querySelector('i').style.opacity = '0';
                }
            });

            // Set CSS Variables for dynamic coloring
            root.style.setProperty('--current-accent', accentColor);
            
            // Update Form Header
            headerTypeTitle.textContent = capitalize(type);
            headerTypeTitle.style.color = accentColor;
            formHeaderBar.style.background = `linear-gradient(to right, ${currentAccentBg}, white)`;
            
            // Update Submit Button
            submitBtn.style.backgroundColor = accentColor;
            submitBtn.style.boxShadow = `0 10px 25px -5px ${accentColor}80`; // 80 hex is approx 50% opacity
            submitTypeText.textContent = capitalize(type);

            // Show Form
            formWrapper.classList.add('open');

            // Show Specific Fields
            document.querySelectorAll('#dynamic-fields-container > div').forEach(div => {
                div.classList.add('hidden');
            });
            const specificFields = document.getElementById(`fields-${type}`);
            if(specificFields) {
                specificFields.classList.remove('hidden');
            }

            // Smooth scroll to form
            setTimeout(() => {
                formWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        }

        function resetSelection() {
            selectedType = null;
            
            // Reset Cards
            cards.forEach(card => {
                card.classList.remove('active', 'dimmed');
                const badge = card.querySelector('.check-badge');
                badge.style.backgroundColor = 'transparent';
                badge.style.borderColor = '#d1d5db';
                badge.querySelector('i').style.opacity = '0';
            });

            // Hide Form
            formWrapper.classList.remove('open');
            document.getElementById('incident-form').reset();
            document.getElementById('success-state').classList.add('hidden');
            document.getElementById('incident-form').style.display = 'block';
            document.getElementById('preview-area').innerHTML = '';
            updateCharCount(document.getElementById('description-input'));

            // Scroll back to top of grid
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function capitalize(str) {
            return str.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase());
        }

        // Character Count
        function updateCharCount(textarea) {
            const count = textarea.value.length;
            document.getElementById('char-count').textContent = count;
        }

        // Drag & Drop Logic
        const dropZone = document.getElementById('drop-zone');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => dropZone.classList.add('drag-active'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => dropZone.classList.remove('drag-active'), false);
        });

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            const previewArea = document.getElementById('preview-area');
            ([...files]).forEach(file => {
                if (previewArea.children.length >= 5) return;

                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onloadend = function() {
                    const div = document.createElement('div');
                    div.className = 'relative w-24 h-24 rounded-lg overflow-hidden border border-gray-200 shadow-sm preview-enter group';
                    div.innerHTML = `
                        <img src="${reader.result}" class="w-full h-full object-cover">
                        <button type="button" onclick="this.parentElement.remove()" class="absolute top-1 right-1 bg-red-500 text-white w-5 h-5 rounded-full flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    `;
                    previewArea.appendChild(div);
                }
            });
        }

        // Vehicle Toggle Logic (Snatching)
        function toggleVehicle(isVehicle) {
            const subfields = document.getElementById('vehicle-subfields');
            const btnYes = document.getElementById('btn-veh-yes');
            const btnNo = document.getElementById('btn-veh-no');

            if (isVehicle) {
                subfields.classList.remove('hidden');
                // Style Yes button
                btnYes.className = "vehicle-btn px-4 py-2 rounded-lg border border-red-500 bg-red-50 text-red-500 font-medium transition-colors shadow-sm ring-2 ring-red-500 ring-offset-1";
                btnNo.className = "vehicle-btn px-4 py-2 rounded-lg border border-gray-200 text-slate-600 hover:bg-gray-50 transition-colors";
            } else {
                subfields.classList.add('hidden');
                // Style No button
                btnNo.className = "vehicle-btn px-4 py-2 rounded-lg border border-red-500 bg-red-50 text-red-500 font-medium transition-colors shadow-sm ring-2 ring-red-500 ring-offset-1";
                btnYes.className = "vehicle-btn px-4 py-2 rounded-lg border border-gray-200 text-slate-600 hover:bg-gray-50 transition-colors";
            }
        }

        // Validation & Submit
        function submitForm() {
            let isValid = true;
            let firstError = null;

            // Helper to show error
            const checkField = (id, condition) => {
                const el = document.getElementById(id);
                const parent = el.closest('div'); // Input parent
                const errorMsg = parent.nextElementSibling; // Error msg p tag
                
                // Reset styles
                el.classList.remove('border-red-500', 'shake');
                if(errorMsg && errorMsg.classList.contains('error-msg')) errorMsg.classList.add('hidden');

                if (!condition) {
                    isValid = false;
                    el.classList.add('border-red-500', 'shake');
                    if(errorMsg && errorMsg.classList.contains('error-msg')) errorMsg.classList.remove('hidden');
                    if (!firstError) firstError = parent;
                }
            };

            // Validate Location
            const locVal = document.getElementById('location-input').value.trim();
            checkField('location-input', locVal.length > 0);

            // Validate Date
            checkField('date-input', document.getElementById('date-input').value !== '');

            // Validate Time
            checkField('time-input', document.getElementById('time-input').value !== '');

            // Validate Description (> 20 chars)
            const descVal = document.getElementById('description-input').value;
            checkField('description-input', descVal.length >= 20);

            if (!isValid) {
                // Scroll to first error
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Simulate Loading
            const btnContent = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Submitting...';
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.8';

            setTimeout(() => {
                // Generate Random ID
                const randomID = Math.floor(10000 + Math.random() * 90000);
                document.getElementById('success-id').textContent = `#SS-2024-${randomID}`;

                // Show Success
                document.getElementById('incident-form').style.display = 'none';
                document.getElementById('success-state').classList.remove('hidden');
                
                // Reset Button
                submitBtn.innerHTML = btnContent;
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
            }, 2000);
        }

        // Set max date to today for date picker
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date-input').setAttribute('max', today);

    </script>
</body>
</html>