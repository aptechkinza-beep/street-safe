```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetSafe — Live Safety Map</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#0A0F1E',
                        navyLight: '#111836',
                        navyMid: '#1A2040',
                        electric: '#1A73E8',
                        cyan: '#00D4FF',
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
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #0A0F1E; color: #E2E8F0; overflow: hidden; height: 100vh; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', sans-serif; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #0A0F1E; }
        ::-webkit-scrollbar-thumb { background: #1A73E8; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #00D4FF; }

        /* Map container */
        #map { width: 100%; height: 100%; z-index: 1; }

        /* Override Leaflet controls */
        .leaflet-control-zoom { border: none !important; box-shadow: 0 4px 20px rgba(0,0,0,0.5) !important; border-radius: 12px !important; overflow: hidden !important; }
        .leaflet-control-zoom a { background: #111836 !important; color: #E2E8F0 !important; border: none !important; border-bottom: 1px solid #1A2040 !important; width: 36px !important; height: 36px !important; line-height: 36px !important; font-size: 16px !important; }
        .leaflet-control-zoom a:hover { background: #1A73E8 !important; }
        .leaflet-control-zoom a:last-child { border-bottom: none !important; }

        /* Custom popup */
        .leaflet-popup-content-wrapper { background: #111836 !important; color: #E2E8F0 !important; border-radius: 16px !important; box-shadow: 0 8px 32px rgba(0,0,0,0.6) !important; border: 1px solid rgba(26,115,232,0.2) !important; padding: 0 !important; overflow: hidden; }
        .leaflet-popup-content { margin: 0 !important; width: 260px !important; }
        .leaflet-popup-tip { background: #111836 !important; border: 1px solid rgba(26,115,232,0.2) !important; box-shadow: none !important; }
        .leaflet-popup-close-button { color: #94A3B8 !important; font-size: 20px !important; top: 8px !important; right: 10px !important; z-index: 10; }
        .leaflet-popup-close-button:hover { color: #fff !important; }

        /* Marker styles */
        .custom-marker { display: flex; align-items: center; justify-content: center; border-radius: 50%; border: 3px solid rgba(255,255,255,0.9); cursor: pointer; transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.3s ease; position: relative; }
        .custom-marker:hover { transform: scale(1.25) !important; }
        .custom-marker i { color: white; font-size: 14px; pointer-events: none; }

        @keyframes markerBounce {
            0% { transform: translateY(-40px); opacity: 0; }
            50% { transform: translateY(8px); opacity: 1; }
            70% { transform: translateY(-4px); }
            100% { transform: translateY(0); }
        }
        .marker-animate { animation: markerBounce 0.6s cubic-bezier(0.34,1.56,0.64,1) forwards; }

        /* Pulse for user location */
        @keyframes userPulse {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(3); opacity: 0; }
        }
        .user-marker-pulse {
            position: absolute; width: 100%; height: 100%; border-radius: 50%; background: #1A73E8; animation: userPulse 2s ease-out infinite; top: 0; left: 0;
        }

        /* Gauge animation */
        @keyframes gaugeRotate {
            from { --gauge-value: 0; }
        }
        .gauge-circle {
            border-radius: 50%;
            position: relative;
            transition: background 1s ease;
        }

        /* Filter chip styles */
        .filter-chip { transition: all 0.3s cubic-bezier(0.4,0,0.2,1); cursor: pointer; user-select: none; white-space: nowrap; }
        .filter-chip:hover { transform: translateY(-1px); }

        /* Live pulse */
        @keyframes livePulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }
        .live-dot { animation: livePulse 1.5s ease-in-out infinite; }

        /* Panel transitions */
        .panel-fade-enter { animation: panelFadeIn 0.4s ease forwards; }
        .panel-fade-exit { animation: panelFadeOut 0.3s ease forwards; }
        @keyframes panelFadeIn { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes panelFadeOut { from { opacity: 1; transform: translateY(0); } to { opacity: 0; transform: translateY(-12px); } }

        /* Navbar load animation */
        @keyframes navSlideDown { from { transform: translateY(-100%); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .nav-animate { animation: navSlideDown 0.6s ease forwards; }

        /* Map fade in */
        @keyframes mapFadeIn { from { opacity: 0; } to { opacity: 1; } }
        .map-animate { animation: mapFadeIn 0.8s ease 0.3s forwards; opacity: 0; }

        /* Panel slide in */
        @keyframes panelSlideIn { from { transform: translateX(60px); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
        .panel-animate { animation: panelSlideIn 0.6s ease 0.5s forwards; opacity: 0; }

        /* Feed item stagger */
        @keyframes feedSlideIn { from { transform: translateX(20px); opacity: 0; } to { transform: translateX(0); opacity: 1; } }

        /* Layer toggle */
        .layer-toggle { transition: all 0.3s ease; cursor: pointer; }
        .layer-toggle.active { background: #1A73E8 !important; color: white !important; border-color: #1A73E8 !important; }

        /* Glassmorphism */
        .glass { background: rgba(17, 24, 54, 0.75); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.08); }
        .glass-light { background: rgba(26, 32, 64, 0.6); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.06); }

        /* Stat card hover */
        .stat-card { transition: all 0.3s ease; }
        .stat-card:hover { transform: translateY(-2px); border-color: rgba(26,115,232,0.4); }

        /* Mobile drawer */
        .mobile-drawer { transition: transform 0.4s cubic-bezier(0.4,0,0.2,1); }
        .mobile-drawer.collapsed { transform: translateY(calc(100% - 48px)); }
        .mobile-drawer.expanded { transform: translateY(0); }

        /* Search results dropdown */
        .search-dropdown { position: absolute; top: 100%; left: 0; right: 0; z-index: 1000; }

        /* Spinner */
        @keyframes spin { to { transform: rotate(360deg); } }
        .spinner { animation: spin 1s linear infinite; }

        /* Activity item */
        .activity-item { transition: all 0.2s ease; }
        .activity-item:hover { background: rgba(26,115,232,0.08); }
    </style>
</head>
<body class="bg-navy">

    <!-- ===== TOP NAVBAR ===== -->
    <nav class="fixed top-0 left-0 right-0 h-16 bg-navy border-b border-white/5 z-50 nav-animate flex items-center px-4 gap-3">
        <!-- Logo -->
        <div class="flex items-center gap-2 shrink-0">
            <div class="w-9 h-9 rounded-xl bg-electric/20 flex items-center justify-center">
                <i class="fa-solid fa-shield-halved text-electric text-lg"></i>
            </div>
            <span class="font-poppins font-bold text-lg text-white hidden sm:block">Street<span class="text-electric">Safe</span></span>
        </div>

        <!-- Filter Chips -->
        <div class="flex-1 flex items-center justify-center overflow-x-auto gap-2 px-2 no-scrollbar" id="filterChips">
            <button class="filter-chip px-3 py-1.5 rounded-full text-xs font-semibold bg-electric text-white border border-electric" data-filter="all" onclick="toggleFilter('all', this)">All</button>
            <button class="filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-red-400 border border-red-400/50 bg-transparent hover:bg-red-400/10" data-filter="snatching" onclick="toggleFilter('snatching', this)">
                <i class="fa-solid fa-person-running mr-1"></i>Snatching
            </button>
            <button class="filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-blue-400 border border-blue-400/50 bg-transparent hover:bg-blue-400/10" data-filter="missing" onclick="toggleFilter('missing', this)">
                <i class="fa-solid fa-mobile-screen-button mr-1"></i>Missing Items
            </button>
            <button class="filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-orange-400 border border-orange-400/50 bg-transparent hover:bg-orange-400/10" data-filter="road" onclick="toggleFilter('road', this)">
                <i class="fa-solid fa-road mr-1"></i>Road Damage
            </button>
            <button class="filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-purple-400 border border-purple-400/50 bg-transparent hover:bg-purple-400/10" data-filter="harassment" onclick="toggleFilter('harassment', this)">
                <i class="fa-solid fa-triangle-exclamation mr-1"></i>Harassment
            </button>
            <button class="filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-yellow-400 border border-yellow-400/50 bg-transparent hover:bg-yellow-400/10" data-filter="traffic" onclick="toggleFilter('traffic', this)">
                <i class="fa-solid fa-car mr-1"></i>Traffic
            </button>
        </div>

        <!-- Right Actions -->
        <div class="flex items-center gap-2 shrink-0">
            <!-- Search -->
            <div class="relative hidden md:block">
                <input type="text" id="searchInput" placeholder="Search area..." class="glass rounded-xl px-3 py-1.5 text-xs text-white placeholder:text-gray-400 w-40 focus:outline-none focus:border-electric/40 focus:w-52 transition-all duration-300" oninput="handleSearch(this.value)" onfocus="showSearchResults()" onblur="setTimeout(hideSearchResults, 200)">
                <i class="fa-solid fa-magnifying-glass absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                <div id="searchResults" class="search-dropdown glass rounded-xl mt-1 hidden max-h-48 overflow-y-auto"></div>
            </div>

            <!-- My Location -->
            <button id="myLocationBtn" onclick="getMyLocation()" class="w-9 h-9 rounded-xl bg-electric/20 text-electric hover:bg-electric hover:text-white transition-all duration-300 flex items-center justify-center text-sm" title="My Location">
                <i class="fa-solid fa-crosshairs" id="locationIcon"></i>
            </button>

            <!-- Dashboard -->
            <a href="#" class="w-9 h-9 rounded-xl bg-white/5 text-gray-300 hover:bg-white/10 hover:text-white transition-all duration-300 flex items-center justify-center text-sm" title="Dashboard">
                <i class="fa-solid fa-chart-line"></i>
            </a>

            <!-- Avatar -->
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-electric to-cyan flex items-center justify-center text-xs font-bold text-white cursor-pointer">AK</div>
        </div>
    </nav>

    <!-- ===== MAIN LAYOUT ===== -->
    <div class="flex pt-16" style="height: 100vh;">

        <!-- LEFT: Map Area -->
        <div class="w-full lg:w-[70%] relative map-animate" id="mapContainer">
            <div id="map" class="w-full h-full"></div>

            <!-- Layer Toggles -->
            <div class="absolute top-4 left-4 z-[1000] flex gap-2" id="layerToggles">
                <button class="layer-toggle active glass-light rounded-full px-3 py-1.5 text-xs font-medium text-gray-300" data-layer="markers" onclick="toggleLayer('markers', this)">
                    <i class="fa-solid fa-map-pin mr-1"></i>Markers
                </button>
                <button class="layer-toggle active glass-light rounded-full px-3 py-1.5 text-xs font-medium text-gray-300" data-layer="heatZones" onclick="toggleLayer('heatZones', this)">
                    <i class="fa-solid fa-fire mr-1"></i>Heat Zones
                </button>
                <button class="layer-toggle active glass-light rounded-full px-3 py-1.5 text-xs font-medium text-gray-300" data-layer="safetyRatings" onclick="toggleLayer('safetyRatings', this)">
                    <i class="fa-solid fa-shield-heart mr-1"></i>Safety Ratings
                </button>
            </div>

            <!-- Map Legend -->
            <div class="absolute bottom-6 left-4 z-[1000] glass rounded-2xl p-4 w-52" id="mapLegend">
                <h4 class="font-poppins font-semibold text-sm text-white mb-3">Legend</h4>
                <div class="space-y-2">
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-red-500"></span><span class="text-xs text-gray-300">Snatching</span></div>
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-blue-500"></span><span class="text-xs text-gray-300">Missing Items</span></div>
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-orange-500"></span><span class="text-xs text-gray-300">Road Damage</span></div>
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-purple-500"></span><span class="text-xs text-gray-300">Harassment</span></div>
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-yellow-500"></span><span class="text-xs text-gray-300">Traffic</span></div>
                    <div class="flex items-center gap-2 mt-2 pt-2 border-t border-white/10"><span class="w-3 h-3 rounded-full bg-green-500 opacity-40"></span><span class="text-xs text-gray-300">Safe Zone</span></div>
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-red-500 opacity-40"></span><span class="text-xs text-gray-300">Danger Zone</span></div>
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-yellow-500 opacity-40"></span><span class="text-xs text-gray-300">Moderate Zone</span></div>
                </div>
            </div>
        </div>

        <!-- RIGHT: Side Panel (Desktop) -->
        <div class="hidden lg:flex w-[30%] bg-navy border-l border-white/5 flex-col overflow-y-auto panel-animate" id="sidePanel">

            <!-- SECTION 1: Overview (default) -->
            <div id="panelOverview" class="p-5 space-y-5">
                <!-- Heading -->
                <div>
                    <h2 class="font-poppins font-bold text-xl text-white">City Safety Overview</h2>
                    <p class="text-xs text-gray-400 mt-1">Real-time safety monitoring for Karachi</p>
                </div>

                <!-- Safety Gauge -->
                <div class="glass rounded-2xl p-5 flex flex-col items-center">
                    <div class="relative w-36 h-36">
                        <div id="mainGauge" class="gauge-circle w-36 h-36" style="background: conic-gradient(#EAB308 0deg, #EAB308 0deg, #1A2040 0deg);"></div>
                        <div class="absolute inset-3 rounded-full bg-navyLight flex flex-col items-center justify-center">
                            <span class="font-poppins font-bold text-3xl text-white" id="gaugeScore">0</span>
                            <span class="text-[10px] text-gray-400 mt-0.5">out of 100</span>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-yellow-400"></span>
                        <span class="text-sm font-semibold text-yellow-400">Moderate Safety</span>
                    </div>
                    <p class="text-[11px] text-gray-400 mt-1 text-center">Based on 247 reports in the last 30 days</p>
                </div>

                <!-- Stats Row -->
                <div class="grid grid-cols-2 gap-3">
                    <div class="stat-card glass rounded-xl p-3 text-center">
                        <div class="text-xl font-poppins font-bold text-white">247</div>
                        <div class="text-[10px] text-gray-400 mt-0.5">Total Reports</div>
                    </div>
                    <div class="stat-card glass rounded-xl p-3 text-center">
                        <div class="text-xl font-poppins font-bold text-red-400">47</div>
                        <div class="text-[10px] text-gray-400 mt-0.5">Active Cases</div>
                    </div>
                    <div class="stat-card glass rounded-xl p-3 text-center">
                        <div class="text-xl font-poppins font-bold text-green-400">189</div>
                        <div class="text-[10px] text-gray-400 mt-0.5">Resolved</div>
                    </div>
                    <div class="stat-card glass rounded-xl p-3 text-center">
                        <div class="text-xl font-poppins font-bold text-orange-400">8</div>
                        <div class="text-[10px] text-gray-400 mt-0.5">Danger Zones</div>
                    </div>
                </div>

                <!-- Area Safety Selector -->
                <div class="glass rounded-2xl p-4">
                    <h3 class="font-poppins font-semibold text-sm text-white mb-3">Your Area Safety</h3>
                    <select id="areaSelector" onchange="updateAreaSafety(this.value)" class="w-full bg-navyMid text-gray-200 text-sm rounded-xl px-3 py-2 border border-white/10 focus:outline-none focus:border-electric/40 cursor-pointer">
                        <option value="gulshan">Gulshan-e-Iqbal</option>
                        <option value="dha">DHA</option>
                        <option value="saddar">Saddar</option>
                        <option value="clifton">Clifton</option>
                        <option value="northkarachi">North Karachi</option>
                    </select>
                    <div id="areaSafetyResult" class="mt-3 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full border-2 border-red-400 flex items-center justify-center">
                            <span class="text-xs font-bold text-red-400" id="areaScore">35</span>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-white" id="areaLabel">Gulshan-e-Iqbal</div>
                            <span class="text-[10px] px-2 py-0.5 rounded-full bg-red-400/20 text-red-400 font-medium" id="areaBadge">Danger</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: Marker Detail (hidden by default) -->
            <div id="panelDetail" class="p-5 space-y-5 hidden">
                <button onclick="showOverview()" class="flex items-center gap-2 text-sm text-electric hover:text-cyan transition-colors">
                    <i class="fa-solid fa-arrow-left"></i> All Areas
                </button>

                <div id="detailContent">
                    <!-- Filled dynamically -->
                </div>
            </div>

            <!-- SECTION 3: Peak Hours Chart -->
            <div class="p-5 border-t border-white/5">
                <h3 class="font-poppins font-semibold text-sm text-white mb-3">Peak Crime Hours — Karachi</h3>
                <div style="height: 180px;">
                    <canvas id="peakChart"></canvas>
                </div>
            </div>

            <!-- SECTION 4: Recent Activity Feed -->
            <div class="p-5 border-t border-white/5">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="font-poppins font-semibold text-sm text-white">Recent Reports</h3>
                    <span class="flex items-center gap-1.5 text-[10px] font-semibold text-red-400 bg-red-400/10 px-2 py-0.5 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-400 live-dot"></span> LIVE
                    </span>
                </div>
                <div class="space-y-2 max-h-[300px] overflow-y-auto" id="activityFeed">
                    <!-- Filled dynamically -->
                </div>
            </div>
        </div>

        <!-- Mobile Bottom Drawer -->
        <div class="lg:hidden fixed bottom-0 left-0 right-0 z-40 bg-navy border-t border-white/10 rounded-t-3xl mobile-drawer collapsed" id="mobileDrawer" style="height: 65vh;">
            <!-- Handle -->
            <div class="flex justify-center py-3 cursor-pointer" onclick="toggleMobileDrawer()">
                <div class="w-10 h-1.5 rounded-full bg-gray-500"></div>
            </div>
            <div class="overflow-y-auto px-4 pb-6" style="height: calc(100% - 36px);" id="mobilePanelContent">
                <!-- Cloned panel content will go here via JS -->
            </div>
        </div>
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // ===== DATA =====
        const incidents = [
            { id: 1, type: 'snatching', lat: 24.9008, lng: 67.0821, title: 'iPhone snatched', desc: 'iPhone snatched at gunpoint near bus stop', location: 'University Road', time: '2 hrs ago', reporter: 'Anonymous', status: 'Active', priority: 'High', icon: 'fa-person-running', color: '#EF4444', area: 'gulshan' },
            { id: 2, type: 'snatching', lat: 24.8554, lng: 67.0311, title: 'Bag snatching incident', desc: 'Bag snatched by motorcycle riders', location: 'Saddar', time: 'Yesterday', reporter: 'Verified', status: 'Investigating', priority: 'Medium', icon: 'fa-person-running', color: '#EF4444', area: 'saddar' },
            { id: 3, type: 'snatching', lat: 24.9215, lng: 67.0601, title: 'Mobile phone stolen', desc: 'Mobile phone stolen from passenger in rickshaw', location: 'Gulshan-e-Iqbal', time: '3 days ago', reporter: 'Anonymous', status: 'Resolved', priority: 'Low', icon: 'fa-person-running', color: '#EF4444', area: 'gulshan' },
            { id: 4, type: 'road', lat: 24.8123, lng: 67.0456, title: 'Large pothole', desc: 'Dangerous pothole causing accidents', location: 'DHA Phase 5', time: '5 days ago', reporter: 'Verified', status: 'Reported', priority: 'High', icon: 'fa-road', color: '#F97316', area: 'dha' },
            { id: 5, type: 'road', lat: 24.8789, lng: 67.0234, title: 'Broken road surface', desc: 'Road surface completely broken after rain', location: 'Clifton', time: '1 week ago', reporter: 'Verified', status: 'Reported', priority: 'Medium', icon: 'fa-road', color: '#F97316', area: 'clifton' },
            { id: 6, type: 'harassment', lat: 24.8601, lng: 67.0102, title: 'Harassment zone reported', desc: 'Multiple harassment reports in this area', location: 'Empress Market', time: '2 days ago', reporter: 'Anonymous', status: 'Active', priority: 'High', icon: 'fa-triangle-exclamation', color: '#8B5CF6', area: 'saddar' },
            { id: 7, type: 'harassment', lat: 24.9301, lng: 67.0701, title: 'Reported unsafe area', desc: 'Area flagged as unsafe after dark', location: 'North Karachi', time: '4 days ago', reporter: 'Verified', status: 'Investigating', priority: 'High', icon: 'fa-triangle-exclamation', color: '#8B5CF6', area: 'northkarachi' },
            { id: 8, type: 'traffic', lat: 24.8701, lng: 67.0501, title: 'Heavy traffic jam', desc: 'Severe traffic congestion on main road', location: 'MA Jinnah Road', time: '1 hr ago', reporter: 'Verified', status: 'Active', priority: 'Medium', icon: 'fa-car', color: '#EAB308', area: 'saddar' },
            { id: 9, type: 'traffic', lat: 24.8456, lng: 67.0678, title: 'Illegal parking blockage', desc: 'Illegal parking blocking main carriageway', location: 'Nazimabad', time: '3 hrs ago', reporter: 'Anonymous', status: 'Reported', priority: 'Low', icon: 'fa-car', color: '#EAB308', area: 'northkarachi' },
            { id: 10, type: 'missing', lat: 24.8901, lng: 67.0345, title: 'Missing: iPhone 14 Pro', desc: 'iPhone 14 Pro lost near restaurant', location: 'Gulshan', time: '3 days ago', reporter: 'Verified', status: 'Active', priority: 'Medium', icon: 'fa-mobile-screen-button', color: '#1A73E8', area: 'gulshan' },
            { id: 11, type: 'missing', lat: 24.8234, lng: 67.0789, title: 'Missing: Laptop', desc: 'Laptop bag left in auto-rickshaw', location: 'Korangi', time: '1 week ago', reporter: 'Anonymous', status: 'Reported', priority: 'Low', icon: 'fa-mobile-screen-button', color: '#1A73E8', area: 'korangi' }
        ];

        const safetyZones = [
            { lat: 24.9008, lng: 67.0821, radius: 1200, color: '#EF4444', opacity: 0.15, label: 'Danger Zone', type: 'heatZones' },
            { lat: 24.8123, lng: 67.0456, radius: 1500, color: '#10B981', opacity: 0.15, label: 'Safe Zone', type: 'heatZones' },
            { lat: 24.8554, lng: 67.0311, radius: 1000, color: '#EAB308', opacity: 0.15, label: 'Moderate Zone', type: 'heatZones' },
            { lat: 24.8789, lng: 67.0234, radius: 1300, color: '#10B981', opacity: 0.12, label: 'Safe Zone', type: 'heatZones' }
        ];

        const safetyRatings = [
            { lat: 24.9008, lng: 67.0821, radius: 800, color: '#EF4444', opacity: 0.08, label: 'Gulshan — Danger', type: 'safetyRatings' },
            { lat: 24.8123, lng: 67.0456, radius: 1000, color: '#10B981', opacity: 0.08, label: 'DHA — Safe', type: 'safetyRatings' },
            { lat: 24.8554, lng: 67.0311, radius: 900, color: '#EAB308', opacity: 0.08, label: 'Saddar — Moderate', type: 'safetyRatings' },
            { lat: 24.8789, lng: 67.0234, radius: 950, color: '#10B981', opacity: 0.06, label: 'Clifton — Safe', type: 'safetyRatings' }
        ];

        const areaData = {
            gulshan: { name: 'Gulshan-e-Iqbal', score: 35, badge: 'Danger', badgeColor: 'red' },
            dha: { name: 'DHA', score: 82, badge: 'Safe', badgeColor: 'green' },
            saddar: { name: 'Saddar', score: 48, badge: 'Moderate', badgeColor: 'yellow' },
            clifton: { name: 'Clifton', score: 78, badge: 'Safe', badgeColor: 'green' },
            northkarachi: { name: 'North Karachi', score: 30, badge: 'Danger', badgeColor: 'red' }
        };

        const searchAreas = [
            { name: 'Gulshan-e-Iqbal', lat: 24.9008, lng: 67.0821 },
            { name: 'Saddar', lat: 24.8554, lng: 67.0311 },
            { name: 'DHA Phase 5', lat: 24.8123, lng: 67.0456 },
            { name: 'Clifton', lat: 24.8789, lng: 67.0234 },
            { name: 'North Karachi', lat: 24.9301, lng: 67.0701 },
            { name: 'MA Jinnah Road', lat: 24.8701, lng: 67.0501 },
            { name: 'Nazimabad', lat: 24.8456, lng: 67.0678 },
            { name: 'Empress Market', lat: 24.8601, lng: 67.0102 },
            { name: 'Korangi', lat: 24.8234, lng: 67.0789 },
            { name: 'University Road', lat: 24.9008, lng: 67.0821 }
        ];

        const activityItems = [
            { type: 'snatching', color: '#EF4444', icon: 'fa-person-running', desc: 'iPhone snatched at University Road', area: 'Gulshan', time: '2 hrs ago', priority: 'High' },
            { type: 'traffic', color: '#EAB308', icon: 'fa-car', desc: 'Heavy traffic jam on MA Jinnah Road', area: 'Saddar', time: '1 hr ago', priority: 'Medium' },
            { type: 'harassment', color: '#8B5CF6', icon: 'fa-triangle-exclamation', desc: 'Harassment zone flagged at Empress Market', area: 'Saddar', time: '2 days ago', priority: 'High' },
            { type: 'road', color: '#F97316', icon: 'fa-road', desc: 'Large pothole reported in DHA Phase 5', area: 'DHA', time: '5 days ago', priority: 'High' },
            { type: 'missing', color: '#1A73E8', icon: 'fa-mobile-screen-button', desc: 'Missing iPhone 14 Pro in Gulshan', area: 'Gulshan', time: '3 days ago', priority: 'Medium' },
            { type: 'snatching', color: '#EF4444', icon: 'fa-person-running', desc: 'Bag snatching incident in Saddar', area: 'Saddar', time: 'Yesterday', priority: 'Medium' }
        ];

        // ===== MAP INITIALIZATION =====
        const map = L.map('map', {
            center: [24.8607, 67.0011],
            zoom: 12,
            zoomControl: false,
            attributionControl: false
        });

        // Dark tile layer
        L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>'
        }).addTo(map);

        // Zoom control position
        L.control.zoom({ position: 'topright' }).addTo(map);

        // Attribution
        L.control.attribution({ position: 'bottomright', prefix: false }).addTo(map);

        // ===== LAYER GROUPS =====
        const markerLayer = L.layerGroup().addTo(map);
        const heatZoneLayer = L.layerGroup().addTo(map);
        const safetyRatingLayer = L.layerGroup().addTo(map);

        const layerMap = {
            markers: markerLayer,
            heatZones: heatZoneLayer,
            safetyRatings: safetyRatingLayer
        };

        const layerState = { markers: true, heatZones: true, safetyRatings: true };

        // ===== CREATE MARKERS =====
        let currentFilter = 'all';
        const markerObjects = {};

        function createMarkerIcon(incident) {
            return L.divIcon({
                className: '',
                iconSize: [36, 36],
                iconAnchor: [18, 18],
                popupAnchor: [0, -22],
                html: `<div class="custom-marker marker-animate" style="width:36px;height:36px;background:${incident.color};box-shadow:0 0 16px ${incident.color}66, 0 0 4px ${incident.color}33;">
                    <i class="fa-solid ${incident.icon}"></i>
                </div>`
            });
        }

        function createPopupContent(incident) {
            const statusColors = { 'Active': 'bg-red-400/20 text-red-400', 'Investigating': 'bg-yellow-400/20 text-yellow-400', 'Reported': 'bg-blue-400/20 text-blue-400', 'Resolved': 'bg-green-400/20 text-green-400' };
            const typeLabels = { 'snatching': 'Snatching', 'road': 'Road Damage', 'harassment': 'Harassment', 'traffic': 'Traffic', 'missing': 'Missing Item' };
            return `
                <div style="padding: 16px;">
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:10px;">
                        <span style="background:${incident.color}22;color:${incident.color};padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;">${typeLabels[incident.type]}</span>
                        <span class="${statusColors[incident.status] || 'bg-gray-400/20 text-gray-400'}" style="padding:3px 8px;border-radius:20px;font-size:10px;font-weight:500;">${incident.status}</span>
                    </div>
                    <div style="font-weight:600;font-size:14px;color:#fff;margin-bottom:8px;">${incident.title}</div>
                    <div style="font-size:12px;color:#94A3B8;margin-bottom:4px;"><i class="fa-solid fa-location-dot" style="color:${incident.color};margin-right:6px;"></i>${incident.location}</div>
                    <div style="font-size:12px;color:#94A3B8;margin-bottom:4px;"><i class="fa-regular fa-clock" style="color:#94A3B8;margin-right:6px;"></i>${incident.time}</div>
                    <div style="font-size:12px;color:#94A3B8;margin-bottom:12px;"><i class="fa-solid fa-user" style="color:#94A3B8;margin-right:6px;"></i>${incident.reporter}</div>
                    <button onclick="selectIncident(${incident.id})" style="width:100%;padding:8px;background:#1A73E8;color:#fff;border:none;border-radius:10px;font-size:12px;font-weight:600;cursor:pointer;transition:background 0.2s;">View Details</button>
                </div>
            `;
        }

        incidents.forEach((inc, idx) => {
            setTimeout(() => {
                const marker = L.marker([inc.lat, inc.lng], { icon: createMarkerIcon(inc) })
                    .bindPopup(createPopupContent(inc), { maxWidth: 280, closeButton: true })
                    .on('click', () => selectIncident(inc.id));
                marker.incidentType = inc.type;
                marker.incidentId = inc.id;
                markerLayer.addLayer(marker);
                markerObjects[inc.id] = marker;
            }, idx * 100);
        });

        // ===== SAFETY ZONES =====
        safetyZones.forEach(zone => {
            L.circle([zone.lat, zone.lng], {
                radius: zone.radius,
                color: zone.color,
                fillColor: zone.color,
                fillOpacity: zone.opacity,
                weight: 1,
                opacity: 0.3
            }).bindTooltip(zone.label, { permanent: false, className: 'zone-tooltip' }).addTo(heatZoneLayer);
        });

        safetyRatings.forEach(zone => {
            L.circle([zone.lat, zone.lng], {
                radius: zone.radius,
                color: zone.color,
                fillColor: zone.color,
                fillOpacity: zone.opacity,
                weight: 2,
                opacity: 0.4,
                dashArray: '8 4'
            }).bindTooltip(zone.label, { permanent: false, className: 'zone-tooltip' }).addTo(safetyRatingLayer);
        });

        // Custom tooltip style
        const tooltipStyle = document.createElement('style');
        tooltipStyle.textContent = `
            .zone-tooltip { background: #111836 !important; color: #E2E8F0 !important; border: 1px solid rgba(255,255,255,0.1) !important; border-radius: 8px !important; font-size: 11px !important; padding: 4px 10px !important; box-shadow: 0 4px 12px rgba(0,0,0,0.4) !important; }
            .zone-tooltip::before { border-top-color: #111836 !important; }
        `;
        document.head.appendChild(tooltipStyle);

        // ===== FILTER LOGIC =====
        function toggleFilter(filter, btn) {
            currentFilter = filter;
            // Update chip styles
            document.querySelectorAll('.filter-chip').forEach(chip => {
                const f = chip.dataset.filter;
                chip.classList.remove('bg-electric', 'text-white', 'border-electric');
                chip.classList.remove('bg-red-400', 'text-white', 'border-red-400');
                chip.classList.remove('bg-blue-400', 'text-white', 'border-blue-400');
                chip.classList.remove('bg-orange-400', 'text-white', 'border-orange-400');
                chip.classList.remove('bg-purple-400', 'text-white', 'border-purple-400');
                chip.classList.remove('bg-yellow-400', 'text-white', 'border-yellow-400');

                if (f === 'all') {
                    chip.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-gray-300 border border-white/20 bg-transparent hover:bg-white/10';
                } else if (f === 'snatching') {
                    chip.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-red-400 border border-red-400/50 bg-transparent hover:bg-red-400/10';
                } else if (f === 'missing') {
                    chip.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-blue-400 border border-blue-400/50 bg-transparent hover:bg-blue-400/10';
                } else if (f === 'road') {
                    chip.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-orange-400 border border-orange-400/50 bg-transparent hover:bg-orange-400/10';
                } else if (f === 'harassment') {
                    chip.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-purple-400 border border-purple-400/50 bg-transparent hover:bg-purple-400/10';
                } else if (f === 'traffic') {
                    chip.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold text-yellow-400 border border-yellow-400/50 bg-transparent hover:bg-yellow-400/10';
                }
            });

            // Activate selected
            if (filter === 'all') {
                btn.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold bg-electric text-white border border-electric';
            } else if (filter === 'snatching') {
                btn.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold bg-red-400 text-white border border-red-400';
            } else if (filter === 'missing') {
                btn.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold bg-blue-400 text-white border border-blue-400';
            } else if (filter === 'road') {
                btn.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold bg-orange-400 text-white border border-orange-400';
            } else if (filter === 'harassment') {
                btn.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold bg-purple-400 text-white border border-purple-400';
            } else if (filter === 'traffic') {
                btn.className = 'filter-chip px-3 py-1.5 rounded-full text-xs font-semibold bg-yellow-400 text-white border border-yellow-400';
            }

            // Show/hide markers
            markerLayer.eachLayer(layer => {
                if (layer instanceof L.Marker) {
                    if (filter === 'all' || layer.incidentType === filter) {
                        layer.setOpacity(1);
                    } else {
                        layer.setOpacity(0.15);
                    }
                }
            });
        }

        // ===== LAYER TOGGLES =====
        function toggleLayer(layerName, btn) {
            layerState[layerName] = !layerState[layerName];
            btn.classList.toggle('active');
            if (layerState[layerName]) {
                map.addLayer(layerMap[layerName]);
            } else {
                map.removeLayer(layerMap[layerName]);
            }
        }

        // ===== SELECT INCIDENT (show detail panel) =====
        function selectIncident(id) {
            const inc = incidents.find(i => i.id === id);
            if (!inc) return;

            const typeLabels = { 'snatching': 'Snatching', 'road': 'Road Damage', 'harassment': 'Harassment', 'traffic': 'Traffic', 'missing': 'Missing Item' };
            const statusColors = { 'Active': 'bg-red-400/20 text-red-400', 'Investigating': 'bg-yellow-400/20 text-yellow-400', 'Reported': 'bg-blue-400/20 text-blue-400', 'Resolved': 'bg-green-400/20 text-green-400' };
            const priorityColors = { 'High': 'bg-red-400/20 text-red-400', 'Medium': 'bg-yellow-400/20 text-yellow-400', 'Low': 'bg-green-400/20 text-green-400' };

            // Area safety score for detail
            const areaInfo = areaData[inc.area] || areaData.gulshan;
            const scoreColor = areaInfo.badgeColor === 'green' ? '#10B981' : areaInfo.badgeColor === 'yellow' ? '#EAB308' : '#EF4444';
            const scoreDeg = (areaInfo.score / 100) * 360;

            // Nearby incidents
            const nearby = incidents.filter(i => i.id !== id).slice(0, 3);

            const detailHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold" style="background:${inc.color}22;color:${inc.color};">${typeLabels[inc.type]}</span>
                        <span class="${priorityColors[inc.priority] || ''} px-2 py-0.5 rounded-full text-[10px] font-medium">${inc.priority} Priority</span>
                    </div>

                    <h2 class="font-poppins font-bold text-lg text-white">${inc.title}</h2>
                    <p class="text-sm text-gray-400">${inc.desc}</p>

                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <i class="fa-solid fa-location-dot w-5 text-center" style="color:${inc.color};"></i>
                            <span>${inc.location}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <i class="fa-regular fa-clock w-5 text-center text-gray-400"></i>
                            <span>${inc.time}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <i class="fa-solid fa-user w-5 text-center text-gray-400"></i>
                            <span>Reported by ${inc.reporter}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <i class="fa-solid fa-chart-simple w-5 text-center text-gray-400"></i>
                            <span>Status: <span class="${statusColors[inc.status] || ''} px-2 py-0.5 rounded-full text-[11px] font-medium">${inc.status}</span></span>
                        </div>
                    </div>

                    <!-- Area Safety Mini -->
                    <div class="glass rounded-xl p-3 flex items-center gap-3">
                        <div class="relative w-12 h-12 shrink-0">
                            <div class="w-12 h-12 rounded-full" style="background: conic-gradient(${scoreColor} ${scoreDeg}deg, #1A2040 ${scoreDeg}deg);"></div>
                            <div class="absolute inset-1.5 rounded-full bg-navyLight flex items-center justify-center">
                                <span class="text-[10px] font-bold text-white">${areaInfo.score}</span>
                            </div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-400">Area Safety Score</div>
                            <div class="text-sm font-semibold text-white">${areaInfo.name}</div>
                            <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" style="background:${scoreColor}22;color:${scoreColor};">${areaInfo.badge}</span>
                        </div>
                    </div>

                    <!-- Nearby Incidents -->
                    <div>
                        <h4 class="text-xs font-semibold text-gray-400 mb-2 uppercase tracking-wider">Nearby Incidents</h4>
                        <div class="space-y-2">
                            ${nearby.map(n => `
                                <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/5 transition-colors cursor-pointer" onclick="selectIncident(${n.id})">
                                    <span class="w-2.5 h-2.5 rounded-full shrink-0" style="background:${n.color};"></span>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-xs text-white truncate">${n.title}</div>
                                        <div class="text-[10px] text-gray-400">${n.location} · ${n.time}</div>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2 pt-2">
                        <button class="flex-1 py-2.5 rounded-xl border border-electric text-electric text-xs font-semibold hover:bg-electric hover:text-white transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-map-location-dot"></i> Get Directions
                        </button>
                        <button class="flex-1 py-2.5 rounded-xl border border-white/10 text-gray-300 text-xs font-semibold hover:bg-white/10 hover:text-white transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-share-nodes"></i> Share Alert
                        </button>
                    </div>
                </div>
            `;

            // Desktop panel
            const overview = document.getElementById('panelOverview');
            const detail = document.getElementById('panelDetail');
            const detailContent = document.getElementById('detailContent');

            overview.classList.add('panel-fade-exit');
            setTimeout(() => {
                overview.classList.add('hidden');
                overview.classList.remove('panel-fade-exit');
                detailContent.innerHTML = detailHTML;
                detail.classList.remove('hidden');
                detail.classList.add('panel-fade-enter');
                setTimeout(() => detail.classList.remove('panel-fade-enter'), 400);
            }, 300);

            // Fly to marker
            map.flyTo([inc.lat, inc.lng], 14, { duration: 1 });

            // Update mobile panel too
            updateMobilePanel(detailHTML);
        }

        function showOverview() {
            const overview = document.getElementById('panelOverview');
            const detail = document.getElementById('panelDetail');

            detail.classList.add('panel-fade-exit');
            setTimeout(() => {
                detail.classList.add('hidden');
                detail.classList.remove('panel-fade-exit');
                overview.classList.remove('hidden');
                overview.classList.add('panel-fade-enter');
                setTimeout(() => overview.classList.remove('panel-fade-enter'), 400);
            }, 300);

            map.flyTo([24.8607, 67.0011], 12, { duration: 1 });
            updateMobilePanel(null);
        }

        // ===== AREA SAFETY SELECTOR =====
        function updateAreaSafety(value) {
            const data = areaData[value];
            if (!data) return;
            document.getElementById('areaScore').textContent = data.score;
            document.getElementById('areaLabel').textContent = data.name;

            const badge = document.getElementById('areaBadge');
            badge.textContent = data.badge;
            badge.className = `text-[10px] px-2 py-0.5 rounded-full font-medium`;

            const resultDiv = document.getElementById('areaSafetyResult');
            const scoreCircle = resultDiv.querySelector('.w-10');

            if (data.badgeColor === 'green') {
                badge.classList.add('bg-green-400/20', 'text-green-400');
                scoreCircle.className = 'w-10 h-10 rounded-full border-2 border-green-400 flex items-center justify-center';
                document.getElementById('areaScore').className = 'text-xs font-bold text-green-400';
            } else if (data.badgeColor === 'yellow') {
                badge.classList.add('bg-yellow-400/20', 'text-yellow-400');
                scoreCircle.className = 'w-10 h-10 rounded-full border-2 border-yellow-400 flex items-center justify-center';
                document.getElementById('areaScore').className = 'text-xs font-bold text-yellow-400';
            } else {
                badge.classList.add('bg-red-400/20', 'text-red-400');
                scoreCircle.className = 'w-10 h-10 rounded-full border-2 border-red-400 flex items-center justify-center';
                document.getElementById('areaScore').className = 'text-xs font-bold text-red-400';
            }
        }

        // ===== SEARCH =====
        function handleSearch(value) {
            const dropdown = document.getElementById('searchResults');
            if (!value.trim()) { dropdown.classList.add('hidden'); return; }
            const results = searchAreas.filter(a => a.name.toLowerCase().includes(value.toLowerCase()));
            if (results.length === 0) {
                dropdown.innerHTML = '<div class="p-3 text-xs text-gray-400">No areas found</div>';
            } else {
                dropdown.innerHTML = results.map(r => `
                    <div class="p-2.5 hover:bg-white/5 cursor-pointer flex items-center gap-2 transition-colors" onmousedown="goToArea(${r.lat}, ${r.lng}, '${r.name}')">
                        <i class="fa-solid fa-location-dot text-electric text-xs"></i>
                        <span class="text-xs text-gray-200">${r.name}</span>
                    </div>
                `).join('');
            }
            dropdown.classList.remove('hidden');
        }

        function showSearchResults() {
            const val = document.getElementById('searchInput').value;
            if (val.trim()) handleSearch(val);
        }

        function hideSearchResults() {
            document.getElementById('searchResults').classList.add('hidden');
        }

        function goToArea(lat, lng, name) {
            map.flyTo([lat, lng], 15, { duration: 1.2 });
            document.getElementById('searchInput').value = name;
            hideSearchResults();
        }

        // ===== MY LOCATION =====
        let userMarker = null;
        function getMyLocation() {
            const btn = document.getElementById('myLocationBtn');
            const icon = document.getElementById('locationIcon');

            if (!navigator.geolocation) {
                alert('Geolocation is not supported by your browser');
                return;
            }

            icon.className = 'fa-solid fa-spinner spinner';
            btn.classList.add('animate-pulse');

            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    if (userMarker) map.removeLayer(userMarker);

                    const userIcon = L.divIcon({
                        className: '',
                        iconSize: [20, 20],
                        iconAnchor: [10, 10],
                        html: `<div style="position:relative;width:20px;height:20px;">
                            <div class="user-marker-pulse"></div>
                            <div style="position:absolute;top:3px;left:3px;width:14px;height:14px;border-radius:50%;background:#1A73E8;border:3px solid white;box-shadow:0 0 12px #1A73E888;"></div>
                        </div>`
                    });

                    userMarker = L.marker([lat, lng], { icon: userIcon }).addTo(map);
                    userMarker.bindPopup('<div style="padding:8px;font-size:12px;color:#E2E8F0;"><i class="fa-solid fa-location-crosshairs text-electric mr-1"></i> Your Location</div>');
                    map.flyTo([lat, lng], 15, { duration: 1.5 });

                    icon.className = 'fa-solid fa-crosshairs';
                    btn.classList.remove('animate-pulse');
                    btn.classList.add('bg-green-500/20', 'text-green-400');
                    setTimeout(() => { btn.classList.remove('bg-green-500/20', 'text-green-400'); }, 2000);
                },
                (error) => {
                    icon.className = 'fa-solid fa-crosshairs';
                    btn.classList.remove('animate-pulse');
                    // Fallback: center on Karachi with a note
                    map.flyTo([24.8607, 67.0011], 13, { duration: 1 });
                },
                { enableHighAccuracy: true, timeout: 10000 }
            );
        }

        // ===== GAUGE ANIMATION =====
        function animateGauge(elementId, scoreId, targetScore, duration = 1500) {
            const gauge = document.getElementById(elementId);
            const scoreEl = document.getElementById(scoreId);
            const startTime = performance.now();

            function update(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3); // ease out cubic
                const currentScore = Math.round(targetScore * eased);
                const deg = (currentScore / 100) * 360;

                let color = '#10B981';
                if (currentScore < 40) color = '#EF4444';
                else if (currentScore < 65) color = '#EAB308';

                gauge.style.background = `conic-gradient(${color} ${deg}deg, #1A2040 ${deg}deg)`;
                scoreEl.textContent = currentScore;

                if (progress < 1) requestAnimationFrame(update);
            }
            requestAnimationFrame(update);
        }

        // ===== CHART =====
        function initChart() {
            const ctx = document.getElementById('peakChart').getContext('2d');
            const hours = Array.from({ length: 24 }, (_, i) => i);
            const data = [2, 1, 1, 0, 1, 3, 8, 18, 24, 15, 9, 7, 6, 5, 7, 8, 10, 14, 22, 26, 20, 12, 6, 3];
            const barColors = data.map((v, i) => {
                if ((i >= 8 && i <= 10) || (i >= 19 && i <= 21)) return '#EF4444';
                return '#1A73E8';
            });

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: hours,
                    datasets: [{
                        data: data,
                        backgroundColor: barColors,
                        borderRadius: 3,
                        barPercentage: 0.7,
                        categoryPercentage: 0.85
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#111836',
                            titleColor: '#E2E8F0',
                            bodyColor: '#94A3B8',
                            borderColor: 'rgba(26,115,232,0.3)',
                            borderWidth: 1,
                            cornerRadius: 8,
                            padding: 10,
                            callbacks: {
                                title: (items) => `${items[0].label}:00 hours`,
                                label: (item) => `${item.raw} incidents`
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { color: 'rgba(255,255,255,0.04)', drawBorder: false },
                            ticks: {
                                color: '#64748B', font: { size: 9 },
                                callback: (val, idx) => idx % 3 === 0 ? `${idx}h` : ''
                            }
                        },
                        y: {
                            grid: { color: 'rgba(255,255,255,0.04)', drawBorder: false },
                            ticks: { color: '#64748B', font: { size: 9 }, stepSize: 5 },
                            beginAtZero: true
                        }
                    },
                    animation: { duration: 1200, easing: 'easeOutQuart' }
                }
            });
        }

        // ===== ACTIVITY FEED =====
        function initActivityFeed() {
            const feed = document.getElementById('activityFeed');
            const priorityColors = { 'High': 'bg-red-400/20 text-red-400', 'Medium': 'bg-yellow-400/20 text-yellow-400', 'Low': 'bg-green-400/20 text-green-400' };

            feed.innerHTML = activityItems.map((item, idx) => `
                <div class="activity-item flex items-start gap-3 p-2.5 rounded-xl cursor-pointer border-l-2" style="border-color:${item.color};animation: feedSlideIn 0.4s ease ${idx * 0.1}s both;" onclick="filterByType('${item.type}')">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0" style="background:${item.color}22;">
                        <i class="fa-solid ${item.icon} text-xs" style="color:${item.color};"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-xs text-white truncate">${item.desc}</div>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-[10px] text-gray-400">${item.area}</span>
                            <span class="text-[10px] text-gray-500">·</span>
                            <span class="text-[10px] text-gray-400">${item.time}</span>
                            <span class="${priorityColors[item.priority]} text-[9px] px-1.5 py-0.5 rounded-full font-medium">${item.priority}</span>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function filterByType(type) {
            const chip = document.querySelector(`.filter-chip[data-filter="${type}"]`);
            if (chip) {
                toggleFilter(type, chip);
                chip.scrollIntoView({ behavior: 'smooth', inline: 'center' });
            }
        }

        // ===== MOBILE DRAWER =====
        let drawerExpanded = false;
        function toggleMobileDrawer() {
            const drawer = document.getElementById('mobileDrawer');
            drawerExpanded = !drawerExpanded;
            drawer.classList.toggle('collapsed', !drawerExpanded);
            drawer.classList.toggle('expanded', drawerExpanded);
        }

        function updateMobilePanel(detailHTML) {
            const mobileContent = document.getElementById('mobilePanelContent');
            if (detailHTML) {
                mobileContent.innerHTML = `
                    <button onclick="showOverview()" class="flex items-center gap-2 text-sm text-electric hover:text-cyan transition-colors mb-4">
                        <i class="fa-solid fa-arrow-left"></i> All Areas
                    </button>
                    ${detailHTML}
                `;
            } else {
                cloneDesktopPanel();
            }
        }

        function cloneDesktopPanel() {
            const mobileContent = document.getElementById('mobilePanelContent');
            mobileContent.innerHTML = `
                <div class="space-y-5">
                    <div>
                        <h2 class="font-poppins font-bold text-xl text-white">City Safety Overview</h2>
                        <p class="text-xs text-gray-400 mt-1">Real-time safety monitoring for Karachi</p>
                    </div>
                    <div class="glass rounded-2xl p-5 flex flex-col items-center">
                        <div class="relative w-32 h-32">
                            <div id="mobileGauge" class="gauge-circle w-32 h-32" style="background: conic-gradient(#EAB308 0deg, #1A2040 0deg);"></div>
                            <div class="absolute inset-3 rounded-full bg-navyLight flex flex-col items-center justify-center">
                                <span class="font-poppins font-bold text-2xl text-white" id="mobileGaugeScore">0</span>
                                <span class="text-[9px] text-gray-400">out of 100</span>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-yellow-400"></span>
                            <span class="text-sm font-semibold text-yellow-400">Moderate Safety</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="stat-card glass rounded-xl p-3 text-center">
                            <div class="text-lg font-poppins font-bold text-white">247</div>
                            <div class="text-[10px] text-gray-400">Total Reports</div>
                        </div>
                        <div class="stat-card glass rounded-xl p-3 text-center">
                            <div class="text-lg font-poppins font-bold text-red-400">47</div>
                            <div class="text-[10px] text-gray-400">Active Cases</div>
                        </div>
                        <div class="stat-card glass rounded-xl p-3 text-center">
                            <div class="text-lg font-poppins font-bold text-green-400">189</div>
                            <div class="text-[10px] text-gray-400">Resolved</div>
                        </div>
                        <div class="stat-card glass rounded-xl p-3 text-center">
                            <div class="text-lg font-poppins font-bold text-orange-400">8</div>
                            <div class="text-[10px] text-gray-400">Danger Zones</div>
                        </div>
                    </div>
                    <div class="glass rounded-2xl p-4">
                        <h3 class="font-poppins font-semibold text-sm text-white mb-3">Your Area Safety</h3>
                        <select onchange="updateAreaSafety(this.value)" class="w-full bg-navyMid text-gray-200 text-sm rounded-xl px-3 py-2 border border-white/10 focus:outline-none">
                            <option value="gulshan">Gulshan-e-Iqbal</option>
                            <option value="dha">DHA</option>
                            <option value="saddar">Saddar</option>
                            <option value="clifton">Clifton</option>
                            <option value="northkarachi">North Karachi</option>
                        </select>
                    </div>
                </div>
            `;
            setTimeout(() => animateGauge('mobileGauge', 'mobileGaugeScore', 64, 1500), 300);
        }

        // ===== INIT =====
        document.addEventListener('DOMContentLoaded', () => {
            // Init AOS
            AOS.init({ duration: 600, once: true });

            // Animate gauge
            setTimeout(() => animateGauge('mainGauge', 'gaugeScore', 64, 1500), 800);

            // Init chart
            setTimeout(initChart, 600);

            // Init activity feed
            setTimeout(initActivityFeed, 400);

            // Mobile panel init
            if (window.innerWidth < 1024) {
                cloneDesktopPanel();
            }

            // Resize handler
            window.addEventListener('resize', () => {
                map.invalidateSize();
            });

            // Fix map size after animations
            setTimeout(() => map.invalidateSize(), 1000);
        });
    </script>
</body>
</html>
```