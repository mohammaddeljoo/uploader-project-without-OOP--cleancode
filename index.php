<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.Uploder</title>

    <style>

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}
body {
  background: paleturquoise;
  color: #222;
}
section {
  width: 1000px;
  height: 420px;
  margin: 150px auto;
  background: white;
}
form {
  width: 96%;
  height: 100%;
  margin: auto;
  padding: 20px;
}

p.msg {
    color: unset;
    padding: 25px;
    background-color: blanchedalmond;
    text-align: center;
    font-family: none;
    border: solid currentColor;
}

form > p {
  padding: 10px 5px;
  font-size: 25px;
  margin: 20px auto;
}
form div {
  height: 60px;
  margin: 20px auto;
  padding: 5px;
}
form .pr {
  height: 110px;
  display: none;
}
form div label {
  background: #f5f5f5;
  display: block;
  padding: 12px;
  border-radius: 4px;
  width: 90%;
  line-height: 25px;
  border: 2px solid #e5e5e5;
  position: relative;
}
form div label:before {
  position: absolute;
  content: "Browser";
  right: -2px;
  top: -2px;
  width: 100px;
  height: 107%;
  line-height: 50px;
  background: #cccccc;
  text-align: center;
  border-radius: 0 4px 4px 0;
  cursor: pointer;
}
strong {
  width: 100%;
  height: 50%;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
strong h4 {
  background: palevioletred;
  padding: 8px 20px;
  color: white;
  border-radius: 5px;
}
progress {
  width: 100%;
  height: 30px;
  -webkit-appearance: none;
  border-radius: 5px;
}
progress::-webkit-progress-bar {
  width: 100%;
  height: 20px;
  background: whitesmoke;
}
progress::-webkit-progress-value {
  background: #00aced;
}
button {
  margin: 10px;
  padding: 12px 18px;
  color: white;
  font-size: 18px;
  outline: none;
  border: none;
  background: #00aced;
  cursor: pointer;
}
button span:nth-child(2),
button.active span:first-child {
  display: none;
}
button.active span:nth-child(2) {
  display: inline-block;
}
button.cancle {
  background: #959595;
  visibility: hidden;
}
button.dowanload {
  background: #959595;
  visibility: hidden;
}
.uploading {
  position: relative;
  padding-left: 20px;
}
.uploading:before {
  position: absolute;
  content: "";
  left: -12px;
  top: 0;
  width: 20px;
  height: 20px;
  border-radius: 20px;
  border: 2px solid;
  border-color: white transparent white transparent;
  animation: rotate 1s infinite;
}
@keyframes rotate {
  to {
    transform: rotate(360deg);
  }
}


    </style>
</head>
<body>


<section>
  <?php 
    if(isset($_SESSION['msg']) and $_SESSION['msg']):?>
    <p class="msg"><?= $_SESSION['msg'] ?> </p>
    <?php unset($_SESSION['msg']); ?>
  <?php endif; ?>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <p>Upload File</p>
    <div>
      <input type="file" id="upload" name="uploadedFile" style="display: none;">
      <label for="upload">select Files</label>
    </div>
    <button name="uploadBtn" value="vUpload"><span>&#8682; Upload </span> <span class="uploading">Uploading......
      </span></button>
    <button class="cancle">cancel upload</button>
    <button class="download">download file</button>
    <div class="pr">
      <strong>
        <h4 class="ex">PDF</h4>
        <h5 class="size">2.5kb</h5>
      </strong>
      <progress min="0" max="100" value="0"></progress>
      <span class="progress-indicator"></span>
    </div>
  </form>
</section>



<script type="text/javascript" src="main.js"></script>
<!-- <script> let file = document.getElementById("upload");
let button = document.getElementsByTagName("button");
let progress = document.querySelector("progress");
let p_i = document.querySelector(".progress-indicator");
let load = 0;
let proces = "";

file.oninput = () => {
  let filename = file.files[0].name;
  let extension = filename.split(".").pop();
  let filesize = file.files[0].size;

  if (filesize <= 1000000) {
    filesize = (filesize / 1000).toFixed(2) + "kb";
  }
  if (filesize == 1000000 || filesize <= 1000000000) {
    filesize = (filesize / 1000000).toFixed(2) + "mb";
  }
  if (filesize == 1000000000) {
    filesize = (filesize / 1000000000).toFixed(2) + "gb";
  }

  document.querySelector("label").innerText = filename;
  document.querySelector(".ex").textContent = extension;
  document.querySelector(".size").textContent = filesize;
  getFile(filename);
  setTimeout(() => {
    progress.style.opacity = 1;
    p_i.style.opacity = 1;
  }, 1000);
};
let upload = () => {
  if (load >= 100) {
    clearInterval(proces);
    p_i.innerHTML = "%" + " " + "Upload Completed";
    button[0].classList.remove("active");
  } else {
    load++;
    progress.value = load;
    p_i.innerHTML = load + "100%" + " " + "upload";
    button[1].onclick = (e) => {
      e.preventDefault();
      clearInterval(proces);
      document.querySelector(".pr").style.display = "none";
      button[1].style.visibility = "hidden";
      button[0].classList.remove("active");
    };
  }
};

function getFile(fileName) {
  if (fileName) {
    document.querySelector(".pr").style.display = "block";
    load = 0;
    progress.value = 0;
    p_i.innerTaxt = "";
    button[0].onclick = (e) => {
      e.preventDefault();
      button[0].classList.add("active");
      button[1].style.visibility = "visible";
      proces = setInterval(upload, 100);
    };
  }
}
 </script> -->
</body>

</html>

    
</body>
</html>