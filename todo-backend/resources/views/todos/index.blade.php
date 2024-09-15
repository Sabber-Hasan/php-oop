<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="New todo" required>
        <textarea name="description" placeholder="Description"></textarea>
        <button type="submit">Add Todo</button>
    </form>

    <ul>
        @foreach($todos as $todo)
            <li>
                <form action="{{ route('todos.update', $todo) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="completed" onchange="this.form.submit()"
                           {{ $todo->completed ? 'checked' : '' }}>
                </form>
                {{ $todo->title }}
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>