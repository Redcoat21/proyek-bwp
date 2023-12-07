<div x-data="{ count: 0 }">
    <h1 x-text="count">{{ $count }}</h1>

    <button x-on:click="count++">+</button>

    <button x-on:click="count--">-</button>
</div>
