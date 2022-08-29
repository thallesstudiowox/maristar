@php $html_tag_data = ["scrollspy"=>"false"]; $title = 'Inventário';
$description= 'Criação de inventário da Maristar.'; $breadcrumbs =
["/"=>"Home","/Interface"=>"Interface","/Interface/Forms"=>"Forms","/Interface/Forms/Controls"=>"Controls"]
@endphp @extends('layout',['html_tag_data'=>$html_tag_data,
'title'=>$title,'description'=>$description]) @section('css')
<link rel="stylesheet" href="/css/vendor/select2.min.css" />
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
<link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
/>
@endsection @section('js_vendor')
<!-- <script src="/js/mari/scrollspy.js"></script> -->
<script src="/js/mari/select2.full.min.js"></script>
@endsection @section('js_page')
<script src="/js/mari/controlsMari.select2.js"></script>

@endsection @section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Title Start -->
            <section class="scroll-section" id="title">
                <div class="page-title-container">
                    <h1 class="mb-0 pb-0 display-4">{{ $title }}</h1>
                    <!-- @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs]) -->
                </div>
            </section>
            <!-- Title End -->

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form
                                action="{{ route('inventario.store') }}"
                                method="post"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                <h1 class="text-center">{{ $description }}</h1>
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="preview">
                                    <img id="file-ip-1-preview" />
                                </div>
                                <div class="flex flex-col flex-grow mb-3">
                                    <div
                                        id="FileUpload"
                                        class="btn btn-primary btn-block mt-4"
                                    >
                                        <label for="inputImage" class="btn"
                                            >Clique para selecionar ou tirar uma
                                            foto</label
                                        >

                                        <input
                                            style="display: none"
                                            type="file"
                                            multiple
                                            name="file"
                                            class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none"
                                            id="inputImage"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <h2 class="small-title">Descritivo</h2>

                                    <div class="w-100">
                                        <textarea
                                            placeholder="Escreva aqui o descritivo da peça"
                                            class="form-control"
                                            name="descritivo"
                                            rows="3"
                                        ></textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="card mb-5" id="divBase"></div>

                                    {{--
                                    <section
                                        class="scroll-section"
                                        data-idetapa="0"
                                        id="categoria"
                                    ></section>
                                    --}}
                                </div>

                                <button
                                    type="submit"
                                    name="submit"
                                    class="btn btn-primary btn-block mt-4"
                                >
                                    Salvar Peça
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Start -->

            <!-- Content End -->
        </div>
    </div>
</div>

@endsection
