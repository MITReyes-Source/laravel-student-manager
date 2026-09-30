<x-layout>
    <h1>{{ $student->first_name }} {{ $student->last_name }}</h1>

    <p>Email: {{ $student->email }}</p>
    <p>Course: {{ $student->course }}</p>
    <p>Year level: {{ $student->year_level }}</p>

    @can('update', $student)
        <a href="{{ route('students.edit', $student) }}">Edit</a>
    @endcan

    @can('delete', $student)
        <form method="POST" action="{{ route('students.destroy', $student) }}"
              onsubmit="return confirm('Delete this student?')">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endcan

    <a href="{{ route('students.index') }}">&larr; Back to list</a>
</x-layout>
