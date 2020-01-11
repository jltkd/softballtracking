@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-2/3 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex justify-content-end mb-5">
                <a class="text-right bg-transparent hover:bg-blue-900 text-blue-900 hover:text-white py-2 px-4 border border-blue-900 hover:border-transparent rounded" href="/atbat/create?p={{ $player->id }}">New At Bat</a>
            </div>

            @if(count($atbats))
                <div class="flex justify-content-end mb-5">
{{--                    <div class="w-1/3 p-3">--}}
{{--                        {!! $atbatsChart->container() !!}--}}
{{--                    </div>--}}
                    <div class="w-2/3">
                        {!! $hitsChart->container() !!}
                    </div>
                    <div class="w-1/3 p-3 flex flex-col justify-center text-center">
                        <h1 class="text-2xl font-bold">Batting<br>Average:</h1>
                        <p class="text-4xl pt-4">{{ $batavg }}</p>
                    </div>
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    At Bat | {{ $player->full_name }}
                </div>

                <div class="w-full p-6">
                    @if(count($atbats))
                        @livewire('atbat-table')
                    @else
                        <p>No At Bats Created.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
