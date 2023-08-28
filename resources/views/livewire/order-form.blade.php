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
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md"
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
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md"
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
                <input type="text" name="city" id="city" placeholder="Alger"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md"
                    wire:model.defer='city' />
                @error('city')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
                <label for="district" class="mb-3 block text-base font-medium text-[#07074D]">
                    <span class="text-red-500">*</span> الدائرة
                </label>
                <input type="text" name="district" id="disctrict" placeholder="Haydra"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md"
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
            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md"
            placeholder="24 rue de cirta" wire:model.defer='address' />
        @error('address')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

    </div>
    <div class="sticky w-full bottom-0 left-0 right-0 flex items-center justify-center bg-indigo-100 py-4 shadow-xl rounded-t-2xl"
        x-data="{ quantity: 1 }">
        <div class="flex items-center justify-center">
            <button type="submit"
                class="hover:shadow-form rounded-md bg-indigo-500 hover:bg-indigo-600 py-3 px-8 text-center text-base font-semibold text-white outline-none mr-5">
                اشتري الآن
            </button>
            <button @click.prevent="quantity = Math.max(1, quantity - 1); $wire.setQuantity(quantity)"
                class="px-3 py-2 rounded-l-md border border-[#e0e0e0] bg-white text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md">
                -
            </button>
            <h1 x-text="quantity"
                class="border-t border-b border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md">
            </h1>
            <button
                @click.prevent="quantity = Math.min({{ $product->stock }}, quantity + 1); $wire.setQuantity(quantity)"
                class="px-3 py-2 rounded-r-md border border-[#e0e0e0] bg-white text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md">
                +
            </button>

        </div>
    </div>

</form>
