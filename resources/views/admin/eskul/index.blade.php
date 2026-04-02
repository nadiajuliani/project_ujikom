  @extends('layouts.admin')

  @section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">

              <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                  <h4 class="mb-0">Data Ekstrakurikuler</h4>
                  <a href="{{ route('admin.eskul.create') }}" class="btn btn-primary">Tambah Ekstrakurikuler</a>
              </div>

              <div class="card my-4">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3">
                          <h6 class="text-white text-capitalize m-0">Tabel Ekstrakurikuler</h6>
                      </div>
                  </div>

                  <div class="card-body px-0 pb-2">
                      <div class="table-responsive p-0">
                          <table class="table align-items-center mb-0">
                              <thead>
                                  <tr>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ekstrakurikuler</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pembina</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kontak Pembina</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi</th>
                                      <th class="text-secondary opacity-7">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($eskuls as $eskul)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $eskul->nama_eskul }}</td>
                                          <td>{{ $eskul->nama_pembina }}</td>
                                          <td>{{ $eskul->kontak_pembina }}</td>
                                          <td>{{ $eskul->alamat }}</td>
                                          <td>
                                              @if ($eskul->foto)
                                                  <img src="{{ asset('storage/' . $eskul->foto) }}" alt="{{ $eskul->nama_eskul }}" class="img-thumbnail" width="100">
                                              @endif
                                          </td>
                                          <td>{{ Str::limit($eskul->deskripsi, 10) }}</td>
                                          <td class="align-middle">
                                              <a class="btn btn-success btn-sm mb-1" href="{{ route('admin.eskul.edit', $eskul->id) }}">Edit</a>
                                              <form action="{{ route('admin.eskul.destroy', $eskul->id) }}" method="POST" class="d-inline">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          @if($eskuls->isEmpty())
                              <p class="text-center py-3 text-secondary">Belum ada data ekstrakurikuler.</p>
                          @endif
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
  @endsection
