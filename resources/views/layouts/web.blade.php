<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Bling Craft</title>
   
</head>
<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('search-bar').addEventListener('keyup', function () {
        const query = this.value; // Get the input value
        const resultsContainer = document.getElementById('search-results');

        if (query.length > 1) { // Only search if query length > 1
            fetch(`/search?query=${query}`, {
                method: 'GET',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
            })
            .then(response => response.json())
            .then(data => {
                resultsContainer.innerHTML = ''; // Clear previous results
                if (data.length > 0) {
                    data.forEach(product => {
                        const li = document.createElement('li');
                        li.textContent = product.name;
                        li.classList.add('search-result-item');
                        li.addEventListener('click', () => {
                            window.location.href = `/products/${product.id}`; // Redirect on click
                        });
                        resultsContainer.appendChild(li);
                    });
                } else {
                    resultsContainer.innerHTML = '<li class="no-results">No results found</li>';
                }
            });
        } else {
            resultsContainer.innerHTML = ''; // Clear results if query is empty
        }
    });
</script>


</body>
</html>
