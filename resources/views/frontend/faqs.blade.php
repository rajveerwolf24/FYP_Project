@extends('layouts.app')

<link rel="stylesheet" href="style.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

<style type="text/css">
 @import url('https://fonts.googleapis.com/css2?family=Staatliches&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'poppins', sans-serif;
}

body {
  min-height: 100vh;
  width: 100%;
  
  align-items: center;
  justify-content: center;
  background: #17202A;
}

.main {
  height: 480px;
  display: flex;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.05);
  overflow: hidden;
  box-shadow: 0.1px 4px 8px 5px rgba(0, 0, 0, 0.1);
}


/*Tools part*/
.Tools {
  height: 100%;
  width: 10%;
  box-shadow: 0.1px 4px 8px 5px rgba(0, 0, 0, 0.1);
  background: rgba(255, 255, 255, 0.05);
}

.Tools ul {
  list-style: none;
}

.Tools ul li {
  width: 100%;
  height: 80px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  cursor: pointer;
  transition: 0.4s;
}

.Tools ul .active_option {
  background: rgba(255, 255, 255, 0.1);
}

.Tools ul .active_option p {
  opacity: 1;
  margin-top: 8px;
}

.Tools ul .active_option i {
  color: #FF7043;
}

.Tools ul li i {
  color: rgba(255, 255, 255, 0.5);
  margin-top: 10px;
  font-size: 2em;
}

.Tools ul li:hover i {
  color: #FF7043;
}

.Tools ul li:hover {
  background: rgba(255, 255, 255, 0.1);
}

.Tools ul li:hover p {
  opacity: 1;
  margin-top: 8px;
}

.Tools ul li p {
  opacity: 0;
  font-size: 13px;
  color: rgba(255, 255, 255, 0.5);
}


/*content part */
.content {
  position: relative;
  width: 90%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 20px;
}

.content #logo {
  position: absolute;
  top: 10px;
  right: 20px;
  letter-spacing: 3px;
  font-family: 'Staatliches', cursive;
  color: rgba(255, 255, 255, 0.5);
}

.choose_image {
  width: 70%;
  height: 200px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.upload_img_box {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  height: 100%;
  width: 100%;
  cursor: pointer;
  border: 1px dashed rgba(255, 255, 255, 0.5);
}

p#hint {
  color: rgba(255, 255, 255, 0.5);
  font-size: 1.2em;
}

.upload_img_box i {
  font-size: 2.2em;
  color: rgba(255, 255, 255, 0.5);
}

#selectedImage {
  display: none;
}


/*canvas */
#image_canvas {
  display: none;
}


/*image holder part*/
.image_holder {
  position: relative;
  display: none;
  height: 80%;
}

.image_holder img {
  height: 100%;
  object-fit: cover;
  border-radius: 15px;
}

.image_holder button {
  position: absolute;
  display: none;
  top: -30px;
  left: 0px;
  outline: none;
  border: none;
  cursor: pointer;
  color: #FF7043;
  font-size: 1.8em;
  background: none;
  transform: rotate(270deg);
}


/*options part */
.options {
  position: absolute;
  transform: translateY(80px);
  bottom: 0;
  height: 50px;
  width: 50%;
  padding: 0 25px;
  border-radius: 10px 10px 0 0;
  transition: 0.5s;
  box-shadow: 0.1px 4px 8px 5px rgba(0, 0, 0, 0.1);
  background: rgba(255, 255, 255, 0.05);
}

.options .active_controller {
  display: flex;
  align-items: center;
  width: 100%;
  height: 100%;
  justify-content: space-between;
}

.option {
  display: none;
}

.option p {
  font-weight: bold;
  color: rgba(255, 255, 255, 0.5);
}

/*Range slider*/
input[type="range"] {
  width: 80%;
  height: 5px;
  cursor: pointer;
  outline: none;
}


/*clear or reset btn */
#clearAll {
  position: absolute;
  bottom: 10px;
  right: 20px;
  outline: none;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.5s;
  padding: 10px;
  color: #17202A;
  background: #FF7043;
  transform: translateX(150px);
  box-shadow: 0.1px 4px 8px 5px rgba(0, 0, 0, 0.1);
}

#clearAll span {
  margin-right: 10px;
}

</style>
<!-- Breadcrumb Area Start -->
   
    </section>
    <!-- Breadcrumb Area End -->
    <br>
 <body>
   <div class="container" style="background-color: #17202A;">
      <div class="main">
         <div class="Tools">
            <ul>
               <li>
                  <i class='bx bxs-brightness-half'></i>
                  <p>BrightNess</p>
               </li>
               <li>
                  <i class='bx bxs-brush' ></i>
                  <p>Blur</p>
               </li>
               <li>
                  <i class='bx bxs-collection' ></i>
                  <p>GreyScale</p>
               </li>
               <li>
                  <i class='bx bxs-color-fill' ></i>
                  <p>Hue Rotate</p>
               </li>
               <li>
                  <i class='bx bxs-magic-wand' ></i>
                  <p>Saturation</p>
               </li>
               <li onclick="Download_btn()">
                  <i class='bx bx-export' ></i>
                  <p>Export</p>
               </li>
            </ul>
         </div>
         <div class="content">
            <div class="choose_image">
               <div class="upload_img_box">
                  <i class='bx bxs-image-add' ></i><br>
                  <input type="file" name="selectedImage" id="selectedImage" accept="image/jpeg, image/png">
                  <p id="hint">choose Image from folder</p>
               </div>
            </div>
            <canvas id="image_canvas"></canvas>
            <div class="image_holder">
               <button id="remove_img_btn"><i class='bx bxs-message-square-x' ></i></button>
               <img src="" alt="img" id="image">
            </div>
            <div class="options">
               <div class="option">
                  <input type="range" max="200" min="0" value="100" id="brightness" class="slider">
                  <p id="brightVal" class="show_value">100</p>
               </div>
               <div class="option">
                  <input type="range" max="40" min="0" value="0" id="blur" class="slider">
                  <p id="blurVal" class="show_value">0</p>
               </div>
               <div class="option">
                  <input type="range" max="100" min="0" value="0" id="greyScale" class="slider">
                  <p id="greyVal" class="show_value">0</p>
               </div>
               <div class="option">
                  <input type="range" max="100" min="0" value="0" id="hue" class="slider">
                  <p id="hueVal" class="show_value">0</p>
               </div>
               <div class="option">
                  <input type="range" max="100" min="1" value="1" id="saturation" class="slider">
                  <p id="saturationVal" class="show_value">1</p>
               </div>
            </div>
            <button id="clearAll"><span>Reset</span><i class='bx bx-reset' ></i></button>
         </div>
      </div>
   </div>
      
   </body>
<br>


<script src="main.js"></script>
<script type="text/javascript">
   let upload_img_box = document.querySelector('.upload_img_box');
let selectedImage = document.querySelector('#selectedImage');
let choose_image = document.querySelector('.choose_image');

let image_holder = document.querySelector('.image_holder');
let image = document.querySelector('#image');

let slider = document.querySelectorAll('.slider');
let show_value = document.querySelectorAll('.show_value');

let list_options = document.querySelectorAll('ul li');

let options = document.querySelector('.options');
let option = document.querySelectorAll('.option');

let clearAll = document.querySelector('#clearAll');
let remove_img_btn = document.querySelector('#remove_img_btn');


let canvas = document.querySelector('#image_canvas');
const context = canvas.getContext('2d');

let File_Name;
let Edited = false;


/*handle choose image event*/
upload_img_box.addEventListener("click", function () {
   selectedImage.click();
});


/*choose image event*/
selectedImage.addEventListener("change", function () {
   const file = this.files[0];

   if (file) {
      const reader = new FileReader();
      File_Name = file.name;

      choose_image.style.display = "none";
      image_holder.style.display = "block";

      reader.addEventListener("load", function () {
         image.setAttribute("src", this.result);
      });

      reader.readAsDataURL(file);
      remove_img_btn.style.display = "block";
   }

   if (Edited == false) {
      Edited = true;
   }

})


/*function call when slider value change*/
for (let i = 0; i <= slider.length - 1; i++) {
   slider[i].addEventListener('input', editImage);
}

function editImage() {
   let bright = document.querySelector('#brightness');
   let blur = document.querySelector('#blur');
   let grey = document.querySelector('#greyScale');
   let hue = document.querySelector('#hue');
   let saturation = document.querySelector('#saturation');


   let brightValShow = document.querySelector('#brightVal');
   let blurValShow = document.querySelector('#blurVal');
   let greyValShow = document.querySelector('#greyVal');
   let hueValShow = document.querySelector('#hueVal');
   let saturationValShow = document.querySelector('#saturationVal');

   let brightVal = bright.value;
   let greyVal = grey.value;
   let blurVal = blur.value;
   let hueVal = hue.value;
   let satuVal = saturation.value;

   brightValShow.innerHTML = brightVal;
   blurValShow.innerHTML = blurVal;
   greyValShow.innerHTML = greyVal;
   hueValShow.innerHTML = hueVal;
   saturationValShow.innerHTML = satuVal;

   image.style.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ')';
   context.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ')';

   clearAll.style.transform = 'translateY(0px)';
}


/*handle each option click even*/
list_options.forEach((list_option, index) => {
   list_option.addEventListener('click', function () {


      if (image.getAttribute('src') == "") {
         alert("Choose Image First");
      } else {

         options.style.transform = 'translateY(0px)';

         if (Edited == true) {
            canvas.height = image.naturalHeight;
            canvas.width = image.naturalWidth;

            for (let i = 0; i <= 4; i++) {

               if (index != i) {
                  list_options[i].classList.remove("active_option");
                  option[i].classList.remove("active_controller");

               } else {
                  this.classList.add("active_option");
                  option[i].classList.add("active_controller");
               }
            }

         } else {
            alert("Edit Your Image First");
         }

      }

   })
})


/*download image btn click*/
function Download_btn() {

   if (image.getAttribute('src') != "") {

      if (Edited == true) {
         context.drawImage(image, 0, 0, canvas.width, canvas.height);
         var jpegUrl = canvas.toDataURL("image/jpg");

         const link = document.createElement("a");
         document.body.appendChild(link);

         link.setAttribute("href", jpegUrl);
         link.setAttribute("download", File_Name);
         link.click();
         document.body.removeChild(link);

      }
   }
}


/*clear or reset range value*/
clearAll.addEventListener("click", function () {
   clearAllRangeValue();
})

function clearAllRangeValue() {
   image.style.filter = 'none';
   context.filter = 'none';

   for (let i = 0; i <= slider.length - 1; i++) {
      if (i == 0) {
         slider[i].value = '100';
      } else {
         slider[i].value = '0';
      }
   }

   editImage();
   clearAll.style.transform = 'translateY(150px)';
}

/*remove image btn click*/
remove_img_btn.addEventListener("click", function () {
   image.src = "";
   this.style.display = "none";
   choose_image.style.display = "block";
   image_holder.style.display = "none";
   options.style.transform = 'translateY(80px)';
   clearAllRangeValue();
})
</script>
