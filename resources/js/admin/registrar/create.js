import { create_element } from "../../lib"
import Datepicker from "flowbite-datepicker/Datepicker";
const datePickerEl = document.getElementById("dob");
new Datepicker(datePickerEl, { format: 'yyyy-mm-dd' });

const faculty = document.getElementById('faculty')
const study_program = document.getElementById('study_program')
faculty.addEventListener('change', (event) => {
  const faculty = faculties.find((item) => item.name == event.target.value)
  if (faculty == -1) return
  const options = [create_element(`<option selected>Choose a Study Program</option>`)]
  for (const department of faculty.departments) {
    options.push(create_element(`<option value="${department}">${department}</option>`))
  }
  study_program.replaceChildren(...options)
})
