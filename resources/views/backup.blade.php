<form action="{{ route('backup.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Import</button>
</form>

@if (session()->has('success'))
    <div class="w-50 alert alert-success m-auto mt-5"> {{ session('success') }}</div>
@endif

<a href="{{ route('backup.export') }}">Export</a>
