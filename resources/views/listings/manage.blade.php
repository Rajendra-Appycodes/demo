<x-layout  title="View" bodyclass="view_page">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage your Listings
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @if (count($listings) > 0)
                <tr>
                    <th class="px-4 py-8 border-t border-b border-gray-300 text-lg">Title</th>
                    <th class="px-4 py-8 border-t border-b border-gray-300 text-lg">Company</th>
                    <th class="px-4 py-8 border-t border-b border-gray-300 text-lg">Tags</th>
                    <th class="px-4 py-8 border-t border-b border-gray-300 text-lg">Location</th>
                    <th class="px-4 py-8 border-t border-b border-gray-300 text-lg">Operations</th>
                </tr>
                
                    @foreach ($listings as $listing)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">
                                <a href="">
                                    {{ $listing->title }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">
                                <a href="">
                                    {{ $listing->company }}                                
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">
                                <a href="">
                                    {{ $listing->tags }}
                                </a>
                            </td> 
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">
                                <a href="">
                                    {{ $listing->location }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">
                                <a href="/listings/{{ $listing->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>Edit
                                </a>
                                <form action="/listings/{{ $listing->id }}" method="POST">
                                    @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 px-6">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 text-lg">
                        <img src="{{asset('images/no-records.jpg')}}" class="mx-auto" alt=""/>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-6">
            <a href="{{route('home-page')}}" class="bg-neutral-700 text-white rounded py-3 px-3 hover:bg-black"> Back To Page </a>
        </div>
    </div>
</x-layout>
