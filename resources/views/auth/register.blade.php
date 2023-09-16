<x-auth-layout title="تسجيل الدخول" :action="route('auth.register')" submitMessage="تسجيل الدخول">
    <x-input name="name" label="الاسم واللقب" type="text" />
    <x-input name="email" label="البريد الإلكتروني" type="email" />
    <x-input name="password" label="كلمة السر" type="password" />
    <x-input name="password_confirmation" label="تأكيد كلمة السر" type="password" />
    <h1>هل لديك حساب؟<a class="mr-2 text-amber-500 hover:text-amber-600 hover:cursor-pointer"
            href="{{ route('auth.login') }}">تسجيل الدخول</a>
    </h1>
</x-auth-layout>
