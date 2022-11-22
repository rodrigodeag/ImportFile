<div class="container">
<x-layout title="Upload Arquivo">
    <form action="/files/report" method="post" enctype="multipart/form-data">
        @csrf
        <label>Arquivo</label>
            <input type="file" name="file">
            <button type="submit" class="btn-black">Upload</button>
    </form>
</div>
</x-layout>