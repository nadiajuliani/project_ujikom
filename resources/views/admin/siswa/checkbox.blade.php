<form action="{{ route('admin.siswa.bulkDelete') }}" method="POST">
@csrf
@method('DELETE')

<table class="table">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="checkAll">
            </th>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
@foreach($siswa as $index => $item)
<tr>
    <td>
        <input type="checkbox" name="ids[]" value="{{ $item->id }}" class="checkItem">
    </td>
    <td>{{ $index+1 }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->email }}</td>
    <td>{{ $item->kelas }}</td>
    <td>{{ $item->role }}</td>
    <td>
        <a href="#" class="btn btn-warning btn-sm">EDIT</a>
        <a href="#" class="btn btn-danger btn-sm">HAPUS</a>
    </td>
    <button type="submit" class="btn btn-danger mb-3"
onclick="return confirm('Yakin hapus data yang dipilih?')">
    Hapus Yang Dipilih
</button>

</form>
</tr>
@endforeach
</tbody>
</table>
<script>
document.getElementById('checkAll').onclick = function () {

    // ambil semua checkbox siswa
    let checkboxes = document.querySelectorAll('.checkItem');

    // ulangi satu per satu
    checkboxes.forEach(function(cb) {
        cb.checked = document.getElementById('checkAll').checked;
    });

}
</script>

