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
