           <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead class="text-center thead-dark">

                        <tr>
                         
                          <th class="th-sm">Nombre
                          </th>
                          
                          <th class="th-sm">Descripción
                          </th>
                          
                          <th class="th-sm">Acciones
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ($dependencias as $dependencia)
                                <tr>
                          
                          <td>{{$dependencia->nombre}}</td>
                        
                          <td>{{$dependencia->descripcion}}</td>
                          <td class="text-center">
                           @permission('edit_dependencias')
                            <button id="{{$dependencia->id}}" class="btn btn-primary btn_editar_dep">Editar</button>
                           @endpermission
                           @permission('delete_dependencias')
                            <button class="btn btn-danger btn_eliminar_dep" id="{{$dependencia->id}}">Eliminar</button>
                         @endpermission
                         
                          </td>
                           </tr> 
                            @empty
                                <tr>
                          <td colspan="5">Vacio...</td>
                          </tr>
                            @endforelse
                     
                
                        
                      </tbody>
                   
                    </table>

                    {{ $dependencias->appends(request()->query())->links() }}