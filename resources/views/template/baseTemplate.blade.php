<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
            var query = document.getElementById('search-navbar').value;

            // Make AJAX request
            $.ajax({
                url: '/search',
                type: 'GET',
                data: {query: query},
                success: function (data) {
                    // Update the results container
                    displayResults(data);
                    console.log('AJAX success');
                }
            });
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
                        img = "https://www.creativefabrica.com/wp-content/uploads/2021/04/05/Photo-Image-Icon-Graphics-10388619-1-1-580x386.jpg";
                    }
                    // Append UI structure for each result
                    container.innerHTML += `
                    <div class="bg-white p-1 rounded shadow-md pb-4 mx-2 mb-5 inline-block w-1/4">
                        <img src="${img}" alt="" class="h-full w-full rounded mb-3">
                        <div class="p-2 text-center">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/def_pp.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <div class="text-xl font-bold text-gray-800 mb-4 pt-3">${result.lecturer}</div>
                            </div>
                            <div class="text-lg text-gray-800 mb-4 pt-3 font-bold">${result.name}</div>
                            <p class="text-gray-600 mb-4">${result.description}</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                            </div>
                        </div>
                    </div>
                    `;
                });
            } else {
                container.innerHTML = '<p>No results found</p>';
            }
        }
    </script>
</body>
</html>
