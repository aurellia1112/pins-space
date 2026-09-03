<x-guest-layout>
    <div class="p-8 sm:p-10">
        <!-- Logo & Header -->
        <div class="text-center mb-6">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-red-50 text-2xl mb-3 hover:scale-105 transition">
                📌
            </a>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                Daftar ke PinSpace
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Buat akun untuk mulai menyimpan inspirasimu.
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Lengkap
                </label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Nama Anda"
                    required
                    autofocus
                    autocomplete="name"
                    class="block w-full rounded-2xl border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-900 focus:border-[#e60023] focus:bg-white focus:ring-[#e60023] transition"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
            </div>

            <!-- Email Address -->
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
                    autocomplete="username"
                    class="block w-full rounded-2xl border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-900 focus:border-[#e60023] focus:bg-white focus:ring-[#e60023] transition"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Kata Sandi
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    required
                    autocomplete="new-password"
                    class="block w-full rounded-2xl border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-900 focus:border-[#e60023] focus:bg-white focus:ring-[#e60023] transition"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Konfirmasi Kata Sandi
                </label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="Ulangi kata sandi"
                    required
                    autocomplete="new-password"
                    class="block w-full rounded-2xl border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-900 focus:border-[#e60023] focus:bg-white focus:ring-[#e60023] transition"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5" />
            </div>

            <!-- Register Button -->
            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full rounded-full bg-[#e60023] hover:bg-[#c9001f] py-3 font-semibold text-white text-sm shadow-md transition duration-200"
                >
                    Daftar Sekarang
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center text-sm text-gray-500 pt-2">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold text-[#e60023] hover:underline">
                    Masuk di sini
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
