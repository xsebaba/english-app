<a href="/lesson/{{$course->course_slug}}" class="w-full">
    <div class="flex py-2 {{ $loop->iteration % 2 === 0 ? '' : 'bg-white' }} rounded rounded-xl hover:bg-lime-300">
        <div class="w-30 px-2 py-2">
            <img class="w-16 h-16 object-cover rounded-full border-2 border-lime-500" src="{{ asset('/images/stat.jpg')}}">
        </div>
        <div class="w-72 px-2 py-2 md:text-lg text-sm text-gray-900 font-bold">{{ $course->course_name }}</div>
        <div class="w-5/12 px-2 py-2 text-sm text-gray-900 font-light md:flex hidden">{!! $course->course_description !!}</div>
    </div>
</a>