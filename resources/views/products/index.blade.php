{{-- resources/views/products/index.blade.php --}}
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ $theme }} Products</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $theme }} Products</h1>

    <p class="mb-4">
      Choose theme:
      <a href="{{ route('products.index', ['theme'=>'Gadgets']) }}" class="underline">Gadgets</a> |
      <a href="{{ route('products.index', ['theme'=>'Books']) }}" class="underline">Books</a> |
      <a href="{{ route('products.index', ['theme'=>'Movies']) }}" class="underline">Movies</a> |
      <a href="{{ route('products.index', ['theme'=>'Anime']) }}" class="underline">Anime</a> |
      <a href="{{ route('products.index', ['theme'=>'Restaurants']) }}" class="underline">Restaurants</a>
    </p>

    @if(count($products) === 0)
      <p>No products found for {{ $theme }}.</p>
    @else
      <div class="grid grid-cols-1 gap-4">
        @foreach($products as $p)
          <div class="bg-white p-4 rounded shadow">
            <h2 class="font-semibold text-lg">{{ $p['name'] ?? 'Untitled' }}</h2>
            <div class="text-sm text-gray-600">
              @foreach($p as $key => $value)
                @if($key !== 'name')
                  <div><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</div>
                @endif
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</body>
</html>