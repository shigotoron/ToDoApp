<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            タスクの編集
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-3xl mx-auto px-4">
            <form class="grid grid-cols-1 gap-3" method='POST' action="/update/{{ $task['id'] }}" enctype="multipart/form-data">
                @csrf
                <label class="block">
                    <span class="text-gray-700">タスクの編集</span>
                    <input name="title" type="text" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $task['title'] }}">
                </label>
                <button type='submit' class="w-20 bg-blue-600 hover:bg-blue-500 text-white rounded px-4 py-2">更新</button>
            </form>
        </div>
    </div>
</x-app-layout>
