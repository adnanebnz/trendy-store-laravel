<x-default-layout title="Gestion des produits">
    <div class="flex items-center justify-between">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Produits</h1>
            <p class="mt-2 text-sm text-gray-700">Interface d'administration.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('admin.products.create') }}"
                class="inline-flex rounded-md bg-amber-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">Créer
                un produit</a>
        </div>
    </div>
    <div class="mt-14 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Image
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Nom</th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Prix</th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Stock
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"></th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"></th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($products as $product)
                            <tr class="even:bg-gray-50">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                                    <img class="object-cover rounded-md"
                                        src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}"
                                        height="135" width="135" alt="{{ $product->name }}" />
                                </td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                                    {{ $product->name }}</td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                                    {{ $product->discount_price !== null && $product->discount_price > 0 ? $product->discount_price : $product->price }}
                                </td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                                    {{ $product->stock }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <a href="{{ route('product.show', ['product' => $product]) }}" target="_blank"
                                        class="text-amber-600 hover:text-abmer-700">
                                        Voir le produit
                                    </a>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <a href="{{ route('admin.products.edit', ['product' => $product]) }}"
                                        class="text-amber-600 hover:text-amber-700">
                                        Editer
                                    </a>
                                </td>
                                <td x-data
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">
                                    <a href="{{ route('admin.products.destroy', ['product' => $product]) }}"
                                        @click.prevent="$refs.delete.submit()"
                                        class="text-amber-600 hover:text-amber-700">
                                        Supprimer
                                    </a>
                                    <form x-ref="delete"
                                        action="{{ route('admin.products.destroy', ['product' => $product]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-default-layout>
