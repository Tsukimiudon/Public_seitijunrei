<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('パスワード再設定用のリンクを送ります。パスワードを再設定したいアカウントのメールアドレスを入力してください。') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <input type="submit" class="btn btn-rose-outline ml-3" value="パスワード再設定用のメールを送る"/>
        </div>
    </form>
</x-guest-layout>
