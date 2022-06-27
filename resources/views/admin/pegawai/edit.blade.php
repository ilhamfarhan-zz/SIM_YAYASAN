@extends('template.master')

    @section('title', 'Dashboard')
            @section('sidebar')
            <div class="sidebar-header">
                <h3><img src="{{url('template/admin/img/logoWk.png')}}" class="img-fluid"/><span>SIM YAYASAN</span></h3>
            </div>
            <ul class="list-unstyled components">
			    <li  class="">
                    <a style="text-decoration: none;" href="{{route('admin')}}" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>			
                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">person</i><span>Pegawai</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li class="active">
                            <a style="text-decoration: none;" href="{{ route('p_admin') }}">Data & Register Pegawai</a>
                        </li>
                        <li>
                            <a style="text-decoration: none;" href="{{ route('p_create') }}">Create Pegawai</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">email</i><span>Surat Keputusan</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                        <li class="">
                            <a style="text-decoration: none;" href="{{ route('sk_admin') }}">Data Surat Keputusan</a>
                        </li>
                        <li>
                            <a style="text-decoration: none;" href="{{ route('sk_create') }}">Create Surat Keputusan</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">folder</i><span>Slip Gaji</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <li class="">
                            <a style="text-decoration: none;" href="{{ route('sg_admin') }}">Data Slip Gaji</a>
                        </li>
                        <li class="">
                            <a style="text-decoration: none;" href="{{ route('sg_create') }}">Create Slip Gaji</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a style="text-decoration: none;" href="{{route('absen_admin')}}"><i class="material-icons">date_range</i><span>Absen</span></a>
                </li>
            </ul>
        @stop
        <!-- End of Sidebar -->
                @section('content')
                <div class="d-flex justify-content-between mb-5">
                    <div class="title">
                        <h3>Edit Data Pegawai</h3>
                    </div>
                    <div class="location">
                        Home / Pegawai / <span style="color: #2196F3;">Edit Data Pegawai</span>
                    </div>

                </div>

                
                <a style="text-decoration: none;" href="{{route('p_admin')}}" class="d-flex align-items-center">
                    <ion-icon name="return-up-back-outline" class="mr-2"></ion-icon>
                    Back
                </a>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                    </div>
                @endif
                    <form action="{{ route('p_update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="wrapperTable table-responsive">
                        <table id="pegawaiTable" class="tables" style="width:100%">
                            <thead>
                                    <tr>
                                        <th class="fw-bold"><span style="color: #2196F3;">Edit Data & Akun Pegawai</span>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                            </thead>
                            <tbody>
                                <td class="fw-bold">Edit Akun Pegawai</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label  class="form-label">NPP</label>
                                            <input name="npp" value="{{$user->npp}}" class="form-control" type="number" required>
                                          <td>
                                            <label  class="form-label">Nama</label>
                                            <input name="name" value="{{$user->name}}" class="form-control" type="text" required>
                                          </td>  
                                          <td>
                                            <label  class="form-label">Password</label> 
                                            <input name="password" class="form-control" type="password" required>
                                          </td>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label class="form-label">Jabatan</label>
                                            <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="jabatan" value="{{$user->jabatan}}" required>
                                                <option selected>Jabatan Pegawai</option>
                                                <option value="Guru Kelas"{{ $user->jabatan == "Guru Kelas" ? 'selected':'' }}>Guru Kelas</option>
                                                <option value="Guru Mata Pelajaran"{{ $user->jabatan == "Guru Mata Pelajaran" ? 'selected':'' }}>Guru Mata Pelajaran</option>
                                                <option value="Guru BK"{{ $user->jabatan == "Guru BK" ? 'selected':'' }}>Guru BK</option>
                                                <option value="Guru Inklusi"{{ $user->jabatan == "Guru Inklusi" ? 'selected':'' }}>Guru Inklusi</option>
                                                <option value="Tenaga Administrasi Sekolah"{{ $user->jabatan == "Tenaga Administrasi Sekolah" ? 'selected':'' }}>Tenaga Administrasi Sekolah</option>
                                                <option value="Guru Pendamping"{{ $user->jabatan == "Guru Pendamping" ? 'selected':'' }}>Guru Pendamping</option>
                                                <option value="Guru Magang"{{ $user->jabatan == "Guru Magang" ? 'selected':'' }}>Guru Magang</option>
                                                <option value="Guru TIK"{{ $user->jabatan == "Guru TIK" ? 'selected':'' }}>Guru TIK</option>
                                                <option value="Kepala Sekolah"{{ $user->jabatan == "Kepala Sekolah" ? 'selected':'' }}>Kepala Sekolah</option>
                                                <option value="Laboran"{{ $user->jabatan == "Laboran" ? 'selected':'' }}>Laboran</option>
                                                <option value="Pustakawan"{{ $user->jabatan == "Pustakawan" ? 'selected':'' }}>Pustakawan</option>
                                            </select>
                                            <td>
                                            <label class="form-label">Status</label>
                                            <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="status" required>
                                                <option selected>Status Pegawai</option>
                                                <option value="PNS"{{ $user->status == "PNS" ? 'selected':'' }}>PNS</option>
                                                <option value="PNS Diperbantukan"{{ $user->status == "PNS Diperbantukan" ? 'selected':'' }}>PNS Diperbantukan</option>
                                                <option value="PNS Depag"{{ $user->status == "PNS Depag" ? 'selected':'' }}>PNS Depag</option>
                                                <option value="GTY/PTY Kab/Kota"{{ $user->status == "GTY/PTY Kab/Kota" ? 'selected':'' }}>GTY/PTY Kab/Kota</option>
                                                <option value="GTT/PTT Propinsi"{{ $user->status == "GTT/PTT Propinsi" ? 'selected':'' }}>GTT/PTT Propinsi</option>
                                                <option value="Guru Bantu Pusat"{{ $user->status == "Guru Bantu Pusat" ? 'selected':'' }}>Guru Bantu Pusat</option>
                                                <option value="Guru Honor Sekolah"{{ $user->status == "Guru Honor Sekolah" ? 'selected':'' }}>Guru Honor Sekolah</option>
                                                <option value="Tenaga Honor"{{ $user->status == "Tenaga Honor" ? 'selected':'' }}>Tenaga Honor</option>
                                                <option value="CPNS"{{ $user->status == "CPNS" ? 'selected':'' }}>CPNS</option>
                                            </select>
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Identitas Sekolah</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Nama Sekolah</label>
                                            <input class="form-control" type="text" name="nama_sekolah" value="{{$user->nama_sekolah}}" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">NPSN</label>
                                                <input class="form-control" type="number" name="npsn" value="{{$user->npsn}}" required>
                                            </td>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Alamat Sekolah</label>
                                            <textarea class="form-control" type="text" name="alamat_sekolah" required>{{$user->alamat_sekolah}}</textarea>
                                            <td>
                                            </td>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <td class="fw-bold">Identitas Pegawai</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Nama Lengkap</label>
                                            <input class="form-control" type="text" name="nama_lengkap" value="{{$user->nama_lengkap}}"  required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">NIK</label>
                                                <input class="form-control" type="number" name="nik" value="{{$user->nik}}"  required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Laki - Laki" name="jk" id="flexRadioDefault1"  {{ ($user->jk=="Laki - Laki")? "checked" : "" }} required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Laki - Laki
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" Value="Perempuan" name="jk" id="flexRadioDefault2" {{ ($user->jk=="Perempuan")? "checked" : "" }}>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Tempat Lahir</label>
                                            <textarea class="form-control" type="text" name="ttl" required>{{$user->ttl}}</textarea>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Tanggal Lahir</label>
                                                <input class="form-control" type="text" name="tgl_lahir" value="{{$user->tgl_lahir}}" required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Nama Ibu</label>
                                                <input class="form-control" type="text" name="nama_ibu" value="{{$user->nama_ibu}}" required>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <td class="fw-bold">Data Pribadi</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Alamat Lengkap</label>
                                            <textarea class="form-control" type="text" name="alamat_lengkap" required>{{$user->alamat_lengkap}}</textarea>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Lintang</label>
                                                <input class="form-control" type="number" name="lintang" value="{{$user->lintang}}" required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Bujur</label>
                                                <input class="form-control" type="number" name="bujur" value="{{$user->bujur}}" required>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">No. Kartu Keluarga</label>
                                            <input class="form-control" type="number" name="kk" value="{{$user->kk}}" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Kode Pos</label>
                                                <input class="form-control" type="number" name="kode_pos" value="{{$user->kode_pos}}" required>
                                            </td>
                                            <td>
                                            <label class="form-label">Agama</label>
                                            <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="agama" required>
                                                <option selected>Pilih Agama</option>
                                                <option value="Islam"{{ $user->agama == "Islam" ? 'selected':'' }}>Islam</option>
                                                <option value="Kristen/Protestan" {{ $user->agama == "Kristen/Protestan" ? 'selected':'' }}>Kristen/Protestan</option>
                                                <option value="Katholik" {{ $user->agama == "Katholik" ? 'selected':'' }}>Katholik</option>
                                                <option value="Hindu" {{ $user->agama == "Hindu" ? 'selected':'' }}>Hindu</option>
                                                <option value="Budha" {{ $user->agama == "Budha" ? 'selected':'' }}>Budha</option>
                                                <option value="Khong Hu Chu" {{ $user->agama == "Khong Hu Chu" ? 'selected':'' }}>Khong Hu Chu</option>
                                                <option value="Kepercayaan Kepada Tuhan YME" {{ $user->agama == "Kepercayaan Kepada Tuhan YME" ? 'selected':'' }}>Kepercayaan Kepada Tuhan YME</option>
                                            </select>
                                            </td>
                                        </div>
                                    </td>
                                </tr>                        
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">NPWP</label>
                                            <input class="form-control" type="number" value="{{$user->npwp}}" name="npwp" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Nama Wajib Pajak</label>
                                                <input class="form-control" type="text" name="nama_pajak" value="{{$user->nama_pajak}}" required>
                                            </td>
                                            <td>
                                            <label class="form-label">Status Perkawinan</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Kawin" name="kawin" id="flexRadioDefault3" {{ ($user->kawin=="Kawin")? "checked" : "" }} required>
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        Kawin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" Value="Belum Kawin" name="kawin" id="flexRadioDefault4" {{ ($user->kawin=="Belum Kawin")? "checked" : "" }}>
                                                    <label class="form-check-label" for="flexRadioDefault4">
                                                        Belum Kawin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" Value="Janda/Duda" name="kawin" id="flexRadioDefault5" {{ ($user->kawin=="Janda/Duda")? "checked" : "" }}>
                                                    <label class="form-check-label" for="flexRadioDefault5">
                                                        Janda/Duda
                                                    </label>
                                                </div>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Kewarganegaraan</label>
                                            <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Indonesia(WNI)" name="kewarganegaraan" id="flexRadioDefault6" {{ ($user->kewarganegaraan=="Indonesia(WNI)")? "checked" : "" }} required>
                                                    <label class="form-check-label" for="flexRadioDefault6">
                                                        Indonesia(WNI)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" Value="Asing(WNA)"  name="kewarganegaraan" id="flexRadioDefault7" {{ ($user->kewarganegaraan=="Asing(WNA)")? "checked" : "" }}>
                                                    <label class="form-check-label" for="flexRadioDefault7">
                                                        Asing(WNA)
                                                    </label>
                                                </div>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Nama Negara</label>
                                                <input class="form-control" type="text" name="nama_negara" value="{{$user->nama_negara}}">
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Nama Pasangan</label>
                                            <input class="form-control" type="text" name="nama_pasangan" value="{{$user->nama_pasangan}}">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">NIP Pasangan</label>
                                                <input class="form-control" type="number" name="nip_pasangan" value="{{$user->nip_pasangan}}">
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Pekerjaan Pasangan</label>
                                                <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="pekerjaan_pasangan" required>
                                                    <option selected>Pilih Pekerjaan Pasangan</option>
                                                    <option value="Tidak Berkerja" {{ $user->pekerjaan_pasangan == "Tidak Berkerja" ? 'selected':'' }}>Tidak Berkerja</option>
                                                    <option value="Nelayan" {{ $user->pekerjaan_pasangan == "Nelayan" ? 'selected':'' }}>Nelayan</option>
                                                    <option value="Petani" {{ $user->pekerjaan_pasangan == "Petani" ? 'selected':'' }}>Petani</option>
                                                    <option value="Peternak" {{ $user->pekerjaan_pasangan == "Peternak" ? 'selected':'' }}>Peternak</option>
                                                    <option value="PNS/TNI/Polri" {{ $user->pekerjaan_pasangan == "PNS/TNI/Polri" ? 'selected':'' }}>PNS/TNI/Polri</option>
                                                    <option value="GTT/PTT" {{ $user->pekerjaan_pasangan == "GTT/PTT" ? 'selected':'' }}>GTT/PTT</option>
                                                    <option value="Pedagang Besar" {{ $user->pekerjaan_pasangan == "Pedagang Besar" ? 'selected':'' }}>Pedagang Besar</option>
                                                    <option value="Karyawan Swasta" {{ $user->pekerjaan_pasangan == "Karyawan Swasta" ? 'selected':'' }}>Karyawan Swasta</option>
                                                    <option value="Pensiunan" {{ $user->pekerjaan_pasangan == "Pensiunan" ? 'selected':'' }}>Pensiunan</option>
                                                    <option value="Buruh" {{ $user->pekerjaan_pasangan == "Buruh" ? 'selected':'' }}>Buruh</option>
                                                    <option value="Sudah Meninggal" {{ $user->pekerjaan_pasangan == "Sudah Meninggal" ? 'selected':'' }}>Sudah Meninggal</option>
                                                    <option value="TKI" {{ $user->pekerjaan_pasangan == "TKI" ? 'selected':'' }}>TKI</option>
                                                    <option value="Tidak Dapat Diterapkan" {{ $user->pekerjaan_pasangan == "Tidak Dapat Diterapkan" ? 'selected':'' }}>Tidak Dapat Diterapkan</option>
                                            </select>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">NIY</label>
                                            <input class="form-control" type="number" name="niy" value="{{$user->niy}}" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">NUPTK</label>
                                                <input class="form-control" type="number" name="nuptk" value="{{$user->nuptk}}" required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Sumber Gaji</label>
                                                <input class="form-control" type="text" name="sumber_gaji" value="{{$user->sumber_gaji}}" required>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Kartu Pegawai</label>
                                            <input class="form-control" type="number" name="kartu_pegawai" value="{{$user->kartu_pegawai}}" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Kartu Pasangan</label>
                                                <input class="form-control" type="number" name="kartu_pasangan" value="{{$user->kartu_pasangan}}">
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <td class="fw-bold">Kontak</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Nomor Telepon Rumah</label>
                                            <input class="form-control" type="number" name="nomor_rumah" value="{{$user->nomor_rumah}}" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Nomor HP</label>
                                                <input class="form-control" type="number" name="nomor_hp" value="{{$user->nomor_hp}}" required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">email</label>
                                                <input class="form-control" type="email" name="email" value="{{$user->email}}" required>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <td class="fw-bold">Keluar</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                        <label for="exampleInputform5" class="form-label">Status Aktif</label>
                                            <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Aktif" name="status_user" id="flexRadioDefault8" {{ ($user->status_user=="Aktif")? "checked" : "" }} required>
                                                    <label class="form-check-label" for="flexRadioDefault8">
                                                    Aktif
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" Value="Keluar"  name="status_user" id="flexRadioDefault9" {{ ($user->status_user=="Keluar")? "checked" : "" }}>
                                                    <label class="form-check-label" for="flexRadioDefault9">
                                                    Keluar
                                                    </label>
                                                </div>
                                            <td>
                                            <label for="exampleInputform1" class="form-label">Keluar Karena</label>
                                            <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="keluar">
                                                    <option selected>Pilih Keluar Karena</option>
                                                    <option value="Mutasi" {{ $user->keluar == "Mutasi" ? 'selected':'' }}>Mutasi</option>
                                                    <option value="Dikeluarkan" {{ $user->keluar == "Dikeluarkan" ? 'selected':'' }}>Dikeluarkan</option>
                                                    <option value="Mengundurkan Diri" {{ $user->keluar == "Mengundurkan Diri" ? 'selected':'' }}>Mengundurkan Diri</option>
                                                    <option value="Wafat" {{ $user->keluar == "Wafat" ? 'selected':'' }}>Wafat</option>
                                                    <option value="Hilang" {{ $user->keluar == "Hilang" ? 'selected':'' }}>Hilang</option>
                                                    <option value="Alih Fungsi" {{ $user->keluar == "Alih Fungsi" ? 'selected':'' }}>Alih Fungsi</option>
                                                    <option value="Pensiun" {{ $user->keluar == "Pensiun" ? 'selected':'' }}>Pensiun</option>
                                            </select>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Tanggal Keluar</label>
                                                <input class="form-control" type="date" name="tanggal_keluar">
                                            </td>
                                            <td>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary mt-6" style="pandding:30%;width:100%;"><h3>Kirim</h3></button>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                      </form>
                    @stop