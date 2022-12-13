import Datepicker from "flowbite-datepicker/Datepicker";
const datePickerEl = document.getElementById("dob");
new Datepicker(datePickerEl, {format: 'yyyy-mm-dd'});
