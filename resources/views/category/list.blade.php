<table class="table-hover table-bordered table">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Control</th>
        <th>Created_at</th>
    </tr>
    </thead>
    <tbody>

    @forelse(\App\Category::with("user")->get() as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->user->name}}</td>
            <td>
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-primary">
                    Edit
                </a>
                <form action="{{route('category.destroy',$category->id)}}" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete {{$category->title}} category?')">Delete</button>
                </form>
            </td>
            <td>
                <span class="small">
                    <i class="feather-calendar"></i>
                    {{$category->created_at->format("d-m-Y")}}
                </span>
                <br>
                <span class="small">
                <i class="feather-clock"></i>
                {{$category->created_at->format("h:i A")}}
            </span>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan=6" class="text-center">
                There is no Article
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
