<x-default-layout>
    <div class="space-y-10 md:space-y-16">
        @forelse ($products as $product)
        <x-product :$product list /> 
        {{-- TODO TO CREATE COMPONENT --}}
        @empty
        <p class="text-slate-400 text-center">Aucun résultat.</p>
        @endforelse
        {{ $posts->links() }}
    </div>
</x-default-layout>