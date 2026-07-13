<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetSafe - City Safety Analytics</title>

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
                        navy: {
                            900: '#0A0F1E', // Primary
                            800: '#151e32',
                            700: '#1f293a',
                        },
                        blue: {
                            accent: '#1A73E8', // Accent
                            cyan: '#00D4FF', // Secondary
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

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS for Glassmorphism & Utilities -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F4F6FA;
            color: #1e293b;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }

        /* Glassmorphism Utilities */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.04);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
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

        /* Heatmap Grid */
        .heatmap-grid {
            display: grid;
            grid-template-columns: auto repeat(24, minmax(32px, 1fr));
            gap: 4px;
            overflow-x: auto;
        }
        .heatmap-cell {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 4px;
            transition: transform 0.2s, opacity 0.3s;
            cursor: pointer;
            position: relative;
        }
        .heatmap-cell:hover {
            transform: scale(1.2);
            z-index: 10;
            border: 1px solid #0A0F1E;
        }

        /* Heatmap Colors */
        .bg-level-0 { background-color: #F3F4F6; }
        .bg-level-1 { background-color: #DBEAFE; }
        .bg-level-2 { background-color: #93C5FD; }
        .bg-level-3 { background-color: #3B82F6; }
        .bg-level-4 { background-color: #1D4ED8; }
        .bg-level-5 { background-color: #1E3A8A; }

        /* Tooltip Custom */
        .custom-tooltip {
            position: absolute;
            background: #0A0F1E;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            pointer-events: none;
            white-space: nowrap;
            z-index: 50;
            opacity: 0;
            transition: opacity 0.2s;
            transform: translate(-50%, -100%);
            margin-top: -6px;
        }
        .heatmap-cell:hover .custom-tooltip {
            opacity: 1;
        }

        /* Donut Chart Center Text */
        .donut-center-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            pointer-events: none;
        }

        /* Mobile Bottom Nav */
        @media (max-width: 768px) {
            .desktop-sidebar {
                display: none !important;
            }
            .mobile-nav {
                display: flex !important;
            }
            .main-content {
                margin-left: 0 !important;
                padding-bottom: 80px !important;
            }
        }
        .nav-link { position: relative; transition: all 0.3s ease; }
        .nav-link::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background-color: #1A73E8; transform: scaleY(0); transition: transform 0.2s ease; border-radius: 0 4px 4px 0; }
        .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
        .nav-link:hover, .nav-link.active { background-color: rgba(26,115,232,0.1); color: #1A73E8; }
    </style>
</head>
<body class="antialiased">

    <!-- DESKTOP SIDEBAR -->
    <aside class="desktop-sidebar fixed left-0 top-0 h-screen w-[260px] bg-navy-900 text-white flex flex-col justify-between z-50 shadow-2xl">
        <!-- Top Section -->
        <div>
            <!-- Logo -->
            <div class="h-20 flex items-center px-6 border-b border-navy-700">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-accent to-blue-cyan rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                        <i class="fa-solid fa-shield-halved text-white text-xl"></i>
                    </div>
                    <span class="font-heading font-bold text-xl tracking-wide">StreetSafe</span>
                </div>
            </div>

            <!-- User Mini Card -->
            <div class="p-6">
                <div class="bg-navy-800 rounded-xl p-4 flex items-center gap-3 border border-navy-700">
                    <div class="w-10 h-10 rounded-full bg-blue-accent flex items-center justify-center font-bold text-white">
                        AK
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-100">Ahmed Khan</h4>
                        <span class="text-xs text-blue-cyan flex items-center gap-1">
                            <i class="fa-solid fa-circle-check"></i> Verified User
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

        <!-- Bottom Section -->
        <div class="p-4 border-t border-navy-700">
            <a href="/logout" class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-400 hover:bg-red-500/10 hover:text-red-500 transition-all group">
                <i class="fa-solid fa-arrow-right-from-bracket w-5"></i>
                <span class="font-medium">Logout</span>
            </a>
            
            <!-- Safety Score Card -->
            <div class="mt-4 bg-navy-800 rounded-xl p-4 border border-navy-700 text-center">
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Safety Score</p>
                <div class="relative w-20 h-20 mx-auto">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="40" cy="40" r="36" stroke="#1f293a" stroke-width="8" fill="transparent"></circle>
                        <circle cx="40" cy="40" r="36" stroke="#00D4FF" stroke-width="8" fill="transparent" stroke-dasharray="226" stroke-dashoffset="30" stroke-linecap="round"></circle>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-xl font-bold text-white">87</span>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-1">Very Safe</p>
            </div>
        </div>
    </aside>

    <!-- MOBILE BOTTOM NAV -->
    <div class="mobile-nav fixed bottom-0 left-0 w-full bg-navy-900 text-white z-50 hidden md:hidden shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)]">
        <div class="flex justify-around items-center h-16">
            <a href="/dashboard" class="flex flex-col items-center text-gray-400 text-xs gap-1">
                <i class="fa-solid fa-chart-pie text-lg"></i> Dash
            </a>
            <a href="/reports/incident" class="flex flex-col items-center text-gray-400 text-xs gap-1">
                <i class="fa-solid fa-circle-plus text-lg"></i> Report
            </a>
            <a href="/analytics" class="flex flex-col items-center text-blue-cyan text-xs gap-1">
                <i class="fa-solid fa-chart-line text-lg"></i> Analytics
            </a>
            <a href="/notifications" class="flex flex-col items-center text-gray-400 text-xs gap-1 relative">
                <i class="fa-solid fa-bell text-lg"></i>
                <span class="absolute top-0 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
            </a>
            <a href="/settings" class="flex flex-col items-center text-gray-400 text-xs gap-1">
                <i class="fa-solid fa-gear text-lg"></i> Settings
            </a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="main-content md:ml-[260px] min-h-screen flex flex-col">
        
        <!-- TOP HEADER BAR -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 sticky top-0 z-40">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                
                <!-- Left: Title & Breadcrumb -->
                <div>
                    <h1 class="text-xl md:text-2xl font-bold text-navy-900 font-heading">City Safety Analytics</h1>
                    <div class="text-sm text-gray-500 flex items-center gap-2">
                        <a href="#" class="hover:text-blue-accent">Home</a> <i class="fa-solid fa-chevron-right text-xs"></i> <span class="text-gray-800 font-medium">Analytics</span>
                    </div>
                </div>

                <!-- Center: City Selector -->
                <div class="flex items-center justify-center md:justify-start">
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-location-dot text-gray-400"></i>
                        </div>
                        <select id="citySelector" class="block w-48 pl-10 pr-10 py-2 text-sm border border-navy-900 rounded-lg focus:ring-blue-accent focus:border-blue-accent bg-white text-navy-900 font-medium cursor-pointer appearance-none shadow-sm hover:shadow-md transition-all">
                            <option value="Karachi">Karachi</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Islamabad">Islamabad</option>
                            <option value="Rawalpindi">Rawalpindi</option>
                            <option value="Peshawar">Peshawar</option>
                            <option value="Quetta">Quetta</option>
                            <option value="All">All Cities</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-chevron-down text-gray-400 text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Right: Date Range & Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <!-- Date Toggles -->
                    <div class="inline-flex bg-gray-100 p-1 rounded-lg">
                        <button class="px-3 py-1 text-xs font-medium rounded-md text-gray-600 hover:bg-white hover:shadow-sm transition-all" onclick="updateDateRange(this, 7)">7 Days</button>
                        <button class="px-3 py-1 text-xs font-medium rounded-md bg-white text-blue-accent shadow-sm transition-all" onclick="updateDateRange(this, 30)">30 Days</button>
                        <button class="px-3 py-1 text-xs font-medium rounded-md text-gray-600 hover:bg-white hover:shadow-sm transition-all" onclick="updateDateRange(this, 90)">3 Months</button>
                        <button class="px-3 py-1 text-xs font-medium rounded-md text-gray-600 hover:bg-white hover:shadow-sm transition-all" onclick="updateDateRange(this, 'all')">All Time</button>
                    </div>

                    <!-- Export Button -->
                    <button onclick="simulateExport()" class="px-3 py-2 border border-blue-accent text-blue-accent rounded-lg text-sm font-medium hover:bg-blue-50 transition-colors flex items-center gap-2">
                        <i class="fa-solid fa-download"></i> <span class="hidden sm:inline">Export</span>
                    </button>

                    <!-- Profile Actions -->
                    <div class="flex items-center gap-3 border-l border-gray-200 pl-3">
                        <button class="relative p-2 text-gray-500 hover:text-navy-900 transition-colors">
                            <i class="fa-solid fa-bell text-lg"></i>
                            <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full border border-white"></span>
                        </button>
                        <div class="w-9 h-9 rounded-full bg-navy-900 text-white flex items-center justify-center font-bold cursor-pointer hover:ring-2 ring-blue-accent transition-all">
                            AK
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-6 space-y-6">

            <!-- SECTION 1: SUMMARY KPI ROW -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Card 1 -->
                <div class="glass-card rounded-xl p-5 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="0">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-accent group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-flag"></i>
                        </div>
                        <span class="text-xs font-semibold text-red-500 bg-red-50 px-2 py-1 rounded-full flex items-center gap-1">
                            <i class="fa-solid fa-arrow-trend-up"></i> +124
                        </span>
                    </div>
                    <h3 class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Total Incidents</h3>
                    <p class="text-3xl font-bold text-navy-900 mt-1 counter" data-target="1247">0</p>
                    <p class="text-xs text-gray-400 mt-1">this month</p>
                </div>

                <!-- Card 2 -->
                <div class="glass-card rounded-xl p-5 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-500 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Most Dangerous Area</h3>
                    <p class="text-xl font-bold text-navy-900 mt-1">Saddar</p>
                    <p class="text-xs text-gray-400 mt-1">47 incidents reported</p>
                </div>

                <!-- Card 3 -->
                <div class="glass-card rounded-xl p-5 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-shield-check"></i>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Safest Area</h3>
                    <p class="text-xl font-bold text-navy-900 mt-1">DHA Phase 5</p>
                    <p class="text-xs text-gray-400 mt-1">Safety Score: 92/100</p>
                </div>

                <!-- Card 4 -->
                <div class="glass-card rounded-xl p-5 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Peak Crime Hour</h3>
                    <p class="text-xl font-bold text-navy-900 mt-1">9:00 PM</p>
                    <p class="text-xs text-gray-400 mt-1">Most reports between 8-10 PM</p>
                </div>

                <!-- Card 5 -->
                <div class="glass-card rounded-xl p-5 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-person-running"></i>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Most Common Crime</h3>
                    <p class="text-xl font-bold text-navy-900 mt-1">Snatching</p>
                    <p class="text-xs text-gray-400 mt-1">38% of all reports</p>
                </div>
            </section>

            <!-- SECTION 2: INCIDENT TREND LINE CHART -->
            <section class="glass-card rounded-xl p-6" data-aos="fade-up">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <div>
                        <h2 class="text-lg font-bold text-navy-900">Incident Trend — Last 30 Days</h2>
                        <p class="text-sm text-gray-500">Daily report count by category</p>
                    </div>
                    <div class="flex flex-wrap gap-3 mt-4 md:mt-0">
                        <div class="flex items-center gap-2 text-xs"><span class="w-3 h-3 rounded-full bg-red-500"></span> Snatching</div>
                        <div class="flex items-center gap-2 text-xs"><span class="w-3 h-3 rounded-full bg-orange-500"></span> Road Damage</div>
                        <div class="flex items-center gap-2 text-xs"><span class="w-3 h-3 rounded-full bg-purple-500"></span> Harassment</div>
                        <div class="flex items-center gap-2 text-xs"><span class="w-3 h-3 rounded-full bg-yellow-500"></span> Traffic</div>
                        <div class="flex items-center gap-2 text-xs"><span class="w-3 h-3 rounded-full bg-blue-accent"></span> Missing</div>
                    </div>
                </div>
                <div class="relative h-[300px] w-full">
                    <canvas id="trendChart"></canvas>
                </div>
            </section>

            <!-- SECTION 3: TWO COLUMN CHARTS -->
            <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- LEFT: Donut Chart -->
                <div class="glass-card rounded-xl p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center mb-4">
                        <h2 class="text-lg font-bold text-navy-900">Crime Type Breakdown</h2>
                        <p class="text-xs text-gray-400">1,247 Total Reports</p>
                    </div>
                    
                    <div class="relative h-[250px] w-full flex justify-center items-center">
                        <canvas id="donutChart"></canvas>
                        <!-- Center Text Overlay -->
                        <div class="donut-center-text">
                            <p class="text-2xl font-bold text-navy-900">1,247</p>
                            <p class="text-[10px] uppercase text-gray-400 font-bold">Total</p>
                        </div>
                    </div>

                    <!-- Legend -->
                    <div class="grid grid-cols-2 gap-2 mt-4 text-xs">
                        <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-sm bg-red-500"></span> Snatching (38%)</div>
                        <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-sm bg-orange-500"></span> Road Damage (25%)</div>
                        <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-sm bg-purple-500"></span> Harassment (18%)</div>
                        <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-sm bg-yellow-500"></span> Traffic (14%)</div>
                        <div class="flex items-center gap-2 col-span-2 justify-center"><span class="w-2 h-2 rounded-sm bg-blue-accent"></span> Missing Items (5%)</div>
                    </div>
                </div>

                <!-- RIGHT: Horizontal Bar Chart -->
                <div class="glass-card rounded-xl p-6 lg:col-span-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="mb-4">
                        <h2 class="text-lg font-bold text-navy-900">Top Dangerous Areas — Karachi</h2>
                        <p class="text-sm text-gray-500">Ranked by incident count</p>
                    </div>
                    <div class="relative h-[300px] w-full">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </section>

            <!-- SECTION 4: PEAK HOURS HEATMAP -->
            <section class="glass-card rounded-xl p-6 overflow-x-auto" data-aos="fade-up">
                <div class="min-w-[800px]">
                    <div class="flex justify-between items-end mb-4">
                        <div>
                            <h2 class="text-lg font-bold text-navy-900">Crime Activity Heatmap — By Day & Hour</h2>
                            <p class="text-sm text-gray-500">Darker cells = more incidents reported</p>
                        </div>
                        <div class="flex items-center gap-1 text-xs text-gray-400">
                            <span>Low</span>
                            <div class="w-3 h-3 rounded-sm bg-level-0"></div>
                            <div class="w-3 h-3 rounded-sm bg-level-1"></div>
                            <div class="w-3 h-3 rounded-sm bg-level-2"></div>
                            <div class="w-3 h-3 rounded-sm bg-level-3"></div>
                            <div class="w-3 h-3 rounded-sm bg-level-4"></div>
                            <div class="w-3 h-3 rounded-sm bg-level-5"></div>
                            <span>High</span>
                        </div>
                    </div>
                    
                    <div class="heatmap-grid" id="heatmapContainer">
                        <!-- Header Row -->
                        <div class="p-2 text-xs font-bold text-gray-400"></div> <!-- Corner -->
                        <!-- Hours generated by JS -->
                        
                        <!-- Rows generated by JS -->
                    </div>
                </div>
            </section>

            <!-- SECTION 5: HARASSMENT HOTSPOTS TABLE -->
            <section class="glass-card rounded-xl p-6" data-aos="fade-up">
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-navy-900">Harassment Hotspot Areas</h2>
                        <p class="text-sm text-gray-500">Areas with highest reported harassment incidents</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-gray-400 text-xs uppercase border-b border-gray-100">
                                <th class="pb-3 pl-2 font-semibold">Rank</th>
                                <th class="pb-3 font-semibold">Area Name</th>
                                <th class="pb-3 font-semibold">Total Reports</th>
                                <th class="pb-3 font-semibold">Last Reported</th>
                                <th class="pb-3 font-semibold">Avg Time of Day</th>
                                <th class="pb-3 font-semibold">Safety Level</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="group hover:bg-purple-50 transition-colors border-b border-gray-50 last:border-0">
                                <td class="py-3 pl-2"><span class="w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-xs">1</span></td>
                                <td class="py-3 font-medium text-navy-900">Empress Market</td>
                                <td class="py-3 text-gray-600">23 reports</td>
                                <td class="py-3 text-gray-500">2 days ago</td>
                                <td class="py-3 text-gray-600">Evening (7-9 PM)</td>
                                <td class="py-3"><span class="px-2 py-1 rounded text-xs font-semibold bg-red-100 text-red-600">Danger</span></td>
                            </tr>
                            <tr class="group hover:bg-purple-50 transition-colors border-b border-gray-50 last:border-0">
                                <td class="py-3 pl-2"><span class="w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-xs">2</span></td>
                                <td class="py-3 font-medium text-navy-900">Saddar Bus Stop</td>
                                <td class="py-3 text-gray-600">18 reports</td>
                                <td class="py-3 text-gray-500">5 days ago</td>
                                <td class="py-3 text-gray-600">Night (9-11 PM)</td>
                                <td class="py-3"><span class="px-2 py-1 rounded text-xs font-semibold bg-red-100 text-red-600">Danger</span></td>
                            </tr>
                            <tr class="group hover:bg-purple-50 transition-colors border-b border-gray-50 last:border-0">
                                <td class="py-3 pl-2"><span class="w-6 h-6 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xs">3</span></td>
                                <td class="py-3 font-medium text-navy-900">Lea Market</td>
                                <td class="py-3 text-gray-600">14 reports</td>
                                <td class="py-3 text-gray-500">1 week ago</td>
                                <td class="py-3 text-gray-600">Evening (6-8 PM)</td>
                                <td class="py-3"><span class="px-2 py-1 rounded text-xs font-semibold bg-orange-100 text-orange-600">High Risk</span></td>
                            </tr>
                            <tr class="group hover:bg-purple-50 transition-colors border-b border-gray-50 last:border-0">
                                <td class="py-3 pl-2"><span class="w-6 h-6 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xs">4</span></td>
                                <td class="py-3 font-medium text-navy-900">Tower Area</td>
                                <td class="py-3 text-gray-600">11 reports</td>
                                <td class="py-3 text-gray-500">1 week ago</td>
                                <td class="py-3 text-gray-600">Afternoon (3-5 PM)</td>
                                <td class="py-3"><span class="px-2 py-1 rounded text-xs font-semibold bg-orange-100 text-orange-600">High Risk</span></td>
                            </tr>
                            <tr class="group hover:bg-purple-50 transition-colors border-b border-gray-50 last:border-0">
                                <td class="py-3 pl-2"><span class="w-6 h-6 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-bold text-xs">5</span></td>
                                <td class="py-3 font-medium text-navy-900">Burns Road</td>
                                <td class="py-3 text-gray-600">8 reports</td>
                                <td class="py-3 text-gray-500">2 weeks ago</td>
                                <td class="py-3 text-gray-600">Evening (7-9 PM)</td>
                                <td class="py-3"><span class="px-2 py-1 rounded text-xs font-semibold bg-yellow-100 text-yellow-600">Moderate</span></td>
                            </tr>
                            <tr class="group hover:bg-purple-50 transition-colors border-b border-gray-50 last:border-0">
                                <td class="py-3 pl-2"><span class="w-6 h-6 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-bold text-xs">6</span></td>
                                <td class="py-3 font-medium text-navy-900">Cantt Station</td>
                                <td class="py-3 text-gray-600">6 reports</td>
                                <td class="py-3 text-gray-500">3 weeks ago</td>
                                <td class="py-3 text-gray-600">Morning (8-10 AM)</td>
                                <td class="py-3"><span class="px-2 py-1 rounded text-xs font-semibold bg-yellow-100 text-yellow-600">Moderate</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- SECTION 6: MONTHLY COMPARISON CHART -->
            <section class="glass-card rounded-xl p-6 mb-6" data-aos="fade-up">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <div>
                        <h2 class="text-lg font-bold text-navy-900">Monthly Comparison — Current vs Previous Month</h2>
                        <p class="text-sm text-gray-500">Side-by-side incident count by category</p>
                    </div>
                    <div class="flex gap-4 mt-4 md:mt-0 text-xs">
                        <div class="flex items-center gap-2"><span class="w-3 h-3 bg-blue-accent rounded-sm"></span> This Month</div>
                        <div class="flex items-center gap-2"><span class="w-3 h-3 bg-gray-300 rounded-sm"></span> Last Month</div>
                    </div>
                </div>
                <div class="relative h-[300px] w-full">
                    <canvas id="comparisonChart"></canvas>
                </div>
            </section>

        </div>
    </main>

    <!-- SCRIPTS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // --- 1. INITIALIZATION ---
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                offset: 50
            });

            // Init Charts
            initTrendChart();
            initDonutChart();
            initBarChart();
            initComparisonChart();
            
            // Init Heatmap
            renderHeatmap();

            // Init Counters
            animateCounters();
        });

        // --- 2. CHART CONFIGURATIONS ---
        
        // Common Defaults
        Chart.defaults.font.family = "'Inter', sans-serif";
        Chart.defaults.color = '#64748b';
        Chart.defaults.scale.grid.color = '#f1f5f9';

        function initTrendChart() {
            const ctx = document.getElementById('trendChart').getContext('2d');
            
            // Dates for X Axis
            const labels = Array.from({length: 30}, (_, i) => `Jan ${i + 1}`);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Snatching',
                            data: [8,6,9,12,7,8,11,9,6,8,10,7,9,11,8,7,9,10,8,6,9,8,11,7,8,10,9,7,8,11],
                            borderColor: '#EF4444',
                            backgroundColor: '#EF4444',
                            borderWidth: 2,
                            tension: 0.4,
                            pointRadius: 0,
                            pointHoverRadius: 5
                        },
                        {
                            label: 'Road Damage',
                            data: [4,5,3,6,4,5,4,3,5,4,6,3,4,5,4,3,5,4,6,3,4,5,3,4,5,4,3,5,4,6],
                            borderColor: '#F97316',
                            backgroundColor: '#F97316',
                            borderWidth: 2,
                            tension: 0.4,
                            pointRadius: 0,
                            pointHoverRadius: 5
                        },
                        {
                            label: 'Harassment',
                            data: [3,2,4,3,2,3,4,2,3,4,2,3,4,3,2,4,3,2,4,3,2,3,4,2,3,4,3,2,3,4],
                            borderColor: '#8B5CF6',
                            backgroundColor: '#8B5CF6',
                            borderWidth: 2,
                            tension: 0.4,
                            pointRadius: 0,
                            pointHoverRadius: 5
                        },
                        {
                            label: 'Traffic',
                            data: [5,6,4,7,5,6,5,4,6,5,7,4,5,6,5,4,6,5,7,4,5,6,4,5,6,5,4,6,5,7],
                            borderColor: '#EAB308',
                            backgroundColor: '#EAB308',
                            borderWidth: 2,
                            tension: 0.4,
                            pointRadius: 0,
                            pointHoverRadius: 5
                        },
                        {
                            label: 'Missing',
                            data: [2,3,2,3,2,2,3,2,3,2,3,2,3,2,2,3,2,2,3,2,2,3,2,2,3,2,2,3,2,3],
                            borderColor: '#1A73E8',
                            backgroundColor: '#1A73E8',
                            borderWidth: 2,
                            tension: 0.4,
                            pointRadius: 0,
                            pointHoverRadius: 5
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: { display: false }, // Using custom HTML legend
                        tooltip: {
                            backgroundColor: '#0A0F1E',
                            titleColor: '#fff',
                            bodyColor: '#cbd5e1',
                            padding: 10,
                            cornerRadius: 8,
                            displayColors: true
                        }
                    },
                    scales: {
                        x: {
                            ticks: { maxTicksLimit: 6 }
                        },
                        y: {
                            beginAtZero: true,
                            suggestedMax: 20
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeOutQuart'
                    }
                }
            });
        }

        function initDonutChart() {
            const ctx = document.getElementById('donutChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Snatching', 'Road Damage', 'Harassment', 'Traffic', 'Missing Items'],
                    datasets: [{
                        data: [38, 25, 18, 14, 5],
                        backgroundColor: ['#EF4444', '#F97316', '#8B5CF6', '#EAB308', '#1A73E8'],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0A0F1E',
                            bodyFont: { size: 12 },
                            callbacks: {
                                label: function(context) {
                                    return ` ${context.label}: ${context.raw}%`;
                                }
                            }
                        }
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true,
                        duration: 1500
                    }
                }
            });
        }

        function initBarChart() {
            const ctx = document.getElementById('barChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Saddar', 'Gulshan-e-Iqbal', 'North Karachi', 'Nazimabad', 'Lyari', 'Korangi', 'Malir', 'Landhi'],
                    datasets: [{
                        label: 'Incidents',
                        data: [47, 38, 35, 31, 28, 24, 19, 15],
                        backgroundColor: [
                            '#991B1B', // Darkest Red
                            '#DC2626', // Red
                            '#EA580C', // Orange Red
                            '#F97316', // Orange
                            '#F97316', // Orange
                            '#F59E0B', // Yellow Orange
                            '#EAB308', // Yellow
                            '#CA8A04'  // Light Yellow
                        ],
                        borderRadius: 4,
                        barThickness: 20
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0A0F1E',
                            callbacks: {
                                label: function(context) {
                                    return ` Incidents: ${context.raw}`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 50
                        },
                        y: {
                            grid: { display: false }
                        }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutQuart'
                    }
                }
            });
        }

        function initComparisonChart() {
            const ctx = document.getElementById('comparisonChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Snatching', 'Road Damage', 'Harassment', 'Traffic', 'Missing'],
                    datasets: [
                        {
                            label: 'This Month',
                            data: [124, 87, 62, 95, 18],
                            backgroundColor: '#1A73E8',
                            borderRadius: 4,
                            barThickness: 30
                        },
                        {
                            label: 'Last Month',
                            data: [98, 102, 71, 88, 22],
                            backgroundColor: '#CBD5E1', // Light Gray
                            borderRadius: 4,
                            barThickness: 30
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0A0F1E'
                        }
                    },
                    scales: {
                        y: { beginAtZero: true },
                        x: { grid: { display: false } }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutQuart'
                    }
                }
            });
        }

        // --- 3. HEATMAP LOGIC ---
        function renderHeatmap() {
            const container = document.getElementById('heatmapContainer');
            const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            
            const heatmapData = {
                'Mon': [0,0,0,0,0,1,2,3,4,5,3,2,3,4,5,6,5,7,9,8,6,4,2,1],
                'Tue': [0,0,0,0,0,1,2,3,5,6,4,3,4,5,6,7,6,8,9,8,7,5,3,1],
                'Wed': [0,0,0,0,1,1,2,4,5,6,4,3,4,5,7,7,6,8,9,9,7,5,3,2],
                'Thu': [0,0,0,0,0,1,2,3,4,5,4,3,4,5,6,7,6,7,8,9,7,5,3,1],
                'Fri': [0,0,0,0,0,1,2,3,4,5,4,3,5,6,7,8,7,9,9,9,8,6,4,2],
                'Sat': [1,0,0,0,0,1,2,3,4,5,4,4,5,6,7,8,8,9,9,9,8,7,5,3],
                'Sun': [2,1,0,0,0,1,2,3,3,4,3,3,4,5,6,7,7,8,9,8,7,6,4,3]
            };

            // 1. Create Header Row (Hours)
            const corner = document.createElement('div');
            corner.className = 'p-2 text-xs font-bold text-gray-400';
            container.appendChild(corner);

            for(let h = 0; h < 24; h++) {
                const hourLabel = document.createElement('div');
                hourLabel.className = 'text-[10px] text-gray-400 text-center flex items-end justify-center pb-1';
                if (h % 3 === 0) {
                    hourLabel.innerText = h;
                }
                container.appendChild(hourLabel);
            }

            // 2. Create Data Rows
            days.forEach((day, dayIndex) => {
                // Day Label
                const dayLabel = document.createElement('div');
                dayLabel.className = 'p-2 text-xs font-bold text-gray-600 flex items-center';
                dayLabel.innerText = day;
                container.appendChild(dayLabel);

                // Hour Cells
                const dayData = heatmapData[day];
                dayData.forEach((val, hourIndex) => {
                    const cell = document.createElement('div');
                    cell.className = 'heatmap-cell opacity-0'; // Start hidden for animation
                    
                    // Color logic
                    if(val === 0) cell.classList.add('bg-level-0');
                    else if(val <= 2) cell.classList.add('bg-level-1');
                    else if(val <= 4) cell.classList.add('bg-level-2');
                    else if(val <= 6) cell.classList.add('bg-level-3');
                    else if(val <= 8) cell.classList.add('bg-level-4');
                    else cell.classList.add('bg-level-5');

                    // Tooltip
                    const tooltip = document.createElement('div');
                    tooltip.className = 'custom-tooltip';
                    tooltip.innerText = `${day}, ${hourIndex}:00 - ${val} incidents`;
                    cell.appendChild(tooltip);

                    container.appendChild(cell);

                    // Row by Row Stagger Animation
                    setTimeout(() => {
                        cell.classList.remove('opacity-0');
                    }, 500 + (dayIndex * 100) + (hourIndex * 5));
                });
            });
        }

        // --- 4. INTERACTIONS ---

        // Counter Animation
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 2000; 
                const increment = target / (duration / 16); // 60fps
                
                let current = 0;
                const updateCount = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = Math.ceil(current).toLocaleString();
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.innerText = target.toLocaleString();
                    }
                };
                
                // Start with slight delay based on AOS delay or default
                setTimeout(updateCount, 500);
            });
        }

        // Date Range Toggle
        function updateDateRange(btn, days) {
            // UI Toggle
            const buttons = btn.parentElement.querySelectorAll('button');
            buttons.forEach(b => {
                b.classList.remove('bg-white', 'text-blue-accent', 'shadow-sm');
                b.classList.add('text-gray-600');
            });
            btn.classList.remove('text-gray-600');
            btn.classList.add('bg-white', 'text-blue-accent', 'shadow-sm');

            // Simulate Data Refresh
            document.body.style.cursor = 'wait';
            setTimeout(() => {
                document.body.style.cursor = 'default';
                // In a real app, this would fetch new data and update charts
                console.log(`Updated range to: ${days} days`);
            }, 500);
        }

        // City Selector Simulation
        const citySelector = document.getElementById('citySelector');
        citySelector.addEventListener('change', (e) => {
            const overlay = document.createElement('div');
            overlay.className = 'fixed inset-0 bg-white/80 z-[60] flex items-center justify-center backdrop-blur-sm transition-opacity duration-300';
            overlay.innerHTML = '<div class="animate-spin rounded-full h-12 w-12 border-b-2 border-navy-900"></div>';
            document.body.appendChild(overlay);

            setTimeout(() => {
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.remove(), 300);
                // Update title based on selection
                const title = document.querySelector('h1');
                if(e.target.value === 'All') {
                    title.innerText = "National Safety Analytics";
                } else {
                    title.innerText = `${e.target.value} Safety Analytics`;
                }
            }, 800);
        });

        // Export Simulation
        function simulateExport() {
            const btn = document.querySelector('button[onclick="simulateExport()"] i');
            const originalClass = btn.className;
            
            btn.className = "fa-solid fa-circle-notch fa-spin";
            
            setTimeout(() => {
                btn.className = "fa-solid fa-check text-green-500";
                setTimeout(() => {
                    btn.className = originalClass;
                }, 1500);
            }, 1000);
        }

    </script>
</body>
</html>