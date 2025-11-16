@extends('layouts.index');

@section('title','Home page');

<div class="container-mx-auto px-10">


<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-20">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs bg-gray-700 uppercase text-gray-50 dark:bg-gray-700 dark:text-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product pictire
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($todos as $todo)
             <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <img class="w-12 h-12" src={{ ("pictures/".$todo->picture)}} alt="">
                </th>
                <td class="px-6 py-4">
                    {{$todo->name}}
                </td>
                <td class="px-6 py-4">
                    {{$todo->price}}
                </td>
                <td class="px-6 py-4 font-bold {{$todo->complete?'text-green-500': 'text-red-500'}}  " >
                   <form action="/todos/status/{{$todo->id}}" method="POST" class="cursor-pointer">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                         {{$todo->complete? 'complete': 'pending' }}
                    </button>

                </form>
                </td>
                <td class="px-6 py-4 flex justify-conter gap-4 items-center ">
                    <a href="todos/update/{{$todo->id}}"      class="font-medium rounded bg-blue-600 dark:bg-blue-500  px-4 py-2 text-white ">Edit</a>
                   <form action="/todos/delete/{{ $todo->id}}" method="post">
                @csrf
                @method('DELETE')
                 <button type="submit" href="#" class="font-medium rounded bg-red-600 dark:bg-red-500 text-white px-4 py-2 ">Delete</button>
            </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

</div>
