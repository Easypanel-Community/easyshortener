<div>
    <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

        <input type="text" wire:model="search" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
    </div>
    <br>
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Url
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        @if(config('easyshortener.enable_analytics') == "true")
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Redirects
                            </th>
                        @endif
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($links as $link)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $link->slug }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-500">{{ Str::limit($link->url, 40) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($link->is_enabled)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Inactive
                                            </span>
                                @endif
                            </td>
                            @if(config('easyshortener.enable_analytics') == "true")
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $link->redirects }}
                                </td>
                            @endif
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $link->created_at->toFormattedDateString() }}</div>
                                <div class="text-sm text-gray-500">{{ $link->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('links.edit', $link->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if (!$search)
                <div class="border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                    {!! $links->links() !!}
                </div>
                @endif
                <div>
                </div>
            </div>
        </div>

        @if ($links->isEmpty())
            <p class="text-gray-800 font-bold text-2xl text-center my-10">No links found!</p>
        @endif
    </div>
</div>
