@props(['product', 'list' => false])

{{-- Début du produit --}}
<article class="flex flex-col lg:flex-row pb-10 md:pb-16 border-b">
    <div class="lg:w-5/12">
        <img class="w-full object-cover rounded-md"
            src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}">
        @if (!$list)
            <div class="hidden sm:block">

                <div class="border-t md:mt-6">
                    <h1 class="mx-auto text-2xl font-semibold text-slate-800 mt-3">Acheter ce produit</h1>
                    <p class="text-sm text-slate-600">Veuillez remplire ce formulaire a fin d'acheter ce produit
                </div>
                </p>
                {{-- TODO ADD FORM HERE --}}
                <div class="flex items-center justify-center md:p-12">
                    <div class="mx-auto w-full max-w-full">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="total_price" value="{{ $product->price }}">
                            <div class="-mx-3 flex flex-wrap">
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Nom et prénom <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="name" id="name" placeholder="Ali madani"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                                        @error('name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Numero de télephone <span class="text-red-500">*</span>
                                        </label>
                                        <input type="tel" name="phone" id="phone" placeholder="0566778876"
                                            pattern="[0-9]{10}"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                                        @error('phone')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Wilaya <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="city" id="city" placeholder="Alger"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                                        @error('city')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="district" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Daira <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="district" id="disctrict" placeholder="Haydra"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                                        @error('district')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="address" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Adresse de livraison <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="address" id="address"
                                    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md"
                                    placeholder="24 rue de cirta" />
                                @error('address')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>
                            <div x-data="{ quantity: 1 }" class="mb-5">
                                <label for="quantity" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Quantité <span class="text-red-500">*</span>
                                </label>
                                <div class="flex items-center">
                                    <input name="quantity" type="hidden" x-model="quantity" />
                                    <button @click.prevent="quantity = Math.max(1, quantity - 1)"
                                        class="px-3 py-2 rounded-l-md border border-[#e0e0e0] bg-white text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md">
                                        -
                                    </button>
                                    {{-- displaying the quantity --}}
                                    <h1 x-model="quantity" x-text="quantity"
                                        class="border-t border-b border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md">
                                    </h1>

                                    <button @click.prevent="quantity = Math.min({{ $product->stock }}, quantity + 1)"
                                        class="px-3 py-2 rounded-r-md border border-[#e0e0e0] bg-white text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md">
                                        +
                                    </button>
                                </div>
                            </div>


                            <div class="flex items-center justify-center md:justify-start">
                                <button type="submit"
                                    class="hover:shadow-form rounded-md bg-indigo-500 hover:bg-indigo-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                    Commander
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- TODO FORM ENDS HERE --}}
            </div>
        @endif
    </div>
    <div class="flex flex-col items-start mt-2 md:mt-5  space-y-2 md:space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">
        <h1 class="font-bold text-slate-900 text-3xl lg:text-5xl leading-tight">{{ $product->name }}</h1>
        <div>
            <p class="text-xl lg:text-2xl text-slate-600">
                {{ $product->price }} DZD
            </p>
            @if ($product->stock == 0)
                <span
                    class="inline-flex items-center px-3 py-0.5 rounded-full font-medium bg-red-100 text-red-800 mt-2">
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
            {{-- TODO CARDS --}}
            <div class="border-b pb-7 md:py-7 bg-opacity-10">
                <div class="hidden md:grid md:grid-cols-3 group bg-white shadow-xl shadow-neutral-100 border">
                    <div
                        class="p-10 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                        <span class="p-5 rounded-full bg-red-500 text-white shadow-lg shadow-red-200"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>
                        </span>
                        <p class="text-md font-medium text-slate-700 mt-3">Livraison express</p>
                        <p class="mt-2 text-sm text-slate-500">Avec Yaliddine vous benificiez de la livraison express
                            dans un maximum de 4 jours de votre achat!</p>
                    </div>

                    <div
                        class="p-10 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                        <span class="p-5 rounded-full bg-green-500 text-white shadow-lg shadow-green-200"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <p class="text-md font-medium text-slate-700 mt-3">Produits Haut Qualité</p>
                        <p class="mt-2 text-sm text-slate-500">Avec nous vous savez ou mettre votre argent!</p>
                    </div>

                    <div
                        class="p-10 flex flex-col items-center text-center group   md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                        <span class="p-5 rounded-full bg-indigo-500 text-white shadow-lg shadow-indigo-200"><svg
                                xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg></span>
                        <p class="text-md font-medium text-slate-700 mt-3">Support Disponible</p>
                        <p class="mt-2 text-sm text-slate-500">Vous pouvez nous contacter quand vous voulez si vous
                            avez
                            des problémes l'ors de l'achat.</p>
                    </div>
                </div>
            </div>
            {{-- TODO  END CARDS --}}

            {{-- TODO ADD FAQ --}}

            <div class="hidden md:block">
                <h1 class="text-3xl font-bold text-center"><span class="text-indigo-600">Comment</span> commander</h1>

                <div class="flex flex-col gap-8 mt-4">
                    <div
                        class="flex flex-col md:flex-row bg-white rounded-xl md:bg-transparent shadow-lg shadow-black/20 md:shadow-none gap-8">
                        <div class="flex justify-center md:justify-end">
                            <div class="bg-white  shadow-lg rounded-xl p-4 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-14 h-14 text-blue-950">
                                    <path fill-rule="evenodd"
                                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div
                            class="bg-white shadow-lg rounded-md p-4 transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50">
                            <h1 class="font-bold text-lg pb-4">1. Remplir le formulaire </h1>
                            <p class="text-sm">
                                Vous devez remplir le formulaire avec vos informations correctes à fin d'acheter ce
                                produit.
                            </p>
                        </div>
                    </div>
                    {{-- SECOND CARD --}}
                    <div
                        class="flex flex-col md:flex-row bg-white rounded-xl md:bg-transparent shadow-lg shadow-black/20 md:shadow-none gap-8">
                        <div class="flex justify-center md:justify-end">
                            <div class="bg-white  shadow-lg rounded-xl p-4 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-14 h-14 text-blue-950">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                                </svg>
                            </div>
                        </div>
                        <div
                            class="bg-white shadow-lg rounded-md p-4 transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50">
                            <h1 class="font-bold text-lg pb-4">2. Attendez notre appel</h1>
                            <p class="text-sm">
                                Vous devez attendre notre appel pour confirmer l'achat, en cas de soucis vous pouvez
                                nous contacter via le formulaire de contact.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- TODO END FAQ --}}

            <div class="block sm:hidden">

                <div class="border-t md:mt-6">
                    <h1 class="mx-auto text-2xl font-semibold text-slate-800 mt-3">Acheter ce produit</h1>
                    <p class="text-sm text-slate-600">Veuillez remplire ce formulaire a fin d'acheter ce produit
                </div>
                </p>
                {{-- TODO ADD FORM HERE --}}
                <div class="flex items-center justify-center px-2 py-4 md:p-12">
                    <div class="mx-auto w-full max-w-full">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="total_price" value="{{ $product->price }}">
                            <div class="-mx-3 flex flex-wrap">
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Nom et prénom <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="name" id="name" placeholder="Ali madani"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                                        @error('name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Numero de télephone <span class="text-red-500">*</span>
                                        </label>
                                        <input type="tel" name="phone" id="phone" placeholder="0566778876"
                                            pattern="[0-9]{10}"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                                        @error('phone')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Wilaya <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="city" id="city" placeholder="Alger"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                                        @error('city')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="district" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Daira <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="district" id="disctrict" placeholder="Haydra"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                                        @error('district')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="address" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Adresse de livraison <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="address" id="address"
                                    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md"
                                    placeholder="24 rue de cirta" />
                                @error('address')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div x-data="{ quantity: 1 }" class="mb-5">
                                <label for="quantity" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Quantité <span class="text-red-500">*</span>
                                </label>
                                <div class="flex items-center">
                                    <input name="quantity" type="hidden" x-model="quantity" />
                                    <button @click.prevent="quantity = Math.max(1, quantity - 1)"
                                        class="px-3 py-2 rounded-l-md border border-[#e0e0e0] bg-white text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md">
                                        -
                                    </button>
                                    {{-- displaying the quantity --}}
                                    <h1 x-model="quantity" x-text="quantity"
                                        class="border-t border-b border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md">
                                    </h1>

                                    <button @click.prevent="quantity = Math.min({{ $product->stock }}, quantity + 1)"
                                        class="px-3 py-2 rounded-r-md border border-[#e0e0e0] bg-white text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md">
                                        +
                                    </button>
                                </div>
                            </div>

                            <div class="flex items-center justify-center md:justify-start mt-10">
                                <button type="submit"
                                    class="hover:shadow-form rounded-md bg-indigo-500 hover:bg-indigo-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                    Commander
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- TODO FORM ENDS HERE --}}
            </div>
        @endif
    </div>
</article>
{{-- Fin du produit --}}
