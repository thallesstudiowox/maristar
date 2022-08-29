@php $html_tag_data = ["scrollspy"=>"false"]; $title = 'Inventário';
$description= 'Peça da Maristar.'; $breadcrumbs =
["/"=>"Home","/Interface"=>"Interface","/Interface/Forms"=>"Forms","/Interface/Forms/Controls"=>"Controls"]
@endphp @extends('layout',['html_tag_data'=>$html_tag_data,
'title'=>$title,'description'=>$description]) @section('css')
<trnk rel="stylesheet" href="/css/vendor/select2.min.css" />
<trnk rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
<trnk
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

                            <div style="display: flex;margin-bottom: 30px; justify-content: center;">
                                <a
                                target="_blank"
                                href="{{ URL::asset('storage/'.json_decode($peca->image)->file_path) }}"
                                style="display: flex; justify-content: center; align-content: center; text-align: center; flex-direction: column;">
                                <img
                                    style="width: auto; height: 300px;"
                                    src="{{asset('/storage/'.json_decode($peca->image)->file_path)}}"
                                />
<div style="margin-top: 20px;">Clique aqui para ver a imagem maior.</div>
                            </a>

                            </div>
                            <table class="table table-striped">


                            <tbody>
                                <tr><td width="250px"><b>Descritivo</b></td><td>{{$peca->descritivo}}</td></tr>
                                <tr><td width="250px"><b>Categorias</b></td><td> {{$peca->categorias}}</td></tr>
                                <tr><td width="250px"><b>Estilos</b></td><td> {{$peca->estilos}}</td></tr>
                                <tr><td width="250px"><b>Cintura</b></td><td> {{$peca->cintura}}</td></tr>
                                <tr><td width="250px"><b>Fecho</b></td><td> {{$peca->fecho}}</td></tr>
                                <tr><td width="250px"><b>Tamanho</b></td><td> {{$peca->tamanho}}</td></tr>
                                <tr><td width="250px"><b>Cor</b></td><td> {{$peca->cor}}</td></tr>
                                <tr><td width="250px"><b>Marcas</b></td><td> {{$peca->marcas}}</td></tr>
                                <tr><td width="250px"><b>Tecidos</b></td><td> {{$peca->tecidos}}</td></tr>
                                <tr><td width="250px"><b>Modelo</b> Manga</td><td> {{$peca->modelo_manga}}</td></tr>
                                <tr><td width="250px"><b>Gola</b></td><td> {{$peca->gola}}</td></tr>
                                <tr><td width="250px"><b>Modelo</b> calça</td><td> {{$peca->modelo_calca}}</td></tr>
                                <tr><td width="250px"><b>Caimento</b></td><td> {{$peca->caimento}}</td></tr>
                                <tr><td width="250px"><b>
                                    Comprimento perna cos barra</b></td><td>
                                    {{$peca->comprimento_perna_cos_barra}}
                                </td></tr>
                                <tr><td width="250px"><b>Medida cos</b></td><td> {{$peca->medida_cos}}</td></tr>
                                <tr><td width="250px"><b>Medida gancho</b></td><td> {{$peca->medida_gancho}}</td></tr>
                                <tr><td width="250px"><b>
                                    Altura gola barra</b></td><td>
                                    {{$peca->altura_gola_barra}}
                                </td></tr>
                                <tr><td width="250px"><b>
                                    Largura ombro a ombro</b></td><td>
                                    {{$peca->largura_ombro_a_ombro}}
                                </td></tr>
                                <tr><td width="250px"><b>
                                    Medida Manga ombro punho</b></td><td>
                                    {{$peca->medida_manga_ombro_punho}}
                                </td></tr>
                                <tr><td width="250px"><b>
                                    Altura media gola cintura</b></td><td>
                                    {{$peca->altura_media_gola_cintura}}
                                </td></tr>
                                <tr><td width="250px"><b>
                                    Altura total gola barra</b></td><td>
                                    {{$peca->altura_total_gola_barra}}
                                </td></tr>
                                <tr><td width="250px"><b>
                                    Comprimento perna</b></td><td>
                                    {{$peca->comprimento_perna}}
                                </td></tr>
                                <tr><td width="250px"><b>
                                    Altura cos barra</b></td><td>
                                    {{$peca->altura_cos_barra}}
                                </td></tr>
                                </tbody>
                            </table>
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
