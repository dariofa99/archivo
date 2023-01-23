           <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead class="text-center thead-dark">

                        <tr>
                         
                          <th class="th-sm">Nombre
                          </th>
                          <th class="th-sm">Tipo
                          </th>
                          <th class="th-sm">Descripción
                          </th>
                           <th class="th-sm">Descargar
                          </th>
                          <th class="th-sm">Acciones
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ($archivos as $archivo)
                                <tr>
                          
                          <td>{{$archivo->nombre}}</td>
                          <td>{{$archivo->tipo_nombre}}</td>
                          <td>{{$archivo->descripcion}}</td>
                          <td><a title="{{$archivo->file_name}}" target="_blank" href="/archivos/files/{{$archivo->id}}">Descargar</a></td>
                          <td class="text-center">
                            <button id="{{$archivo->id}}" class="btn btn-success btn_detalles_archivo">
                            Detalles</button>
                            @if($archivo->user_id == Auth::user()->id || Auth::user()->can('edit_archivos'))
                            <button id="{{$archivo->id}}" class="btn btn-primary btn_editar_archivo">Editar</button>
                            @endif
                            @if($archivo->user_id == Auth::user()->id || Auth::user()->can('delete_archivos'))
                            <button class="btn btn-danger btn_eliminar_archivo" id="{{$archivo->id}}">Eliminar</button>
                            @endif
                          </td>
                          </tr> 
                            @empty
                                <tr>
                          <td colspan="5">Sin archivos aún...</td>
                          </tr>
                            @endforelse
                     
                
                        
                      </tbody>
                   
                    </table>

                    {{ $archivos->appends(request()->query())->links() }}