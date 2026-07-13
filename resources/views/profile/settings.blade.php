<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - StreetSafe</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            DEFAULT: '#0A0F1E',
                            light: '#151B2E'
                        },
                        electric: {
                            DEFAULT: '#1A73E8',
                            hover: '#1557B0'
                        },
                        cyan: '#00D4FF',
                        bgLight: '#F4F6FA',
                        danger: '#EF4444',
                        success: '#10B981'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif']
                    },
                    boxShadow: {
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.07)',
                        'glow': '0 0 15px rgba(26, 115, 232, 0.3)'
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
        /* Custom Styles */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F4F6FA;
            overflow: hidden; /* Prevent body scroll, handle inside containers */
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }

        /* Glassmorphism Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent; 
        }
        ::-webkit-scrollbar-thumb {
            background: #CBD5E1; 
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94A3B8; 
        }

        /* Floating Label Logic */
        .floating-input:focus ~ label,
        .floating-input:not(:placeholder-shown) ~ label {
            transform: translateY(-1.4rem) scale(0.85);
            color: #1A73E8;
            background-color: white;
            padding: 0 4px;
        }

        /* Toggle Switch */
        .toggle-checkbox:checked {
            right: 0;
            border-color: #1A73E8;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #1A73E8;
        }
        
        .toggle-checkbox:checked + .toggle-label:before {
            transform: translateX(100%);
        }

        .toggle-label:before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease;
            width: 20px;
            height: 20px;
        }

        /* Table Row Expansion */
        .detail-row {
            display: none;
        }
        .detail-row.active {
            display: table-row;
        }

        /* Pulse Animation for Danger Zone */
        @keyframes subtle-pulse {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); }
            70% { box-shadow: 0 0 0 6px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }
        .danger-hover:hover {
            animation: subtle-pulse 2s infinite;
        }

        /* Circular Progress */
        .circular-chart {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            max-height: 250px;
        }
        .circle-bg {
            fill: none;
            stroke: #1e293b;
            stroke-width: 2.5;
        }
        .circle {
            fill: none;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke: #00D4FF;
            animation: progress 1s ease-out forwards;
        }
        @keyframes progress {
            0% { stroke-dasharray: 0 100; }
        }
        .nav-link { position: relative; transition: all 0.3s ease; }
        .nav-link::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background-color: #1A73E8; transform: scaleY(0); transition: transform 0.2s ease; border-radius: 0 4px 4px 0; }
        .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
        .nav-link:hover, .nav-link.active { background-color: rgba(26,115,232,0.1); color: #1A73E8; }
    </style>
</head>
<body class="flex h-screen text-slate-800">

    <!-- LEFT SIDEBAR (Fixed) -->
    <aside class="w-[260px] bg-navy h-full flex flex-col justify-between text-white shadow-2xl z-20 flex-shrink-0">
        <!-- Top Section -->
        <div>
            <!-- Logo -->
            <div class="h-20 flex items-center px-6 border-b border-white/10">
                <div class="bg-electric/10 p-2 rounded-lg mr-3">
                    <i class="fa-solid fa-shield-halved text-electric text-2xl"></i>
                </div>
                <h1 class="font-heading font-bold text-xl tracking-wide">StreetSafe</h1>
            </div>

            <!-- User Mini Card -->
            <div class="px-6 py-6 flex items-center space-x-3 border-b border-white/10">
                <div class="w-10 h-10 rounded-full bg-electric flex items-center justify-center font-bold text-sm border-2 border-cyan shadow-glow">
                    AK
                </div>
                <div>
                    <p class="font-semibold text-sm">Ahmed Khan</p>
                    <p class="text-xs text-gray-400 flex items-center">
                        <i class="fa-solid fa-circle-check text-cyan mr-1 text-[10px]"></i> Verified
                    </p>
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

        <!-- Bottom Section -->
        <div class="p-6 border-t border-white/10">
            <a href="/logout" class="flex items-center px-4 py-2 text-sm font-medium text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-lg transition-colors mb-6">
                <i class="fa-solid fa-arrow-right-from-bracket w-6 text-center mr-2"></i>
                Logout
            </a>
            
            <!-- Safety Score -->
            <div class="bg-navy-light rounded-xl p-3 flex items-center justify-between border border-white/5">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Safety Score</p>
                    <p class="text-2xl font-bold text-cyan font-heading">87<span class="text-sm text-gray-500">/100</span></p>
                </div>
                <div class="relative w-12 h-12">
                    <svg viewBox="0 0 36 36" class="circular-chart w-12 h-12">
                        <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                        <path class="circle" stroke-dasharray="87, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    </svg>
                </div>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <!-- TOP HEADER BAR -->
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-200 px-8 flex items-center justify-between z-10 flex-shrink-0">
            <div>
                <h2 class="text-xl font-heading font-bold text-navy">Profile & Settings</h2>
                <div class="flex items-center text-xs text-gray-500 mt-1">
                    <a href="#" class="hover:text-electric">Home</a>
                    <i class="fa-solid fa-chevron-right mx-2 text-[10px]"></i>
                    <span class="text-electric font-medium">Settings</span>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <button onclick="saveAllChanges()" id="globalSaveBtn" class="bg-electric hover:bg-electric-hover text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition-all hover:scale-105 shadow-lg shadow-blue-500/30 flex items-center">
                    <i class="fa-regular fa-floppy-disk mr-2"></i> Save All Changes
                </button>
                
                <div class="relative p-2 text-gray-400 hover:text-navy cursor-pointer transition-colors">
                    <i class="fa-regular fa-bell text-lg"></i>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                </div>
                
                <div class="w-10 h-10 rounded-full bg-navy text-white flex items-center justify-center font-bold border-2 border-gray-100 cursor-pointer overflow-hidden">
                    AK
                </div>
            </div>
        </header>

        <!-- SCROLLABLE CONTENT AREA -->
        <div class="flex-1 overflow-y-auto overflow-x-hidden p-8 relative bg-bgLight">
            <div class="max-w-6xl mx-auto grid grid-cols-[260px_1fr] gap-8" id="settingsGrid">
                
                <!-- LEFT: SETTINGS NAVIGATION PANEL -->
                <aside class="hidden lg:block">
                    <div class="sticky top-0">
                        <div class="glass-card rounded-2xl shadow-glass p-6 text-center">
                            <!-- Large Avatar -->
                            <div class="relative w-24 h-24 mx-auto mb-4 group cursor-pointer">
                                <div class="w-full h-full rounded-full bg-electric/10 border-4 border-electric shadow-glow flex items-center justify-center overflow-hidden">
                                    <span class="text-3xl font-bold text-electric">AK</span>
                                    <img id="sidebarAvatarPreview" src="" class="absolute inset-0 w-full h-full object-cover hidden rounded-full" alt="Avatar">
                                </div>
                                <!-- Overlay -->
                                <div class="absolute inset-0 rounded-full bg-navy/80 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <i class="fa-solid fa-camera text-white mb-1"></i>
                                    <span class="text-[10px] text-white font-medium">Edit</span>
                                </div>
                            </div>
                            <h3 class="font-heading font-bold text-navy text-lg">Ahmed Khan</h3>
                            <p class="text-gray-500 text-xs mb-1">ahmed@email.com</p>
                            <p class="text-gray-400 text-xs flex items-center justify-center">
                                <i class="fa-solid fa-location-dot mr-1 text-cyan"></i> Karachi, Pakistan
                            </p>
                        </div>

                        <!-- Sticky Nav Links -->
                        <nav class="glass-card rounded-2xl shadow-glass p-4 mt-4 space-y-1" id="settingsNav">
                            <button data-target="section-personal" class="nav-item w-full flex items-center px-4 py-3 text-sm font-medium text-electric bg-blue-50 rounded-lg border-l-4 border-electric transition-all">
                                <i class="fa-solid fa-user w-6 text-center mr-3"></i> Personal Info
                            </button>
                            <button data-target="section-security" class="nav-item w-full flex items-center px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-electric rounded-lg border-l-4 border-transparent transition-all">
                                <i class="fa-solid fa-lock w-6 text-center mr-3"></i> Security
                            </button>
                            <button data-target="section-notifications" class="nav-item w-full flex items-center px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-electric rounded-lg border-l-4 border-transparent transition-all">
                                <i class="fa-solid fa-bell w-6 text-center mr-3"></i> Notifications
                            </button>
                            <button data-target="section-privacy" class="nav-item w-full flex items-center px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-electric rounded-lg border-l-4 border-transparent transition-all">
                                <i class="fa-solid fa-shield-halved w-6 text-center mr-3"></i> Privacy
                            </button>
                            <button data-target="section-reports" class="nav-item w-full flex items-center px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-electric rounded-lg border-l-4 border-transparent transition-all">
                                <i class="fa-solid fa-flag w-6 text-center mr-3"></i> My Reports
                            </button>
                            <button data-target="section-help" class="nav-item w-full flex items-center px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-electric rounded-lg border-l-4 border-transparent transition-all">
                                <i class="fa-solid fa-circle-question w-6 text-center mr-3"></i> Help & Support
                            </button>
                        </nav>
                    </div>
                </aside>

                <!-- RIGHT: SETTINGS CONTENT AREA -->
                <div class="relative min-h-[600px]">
                    
                    <!-- SECTION 1: PERSONAL INFO -->
                    <div id="section-personal" class="settings-section glass-card rounded-2xl shadow-glass p-8 animate__animated animate__fadeIn">
                        <div class="mb-8 border-b border-gray-100 pb-4">
                            <h3 class="text-2xl font-heading font-bold text-navy">Personal Information</h3>
                            <p class="text-gray-500 text-sm mt-1">Keep your profile up to date to help us serve you better.</p>
                        </div>

                        <!-- Avatar Upload -->
                        <div class="flex items-start mb-10">
                            <div class="relative w-32 h-32 group cursor-pointer mr-8">
                                <div class="w-full h-full rounded-full bg-gray-100 border-4 border-white shadow-xl flex items-center justify-center overflow-hidden relative">
                                    <span id="mainAvatarText" class="text-4xl font-bold text-gray-300">AK</span>
                                    <img id="mainAvatarPreview" src="" class="absolute inset-0 w-full h-full object-cover hidden" alt="Avatar">
                                    
                                    <!-- Hover Overlay -->
                                    <div class="absolute inset-0 bg-navy/60 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <i class="fa-solid fa-camera text-white text-xl mb-1"></i>
                                        <span class="text-[10px] text-white font-medium">Change Photo</span>
                                    </div>
                                </div>
                                <input type="file" id="avatarInput" class="hidden" accept="image/png, image/jpeg">
                            </div>
                            <div class="flex flex-col justify-center">
                                <h4 class="font-bold text-navy">Profile Photo</h4>
                                <p class="text-xs text-gray-400 mt-1 mb-2">JPG, PNG up to 2MB</p>
                                <button onclick="document.getElementById('avatarInput').click()" class="text-electric text-sm font-medium hover:underline">Upload New</button>
                            </div>
                        </div>

                        <!-- Form -->
                        <form id="personalInfoForm" onsubmit="event.preventDefault();">
                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <div class="relative">
                                    <input type="text" id="fullname" value="Ahmed Khan" class="floating-input w-full bg-transparent border border-gray-300 rounded-lg px-4 pt-5 pb-2 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all placeholder-transparent" placeholder="Full Name">
                                    <label for="fullname" class="absolute left-4 top-3 text-gray-400 text-sm transition-all pointer-events-none">Full Name</label>
                                </div>
                                <div class="relative">
                                    <div class="absolute left-4 top-3 text-gray-500 text-sm pointer-events-none select-none flex items-center">
                                        <span>@</span>
                                        <div class="h-4 w-[1px] bg-gray-300 mx-2"></div>
                                    </div>
                                    <input type="text" id="username" value="ahmed_khan" class="floating-input w-full bg-transparent border border-gray-300 rounded-lg pl-12 pr-4 pt-5 pb-2 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all placeholder-transparent" placeholder="Username">
                                    <label for="username" class="absolute left-12 top-3 text-gray-400 text-sm transition-all pointer-events-none">Username</label>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <div class="relative">
                                    <input type="email" id="email" value="ahmed@email.com" readonly class="floating-input w-full bg-gray-50 border border-gray-200 rounded-lg px-4 pt-5 pb-2 text-sm text-gray-500 focus:outline-none cursor-not-allowed placeholder-transparent" placeholder="Email Address">
                                    <label for="email" class="absolute left-4 top-3 text-gray-400 text-sm transition-all pointer-events-none">Email Address</label>
                                    <a href="#" class="absolute right-4 top-3 text-xs text-electric hover:underline">Change Email</a>
                                </div>
                                <div class="relative">
                                    <input type="tel" id="phone" value="0300-1234567" class="floating-input w-full bg-transparent border border-gray-300 rounded-lg px-4 pt-5 pb-2 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all placeholder-transparent" placeholder="Phone Number">
                                    <label for="phone" class="absolute left-4 top-3 text-gray-400 text-sm transition-all pointer-events-none">Phone Number</label>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <div class="relative">
                                    <input type="date" id="dob" value="1995-08-15" class="w-full bg-transparent border border-gray-300 rounded-lg px-4 py-3 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all">
                                </div>
                                <div class="relative">
                                    <select id="city" class="w-full bg-transparent border border-gray-300 rounded-lg px-4 py-3 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all appearance-none">
                                        <option value="Karachi" selected>Karachi</option>
                                        <option value="Lahore">Lahore</option>
                                        <option value="Islamabad">Islamabad</option>
                                        <option value="Rawalpindi">Rawalpindi</option>
                                        <option value="Peshawar">Peshawar</option>
                                        <option value="Quetta">Quetta</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-gray-400 text-xs pointer-events-none"></i>
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="relative">
                                    <input type="text" id="area" value="Gulshan-e-Iqbal" class="floating-input w-full bg-transparent border border-gray-300 rounded-lg px-4 pt-5 pb-2 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all placeholder-transparent" placeholder="Area/Locality">
                                    <label for="area" class="absolute left-4 top-3 text-gray-400 text-sm transition-all pointer-events-none">Area / Locality</label>
                                </div>
                            </div>

                            <div class="mb-8">
                                <div class="relative">
                                    <textarea id="bio" rows="3" class="floating-input w-full bg-transparent border border-gray-300 rounded-lg px-4 pt-5 pb-2 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all placeholder-transparent resize-none" placeholder="Bio" maxlength="200"></textarea>
                                    <label for="bio" class="absolute left-4 top-3 text-gray-400 text-sm transition-all pointer-events-none">Tell others about yourself...</label>
                                    <div class="absolute bottom-3 right-4 text-xs text-gray-400"><span id="bioCount">0</span>/200</div>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="button" onclick="savePersonalInfo()" class="bg-electric hover:bg-electric-hover text-white px-8 py-2.5 rounded-lg text-sm font-semibold transition-all hover:scale-105 shadow-lg shadow-blue-500/30 flex items-center">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- SECTION 2: SECURITY -->
                    <div id="section-security" class="settings-section hidden glass-card rounded-2xl shadow-glass p-8 animate__animated">
                        <div class="mb-8 border-b border-gray-100 pb-4">
                            <h3 class="text-2xl font-heading font-bold text-navy">Security Settings</h3>
                            <p class="text-gray-500 text-sm mt-1">Manage your password and active sessions.</p>
                        </div>

                        <!-- Change Password -->
                        <div class="mb-10">
                            <h4 class="font-bold text-lg text-navy mb-4">Change Password</h4>
                            <div class="space-y-4">
                                <div class="relative">
                                    <input type="password" id="currentPass" class="floating-input w-full bg-transparent border border-gray-300 rounded-lg px-4 pt-5 pb-2 pr-10 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all placeholder-transparent" placeholder="Current Password">
                                    <label for="currentPass" class="absolute left-4 top-3 text-gray-400 text-sm transition-all pointer-events-none">Current Password</label>
                                    <i class="fa-regular fa-eye absolute right-4 top-4 text-gray-400 cursor-pointer hover:text-electric" onclick="togglePassword('currentPass', this)"></i>
                                </div>
                                <div class="relative">
                                    <input type="password" id="newPass" onkeyup="checkStrength()" class="floating-input w-full bg-transparent border border-gray-300 rounded-lg px-4 pt-5 pb-2 pr-10 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all placeholder-transparent" placeholder="New Password">
                                    <label for="newPass" class="absolute left-4 top-3 text-gray-400 text-sm transition-all pointer-events-none">New Password</label>
                                    <i class="fa-regular fa-eye absolute right-4 top-4 text-gray-400 cursor-pointer hover:text-electric" onclick="togglePassword('newPass', this)"></i>
                                    <!-- Strength Meter -->
                                    <div class="h-1 w-full bg-gray-200 mt-2 rounded-full overflow-hidden">
                                        <div id="strengthBar" class="h-full w-0 bg-red-500 transition-all duration-300"></div>
                                    </div>
                                </div>
                                <div class="relative">
                                    <input type="password" id="confirmPass" onkeyup="checkMatch()" class="floating-input w-full bg-transparent border border-gray-300 rounded-lg px-4 pt-5 pb-2 pr-10 text-sm text-navy focus:outline-none focus:border-electric focus:ring-1 focus:ring-electric transition-all placeholder-transparent" placeholder="Confirm New Password">
                                    <label for="confirmPass" class="absolute left-4 top-3 text-gray-400 text-sm transition-all pointer-events-none">Confirm New Password</label>
                                    <i class="fa-regular fa-eye absolute right-4 top-4 text-gray-400 cursor-pointer hover:text-electric" onclick="togglePassword('confirmPass', this)"></i>
                                    <div id="matchIcon" class="absolute right-10 top-4 text-green-500 hidden"><i class="fa-solid fa-check"></i></div>
                                </div>
                            </div>
                            <div class="flex justify-end mt-6">
                                <button onclick="savePassword()" class="bg-electric hover:bg-electric-hover text-white px-8 py-2.5 rounded-lg text-sm font-semibold transition-all hover:scale-105 shadow-lg shadow-blue-500/30">Update Password</button>
                            </div>
                        </div>

                        <!-- Active Sessions -->
                        <div class="mb-10">
                            <h4 class="font-bold text-lg text-navy mb-4">Active Sessions</h4>
                            <div class="space-y-4">
                                <!-- Session 1 -->
                                <div class="session-card bg-white border border-gray-200 rounded-xl p-4 flex items-center justify-between shadow-sm">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mr-4 text-electric">
                                            <i class="fa-solid fa-laptop"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-navy">Chrome on Windows</p>
                                            <p class="text-xs text-gray-500">Karachi, Pakistan</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="flex h-2 w-2 mr-2">
                                            <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-green-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                        </span>
                                        <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded">This Device</span>
                                    </div>
                                </div>

                                <!-- Session 2 -->
                                <div id="session2" class="session-card bg-white border border-gray-200 rounded-xl p-4 flex items-center justify-between shadow-sm transition-all duration-500">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center mr-4 text-gray-500">
                                            <i class="fa-solid fa-mobile-screen"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-navy">Safari on iPhone</p>
                                            <p class="text-xs text-gray-500">Lahore, Pakistan</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="text-xs text-gray-400">Last active: 2 days ago</span>
                                        <button onclick="revokeSession('session2')" class="text-xs border border-red-200 text-red-500 hover:bg-red-50 px-3 py-1 rounded-md transition-colors">Revoke</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Danger Zone -->
                        <div class="bg-red-50 border border-red-200 rounded-xl p-6 danger-hover transition-all">
                            <h4 class="font-bold text-red-600 text-lg mb-2">Delete Account</h4>
                            <p class="text-sm text-red-400 mb-4">Once deleted, all your data will be permanently removed. This cannot be undone.</p>
                            <button onclick="openDeleteModal()" class="border border-red-300 text-red-600 hover:bg-red-600 hover:text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">Delete My Account</button>
                        </div>
                    </div>

                    <!-- SECTION 3: NOTIFICATIONS -->
                    <div id="section-notifications" class="settings-section hidden glass-card rounded-2xl shadow-glass p-8 animate__animated">
                        <div class="mb-8 border-b border-gray-100 pb-4">
                            <h3 class="text-2xl font-heading font-bold text-navy">Notification Preferences</h3>
                            <p class="text-gray-500 text-sm mt-1">Choose how you want to be notified.</p>
                        </div>

                        <!-- Email -->
                        <div class="mb-8">
                            <h5 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-4">Email Notifications</h5>
                            <div class="space-y-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-navy">Email Alerts</p>
                                        <p class="text-xs text-gray-500">Receive email for new reports near you</p>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle-email-alerts" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300" checked/>
                                        <label for="toggle-email-alerts" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-navy">Weekly Safety Report</p>
                                        <p class="text-xs text-gray-500">Weekly digest of city safety statistics</p>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle-weekly" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300" checked/>
                                        <label for="toggle-weekly" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-navy">Account Updates</p>
                                        <p class="text-xs text-gray-500">Important account and security updates</p>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle-account" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300" checked/>
                                        <label for="toggle-account" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SMS -->
                        <div class="mb-8">
                            <h5 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-4">SMS Notifications</h5>
                            <div class="space-y-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-navy">SMS Alerts</p>
                                        <p class="text-xs text-gray-500">Receive SMS for critical alerts in your area</p>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle-sms" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300"/>
                                        <label for="toggle-sms" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-navy">Emergency Alerts</p>
                                        <p class="text-xs text-gray-500">Only for high-priority safety emergencies</p>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle-emergency" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300" checked/>
                                        <label for="toggle-emergency" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- In-App -->
                        <div class="mb-8">
                            <h5 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-4">In-App Notifications</h5>
                            <div class="space-y-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-navy">Crime alerts near me</p>
                                        <p class="text-xs text-gray-500">Push notifications for incidents near your location</p>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle-crime" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300" checked/>
                                        <label for="toggle-crime" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-navy">Missing item matches</p>
                                        <p class="text-xs text-gray-500">Alert when potential match found for your items</p>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle-missing" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300" checked/>
                                        <label for="toggle-missing" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-navy">Case status updates</p>
                                        <p class="text-xs text-gray-500">When your reported case status changes</p>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle-status" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300" checked/>
                                        <label for="toggle-status" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button onclick="saveNotifications()" class="bg-electric hover:bg-electric-hover text-white px-8 py-2.5 rounded-lg text-sm font-semibold transition-all hover:scale-105 shadow-lg shadow-blue-500/30">Save Preferences</button>
                        </div>
                    </div>

                    <!-- SECTION 4: PRIVACY -->
                    <div id="section-privacy" class="settings-section hidden glass-card rounded-2xl shadow-glass p-8 animate__animated">
                        <div class="mb-8 border-b border-gray-100 pb-4">
                            <h3 class="text-2xl font-heading font-bold text-navy">Privacy Settings</h3>
                            <p class="text-gray-500 text-sm mt-1">Control how your information is used.</p>
                        </div>

                        <!-- Toggles -->
                        <div class="mb-8 space-y-6">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div class="mr-4">
                                    <p class="text-sm font-bold text-navy">Show my reports publicly</p>
                                    <p class="text-xs text-gray-500 mt-1">Other users can see your submitted reports on the public map</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="toggle" id="priv-public" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300"/>
                                    <label for="priv-public" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div class="mr-4">
                                    <p class="text-sm font-bold text-navy">Allow shopkeeper search</p>
                                    <p class="text-xs text-gray-500 mt-1">Shopkeepers can search your missing items to help recover them</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="toggle" id="priv-shop" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300" checked/>
                                    <label for="priv-shop" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div class="mr-4">
                                    <p class="text-sm font-bold text-navy">Share location for safety improvement</p>
                                    <p class="text-xs text-gray-500 mt-1">Anonymously share location data to improve area safety scores</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="toggle" id="priv-loc" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300"/>
                                    <label for="priv-loc" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div class="mr-4">
                                    <p class="text-sm font-bold text-navy">Appear in community leaderboard</p>
                                    <p class="text-xs text-gray-500 mt-1">Show your contribution rank on the public safety leaderboard</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="toggle" id="priv-lead" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:right-0 checked:border-electric transition-all duration-300" checked/>
                                    <label for="priv-lead" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-300"></label>
                                </div>
                            </div>
                        </div>

                        <!-- Info Card -->
                        <div class="bg-blue-50 rounded-xl p-4 flex items-start mb-8">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4 text-electric flex-shrink-0 mt-1">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div>
                                <h5 class="text-sm font-bold text-navy">Your Identity is Always Protected</h5>
                                <p class="text-xs text-gray-600 mt-1">StreetSafe never shares your personal information with third parties. Your CNIC and contact details are encrypted and only visible to verified authorities when legally required.</p>
                            </div>
                        </div>

                        <!-- Data Download -->
                        <div class="flex items-center justify-between border-t border-gray-100 pt-6">
                            <div>
                                <h5 class="text-sm font-bold text-navy">Download My Data</h5>
                                <p class="text-xs text-gray-500">Request a copy of all your StreetSafe data</p>
                            </div>
                            <button class="border border-electric text-electric hover:bg-blue-50 px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                                <i class="fa-solid fa-download mr-2"></i> Download
                            </button>
                        </div>
                    </div>

                    <!-- SECTION 5: MY REPORTS -->
                    <div id="section-reports" class="settings-section hidden glass-card rounded-2xl shadow-glass p-8 animate__animated">
                        <div class="mb-6 border-b border-gray-100 pb-4">
                            <h3 class="text-2xl font-heading font-bold text-navy">My Submitted Reports</h3>
                        </div>

                        <!-- Filters -->
                        <div class="flex flex-wrap items-center gap-4 mb-6">
                            <div class="flex bg-gray-100 p-1 rounded-lg">
                                <button class="px-3 py-1 bg-white shadow-sm rounded-md text-xs font-medium text-navy">All</button>
                                <button class="px-3 py-1 text-xs font-medium text-gray-500 hover:text-navy">Snatching</button>
                                <button class="px-3 py-1 text-xs font-medium text-gray-500 hover:text-navy">Road Damage</button>
                                <button class="px-3 py-1 text-xs font-medium text-gray-500 hover:text-navy">Missing</button>
                            </div>
                            <div class="ml-auto relative">
                                <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400 text-xs"></i>
                                <input type="text" placeholder="Search reports..." class="pl-8 pr-4 py-2 bg-white border border-gray-200 rounded-lg text-xs focus:outline-none focus:border-electric w-48">
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="text-xs text-gray-500 border-b border-gray-100">
                                        <th class="py-3 pl-2 font-medium">Type</th>
                                        <th class="py-3 font-medium">Description</th>
                                        <th class="py-3 font-medium">Location</th>
                                        <th class="py-3 font-medium">Date</th>
                                        <th class="py-3 font-medium">Status</th>
                                        <th class="py-3 pr-2 text-right font-medium">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm" id="reportsTableBody">
                                    <!-- Row 1 -->
                                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                                        <td class="py-3 pl-2"><span class="px-2 py-1 bg-red-100 text-red-600 rounded text-[10px] font-bold uppercase">Snatching</span></td>
                                        <td class="py-3 font-medium text-navy">iPhone 13 stolen near...</td>
                                        <td class="py-3 text-gray-500">Gulshan, Karachi</td>
                                        <td class="py-3 text-gray-500">2 days ago</td>
                                        <td class="py-3"><span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-[10px] font-bold">Under Review</span></td>
                                        <td class="py-3 pr-2 text-right"><button onclick="toggleReportDetail(this)" class="text-electric text-xs font-bold hover:underline">View</button></td>
                                    </tr>
                                    <tr class="detail-row bg-gray-50/30">
                                        <td colspan="6" class="p-4 text-xs text-gray-600">
                                            <div class="pl-4 border-l-2 border-electric">
                                                <p><strong>Details:</strong> Two men on a motorcycle snatched the phone at signal #10.</p>
                                                <p class="mt-1"><strong>Report ID:</strong> #RPT-8821</p>
                                                <p class="mt-1"><strong>Action Taken:</strong> Police report filed (FIR 450/23).</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Row 2 -->
                                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                                        <td class="py-3 pl-2"><span class="px-2 py-1 bg-orange-100 text-orange-600 rounded text-[10px] font-bold uppercase">Road Damage</span></td>
                                        <td class="py-3 font-medium text-navy">Pothole on main road...</td>
                                        <td class="py-3 text-gray-500">DHA Phase 5</td>
                                        <td class="py-3 text-gray-500">5 days ago</td>
                                        <td class="py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-bold">Resolved</span></td>
                                        <td class="py-3 pr-2 text-right"><button onclick="toggleReportDetail(this)" class="text-electric text-xs font-bold hover:underline">View</button></td>
                                    </tr>
                                    <tr class="detail-row bg-gray-50/30">
                                        <td colspan="6" class="p-4 text-xs text-gray-600">
                                            <div class="pl-4 border-l-2 border-electric">
                                                <p><strong>Details:</strong> Large pothole causing traffic accidents.</p>
                                                <p class="mt-1"><strong>Report ID:</strong> #RPT-8810</p>
                                                <p class="mt-1"><strong>Action Taken:</strong> Municipal team patched the road.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- Row 3 -->
                                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                                        <td class="py-3 pl-2"><span class="px-2 py-1 bg-purple-100 text-purple-600 rounded text-[10px] font-bold uppercase">Missing</span></td>
                                        <td class="py-3 font-medium text-navy">Samsung S22 Ultra...</td>
                                        <td class="py-3 text-gray-500">Clifton</td>
                                        <td class="py-3 text-gray-500">1 week ago</td>
                                        <td class="py-3"><span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-full text-[10px] font-bold">Pending</span></td>
                                        <td class="py-3 pr-2 text-right"><button onclick="toggleReportDetail(this)" class="text-electric text-xs font-bold hover:underline">View</button></td>
                                    </tr>
                                    <tr class="detail-row bg-gray-50/30">
                                        <td colspan="6" class="p-4 text-xs text-gray-600">
                                            <div class="pl-4 border-l-2 border-electric">
                                                <p><strong>Details:</strong> Left in a rickshaw. Purple color.</p>
                                                <p class="mt-1"><strong>Report ID:</strong> #RPT-8755</p>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- Row 4 -->
                                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                                        <td class="py-3 pl-2"><span class="px-2 py-1 bg-pink-100 text-pink-600 rounded text-[10px] font-bold uppercase">Harassment</span></td>
                                        <td class="py-3 font-medium text-navy">Unsafe area for...</td>
                                        <td class="py-3 text-gray-500">Saddar</td>
                                        <td class="py-3 text-gray-500">2 weeks ago</td>
                                        <td class="py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-bold">Resolved</span></td>
                                        <td class="py-3 pr-2 text-right"><button onclick="toggleReportDetail(this)" class="text-electric text-xs font-bold hover:underline">View</button></td>
                                    </tr>
                                    <tr class="detail-row bg-gray-50/30">
                                        <td colspan="6" class="p-4 text-xs text-gray-600">
                                            <div class="pl-4 border-l-2 border-electric">
                                                <p><strong>Details:</strong> Group of individuals harassing street vendors.</p>
                                                <p class="mt-1"><strong>Report ID:</strong> #RPT-8640</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Row 5 -->
                                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                                        <td class="py-3 pl-2"><span class="px-2 py-1 bg-indigo-100 text-indigo-600 rounded text-[10px] font-bold uppercase">Traffic</span></td>
                                        <td class="py-3 font-medium text-navy">Parking blockage...</td>
                                        <td class="py-3 text-gray-500">Nazimabad</td>
                                        <td class="py-3 text-gray-500">3 weeks ago</td>
                                        <td class="py-3"><span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-full text-[10px] font-bold">Pending</span></td>
                                        <td class="py-3 pr-2 text-right"><button onclick="toggleReportDetail(this)" class="text-electric text-xs font-bold hover:underline">View</button></td>
                                    </tr>
                                    <tr class="detail-row bg-gray-50/30">
                                        <td colspan="6" class="p-4 text-xs text-gray-600">
                                            <div class="pl-4 border-l-2 border-electric">
                                                <p><strong>Details:</strong> Illegal parking by showroom causing jam.</p>
                                                <p class="mt-1"><strong>Report ID:</strong> #RPT-8512</p>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- Row 6 -->
                                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                                        <td class="py-3 pl-2"><span class="px-2 py-1 bg-purple-100 text-purple-600 rounded text-[10px] font-bold uppercase">Missing</span></td>
                                        <td class="py-3 font-medium text-navy">Laptop bag lost...</td>
                                        <td class="py-3 text-gray-500">Korangi</td>
                                        <td class="py-3 text-gray-500">1 month ago</td>
                                        <td class="py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-bold">Resolved</span></td>
                                        <td class="py-3 pr-2 text-right"><button onclick="toggleReportDetail(this)" class="text-electric text-xs font-bold hover:underline">View</button></td>
                                    </tr>
                                    <tr class="detail-row bg-gray-50/30">
                                        <td colspan="6" class="p-4 text-xs text-gray-600">
                                            <div class="pl-4 border-l-2 border-electric">
                                                <p><strong>Details:</strong> Black bag with Dell laptop and documents.</p>
                                                <p class="mt-1"><strong>Report ID:</strong> #RPT-8200</p>
                                                <p class="mt-1"><strong>Action Taken:</strong> Found by police station.</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-center mt-8 space-x-2">
                            <button class="px-3 py-1 border border-gray-200 rounded text-gray-500 text-xs hover:bg-gray-50">Previous</button>
                            <button class="px-3 py-1 bg-electric text-white rounded text-xs font-medium shadow-sm">1</button>
                            <button class="px-3 py-1 border border-gray-200 rounded text-navy text-xs hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 border border-gray-200 rounded text-navy text-xs hover:bg-gray-50">3</button>
                            <button class="px-3 py-1 border border-gray-200 rounded text-gray-500 text-xs hover:bg-gray-50">Next</button>
                        </div>
                    </div>

                    <!-- SECTION 6: HELP & SUPPORT -->
                    <div id="section-help" class="settings-section hidden glass-card rounded-2xl shadow-glass p-8 animate__animated">
                        <div class="mb-8 border-b border-gray-100 pb-4">
                            <h3 class="text-2xl font-heading font-bold text-navy">Help & Support</h3>
                        </div>

                        <!-- FAQ Accordion -->
                        <div class="space-y-4 mb-12">
                            <!-- FAQ 1 -->
                            <div class="border border-gray-200 rounded-xl overflow-hidden">
                                <button class="w-full px-6 py-4 flex items-center justify-between bg-white hover:bg-gray-50 transition-colors text-left" onclick="toggleFaq(this)">
                                    <span class="font-semibold text-sm text-navy">How do I report an incident anonymously?</span>
                                    <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                                </button>
                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-gray-50">
                                    <div class="px-6 py-4 text-sm text-gray-600">
                                        When filing a report, simply uncheck the box labeled "Share my contact information". Your identity will be hidden from the public map, though authorities may still receive system-generated IDs for tracking.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 2 -->
                            <div class="border border-gray-200 rounded-xl overflow-hidden">
                                <button class="w-full px-6 py-4 flex items-center justify-between bg-white hover:bg-gray-50 transition-colors text-left" onclick="toggleFaq(this)">
                                    <span class="font-semibold text-sm text-navy">Can authorities see my personal information?</span>
                                    <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                                </button>
                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-gray-50">
                                    <div class="px-6 py-4 text-sm text-gray-600">
                                        Only verified law enforcement agencies can request access to your details (CNIC, Phone) via a formal legal request to StreetSafe administrators. This is strictly for investigation purposes.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 3 -->
                            <div class="border border-gray-200 rounded-xl overflow-hidden">
                                <button class="w-full px-6 py-4 flex items-center justify-between bg-white hover:bg-gray-50 transition-colors text-left" onclick="toggleFaq(this)">
                                    <span class="font-semibold text-sm text-navy">How does the safety rating system work?</span>
                                    <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                                </button>
                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-gray-50">
                                    <div class="px-6 py-4 text-sm text-gray-600">
                                        We aggregate reports from the last 30 days in a specific area. High-frequency incidents lower the score, while resolved cases and community activity help improve it over time.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 4 -->
                            <div class="border border-gray-200 rounded-xl overflow-hidden">
                                <button class="w-full px-6 py-4 flex items-center justify-between bg-white hover:bg-gray-50 transition-colors text-left" onclick="toggleFaq(this)">
                                    <span class="font-semibold text-sm text-navy">What happens after I submit a report?</span>
                                    <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                                </button>
                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-gray-50">
                                    <div class="px-6 py-4 text-sm text-gray-600">
                                        Your report is verified by our team and then mapped. It is forwarded to the relevant city district administration. You will receive notifications via the app regarding the status change.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 5 -->
                            <div class="border border-gray-200 rounded-xl overflow-hidden">
                                <button class="w-full px-6 py-4 flex items-center justify-between bg-white hover:bg-gray-50 transition-colors text-left" onclick="toggleFaq(this)">
                                    <span class="font-semibold text-sm text-navy">How can shopkeepers help recover stolen items?</span>
                                    <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                                </button>
                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-gray-50">
                                    <div class="px-6 py-4 text-sm text-gray-600">
                                        Shopkeepers registered on StreetSafe can view "Missing" descriptions. If they find an item, they can contact the owner directly using our secure masked messaging system.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 6 -->
                            <div class="border border-gray-200 rounded-xl overflow-hidden">
                                <button class="w-full px-6 py-4 flex items-center justify-between bg-white hover:bg-gray-50 transition-colors text-left" onclick="toggleFaq(this)">
                                    <span class="font-semibold text-sm text-navy">How do I delete my account?</span>
                                    <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                                </button>
                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-gray-50">
                                    <div class="px-6 py-4 text-sm text-gray-600">
                                        Go to Settings > Security > Danger Zone. Click "Delete My Account" and follow the confirmation prompts. Please note this action is irreversible.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Support -->
                        <h4 class="font-bold text-lg text-navy mb-4">Still need help?</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <a href="#" class="p-4 border border-gray-200 rounded-xl hover:shadow-md hover:border-electric/50 transition-all group">
                                <div class="w-10 h-10 rounded-full bg-blue-50 text-electric flex items-center justify-center mb-3 group-hover:bg-electric group-hover:text-white transition-colors">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <p class="font-bold text-sm text-navy">Email Support</p>
                                <p class="text-xs text-gray-500 mt-1">support@streetsafe.pk</p>
                                <p class="text-[10px] text-electric mt-2">Response within 24hrs</p>
                            </a>

                            <a href="#" class="p-4 border border-gray-200 rounded-xl hover:shadow-md hover:border-green-500/50 transition-all group">
                                <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center mb-3 group-hover:bg-green-600 group-hover:text-white transition-colors">
                                    <i class="fa-brands fa-whatsapp text-xl"></i>
                                </div>
                                <p class="font-bold text-sm text-navy">WhatsApp</p>
                                <p class="text-xs text-gray-500 mt-1">+92 300 1234567</p>
                                <p class="text-[10px] text-green-600 mt-2">Available 9AM - 6PM</p>
                            </a>

                            <a href="#" class="p-4 border border-gray-200 rounded-xl hover:shadow-md hover:border-electric/50 transition-all group">
                                <div class="w-10 h-10 rounded-full bg-blue-50 text-electric flex items-center justify-center mb-3 group-hover:bg-electric group-hover:text-white transition-colors">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <p class="font-bold text-sm text-navy">Call Us</p>
                                <p class="text-xs text-gray-500 mt-1">+92 21 111 222 333</p>
                                <p class="text-[10px] text-electric mt-2">Mon-Fri, 9AM-5PM</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- DELETE ACCOUNT MODAL -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-navy/60 backdrop-blur-sm transition-opacity opacity-0" id="deleteBackdrop"></div>
        
        <!-- Modal Content -->
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 transform scale-90 opacity-0 transition-all duration-300" id="deleteModalContent">
                <div class="text-center">
                    <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4 text-red-500 animate__animated animate__shakeX">
                        <i class="fa-solid fa-triangle-exclamation text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-2">Are you sure?</h3>
                    <p class="text-gray-500 text-sm mb-6">This action cannot be undone. All your data will be permanently deleted.</p>
                    
                    <p class="text-xs font-bold text-gray-700 mb-2 text-left uppercase tracking-wide">Type "DELETE" to confirm</p>
                    <input type="text" id="deleteInput" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-red-500 mb-6 text-center font-mono tracking-widest" placeholder="DELETE">
                    
                    <div class="flex space-x-3">
                        <button onclick="closeDeleteModal()" class="flex-1 bg-gray-100 text-gray-700 py-2.5 rounded-lg font-medium hover:bg-gray-200 transition-colors">Cancel</button>
                        <button id="confirmDeleteBtn" disabled class="flex-1 bg-red-500 text-white py-2.5 rounded-lg font-medium opacity-50 cursor-not-allowed transition-all">Confirm Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div id="toastContainer" class="fixed top-24 right-8 z-50 pointer-events-none"></div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- MAIN JAVASCRIPT -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        // --- Navigation Logic ---
        const navItems = document.querySelectorAll('.nav-item');
        const sections = document.querySelectorAll('.settings-section');

        navItems.forEach(item => {
            item.addEventListener('click', () => {
                const targetId = item.getAttribute('data-target');
                
                // Update Nav UI
                navItems.forEach(nav => {
                    nav.classList.remove('bg-blue-50', 'text-electric', 'border-electric');
                    nav.classList.add('text-gray-600', 'border-transparent');
                });
                item.classList.remove('text-gray-600', 'border-transparent');
                item.classList.add('bg-blue-50', 'text-electric', 'border-electric');

                // Switch Sections with Animation
                const currentSection = document.querySelector('.settings-section:not(.hidden)');
                const newSection = document.getElementById(targetId);

                if (currentSection && currentSection !== newSection) {
                    // Animate Out
                    currentSection.classList.remove('animate__fadeIn');
                    currentSection.classList.add('animate__fadeOut');
                    
                    setTimeout(() => {
                        currentSection.classList.add('hidden');
                        currentSection.classList.remove('animate__fadeOut');
                        
                        // Prepare New Section
                        newSection.classList.remove('hidden');
                        newSection.classList.add('animate__fadeIn');
                        
                        // Scroll to top
                        document.querySelector('.overflow-y-auto').scrollTop = 0;
                        
                        // Trigger AOS refresh for new content
                        setTimeout(() => AOS.refresh(), 100);
                    }, 300);
                }
                
                // Update Hash
                window.location.hash = targetId.replace('section-', '');
            });
        });

        // --- Avatar Upload Logic ---
        const avatarInput = document.getElementById('avatarInput');
        const mainAvatarPreview = document.getElementById('mainAvatarPreview');
        const mainAvatarText = document.getElementById('mainAvatarText');
        const sidebarAvatarPreview = document.getElementById('sidebarAvatarPreview');

        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    mainAvatarPreview.src = e.target.result;
                    mainAvatarPreview.classList.remove('hidden');
                    mainAvatarText.classList.add('hidden');
                    
                    sidebarAvatarPreview.src = e.target.result;
                    sidebarAvatarPreview.classList.remove('hidden');
                    showToast('Avatar updated successfully!', 'success');
                }
                reader.readAsDataURL(file);
            }
        });

        // --- Toggle Password Visibility ---
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // --- Password Strength Meter ---
        function checkStrength() {
            const val = document.getElementById('newPass').value;
            const bar = document.getElementById('strengthBar');
            let strength = 0;
            
            if (val.length > 5) strength += 20;
            if (val.length > 8) strength += 20;
            if (/[A-Z]/.test(val)) strength += 20;
            if (/[0-9]/.test(val)) strength += 20;
            if (/[^A-Za-z0-9]/.test(val)) strength += 20;
            
            bar.style.width = strength + '%';
            
            if (strength < 40) bar.className = 'h-full bg-red-500 transition-all duration-300';
            else if (strength < 80) bar.className = 'h-full bg-yellow-500 transition-all duration-300';
            else bar.className = 'h-full bg-green-500 transition-all duration-300';
        }

        // --- Confirm Password Match ---
        function checkMatch() {
            const newP = document.getElementById('newPass').value;
            const confP = document.getElementById('confirmPass').value;
            const icon = document.getElementById('matchIcon');
            
            if (newP === confP && confP !== '') {
                icon.classList.remove('hidden');
            } else {
                icon.classList.add('hidden');
            }
        }

        // --- Revoke Session Animation ---
        function revokeSession(id) {
            const card = document.getElementById(id);
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.remove();
                showToast('Session revoked successfully', 'success');
            }, 500);
        }

        // --- Delete Modal Logic ---
        const deleteModal = document.getElementById('deleteModal');
        const deleteBackdrop = document.getElementById('deleteBackdrop');
        const deleteModalContent = document.getElementById('deleteModalContent');
        const deleteInput = document.getElementById('deleteInput');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

        function openDeleteModal() {
            deleteModal.classList.remove('hidden');
            // Small timeout to allow display:block to apply before opacity transition
            setTimeout(() => {
                deleteBackdrop.classList.remove('opacity-0');
                deleteModalContent.classList.remove('opacity-0', 'scale-90');
                deleteModalContent.classList.add('scale-100');
            }, 10);
        }

        function closeDeleteModal() {
            deleteBackdrop.classList.add('opacity-0');
            deleteModalContent.classList.remove('scale-100');
            deleteModalContent.classList.add('opacity-0', 'scale-90');
            
            setTimeout(() => {
                deleteModal.classList.add('hidden');
                deleteInput.value = '';
                confirmDeleteBtn.disabled = true;
                confirmDeleteBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }, 300);
        }

        deleteInput.addEventListener('input', (e) => {
            if (e.target.value === 'DELETE') {
                confirmDeleteBtn.disabled = false;
                confirmDeleteBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                confirmDeleteBtn.onclick = () => {
                    showToast('Account deletion request initiated', 'danger');
                    closeDeleteModal();
                };
            } else {
                confirmDeleteBtn.disabled = true;
                confirmDeleteBtn.classList.add('opacity-50', 'cursor-not-allowed');
                confirmDeleteBtn.onclick = null;
            }
        });

        // --- Toast Notification System ---
        function showToast(message, type = 'success') {
            const container = document.getElementById('toastContainer');
            
            const toast = document.createElement('div');
            toast.className = `flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-lg dark:text-gray-400 dark:bg-gray-800 border-l-4 ${type === 'success' ? 'border-green-500' : 'border-red-500'} transform translate-x-full transition-transform duration-300 pointer-events-auto`;
            
            const icon = type === 'success' 
                ? '<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg"><i class="fa-solid fa-check"></i></div>'
                : '<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg"><i class="fa-solid fa-triangle-exclamation"></i></div>';
            
            toast.innerHTML = `
                ${icon}
                <div class="ml-3 text-sm font-normal text-navy">${message}</div>
            `;
            
            container.appendChild(toast);
            
            // Slide In
            requestAnimationFrame(() => {
                toast.classList.remove('translate-x-full');
            });
            
            // Auto Dismiss
            setTimeout(() => {
                toast.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 3000);
        }

        // --- Global Save Button & Other Actions ---
        function savePersonalInfo() {
            const btn = document.querySelector('#personalInfoForm button');
            simulateSave(btn, 'Profile updated successfully!');
        }

        function savePassword() {
            // Assuming validation passes
            const btn = event.target;
            simulateSave(btn, 'Password changed successfully!');
        }
        
        function saveNotifications() {
             const btn = event.target;
            simulateSave(btn, 'Preferences saved!');
        }

        function saveAllChanges() {
            const btn = document.getElementById('globalSaveBtn');
            simulateSave(btn, 'All changes saved successfully!');
        }

        function simulateSave(btn, successMsg) {
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Saving...';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                showToast(successMsg, 'success');
            }, 1500);
        }

        // --- Bio Character Count ---
        const bioInput = document.getElementById('bio');
        const bioCount = document.getElementById('bioCount');
        bioInput.addEventListener('input', () => {
            bioCount.textContent = bioInput.value.length;
        });

        // --- FAQ Accordion ---
        function toggleFaq(btn) {
            const content = btn.nextElementSibling;
            const icon = btn.querySelector('.fa-chevron-down');
            
            // Toggle current
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.style.transform = 'rotate(0deg)';
                btn.classList.remove('bg-gray-50');
            } else {
                // Close others (optional, but cleaner)
                document.querySelectorAll('.detail-row, .max-h-0').forEach(el => {
                   if(el !== content && el.classList.contains('max-h-0')) {
                       el.style.maxHeight = null;
                       el.previousElementSibling.querySelector('.fa-chevron-down').style.transform = 'rotate(0deg)';
                       el.previousElementSibling.classList.remove('bg-gray-50');
                   }
                });

                content.style.maxHeight = content.scrollHeight + "px";
                icon.style.transform = 'rotate(180deg)';
                btn.classList.add('bg-gray-50');
            }
        }

        // --- Reports Table Expand ---
        function toggleReportDetail(btn) {
            const row = btn.closest('tr');
            const detailRow = row.nextElementSibling;
            
            if (detailRow.classList.contains('active')) {
                detailRow.classList.remove('active');
                btn.textContent = 'View';
                btn.classList.remove('text-gray-500');
                btn.classList.add('text-electric');
            } else {
                // Close others
                document.querySelectorAll('.detail-row').forEach(tr => {
                    tr.classList.remove('active');
                    if(tr.previousElementSibling) {
                        const prevBtn = tr.previousElementSibling.querySelector('button');
                        if(prevBtn) {
                            prevBtn.textContent = 'View';
                            prevBtn.classList.add('text-electric');
                        }
                    }
                });

                detailRow.classList.add('active');
                btn.textContent = 'Close';
                btn.classList.remove('text-electric');
                btn.classList.add('text-gray-500');
            }
        }

    </script>
</body>
</html>