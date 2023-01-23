  <table class="table">
                      <thead class="text-center thead-dark">
                        <th>
                        Nombre
                        </th>
                        <th>
                        Descripción
                        </th>
                        <th>
                        Duración (años)
                        </th>
                        <th>
                        Acciones
                        </th> 
                      </thead>
                  <tbody class="text-center">
                  @foreach ($tipos_est as $tipo_doc)
                   <input type="hidden" class="tipos_estado" value="{{$tipo_doc->id}}-{{$tipo_doc->ref_nombre}}">
                     
                   @if($tipo_doc->id!=1)
                      <tr>
                      <td>
                       {{$tipo_doc->ref_nombre}}
                      </td>
                      <td>
                      {{$tipo_doc->descripcion}}
                      </td>
                      <td>
                          {{$tipo_doc->duracion}}
                      </td>
                      <td>
                      <button class="btn btn-primary btn_editar_ref" id="{{$tipo_doc->id}}">Editar</button>
                       <button class="btn btn-danger btn_eliminar_ref" id="{{$tipo_doc->id}}">Eliminar</button>
                      </td>
                    </tr>
                    @endif
                  @endforeach
                    
                  </tbody>


                  </table>

                   {{$tipos_est->appends(request()->query())->links()}} 