<div class="bg-auto bg-cover bg-[url('/public/img/fondo2.jpg')]" 
>
    <div 
        class="flex flex-col  h-screen"
        x-data="{
            showSubcribe: @entangle('showSubscribe'),
            showSuccess: @entangle('showSuccess'),
        }">

        <nav class="pt-5 flex justify-between container mx-auto text-indigo-200">
            <a href="/" class="text-4xl font-bold">
                <x-application-logo class="w-16 h-16 fill-current">        
                </x-application-logo></a> 
            <div class="flex justify-end">
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <button class="flex justify-end">
                    <a href="{{ route('login') }}">Iniciar Sesion</a>
                </button>
                
            @endauth
        </div>        
    </nav>
        <div class="flex container mx-auto items-center h-full">
            <div class="flex w-1/3 flex-col items-start">
                <h1 class="font-bold text-white text-5xl leading-tight mb-4">
                Simple generic landing page to suscribe
                </h1>

                <p class="text-indigo-200 text-xl mb-5">
                    We are checking the <span class="font-bold underline"> TALL</span> stack. Woul you mind subscribing?
                </p>

                <button 
                class="rounded-md text-white py-3 px-8 bg-rose-600 hover:bg-rose-700" 
                x-on:click="showSubcribe=true">
                    Subscribe
                </button>
            </div>
        </div>
    <x-modal class="bg-rose-600 border border-gray border-2" trigger="showSubcribe" >
        <p class="text-white font-extrabold text-5xl text-center">
                Let´s Go
            </p>
            <form 
            class="flex flex-col items-center p-15"
            wire:submit.prevent="subscribe">
               <input class="rounded-md px-5 py-3 w-80" 
               type=email 
               name=email 
               placeholder="Email addres"
               wire:model.defer="email"
               ></input>
            <span class="text-gray-100 text-xs">
                  {{
                    $errors->has('email')
                    ? $errors->first('email')
                    : 'We will sen you a confirmation email.'
                  }}
            </span>
            <button class="rounded-md px-5 py-3 mt-5 w-80 bg-blue-500 justify-center">
                  <span class="animate-spin" wire:loading wire:target="subscribe">&#9696;</span>
                  <span wire:loading.remove wire:target="subscribe">Get in</span>
            </button>
            </form>
    </x-modal>
    <x-modal class="bg-green-500 " trigger="showSuccess" >
        <p class="animate-pulse text-white font-extrabold text-8xl text-center">
             &check;   
            </p>
            <p class="text-white font-extrabold text-3xl text-center mt-16">
                Great!
            </p>
            @if (request()->has('verified') && request()->verified == 1)
            <p class="text-white text-3xl text-center">
                Thanks for confirming.
            </p>
        @else
            <p class="text-white text-3xl text-center">
                See you in your inbox.
            </p>
        @endif
    </x-modal>
</div>
