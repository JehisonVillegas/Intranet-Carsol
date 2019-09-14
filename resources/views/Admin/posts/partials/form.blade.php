{{Form::hidden('user_id', auth()->user()->id)}}
{{Form::hidden('category_id', $departamento->first()->id)}}
<div class="form-group">
    
        

</div>
<div class="form-group">
   {{Form::label('name', 'Nombre de la Entrada')}}
   {{Form::text('name',null,['class' => 'form-control','id' =>'name'])}}
</div>

<div class="form-group">
   {{Form::label('slug', 'URL Amigable')}}
   {{Form::text('slug',null,['class' => 'form-control','id' =>'slug'])}}
</div>
<div class="form-group">
   {{Form::label('file','Imagen que servira de referencia para su Post')}}
   {{Form::file('file')}}

</div>





<div class="form-group">
      {{Form::label('tags','Etiquetas')}}
      <div>
      @foreach($tags as $tag)
           <label>  

          {{Form::checkbox('tags[]',$tag->id)}} {{$tag->name}}

           </label>

      @endforeach
      </div>

</div>


<div class="form-group">
   {{Form::label('body','Descripcion')}}
   {{Form::textarea('body',null,['class'=>'form-control my-editor','rows' => '10','cols'=>'10'])}}
</div>






<div class="form-group">
   {{Form::submit('Guardar',['class'=> 'btn btn-sm btn-primary'])}}
</div>

@section('scripts')
<script src="{{asset('vendor/stringtoslug/jquery.stringToSlug.min.js')}}"></script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	$(document).ready(function(){
        $("#name,#slug").stringToSlug({
            callback: function(text){

            	$("#slug").val(text);
            }

        });


	});



</script>

<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection