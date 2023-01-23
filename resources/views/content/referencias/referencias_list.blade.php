@extends('layouts.dashboard')

@push('styles')
<!-- aqui van los estilos de cada vista -->
<!-- Para los toggle de los check de compartir -->


@endpush

@section('navbar')
<!-- aqui va el menu de cada vista -->
  @include('content.questions.navbar')
@endsection

@section('content')

<div class="content-header">
  <section class="content-heade">
        <div class="container-flui">
          <div class="row mb-2">
            <div class="col-sm-12">
              <br>
            </div>
          {{--   <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Modals & Alerts</li>
              </ol>
            </div> --}}
          </div>
        </div><!-- /.container-fluid -->
  </section>
    <!-- /content-header -->
</div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <!-- include('components.callout_info') -->

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Preguntas
                </h3>
              </div>
              <div class="card-body">
               <div class="row">
                @foreach ($questions as $question )
                    
               
                <div class="col-md-4">
                    <div class="card bg-light ">
                <div class="card-header">
                      
                                  
                                <i class="fa fa-cog float-right btn_edit_question" id="{{$question->id}}"></i>
                              </div>
                    <div class="card-body">
                    
                      <p class="card-text">
                       <b>Titulo: </b><span id="lbl_question_title">{{$question->question_title}}</span><br>
                      <b>Tipo: </b><span id="lbl_question_title">{{$question->type->reference_name}}</span><br>
                    <b>Creado por: </b><span id="lbl_question_title">{{$question->user_create->name}}</span><br>
                    <b>Veces usada: </b><span id="lbl_question_title">{{$question->sometimes_used}}</span><br>
                    <b>Fecha de creación: </b><span id="lbl_question_title">{{$question->created_at}}</span></p>
                    
                    
                    </div>
                  <div class="card-footer footer_question">
                      <div class="row">
                        <div class="col-md-6">
                      <input type="checkbox" data-size="sm" data-width="100" data-onstyle="primary" id="pregunta_id" data-toggle="toggle" data-on="Compartida" data-off="Sin compartir" @if($question->status) checked @endif>  
                        </div>
                        
                        <div class="col-md-6">
                      <input type="checkbox" data-size="sm" data-width="100" data-onstyle="success" id="toggle-two" data-toggle="toggle" data-on="Activa" @if($question->archived) checked @endif data-off="Inactiva">   
                        </div>
                      </div>
                    </div>
                  </div>

             </div>

                 @endforeach  
                </div>
<hr>
     {{--        <div class="content_question_update  no-padding" id="content_question_component">
         
              @include('content.questions.partials.form_question_component')
       
      
                </div>  --}}
               

              </div>
              <!-- /.card -->
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
@include('content.questions.partials.modals.edit_question')
@endsection

@push('scripts')
<!-- aqui van los scripts de cada vista -->
<!-- SparkLine -->
<!-- Para los toggle de los check de compartir -->
<script type="text/javascript" src="{{asset('/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('/plugins/select2/js/select2.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('/plugins/summernote/summernote-bs4.min.js')}}"></script>
 {{-- <script type="text/javascript" src="{{asset('/plugins/ckeditor/ckeditor.js')}}"></script>
 <script  type="text/javascript" src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
 <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
 <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
 <script type="text/javascript" src="{{ asset('/plugins/ckeditor/adapters/jquery.js') }}"></script> --}}


<script type="text/javascript">

class Question {
    
    constructor(id='',question_title = '', status='' , sometimes_used='',archived='',question_type_id='',difficulty_degree='') {
        this.id = id;
        this.question_title = question_title;
        this.status = status;
        this.archived = archived;
        this.sometimes_used = sometimes_used;
        this.question_type_id = question_type_id;
        this.difficulty_degree = difficulty_degree;
        this.options = [];

    }

    update(data) {
      var url = '/preguntas/'+this.id
      	$.ajax({               
                url: url,
                type: 'PUT',
                cache: false,
                data: data,                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                  if(data.event_type !== undefined){
                    if(respu.render_view !==undefined){
                      $("#content_question_component").html(respu.render_view)
                      $(".select_su").select2();
                      $('.textarea').summernote();
                      $("[data-toggle='toggle']").bootstrapToggle();
                    }
                  }
                   
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
        });	
     }

     updateSubjects(data) {
      var url = '/preguntas/change/subjects/'+this.id
      	$.ajax({               
                url: url,
                type: 'POST',
                cache: false,
                data: data,                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                   console.log(data)
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
        });	
     }

     updateTopics(data) {
      var url = '/preguntas/change/topics/'+this.id
      	$.ajax({               
                url: url,
                type: 'POST',
                cache: false,
                data: data,                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                   console.log(data)
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
        });	
     }

     insertOption(data,question) {
      var url = '/preguntas/insert/option/'+this.id
      	$.ajax({               
                url: url,
                type: 'POST',
                cache: false,
                data: data,                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                    if(respu.render_view !==undefined){
                      question.options = respu.question_options;
                      question.loadForm(respu);
                    }
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
        });	
     } 

    getOption(idp){
      var found = this.options.find(function(elemento,id) {
           if(elemento.id == idp) {
              return elemento;
            } 
        });
        return found;
    }

   

    loadForm(respu) {
      $("#content_question_component").html(respu.render_view)
      $(".select_su").select2();
      $('.textarea').summernote();
      $("[data-toggle='toggle']").bootstrapToggle();

    }


}


class OptionQuestion{

  constructor(id='',option_name = '', status='' , correct_value='',question_id='') {
        this.id = id;
        this.option_name = option_name;
        this.status = status;
        this.correct_value = correct_value;
        this.question_id = question_id;        

    }

    update(data){
      var url = '/opciones/'+this.id
      	$.ajax({               
                url: url,
                type: 'PUT',
                cache: false,
                data: data,                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                 question.options = respu.question_options   ;
                   if(respu.render_view !==undefined){
                      question.loadForm(respu);
                    }       
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
        });
    }

    delete(data){
      var url = '/opciones/'+this.id
      	$.ajax({               
                url: url,
                type: 'DELETE',
                cache: false,
                data: data,                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                 question.options = respu.question_options   ;
                   if(respu.render_view !==undefined){
                     question.loadForm(respu);
                    }       
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
        });
    }
}




(function(){

$(".select_su").select2();
 //CKEDITOR.replace( 'editor1' );
$('.textarea').summernote({
  minHeight: null,             // set minimum height of editor
  maxHeight: 100,             // set maximum height of editor
  focus: false,
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
});


   // var dataForm= setFormToObject('myformQuestionUpdate') ;
   // var question = new Question(dataForm.id,dataForm.question_title,dataForm.status,'2',dataForm.archived,dataForm.question_type_id,dataForm.difficulty_degree); 
 $('.btn_edit_question').on('click', function() {
    id = $(this).attr('id');
    
   getQuestion(id)
   // question.update(data);
   
    });

    $('#content_question_component').on('summernote.blur','#question_title', function() {
    question.question_title = $(this).val();
    data = {'question_title':question.question_title}
    console.log(question,data)
    question.update(data);
   
    });

    $('#content_question_component').on('change','#difficulty_degree', function() {
    question.difficulty_degree = $(this).val();
    data = {'difficulty_degree':question.difficulty_degree}
    question.update(data);
    
    });

    $('#content_question_component').on('change','#question_type_id', function() {
    question.question_type_id = $(this).val();
    data = {'question_type_id':question.question_type_id,'event_type':'change'}
    question.update(data);
    });

    $('#content_question_component').on('change','#subject_tags', function (e) { 
      data = $(this).val();
      data = Object.assign({},data); 
      question.updateSubjects(data);
    });

    $('#content_question_component').on('change','#topic_tags' ,function (e) { 
      data = $(this).val();
      data = Object.assign({},data); 
      question.updateTopics(data);
    });

    $("#content_question_component").on('click','#btn_add_opt',function(e){
      console.log(question)
    data = {'label':'Opción '+question.options.length};
     question.insertOption(data,question);

    }); 

    $("#content_question_component").on('click','#btn_add_opt_other',function(e){
    data = {'label':'other'};
    
     question.insertOption(data,question);

    }); 

    $('#content_question_component').on('change','#archived' ,function (e) { 
      data = {'archived':0}
      if($(this).is(':checked')) data = {'archived':1}
      question.archived = data.archived;
      console.log(data)
      question.update(data);
    });

    $('#content_question_component').on('change','#status' ,function (e) { 
      data = {'status':0}
      if($(this).is(':checked')) data = {'status':1}
      question.status = data.status;
      question.update(data);
    });


    

  $("#content_question_component").on('focus','.option_name',function(e){
    idp = $(this).attr('id').split('-')[1];
    option_selected = question.getOption(parseInt(idp));  
    option = new OptionQuestion(option_selected.id,option_selected.option_name,option_selected.status,option_selected.correct_value,option_selected.question_id);

  });

  
  $("#content_question_component").on('blur','.option_name',function(e){    
    var new_val = $(this).val();
    idp = $(this).attr('id').split('-')[1];
    option_selected = question.getOption(parseInt(idp));
    option = new OptionQuestion(option_selected.id,option_selected.option_name,option_selected.status,option_selected.correct_value,option_selected.question_id);
     if(new_val!=option.option_name){
      data = {'option_name':new_val}
      option.update(data);
    }    
  });

  $("#content_question_component").on('change','.option_status',function(e){        
    idp = $(this).attr('id').split('-')[1];
    option_selected = question.getOption(parseInt(idp));
    option = new OptionQuestion(option_selected.id,option_selected.option_name,option_selected.status,option_selected.correct_value,option_selected.question_id);
    data = {'status':0}
    if($(this).is(':checked')) data = {'status':1}
    option.update(data);      
  });

    $("#content_question_component").on('change','.correct_value',function(e){        
    idp = $(this).attr('id').split('-')[1];
    option_selected = question.getOption(parseInt(idp));
    option = new OptionQuestion(option_selected.id,option_selected.option_name,option_selected.status,option_selected.correct_value,option_selected.question_id);
    data = {'correct_value':0}
    if($(this).is(':checked')) data = {'correct_value':1}
    option.update(data);      
  });

  $("#content_question_component").on('click','.btn_delete_option',function(e){        
    idp = $(this).attr('id');
    option_selected = question.getOption(parseInt(idp));
    option = new OptionQuestion(option_selected.id,option_selected.option_name,option_selected.status,option_selected.correct_value,option_selected.question_id);
    data = {'delete':1}
    option.delete(data);      
  });

 //   getQuestion(6)

})();



/*function setOptionsToObject(form){
var dataArray = $("#list_options_question_table tr")

dataObj = {};
if(dataArray.length > 1){
  $(dataArray).each(function(i, field){
   //console.log('xx',field.cells[1].children[0].value)
  //  console.log('xx',field.cells[2].children[0].value)
  });
}

//return dataObj
}*/


function getQuestion(id){
  var url = '/preguntas/'+id+'/edit/';
      	$.ajax({               
                url: url,
                type: 'GET',
                cache: false,
                data: {},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(res) {
                  question = new Question(res.question.id,res.question.question_title,res.question.status,res.question.sometimes_used,res.question.archived,res.question.question_type_id,res.question.difficulty_degree); 
                  question.options = res.question.options;
                  question.loadForm(res);
                  $("#myModal_edit_question").modal('show')
                  console.log(res)
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
        });
}





















</script>
 @endpush

