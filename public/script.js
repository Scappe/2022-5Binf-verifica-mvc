var app = {
    init: function () {
        // Use origin and pathname to force to use https and avoid mixed content
        let origin = window.location.origin;
        let pathname = window.location.pathname;
        $.getJSON(`${origin}${pathname}?crews.json`)
            .done(app.writeCrews)
            .fail(app.onFail);
    },
    onFail: function (error) {
        console.log("errore nella lettura del file json");
        console.log(error);
    },


     writeCrews: function (jsonData) {
        console.log(jsonData);

        for (crew of jsonData) {
            let pirates_list = $("<ul/>");

            for (pirate of crew.pirates)
                pirates_list.append(`<li class="information">${pirate}</li>`);

            $("#crews").append(
                `
                <div>
                    Ciurma: <span class="information">${crew.name}</span>
                </div>
                <div>Membri:</div>
                `,
                pirates_list
            );
        }
    }



}


$(document).ready(app.init);