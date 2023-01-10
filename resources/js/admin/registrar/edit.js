import { create_element } from "../../lib"
import Datepicker from "flowbite-datepicker/Datepicker";
const datePickerEl = document.getElementById("dob");
new Datepicker(datePickerEl, { format: "yyyy-mm-dd" });

import { input_img_preview } from "../../lib";

for (const iterator of [
    "photo",
    "munaqasyah",
    "school_certificate",
    "ktp",
    "kk",
    "spukt",
]) {
    input_img_preview(iterator, (url) => {
        const img = document.createElement("img");
        img.id = `${iterator}_preview`;
        img.src = url;
        img.className =
            "w-[9rem] aspect-square object-cover object-center text-gray-400";
        document.getElementById(`${iterator}_preview`).replaceWith(img);

        const img_modal = document.createElement("img");
        img_modal.id = `${iterator}_img_preview_modal`;
        img_modal.src = url;
        img_modal.className = "m-auto max-h-full text-gray-400";
        document
            .getElementById(`${iterator}_img_preview_modal`)
            .replaceWith(img_modal);
    });
}

const faculty = document.getElementById('faculty')
const study_program = document.getElementById('study_program')
faculty.addEventListener('change', (event) => {
    const faculty = faculties.find((item) => item.name == event.target.value)
    if (faculty == -1) return
    create_departments(faculty)
})
if (faculty.value) {
    const result = faculties.find((item) => item.name == faculty.value)
    if (result != -1) {
        create_departments(result, study_program.value)
    }
}
function create_departments(faculty, selected) {
    const options = [create_element(`<option selected>Choose a Study Program</option>`)]
    for (const department of faculty.departments) {
        options.push(create_element(`<option ${selected == department ? 'selected' : ''} value="${department}">${department}</option>`))
    }
    study_program.replaceChildren(...options)
}
