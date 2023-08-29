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
                <select name="city" id="city"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md"
                    wire:model.defer='city'>
                    <option value="">اختر الولاية</option>
                    <option value="أدرار">أدرار</option>
                    <option value="الشلف">الشلف</option>
                    <option value="الأغواط">الأغواط</option>
                    <option value="أم البواقي">أم البواقي</option>
                    <option value="باتنة">باتنة</option>
                    <option value="بجاية">بجاية</option>
                    <option value="بسكرة">بسكرة</option>
                    <option value="بشار">بشار</option>
                    <option value="البليدة">البليدة</option>
                    <option value="تمنراست">تمنراست</option>
                    <option value="تبسة">تبسة</option>
                    <option value="تلمسان">تلمسان</option>
                    <option value="تيارت">تيارت</option>
                    <option value="تيزي وزو">تيزي وزو</option>
                    <option value="الجزائر">الجزائر</option>
                    <option value="الجلفة">الجلفة</option>
                    <option value="جيجل">جيجل</option>
                    <option value="سطيف">سطيف</option>
                    <option value="سعيدة">سعيدة</option>
                    <option value="سكيكدة">سكيكدة</option>
                    <option value="سيدي بلعباس">سيدي بلعباس</option>
                    <option value="عنابة">عنابة</option>
                    <option value="قالمة">قالمة</option>
                    <option value="قسنطينة">قسنطينة</option>
                    <option value="المدية">المدية</option>
                    <option value="مستغانم">مستغانم</option>
                    <option value="المسيلة">المسيلة</option>
                    <option value="معسكر">معسكر</option>
                    <option value="ورقلة">ورقلة</option>
                    <option value="وهران">وهران</option>
                    <option value="البيض">البيض</option>
                    <option value="إليزي">إليزي</option>
                    <option value="برج بوعريريج">برج بوعريريج</option>
                    <option value="بومرداس">بومرداس</option>
                    <option value="الطارف">الطارف</option>
                    <option value="تندوف">تندوف</option>
                    <option value="تيسمسيلت">تيسمسيلت</option>
                    <option value="الوادي">الوادي</option>
                    <option value="خنشلة">خنشلة</option>
                    <option value="سوق أهراس">سوق أهراس</option>
                    <option value="تيبازة">تيبازة</option>
                    <option value="ميلة">ميلة</option>
                    <option value="عين الدفلى">عين الدفلى</option>
                    <option value="النعامة">النعامة</option>
                    <option value="عين تموشنت">عين تموشنت</option>
                    <option value="غرداية">غرداية</option>
                    <option value="غليزان">غليزان</option>
                    <option value="تيميمون">تيميمون</option>
                    <option value="برج باجي مختار">برج باجي مختار</option>
                    <option value="أولاد جلال">أولاد جلال</option>
                    <option value="بني عباس">بني عباس</option>
                    <option value="بني عباس">بني عباس</option>
                    <option value="عين صلاح">عين صلاح</option>
                    <option value="عين قزام">عين قزام</option>
                    <option value="جانت">جانت</option>
                    <option value="مغاير">مغاير</option>
                    <option value="المنيعه">المنيعه</option>
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
        x-data="{ quantity: 1, price: {{ $product->price }} }">
        <div class="flex items-center justify-center">
            <button type="submit"
                class="hover:shadow-form rounded-md bg-indigo-500 hover:bg-indigo-600 py-3 px-5 text-center text-base font-semibold text-white outline-none mr-2 md:mr-5">
                اشتري الآن
            </button>
            <h1 x-text="price * quantity +' DZD'"
                class="text-sm md:text-lg font-semibold text-slate-800 outline-none focus:border-indigo-500 focus:shadow-md mr-2 md:mr-5">
            </h1>
            <button @click.prevent="quantity = Math.max(1, quantity - 1); $wire.setQuantity(quantity)"
                class="px-3 py-2 rounded-l-md border border-[#e0e0e0] bg-white text-slate-700 outline-none focus:border-indigo-500 focus:shadow-md">
                -
            </button>
            <h1 x-text="quantity"
                class="border-t border-b border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-slate-700 outline-none focus:border-indigo-500 focus:shadow-md">
            </h1>
            <button
                @click.prevent="quantity = Math.min({{ $product->stock }}, quantity + 1); $wire.setQuantity(quantity)"
                class="px-3 py-2 rounded-r-md border border-[#e0e0e0] bg-white text-slate-700 outline-none focus:border-indigo-500 focus:shadow-md">
                +
            </button>

        </div>
    </div>

</form>
