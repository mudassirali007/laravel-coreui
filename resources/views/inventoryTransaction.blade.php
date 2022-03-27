<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application Using PHP OOPS PDO MySQL & FETCH API of ES6</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<!-- Add New User Modal Start -->
<div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Record</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-user-form" class="p-2" novalidate>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="number" name="lotnumber" class="form-control form-control-lg" placeholder="Lot Number">
                        </div>

                        <div class="col">
                            <input type="text" name="type" class="form-control form-control-lg" placeholder="Type">
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="number" name="units" class="form-control form-control-lg" placeholder="Units">
                    </div>

{{--                    <div class="mb-3">--}}
{{--                        <input type="number" name="unitsInOut" class="form-control form-control-lg" placeholder="Units In Out">--}}
{{--                    </div>--}}

{{--                    <div class="mb-3">--}}
{{--                        <input type="date" name="date" class="form-control form-control-lg" placeholder="Date">--}}
{{--                    </div>--}}

                    <div class="mb-3">
                        <input type="text" name="description" class="form-control form-control-lg" placeholder="Description">
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Add Record" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add New User Modal End -->

<!-- Edit User Modal Start -->
<div class="modal fade" tabindex="-1" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit This Record</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form" class="p-2" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <label for="lotnumber"> Lot Number </label>
                            <input type="number" name="lotnumber" id="lotnumber" class="form-control form-control-lg" placeholder="Lot Number">
                        </div>

                        <div class="col">
                            <label for="type"> Type </label>
                            <input type="text" name="type" id="type" class="form-control form-control-lg" placeholder="Type">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="units"> Units </label>
                        <input type="number" name="units" id="units" class="form-control form-control-lg" placeholder="Units">
                    </div>

                    <div class="mb-3">
                        <label for="unitsInOut"> Units In Out </label>
                        <input type="number" name="unitsInOut" id="unitsInOut" class="form-control form-control-lg" placeholder="Units In Out" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="date"> Date </label>
                        <input type="date" name="date" id="date" class="form-control form-control-lg" placeholder="Date" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="description"> Description </label>
                        <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
                    </div>


                    <div class="mb-3">
                        <input type="submit" value="Update Record" class="btn btn-success btn-block btn-lg" id="edit-user-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit User Modal End -->
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="text-primary">All Inventory Transactions in the database!</h4>
            </div>
            <div>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Add New Record</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div id="showAlert"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>LotNumber</th>
                        <th>Type</th>
                        <th>Units</th>
                        <th>Units In Out</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventoryTransactions as $inventoryTransaction)
                        <tr>
                            <td>{{ $inventoryTransaction->id }}</td>
                            <td>{{ $inventoryTransaction->LotNumber }}</td>
                            <td>{{ $inventoryTransaction->Type }}</td>
                            <td>{{ $inventoryTransaction->Units }}</td>
                            <td>{{ $inventoryTransaction->UnitsInOut }}</td>
                            <td>{{ date("Y-m-d", strtotime($inventoryTransaction->Date)) }}</td>
                            <td>{{ $inventoryTransaction->Description }}</td>
                            <td>
                                <a href="#" id="{{ $inventoryTransaction->id  }}" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editUserModal">Edit</a>

                                <a href="#" id="{{ $inventoryTransaction->id  }}" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const addForm = document.getElementById("add-user-form");
    const updateForm = document.getElementById("edit-user-form");
    const showAlert = document.getElementById("showAlert");
    const addModal = new bootstrap.Modal(document.getElementById("addNewUserModal"));
    const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
    const tbody = document.querySelector("tbody");

    // Add New User Ajax Request
    addForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(addForm);

        if (addForm.checkValidity() === false) {
            e.preventDefault();
            e.stopPropagation();
            addForm.classList.add("was-validated");
            return false;
        } else {
            document.getElementById("add-user-btn").value = "Please Wait...";
            document.getElementById("add-user-btn").classList.add("disabled");
            const data = await fetch("/inventoryTransaction", {
                method: "POST",
                headers: {
                    'X-CSRF-Token': token
                },
                body: formData,
            });
            // document.getElementById("add-user-btn").classList.remove("disabled");
            location.reload()
        }
    });

    // Fetch All Users Ajax Request
    const fetchAllUsers = async () => {
        const data = await fetch("action.php?read=1", {
            method: "GET",
        });
        const response = await data.text();
        tbody.innerHTML = response;
    };
    //fetchAllUsers();

    // Edit User Ajax Request
    tbody.addEventListener("click", (e) => {
        if (e.target && e.target.matches("a.editLink")) {
            e.preventDefault();
            let id = e.target.getAttribute("id");

            editUser(id);
        }
    });

    const editUser = async (id) => {
        const data = await fetch(`/inventoryTransaction/${id}/edit`, {
            method: "GET",
        });
        const response = await data.json();
        document.getElementById("id").value = response.id;
        document.getElementById("lotnumber").value = response.LotNumber;
        document.getElementById("type").value = response.Type;
        document.getElementById("units").value = response.Units;
        document.getElementById("unitsInOut").value = response.UnitsInOut;
        document.getElementById("date").value = new Date(response.Date).toISOString().substring(0, 10);
        document.getElementById("description").value = response.Description;
    };

    // Update Record Ajax Request
    updateForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(updateForm);

        if (updateForm.checkValidity() === false) {
            e.preventDefault();
            e.stopPropagation();
            updateForm.classList.add("was-validated");
            return false;
        } else {
            document.getElementById("edit-user-btn").value = "Please Wait...";
            document.getElementById("edit-user-btn").classList.add("disabled");
            const id = document.getElementById("id").value
            const data = await fetch(`/inventoryTransaction/${id}?_method=PUT`, {
                method: "POST",
                headers: {
                    'X-CSRF-Token': token
                },
                body: formData,
            });
            // document.getElementById("edit-user-btn").classList.remove("disabled");
            location.reload()
        }
    });

    // Delete User Ajax Request
    tbody.addEventListener("click", (e) => {
        if (e.target && e.target.matches("a.deleteLink")) {
            e.preventDefault();
            let id = e.target.getAttribute("id");
            e.target.classList.add("disabled");
            // e.target.className += " disabled"
            deleteUser(id);
        }
    });

    const deleteUser = async (id) => {
        const data = await fetch(`/inventoryTransaction/${id}`, {
            method: "DELETE",
            headers: {
                'X-CSRF-Token': token
            },
        });
        if(await data.text()) location.reload()

    };
</script>
</body>

</html>