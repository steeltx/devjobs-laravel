@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
   @include('ui.adminnav')
@endsection

@section('content')

    <h1 class="text-2xl text-center mt-10"> Nueva vacante</h1>
    <form class="max-w-lg mx-auto my-10">
        <div class="mt-5">
            <label
                for="titulo"
                class="block text-gray-700 text-sm mb-2"
                >Titulo vacante</label>
            <input
                id="titulo"
                type="text"
                class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') is-invalid @enderror"
                name="titulo" value="{{ old('titulo') }}"
                autofocus>
        </div>
        <div class="mt-5">
            <label
                for="categoria"
                class="block text-gray-700 text-sm mb-2"
                >Categoría</label>
            <select
                id="categoria"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                    rounded leading-tight focus:outline-none focus:bg-white
                    focus:border-gray-500 p-3 bg-gray-100"
                name="categoria"
            >
                <option disabled selected>--Selecciona --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-5">
            <label
                for="experiencia"
                class="block text-gray-700 text-sm mb-2"
                >Experiencia</label>
            <select
                id="experiencia"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                    rounded leading-tight focus:outline-none focus:bg-white
                    focus:border-gray-500 p-3 bg-gray-100"
                name="experiencia"
            >
                <option disabled selected>--Selecciona --</option>
                @foreach ($experiencias as $experiencia)
                    <option value="{{$experiencia->id}}">{{$experiencia->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-5">
            <label
                for="ubicacion"
                class="block text-gray-700 text-sm mb-2"
                >Ubicación</label>
            <select
                id="ubicacion"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                    rounded leading-tight focus:outline-none focus:bg-white
                    focus:border-gray-500 p-3 bg-gray-100"
                name="ubicacion"
            >
                <option disabled selected>--Selecciona --</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-5">
            <label
                for="salario"
                class="block text-gray-700 text-sm mb-2"
                >Salario</label>
            <select
                id="salario"
                class="block appearance-none w-full border border-gray-200 text-gray-700
                    rounded leading-tight focus:outline-none focus:bg-white
                    focus:border-gray-500 p-3 bg-gray-100"
                name="salario"
            >
                <option disabled selected>--Selecciona --</option>
                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2"
                >Descripción del puesto</label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion">
        </div>

        <div class="mt-5">
            <label
                for="skills"
                class="block text-gray-700 text-sm mb-2"
                >Habilidades y conocimientos</label>
                @php
                    $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
                @endphp
            <lista-skills
                :skills="{{json_encode($skills)}}"
            ></lista-skills>
        </div>

        <div class="mt-5">
            <label
                for="dropzoneDevJobs"
                class="block text-gray-700 text-sm mb-2"
                >Imagen vacante</label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>
            <input type="hidden" name="imagen" id="imagen">
            <p id="error"></p>
        </div>
        <button
            type="submit"
            class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
            >Publicar vacante</button>
    </form>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {
            // Medium Editor
            const editor = new MediumEditor('.editable',{
                toolbar:{
                    buttons: ['bold', 'italic','underline','quote','anchor','justifyLeft','justifyCenter','justifyRight','justifyFull','orderedList','unorderedList','h2','h3'],
                    static: true,
                    sticky: true
                },
                placeholder:{
                    text:'Información de la vacante'
                }
            });
            editor.subscribe('editableInput', function(eventObj, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            });

            // Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs',{
                url : "/vacantes/imagen",
                dictDefaultMessage: 'Sube tu archivo',
                acceptedFiles: '.png,.jpg,.jpeg,.gif,.bmp',
                addRemoveLinks: true,
                dictRemoveFile:'Borrar archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                success: function (file, response){
                    document.querySelector('#error').textContent = '';
                    // colocar respuesta en input
                    document.querySelector('#imagen').value=response.correcto;
                    // agregar al objeto de archivo el nombre del server
                    file.nombreServidor = response.correcto;
                },
                maxfilesexceeded: function (file){
                    if(this.files[1] != null){
                        this.removeFile(this.files[0]); // eliminar archivo anterior
                        this.addFile(file); // agregar nuevo archivo
                    }
                },
                removedfile: function (file, response) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                    params = {
                        imagen: file.nombreServidor
                    }
                    axios.post('/vacantes/borrarimagen',params)
                        .then(respuesta => console.log(respuesta));
                }
            });
        });
    </script>
@endsection
