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
                        <li>
                            <a style="text-decoration: none;" href="{{ route('p_admin') }}">Data & Register Pegawai</a>
                        </li>
                        <li class="active">
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
                        <h3>Tambah Data Pegawai</h3>
                    </div>
                    <div class="location">
                        Home / Pegawai / <span style="color: #2196F3;">Tambah Data Pegawai</span>
                    </div>

                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                
                <a style="text-decoration: none;" href="{{route('p_admin')}}" class="d-flex align-items-center">
                    <ion-icon name="return-up-back-outline" class="mr-2"></ion-icon>
                    Back
                </a>
                <form action="{{ route('p_store') }}" method="POST">
                    @csrf
                    <div class="wrapperTable table-responsive">
                        <table id="pegawaiTable" class="tables" style="width:100%">
                            <thead>
                                    <tr>
                                        <th class="fw-bold"><span style="color: #2196F3;">Tambah Data & Akun Pegawai</span>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                            </thead>
                            <tbody>
                                <td class="fw-bold">Register Akun Pegawai</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label  class="form-label">NPP</label>
                                            <input name="npp" class="form-control" type="number" required>
                                          <td>
                                            <label  class="form-label">Nama</label>
                                            <input name="name" class="form-control" type="text" required>
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
                                            <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="jabatan" required>
                                                <option selected>Jabatan Pegawai</option>
                                                <option value="Guru Kelas">Guru Kelas</option>
                                                <option value="Guru Mata Pelajaran">Guru Mata Pelajaran</option>
                                                <option value="Guru BK">Guru BK</option>
                                                <option value="Guru Inklusi">Guru Inklusi</option>
                                                <option value="Tenaga Administrasi Sekolah">Tenaga Administrasi Sekolah</option>
                                                <option value="Guru Pendamping">Guru Pendamping</option>
                                                <option value="Guru Magang">Guru Magang</option>
                                                <option value="Guru TIK">Guru TIK</option>
                                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                <option value="Laboran">Laboran</option>
                                                <option value="Pustakawan">Pustakawan</option>
                                            </select>
                                            <td>
                                            <label class="form-label">Status</label>
                                            <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="status" required>
                                                <option selected>Status Pegawai</option>
                                                <option value="PNS">PNS</option>
                                                <option value="PNS Diperbantukan">PNS Diperbantukan</option>
                                                <option value="PNS Depag">PNS Depag</option>
                                                <option value="GTY/PTY Kab/Kota">GTY/PTY Kab/Kota</option>
                                                <option value="GTT/PTT Propinsi">GTT/PTT Propinsi</option>
                                                <option value="Guru Bantu Pusat">Guru Bantu Pusat</option>
                                                <option value="Guru Honor Sekolah">Guru Honor Sekolah</option>
                                                <option value="Tenaga Honor">Tenaga Honor</option>
                                                <option value="CPNS">CPNS</option>
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
                                            <input class="form-control" type="text" name="nama_sekolah" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">NPSN</label>
                                                <input class="form-control" type="number" name="npsn" required>
                                            </td>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Alamat Sekolah</label>
                                            <textarea class="form-control" type="text" name="alamat_sekolah" required></textarea>
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
                                            <input class="form-control" type="text" name="nama_lengkap" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">NIK</label>
                                                <input class="form-control" type="number" name="nik" required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Laki - Laki" name="jk" id="flexRadioDefault1" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Laki - Laki
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" Value="Perempuan" name="jk" id="flexRadioDefault2" checked>
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
                                            <textarea class="form-control" type="text" name="ttl" required></textarea>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Tanggal Lahir</label>
                                                <input class="form-control" type="date" name="tgl_lahir" required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Nama Ibu</label>
                                                <input class="form-control" type="text" name="nama_ibu" required>
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
                                            <textarea class="form-control" type="text" name="alamat_lengkap" required></textarea>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Lintang</label>
                                                <input class="form-control" type="number" name="lintang" required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Bujur</label>
                                                <input class="form-control" type="number" name="bujur" required>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">No. Kartu Keluarga</label>
                                            <input class="form-control" type="number" name="kk" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Kode Pos</label>
                                                <input class="form-control" type="number" name="kode_pos" required>
                                            </td>
                                            <td>
                                            <label class="form-label">Agama</label>
                                            <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="agama" required>
                                                <option selected>Pilih Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen/Protestan">Kristen/Protestan</option>
                                                <option value="Katholik">Katholik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Khong Hu Chu">Khong Hu Chu</option>
                                                <option value="Kepercayaan Kepada Tuhan YME">Kepercayaan Kepada Tuhan YME</option>
                                            </select>
                                            </td>
                                        </div>
                                    </td>
                                </tr>                        
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">NPWP</label>
                                            <input class="form-control" type="number" name="npwp" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Nama Wajib Pajak</label>
                                                <input class="form-control" type="text" name="nama_pajak" required>
                                            </td>
                                            <td>
                                            <label class="form-label">Status Perkawinan</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Kawin" name="kawin" id="flexRadioDefault3" required>
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        Kawin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" Value="Belum Kawin" name="kawin" id="flexRadioDefault4">
                                                    <label class="form-check-label" for="flexRadioDefault4">
                                                        Belum Kawin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" Value="Janda/Duda" name="kawin" id="flexRadioDefault5" checked>
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
                                                    <input class="form-check-input" type="radio" value="Indonesia(WNI)" name="kewarganegaraan" id="flexRadioDefault6" required>
                                                    <label class="form-check-label" for="flexRadioDefault6">
                                                        Indonesia(WNI)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" Value="Asing(WNA)" name="kewarganegaraan" id="flexRadioDefault7">
                                                    <label class="form-check-label" for="flexRadioDefault7">
                                                        Asing(WNA)
                                                    </label>
                                                </div>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Nama Negara</label>
                                                <input class="form-control" type="text" name="nama_negara">
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Nama Pasangan</label>
                                            <input class="form-control" type="text" name="nama_pasangan">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">NIP Pasangan</label>
                                                <input class="form-control" type="number" name="nip_pasangan">
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Pekerjaan Pasangan</label>
                                                <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="pekerjaan_pasangan" required>
                                                    <option selected>Pilih Pekerjaan Pasangan</option>
                                                    <option value="Tidak Berkerja">Tidak Berkerja</option>
                                                    <option value="Nelayan">Nelayan</option>
                                                    <option value="Petani">Petani</option>
                                                    <option value="Peternak">Peternak</option>
                                                    <option value="PNS/TNI/Polri">PNS/TNI/Polri</option>
                                                    <option value="GTT/PTT">GTT/PTT</option>
                                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                    <option value="Pensiunan">Pensiunan</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Sudah Meninggal">Sudah Meninggal</option>
                                                    <option value="TKI">TKI</option>
                                                    <option value="Tidak Dapat Diterapkan">Tidak Dapat Diterapkan</option>
                                            </select>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">NIY</label>
                                            <input class="form-control" type="number" name="niy" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">NUPTK</label>
                                                <input class="form-control" type="number" name="nuptk" required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Sumber Gaji</label>
                                                <input class="form-control" type="text" name="sumber_gaji" required>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Kartu Pegawai</label>
                                            <input class="form-control" type="number" name="kartu_pegawai" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Kartu Pasangan</label>
                                                <input class="form-control" type="number" name="kartu_pasangan">
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
                                            <input class="form-control" type="number" name="nomor_rumah" required>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Nomor HP</label>
                                                <input class="form-control" type="number" name="nomor_hp" required>
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">email</label>
                                                <input class="form-control" type="email" name="email" required>
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