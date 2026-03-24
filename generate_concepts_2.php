<?php

$dir = __DIR__ . '/public/concepts';

$artworks = [
    ['title' => 'Neon Dreams', 'category' => 'Digitale Kunst', 'img' => 'https://images.unsplash.com/photo-1550684848-fac1c5b4e853?w=800&q=80', 'price' => '€450'],
    ['title' => 'Abstract Echo', 'category' => 'Schilderij', 'img' => 'https://images.unsplash.com/photo-1541961017774-22349e4a1262?w=800&q=80', 'price' => '€890'],
    ['title' => 'Silent Flow', 'category' => 'Fotografie', 'img' => 'https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?w=800&q=80', 'price' => '€320'],
];

$layouts = [];

// 11. Retro 80s Synthwave
$layouts['11-synthwave'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Synthwave Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Outfit:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { background: linear-gradient(180deg, #11001c 0%, #3a0ca3 100%); color: #4cc9f0; font-family: 'Outfit', sans-serif; min-height: 100vh; overflow-x: hidden; }
        .synth-title { font-family: 'Press Start 2P', cursive; color: #f72585; text-shadow: 2px 2px 0px #4cc9f0, -2px -2px 0px #7209b7, 0 0 20px #f72585; }
        .grid-floor { position: fixed; bottom: 0; left: -50%; width: 200%; height: 50vh; background-image: linear-gradient(0deg, transparent 24%, rgba(76, 201, 240, 0.3) 25%, rgba(76, 201, 240, 0.3) 26%, transparent 27%, transparent 74%, rgba(76, 201, 240, 0.3) 75%, rgba(76, 201, 240, 0.3) 76%, transparent 77%, transparent), linear-gradient(90deg, transparent 24%, rgba(76, 201, 240, 0.3) 25%, rgba(76, 201, 240, 0.3) 26%, transparent 27%, transparent 74%, rgba(76, 201, 240, 0.3) 75%, rgba(76, 201, 240, 0.3) 76%, transparent 77%, transparent); background-size: 50px 50px; transform: perspective(300px) rotateX(60deg); z-index: -1; animation: gridMove 2s linear infinite; }
        @keyframes gridMove { from { background-position: 0 0; } to { background-position: 0 50px; } }
        .neon-card { background: rgba(17,0,28,0.8); border: 2px solid #f72585; box-shadow: 0 0 15px rgba(247, 37, 133, 0.5), inset 0 0 15px rgba(247, 37, 133, 0.2); }
        .neon-btn { background: transparent; border: 2px solid #4cc9f0; color: #4cc9f0; box-shadow: 0 0 10px #4cc9f0, inset 0 0 10px #4cc9f0; transition: all 0.3s; }
        .neon-btn:hover { background: #4cc9f0; color: #11001c; box-shadow: 0 0 20px #4cc9f0, inset 0 0 20px #4cc9f0; }
    </style>
</head>
<body class="p-4 md:p-12 relative z-0">
    <div class="grid-floor"></div>
    <header class="text-center mb-16 relative z-10">
        <h1 class="text-3xl md:text-6xl synth-title leading-tight mb-4">KAITHY<br>ONLINE</h1>
        <p class="text-xl tracking-widest text-[#4cc9f0] uppercase font-bold">Aesthetic Data Drive</p>
    </header>
    <main class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10 max-w-6xl mx-auto">
HTML;
foreach($artworks as $art) {
    $layouts['11-synthwave'] .= <<<HTML
        <article class="neon-card p-4 rounded-xl">
            <img src="{$art['img']}" class="w-full h-56 object-cover rounded filter saturate-150 contrast-125 hue-rotate-15">
            <div class="mt-4">
                <span class="text-xs font-bold text-[#b5179e] uppercase tracking-widest">>> {$art['category']}</span>
                <h3 class="text-2xl font-bold mt-2 mb-4 text-[#4cc9f0]">{$art['title']}</h3>
                <div class="flex justify-between items-center border-t border-[#f72585] pt-4 mt-6">
                    <span class="font-bold text-[#f72585]">{$art['price']}</span>
                    <button class="neon-btn px-4 py-2 uppercase tracking-widest text-xs font-bold font-['Press_Start_2P']">BUY</button>
                </div>
            </div>
        </article>
HTML;
}
$layouts['11-synthwave'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 12. Monochromatic Minimal
$layouts['12-monochrome'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Monochromatic Minimal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&family=Work+Sans:wght@300;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #000; color: #fff; font-family: 'Work Sans', sans-serif; }
        .display-font { font-family: 'Syncopate', sans-serif; }
        .mono-img { filter: grayscale(100%) contrast(1.2); transition: filter 0.5s; }
        .group:hover .mono-img { filter: grayscale(100%) contrast(1.5) brightness(0.8); }
    </style>
</head>
<body class="p-6 md:p-24 selection:bg-white selection:text-black">
    <header class="flex flex-col md:flex-row justify-between items-start md:items-end mb-24 border-b border-white/20 pb-8">
        <h1 class="display-font text-4xl md:text-6xl uppercase tracking-[0.2em] mb-8 md:mb-0">KAITHY.</h1>
        <nav class="flex space-x-8 text-xs uppercase tracking-[0.2em] font-light">
            <a href="#" class="hover:underline underline-offset-8">Exhibits</a>
            <a href="#" class="text-gray-500 hover:text-white transition-colors">Information</a>
        </nav>
    </header>
    <main class="grid grid-cols-1 gap-16 md:gap-32">
HTML;
$order = 1;
foreach($artworks as $index => $art) {
    $flexDir = $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse';
    $num = str_pad($order++, 2, '0', STR_PAD_LEFT);
    $layouts['12-monochrome'] .= <<<HTML
        <article class="flex flex-col {$flexDir} gap-8 md:gap-16 items-center group cursor-pointer">
            <div class="w-full md:w-1/2 overflow-hidden">
                <img src="{$art['img']}" class="w-full h-[60vh] object-cover mono-img transform hover:scale-105 transition-transform duration-1000">
            </div>
            <div class="w-full md:w-1/2 flex flex-col justify-center">
                <span class="display-font text-6xl md:text-8xl text-transparent stroke-text opacity-20 mb-[-2rem] md:mb-[-3rem] z-0" style="-webkit-text-stroke: 1px white;">{$num}</span>
                <div class="relative z-10 pl-4 md:pl-8 border-l border-white/30">
                    <span class="text-[10px] uppercase tracking-[0.4em] text-gray-400">{$art['category']}</span>
                    <h3 class="display-font text-2xl md:text-4xl uppercase tracking-widest mt-4 mb-8 leading-tight">{$art['title']}</h3>
                    <div class="flex items-center gap-8">
                        <span class="font-light text-xl tracking-wider">{$art['price']}</span>
                        <div class="h-[1px] w-16 bg-white"></div>
                        <span class="text-xs uppercase tracking-widest hover:pl-2 transition-all">View Detail</span>
                    </div>
                </div>
            </div>
        </article>
HTML;
}
$layouts['12-monochrome'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 13. Pop Art Comic Mode
$layouts['13-popart'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Pop Art Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Comic+Neue:wght@700&display=swap" rel="stylesheet">
    <style>
        body { 
            background-color: #f7ff00; 
            background-image: radial-gradient(#000 1px, transparent 1px); background-size: 10px 10px;
            font-family: 'Comic Neue', cursive; 
        }
        .comic-font { font-family: 'Bangers', cursive; letter-spacing: 2px; }
        .comic-border { border: 4px solid #000; border-radius: 8px; box-shadow: 8px 8px 0 rgba(0,0,0,1); }
        .comic-panel { background: #fff; padding: 20px; }
        .pow { position: absolute; background: #ff0055; color: white; padding: 10px 20px; transform: rotate(-10deg); border: 3px solid black; box-shadow: 4px 4px 0 black; z-index: 20; }
        .comic-nav a { background: #00d2ff; padding: 8px 16px; border: 3px solid black; box-shadow: 4px 4px 0 black; transition: transform 0.1s; }
        .comic-nav a:hover { transform: translate(2px, 2px); box-shadow: 2px 2px 0 black; background: #ff0055; color: white; }
    </style>
</head>
<body class="p-4 md:p-12">
    <nav class="flex flex-col md:flex-row justify-between items-center mb-16 comic-panel comic-border bg-[#00d2ff] relative">
        <div class="pow -top-6 -left-4 text-2xl comic-font">POW!</div>
        <h1 class="comic-font text-5xl md:text-7xl text-white drop-shadow-[4px_4px_0_#000] z-10">KAITHY ART!</h1>
        <div class="comic-nav flex space-x-4 mt-6 md:mt-0 z-10">
            <a href="#" class="text-xl">GALLERY</a>
            <a href="#" class="text-xl bg-[#ff9900]">INFO</a>
        </div>
    </nav>
    <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
HTML;
foreach($artworks as $index => $art) {
    $colors = ['#ff0055', '#00d2ff', '#ff9900'];
    $bg = $colors[$index % 3];
    $layouts['13-popart'] .= <<<HTML
        <article class="comic-panel comic-border relative group">
            <div class="absolute -top-4 -right-4 comic-font text-3xl bg-yellow-300 px-4 py-2 border-4 border-black box-shadow-[4px_4px_0_#000] rotate-6 z-20">{$art['price']}!</div>
            <img src="{$art['img']}" class="w-full h-64 object-cover border-4 border-black filter contrast-125 saturate-150 mb-4">
            <span class="inline-block bg-[{$bg}] text-white px-3 py-1 font-black border-2 border-black text-sm uppercase -mt-8 relative z-10 ml-2 shadow-[2px_2px_0_#000]">{$art['category']}</span>
            <h3 class="comic-font text-4xl mt-4 leading-tight group-hover:text-[{$bg}] transition-colors">{$art['title']}</h3>
            <button class="w-full border-4 border-black bg-white mt-6 py-2 text-2xl comic-font hover:bg-[{$bg}] hover:text-white hover:translate-y-1 hover:shadow-[0_0_0_#000] shadow-[6px_6px_0_#000] transition-all">BUY NOW</button>
        </article>
HTML;
}
$layouts['13-popart'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 14. Skeuomorphic (Web 2.0 Web Gloss)
$layouts['14-skeuomorphic'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Skeuomorphic Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Georgia&display=swap" rel="stylesheet">
    <style>
        body { 
            background: url('https://www.transparenttextures.com/patterns/black-linen.png'), linear-gradient(#1a1a1a, #2a2a2a);
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; min-height: 100vh; color: #ddd;
        }
        .wood-header {
            background: url('https://www.transparenttextures.com/patterns/wood-pattern.png'), #5c3a21;
            box-shadow: 0 4px 10px rgba(0,0,0,0.8), inset 0 2px 0 rgba(255,255,255,0.2), inset 0 -2px 0 rgba(0,0,0,0.4);
            border-bottom: 2px solid #331a0e;
        }
        .leather-card {
            background: url('https://www.transparenttextures.com/patterns/leather-floral.png'), #2c3e50;
            border-radius: 8px;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.1), 0 5px 15px rgba(0,0,0,0.6);
            border: 1px solid #1a252f;
        }
        .stitched-inner { border: 2px dashed rgba(255,255,255,0.2); border-radius: 6px; }
        h1, h2, h3 { font-family: 'Georgia', serif; text-shadow: -1px -1px 0 rgba(0,0,0,0.8), 1px 1px 0 rgba(255,255,255,0.2); }
        .glass-btn {
            background: linear-gradient(to bottom, #7db9e8 0%,#207cca 49%,#1e5799 50%,#2989d8 100%);
            border: 1px solid #184473; border-radius: 4px; color: white; font-weight: bold; text-shadow: 0 -1px 0 rgba(0,0,0,0.4);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.4), 0 2px 4px rgba(0,0,0,0.4);
        }
        .glass-btn:active { background: linear-gradient(to bottom, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); box-shadow: inset 0 2px 4px rgba(0,0,0,0.6); }
        .picture-frame {
            border: 12px solid #d4af37; border-image: url('https://www.transparenttextures.com/patterns/wood-pattern.png') 30 stretch;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.8), 5px 5px 15px rgba(0,0,0,0.6);
        }
    </style>
</head>
<body class="m-0 p-0">
    <nav class="wood-header p-6 flex justify-between items-center px-8 md:px-16 mb-12">
        <h1 class="text-4xl text-[#fff0d4] tracking-wider">Kaithy's Gallery</h1>
        <div class="space-x-2">
            <button class="glass-btn px-4 py-2">Home</button>
            <button class="glass-btn px-4 py-2 opacity-80 mix-blend-luminosity">About</button>
        </div>
    </nav>
    <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 px-8 md:px-16 pb-16">
HTML;
foreach($artworks as $art) {
    $layouts['14-skeuomorphic'] .= <<<HTML
        <article class="leather-card p-2">
            <div class="stitched-inner p-4 h-full flex flex-col">
                <div class="picture-frame mb-4 bg-black p-1">
                    <img src="{$art['img']}" class="w-full h-48 object-cover">
                </div>
                <div class="flex-grow">
                    <span class="inline-block px-3 py-1 bg-[#1a252f] rounded-full text-xs box-shadow-[inset_0_1px_3px_#000] text-gray-400 mb-2">{$art['category']}</span>
                    <h3 class="text-2xl text-[#ecf0f1] mb-2 leading-tight">{$art['title']}</h3>
                </div>
                <div class="flex justify-between items-center mt-4 bg-[#1a252f] p-3 rounded shadow-inner">
                    <span class="text-xl font-bold font-sans text-[#f1c40f] text-shadow-none">{$art['price']}</span>
                    <button class="glass-btn px-4 py-1.5 text-sm uppercase">Purchase</button>
                </div>
            </div>
        </article>
HTML;
}
$layouts['14-skeuomorphic'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 15. Memphis Style
$layouts['15-memphis'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Memphis Design</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Righteous&family=Jost:wght@400;700&display=swap');
        body { background-color: #ffd8d8; font-family: 'Jost', sans-serif; overflow-x: hidden; position: relative; }
        h1, h2, h3 { font-family: 'Righteous', cursive; }
        .squiggle { position: absolute; z-index: -1; opacity: 0.6; }
        .memphis-card { background: white; border: 4px solid #000; box-shadow: 10px 10px 0 #00e5ff; }
        .btn-memphis { background: #ffe600; border: 3px solid #000; box-shadow: 4px 4px 0 #ff0055; transition: all 0.2s; }
        .btn-memphis:hover { transform: translate(-2px, -2px); box-shadow: 6px 6px 0 #ff0055; }
        .img-tint { position: relative; border-bottom: 4px solid black; }
        .img-tint::after { content: ''; position: absolute; inset: 0; background: #00e5ff; mix-blend-mode: screen; opacity: 0.3; pointer-events: none; }
    </style>
</head>
<body class="p-4 md:p-12">
    <!-- Abstract Shapes -->
    <div class="squiggle top-10 left-10 w-24 h-24 rounded-full bg-[#ffe600] border-4 border-black"></div>
    <div class="squiggle bottom-20 right-10 w-32 h-32 rotate-45 border-8 border-[#ff0055] border-dashed"></div>
    <div class="squiggle top-1/2 left-1/4 w-0 h-0 border-l-[50px] border-l-transparent border-r-[50px] border-r-transparent border-b-[80px] border-b-[#00e5ff] rotate-12"></div>

    <header class="flex justify-between items-center mb-16 relative z-10 bg-white border-4 border-black p-4 box-shadow-[8px_8px_0_#ff0055]">
        <h1 class="text-4xl text-[#ff0055] tracking-widest drop-shadow-[2px_2px_0_#000]">KAITHY</h1>
        <nav class="space-x-4 font-bold text-xl">
            <a href="#" class="hover:text-[#00e5ff]">WORK</a>
            <a href="#" class="hover:text-[#ffe600]">HELLO</a>
        </nav>
    </header>
    
    <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 relative z-10">
HTML;
foreach($artworks as $index => $art) {
    $colors = ['#00e5ff', '#ff0055', '#ffe600'];
    $shadow = $colors[$index % 3];
    $layouts['15-memphis'] .= <<<HTML
        <article class="memphis-card flex flex-col" style="box-shadow: 10px 10px 0 {$shadow};">
            <div class="img-tint">
                <img src="{$art['img']}" class="w-full h-56 object-cover grayscale contrast-125">
            </div>
            <div class="p-6 flex-grow flex flex-col justify-between relative">
                <div class="absolute -top-5 right-4 bg-white border-4 border-black rounded-full p-2 w-12 h-12 flex items-center justify-center font-bold text-sm rotate-12 z-10">#{$index}</div>
                <div>
                    <span class="inline-block bg-black text-white px-2 py-0.5 text-xs font-bold uppercase tracking-widest mb-3">{$art['category']}</span>
                    <h3 class="text-3xl mb-4 leading-none">{$art['title']}</h3>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-black">{$art['price']}</span>
                    <button class="btn-memphis px-4 py-2 font-bold uppercase text-sm">Grab It</button>
                </div>
            </div>
        </article>
HTML;
}
$layouts['15-memphis'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 16. E-Commerce / Clean Web
$layouts['16-ecommerce'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>E-commerce Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #f8f9fa; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; }
        .product-card { background: #fff; border: 1px solid #e9ecef; border-radius: 8px; transition: box-shadow 0.2s, transform 0.2s; }
        .product-card:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.05); transform: translateY(-2px); }
        .btn-primary { background: #007bff; color: white; border-radius: 4px; padding: 8px 16px; font-weight: 500; font-size: 14px; transition: background 0.2s; }
        .btn-primary:hover { background: #0056b3; }
        .stars { color: #ffc107; font-size: 14px; }
    </style>
</head>
<body>
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center gap-8">
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Kaithy Store</h1>
                <nav class="hidden md:flex space-x-6 text-sm font-medium text-gray-600">
                    <a href="#" class="text-blue-600">All Products</a>
                    <a href="#" class="hover:text-gray-900">Paintings</a>
                    <a href="#" class="hover:text-gray-900">Photography</a>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative hidden md:block">
                    <input type="text" placeholder="Search..." class="bg-gray-100 border-none rounded py-2 px-4 text-sm w-64 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <button class="text-gray-600 font-medium text-sm flex items-center gap-1">Cart (0)</button>
            </div>
        </div>
    </header>

    <div class="bg-blue-50 py-3 text-center text-sm text-blue-800 font-medium">Free worldwide shipping on original pieces.</div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-end mb-8">
            <h2 class="text-xl font-semibold text-gray-900">Featured Artworks</h2>
            <span class="text-sm text-gray-500">Showing 1-3 of 42 results</span>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
HTML;
foreach($artworks as $art) {
    $layouts['16-ecommerce'] .= <<<HTML
            <article class="product-card overflow-hidden flex flex-col cursor-pointer">
                <div class="bg-gray-100 aspect-square overflow-hidden relative">
                    <span class="absolute top-2 left-2 bg-red-500 text-white text-[10px] uppercase font-bold px-2 py-1 rounded">Best Seller</span>
                    <img src="{$art['img']}" class="w-full h-full object-cover">
                </div>
                <div class="p-4 flex flex-col flex-grow">
                    <span class="text-xs text-gray-500 mb-1">{$art['category']}</span>
                    <h3 class="text-base font-semibold text-gray-900 mb-2 leading-snug">{$art['title']} - Original Handcrafted Piece</h3>
                    <div class="stars mb-4 flex items-center gap-1">
                        ★★★★★ <span class="text-xs text-gray-400 font-normal ml-1">(12 reviews)</span>
                    </div>
                    <div class="mt-auto flex justify-between items-center">
                        <div>
                            <span class="text-lg font-bold text-gray-900">{$art['price']}</span>
                            <span class="text-xs text-green-600 block mt-0.5">In Stock</span>
                        </div>
                        <button class="btn-primary">Add to Cart</button>
                    </div>
                </div>
            </article>
HTML;
}
$layouts['16-ecommerce'] .= <<<HTML
        </div>
    </main>
</body>
</html>
HTML;


// 17. Corporate / SaaS
$layouts['17-corporate'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Corporate SaaS Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #f7f9fc; font-family: 'Inter', system-ui, sans-serif; color: #1e293b; }
        .saas-card { background: white; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -2px rgba(0,0,0,0.025); transition: box-shadow 0.2s, border-color 0.2s; }
        .saas-card:hover { box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.05); border-color: #cbd5e1; }
        .btn-saas { background-color: #4f46e5; color: white; border-radius: 6px; font-weight: 500; font-size: 14px; transition: background-color 0.2s; }
        .btn-saas:hover { background-color: #4338ca; }
    </style>
</head>
<body class="antialiased text-slate-800">
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded bg-indigo-600 flex items-center justify-center text-white font-bold text-lg">K</div>
                <span class="font-bold text-xl tracking-tight text-slate-900">KaithyArt</span>
            </div>
            <div class="hidden md:flex space-x-8 text-sm font-medium text-slate-600">
                <a href="#" class="text-indigo-600">Dashboard</a>
                <a href="#" class="hover:text-slate-900 transition-colors">Analytics</a>
                <a href="#" class="hover:text-slate-900 transition-colors">Settings</a>
            </div>
            <div>
                <button class="bg-indigo-50 text-indigo-600 px-4 py-2 rounded-md font-medium text-sm hover:bg-indigo-100 transition-colors">Create New</button>
            </div>
        </div>
    </nav>
    
    <main class="max-w-7xl mx-auto px-6 py-10">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-slate-900 mb-2">Artwork Portfolio</h1>
            <p class="text-slate-500 text-sm">Manage and monitor the performance of your artistic assets.</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
HTML;
foreach($artworks as $art) {
    $layouts['17-corporate'] .= <<<HTML
            <article class="saas-card overflow-hidden">
                <img src="{$art['img']}" class="w-full h-40 object-cover border-b border-slate-100">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="font-semibold text-slate-900 truncate">{$art['title']}</h3>
                            <span class="text-xs text-slate-500 bg-slate-100 px-2 py-0.5 rounded-full inline-block mt-1">{$art['category']}</span>
                        </div>
                        <button class="text-slate-400 hover:text-slate-600 p-1">⋮</button>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mt-6 mb-6">
                        <div class="bg-slate-50 rounded p-3 border border-slate-100">
                            <span class="block text-xs font-medium text-slate-500 mb-1">Valuation</span>
                            <span class="block font-semibold text-slate-900">{$art['price']}</span>
                        </div>
                        <div class="bg-slate-50 rounded p-3 border border-slate-100">
                            <span class="block text-xs font-medium text-slate-500 mb-1">Status</span>
                            <span class="block text-sm font-medium text-emerald-600 flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block"></span> Active</span>
                        </div>
                    </div>
                    
                    <button class="w-full btn-saas py-2.5 flex justify-center items-center gap-2">
                        View Analytics &rarr;
                    </button>
                </div>
            </article>
HTML;
}
$layouts['17-corporate'] .= <<<HTML
        </div>
    </main>
</body>
</html>
HTML;


// 18. Brutalist Web 1.0
$layouts['18-raw'] = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Raw Web 1.0</title>
    <style>
        body { background: white; color: black; font-family: "Times New Roman", Times, serif; padding: 20px; line-height: 1.4; max-width: 800px; margin: 0 auto; }
        a { color: blue; text-decoration: underline; }
        a:visited { color: purple; }
        hr { border: 1px inset; margin: 20px 0; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h1><b>Kaithy's Homepage</b></h1>
    <p>Welcome to my art gallery on the World Wide Web.</p>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About me</a></li>
        <li><a href="#">Guestbook</a></li>
    </ul>
    <hr>
    <h2><u>Current Exhibition</u></h2>
    <p>Below is a table of my latest works available for acquisition. Click the image to view a larger version.</p>
    
    <table>
        <tr>
            <th>Preview</th>
            <th>Title</th>
            <th>Category</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
HTML;
foreach($artworks as $art) {
    $layouts['18-raw'] .= <<<HTML
        <tr>
            <td><a href="#"><img src="{$art['img']}" width="150" border="0" alt="Thumbnail"></a></td>
            <td><i>{$art['title']}</i></td>
            <td>{$art['category']}</td>
            <td><b>{$art['price']}</b></td>
            <td><a href="#">[ Buy Now ]</a></td>
        </tr>
HTML;
}
$layouts['18-raw'] .= <<<HTML
    </table>
    <hr>
    <p><small>&copy; 2026 Kaithy Art. All rights reserved. Best viewed in Netscape Navigator 4.</small></p>
</body>
</html>
HTML;


// 19. Vaporwave
$layouts['19-vaporwave'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Vaporwave Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background: linear-gradient(135deg, #ff71ce, #01cdfe, #05ffa1, #b967ff); background-size: 400% 400%; animation: VapowaveGradient 15s ease infinite; color: black; font-family: "Times New Roman", serif; min-height: 100vh; }
        @keyframes VapowaveGradient { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .win95 { background: silver; border: 2px solid; border-top-color: #fff; border-left-color: #fff; border-right-color: #848584; border-bottom-color: #848584; }
        .win95-title { background: #000080; color: white; padding: 2px 4px; font-family: 'Courier New', monospace; font-weight: bold; font-size: 14px; }
        h1.vapor-text { font-size: 4rem; color: #ff71ce; text-shadow: 3px 3px 0 #01cdfe, -2px -2px 0 #ffff00; letter-spacing: 15px; font-weight: normal; margin-bottom: 2rem; text-align: center; }
        .statue { position: fixed; bottom: -50px; right: -50px; opacity: 0.6; z-index: -1; filter: sepia(1) hue-rotate(180deg); }
    </style>
</head>
<body class="p-8 md:p-12 overflow-x-hidden">
    <!-- Placeholder for ancient statue vaporwave aesthetic -->
    <div class="statue text-9xl">🗿</div>
    
    <header>
        <h1 class="vapor-text italic">K A I T H Y . A E S T H E T I C S</h1>
    </header>

    <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto relative z-10">
HTML;
foreach($artworks as $index => $art) {
    $layouts['19-vaporwave'] .= <<<HTML
        <article class="win95 p-1 transform transition-transform hover:scale-105">
            <div class="win95-title flex justify-between">
                <span>ART_DATA_{$index}.EXE</span>
                <span class="bg-gray-300 text-black px-1 border border-gray-500 leading-none">x</span>
            </div>
            <div class="bg-teal-500 p-2 border-t-2 border-white">
                <div class="bg-white p-2 border border-black h-full flex flex-col items-center text-center">
                    <img src="{$art['img']}" class="w-full h-48 object-cover filter contrast-150 hue-rotate-90 saturate-200 mb-4 border-2 border-gray-400 border-dashed">
                    <h3 class="text-xl italic font-bold text-fuchsia-600 mb-1">{$art['title']}</h3>
                    <p class="font-sans text-xs uppercase tracking-widest text-cyan-600 border border-cyan-600 px-2 py-1 mb-4">{$art['category']}</p>
                    <div class="w-full mt-auto bg-gray-200 border border-gray-400 p-2 flex justify-between items-center text-sm">
                        <span class="font-bold text-blue-800">{$art['price']}</span>
                        <button class="win95 px-4 font-bold active:border-t-[#848584] active:border-l-[#848584]">DOWNLOAD</button>
                    </div>
                </div>
            </div>
        </article>
HTML;
}
$layouts['19-vaporwave'] .= <<<HTML
    </main>
</body>
</html>
HTML;


// 20. Gothic / Dark Academia
$layouts['20-gothic'] = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Gothic Dark Academia Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;800&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        body { background-color: #1a1614; color: #d4c4a8; font-family: 'Cormorant Garamond', serif; background-image: url('https://www.transparenttextures.com/patterns/aged-paper.png'); min-height: 100vh; }
        h1, h2, h3, .gothic-font { font-family: 'Cinzel', serif; }
        .gold-border { border: 1px solid #c9a227; outline: 1px solid #1a1614; outline-offset: -4px; }
        .vintage-img { filter: sepia(0.6) contrast(1.1) brightness(0.8); border-radius: 50% 50% 0 0; }
        .gold-text { background: linear-gradient(to bottom, #d4af37 0%,#aa771c 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="p-4 md:p-12 selection:bg-[#d4c4a8] selection:text-[#1a1614]">
    <div class="gold-border p-4 md:p-12 min-h-[90vh]">
        <header class="text-center mb-20 border-b border-[#c9a227]/30 pb-12 relative">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-24 h-24 border border-[#c9a227] rotate-45 z-0 opacity-20"></div>
            <h1 class="text-5xl md:text-7xl gothic-font gold-text mb-4 relative z-10 tracking-[0.2em]">KAITHY</h1>
            <p class="text-xl italic tracking-widest text-[#a89b82] relative z-10">Curator of Fine Antiquities & Modern Artefacts</p>
        </header>

        <main class="grid grid-cols-1 md:grid-cols-3 gap-16 md:gap-8 max-w-6xl mx-auto">
HTML;
foreach($artworks as $art) {
    $layouts['20-gothic'] .= <<<HTML
            <article class="flex flex-col items-center text-center group">
                <div class="w-full relative mb-8 overflow-hidden rounded-t-full border border-[#c9a227]/50 p-2">
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-transparent transition-colors duration-700 z-10"></div>
                    <img src="{$art['img']}" class="w-full h-80 object-cover vintage-img transform group-hover:scale-105 transition-transform duration-1000">
                </div>
                <span class="text-xs uppercase tracking-[0.3em] text-[#8b7e66] border-b border-[#8b7e66] pb-1 mb-4">Chapter: {$art['category']}</span>
                <h3 class="text-3xl gothic-font text-[#d4c4a8] mb-4">{$art['title']}</h3>
                <div class="flex items-center gap-4 mt-auto">
                    <div class="h-[1px] w-8 bg-[#c9a227]/50"></div>
                    <span class="text-xl italic text-[#c9a227]">{$art['price']}</span>
                    <div class="h-[1px] w-8 bg-[#c9a227]/50"></div>
                </div>
            </article>
HTML;
}
$layouts['20-gothic'] .= <<<HTML
        </main>
        
        <footer class="mt-24 text-center text-sm italic text-[#8b7e66]">
            Est. MMXXVI &mdash; Volume I
        </footer>
    </div>
</body>
</html>
HTML;


// Generate Mobile Responsive Index File
$indexHtml = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaithy Design Concepts Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans h-[100dvh] flex flex-col md:flex-row overflow-hidden">
    
    <!-- Mobile Header & Navigation -->
    <header class="md:hidden bg-black text-white p-4 flex flex-col gap-3 z-30 shadow-md flex-shrink-0">
        <div class="flex justify-between items-center">
            <h1 class="text-lg font-bold tracking-tight">Design Explorer</h1>
            <a href="/" class="text-xs font-bold text-gray-400 hover:text-white uppercase tracking-widest">Exit</a>
        </div>
        <select id="mobile-nav" onchange="loadTheme(this.value)" class="bg-gray-900 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 w-full focus:ring-2 focus:ring-blue-500 outline-none appearance-none font-medium">
            <!-- Options injected via JS -->
        </select>
    </header>

    <!-- Desktop Sidebar -->
    <aside class="hidden md:flex flex-col w-72 bg-white border-r border-gray-200 h-full z-20 shadow-lg flex-shrink-0">
        <div class="p-6 border-b border-gray-100 bg-black text-white">
            <h1 class="text-xl font-bold tracking-tight">Design Explorer</h1>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-2">20 Unique Themes</p>
        </div>
        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-1 px-3" id="desktop-nav-list">
                <!-- Links injected via JS -->
            </ul>
        </nav>
        <div class="p-6 bg-gray-50 border-t border-gray-200">
            <a href="/" class="text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-black flex items-center gap-2 transition-colors">
                &larr; Exit to App
            </a>
        </div>
    </aside>

    <!-- Content Frame -->
    <main class="flex-1 h-full bg-gray-100 overflow-hidden relative w-full">
        <!-- Loader -->
        <div id="loader" class="absolute inset-0 flex items-center justify-center bg-gray-100 z-10 transition-opacity duration-300">
            <div class="w-8 h-8 border-4 border-gray-300 border-t-black rounded-full animate-spin"></div>
        </div>
        <iframe id="preview-frame" src="1-neo-brutalism.html" class="w-full h-full border-none absolute inset-0 bg-white transition-opacity duration-300 opacity-0 z-20"></iframe>
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
            { id: '10-editorial', name: '10. High-Fashion', desc: 'Magazine stijl, gigantische letters' },
            { id: '11-synthwave', name: '11. Retro Synthwave', desc: 'Neon jaren 80, grid vloeren' },
            { id: '12-monochrome', name: '12. Monochromatic', desc: 'Zwart-wit, hoog contrast typografie' },
            { id: '13-popart', name: '13. Pop Art Comic', desc: 'Stripboek stijl, dikke lijnen, CMYK' },
            { id: '14-skeuomorphic', name: '14. Skeuomorphic Web', desc: 'Leer, hout, glanzende knoppen 3D' },
            { id: '15-memphis', name: '15. Memphis Design', desc: 'Jaren 80 abstract, confetti, pastel' },
            { id: '16-ecommerce', name: '16. Clean E-commerce', desc: 'Functioneel, strak, conversie-gericht' },
            { id: '17-corporate', name: '17. Corporate SaaS', desc: 'Blauw, zakelijk, afgeronde hoeken' },
            { id: '18-raw', name: '18. Brutalist Raw Web', desc: 'HTML1.0 zonder stijl, pure nostalgie' },
            { id: '19-vaporwave', name: '19. Vaporwave', desc: 'Windows 95 + Romeinse beelden' },
            { id: '20-gothic', name: '20. Gothic Academia', desc: 'Donkerbruin, gotisch, goud accenten' }
        ];

        const desktopList = document.getElementById('desktop-nav-list');
        const mobileSelect = document.getElementById('mobile-nav');
        const frame = document.getElementById('preview-frame');
        const loader = document.getElementById('loader');

        themes.forEach(theme => {
            // Populate Desktop List
            const li = document.createElement('li');
            li.innerHTML = `
                <button onclick="loadTheme('\${theme.id}')" id="btn-\${theme.id}" class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors group relative border border-transparent">
                    <div class="font-bold text-gray-800 title-text transition-colors">\${theme.name}</div>
                    <div class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider desc-text transition-colors">\${theme.desc}</div>
                </button>
            `;
            desktopList.appendChild(li);

            // Populate Mobile Select
            const opt = document.createElement('option');
            opt.value = theme.id;
            opt.textContent = theme.name;
            mobileSelect.appendChild(opt);
        });

        function loadTheme(id) {
            frame.style.opacity = '0';
            loader.style.opacity = '1';
            
            setTimeout(() => {
                frame.src = id + '.html';
                frame.onload = () => { 
                    frame.style.opacity = '1'; 
                    loader.style.opacity = '0';
                }
            }, 300);
            
            // Sync Mobile Select
            mobileSelect.value = id;

            // Sync Desktop UI Selection
            document.querySelectorAll('button[id^="btn-"]').forEach(btn => {
                btn.classList.remove('bg-black', 'border-black');
                btn.querySelector('.title-text').classList.remove('text-white');
                btn.querySelector('div:last-child').classList.remove('text-gray-400');
            });
            const activeBtn = document.getElementById('btn-' + id);
            if(activeBtn) {
                activeBtn.classList.add('bg-black', 'border-black');
                activeBtn.querySelector('.title-text').classList.add('text-white');
                activeBtn.querySelector('div:last-child').classList.add('text-gray-400');
            }
        }

        // Init first theme
        loadTheme(themes[0].id);
    </script>
</body>
</html>
HTML;

file_put_contents(__DIR__ . '/public/concepts/index.html', $indexHtml);

foreach($layouts as $filename => $html) {
    file_put_contents(__DIR__ . "/public/concepts/{$filename}.html", $html);
}

echo "Successfully generated 10 MORE HTML layout concepts in public/concepts! Mobile viewer updated.\n";
