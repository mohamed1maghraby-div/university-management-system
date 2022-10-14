<div class="card-body table-responsive p-0">
    <table id="example2" class="table table-hover table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>{{ __('classroom.name') }}</th>
          <th>{{ __('classroom.name_facultie') }}</th>
          <th>{{ __('classroom.processes') }}</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($classRooms as $i => $classRoom)
          <tr>
            <td>{{ $i + 1 }} </td>
                <td>{{ $classRoom->name }}</td>
                <td>{{ $classRoom->facultie->name }}</td>
                <td>
                  <span class="tag tag-success">
                    <button type="button" class="btn bg-gradient-info btn-flat btn-sm" data-toggle="modal" data-target="#modal-lg-{{$classRoom->id}}">
                    <i class="fas fa-pencil-alt"></i> {{__('university.edit')}}
                    </button>

                    {!! Form::model($classRoom, ['route' => ['classroom.destroy', $classRoom->id], 'method' => 'post', 'role' => 'form', 'class' => 'btn']) !!}
                      @method('delete')
                      {!! Form::button('<i class="fas fa-trash"></i> ' . __('university.delete'), ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </span>
              </td>
            </tr>

            

          <div class="modal fade" id="modal-lg-{{$classRoom->id}}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">{{ __('university.add_classroom') }}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- form start -->
                  {!! Form::model($classRoom, ['route' => ['classroom.update', $classRoom->id], 'method' => 'patch', 'role' => 'form']) !!}
                    @include('pages.classRoom.fields')
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  {!! Form::button(__('university.edit'), ['type'=> 'submit', 'class' => 'btn bg-gradient-info btn-flat']) !!}
                </div>
                {!! Form::close() !!}
                    <!-- form end -->
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
      <!-- /.modal -->

            @empty
                <td colspan="7">No classroom founded</td>
            @endforelse
      </tbody>
    </table>
  </div>
