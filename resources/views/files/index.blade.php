<x-layout title="Upload Arquivo">
    <form action="/files/save" method="post" enctype="multipart/form-data">
        @csrf
        <label>Arquivo</label>
            <input type="file" name="file"><br><br>
            <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</x-layout>