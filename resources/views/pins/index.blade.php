<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Home</h1>

        @foreach ($pins as $pin)
            <div class="border rounded-lg p-4 mb-4">
                <h2 class="font-bold">{{ $pin->title }}</h2>
                <p>{{ $pin->description }}</p>
                <p>Dibuat oleh: {{ $pin->user->name }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>