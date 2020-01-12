@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @auth()
                <div class="flex justify-content-end mb-5">
                    <a class="text-right bg-transparent hover:bg-blue-900 text-blue-900 hover:text-white py-2 px-4 border border-blue-900 hover:border-transparent rounded" href="/players/create">New Player</a>
                </div>
            @endauth

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Players
                </div>

                <div class="w-full p-6">
                    @if(count($players))
                        <table class="text-left w-full border-collapse">
                            <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Batting Avg.</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Pitching Avg.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($players as $player)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light"><a href="/players/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a></td>
                                    <td class="py-4 px-6 border-b border-grey-light">0.500</td>
                                    <td class="py-4 px-6 border-b border-grey-light">0.500</td>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No At Bats Created.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
