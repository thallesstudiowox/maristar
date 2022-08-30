/**
 *
 * Select2Controls
 *
 * Interface.Forms.Controls.Select2 page content scripts. Initialized from scripts.js file.
 *
 *
 */

class Select2Controls {
    constructor() {
        // Initialization of the page plugins
        if (!jQuery().select2) {
            console.log("select2 is null !");
            return;
        }

        this._init();
    }

    _init() {
        let prevDiv = "#divBase";
        let idetapa = 1;
        let andamentoEtapas = [];

        function createOpcao(etapa = "categorias", id = 0, idEtapaClick = 1) {
            if (idEtapaClick < idetapa && andamentoEtapas.length > 1) {
                let idPrevDiv = idEtapaClick - 1;
                prevDiv = "#" + andamentoEtapas[idPrevDiv];
                for (
                    let index = idEtapaClick;
                    index < andamentoEtapas.length;
                    index++
                ) {
                    const element = andamentoEtapas[index];
                    $("#" + element).remove();
                }
                idetapa = idEtapaClick;
            }

            let base = "";
            base +=
                '<section class="scroll-section  mb-3 etapa' + idetapa + '"';
            base += 'data-idetapa="' + idetapa + '"';
            base += 'id="' + etapa + '">';
            base += "</section>";
            // console.log(prevDiv);
            $(prevDiv).after(base);
            andamentoEtapas.push(etapa);
            console.log("etapa: " + etapa);
            console.log("id: " + id);
            $.ajax({
                type: "GET",
                url: "json/mari/" + etapa + ".json",
            }).then(function (data) {
                // console.log(data.tipo);
                if (data.tipo == "texto") {
                    $(".btSalvarPeca").show();
                    let _html = "";
                    let cat = data.categorias[id];

                    for (let i = 0; i < cat.length; i++) {
                        console.log(cat[i].nome);

                        _html += '<h2 class="small-title">';
                        _html += cat[i].nome;
                        _html += "</h2>";
                        _html += '<div class="w-100">';
                        _html +=
                            '<input type="number" maxlength="3" class="form-control mb-3 " oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="' +
                            cat[i].nome +
                            '" aria-label="' +
                            cat[i].nome +
                            '" aria-describedby="basic-addon1" name="' +
                            cat[i].name +
                            '" data-idetapa="' +
                            idetapa +
                            '" id="select';
                        _html += cat[i].name;
                        _html += '"></input>';
                    }
                    // _html +=
                    // '<button class="btn btn-outline-secondary" type="button" id="button-addon1">Finalizar</button></div > ';
                    prevDiv = "#" + etapa;
                    $(prevDiv).html(_html);
                } else {
                    $(".btSalvarPeca").hide();
                    let _html = "";
                    _html += '<h2 class="small-title">';
                    _html += data.nomeTipo;
                    _html += "</h2>";
                    _html += '<div class="w-100">';
                    _html +=
                        '<select data-idetapa="' +
                        idetapa +
                        '" name="' +
                        etapa +
                        '" id="select';
                    _html += etapa;
                    _html += '"></select></div>';

                    prevDiv = "#" + etapa;
                    $(prevDiv).html(_html);
                    let _divSelect = $("#select" + etapa);
                    let dataLoad = data.data;
                    if (etapa != "categorias") {
                        dataLoad = data.data[parseInt(id)];
                    }
                    console.log(dataLoad);
                    _divSelect.select2({
                        data: dataLoad,
                        multiple: false,
                        placeholder: "Selecione " + data.nomeTipo,

                        templateSelection: function formatResultSelection(
                            result
                        ) {
                            // console.log("id: " + result.id);
                            // console.log("id.length: " + result.id.length);
                            if (result.id != "") {
                                createOpcao(
                                    result.next,
                                    result.value,
                                    _divSelect.data("idetapa")
                                );
                                idetapa++;
                                // console.log(idetapa + "__abriu_proximo__");
                            }

                            console.log(idetapa + "_____fim______" + etapa);
                            return result.text;
                        },
                    });
                }
            });
        }
        createOpcao();

        $("#inputImage").on("change", function (event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
                // alert(src);
            }
        });
    }
}
