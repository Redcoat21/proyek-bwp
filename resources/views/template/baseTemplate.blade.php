<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
</head>
<body onload="loadItem()">
    <div>
        @yield('header')
    </div>
    <div>
        @yield('content')
    </div>

    <footer class="bg-white ">
        <div class="w-full mx-auto py-2 text-sm text-gray-900 text-center mt-8">
            © 2023 Kelompok BWP 13-19-25-36. All Rights Reserved.
        </div>
    </footer>
    <script>
        function searchItems() {
            const query = document.getElementById('search-navbar');
            if(query) {
                const result = query.value;
                // Make AJAX request
                $.ajax({
                    url: '/search',
                    type: 'GET',
                    data: {query: result},
                    success: function (data) {
                        // Update the results container
                        displayResults(data);
                        console.log('AJAX success');
                    }
                });
            }
        }

        function loadItem() {
            searchItems();
        }

        function displayResults(results) {

            var container = document.getElementById('search-results');
            container.innerHTML = '';
            if (results.length > 0) {
                results.forEach(function (result) {
                    // Set the image URL based on the condition
                    var img;
                    if (result.cover != "") {
                        img = result.cover;
                    } else {
                        img = "asset/aws.jpg";
                    }
                    var pp;
                    if(result.lecturers.profile_picture != ""){
                        pp = result.lecturers.profile_picture;
                    }
                    else{
                        pp = "asset/def_pp.jpg";
                    }

                    var route = '/course/' + result.id;

                    container.innerHTML += `<div class="rounded-lg hover:shadow-md w-4/5 border border-gray-200 ">
                        <a href="${route}" class="bg-white">
                            <img class="rounded-t-lg w-full" src="${img}" alt="">
                            <div class="p-5">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset('${pp}') }}" class="h-8 border-none rounded">
                                    <span class="self-center text-xs font-normal whitespace-nowrap">${result.lecturer}</span>
                                </div>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${result.name}</h5>
                                <p class="mb-3 font-normal text-gray-700">${result.description}</p>
                            </div>
                        </a></div>
                    `;
                });
            } else {
                container.innerHTML = `
                <div class="col-span-3">
                <p>No results found</p>
                </div>
                `;
            }
        }
    </script>
</body>
</html>
