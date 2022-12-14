<x-layout title="View" bodyclass="view_page">
    @include('partials._search')
    <a href="{{route('home-page')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{ asset('/images/no-image.png') }} " alt="" />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                <x-listing-tags :tagsCsv="$listing->tags" />

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $listing->description }}
                        <a href="/listings/{{$listing->email}}"
                            class="block bg-neutral-700 text-white py-2 rounded-xl hover:opacity-80 mt-4"><i
                                class="fa-solid fa-envelope"></i>
                            Contact Employer</a>

                        <a href="{{ $listing->website }}}}" target="_blank"
                            class="block bg-neutral-700 text-white py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-globe"></i> Visit
                            Website
                        </a>
                    </div>
                </div>
            </div>
        </div>


        {{-- <x-card class="mt-4 p-2 flex space-x-6"> --}}
        {{-- <div class="conatiner">
        <div class="row">     
            <div class="col-md-3 mt-3 mr-3 text-right">
                <form method="POST" action="/listings/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                         <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded"><a href="/listings/{{$listing->id}}/edit" class="text-white-500"> Edit</a></button>
                    
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">Delete</button>
                    </div>
                </form>
            </div>
            
        </div>      
    </div> --}}
        {{-- </x-card> --}}
    </div>
</x-layout>
