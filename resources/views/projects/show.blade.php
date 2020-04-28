@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <h2 class="text-gray-600 text-sm font-normal">My Projects</h2>
            <a href="/projects/create" class="button">New project</a>
        </div>
    </header>
    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-6">
                    <h2 class="text-gray-600 font-normal text-lg mb-3">Tasks</h2>
                    <div class="card">Lorem ipsum.</div>
                    {{-- tasks --}}
                </div>

                <div>
                    <h2 class="text-gray-600 font-normal text-lg mb-3">General notes</h2>

                    {{-- general notes --}}
                    <div class="card">Lorem ipsum.</div>
                </div>

            </div>
            <div class="lg:w-1/4 px-3">
                <div class="card">
                    <h1>{{ $project->title }}</h1>
                    <div>{{ $project->description }}</div>
                    <a href="/projects">Go Back</a>
                </div>
            </div>
        </div>
    </main>
@endsection