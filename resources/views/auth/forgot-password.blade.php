<x-app-layout>

    <form action="{{ route('password.email') }}" method="post" class="">
        @csrf
        <h2 class="">
            Enter your Email to reset password
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <p class="">
            hoặc
            <a
                href="{{ route('login') }}"
                class=""
            >
                đăng nhập với tài khoản hiện có
            </a>
        </p>

        <div class="mb-3">
            <x-input id="email" class="" type="email" name="email" :value="old('email')" required
                     autofocus placeholder="Nhập email"/>
        </div>
        <button
            class=""
        >
            Gửi link reset mật khẩu
        </button>
    </form>
</x-app-layout>
