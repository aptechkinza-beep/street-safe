<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Missing Item | StreetSafe</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Tailwind Config for Custom Colors -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            900: '#0A0F1E', // Primary
                            800: '#111827',
                        },
                        blue: {
                            electric: '#1A73E8', // Accent
                            cyan: '#00D4FF', // Secondary Accent
                        },
                        gray: {
                            bg: '#F4F6FA',
                        }
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
        /* Custom Styles & Animations */
        body {
            background-color: #F4F6FA;
            overflow-x: hidden;
        }

        /* Sidebar Scrollbar */
        .custom-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scroll::-webkit-scrollbar-track {
            background: #0A0F1E;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
            background: #1A73E8;
            border-radius: 4px;
        }

        /* Floating Label Logic */
        .floating-input:placeholder-shown + label {
            transform: translateY(0) scale(1);
            color: #6B7280;
        }
        .floating-input:not(:placeholder-shown) + label,
        .floating-input:focus + label {
            transform: translateY(-24px) scale(0.85);
            color: #1A73E8;
            background-color: #fff;
            padding: 0 4px;
        }

        /* Radio Card Selection */
        .radio-card input:checked + div {
            border-color: #1A73E8;
            background-color: rgba(26, 115, 232, 0.05);
        }
        .radio-card input:checked + div .dot {
            background-color: currentColor;
            box-shadow: 0 0 0 4px rgba(255,255,255,0.8);
        }

        /* Step Transitions */
        .step-content {
            display: none;
            opacity: 0;
            transition: all 0.4s ease-in-out;
        }
        .step-content.active {
            display: block;
            animation: fadeInRight 0.5s forwards;
        }

        /* Validation Shake */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
            20%, 40%, 60%, 80% { transform: translateX(4px); }
        }
        .input-error {
            border-color: #EF4444 !important;
            animation: shake 0.4s ease-in-out;
        }
        .error-msg {
            display: none;
            color: #EF4444;
            font-size: 0.75rem;
            margin-top: 4px;
        }
        .input-error + .error-msg {
            display: block;
        }

        /* Success Checkmark Animation */
        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #00D4FF;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            stroke: #1A73E8;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        @keyframes stroke {
            100% { stroke-dashoffset: 0; }
        }

        /* Map Pulse */
        .pulse-pin {
            position: absolute;
            width: 20px;
            height: 20px;
            background: rgba(26, 115, 232, 0.4);
            border-radius: 50%;
            animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.5); opacity: 1; }
            100% { transform: scale(4); opacity: 0; }
        }
        
        /* Drag & Drop Zone Active State */
        .drag-active {
            border-color: #1A73E8 !important;
            background-color: rgba(26, 115, 232, 0.05) !important;
            transform: scale(1.01);
        }

        /* Circular Progress */
        .circular-chart {
            display: block;
            margin: 0 auto;
            max-width: 80%;
            max-height: 250px;
        }
        .circle-bg {
            fill: none;
            stroke: #1f2937;
            stroke-width: 3.8;
        }
        .circle {
            fill: none;
            stroke-width: 2.8;
            stroke-linecap: round;
            animation: progress 1s ease-out forwards;
        }
        @keyframes progress {
            0% { stroke-dasharray: 0 100; }
        }
        .percentage {
            fill: #00D4FF;
            font-family: 'Inter', sans-serif;
            font-weight: bold;
            font-size: 0.5em;
            text-anchor: middle;
        }
        .nav-link { position: relative; transition: all 0.3s ease; }
        .nav-link::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background-color: #1A73E8; transform: scaleY(0); transition: transform 0.2s ease; border-radius: 0 4px 4px 0; }
        .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
        .nav-link:hover, .nav-link.active { background-color: rgba(26,115,232,0.1); color: #1A73E8; }
    </style>
</head>
<body class="font-sans text-gray-800 antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- LEFT SIDEBAR -->
        <aside class="w-[260px] bg-navy-900 flex-shrink-0 flex flex-col justify-between shadow-xl z-20">
            <div>
                <!-- Logo -->
                <div class="h-20 flex items-center px-8 border-b border-gray-800">
                    <div class="bg-blue-electric/10 p-2 rounded-lg mr-3">
                        <i class="fa-solid fa-shield-halved text-blue-cyan text-2xl"></i>
                    </div>
                    <h1 class="font-heading text-xl font-bold text-white tracking-wide">StreetSafe</h1>
                </div>

                <!-- User Mini Card -->
                <div class="px-6 py-6">
                    <div class="bg-gray-800/50 rounded-xl p-4 border border-gray-700/50 backdrop-blur-sm flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-electric to-blue-cyan flex items-center justify-center text-white font-bold shadow-lg">
                            AK
                        </div>
                        <div>
                            <h3 class="text-white text-sm font-semibold">Ahmed Khan</h3>
                            <span class="text-xs text-green-400 flex items-center">
                                <i class="fa-solid fa-check-circle mr-1 text-[10px]"></i> Verified User
                            </span>
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
            </div>

            <!-- Bottom Safety Score -->
            <div class="p-6 border-t border-gray-800 bg-navy-900">
                <div class="bg-gradient-to-br from-gray-800 to-navy-900 rounded-2xl p-4 border border-gray-700 shadow-inner relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-blue-cyan/10 rounded-full blur-xl"></div>
                    <div class="text-center">
                        <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-2">Safety Score</p>
                        <div class="relative w-24 h-24 mx-auto">
                             <svg viewBox="0 0 36 36" class="circular-chart text-blue-cyan">
                                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path class="circle" stroke-dasharray="87, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" stroke="#00D4FF" />
                                <text x="18" y="20.35" class="percentage text-white">87</text>
                            </svg>
                            <div class="absolute bottom-0 w-full text-center">
                                <span class="text-[10px] text-green-400 font-bold">Safe Zone</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Logout -->
                <button class="mt-4 w-full flex items-center justify-center text-red-400 hover:text-red-300 hover:bg-red-500/10 py-2 rounded-lg transition-colors text-sm font-medium">
                    <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Logout
                </button>
            </div>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="flex-1 flex flex-col h-screen overflow-hidden bg-gray-bg relative">
            
            <!-- Top Header Bar -->
            <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-200 flex items-center justify-between px-8 z-10 sticky top-0">
                <div>
                    <h2 class="text-2xl font-heading font-bold text-navy-900">Report Missing Item</h2>
                    <nav class="flex text-sm text-gray-500 mt-0.5">
                        <span class="hover:text-blue-electric cursor-pointer">Home</span>
                        <i class="fa-solid fa-chevron-right text-[10px] mx-2 mt-1"></i>
                        <span class="hover:text-blue-electric cursor-pointer">Reports</span>
                        <i class="fa-solid fa-chevron-right text-[10px] mx-2 mt-1"></i>
                        <span class="text-blue-electric font-medium">Missing Item</span>
                    </nav>
                </div>

                <div class="flex items-center space-x-6">
                    <!-- Search (Visual only) -->
                    <div class="hidden md:block relative">
                        <input type="text" placeholder="Search..." class="bg-gray-100 border-none rounded-full py-2 pl-4 pr-10 text-sm focus:ring-2 focus:ring-blue-electric w-64 transition-all">
                        <i class="fa-solid fa-magnifying-glass absolute right-3 top-2.5 text-gray-400"></i>
                    </div>
                    
                    <!-- Notifications -->
                    <button class="relative text-gray-500 hover:text-blue-electric transition-colors">
                        <i class="fa-regular fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>

                    <!-- Avatar -->
                    <div class="flex items-center space-x-3 cursor-pointer group">
                        <div class="w-9 h-9 rounded-full bg-navy-900 text-white flex items-center justify-center font-bold text-sm ring-2 ring-transparent group-hover:ring-blue-cyan transition-all">
                            AK
                        </div>
                    </div>
                </div>
            </header>

            <!-- Scrollable Content -->
            <div class="flex-1 overflow-y-auto p-8 custom-scroll">
                
                <!-- Step Progress Indicator -->
                <div class="max-w-4xl mx-auto mb-10" data-aos="fade-down">
                    <div class="relative flex items-center justify-between">
                        <!-- Line Background -->
                        <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-gray-200 rounded-full z-0"></div>
                        
                        <!-- Step 1 -->
                        <div class="relative z-10 flex flex-col items-center">
                            <div id="progress-circle-1" class="w-10 h-10 rounded-full bg-blue-electric text-white flex items-center justify-center shadow-lg shadow-blue-500/40 transition-all duration-300">
                                <i class="fa-solid fa-box"></i>
                            </div>
                            <span class="mt-2 text-sm font-semibold text-blue-electric">Item Details</span>
                        </div>

                        <!-- Line Progress 1-2 -->
                        <div id="progress-line-1" class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-blue-electric rounded-full z-0 transition-all duration-500 w-0"></div>

                        <!-- Step 2 -->
                        <div class="relative z-10 flex flex-col items-center">
                            <div id="progress-circle-2" class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center transition-all duration-300">
                                <i class="fa-solid fa-map-pin"></i>
                            </div>
                            <span id="label-step-2" class="mt-2 text-sm font-medium text-gray-400">Incident Details</span>
                        </div>

                         <!-- Line Progress 2-3 (Hidden initially, simplified logic for demo) -->
                        
                        <!-- Step 3 -->
                        <div class="relative z-10 flex flex-col items-center">
                            <div id="progress-circle-3" class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center transition-all duration-300">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <span id="label-step-3" class="mt-2 text-sm font-medium text-gray-400">Contact & Submit</span>
                        </div>
                    </div>
                </div>

                <!-- FORM CONTAINER -->
                <div class="max-w-4xl mx-auto relative min-h-[600px]">
                    
                    <!-- SUCCESS OVERLAY (Hidden) -->
                    <div id="success-view" class="hidden absolute inset-0 z-50 flex flex-col items-center justify-center bg-white rounded-2xl shadow-2xl p-12 text-center animate__animated animate__fadeIn">
                        <div class="w-24 h-24 mb-6 relative">
                            <svg class="w-full h-full" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-heading font-bold text-navy-900 mb-2">Report Submitted Successfully!</h2>
                        <p class="text-gray-500 mb-6">Your report ID is <span class="font-mono text-blue-electric font-bold">#SS-2024-00847</span></p>
                        <p class="text-sm text-gray-400 max-w-md mx-auto mb-8">Authorities and verified shopkeepers across the city have been notified with the details.</p>
                        
                        <div class="flex space-x-4">
                            <button class="px-6 py-3 bg-blue-electric text-white rounded-lg font-medium shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all hover:-translate-y-1">
                                View My Reports
                            </button>
                            <button onclick="location.reload()" class="px-6 py-3 border border-gray-300 text-gray-600 rounded-lg font-medium hover:bg-gray-50 transition-all">
                                Report Another Item
                            </button>
                        </div>
                    </div>

                    <!-- STEP 1: ITEM DETAILS -->
                    <div id="step-1" class="step-content active bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-gray-100">
                        <h3 class="text-xl font-heading font-bold text-navy-900 mb-6 border-b border-gray-100 pb-2">Step 1: Item Details</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Item Type -->
                            <div class="relative">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Item Type</label>
                                <div class="relative">
                                    <select id="itemType" class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 bg-transparent border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-electric focus:border-blue-electric sm:text-sm appearance-none transition-shadow">
                                        <option value="" disabled selected>Select type...</option>
                                        <option value="Mobile Phone">Mobile Phone</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="Wallet">Wallet</option>
                                        <option value="Jewelry">Jewelry</option>
                                        <option value="Watch">Watch</option>
                                        <option value="Vehicle">Vehicle</option>
                                        <option value="Bicycle">Bicycle</option>
                                        <option value="Keys">Keys</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <i class="fa-solid fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                                <p class="error-msg">Please select an item type.</p>
                            </div>

                            <!-- Brand / Model -->
                            <div class="relative">
                                <input type="text" id="itemBrand" class="floating-input block px-4 pt-5 pb-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer" placeholder=" " />
                                <label for="itemBrand" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Brand / Model</label>
                                <p class="error-msg">Brand or model is required.</p>
                            </div>

                            <!-- Color -->
                            <div class="relative">
                                <div class="flex items-center bg-white border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-electric focus-within:border-blue-electric transition-shadow">
                                    <div id="color-preview" class="w-10 h-10 bg-gray-200 flex-shrink-0 border-r border-gray-200 transition-colors duration-300"></div>
                                    <input type="text" id="itemColor" class="flex-1 px-4 py-3 text-sm focus:outline-none" placeholder="Color (e.g. Midnight Black)" oninput="updateColorPreview(this.value)">
                                </div>
                                <p class="error-msg">Please specify the color.</p>
                            </div>

                            <!-- Serial Number -->
                            <div class="relative">
                                <div class="flex items-center justify-between">
                                    <label for="itemSerial" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Serial / IMEI</label>
                                    <span class="text-[10px] text-gray-400 bg-gray-100 px-2 py-0.5 rounded absolute right-2 top-3">Optional</span>
                                </div>
                                <input type="text" id="itemSerial" class="floating-input block px-4 pt-5 pb-2 pr-12 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer" placeholder=" " />
                            </div>

                            <!-- Condition (Full width visual) -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Condition when lost</label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <!-- New -->
                                    <label class="radio-card cursor-pointer">
                                        <input type="radio" name="condition" value="New" class="hidden" checked>
                                        <div class="border border-gray-200 rounded-xl p-4 flex items-center hover:border-blue-300 transition-all bg-white shadow-sm h-full">
                                            <div class="w-4 h-4 rounded-full border-2 border-green-500 dot bg-transparent mr-3"></div>
                                            <span class="font-medium text-gray-700">New</span>
                                        </div>
                                    </label>
                                    <!-- Good -->
                                    <label class="radio-card cursor-pointer">
                                        <input type="radio" name="condition" value="Good" class="hidden">
                                        <div class="border border-gray-200 rounded-xl p-4 flex items-center hover:border-blue-300 transition-all bg-white shadow-sm h-full">
                                            <div class="w-4 h-4 rounded-full border-2 border-blue-electric dot bg-transparent mr-3 text-blue-electric"></div>
                                            <span class="font-medium text-gray-700">Good</span>
                                        </div>
                                    </label>
                                    <!-- Used -->
                                    <label class="radio-card cursor-pointer">
                                        <input type="radio" name="condition" value="Used" class="hidden">
                                        <div class="border border-gray-200 rounded-xl p-4 flex items-center hover:border-blue-300 transition-all bg-white shadow-sm h-full">
                                            <div class="w-4 h-4 rounded-full border-2 border-gray-500 dot bg-transparent mr-3 text-gray-500"></div>
                                            <span class="font-medium text-gray-700">Used</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Value -->
                            <div class="relative">
                                <label for="itemValue" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Est. Value (PKR)</label>
                                <div class="absolute right-3 top-3 text-gray-400 font-medium text-sm">PKR</div>
                                <input type="number" id="itemValue" class="floating-input block px-4 pt-5 pb-2 pr-16 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer" placeholder=" " />
                            </div>

                            <!-- Quantity -->
                            <div class="relative">
                                <label for="itemQty" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Quantity</label>
                                <input type="number" id="itemQty" value="1" class="floating-input block px-4 pt-5 pb-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer" placeholder=" " />
                            </div>

                            <!-- Description -->
                            <div class="col-span-1 md:col-span-2 relative">
                                <textarea id="itemDesc" rows="4" class="floating-input block px-4 pt-5 pb-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer resize-none" placeholder=" "></textarea>
                                <label for="itemDesc" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Item Description</label>
                                <div class="absolute bottom-3 right-3 text-xs text-gray-400"><span id="desc-count">0</span>/300</div>
                            </div>
                        </div>

                        <!-- Next Button -->
                        <div class="mt-8 flex justify-end">
                            <button onclick="nextStep(1)" class="group flex items-center px-8 py-3 bg-blue-electric text-white rounded-lg font-semibold shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all hover:-translate-y-1 hover:scale-105">
                                Next Step
                                <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </div>
                    </div>

                    <!-- STEP 2: INCIDENT DETAILS -->
                    <div id="step-2" class="step-content bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-gray-100">
                        <h3 class="text-xl font-heading font-bold text-navy-900 mb-6 border-b border-gray-100 pb-2">Step 2: Incident Details</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Date -->
                            <div class="relative">
                                <label for="lossDate" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Date of Loss</label>
                                <input type="date" id="lossDate" class="floating-input block px-4 pt-5 pb-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer" placeholder=" " max="">
                                <p class="error-msg">Date is required.</p>
                            </div>

                            <!-- Time -->
                            <div class="relative">
                                <label for="lossTime" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Time of Loss</label>
                                <input type="time" id="lossTime" class="floating-input block px-4 pt-5 pb-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer" placeholder=" " />
                                <p class="error-msg">Time is required.</p>
                            </div>

                            <!-- Location -->
                            <div class="col-span-1 md:col-span-2 relative">
                                <div class="absolute left-4 top-3.5 text-gray-400 z-10">
                                    <i class="fa-solid fa-magnifying-glass-location"></i>
                                </div>
                                <input type="text" id="lossLocation" class="pl-10 block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-electric focus:border-blue-electric" placeholder="Enter location (e.g. Jinnah Super Market, Islamabad)">
                                <p class="error-msg">Location is required.</p>
                            </div>
                            
                            <!-- Map Placeholder -->
                            <div class="col-span-1 md:col-span-2">
                                <div class="h-48 w-full bg-navy-900 rounded-xl relative overflow-hidden group cursor-pointer border border-navy-800 shadow-inner">
                                    <!-- Fake Map Grid Lines -->
                                    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#4B5563 1px, transparent 1px); background-size: 20px 20px;"></div>
                                    
                                    <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-400 group-hover:scale-105 transition-transform duration-500">
                                        <div class="pulse-pin"></div>
                                        <i class="fa-solid fa-location-dot text-3xl text-blue-cyan mb-2 relative z-10 drop-shadow-[0_0_10px_rgba(0,212,255,0.5)]"></i>
                                        <p class="text-xs font-medium mt-2 uppercase tracking-widest opacity-80">Click to pin location</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Incident Description -->
                            <div class="col-span-1 md:col-span-2 relative">
                                <textarea id="incidentDesc" rows="4" class="floating-input block px-4 pt-5 pb-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer resize-none" placeholder=" "></textarea>
                                <label for="incidentDesc" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">How did it happen?</label>
                                <div class="absolute bottom-3 right-3 text-xs text-gray-400"><span id="incident-count">0</span>/500</div>
                            </div>

                            <!-- Upload Photos -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Photos of Item</label>
                                
                                <!-- Drag Zone -->
                                <div id="drop-zone" class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-blue-electric hover:bg-blue-50/50 transition-all group relative">
                                    <input type="file" id="file-upload" class="hidden" multiple accept="image/png, image/jpeg, image/webp">
                                    
                                    <div class="animate-bounce mb-2 group-hover:text-blue-electric transition-colors">
                                        <i class="fa-solid fa-cloud-arrow-up text-4xl text-gray-300"></i>
                                    </div>
                                    <p class="text-sm font-medium text-gray-700">Drag & drop photos here or <span class="text-blue-electric underline">browse</span></p>
                                    <p class="text-xs text-gray-400 mt-1">Max 5 photos • JPG, PNG, WEBP • Max 5MB each</p>
                                </div>

                                <!-- Preview Grid -->
                                <div id="preview-grid" class="grid grid-cols-5 gap-4 mt-4">
                                    <!-- Thumbnails injected via JS -->
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-8 flex justify-between">
                            <button onclick="prevStep(2)" class="flex items-center px-6 py-3 border border-gray-300 text-gray-600 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                                <i class="fa-solid fa-arrow-left mr-2"></i> Back
                            </button>
                            <button onclick="nextStep(2)" class="group flex items-center px-8 py-3 bg-blue-electric text-white rounded-lg font-semibold shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all hover:-translate-y-1 hover:scale-105">
                                Next Step
                                <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </div>
                    </div>

                    <!-- STEP 3: CONTACT & SUBMIT -->
                    <div id="step-3" class="step-content bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-gray-100">
                        <h3 class="text-xl font-heading font-bold text-navy-900 mb-6 border-b border-gray-100 pb-2">Step 3: Contact & Submit</h3>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            
                            <!-- Left Column: Inputs -->
                            <div class="space-y-6">
                                <!-- Contact -->
                                <div class="relative">
                                    <input type="text" id="contactNum" value="0300-1234567" class="floating-input block px-4 pt-5 pb-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer" placeholder=" " />
                                    <label for="contactNum" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Contact Number</label>
                                    <p class="error-msg">Contact number is required.</p>
                                </div>

                                <!-- Alt Contact -->
                                <div class="relative">
                                    <input type="text" id="altContactNum" class="floating-input block px-4 pt-5 pb-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer" placeholder=" " />
                                    <label for="altContactNum" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Alternate Contact (Optional)</label>
                                </div>

                                <!-- Reward Toggle -->
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                                    <div>
                                        <h4 class="font-semibold text-navy-900 text-sm">Reward Offered?</h4>
                                        <p class="text-xs text-gray-500">Offer cash reward for recovery</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="rewardToggle" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-electric"></div>
                                    </label>
                                </div>
                                
                                <!-- Reward Amount (Animated) -->
                                <div id="rewardAmountWrapper" class="overflow-hidden max-h-0 transition-all duration-500 ease-in-out">
                                    <div class="pt-4 relative">
                                        <label for="rewardAmount" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-electric peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">Reward Amount (PKR)</label>
                                        <input type="number" id="rewardAmount" class="floating-input block px-4 pt-5 pb-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-electric peer" placeholder=" " />
                                    </div>
                                </div>

                                <!-- Shopkeeper Toggle -->
                                <div class="flex items-start space-x-3">
                                    <div class="flex items-center h-5">
                                        <input id="shopkeeperToggle" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 checked:bg-blue-electric" checked>
                                    </div>
                                    <div class="text-sm">
                                        <label for="shopkeeperToggle" class="font-medium text-gray-900">Allow shopkeepers to search this report?</label>
                                        <div class="flex items-center mt-1 text-xs text-blue-600 bg-blue-50 w-fit px-2 py-1 rounded-md">
                                            <i class="fa-solid fa-circle-info mr-1"></i>
                                            <span>Verified shopkeepers can check item database</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Summary Preview -->
                            <div class="flex flex-col h-full">
                                <label class="text-sm font-semibold text-gray-700 mb-3">Report Summary</label>
                                <div class="bg-navy-900 rounded-xl p-6 text-white shadow-2xl backdrop-blur-md relative overflow-hidden border border-navy-800 flex-1 flex flex-col justify-center">
                                    <!-- Decorative Glow -->
                                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-cyan/20 rounded-full blur-2xl"></div>
                                    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-blue-electric via-blue-cyan to-blue-electric"></div>

                                    <div class="space-y-4 relative z-10">
                                        <div class="border-b border-gray-700/50 pb-3">
                                            <p class="text-xs text-gray-400 uppercase tracking-wider">Item</p>
                                            <p class="text-lg font-semibold text-white flex items-center">
                                                <i class="fa-solid fa-cube text-blue-cyan mr-2 text-sm"></i>
                                                <span id="summary-item">--</span>
                                            </p>
                                        </div>

                                        <div class="grid grid-cols-2 gap-4 border-b border-gray-700/50 pb-3">
                                            <div>
                                                <p class="text-xs text-gray-400">Color</p>
                                                <p id="summary-color" class="text-sm font-medium">--</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-400">Condition</p>
                                                <p id="summary-condition" class="text-sm font-medium">--</p>
                                            </div>
                                        </div>

                                        <div class="border-b border-gray-700/50 pb-3">
                                            <p class="text-xs text-gray-400 uppercase tracking-wider">Lost Details</p>
                                            <div class="flex items-center mt-1">
                                                <i class="fa-regular fa-calendar text-gray-400 mr-2"></i>
                                                <span id="summary-date" class="text-sm">--</span>
                                                <span class="mx-2">•</span>
                                                <span id="summary-time" class="text-sm">--</span>
                                            </div>
                                            <div class="flex items-center mt-1">
                                                <i class="fa-solid fa-location-dot text-gray-400 mr-2"></i>
                                                <span id="summary-location" class="text-sm truncate">--</span>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="text-xs text-gray-400 uppercase tracking-wider">Contact</p>
                                            <p id="summary-contact" class="text-sm font-mono text-blue-cyan">--</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-8 flex justify-between items-center">
                            <button onclick="prevStep(3)" class="flex items-center px-6 py-3 border border-gray-300 text-gray-600 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                                <i class="fa-solid fa-arrow-left mr-2"></i> Back
                            </button>
                            
                            <button onclick="submitReport()" id="submit-btn" class="w-full md:w-auto px-12 py-3 bg-gradient-to-r from-blue-electric to-blue-600 text-white rounded-lg font-bold shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all hover:-translate-y-1 hover:scale-105 flex items-center justify-center">
                                <i class="fa-solid fa-shield-halved mr-2"></i> Submit Report
                            </button>
                        </div>
                    </div>

                </div>
                
                <!-- Footer -->
                <footer class="mt-12 text-center text-gray-400 text-xs pb-4">
                    <p>&copy; 2024 StreetSafe Pakistan. All rights reserved.</p>
                </footer>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        // Set Max Date to Today
        document.getElementById('lossDate').max = new Date().toISOString().split("T")[0];

        /* ---------------- FORM STATE & NAVIGATION ---------------- */
        let currentStep = 1;
        const totalSteps = 3;

        function updateProgressUI(step) {
            // Update Circles
            for(let i=1; i<=totalSteps; i++) {
                const circle = document.getElementById(`progress-circle-${i}`);
                const label = document.getElementById(`label-step-${i}`);
                
                if(i < step) {
                    // Completed
                    circle.className = "w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center shadow-lg transition-all duration-300";
                    circle.innerHTML = '<i class="fa-solid fa-check"></i>';
                    if(label) label.classList.add('text-green-500', 'font-semibold');
                    if(label) label.classList.remove('text-gray-400');
                } else if (i === step) {
                    // Active
                    circle.className = "w-10 h-10 rounded-full bg-blue-electric text-white flex items-center justify-center shadow-lg shadow-blue-500/40 transition-all duration-300 scale-110";
                    // Restore icon logic if needed (simplified for this demo)
                    if(i===1) circle.innerHTML = '<i class="fa-solid fa-box"></i>';
                    if(i===2) circle.innerHTML = '<i class="fa-solid fa-map-pin"></i>';
                    if(i===3) circle.innerHTML = '<i class="fa-solid fa-check"></i>';
                    
                    if(label) {
                        label.className = "mt-2 text-sm font-semibold text-blue-electric";
                    }
                } else {
                    // Inactive
                    circle.className = "w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center transition-all duration-300";
                    if(i===1) circle.innerHTML = '<i class="fa-solid fa-box"></i>';
                    if(i===2) circle.innerHTML = '<i class="fa-solid fa-map-pin"></i>';
                    if(i===3) circle.innerHTML = '<i class="fa-solid fa-check"></i>';
                    
                    if(label) label.className = "mt-2 text-sm font-medium text-gray-400";
                }
            }

            // Update Lines (Simple width calc)
            const line1 = document.getElementById('progress-line-1');
            if(step >= 2) {
                line1.style.width = '50%'; // Approximate for 3 steps
            } else {
                line1.style.width = '0%';
            }
        }

        function validateStep(step) {
            let isValid = true;
            
            if(step === 1) {
                const type = document.getElementById('itemType');
                const brand = document.getElementById('itemBrand');
                
                if(!type.value) { setError(type); isValid = false; } else clearError(type);
                if(!brand.value.trim()) { setError(brand); isValid = false; } else clearError(brand);
            }
            
            if(step === 2) {
                const date = document.getElementById('lossDate');
                const time = document.getElementById('lossTime');
                const location = document.getElementById('lossLocation');
                
                if(!date.value) { setError(date); isValid = false; } else clearError(date);
                if(!time.value) { setError(time); isValid = false; } else clearError(time);
                if(!location.value.trim()) { setError(location); isValid = false; } else clearError(location);
            }

            if(step === 3) {
                const contact = document.getElementById('contactNum');
                if(!contact.value.trim()) { setError(contact); isValid = false; } else clearError(contact);
            }

            return isValid;
        }

        function setError(input) {
            input.classList.add('input-error', 'border-red-500');
            setTimeout(() => {
                input.classList.remove('input-error');
                input.classList.add('border-red-500'); // Keep red border
            }, 500);
        }

        function clearError(input) {
            input.classList.remove('border-red-500', 'input-error');
        }

        function nextStep(current) {
            if(!validateStep(current)) return;

            const currentEl = document.getElementById(`step-${current}`);
            const nextEl = document.getElementById(`step-${current+1}`);

            // Animation Out
            currentEl.style.opacity = '0';
            currentEl.style.transform = 'translateX(-50px)';
            
            setTimeout(() => {
                currentEl.classList.remove('active');
                currentEl.style.display = 'none'; // Reset display
                
                // Animation In
                nextEl.style.display = 'block';
                // Trigger reflow
                void nextEl.offsetWidth;
                nextEl.classList.add('active');
                
                currentStep++;
                updateProgressUI(currentStep);
                
                // If Step 3, update summary
                if(currentStep === 3) updateSummary();
            }, 300);
        }

        function prevStep(current) {
            const currentEl = document.getElementById(`step-${current}`);
            const prevEl = document.getElementById(`step-${current-1}`);

            currentEl.style.opacity = '0';
            currentEl.style.transform = 'translateX(50px)';
            
            setTimeout(() => {
                currentEl.classList.remove('active');
                currentEl.style.display = 'none';
                
                prevEl.style.display = 'block';
                void prevEl.offsetWidth;
                prevEl.classList.add('active');
                
                currentStep--;
                updateProgressUI(currentStep);
            }, 300);
        }

        /* ---------------- INTERACTION LOGIC ---------------- */

        // Color Preview
        function updateColorPreview(val) {
            const preview = document.getElementById('color-preview');
            // Simple hash to color for demo, or just css named colors
            if(val.toLowerCase() === 'red') preview.style.backgroundColor = '#EF4444';
            else if(val.toLowerCase() === 'blue') preview.style.backgroundColor = '#3B82F6';
            else if(val.toLowerCase() === 'black') preview.style.backgroundColor = '#000000';
            else if(val.toLowerCase() === 'white') preview.style.backgroundColor = '#FFFFFF';
            else if(val.toLowerCase() === 'green') preview.style.backgroundColor = '#10B981';
            else if(val.toLowerCase() === 'gold') preview.style.backgroundColor = '#F59E0B';
            else preview.style.backgroundColor = '#E5E7EB'; // Default gray
        }

        // Character Counts
        document.getElementById('itemDesc').addEventListener('input', function() {
            document.getElementById('desc-count').innerText = this.value.length;
        });
        document.getElementById('incidentDesc').addEventListener('input', function() {
            document.getElementById('incident-count').innerText = this.value.length;
        });

        // Reward Toggle Animation
        document.getElementById('rewardToggle').addEventListener('change', function() {
            const wrapper = document.getElementById('rewardAmountWrapper');
            if(this.checked) {
                wrapper.style.maxHeight = '100px';
            } else {
                wrapper.style.maxHeight = '0';
            }
        });

        // File Upload (Drag & Drop)
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-upload');
        const previewGrid = document.getElementById('preview-grid');

        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('drag-active');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('drag-active');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('drag-active');
            handleFiles(e.dataTransfer.files);
        });

        fileInput.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });

        function handleFiles(files) {
            if(files.length > 0) {
                // Reset grid for demo or append? Appending logic:
                previewGrid.innerHTML = ''; // Clear previous for this simple demo
                Array.from(files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const div = document.createElement('div');
                            div.className = 'relative w-full aspect-square rounded-lg overflow-hidden border border-gray-200 shadow-sm animate__animated animate__zoomIn';
                            div.innerHTML = `
                                <img src="${e.target.result}" class="w-full h-full object-cover">
                                <button type="button" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600" onclick="this.parentElement.remove()">
                                    <i class="fa-solid fa-times"></i>
                                </button>
                            `;
                            previewGrid.appendChild(div);
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        }

        // Dynamic Summary
        function updateSummary() {
            // Helper to get value or default
            const getVal = (id, def = '--') => {
                const el = document.getElementById(id);
                return el && el.value ? el.value : def;
            };

            document.getElementById('summary-item').innerText = `${getVal('itemType')} — ${getVal('itemBrand')}`;
            document.getElementById('summary-color').innerText = getVal('itemColor');
            
            // Radio value
            const condition = document.querySelector('input[name="condition"]:checked');
            document.getElementById('summary-condition').innerText = condition ? condition.value : '--';
            
            document.getElementById('summary-date').innerText = getVal('lossDate');
            document.getElementById('summary-time').innerText = getVal('lossTime');
            document.getElementById('summary-location').innerText = getVal('lossLocation');
            document.getElementById('summary-contact').innerText = getVal('contactNum');
        }

        // Submit
        function submitReport() {
            if(!validateStep(3)) return;
            
            const btn = document.getElementById('submit-btn');
            const originalContent = btn.innerHTML;
            
            // Loading State
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin mr-2"></i> Processing...';
            
            setTimeout(() => {
                document.querySelector('.bg-white.rounded-2xl.shadow-lg').style.display = 'none'; // Hide form wrapper roughly
                // Show success overlay
                document.getElementById('success-view').classList.remove('hidden');
            }, 2000);
        }

    </script>
</body>
</html>