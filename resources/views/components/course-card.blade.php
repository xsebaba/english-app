
<div class="max-w-md py-4 px-6 mx-2 bg-white shadow-md shadow-green-700 rounded-lg my-20">
    <div class="flex justify-center md:justify-end -mt-16">
    <img class="w-20 h-20 object-cover rounded-full border-2 border-lime-500" src="{{ asset('/images/stat.jpg')}}">
    </div>
    <div>
    <h2 class="text-gray-800 text-3xl font-semibold"> {{ $course->course_name }}</h2>
    <p class="mt-2 text-gray-600">{{ $course->course_description}}</p>
    </div>
    <div class="flex justify-end mt-4">
    <a href="/course/{{$course->course_slug}}" class="text-xl font-medium text-lime-600">Sprawdź ten kurs!</a>
    </div>
</div>