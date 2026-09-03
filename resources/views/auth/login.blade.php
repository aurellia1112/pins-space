<x-guest-layout>
    <div class="p-8 sm:p-10">
        <!-- Logo & Header -->
        <div class="text-center mb-6">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-red-50 text-2xl mb-3 hover:scale-105 transition">
                📌
            </a>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                Masuk ke PinSpace
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Temukan dan simpan berbagai inspirasi favoritmu.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    required
                    autofocus
                    autocomplete="username"
                    class="block w-full rounded-2xl border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-900 focus:border-[#e60023] focus:bg-white focus:ring-[#e60023] transition"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Kata Sandi
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-[#e60023] hover:underline">
                            Lupa sandi?
                        </a>
                    @endif
                </div>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan kata sandi"
                    required
                    autocomplete="current-password"
                    class="block w-full rounded-2xl border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-900 focus:border-[#e60023] focus:bg-white focus:ring-[#e60023] transition"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-[#e60023] shadow-sm focus:ring-[#e60023]"
                >
                <label for="remember_me" class="ml-2 text-sm text-gray-600">
                    Ingat saya
                </label>
            </div>

            <!-- Login Button -->
            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full rounded-full bg-[#e60023] hover:bg-[#c9001f] py-3 font-semibold text-white text-sm shadow-md transition duration-200"
                >
                    Masuk
                </button>
            </div>

            <!-- Register Link -->
            <div class="text-center text-sm text-gray-500 pt-2">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold text-[#e60023] hover:underline">
                    Daftar sekarang
                </a>
            </div>

            <!-- Back to Home -->
            <div class="text-center pt-2">
                <a href="{{ route('home') }}" class="text-xs text-gray-400 hover:text-gray-600 transition">
                    ← Kembali ke Beranda
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>