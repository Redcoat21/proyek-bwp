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
        function loadItem(){
            searchItems();
        }
        function displayResults(results) {
            var container = document.getElementById('search-results');
            container.innerHTML = '';

            if (results.length > 0) {
                results.forEach(function (result) {
                    container.innerHTML += '<p>' + result.name + '</p>'; // Adjust based on your model
                });
            } else {
                container.innerHTML = '<p>No results found</p>';
            }
        }
    </script>
</body>
</html>
