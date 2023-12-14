<div class="max-w-md py-4 px-6 mx-2 bg-white shadow-md shadow-green-700 rounded-lg my-20">
    <div class="flex justify-center md:justify-end -mt-16">
        <img class="w-120 h-120 object-cover rounded-2xl border-2 border-lime-500" src="{{ asset('/images/stat.jpg')}}">
    </div>
    <div>
        <h2 class="text-gray-800 text-3xl font-semibold"> {{ $product->name }}</h2>
        <p class="mt-2 text-gray-600">{{ substr($product->description, 0, 60)}}...</p>
    </div>
    <div class="flex justify-end mt-4">
        <a href="/product/{{$product->slug}}" class="text-xl font-medium text-lime-600">Sprawdź ten kurs!</a>
    </div>
</div>