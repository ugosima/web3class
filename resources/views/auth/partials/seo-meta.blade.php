{{-- SEO Meta Tags --}}
<meta name="description" content="{{ $description ?? 'Tokendemy is a Web3 learning platform for blockchain, cryptocurrency, trading, smart contracts, DeFi, and real-world crypto education.' }}">

<meta name="keywords" content="{{ $keywords ?? 'tokendemy, web3, blockchain, cryptocurrency, crypto trading, bitcoin, ethereum, smart contracts, defi, nft, crypto education, learn crypto' }}">

<meta name="author" content="{{ $author ?? config('app.name', 'Tokendemy') }}">

<meta name="robots" content="{{ $robots ?? 'index, follow' }}">

<link rel="canonical" href="{{ $canonical ?? url()->current() }}">


{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{{ $og_type ?? 'website' }}">
<meta property="og:url" content="{{ $og_url ?? url()->current() }}">

<meta property="og:title" content="{{ $og_title ?? $title ?? config('app.name', 'Tokendemy') }}">

<meta property="og:description" content="{{ $og_description ?? $description ?? 'Learn Web3, blockchain, crypto trading, and decentralized finance with Tokendemy.' }}">

<meta property="og:image" content="{{ $og_image ?? asset('images/og-image.png') }}">

<meta property="og:site_name" content="{{ config('app.name', 'Tokendemy') }}">


{{-- Twitter --}}
<meta name="twitter:card" content="{{ $twitter_card ?? 'summary_large_image' }}">

<meta name="twitter:url" content="{{ $twitter_url ?? url()->current() }}">

<meta name="twitter:title" content="{{ $twitter_title ?? $title ?? config('app.name', 'Tokendemy') }}">

<meta name="twitter:description" content="{{ $twitter_description ?? $description ?? 'Learn Web3, blockchain, crypto trading, and decentralized finance.' }}">

<meta name="twitter:image" content="{{ $twitter_image ?? asset('images/og-image.png') }}">