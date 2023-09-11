<x-auth-layout title="تسجيل الدخول" :action="route('auth.login')" submitMessage="تسجيل الدخول">
    <x-input name="email" label="البريد الإلكتروني" type="email" />
    <x-input name="password" label="كلمة السر" type="password" />
    <div class="flex items-center justify-between">
        <div>
            {{-- <a href="#"
                class="underline underline-offset-4 text-amber-600 hover:text-amber-500 hover:cursor-pointer">
                نسيت كلمة السر؟</a> --}}
        </div>
        <div class="flex items-center justify-end">
            <input id="remember" name="remember" type="checkbox"
                class="form-checkbox h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-600">
            <label for="remember" class="ml-3 block text-sm leading-6 text-gray-900">أبقني متصلاً</label>
        </div>
    </div>
</x-auth-layout>
