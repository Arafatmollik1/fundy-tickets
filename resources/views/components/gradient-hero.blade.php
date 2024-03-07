<div
    {{
      $attributes->merge(
            [
                'class' =>
                'container flex flex-col md:rounded-2xl items-left justify-center bg-gradient-to-r from-green-400 to-blue-500 mx-auto px-4 h-28 sm:px-8'
             ]
         )
     }}
>
    <p class="font-bold text-white text-center"> {{$text}} </p>
</div>
