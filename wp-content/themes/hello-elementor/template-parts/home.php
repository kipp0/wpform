<main>
    <div class="container">
        <form method="POST" action="" id="register">
            
                <div class="row">
                    <div class="col-12">
                        <h5>Basic Information</h5>
                        <div id="notification"></div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name|required" data-rule="name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                        <label for="phone" class="form-label" data-rule="phone|required">Phone</label>
                        <input type="text" class="form-control" id="phone"  name="phone">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email|required" data-rule="email" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <button id="submit" type="submit" class="btn btn-red">Apply</button>

            </form>
    </div>
    
</main>
