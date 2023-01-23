
   @foreach($subcarpetas as $folder)
 <li id="element_folder-{{$folder->hija_id}}">
   <i class="fas fa-folder subcarpeta" data-id="{{$folder->hija_id}}"></i>
   <input type="hidden" class="inputFolderName" value="{{$folder->nombre}}" id="inputFolderName-{{$folder->hija_id}}" >
   <span @if($folder->user_id==Auth::user()->id || Auth::user()->can('edit_carpetas')) id="lbl_carpeta-{{$folder->hija_id}}"  class="btn_lbl_carpeta" @endif >
   {{$folder->nombre}}
</span>
@if($folder->user_id==Auth::user()->id || Auth::user()->can('elimina_carpetas'))
<span class="btn_eliminar_carpeta float-rigth" id="btn_eliminar_carpeta-{{$folder->hija_id}}">
 x </span>
  @endif
                  </li>
@endforeach
                 
                 
                  
                  
 
            