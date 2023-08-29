<x-default-layout :title="$product->exists() ? 'Modifier un Produit' : 'Créer un produit'">
    <form
        action="{{ $product->exists() ? route('admin.products.update', ['product' => $product]) : route('admin.products.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if ($product->exists())
            @method('PUT')
        @endif
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h1 class="text-base font-semibold leading-7 text-gray-900">
                    {{ $product->exists() ? 'Modifier un produit' : 'Créer un produit' }}
                </h1>

                <div class="mt-10 space-y-8 md:w-2/3">
                    <x-input name="name" label="Nom du produit" :value="$product->name" />
                    <x-input name="price" label="Prix du produit" :value="$product->price" />
                    <x-input name="discount_price" label="Prix du produit apres promotion (facultatif)"
                        :value="$product->discount_price" />
                    <x-input name="stock" label="Stock du produit" :value="$product->stock" />
                    <x-textarea name="description"
                        label="Description du produit">{{ $product->description }}</x-textarea>
                    <x-input name="image" type="file" label="Image du produit" :value="$product->image" />
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                {{ $product->exists() ? 'Mettre à jour' : 'Publier' }}
            </button>
        </div>
    </form>
</x-default-layout>
