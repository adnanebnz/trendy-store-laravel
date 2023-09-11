<x-auth-layout title="تسجيل الدخول" :action="route('auth.login')" submitMessage="سجل حسابك">
    <x-input name="name" label="الاسم واللقب" type="text" />
    <x-input name="email" label="البريد الإلكتروني" type="email" />
    <x-input name="password" label="كلمة السر" type="password" />
</x-auth-layout>
