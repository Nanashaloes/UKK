<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SijaSpace - Praktik Kerja Lapangan SIJA</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out;
        }
        
        .animate-fade-in {
            animation: fade-in-up 1s ease-out 0.2s;
            animation-fill-mode: both;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .bg-blur-shape {
            filter: blur(60px);
            opacity: 0.4;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-600 via-blue-800 to-blue-950 text-white antialiased overflow-x-hidden">
    <!-- Background Elements -->
    <div class="absolute w-full h-full overflow-hidden z-0 opacity-40">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-400 rounded-full bg-blur-shape"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-300 rounded-full bg-blur-shape"></div>
        <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-blue-500 rounded-full bg-blur-shape"></div>
    </div>

    <!-- Navigation -->
    <nav class="glass-effect px-6 py-4 sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto flex items-center justify-between">
            <a href="/" class="flex items-center space-x-2 group">
                <div class="bg-white rounded-lg p-1.5 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide group-hover:text-blue-300 transition-colors duration-300">
                    Sija<span class="text-blue-300">Space</span>
                </span>
            </a>
            
            <div class="space-x-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="bg-white text-blue-700 hover:bg-blue-50 font-medium px-5 py-2.5 rounded-lg shadow-md transition-all duration-300 flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="border border-white/50 hover:border-white hover:bg-white/10 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-all duration-300">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="bg-white text-blue-700 hover:bg-blue-50 px-5 py-2.5 rounded-lg shadow-md text-sm font-medium transition-all duration-300">
                                Daftar
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="container mx-auto py-16 px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="animate-fade-in-up space-y-6">
                <div class="inline-block px-3 py-1 rounded-full bg-white/10 text-sm font-medium text-blue-100 backdrop-blur-sm border border-white/10 mb-2">
                    PKL Management System
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                    Selamat Datang di <br />
                    <span class="text-5xl md:text-6xl bg-gradient-to-r from-white to-blue-300 bg-clip-text text-transparent">
                        Sija<span class="text-blue-300">Space</span>
                    </span>
                </h1>
                
                <p class="text-blue-100 max-w-xl leading-relaxed text-lg">
                    Platform digital futuristik bagi siswa SIJA untuk memantau dan mengelola 
                    Praktik Kerja Lapangan secara modern dan efisien.
                </p>
                
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('login') }}"
                       class="bg-white hover:bg-blue-50 text-blue-700 px-7 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg shadow-blue-700/20 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Masuk Sekarang
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="border border-white/30 hover:bg-white/10 text-white px-7 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Daftar
                        </a>
                    @endif
                </div>
                
                <div class="flex items-center space-x-6 pt-4">
                    <div class="flex -space-x-2">
                        <div class="w-10 h-10 rounded-full bg-blue-400 border-2 border-white flex items-center justify-center text-xs font-semibold">SI</div>
                        <div class="w-10 h-10 rounded-full bg-blue-500 border-2 border-white flex items-center justify-center text-xs font-semibold">JA</div>
                        <div class="w-10 h-10 rounded-full bg-blue-600 border-2 border-white flex items-center justify-center text-xs font-semibold">PK</div>
                        <div class="w-10 h-10 rounded-full bg-blue-700 border-2 border-white flex items-center justify-center text-xs font-semibold">L</div>
                    </div>
                    <div class="text-sm text-blue-100">
                        <strong>67 SISWA</strong><br>
                        <span class="opacity-80">telah bergabung</span>
                    </div>
                </div>
            </div>
            
            <div class="relative animate-fade-in lg:pl-10">
                <!-- Decorative elements -->
                <div class="absolute -top-10 -right-10 w-36 h-36 bg-blue-300 opacity-20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-blue-400 opacity-20 rounded-full blur-3xl"></div>
                
                <!-- Main image with glass container -->
                <div class="relative z-10 rounded-2xl p-2 glass-effect shadow-xl hidden lg:block">
                    <div class="animate-float">
                        <img src="{{ asset('space.png') }}" alt="SijaSpace Illustration" class="rounded-xl max-w-full h-auto z-10 relative">
                    </div>
                    
                    <!-- Decorative gradient cards -->
                    <div class="absolute -bottom-6 -right-6 glass-effect rounded-lg p-3 shadow-lg max-w-[180px]">
                        <div class="text-xs font-semibold text-blue-200 mb-1">Statistik PKL</div>
                        <div class="flex justify-between items-center">
                            <div class="text-lg font-bold">87%</div>
                            <div class="w-16 h-3 bg-blue-900/50 rounded-full overflow-hidden">
                                <div class="w-[87%] h-full bg-blue-300 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute -top-2 -left-12 glass-effect rounded-lg p-3 shadow-lg transform -rotate-3 max-w-[180px]">
                        <div class="font-semibold text-sm text-blue-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Terverifikasi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="relative z-10 border-t border-white/10 py-8 mt-10">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-sm text-blue-200">&copy; 2025 SijaSpace. Hak Cipta Dilindungi.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-sm text-blue-200 hover:text-white transition-colors">Tentang</a>
                    <a href="#" class="text-sm text-blue-200 hover:text-white transition-colors">Bantuan</a>
                    <a href="#" class="text-sm text-blue-200 hover:text-white transition-colors">Kontak</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
