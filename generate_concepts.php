<?php

$dir = __DIR__ . '/public/concepts';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Common mockup data
$artworks = [
    ['title' => 'Neon Dreams', 'category' => 'Digitale Kunst', 'img' => 'https://images.unsplash.com/photo-1550684848-fac1c5b4e853?w=800&q=80', 'price' => '€450'],
    ['title' => 'Abstract Echo', 'category' => 'Schilderij', 'img' => 'https://images.unsplash.com/photo-1541961017774-22349e4a1262?w=800&q=80', 'price' => '€890'],
    ['title' => 'Silent Flow', 'category' => 'Fotografie', 'img' => 'https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?w=800&q=80', 'price' => '€320'],
];

$layouts = [];

// 1. Neo-Brutalism
$layouts['1-neo-brutalism'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Neo-Brutalism Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #fdf0d5; font-family: 'Courier New', Courier, monospace; }
        .brutal-border { border: 4px solid #000; box-shadow: 8px 8px 0px #000; }
        .brutal-btn { background-color: #ff006e; border: 4px solid #000; box-shadow: 4px 4px 0px #000; transition: transform 0.1s, box-shadow 0.1s; text-transform: uppercase; font-weight: bold; }
        .brutal-btn:active { transform: translate(4px, 4px); box-shadow: 0px 0px 0px #000; }
    </style>
</head>
<body class="p-8">
    <nav class="flex justify-between items-center mb-16 brutal-border bg-white p-6">
        <h1 class="text-4xl font-black uppercase tracking-tighter">KAITHY.ART</h1>
        <div class="space-x-4">
            <a href="#" class="font-bold border-b-4 border-black pb-1 hover:bg-yellow-300">Werk</a>
            <a href="#" class="font-bold border-b-4 border-black pb-1 hover:bg-blue-300">Over</a>
        </div>
    </nav>
    <main>
        <div class="brutal-border bg-yellow-300 p-12 mb-16 relative overflow-hidden">
            <h2 class="text-6xl font-black uppercase mb-6 relative z-10">Kunst die<br>breekt met regels.</h2>
            <p class="text-xl font-bold max-w-lg relative z-10">Ontdek de brute, onversneden expressie van moderne vormen en kleuren.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
HTML;
foreach($artworks as $art) {
    $layouts['1-neo-brutalism'] .= <<<HTML
            <article class="brutal-border bg-white group">
                <img src="{$art['img']}" class="w-full h-64 object-cover border-b-4 border-black filter contrast-125 grayscale hover:grayscale-0 transition-all">
                <div class="p-6">
                    <span class="bg-blue-300 text-black px-2 py-1 font-bold text-sm border-2 border-black">{$art['category']}</span>
                    <h3 class="text-2xl font-black uppercase mt-4 mb-2">{$art['title']}</h3>
                    <div class="flex justify-between items-center mt-6">
                        <span class="text-xl font-bold">{$art['price']}</span>
                        <button class="brutal-btn px-4 py-2 text-white">Koop</button>
                    </div>
                </div>
            </article>
HTML;
}
$layouts['1-neo-brutalism'] .= <<<HTML
        </div>
    </main>
</body>
</html>
HTML;

// 2. Glassmorphism
$layouts['2-glassmorphism'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Glassmorphism Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            background: linear-gradient(45deg, #ff9a9e 0%, #fecfef 99%, #fecfef 100%);
            min-height: 100vh; font-family: 'Inter', sans-serif;
            background-attachment: fixed;
        }
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }
        .blob { position: absolute; filter: blur(60px); z-index: -1; opacity: 0.6; }
    </style>
</head>
<body class="p-4 md:p-12 relative overflow-x-hidden">
    <div class="blob bg-purple-500 w-96 h-96 rounded-full top-0 left-0"></div>
    <div class="blob bg-blue-500 w-96 h-96 rounded-full bottom-0 right-0"></div>
    
    <nav class="glass rounded-full px-8 py-4 mb-16 flex justify-between items-center text-white mix-blend-difference">
        <h1 class="text-2xl font-light tracking-widest">Kaithy</h1>
        <div class="space-x-8 text-sm uppercase tracking-widest">
            <a href="#" class="hover:opacity-70 transition-opacity">Portfolio</a>
            <a href="#" class="hover:opacity-70 transition-opacity">Contact</a>
        </div>
    </nav>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
HTML;
foreach($artworks as $art) {
    $layouts['2-glassmorphism'] .= <<<HTML
        <article class="glass rounded-3xl p-4 transition-transform hover:-translate-y-2 duration-300 cursor-pointer">
            <img src="{$art['img']}" class="w-full h-80 object-cover rounded-2xl mb-6 shadow-inner">
            <div class="px-2 pb-2 text-gray-800">
                <span class="text-xs uppercase tracking-widest opacity-60">{$art['category']}</span>
                <h3 class="text-xl font-medium mt-1 mb-4">{$art['title']}</h3>
                <div class="flex justify-between items-center border-t border-white/30 pt-4">
                    <span class="font-light">{$art['price']}</span>
                    <button class="bg-white/50 hover:bg-white/80 transition-colors px-6 py-2 rounded-full text-sm backdrop-blur-md">Bekijk</button>
                </div>
            </div>
        </article>
HTML;
}
$layouts['2-glassmorphism'] .= <<<HTML
    </div>
</body>
</html>
HTML;


// 3. Cyberpunk Dark
$layouts['3-cyberpunk'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Cyberpunk Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #0b0c10; color: #66fcf1; font-family: 'Rajdhani', sans-serif; }
        .neon-border { border: 1px solid #66fcf1; box-shadow: 0 0 10px rgba(102, 252, 241, 0.4), inset 0 0 10px rgba(102, 252, 241, 0.2); }
        .neon-text { text-shadow: 0 0 8px rgba(102, 252, 241, 0.8); }
        .btn-glitch { position: relative; overflow: hidden; }
        .btn-glitch:hover::before { content: ''; position: absolute; top:0; left:-100%; width:100%; height:100%; background: rgba(102, 252, 241, 0.3); transform: skewX(-45deg); animation: glitch-slide 0.3s forwards; }
        @keyframes glitch-slide { 100% { left: 200%; } }
        .scanlines { position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,0) 50%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.1)); background-size: 100% 4px; pointer-events: none; z-index: 50; }
    </style>
</head>
<body class="p-8">
    <div class="scanlines"></div>
    <header class="flex justify-between items-end mb-16 border-b border-[#1f2833] pb-4 relative z-10">
        <div>
            <span class="text-xs text-[#45a29e] tracking-[0.3em] font-bold">SYSTEM.ONLINE //</span>
            <h1 class="text-5xl font-bold neon-text uppercase mt-2">K41THY_<span class="text-[#c5c6c7]">ARCHIVE</span></h1>
        </div>
        <nav class="space-x-8 text-sm tracking-widest font-semibold">
            <a href="#" class="hover:text-white transition-colors">[ GALERIJ ]</a>
            <a href="#" class="hover:text-white transition-colors text-[#45a29e]">[ DATABANK ]</a>
        </nav>
    </header>
    <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
HTML;
foreach($artworks as $art) {
    $layouts['3-cyberpunk'] .= <<<HTML
        <article class="neon-border bg-[#1f2833] p-1 flex flex-col group cursor-pointer relative">
            <div class="absolute inset-0 bg-[#66fcf1] opacity-0 group-hover:opacity-10 transition-opacity pointer-events-none"></div>
            <img src="{$art['img']}" class="w-full h-64 object-cover filter contrast-150 saturate-50 sepia-[.3] hue-rotate-[180deg]">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-2xl font-bold uppercase tracking-wider text-white">{$art['title']}</h3>
                    <span class="text-xs border border-[#45a29e] px-2 py-1 text-[#45a29e]">{$art['category']}</span>
                </div>
                <div class="flex justify-between items-center mt-8">
                    <span class="text-xl font-semibold">{$art['price']}</span>
                    <button class="btn-glitch bg-transparent border border-[#66fcf1] text-[#66fcf1] hover:bg-[#66fcf1] hover:text-[#0b0c10] px-6 py-2 uppercase tracking-widest font-bold text-sm transition-colors">AQUIRE_</button>
                </div>
            </div>
        </article>
HTML;
}
$layouts['3-cyberpunk'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 4. Minimalist Zen (Editorial)
$layouts['4-minimalist'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Minimalist Zen Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body { background-color: #faf9f6; color: #2c2c2c; font-family: 'Lato', sans-serif; }
        h1, h2, h3, .serif { font-family: 'Playfair Display', serif; }
        .fade-in-up { animation: fadeInUp 1.2s cubic-bezier(0.19, 1, 0.22, 1) forwards; opacity: 0; transform: translateY(30px); }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        .art-hover img { transition: transform 0.8s ease; }
        .art-hover:hover img { transform: scale(1.05); }
    </style>
</head>
<body class="p-6 md:p-24 max-w-7xl mx-auto">
    <header class="flex flex-col items-center mb-24 fade-in-up text-center">
        <h1 class="text-6xl md:text-8xl font-normal tracking-tight mb-8">Kaithy</h1>
        <nav class="flex space-x-12 text-sm uppercase tracking-[0.2em] text-gray-400">
            <a href="#" class="text-black border-b border-black pb-1">Exhibition</a>
            <a href="#" class="hover:text-black transition-colors">Studio</a>
            <a href="#" class="hover:text-black transition-colors">Contact</a>
        </nav>
    </header>
    <main class="grid grid-cols-1 md:grid-cols-2 gap-x-24 gap-y-32">
HTML;
foreach($artworks as $index => $art) {
    $delay = ($index * 0.2) . 's';
    $mt = $index % 2 != 0 ? 'md:mt-32' : '';
    $layouts['4-minimalist'] .= <<<HTML
        <article class="fade-in-up art-hover group cursor-pointer {$mt}" style="animation-delay: {$delay};">
            <div class="overflow-hidden mb-8">
                <img src="{$art['img']}" class="w-full h-[32rem] object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
            </div>
            <div class="flex justify-between items-baseline">
                <div>
                    <h3 class="serif text-3xl mb-2">{$art['title']}</h3>
                    <p class="text-sm text-gray-400 tracking-widest uppercase">{$art['category']}</p>
                </div>
                <span class="serif text-xl italic text-gray-500">{$art['price']}</span>
            </div>
        </article>
HTML;
}
$layouts['4-minimalist'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 5. Bauhaus Style
$layouts['5-bauhaus'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Bauhaus Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f4f4f4; color: #1a1a1a; font-family: 'Space Grotesk', sans-serif; }
        .b-red { background-color: #e03a3e; }
        .b-blue { background-color: #0d5c9c; }
        .b-yellow { background-color: #f7b11c; }
        .b-black { background-color: #1a1a1a; }
        .bauhaus-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1rem; }
    </style>
</head>
<body class="p-8 md:p-16">
    <div class="bauhaus-grid mb-16">
        <div class="col-span-12 md:col-span-4 b-red h-8"></div>
        <div class="col-span-12 md:col-span-3 b-yellow h-8"></div>
        <div class="col-span-12 md:col-span-5 b-blue h-8"></div>
    </div>
    <header class="bauhaus-grid mb-24 items-end">
        <h1 class="col-span-12 md:col-span-8 text-7xl md:text-9xl font-bold uppercase tracking-tighter leading-none">KAITHY<br>ART.</h1>
        <nav class="col-span-12 md:col-span-4 flex flex-col space-y-4 text-2xl font-bold uppercase mt-8 md:mt-0">
            <a href="#" class="border-b-4 border-[#1a1a1a] pb-1 hover:text-[#e03a3e] hover:border-[#e03a3e] w-fit">Collectie</a>
            <a href="#" class="pb-1 hover:text-[#0d5c9c] w-fit">Informatie</a>
        </nav>
    </header>
    <main class="bauhaus-grid gap-y-16">
HTML;
foreach($artworks as $index => $art) {
    $colors = ['b-red', 'b-blue', 'b-yellow'];
    $rectColor = $colors[$index % 3];
    $span = $index === 0 ? 'col-span-12 md:col-span-8' : 'col-span-12 md:col-span-4';
    $imgH = $index === 0 ? 'h-[32rem]' : 'h-80';
    $layouts['5-bauhaus'] .= <<<HTML
        <article class="{$span} relative group">
            <div class="absolute -top-4 -left-4 w-24 h-24 {$rectColor} rounded-full z-0 mix-blend-multiply transition-transform group-hover:scale-150 duration-500"></div>
            <img src="{$art['img']}" class="w-full {$imgH} object-cover relative z-10 grayscale hover:grayscale-0 transition-all duration-300 shadow-2xl">
            <div class="mt-6">
                <span class="text-xs font-bold uppercase tracking-widest border-2 border-[#1a1a1a] px-2 py-1">{$art['category']}</span>
                <h3 class="text-3xl font-bold uppercase mt-4">{$art['title']}</h3>
                <div class="h-1 w-12 b-black mt-4 mb-4"></div>
                <p class="font-bold text-xl">{$art['price']}</p>
            </div>
        </article>
HTML;
}
$layouts['5-bauhaus'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 6. Playful / Doodle Bubble
$layouts['6-playful'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Playful Doodle Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f0f8ff; font-family: 'Quicksand', sans-serif; color: #4a4a4a; }
        h1, h2, h3, .fun-font { font-family: 'Fredoka One', cursive; font-weight: normal; }
        .blob-border { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; border: 4px solid #ff6b6b; }
        .wavy-hover { transition: all 0.3s; }
        .wavy-hover:hover { border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; transform: rotate(-2deg) scale(1.02); }
        .bg-dots { background-image: radial-gradient(#cbd5e1 2px, transparent 2px); background-size: 30px 30px; }
    </style>
</head>
<body class="bg-dots min-h-screen p-8 md:p-12">
    <nav class="flex justify-between items-center mb-16 bg-white p-6 rounded-full shadow-lg border-4 border-[#4ecdc4]">
        <h1 class="text-3xl fun-font text-[#ff6b6b] tracking-wider">Kaithy's Art! 🎨</h1>
        <div class="space-x-6">
            <a href="#" class="font-bold text-[#4ecdc4] hover:text-[#ff6b6b] transition-colors text-lg">Mijn Werk</a>
            <a href="#" class="font-bold text-gray-500 hover:text-[#ff6b6b] transition-colors text-lg">Zeg Hallo</a>
        </div>
    </nav>
    <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
HTML;
foreach($artworks as $index => $art) {
    $colors = ['#ff6b6b', '#4ecdc4', '#ffe66d'];
    $borderColor = $colors[$index % 3];
    $layouts['6-playful'] .= <<<HTML
        <article class="bg-white p-6 rounded-[2rem] shadow-xl wavy-hover cursor-pointer" style="border: 4px solid {$borderColor};">
            <div class="overflow-hidden blob-border aspect-square mb-6">
                <img src="{$art['img']}" class="w-full h-full object-cover">
            </div>
            <div class="text-center">
                <span class="inline-block bg-gray-100 text-gray-600 rounded-full px-4 py-1 text-sm font-bold mb-3 lowercase shadow-sm">#{$art['category']}</span>
                <h3 class="text-2xl fun-font text-gray-800 mb-2">{$art['title']}</h3>
                <p class="text-xl font-bold text-[#ff6b6b]">{$art['price']}</p>
                <button class="mt-6 w-full py-3 bg-[#f7fff7] border-2 border-[{$borderColor}] text-[{$borderColor}] rounded-xl font-bold hover:bg-[{$borderColor}] hover:text-white transition-colors">Bekijken ✨</button>
            </div>
        </article>
HTML;
}
$layouts['6-playful'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 7. Y2K Web Nostalgia
$layouts['7-y2k'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Y2K Nostalgia Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=VT323&display=swap');
        body { 
            background: url('https://www.transparenttextures.com/patterns/stardust.png'), linear-gradient(135deg, #00C9FF 0%, #92FE9D 100%);
            font-family: 'Verdana', sans-serif; color: #fff; min-height: 100vh;
        }
        h1, .pixel-font { font-family: 'VT323', monospace; }
        .y2k-window { 
            background: silver; color: black; border: 2px solid; 
            border-top-color: white; border-left-color: white; border-right-color: gray; border-bottom-color: gray;
        }
        .y2k-titlebar { 
            background: linear-gradient(to right, #000080, #1084d0); color: white; padding: 2px 4px; font-weight: bold; font-size: 14px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .y2k-btn {
            background: silver; border: 2px solid; border-top-color: white; border-left-color: white; border-right-color: gray; border-bottom-color: gray;
            padding: 2px 8px; font-size: 12px; cursor: pointer; color: black;
        }
        .y2k-btn:active { border-top-color: gray; border-left-color: gray; border-right-color: white; border-bottom-color: white; }
    </style>
</head>
<body class="p-4 md:p-8">
    <div class="y2k-window max-w-5xl mx-auto mb-8">
        <div class="y2k-titlebar">
            <span>Welcome_To_KAITHY.exe</span>
            <div class="space-x-1 flex">
                <div class="y2k-btn px-2">_</div>
                <div class="y2k-btn px-2">X</div>
            </div>
        </div>
        <div class="p-4 text-center bg-[url('https://www.transparenttextures.com/patterns/grid-me.png')] bg-[#fff]">
            <h1 class="pixel-font text-6xl text-fuchsia-600 mb-2 drop-shadow-[2px_2px_0_aqua]">~ KAITHY'S CYBER GALLERY ~</h1>
            <marquee class="pixel-font text-xl text-blue-800 bg-yellow-200 border border-black p-1">>>> LATEST ARTWORKS UPLOADED! WELCOME TO THE YEAR 2000! <<<</marquee>
        </div>
        <div class="bg-gray-200 p-2 flex gap-4 border-t-2 border-white">
            <button class="y2k-btn font-bold flex items-center gap-2"><img src="https://win98icons.alexmeub.com/icons/png/directory_open_file_mydocs-4.png" width="16"> GALLERY.HTML</button>
            <button class="y2k-btn flex items-center gap-2"><img src="https://win98icons.alexmeub.com/icons/png/address_book_user-0.png" width="16"> GUESTBOOK.HTM</button>
        </div>
    </div>

    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
HTML;
foreach($artworks as $index => $art) {
    $layouts['7-y2k'] .= <<<HTML
        <div class="y2k-window">
            <div class="y2k-titlebar">
                <span>ART_{$index}.JPG</span>
            </div>
            <div class="p-2 bg-gray-100 h-full flex flex-col">
                <img src="{$art['img']}" class="w-full h-48 object-cover border-2 border-inset border-gray-400 mb-2">
                <div class="text-sm">
                    <p><b>Title:</b> {$art['title']}</p>
                    <p><b>Type:</b> {$art['category']}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="pixel-font text-2xl text-green-700">{$art['price']}</span>
                        <button class="y2k-btn">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </div>
HTML;
}
$layouts['7-y2k'] .= <<<HTML
    </div>
</body>
</html>
HTML;


// 8. Soft Neumorphism
$layouts['8-neumorphism'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Neumorphism Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { background-color: #e0e5ec; color: #6b7c93; font-family: 'Nunito', sans-serif; }
        .nm-flat { background: #e0e5ec; box-shadow: 9px 9px 16px rgb(163,177,198,0.6), -9px -9px 16px rgba(255,255,255, 0.5); border-radius: 20px; }
        .nm-pressed { background: #e0e5ec; box-shadow: inset 6px 6px 10px 0 rgba(163,177,198, 0.7), inset -6px -6px 10px 0 rgba(255,255,255, 0.8); border-radius: 20px; }
        .nm-flat:hover { box-shadow: 12px 12px 20px rgb(163,177,198,0.7), -12px -12px 20px rgba(255,255,255, 0.6); transform: translateY(-2px); transition: all 0.3s; }
        .img-frame { border: 8px solid #e0e5ec; border-radius: 16px; box-shadow: 5px 5px 10px rgb(163,177,198,0.5), -5px -5px 10px rgba(255,255,255, 0.5); }
    </style>
</head>
<body class="p-8 md:p-16 min-h-screen">
    <header class="nm-flat flex justify-between items-center px-10 py-6 mb-16 mx-auto max-w-6xl">
        <h1 class="text-3xl font-extrabold text-[#4a5568] tracking-wider">KAITHY</h1>
        <div class="space-x-4">
            <button class="nm-pressed px-6 py-2 text-[#4a5568] font-semibold text-sm">Portfolio</button>
            <button class="nm-flat px-6 py-2 hover:text-[#4a5568] transition-colors text-sm font-semibold">Contact</button>
        </div>
    </header>
    <main class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
HTML;
foreach($artworks as $art) {
    $layouts['8-neumorphism'] .= <<<HTML
        <article class="nm-flat p-6 cursor-pointer">
            <div class="mb-6 relative overflow-hidden rounded-xl img-frame">
                <img src="{$art['img']}" class="w-full h-64 object-cover transform hover:scale-110 transition-transform duration-700">
            </div>
            <div class="text-center">
                <h3 class="text-xl font-bold text-[#4a5568] mb-1">{$art['title']}</h3>
                <p class="text-sm font-semibold opacity-70 mb-6 uppercase tracking-widest">{$art['category']}</p>
                <div class="flex justify-between items-center px-2">
                    <span class="font-extrabold text-[#4a5568] text-lg">{$art['price']}</span>
                    <button class="nm-flat w-10 h-10 flex items-center justify-center rounded-full text-[#4a5568] font-bold text-xl hover:text-blue-500 transition-colors">+</button>
                </div>
            </div>
        </article>
HTML;
}
$layouts['8-neumorphism'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 9. Strict Monospace (Terminal/Coding style)
$layouts['9-terminal'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Terminal Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #121212; color: #a9b7c6; font-family: 'Consolas', 'Monaco', monospace; }
        .keyword { color: #cc7832; }
        .string { color: #6a8759; }
        .func { color: #ffc66d; }
        .comment { color: #808080; }
        .selection:hover { background-color: #214283; cursor: pointer; }
    </style>
</head>
<body class="p-8 max-w-4xl mx-auto text-sm md:text-base selection:bg-[#214283]">
    <div class="mb-8">
        <span class="comment">/**</span><br>
        <span class="comment">&nbsp;* Welcome to KAITHY.ART Repository</span><br>
        <span class="comment">&nbsp;* @author Kaithy</span><br>
        <span class="comment">&nbsp;* @version 2.0.0</span><br>
        <span class="comment">&nbsp;*/</span><br>
    </div>
    <div class="mb-8">
        <span class="keyword">import</span> { <span class="func">gallery</span> } <span class="keyword">from</span> <span class="string">'./portfolio'</span>;<br>
        <span class="keyword">const</span> artworks = <span class="keyword">await</span> <span class="func">gallery</span>.fetch();<br>
        console.log(artworks);
    </div>
    
    <div>[</div>
HTML;
foreach($artworks as $index => $art) {
    $comma = $index < count($artworks)-1 ? ',' : '';
    $layouts['9-terminal'] .= <<<HTML
    <div class="pl-8 selection py-4 border-l border-[#3a3a3a] ml-4 hover:border-[#cc7832] transition-colors relative group">
        <div class="hidden group-hover:block absolute right-0 top-4 z-10 p-2 bg-[#2b2b2b] border border-[#3a3a3a] shadow-xl rounded">
            <img src="{$art['img']}" class="w-48 h-auto object-cover">
        </div>
        {<br>
        &nbsp;&nbsp;<span class="string">"id"</span>: <span class="func">{$index}</span>,<br>
        &nbsp;&nbsp;<span class="string">"title"</span>: <span class="string">"{$art['title']}"</span>,<br>
        &nbsp;&nbsp;<span class="string">"category"</span>: <span class="string">"{$art['category']}"</span>,<br>
        &nbsp;&nbsp;<span class="string">"price"</span>: <span class="string">"{$art['price']}"</span>,<br>
        &nbsp;&nbsp;<span class="string">"action"</span>: <a href="#" class="keyword hover:underline">checkout_item()</a><br>
        }{$comma}
    </div>
HTML;
}
$layouts['9-terminal'] .= <<<HTML
    ]<br>
    <div class="mt-8 animate-pulse">_</div>
</body>
</html>
HTML;


// 10. High-Fashion Editorial
$layouts['10-editorial'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>High-Fashion Editorial Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400;0,6..96,700;1,6..96,400&family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fff; color: #111; font-family: 'Montserrat', sans-serif; }
        .title-font { font-family: 'Bodoni Moda', serif; }
        .grid-editorial { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1rem; }
    </style>
</head>
<body class="border-8 border-black min-h-screen m-4">
    <header class="p-8 md:p-12 pb-0 flex justify-between items-start">
        <nav class="flex space-x-6 text-xs uppercase tracking-[0.3em] font-medium">
            <a href="#" class="border-b border-black pb-1">Exhibition</a>
            <a href="#" class="text-gray-400 hover:text-black transition-colors">Archive</a>
        </nav>
        <div class="text-right text-xs uppercase tracking-[0.2em] font-light text-gray-500">
            Issue N° 01<br>2026
        </div>
    </header>
    
    <div class="text-center my-16 md:my-32 px-4">
        <h1 class="title-font text-6xl md:text-[9rem] leading-none uppercase tracking-tighter mix-blend-difference relative z-10">Kaithy</h1>
        <p class="mt-8 text-sm md:text-base uppercase tracking-[0.4em] font-light max-w-2xl mx-auto leading-relaxed">Contemporary Visual Arts & Digital Explorations</p>
    </div>

    <main class="grid-editorial px-4 md:px-12 mb-24">
HTML;

$layouts['10-editorial'] .= <<<HTML
        <!-- Feature -->
        <article class="col-span-12 md:col-span-8 relative mb-16 md:mb-0">
            <img src="{$artworks[0]['img']}" class="w-full h-[70vh] object-cover grayscale">
            <div class="absolute -bottom-8 -right-8 md:bottom-24 md:-right-24 bg-white p-8 border border-gray-100 shadow-2xl z-20 max-w-sm">
                <span class="text-[10px] uppercase tracking-[0.3em] text-gray-400">Featured Work</span>
                <h3 class="title-font text-4xl my-4 italic">{$artworks[0]['title']}</h3>
                <p class="text-xs leading-relaxed text-gray-500 mb-6">A profound exploration of texture and light, challenging the boundaries of traditional contemporary mediums.</p>
                <div class="flex justify-between items-center text-xs uppercase tracking-widest font-medium border-t border-black pt-4">
                    <span>{$artworks[0]['price']}</span>
                    <a href="#" class="hover:italic">Inquire &rarr;</a>
                </div>
            </div>
        </article>
        
        <div class="col-span-12 md:col-span-3 md:col-start-10 flex flex-col justify-end space-y-16 mt-24 md:mt-0">
HTML;
for($i=1; $i<count($artworks); $i++) {
    $layouts['10-editorial'] .= <<<HTML
            <article class="group cursor-pointer">
                <div class="overflow-hidden mb-4">
                    <img src="{$artworks[$i]['img']}" class="w-full h-80 object-cover transform duration-1000 group-hover:scale-105">
                </div>
                <h3 class="title-font text-2xl mb-1">{$artworks[$i]['title']}</h3>
                <div class="flex justify-between text-[10px] uppercase tracking-widest text-gray-500">
                    <span>{$artworks[$i]['category']}</span>
                    <span>{$artworks[$i]['price']}</span>
                </div>
            </article>
HTML;
}

$layouts['10-editorial'] .= <<<HTML
        </div>
    </main>
</body>
</html>
HTML;

// Generate index file
$indexHtml = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Kaithy Design Concepts Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans h-screen flex overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-72 bg-white border-r border-gray-200 h-full flex flex-col z-20 shadow-lg">
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-xl font-bold tracking-tight">Design Explorer</h1>
            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">10 Unique Themes</p>
        </div>
        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-1 px-3" id="nav-list">
                <!-- Links injected via JS -->
            </ul>
        </nav>
        <div class="p-6 bg-gray-50 border-t border-gray-200">
            <a href="/" class="text-sm font-bold text-gray-600 hover:text-black flex items-center gap-2">
                &larr; Terug naar origineel
            </a>
        </div>
    </aside>

    <!-- Content Frame -->
    <main class="flex-1 h-full bg-gray-100 overflow-hidden relative">
        <iframe id="preview-frame" src="1-neo-brutalism.html" class="w-full h-full border-none absolute inset-0 bg-white transition-opacity duration-300"></iframe>
    </main>

    <script>
        const themes = [
            { id: '1-neo-brutalism', name: '1. Neo-Brutalism', desc: 'Luid, zwart omlijnd, felle kleuren' },
            { id: '2-glassmorphism', name: '2. Glassmorphism', desc: 'Wazig glas, zachte verlopen' },
            { id: '3-cyberpunk', name: '3. Cyberpunk', desc: 'Donker, neon, scanlines, glitch' },
            { id: '4-minimalist', name: '4. Minimalist Zen', desc: 'Veel witruimte, rustige serifs' },
            { id: '5-bauhaus', name: '5. Bauhaus', desc: 'Geometrisch, primaire kleuren' },
            { id: '6-playful', name: '6. Playful Doodle', desc: 'Ronde vormen, vrolijke bubbels' },
            { id: '7-y2k', name: '7. Y2K Web', desc: 'Nostalgisch, Windows 98 vibes' },
            { id: '8-neumorphism', name: '8. Soft Neumorphism', desc: 'Zachte schaduwen, extrusie effect' },
            { id: '9-terminal', name: '9. IDE / Terminal', desc: 'Code editor look, monospace' },
            { id: '10-editorial', name: '10. High-Fashion', desc: 'Magazine stijl, gigantische letters' }
        ];

        const list = document.getElementById('nav-list');
        const frame = document.getElementById('preview-frame');

        themes.forEach(theme => {
            const li = document.createElement('li');
            li.innerHTML = `
                <button onclick="loadTheme('\${theme.id}')" id="btn-\${theme.id}" class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors group relative">
                    <div class="font-bold text-gray-800 group-hover:text-black">\${theme.name}</div>
                    <div class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider">\${theme.desc}</div>
                </button>
            `;
            list.appendChild(li);
        });

        function loadTheme(id) {
            frame.style.opacity = '0';
            setTimeout(() => {
                frame.src = id + '.html';
                frame.onload = () => { frame.style.opacity = '1'; }
            }, 200);
            
            // UI Selection update
            document.querySelectorAll('button[id^="btn-"]').forEach(btn => {
                btn.classList.remove('bg-gray-900', 'text-white');
                btn.querySelector('.font-bold').classList.remove('text-white');
            });
            const activeBtn = document.getElementById('btn-' + id);
            activeBtn.classList.add('bg-gray-900');
            activeBtn.querySelector('.font-bold').classList.add('text-white');
        }

        // Init first
        loadTheme(themes[0].id);
    </script>
</body>
</html>
HTML;

file_put_contents(__DIR__ . '/public/concepts/index.html', $indexHtml);
foreach($layouts as $filename => $html) {
    file_put_contents(__DIR__ . "/public/concepts/{$filename}.html", $html);
}

echo "Successfully generated 10 HTML layout concepts in public/concepts!\n";
