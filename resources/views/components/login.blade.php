<section class="w-full px-8 py-16 bg-gray-100 xl:px-8 tails-selected-element" >
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col items-center md:flex-row">
            <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                <p class="font-medium text-blue-500 uppercase" data-primary="blue-500">Catch em' all</p>
                <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                    New to Pokémon? Get Started!
                </h2>
                <p class="text-xl text-gray-600 md:pr-16">Join us and embark on an exciting adventure. Create your account today and begin your quest to fill up your Pokédex!</p>
            </div>

            <div class="w-full mt-16 md:mt-0 md:w-2/5">
                <form action="/login" method="POST" class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7" data-rounded="rounded-lg" data-rounded-max="rounded-full">
                    <h3 class="mb-6 text-2xl font-medium text-center">Sign in to your Account</h3>
                    @csrf
            
                    <input required type="text" name="email" id="email" class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" data-rounded="rounded-lg" data-primary="blue-500" placeholder="Email address" value="{{ old('email') }}">
                    
                    <input required type="password" name="password" id="password" class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" data-rounded="rounded-lg" data-primary="blue-500" placeholder="Password">
                    

                    @error('email')
                         <div class="text-red-500 mb-4">{{ $message }}</div>
                    @enderror

                    <div class="block">
                        <button class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg" data-primary="blue-600" data-rounded="rounded-lg">Log Me In</button>
                        <a href="/auth/redirect/" class="inline-block w-full px-5 py-4 mt-3 text-lg font-bold text-center text-gray-900 transition duration-200 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 ease" data-rounded="rounded-lg">Login with Github</a>
                    </div>

                    
                    
                    <p class="w-full mt-4 text-sm text-center text-gray-500">Don't have an account? <a href="/register" class="text-blue-500 underline">Sign up here</a></p>
                </form>
            </div>
            

        </div>
    </div>
</section>