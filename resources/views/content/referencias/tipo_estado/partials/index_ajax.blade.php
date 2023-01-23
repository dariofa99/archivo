  <table class="table">
                      <thead>
                        <th>
                        Nombre
                        </th>
                        <th>
                        Descripción
                        </th>
                      </thead>
                  <tbody>
                  @foreach ($tipos_doc as $tipo_doc)
                      <tr>
                      <td>
                      {{$tipo_doc->ref_nombre}}
                      </td>
                      <td>
                      {{$tipo_doc->descripcion}}
                      </td>
                      <td>
                      <button class="btn btn-primary">Editar</button>
                       <button class="btn btn-danger">Eliminar</button>
                      </td>
                    </tr>
                  @endforeach
                    
                  </tbody>


                  </table>

                   {{$tipos_doc->appends(request()->query())->links()}} 