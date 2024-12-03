<style>
    /* Base styles */
    .wrapper a {
        display: inline-block;
        text-decoration: none;
        padding: 15px 20px;
        background-color: #ffffff;
        border-radius: 4px;
        text-transform: uppercase;
        color: #585858;
        font-family: 'Roboto', sans-serif;
        transition: background-color 0.3s ease;
    }

    .wrapper a:hover {
        background-color: #f0f0f0;
    }

    /* Modal styles */
    .modal {
        visibility: hidden;
        opacity: 0;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        transition: visibility 0s, opacity 0.4s;
    }

    .modal:target {
        visibility: visible;
        opacity: 1;
    }

    .modal__content {
        border-radius: 4px;
        position: relative;
        width: 500px;
        max-width: 90%;
        background: #ffffff;
        padding: 30px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .modal__footer {
        text-align: right;
    }

    .modal__close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #585858;
        font-size: 24px;
        text-decoration: none;
    }

    /* Input field styles */
    input[type="password"],select {
        width: calc(100% - 20px); /* Adjusted to account for padding */
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type="password"]:focus,
    select:focus {
        outline: none;
        border-color: #007bff;
    }

    /* Close button style */
    .modal__close-btn {
        display: block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #ccc;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .modal__close-btn:hover {
        background-color: #999;
    }

    /* Add Product button style */
.modal__btn-add {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    text-transform: uppercase;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.modal__btn-add:hover {
    background-color: #0056b3;
}

</style>


<div class="wrapper">
    <a href="#demo-modal2" class="btn btn-warning m-1 btn-update-product"
       onclick="fetchUserData('{{ $user->id }}', '{{ $user->usertype_id }}')">Update User</a>
</div>

<div id="demo-modal2" class="modal">
    <div class="modal__content">
        <a href="#close" class="modal__close">&#10006;</a>
        <form id="user-update-form" method="post" action="{{ route('admin.user.update', ['id' => $user->id]) }}">
            @csrf
            <!-- Hidden input field to store user ID -->
            <input type="hidden" name="id" id="user-id">
            <!-- Input field for user password -->
            
          
            <input type="password" name="password" id="user-password" placeholder="Please Add New Password">
            <input type="password" name="password_confirmation"  placeholder="Please Add Confirm Password">
            <!-- Button to submit the form -->
            <select class="form-control" id="user-usertype_id" name="usertype_id" >
                @foreach (App\Models\usertype::orderBy('id')->get() as $usertype)
                <option  value="{{ $usertype->id }}"
                    {{ ($user->usertype_id == $usertype->id ? "selected":"")}}>
                    {{ $usertype->name }}
                </option>
            @endforeach
            </select>
            <button type="submit" class="modal__btn-add">Update User</button>
        </form>
    </div>
</div>

<script>
    function fetchUserData(userId,usertype_id) {
        // Update modal content with user data
        document.getElementById('user-id').value = userId;
        document.getElementById('user-usertype_id').value = usertype_id;
        document.getElementById('user-password').value = ''; // Clear the password field
        
        // Open the modal
        document.getElementById('demo-modal2').classList.add('open');

        // Set the action attribute of the form to include the user ID
        document.getElementById('user-update-form').action = "/admin/user/update/" + userId;
    }
</script>