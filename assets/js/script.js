
window.addEventListener("DOMContentLoaded", (event) => {
        var addingSpecialitiesButton = document.getElementById('add_speciality')
        var parentDiv = document.getElementById('speciality_parent')

        function addSpeciality() {
                
                let buttonDiv = document.createElement('div')
                buttonDiv.setAttribute("class", "form-floating mt-5")
                buttonDiv.innerHTML='<select class="form-select" id="floatingSelect' + i +'" aria-label="Floating label select example" name="specialities"><option selected>Choisissez une spécialité</option><?php $specialitiesObject = new Speciality(); $specialitiesObject->displaySelectSpecialitiesOptions(); ?></select>'
                parentDiv.prepend(buttonDiv)
                
                i++
        }

        if (addingSpecialitiesButton) {
                addingSpecialitiesButton.addEventListener('click', addSpeciality)
        }
    });

var i=4



{/* <div class="form-floating mt-5">
            <select class="form-select" id="floatingSelect3" aria-label="Floating label select example" name="specialities">
                <option selected>Choisissez un type</option>

<?php
        $specialitiesObject = new Speciality();
        $specialitiesObject->displaySelectSpecialitiesOptions();
?></select> */}

// (() => {
//     'use strict'

//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     let form = document.getElementById('addAdministrator');

//     form.addEventListener('submit', function(event)
//     {

//         Array.from(form.elements).forEach((input) => {
//             if (input.type !== 'submit') {
//                 if (!validateFields(input)) {
//                     event.preventDefault();
//                     event.stopPropagation();

//                     input.classList.remove("is-valid");
//                     input.classList.add("is-invalid");
//                     input.nextElementSibling.style.display = 'block';
//                 } else {
//                     input.nextElementSibling.style.display = 'none';
//                     input.classList.remove("is-invalid");
//                     input.classList.add("is-valid");
//                 }
//             }
//         });
//     }, false)
// })()

// function validateRequired(input) {
//     return !(input.value == null || input.value == "");
// }

// function validateLength (input, minLength, maxLength) {
//     return !(input.value.length < minLength || input.value.length > maxLength);
// }

// function validateText(input) {
//     return input.value.match("^[A-Za-z]+$");
// }

// function validateEmail(input) {
//     let EMAIL = input.value;
//     let ATEXIST = EMAIL.indexOf("@");
//     let DOTEXIST = EMAIL.lastIndexOf(".");

//     return !(ATEXIST<1 || (DOTEXIST-ATEXIST < 2));
// }

// function validateFields(input) {
//     let fieldName = input.name;

//     if(fieldName == "firstName") {
//         if(!validateRequired(input)) {
//             return false;
//         }
//         if(!validateLength(input, 2, 20)) {
//             return false;
//         }
//         if(!validateText(input)) {
//             return false
//         }
//         return (true);
//     }

//     if(fieldName == "lastName") {
//         if(!validateRequired(input)) {
//             return false;
//         }
//         if(!validateLength(input, 2, 20)) {
//             return false;
//         }
//         if(!validateText(input)) {
//             return false
//         }
//         return (true);
//     }

//     if(fieldName == "email") {
//         if(!validateRequired(input)) {
//             return false;
//         }
//         if(!validateEmail(input)) {
//             return false
//         }
//         return (true);
//     }
// }