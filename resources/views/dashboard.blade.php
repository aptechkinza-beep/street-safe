<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetSafe - Dashboard</title>
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
                        darkNavy: '#0A0F1E',
                        electricBlue: '#1A73E8',
                        cyanAccent: '#00D4FF',
                        lightBg: '#F4F6FA',
                        glassWhite: 'rgba(255, 255, 255, 0.7)',
                        glassDark: 'rgba(255, 255, 255, 0.05)',
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
        body { background-color: #F4F6FA; overflow-x: hidden; }
        .glass-card { background: rgba(255,255,255,0.95); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.05); }
        .glass-sidebar-card { background: rgba(255,255,255,0.05); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.05); }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        .circular-progress { width: 50px; height: 50px; border-radius: 50%; background: conic-gradient(#00D4FF 87%, rgba(255,255,255,0.1) 0); display: flex; align-items: center; justify-content: center; position: relative; }
        .circular-progress::before { content: ""; position: absolute; width: 40px; height: 40px; border-radius: 50%; background-color: #0A0F1E; }
        .progress-value { position: relative; font-size: 10px; font-weight: bold; color: #fff; }
        @keyframes pulse-glow { 0% { box-shadow: 0 0 0 0 rgba(0,212,255,0.4); } 70% { box-shadow: 0 0 0 10px rgba(0,212,255,0); } 100% { box-shadow: 0 0 0 0 rgba(0,212,255,0); } }
        .animate-pulse-glow { animation: pulse-glow 2s infinite; }
        .nav-link { position: relative; transition: all 0.3s ease; }
        .nav-link::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background-color: #1A73E8; transform: scaleY(0); transition: transform 0.2s ease; border-radius: 0 4px 4px 0; }
        .nav-link:hover::before, .nav-link.active::before { transform: scaleY(1); }
        .nav-link:hover, .nav-link.active { background-color: rgba(26,115,232,0.1); color: #1A73E8; }
        .fab-menu { transform: scale(0); transform-origin: bottom right; transition: transform 0.3s cubic-bezier(0.175,0.885,0.32,1.275); opacity: 0; }
        .fab-active .fab-menu { transform: scale(1); opacity: 1; }
        .fab-btn i { transition: transform 0.3s ease; }
        .fab-active .fab-btn i { transform: rotate(45deg); }
    </style>
</head>
<body class="font-sans text-gray-800 antialiased">
    <div class="flex h-screen overflow-hidden">

        <!-- LEFT SIDEBAR -->
        <aside class="hidden md:flex flex-col w-[260px] bg-darkNavy text-white fixed h-full z-30 shadow-2xl" id="sidebar">
            <!-- Logo -->
            <div class="p-6 flex items-center space-x-3 animate__animated animate__fadeInLeft">
                <div class="w-10 h-10 bg-gradient-to-br from-electricBlue to-cyanAccent rounded-lg flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <i class="fa-solid fa-shield-halved text-xl text-white"></i>
                </div>
                <h1 class="font-heading font-bold text-2xl tracking-wide">StreetSafe</h1>
            </div>

            <!-- User Profile Card -->
            <div class="px-4 mb-6 animate__animated animate__fadeInLeft" style="animation-delay:0.1s;">
                <div class="glass-sidebar-card rounded-xl p-4 flex items-center space-x-3">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full bg-electricBlue flex items-center justify-center text-white font-bold text-lg border-2 border-cyanAccent shadow-[0_0_10px_rgba(0,212,255,0.5)]">AK</div>
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-darkNavy"></div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-100">Ahmed Khan</h3>
                        <span class="text-[10px] bg-green-500/20 text-green-400 px-2 py-0.5 rounded-full border border-green-500/30 flex items-center w-max gap-1">
                            <i class="fa-solid fa-check"></i> Verified User
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

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-gray-800 animate__animated animate__fadeInLeft" style="animation-delay:0.3s;">
                <a href="/logout" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-lg text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors">
                    <i class="fa-solid fa-door-open w-6 text-center mr-2"></i>
                    Logout
                </a>
                <div class="mt-4 glass-sidebar-card rounded-xl p-3 flex items-center justify-between">
                    <div class="text-xs text-gray-400">
                        <div class="mb-1">Safety Score</div>
                        <div class="text-cyanAccent font-bold text-lg">87/100</div>
                    </div>
                    <div class="circular-progress shadow-[0_0_15px_rgba(0,212,255,0.3)]">
                        <span class="progress-value">A+</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MOBILE BOTTOM NAV -->
        <nav class="md:hidden fixed bottom-0 w-full bg-darkNavy text-white z-50 border-t border-gray-800 shadow-[0_-5px_20px_rgba(0,0,0,0.2)]">
            <div class="flex justify-around items-center py-3">
                <a href="/dashboard" class="flex flex-col items-center text-electricBlue">
                    <i class="fa-solid fa-chart-pie text-xl mb-1"></i>
                    <span class="text-[10px]">Home</span>
                </a>
                <a href="/map" class="flex flex-col items-center text-gray-400 hover:text-white transition">
                    <i class="fa-solid fa-map-location-dot text-xl mb-1"></i>
                    <span class="text-[10px]">Map</span>
                </a>
                <div class="relative -top-6">
                    <button onclick="window.location.href='/reports/incident'" class="w-14 h-14 bg-gradient-to-tr from-electricBlue to-cyanAccent rounded-full flex items-center justify-center shadow-[0_0_15px_rgba(0,212,255,0.6)] text-white text-2xl">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <a href="/notifications" class="flex flex-col items-center text-gray-400 hover:text-white transition">
                    <i class="fa-solid fa-bell text-xl mb-1"></i>
                    <span class="text-[10px]">Alerts</span>
                </a>
                <a href="/settings" class="flex flex-col items-center text-gray-400 hover:text-white transition">
                    <i class="fa-solid fa-user text-xl mb-1"></i>
                    <span class="text-[10px]">Profile</span>
                </a>
            </div>
        </nav>

        <!-- MAIN CONTENT AREA -->
        <main class="flex-1 md:ml-[260px] relative overflow-y-auto h-full pb-20 md:pb-0 bg-lightBg">

            <!-- TOP HEADER BAR -->
            <header class="sticky top-0 z-20 bg-lightBg/80 backdrop-blur-md px-6 py-5 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 animate__animated animate__fadeInDown animate__fast">
                <div>
                    <h2 class="font-heading font-bold text-2xl text-gray-800">Good Morning, Ahmed! 👋</h2>
                    <p class="text-sm text-gray-500 font-medium" id="currentDate">Loading date...</p>
                </div>
                <div class="flex items-center space-x-4 w-full md:w-auto">
                    <div class="relative flex-1 md:w-64 group">
                        <i class="fa-solid fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-electricBlue transition-colors"></i>
                        <input type="text" placeholder="Search reports, areas..." class="w-full bg-white border border-gray-200 rounded-full py-2 pl-10 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-electricBlue/20 focus:border-electricBlue shadow-sm transition-all">
                    </div>
                    <button class="relative w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-electricBlue hover:shadow-md transition-all animate__animated animate__shakeX">
                        <i class="fa-regular fa-bell"></i>
                        <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div class="w-10 h-10 rounded-full bg-electricBlue border-2 border-white shadow-md overflow-hidden cursor-pointer">
                        <img src="https://picsum.photos/seed/ahmedkhan/200/200" alt="Profile" class="w-full h-full object-cover">
                    </div>
                </div>
            </header>

            <div class="px-6 pb-10 space-y-8 max-w-7xl mx-auto">

                <!-- KPI CARDS -->
                <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="glass-card rounded-xl p-5 flex items-center justify-between hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group" data-aos="fade-up" data-aos-delay="0">
                        <div>
                            <p class="text-sm text-gray-500 font-medium mb-1">My Reports</p>
                            <h3 class="text-3xl font-heading font-bold text-gray-800 counter" data-target="12">0</h3>
                            <span class="text-xs text-green-600 font-medium flex items-center mt-1 bg-green-50 px-2 py-0.5 rounded w-max"><i class="fa-solid fa-arrow-trend-up mr-1"></i> +2 this week</span>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-electricBlue text-xl group-hover:bg-electricBlue group-hover:text-white transition-colors"><i class="fa-solid fa-flag"></i></div>
                    </div>
                    <div class="glass-card rounded-xl p-5 flex items-center justify-between hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group" data-aos="fade-up" data-aos-delay="100">
                        <div>
                            <p class="text-sm text-gray-500 font-medium mb-1">Pending Cases</p>
                            <h3 class="text-3xl font-heading font-bold text-gray-800 counter" data-target="3">0</h3>
                            <span class="text-xs text-orange-600 font-medium flex items-center mt-1 bg-orange-50 px-2 py-0.5 rounded w-max"><i class="fa-solid fa-clock mr-1"></i> Under review</span>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center text-orange-500 text-xl group-hover:bg-orange-500 group-hover:text-white transition-colors"><i class="fa-solid fa-hourglass-half"></i></div>
                    </div>
                    <div class="glass-card rounded-xl p-5 flex items-center justify-between hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group" data-aos="fade-up" data-aos-delay="200">
                        <div>
                            <p class="text-sm text-gray-500 font-medium mb-1">Resolved Cases</p>
                            <h3 class="text-3xl font-heading font-bold text-gray-800 counter" data-target="8">0</h3>
                            <span class="text-xs text-green-600 font-medium flex items-center mt-1 bg-green-50 px-2 py-0.5 rounded w-max"><i class="fa-solid fa-check mr-1"></i> +1 this month</span>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-600 text-xl group-hover:bg-green-600 group-hover:text-white transition-colors"><i class="fa-solid fa-circle-check"></i></div>
                    </div>
                    <div class="glass-card rounded-xl p-5 flex items-center justify-between hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group" data-aos="fade-up" data-aos-delay="300">
                        <div>
                            <p class="text-sm text-gray-500 font-medium mb-1">Safety Score</p>
                            <h3 class="text-3xl font-heading font-bold text-gray-800 counter" data-target="87">0</h3>
                            <span class="text-xs text-cyan-600 font-medium flex items-center mt-1 bg-cyan-50 px-2 py-0.5 rounded w-max"><i class="fa-solid fa-trophy mr-1"></i> Top 15% in city</span>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-cyan-50 flex items-center justify-center text-cyanAccent text-xl group-hover:bg-cyanAccent group-hover:text-white transition-colors shadow-[0_0_10px_rgba(0,212,255,0.3)]"><i class="fa-solid fa-shield-halved"></i></div>
                    </div>
                </section>

                <!-- TWO COLUMN -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 glass-card rounded-xl p-6 min-h-[400px]" data-aos="fade-up" data-aos-delay="400">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-heading font-bold text-lg text-gray-800">My Recent Reports</h3>
                            <a href="/my-reports" class="text-sm text-electricBlue font-medium hover:underline">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="text-xs text-gray-500 border-b border-gray-100 uppercase tracking-wider">
                                        <th class="pb-3 font-medium">Type</th>
                                        <th class="pb-3 font-medium">Description</th>
                                        <th class="pb-3 font-medium">Location</th>
                                        <th class="pb-3 font-medium">Date</th>
                                        <th class="pb-3 font-medium">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    <tr class="border-b border-gray-50 hover:bg-blue-50/30 transition-colors cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                                        <td class="py-4"><div class="flex items-center space-x-2"><div class="w-8 h-8 rounded bg-blue-100 text-electricBlue flex items-center justify-center"><i class="fa-solid fa-mobile-screen-button"></i></div><span class="font-medium text-gray-700">Snatching</span></div></td>
                                        <td class="py-4 text-gray-500 max-w-[150px] truncate">iPhone 13 stolen near...</td>
                                        <td class="py-4 text-gray-600">Gulshan, Karachi</td>
                                        <td class="py-4 text-gray-500">2 days ago</td>
                                        <td class="py-4"><span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Under Review</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-50 hover:bg-blue-50/30 transition-colors cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                                        <td class="py-4"><div class="flex items-center space-x-2"><div class="w-8 h-8 rounded bg-gray-100 text-gray-600 flex items-center justify-center"><i class="fa-solid fa-road"></i></div><span class="font-medium text-gray-700">Road Damage</span></div></td>
                                        <td class="py-4 text-gray-500 max-w-[150px] truncate">Large pothole on main...</td>
                                        <td class="py-4 text-gray-600">DHA Phase 5</td>
                                        <td class="py-4 text-gray-500">5 days ago</td>
                                        <td class="py-4"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Resolved</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-50 hover:bg-blue-50/30 transition-colors cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                                        <td class="py-4"><div class="flex items-center space-x-2"><div class="w-8 h-8 rounded bg-purple-100 text-purple-600 flex items-center justify-center"><i class="fa-solid fa-box-open"></i></div><span class="font-medium text-gray-700">Missing Item</span></div></td>
                                        <td class="py-4 text-gray-500 max-w-[150px] truncate">Samsung Galaxy S22...</td>
                                        <td class="py-4 text-gray-600">Clifton</td>
                                        <td class="py-4 text-gray-500">1 week ago</td>
                                        <td class="py-4"><span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-semibold">Pending</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-50 hover:bg-blue-50/30 transition-colors cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                                        <td class="py-4"><div class="flex items-center space-x-2"><div class="w-8 h-8 rounded bg-red-100 text-red-600 flex items-center justify-center"><i class="fa-solid fa-triangle-exclamation"></i></div><span class="font-medium text-gray-700">Harassment</span></div></td>
                                        <td class="py-4 text-gray-500 max-w-[150px] truncate">Reported unsafe area...</td>
                                        <td class="py-4 text-gray-600">Saddar</td>
                                        <td class="py-4 text-gray-500">2 weeks ago</td>
                                        <td class="py-4"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Resolved</span></td>
                                    </tr>
                                    <tr class="hover:bg-blue-50/30 transition-colors cursor-pointer" data-aos="fade-up" data-aos-delay="500">
                                        <td class="py-4"><div class="flex items-center space-x-2"><div class="w-8 h-8 rounded bg-indigo-100 text-indigo-600 flex items-center justify-center"><i class="fa-solid fa-car-burst"></i></div><span class="font-medium text-gray-700">Traffic Issue</span></div></td>
                                        <td class="py-4 text-gray-500 max-w-[150px] truncate">Heavy parking blockage...</td>
                                        <td class="py-4 text-gray-600">Nazimabad</td>
                                        <td class="py-4 text-gray-500">3 weeks ago</td>
                                        <td class="py-4"><span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-semibold">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="glass-card rounded-xl p-6 flex flex-col h-[400px]" data-aos="fade-up" data-aos-delay="450">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-heading font-bold text-lg text-gray-800 flex items-center"><i class="fa-solid fa-location-dot text-red-500 mr-2"></i>City Safety Alerts</h3>
                            <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full animate-pulse font-bold">LIVE</span>
                        </div>
                        <div class="flex-1 overflow-y-auto space-y-3 pr-2">
                            <div class="bg-white border-l-4 border-red-500 rounded p-3 shadow-sm hover:shadow-md transition-shadow animate-pulse-glow cursor-pointer" data-aos="fade-right" data-aos-delay="100">
                                <div class="flex items-start"><div class="mr-3 mt-1"><i class="fa-solid fa-person-running text-red-500"></i></div><div><h4 class="text-sm font-bold text-gray-800">Snatching reported</h4><p class="text-xs text-gray-500 mt-1">University Road</p><p class="text-[10px] text-gray-400 mt-1 font-medium">2 hrs ago</p></div></div>
                            </div>
                            <div class="bg-white border-l-4 border-orange-400 rounded p-3 shadow-sm hover:shadow-md transition-shadow cursor-pointer" data-aos="fade-right" data-aos-delay="200">
                                <div class="flex items-start"><div class="mr-3 mt-1"><i class="fa-solid fa-road-circle-exclamation text-orange-400"></i></div><div><h4 class="text-sm font-bold text-gray-800">Road damage</h4><p class="text-xs text-gray-500 mt-1">Hassan Square</p><p class="text-[10px] text-gray-400 mt-1 font-medium">5 hrs ago</p></div></div>
                            </div>
                            <div class="bg-white border-l-4 border-purple-500 rounded p-3 shadow-sm hover:shadow-md transition-shadow cursor-pointer" data-aos="fade-right" data-aos-delay="300">
                                <div class="flex items-start"><div class="mr-3 mt-1"><i class="fa-solid fa-user-shield text-purple-500"></i></div><div><h4 class="text-sm font-bold text-gray-800">Harassment zone</h4><p class="text-xs text-gray-500 mt-1">Empress Market area</p><p class="text-[10px] text-gray-400 mt-1 font-medium">Yesterday</p></div></div>
                            </div>
                            <div class="bg-white border-l-4 border-yellow-400 rounded p-3 shadow-sm hover:shadow-md transition-shadow cursor-pointer" data-aos="fade-right" data-aos-delay="400">
                                <div class="flex items-start"><div class="mr-3 mt-1"><i class="fa-solid fa-triangle-exclamation text-yellow-500"></i></div><div><h4 class="text-sm font-bold text-gray-800">Traffic blockage</h4><p class="text-xs text-gray-500 mt-1">MA Jinnah Road</p><p class="text-[10px] text-gray-400 mt-1 font-medium">Yesterday</p></div></div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- CHART -->
                <section class="glass-card rounded-xl p-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="mb-4">
                        <h3 class="font-heading font-bold text-lg text-gray-800">My Reporting Activity (Last 7 Days)</h3>
                        <p class="text-xs text-gray-500">Daily frequency of reports submitted</p>
                    </div>
                    <div class="relative h-64 w-full"><canvas id="activityChart"></canvas></div>
                </section>

                <!-- QUICK ACTIONS -->
                <section class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="600">
                    <button onclick="window.location.href='/reports/incident'" class="flex items-center justify-center space-x-2 bg-electricBlue text-white p-4 rounded-xl shadow-lg shadow-blue-500/20 hover:scale-105 hover:bg-blue-700 transition-all duration-300 group">
                        <i class="fa-solid fa-flag text-xl group-hover:rotate-12 transition-transform"></i>
                        <span class="font-medium">Report Incident</span>
                    </button>
                    <button onclick="window.location.href='/reports/missing-item'" class="flex items-center justify-center space-x-2 bg-emerald-500 text-white p-4 rounded-xl shadow-lg shadow-emerald-500/20 hover:scale-105 hover:bg-emerald-600 transition-all duration-300 group">
                        <i class="fa-solid fa-plus text-xl group-hover:rotate-90 transition-transform"></i>
                        <span class="font-medium">Add Missing Item</span>
                    </button>
                    <button onclick="window.location.href='/map'" class="flex items-center justify-center space-x-2 bg-purple-600 text-white p-4 rounded-xl shadow-lg shadow-purple-500/20 hover:scale-105 hover:bg-purple-700 transition-all duration-300 group">
                        <i class="fa-solid fa-map text-xl group-hover:-translate-y-1 transition-transform"></i>
                        <span class="font-medium">View Safety Map</span>
                    </button>
                    <button class="flex items-center justify-center space-x-2 bg-orange-500 text-white p-4 rounded-xl shadow-lg shadow-orange-500/20 hover:scale-105 hover:bg-orange-600 transition-all duration-300 group">
                        <i class="fa-solid fa-download text-xl group-hover:animate-bounce"></i>
                        <span class="font-medium">Download Reports</span>
                    </button>
                </section>

                <div class="h-16"></div>
            </div>

            <!-- FAB -->
            <div class="fixed bottom-8 right-8 z-40" id="fabContainer">
                <div class="absolute bottom-16 right-0 flex flex-col items-end space-y-3 fab-menu origin-bottom-right">
                    <button onclick="window.location.href='/reports/incident'" class="flex items-center space-x-2 bg-white text-gray-700 px-4 py-2 rounded-full shadow-lg hover:bg-gray-50 transition text-sm font-medium whitespace-nowrap">
                        <i class="fa-solid fa-flag text-electricBlue"></i> <span>Report Incident</span>
                    </button>
                    <button onclick="window.location.href='/reports/missing-item'" class="flex items-center space-x-2 bg-white text-gray-700 px-4 py-2 rounded-full shadow-lg hover:bg-gray-50 transition text-sm font-medium whitespace-nowrap">
                        <i class="fa-solid fa-box-open text-emerald-500"></i> <span>Missing Item</span>
                    </button>
                    <button onclick="window.location.href='/map'" class="flex items-center space-x-2 bg-white text-gray-700 px-4 py-2 rounded-full shadow-lg hover:bg-gray-50 transition text-sm font-medium whitespace-nowrap">
                        <i class="fa-solid fa-map text-purple-600"></i> <span>View Map</span>
                    </button>
                </div>
                <button id="fabBtn" class="fab-btn w-14 h-14 rounded-full bg-gradient-to-tr from-electricBlue to-cyanAccent text-white shadow-[0_0_20px_rgba(26,115,232,0.5)] flex items-center justify-center text-2xl hover:scale-110 transition-all duration-300">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </main>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        AOS.init({ duration: 800, easing: 'ease-out-cubic', once: true, offset: 50 });

        document.getElementById('currentDate').textContent = new Date().toLocaleDateString('en-PK', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

        const counters = document.querySelectorAll('.counter');
        setTimeout(() => {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const inc = target / 200;
                    if (count < target) { counter.innerText = Math.ceil(count + inc); setTimeout(updateCount, 20); }
                    else { counter.innerText = target; }
                };
                updateCount();
            });
        }, 500);

        const ctx = document.getElementById('activityChart').getContext('2d');
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(26,115,232,0.5)');
        gradient.addColorStop(1, 'rgba(26,115,232,0.0)');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
                datasets: [{ label: 'Reports', data: [2,4,1,5,2,3,1], backgroundColor: gradient, borderColor: '#1A73E8', borderWidth: 3, pointBackgroundColor: '#00D4FF', pointBorderColor: '#fff', pointBorderWidth: 2, pointRadius: 6, pointHoverRadius: 8, fill: true, tension: 0.4 }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { backgroundColor: 'rgba(10,15,30,0.9)', titleColor: '#fff', bodyColor: '#00D4FF', padding: 10, displayColors: false, cornerRadius: 8 } },
                scales: {
                    y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false }, ticks: { precision: 0, font: { family: 'Inter' } } },
                    x: { grid: { display: false, drawBorder: false }, ticks: { font: { family: 'Inter' } } }
                },
                animation: { y: { duration: 2000, easing: 'easeOutQuart' } }
            }
        });

        const fabBtn = document.getElementById('fabBtn');
        const fabContainer = document.getElementById('fabContainer');
        fabBtn.addEventListener('click', () => fabContainer.classList.toggle('fab-active'));
        document.addEventListener('click', (e) => { if (!fabContainer.contains(e.target)) fabContainer.classList.remove('fab-active'); });
    </script>
</body>
</html>