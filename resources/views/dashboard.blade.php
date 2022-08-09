<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-3xl mx-auto px-4">
            <form class="grid grid-cols-1 gap-3" method='POST' action="/store" enctype="multipart/form-data">
                @csrf
                <label class="block">
                    <span class="text-gray-700">新しいタスク</span>
                    <input name="title" type="text" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm">
                </label>
                <button type='submit' class="w-20 bg-blue-600 hover:bg-blue-500 text-white rounded px-4 py-2">作成</button>
            </form>
            @foreach ($tasks as $task)
                <div class="flex flex-wrap justify-between p-2 my-5 bg-green-600 rounded">
                    <div class="text-white">{{ $task['title'] }}</div>
                    <div class="flex">
                        <!-- 編集ここから -->
                        <button type='submit' class="w-20 bg-blue-600 hover:bg-blue-500 text-white rounded px-4 py-2 mr-2" 
                        onclick="location.href='/edit/{{ $task['id'] }}'">編集</button>
                        <!-- 編集ここまで -->
                        <form method='POST' action="/delete/{{ $task['id'] }}" enctype="multipart/form-data">
                            @csrf
                            <button type='submit' class="w-20 bg-red-600 hover:bg-red-500 text-white rounded px-4 py-2">削除</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
