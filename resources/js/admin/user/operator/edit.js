import {
  input_img_preview
} from "../../../lib";

input_img_preview("photo", (url) => {
  const img = document.getElementById('photo_preview');
  img.src = url;
  img.classList.remove('hidden')
  document.getElementById('photo_placeholder').classList.add('hidden');
});

const department = document.getElementById('department');
const faculty = document.getElementById('field_faculty');

if (department.value == 'faculty') {
  faculty.classList.replace('hidden', 'flex')
} else {
  faculty.classList.replace('flex', 'hidden')
}

department.addEventListener('change', (event) => {
  if (event.target.value == 'faculty') {
    faculty.classList.replace('hidden', 'flex')
  } else {
    faculty.classList.replace('flex', 'hidden')
  }
})
