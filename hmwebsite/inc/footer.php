<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2">Serenita Solare</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque explicabo enim et
                recusandae accusamus sapiente, eius esse dolores asperiores nobis ullam aliquid,
                similique, doloribus ipsum quasi laboriosam sequi aperiam deleniti.
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
            <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a> <br>
            <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a> <br>
            <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a> <br>
            <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow Us</h5>
            <?php
            if ($contact_r['insta'] != '') {
                echo <<<data
                      <a href="$contact_r[insta]" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
                          <i class="bi bi-instagram me-1"></i>Instagram
                      </a><br>
                    data;
            }
            ?>
            <a href="<?php echo $contact_r['tw'] ?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-twitter me-1"></i> Twitter
            </a> <br>
            <a href="<?php echo $contact_r['fb'] ?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-facebook me-1"></i> facebook
            </a> <br>
            <a href="#" class="d-inline-block text-dark text-decoration-none">
                <i class="bi bi-telegram me-1"></i> telegram
            </a> <br>
        </div>
    </div>
</div>

<h6 class="text-center bg-dark text-white p-3 m-0">Designed and Developed by Priya Tiwari</h6>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<style>
    .custom-alert{
    position: fixed;
    top: 80px;
    right: 25px;
    z-index: 1111;
}
</style>

<script>

    function alert(type, msg, position = 'body') {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `

        <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
        `;
        if (position == 'body') {
            document.body.append(element);
            element.classList.add('custom-alert');
        } else {
            document.getElementById(position).appendChild(element);
        }
        setTimeout(remAlert, 3000);
    }

    function remAlert() {
        document.getElementsByClassName('alert')[0].remove();
    }

    let register_form = document.getElementById('register-form');

    register_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('name', register_form.elements['name'].value);
        data.append('email', register_form.elements['email'].value);
        data.append('phonenum', register_form.elements['phonenum'].value);
        data.append('address', register_form.elements['address'].value);
        data.append('pincode', register_form.elements['pincode'].value);
        data.append('dob', register_form.elements['dob'].value);
        data.append('pass', register_form.elements['pass'].value);
        data.append('cpass', register_form.elements['cpass'].value);
        data.append('register', '');

        var myModal = document.getElementById('registerModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);

        xhr.onload = function() {
            if (this.responseText == 'pass_mismatch') {
                alert('error',"Password mismatch!");
            }
            else if(this.responseText == 'email_already'){
                alert('error',"email is already registered!")
            }
            else if(this.responseText == 'phone_already'){
                alert('error',"phone no. is already registered!")
            }
            else{
                alert('success',"Registration succesfull!");
                register_form.reset();
            }

        }

        xhr.send(data);
    });

    let login_form = document.getElementById('login-form');

    login_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('email_mob', login_form.elements['email_mob'].value);
        data.append('pass', login_form.elements['pass'].value);
        data.append('login', '');

        var myModal = document.getElementById('loginModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);

        xhr.onload = function() {
            if (this.responseText == 'inv_email_mob') {
                alert('error',"invalid email or mobile no.!");
            }
            else if(this.responseText == 'inactive'){
                alert('error',"Account suspended contact admin!")
            }
            else if(this.responseText == 'invalid_pass'){
                alert('error',"Incorrect passowrd!")
            }
            else{
               window.location = window.location.pathname;
            }

        }

        xhr.send(data);
    });

    function checkLoginToBook(status,room_id){
        if(status){
            window.location.href='confirm_booking.php?id='+room_id;
        }
        else{
            alert('error','opps something went wrong');
        }
    }

</script>