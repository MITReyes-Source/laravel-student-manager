<x-layout>
    <h1>Students</h1>

    <a href="{{ route('students.create') }}">+ Add student</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>
                        <a href="{{ route('students.show', $student) }}">
                            {{ $student->first_name }} {{ $student->last_name }}
                        </a>
                    </td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->year_level }}</td>
                    <td>
                        @can('update', $student)
                            <a href="{{ route('students.edit', $student) }}">Edit</a>
                        @endcan

                        @can('delete', $student)
                            <form method="POST" action="{{ route('students.destroy', $student) }}" style="display:inline"
                                  onsubmit="return confirm('Delete this student?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
</x-layout>
