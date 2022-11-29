@include('../template/header');
@include('../template/sidebar');
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-users mr-1"></i>
                  Matkul
              </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item" style="margin:20px;margin-top:0px;margin-bottom:0px">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                    <i class="fas fa-plus">PG</i>
                  </button>
                </li>
                <li class="nav-item">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example">
                    <i class="fas fa-plus">ISIAN</i>
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Nama Ujian</th>
                <th>Soal</th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>Jawaban</th>
                <th>Edit</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
                @foreach ($datas as $d)
                  <tr>
                    <td>{{ $d->no }}</td>
                    <td>{{ $d->nama_ujian }}</td>
                    <td>{{ $d->soal}}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td align="center"><button type="button" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#exampleModalss{{$i}}"><i class="fas fa-edit"></i></button></td>
                    <td align="center"><button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#exampleModals{{$i}}"><i class="fas fa-trash"></i></button></td>
                    </tr>
                   <div class="modal fade" id="exampleModals{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form method="post" action="{{route('delete_soal_isian')}}">
                        @csrf
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            Apakah anda yakin ingin menghapus data {{$d->nama_ujian}}?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="text" value="{{$d->id}}" name="del"style="display:none">
                            <input  type="submit" class="btn btn-sm bg-danger" value="DELETE">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <div class="modal fade" id="exampleModalss{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <form method="post" action="{{route('edit_soal_isian')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Soal</label>
                            <div class="col-sm-6">
                              <textarea name="soal" class="form-control">{{$d->soal}}</textarea>
                            </div>
                          </div> 
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Nama Ujian</label>
                            <div class="col-sm-6">
                              <select name="id_ujian" class="form-control" placeholder="" required>
                                @foreach ($data as $a)
                                  <option value="{{$a->id}}">{{$a->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div> 
                          
                          
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="text" value="{{ $d->id }}" name="del"style="display:none">
                          <input  type="submit" class="btn btn-sm bg-warning" value="EDIT">
                        </div>
                      </div>
                      </form>
                      </div>
                    </div>
                    {{$i++}}
                  @endforeach
                @foreach ($data_user as $d)
                  <tr>
                    <td>{{ $d->no }}</td>
                    <td>{{ $d->nama_ujian }}</td>
                    <td>{{ $d->soal}}</td>
                    <td>{{ $d->a}}</td>
                    <td>{{ $d->b}}</td>
                    <td>{{ $d->c}}</td>
                    <td>{{ $d->d}}</td>
                    <td>{{ $d->jawaban}}</td>
                    <td align="center"><button type="button" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#exampleModalss{{$i}}"><i class="fas fa-edit"></i></button></td>
                    <td align="center"><button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#exampleModals{{$i}}"><i class="fas fa-trash"></i></button></td>
                    </tr>
                   <div class="modal fade" id="exampleModals{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form method="post" action="{{route('delete_soal_pg')}}">
                        @csrf
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            Apakah anda yakin ingin menghapus data {{$d->nama_ujian}}?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="text" value="{{$d->id}}" name="del"style="display:none">
                            <input  type="submit" class="btn btn-sm bg-danger" value="DELETE">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <div class="modal fade" id="exampleModalss{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <form method="post" action="{{route('edit_soal_pg')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Soal</label>
                            <div class="col-sm-6">
                              <textarea name="soal" class="form-control">{{$d->soal}}</textarea>
                            </div>
                          </div> 
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Nama Ujian</label>
                            <div class="col-sm-6">
                              <select name="id_ujian" class="form-control" placeholder="" required>
                                @foreach ($data as $a)
                                  <option value="{{$a->id}}">{{$a->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div> 
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">A</label>
                            <div class="col-sm-6">
                              <textarea name="a" class="form-control">{{$d->a}}</textarea>
                            </div>
                          </div> 
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">B</label>
                            <div class="col-sm-6">
                              <textarea name="b" class="form-control">{{$d->b}}</textarea>
                            </div>
                          </div> 
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">C</label>
                            <div class="col-sm-6">
                              <textarea name="c" class="form-control">{{$d->c}}</textarea>
                            </div>
                          </div> 
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">D</label>
                            <div class="col-sm-6">
                              <textarea name="d" class="form-control">{{$d->d}}</textarea>
                            </div>
                          </div> 
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Jawaban</label>
                            <div class="col-sm-6">
                              <select name="jawaban" class="form-control">
                                <option value="a">A</value>
                                <option value="b">B</value>
                                <option value="c">C</value>
                                <option value="d">D</value>
                              </select>
                            </div>
                          </div> 
                          
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="text" value="{{ $d->id }}" name="del"style="display:none">
                          <input  type="submit" class="btn btn-sm bg-warning" value="EDIT">
                        </div>
                      </div>
                      </form>
                      </div>
                    </div>
                    {{$i++}}
                  @endforeach

                  </tbody>
                </table>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="post" action="{{ route('add_soal_pg') }}" enctype="multipart/form-data">
  @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Soal</label>
          <div class="col-sm-6">
            <textarea name="soal" class="form-control"></textarea>
          </div>
        </div> 
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Nama Ujian</label>
          <div class="col-sm-6">
            <select name="id_ujian" class="form-control" placeholder="" required>
              @foreach ($data as $a)
                <option value="{{$a->id}}">{{$a->nama}}</option>
              @endforeach
            </select>
          </div>
        </div> 
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">A</label>
          <div class="col-sm-6">
            <textarea name="a" class="form-control"></textarea>
          </div>
        </div> 
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">B</label>
          <div class="col-sm-6">
            <textarea name="b" class="form-control"></textarea>
          </div>
        </div> 
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">C</label>
          <div class="col-sm-6">
            <textarea name="c" class="form-control"></textarea>
          </div>
        </div> 
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">D</label>
          <div class="col-sm-6">
            <textarea name="d" class="form-control"></textarea>
          </div>
        </div> 
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Jawaban</label>
          <div class="col-sm-6">
            <select name="jawaban" class="form-control">
              <option value="a">A</value>
              <option value="b">B</value>
              <option value="c">C</value>
              <option value="d">D</value>
            </select>
          </div>
        </div> 
        
        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input  type="submit" class="btn btn-primary" value="Simpan data">
      </div>
    </div>
     </form>
  </div>
</div>



<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="post" action="{{ route('add_soal_isian') }}" enctype="multipart/form-data">
  @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Soal</label>
          <div class="col-sm-6">
            <textarea name="soal" class="form-control"></textarea>
          </div>
        </div> 
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Nama Ujian</label>
          <div class="col-sm-6">
            <select name="id_ujian" class="form-control" placeholder="" required>
              @foreach ($data as $a)
                <option value="{{$a->id}}">{{$a->nama}}</option>
              @endforeach
            </select>
          </div>
        </div> 
        
        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input  type="submit" class="btn btn-primary" value="Simpan data">
      </div>
    </div>
     </form>
  </div>
</div>

@include('../template/footer');