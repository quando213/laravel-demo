@php
    $title = $title ?? 'Witch by Hatoxu';
    $canonical = url()->current();
    $image_link = lib_assets('images/logo-witch.png');
    $description = 'Witch by Hatoxu là thương hiệu thời trang mang phong cách "all black" với hai dòng sản phẩm Witch Basic Và Witch Club "I don’t dress up for anyone but me" - Witch by Hatoxu';
@endphp

<meta name="description" content="{{$description}}" />
<meta name="keywords" content="witch, witch - hatoxu, hatoxu" />
<link rel="canonical" href="{{$canonical}}/" />
<meta property="og:title" content="{{$title}}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{$canonical}}" />
<meta property="og:image" content="{{$image_link}}" />
<meta property="og:site_name" content="{{config('app.name')}}" />
<meta property="og:description" content="{{$description}}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{$title}}" />
<meta name="twitter:description" content="{{$description}}" />
<meta name="twitter:image" content="{{$image_link}}" />
