
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        @media (max-width:1280px) {
            .modal-content {
                margin: 25% auto;
            }
        }
        @media (max-width:768px) {
            .modal-content {
                margin: 30% auto;
            }
        }
        @media (max-width: 488px) {
            .modal-content {
                margin: 45% auto;
            }
        }

        .close {
            position: absolute;
            right: 10px;
            top: -5px;
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        #upload {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #upload:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
        $imageDirectory = './uploads/';
        $images = scandir($imageDirectory);

        // Xóa ảnh
        // Viết code xóa ảnh

    if (isset($_POST['delete_image'])) {
        $imageToDelete = $_POST['image_name'];
        unlink($imageDirectory . $imageToDelete);
        header("Location: index.php");
    }

        // Sửa tên ảnh
        //Viết code sửa tên ảnh
    if (isset($_POST['update_image_name'])) {
        $newImageName = $_POST['new_image_name'];
        $oldImageName = $_POST['image_name'];
        $newImagePath = $imageDirectory . $newImageName;

        if (rename($imageDirectory . $oldImageName, $newImagePath)) {
            header("Location: index.php");
            exit;
        }
        echo "close_edit_form();";
    }

    ?>
    <!--Title-->
    <div class="flex justify-center mt-8">
        <h1 class="text-3xl font-bold uppercase text-blue-600">Images Manager</h1>
    </div>

    <!-- Images Gallery-->
    <div class="container mx-auto px-8 py-8 lg:px-32 lg:pt-8">
        <div class="flex justify-end">
            <a href="#">
                <button type="button" class="px-6 py-2 rounded border-2 border-green-500 bg-green-500
                text-white text-lg hover:bg-white hover:text-green-500 font-bold"> Thêm mới hình ảnh</button>
            </a>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form enctype="multipart/form-data" action="./upload.php" method="post">
                    <div>
                        <label for="file">Select a file:</label>
                        <input type="file" id="file" name="file"/>
                    </div>
                    <div>
                        <button type="submit" id="upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full mt-8">
            <div class="-m-1 flex flex-wrap md:-m-2">

            <?php
            foreach ($images as $image) {
                if ($image !== '.' && $image !== '..') {
            ?>
                <div class="flex sm:w-1/1 md:w-1/2 xl:w-1/3 2xl:w-1/4 flex-wrap sm:mt-[10px] xl:mt-[0px]">
                    <div class="w-full px-8 py-3 sm:p-5 md:p-5 xl:p-3 ">
                        <img
                            alt="gallery"
                            class="block h-full w-full rounded-lg object-cover object-center"
                            src="<?php echo $imageDirectory . $image ?>" />
                    </div>
                    <div class="w-full px-8 py-2 md:p-2 xl:p-2  flex justify-between">
                        <div class="w-full break-words break-all text-left pl-4 text-gray-500 text-lg">
                            <?php echo $image ?>
                        </div>
                        <div>
                            <div class="flex justify-end gap-2">
                                <div>
                                    <button type="button" onclick="edit_file_name('<?php echo $image?>')" class="text-lg text-blue-500 hover:text-black">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </div>
                                <div>
                                    <form method="post" action="">
                                        <input type="hidden" name="image_name" value="<?php echo $image?>" />
                                        <button type="submit" name="delete_image" class="text-lg text-red-500 hover:text-black">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
                }
            }
            ?>
            </div>
        </div>
    </div>
    <div class="absolute w-full h-screen bg-black/50 top-0 left-0 hidden" id="edit_form">
        <div class="flex justify-center items-center">
            <div class="w-1/3 bg-white p-8 mt-36 rounded">
                <div class="edit-form">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <img
                                id="edit_image_src"
                                alt="gallery"
                                class="block h-full w-full rounded-lg object-cover object-center"
                                src="./uploads/sample_1.png" />
                        </div>
                        <div class="col-span-1">
                            <form method="post" action="">
                                <h3 class="text-center font-bold text-blue-600 uppercase text-lg"> Sửa tên</h3>
                                <div class="mt-2 w-full">
                                    <p class="text-left font-bold text-base text-gray-600"> Tên cũ:</p>
                                    <input class="px-2 py-1 border border-gray-400 rounded w-full mt-1 focus:outline-blue-500"
                                           type="text" name="image_name" id="editImageName" value="sample_1.png" readonly/>
                                </div>

                                <div class="mt-2 w-full">
                                    <p class="text-left font-bold text-base text-gray-600"> Tên mới:</p>
                                    <input class="px-2 py-1 border border-gray-400 rounded w-full mt-1 focus:outline-blue-500"
                                           type="text" name="new_image_name" id="newImageName" value="sample_1.png" required/>
                                </div>
                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="button" class="px-5 py-2 bg-gray-500 text-white text-base border border-gray-500
                                                       hover:text-gray-500 hover:bg-white rounded" onclick="close_edit_form()">Hủy</button>
                                    <button type="submit" class="px-5 py-2 bg-orange-500 text-white text-base border border-orange-500
                                                       hover:text-orange-500 hover:bg-white rounded " name="update_image_name">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Lấy thẻ modal
        var modal = document.getElementById("myModal");

        // Lấy thẻ nút mở modal
        var btn = document.querySelector(".flex.justify-end button");

        // Lấy thẻ span đóng modal
        var span = document.getElementsByClassName("close")[0];

        // Khi người dùng nhấp vào nút, mở modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // Khi người dùng nhấp vào span (×), đóng modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Khi người dùng nhấp bất kỳ đâu ngoài modal, đóng modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script type="text/javascript">
        let imgDir = '<?php echo $imageDirectory ?>';
        function edit_file_name(filename){
            console.log(filename);
            document.getElementById("edit_form").style.display="inline-block";
            document.getElementById("edit_image_src").src= imgDir + filename;
            document.getElementById("editImageName").value= filename;
            document.getElementById("newImageName").value= "";
        }
        function close_edit_form(){
            document.getElementById("edit_form").style.display="none";
        }



    </script>



</body>
</html>