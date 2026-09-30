<x-layout>
    <h1>Add student</h1>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('students.store') }}">
        @csrf

        <label>First name</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" required>

        <label>Last name</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Course</label>
        <input type="text" name="course" value="{{ old('course') }}" required>

        <label>Year level</label>
        <input type="number" name="year_level" min="1" max="6" value="{{ old('year_level', 1) }}" required>

        <button type="submit">Save</button>
    </form>
</x-layout>
