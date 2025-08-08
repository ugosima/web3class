 <div id="material_list" class="hidden fixed inset-0   flex items-center justify-center z-100 dark:bg-gray-900 dark:text-gray-400">
                <div class=" p-6 rounded-lg max-w-md w-full bg-gray-800 text-gray-300 dark:bg-gray-900 dark:text-gray-400">
                    <h3 class="text-lg font-semibold mb-4">Table of contents</h3>
                    <ol class="list-decimal ml-6">
                        @foreach ($titles as $learning_cycle => $material_title)
                            @if ($learning_cycle <= $user->lesson_progress)
                                <li class="dark:bg-gray-900 dark:text-gray-400  marker:text-red-400"   ><a href="/viewmaterial/{{$learning_cycle}}" >{{ $material_title }}</a></li>
                                
                            @else
                                <li class=" dark:bg-gray-900 dark:text-gray-400 marker:text-red-400">  &#128274;   {{ $material_title }} </li>
                            @endif
                        @endforeach
                    </ol>
                    <button onclick="document.getElementById('material_list').classList.add('hidden')"  class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Close</button>
                </div>
                </div>