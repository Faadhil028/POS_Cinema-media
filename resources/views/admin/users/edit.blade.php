<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-4">
                <a href="{{ route('admin.users.index') }}"
                    class="px-4 py-2 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">Index
                    User</a>
            </div>
            <h1 class="uppercase text-2xl font-semibold tracking-widest text-white ml-4 mt-10">Update User</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">

                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            value="{{ $user->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Pick Role --}}
                    <div class="mt-4">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pick
                            Role</label>
                        <select id="countries" name="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Choose Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" @if ($user->hasRole($role->name)) selected @endif>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a> -->
                    <div class="flex justify-end items-center mt-4">
                            <div class="mr-4 px-4 py-1 bg-rose-400 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="">Cancel</a>
                            </div>
                            <button type="submit"
                                        class="px-4 py-1 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                                        Submit
                            </button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
