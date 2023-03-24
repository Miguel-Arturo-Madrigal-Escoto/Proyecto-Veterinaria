<div class="max-w-sm rounded overflow-hidden shadow-lg dark:text-gray-300 mb-12">
    <img class="w-full" src="{{$image}}" alt="{{$alt}}">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2 text-center">{{ $title }}</div>
      <p class="text-gray-700 text-base text-justify">
        {{$slot}}
      </p>
    </div>
</div>
