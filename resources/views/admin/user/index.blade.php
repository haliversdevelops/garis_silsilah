@extends('layouts.admin.app')
@section('main-title','User')
@section('sub-title','List')

@section('cta')
<button class="btn btn-md bg-primary text-white"  data-toggle="modal" data-target="#add"><i class="ti-plus"></i> Tambah</button>
@endsection
@section('content')

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th>Anak Ke</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $loop->first }}</td>
            <td>{{ $user->nickname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->birth_order }}</td>
            <td colspan="2">
                <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#edit{{ $user->id }}"><i class="ti-pencil-alt"></i></button>
                <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#confirm{{ $user->id }}"><i class="ti-trash"></i></button>
            </td>
        </tr>

        <div class="modal fade" id="confirm{{ $user->id }}" value="{{ $user->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="confirm">Konfirmasi</h5>
                    <button type="button" class="btn btn-sm btn-close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                </div>
                <div class="modal-body p-4">
                    Apakah anda yakin ingin mengapus data ini?
                </div>
                <div class="modal-footer">
                    <form method="POST" class="" action="{{ route('admin.user.destroy', $user->id) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-success">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="confirm">Tambah</h5>
                    <button type="button" class="btn btn-sm btn-close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                </div>
                <div class="modal-body p-4">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">Akun</a>
                        </li>
                    </ul>
                    <div class="tab-content py-4" id="tab">
                        <form method="POST" action="{{ route('admin.user.store') }}">
                        @csrf      
                        
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nickname"  placeholder="Nama Panggilan">
                            </div>
                            <div class="form-group d-flex">
                                
                                <div>
                                    <input type="radio" id="male" name="gender_id" value="1" >
                                    <label for="male" >Laki-Laki</label>
                                </div>
                                <div class="ml-4">
                                    <input type="radio" id="female" name="gender_id" value="2">
                                    <label for="female" >Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="dob">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="birth_order" placeholder="Anak Ke">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="photo_path">
                                <small>Format jpeg,png,jpg,gif, maks: 2048 Kb.</small>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control"  id="" placeholder="Nomor Telepon"></input>
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" id="" placeholder="Kota"></input>
                            </div>
                            <div class="form-group">
                                <textarea name="address" class="form-control" id="" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="" placeholder="Email"></input>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="" placeholder="Password"></input>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                        </form>
                    </div>
                </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="edit{{ $user->id }}" value="{{ $user->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="confirm">{{ $user->id ? 'Edit' : 'Tambah'}}</h5>
                    <button type="button" class="btn btn-sm btn-close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                </div>
                <div class="modal-body p-4">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">Akun</a>
                        </li>
                    </ul>
                    <div class="tab-content py-4" id="tab">
                        <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                        @csrf      
                        
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ $user->name}}" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nickname" value="{{ $user->nickname}}" placeholder="Nama Panggilan">
                            </div>
                            <div class="form-group d-flex">
                                
                                <div>
                                    <input type="radio" class="" id="male" name="gender_id" value="1" {{ $user->gender_id == 1 ? 'checked' : ''}}>
                                    <label for="male" >Laki-Laki</label>
                                </div>
                                <div class="ml-4">
                                    <input type="radio" class="" id="female" name="gender_id" value="2" {{ $user->gender_id == 2 ? 'checked' : ''}}>
                                    <label for="female" >Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="dob" value="{{ $user->dob }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="birth_order" value="{{ $user->birth_order }}" placeholder="Anak Ke">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="photo_path">
                                <small>Format jpeg,png,jpg,gif, maks: 2048 Kb.</small>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="form-group">
                                <input type="number" name="phone" value="{{ $user->phone }}" class="form-control"  id="" placeholder="Nomor Telepon"></input>
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" value="{{ $user->city }}" class="form-control" id="" placeholder="Kota"></input>
                            </div>
                            <div class="form-group">
                                <textarea name="address" class="form-control" id="" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <div class="form-group">
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="" placeholder="Email"></input>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="" placeholder="Password"></input>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                        </form>
                    </div>
                </div>

                </div>
            </div>
        </div>

        @endforeach
    </tbody>
</table>

@endsection