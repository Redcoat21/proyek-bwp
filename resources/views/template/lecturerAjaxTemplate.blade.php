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
            const query = document.getElementById('search-navbar');
            if(query) {
                const result = query.value;
                // Make AJAX request
                $.ajax({
                    url: '/searchLecturer',
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
                    var desc = result.description !== null ? result.description : " ";
                    // Set the image URL based on the condition
                    container.innerHTML += `<div class="bg-white rounded shadow-md mx-2 my-5 px-5 py-5 flex items-center">
                        <img src="${result.profile_picture}" alt="Image Lecturer" class="rounded-full w-28 h-28">
                        <div class="flex-col mx-5">
                            <div class="text-2xl font-bold text-black mb-1">${result.name}</div>
                            <div class="text-xl font-italic text-gray-800">${desc}</div>
                        </div>
                        <a class="ml-auto text-white text-bold text-xl bg-blue-600 rounded py-1 px-3" href='lecturer/${result.username}'>See course</a>
                    </div>
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
