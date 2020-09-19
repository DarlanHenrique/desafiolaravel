<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" required class="form-control" autofocus value="{{ old('name', $course->name )}}">

        <label for="category_id" class="required">Categoria</label>
        <select name="category_id" class="form-control select2" id="category_id">
            @foreach ($categories as $category)
                <option class="form-control" @if($category->id == $course->category_id) selected @endif required value="{{$category->id }}">{{$category->name}}</option>
            @endforeach
        </select>
        @if(Route::is('courses.show'))
            <label for="image_link">Imagem do curso</label>
            <div class="col-12">
                <img class="img-fluid" width="420" height="315" src="{{ URL('storage/img/'. $course->image_link) }}" alt="Imagem do curso" />
            </div>
            <label for="video">Video do curso</label>
            <div class="col-12">
                <iframe class="mb-4 celliframe" width="420" height="315" src="{{$course->video}}"></iframe>
            </div>
        @elseif(Route::is('courses.create'))
            <label for="image_link" class="required">Imagem </label>
            <input type="file" name="image_link" id="image_link" required class="form-control" accept="image/*"  value="{{ old('image_link', $course->image_link )}}">

            <label for="video" class="required">Video </label>
            <input type="url" name="video" id="video" required class="form-control"  value="{{ old('video', $course->video )}}">
        @else
            <label for="image_link" class="required">Imagem </label>
            <input type="file" name="image_link" id="image_link" class="form-control" accept="image/*"  value="{{ old('image_link', $course->image_link )}}">

            <label for="video" class="required">Video </label>
            <input type="url" name="video" id="video" required class="form-control"  value="{{ old('video', $course->video )}}">
        @endif
    
        <label for="description" class="required">Descrição </label>
        <textarea class="form-control mb-2" placeholder="Digite a descrição" row="7" autocomplete="off"  style="resize:none;" name="description" id="summernote" required>{{old('description',$course->description)}}</textarea>

    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $('.select2').select2();
        })

        $('select[value]').each(function(){
            $(this).val($(this).attr('value'));
        })

    </script>
    <script>
        $('#summernote').summernote({
        placeholder: 'Descrição do curso',
        tabsize: 2,
        height: 120,
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['fullscreen', 'codeview', 'help']]
        ]});
    </script>
@endpush