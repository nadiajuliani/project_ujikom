
  @extends('layouts.admin')
  @section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">
              <div class="card my-4">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3">
                          <h6 class="text-white text-capitalize m-0">Tabel Ekstrakurikuler</h6>
                      </div>
                  </div>

                  <div class="card-body px-0 pb-2">
                     <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h4 class="dark:text-white">Table Formulir</h4>
              <form method="GET" action="{{ route('admin.daftar_eskul.index') }}" class="mb-4 flex flex-wrap gap-4">
                {{-- Ekstrakurikuler --}}
                <div>
                    <span class="dark:text-white">Sortir Berdasarkan Ekstrakurikuler:</span>
                    <select name="ekstrakurikuler" onchange="this.form.submit()" class="border rounded px-3 py-2">
                        <option value="">-- Semua Ekstrakurikuler --</option>
                        @foreach ($eskul as $item)
                            <option value="{{ $item->nama_eskul }}" {{ request('ekstrakurikuler') == $item->nama_eskul ? 'selected' : '' }}>
                                {{ $item->nama_eskul }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                {{-- Kelas --}}
                <div>
                    <span class="dark:text-white">Sortir Berdasarkan Kelas:</span>
                    <select name="kelas" onchange="this.form.submit()" class="border rounded px-3 py-2">
                        <option value="">-- Semua Kelas --</option>
                        @foreach ($kelasList as $kelas)
                            <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>
                                {{ $kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>             
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
              <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                  <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nomor</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kelas</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Eskul Yang Dipilih</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun Ajaran</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nomor Telepon</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Alasan</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($daftar as $eskul)
                        <tr>
                            <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ $eskul->user->name ?? '-' }}</td>
                            <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ $eskul->kelas }}</td>
                            <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ $eskul->eskul->nama_eskul ?? '-' }}</td>
                            <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ $eskul->tahun_ajaran }}</td>
                            <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ $eskul->no_telp }}</td>
                            <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ $eskul->alasan }}</td>
                            <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                <a class="btn btn-success" href="{{ route('admin.daftar_eskul.edit', $eskul) }}">Edit</a>
                                <form action="{{ route('admin.daftar_eskul.destroy', $eskul) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
  @endsection
