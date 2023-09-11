<x-default-layout :title="$product->exists() ? 'تعديل المنتج' : 'إنشاء منتج'">
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
                    {{ $product->exists() ? 'تعديل منتج' : 'إنشاء منتج' }}
                </h1>

                <div class="mt-10 space-y-8">
                    <x-input name="name" label="إسم المنتج" :value="$product->name" />
                    <x-input name="price" label="سعر المنتج" :value="$product->price" />
                    <x-input name="discount_price" label="سعر المنتج بعد الخصم (اختياري)" :value="$product->discount_price" />
                    <x-input name="shipping_price" label="سعر التوصيل (اختياري)" :value="$product->shipping_price" />
                    <x-input name="stock" label="مخزون المنتج" :value="$product->stock" />
                    <x-textarea name="description" label="وصف المنتوج">{{ $product->description }}</x-textarea>
                    <x-input name="image" type="file" label="صورة المنتج" :value="$product->image" />
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-amber-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                {{ $product->exists() ? 'تحديث' : 'إنشاء' }}
            </button>
        </div>
    </form>
</x-default-layout>
