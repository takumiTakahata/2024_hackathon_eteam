
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h3 class="font-semibold text-lg text-gray-800">My Articles</h3>
                @if($articles->isEmpty())
                    <p>You have not posted any articles yet.</p>
                @else
                    <table class="table-auto w-full mb-6">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Content</th>
                                <th class="px-4 py-2">Published At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td class="border px-4 py-2">{{ $article->title }}</td>
                                    <td class="border px-4 py-2">{{ $article->content }}</td>
                                    <td class="border px-4 py-2">{{ $article->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <h3 class="font-semibold text-lg text-gray-800">My Questions</h3>
                @if($questions->isEmpty())
                    <p>You have not posted any questions yet.</p>
                @else
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Content</th>
                                <th class="px-4 py-2">Asked At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td class="border px-4 py-2">{{ $question->title }}</td>
                                    <td class="border px-4 py-2">{{ $question->content }}</td>
                                    <td class="border px-4 py-2">{{ $question->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
