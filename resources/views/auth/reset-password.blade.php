<x-layouts.base>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img src="{{ asset('images/logo.png') }}" alt="Your Company" class="mx-auto h-32 w-auto" />
            <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Reset your password</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="bg-white px-6 py-12 shadow-sm sm:rounded-lg sm:px-12">
                <form action="{{ route('password.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}" />
                    <input type="hidden" name="email" value="{{ $email }}" />

                    <div>
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">New Password</label>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-green-600 sm:text-sm/6" />
                        </div>

                        <x-form.error field="password" />
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Confirm New Password</label>
                        <div class="mt-2">
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-green-600 sm:text-sm/6" />
                        </div>

                        <x-form.error field="password_confirmation" />
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-green-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.base>
