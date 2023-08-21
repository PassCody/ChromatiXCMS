"use strict";
    
    if (document.getElementById("mode_type_text") !== null) {
        const eventElementI = document.getElementById("mode_type_text");
        eventElementI.addEventListener("click", toggleViewModeOverText);
    }
    if (document.getElementById("mode_type_switch") !== null) {
        const eventElementII = document.getElementById("mode_type_switch");
        eventElementII.addEventListener("click", toggleViewMode);
    }
    if (document.getElementById("mode_type_checkbox mode_type_input") !== null) {
        const eventElementIII = document.getElementById("mode_type_checkbox mode_type_input");
        eventElementIII.addEventListener("click", toggleViewMode);
    }
    if (document.getElementById("mode_type_slider mode_type_round") !== null) {
        const eventElementVI = document.getElementById("mode_type_slider mode_type_round");
        eventElementVI.addEventListener("click", toggleViewMode);
    }

let klick = 1;
function toggleViewMode() {
    const elementI = document.getElementById("container-background");
    const elementII = document.getElementById("mode_type_text");
    const elementIII = document.getElementById("mode_type_checkbox mode_type_input");
    if (elementIII.checked === false) {
        elementI.classList.remove("bg-dark");
        elementI.classList.remove("text-white");
        elementII.innerHTML = "Switch to Darkmode";
    }
    else {
        elementI.classList.add("bg-dark");
        elementI.classList.add("text-white");
        elementII.innerHTML = "Switch to Lightmode";
    }
}

function toggleViewModeOverText() {
    const elementI = document.getElementById("container-background");
    const elementII = document.getElementById("mode_type_text");
    const elementIII = document.getElementById("mode_type_checkbox mode_type_input");
    if (elementIII.checked === false) {
        elementIII.checked = true;
        toggleViewMode();
    }
    else {
        elementIII.checked = false;
        toggleViewMode();
    }
}