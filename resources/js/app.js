require("./bootstrap");
require("alpinejs");
const $ = require("jquery");

$(document).ready(function () {
    // resize for mobile
    function alterClass() {
        var screensize = document.documentElement.clientWidth;
        if (screensize < 600) {
            $(".feature-hidden").hide();
            $(".pc-profileCard").hide();
        } else if (screensize >= 768) {
            $(".feature-hidden").show();
            $(".pc-profileCard").show();
        }
    };
    $(window).resize(function () {
        alterClass();
    });

    // sidebar buttons
    $("#openbtn").click(function () {
        //open
        $(".sidebar").removeClass("hidden");
        $(".sidebar").addClass("col-span-2");
        $(".main").addClass("col-span-5");
        $(".main").removeClass("col-span-7");
        $("#openbtn").addClass("hidden");
        $("#closebtn").removeClass("hidden");
    });
    $("#closebtn").click(function () {
        // close
        $(".sidebar").removeClass("col-span-2");
        $(".sidebar").addClass("hidden");
        $(".main").removeClass("col-span-5");
        $(".main").addClass("col-span-7");
        $("#openbtn").removeClass("hidden");
        $("#closebtn").addClass("hidden");
    });
});


document.addEventListener("DOMContentLoaded", function() {

    var Inputs = document.getElementsByTagName("input");
    for (var i = 0; i < Inputs.length; i++) {
        Inputs[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("This field cannot be left blank");
            }
        };
        Inputs[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
    var Textarea = document.getElementsByTagName("textarea");
    for (var i = 0; i < Textarea.length; i++) {
        Textarea[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("This field cannot be left blank");
            }
        };
        Textarea[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }

})
function readURL(input) { //for uploadingpost image
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-img-tag').attr('src', e.target.result);
            // $('#profile-img1-tag').attr('src', e.target.result);
            // $('#profile-img2-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#profile-img").change(function(){
    readURL(this);
});

// window.onload = function () {
//     var divReference =
//         document.querySelector(".divstudent");
//     divReference.addEventListener(
//         "click",
//         function () {
// var divToCreate = document.createElement("Label");
// divToCreate.setAttribute('class' , 'divstudent')
//   divToCreate.innerHTML = `
//   <label>
//   <input type="file" hidden name="image" class="h-24  px-1"
//   id="profile-img" >
//   <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-plus-ecommerce-flatart-icons-outline-flatarticons.png" id="profile-img-tag" class="h-24 w-24 rounded border border-pink-300 cursor-pointer" alt="">
//   </label> `;
//             divReference.parentNode.appendChild(
//                 divToCreate
//             );

//         },
//         false
//     );
// };
