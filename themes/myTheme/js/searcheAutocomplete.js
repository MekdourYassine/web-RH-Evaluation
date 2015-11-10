/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    var availableGS = [
        "",
        "O+",
        "O-",
        "A+",
        "A-",
        "B+",
        "B-",
        "AB+",
        "AB-"
    ];
    var availableGender = [
        "",
        "M",
        "F"
    ];
    var bool = [
        "",
        "Oui",
        "Non"
    ];
    $("#Donneur_groupe_sangun").kendoComboBox({
        animation: {
            close: {
                effects: "fadeOut zoom:out",
                duration: 300
            },
            open: {
                effects: "fadeIn zoom:in",
                duration: 300
            }
        },
         delay: 0,
         height: 500,
        dataSource: availableGS,
        change: onChange,
        placeholder: "Séléctionner un groupe",
        filter: "contains"
    });
    $("#Donneur_gender").kendoComboBox({
        dataSource: availableGender,
        change: onChange,
        placeholder: "Séléctionner un Sexe",
        filter: "contains"
    });
    $("#Donneur_vehicle").kendoComboBox({
        dataSource: bool,
        change: onChange,
        placeholder: "Oui ou Non",
        filter: "contains"
    });

    function onChange() {
        $('.search-form form').trigger("submit");
    }
    $(".k-widget.k-combobox.k-header").css("width","220px")
});
