@extends('admin.layouts.app')


@section('content')

<div class="flex flex-wrap justify-center mt-10">

<!-- card 1 -->
<div class="p-4 max-w-sm">
    <div class="flex rounded-lg h-full dark:bg-gray-500 bg-blue-500 p-8 flex-col">
        <div class="flex items-center mb-3">
            <div
                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full dark:bg-indigo-500 bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
            </div>
            <h2 class="text-white dark:text-white text-lg font-medium">Today's orders</h2>
        </div>
        <div class="flex flex-col justify-between flex-grow">
            <p class="leading-relaxed text-base text-white dark:text-gray-300 text-center">
               {{ $todaysOrders->count() }}
            </p>
            <div class="mx-auto text-xl font-bold text-white">Total {{ $todaysOrders->sum('total') }}</div>
        </div>
    </div>
</div>

<!-- card 2 -->
<div class="p-4 max-w-sm">
    <div class="flex rounded-lg h-full dark:bg-gray-800 bg-blue-500 p-8 flex-col">
        <div class="flex items-center mb-3">
            <div
                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full dark:bg-indigo-500 bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
            </div>
            <h2 class="text-white dark:text-white text-lg font-medium">Yesterady's orders</h2>
        </div>
        <div class="flex flex-col justify-between flex-grow">
            <p class="leading-relaxed text-base text-white dark:text-gray-300 text-center">
            {{ $yesterdayOrders->count() }}
            </p>
            <div class="mx-auto text-xl font-bold text-white">Total {{ $yesterdayOrders->sum('total') }}</div>
        </div>
    </div>
</div>

<!-- card 3 -->
<div class="p-4 max-w-sm">
    <div class="flex rounded-lg h-full dark:bg-gray-800 bg-blue-500 p-8 flex-col">
        <div class="flex items-center mb-3">
            <div
                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full dark:bg-indigo-500 bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
            </div>
            <h2 class="text-white dark:text-white text-lg font-medium">This Month orders</h2>
        </div>
        <div class="flex flex-col justify-between flex-grow">
            <p class="leading-relaxed text-base text-white dark:text-gray-300 text-center">
            {{ $monthOrders->count() }}
            </p>
            <div class="mx-auto text-xl font-bold text-white">Total {{ $monthOrders->count() }}</div>
        </div>
    </div>
</div>

<!-- card 4 -->
<div class="p-4 max-w-sm">
    <div class="flex rounded-lg h-full dark:bg-gray-800 bg-blue-500 p-8 flex-col">
        <div class="flex items-center mb-3">
            <div
                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full dark:bg-indigo-500 bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
            </div>
            <h2 class="text-white dark:text-white text-lg font-medium">This year orders</h2>
        </div>
        <div class="flex flex-col justify-between flex-grow">
            <p class="leading-relaxed text-base text-white dark:text-gray-300 text-center">
            {{ $yearOrders->count() }}
            </p>
            <div class="mx-auto text-xl font-bold text-white mt-6">Total {{ $yearOrders->count() }}</div>
        </div>
    </div>
</div>

</div>
@endsection