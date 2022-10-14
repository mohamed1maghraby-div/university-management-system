<script src="{{ asset('adminDashboard/plugins/jquery/jquery.min.js') }}"></script>
@foreach ($faculties as $facultie)
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary collapsed-card">
        <div class="card-header bg-gradient-info">
          <h3 class="card-title">{{ $facultie->name }}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="card-body table-responsive p-0">
            <table id="example2" class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>{{ __('section.name_section') }}</th>
                  <th>{{ __('university.classroom') }}</th>
                  <th>{{ __('section.status') }}</th>
                  <th>{{ __('section.processes') }}</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($facultie->sections as $i => $section)
                  @php $id = isset($section) ? $section->id : ''; @endphp
                  <tr>
                    <td>{{ $i + 1 }} </td>
                        <td>{{ $section->name }}</td>
                        <td>{{ $section->classroom->name }}</td>
                        <td>
                          @if ($section->status)
                            <label class="badge badge-success">active</label>
                            @else
                            <label class="badge badge-danger">disactive</label>
                          @endif
                        <td>
                          <span class="tag tag-success">
                            <button type="button" class="btn bg-gradient-info btn-flat btn-sm" data-toggle="modal" data-target="#modal-lg-{{$section->id}}">
                            <i class="fas fa-pencil-alt"></i> {{__('university.edit')}}
                            </button>
        
                            {!! Form::model($facultie, ['route' => ['sections.destroy', $section->id], 'method' => 'post', 'role' => 'form', 'class' => 'btn']) !!}
                              @method('delete')
                              {!! Form::button('<i class="fas fa-trash"></i> ' . __('university.delete'), ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </span>
                      </td>
                    </tr>
        
                    
        
                  <div class="modal fade" id="modal-lg-{{$section->id}}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">{{ __('university.add_fac') }}</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- form start -->
                          {!! Form::model($section, ['route' => ['sections.update', $section->id], 'method' => 'patch', 'role' => 'form', 'id'=>'formUpdate']) !!}
                          
                            @include('pages.sections.fields')
                            
                            <script>
                              $(document).ready(function () {
                              $("#type{{$section->id}}").change(function () {
                                var val = $(this).val();
                                @foreach ($faculties as $facultie)
                                if (val == "{{ $facultie->id }}") {
                                  console.log('medo');
                                  $("#size{{$section->id}}").empty();
                                  @foreach ($facultie->classrooms as $classroom)
                                    $("#size{{$section->id}}").append("<option value='{{ $classroom->id }}'>{{ $classroom->name }}</option>");
                                  @endforeach
                                }
                                @endforeach
                                if (val == 0) {
                                  $("#size").empty();
                                }
                            });
                          });
                          </script>
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
                        <td colspan="7">No university founded</td>
                    @endforelse
              </tbody>
            </table>
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endforeach