<h1>{{ $category->name }}</h1>

<ul>
    @foreach ($projects as $project)
        <li>{{ $project->name }}</li>
    @endforeach
</ul>
