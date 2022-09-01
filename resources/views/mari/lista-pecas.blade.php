@php $html_tag_data = ["scrollspy"=>"false"]; $title = 'Inventário';
$description= 'Peças da Maristar.'; $breadcrumbs =
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
            <!-- Title Start
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
                            @csrf @if ($message = Session::get('success'))
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

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>@sortablelink('name', 'Nome')</td>
                                        <td>
                                            @sortablelink('categorias',
                                            'Categorias')
                                        </td>
                                        <td>
                                            @sortablelink('estilos', 'Estilos')
                                        </td>
                                        <td>@sortablelink('created_at', 'Criado em')</td>
                                        <td>Ações</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pecas as $peca)
                                    <tr>
                                        <td>
                                            <a
                                                id="peca_{{$peca->id}}"
                                                href="{{route('pecas.show', $peca->id)}}"
                                                >{{$peca->descritivo}}
                                            </a>
                                        </td>

                                        <td>{{$peca->categorias}}</td>
                                        <td>{{$peca->estilos}}</td>
                                        <td>{{$peca->created_at}}</td>

                                        <td>
                                            <form
                                                action="{{ route('salvarpecas.destroy', $peca->id)}}"
                                                method="post"
                                            >
                                                @csrf @method('DELETE')
                                                <button
                                                    class="btn btn-danger"
                                                    type="submit"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $pecas->links() }}
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
