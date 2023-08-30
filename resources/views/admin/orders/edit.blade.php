<x-default-layout>
    <form action="{{ route('admin.orders.update', ['order' => $order]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="pb-1">
                <h1 class="text-base font-semibold leading-7 text-gray-900">
                    Voir / Modifier la commande
                </h1>
                <div>
                    <div>
                        <section>
                            <section class="text-slate-800">
                                <div class="container mt-5">
                                    <div
                                        class="p-5 bg-white flex items-center mx-auto mb-2 border-gray-200 rounded-lg sm:flex-row flex-col">
                                        <div class="sm:mr-10 inline-flex items-center justify-center flex-shrink-0">
                                            <img class="w-full h-72 object-cover rounded-md"
                                                src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}">
                                        </div>
                                        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                            <h1 class="text-black text-xl title-font font-bold mb-2">Commande sur
                                                <span class="underline underline-offset-4">{{ $product->name }}</span>
                                            </h1>
                                            <p class="font-medium">Quantité: <span
                                                    class="font-bold">{{ $order->quantity }}</span></p>
                                            <p class="font-medium">Nom client: <span
                                                    class="font-bold">{{ $order->name }}</span></p>
                                            <p class="font-medium">Téléphone client: <span
                                                    class="font-bold">{{ $order->phone }}</span>
                                            </p>
                                            <p class="font-medium">Wilaya client: <span
                                                    class="font-bold">{{ $order->city }}</span>
                                            </p>
                                            <p class="font-medium">Daira client: <span
                                                    class="font-bold">{{ $order->district }}</span>
                                            </p>
                                            <p class="font-medium">Adresse client: <span
                                                    class="font-bold">{{ $order->address }}</span>
                                            </p>
                                            <h1 class="text-xl font-bold mt-4">Prix Totale: {{ $order->total_price }}
                                                DZD
                                            </h1>
                                            <h1 class="mt-4 font-bold text-xl">Modifier le Status de la commande</h1>
                                            <div class="mt-2">
                                                <label for="status">Status de la commande:
                                                    @if ($order->status->value == 'pending')
                                                        <span class="text-yellow-500 font-bold">En attente</span>
                                                    @endif
                                                    @if ($order->status->value == 'processing')
                                                        <span class="text-blue-500 font-bold">En cours de
                                                            traitement</span>
                                                    @endif
                                                    @if ($order->status->value == 'shipped')
                                                        <span class="text-green-500 font-bold">Terminé</span>
                                                    @endif
                                                </label>
                                                <select name="status"
                                                    class="mt-1 block appearance-non bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                                    <option value="pending"
                                                        @if ($order->status->value == 'pending') selected @endif>En attente
                                                    </option>
                                                    <option value="processing"
                                                        @if ($order->status->value == 'processing') selected @endif>En cours de
                                                        traitement</option>
                                                    <option value="shipped"
                                                        @if ($order->status->value == 'shipped') selected @endif>Terminé
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <button type="submit"
                class="rounded-md bg-amber-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                Mettre à jour
            </button>
        </div>
    </form>
</x-default-layout>
