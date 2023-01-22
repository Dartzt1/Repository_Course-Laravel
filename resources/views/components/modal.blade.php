    @props(['trigger'])

<div
    class="flex fixed top-0 w-full h-full  bg-opacity-60 items-center"
    x-show="{{ $trigger }}"
    x-on:click.self="{{ $trigger }} = false"
    x-on:keydown.escape.window="{{ $trigger }} = false"
    x-cloak 
>
    <div {{ $attributes->merge(['class' => 'm-auto shadow-2xl rounded-xl p-8']) }}>
        {{ $slot }}
    </div>
</div>