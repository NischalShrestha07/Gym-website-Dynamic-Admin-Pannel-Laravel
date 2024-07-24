{{--
<!DOCTYPE html>
<html>

<head>
    <!-- Include necessary CSS and JavaScript here -->
</head>

<body>
    <div class="container">
        <h1>Search Results</h1>
        <form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
            <input type="text" name="query" class="form-control mr-sm-2 border-dark" placeholder="Search..."
                value="{{ $search }}">
            <button class="btn my-2 my-sm-0 nav_search-btn" type="submit"><i class="fas fa-search"></i></button>
        </form>

        @if($find->isEmpty())
        <p>No results found for "{{ $search }}"</p>
        @else
        <ul>
            @foreach($find as $item)
            <li>{{ $item->fullname }}</li> <!-- Adjust based on the model's attributes -->
            @endforeach
        </ul>
        @endif
    </div>
</body>

</html> --}}