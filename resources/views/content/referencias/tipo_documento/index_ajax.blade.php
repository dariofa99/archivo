  <table class="table">
                      <thead class="thead-dark text-center">
                        <th>
                        Nombre
                        </th>
                        <th>
                        Descripción
                        </th>
                         <th>
                        Acciones
                        </th>
                      </thead>
                  <tbody class="text-center">
                  @foreach ($tipos_doc as $tipo_doc)
                      <tr>
                      <td>
                      {{$tipo_doc->ref_nombre}}
                      </td>
                      <td>
                      {{$tipo_doc->descripcion}}
                      </td>
                      <td>
                  
                      @permission('edit_tipos_documentales')
                      <button class="btn btn-primary btn_editar_ref" id="{{$tipo_doc->id}}">Editar</button>
                      @endpermission
                       @permission('delete_tipos_documentales')
                       <button class="btn btn-danger btn_eliminar_ref" id="{{$tipo_doc->id}}">Eliminar</button>
                      @endpermission
                      </td>
                    </tr>
                  @endforeach
                    
                  </tbody>


                  </table>

                   {{$tipos_doc->appends(request()->query())->links()}} 