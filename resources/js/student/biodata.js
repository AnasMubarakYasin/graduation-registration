import Datepicker from "flowbite-datepicker/Datepicker";
import { input_img_preview } from "../lib";

input_img_preview("photo", (url) => {
    const img = document.createElement("img");
    img.id = "photo_preview";
    img.src = url;
    img.className =
        "w-[9rem] aspect-square object-cover object-center text-gray-400";
    document.getElementById("photo_preview").replaceWith(img);
});

new Datepicker(document.getElementById("dob"), {format: 'dd MM yyyy'});
