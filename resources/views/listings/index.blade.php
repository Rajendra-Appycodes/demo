
<x-layout  title="Home" bodyclass="home-page">
    @include('partials._hero')
    @include('partials._search')
    @if (Session::has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="text-red-500 text-sm text-center"
            role="alert">
            <strong>Success:</strong> {{ Session::get('success') }}
        </div>
    @endif
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count($listings) == 0)
            <h2>
                {{ 'No Listings available' }}
            </h2>
        @else
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @endif

    </div>

    <div class="mt-6 p-8">
        {{ $listings->links() }}
    </div>

</x-layout>
