<form method="POST" wire:submit.prevent="submitForm">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }} wire:model.defer='product_id'">
    <input type="hidden" name="total_price" value="{{ $product->price }}" wire:model.defer='total_price'>
    <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
                <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                    <span class="text-red-500">*</span> الاسم واللقب
                </label>
                <input type="text" name="name" id="name" placeholder="Ali madani"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-amber-500 focus:shadow-md"
                    wire:model.defer='name' />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
                <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                    <span class="text-red-500">*</span> رقم الهاتف
                </label>
                <input type="tel" name="phone" id="phone" placeholder="0566778876" pattern="[0-9]{10}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-amber-500 focus:shadow-md"
                    wire:model.defer='phone' />
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
                <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                    <span class="text-red-500">*</span> الولاية
                </label>
                @php
                    use AnouarTouati\AlgerianCitiesLaravel\Facades\AlgerianCitiesFacade;
                    $wilayas = AlgerianCitiesFacade::getAllWilayas();
                @endphp
                <select name="city" id="city"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-amber-500 focus:shadow-md"
                    wire:model.defer='city'>
                    @foreach ($wilayas as $wilaya)
                        <option value="{{ $wilaya->wilaya_name_ascii }}">{{ $wilaya->wilaya_name }}</option>
                    @endforeach
                </select>
                @error('city')
                    <span class="text-red-500
                        text-sm">{{ $message }}</span>
                @enderror

            </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
                <label for="district" class="mb-3 block text-base font-medium text-[#07074D]">
                    <span class="text-red-500">*</span> الدائرة
                </label>
                <input type="text" name="district" id="disctrict" placeholder="Haydra"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-amber-500 focus:shadow-md"
                    wire:model.defer='district' />
                @error('district')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>
        </div>
    </div>

    <div class="mb-5">
        <label for="address" class="mb-3 block text-base font-medium text-[#07074D]">
            <span class="text-red-500">*</span> عنوان التسليم
        </label>
        <input type="text" name="address" id="address"
            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-amber-500 focus:shadow-md"
            placeholder="24 rue de cirta" wire:model.defer='address' />
        @error('address')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

    </div>
    <div class="sticky w-full bottom-0 left-0 right-0 flex flex-col gap-2 bg-orange-100 py-4 shadow-xl rounded-t-2xl"
        x-data="{ quantity: 1, price: {{ $product->discount_price ? $product->discount_price : $product->price }} }">
        @if ($product->shipping_price)
            <div class="md:px-5 px-3 py-1">
                <h1 class="md:text-xl text-lg text-slate-800"><span
                        class="text-green-500 font-semibold mr-2 md:mr-5">DZD
                        {{ $product->shipping_price }}</span> :سعر
                    الشحن</h1>
            </div>
        @endif
        <div class="flex items-center justify-center">
            <div class="flex items-center justify-center">
                <button type="submit"
                    class="hover:shadow-form rounded-md bg-amber-500 transition-all hover:bg-amber-600 py-3 px-2 md:px-5 text-center text-base font-semibold text-white outline-none mr-2 md:mr-5">
                    اشتري الآن
                </button>
                <h1 x-text="price * quantity +' DZD'"
                    class="text-sm md:text-lg font-semibold text-slate-800 outline-none focus:border-amber-500 focus:shadow-md mr-2 md:mr-5">
                </h1>
                <button @click.prevent="quantity = Math.max(1, quantity - 1); $wire.setQuantity(quantity)"
                    class="px-3 py-2 rounded-l-md border border-[#e0e0e0] bg-white text-slate-700 outline-none focus:border-amber-500 focus:shadow-md">
                    -
                </button>
                <h1 x-text="quantity"
                    class="border-t border-b border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-slate-700 outline-none focus:border-amber-500 focus:shadow-md">
                </h1>
                <button
                    @click.prevent="quantity = Math.min({{ $product->stock }}, quantity + 1); $wire.setQuantity(quantity)"
                    class="px-3 py-2 rounded-r-md border border-[#e0e0e0] bg-white text-slate-700 outline-none focus:border-amber-500 focus:shadow-md">
                    +
                </button>
            </div>
        </div>
    </div>
</form>
