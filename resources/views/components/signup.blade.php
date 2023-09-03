<section class="w-full bg-white tails-selected-element">
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col lg:flex-row">
            <div class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-gray-100">
                <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                    <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                        <div class="relative">
                            <p class="mb-2 font-medium text-gray-700 uppercase">Deep Dive into Pokémon</p>
                            <h2 class="text-5xl font-bold text-gray-900 xl:text-6xl">Train Your Pokémon Smarter</h2>
                        </div>
                        <p class="text-2xl text-gray-700">Experience Pokemon like never before. Train, collect, and master the world of Pokemon with our innovative app.</p>
                        <a href="#_" class="inline-block px-8 py-5 text-xl font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease" data-primary="blue-600" data-rounded="rounded-lg">Get Started Today</a>
                    </div>
                </div>
            </div>

            <div class="w-full bg-white lg:w-6/12 xl:w-5/12">
                <div class="flex flex-col items-start justify-start w-full h-full p-10 lg:p-16 xl:p-24">
                    <h4 class="w-full text-3xl font-bold">Signup</h4>
                    <p class="text-lg text-gray-500">or, if you have an account you can <a href="/login" class="text-blue-600 underline" data-primary="blue-600">sign in</a></p>
                    <form action="/register" method="POST" class="relative w-full mt-10 space-y-8" onsubmit="return validateForm()">
                        @csrf
                        <div class="relative">
                            <label class="font-medium text-gray-900">Name</label>
                            <input required name="name" type="text" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" data-primary="blue-600" data-rounded="rounded-lg" placeholder="Enter Your Name">
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900">Email</label>
                            <input required name="email" type="email" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" data-primary="blue-600" data-rounded="rounded-lg" placeholder="Enter Your Email Address">
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900">Password</label>
                            <input required name="password" id="password" type="password" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" data-primary="blue-600" data-rounded="rounded-lg" placeholder="Password">
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900">Confirm Password</label>
                            <input required name="confirm_password" id="confirmPassword" type="password" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" data-primary="blue-600" data-rounded="rounded-lg" placeholder="Password">
                            <div class="mt-3 text-red-600" id="error">
                                @error('name')
                                     <div class="text-red-500">{{ $message }}</div>
                                @enderror

                                @error('email')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror

                                @error('password')
                                     <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="relative">
                            <button class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease" data-primary="blue-600" data-rounded="rounded-lg">Create an account</button>
                            <a href="/auth/redirect/" class="inline-block w-full px-5 py-4 mt-3 text-lg font-bold text-center text-gray-900 transition duration-200 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 ease" data-rounded="rounded-lg">Sign up with Github</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
