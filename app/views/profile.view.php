<?php $this->view('header',[]); ?>
<div class="p2 col-md-6 shadow mx-auto border rounded">
    <h2>Profile</h2>
    <div class="text-center">
        <span>
            <img class="profile-image rounded-circle m-4" src="<?= get_image($row->image)?>"
                style=" height: 200px; width:200px; object-fit:cover;" alt="...">
            <label>
                <i style="position:absolute; cursor:pointer;" class="h1 text-primary bi bi-image"></i>                
                <input type="file" onchange="display_image(this.files[0]); " class="d-none" name="">
            </label>

        </span>
        <div class="profile-image-prog progress d-none">
            <div class="progress-bar" style="width: 0%;">0%</div>
        </div>
        <h3><?= $row->username ?></h3>
        <script>
        function display_image(file) {
            let allowed = ['jpg','png','jpeg','webp'];
            let ext = file.name.split('.').pop();
            if(!allowed.includes(ext.toLowerCase())){
                alert("Only file of following types " + allowed.toString(',') + " allowed");
                return
            }
            document.querySelector(".profile-image").src = URL.createObjectURL(file);
            change_image(file)
        }
        </script>
    </div>
    <div>
        
        <form method="post" onsubmit="submit_post(event)">
            <div class="bg-secondary p-2">
                <textarea id="post_input" name="" row=6 class="form-control" placeholder="What is on your mind?"></textarea>
                <label>

                    <i class="bi bi-image text-white h1"></i>
                    <input id="post-image" type="file" class="d-none">
                </label>
                    <button class=' mt-1 btn btn-warning float-end'>Post</button>
                <div class="clearfix"></div>
            </div>
        </form>
        <div class="post-prog progress d-none">
            <div class="progress-bar" style="width: 0%;">0%</div>
        </div>
        <div class="my-3">
            <?php if(!empty($posts)): ?>
            <?php foreach($posts as $post): ?>
                <!-- <?php print_r($post->user->username) ?> -->
            <?php $this->view("post-small",['post'=>$post])?>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </div>
    <script>
        function change_image(file){
            var obj         = {};
            obj.image       = file;
            obj.data_type   = "profile-image";
            obj.id          = "<?=user('id')?>";
            obj.progressbar    = "profile-image-prog";
            send_data(obj);


        }
        function submit_post(e){
            e.preventDefault();
            var obj         = {};
            // obj.image       = file;
            obj.data_type  = "create-post";
            obj.post   = e.currentTarget.querySelector("#post_input").value;
            obj.id          = "<?=user('id')?>";
            obj.progressbar    = "post-prog";
            send_data(obj);


        }
        function send_data(obj){
            var myform = new FormData();

            var progressbar = null;

            if(typeof obj.progressbar != 'undefined'){
                progressbar = document.querySelector("."+ obj.progressbar)
            }
            for(key in obj){
                myform.append(key,obj[key]);
            }
            var ajax = new XMLHttpRequest();
            ajax.addEventListener('readystatechange',function(e){
                if(ajax.readyState == 4 && ajax.status == 200){
                    handle_result(ajax.responseText);
                }
            })
            if(progressbar){
                progressbar.classList.remove('d-none')
                progressbar.children[0].style.width = '0%';
                progressbar.children[0].innerHTML = '0%';

                ajax.upload.addEventListener('progress',function(e){
                    let percent = Math.round((e.loaded/e.total)* 100) ;
                    progressbar.children[0].style.width = percent + '%';
                    progressbar.children[0].innerHTML = percent +'%';
    
                })
            }
            ajax.open('post','<?=ROOT?>/ajax',true);
            ajax.send(myform)
        }
        function handle_result(result){
            let obj = JSON.parse(result);
            console.log(result);

            if(obj.data_type == "profile-image"){
                alert(obj.message);
                window.location.reload();
            }else{
                if(obj.data_type == "create-post"){
                alert(obj.message);
                window.location.reload();
            }
            }

        }
    </script>


    <?php $this->view('footer',[]); ?>