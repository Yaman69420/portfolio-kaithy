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
