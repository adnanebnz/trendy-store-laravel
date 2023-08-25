@props(['product', 'list' => false])

{{-- Début du produit --}}
<article class="flex flex-col lg:flex-row pb-10 md:pb-16 border-b">
    <div class="lg:w-5/12">
        <img class="w-full max-h-72 object-cover lg:max-h-none lg:h-full" src="{{ $product->image }}">
    </div>
    <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">
        <h1 class="font-bold text-slate-900 text-3xl lg:text-5xl leading-tight">{{ $product->name }}</h1>
        <div>
            <p class="text-xl lg:text-2xl text-slate-600">
                {{ $product->price }} DZD
            </p>
            @if ($product->stock == 0)
                <span class="inline-flex items-center px-3 py-0.5 rounded-full font-medium bg-red-100 text-red-800 mt-2">
                    Indisponible
                </span>
            @else
                <span
                    class="inline-flex items-center px-3 py-0.5 rounded-full font-medium bg-green-100 text-green-800 mt-2">
                    Stock: {{ $product->stock }}
                </span>
            @endif
            <p class="text-md text-slate-600 mt-3">
                {{ \Illuminate\Support\Str::limit($product->description, 150, $end = '...') }}
            </p>
        </div>
        @if ($list)
            <a href="{{ route('product.show', ['product' => $product]) }}"
                class="flex items-center py-5 px-7 font-semibold bg-slate-700 hover:bg-slate-900 transition text-slate-50 rounded-full">

                Voir le produit
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>

            </a>
        @else
            <time class="text-xs text-slate-400"
                datetime="{{ $product->created_at }}">{{ $product->created_at->format('d/m/Y H:i:s') }}</time>
                {{-- TODO ADD FORM HERE --}}
        @endif
    </div>
</article>
{{-- Fin du produit --}}
