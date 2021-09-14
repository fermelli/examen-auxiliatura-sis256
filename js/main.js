const realizarPeticion = (opciones, callback) => {
    let {
        url,
        contentType,
        method = 'GET',
        data = null
    } = {
        ...opciones
    }
    let httpRequest = new XMLHttpRequest()
    httpRequest.open(method, url, true)
    httpRequest.onreadystatechange = callback
    httpRequest.setRequestHeader('Content-Type', contentType)
    httpRequest.send(data)
}

const insertar = (fila) => {
    event.preventDefault();
    const $form = $(event.target)
    let data = $form.serialize();
    realizarPeticion({
        url: './php/guardarlibro.php',
        contentType: 'application/x-www-form-urlencoded',
        method: 'POST',
        data: data,
    }, function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                let resp = JSON.parse(this.responseText);

                if (resp.exito) {
                    $cuerpo.append(`<div class="alert alert-success">Libro: ${resp.libro} insertado</div>`)
                } else {
                    $cuerpo.append(`<div class="alert alert-danger">Libro: ${resp.libro} no insertado</div>`)
                }

                setTimeout(function () {
                    location.assign('./index.html')
                }, 1000)
            }
        }

    })

}

const $cuerpo = $('#cuerpo')
$(function () {
    $("#pregunta2").on("click", function (event) {
        event.preventDefault();
        realizarPeticion({
            url: './paginas/pregunta2.html',
            contentType: 'text/html; charset=utf-8',
        }, function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    $cuerpo.html(this.responseText)
                    $('#form-pregunta2').on("submit", function (event) {
                        event.preventDefault();
                        let url = `./php/${this.operacion.value}.php?fila=${this.fila.value}`;
                        realizarPeticion({
                            url: url,
                            contentType: 'text/html; charset=utf-8',
                        }, function () {
                            $cuerpo.html(this.responseText)
                        })

                    })
                }
            }
        })
    })

    $("#pregunta3").on("click", function (event) {
        event.preventDefault()
        fetch('./paginas/pregunta3.html', {
                method: 'GET',
            })
            .then(response => response.text())
            .catch(error => console.log("Error:", error))
            .then(response => {
                $cuerpo.html(response)
                $('#form-pregunta3').on("submit", function (event) {
                    event.preventDefault();
                    fetch('./paginas/fdatos.php', {
                            method: 'GET',
                            data: `nrolibros=${this.nrolibros}`
                        }).then(response => response.text())
                        .catch(error => console.log("Error:", error))
                        .then(response => {})
                })
            });
    })
})